<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Lab;
use App\Models\Product;
use App\Services\WidgetRenderer;
use Database\Seeders\CatalogSeeder;
use Database\Seeders\CveSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AcademyCatalogAndPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        WidgetRenderer::clearRuntimeCache();
        $this->seed([UserSeeder::class, CatalogSeeder::class, CveSeeder::class]);
    }

    public function test_catalog_seeder_populates_exact_counts_and_profiles(): void
    {
        $this->assertSame(31, Category::count());
        $this->assertSame(273, Lab::count());
        $this->assertSame(61, Lab::where('difficulty', 'APPRENTICE')->count());
        $this->assertSame(173, Lab::where('difficulty', 'PRACTITIONER')->count());
        $this->assertSame(39, Lab::where('difficulty', 'EXPERT')->count());
        $this->assertSame(15, Product::count());
        $this->assertSame(6, BlogPost::count());

        $withProfile = Lab::whereNotNull('profile')->count();
        $this->assertSame(273, $withProfile);
    }

    public function test_new_academy_home_uses_app_name_and_has_zero_portswigger_corporate_routes(): void
    {
        $this->assertSame('SecDevLab', config('app.name'));

        $homeRes = $this->get('/');
        $homeRes->assertOk();
        $homeHtml = $homeRes->getContent();
        $this->assertStringContainsString('SecDevLab', $homeHtml);
        $this->assertStringContainsString(config('app.name'), $homeHtml);
        $this->assertStringNotContainsStringIgnoringCase('vulnlab', $homeHtml);
        $this->assertStringContainsString('/cve', $homeHtml);
        $this->assertStringContainsString('/web-security/all-labs', $homeHtml);
        $this->assertStringNotContainsString('<script', strtolower($homeHtml));

        $loginHtml = $this->get('/users')->assertOk()->getContent();
        $this->assertStringContainsString('owner@secdevlab.local', $loginHtml);
        $this->assertStringContainsString('user@secdevlab.local', $loginHtml);
        $this->assertStringNotContainsStringIgnoringCase('vulnlab', $loginHtml);

        $this->get('/home')->assertRedirect('/');

        foreach (['/burp', '/burp/pro', '/burp/releases', '/solutions', '/careers', '/research', '/support', '/about', '/customers'] as $removed) {
            $this->get($removed)->assertNotFound();
        }

        // Verify config & view fallbacks when APP_NAME is empty or omitted
        $originalAppName = config('app.name');
        try {
            config(['app.name' => '']);
            $fallbackHtml = $this->get('/')->assertOk()->getContent();
            $this->assertStringContainsString('SecDevLab', $fallbackHtml);
        } finally {
            config(['app.name' => $originalAppName]);
        }

        $this->assertSame('secdevlab-cache-', substr((string) config('cache.prefix'), 0, 16));
        $this->assertSame('secdevlab-session', config('session.cookie'));
        $this->assertSame('secdevlab-database-', config('database.redis.options.prefix'));
        $this->assertSame('SecDevLab', config('mail.from.name'));
        $this->assertSame('SecDevLab', config('logging.channels.slack.username'));

        // Verify external PortSwigger GitHub links & test handle in learning pages were not broken by rename
        $examHints = $this->get('/web-security/certification/exam-hints-and-guidance')->assertOk()->getContent();
        $this->assertStringContainsString('https://github.com/PortSwigger/http-request-smuggler', $examHints);
        $this->assertStringNotContainsString('https://github.com/SecDevLab/', $examHints);

        $racePage = $this->get('/web-security/race-conditions')->assertOk()->getContent();
        $this->assertStringContainsString('https://github.com/PortSwigger/bambdas/blob/main/CustomAction/ProbeForRaceCondition.bambda', $racePage);
        $this->assertStringNotContainsString('https://github.com/SecDevLab/', $racePage);

        $xssCheatSheet = $this->get('/web-security/cross-site-scripting/cheat-sheet')->assertOk()->getContent();
        $this->assertStringContainsString('https://github.com/PortSwigger/xss-cheatsheet-data/issues', $xssCheatSheet);
        $this->assertStringContainsString('@PortSwiggerRes', $xssCheatSheet);
        $this->assertStringNotContainsString('https://github.com/SecDevLab/', $xssCheatSheet);
    }

    public function test_all_labs_catalog_renders_273_cards_and_supports_ssr_filtering_without_js(): void
    {
        $res = $this->get('/web-security/all-labs');
        $res->assertOk();
        $html = $res->getContent();

        $this->assertStringContainsString('id="all-labs"', $html);
        $this->assertStringContainsString('class="wrapper-large"', $html);
        $this->assertStringContainsString('class="container-academy"', $html);
        $this->assertStringContainsString('class="nav-lhs-scrollable"', $html);
        $this->assertStringNotContainsString('<script', strtolower($html));
        $this->assertStringNotContainsString('data-toggle-id', $html);
        $this->assertStringNotContainsString('localStorage', $html);

        $cardCount = substr_count($html, 'class="widgetcontainer-lab-link is-notsolved"');
        $this->assertSame(273, $cardCount);

        // SSR Filter by difficulty=EXPERT
        $expRes = $this->get('/web-security/all-labs?difficulty=EXPERT');
        $expRes->assertOk();
        $this->assertSame(39, substr_count($expRes->getContent(), 'class="widgetcontainer-lab-link is-notsolved"'));

        // SSR Filter by search keyword
        $searchRes = $this->get('/web-security/all-labs?search=Oracle');
        $searchRes->assertOk();
        $this->assertGreaterThan(0, substr_count($searchRes->getContent(), 'class="widgetcontainer-lab-link is-notsolved"'));
    }

    public function test_lab_detail_pages_render_hints_solutions_related_cves_and_breadcrumbs_cleanly(): void
    {
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();
        $detailRes = $this->get($sqliLab->href);
        $detailRes->assertOk();
        $detailHtml = $detailRes->getContent();

        $this->assertStringContainsString('<h1 class="heading-2">Lab: ', $detailHtml);
        $this->assertStringContainsString('widget-container-lab-page-status', $detailHtml);
        $this->assertStringContainsString('ACCESS THE LAB', $detailHtml);
        $this->assertStringContainsString('Solution', $detailHtml);
        $this->assertStringContainsString('/cve/', $detailHtml);
        $this->assertStringNotContainsString("<div class=\"content\">\n      <div class=\"content\">", $detailHtml);
        $this->assertStringNotContainsString('<script', strtolower($detailHtml));
        if (str_contains($detailHtml, '<iframe')) {
            $this->assertStringContainsString('<iframe loading="lazy"', $detailHtml);
        }

        $oracleLab = Lab::where('href', 'like', '%lab-querying-database-version-oracle%')->firstOrFail();
        $oracleHtml = $this->get($oracleLab->href)->assertOk()->getContent();
        preg_match_all('/<summary><h4><span class="icon-erlenmeyer"><\/span>\s*Hint\s*<\/h4><\/summary>/i', $oracleHtml, $hintMatches);
        $this->assertCount(1, $hintMatches[0]);

        $xssLab = Lab::where('category_id', 'cross-site-scripting')->firstOrFail();
        $xssHtml = $this->get($xssLab->href)->assertOk()->getContent();
        $this->assertStringContainsString('href="/web-security/cross-site-scripting"', $xssHtml);
    }

    public function test_all_189_web_security_learning_pages_and_widgets_render_with_new_layout_and_zero_script(): void
    {
        $routes = config('academy_routes', []);
        $this->assertGreaterThanOrEqual(188, count($routes));

        $samplePages = [
            '/web-security',
            '/web-security/sql-injection',
            '/web-security/sql-injection/union-attacks',
            '/web-security/sql-injection/examining-the-database',
            '/web-security/sql-injection/cheat-sheet',
            '/web-security/authentication/auth-lab-usernames',
            '/web-security/authentication/auth-lab-passwords',
            '/web-security/learning-paths',
            '/web-security/dashboard',
            '/web-security/hall-of-fame',
            '/web-security/mystery-lab-challenge',
            '/web-security/all-topics',
            '/web-security/all-materials/detailed',
            '/web-security/certification/exam-hints-and-guidance/retaking-your-exam',
            '/web-security/certification/how-to-prepare/practitioner-labs-prep-step-one',
            '/web-security/certification/terms-and-conditions/website-terms-of-use',
            '/web-security-academy',
        ];

        foreach ($samplePages as $page) {
            $res = $this->get($page);
            $res->assertOk("Failed loading page {$page}");
            $html = $res->getContent();
            $this->assertStringContainsString('vla-topbar', $html, "Page {$page} must render inside new Academy layout");
            $this->assertStringNotContainsString('<script', strtolower($html), "Page {$page} must not contain <script>");
        }

        // Verify all 189 Blade views exist, compile cleanly, and render 200 OK without <script>
        foreach ($routes as $routePath => $viewName) {
            $this->assertStringStartsWith('/web-security', $routePath);
            $this->assertTrue(view()->exists($viewName), "Missing converted Blade view {$viewName} for {$routePath}");
            $pageRes = $this->get($routePath);
            $pageRes->assertOk("Route {$routePath} failed to render cleanly");
            $pageHtml = $pageRes->getContent();
            $this->assertStringContainsString('vla-topbar', $pageHtml, "Route {$routePath} must render non-empty Academy layout");
            $this->assertStringNotContainsString('<script', strtolower($pageHtml), "Route {$routePath} must not contain <script>");
        }

        // Verify POST /api/widgets contract for all 12 widget types
        $sqliLab = Lab::firstOrFail();
        $widgetTypes = [
            ['widgetId' => 'academy-labstatus', 'additionalData' => ['widget-lab-id' => strtoupper($sqliLab->id)]],
            ['widgetId' => 'academy-labinfo', 'additionalData' => ['widget-lab-id' => strtoupper($sqliLab->id)]],
            ['widgetId' => 'academy-launchlab', 'additionalData' => ['widget-lab-id' => strtoupper($sqliLab->id)]],
            ['widgetId' => 'academy-sharepage', 'additionalData' => []],
            ['widgetId' => 'academy-registration-footer', 'additionalData' => []],
            ['widgetId' => 'academy-accountstatus', 'additionalData' => ['widget-large-view' => 'true']],
            ['widgetId' => 'academy-available-learning-paths', 'additionalData' => []],
            ['widgetId' => 'academy-launch-mystery-lab', 'additionalData' => []],
            ['widgetId' => 'academy-startlearningcta', 'additionalData' => []],
            ['widgetId' => 'academy-startlearningbanner', 'additionalData' => []],
            ['widgetId' => 'burp-certificationstartingprice', 'additionalData' => []],
            ['widgetId' => 'burp-prostartingprice', 'additionalData' => []],
        ];

        $wRes = $this->postJson('/api/widgets', $widgetTypes);
        $wRes->assertOk();
        $widgets = $wRes->json();
        $this->assertCount(12, $widgets);
        foreach ($widgets as $w) {
            $this->assertNotEmpty($w['Html']);
            $this->assertStringNotContainsString('<script', strtolower($w['Html']));
        }
    }

    public function test_zero_javascript_files_remain_in_public_or_resources(): void
    {
        $publicJs = glob(public_path('{,*/,*/*/,*/*/*/}*.{js,mjs}'), GLOB_BRACE) ?: [];
        $resourceJs = glob(resource_path('{,*/,*/*/,*/*/*/}*.{js,mjs}'), GLOB_BRACE) ?: [];

        $this->assertSame([], $publicJs, 'Expected zero .js/.mjs files in public/');
        $this->assertSame([], $resourceJs, 'Expected zero .js/.mjs files in resources/');
        $this->assertFileDoesNotExist(base_path('server.mjs'));
        $this->assertFileDoesNotExist(base_path('test.mjs'));
        $this->assertFileDoesNotExist(base_path('package.json'));
    }
}
