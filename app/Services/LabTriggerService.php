<?php

namespace App\Services;

use App\Models\Lab;
use App\Models\LabSession;

class LabTriggerService
{
    private const GENERIC_IGNORED_TOKENS = [
        'wiener:peter',
        'your-lab-id',
        'your-exploit-server-id',
        'administrator',
        'carlos',
        'wiener',
        'session',
        'trackingid',
        'productid',
        'storeid',
        'postid',
        'filename',
        'search',
        'comment',
        'message',
        'product',
        'quantity',
        'origin',
        'callback',
        'config',
        'select',
        'orderby',
        'window',
        'iframe',
        'isadmin',
        'getuser',
        'csrfkey',
        'redirect_uri',
        'returnpath',
        'stay-logged-in',
        'mfa-code',
        'current-password',
        'example.com',
        'test@example.com',
        '@ginandjuice.shop',
        'https://',
        'http://127.0.0.1/',
        'localhost',
        'host: localhost',
        '/admin',
        '/admin/delete',
        '/my-account',
        '/login',
        '/cart',
        '/resources',
        '/resources/',
        '/robots.txt',
        '/exploit',
        '/accountdetails',
        '/backup',
        'get /my-account',
        'get /admin',
        'get /cart',
        'get /resources',
        'get /me',
        'post /login',
        'post /login2',
        'post /cart',
        'post /cart/checkout',
        'post /forgot-password',
        'get /forgot-password',
        'post /product/stock',
        'post /my-account/avatar',
        'post /my-account/change-email',
        'post /my-account/change-address',
        'post /my-account/change-password',
        'content-type',
        'content-length',
        'content-disposition',
        'user-agent',
        'connection',
        'keep-alive',
        'set-cookie',
        'access-control-allow-origin',
        'access-control-allow-credentials',
        '404 not found',
        '200 ok',
        'welcome back',
        '0 units',
        'img src',
        'ctrl-u',
        'alt+shift+x',
        'ctrl+alt+x',
        'x-cache: miss',
        'x-cache: hit',
        'x-cache',
        'invalid username',
        'invalid username or password',
        'invalid username and password',
        'product_info',
        '1.txt',
        'morale.txt',
        'exploit.php',
        'secret1',
        'stockcheck',
        'stockapi',
        'utm_content',
        'blog-post-author-display',
        'unrecognized method gpost',
    ];

    /**
     * Evaluate lab triggers strictly by lab category, profile features, per-session secrets, and valid payloads.
     * Legacy shortcuts (?solve=1) and static hardcoded global secrets have been removed.
     *
     * @param  array<string, string>  $params
     * @param  array<string, string>  $requestHeaders
     * @return array<string, mixed>
     */
    public function evaluate(
        Lab $lab,
        string $subRoute,
        array $params,
        string $rawBody,
        string $cookieHeader,
        LabSession $session,
        array $requestHeaders = []
    ): array {
        $cid = $lab->category_id;
        $profile = is_array($lab->profile) ? $lab->profile : [];

        $carlosSecret = $session->secret('carlos_secret');
        $fileSecret = $session->secret('file_secret');
        $adminPassword = $session->secret('admin_password');
        $carlosPassword = $session->secret('carlos_password');
        $carlosApiKey = $session->secret('carlos_api_key');
        $awsSecret = $session->secret('aws_secret');
        $hostname = $session->secret('hostname');
        $forgotToken = $session->secret('forgot_password_token');

        $categoryParam = $params['category'] ?? 'All';
        $searchParam = $params['search'] ?? '';
        $storeIdParam = $params['storeId'] ?? '';
        $actionParam = $params['action'] ?? '';
        $formActionParam = strtoupper((string) ($params['formAction'] ?? ''));
        $userParam = $params['username'] ?? '';
        $passParam = $params['password'] ?? '';
        $emailParam = $params['email'] ?? '';
        $filenameParam = $params['filename'] ?? '';
        $answerParam = $params['answer'] ?? '';
        $responseBodyParam = (string) ($params['responseBody'] ?? '');
        $responseHeadParam = (string) ($params['responseHead'] ?? '');
        $couponParam = strtoupper(trim((string) ($params['coupon'] ?? '')));
        $priceParam = $params['price'] ?? '';
        $quantityParam = $params['quantity'] ?? '';

        $solutionTokens = is_array($profile['solutionPayloads'] ?? null) ? $profile['solutionPayloads'] : [];

        // On exploit-server, do not evaluate benign STORE / ACCESS_LOG requests or empty payloads
        $isExploitServerReq = in_array($subRoute, ['exploit-server', 'exploit'], true)
            || (($params['view'] ?? '') === 'exploit-server');
        $exploitServerAllowed = ! empty($profile['hasExploitServer']);
        $exploitHasPayload = trim($responseBodyParam) !== '';
        $exploitDelivering = $isExploitServerReq
            && $exploitServerAllowed
            && $exploitHasPayload
            && ($formActionParam === 'DELIVER_TO_VICTIM' || $formActionParam === '');

        if ($isExploitServerReq && ! $exploitDelivering) {
            return $this->buildResult(
                $solutionTokens,
                $session,
                ['exploitMissingPayload' => ($formActionParam === 'DELIVER_TO_VICTIM' || $formActionParam === 'STORE') && ! $exploitHasPayload]
            );
        }

        $evalParams = $params;
        unset($evalParams['solve'], $evalParams['reset'], $evalParams['mystery'], $evalParams['reveal'], $evalParams['ui_theme']);
        $cleanCookieHeader = $this->extractLabCookies($cookieHeader, $session);
        $headerSignals = $this->extractHeaderSignals($requestHeaders);
        $allParamsText = implode(' ', array_merge(array_values($evalParams), [$rawBody, $cleanCookieHeader, $headerSignals]));

        $rawSqli = (bool) preg_match(
            "/('|union\s+select|or\s+1\s*=\s*1|--|v\\\$version|information_schema|pg_sleep|dbms_pipe)/i",
            $categoryParam.' '.$searchParam.' '.$userParam.' '.$cleanCookieHeader.' '.$rawBody
        );
        $rawNosql = (bool) preg_match(
            '/(\$ne|\$gt|\$gte|\$lt|\$lte|\$where|\$regex|\$in|\'\s*\|\|\s*1|"\s*\|\|\s*1|this\.password)/i',
            $categoryParam.' '.$searchParam.' '.$userParam.' '.$passParam.' '.$rawBody
        );
        $unionTriggered = (bool) preg_match('/union\s+select/i', $categoryParam.' '.$searchParam.' '.$allParamsText);
        $rawXss = (bool) preg_match('/(<script|onerror\s*=|onload\s*=|onfocus\s*=|onmouseover\s*=|alert\s*\(|confirm\s*\(|prompt\s*\(|print\s*\(|javascript:)/i', $allParamsText);
        $rawSsti = (bool) preg_match('/(\{\{[\s\S]*?\}\}|\$\{[\s\S]*?\}|<%[\s\S]*?%>|#\{[\s\S]*?\})/i', $allParamsText);
        $rawPathTrav = (bool) preg_match('/(\.\.\/|\.\.\\\\|\/etc\/passwd|\/home\/carlos)/i', $filenameParam.' '.$allParamsText);
        $rawCmd = (bool) preg_match('/(\||;|`|\$\()\s*(whoami|id|uname|cat\s+|nslookup|curl|wget|sleep|ping|rm\s+)/i', $storeIdParam.' '.$allParamsText);
        $rawSsrfOrXxe = (bool) preg_match('/(169\.254\.169\.254|localhost|127\.0\.0\.1|192\.168\.0\.|<!ENTITY|<!DOCTYPE|SYSTEM\s+["\']file:|xi:include)/i', $storeIdParam.' '.$allParamsText);
        $rawDom = (bool) preg_match('/(postMessage|location\.search|location\.hash|innerHTML|document\.write|document\.domain|eval\(|<iframe|<svg)/i', $allParamsText);
        $rawClickjack = (bool) preg_match('/<iframe\b[\s\S]*?(opacity|style|position|z-index)|(opacity|position\s*:|z-index)[\s\S]*?<iframe\b/i', $responseBodyParam.' '.$allParamsText);
        $rawCors = (bool) preg_match('/(XMLHttpRequest|fetch\(|withCredentials|Access-Control-Allow-Origin|Origin:\s*null|Origin:\s*https?:\/\/)/i', $responseBodyParam.' '.$headerSignals.' '.($params['probeOrigin'] ?? ''));
        $rawProto = (bool) preg_match('/(__proto__|constructor\.prototype|constructor\[|\[\s*"__proto__"\s*\])/i', $allParamsText);
        $rawCachePoison = (bool) preg_match('/(X-Forwarded-Host|X-Host|X-Forwarded-Scheme|X-Original-URL|X-Rewrite-URL|\bcb=)/i', $responseHeadParam.' '.$responseBodyParam.' '.$headerSignals.' '.$allParamsText);
        $rawHostHeader = (bool) preg_match('/(X-Forwarded-Host|X-Host|Host:\s*[^\s]+|arbitraryport|exploit-server)/i', $responseHeadParam.' '.$responseBodyParam.' '.$headerSignals.' '.($params['probeHost'] ?? '').' '.$allParamsText);
        $rawSmuggling = (bool) preg_match('/(Transfer-Encoding\s*:|Content-Length\s*:|chunked|0\r\n\r\n|SMUGGLED|CL\.TE|TE\.CL)/i', $headerSignals.' '.$allParamsText);
        $rawGraphql = (bool) preg_match('/(__schema|__type|introspection|mutation\b[\s\S]*?(delete|login|change|update)|getUser\b[\s\S]*?(carlos|password|admin))/i', $allParamsText);
        $rawJwt = $this->detectJwtExploit($allParamsText);
        $rawOauth = $this->detectOauthExploit($params, $allParamsText);
        $rawDeser = (bool) preg_match('/(O:\d+:|a:\d+:\{|phar:\/\/|rO0AB|java\.lang\.Runtime|__destruct|__wakeup|unserialize)/i', $allParamsText);
        $rawInfoDisc = (bool) preg_match('/(\bphpinfo\b|\/cgi-bin|\.git\b|\/backup\b|\/debug\b|\bdebug=|TRACE\s+\/|\/actuator\b|\.env\b|SECRET_KEY)/i', $subRoute.' '.$allParamsText);
        $rawCacheDecep = (bool) preg_match('/\/my-account(?:[\/;?%#].*\.(?:js|css|jpg|png|ico|svg|webp|woff2?)|%2f|%23|%3f|\.\.%2f)/i', $allParamsText);
        $rawApiExploit = (bool) preg_match('/(chosen_discount|\/api\/user\/carlos|\/api\/admin|PATCH\s+|OPTIONS\s+|DELETE\s+|roleid|isAdmin|price\s*=|\.\.%2f)/i', $allParamsText);
        $rawCartExploit = ($subRoute === 'cart' || ($params['view'] ?? '') === 'cart') && (
            in_array($couponParam, ['SIGNUP30', 'NEWCUST5'], true)
            || ($priceParam !== '' && is_numeric($priceParam) && (float) $priceParam < 100.0)
            || ($quantityParam !== '' && is_numeric($quantityParam) && ((int) $quantityParam < 0 || (int) $quantityParam > 10))
        );

        $adminPanelAllowed = ! empty($profile['hasAdminPanel']) || in_array($cid, [
            'access-control-vulnerabilities',
            'server-side-request-forgery-ssrf',
            'cross-site-request-forgery-csrf',
            'business-logic-vulnerabilities',
            'http-host-header-attacks',
            'jwt',
            'oauth-authentication',
        ], true);

        $isAdminRoute = in_array($subRoute, ['admin', 'administrator-panel'], true)
            || (($params['view'] ?? '') === 'admin');
        $adminDeleteCarlos = $adminPanelAllowed && $isAdminRoute && (
            ($actionParam === 'delete' && strtolower($userParam) === 'carlos') ||
            (bool) preg_match('/username=carlos/i', $allParamsText)
        );

        $userLower = strtolower($userParam);
        $validAdminLogin = ($subRoute === 'login' || $subRoute === 'my-account' || $userParam !== '') && (
            ($userLower === 'administrator' && ($passParam === $adminPassword || (bool) preg_match("/'|--/", $userParam))) ||
            (str_starts_with($userLower, 'administrator') && (bool) preg_match("/'|--/", $userParam))
        );
        $validCarlosLogin = ($userLower === 'carlos' && ($passParam === $carlosPassword || (bool) preg_match("/'|--/", $userParam)))
            || (($params['temp-forgot-password-token'] ?? '') === $forgotToken && $userLower === 'carlos');
        $validUserLogin = ($userLower === 'wiener' && $passParam === 'peter');

        $dirty = false;
        if ($validAdminLogin && $session->logged_in_user !== 'administrator') {
            $session->logged_in_user = 'administrator';
            $dirty = true;
        } elseif ($validCarlosLogin && $session->logged_in_user !== 'carlos') {
            $session->logged_in_user = 'carlos';
            $dirty = true;
        } elseif ($validUserLogin && $session->logged_in_user !== 'wiener') {
            $session->logged_in_user = 'wiener';
            $dirty = true;
        }

        $isUploadLab = $cid === 'file-upload-vulnerabilities';
        $uploadWebshellTriggered = $isUploadLab && ($subRoute === 'my-account' || $filenameParam !== '') &&
            (bool) preg_match('/\.(php|jsp|asp|aspx|shtml|py|pl|cgi|svg)(\b|%00|\.)/i', $filenameParam.' '.$rawBody);

        $emailUpdateTriggered = ($actionParam === 'change-email' && str_contains($emailParam, '@') && $emailParam !== 'wiener@normal-user.net')
            || ($cid === 'cross-site-request-forgery-csrf' && $exploitDelivering && (bool) preg_match('/change-email|<form[\s\S]*?email/i', $responseBodyParam));

        $submitSolutionAllowed = ! empty($profile['hasSubmitSolution']) || ! empty($profile['requiresSubmitAfterExfil']);
        $submittedText = trim($answerParam.' '.$rawBody);
        $sessionSecretCandidates = array_filter([
            $carlosSecret,
            $fileSecret,
            $adminPassword,
            $carlosApiKey,
            $awsSecret,
            $hostname,
        ], static fn (string $v): bool => $v !== '');
        $matchesPerSessionSecret = false;
        if ($submittedText !== '') {
            foreach ($sessionSecretCandidates as $candidate) {
                if (str_contains($submittedText, $candidate)) {
                    $matchesPerSessionSecret = true;
                    break;
                }
            }
        }
        $validSecretSubmitted = $submitSolutionAllowed
            && ($subRoute === 'submit-solution' || $answerParam !== '')
            && $matchesPerSessionSecret;

        $isSqliLab = in_array($cid, ['sql-injection', 'nosql-injection', 'api-testing', 'graphql-api-vulnerabilities', 'essential-skills'], true);
        $isXssLab = $cid === 'cross-site-scripting';
        $isSstiLab = $cid === 'server-side-template-injection';
        $isCmdLab = $cid === 'os-command-injection';
        $isSsrfOrXxeLab = in_array($cid, ['server-side-request-forgery-ssrf', 'xml-external-entity-xxe-injection'], true);
        $isPathTravLab = $cid === 'path-traversal';

        $sqliTriggered = $isSqliLab && ($rawSqli || ($cid === 'nosql-injection' && $rawNosql));
        $xssTriggered = ($isXssLab || in_array($cid, ['dom-based-vulnerabilities', 'prototype-pollution', 'web-cache-poisoning', 'http-host-header-attacks', 'http-request-smuggling', 'websockets', 'web-llm-attacks', 'essential-skills'], true)) && $rawXss;
        $sstiTriggered = $isSstiLab && $rawSsti;
        $cmdTriggered = $isCmdLab && $rawCmd;
        $ssrfOrXxeTriggered = $isSsrfOrXxeLab && $rawSsrfOrXxe;
        $pathTravTriggered = $isPathTravLab && $rawPathTrav;

        // UI rendering hints for stock checker on product page (only solves if category matches)
        $stockCmdDisplay = ($isCmdLab || ! empty($profile['hasStockCheck'])) && $rawCmd;
        $stockSsrfDisplay = ($isSsrfOrXxeLab || ! empty($profile['hasStockCheck'])) && $rawSsrfOrXxe;

        $allParamsLower = strtolower($allParamsText);
        $isCustomLab = ! empty($profile['isCustomLab']);
        $matchesOfficialToken = false;
        foreach ($solutionTokens as $tok) {
            if (! is_string($tok)) {
                continue;
            }
            $tokLower = strtolower(trim($tok));
            if (! $this->isActionableOfficialToken($tokLower, $isCustomLab)) {
                continue;
            }
            if (str_contains($allParamsLower, $tokLower)) {
                $matchesOfficialToken = true;
                break;
            }
        }

        $categorySpecificTriggered = match ($cid) {
            'sql-injection' => $sqliTriggered || $matchesOfficialToken,
            'nosql-injection' => $rawNosql || $sqliTriggered || $matchesOfficialToken,
            'cross-site-scripting' => $xssTriggered || $matchesOfficialToken,
            'dom-based-vulnerabilities' => $xssTriggered || $rawDom || $matchesOfficialToken,
            'clickjacking' => $rawClickjack || $matchesOfficialToken,
            'cross-origin-resource-sharing-cors' => $rawCors || $matchesOfficialToken,
            'cross-site-request-forgery-csrf' => $emailUpdateTriggered || $adminDeleteCarlos || $matchesOfficialToken,
            'xml-external-entity-xxe-injection', 'server-side-request-forgery-ssrf' => $ssrfOrXxeTriggered || $adminDeleteCarlos || $matchesOfficialToken,
            'os-command-injection' => $cmdTriggered || $matchesOfficialToken,
            'server-side-template-injection' => $sstiTriggered || $matchesOfficialToken,
            'path-traversal' => $pathTravTriggered || $matchesOfficialToken,
            'file-upload-vulnerabilities' => $uploadWebshellTriggered || $matchesOfficialToken,
            'authentication' => $validAdminLogin || $validCarlosLogin || $matchesOfficialToken,
            'oauth-authentication' => $validAdminLogin || $validCarlosLogin || $rawOauth || $adminDeleteCarlos || $matchesOfficialToken,
            'jwt' => $validAdminLogin || $validCarlosLogin || $rawJwt || $adminDeleteCarlos || $matchesOfficialToken,
            'access-control-vulnerabilities' => $adminDeleteCarlos || $validAdminLogin || str_contains($cleanCookieHeader, 'Admin=true') || $matchesOfficialToken,
            'information-disclosure' => $rawInfoDisc || $adminDeleteCarlos || $matchesOfficialToken,
            'web-cache-deception' => $rawCacheDecep || $matchesOfficialToken,
            'insecure-deserialization' => $rawDeser || $adminDeleteCarlos || $matchesOfficialToken,
            'business-logic-vulnerabilities' => $rawCartExploit || $adminDeleteCarlos || $emailUpdateTriggered || $matchesOfficialToken,
            'race-conditions' => $rawCartExploit || $emailUpdateTriggered || $adminDeleteCarlos || $matchesOfficialToken,
            'prototype-pollution' => $rawProto || $xssTriggered || $adminDeleteCarlos || $matchesOfficialToken,
            'web-cache-poisoning' => $rawCachePoison || $xssTriggered || $matchesOfficialToken,
            'http-host-header-attacks' => $rawHostHeader || $xssTriggered || $adminDeleteCarlos || $matchesOfficialToken,
            'http-request-smuggling' => $rawSmuggling || $xssTriggered || $adminDeleteCarlos || $matchesOfficialToken,
            'graphql-api-vulnerabilities' => $rawGraphql || $sqliTriggered || $matchesOfficialToken,
            'api-testing' => $rawApiExploit || $rawCartExploit || $sqliTriggered || $adminDeleteCarlos || $matchesOfficialToken,
            'websockets' => $xssTriggered || $matchesOfficialToken,
            'web-llm-attacks' => $xssTriggered || $matchesOfficialToken,
            'essential-skills' => $sqliTriggered || $xssTriggered || $cmdTriggered || $rawPathTrav || $rawSsti || $adminDeleteCarlos || $matchesOfficialToken,
            default => $matchesOfficialToken,
        };

        if (
            ($isSqliLab && ($unionTriggered || ($sqliTriggered && ! empty($profile['hasTrackingIdCookie'])))) ||
            $cmdTriggered ||
            $ssrfOrXxeTriggered ||
            $pathTravTriggered ||
            (! empty($profile['requiresSubmitAfterExfil']) && $categorySpecificTriggered)
        ) {
            if (! $session->exfiltrated) {
                $session->exfiltrated = true;
                $dirty = true;
            }
        }

        $stepSolved = false;
        if (! empty($profile['requiresLoginAfterExfil'])) {
            if ($validAdminLogin && ($session->exfiltrated || $passParam === $adminPassword)) {
                $stepSolved = true;
            }
        } elseif (! empty($profile['requiresSubmitAfterExfil'])) {
            $stepSolved = $validSecretSubmitted && (bool) $session->exfiltrated;
        } else {
            $stepSolved = $categorySpecificTriggered || ($submitSolutionAllowed && $validSecretSubmitted);
        }

        if ($stepSolved) {
            if (! $session->instance_solved) {
                $session->instance_solved = true;
                $dirty = true;
            }
            if (! $session->solved) {
                $session->solved = true;
                $session->solved_at = now();
                $dirty = true;
            }
        }

        if ($dirty) {
            $session->save();
        }

        return $this->buildResult($solutionTokens, $session, [
            'sqliTriggered' => $sqliTriggered,
            'unionTriggered' => $unionTriggered && $isSqliLab,
            'xssTriggered' => $xssTriggered,
            'sstiTriggered' => ($sstiTriggered || ($isXssLab && $rawSsti)),
            'pathTravTriggered' => $pathTravTriggered,
            'cmdTriggered' => $stockCmdDisplay,
            'ssrfOrXxeTriggered' => $stockSsrfDisplay,
            'adminDeleteCarlos' => $adminDeleteCarlos,
            'validLoginTriggered' => $validAdminLogin || $validCarlosLogin || $validUserLogin,
            'uploadWebshellTriggered' => $uploadWebshellTriggered,
            'emailUpdateTriggered' => $emailUpdateTriggered,
            'matchesOfficialToken' => $matchesOfficialToken,
            'cartExploitTriggered' => $rawCartExploit,
            'jwtExploitTriggered' => $rawJwt,
            'oauthExploitTriggered' => $rawOauth,
            'graphqlExploitTriggered' => $rawGraphql,
            'apiExploitTriggered' => $rawApiExploit,
            'httpExploitTriggered' => $rawCors || $rawCachePoison || $rawHostHeader || $rawSmuggling || $rawDeser || $rawInfoDisc || $rawCacheDecep,
            'exploitMissingPayload' => false,
        ]);
    }

    /**
     * @param  list<string>  $solutionTokens
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function buildResult(array $solutionTokens, LabSession $session, array $overrides = []): array
    {
        return array_merge([
            'solutionTokens' => $solutionTokens,
            'sqliTriggered' => false,
            'unionTriggered' => false,
            'xssTriggered' => false,
            'sstiTriggered' => false,
            'pathTravTriggered' => false,
            'cmdTriggered' => false,
            'ssrfOrXxeTriggered' => false,
            'adminDeleteCarlos' => false,
            'validLoginTriggered' => false,
            'uploadWebshellTriggered' => false,
            'emailUpdateTriggered' => false,
            'matchesOfficialToken' => false,
            'cartExploitTriggered' => false,
            'jwtExploitTriggered' => false,
            'oauthExploitTriggered' => false,
            'graphqlExploitTriggered' => false,
            'apiExploitTriggered' => false,
            'httpExploitTriggered' => false,
            'exploitMissingPayload' => false,
            'exfiltrated' => (bool) $session->exfiltrated,
            'autoSolved' => (bool) $session->instance_solved,
        ], $overrides);
    }

    /**
     * @return list<array{col1: string, col2: string}>
     */
    public function buildUnionRows(bool $unionTriggered, string $categoryParam, string $searchParam, ?LabSession $session = null): array
    {
        if (! $unionTriggered) {
            return [];
        }

        $qLower = strtolower($categoryParam.' '.$searchParam);
        $rows = [];
        $tableSuffix = $session ? $session->secret('users_table_suffix', 'a1b2c3') : 'a1b2c3';
        $adminPass = $session ? $session->secret('admin_password') : 'adm_session_secret';
        $carlosPass = $session ? $session->secret('carlos_password') : 'crl_session_secret';

        if (str_contains($qLower, 'version') || str_contains($qLower, 'banner')) {
            $rows[] = [
                'col1' => 'Oracle Database 11g Express Edition Release 11.2.0.2.0 - 64bit Production',
                'col2' => 'PL/SQL Release 11.2.0.2.0 - Production (PostgreSQL 14.9 / MySQL 8.0.34 compatible)',
            ];
        }
        if (str_contains($qLower, 'tables') || str_contains($qLower, 'table_name')) {
            $rows[] = ['col1' => 'users_'.$tableSuffix, 'col2' => 'products'];
        }
        if (str_contains($qLower, 'columns') || str_contains($qLower, 'column_name')) {
            $rows[] = ['col1' => 'username_'.$tableSuffix, 'col2' => 'password_'.$tableSuffix];
        }

        $rows[] = ['col1' => 'administrator', 'col2' => $adminPass];
        $rows[] = ['col1' => 'carlos', 'col2' => $carlosPass];
        $rows[] = ['col1' => 'wiener', 'col2' => 'peter'];

        return $rows;
    }

    public function handleChatMessage(string $message, Lab $lab, LabSession $session): ?string
    {
        $profile = is_array($lab->profile) ? $lab->profile : [];
        if (empty($profile['hasLiveChat'])) {
            return null;
        }

        $msgLower = strtolower($message);
        $solutionTokens = is_array($profile['solutionPayloads'] ?? null) ? $profile['solutionPayloads'] : [];
        $isCustomLab = ! empty($profile['isCustomLab']);
        $matchesToken = false;
        foreach ($solutionTokens as $tok) {
            if (is_string($tok)) {
                $tokLower = strtolower(trim($tok));
                if ($this->isActionableOfficialToken($tokLower, $isCustomLab) && str_contains($msgLower, $tokLower)) {
                    $matchesToken = true;
                    break;
                }
            }
        }

        $reply = __('academy.workbench.chat_default_reply');
        $isWebsocketLab = $lab->category_id === 'websockets';
        $isExploit = $matchesToken || ($isWebsocketLab
            ? (bool) preg_match('/(<script|onerror\s*=|onload\s*=|alert\s*\(|confirm\s*\(|prompt\s*\(|wss:\/\/)/i', $message)
            : (bool) preg_match('/(delete_account|delete_user|delete\s+from\s+users|\bcarlos\b|whoami|morale\.txt|<script|onerror\s*=|onload\s*=|alert\s*\()/i', $message));

        if ($isExploit) {
            $session->instance_solved = true;
            if (! $session->solved) {
                $session->solved = true;
                $session->solved_at = now();
            }
            $reply = $isWebsocketLab
                ? __('academy.workbench.chat_ws_solved')
                : __('academy.workbench.chat_ai_solved');
        }

        $history = is_array($session->chat_history) ? $session->chat_history : [];
        $history[] = ['sender' => __('academy.workbench.you_label'), 'text' => $message];
        $history[] = ['sender' => 'Arti Ficial', 'text' => $reply];
        $session->chat_history = array_slice($history, -30);
        $session->save();

        return $reply;
    }

    private function extractLabCookies(string $cookieHeader, LabSession $session): string
    {
        if (trim($cookieHeader) === '') {
            return '';
        }

        $defaultTrackingId = $session->secret('tracking_id');
        $defaultLabSession = $session->secret('lab_session_cookie');
        $defaultJwt = $session->buildSessionJwt();

        $kept = [];
        foreach (explode(';', $cookieHeader) as $part) {
            $pair = trim($part);
            if ($pair === '' || ! str_contains($pair, '=')) {
                continue;
            }
            [$name, $val] = array_map('trim', explode('=', $pair, 2));
            $nameLower = strtolower($name);

            if (
                $nameLower === 'xsrf-token'
                || $nameLower === 'laravel_session'
                || str_ends_with($nameLower, '_session')
            ) {
                continue;
            }
            if ($nameLower === 'session' && ($val === $defaultLabSession || $val === $defaultJwt || $val === 'eyJ1c2VyIjoid2llbmVyIiwicm9sZSI6InVzZXIifQ')) {
                continue;
            }
            if ($nameLower === 'trackingid' && ($val === $defaultTrackingId || $val === 'xYz123AbC456')) {
                continue;
            }
            if ($nameLower === 'admin' && strtolower($val) === 'false') {
                continue;
            }

            $kept[] = "{$name}={$val}";
        }

        return implode('; ', $kept);
    }

    /**
     * @param  array<string, string>  $requestHeaders
     */
    private function extractHeaderSignals(array $requestHeaders): string
    {
        $parts = [];
        $currentHost = strtolower((string) ($requestHeaders['Host'] ?? ''));

        foreach (['X-Forwarded-Host', 'X-Host', 'X-Forwarded-Scheme', 'X-Original-URL', 'X-Rewrite-URL', 'Transfer-Encoding', 'Authorization'] as $h) {
            $val = trim((string) ($requestHeaders[$h] ?? ''));
            if ($val !== '') {
                $parts[] = "{$h}: {$val}";
            }
        }

        $origin = trim((string) ($requestHeaders['Origin'] ?? ''));
        if ($origin !== '') {
            $originHost = strtolower((string) parse_url($origin, PHP_URL_HOST));
            $currentHostOnly = strtolower(explode(':', $currentHost)[0]);
            if (strtolower($origin) === 'null' || ($originHost !== '' && $originHost !== $currentHostOnly)) {
                $parts[] = "Origin: {$origin}";
            }
        }

        return implode(' ', $parts);
    }

    private function detectJwtExploit(string $text): bool
    {
        if (preg_match('/("alg"\s*:\s*"none"|"kid"\s*:|"jwk"\s*:|"jku"\s*:)/i', $text)) {
            return true;
        }

        if (preg_match_all('/\b(eyJ[A-Za-z0-9_-]+)\.([A-Za-z0-9_-]+)\.([A-Za-z0-9_-]*)/', $text, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $m) {
                $hdr = json_decode((string) base64_decode(strtr($m[1], '-_', '+/'), true), true);
                $pl = json_decode((string) base64_decode(strtr($m[2], '-_', '+/'), true), true);
                if (is_array($hdr) && strtolower((string) ($hdr['alg'] ?? '')) === 'none') {
                    return true;
                }
                if (is_array($hdr) && (isset($hdr['jwk']) || isset($hdr['jku']) || isset($hdr['kid']))) {
                    return true;
                }
                if (is_array($pl) && (strtolower((string) ($pl['sub'] ?? '')) === 'administrator' || strtolower((string) ($pl['role'] ?? '')) === 'administrator' || ! empty($pl['isAdmin']))) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param  array<string, string>  $params
     */
    private function detectOauthExploit(array $params, string $allParamsText): bool
    {
        $redirectUri = trim((string) ($params['redirect_uri'] ?? ''));
        if ($redirectUri !== '' && preg_match('/(exploit|evil|attacker|\.\.\/|@|#)/i', $redirectUri)) {
            return true;
        }

        return (bool) preg_match('/(redirect_uri\s*=.*?(?:evil|attacker|exploit|\.\.%2f|\.\.\/)|client_secret|access_token|oauth-linking)/i', $allParamsText);
    }

    private function isActionableOfficialToken(string $tokLower, bool $isCustomLab = false): bool
    {
        if ($tokLower === '' || in_array($tokLower, self::GENERIC_IGNORED_TOKENS, true)) {
            return false;
        }

        if ($isCustomLab) {
            return strlen($tokLower) >= 4;
        }

        if (strlen($tokLower) < 6) {
            return false;
        }

        if (preg_match(
            '/(<|>|\'|"|--|;|\||\$\(|\{\{|\$\{|\.\.\/|\.\.%|__proto__|constructor|union\s+|select\s+|delete\s+|update\s+|alert\(|confirm\(|prompt\(|print\(|document\.|fetch\(|xmlhttprequest|postmessage|phar:\/\/|o:\d+:|<!|%00|%0d%0a|\$ne|\$gt|\$where|x-forwarded-host|x-original-url|x-rewrite-url|x-host|temp-forgot-password-token|\/etc\/passwd|\/etc\/hostname|\/cgi-bin\/|phpinfo|jwks\.json|"alg"|"jwk"|"jku"|"kid"|signup30|newcust5|delete_account|delete_user|object\.prototype|json spaces|transport_url|dontwannacry|\/dev\/null|\/my-account\/abc|\/my-account\?abc\.js|\/my-accountabc|\/my-account§§abc|\/aaa\/\.\.%2fmy-account|onerror|onload|onfocus|onmouseover|onresize|onbegin)/i',
            $tokLower
        )) {
            return true;
        }

        return strlen($tokLower) >= 10 && str_contains($tokLower, '_') && (bool) preg_match('/^[a-z0-9_-]+$/', $tokLower);
    }
}
