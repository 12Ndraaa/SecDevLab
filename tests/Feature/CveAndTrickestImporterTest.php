<?php

namespace Tests\Feature;

use App\Models\CveArticle;
use App\Models\User;
use App\Services\TrickestCveImporter;
use App\Services\WidgetRenderer;
use Database\Seeders\CatalogSeeder;
use Database\Seeders\CveSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CveAndTrickestImporterTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        WidgetRenderer::clearRuntimeCache();
        $this->seed([UserSeeder::class, CatalogSeeder::class, CveSeeder::class]);
    }

    public function test_public_cve_encyclopedia_renders_articles_filters_and_related_labs(): void
    {
        $res = $this->get('/cve');
        $res->assertOk();
        $html = $res->getContent();
        $this->assertStringContainsString('CVE-2025-29927', $html);
        $this->assertStringContainsString('CVE-2024-4577', $html);
        $this->assertStringNotContainsString('<script', strtolower($html));

        // Filter by year=2025 & hot=1
        $filtered = $this->get('/cve?year=2025&hot=1')->assertOk()->getContent();
        $this->assertStringContainsString('CVE-2025-29927', $filtered);
        $this->assertStringNotContainsString('CVE-2024-4577', $filtered);

        // Detail page links to category & practice lab
        $detail = $this->get('/cve/cve-2025-29927')->assertOk()->getContent();
        $this->assertStringContainsString('Next.js Middleware Authorization Bypass', $detail);
        $this->assertStringContainsString('/academy/labs/launch/', $detail);
        $this->assertStringNotContainsString('<script', strtolower($detail));

        // Ensure synthetic placeholder CVE-2026-10001 is absent and curated CVEs carry NVD-accurate categories & facts
        $this->assertDatabaseMissing('cve_articles', ['cve_id' => 'CVE-2026-10001']);
        $this->assertDatabaseHas('cve_articles', [
            'cve_id' => 'CVE-2024-8309',
            'category_id' => 'web-llm-attacks',
        ]);
        $this->assertDatabaseHas('cve_articles', [
            'cve_id' => 'CVE-2024-45519',
            'category_id' => 'os-command-injection',
            'cvss_score' => 9.8,
        ]);
        $this->assertDatabaseHas('cve_articles', [
            'cve_id' => 'CVE-2024-28995',
            'category_id' => 'path-traversal',
        ]);
        $this->assertDatabaseHas('cve_articles', [
            'cve_id' => 'CVE-2025-64459',
            'category_id' => 'sql-injection',
        ]);
        $this->assertDatabaseHas('cve_articles', [
            'cve_id' => 'CVE-2024-20362',
            'category_id' => 'cross-site-scripting',
        ]);
        $this->assertDatabaseHas('cve_articles', [
            'cve_id' => 'CVE-2024-34351',
            'category_id' => 'server-side-request-forgery-ssrf',
        ]);
    }

    public function test_cve_seeder_cleans_up_legacy_placeholder_entry_on_reseed(): void
    {
        CveArticle::create([
            'cve_id' => 'CVE-2026-10001',
            'slug' => 'cve-2026-10001',
            'cve_year' => 2026,
            'title' => 'Synthetic Placeholder Entry',
            'severity' => 'HIGH',
            'status' => 'published',
        ]);

        $this->seed(CveSeeder::class);

        $this->assertDatabaseMissing('cve_articles', ['cve_id' => 'CVE-2026-10001']);
        $this->assertDatabaseHas('cve_articles', ['cve_id' => 'CVE-2024-8309']);
    }

    public function test_draft_cve_is_hidden_from_guests_and_users_but_visible_to_owner(): void
    {
        $draft = CveArticle::create([
            'cve_id' => 'CVE-2026-99999',
            'slug' => 'cve-2026-99999',
            'cve_year' => 2026,
            'category_id' => null,
            'lab_id' => null,
            'title' => 'Internal Draft Advisory',
            'cvss_score' => 6.5,
            'severity' => 'MEDIUM',
            'affected_product' => 'Draft App 1.0',
            'summary' => 'Hidden draft.',
            'status' => 'draft',
        ]);

        $this->get('/cve')->assertDontSee('CVE-2026-99999');
        $this->get("/cve/{$draft->slug}")->assertNotFound();

        $learner = User::where('role', User::ROLE_USER)->firstOrFail();
        $this->actingAs($learner)->get("/cve/{$draft->slug}")->assertNotFound();

        $owner = User::where('role', User::ROLE_OWNER)->firstOrFail();
        $this->actingAs($owner)->get('/cve')->assertSee('CVE-2026-99999');
        $this->actingAs($owner)->get("/cve/{$draft->slug}")->assertOk()->assertSee('Internal Draft Advisory');
    }

    public function test_trickest_cve_importer_parses_years_hot_csv_badges_and_auto_links_categories(): void
    {
        $tmpDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'trickest_fixture_'.uniqid();
        @mkdir($tmpDir.DIRECTORY_SEPARATOR.'2024', 0775, true);
        @mkdir($tmpDir.DIRECTORY_SEPARATOR.'2025', 0775, true);
        @mkdir($tmpDir.DIRECTORY_SEPARATOR.'2026', 0775, true);

        file_put_contents(
            $tmpDir.DIRECTORY_SEPARATOR.'hot_cves.csv',
            "\xEF\xBB\xBFcve,cvss,severity,poc_count\nCVE-2025-88001,9.8,CRITICAL,12\n"
        );

        file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2024'.DIRECTORY_SEPARATOR.'CVE-2024-99001.md', <<<'MD'
### [CVE-2024-99001](https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2024-99001)

![](https://img.shields.io/static/v1?label=Product&message=Acme_Portal&color=blue)
![](https://img.shields.io/static/v1?label=Version&message=1.2.3&color=blue)
![](https://img.shields.io/static/v1?label=Vulnerability&message=SQL_Injection&color=blue)

### Description

A SQL injection vulnerability in Acme Portal allows unauthenticated attackers to dump user credentials.

### POC

#### Reference
- https://github.com/example/cve-2024-99001-poc
MD);

        file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2025'.DIRECTORY_SEPARATOR.'CVE-2025-88001.md', <<<'MD'
### [CVE-2025-88001](https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2025-88001)

![](https://img.shields.io/static/v1?label=Product&message=EdgeGateway&color=blue)
![](https://img.shields.io/static/v1?label=Version&message=4.0&color=blue)
![](https://img.shields.io/static/v1?label=Vulnerability&message=SSRF&color=blue)

### Description

Server-side request forgery (SSRF) in EdgeGateway webhook fetcher exposes cloud metadata endpoints.

### POC

- https://github.com/example/edge-ssrf-poc
MD);

        file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2026'.DIRECTORY_SEPARATOR.'CVE-2026-77001.md', <<<'MD'
### [CVE-2026-77001](https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2026-77001)

![](https://img.shields.io/static/v1?label=Product&message=KernelDriver&color=blue)
![](https://img.shields.io/static/v1?label=Version&message=0.9&color=blue)

### Description

Integer underflow in local kernel IOCTL handler causes denial of service.
MD);

        file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2026'.DIRECTORY_SEPARATOR.'CVE-2026-88002.md', <<<'MD'
### [CVE-2026-88002](https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2026-88002)

![](https://img.shields.io/static/v1?label=Product&message=GatewayApp&color=blue)
![](https://img.shields.io/static/v1?label=Vulnerability&message=CWE-78&color=blue)

### Description

Improper input neutralization allows CWE-78 execution on the host appliance.
MD);

        try {
            $this->artisan('cve:sync-trickest', [
                '--years' => '2024,2025,2026',
                '--limit' => 50,
                '--no-clone' => true,
                '--path' => $tmpDir,
            ])->assertExitCode(0);

            $sqliCve = CveArticle::where('cve_id', 'CVE-2024-99001')->firstOrFail();
            $this->assertSame(2024, $sqliCve->cve_year);
            $this->assertSame('sql-injection', $sqliCve->category_id);
            $this->assertNotNull($sqliCve->lab_id);
            $this->assertSame('Acme Portal (1.2.3)', $sqliCve->affected_product);
            $this->assertStringContainsString('Acme Portal', $sqliCve->title);
            $this->assertFalse($sqliCve->is_hot);

            $hotSsrf = CveArticle::where('cve_id', 'CVE-2025-88001')->firstOrFail();
            $this->assertTrue($hotSsrf->is_hot);
            $this->assertSame(9.8, $hotSsrf->cvss_score);
            $this->assertSame('CRITICAL', $hotSsrf->severity);
            $this->assertSame('server-side-request-forgery-ssrf', $hotSsrf->category_id);

            $cweCmd = CveArticle::where('cve_id', 'CVE-2026-88002')->firstOrFail();
            $this->assertSame('os-command-injection', $cweCmd->category_id);
            $this->assertNotNull($cweCmd->lab_id);

            $uncat = CveArticle::where('cve_id', 'CVE-2026-77001')->firstOrFail();
            $this->assertNull($uncat->category_id);
            $this->assertNull($uncat->lab_id);

            // Re-run idempotently -> updates without creating duplicates
            $importer = app(TrickestCveImporter::class);
            $secondRun = $importer->importFromDirectory($tmpDir, [2024, 2025, 2026], 50);
            $this->assertTrue($secondRun['ok']);
            $this->assertSame(0, $secondRun['imported']);
            $this->assertSame(4, $secondRun['updated']);
        } finally {
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'hot_cves.csv');
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2024'.DIRECTORY_SEPARATOR.'CVE-2024-99001.md');
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2025'.DIRECTORY_SEPARATOR.'CVE-2025-88001.md');
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2026'.DIRECTORY_SEPARATOR.'CVE-2026-77001.md');
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2026'.DIRECTORY_SEPARATOR.'CVE-2026-88002.md');
            @rmdir($tmpDir.DIRECTORY_SEPARATOR.'2024');
            @rmdir($tmpDir.DIRECTORY_SEPARATOR.'2025');
            @rmdir($tmpDir.DIRECTORY_SEPARATOR.'2026');
            @rmdir($tmpDir);
        }
    }

    public function test_parse_hot_cves_csv_handles_headerless_and_url_or_path_columns_defensively(): void
    {
        $importer = app(TrickestCveImporter::class);
        $tmpDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'trickest_csv_edge_'.uniqid();
        @mkdir($tmpDir.DIRECTORY_SEPARATOR.'2024', 0775, true);
        @mkdir($tmpDir.DIRECTORY_SEPARATOR.'2025', 0775, true);

        $headerlessCsv = $tmpDir.DIRECTORY_SEPARATOR.'hot_cves.csv';
        $titleUrlCsv = $tmpDir.DIRECTORY_SEPARATOR.'hot_title_url.csv';
        $pathOnlyCsv = $tmpDir.DIRECTORY_SEPARATOR.'hot_path_only.csv';
        $emptyCsv = $tmpDir.DIRECTORY_SEPARATOR.'hot_empty.csv';

        try {
            // 1. Headerless CSV starting directly with BOM + CVE-YYYY-NNNN (first row must NOT be dropped)
            file_put_contents(
                $headerlessCsv,
                "\xEF\xBB\xBFCVE-2024-99002,2024/CVE-2024-99002.md\nCVE-2025-88002,https://github.com/trickest/cve/blob/main/2025/CVE-2025-88002.md,9.1,CRITICAL\n"
            );
            $headerlessMap = $importer->parseHotCvesCsv($headerlessCsv);
            $this->assertArrayHasKey('CVE-2024-99002', $headerlessMap);
            $this->assertArrayHasKey('CVE-2025-88002', $headerlessMap);
            $this->assertContains(
                'https://github.com/trickest/cve/blob/main/2024/CVE-2024-99002.md',
                $headerlessMap['CVE-2024-99002']['references']
            );
            $this->assertSame(9.1, $headerlessMap['CVE-2025-88002']['cvss']);
            $this->assertSame('CRITICAL', $headerlessMap['CVE-2025-88002']['severity']);

            // Verify importFromDirectory honors headerless hot_cves.csv including row 1
            file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2024'.DIRECTORY_SEPARATOR.'CVE-2024-99002.md', "### Description\nXSS test advisory.\n");
            file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2025'.DIRECTORY_SEPARATOR.'CVE-2025-88002.md', "### Description\nSQL injection test advisory.\n");
            $res = $importer->importFromDirectory($tmpDir, [2024, 2025], 50, true);
            $this->assertTrue($res['ok']);
            $this->assertSame(2, $res['hot_matched']);
            $this->assertTrue(CveArticle::where('cve_id', 'CVE-2024-99002')->firstOrFail()->is_hot);
            $this->assertTrue(CveArticle::where('cve_id', 'CVE-2025-88002')->firstOrFail()->is_hot);

            // 2. Upstream Title,URL header format (CVE ID lives inside URL/path column) + duplicate row merging
            file_put_contents(
                $titleUrlCsv,
                "\nTitle,URL\nAcme SQLi Bypass,2024/CVE-2024-99002.md\nAcme SQLi Bypass (CVE-2024-99002),https://github.com/example/poc-2\nCVE-2025-88002,/trickest/cve/blob/main/2025/CVE-2025-88002.md\n"
            );
            $titleUrlMap = $importer->parseHotCvesCsv($titleUrlCsv);
            $this->assertArrayHasKey('CVE-2024-99002', $titleUrlMap);
            $this->assertArrayHasKey('CVE-2025-88002', $titleUrlMap);
            $this->assertSame('Acme SQLi Bypass', $titleUrlMap['CVE-2024-99002']['description']);
            $this->assertNull($titleUrlMap['CVE-2025-88002']['description']);
            $this->assertSame([
                'https://github.com/trickest/cve/blob/main/2024/CVE-2024-99002.md',
                'https://github.com/example/poc-2',
            ], $titleUrlMap['CVE-2024-99002']['references']);

            // 3. Single path column header + spaced headers & markdown links
            file_put_contents($pathOnlyCsv, "path\n./2024/CVE-2024-99002.md\n");
            $pathMap = $importer->parseHotCvesCsv($pathOnlyCsv);
            $this->assertArrayHasKey('CVE-2024-99002', $pathMap);
            $this->assertSame(
                ['https://github.com/trickest/cve/blob/main/2024/CVE-2024-99002.md'],
                $pathMap['CVE-2024-99002']['references']
            );

            $spacedCsv = $tmpDir.DIRECTORY_SEPARATOR.'hot_spaced.csv';
            file_put_contents(
                $spacedCsv,
                "CVE ID,CVSS Score,PoC Count,Markdown Path,Title\n"
                ."CVE-2025-88003,8.2,7,[CVE-2025-88003](2025/CVE-2025-88003.md),[CVE-2025-88003](2025/CVE-2025-88003.md)\n"
            );
            $spacedMap = $importer->parseHotCvesCsv($spacedCsv);
            $this->assertArrayHasKey('CVE-2025-88003', $spacedMap);
            $this->assertSame(8.2, $spacedMap['CVE-2025-88003']['cvss']);
            $this->assertSame(7, $spacedMap['CVE-2025-88003']['poc_count']);
            $this->assertNull($spacedMap['CVE-2025-88003']['description']);
            $this->assertContains(
                'https://github.com/trickest/cve/blob/main/2025/CVE-2025-88003.md',
                $spacedMap['CVE-2025-88003']['references']
            );

            // 4. Empty or missing CSV returns []
            file_put_contents($emptyCsv, "\n  \n");
            $this->assertSame([], $importer->parseHotCvesCsv($emptyCsv));
            $this->assertSame([], $importer->parseHotCvesCsv($tmpDir.DIRECTORY_SEPARATOR.'missing.csv'));
        } finally {
            @unlink($headerlessCsv);
            @unlink($titleUrlCsv);
            @unlink($pathOnlyCsv);
            @unlink($spacedCsv ?? '');
            @unlink($emptyCsv);
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2024'.DIRECTORY_SEPARATOR.'CVE-2024-99002.md');
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2025'.DIRECTORY_SEPARATOR.'CVE-2025-88002.md');
            @rmdir($tmpDir.DIRECTORY_SEPARATOR.'2024');
            @rmdir($tmpDir.DIRECTORY_SEPARATOR.'2025');
            @rmdir($tmpDir);
        }
    }

    public function test_importer_handles_multiple_versions_cwe285_poc_truncation_and_balanced_multi_year_upsert(): void
    {
        $importer = app(TrickestCveImporter::class);
        $tmpDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'trickest_batch_'.uniqid();
        @mkdir($tmpDir.DIRECTORY_SEPARATOR.'2024', 0775, true);
        @mkdir($tmpDir.DIRECTORY_SEPARATOR.'2025', 0775, true);
        @mkdir($tmpDir.DIRECTORY_SEPARATOR.'2026', 0775, true);

        $manyLinks = [];
        for ($i = 1; $i <= 45; $i++) {
            $manyLinks[] = "- https://github.com/example/poc-repo-{$i}";
        }
        $pocBlock = implode("\n", $manyLinks);

        file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2025'.DIRECTORY_SEPARATOR.'CVE-2025-29927.md', <<<MD
### [CVE-2025-29927](https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2025-29927)
![](https://img.shields.io/static/v1?label=Product&message=next.js&color=blue)
![](https://img.shields.io/static/v1?label=Version&message=%3E%3D%2011.1.4%2C%20%3C%2012.3.5&color=brightgreen)
![](https://img.shields.io/static/v1?label=Version&message=%3E%3D%2015.0.0%2C%20%3C%2015.2.3&color=brightgreen)
![](https://img.shields.io/static/v1?label=Vulnerability&message=CWE-285%3A%20Improper%20Authorization&color=brightgreen)

### Description

Authorization check bypass in middleware handling.

### POC

#### Github
{$pocBlock}
MD);
        file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2024'.DIRECTORY_SEPARATOR.'CVE-2024-70001.md', "### Description\nSQL injection test 2024.\n");
        file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2024'.DIRECTORY_SEPARATOR.'CVE-2024-70002.md', "### Description\nXSS test 2024.\n");
        file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2026'.DIRECTORY_SEPARATOR.'CVE-2026-70001.md', "### Description\nSSRF test 2026.\n");
        file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2026'.DIRECTORY_SEPARATOR.'CVE-2026-70002.md', "### Description\nXXE test 2026.\n");

        try {
            // Balanced limit=3 across 2024, 2025, 2026 should pull one from each year
            $balanced = $importer->importFromDirectory($tmpDir, [2024, 2025, 2026], 3);
            $this->assertTrue($balanced['ok']);
            $this->assertSame(1, $balanced['updated']); // CVE-2025-29927 already seeded
            $this->assertSame(2, $balanced['imported']); // 2026-70002 + 2024-70002

            $nextjs = CveArticle::where('cve_id', 'CVE-2025-29927')->firstOrFail();
            $this->assertSame('access-control-vulnerabilities', $nextjs->category_id);
            $this->assertStringContainsString('>= 11.1.4, < 12.3.5', (string) $nextjs->affected_product);
            $this->assertStringContainsString('>= 15.0.0, < 15.2.3', (string) $nextjs->affected_product);
            $this->assertStringContainsString('truncated', (string) $nextjs->poc_content);
            $this->assertLessThanOrEqual(4100, mb_strlen((string) $nextjs->poc_content));

            $this->assertDatabaseHas('cve_articles', ['cve_id' => 'CVE-2024-70002']);
            $this->assertDatabaseHas('cve_articles', ['cve_id' => 'CVE-2026-70002']);

            // Full import (limit=0) brings in all remaining files via chunked upsert
            $full = $importer->importFromDirectory($tmpDir, [2024, 2025, 2026], 0);
            $this->assertTrue($full['ok']);
            $this->assertSame(2, $full['imported']);
            $this->assertSame(3, $full['updated']);
            $this->assertDatabaseHas('cve_articles', ['cve_id' => 'CVE-2024-70001']);
            $this->assertDatabaseHas('cve_articles', ['cve_id' => 'CVE-2026-70001']);
        } finally {
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2025'.DIRECTORY_SEPARATOR.'CVE-2025-29927.md');
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2024'.DIRECTORY_SEPARATOR.'CVE-2024-70001.md');
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2024'.DIRECTORY_SEPARATOR.'CVE-2024-70002.md');
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2026'.DIRECTORY_SEPARATOR.'CVE-2026-70001.md');
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2026'.DIRECTORY_SEPARATOR.'CVE-2026-70002.md');
            @rmdir($tmpDir.DIRECTORY_SEPARATOR.'2024');
            @rmdir($tmpDir.DIRECTORY_SEPARATOR.'2025');
            @rmdir($tmpDir.DIRECTORY_SEPARATOR.'2026');
            @rmdir($tmpDir);
        }
    }
}
