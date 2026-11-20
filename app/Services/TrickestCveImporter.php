<?php

namespace App\Services;

use App\Models\Category;
use App\Models\CveArticle;
use App\Models\Lab;
use Illuminate\Support\Facades\DB;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Process\Process;

class TrickestCveImporter
{
    public const DEFAULT_REPO_URL = 'https://github.com/trickest/cve.git';

    public const DEFAULT_YEARS = [2024, 2025, 2026];

    public function defaultRepoPath(): string
    {
        return storage_path('app/cve-repo/trickest-cve');
    }

    /**
     * Sparse-clone or update only selected year directories + hot_cves.csv from trickest/cve.
     *
     * @param  list<int>  $years
     * @return array{ok: bool, path: string, message: string}
     */
    public function sparseCloneOrUpdate(
        array $years = self::DEFAULT_YEARS,
        ?string $targetDir = null,
        string $repoUrl = self::DEFAULT_REPO_URL
    ): array {
        @set_time_limit(0);
        $dir = $targetDir ?: $this->defaultRepoPath();
        $cleanYears = $this->normalizeYears($years);
        $sparsePatterns = array_merge(['/hot_cves.csv'], array_map(static fn (int $y): string => "/{$y}", $cleanYears));

        $gitDir = $dir.DIRECTORY_SEPARATOR.'.git';
        $lockFile = $gitDir.DIRECTORY_SEPARATOR.'index.lock';
        if (is_file($lockFile)) {
            @unlink($lockFile);
        }

        // Replace broken partial clones (--filter=blob:none promisor) with a direct shallow clone
        $gitConfig = $gitDir.DIRECTORY_SEPARATOR.'config';
        if (is_file($gitConfig)) {
            $cfgRaw = @file_get_contents($gitConfig);
            if (is_string($cfgRaw) && (str_contains($cfgRaw, 'promisor = true') || str_contains($cfgRaw, 'partialclonefilter'))) {
                $this->deleteDirectory($dir);
            }
        }

        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $alreadyCloned = is_dir($gitDir);
        if (! $alreadyCloned) {
            $clone = new Process([
                'git',
                'clone',
                '--depth=1',
                '--no-checkout',
                $repoUrl,
                $dir,
            ], null, null, null, 1800);
            $clone->run();

            if (! $clone->isSuccessful()) {
                return [
                    'ok' => false,
                    'path' => $dir,
                    'message' => trim($clone->getErrorOutput() ?: $clone->getOutput() ?: 'Git clone failed.'),
                ];
            }
        }

        $sparse = new Process(
            array_merge(['git', '-C', $dir, 'sparse-checkout', 'set', '--no-cone'], $sparsePatterns),
            null,
            null,
            null,
            120
        );
        $sparse->run();

        if (! $sparse->isSuccessful()) {
            return [
                'ok' => false,
                'path' => $dir,
                'message' => trim($sparse->getErrorOutput() ?: $sparse->getOutput() ?: 'Git sparse-checkout failed.'),
            ];
        }

        if ($alreadyCloned) {
            $fetch = new Process(['git', '-C', $dir, 'fetch', '--depth=1', 'origin', 'HEAD'], null, null, null, 600);
            $fetch->run();
            if ($fetch->isSuccessful()) {
                $reset = new Process(['git', '-C', $dir, 'reset', '--mixed', 'FETCH_HEAD'], null, null, null, 180);
                $reset->run();
            }
        }

        $targets = ['hot_cves.csv'];
        foreach ($cleanYears as $y) {
            $targets[] = (string) $y;
        }

        foreach ($targets as $target) {
            $lsTree = new Process(['git', '-C', $dir, 'ls-tree', '--name-only', 'HEAD', '--', $target], null, null, null, 60);
            $lsTree->run();
            if (! $lsTree->isSuccessful() || trim($lsTree->getOutput()) === '') {
                continue;
            }

            $timeout = $target === 'hot_cves.csv' ? 120 : 900;
            $checkout = new Process(['git', '-C', $dir, 'checkout', 'HEAD', '--', $target], null, null, null, $timeout);
            $checkout->run();

            if (! $checkout->isSuccessful()) {
                return [
                    'ok' => false,
                    'path' => $dir,
                    'message' => trim($checkout->getErrorOutput() ?: $checkout->getOutput() ?: "Git checkout failed on {$target}."),
                ];
            }
        }

        return [
            'ok' => true,
            'path' => $dir,
            'message' => 'Sparse clone/update succeeded for years: '.implode(', ', $cleanYears),
        ];
    }

    /**
     * Import CVE markdown files + hot_cves.csv from a local trickest/cve clone into MySQL.
     *
     * @param  list<int>  $years
     * @return array{ok: bool, imported: int, updated: int, skipped: int, hot_matched: int, years: list<int>, message: string}
     */
    public function importFromDirectory(
        string $repoDir,
        array $years = self::DEFAULT_YEARS,
        int $limit = 300,
        bool $hotOnly = false,
        ?int $authorId = null
    ): array {
        @set_time_limit(0);
        DB::disableQueryLog();

        $cleanYears = $this->normalizeYears($years);
        if (! is_dir($repoDir)) {
            return [
                'ok' => false,
                'imported' => 0,
                'updated' => 0,
                'skipped' => 0,
                'hot_matched' => 0,
                'years' => $cleanYears,
                'message' => "Local trickest/cve directory not found at: {$repoDir}",
            ];
        }

        $hotMap = $this->parseHotCvesCsv($repoDir.DIRECTORY_SEPARATOR.'hot_cves.csv');
        $categoryIds = Category::pluck('id')->all();
        $firstLabByCat = [];
        foreach (Lab::orderBy('sort_order')->get(['id', 'category_id']) as $lab) {
            if (! isset($firstLabByCat[$lab->category_id])) {
                $firstLabByCat[$lab->category_id] = $lab->id;
            }
        }

        rsort($cleanYears);
        $hotFiles = [];
        $filesByYear = [];

        foreach ($cleanYears as $year) {
            $yearDir = $repoDir.DIRECTORY_SEPARATOR.(string) $year;
            if (! is_dir($yearDir)) {
                continue;
            }
            $files = glob($yearDir.DIRECTORY_SEPARATOR.'CVE-*.md') ?: [];
            rsort($files);
            $yearNonHot = [];
            foreach ($files as $file) {
                $cveId = strtoupper(pathinfo($file, PATHINFO_FILENAME));
                $isHot = isset($hotMap[$cveId]);
                if ($hotOnly && ! $isHot) {
                    continue;
                }
                if ($isHot) {
                    $hotFiles[] = $file;
                } else {
                    $yearNonHot[] = $file;
                }
            }
            if (! empty($yearNonHot)) {
                $filesByYear[$year] = $yearNonHot;
            }
        }

        $selectedFiles = $hotFiles;
        if ($limit > 0) {
            if (count($selectedFiles) > $limit) {
                $selectedFiles = array_slice($selectedFiles, 0, $limit);
            } else {
                // Balanced round-robin across years so every selected year is represented
                $cursors = array_fill_keys(array_keys($filesByYear), 0);
                while (count($selectedFiles) < $limit && ! empty($cursors)) {
                    foreach (array_keys($cursors) as $yr) {
                        $idx = $cursors[$yr];
                        if (! isset($filesByYear[$yr][$idx])) {
                            unset($cursors[$yr]);
                            continue;
                        }
                        $selectedFiles[] = $filesByYear[$yr][$idx];
                        $cursors[$yr] = $idx + 1;
                        if (count($selectedFiles) >= $limit) {
                            break 2;
                        }
                    }
                }
            }
        } else {
            foreach ($filesByYear as $yearFiles) {
                foreach ($yearFiles as $file) {
                    $selectedFiles[] = $file;
                }
            }
        }

        unset($hotFiles, $filesByYear);

        $imported = 0;
        $updated = 0;
        $skipped = 0;
        $hotMatched = 0;
        $nowStr = now()->format('Y-m-d H:i:s');

        foreach (array_chunk($selectedFiles, 500) as $chunkFiles) {
            $parsedById = [];
            foreach ($chunkFiles as $filePath) {
                $parsed = $this->parseMarkdownFile($filePath, $hotMap, $categoryIds, $firstLabByCat);
                if (! $parsed) {
                    $skipped++;
                    continue;
                }
                $parsedById[$parsed['cve_id']] = $parsed;
            }

            if (empty($parsedById)) {
                continue;
            }

            $existingMap = CveArticle::whereIn('cve_id', array_keys($parsedById))
                ->get(['cve_id', 'author_id', 'published_at'])
                ->keyBy('cve_id');

            $upsertRows = [];
            foreach ($parsedById as $cveId => $parsed) {
                if ($parsed['is_hot']) {
                    $hotMatched++;
                }

                $existing = $existingMap->get($cveId);
                if ($existing) {
                    $updated++;
                } else {
                    $imported++;
                }

                $upsertRows[] = [
                    'cve_id' => $parsed['cve_id'],
                    'slug' => $parsed['slug'],
                    'cve_year' => $parsed['cve_year'],
                    'category_id' => $parsed['category_id'],
                    'lab_id' => $parsed['lab_id'],
                    'title' => $parsed['title'],
                    'cvss_score' => $parsed['cvss_score'],
                    'severity' => $parsed['severity'],
                    'affected_product' => $parsed['affected_product'],
                    'summary' => $parsed['summary'],
                    'technical_analysis' => $parsed['technical_analysis'],
                    'poc_content' => $parsed['poc_content'],
                    'mitigation' => $parsed['mitigation'],
                    'references_json' => json_encode($parsed['references_json'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE) ?: '[]',
                    'source_repo' => $parsed['source_repo'],
                    'is_hot' => $parsed['is_hot'] ? 1 : 0,
                    'status' => $parsed['status'],
                    'author_id' => $existing?->author_id ?? $authorId,
                    'published_at' => $existing?->published_at?->format('Y-m-d H:i:s') ?? $nowStr,
                    'created_at' => $nowStr,
                    'updated_at' => $nowStr,
                ];
            }

            CveArticle::upsert(
                $upsertRows,
                ['cve_id'],
                [
                    'slug',
                    'cve_year',
                    'category_id',
                    'lab_id',
                    'title',
                    'cvss_score',
                    'severity',
                    'affected_product',
                    'summary',
                    'technical_analysis',
                    'poc_content',
                    'mitigation',
                    'references_json',
                    'source_repo',
                    'is_hot',
                    'status',
                    'author_id',
                    'published_at',
                    'updated_at',
                ]
            );
        }

        return [
            'ok' => true,
            'imported' => $imported,
            'updated' => $updated,
            'skipped' => $skipped,
            'hot_matched' => $hotMatched,
            'years' => $cleanYears,
            'message' => "Processed trickest/cve ({$imported} created, {$updated} updated, {$hotMatched} hot CVEs).",
        ];
    }

    /**
     * @return array<string, array{cvss: ?float, severity: ?string, poc_count: ?int, description: ?string, references: list<string>}>
     */
    public function parseHotCvesCsv(string $csvPath): array
    {
        if (! is_file($csvPath)) {
            return [];
        }

        $handle = fopen($csvPath, 'r');
        if (! $handle) {
            return [];
        }

        $firstRow = $this->readNextNonEmptyCsvRow($handle);
        if ($firstRow === null) {
            fclose($handle);

            return [];
        }

        $firstRow = array_map(static function ($cell): string {
            $clean = preg_replace('/^\xEF\xBB\xBF/', '', (string) $cell) ?? (string) $cell;

            return trim($clean);
        }, $firstRow);

        $hasHeader = ! $this->csvRowContainsCveId($firstRow);
        $cols = [];
        $rows = [];

        if ($hasHeader) {
            $cols = array_map(static function (string $h): string {
                $normalized = preg_replace('/[\s-]+/', '_', strtolower(trim($h)));

                return trim((string) ($normalized ?? strtolower($h)), '_');
            }, $firstRow);
        } else {
            $rows[] = $firstRow;
        }

        while (($nextRow = $this->readNextNonEmptyCsvRow($handle)) !== null) {
            $rows[] = $nextRow;
        }

        fclose($handle);

        $map = [];
        foreach ($rows as $row) {
            $cleanRow = array_map(static fn ($v): string => trim((string) $v), $row);
            $assoc = [];

            if ($hasHeader) {
                foreach ($cols as $idx => $colName) {
                    if ($colName !== '' && ! array_key_exists($colName, $assoc)) {
                        $assoc[$colName] = $cleanRow[$idx] ?? '';
                    }
                }
            }

            $cveId = $this->extractCveIdFromCsvRow($assoc, $cleanRow, $hasHeader);
            if ($cveId === null) {
                continue;
            }

            $cvss = null;
            $sev = null;
            $pocCount = null;
            $desc = null;
            $refs = [];

            if ($hasHeader) {
                $rawCvss = $assoc['cvss'] ?? $assoc['cvss_score'] ?? $assoc['score'] ?? $assoc['cvss_v3'] ?? null;
                if (is_numeric($rawCvss)) {
                    $score = (float) $rawCvss;
                    if ($score >= 0.0 && $score <= 10.0) {
                        $cvss = round($score, 1);
                    }
                }

                $rawSev = $assoc['severity'] ?? $assoc['sev'] ?? null;
                if ($rawSev !== null && trim($rawSev) !== '') {
                    $sev = strtoupper(trim($rawSev));
                }

                $rawPocCount = $assoc['poc_count'] ?? $assoc['pocs'] ?? (isset($assoc['poc']) && is_numeric($assoc['poc']) ? $assoc['poc'] : null);
                if (is_numeric($rawPocCount)) {
                    $pocCount = (int) $rawPocCount;
                }

                $rawDesc = $assoc['description'] ?? $assoc['summary'] ?? $assoc['desc'] ?? null;
                if ($rawDesc !== null && trim($rawDesc) !== '') {
                    $desc = trim($rawDesc);
                } elseif (! empty($assoc['title'])) {
                    $candidateTitle = trim($assoc['title']);
                    if (
                        ! preg_match('/^CVE-\d{4}-\d+$/i', $candidateTitle)
                        && ! preg_match('/^\[CVE-\d{4}-\d+\]\(/i', $candidateTitle)
                        && ! preg_match('/^https?:\/\//i', $candidateTitle)
                        && ! preg_match('/\.md$/i', $candidateTitle)
                    ) {
                        $desc = $candidateTitle;
                    }
                }

                $refCols = [
                    'references', 'reference', 'url', 'link', 'path', 'file', 'file_path',
                    'filepath', 'markdown', 'markdown_path', 'md', 'poc', 'github',
                    'cve_path', 'cve_url', 'github_url', 'advisory_url',
                ];
                foreach ($refCols as $refKey) {
                    if (! empty($assoc[$refKey])) {
                        $refs = array_merge($refs, $this->extractCsvReferences($assoc[$refKey]));
                    }
                }
                foreach ($cleanRow as $cell) {
                    if (
                        $cell !== ''
                        && (str_contains($cell, 'http://') || str_contains($cell, 'https://') || stripos($cell, '.md') !== false)
                    ) {
                        $refs = array_merge($refs, $this->extractCsvReferences($cell));
                    }
                }
            } else {
                foreach ($cleanRow as $cell) {
                    if ($cell === '') {
                        continue;
                    }
                    $cellRefs = $this->extractCsvReferences($cell);
                    if (! empty($cellRefs)) {
                        $refs = array_merge($refs, $cellRefs);
                        continue;
                    }
                    if ($cvss === null && preg_match('/^(?:10(?:\.0)?|[0-9]\.\d)$/', $cell)) {
                        $cvss = round((float) $cell, 1);
                        continue;
                    }
                    $upperCell = strtoupper($cell);
                    if ($sev === null && in_array($upperCell, CveArticle::SEVERITIES, true)) {
                        $sev = $upperCell;
                        continue;
                    }
                    if (
                        $desc === null
                        && ! preg_match('/^CVE-\d{4}-\d+$/i', $cell)
                        && ! is_numeric($cell)
                        && str_contains($cell, ' ')
                    ) {
                        $desc = $cell;
                    }
                }
            }

            $refs = array_values(array_unique($refs));

            if (isset($map[$cveId])) {
                $map[$cveId]['cvss'] ??= $cvss;
                $map[$cveId]['severity'] ??= $sev;
                $map[$cveId]['poc_count'] ??= $pocCount;
                $map[$cveId]['description'] ??= $desc;
                $map[$cveId]['references'] = array_values(array_unique(array_merge($map[$cveId]['references'], $refs)));
            } else {
                $map[$cveId] = [
                    'cvss' => $cvss,
                    'severity' => $sev,
                    'poc_count' => $pocCount,
                    'description' => $desc,
                    'references' => $refs,
                ];
            }
        }

        return $map;
    }

    /**
     * @param  resource  $handle
     * @return list<string|null>|null
     */
    private function readNextNonEmptyCsvRow($handle): ?array
    {
        while (($row = fgetcsv($handle, 0, ',', '"', '\\')) !== false) {
            if (! is_array($row) || empty($row) || $row === [null]) {
                continue;
            }
            $hasContent = false;
            foreach ($row as $cell) {
                if (trim((string) $cell) !== '') {
                    $hasContent = true;
                    break;
                }
            }
            if ($hasContent) {
                return $row;
            }
        }

        return null;
    }

    /**
     * @param  list<string>  $row
     */
    private function csvRowContainsCveId(array $row): bool
    {
        foreach ($row as $cell) {
            if (preg_match('/CVE-\d{4}-\d+/i', $cell)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param  array<string, string>  $assoc
     * @param  list<string>  $cleanRow
     */
    private function extractCveIdFromCsvRow(array $assoc, array $cleanRow, bool $hasHeader): ?string
    {
        if ($hasHeader) {
            $priorityKeys = [
                'cve', 'cve_id', 'id', 'path', 'file', 'file_path', 'filepath',
                'markdown', 'markdown_path', 'md', 'cve_path', 'url', 'link',
                'cve_url', 'github_url', 'advisory_url', 'title', 'name',
            ];
            foreach ($priorityKeys as $key) {
                if (! empty($assoc[$key]) && preg_match('/CVE-\d{4}-\d+/i', $assoc[$key], $m)) {
                    return strtoupper($m[0]);
                }
            }
        }

        foreach ($cleanRow as $cell) {
            if ($cell !== '' && preg_match('/CVE-\d{4}-\d+/i', $cell, $m)) {
                return strtoupper($m[0]);
            }
        }

        return null;
    }

    /**
     * @return list<string>
     */
    private function extractCsvReferences(string $rawValue): array
    {
        $refs = [];
        if (preg_match_all('/https?:\/\/[^\s,;"\'\)\]>]+/i', $rawValue, $rm)) {
            $refs = array_merge($refs, $rm[0]);
        }

        $normalized = str_replace('\\', '/', trim($rawValue));
        if (preg_match_all('/(?:^|[\s(\["\'=,;])(?:\.\/|\/)?(?:trickest\/cve\/blob\/main\/)?(\d{4}\/(CVE-\d{4}-\d+)\.md)(?=$|[\s)\]"\\\',;])/i', $normalized, $pmList, PREG_SET_ORDER)) {
            foreach ($pmList as $pm) {
                $year = substr($pm[1], 0, 4);
                $refs[] = 'https://github.com/trickest/cve/blob/main/'.$year.'/'.strtoupper($pm[2]).'.md';
            }
        }

        return array_values(array_unique($refs));
    }

    /**
     * @param  array<string, array{cvss: ?float, severity: ?string, poc_count: ?int, description: ?string, references: list<string>}>  $hotMap
     * @param  list<string>  $categoryIds
     * @param  array<string, string>  $firstLabByCat
     * @return array<string, mixed>|null
     */
    public function parseMarkdownFile(
        string $filePath,
        array $hotMap,
        array $categoryIds,
        array $firstLabByCat
    ): ?array {
        $raw = @file_get_contents($filePath);
        if (! is_string($raw) || trim($raw) === '') {
            return null;
        }

        $filenameBase = strtoupper(pathinfo($filePath, PATHINFO_FILENAME));
        if (! preg_match('/CVE-(\d{4})-(\d+)/i', $filenameBase, $idMatch)) {
            if (! preg_match('/CVE-(\d{4})-(\d+)/i', $raw, $idMatch)) {
                return null;
            }
        }
        $cveId = strtoupper($idMatch[0]);
        $cveYear = (int) $idMatch[1];

        $product = $this->extractShieldsBadge($raw, 'Product');
        $versions = $this->extractShieldsBadges($raw, 'Version');
        $version = implode('; ', $versions);
        $vulnerability = $this->extractShieldsBadge($raw, 'Vulnerability');
        $badgeCvss = $this->extractShieldsBadge($raw, 'CVSS');
        $badgeSeverity = $this->extractShieldsBadge($raw, 'Severity');
        if ($badgeSeverity === '' && preg_match('/img\.shields\.io\/badge\/Severity-([a-z]+)-/i', $raw, $sevBadgeMatch)) {
            $badgeSeverity = strtoupper($sevBadgeMatch[1]);
        }

        $description = $this->extractMarkdownSection($raw, 'Description');
        if ($description === '' && ! empty($hotMap[$cveId]['description'])) {
            $description = (string) $hotMap[$cveId]['description'];
        }
        if ($description === '') {
            // Fallback: strip badge lines and headings
            $cleanLines = array_filter(explode("\n", $raw), static function (string $line): bool {
                $t = trim($line);

                return $t !== '' && ! str_starts_with($t, '![') && ! str_starts_with($t, '#') && ! str_starts_with($t, '- http');
            });
            $description = trim(implode("\n", array_slice($cleanLines, 0, 6)));
        }

        $pocSection = $this->extractMarkdownSection($raw, 'POC');
        preg_match_all('/https?:\/\/[^\s\)\]>"]+/i', $raw, $urlMatches);
        $refs = array_values(array_unique(array_filter(array_map(
            fn (string $u): string => $this->sanitizeUtf8($u),
            array_merge($urlMatches[0] ?? [], $hotMap[$cveId]['references'] ?? [])
        ), static fn (string $u): bool => $u !== '' && ! str_contains($u, 'img.shields.io'))));

        $affectedParts = array_values(array_filter([$product, $version ? "({$version})" : '']));
        $affectedProduct = trim(implode(' ', $affectedParts));
        if ($affectedProduct === '') {
            $affectedProduct = 'See CVE advisory details';
        }

        if ($product !== '' && $vulnerability !== '') {
            $titleDesc = "{$product} — {$vulnerability}";
        } else {
            $titleDesc = $vulnerability ?: ($product ? "{$product} Security Vulnerability" : 'Security Vulnerability Advisory');
        }
        $title = $this->sanitizeUtf8(mb_substr("{$cveId}: {$titleDesc}", 0, 490));
        if (mb_strlen($title) < 20 && $description !== '') {
            $snippet = trim((string) preg_replace('/\s+/', ' ', mb_substr($description, 0, 120)));
            $title = $this->sanitizeUtf8(mb_substr("{$cveId}: {$snippet}", 0, 490));
        }

        $combinedText = implode("\n", [$cveId, $title, $affectedProduct, $vulnerability, $description, $pocSection]);
        $csvCvss = $hotMap[$cveId]['cvss'] ?? (is_numeric($badgeCvss) ? (float) $badgeCvss : null);
        $csvSev = $hotMap[$cveId]['severity'] ?? ($badgeSeverity !== '' ? strtoupper($badgeSeverity) : null);
        [$cvssScore, $severity] = $this->inferSeverityAndCvss($combinedText, $csvCvss, $csvSev);

        [$categoryId, $labId] = $this->inferCategoryAndLab($combinedText, $categoryIds, $firstLabByCat);

        $summary = $description !== ''
            ? $this->sanitizeUtf8(mb_substr(trim((string) preg_replace('/\s+/', ' ', $description)), 0, 1000))
            : "Public vulnerability entry imported from trickest/cve for {$cveId}.";

        $techAnalysis = $description !== ''
            ? $this->sanitizeUtf8($description.($vulnerability ? "\n\nVulnerability Classification: {$vulnerability}" : ''))
            : "Technical metadata imported from trickest/cve ({$cveId}).";

        $pocBody = $pocSection !== ''
            ? $this->truncatePocContent($this->sanitizeUtf8($pocSection))
            : (! empty($refs) ? "Collected PoC / Reference Links:\n- ".implode("\n- ", array_slice($refs, 0, 15)) : 'No public PoC repository indexed yet.');

        $mitigation = $this->sanitizeUtf8($this->defaultMitigationForCategory($categoryId, $affectedProduct));

        return [
            'cve_id' => mb_substr($cveId, 0, 32),
            'slug' => mb_substr(strtolower($cveId), 0, 191),
            'cve_year' => $cveYear,
            'category_id' => $categoryId,
            'lab_id' => $labId,
            'title' => $title,
            'cvss_score' => $cvssScore,
            'severity' => $severity,
            'affected_product' => $this->sanitizeUtf8(mb_substr($affectedProduct, 0, 490)),
            'summary' => $summary,
            'technical_analysis' => $techAnalysis,
            'poc_content' => $pocBody,
            'mitigation' => $mitigation,
            'references_json' => array_slice($refs, 0, 25),
            'source_repo' => 'trickest/cve',
            'is_hot' => isset($hotMap[$cveId]),
            'status' => 'published',
        ];
    }

    private function extractShieldsBadge(string $markdown, string $label): string
    {
        $badges = $this->extractShieldsBadges($markdown, $label);

        return $badges[0] ?? '';
    }

    /**
     * @return list<string>
     */
    private function extractShieldsBadges(string $markdown, string $label): array
    {
        $pattern = '/img\.shields\.io\/static\/v1\?[^)\s]*label='.preg_quote($label, '/').'&message=([^&\)\s]+)/i';
        if (! preg_match_all($pattern, $markdown, $matches)) {
            return [];
        }

        $out = [];
        foreach ($matches[1] as $rawVal) {
            $decoded = urldecode(str_replace(['--', '_'], ['-', ' '], $rawVal));
            $decoded = trim($decoded);
            if ($decoded !== '' && strcasecmp($decoded, 'n/a') !== 0) {
                $out[] = $decoded;
            }
        }

        return array_values(array_unique($out));
    }

    private function truncatePocContent(string $pocBody, int $maxLines = 30, int $maxChars = 4000): string
    {
        $lines = preg_split('/\R/', trim($pocBody)) ?: [];
        $truncated = false;
        if (count($lines) > $maxLines) {
            $lines = array_slice($lines, 0, $maxLines);
            $truncated = true;
        }

        $joined = implode("\n", $lines);
        if (mb_strlen($joined) > $maxChars) {
            $joined = rtrim(mb_substr($joined, 0, $maxChars));
            $truncated = true;
        }

        if ($truncated) {
            $joined .= "\n... (truncated — see References for full link list)";
        }

        return $joined;
    }

    private function deleteDirectory(string $dir): void
    {
        if (! is_dir($dir)) {
            return;
        }

        $it = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );
        foreach ($it as $item) {
            if ($item->isDir()) {
                @rmdir($item->getPathname());
            } else {
                @chmod($item->getPathname(), 0666);
                @unlink($item->getPathname());
            }
        }
        @rmdir($dir);
    }

    private function extractMarkdownSection(string $markdown, string $heading): string
    {
        $pattern = '/^#{2,4}\s+'.preg_quote($heading, '/').'\s*\R([\s\S]*?)(?=^#{1,3}\s+|\z)/im';
        if (preg_match($pattern, $markdown, $m)) {
            return trim($m[1]);
        }

        return '';
    }

    /**
     * @return array{0: ?float, 1: string}
     */
    private function inferSeverityAndCvss(string $text, ?float $explicitCvss, ?string $explicitSeverity): array
    {
        $cvss = ($explicitCvss !== null && $explicitCvss >= 0.0 && $explicitCvss <= 10.0)
            ? round($explicitCvss, 1)
            : null;
        if ($cvss === null && preg_match('/\bCVSS(?:\s+v?[34](?:\.\d)?)?(?:\s*score)?[:\s]+(\d{1,2}\.\d)\b/i', $text, $m)) {
            $val = (float) $m[1];
            if ($val >= 0.0 && $val <= 10.0) {
                $cvss = $val;
            }
        }

        $sev = $explicitSeverity && in_array($explicitSeverity, CveArticle::SEVERITIES, true)
            ? $explicitSeverity
            : null;

        if ($sev === null && $cvss !== null) {
            $sev = match (true) {
                $cvss >= 9.0 => 'CRITICAL',
                $cvss >= 7.0 => 'HIGH',
                $cvss >= 4.0 => 'MEDIUM',
                $cvss > 0.0 => 'LOW',
                default => 'INFO',
            };
        }

        if ($sev === null) {
            if (preg_match('/\b(remote code execution|unauthenticated rce|pre-auth|authentication bypass|command injection)\b/i', $text)) {
                $sev = 'CRITICAL';
                $cvss ??= 9.5;
            } elseif (preg_match('/\b(sql injection|ssrf|xxe|deserialization|arbitrary file|privilege escalation|path traversal|directory traversal)\b/i', $text)) {
                $sev = 'HIGH';
                $cvss ??= 8.1;
            } elseif (preg_match('/\b(xss|cross-site scripting|csrf|cors|open redirect|information disclosure)\b/i', $text)) {
                $sev = 'MEDIUM';
                $cvss ??= 6.1;
            } else {
                $sev = 'MEDIUM';
                $cvss ??= 5.5;
            }
        }

        if ($cvss === null) {
            $cvss = match ($sev) {
                'CRITICAL' => 9.4,
                'HIGH' => 7.8,
                'MEDIUM' => 5.5,
                'LOW' => 3.1,
                default => 0.0,
            };
        }

        return [round($cvss, 1), $sev];
    }

    /**
     * @param  list<string>  $categoryIds
     * @param  array<string, string>  $firstLabByCat
     * @return array{0: ?string, 1: ?string}
     */
    private function inferCategoryAndLab(string $text, array $categoryIds, array $firstLabByCat): array
    {
        $rules = [
            'sql-injection' => '/\bsql\s+injection|\bsqli\b|\bcwe-89\b/i',
            'nosql-injection' => '/\bnosql\b|mongodb\s+injection|\bcwe-943\b/i',
            'cross-site-scripting' => '/\bcross-site\s+scripting|\bxss\b|\bcwe-79\b/i',
            'cross-site-request-forgery-csrf' => '/\bcross-site\s+request\s+forgery|\bcsrf\b|\bcwe-352\b/i',
            'server-side-request-forgery-ssrf' => '/\bserver-side\s+request\s+forgery|\bssrf\b|\bcwe-918\b/i',
            'xml-external-entity-xxe-injection' => '/\bxml\s+external\s+entity|\bxxe\b|\bcwe-611\b/i',
            'os-command-injection' => '/\bcommand\s+injection|\bos\s+command|\bremote\s+code\s+execution|\brce\b|\bcwe-78\b|\bcwe-77\b/i',
            'path-traversal' => '/\bpath\s+traversal|\bdirectory\s+traversal|\barbitrary\s+file\s+read|\bcwe-22\b/i',
            'server-side-template-injection' => '/\btemplate\s+injection|\bssti\b|\bcwe-1336\b|\bcwe-94\b/i',
            'insecure-deserialization' => '/\bdeserialization|\bunserialize\b|objectinputstream|\bcwe-502\b/i',
            'file-upload-vulnerabilities' => '/\bfile\s+upload|\barbitrary\s+file\s+upload|\bwebshell\b|\bcwe-434\b/i',
            'authentication' => '/\bauthentication\s+bypass|\bauth\s+bypass|\b2fa\b|\bmfa\b|\bcwe-287\b|\bcwe-306\b/i',
            'oauth-authentication' => '/\boauth\b/i',
            'jwt' => '/\bjwt\b|json\s+web\s+token|\bcwe-347\b/i',
            'access-control-vulnerabilities' => '/\baccess\s+control|\bauthorization\s+bypass|\bimproper\s+authorization|\bidor\b|\bprivilege\s+escalation|\bcwe-284\b|\bcwe-285\b|\bcwe-639\b|\bcwe-862\b|\bcwe-863\b/i',
            'information-disclosure' => '/\binformation\s+disclosure|\bsensitive\s+data\s+exposure|\bcwe-200\b/i',
            'prototype-pollution' => '/\bprototype\s+pollution|\bcwe-1321\b/i',
            'graphql-api-vulnerabilities' => '/\bgraphql\b/i',
            'race-conditions' => '/\brace\s+condition|\btoctou\b|\bcwe-362\b/i',
            'cross-origin-resource-sharing-cors' => '/\bcors\b|cross-origin\s+resource\s+sharing|\bcwe-942\b/i',
            'clickjacking' => '/\bclickjacking|\bui\s+redressing|\bcwe-1021\b/i',
            'http-request-smuggling' => '/\brequest\s+smuggling|\bdesync\b|\bcwe-444\b/i',
            'http-host-header-attacks' => '/\bhost\s+header/i',
            'web-cache-poisoning' => '/\bcache\s+poisoning/i',
            'web-cache-deception' => '/\bcache\s+deception/i',
            'web-llm-attacks' => '/\bprompt\s+injection|\bllm\b/i',
            'websockets' => '/\bwebsocket/i',
            'business-logic-vulnerabilities' => '/\bbusiness\s+logic|\bcwe-840\b/i',
            'api-testing' => '/\bapi\s+vulnerability|\bmass\s+assignment|\bcwe-915\b/i',
            'dom-based-vulnerabilities' => '/\bdom-based|\bdom\s+clobbering/i',
        ];

        foreach ($rules as $catId => $pattern) {
            if (in_array($catId, $categoryIds, true) && preg_match($pattern, $text)) {
                return [$catId, $firstLabByCat[$catId] ?? null];
            }
        }

        return [null, null];
    }

    private function defaultMitigationForCategory(?string $categoryId, string $product): string
    {
        $base = "Apply vendor security patches for {$product} immediately. ";

        return match ($categoryId) {
            'sql-injection', 'nosql-injection' => $base.'Use parameterized queries / prepared statements and strict schema validation.',
            'cross-site-scripting', 'dom-based-vulnerabilities' => $base.'Enforce context-aware output encoding and deploy a strict Content-Security-Policy (CSP).',
            'os-command-injection' => $base.'Avoid shell command invocation with user-controlled strings; use safe native APIs and strict allowlists.',
            'path-traversal', 'file-upload-vulnerabilities' => $base.'Canonicalize file paths against a fixed allowlist root, validate file magic bytes, and store uploads outside executable directories.',
            'server-side-request-forgery-ssrf' => $base.'Enforce egress allowlists, disable unneeded URL schemes, and block access to loopback/metadata IPs.',
            'authentication', 'access-control-vulnerabilities', 'jwt', 'oauth-authentication' => $base.'Enforce server-side authorization checks on every route/object and validate tokens/signatures strictly.',
            'insecure-deserialization' => $base.'Avoid deserializing untrusted payloads; use safe JSON schemas with strict type constraints.',
            default => $base.'Restrict untrusted network exposure, enforce least privilege, and monitor security advisories for updates.',
        };
    }

    /**
     * @param  list<int|string>  $years
     * @return list<int>
     */
    private function normalizeYears(array $years): array
    {
        $clean = [];
        foreach ($years as $y) {
            $int = (int) trim((string) $y);
            if ($int >= 1999 && $int <= 2035) {
                $clean[] = $int;
            }
        }

        $clean = array_values(array_unique($clean));

        return empty($clean) ? self::DEFAULT_YEARS : $clean;
    }

    private function sanitizeUtf8(string $value): string
    {
        if ($value === '') {
            return '';
        }

        $converted = @mb_convert_encoding($value, 'UTF-8', 'UTF-8');

        return is_string($converted) ? $converted : $value;
    }
}
