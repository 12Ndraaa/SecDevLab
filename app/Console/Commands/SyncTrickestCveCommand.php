<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\TrickestCveImporter;
use Illuminate\Console\Command;

class SyncTrickestCveCommand extends Command
{
    protected $signature = 'cve:sync-trickest
        {--years=2024,2025,2026 : Comma-separated CVE years to sparse-checkout and import}
        {--limit=300 : Maximum CVE markdown entries to import (0 for unlimited)}
        {--hot-only : Only import CVEs listed in hot_cves.csv}
        {--path= : Custom local trickest/cve directory path}
        {--no-clone : Skip git clone/pull and import directly from local directory}
        {--repo=https://github.com/trickest/cve.git : Git repository URL}';

    protected $description = 'Sparse-clone selected years + hot_cves.csv from trickest/cve and import into cve_articles';

    public function handle(TrickestCveImporter $importer): int
    {
        @set_time_limit(0);

        $years = array_values(array_filter(array_map(
            static fn (string $y): int => (int) trim($y),
            explode(',', (string) $this->option('years'))
        )));
        $limit = max(0, (int) $this->option('limit'));
        $hotOnly = (bool) $this->option('hot-only');
        $customPath = $this->option('path') ? (string) $this->option('path') : null;
        $noClone = (bool) $this->option('no-clone');
        $repoUrl = (string) $this->option('repo');

        $targetDir = $customPath ?: $importer->defaultRepoPath();

        if (! $noClone) {
            $this->info('Running sparse-checkout on '.$repoUrl.' ...');
            $cloneResult = $importer->sparseCloneOrUpdate($years, $targetDir, $repoUrl);
            if (! $cloneResult['ok']) {
                $this->error($cloneResult['message']);

                return self::FAILURE;
            }
            $this->info($cloneResult['message']);
        }

        $ownerId = User::where('role', User::ROLE_OWNER)->value('id');
        $importResult = $importer->importFromDirectory($targetDir, $years, $limit, $hotOnly, $ownerId);
        if (! $importResult['ok']) {
            $this->error($importResult['message']);

            return self::FAILURE;
        }

        $this->info($importResult['message']);

        return self::SUCCESS;
    }
}
