<?php

namespace Tests\Feature;

use App\Models\CveArticle;
use App\Models\Lab;
use App\Models\LabSession;
use App\Models\LabUploadedFile;
use App\Models\User;
use App\Services\WidgetRenderer;
use Database\Seeders\CatalogSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthAndMultiUserIsolationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        WidgetRenderer::clearRuntimeCache();
        $this->seed([UserSeeder::class, CatalogSeeder::class]);
    }

    public function test_seeded_owner_and_demo_user_exist_and_public_registration_locks_role_to_user(): void
    {
        $owner = User::where('email', 'owner@secdevlab.local')->first();
        $demoUser = User::where('email', 'user@secdevlab.local')->first();

        $this->assertNotNull($owner);
        $this->assertTrue($owner->isOwner());
        $this->assertNotNull($demoUser);
        $this->assertTrue($demoUser->isUser());

        // Attempt mass-assignment privilege escalation during registration
        $this->post('/users/register', [
            'name' => 'Attacker User',
            'email' => 'hacker@secdevlab.local',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'role' => 'owner',
        ])->assertRedirect('/web-security/dashboard');

        $registered = User::where('email', 'hacker@secdevlab.local')->firstOrFail();
        $this->assertSame(User::ROLE_USER, $registered->role);
        $this->assertFalse($registered->isOwner());
    }

    public function test_user_seeder_migrates_legacy_vulnlab_demo_accounts_to_secdevlab_preserving_progress(): void
    {
        // Case 1: Only legacy @vulnlab.local demo accounts exist with progress/authored content
        User::query()->delete();

        $legacyOwner = new User([
            'name' => 'Old Owner',
            'email' => 'owner@vulnlab.local',
            'password' => 'owner12345',
        ]);
        $legacyOwner->role = User::ROLE_OWNER;
        $legacyOwner->save();

        $legacyUser = new User([
            'name' => 'Old User',
            'email' => 'user@vulnlab.local',
            'password' => 'user12345',
        ]);
        $legacyUser->role = User::ROLE_USER;
        $legacyUser->save();

        $lab = Lab::orderBy('sort_order')->firstOrFail();
        $session = LabSession::forUserAndLab($legacyUser->id, $lab->id);
        $session->solved = true;
        $session->save();

        $cve = CveArticle::create([
            'cve_id' => 'CVE-2026-77777',
            'slug' => 'cve-2026-77777',
            'cve_year' => 2026,
            'title' => 'Legacy Author Preserved CVE',
            'severity' => 'HIGH',
            'status' => 'published',
            'author_id' => $legacyOwner->id,
        ]);

        $this->seed(UserSeeder::class);

        $this->assertNull(User::where('email', 'owner@vulnlab.local')->first());
        $this->assertNull(User::where('email', 'user@vulnlab.local')->first());

        $migratedOwner = User::where('email', 'owner@secdevlab.local')->firstOrFail();
        $migratedUser = User::where('email', 'user@secdevlab.local')->firstOrFail();
        $this->assertSame($legacyOwner->id, $migratedOwner->id);
        $this->assertSame($legacyUser->id, $migratedUser->id);
        $this->assertTrue($migratedOwner->isOwner());
        $this->assertTrue($migratedUser->isUser());
        $this->assertTrue(Hash::check('owner12345', $migratedOwner->password));
        $this->assertTrue(Hash::check('user12345', $migratedUser->password));
        $this->assertTrue(LabSession::where('user_id', $migratedUser->id)->where('lab_id', $lab->id)->where('solved', true)->exists());
        $this->assertSame($migratedOwner->id, $cve->fresh()->author_id);

        // Case 2: Both legacy @vulnlab.local and new @secdevlab.local exist with overlapping & distinct sessions/files
        $secondLab = Lab::where('id', '!=', $lab->id)->orderBy('sort_order')->firstOrFail();
        $thirdLab = Lab::whereNotIn('id', [$lab->id, $secondLab->id])->orderBy('sort_order')->firstOrFail();

        // Pre-existing unsolved stub & mixed-case uploaded file on @secdevlab.local account
        $unsolvedAccountSession = LabSession::forUserAndLab($migratedUser->id, $thirdLab->id);
        $unsolvedAccountSession->solved = false;
        $unsolvedAccountSession->save();

        LabUploadedFile::create([
            'user_id' => $migratedUser->id,
            'lab_id' => $thirdLab->id,
            'storage_key' => 'avatars/CaseCheck.txt',
            'content' => 'new-account-file',
            'content_type' => 'text/plain',
        ]);

        $duplicateLegacyUser = new User([
            'name' => 'Duplicate Legacy',
            'email' => 'user@vulnlab.local',
            'password' => 'user12345',
        ]);
        $duplicateLegacyUser->role = User::ROLE_USER;
        $duplicateLegacyUser->save();

        $overlapSession = LabSession::forUserAndLab($duplicateLegacyUser->id, $lab->id);
        $overlapSession->solved = false;
        $overlapSession->save();

        $legacySolvedTime = now()->subMinutes(15);
        $legacyWinsOverlap = LabSession::forUserAndLab($duplicateLegacyUser->id, $thirdLab->id);
        $legacyWinsOverlap->solved = true;
        $legacyWinsOverlap->solved_at = $legacySolvedTime;
        $legacyWinsOverlap->exfiltrated = true;
        $legacyWinsOverlap->save();

        $extraSession = LabSession::forUserAndLab($duplicateLegacyUser->id, $secondLab->id);
        $extraSession->solved = true;
        $extraSession->save();

        LabUploadedFile::create([
            'user_id' => $duplicateLegacyUser->id,
            'lab_id' => $secondLab->id,
            'storage_key' => 'avatars/test.txt',
            'content' => 'hello',
            'content_type' => 'text/plain',
        ]);
        LabUploadedFile::create([
            'user_id' => $duplicateLegacyUser->id,
            'lab_id' => $thirdLab->id,
            'storage_key' => 'avatars/casecheck.txt',
            'content' => 'legacy-colliding-case',
            'content_type' => 'text/plain',
        ]);

        $this->seed(UserSeeder::class);

        $this->assertNull(User::where('email', 'user@vulnlab.local')->first());
        $this->assertTrue(LabSession::where('user_id', $migratedUser->id)->where('lab_id', $lab->id)->where('solved', true)->exists());
        $this->assertTrue(LabSession::where('user_id', $migratedUser->id)->where('lab_id', $secondLab->id)->where('solved', true)->exists());
        $this->assertTrue(LabSession::where('user_id', $migratedUser->id)->where('lab_id', $thirdLab->id)->where('solved', true)->where('exfiltrated', true)->exists());
        $this->assertTrue(LabUploadedFile::where('user_id', $migratedUser->id)->where('lab_id', $secondLab->id)->where('storage_key', 'avatars/test.txt')->exists());
        $this->assertSame(1, LabUploadedFile::where('user_id', $migratedUser->id)->where('lab_id', $thirdLab->id)->count());
    }

    public function test_bilingual_locale_and_theme_switchers_persist_in_session_without_js(): void
    {
        // Default theme is light (Clean Light Editorial), default locale is en
        $defaultHtml = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('data-theme="light"', $defaultHtml);
        $this->assertStringContainsString('Explore All Labs', $defaultHtml);
        $this->assertStringNotContainsString('>1. Study Vulnerability Theory<', $defaultHtml);
        $this->assertStringContainsString('>Study Vulnerability Theory<', $defaultHtml);
        $this->assertMatchesRegularExpression('#/content/fonts/fonts\.css\?v=\d+#', $defaultHtml);
        $this->assertMatchesRegularExpression('#/content/academy-modern\.css\?v=\d+#', $defaultHtml);
        $this->assertLessThan(
            strpos($defaultHtml, '/content/academy-modern.css'),
            strpos($defaultHtml, '/content/fonts/fonts.css'),
            'Self-hosted fonts.css must load before academy-modern.css'
        );
        $this->assertStringNotContainsString('fonts.googleapis.com', $defaultHtml);
        $this->assertStringNotContainsString('fonts.gstatic.com', $defaultHtml);

        // Learning page using legacy_css also loads self-hosted fonts.css before academy-modern.css
        $topicHtml = $this->get('/web-security/sql-injection')->assertOk()->getContent();
        $this->assertMatchesRegularExpression('#/content/fonts/fonts\.css\?v=\d+#', $topicHtml);
        $this->assertLessThan(
            strpos($topicHtml, '/content/academy-modern.css'),
            strpos($topicHtml, '/content/fonts/fonts.css'),
            'Learning pages must load self-hosted fonts.css before academy-modern.css'
        );
        $this->assertStringNotContainsString('fonts.googleapis.com', $topicHtml);
        $this->assertStringNotContainsString('fonts.gstatic.com', $topicHtml);

        $fontsCssPath = public_path('content/fonts/fonts.css');
        $this->assertFileExists($fontsCssPath);
        $fontsCss = (string) file_get_contents($fontsCssPath);
        $this->assertStringContainsString("font-family: 'Inter'", $fontsCss);
        $this->assertStringContainsString("font-family: 'Plus Jakarta Sans'", $fontsCss);
        $this->assertStringContainsString("font-family: 'JetBrains Mono'", $fontsCss);
        $this->assertDoesNotMatchRegularExpression('#https?://|//#i', $fontsCss);
        preg_match_all("#url\('(/content/fonts/[^']+\.woff2)'\)#", $fontsCss, $woffMatches);
        $this->assertCount(11, $woffMatches[1]);
        foreach ($woffMatches[1] as $fontWebPath) {
            $fontDiskPath = public_path(ltrim($fontWebPath, '/'));
            $this->assertFileExists($fontDiskPath, "Missing self-hosted webfont binary: {$fontWebPath}");
            $bytes = (string) file_get_contents($fontDiskPath);
            $this->assertGreaterThan(1024, strlen($bytes), "Webfont binary looks truncated: {$fontWebPath}");
            $this->assertSame('wOF2', substr($bytes, 0, 4), "Invalid WOFF2 magic header in {$fontWebPath}");
        }

        // Static web server front-controller rules allow direct 200 delivery of /content/fonts/*
        $this->assertStringContainsString('is_file($publicPath.$uri)', (string) file_get_contents(base_path('server.php')));
        $this->assertStringContainsString('RewriteCond %{REQUEST_FILENAME} !-f', (string) file_get_contents(public_path('.htaccess')));

        $academyCss = (string) file_get_contents(public_path('content/academy-modern.css'));
        $this->assertStringContainsString('--vla-btn-primary-bg:', $academyCss);
        $this->assertStringContainsString('.dashboard-progress-card--summary', $academyCss);
        $this->assertStringContainsString('.vla-field--span2', $academyCss);
        $this->assertStringContainsString('@media (max-width: 1179px)', $academyCss);
        $this->assertStringContainsString('.vla-learning-content .tg-wrap .tg th', $academyCss);
        $this->assertDoesNotMatchRegularExpression('/font-weight:\s*800\b/', $academyCss);

        // Switch locale to Indonesian (id)
        $this->post('/preferences/locale', ['locale' => 'id', 'redirect_to' => '/'])
            ->assertRedirect('/');
        $idHtml = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="id"', $idHtml);
        $this->assertStringContainsString('Jelajahi Semua Lab', $idHtml);
        $this->assertStringContainsString('data-theme="light"', $idHtml);
        $this->assertStringNotContainsString('data-theme="dark"', $idHtml);
        $this->assertStringNotContainsString('/preferences/theme', $idHtml);

        // Light-only theme holds even if stale dark-theme session or cookie is sent, and /preferences/theme is 404
        $this->post('/preferences/theme', ['redirect_to' => '/'])->assertNotFound();
        $this->get('/preferences/theme')->assertNotFound();

        $forcedRes = $this->withSession(['ui_theme' => 'dark'])
            ->withUnencryptedCookie('secdevlab_theme', 'dark')
            ->get('/');
        $forcedRes->assertOk();
        $forcedRes->assertCookieExpired('secdevlab_theme');
        $forcedLightHtml = $forcedRes->getContent();
        $this->assertStringContainsString('data-theme="light"', $forcedLightHtml);
        $this->assertStringNotContainsString('data-theme="dark"', $forcedLightHtml);
        $this->assertStringNotContainsString('<script', strtolower($forcedLightHtml));
        $this->assertStringNotContainsString('[data-theme="dark"]', $academyCss);

        // Footer social icons appear on Academy pages, omitted on Login & Register
        $this->assertStringContainsString('<footer class="vla-footer', $defaultHtml);
        $this->assertStringContainsString('https://github.com/12Ndraaa/SecDevLab', $defaultHtml);
        $this->assertStringContainsString('https://www.instagram.com/axlendraa/', $defaultHtml);
        $this->assertStringContainsString('https://www.linkedin.com/in/axlendra-haris-sanjaya-19b8a6372/', $defaultHtml);
        $this->assertStringNotContainsString('Uji Kompetensi Keahlian', $idHtml);
        $this->assertStringNotContainsString('Competency Project', $defaultHtml);

        $loginHtml = $this->get('/users')->assertOk()->getContent();
        $this->assertStringNotContainsString('<footer', $loginHtml);
        $this->assertStringNotContainsString('vla-footer', $loginHtml);

        $registerHtml = $this->get('/users/register')->assertOk()->getContent();
        $this->assertStringNotContainsString('<footer', $registerHtml);
        $this->assertStringNotContainsString('vla-footer', $registerHtml);

        // Failed login & registration redirects also keep footer omitted
        $failedLoginHtml = $this->from('/users')->followingRedirects()->post('/users', [
            'email' => 'owner@secdevlab.local',
            'password' => 'wrong-password',
        ])->assertOk()->getContent();
        $this->assertStringNotContainsString('<footer', $failedLoginHtml);
        $this->assertStringNotContainsString('vla-footer', $failedLoginHtml);

        $failedRegisterHtml = $this->from('/users/register')->followingRedirects()->post('/users/register', [
            'name' => '',
            'email' => 'bad-email',
            'password' => '123',
        ])->assertOk()->getContent();
        $this->assertStringNotContainsString('<footer', $failedRegisterHtml);
        $this->assertStringNotContainsString('vla-footer', $failedRegisterHtml);

        // Verify Owner pill contrast fix & footer preserved on authenticated account page
        $owner = User::where('email', 'owner@secdevlab.local')->firstOrFail();
        $ownerHtml = $this->actingAs($owner)->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('vla-account-pill', $ownerHtml);
        $this->assertStringContainsString('vla-role-pill--owner', $ownerHtml);
        $this->assertStringNotContainsString('vla-btn vla-btn--accent vla-btn--sm" href="/users/youraccount/personaldetails"', $ownerHtml);

        $accountHtml = $this->actingAs($owner)->get('/users/youraccount/personaldetails')->assertOk()->getContent();
        $this->assertStringContainsString('<footer class="vla-footer', $accountHtml);
        $this->assertStringContainsString('https://github.com/12Ndraaa/SecDevLab', $accountHtml);
    }

    public function test_guest_is_redirected_to_users_login_when_accessing_launcher_or_account_and_legacy_lab_env_is_blocked(): void
    {
        $lab = Lab::firstOrFail();

        // Legacy /lab-env/* endpoint is strictly blocked (404)
        $this->get("/lab-env/{$lab->id}")->assertNotFound();
        $this->get("/lab-env/{$lab->id}/exploit-server")->assertNotFound();

        $this->get("/academy/labs/launch/{$lab->id}")
            ->assertRedirect('/users?returnurl='.urlencode("/academy/labs/launch/{$lab->id}"));

        $this->get('/web-security/mystery-lab-challenge/launch')
            ->assertRedirect('/users?returnurl='.urlencode('/web-security/mystery-lab-challenge/launch'));

        $this->get('/users/youraccount/personaldetails')
            ->assertRedirect('/users?returnurl='.urlencode('/users/youraccount/personaldetails'));

        $this->get('/certificate')
            ->assertRedirect('/users?returnurl='.urlencode('/certificate'));
    }

    public function test_multi_user_registration_login_and_strict_per_user_solved_isolation_in_mysql(): void
    {
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();

        // Register User A -> redirects to authenticated lab launcher
        $regRes = $this->post('/users/register', [
            'name' => 'Alice Pentester',
            'email' => 'alice@academy.local',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'returnurl' => "/academy/labs/launch/{$sqliLab->id}",
        ]);
        $regRes->assertRedirect("/academy/labs/launch/{$sqliLab->id}");
        $this->assertAuthenticated();

        $launchAlice = $this->get("/academy/labs/launch/{$sqliLab->id}");
        $aliceLabUrl = (string) parse_url((string) $launchAlice->headers->get('Location'), PHP_URL_PATH);
        $this->assertMatchesRegularExpression('#^/lab/[a-f0-9]{32}$#', $aliceLabUrl);

        // User A solves SQLi lab via exploit trigger on her isolated capability URL
        $solveRes = $this->get($aliceLabUrl.'?category='.urlencode("Gifts' OR 1=1--"));
        $solveRes->assertOk();
        $this->assertStringContainsString('class="notification-labsolved"', $solveRes->getContent());

        // Verify User A sees 1 solved lab on All Labs and Account page
        $allLabsAlice = $this->get('/web-security/all-labs')->assertOk()->getContent();
        $this->assertStringContainsString('(1 solved)', $allLabsAlice);
        $this->assertSame(1, substr_count($allLabsAlice, 'class="widgetcontainer-lab-link is-solved"'));

        $accountAlice = $this->get('/users/youraccount/personaldetails')->assertOk()->getContent();
        $this->assertStringContainsString('1 / 273', $accountAlice);

        // Logout User A
        $this->post('/users/logout')->assertRedirect('/users');
        $this->assertGuest();

        // Guest sees 0 solved on All Labs
        $allLabsGuest = $this->get('/web-security/all-labs')->assertOk()->getContent();
        $this->assertStringContainsString('(0 solved)', $allLabsGuest);
        $this->assertSame(0, substr_count($allLabsGuest, 'class="widgetcontainer-lab-link is-solved"'));

        // Login as User B -> gets a DIFFERENT capability token & unsolved state
        $userB = User::create([
            'name' => 'Bob Researcher',
            'email' => 'bob@academy.local',
            'password' => 'secret123',
        ]);
        $this->post('/users', [
            'email' => $userB->email,
            'password' => 'secret123',
        ])->assertRedirect('/web-security/dashboard');

        $allLabsBob = $this->get('/web-security/all-labs')->assertOk()->getContent();
        $this->assertStringContainsString('(0 solved)', $allLabsBob);
        $this->assertSame(0, substr_count($allLabsBob, 'class="widgetcontainer-lab-link is-solved"'));

        $launchBob = $this->get("/academy/labs/launch/{$sqliLab->id}");
        $bobLabUrl = (string) parse_url((string) $launchBob->headers->get('Location'), PHP_URL_PATH);
        $this->assertMatchesRegularExpression('#^/lab/[a-f0-9]{32}$#', $bobLabUrl);
        $this->assertNotSame($aliceLabUrl, $bobLabUrl);

        $bobEnv = $this->get($bobLabUrl)->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $bobEnv);
    }
}
