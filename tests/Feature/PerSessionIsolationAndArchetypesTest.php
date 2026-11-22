<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Lab;
use App\Models\LabSession;
use App\Models\User;
use App\Services\LabArchetypeResolver;
use App\Services\WidgetRenderer;
use Database\Seeders\CatalogSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PerSessionIsolationAndArchetypesTest extends TestCase
{
    use RefreshDatabase;

    private User $alice;

    private User $bob;

    protected function setUp(): void
    {
        parent::setUp();
        WidgetRenderer::clearRuntimeCache();
        $this->seed([UserSeeder::class, CatalogSeeder::class]);
        $this->alice = User::create([
            'name' => 'Alice Tester',
            'email' => 'alice.iso@secdevlab.local',
            'password' => 'secret123',
        ]);
        $this->bob = User::create([
            'name' => 'Bob Tester',
            'email' => 'bob.iso@secdevlab.local',
            'password' => 'secret123',
        ]);
    }

    private function launchPath(User $user, string $labId): string
    {
        $res = $this->actingAs($user)->get("/academy/labs/launch/{$labId}");

        return (string) parse_url((string) $res->headers->get('Location'), PHP_URL_PATH);
    }

    public function test_capability_token_works_without_main_auth_cookie_and_emits_security_headers_and_isolated_cookies(): void
    {
        $lab = Lab::where('href', 'like', '%lab-conditional-responses%')->firstOrFail();

        // Launch while authenticated as Alice
        $launchUrl = $this->launchPath($this->alice, $lab->id);
        $this->assertMatchesRegularExpression('#^/lab/[a-f0-9]{32}$#', $launchUrl);
        $token = substr($launchUrl, 5);

        // Logout completely (simulating Burp Suite / curl with ZERO laravel_session)
        Auth::logout();
        $this->assertGuest();

        // Unknown / invalid capability token -> 404
        $this->get('/lab/'.str_repeat('0', 32))->assertNotFound();
        $this->get('/lab/not-a-valid-token')->assertNotFound();

        // Legacy /lab-env/* -> 404
        $this->get("/lab-env/{$lab->id}")->assertNotFound();
        $this->get("/lab-env/{$lab->id}/my-account")->assertNotFound();

        // Valid capability token -> 200 OK without Academy auth session
        $res = $this->get($launchUrl);
        $res->assertOk();

        // Strict capability & sandbox security headers
        $res->assertHeader('Referrer-Policy', 'no-referrer');
        $res->assertHeader('X-Content-Type-Options', 'nosniff');
        $res->assertHeader('X-Robots-Tag', 'noindex, nofollow');
        $csp = (string) $res->headers->get('Content-Security-Policy');
        $this->assertStringContainsString("script-src 'none'", $csp);
        $this->assertStringContainsString("style-src 'self'", $csp);
        $this->assertStringContainsString("font-src 'self'", $csp);
        $this->assertStringContainsString('sandbox allow-forms allow-same-origin', $csp);

        // Isolated cookies: target cookies scoped to /lab/{token}, NO secdevlab-session or XSRF-TOKEN emitted
        $cookies = $res->headers->getCookies();
        $this->assertNotEmpty($cookies);
        foreach ($cookies as $cookie) {
            $this->assertNotSame(config('session.cookie'), $cookie->getName());
            $this->assertNotSame('XSRF-TOKEN', $cookie->getName());
            $this->assertSame("/lab/{$token}", $cookie->getPath());
        }

        // SecDevLab Command Bar content (no PortSwigger logoAcademy.svg, zero JS, self-hosted fonts, token & TTL shown)
        $html = $res->getContent();
        $this->assertStringContainsString('SecDevLab', $html);
        $this->assertStringContainsString('Token: '.substr($token, 0, 12), $html);
        $this->assertStringContainsString('TTL:', $html);
        $this->assertMatchesRegularExpression('#/content/fonts/fonts\.css\?v=\d+#', $html);
        $this->assertMatchesRegularExpression('#/content/lab-workbench\.css\?v=\d+#', $html);
        $this->assertLessThan(
            strpos($html, '/content/lab-workbench.css'),
            strpos($html, '/content/fonts/fonts.css'),
            'Lab workbench must load self-hosted fonts.css before lab-workbench.css'
        );
        $this->assertStringNotContainsString('fonts.googleapis.com', $html);
        $this->assertStringNotContainsString('fonts.gstatic.com', $html);
        $this->assertStringNotContainsString('logoAcademy.svg', $html);
        $this->assertStringNotContainsString('<script', strtolower($html));
    }

    public function test_reset_renew_control_require_auth_and_ownership_and_preserve_academy_solved_across_ttl_expiry(): void
    {
        $lab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();

        $launchUrl = $this->launchPath($this->alice, $lab->id);
        $token = substr($launchUrl, 5);
        $session = LabSession::findByToken($token);
        $this->assertNotNull($session);
        $initialSecret = $session->secret('carlos_secret');

        // Solve the lab inside this instance
        $this->get($launchUrl.'?category='.urlencode("Gifts' OR 1=1--"))->assertOk();
        $session->refresh();
        $this->assertTrue($session->solved);
        $this->assertTrue($session->instance_solved);

        // Guest cannot access /control, /reset, or /renew
        Auth::logout();
        $this->get("/academy/labs/session/{$token}/control")->assertRedirect();
        $this->post("/academy/labs/session/{$token}/reset")->assertRedirect();
        $this->post("/academy/labs/session/{$token}/renew")->assertRedirect();

        // Bob cannot control, reset, or renew Alice's capability token (403)
        $this->actingAs($this->bob)->get("/academy/labs/session/{$token}/control")->assertForbidden();
        $this->actingAs($this->bob)->post("/academy/labs/session/{$token}/reset")->assertForbidden();
        $this->actingAs($this->bob)->post("/academy/labs/session/{$token}/renew")->assertForbidden();

        // Alice can view control panel & renew TTL without rotating token or clearing instance state
        $this->actingAs($this->alice)->get("/academy/labs/session/{$token}/control")
            ->assertOk()
            ->assertSee($token);

        $session->expires_at = now()->addMinutes(5);
        $session->save();
        $renewRes = $this->actingAs($this->alice)->post("/academy/labs/session/{$token}/renew");
        $renewRes->assertRedirect();
        $this->assertSame($launchUrl, (string) parse_url((string) $renewRes->headers->get('Location'), PHP_URL_PATH));
        $session->refresh();
        $this->assertSame($token, $session->instance_token);
        $this->assertTrue($session->expires_at->gt(now()->addMinutes(30)));

        // Expired instance returns 410 Gone (and JSON 410 for Repeater), while preserving Academy solved status!
        $session->expires_at = now()->subMinute();
        $session->save();
        $expiredRes = $this->get($launchUrl)->assertStatus(410)->assertSee('410 Gone');
        $expiredHtml = $expiredRes->getContent();
        $this->assertMatchesRegularExpression('#/content/fonts/fonts\.css\?v=\d+#', $expiredHtml);
        $this->assertMatchesRegularExpression('#/content/lab-workbench\.css\?v=\d+#', $expiredHtml);
        $this->assertLessThan(
            strpos($expiredHtml, '/content/lab-workbench.css'),
            strpos($expiredHtml, '/content/fonts/fonts.css'),
            'Expired workbench page must load self-hosted fonts.css before lab-workbench.css'
        );
        $this->assertStringNotContainsString('fonts.googleapis.com', $expiredHtml);
        $this->assertStringNotContainsString('fonts.gstatic.com', $expiredHtml);
        $this->assertStringContainsString("font-src 'self'", (string) $expiredRes->headers->get('Content-Security-Policy'));
        $this->assertStringNotContainsString('<script', strtolower($expiredHtml));
        $this->get($launchUrl, ['X-Academy-Repeater' => '1'])->assertStatus(410)->assertJson(['expired' => true]);

        // Relaunching after expiry assigns fresh token & secrets, resets instance_solved, keeps solved=true on Academy!
        $relaunchUrl = $this->launchPath($this->alice, $lab->id);
        $newToken = substr($relaunchUrl, 5);
        $this->assertNotSame($token, $newToken);
        $session->refresh();
        $this->assertTrue($session->solved);
        $this->assertFalse($session->instance_solved);
        $this->assertNotSame($initialSecret, $session->secret('carlos_secret'));

        // Old expired/rotated token now returns 404
        $this->get($launchUrl)->assertNotFound();

        // Explicit Reset rotates token again and generates fresh secrets
        $resetLoc = (string) $this->actingAs($this->alice)->post("/academy/labs/session/{$newToken}/reset")->headers->get('Location');
        $resetUrl = (string) parse_url($resetLoc, PHP_URL_PATH);
        $resetToken = substr($resetUrl, 5);
        $this->assertNotSame($newToken, $resetToken);
    }

    public function test_randomized_secrets_are_isolated_between_users(): void
    {
        $fuLab = Lab::where('href', 'like', '%lab-file-upload-remote-code-execution-via-web-shell-upload%')->firstOrFail();

        $aliceUrl = $this->launchPath($this->alice, $fuLab->id);
        $aliceSession = LabSession::findByToken(substr($aliceUrl, 5));

        $bobUrl = $this->launchPath($this->bob, $fuLab->id);
        $bobSession = LabSession::findByToken(substr($bobUrl, 5));

        $this->assertNotNull($aliceSession);
        $this->assertNotNull($bobSession);

        foreach (['carlos_secret', 'file_secret', 'admin_password', 'wiener_api_key', 'csrf_token', 'forgot_password_token', 'tracking_id', 'lab_session_cookie'] as $key) {
            $this->assertNotSame($aliceSession->secret($key), $bobSession->secret($key), "Secret '{$key}' should be randomized per session");
        }

        // Bob exfiltrating inside his own session CANNOT solve using Alice's carlos_secret
        $bobSession->exfiltrated = true;
        $bobSession->save();
        $crossSecretRes = $this->post($bobUrl.'/submit-solution', [
            'answer' => $aliceSession->secret('carlos_secret'),
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $crossSecretRes);

        // Bob solving with Bob's own carlos_secret succeeds
        $ownSecretRes = $this->post($bobUrl.'/submit-solution', [
            'answer' => $bobSession->secret('carlos_secret'),
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $ownSecretRes);
    }

    public function test_hybrid_subdomain_wildcard_mode_routes_and_isolates_cookie_path(): void
    {
        $lab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();

        config([
            'lab.url_mode' => 'subdomain',
            'lab.wildcard_domain' => 'labs.secdevlab.test',
        ]);

        try {
            $launchRes = $this->actingAs($this->alice)->get("/academy/labs/launch/{$lab->id}");
            $location = (string) $launchRes->headers->get('Location');
            $this->assertMatchesRegularExpression('#^https?://[a-f0-9]{32}\.labs\.secdevlab\.test(?::\d+)?/?$#', $location);

            $subRes = $this->get($location);
            $subRes->assertOk();
            $this->assertStringContainsString('SUBDOMAIN ISOLATED', $subRes->getContent());
            $this->assertStringNotContainsString('<script', strtolower($subRes->getContent()));

            foreach ($subRes->headers->getCookies() as $cookie) {
                $this->assertSame('/', $cookie->getPath());
            }
        } finally {
            config([
                'lab.url_mode' => 'path',
                'lab.wildcard_domain' => null,
            ]);
        }
    }

    public function test_all_31_categories_map_to_8_contextual_archetypes_with_direct_topic_landing_dark_light_and_zero_js(): void
    {
        $categories = Category::orderBy('sort_order')->get();
        $this->assertSame(31, $categories->count());

        $resolver = app(LabArchetypeResolver::class);
        $seenArchetypes = [];

        foreach ($categories as $cat) {
            $lab = Lab::where('category_id', $cat->id)->orderBy('sort_order')->firstOrFail();
            $archetype = $resolver->resolve($lab);
            $seenArchetypes[$archetype] = true;

            $launchUrl = $this->launchPath($this->alice, $lab->id);
            $res = $this->get($launchUrl);
            $res->assertOk("Failed rendering archetype '{$archetype}' for category '{$cat->id}'");
            $html = $res->getContent();

            $this->assertStringContainsString("data-archetype=\"{$archetype}\"", $html);
            $this->assertStringContainsString("class=\"lw-archetype--{$archetype}\"", $html);
            $this->assertMatchesRegularExpression('#/content/fonts/fonts\.css\?v=\d+#', $html);
            $this->assertMatchesRegularExpression('#/content/lab-workbench\.css\?v=\d+#', $html);
            $this->assertStringContainsString(e($resolver->meta($lab)['short']), $html);
            $this->assertStringNotContainsString('<script', strtolower($html));
            $this->assertStringNotContainsString('logoAcademy.svg', $html);
            $this->assertMatchesRegularExpression('/data-theme="(dark|light)"/', $html);
        }

        // All 8 archetypes must be exercised across the 31 categories
        $this->assertCount(8, $seenArchetypes);

        // Test Light (default) / Dark toggle inside lab instance (Zero-JS POST _theme)
        $aiLab = Lab::where('category_id', 'web-llm-attacks')->firstOrFail();
        $aiUrl = $this->launchPath($this->alice, $aiLab->id);
        $this->assertStringContainsString('data-theme="light"', $this->get($aiUrl)->assertOk()->getContent());
        $this->post($aiUrl.'/_theme')->assertRedirect($aiUrl);
        $this->assertStringContainsString('data-theme="dark"', $this->get($aiUrl)->assertOk()->getContent());
        $this->post($aiUrl.'/_theme')->assertRedirect($aiUrl);
        $this->assertStringContainsString('data-theme="light"', $this->get($aiUrl)->assertOk()->getContent());

        // Verify lab-workbench.css supports Dark/Light themes, all 8 distinct archetypes, contrast tokens, and styled file upload without JS
        $labCss = (string) file_get_contents(public_path('content/lab-workbench.css'));
        $this->assertStringContainsString('[data-theme="dark"]', $labCss);
        $this->assertStringContainsString('[data-theme="light"]', $labCss);
        $this->assertStringContainsString('--lw-arch-btn-bg:', $labCss);
        $this->assertStringContainsString('--lw-solved-bg:', $labCss);
        $this->assertStringContainsString('::file-selector-button', $labCss);
        $this->assertDoesNotMatchRegularExpression('/font-weight:\s*800\b/', $labCss);
        foreach (array_keys(LabArchetypeResolver::ARCHETYPES) as $archId) {
            $this->assertStringContainsString("lw-archetype--{$archId}", $labCss);
        }

        // Verify distinct structural chrome across all 8 archetypes
        $expectedArchetypeMarkers = [
            'sql-injection' => 'lw-store-hero',
            'os-command-injection' => 'lw-diag-strip',
            'file-upload-vulnerabilities' => 'lw-studio-shell',
            'authentication' => 'lw-iam-header',
            'api-testing' => 'lw-ide-urlbar',
            'cross-site-scripting' => 'lw-editorial-masthead',
            'web-llm-attacks' => 'lw-chat-shell',
            'information-disclosure' => 'lw-repeater-presets',
        ];
        foreach ($expectedArchetypeMarkers as $catSlug => $markerClass) {
            $sampleLab = Lab::where('category_id', $catSlug)->orderBy('sort_order')->firstOrFail();
            $sampleUrl = $this->launchPath($this->alice, $sampleLab->id);
            $sampleHtml = $this->get($sampleUrl)->assertOk()->getContent();
            $this->assertStringContainsString($markerClass, $sampleHtml, "Expected distinct archetype marker '{$markerClass}' for category '{$catSlug}'");
        }

        // Verify Media Upload Blade renders cleanly without leaked "@else" directive
        $fuLab = Lab::where('category_id', 'file-upload-vulnerabilities')->orderBy('sort_order')->firstOrFail();
        $fuUrl = $this->launchPath($this->alice, $fuLab->id);
        $fuHtml = $this->get($fuUrl)->assertOk()->getContent();
        $this->assertStringNotContainsString('secret@else', $fuHtml);
        $this->assertStringNotContainsString('@else', $fuHtml);
        $this->assertStringContainsString('Target secret path:', $fuHtml);
    }

    public function test_zero_emojis_as_ui_icons_in_academy_chrome_and_lab_views(): void
    {
        $homeHtml = $this->get('/')->assertOk()->getContent();
        $this->assertDoesNotMatchRegularExpression('/[\x{2600}-\x{27BF}\x{1F300}-\x{1FAFF}]/u', $homeHtml);

        $lab = Lab::where('category_id', 'graphql-api-vulnerabilities')->firstOrFail();
        $labUrl = $this->launchPath($this->alice, $lab->id);
        $labHtml = $this->get($labUrl)->assertOk()->getContent();
        $this->assertDoesNotMatchRegularExpression('/[\x{2600}-\x{27BF}\x{1F300}-\x{1FAFF}]/u', $labHtml);
        $this->assertStringContainsString('GraphQL Query &amp; Introspection Console', $labHtml);
    }

    public function test_all_273_labs_launch_and_render_archetypes_cleanly_without_js(): void
    {
        $labs = Lab::with('category')->orderBy('category_id')->orderBy('sort_order')->get();
        $this->assertSame(273, $labs->count());

        foreach ($labs as $lab) {
            $url = $this->launchPath($this->alice, $lab->id);
            $res = $this->get($url);
            $res->assertOk("Failed rendering lab {$lab->id} ({$lab->category_id})");
            $html = $res->getContent();
            $this->assertStringNotContainsString('<script', strtolower($html));
            $this->assertStringNotContainsString('logoAcademy.svg', $html);
        }
    }

    public function test_contextual_workbench_probes_and_same_origin_vs_attack_anti_cheat_across_archetypes(): void
    {
        // 1. GraphQL Explorer: benign query stays unsolved; __schema exfiltrates & Submit solution completes multi-step
        $gqlLab = Lab::where('category_id', 'graphql-api-vulnerabilities')->orderBy('sort_order')->firstOrFail();
        $gqlUrl = $this->launchPath($this->alice, $gqlLab->id);
        $gqlSession = LabSession::findByToken(substr($gqlUrl, 5));
        $gqlBenign = $this->post($gqlUrl.'/graphql', ['graphqlQuery' => 'query { getProduct(id: 7) { id name } }'])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $gqlBenign);
        $gqlStep1 = $this->post($gqlUrl.'/graphql', ['graphqlQuery' => 'query { __schema { types { name } } }'])->assertOk()->getContent();
        $this->assertStringContainsString('__schema', $gqlStep1);
        if (! empty($gqlLab->profile['requiresSubmitAfterExfil'])) {
            $this->assertStringContainsString('Step 1 complete (data exfiltrated)', $gqlStep1);
            $gqlSolve = $this->post($gqlUrl.'/submit-solution', ['answer' => $gqlSession->secret('carlos_secret')])->assertOk()->getContent();
            $this->assertStringContainsString('class="notification-labsolved"', $gqlSolve);
        } else {
            $this->assertStringContainsString('class="notification-labsolved"', $gqlStep1);
        }

        // 2. REST API Explorer: benign GET /api/user/wiener stays unsolved; DELETE/PATCH solves
        $apiLab = Lab::where('category_id', 'api-testing')->orderBy('sort_order')->firstOrFail();
        $apiUrl = $this->launchPath($this->alice, $apiLab->id);
        $apiBenign = $this->post($apiUrl.'/api', ['apiMethod' => 'GET', 'apiPath' => '/api/user/wiener'])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $apiBenign);
        $apiSolve = $this->post($apiUrl.'/api', ['apiMethod' => 'DELETE', 'apiPath' => '/api/user/carlos'])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $apiSolve);

        // 3. OAuth Workbench: benign local callback stays unsolved; external evil redirect_uri solves
        $oauthLab = Lab::where('category_id', 'oauth-authentication')
            ->orderBy('sort_order')
            ->get()
            ->first(static fn (Lab $l) => empty($l->profile['requiresMultiStep']))
            ?? Lab::where('category_id', 'oauth-authentication')->orderBy('sort_order')->firstOrFail();
        $oauthUrl = $this->launchPath($this->alice, $oauthLab->id);
        $oauthBenign = $this->get($oauthUrl.'/oauth?client_id=secdevlab_oauth_client&redirect_uri='.urlencode($oauthUrl.'/oauth/callback').'&response_type=code')->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $oauthBenign);
        $oauthEvil = $this->get($oauthUrl.'/oauth?client_id=secdevlab_oauth_client&redirect_uri='.urlencode('https://attacker.evil.example/steal').'&response_type=code')->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $oauthEvil);

        // 4. CORS HTTP Inspector: same-origin Origin header must NOT solve; cross-origin Origin solves
        $corsLab = Lab::where('category_id', 'cross-origin-resource-sharing-cors')->orderBy('sort_order')->firstOrFail();
        $corsUrl = $this->launchPath($this->alice, $corsLab->id);
        $sameOrigin = $this->withHeaders(['Origin' => 'http://127.0.0.1:4173'])->get($corsUrl)->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $sameOrigin);
        $evilOrigin = $this->withHeaders(['Origin' => 'https://attacker.example'])->get($corsUrl)->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $evilOrigin);

        // 5. Cache Poisoning & Host Header Inspector: X-Forwarded-Host header triggers solve
        $cacheLab = Lab::where('category_id', 'web-cache-poisoning')->orderBy('sort_order')->firstOrFail();
        $cacheUrl = $this->launchPath($this->alice, $cacheLab->id);
        $cacheSolve = $this->withHeaders(['X-Forwarded-Host' => 'exploit-attacker.local'])->get($cacheUrl)->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $cacheSolve);

        // 6. JWT alg:none forged token solves JWT lab
        $jwtLab = Lab::where('category_id', 'jwt')->orderBy('sort_order')->firstOrFail();
        $jwtUrl = $this->launchPath($this->alice, $jwtLab->id);
        $hdr = rtrim(strtr(base64_encode('{"alg":"none","typ":"JWT"}'), '+/', '-_'), '=');
        $pld = rtrim(strtr(base64_encode('{"sub":"administrator","role":"administrator"}'), '+/', '-_'), '=');
        $forgedJwt = "{$hdr}.{$pld}.";
        $jwtSolve = $this->post($jwtUrl.'/jwt', ['jwtToken' => $forgedJwt])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $jwtSolve);

        // 7. Prototype Pollution JSON __proto__ solves
        $protoLab = Lab::where('category_id', 'prototype-pollution')->orderBy('sort_order')->firstOrFail();
        $protoUrl = $this->launchPath($this->alice, $protoLab->id);
        $protoSolve = $this->post($protoUrl, ['protoPayload' => '{"__proto__":{"isAdmin":true}}'])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $protoSolve);

        // 8. Insecure Deserialization PHP serialized object solves
        $deserLab = Lab::where('category_id', 'insecure-deserialization')->orderBy('sort_order')->firstOrFail();
        $deserUrl = $this->launchPath($this->alice, $deserLab->id);
        $deserSolve = $this->post($deserUrl.'/_workbench/probe', ['deserPayload' => 'O:4:"User":2:{s:8:"username";s:6:"carlos";s:5:"admin";b:1;}'])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $deserSolve);

        // 9. Information Disclosure /.git/HEAD exposes per-session admin secret
        $infoLab = Lab::where('category_id', 'information-disclosure')->orderBy('sort_order')->firstOrFail();
        $infoUrl = $this->launchPath($this->alice, $infoLab->id);
        $infoSession = LabSession::findByToken(substr($infoUrl, 5));
        $infoRes = $this->get($infoUrl.'/.git/HEAD')->assertOk()->getContent();
        $this->assertStringContainsString($infoSession->secret('admin_password'), $infoRes);

        // 10. Lab detail page displays Active Instance Telemetry & Reset/Renew forms when launched
        $detailHtml = $this->actingAs($this->alice)->get($infoLab->href)->assertOk()->getContent();
        $this->assertStringContainsString('OPEN LAB INSTANCE', $detailHtml);
        $this->assertStringContainsString('Reset Instance', $detailHtml);
        $this->assertStringContainsString('Renew TTL', $detailHtml);
        $this->assertStringContainsString(substr($infoSession->instance_token, 0, 12), $detailHtml);
    }

    public function test_per_session_migration_can_roll_back_and_reapply_cleanly(): void
    {
        $lab = Lab::orderBy('sort_order')->firstOrFail();

        // 1. Fresh migrate sets SQL column default of lab_sessions.ui_theme to 'light'
        $defaultRowId = DB::table('lab_sessions')->insertGetId([
            'user_id' => $this->alice->id,
            'lab_id' => $lab->id,
            'instance_token' => bin2hex(random_bytes(16)),
            'executable_exts' => json_encode(['.php']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        try {
            $this->assertSame('light', DB::table('lab_sessions')->where('id', $defaultRowId)->value('ui_theme'));
        } finally {
            DB::table('lab_sessions')->where('id', $defaultRowId)->delete();
        }

        // 2. Verify MySQL grammar compiles ->default('light')->change() into valid MODIFY DDL
        $mysqlConn = new MySqlConnection(static fn () => null);
        $mysqlConn->useDefaultSchemaGrammar();
        $blueprint = new Blueprint($mysqlConn, 'lab_sessions');
        $blueprint->string('ui_theme', 16)->default('light')->change();
        $mysqlSql = strtolower(implode('; ', $blueprint->toSql()));
        $this->assertStringContainsString("modify `ui_theme` varchar(16) not null default 'light'", $mysqlSql);

        // 3. Rollback 2026_11_22_000002 (--step=1): default reverts to 'dark'
        $this->artisan('migrate:rollback', ['--step' => 1])->assertExitCode(0);

        $darkRowId = DB::table('lab_sessions')->insertGetId([
            'user_id' => $this->bob->id,
            'lab_id' => $lab->id,
            'instance_token' => bin2hex(random_bytes(16)),
            'executable_exts' => json_encode(['.php']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        try {
            $this->assertSame('dark', DB::table('lab_sessions')->where('id', $darkRowId)->value('ui_theme'));

            // 4. Reapply 2026_11_22_000002: existing 'dark' session resets to 'light' and default becomes 'light'
            $this->artisan('migrate')->assertExitCode(0);
            $this->assertSame('light', DB::table('lab_sessions')->where('id', $darkRowId)->value('ui_theme'));

            $postMigrateId = DB::table('lab_sessions')->insertGetId([
                'user_id' => $this->alice->id,
                'lab_id' => $lab->id,
                'instance_token' => bin2hex(random_bytes(16)),
                'executable_exts' => json_encode(['.php']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            try {
                $this->assertSame('light', DB::table('lab_sessions')->where('id', $postMigrateId)->value('ui_theme'));
            } finally {
                DB::table('lab_sessions')->where('id', $postMigrateId)->delete();
            }
        } finally {
            DB::table('lab_sessions')->where('id', $darkRowId)->delete();
        }

        // 5. Rollback both 2026_11_22_000002 and 2026_11_22_000001 (--step=2) and reapply cleanly
        $this->artisan('migrate:rollback', ['--step' => 2])->assertExitCode(0);
        $this->assertFalse(Schema::hasColumn('lab_sessions', 'ui_theme'));
        $this->assertFalse(Schema::hasColumn('lab_sessions', 'instance_token'));
        $this->artisan('migrate')->assertExitCode(0);
        $this->assertTrue(Schema::hasColumn('lab_sessions', 'ui_theme'));
        $this->assertTrue(Schema::hasColumn('lab_sessions', 'instance_token'));
    }
}
