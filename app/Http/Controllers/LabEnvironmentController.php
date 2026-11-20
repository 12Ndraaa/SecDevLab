<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Lab;
use App\Models\LabSession;
use App\Models\Product;
use App\Services\AvatarUploadService;
use App\Services\LabTriggerService;
use App\Services\SandboxedPhpEvaluator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LabEnvironmentController extends Controller
{
    private const MIME_BY_EXT = [
        '.html' => 'text/html; charset=utf-8',
        '.css' => 'text/css; charset=utf-8',
        '.json' => 'application/json; charset=utf-8',
        '.svg' => 'image/svg+xml',
        '.png' => 'image/png',
        '.jpg' => 'image/jpeg',
        '.jpeg' => 'image/jpeg',
        '.webp' => 'image/webp',
        '.gif' => 'image/gif',
        '.ico' => 'image/x-icon',
    ];

    public function __construct(
        private readonly LabTriggerService $triggerService,
        private readonly AvatarUploadService $uploadService,
        private readonly SandboxedPhpEvaluator $phpEvaluator
    ) {}

    public function handle(Request $request, string $labId, ?string $tail = null): Response
    {
        $lab = Lab::with('category')->find(strtolower($labId));
        if (! $lab) {
            abort(404);
        }

        /** @var int $userId */
        $userId = (int) Auth::id();
        $session = LabSession::forUserAndLab($userId, $lab->id);

        if ($request->query('reset') === '1') {
            $session->resetState();
        }

        $profile = is_array($lab->profile) ? $lab->profile : [];
        $tailParts = $tail ? array_values(array_filter(explode('/', $tail))) : [];
        $subRoute = $tailParts[0] ?? '';
        $subAction = $tailParts[1] ?? '';

        $cookieHeader = (string) $request->header('Cookie', '');
        $rawBody = (string) $request->getContent();
        $params = $this->extractParams($request, $rawBody);

        // Enforce strict feature availability per lab profile
        if ($subRoute === 'chat' || ($params['view'] ?? '') === 'chat') {
            if (empty($profile['hasLiveChat'])) {
                abort(404, 'Live chat is not enabled for this lab.');
            }
        }
        if ($subRoute === 'exploit-server' || $subRoute === 'exploit' || ($params['view'] ?? '') === 'exploit-server') {
            if (empty($profile['hasExploitServer'])) {
                abort(404, 'Exploit server is not enabled for this lab.');
            }
        }
        if ($subRoute === 'email' || ($params['view'] ?? '') === 'email') {
            if (empty($profile['hasEmailClient'])) {
                abort(404, 'Email client is not enabled for this lab.');
            }
        }
        if (in_array($subRoute, ['admin', 'administrator-panel'], true) || ($params['view'] ?? '') === 'admin') {
            $adminAllowed = ! empty($profile['hasAdminPanel']) || in_array($lab->category_id, [
                'access-control-vulnerabilities',
                'server-side-request-forgery-ssrf',
                'cross-site-request-forgery-csrf',
                'business-logic-vulnerabilities',
                'http-host-header-attacks',
            ], true);
            if (! $adminAllowed) {
                abort(404, 'Admin panel is not available for this lab.');
            }
        }

        // 1. Sub-route: /lab-env/{labId}/image?filename=...
        if ($subRoute === 'image') {
            return $this->serveImage($lab, $session, (string) ($params['filename'] ?? '30.jpg'));
        }

        // 2. Sub-route: POST /lab-env/{labId}/my-account/avatar
        if ($subRoute === 'my-account' && $subAction === 'avatar' && $request->isMethod('POST')) {
            return $this->handleAvatarUpload($request, $lab, $session, $params, $cookieHeader);
        }

        // 3. Sub-route: GET /lab-env/{labId}/files/...
        if ($subRoute === 'files') {
            return $this->serveUploadedFile($request, $lab, $session);
        }

        // 4. Sub-route: POST /lab-env/{labId}/chat (Zero-JS SSR Live Chat)
        if ($subRoute === 'chat' && $request->isMethod('POST')) {
            $msg = trim((string) ($params['message'] ?? ''));
            if ($msg !== '') {
                $this->triggerService->handleChatMessage($msg, $lab, $session);
            }
            $params['view'] = 'chat';
        }

        // Normalize view / action from sub-route
        if ($subRoute === 'filter' && ! isset($params['view'])) {
            $params['view'] = 'shop';
        }
        if ($subRoute === 'product') {
            $params['view'] = 'product';
        }
        if ($subRoute === 'post') {
            $params['view'] = 'post';
        }
        if ($subRoute === 'login' || $subRoute === 'my-account') {
            $params['view'] = 'my-account';
            if ($subAction === 'change-email') {
                $params['action'] = 'change-email';
            }
        }
        if ($subRoute === 'exploit-server' || $subRoute === 'exploit') {
            $params['view'] = 'exploit-server';
        }
        if ($subRoute === 'admin' || $subRoute === 'administrator-panel') {
            $params['view'] = 'admin';
            if ($subAction === 'delete') {
                $params['action'] = 'delete';
            }
        }
        if ($subRoute === 'cart') {
            $params['view'] = 'cart';
        }
        if ($subRoute === 'email') {
            $params['view'] = 'email';
        }
        if ($subRoute === 'chat') {
            $params['view'] = 'chat';
        }

        // Handle Exploit Server state persistence and payload requirement
        $exploitFeedback = '';
        $exploitError = '';
        if (($params['view'] ?? '') === 'exploit-server' && $request->isMethod('POST')) {
            $formAction = strtoupper((string) ($params['formAction'] ?? 'DELIVER_TO_VICTIM'));
            $respFile = trim((string) ($params['responseFile'] ?? '/exploit')) ?: '/exploit';
            $respHead = (string) ($params['responseHead'] ?? "HTTP/1.1 200 OK\nContent-Type: text/html; charset=utf-8");
            $respBody = (string) ($params['responseBody'] ?? '');
            $state = is_array($session->exploit_state) ? $session->exploit_state : [];
            $logs = is_array($state['accessLog'] ?? null) ? $state['accessLog'] : [];

            if ($formAction === 'ACCESS_LOG') {
                $exploitFeedback = 'Showing latest victim & scanner access log entries.';
            } elseif (trim($respBody) === '') {
                $exploitError = 'Exploit payload body cannot be empty.';
            } else {
                $state['responseFile'] = $respFile;
                $state['responseHead'] = $respHead;
                $state['responseBody'] = $respBody;
                if ($formAction === 'DELIVER_TO_VICTIM') {
                    $logs[] = now()->format('Y-m-d H:i:s')." UTC — Victim bot fetched {$respFile} (".strlen($respBody).' bytes)';
                    $state['accessLog'] = array_slice($logs, -10);
                    $exploitFeedback = 'Exploit delivered to victim bot.';
                } else {
                    $exploitFeedback = 'Exploit stored at '.$respFile.'. Click "Deliver exploit to victim" to test it.';
                }
                $session->exploit_state = $state;
                $session->save();
            }
        }

        // 5. X-Academy-Repeater JSON mode
        if ($request->header('X-Academy-Repeater') === '1') {
            $trig = $this->triggerService->evaluate($lab, $subRoute, $params, $rawBody, $cookieHeader, $session);

            return response(
                json_encode([
                    'method' => $request->method(),
                    'path' => $request->getRequestUri(),
                    'exfiltrated' => $trig['exfiltrated'],
                    'autoSolved' => $trig['autoSolved'],
                    'secret' => ($trig['exfiltrated'] || $trig['autoSolved']) ? $session->carlos_secret : null,
                    'status' => $trig['autoSolved']
                        ? 'Exploit payload triggered — Lab Solved!'
                        : ($trig['exfiltrated']
                            ? 'Step 1 exfiltration succeeded — complete final step to solve.'
                            : ($trig['exploitMissingPayload']
                                ? 'Exploit payload body cannot be empty.'
                                : 'Request processed (no exploit trigger matched).')),
                ], JSON_UNESCAPED_SLASHES),
                200,
                [
                    'Content-Type' => 'application/json; charset=utf-8',
                    'X-Lab-Solved' => $trig['autoSolved'] ? 'true' : 'false',
                    'X-Lab-Exfiltrated' => $trig['exfiltrated'] ? 'true' : 'false',
                    'Cache-Control' => 'no-store',
                ]
            );
        }

        return $this->renderEnvironment(
            $lab,
            $subRoute,
            $params,
            $rawBody,
            $cookieHeader,
            $session,
            [],
            $exploitFeedback,
            $exploitError,
            $request->isMethod('POST')
        );
    }

    /**
     * @param  array<string, string>  $params
     */
    private function handleAvatarUpload(
        Request $request,
        Lab $lab,
        LabSession $session,
        array $params,
        string $cookieHeader
    ): Response {
        $result = $this->uploadService->processUpload($request, $lab, $session);
        if (! $result['ok']) {
            return response(
                $result['errorBody'] ?? 'Upload forbidden',
                $result['status'],
                array_merge($result['headers'], ['Content-Type' => 'text/plain; charset=utf-8'])
            );
        }

        $params['view'] = 'upload-result';
        $params['uploadMsg'] = 'The file '.$result['reportedPath'].' has been uploaded.';

        return $this->renderEnvironment($lab, 'my-account', $params, '', $cookieHeader, $session, $result['headers']);
    }

    private function serveUploadedFile(Request $request, Lab $lab, LabSession $session): Response
    {
        $rawUriPath = explode('?', (string) $request->server('REQUEST_URI', $request->getPathInfo()))[0];
        $marker = '/lab-env/'.$lab->id.'/files/';
        $pos = stripos($rawUriPath, $marker);
        $rawRel = $pos !== false ? substr($rawUriPath, $pos + strlen($marker)) : '';

        $normalizedKey = $this->uploadService->normalizeStorageKey($rawRel);
        $record = $this->uploadService->findActiveFile($session->user_id, $lab->id, $normalizedKey);

        if (! $record) {
            if ($normalizedKey === 'avatars/default.jpg') {
                $defaultImgPath = public_path('image/productcatalog/products/30.jpg');
                if (is_file($defaultImgPath)) {
                    return response(file_get_contents($defaultImgPath), 200, [
                        'Content-Type' => 'image/jpeg',
                        'Cache-Control' => 'no-store',
                    ]);
                }
            }

            return response('Not Found', 404, [
                'Content-Type' => 'text/plain; charset=utf-8',
                'Cache-Control' => 'no-store',
            ]);
        }

        $profile = is_array($lab->profile) ? $lab->profile : [];
        $rule = $profile['uploadRule'] ?? 'no-validation';
        $ext = $this->uploadService->posixExtname($normalizedKey);
        $fileBuffer = (string) $record->content;

        if ($rule === 'path-traversal' && str_starts_with($normalizedKey, 'avatars/')) {
            return response($fileBuffer, 200, [
                'Content-Type' => 'text/plain; charset=utf-8',
                'Cache-Control' => 'no-store',
            ]);
        }

        $execExts = is_array($session->executable_exts) ? $session->executable_exts : LabSession::DEFAULT_EXECUTABLE_EXTS;
        $canExec = in_array($ext, $execExts, true)
            || ($rule === 'path-traversal' && ! str_starts_with($normalizedKey, 'avatars/') && $ext === '.php');

        if ($canExec) {
            $evaluated = $this->phpEvaluator->evaluate($fileBuffer, $request->query(), $session);
            $isBinaryImg = $this->phpEvaluator->hasValidImageMagicBytes($evaluated['outputBuffer']);

            return response($evaluated['outputBuffer'], 200, [
                'Content-Type' => $isBinaryImg ? 'application/octet-stream' : 'text/html; charset=utf-8',
                'X-Lab-Exfiltrated' => $evaluated['exfiltrated'] ? 'true' : 'false',
                'Cache-Control' => 'no-store',
            ]);
        }

        $mimeType = self::MIME_BY_EXT[$ext] ?? ($record->content_type ?: 'application/octet-stream');

        return response($fileBuffer, 200, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'no-store',
        ]);
    }

    private function serveImage(Lab $lab, LabSession $session, string $fn): Response
    {
        $profile = is_array($lab->profile) ? $lab->profile : [];
        $isPathTraversalLab = $lab->category_id === 'path-traversal' || ! empty($profile['usesImageFilenameEndpoint']);

        if ($isPathTraversalLab && (str_contains($fn, '..') || str_contains($fn, 'passwd') || str_contains($fn, 'secret'))) {
            $session->exfiltrated = true;
            if (empty($profile['requiresMultiStep'])) {
                $session->solved = true;
                $session->solved_at = $session->solved_at ?? now();
            }
            $session->save();

            $mockLines = implode("\n", [
                'root:x:0:0:root:/root:/bin/bash',
                'daemon:x:1:1:daemon:/usr/sbin:/usr/sbin/nologin',
                'carlos:x:1001:1001::/home/carlos:/bin/bash',
                '# /home/carlos/secret: 9k2m7v4x8p1q3w5z6r0t',
                '',
            ]);

            return response($mockLines, 200, [
                'Content-Type' => 'text/plain; charset=utf-8',
                'X-Lab-Solved' => $session->solved ? 'true' : 'false',
                'Cache-Control' => 'no-store',
            ]);
        }

        $num = (int) preg_replace('/\D+/', '', $fn) ?: 30;
        $prod = Product::find($num) ?? Product::first();
        if ($prod) {
            $imgPath = public_path(ltrim($prod->img, '/'));
            if (is_file($imgPath)) {
                return response(file_get_contents($imgPath), 200, [
                    'Content-Type' => 'image/jpeg',
                    'Cache-Control' => 'no-store',
                ]);
            }
        }

        return response($this->renderProductSvg($num), 200, [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'no-store',
        ]);
    }

    /**
     * @param  array<string, string>  $params
     * @param  array<string, string>  $extraHeaders
     */
    private function renderEnvironment(
        Lab $lab,
        string $subRoute,
        array $params,
        string $rawBody,
        string $cookieHeader,
        LabSession $session,
        array $extraHeaders = [],
        string $exploitFeedback = '',
        string $exploitError = '',
        bool $isPost = false
    ): Response {
        $profile = is_array($lab->profile) ? $lab->profile : [];
        $theme = ($profile['theme'] ?? 'ecommerce') === 'blog' ? 'blog' : 'ecommerce';
        $defaultLandingView = $theme === 'blog' ? 'blog' : 'shop';

        $viewParam = $params['view'] ?? '';
        $productIdParam = $params['productId'] ?? '';
        $postIdParam = $params['postId'] ?? '';
        $categoryParam = $params['category'] ?? 'All';
        $searchParam = $params['search'] ?? '';
        $storeIdParam = $params['storeId'] ?? '';
        $userParam = $params['username'] ?? '';
        $commentParam = $params['comment'] ?? '';
        $isMystery = ($params['mystery'] ?? '') === '1';
        $revealMystery = ($params['reveal'] ?? '') === '1';

        $activeView = $viewParam !== ''
            ? $viewParam
            : ($productIdParam !== '' ? 'product' : ($postIdParam !== '' ? 'post' : $defaultLandingView));

        $triggers = $this->triggerService->evaluate($lab, $subRoute, $params, $rawBody, $cookieHeader, $session);

        // Seeded products for this lab
        $allProducts = Product::all()->keyBy('id');
        $seededProductIds = $profile['productIds'] ?? [7, 12, 17, 9, 14, 19, 8, 13, 18, 10, 15, 20];
        $labProducts = [];
        foreach ($seededProductIds as $pid) {
            if ($allProducts->has($pid)) {
                $labProducts[] = $allProducts->get($pid);
            }
        }
        foreach ($allProducts as $prod) {
            if (! $prod->released) {
                $labProducts[] = $prod;
            }
        }

        $visibleProducts = array_values(array_filter($labProducts, static function (Product $p) use ($triggers, $categoryParam, $searchParam): bool {
            if ($triggers['sqliTriggered']) {
                return true;
            }
            if (! $p->released) {
                return false;
            }
            if ($categoryParam !== 'All' && strcasecmp($p->cat, $categoryParam) !== 0) {
                return false;
            }
            if ($searchParam !== '' && stripos($p->name, $searchParam) === false) {
                return false;
            }

            return true;
        }));

        $selectedProduct = null;
        foreach ($labProducts as $lp) {
            if ((string) $lp->id === (string) $productIdParam) {
                $selectedProduct = $lp;
                break;
            }
        }
        $selectedProduct ??= ($labProducts[0] ?? Product::first());

        $stockOutput = '';
        if ($storeIdParam !== '') {
            if ($triggers['cmdTriggered']) {
                $stockOutput = "42 units\npeter-wiener-academy-host\nuid=1001(carlos) gid=1001(carlos) groups=1001(carlos)\n/home/carlos/secret: 9k2m7v4x8p1q3w5z6r0t";
            } elseif ($triggers['ssrfOrXxeTriggered']) {
                $stockOutput = "HTTP/1.1 200 OK\nAdmin Interface Reached via Internal Loopback\nroot:x:0:0:root:/root:/bin/bash\ncarlos:x:1001:1001::/home/carlos:/bin/bash\nAWS SecretAccessKey: wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY";
            } else {
                $stockOutput = "64 units in stock at {$storeIdParam}";
            }
        }

        // Seeded blog posts for this lab
        $allPosts = BlogPost::all()->keyBy('id');
        $seededBlogIds = $profile['blogPostIds'] ?? [1, 2, 3, 4];
        $blogPosts = [];
        foreach ($seededBlogIds as $bid) {
            if ($allPosts->has($bid)) {
                $blogPosts[] = $allPosts->get($bid);
            }
        }
        $selectedPost = null;
        foreach ($blogPosts as $bp) {
            if ((string) $bp->id === (string) $postIdParam) {
                $selectedPost = $bp;
                break;
            }
        }

        if ($triggers['sstiTriggered']) {
            if (str_contains($searchParam, '7*7')) {
                $sstiEval = '49';
            } elseif (preg_match('/secret|settings|object|env|passwd/i', $searchParam)) {
                $sstiEval = $session->carlos_secret ?: LabSession::DEFAULT_CARLOS_SECRET;
            } else {
                $sstiEval = $searchParam;
            }
        } else {
            $sstiEval = $searchParam;
        }
        $unionRows = $this->triggerService->buildUnionRows($triggers['unionTriggered'], $categoryParam, $searchParam);

        $rawCategories = $profile['categories'] ?? ['All', 'Accessories', 'Clothing, shoes and accessories', 'Gifts', 'Lifestyle'];
        $categoriesList = array_map(static fn (string $label): array => [
            'label' => $label,
            'href' => $label === 'All'
                ? "/lab-env/{$lab->id}"
                : "/lab-env/{$lab->id}/filter?category=".str_replace('%20', '+', rawurlencode($label)),
        ], $rawCategories);

        $usesImageEndpoint = ! empty($profile['usesImageFilenameEndpoint']);
        $resolveProdImg = static fn (Product $p): string => $usesImageEndpoint
            ? "/lab-env/{$lab->id}/image?filename={$p->filename}"
            : $p->img;

        $currentUser = $session->logged_in_user ?: ($triggers['validLoginTriggered'] ? $userParam : '');
        $avatarSrc = $session->avatar_path ?: "/lab-env/{$lab->id}/files/avatars/default.jpg";

        $cartMessage = '';
        if ($activeView === 'cart' && $isPost) {
            $cartMessage = $triggers['autoSolved']
                ? 'Order placed successfully!'
                : 'Not enough store credit ($100.00) to purchase $1337.00 item without a valid discount or price flaw.';
        }

        $submitSolutionError = '';
        if ($subRoute === 'submit-solution' && $isPost && ! $triggers['autoSolved']) {
            $submitSolutionError = ! empty($profile['requiresSubmitAfterExfil']) && ! $triggers['exfiltrated']
                ? 'Solution rejected: complete the vulnerability exploitation / exfiltration step before submitting the secret.'
                : 'Incorrect solution secret submitted. Verify the extracted secret from the target environment.';
        }

        $exploitState = is_array($session->exploit_state) ? $session->exploit_state : [];

        $html = view('lab-env.show', [
            'lab' => $lab,
            'profile' => $profile,
            'theme' => $theme,
            'themeCssHref' => $theme === 'blog' ? '/resources/css/labsBlog.css' : '/resources/css/labsEcommerce.css',
            'isMystery' => $isMystery,
            'revealMystery' => $revealMystery,
            'activeView' => $activeView,
            'categoryParam' => $categoryParam,
            'searchParam' => $searchParam,
            'storeIdParam' => $storeIdParam,
            'userParam' => $userParam,
            'commentParam' => $commentParam,
            'uploadMsg' => $params['uploadMsg'] ?? '',
            'cookieHeader' => $cookieHeader,
            'exfiltrated' => $triggers['exfiltrated'],
            'autoSolved' => $triggers['autoSolved'],
            'validLoginTriggered' => $triggers['validLoginTriggered'],
            'adminDeleteCarlos' => $triggers['adminDeleteCarlos'],
            'visibleProducts' => $visibleProducts,
            'selectedProduct' => $selectedProduct,
            'stockOutput' => $stockOutput,
            'blogPosts' => $blogPosts,
            'selectedPost' => $selectedPost,
            'sstiEval' => $sstiEval,
            'unionRows' => $unionRows,
            'categoriesList' => $categoriesList,
            'resolveProdImg' => $resolveProdImg,
            'currentUser' => $currentUser,
            'avatarSrc' => $avatarSrc,
            'chatHistory' => is_array($session->chat_history) ? $session->chat_history : [],
            'exploitState' => $exploitState,
            'exploitFeedback' => $exploitFeedback,
            'exploitError' => $exploitError,
            'cartMessage' => $cartMessage,
            'submitSolutionError' => $submitSolutionError,
        ])->render();

        $headers = array_merge([
            'Content-Type' => 'text/html; charset=utf-8',
            'Cache-Control' => 'no-store',
        ], $extraHeaders);

        $response = response($html, 200, $headers);
        if (! empty($profile['cookies']) && is_array($profile['cookies'])) {
            foreach ($profile['cookies'] as $rawCookie) {
                $response->headers->set('Set-Cookie', (string) $rawCookie, false);
            }
        }

        return $response;
    }

    /**
     * @return array<string, string>
     */
    private function extractParams(Request $request, string $rawBody): array
    {
        $params = [];
        foreach ($request->query() as $k => $v) {
            if (is_scalar($v)) {
                $params[(string) $k] = (string) $v;
            }
        }
        foreach ($request->request->all() as $k => $v) {
            if (is_scalar($v)) {
                $params[(string) $k] = (string) $v;
            }
        }

        $contentType = (string) $request->header('Content-Type', '');
        $isMultipart = stripos($contentType, 'multipart/form-data') !== false || str_starts_with($rawBody, '--');

        if (! $isMultipart && $rawBody !== '') {
            $trimmed = trim($rawBody);
            if (str_starts_with($trimmed, '{')) {
                $decoded = json_decode($trimmed, true);
                if (is_array($decoded)) {
                    foreach ($decoded as $k => $v) {
                        if (is_scalar($v)) {
                            $params[(string) $k] = (string) $v;
                        }
                    }
                }
            } elseif (str_contains($trimmed, '=')) {
                parse_str($trimmed, $bodyParams);
                foreach ($bodyParams as $k => $v) {
                    if (is_scalar($v)) {
                        $params[(string) $k] = (string) $v;
                    }
                }
            }
        }

        return $params;
    }

    private function renderProductSvg(int $id): string
    {
        $palettes = [
            ['#001350', '#ff6633', 'M20 70 L50 25 L80 70 Z'],
            ['#115f82', '#29ace5', 'M30 30 H70 V70 H30 Z'],
            ['#159c80', '#70d16d', 'M50 22 A28 28 0 1 0 50 78 A28 28 0 1 0 50 22'],
            ['#9160a5', '#ffaf10', 'M25 65 L40 30 L60 55 L75 25 L85 65 Z'],
            ['#333332', '#ff6633', 'M25 35 H75 V65 H25 Z'],
            ['#0066cc', '#70d16d', 'M50 20 L78 50 L50 80 L22 50 Z'],
        ];
        [$bg, $fg, $shape] = $palettes[max($id - 1, 0) % count($palettes)];

        return '<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:160px;background:'.$bg.';border-radius:4px;display:block">'
            .'<path d="'.$shape.'" fill="'.$fg.'" opacity="0.9"/>'
            .'<circle cx="75" cy="25" r="8" fill="#ffffff" opacity="0.25"/>'
            .'</svg>';
    }
}
