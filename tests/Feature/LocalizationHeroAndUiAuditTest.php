<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\CveArticle;
use App\Models\Lab;
use App\Models\LabSession;
use App\Models\User;
use App\Services\LabArchetypeResolver;
use App\Services\WidgetRenderer;
use Database\Seeders\CatalogSeeder;
use Database\Seeders\CveSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LocalizationHeroAndUiAuditTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        WidgetRenderer::clearRuntimeCache();
        $this->seed([UserSeeder::class, CatalogSeeder::class, CveSeeder::class]);
    }

    public function test_hero_badges_and_favicons_are_removed_across_academy_and_lab_views(): void
    {
        $learner = User::where('email', 'user@secdevlab.local')->firstOrFail();

        foreach ([
            'secdevlab-favicon.png',
            'secdevlab-logo-wide-light.png',
            'secdevlab-logo-wide-dark.png',
            'secdevlab-icon-square-light.png',
            'secdevlab-icon-square-dark.png',
            'secdevlab-mascot.png',
        ] as $asset) {
            $full = public_path('content/images/logos/'.$asset);
            $this->assertFileExists($full, "Missing custom brand asset {$asset}");
            $this->assertGreaterThan(1024, filesize($full), "Empty custom brand asset {$asset}");
        }

        foreach (['public/_home', 'public/_nav', 'public/_cms', 'public/_uploads', 'public/mega-nav', 'public/favicon.ico'] as $removedPath) {
            $this->assertFileDoesNotExist(base_path($removedPath));
        }

        $homeHtml = $this->get('/')->assertOk()->getContent();
        $this->assertStringNotContainsString('Hands-On Cyber Security Training Platform', $homeHtml);
        $this->assertStringNotContainsString('ZERO-JS SSR // 8 ARCHETYPES', $homeHtml);
        $this->assertStringNotContainsString('<script', strtolower($homeHtml));

        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();
        $cve = CveArticle::published()->firstOrFail();

        $academyPaths = [
            '/',
            '/web-security',
            '/web-security/all-topics',
            '/web-security/all-labs',
            '/web-security/learning-paths',
            '/web-security/getting-started',
            '/web-security/getting-started/index.html',
            '/web-security/certification',
            '/web-security/certification/index.html',
            '/cve',
            '/cve/'.$cve->slug,
            '/web-security/dashboard',
            '/web-security/hall-of-fame',
            $sqliLab->href,
            '/users',
            '/users/register',
        ];

        $forbiddenAssets = [
            'favicon.ico',
            'apple-touch-icon.png',
            'portswigger-logo',
            'burp-suite-icon',
            'logoAcademy.svg',
            'web-security-academy-logo.svg',
            'certified-secondary-hero.png',
            'validate-your-certification.svg',
            'learning-path.png',
            'portswigger.net/buy',
        ];

        foreach ($academyPaths as $path) {
            $html = $this->get($path)->assertOk()->getContent();
            $this->assertStringContainsString('/content/images/logos/secdevlab-favicon.png?v=', $html, "Missing custom SecDevLab favicon on {$path}");
            $this->assertStringContainsString('/content/images/logos/secdevlab-logo-wide-light.png?v=', $html, "Missing light logo on {$path}");
            $this->assertStringContainsString('/content/images/logos/secdevlab-logo-wide-dark.png?v=', $html, "Missing dark logo on {$path}");
            foreach ($forbiddenAssets as $bad) {
                $this->assertStringNotContainsStringIgnoringCase($bad, $html, "Unexpected legacy brand asset {$bad} on {$path}");
            }
            $this->assertStringNotContainsString('<script', strtolower($html), "Unexpected <script on {$path}");
        }

        // Authenticated Owner / Certificate / Lab Control views use custom SecDevLab favicon & zero <script>
        $owner = User::where('role', User::ROLE_OWNER)->firstOrFail();
        foreach (['/certificate', '/owner', '/owner/cves'] as $authPath) {
            $authHtml = $this->actingAs($owner)->get($authPath)->assertOk()->getContent();
            $this->assertStringContainsString('/content/images/logos/secdevlab-favicon.png?v=', $authHtml, "Missing custom SecDevLab favicon on {$authPath}");
            foreach ($forbiddenAssets as $bad) {
                $this->assertStringNotContainsStringIgnoringCase($bad, $authHtml, "Unexpected legacy brand asset {$bad} on {$authPath}");
            }
            $this->assertStringNotContainsString('<script', strtolower($authHtml), "Unexpected <script on {$authPath}");
        }
        Auth::logout();

        // Launch lab & inspect active + control + expired views for custom SecDevLab favicon & brand logos
        $launchRes = $this->actingAs($learner)->get('/academy/labs/launch/'.$sqliLab->id);
        $labPath = (string) parse_url((string) $launchRes->headers->get('Location'), PHP_URL_PATH);
        $labHtml = $this->get($labPath)->assertOk()->getContent();
        $this->assertStringContainsString('/content/images/logos/secdevlab-favicon.png?v=', $labHtml);
        $this->assertStringContainsString('/content/images/logos/secdevlab-logo-wide-light.png?v=', $labHtml);
        $this->assertStringNotContainsStringIgnoringCase('favicon.ico', $labHtml);
        $this->assertStringNotContainsString('<script', strtolower($labHtml));

        $token = substr($labPath, 5);
        $controlHtml = $this->actingAs($learner)->get("/academy/labs/session/{$token}/control")->assertOk()->getContent();
        $this->assertStringContainsString('/content/images/logos/secdevlab-favicon.png?v=', $controlHtml);
        $this->assertStringNotContainsStringIgnoringCase('favicon.ico', $controlHtml);
        $this->assertStringNotContainsString('<script', strtolower($controlHtml));

        $session = LabSession::findByToken($token);
        $this->assertNotNull($session);
        $session->expires_at = now()->subMinute();
        $session->save();

        $expiredHtml = $this->get($labPath)->assertStatus(410)->getContent();
        $this->assertStringContainsString('/content/images/logos/secdevlab-favicon.png?v=', $expiredHtml);
        $this->assertStringNotContainsStringIgnoringCase('favicon.ico', $expiredHtml);
        $this->assertStringNotContainsString('<script', strtolower($expiredHtml));
    }

    public function test_css_fixes_sidebar_checkbox_artifacts_mobile_375_and_archetype_contrast(): void
    {
        $academyCss = (string) file_get_contents(public_path('content/academy-modern.css'));
        $workbenchCss = (string) file_get_contents(public_path('content/lab-workbench.css'));

        // Sidebar checkbox & label hiding + Pure-CSS chevron
        $this->assertStringContainsString('.wrapper-large .container-academy > .nav-lhs input[type="checkbox"]', $academyCss);
        $this->assertStringContainsString('.wrapper-large .container-academy > .nav-lhs label.nav-label', $academyCss);
        $this->assertStringContainsString('.wrapper-large .container-academy > .nav-lhs li > input[type="checkbox"]:checked ~ ul', $academyCss);

        // Mobile <= 480px polish & no horizontal squeeze
        $this->assertStringContainsString('@media (max-width: 480px)', $academyCss);
        $this->assertStringContainsString('@media (max-width: 480px)', $workbenchCss);
        $this->assertStringContainsString('.lw-pill-switch', $workbenchCss);
        $this->assertStringContainsString('minmax(min(100%, 235px), 1fr)', $workbenchCss);

        // Dark-mode archetype button/highlight contrast uses token pairs and command-brand badge shield is removed
        $this->assertStringNotContainsString('sdl-command-brand__badge', $workbenchCss);
        $this->assertStringNotContainsString('sdl-command-brand__badge', (string) file_get_contents(resource_path('views/lab-env/show.blade.php')));
        $this->assertStringNotContainsString('sdl-command-brand__badge', (string) file_get_contents(resource_path('views/lab-env/expired.blade.php')));
        $this->assertStringContainsString('background: var(--lw-arch-btn-bg);', $workbenchCss);
        $this->assertStringContainsString('color: var(--lw-arch-btn-fg);', $workbenchCss);

        // Existing CSS guardrails preserved
        $this->assertDoesNotMatchRegularExpression('/font-weight:\s*800\b/', $academyCss);
        $this->assertDoesNotMatchRegularExpression('/font-weight:\s*800\b/', $workbenchCss);
        $this->assertStringNotContainsString('fonts.googleapis.com', $academyCss);
        $this->assertStringNotContainsString('fonts.googleapis.com', $workbenchCss);

        // Cache-busting on legacy_css & contrast/mobile CSS fixes
        $this->assertStringContainsString('--lw-arch-accent: #92400E;', $workbenchCss);
        $this->assertStringContainsString('.nav-lhs .nav-lhs-scrollable', $academyCss);
        $this->assertStringContainsString('.vla-cert-report-user', $academyCss);

        $topicsCssRes = $this->get('/web-security/all-topics')->assertOk()->getContent();
        $this->assertMatchesRegularExpression('#/content/psgenerictheme\.css\?v=\d+#', $topicsCssRes);
        $sqliCssRes = $this->get('/web-security/sql-injection')->assertOk()->getContent();
        $this->assertMatchesRegularExpression('#/content/pswebsecacademy\.css\?v=\d+#', $sqliCssRes);
    }

    public function test_full_indonesian_localization_across_academy_logout_owner_and_all_8_archetypes(): void
    {
        $owner = User::where('role', User::ROLE_OWNER)->firstOrFail();

        // 1. Switch locale to ID via Academy switcher
        $this->post('/preferences/locale', ['locale' => 'id', 'redirect_to' => '/'])
            ->assertRedirect('/');

        $homeId = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="id"', $homeId);
        $this->assertStringContainsString('Jelajahi Semua Lab', $homeId);
        $this->assertStringContainsString('SECDEVLAB // SPESIFIKASI RUNTIME', $homeId);
        $this->assertStringContainsString('Arketipe Lab  : 8 model target interaktif', $homeId);
        $this->assertStringContainsString('Katalog &rarr;', $homeId);
        $this->assertStringContainsString('poin', $homeId);
        $this->assertStringNotContainsString('Explore All Labs', $homeId);
        $this->assertStringNotContainsString('8 distinct interactive targets', $homeId);
        $this->assertStringNotContainsString('Catalog &rarr;', $homeId);
        $this->assertStringNotContainsString('Hands-On Cyber Security Training Platform', $homeId);
        $this->assertStringNotContainsString('ZERO-JS SSR // 8 ARCHETYPES', $homeId);

        // Check core Academy hub pages in ID
        $topicsId = $this->get('/web-security/all-topics')->assertOk()->getContent();
        $this->assertStringContainsString('Semua topik materi', $topicsId);
        $this->assertStringContainsString('Buka topik', $topicsId);
        $this->assertStringNotContainsString('Go to topic', $topicsId);

        $wsId = $this->get('/web-security')->assertOk()->getContent();
        $this->assertStringContainsString('Platform pelatihan keamanan web praktis', $wsId);
        $this->assertStringNotContainsString('{{ config(', $wsId);

        $mysteryHubId = $this->get('/web-security/mystery-lab-challenge')->assertOk()->getContent();
        $this->assertStringContainsString('Mulai Tantangan', $mysteryHubId);
        $this->assertStringNotContainsString('Challenge me', $mysteryHubId);

        $allLabsId = $this->get('/web-security/all-labs')->assertOk()->getContent();
        $this->assertStringContainsString('Semua Lab', $allLabsId);
        $this->assertStringContainsString('Belum selesai', $allLabsId);
        $this->assertStringNotContainsString('>Not solved<', $allLabsId);

        // Lab detail page in ID
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();
        $detailId = $this->get($sqliLab->href)->assertOk()->getContent();
        $this->assertStringContainsString('BUKA LAB', $detailId);
        $this->assertStringContainsString('Kembali ke semua topik', $detailId);
        $this->assertStringNotContainsString('ACCESS THE LAB', $detailId);
        $this->assertStringNotContainsString('Back to all topics', $detailId);
        $this->assertStringNotContainsString('Per-Session Isolated Target', $detailId);

        // 2. Authenticate as Owner, verify Account, Certificate, Owner Panel, and Control View in ID
        $this->actingAs($owner);

        $accountId = $this->get('/users/youraccount/personaldetails')->assertOk()->getContent();
        $this->assertStringContainsString('Total Lab Selesai', $accountId);
        $this->assertStringNotContainsString('Total Labs Solved:', $accountId);

        $certId = $this->get('/certificate?mode=report')->assertOk()->getContent();
        $this->assertStringContainsString('Laporan Progres Akademik Lab', $certId);
        $this->assertStringNotContainsString('Solved Labs (', $certId);

        $ownerDashId = $this->get('/owner')->assertOk()->getContent();
        $this->assertStringContainsString('Panel Kontrol Owner', $ownerDashId);
        $this->assertStringContainsString('Buka Kontrol Impor', $ownerDashId);
        $this->assertStringNotContainsString('Open Importer Controls', $ownerDashId);

        $ownerCvesId = $this->get('/owner/cves')->assertOk()->getContent();
        $this->assertStringContainsString('Jalankan Impor trickest/cve', $ownerCvesId);
        $this->assertStringNotContainsString('All severities', $ownerCvesId);

        // 3. Logout must preserve Indonesian locale preference & theme!
        $this->post('/users/logout')->assertRedirect('/users');
        $loginAfterLogout = $this->get('/users')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="id"', $loginAfterLogout);
        $this->assertStringContainsString('Masuk ke Akun Anda', $loginAfterLogout);

        // Log back in and verify all 8 archetypes launch in Indonesian with ZERO forbidden cookies on /lab/{token}
        $this->post('/users', [
            'email' => $owner->email,
            'password' => 'owner12345',
        ])->assertRedirect('/web-security/dashboard');

        $sampleCategoriesByArchetype = [
            'storefront' => 'sql-injection',
            'diagnostic' => 'os-command-injection',
            'media-upload' => 'file-upload-vulnerabilities',
            'identity' => 'authentication',
            'api-graphql' => 'graphql-api-vulnerabilities',
            'editorial' => 'cross-site-scripting',
            'ai-websocket' => 'web-llm-attacks',
            'http-inspector' => 'information-disclosure',
        ];

        $resolver = app(LabArchetypeResolver::class);

        foreach ($sampleCategoriesByArchetype as $expectedArchetype => $catSlug) {
            $lab = Lab::where('category_id', $catSlug)->orderBy('sort_order')->firstOrFail();
            $this->assertSame($expectedArchetype, $resolver->resolve($lab));

            $launch = $this->get('/academy/labs/launch/'.$lab->id);
            $labUrl = (string) parse_url((string) $launch->headers->get('Location'), PHP_URL_PATH);

            // Simulate isolated Burp/curl client (no Academy session cookie!)
            Auth::logout();
            $labRes = $this->get($labUrl);
            $labRes->assertOk();
            $labHtml = $labRes->getContent();

            $this->assertStringContainsString('<html lang="id"', $labHtml, "Archetype {$expectedArchetype} must render in Indonesian");
            $this->assertStringContainsString('Kembali ke deskripsi lab', $labHtml);
            $this->assertStringContainsString('Belum selesai', $labHtml);
            $this->assertStringNotContainsString('Back to lab description', $labHtml);
            $this->assertStringNotContainsString('<script', strtolower($labHtml));

            foreach ($labRes->headers->getCookies() as $cookie) {
                $this->assertNotSame('secdevlab-session', $cookie->getName());
                $this->assertNotSame('XSRF-TOKEN', $cookie->getName());
            }

            $this->actingAs($owner);
        }

        // 4. Toggle locale directly inside isolated lab via POST /lab/{token}/_locale
        $gqlLab = Lab::where('category_id', 'graphql-api-vulnerabilities')->orderBy('sort_order')->firstOrFail();
        $gqlLaunch = $this->get('/academy/labs/launch/'.$gqlLab->id);
        $gqlPath = (string) parse_url((string) $gqlLaunch->headers->get('Location'), PHP_URL_PATH);

        $this->post($gqlPath.'/_locale', ['ui_locale' => 'en'])->assertRedirect($gqlPath);
        $gqlEn = $this->get($gqlPath)->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="en"', $gqlEn);
        $this->assertStringContainsString('GraphQL Query &amp; Introspection Console', $gqlEn);

        $this->post($gqlPath.'/_locale', ['ui_locale' => 'id'])->assertRedirect($gqlPath);
        $gqlId = $this->get($gqlPath)->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="id"', $gqlId);
        $this->assertStringContainsString('Konsol Query &amp; Introspeksi GraphQL', $gqlId);

        // Reset preserves Indonesian inside lab instance
        $token = substr($gqlPath, 5);
        $resetRedirect = $this->post("/academy/labs/session/{$token}/reset");
        $resetPath = (string) parse_url((string) $resetRedirect->headers->get('Location'), PHP_URL_PATH);
        $resetHtml = $this->get($resetPath)->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="id"', $resetHtml);
        $this->assertStringContainsString('Konsol Query &amp; Introspeksi GraphQL', $resetHtml);

        // Expired lab renders in Indonesian too
        $resetSession = LabSession::findByToken(substr($resetPath, 5));
        $this->assertNotNull($resetSession);
        $resetSession->expires_at = now()->subMinute();
        $resetSession->save();
        $expiredIdHtml = $this->get($resetPath)->assertStatus(410)->getContent();
        $this->assertStringContainsString('<html lang="id"', $expiredIdHtml);
        $this->assertStringContainsString('410 Gone', $expiredIdHtml);
        $this->assertStringContainsString('Jalankan Instans Lab Baru', $expiredIdHtml);

        // 5. Academy hub pages, validation & pagination, Repeater/Workbench outputs, AI chat, and multi-lab locale sync in ID
        $this->actingAs($owner);
        $this->post('/preferences/locale', ['locale' => 'id', 'redirect_to' => '/'])
            ->assertRedirect('/');

        $lpId = $this->get('/web-security/learning-paths')->assertOk()->getContent();
        $this->assertStringContainsString('Semua jalur belajar', $lpId);
        $this->assertStringContainsString('Lihat jalur', $lpId);
        $this->assertStringNotContainsString('All learning paths', $lpId);
        $this->assertStringNotContainsString("SecDevLab's Repeater", $lpId);

        $allMatId = $this->get('/web-security/all-materials')->assertOk()->getContent();
        $this->assertStringContainsString('Semua materi belajar', $allMatId);
        $this->assertStringNotContainsString('See detailed view', $allMatId);

        $gsId = $this->get('/web-security/getting-started')->assertOk()->getContent();
        $this->assertStringContainsString('Panduan memulai Akademi Keamanan Web', $gsId);
        $this->assertStringNotContainsString('How the Web Security Academy works', $gsId);

        $gsIndexId = $this->get('/web-security/getting-started/index.html')->assertOk()->getContent();
        $this->assertStringContainsString('Panduan memulai Akademi Keamanan Web', $gsIndexId);
        $this->assertStringNotContainsString('Follow us on twitter', $gsIndexId);

        $certPageId = $this->get('/web-security/certification')->assertOk()->getContent();
        $this->assertStringContainsString('Sertifikasi keamanan web', $certPageId);
        $this->assertStringNotContainsString('What is a SecDevLab Certified Practitioner?', $certPageId);

        $certIndexId = $this->get('/web-security/certification/index.html')->assertOk()->getContent();
        $this->assertStringContainsString('Sertifikasi keamanan web', $certIndexId);
        $this->assertStringNotContainsString('What is a SecDevLab Certified Practitioner?', $certIndexId);

        // Indonesian validation errors & pagination
        Auth::logout();
        $regErrHtml = $this->from('/users/register')->followingRedirects()->post('/users/register', [
            'name' => '',
            'email' => 'not-an-email',
            'password' => '123',
        ])->getContent();
        $this->assertStringContainsString('Kolom nama wajib diisi.', $regErrHtml);
        $this->assertStringNotContainsString('The name field is required.', $regErrHtml);

        $this->actingAs($owner);
        $cvePageId = $this->get('/cve')->assertOk()->getContent();
        if (str_contains($cvePageId, 'Pagination Navigation') || str_contains($cvePageId, 'Navigasi Halaman')) {
            $this->assertStringContainsString('Menampilkan', $cvePageId);
            $this->assertStringNotContainsString('Pagination Navigation', $cvePageId);
        }

        // Indonesian workbench probe output & Repeater JSON without em-dash
        $gqlSyncLaunch = $this->get('/academy/labs/launch/'.$gqlLab->id);
        $gqlSyncPath = (string) parse_url((string) $gqlSyncLaunch->headers->get('Location'), PHP_URL_PATH);

        // Clean session Repeater JSON before triggering Stage 1 exfiltration
        $repCleanJson = $this->get($gqlSyncPath, ['X-Academy-Repeater' => '1'])->assertOk()->json();
        $this->assertFalse((bool) ($repCleanJson['exfiltrated'] ?? true));
        $this->assertFalse((bool) ($repCleanJson['autoSolved'] ?? true));
        $this->assertStringNotContainsString("\u{2014}", (string) ($repCleanJson['status'] ?? ''));
        $this->assertStringContainsString('Permintaan diproses', (string) ($repCleanJson['status'] ?? ''));

        $gqlProbeId = $this->post($gqlSyncPath.'/graphql', ['graphqlQuery' => 'query { __schema { types { name } } }'])->assertOk()->getContent();
        $this->assertTrue(
            str_contains($gqlProbeId, '200 OK (TEREKSTRAK)') || str_contains($gqlProbeId, '200 OK (TERPICU / SELESAI)'),
            'Expected localized Indonesian status pill in GraphQL workbench'
        );
        $this->assertStringNotContainsString('200 OK (EXFILTRATED)', $gqlProbeId);
        $this->assertStringNotContainsString('200 OK (TRIGGERED / SOLVED)', $gqlProbeId);

        $corsLab = Lab::where('category_id', 'cross-origin-resource-sharing-cors')->orderBy('sort_order')->firstOrFail();
        $corsSyncPath = (string) parse_url((string) $this->get('/academy/labs/launch/'.$corsLab->id)->headers->get('Location'), PHP_URL_PATH);
        $corsProbeId = $this->post($corsSyncPath.'/_workbench/probe', ['probeOrigin' => 'https://attacker.example'])->assertOk()->getContent();
        $this->assertStringContainsString('Origin Direfleksikan: https://attacker.example', $corsProbeId);
        $this->assertStringNotContainsString('Reflected Origin:', $corsProbeId);

        // Repeater JSON after Stage 1 exfiltration on GraphQL lab
        $repExfilJson = $this->get($gqlSyncPath, ['X-Academy-Repeater' => '1'])->assertOk()->json();
        $this->assertTrue((bool) ($repExfilJson['exfiltrated'] ?? false));
        $this->assertFalse((bool) ($repExfilJson['autoSolved'] ?? true));
        $this->assertStringNotContainsString("\u{2014}", (string) ($repExfilJson['status'] ?? ''));
        $this->assertStringContainsString('Ekstraksi tahap 1 berhasil', (string) ($repExfilJson['status'] ?? ''));

        // Repeater JSON on Exploit Server with missing payload
        $csrfLab = Lab::where('category_id', 'cross-site-request-forgery-csrf')->orderBy('sort_order')->firstOrFail();
        $csrfSyncPath = (string) parse_url((string) $this->get('/academy/labs/launch/'.$csrfLab->id)->headers->get('Location'), PHP_URL_PATH);
        $repEmptyExploitJson = $this->post($csrfSyncPath.'/exploit-server', [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '',
        ], ['X-Academy-Repeater' => '1'])->assertOk()->json();
        $this->assertFalse((bool) ($repEmptyExploitJson['autoSolved'] ?? true));
        $this->assertStringNotContainsString("\u{2014}", (string) ($repEmptyExploitJson['status'] ?? ''));
        $this->assertSame('Isi payload exploit tidak boleh kosong.', $repEmptyExploitJson['status'] ?? '');

        // Indonesian AI chat reply & sender label
        $aiLab = Lab::where('category_id', 'web-llm-attacks')->orderBy('sort_order')->firstOrFail();
        $aiSyncPath = (string) parse_url((string) $this->get('/academy/labs/launch/'.$aiLab->id)->headers->get('Location'), PHP_URL_PATH);
        $aiChatRes = $this->post($aiSyncPath.'/chat', ['message' => 'delete_user carlos'])->assertOk()->getContent();
        $this->assertStringContainsString('Pengguna carlos dihapus.', $aiChatRes);
        $this->assertStringContainsString('<strong>Anda:</strong>', $aiChatRes);

        // Repeater JSON on solved lab
        $repSolvedJson = $this->get($aiSyncPath, ['X-Academy-Repeater' => '1'])->assertOk()->json();
        $this->assertTrue((bool) ($repSolvedJson['autoSolved'] ?? false));
        $this->assertStringNotContainsString("\u{2014}", (string) ($repSolvedJson['status'] ?? ''));
        $this->assertStringContainsString('Payload exploit terpicu - Lab selesai!', (string) ($repSolvedJson['status'] ?? ''));

        // Toggle locale back inside one lab and verify OTHER active lab sessions + Academy session stay synced
        $this->post($aiSyncPath.'/_locale', ['ui_locale' => 'en'])->assertRedirect($aiSyncPath);
        $this->assertStringContainsString('<html lang="en"', $this->get($gqlSyncPath)->assertOk()->getContent());
        $homeBackEn = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="en"', $homeBackEn);
        $this->assertStringContainsString('Explore All Labs', $homeBackEn);

        // Logout, toggle lab locale to ID from isolated lab client (leaving pending locale), then login with explicit EN preference
        $this->post('/users/logout')->assertRedirect('/users');
        $this->post($aiSyncPath.'/_locale', ['ui_locale' => 'id'])->assertRedirect($aiSyncPath);
        $this->post('/preferences/locale', ['locale' => 'en', 'redirect_to' => '/users'])->assertRedirect('/users');
        $this->post('/users', [
            'email' => $owner->email,
            'password' => 'owner12345',
        ])->assertRedirect('/web-security/dashboard');
        $dashAfterLoginEn = $this->get('/web-security/dashboard')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="en"', $dashAfterLoginEn);
        $this->assertStringContainsString('Learning Dashboard', $dashAfterLoginEn);
        $homeAfterLoginEn = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="en"', $homeAfterLoginEn);
        $this->assertStringContainsString('Explore All Labs', $homeAfterLoginEn);

        // Toggle back to ID inside lab, then switch Academy back to EN
        $this->post($aiSyncPath.'/_locale', ['ui_locale' => 'id'])->assertRedirect($aiSyncPath);
        $this->assertStringContainsString('<html lang="id"', $this->get($gqlSyncPath)->assertOk()->getContent());
        $this->assertStringContainsString('<html lang="id"', $this->get('/')->assertOk()->getContent());

        // Switch Academy back to EN
        $this->post('/preferences/locale', ['locale' => 'en', 'redirect_to' => '/'])
            ->assertRedirect('/');
        $homeEn = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="en"', $homeEn);
        $this->assertStringContainsString('Explore All Labs', $homeEn);
    }

    public function test_all_31_categories_and_273_labs_and_id_dictionaries_pass_strict_localization_audits(): void
    {
        $categories = Category::orderBy('sort_order')->get();
        $this->assertCount(31, $categories);

        $labs = Lab::orderBy('category_id')->orderBy('sort_order')->get();
        $this->assertCount(273, $labs);

        $expectedSectionTitlesId = [
            'Hint' => 'Petunjuk',
            'Tip' => 'Tips',
            'Passwords' => 'Daftar Kata Sandi',
            'Solution' => 'Solusi',
            'Manual solution' => 'Solusi manual',
            'DOM Invader solution' => 'Solusi DOM Invader',
            'Solution - Burp Suite Professional' => 'Solusi Burp Suite Professional',
            'Solution - Burp Suite Community Edition' => 'Solusi Burp Suite Community Edition',
            'Community solutions' => 'Solusi komunitas',
        ];

        $unresolvedTokenPattern = '/\[\[(?:[CAS]\d+|\/[CAS]\d+)\]\]/';
        $codeBlockPattern = '/<pre\b[^>]*>.*?<\/pre>|<code\b[^>]*>.*?<\/code>/is';

        foreach ($categories as $category) {
            $this->assertSame($category->title, $category->localizedTitle('en'));
            $idTitle = $category->localizedTitle('id');
            $this->assertNotSame('', trim($idTitle), "Missing ID title for category {$category->id}");
            $this->assertFileExists(lang_path("id/catalog_labs/{$category->id}.php"));
        }

        foreach ($labs as $lab) {
            // EN preservation
            $this->assertSame($lab->title, $lab->localizedTitle('en'));
            $this->assertSame((string) ($lab->description_html ?? ''), $lab->localizedDescriptionHtml('en'));
            $this->assertSame(is_array($lab->sections) ? $lab->sections : [], $lab->localizedSections('en'));

            // ID translation & verbatim code preservation
            $idTitle = $lab->localizedTitle('id');
            $this->assertNotSame('', trim($idTitle), "Missing ID title for lab {$lab->id}");
            $this->assertDoesNotMatchRegularExpression($unresolvedTokenPattern, $idTitle, "Unresolved token in title for {$lab->id}");

            $enDesc = (string) ($lab->description_html ?? '');
            $idDesc = $lab->localizedDescriptionHtml('id');
            $this->assertNotSame('', trim($idDesc), "Missing ID description for lab {$lab->id}");
            $this->assertDoesNotMatchRegularExpression($unresolvedTokenPattern, $idDesc, "Unresolved token in description for {$lab->id}");

            if (preg_match_all($codeBlockPattern, $enDesc, $descCodeMatches)) {
                foreach ($descCodeMatches[0] as $verbatimCode) {
                    $this->assertStringContainsString(
                        $verbatimCode,
                        $idDesc,
                        "Code/pre block altered in ID description for lab {$lab->id}"
                    );
                }
            }

            $enSections = is_array($lab->sections) ? $lab->sections : [];
            $idSections = $lab->localizedSections('id');
            $this->assertCount(count($enSections), $idSections, "Section count mismatch for lab {$lab->id}");

            foreach ($enSections as $idx => $enSec) {
                if (! is_array($enSec)) {
                    continue;
                }
                $idSec = $idSections[$idx] ?? [];
                $origTitle = (string) ($enSec['title'] ?? '');
                $expectedTitle = $expectedSectionTitlesId[$origTitle] ?? $origTitle;
                $this->assertSame($expectedTitle, (string) ($idSec['title'] ?? ''), "Section title mismatch for {$lab->id}#{$idx}");

                $enBody = (string) ($enSec['bodyHtml'] ?? '');
                $idBody = (string) ($idSec['bodyHtml'] ?? '');
                $this->assertDoesNotMatchRegularExpression($unresolvedTokenPattern, $idBody, "Unresolved token in section body for {$lab->id}#{$idx}");

                if (preg_match_all($codeBlockPattern, $enBody, $secCodeMatches)) {
                    foreach ($secCodeMatches[0] as $verbatimCode) {
                        $this->assertStringContainsString(
                            $verbatimCode,
                            $idBody,
                            "Code/pre block altered in ID section {$idx} for lab {$lab->id}"
                        );
                    }
                }
            }
        }

        // Audit all Indonesian dictionary files for dashes, syntax, and balanced placeholders
        $dictFiles = array_merge(
            glob(lang_path('id/pages/*.php')) ?: [],
            glob(lang_path('id/catalog_labs/*.php')) ?: [],
            [lang_path('id/catalog_categories.php'), lang_path('id/lab_runtime.php')]
        );
        $this->assertGreaterThanOrEqual(63, count($dictFiles));

        $walkStrings = static function (mixed $node, callable $visitor) use (&$walkStrings): void {
            if (is_array($node)) {
                foreach ($node as $k => $v) {
                    if (is_string($v)) {
                        $visitor($v, is_string($k) ? $k : null);
                    } else {
                        $walkStrings($v, $visitor);
                    }
                }
            }
        };

        foreach ($dictFiles as $file) {
            $data = require $file;
            $this->assertIsArray($data, "Dictionary must return an array: {$file}");
            $basename = basename($file);
            $isPageDict = dirname($file) === lang_path('id/pages');

            $walkStrings($data, function (string $val, ?string $key) use ($basename, $isPageDict): void {
                $this->assertStringNotContainsString("\u{2014}", $val, "Em-dash forbidden in ID dictionary {$basename}: {$val}");
                $this->assertStringNotContainsString("\u{2013}", $val, "En-dash forbidden in ID dictionary {$basename}: {$val}");

                if (preg_match_all('/\[\[([AS])(\d+)\]\]/', $val, $opens)) {
                    foreach ($opens[0] as $i => $openTag) {
                        $closeTag = '[['.'/'.$opens[1][$i].$opens[2][$i].']]';
                        $this->assertStringContainsString($closeTag, $val, "Unclosed placeholder {$openTag} in {$basename}");
                    }
                }

                if ($isPageDict && $key !== null && preg_match_all('/\[\[(?:[CAS]\d+|\/[CAS]\d+)\]\]/', $val, $valTokens)) {
                    foreach ($valTokens[0] as $tok) {
                        $this->assertStringContainsString($tok, $key, "Placeholder {$tok} missing from English key in {$basename}: {$key}");
                    }
                }
            });
        }
    }

    public function test_curriculum_pages_render_full_indonesian_localization_with_intact_code_and_english_fallback(): void
    {
        // Verify 375px responsive CSS markers in both Academy and Lab Workbench stylesheets
        $academyCss = (string) file_get_contents(public_path('content/academy-modern.css'));
        $workbenchCss = (string) file_get_contents(public_path('content/lab-workbench.css'));
        $this->assertStringContainsString('overflow-x: clip;', $academyCss);
        $this->assertStringContainsString('overflow-x: clip;', $workbenchCss);
        $this->assertStringContainsString('@media screen and (max-width: 760px)', $academyCss);
        $this->assertStringContainsString('@media screen and (max-width: 480px)', $academyCss);
        $this->assertStringContainsString('.container-cards-white-medium-space-between > *', $academyCss);
        $this->assertStringContainsString('@media (max-width: 390px)', $workbenchCss);
        $this->assertStringContainsString('.lw-card pre,', $workbenchCss);

        // Switch session locale to Indonesian
        $this->post('/preferences/locale', ['locale' => 'id', 'redirect_to' => '/'])
            ->assertRedirect('/');

        $curriculumChecks = [
            '/web-security/sql-injection' => [
                'expected' => ['SQL injection', 'LAB PRAKTIK'],
                'code' => ["SELECT * FROM products WHERE category = 'Gifts' AND released = 1"],
            ],
            '/web-security/cross-site-scripting' => [
                'expected' => ['Cross-site scripting'],
                'code' => ['&lt;script&gt;'],
            ],
            '/web-security/csrf' => [
                'expected' => ['Cross-site request forgery'],
                'code' => ['POST'],
            ],
            '/web-security/ssrf' => [
                'expected' => ['Server-side request forgery'],
                'code' => ['127.0.0.1', 'http://192.168.0.68/admin', '2130706433'],
            ],
            '/web-security/host-header' => [
                'expected' => ['Serangan HTTP Host header', 'Apa itu HTTP Host header?', 'Cara mencegah serangan HTTP Host header'],
                'code' => ['ALLOWED_HOSTS', 'X-Forwarded-Host'],
            ],
            '/web-security/host-header/exploiting' => [
                'expected' => ['Cara mengidentifikasi dan mengeksploitasi kerentanan HTTP Host header', 'Tambahkan indentasi baris header', 'Jika frontend mengabaikan baris berspasi'],
                'code' => ['vulnerable-website.com', 'X-Forwarded-Host', 'X-HTTP-Host-Override'],
            ],
            '/web-security/authentication' => [
                'expected' => ['autentikasi', 'LAB PRAKTIK'],
                'code' => [],
            ],
            '/web-security/access-control' => [
                'expected' => ['kontrol akses', 'LAB PRAKTIK'],
                'code' => [],
            ],
            '/web-security/dom-based' => [
                'expected' => ['Kerentanan berbasis DOM'],
                'code' => ['location.search'],
            ],
            '/web-security/information-disclosure' => [
                'expected' => ['kebocoran informasi'],
                'code' => [],
            ],
            '/web-security/file-upload' => [
                'expected' => ['Kerentanan file upload', 'unggah berkas'],
                'code' => ['Content-Type'],
            ],
            '/web-security/graphql' => [
                'expected' => ['Kerentanan API GraphQL'],
                'code' => ['__schema'],
            ],
            '/web-security/race-conditions' => [
                'expected' => ['Race conditions'],
                'code' => [],
            ],
            '/web-security/nosql-injection' => [
                'expected' => ['NoSQL injection', 'Injeksi sintaks NoSQL', 'Injeksi operator NoSQL', 'Mencocokkan dokumen yang memenuhi ekspresi JavaScript tertentu'],
                'code' => ['$ne', '$where'],
            ],
            '/web-security/prototype-pollution' => [
                'expected' => ['Prototype pollution'],
                'code' => ['__proto__'],
            ],
            '/web-security/api-testing' => [
                'expected' => ['Pengujian API'],
                'code' => [],
            ],
            '/web-security/llm-attacks' => [
                'expected' => ['Serangan Web LLM'],
                'code' => [],
            ],
            '/web-security/learning-paths/sql-injection' => [
                'expected' => ['SQL injection', 'Jalur belajar', 'Mengambil data tersembunyi', 'Serangan SQL injection UNION'],
                'code' => [],
            ],
            '/web-security/learning-paths/server-side-vulnerabilities-apprentice' => [
                'expected' => ['Kerentanan sisi server'],
                'code' => [],
            ],
            '/web-security/certification/how-to-prepare' => [
                'expected' => ['Dapatkan Sertifikasi Burp Suite', 'Gratis (Mode Offline Lokal)'],
                'code' => [],
            ],
            '/web-security/certification/practice-exam' => [
                'expected' => ['Ujian', 'praktik'],
                'code' => [],
            ],
            '/web-security/credits' => [
                'expected' => ['Siapa di balik Akademi Keamanan Web?', 'Kontribusi komunitas'],
                'code' => [],
            ],
            '/web-security/video-guidelines' => [
                'expected' => ['Panduan pengiriman video solusi'],
                'code' => ['support@portswigger.net'],
            ],
            '/web-security/lab-telemetry-privacy-notice' => [
                'expected' => ['Pemberitahuan Privasi Telemetri Lab Akademi', '1. Siapa kami'],
                'code' => [],
            ],
            '/web-security/web-application-hackers-handbook' => [
                'expected' => ['Buka Akademi Keamanan Web'],
                'code' => [],
            ],
            '/web-security/getting-started/andres-rauschecker' => [
                'expected' => ['Peserta terbaik di Papan Peringkat'],
                'code' => [],
            ],
        ];

        $unresolvedTokenPattern = '/\[\[(?:[CAS]\d+|\/[CAS]\d+)\]\]/';

        foreach ($curriculumChecks as $path => $checks) {
            $html = $this->get($path)->assertOk()->getContent();
            $this->assertStringContainsString('<html lang="id"', $html, "Expected Indonesian locale on {$path}");
            $this->assertStringNotContainsString('<script', strtolower($html), "Zero-JS violated on {$path}");
            $this->assertDoesNotMatchRegularExpression($unresolvedTokenPattern, $html, "Unresolved placeholder leaked on {$path}");

            foreach ($checks['expected'] as $phrase) {
                $this->assertStringContainsStringIgnoringCase($phrase, $html, "Expected Indonesian phrase '{$phrase}' on {$path}");
            }
            foreach ($checks['code'] as $snippet) {
                $this->assertStringContainsString($snippet, $html, "Expected verbatim code/term '{$snippet}' preserved on {$path}");
            }
        }

        // Switch back to English and verify original prose remains completely intact
        $this->post('/preferences/locale', ['locale' => 'en', 'redirect_to' => '/'])
            ->assertRedirect('/');

        $creditsEn = $this->get('/web-security/credits')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="en"', $creditsEn);
        $this->assertStringContainsString('Who is behind the Web Security Academy?', $creditsEn);
        $this->assertStringNotContainsString('Siapa di balik Akademi Keamanan Web?', $creditsEn);

        $sqliEn = $this->get('/web-security/sql-injection')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="en"', $sqliEn);
        $this->assertStringContainsString('What is SQL injection (SQLi)?', $sqliEn);

        $hostHeaderEn = $this->get('/web-security/host-header')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="en"', $hostHeaderEn);
        $this->assertStringContainsString('HTTP Host header attacks', $hostHeaderEn);
        $this->assertStringContainsString('ALLOWED_HOSTS', $hostHeaderEn);
        $this->assertStringNotContainsString('Serangan HTTP Host header', $hostHeaderEn);

        $hostHeaderExploitingEn = $this->get('/web-security/host-header/exploiting')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="en"', $hostHeaderExploitingEn);
        $this->assertStringContainsString('Now let\'s say the back-end ignores the leading space', $hostHeaderExploitingEn);
    }

    public function test_mobile_topbar_and_column_blocks_use_live_selectors_without_dead_vla_header_classes(): void
    {
        $academyCss = file_get_contents(public_path('content/academy-modern.css'));
        $this->assertIsString($academyCss);

        $this->assertStringNotContainsString('.vla-header__inner', $academyCss);
        $this->assertStringNotContainsString('.vla-header__controls', $academyCss);
        $this->assertStringContainsString('.vla-topbar__inner', $academyCss);
        $this->assertStringContainsString('.vla-actions', $academyCss);
        $this->assertStringContainsString('.vla-account-dropdown__menu', $academyCss);
        $this->assertStringContainsString('.vla-learning-content .container-columns-block > a', $academyCss);
    }

    public function test_legacy_css_collisions_broken_learning_path_steps_and_external_iframes_are_fixed(): void
    {
        $academyCss = (string) file_get_contents(public_path('content/academy-modern.css'));
        $workbenchCss = (string) file_get_contents(public_path('content/lab-workbench.css'));

        // High-specificity protections against legacy CSS form/button/contrast/icon collisions
        $this->assertStringContainsString('header.vla-topbar .vla-pill-switch button', $academyCss);
        $this->assertStringContainsString('header.vla-topbar button.vla-btn', $academyCss);
        $this->assertStringContainsString('.vla-learning-content .heading1-white', $academyCss);
        $this->assertStringContainsString('.vla-learning-content .ps-breadcrumbs li a::after', $academyCss);
        $this->assertStringContainsString('.vla-learning-content .icon-arrow-right::before', $academyCss);
        $this->assertStringContainsString('.vla-brand__logo--dark', $academyCss);
        $this->assertStringContainsString('.sdl-command-brand__logo--dark', $workbenchCss);

        // Redesigned hub & certification & cheat-sheet routes drop legacy CSS & commercial links
        $redesignedRoutes = [
            '/web-security',
            '/web-security/learning-paths',
            '/web-security/getting-started',
            '/web-security/getting-started/johnny-villarreal',
            '/web-security/getting-started/kamil-vavra',
            '/web-security/getting-started/andres-rauschecker',
            '/web-security/certification',
            '/web-security/certification/how-it-works',
            '/web-security/certification/how-to-prepare',
            '/web-security/certification/practice-exam',
            '/web-security/certification/exam-hints-and-guidance',
            '/web-security/certification/exam-hints-and-guidance/retaking-your-exam',
            '/web-security/certification/verify-your-certification',
            '/web-security/certification/frequently-asked-questions/index.html',
            '/web-security/certification/how-to-prepare/practitioner-labs-prep-step-one',
            '/web-security/certification/terms-and-conditions',
            '/web-security/certification/terms-and-conditions/website-terms-of-use',
            '/web-security/lab-telemetry-privacy-notice',
            '/web-security/ssrf/url-validation-bypass-cheat-sheet',
        ];

        foreach ($redesignedRoutes as $route) {
            $html = $this->get($route)->assertOk()->getContent();
            $this->assertStringNotContainsString('pslandingpages.css', $html, "Unexpected pslandingpages.css on {$route}");
            $this->assertStringNotContainsString('psproducts.css', $html, "Unexpected psproducts.css on {$route}");
            $this->assertStringNotContainsString('psgenerictheme.css', $html, "Unexpected psgenerictheme.css on {$route}");
            $this->assertStringNotContainsString('pslearningpaths.css', $html, "Unexpected pslearningpaths.css on {$route}");
            $this->assertStringNotContainsString('cheat-sheets.portswigger.net', $html, "Unexpected external iframe on {$route}");
            $this->assertStringNotContainsString('/buy/certification', $html, "Unexpected commercial link on {$route}");
            $this->assertStringNotContainsString('wsa-hall-of-fame', $html, "Unexpected promo graphic on {$route}");
            $this->assertStringNotContainsString('<script', strtolower($html), "Unexpected <script on {$route}");
        }

        // All 17 learning path "GET STARTED" step pages resolve to real content (no "An error occurred" / psdefault.css)
        $stepRoutes = [
            '/web-security/learning-paths/api-testing/api-testing-api-recon/api-testing/api-recon',
            '/web-security/learning-paths/authentication-vulnerabilities/what-is-authentication/authentication/what-is-authentication',
            '/web-security/learning-paths/clickjacking/clickjacking-what-is-clickjacking/clickjacking/what-is-clickjacking',
            '/web-security/learning-paths/cors/cors-what-is-cors-cross-origin-resource-sharing/cors/what-is-cors-cross-origin-resource-sharing',
            '/web-security/learning-paths/csrf/csrf-what-is-csrf/csrf/what-is-csrf',
            '/web-security/learning-paths/file-upload-vulnerabilities/what-are-file-upload-vulnerabilities/file-upload/what-are-file-upload-vulnerabilities',
            '/web-security/learning-paths/graphql-api-vulnerabilities/finding-graphql-endpoints/graphql/finding-graphql-endpoints',
            '/web-security/learning-paths/llm-attacks/llm-attacks-what-is-a-large-language-model/llm-attacks/what-is-a-large-language-model',
            '/web-security/learning-paths/nosql-injection/types-of-nosql-injection/nosql-injection/types-of-nosql-injection',
            '/web-security/learning-paths/path-traversal/what-is-path-traversal/file-path-traversal/what-is-path-traversal',
            '/web-security/learning-paths/prototype-pollution/prototype-pollution/prototype-pollution/what-is-prototype-pollution',
            '/web-security/learning-paths/race-conditions/race-conditions-limit-overrun/race-conditions/limit-overrun-race-conditions',
            '/web-security/learning-paths/server-side-vulnerabilities-apprentice/path-traversal-apprentice/file-path-traversal/what-is-path-traversal',
            '/web-security/learning-paths/sql-injection/sql-injection-what-is-sql-injection/sql-injection/what-is-sql-injection-sqli',
            '/web-security/learning-paths/ssrf-attacks/ssrf-attacks-what-is-ssrf/ssrf/what-is-ssrf',
            '/web-security/learning-paths/web-cache-deception/wcd-web-caches/web-cache-deception/web-caches',
            '/web-security/learning-paths/websockets-security-vulnerabilities/websockets/websockets/websockets',
        ];

        $this->post('/preferences/locale', ['locale' => 'id', 'redirect_to' => '/web-security'])->assertRedirect('/web-security');

        foreach ($stepRoutes as $stepRoute) {
            $stepHtml = $this->get($stepRoute)->assertOk()->getContent();
            $this->assertStringNotContainsString('An error occurred', $stepHtml, "Broken Error stub remaining on {$stepRoute}");
            $this->assertStringNotContainsString('psdefault.css', $stepHtml, "Legacy psdefault.css remaining on {$stepRoute}");
            $this->assertStringContainsString('<html lang="id"', $stepHtml, "Missing Indonesian locale on {$stepRoute}");
        }

        // Indonesian & Dark-theme rendering on key redesigned routes & XSS cheat sheet breadcrumb
        $this->post('/preferences/theme', ['redirect_to' => '/web-security'])->assertRedirect('/web-security');
        $darkHome = $this->get('/web-security')->assertOk()->getContent();
        $this->assertStringContainsString('data-theme="dark"', $darkHome);
        $this->assertStringContainsString('Platform pelatihan keamanan web praktis', $darkHome);
        $this->assertStringContainsString('secdevlab-icon-square-dark.png', $darkHome);

        $xssHtml = $this->get('/web-security/cross-site-scripting/cheat-sheet')->assertOk()->getContent();
        $this->assertStringContainsString('<span itemprop="name">SecDevLab</span>', $xssHtml);
        $this->assertStringContainsString('data-theme="dark"', $xssHtml);
    }

    public function test_native_css_scroll_stability_sticky_clearance_and_themed_scrollbars(): void
    {
        $academyCss = (string) file_get_contents(public_path('content/academy-modern.css'));
        $workbenchCss = (string) file_get_contents(public_path('content/lab-workbench.css'));

        // 1. Desktop & mobile global overflow-x: clip (zero overflow-x: hidden) + legacy ps*.css override
        $this->assertDoesNotMatchRegularExpression('/overflow-x:\s*hidden/i', $academyCss);
        $this->assertDoesNotMatchRegularExpression('/overflow-x:\s*hidden/i', $workbenchCss);
        $this->assertMatchesRegularExpression('/html,\s*body\s*\{[^}]*overflow-x:\s*clip;/s', $academyCss);
        $this->assertMatchesRegularExpression('/html\s+body\s*\{[^}]*overflow-x:\s*clip;/s', $academyCss);
        $this->assertMatchesRegularExpression('/html,\s*body\s*\{[^}]*overflow-x:\s*clip;/s', $workbenchCss);

        // 2. Native CSS smooth scrolling on html + prefers-reduced-motion reset
        $this->assertMatchesRegularExpression('/html\s*\{[^}]*scroll-behavior:\s*smooth;/s', $academyCss);
        $this->assertMatchesRegularExpression('/html\s*\{[^}]*scroll-behavior:\s*smooth;/s', $workbenchCss);
        $this->assertMatchesRegularExpression('/@media\s*\(prefers-reduced-motion:\s*reduce\)\s*\{\s*html\s*\{\s*scroll-behavior:\s*auto;\s*\}\s*\}/s', $academyCss);
        $this->assertMatchesRegularExpression('/@media\s*\(prefers-reduced-motion:\s*reduce\)\s*\{\s*html\s*\{\s*scroll-behavior:\s*auto;\s*\}\s*\}/s', $workbenchCss);

        // 3. Sticky-header anchor clearance across desktop/tablet/mobile breakpoints & print reset
        $this->assertStringContainsString('scroll-padding-top: 76px;', $academyCss);
        $this->assertMatchesRegularExpression('/@media\s*\(max-width:\s*1179px\)\s*\{\s*html\s*\{\s*scroll-padding-top:\s*124px;/s', $academyCss);
        $this->assertMatchesRegularExpression('/@media\s*\(max-width:\s*360px\)\s*\{\s*html\s*\{\s*scroll-padding-top:\s*152px;/s', $academyCss);
        $this->assertMatchesRegularExpression('/@media\s+print\s*\{(?:(?!@media).)*?html\s*\{\s*scroll-behavior:\s*auto;\s*scroll-padding-top:\s*0;\s*scrollbar-gutter:\s*auto;/s', $academyCss);

        $this->assertStringContainsString('scroll-padding-top: 164px;', $workbenchCss);
        $this->assertStringContainsString('html:has(.notification-labsolved)', $workbenchCss);
        $this->assertStringContainsString('scroll-padding-top: 216px;', $workbenchCss);
        $this->assertStringContainsString('scroll-padding-top: 232px;', $workbenchCss);
        $this->assertStringContainsString('scroll-padding-top: 288px;', $workbenchCss);
        $this->assertStringContainsString('scroll-padding-top: 284px;', $workbenchCss);
        $this->assertStringContainsString('scroll-padding-top: 368px;', $workbenchCss);
        $this->assertStringContainsString('scroll-padding-top: 364px;', $workbenchCss);
        $this->assertStringContainsString('scroll-padding-top: 476px;', $workbenchCss);
        $this->assertMatchesRegularExpression('/@media\s+print\s*\{\s*html\s*\{\s*scroll-behavior:\s*auto;\s*scroll-padding-top:\s*0;\s*scrollbar-gutter:\s*auto;/s', $workbenchCss);

        // 4. Nested scroll containment (overscroll-behavior) without pointer-events: none on iframes
        $this->assertStringContainsString('overscroll-behavior: contain;', $academyCss);
        $this->assertStringContainsString('overscroll-behavior-y: contain;', $academyCss);
        $this->assertStringContainsString('overscroll-behavior-x: contain;', $academyCss);
        $this->assertMatchesRegularExpression('/\.vla-form\s+textarea,\s*\.vla-learning-content\s+textarea\s*\{[^}]*overscroll-behavior-y:\s*contain;/s', $academyCss);
        $this->assertMatchesRegularExpression('/\.vla-learning-content\s+pre\s+code\s*\{[^}]*overflow-x:\s*visible\s*!important;/s', $academyCss);
        $this->assertMatchesRegularExpression('/\.vla-learning-content\s+table\.is-nonresponsive-table\s*\{[^}]*overflow-x:\s*auto;/s', $academyCss);
        $this->assertStringContainsString('.vla-learning-content .xss-cheat-sheet-table', $academyCss);

        $this->assertStringContainsString('overscroll-behavior: contain;', $workbenchCss);
        $this->assertStringContainsString('overscroll-behavior-y: contain;', $workbenchCss);
        $this->assertStringContainsString('overscroll-behavior-x: contain;', $workbenchCss);
        $this->assertDoesNotMatchRegularExpression('/iframe[^}]*pointer-events\s*:\s*none/i', $academyCss);
        $this->assertDoesNotMatchRegularExpression('/iframe[^}]*pointer-events\s*:\s*none/i', $workbenchCss);
        $this->assertStringNotContainsString('pointer-events: none', $academyCss);
        $this->assertStringNotContainsString('pointer-events: none', $workbenchCss);

        // 5. Scrollbar stability & Light/Dark theme-aware scrollbar styling with fallback & @supports(color-mix)
        $this->assertStringContainsString('scrollbar-gutter: stable;', $academyCss);
        $this->assertStringContainsString('scrollbar-width: thin;', $academyCss);
        $this->assertStringContainsString('scrollbar-color: var(--vla-scrollbar-thumb) var(--vla-scrollbar-track);', $academyCss);
        $this->assertStringContainsString('color-scheme: light;', $academyCss);
        $this->assertStringContainsString('color-scheme: dark;', $academyCss);
        $this->assertStringContainsString('--vla-scrollbar-track:', $academyCss);
        $this->assertStringContainsString('--vla-scrollbar-thumb: #8D8D95;', $academyCss);
        $this->assertStringContainsString('--vla-scrollbar-thumb: #6D757E;', $academyCss);
        $this->assertStringContainsString('--vla-scrollbar-code-thumb:', $academyCss);
        $this->assertStringContainsString('@supports (color: color-mix(', $academyCss);

        $this->assertStringContainsString('scrollbar-gutter: stable;', $workbenchCss);
        $this->assertStringContainsString('scrollbar-width: thin;', $workbenchCss);
        $this->assertStringContainsString('scrollbar-color: var(--lw-scrollbar-thumb) var(--lw-scrollbar-track);', $workbenchCss);
        $this->assertStringContainsString('color-scheme: light;', $workbenchCss);
        $this->assertStringContainsString('color-scheme: dark;', $workbenchCss);
        $this->assertStringContainsString('--lw-scrollbar-track:', $workbenchCss);
        $this->assertStringContainsString('--lw-scrollbar-thumb: #8D8D95;', $workbenchCss);
        $this->assertStringContainsString('--lw-scrollbar-thumb: #6D757E;', $workbenchCss);
        $this->assertStringContainsString('--lw-scrollbar-code-thumb:', $workbenchCss);
        $this->assertStringContainsString('@supports (color: color-mix(', $workbenchCss);

        // 6. Live SSR routes verify all 4 legacy_css files precede academy-modern.css with cache-busting ?v=filemtime and Zero-JS
        $academyVer = (string) filemtime(public_path('content/academy-modern.css'));
        $workbenchVer = (string) filemtime(public_path('content/lab-workbench.css'));

        foreach ([
            '/web-security/sql-injection' => '/content/pswebsecacademy.css',
            '/web-security/all-topics' => '/content/psgenerictheme.css',
            '/web-security/cross-site-scripting/cheat-sheet' => '/content/psacademy.css',
            '/web-security/learning-paths/sql-injection' => '/content/pslearningpaths.css',
        ] as $legacyRoute => $legacyCssFile) {
            $routeHtml = $this->get($legacyRoute)->assertOk()->getContent();
            $this->assertStringContainsString('data-theme="light"', $routeHtml);
            $this->assertStringContainsString("/content/academy-modern.css?v={$academyVer}", $routeHtml);
            $this->assertLessThan(
                strpos($routeHtml, '/content/academy-modern.css'),
                strpos($routeHtml, $legacyCssFile),
                "academy-modern.css must load after {$legacyCssFile} on {$legacyRoute}"
            );
            $this->assertStringNotContainsString('<script', strtolower($routeHtml));
        }

        $allLabsLightHtml = $this->get('/web-security/all-labs')->assertOk()->getContent();
        $this->assertStringContainsString('data-theme="light"', $allLabsLightHtml);
        $this->assertStringContainsString('class="nav-lhs"', $allLabsLightHtml);
        $this->assertStringContainsString('id="sql-injection"', $allLabsLightHtml);
        $this->assertStringContainsString("/content/academy-modern.css?v={$academyVer}", $allLabsLightHtml);

        $this->post('/preferences/theme', ['redirect_to' => '/web-security/sql-injection'])->assertRedirect('/web-security/sql-injection');
        $sqliDarkHtml = $this->get('/web-security/sql-injection')->assertOk()->getContent();
        $this->assertStringContainsString('data-theme="dark"', $sqliDarkHtml);
        $this->assertStringContainsString("/content/academy-modern.css?v={$academyVer}", $sqliDarkHtml);
        $this->assertStringNotContainsString('<script', strtolower($sqliDarkHtml));

        // Switch Academy theme back to light before launching workbench
        $this->post('/preferences/theme', ['redirect_to' => '/web-security/sql-injection'])->assertRedirect('/web-security/sql-injection');
        $this->assertStringContainsString('data-theme="light"', $this->get('/web-security/sql-injection')->assertOk()->getContent());

        // 7. Live Lab Workbench light, dark, solved, control, and expired views serve cache-busted CSS and Zero-JS
        $learner = User::where('email', 'user@secdevlab.local')->firstOrFail();
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();
        $launchRes = $this->actingAs($learner)->get('/academy/labs/launch/'.$sqliLab->id);
        $labPath = (string) parse_url((string) $launchRes->headers->get('Location'), PHP_URL_PATH);
        $labToken = substr($labPath, 5);

        $labLightHtml = $this->get($labPath)->assertOk()->getContent();
        $this->assertStringContainsString('data-theme="light"', $labLightHtml);
        $this->assertStringContainsString('class="sdl-command-header"', $labLightHtml);
        $this->assertStringContainsString('class="notification-labsolved-hidden"', $labLightHtml);
        $this->assertStringContainsString("/content/lab-workbench.css?v={$workbenchVer}", $labLightHtml);
        $this->assertStringNotContainsString('<script', strtolower($labLightHtml));

        $controlHtml = $this->actingAs($learner)->get("/academy/labs/session/{$labToken}/control")->assertOk()->getContent();
        $this->assertStringContainsString("/content/academy-modern.css?v={$academyVer}", $controlHtml);
        $this->assertStringNotContainsString('<script', strtolower($controlHtml));

        $this->post($labPath.'/_theme')->assertRedirect($labPath);
        $labDarkHtml = $this->get($labPath)->assertOk()->getContent();
        $this->assertStringContainsString('data-theme="dark"', $labDarkHtml);
        $this->assertStringContainsString("/content/lab-workbench.css?v={$workbenchVer}", $labDarkHtml);
        $this->assertStringNotContainsString('<script', strtolower($labDarkHtml));

        // Solve lab to confirm active solved banner class used by html:has(.notification-labsolved)
        $labSolvedHtml = $this->get($labPath.'?category='.urlencode("Gifts' OR 1=1--"))->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $labSolvedHtml);
        $this->assertStringNotContainsString('<script', strtolower($labSolvedHtml));

        $labSession = LabSession::findByToken($labToken);
        $this->assertNotNull($labSession);
        $labSession->expires_at = now()->subMinute();
        $labSession->save();

        $expiredHtml = $this->get($labPath)->assertStatus(410)->getContent();
        $this->assertStringContainsString('data-theme="dark"', $expiredHtml);
        $this->assertStringContainsString("/content/lab-workbench.css?v={$workbenchVer}", $expiredHtml);
        $this->assertStringNotContainsString('<script', strtolower($expiredHtml));
    }
}
