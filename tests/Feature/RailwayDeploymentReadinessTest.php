<?php

namespace Tests\Feature;

use App\Models\CveArticle;
use App\Services\TrickestCveImporter;
use App\Services\WidgetRenderer;
use Database\Seeders\CatalogSeeder;
use Database\Seeders\CveSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Process\Process;
use Tests\TestCase;

class RailwayDeploymentReadinessTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        WidgetRenderer::clearRuntimeCache();
        $this->seed([UserSeeder::class, CatalogSeeder::class, CveSeeder::class]);
    }

    public function test_healthcheck_endpoint_returns_ok_even_with_forced_https_and_railway_host(): void
    {
        $this->get('/up')->assertOk();

        try {
            URL::forceScheme('https');

            $this->withServerVariables([
                'HTTP_HOST' => 'healthcheck.railway.app',
            ])->get('/up')->assertOk();
        } finally {
            URL::forceScheme(null);
        }
    }

    public function test_reverse_proxy_https_headers_produce_https_pagination_redirects_and_secure_cookies(): void
    {
        // Seed 2 extra published CVEs so /cve paginates (> 15 per page)
        for ($i = 1; $i <= 2; $i++) {
            CveArticle::create([
                'cve_id' => "CVE-2026-9000{$i}",
                'slug' => "cve-2026-9000{$i}",
                'cve_year' => 2026,
                'title' => "Proxy Pagination Test CVE {$i}",
                'cvss_score' => 7.5,
                'severity' => 'HIGH',
                'status' => 'published',
                'published_at' => now(),
            ]);
        }

        // Simulate Nginx listening on port 8080 behind Railway TLS edge proxy (without X-Forwarded-Port)
        $proxyHeaders = [
            'HTTP_HOST' => 'internal.railway.local',
            'SERVER_PORT' => '8080',
            'HTTP_X_FORWARDED_PROTO' => 'https',
            'HTTP_X_FORWARDED_HOST' => 'secdevlab.up.railway.app',
            'HTTP_X_FORWARDED_FOR' => '203.0.113.10',
        ];

        $cveResponse = $this->withServerVariables($proxyHeaders)->get('/cve');
        $cveResponse->assertOk();
        $html = $cveResponse->getContent();
        $this->assertStringContainsString('https://secdevlab.up.railway.app/cve?page=2', $html);
        $this->assertStringNotContainsString('http://secdevlab.up.railway.app', $html);
        $this->assertStringNotContainsString(':8080', $html);

        $cookies = $cveResponse->headers->getCookies();
        $this->assertNotEmpty($cookies);
        foreach ($cookies as $cookie) {
            $this->assertTrue($cookie->isSecure(), "Cookie {$cookie->getName()} should be marked Secure over X-Forwarded-Proto: https");
        }

        $redirectRes = $this->withServerVariables($proxyHeaders)->get('/owner');
        $redirectRes->assertStatus(302);
        $this->assertSame(
            'https://secdevlab.up.railway.app/users?returnurl=%2Fowner',
            $redirectRes->headers->get('Location')
        );

        $themeRes = $this->withServerVariables($proxyHeaders)->post('/preferences/theme', [
            'redirect_to' => '/cve',
        ]);
        $themeRes->assertStatus(302);
        $this->assertSame('https://secdevlab.up.railway.app/cve', $themeRes->headers->get('Location'));
    }

    public function test_force_scheme_https_enforces_https_urls_when_enabled(): void
    {
        try {
            URL::forceScheme('https');

            $expectedBase = preg_replace('#^http://#i', 'https://', rtrim((string) config('app.url'), '/'));
            $this->assertSame($expectedBase.'/cve', url('/cve'));

            for ($i = 1; $i <= 2; $i++) {
                CveArticle::create([
                    'cve_id' => "CVE-2026-9100{$i}",
                    'slug' => "cve-2026-9100{$i}",
                    'cve_year' => 2026,
                    'title' => "Forced HTTPS Test CVE {$i}",
                    'cvss_score' => 7.0,
                    'severity' => 'HIGH',
                    'status' => 'published',
                    'published_at' => now(),
                ]);
            }

            $html = $this->get('/cve')->assertOk()->getContent();
            $this->assertStringContainsString($expectedBase.'/cve?page=2', $html);
        } finally {
            URL::forceScheme(null);
        }
    }

    public function test_sync_trickest_only_if_count_lte_runs_at_15_and_skips_above_15(): void
    {
        $this->assertSame(15, CveArticle::count());

        $tmpDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'trickest_threshold_'.uniqid();
        @mkdir($tmpDir.DIRECTORY_SEPARATOR.'2025', 0775, true);
        file_put_contents($tmpDir.DIRECTORY_SEPARATOR.'2025'.DIRECTORY_SEPARATOR.'CVE-2025-95001.md', <<<'MD'
### [CVE-2025-95001](https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2025-95001)
![](https://img.shields.io/static/v1?label=Product&message=ThresholdApp&color=blue)
![](https://img.shields.io/static/v1?label=Vulnerability&message=SQL_Injection&color=blue)

### Description
SQL injection vulnerability in ThresholdApp.
MD);

        try {
            // Invalid thresholds (non-numeric, float, negative) fail cleanly with INVALID status
            foreach (['not-a-number', '15.5', '-1'] as $invalidThreshold) {
                $this->artisan('cve:sync-trickest', [
                    '--only-if-count-lte' => $invalidThreshold,
                ])->assertExitCode(Command::INVALID);
            }

            // Threshold 0 skips cleanly when 15 rows exist
            $this->artisan('cve:sync-trickest', [
                '--only-if-count-lte' => '0',
                '--path' => $tmpDir.DIRECTORY_SEPARATOR.'must-not-run',
            ])->assertExitCode(0);

            // At 15 rows (<= 15), sync executes and imports the fixture CVE
            $this->artisan('cve:sync-trickest', [
                '--years' => '2025',
                '--limit' => 300,
                '--no-clone' => true,
                '--path' => $tmpDir,
                '--only-if-count-lte' => '15',
            ])->assertExitCode(0);

            $this->assertSame(16, CveArticle::count());
            $this->assertDatabaseHas('cve_articles', ['cve_id' => 'CVE-2025-95001']);

            // Now count is 16 (> 15): subsequent run skips immediately without cloning or touching missing path
            $this->artisan('cve:sync-trickest', [
                '--years' => '2025',
                '--limit' => 300,
                '--path' => $tmpDir.DIRECTORY_SEPARATOR.'nonexistent-dir-must-not-be-read',
                '--only-if-count-lte' => '15',
            ])->assertExitCode(0);

            $this->assertSame(16, CveArticle::count());
        } finally {
            @unlink($tmpDir.DIRECTORY_SEPARATOR.'2025'.DIRECTORY_SEPARATOR.'CVE-2025-95001.md');
            @rmdir($tmpDir.DIRECTORY_SEPARATOR.'2025');
            @rmdir($tmpDir);
        }
    }

    public function test_trickest_sparse_clone_handles_lock_contention_and_broken_dir_recovery(): void
    {
        $importer = app(TrickestCveImporter::class);
        $baseTmp = sys_get_temp_dir().DIRECTORY_SEPARATOR.'trickest_git_test_'.uniqid();
        $cloneDir = $baseTmp.DIRECTORY_SEPARATOR.'clone';
        @mkdir($cloneDir.DIRECTORY_SEPARATOR.'.git', 0775, true);
        file_put_contents($cloneDir.DIRECTORY_SEPARATOR.'stale-file.txt', 'partial-transfer');

        $lockKey = md5(str_replace('\\', '/', rtrim($cloneDir, '/\\')));
        $lockPath = sys_get_temp_dir().DIRECTORY_SEPARATOR."secdevlab-trickest-clone-{$lockKey}.lock";

        try {
            // 1. Concurrent lock contention returns ok=false without wiping or mutating target directory
            $lockHandle = fopen($lockPath, 'c+');
            $this->assertNotFalse($lockHandle);
            $this->assertTrue(flock($lockHandle, LOCK_EX | LOCK_NB));
            try {
                $lockedRes = $importer->sparseCloneOrUpdate([2025], $cloneDir, 'http://127.0.0.1:1/nonexistent.git');
                $this->assertFalse($lockedRes['ok']);
                $this->assertStringContainsString('already in progress', $lockedRes['message']);
                $this->assertFileExists($cloneDir.DIRECTORY_SEPARATOR.'stale-file.txt');
            } finally {
                flock($lockHandle, LOCK_UN);
                fclose($lockHandle);
            }

            // 2. Broken partial directory without .git/HEAD is cleaned before attempting fresh clone
            $res = $importer->sparseCloneOrUpdate([2025], $cloneDir, 'http://127.0.0.1:1/nonexistent.git');
            $this->assertFalse($res['ok']);
            $this->assertStringNotContainsString('already exists and is not an empty directory', $res['message']);
            $this->assertFileDoesNotExist($cloneDir.DIRECTORY_SEPARATOR.'stale-file.txt');
        } finally {
            @unlink($lockPath);
            $deleteTree = static function (string $path) use (&$deleteTree): void {
                if (! is_dir($path)) {
                    return;
                }
                foreach (scandir($path) ?: [] as $entry) {
                    if ($entry === '.' || $entry === '..') {
                        continue;
                    }
                    $full = $path.DIRECTORY_SEPARATOR.$entry;
                    if (is_dir($full)) {
                        $deleteTree($full);
                    } else {
                        @chmod($full, 0666);
                        @unlink($full);
                    }
                }
                @rmdir($path);
            };
            $deleteTree($baseTmp);
        }
    }

    public function test_db_wait_command_succeeds_on_active_db_and_fails_cleanly_on_unreachable_db(): void
    {
        $this->artisan('db:wait', [
            '--timeout' => 2,
            '--sleep' => 0,
        ])->assertExitCode(0);

        config([
            'database.connections.unreachable_test_mysql' => [
                'driver' => 'mysql',
                'host' => '127.0.0.1',
                'port' => '1',
                'database' => 'nonexistent',
                'username' => 'nobody',
                'password' => 'badpass',
                'options' => [\PDO::ATTR_TIMEOUT => 1],
            ],
        ]);

        $this->artisan('db:wait', [
            '--connection' => 'unreachable_test_mysql',
            '--timeout' => 1,
            '--sleep' => 1,
        ])->assertExitCode(1);
    }

    public function test_railway_docker_and_nginx_configuration_files_are_valid(): void
    {
        $railwayJson = json_decode((string) file_get_contents(base_path('railway.json')), true, 512, JSON_THROW_ON_ERROR);
        $this->assertSame('DOCKERFILE', $railwayJson['build']['builder'] ?? null);
        $this->assertSame('/up', $railwayJson['deploy']['healthcheckPath'] ?? null);

        $dockerfile = (string) file_get_contents(base_path('Dockerfile'));
        $this->assertStringContainsString('FROM php:8.3-fpm-bookworm', $dockerfile);
        $this->assertStringContainsString('git', $dockerfile);
        $this->assertStringContainsString('pdo_mysql', $dockerfile);
        $this->assertStringContainsString('ca-certificates', $dockerfile);
        $this->assertStringContainsString('nginx', $dockerfile);

        $startSh = (string) file_get_contents(base_path('docker/start.sh'));
        $this->assertStringNotContainsString("\r", $startSh, 'docker/start.sh must use LF line endings');
        $this->assertStringContainsString('[ -s /proc/net/if_inet6 ]', $startSh);
        $this->assertStringContainsString('php artisan db:wait', $startSh);
        $this->assertStringContainsString('php artisan migrate --force', $startSh);
        $this->assertStringContainsString('php artisan db:seed --force', $startSh);
        $this->assertStringContainsString('cve:sync-trickest', $startSh);
        $this->assertStringContainsString('--years=2024,2025,2026', $startSh);
        $this->assertStringContainsString('--limit=300', $startSh);
        $this->assertStringContainsString('--only-if-count-lte=15', $startSh);

        $nginxTpl = (string) file_get_contents(base_path('docker/nginx.conf.template'));
        $this->assertStringContainsString('location = /index.php', $nginxTpl);
        $this->assertStringContainsString('try_files $uri /index.php?$query_string;', $nginxTpl);
        $this->assertStringContainsString('location ~ ^.+/$', $nginxTpl);
        $dotDenyPos = strpos($nginxTpl, 'location ~ ^/\\.(?!well-known)');
        $trailingSlashPos = strpos($nginxTpl, 'location ~ ^.+/$');
        $this->assertNotFalse($dotDenyPos);
        $this->assertNotFalse($trailingSlashPos);
        $this->assertLessThan($trailingSlashPos, $dotDenyPos, 'Dotfile deny block must precede trailing-slash regex so /.git/ and /.env/ are denied directly.');
    }

    public function test_config_resolves_railway_mysql_and_https_env_fallbacks(): void
    {
        $script = <<<'PHP'
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->useEnvironmentPath(base_path('docker'));
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
echo json_encode([
    'app_url' => config('app.url'),
    'force_https' => config('app.force_https'),
    'generated_url' => url('/cve'),
    'db_default' => config('database.default'),
    'mysql' => [
        'url' => config('database.connections.mysql.url'),
        'host' => config('database.connections.mysql.host'),
        'port' => config('database.connections.mysql.port'),
        'database' => config('database.connections.mysql.database'),
        'username' => config('database.connections.mysql.username'),
        'password' => config('database.connections.mysql.password'),
    ],
    'queue_batching_db' => config('queue.batching.database'),
    'queue_failed_db' => config('queue.failed.database'),
], JSON_THROW_ON_ERROR);
PHP;

        // 1. Standard Railway MySQL addon variables + RAILWAY_PUBLIC_DOMAIN + RAILWAY_ENVIRONMENT
        $env = [
            'APP_ENV' => 'production',
            'APP_KEY' => 'base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=',
            'APP_URL' => false,
            'DB_CONNECTION' => false,
            'DB_URL' => false,
            'DB_HOST' => false,
            'DB_PORT' => false,
            'DB_DATABASE' => false,
            'DB_USERNAME' => false,
            'DB_PASSWORD' => false,
            'FORCE_HTTPS' => false,
            'MYSQLHOST' => 'mysql.railway.internal',
            'MYSQLPORT' => '3307',
            'MYSQLDATABASE' => 'railway',
            'MYSQLUSER' => 'railuser',
            'MYSQLPASSWORD' => 'railpass',
            'RAILWAY_ENVIRONMENT' => 'production',
            'RAILWAY_PUBLIC_DOMAIN' => 'secdevlab-prod.up.railway.app/',
        ];

        $proc = new Process([PHP_BINARY, '-r', $script], base_path(), $env);
        $proc->run();
        $this->assertTrue($proc->isSuccessful(), $proc->getErrorOutput());

        $resolved = json_decode($proc->getOutput(), true, 512, JSON_THROW_ON_ERROR);
        $this->assertSame('https://secdevlab-prod.up.railway.app', $resolved['app_url']);
        $this->assertTrue($resolved['force_https']);
        $this->assertSame('https://secdevlab-prod.up.railway.app/cve', $resolved['generated_url']);
        $this->assertSame('mysql', $resolved['db_default']);
        $this->assertSame('mysql.railway.internal', $resolved['mysql']['host']);
        $this->assertSame('3307', $resolved['mysql']['port']);
        $this->assertSame('railway', $resolved['mysql']['database']);
        $this->assertSame('railuser', $resolved['mysql']['username']);
        $this->assertSame('railpass', $resolved['mysql']['password']);
        $this->assertSame('mysql', $resolved['queue_batching_db']);
        $this->assertSame('mysql', $resolved['queue_failed_db']);

        // 2. MYSQL_URL + explicit FORCE_HTTPS=false override even with https:// APP_URL
        $envUrl = [
            'APP_ENV' => 'production',
            'APP_KEY' => 'base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=',
            'APP_URL' => 'https://local-preview.test',
            'DB_CONNECTION' => false,
            'DB_URL' => false,
            'DB_HOST' => false,
            'DB_PASSWORD' => false,
            'FORCE_HTTPS' => 'false',
            'MYSQLHOST' => false,
            'MYSQL_URL' => 'mysql://u:p@db.railway.internal:3306/railway',
            'RAILWAY_ENVIRONMENT' => 'production',
        ];
        $procUrl = new Process([PHP_BINARY, '-r', $script], base_path(), $envUrl);
        $procUrl->run();
        $this->assertTrue($procUrl->isSuccessful(), $procUrl->getErrorOutput());

        $resolvedUrl = json_decode($procUrl->getOutput(), true, 512, JSON_THROW_ON_ERROR);
        $this->assertSame('mysql', $resolvedUrl['db_default']);
        $this->assertSame('mysql://u:p@db.railway.internal:3306/railway', $resolvedUrl['mysql']['url']);
        $this->assertFalse($resolvedUrl['force_https']);
        $this->assertSame('https://local-preview.test/cve', $resolvedUrl['generated_url']);

        // When APP_URL is http:// and FORCE_HTTPS=false even on Railway, generated_url stays http://
        $envHttpOverride = $envUrl;
        $envHttpOverride['APP_URL'] = 'http://local-preview.test';
        $procHttpOverride = new Process([PHP_BINARY, '-r', $script], base_path(), $envHttpOverride);
        $procHttpOverride->run();
        $this->assertTrue($procHttpOverride->isSuccessful(), $procHttpOverride->getErrorOutput());
        $resolvedHttpOverride = json_decode($procHttpOverride->getOutput(), true, 512, JSON_THROW_ON_ERROR);
        $this->assertFalse($resolvedHttpOverride['force_https']);
        $this->assertSame('http://local-preview.test/cve', $resolvedHttpOverride['generated_url']);

        // 3. Empty DB_PASSWORD="" falls back to MYSQLPASSWORD, empty FORCE_HTTPS="" falls back to RAILWAY_PUBLIC_DOMAIN,
        // and explicit DB_HOST prevents MYSQL_URL from overriding custom DB_* settings
        $envEmpty = [
            'APP_ENV' => 'production',
            'APP_KEY' => 'base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=',
            'APP_URL' => '',
            'DB_CONNECTION' => 'mysql',
            'DB_URL' => '',
            'DB_HOST' => 'custom.mysql.internal',
            'DB_PORT' => '3308',
            'DB_DATABASE' => 'custom_db',
            'DB_USERNAME' => 'custom_user',
            'DB_PASSWORD' => '',
            'FORCE_HTTPS' => '',
            'MYSQLHOST' => 'ignored.railway.internal',
            'MYSQLPASSWORD' => 'fallback-rail-pass',
            'MYSQL_URL' => 'mysql://other:other@ignored.railway.internal:3306/railway',
            'RAILWAY_ENVIRONMENT' => false,
            'RAILWAY_PUBLIC_DOMAIN' => 'secdevlab.up.railway.app/',
        ];
        $procEmpty = new Process([PHP_BINARY, '-r', $script], base_path(), $envEmpty);
        $procEmpty->run();
        $this->assertTrue($procEmpty->isSuccessful(), $procEmpty->getErrorOutput());

        $resolvedEmpty = json_decode($procEmpty->getOutput(), true, 512, JSON_THROW_ON_ERROR);
        $this->assertSame('https://secdevlab.up.railway.app', $resolvedEmpty['app_url']);
        $this->assertTrue($resolvedEmpty['force_https']);
        $this->assertNull($resolvedEmpty['mysql']['url']);
        $this->assertSame('custom.mysql.internal', $resolvedEmpty['mysql']['host']);
        $this->assertSame('fallback-rail-pass', $resolvedEmpty['mysql']['password']);

        // 4. Password literal "0" is preserved without falsy fallback
        $envZeroPass = [
            'APP_ENV' => 'production',
            'APP_KEY' => 'base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=',
            'DB_CONNECTION' => 'mysql',
            'DB_HOST' => '127.0.0.1',
            'DB_PASSWORD' => '0',
            'MYSQLPASSWORD' => 'should-not-override',
        ];
        $procZero = new Process([PHP_BINARY, '-r', $script], base_path(), $envZeroPass);
        $procZero->run();
        $this->assertTrue($procZero->isSuccessful(), $procZero->getErrorOutput());

        $resolvedZero = json_decode($procZero->getOutput(), true, 512, JSON_THROW_ON_ERROR);
        $this->assertSame('0', $resolvedZero['mysql']['password']);
    }
}
