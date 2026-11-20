<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

class WaitForDatabaseCommand extends Command
{
    protected $signature = 'db:wait
        {--connection= : Database connection name (defaults to configured default)}
        {--timeout=120 : Maximum seconds to wait for database readiness}
        {--sleep=2 : Seconds to sleep between retry attempts}';

    protected $description = 'Wait until the target database connection accepts queries';

    public function handle(): int
    {
        $connectionOption = $this->option('connection');
        $connectionName = is_string($connectionOption) && trim($connectionOption) !== ''
            ? trim($connectionOption)
            : (string) config('database.default');

        $timeout = max(1, (int) $this->option('timeout'));
        $sleepSeconds = max(0, (int) $this->option('sleep'));
        $deadline = microtime(true) + $timeout;
        $attempt = 0;

        $optionsKey = "database.connections.{$connectionName}.options";
        $originalOptions = config($optionsKey);
        $appliedProbeTimeout = false;
        if (is_array($originalOptions) && ! array_key_exists(\PDO::ATTR_TIMEOUT, $originalOptions)) {
            $probeOptions = $originalOptions;
            $probeOptions[\PDO::ATTR_TIMEOUT] = min(5, $timeout);
            config([$optionsKey => $probeOptions]);
            DB::purge($connectionName);
            $appliedProbeTimeout = true;
        }

        try {
            while (true) {
                $attempt++;
                try {
                    DB::connection($connectionName)->getPdo()->query('SELECT 1');
                    $this->info("Database connection [{$connectionName}] ready (attempt {$attempt}).");

                    return self::SUCCESS;
                } catch (Throwable $e) {
                    DB::purge($connectionName);

                    $remaining = $deadline - microtime(true);
                    if ($remaining <= 0) {
                        $this->error("Database connection [{$connectionName}] failed after {$attempt} attempts ({$timeout}s): ".$e->getMessage());

                        return self::FAILURE;
                    }

                    $this->warn("Waiting for database [{$connectionName}] (attempt {$attempt}): ".$e->getMessage());
                    if ($sleepSeconds > 0) {
                        $sleepMicros = (int) min($sleepSeconds * 1_000_000, max(0, (int) round($remaining * 1_000_000)));
                        if ($sleepMicros > 0) {
                            usleep($sleepMicros);
                        }
                    }
                }
            }
        } finally {
            if ($appliedProbeTimeout) {
                config([$optionsKey => $originalOptions]);
                DB::purge($connectionName);
            }
        }
    }
}
