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
            '/cve',
            '/cve/'.$cve->slug,
            '/web-security/dashboard',
            '/web-security/hall-of-fame',
            $sqliLab->href,
            '/users',
            '/users/register',
        ];

        foreach ($academyPaths as $path) {
            $html = $this->get($path)->assertOk()->getContent();
            $this->assertStringNotContainsStringIgnoringCase('rel="icon"', $html, "Unexpected rel=icon on {$path}");
            $this->assertStringNotContainsStringIgnoringCase('favicon.ico', $html, "Unexpected favicon.ico on {$path}");
            $this->assertStringNotContainsString('<script', strtolower($html), "Unexpected <script on {$path}");
        }

        // Launch lab & inspect active + expired views for favicon removal
        $launchRes = $this->actingAs($learner)->get('/academy/labs/launch/'.$sqliLab->id);
        $labPath = (string) parse_url((string) $launchRes->headers->get('Location'), PHP_URL_PATH);
        $labHtml = $this->get($labPath)->assertOk()->getContent();
        $this->assertStringNotContainsStringIgnoringCase('rel="icon"', $labHtml);
        $this->assertStringNotContainsStringIgnoringCase('favicon.ico', $labHtml);
        $this->assertStringNotContainsString('<script', strtolower($labHtml));

        $token = substr($labPath, 5);
        $session = LabSession::findByToken($token);
        $this->assertNotNull($session);
        $session->expires_at = now()->subMinute();
        $session->save();

        $expiredHtml = $this->get($labPath)->assertStatus(410)->getContent();
        $this->assertStringNotContainsStringIgnoringCase('rel="icon"', $expiredHtml);
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

        // Dark-mode archetype badge contrast uses button tokens instead of #FFFFFF
        $this->assertStringContainsString('.sdl-command-brand__badge {', $workbenchCss);
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

        $certPageId = $this->get('/web-security/certification')->assertOk()->getContent();
        $this->assertStringContainsString('Sertifikasi keamanan web', $certPageId);
        $this->assertStringNotContainsString('What is a SecDevLab Certified Practitioner?', $certPageId);

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

        $repJson = $this->get($gqlSyncPath, ['X-Academy-Repeater' => '1'])->assertOk()->json();
        $this->assertStringNotContainsString("\u{2014}", (string) ($repJson['status'] ?? ''));
        $this->assertStringContainsString('Permintaan diproses', (string) ($repJson['status'] ?? ''));

        // Indonesian AI chat reply & sender label
        $aiLab = Lab::where('category_id', 'web-llm-attacks')->orderBy('sort_order')->firstOrFail();
        $aiSyncPath = (string) parse_url((string) $this->get('/academy/labs/launch/'.$aiLab->id)->headers->get('Location'), PHP_URL_PATH);
        $aiChatRes = $this->post($aiSyncPath.'/chat', ['message' => 'delete_user carlos'])->assertOk()->getContent();
        $this->assertStringContainsString('Pengguna carlos dihapus.', $aiChatRes);
        $this->assertStringContainsString('<strong>Anda:</strong>', $aiChatRes);

        // Toggle locale back inside one lab and verify OTHER active lab sessions + Academy session stay synced
        $this->post($aiSyncPath.'/_locale', ['ui_locale' => 'en'])->assertRedirect($aiSyncPath);
        $this->assertStringContainsString('<html lang="en"', $this->get($gqlSyncPath)->assertOk()->getContent());
        $homeBackEn = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="en"', $homeBackEn);
        $this->assertStringContainsString('Explore All Labs', $homeBackEn);

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
}
