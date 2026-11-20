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
        // Default theme is dark, default locale is en
        $defaultHtml = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('data-theme="dark"', $defaultHtml);
        $this->assertStringContainsString('Explore All Labs', $defaultHtml);

        // Switch locale to Indonesian (id)
        $this->post('/preferences/locale', ['locale' => 'id', 'redirect_to' => '/'])
            ->assertRedirect('/');
        $idHtml = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('<html lang="id"', $idHtml);
        $this->assertStringContainsString('Jelajahi Semua Lab', $idHtml);

        // Switch theme to light
        $this->post('/preferences/theme', ['redirect_to' => '/'])
            ->assertRedirect('/');
        $lightHtml = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('data-theme="light"', $lightHtml);
        $this->assertStringNotContainsString('<script', strtolower($lightHtml));
    }

    public function test_guest_is_redirected_to_users_login_when_accessing_lab_env_or_account(): void
    {
        $lab = Lab::firstOrFail();

        $this->get("/lab-env/{$lab->id}")
            ->assertRedirect('/users?returnurl='.urlencode("/lab-env/{$lab->id}"));

        $this->get("/academy/labs/launch/{$lab->id}")
            ->assertRedirect('/users?returnurl='.urlencode("/academy/labs/launch/{$lab->id}"));

        $this->get('/users/youraccount/personaldetails')
            ->assertRedirect('/users?returnurl='.urlencode('/users/youraccount/personaldetails'));

        $this->get('/certificate')
            ->assertRedirect('/users?returnurl='.urlencode('/certificate'));
    }

    public function test_multi_user_registration_login_and_strict_per_user_solved_isolation_in_mysql(): void
    {
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();

        // Register User A
        $regRes = $this->post('/users/register', [
            'name' => 'Alice Pentester',
            'email' => 'alice@academy.local',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'returnurl' => "/lab-env/{$sqliLab->id}",
        ]);
        $regRes->assertRedirect("/lab-env/{$sqliLab->id}");
        $this->assertAuthenticated();

        // User A solves SQLi lab via exploit trigger
        $solveRes = $this->get("/lab-env/{$sqliLab->id}?category=".urlencode("Gifts' OR 1=1--"));
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

        // Login as User B -> must see 0 solved and unsolved lab-env state
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

        $bobEnv = $this->get("/lab-env/{$sqliLab->id}")->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $bobEnv);
    }
}
