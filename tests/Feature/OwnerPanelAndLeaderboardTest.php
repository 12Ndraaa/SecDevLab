<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\CveArticle;
use App\Models\Lab;
use App\Models\LabSession;
use App\Models\User;
use App\Services\WidgetRenderer;
use Database\Seeders\CatalogSeeder;
use Database\Seeders\CveSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OwnerPanelAndLeaderboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        WidgetRenderer::clearRuntimeCache();
        $this->seed([UserSeeder::class, CatalogSeeder::class, CveSeeder::class]);
    }

    public function test_owner_routes_enforce_strict_role_authorization(): void
    {
        $this->get('/owner')->assertRedirect('/users?returnurl='.urlencode('/owner'));

        $learner = User::where('role', User::ROLE_USER)->firstOrFail();
        $this->actingAs($learner)->get('/owner')->assertForbidden();
        $this->actingAs($learner)->get('/owner/cves')->assertForbidden();
        $this->actingAs($learner)->get('/owner/categories')->assertForbidden();
        $this->actingAs($learner)->get('/owner/labs')->assertForbidden();
        $this->actingAs($learner)->get('/owner/users')->assertForbidden();

        $owner = User::where('role', User::ROLE_OWNER)->firstOrFail();
        $this->actingAs($owner)->get('/owner')->assertOk()->assertSee('Owner Control Panel');
    }

    public function test_owner_crud_for_cve_category_lab_and_user_progress_reset_plus_leaderboard_and_certificate(): void
    {
        $owner = User::where('role', User::ROLE_OWNER)->firstOrFail();
        $learner = User::where('role', User::ROLE_USER)->firstOrFail();

        // 1. Owner creates a Category
        $this->actingAs($owner)->post('/owner/categories', [
            'id' => 'custom-api-flaws',
            'title' => 'Custom API Flaws',
            'topic_route' => '/web-security/api-testing',
            'sort_order' => 99,
        ])->assertRedirect('/owner/categories');
        $this->assertDatabaseHas('categories', ['id' => 'custom-api-flaws', 'title' => 'Custom API Flaws']);

        // 2. Owner creates a Lab inside that Category
        $this->actingAs($owner)->post('/owner/labs', [
            'category_id' => 'custom-api-flaws',
            'title' => 'Custom API Parameter Bypass',
            'href' => '/web-security/api-testing/lab-custom-api-bypass',
            'difficulty' => 'PRACTITIONER',
            'sort_order' => 1,
            'description_html' => 'Exploit custom API parameter flaw.',
            'hint_text' => 'Try submitting the official token.',
            'solution_text' => 'Submit custom_api_bypass_token.',
            'theme' => 'ecommerce',
            'solution_payloads' => 'custom_api_bypass_token',
            'has_my_account' => '1',
        ])->assertRedirect('/owner/labs');

        $customLab = Lab::where('href', '/web-security/api-testing/lab-custom-api-bypass')->firstOrFail();
        $this->assertSame(1, Category::findOrFail('custom-api-flaws')->lab_count);

        // 3. Owner creates a CVE linked to the custom Category & Lab
        $this->actingAs($owner)->post('/owner/cves', [
            'cve_id' => 'CVE-2026-54321',
            'cve_year' => 2026,
            'category_id' => 'custom-api-flaws',
            'lab_id' => $customLab->id,
            'title' => 'Custom API Gateway Auth Flaw',
            'cvss_score' => 8.6,
            'severity' => 'HIGH',
            'affected_product' => 'CustomGateway 2.x',
            'summary' => 'Bypass auth via custom header.',
            'technical_analysis' => 'Detailed technical analysis.',
            'poc_content' => 'GET /api/admin HTTP/1.1',
            'mitigation' => 'Upgrade to 2.1.',
            'references_text' => "https://example.local/advisory\nhttps://cve.mitre.org/",
            'is_hot' => '1',
            'status' => 'published',
        ])->assertRedirect('/owner/cves');

        $createdCve = CveArticle::where('cve_id', 'CVE-2026-54321')->firstOrFail();
        $this->get("/cve/{$createdCve->slug}")->assertOk()->assertSee($customLab->title);

        // 4. Learner solves an Apprentice SQLi lab + the custom Practitioner lab (plus hyphenated custom payload test) -> verify Dynamic Leaderboard & Certificate
        $sqliLab = Lab::where('category_id', 'sql-injection')->where('difficulty', 'APPRENTICE')->firstOrFail();
        $sqliLaunch = $this->actingAs($learner)->get("/academy/labs/launch/{$sqliLab->id}");
        $sqliUrl = (string) parse_url((string) $sqliLaunch->headers->get('Location'), PHP_URL_PATH);
        $this->actingAs($learner)->get($sqliUrl.'?category='.urlencode("Gifts' OR 1=1--"))->assertOk();

        $customLaunch = $this->actingAs($learner)->get("/academy/labs/launch/{$customLab->id}");
        $customUrl = (string) parse_url((string) $customLaunch->headers->get('Location'), PHP_URL_PATH);
        $this->actingAs($learner)->get($customUrl.'?search=custom_api_bypass_token')->assertOk();

        // Owner updates custom lab with hyphenated / brace custom payload -> must still solve reliably
        $this->actingAs($owner)->put("/owner/labs/{$customLab->id}", [
            'category_id' => 'custom-api-flaws',
            'title' => 'Custom API Parameter Bypass',
            'href' => '/web-security/api-testing/lab-custom-api-bypass',
            'difficulty' => 'PRACTITIONER',
            'sort_order' => 1,
            'description_html' => 'Exploit custom API parameter flaw.',
            'theme' => 'ecommerce',
            'solution_payloads' => 'FLAG{hyphen-bypass-2026}',
            'has_my_account' => '1',
        ])->assertRedirect('/owner/labs');
        $resetCustom = $this->actingAs($learner)->post("/academy/labs/{$customLab->id}/reset");
        $resetCustomUrl = (string) parse_url((string) $resetCustom->headers->get('Location'), PHP_URL_PATH);
        $this->assertNotSame($customUrl, $resetCustomUrl);
        $customSolved = $this->actingAs($learner)->get($resetCustomUrl.'?search='.urlencode('FLAG{hyphen-bypass-2026}'))->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $customSolved);

        // 1 Apprentice (10 pts) + 1 Practitioner (25 pts) = 35 pts
        $lbHtml = $this->actingAs($learner)->get('/web-security/hall-of-fame')->assertOk()->getContent();
        $this->assertStringContainsString('Demo Learner', $lbHtml);
        $this->assertStringContainsString('35 pts', $lbHtml);
        $this->assertStringNotContainsString('<script', strtolower($lbHtml));

        // Certificate & Printable Report
        $certHtml = $this->actingAs($learner)->get('/certificate?mode=certificate')->assertOk()->getContent();
        $this->assertStringContainsString('Demo Learner', $certHtml);
        $this->assertStringContainsString('35 Points', $certHtml);
        $this->assertStringContainsString('VLA-', $certHtml);

        $reportHtml = $this->actingAs($learner)->get('/certificate?mode=report')->assertOk()->getContent();
        $this->assertStringContainsString('Custom API Parameter Bypass', $reportHtml);
        $this->assertStringNotContainsString('<script', strtolower($reportHtml));

        // 5. Owner resets learner's progress -> leaderboard drops back to 0 pts
        $this->actingAs($owner)->post("/owner/users/{$learner->id}/reset-progress")->assertRedirect();
        $this->assertSame(0, LabSession::where('user_id', $learner->id)->where('solved', true)->count());

        $lbAfterReset = $this->actingAs($owner)->get('/leaderboard')->assertOk()->getContent();
        $this->assertStringNotContainsString('35 pts', $lbAfterReset);

        // 6. Owner edits & deletes CVE, Lab, Category
        $this->actingAs($owner)->put("/owner/cves/{$createdCve->id}", [
            'cve_id' => 'CVE-2026-54321',
            'cve_year' => 2026,
            'category_id' => 'custom-api-flaws',
            'lab_id' => $customLab->id,
            'title' => 'Updated Custom API Gateway Flaw',
            'cvss_score' => 9.0,
            'severity' => 'CRITICAL',
            'affected_product' => 'CustomGateway 2.x',
            'summary' => 'Updated summary.',
            'status' => 'published',
        ])->assertRedirect('/owner/cves');
        $this->assertDatabaseHas('cve_articles', ['id' => $createdCve->id, 'title' => 'Updated Custom API Gateway Flaw']);

        $this->actingAs($owner)->delete("/owner/cves/{$createdCve->id}")->assertRedirect('/owner/cves');
        $this->actingAs($owner)->delete("/owner/labs/{$customLab->id}")->assertRedirect('/owner/labs');
        $this->actingAs($owner)->delete('/owner/categories/custom-api-flaws')->assertRedirect('/owner/categories');
        $this->assertDatabaseMissing('categories', ['id' => 'custom-api-flaws']);
    }

    public function test_owner_user_management_guards_and_all_owner_views_render_without_js(): void
    {
        $owner = User::where('role', User::ROLE_OWNER)->firstOrFail();

        // All owner pages render cleanly without <script>
        foreach (['/owner', '/owner/cves', '/owner/cves/create', '/owner/categories', '/owner/categories/create', '/owner/labs', '/owner/labs/create', '/owner/users', '/owner/users/create'] as $url) {
            $res = $this->actingAs($owner)->get($url);
            $res->assertOk("Failed owner view {$url}");
            $this->assertStringNotContainsString('<script', strtolower($res->getContent()));
        }

        // Self-demote & self-delete protections
        $this->actingAs($owner)->put("/owner/users/{$owner->id}", [
            'name' => $owner->name,
            'email' => $owner->email,
            'role' => 'user',
        ])->assertSessionHasErrors('role');

        $this->actingAs($owner)->delete("/owner/users/{$owner->id}")->assertSessionHas('error');
        $this->assertDatabaseHas('users', ['id' => $owner->id, 'role' => 'owner']);

        // Owner creates, updates, and deletes another user
        $this->actingAs($owner)->post('/owner/users', [
            'name' => 'Student Two',
            'email' => 'Student2@SecDevLab.Local',
            'password' => 'secret123',
            'role' => 'user',
        ])->assertRedirect('/owner/users');

        $created = User::where('email', 'student2@secdevlab.local')->firstOrFail();
        $this->actingAs($owner)->get("/owner/users/{$created->id}/edit")->assertOk();
        $this->actingAs($owner)->put("/owner/users/{$created->id}", [
            'name' => 'Student Two Updated',
            'email' => 'student2@secdevlab.local',
            'role' => 'owner',
        ])->assertRedirect('/owner/users');
        $this->assertSame('owner', $created->fresh()->role);

        $this->actingAs($owner)->delete("/owner/users/{$created->id}")->assertRedirect('/owner/users');
        $this->assertDatabaseMissing('users', ['id' => $created->id]);

        // Duplicate lowercase CVE ID fails cleanly via validation rather than DB crash
        $this->actingAs($owner)->post('/owner/cves', [
            'cve_id' => 'cve-2025-29927',
            'cve_year' => 2025,
            'title' => 'Duplicate test',
            'severity' => 'HIGH',
            'status' => 'published',
        ])->assertSessionHasErrors('cve_id');

        // Print stylesheet & light-only contrast rules check
        $css = file_get_contents(public_path('content/academy-modern.css'));
        $this->assertStringContainsString('@media print', $css);
        $this->assertStringContainsString('[data-theme="light"]', $css);
        $this->assertStringNotContainsString('[data-theme="dark"]', $css);
        $this->assertStringContainsString('.container-cards-white-medium-space-between', $css);

        // Dynamic Owner-created category topic route renders 200 OK instead of 404
        $this->actingAs($owner)->post('/owner/categories', [
            'id' => 'cloud-misconfig',
            'title' => 'Cloud Misconfigurations',
            'topic_route' => '/web-security/cloud-misconfig',
            'sort_order' => 101,
        ])->assertRedirect('/owner/categories');
        $this->get('/web-security/cloud-misconfig')->assertOk()->assertSee('Cloud Misconfigurations');

        // Uppercase email login & /\ open redirect defense
        $this->post('/users/logout')->assertRedirect('/users');
        $this->post('/users', [
            'email' => 'User@SecDevLab.Local',
            'password' => 'user12345',
            'returnurl' => '/\\evil.example',
        ])->assertRedirect('/web-security/dashboard');
    }
}
