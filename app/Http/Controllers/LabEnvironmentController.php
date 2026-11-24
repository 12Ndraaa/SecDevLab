<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Lab;
use App\Models\LabSession;
use App\Models\LabUploadedFile;
use App\Models\Product;
use App\Services\AvatarUploadService;
use App\Services\LabArchetypeResolver;
use App\Services\LabTriggerService;
use App\Services\LabUrlService;
use App\Services\SandboxedPhpEvaluator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

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
        private readonly SandboxedPhpEvaluator $phpEvaluator,
        private readonly LabUrlService $urlService,
        private readonly LabArchetypeResolver $archetypeResolver
    ) {}

    public function handleBySubdomainToken(Request $request, ?string $tail = null): Response
    {
        $token = (string) ($request->route('token') ?: $this->urlService->extractTokenFromHost((string) $request->getHost()));
        if ($token === '') {
            abort(404);
        }

        return $this->handleByToken($request, $token, $tail);
    }

    public function handleByToken(Request $request, string $token, ?string $tail = null): Response
    {
        $session = LabSession::findByToken($token);
        if (! $session || ! $session->lab) {
            abort(404);
        }

        $lab = $session->lab;
        $basePath = $this->urlService->pathPrefix($session, $request);
        $labLocale = $session->uiLocale();
        App::setLocale($labLocale);
        Carbon::setLocale($labLocale);

        $tailParts = $tail ? array_values(array_filter(explode('/', $tail))) : [];
        $subRoute = strtolower((string) ($tailParts[0] ?? ''));
        $subAction = strtolower((string) ($tailParts[1] ?? ''));

        // Non-sensitive display theme & locale toggles for the lab Command Bar
        if ($subRoute === '_theme' && $request->isMethod('POST')) {
            $nextTheme = $request->input('ui_theme');
            if (! in_array($nextTheme, ['dark', 'light'], true)) {
                $nextTheme = ($session->ui_theme === 'dark') ? 'light' : 'dark';
            }
            $session->ui_theme = $nextTheme;
            $session->save();

            return new Response('', 302, [
                'Location' => $basePath !== '' ? $basePath : '/',
            ]);
        }

        if ($subRoute === '_locale' && $request->isMethod('POST')) {
            $nextLocale = strtolower(trim((string) ($request->input('ui_locale', $request->input('locale', '')))));
            if (! in_array($nextLocale, ['en', 'id'], true)) {
                $nextLocale = ($labLocale === 'id') ? 'en' : 'id';
            }
            $session->setUiLocale($nextLocale, true);
            if ($session->user_id) {
                Cache::put("secdevlab_pending_locale:{$session->user_id}", $nextLocale, now()->addHours(24));
                LabSession::where('user_id', $session->user_id)
                    ->where('id', '!=', $session->id)
                    ->get()
                    ->each(static fn (LabSession $other) => $other->setUiLocale($nextLocale, false));
            }

            return new Response('', 302, [
                'Location' => $basePath !== '' ? $basePath : '/',
            ]);
        }

        if ($session->isExpired()) {
            if ($request->header('X-Academy-Repeater') === '1' || $request->expectsJson()) {
                return response(
                    json_encode([
                        'error' => __('academy.expired.page_title').' - '.$lab->title,
                        'expired' => true,
                        'relaunchUrl' => url('/academy/labs/launch/'.$lab->id),
                    ], JSON_UNESCAPED_SLASHES),
                    410,
                    ['Content-Type' => 'application/json; charset=utf-8']
                );
            }

            return response(
                view('lab-env.expired', [
                    'session' => $session,
                    'lab' => $lab,
                    'archetype' => $this->archetypeResolver->meta($lab),
                    'labUiLocale' => $labLocale,
                ])->render(),
                410,
                ['Content-Type' => 'text/html; charset=utf-8']
            );
        }

        $profile = is_array($lab->profile) ? $lab->profile : [];
        $cookieHeader = (string) $request->header('Cookie', '');
        $rawBody = (string) $request->getContent();
        $params = $this->extractParams($request, $rawBody);
        $requestHeaders = $this->extractRequestHeaders($request);

        // Enforce strict feature availability per lab profile
        if ($subRoute === 'chat' || ($params['view'] ?? '') === 'chat') {
            if (empty($profile['hasLiveChat'])) {
                abort(404, __('academy.workbench.feature_no_chat'));
            }
        }
        if ($subRoute === 'exploit-server' || $subRoute === 'exploit' || ($params['view'] ?? '') === 'exploit-server') {
            if (empty($profile['hasExploitServer'])) {
                abort(404, __('academy.workbench.feature_no_exploit'));
            }
        }
        if ($subRoute === 'email' || ($params['view'] ?? '') === 'email') {
            if (empty($profile['hasEmailClient'])) {
                abort(404, __('academy.workbench.feature_no_email'));
            }
        }
        if (in_array($subRoute, ['admin', 'administrator-panel'], true) || ($params['view'] ?? '') === 'admin') {
            $adminAllowed = ! empty($profile['hasAdminPanel']) || in_array($lab->category_id, [
                'access-control-vulnerabilities',
                'server-side-request-forgery-ssrf',
                'cross-site-request-forgery-csrf',
                'business-logic-vulnerabilities',
                'http-host-header-attacks',
                'jwt',
                'oauth-authentication',
            ], true);
            if (! $adminAllowed) {
                abort(404, __('academy.workbench.feature_no_admin'));
            }
        }

        // 1. Sub-route: /lab/{token}/image?filename=...
        if ($subRoute === 'image') {
            return $this->serveImage($lab, $session, (string) ($params['filename'] ?? '30.jpg'));
        }

        // 2. Sub-route: POST /lab/{token}/my-account/avatar
        if ($subRoute === 'my-account' && $subAction === 'avatar' && $request->isMethod('POST')) {
            return $this->handleAvatarUpload($request, $lab, $session, $params, $cookieHeader, $requestHeaders);
        }

        // 3. Sub-route: GET /lab/{token}/files/...
        if ($subRoute === 'files') {
            return $this->serveUploadedFile($request, $lab, $session);
        }

        // 4. Sub-route: POST /lab/{token}/chat (Zero-JS SSR Live Chat)
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
        if ($subRoute === 'shop') {
            $params['view'] = 'shop';
        }
        if ($subRoute === 'product') {
            $params['view'] = 'product';
        }
        if ($subRoute === 'blog') {
            $params['view'] = 'blog';
        }
        if ($subRoute === 'post') {
            $params['view'] = 'post';
        }
        if ($subRoute === 'login' || $subRoute === 'my-account') {
            $params['view'] = $lab->category_id === 'file-upload-vulnerabilities' ? 'media-portal' : 'my-account';
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
        if ($subRoute === 'graphql') {
            $params['view'] = 'graphql';
        }
        if ($subRoute === 'api') {
            $params['view'] = 'api-explorer';
            if ($tail && ! isset($params['apiPath'])) {
                $params['apiPath'] = '/'.ltrim($tail, '/');
            }
        }
        if ($subRoute === 'oauth') {
            $params['view'] = 'oauth-workbench';
        }
        if ($subRoute === 'jwt') {
            $params['view'] = 'jwt-workbench';
        }
        if (in_array($subRoute, ['inspector', 'robots.txt', 'backup', '.git', 'phpinfo', 'actuator', '_workbench'], true)) {
            if (! isset($params['view'])) {
                $params['view'] = $this->archetypeResolver->defaultLandingView($lab);
            }
            if (in_array($subRoute, ['robots.txt', 'backup', '.git', 'phpinfo', 'actuator'], true) && ! isset($params['probePath'])) {
                $params['probePath'] = '/'.ltrim($tail ?? $subRoute, '/');
            }
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
                $exploitFeedback = __('academy.workbench.access_log_feedback');
            } elseif (trim($respBody) === '') {
                $exploitError = __('academy.workbench.empty_exploit_error');
            } else {
                $state['responseFile'] = $respFile;
                $state['responseHead'] = $respHead;
                $state['responseBody'] = $respBody;
                if ($formAction === 'DELIVER_TO_VICTIM') {
                    $logs[] = now()->format('Y-m-d H:i:s')." UTC - Victim bot fetched {$respFile} (".strlen($respBody).' bytes)';
                    $state['accessLog'] = array_slice($logs, -10);
                    $exploitFeedback = __('academy.workbench.exploit_delivered_feedback');
                } else {
                    $exploitFeedback = __('academy.workbench.exploit_stored_feedback', ['file' => $respFile]);
                }
                $session->exploit_state = $state;
                $session->save();
            }
        }

        // 5. X-Academy-Repeater JSON mode
        if ($request->header('X-Academy-Repeater') === '1') {
            $trig = $this->triggerService->evaluate($lab, $subRoute, $params, $rawBody, $cookieHeader, $session, $requestHeaders);

            return response(
                json_encode([
                    'method' => $request->method(),
                    'path' => $request->getRequestUri(),
                    'instanceToken' => $session->instance_token,
                    'exfiltrated' => $trig['exfiltrated'],
                    'autoSolved' => $trig['autoSolved'],
                    'secret' => ($trig['exfiltrated'] || $trig['autoSolved']) ? $session->secret('carlos_secret') : null,
                    'status' => $trig['autoSolved']
                        ? __('academy.workbench.repeater_solved')
                        : ($trig['exfiltrated']
                            ? __('academy.workbench.repeater_exfil')
                            : ($trig['exploitMissingPayload']
                                ? __('academy.workbench.empty_exploit_error')
                                : __('academy.workbench.repeater_processed'))),
                ], JSON_UNESCAPED_SLASHES),
                200,
                [
                    'Content-Type' => 'application/json; charset=utf-8',
                    'X-Lab-Solved' => $trig['autoSolved'] ? 'true' : 'false',
                    'X-Lab-Exfiltrated' => $trig['exfiltrated'] ? 'true' : 'false',
                    'X-Lab-Instance' => (string) $session->instance_token,
                    'Cache-Control' => 'no-store',
                ]
            );
        }

        return $this->renderEnvironment(
            $request,
            $lab,
            $subRoute,
            $params,
            $rawBody,
            $cookieHeader,
            $requestHeaders,
            $session,
            [],
            $exploitFeedback,
            $exploitError,
            $request->isMethod('POST')
        );
    }

    /**
     * @param  array<string, string>  $params
     * @param  array<string, string>  $requestHeaders
     */
    private function handleAvatarUpload(
        Request $request,
        Lab $lab,
        LabSession $session,
        array $params,
        string $cookieHeader,
        array $requestHeaders
    ): Response {
        $result = $this->uploadService->processUpload($request, $lab, $session);
        if (! $result['ok']) {
            return response(
                $result['errorBody'] ?? __('lab_runtime.upload_forbidden'),
                $result['status'],
                array_merge($result['headers'], ['Content-Type' => 'text/plain; charset=utf-8'])
            );
        }

        $params['view'] = 'upload-result';
        $params['uploadMsg'] = app()->getLocale() === 'id'
            ? 'Berkas '.$result['reportedPath'].' berhasil diunggah.'
            : 'The file '.$result['reportedPath'].' has been uploaded.';

        return $this->renderEnvironment($request, $lab, 'my-account', $params, '', $cookieHeader, $requestHeaders, $session, $result['headers']);
    }

    private function serveUploadedFile(Request $request, Lab $lab, LabSession $session): Response
    {
        $rawUriPath = explode('?', (string) $request->server('REQUEST_URI', $request->getPathInfo()))[0];
        $marker = '/files/';
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
        $headers = [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'no-store',
        ];
        if (in_array($ext, ['.html', '.htm', '.svg'], true)) {
            $headers['Content-Security-Policy'] = "sandbox; default-src 'none'; style-src 'unsafe-inline'; img-src 'self' data:";
        }

        return response($fileBuffer, 200, $headers);
    }

    private function serveImage(Lab $lab, LabSession $session, string $fn): Response
    {
        $profile = is_array($lab->profile) ? $lab->profile : [];
        $isPathTraversalLab = $lab->category_id === 'path-traversal' || ! empty($profile['usesImageFilenameEndpoint']);

        if ($isPathTraversalLab && (str_contains($fn, '..') || str_contains($fn, 'passwd') || str_contains($fn, 'secret'))) {
            $session->exfiltrated = true;
            if (empty($profile['requiresMultiStep'])) {
                $session->instance_solved = true;
                if (! $session->solved) {
                    $session->solved = true;
                    $session->solved_at = now();
                }
            }
            $session->save();

            $mockLines = implode("\n", [
                'root:x:0:0:root:/root:/bin/bash',
                'daemon:x:1:1:daemon:/usr/sbin:/usr/sbin/nologin',
                'carlos:x:1001:1001::/home/carlos:/bin/bash',
                '# /home/carlos/secret: '.$session->secret('file_secret'),
                '',
            ]);

            return response($mockLines, 200, [
                'Content-Type' => 'text/plain; charset=utf-8',
                'X-Lab-Solved' => $session->instance_solved ? 'true' : 'false',
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
     * @param  array<string, string>  $requestHeaders
     * @param  array<string, string>  $extraHeaders
     */
    private function renderEnvironment(
        Request $request,
        Lab $lab,
        string $subRoute,
        array $params,
        string $rawBody,
        string $cookieHeader,
        array $requestHeaders,
        LabSession $session,
        array $extraHeaders = [],
        string $exploitFeedback = '',
        string $exploitError = '',
        bool $isPost = false
    ): Response {
        $profile = is_array($lab->profile) ? $lab->profile : [];
        $archetype = $this->archetypeResolver->resolve($lab);
        $archetypeMeta = $this->archetypeResolver->meta($lab);
        $basePath = $this->urlService->pathPrefix($session, $request);
        $baseUrl = $this->urlService->absoluteBaseUrl($session, $request);
        $cookiePath = $this->urlService->cookiePath($session, $request);
        $theme = ($profile['theme'] ?? 'ecommerce') === 'blog' ? 'blog' : 'ecommerce';

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

        $defaultLandingView = $this->archetypeResolver->defaultLandingView($lab);
        $activeView = $viewParam !== ''
            ? $viewParam
            : ($productIdParam !== '' ? 'product' : ($postIdParam !== '' ? 'post' : $defaultLandingView));

        $triggers = $this->triggerService->evaluate($lab, $subRoute, $params, $rawBody, $cookieHeader, $session, $requestHeaders);

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
                $stockOutput = "42 units\n"
                    .$session->secret('hostname')."\n"
                    ."uid=1001(carlos) gid=1001(carlos) groups=1001(carlos)\n"
                    .'/home/carlos/secret: '.$session->secret('file_secret');
            } elseif ($triggers['ssrfOrXxeTriggered']) {
                $stockOutput = "HTTP/1.1 200 OK\n"
                    ."Admin Interface Reached via Internal Loopback\n"
                    ."root:x:0:0:root:/root:/bin/bash\n"
                    ."carlos:x:1001:1001::/home/carlos:/bin/bash\n"
                    .'AWS SecretAccessKey: '.$session->secret('aws_secret');
            } else {
                $stockOutput = __('academy.workbench.stock_units_at', ['count' => 64, 'store' => $storeIdParam]);
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
                $sstiEval = $session->secret('file_secret');
            } else {
                $sstiEval = $searchParam;
            }
        } else {
            $sstiEval = $searchParam;
        }
        $unionRows = $this->triggerService->buildUnionRows($triggers['unionTriggered'], $categoryParam, $searchParam, $session);

        $rawCategories = $profile['categories'] ?? ['All', 'Accessories', 'Clothing, shoes and accessories', 'Gifts', 'Lifestyle'];
        $categoriesList = array_map(static fn (string $label): array => [
            'label' => $label,
            'href' => $label === 'All'
                ? ($basePath !== '' ? $basePath.'/shop' : '/shop')
                : $basePath.'/filter?category='.str_replace('%20', '+', rawurlencode($label)),
        ], $rawCategories);

        $usesImageEndpoint = ! empty($profile['usesImageFilenameEndpoint']) || $lab->category_id === 'path-traversal';
        $resolveProdImg = static fn (Product $p): string => $usesImageEndpoint
            ? "{$basePath}/image?filename={$p->filename}"
            : $p->img;

        $currentUser = $session->logged_in_user ?: ($triggers['validLoginTriggered'] ? $userParam : '');
        $avatarSrc = $session->avatar_path !== ''
            ? (str_starts_with($session->avatar_path, '/') ? $session->avatar_path : "{$basePath}/".ltrim($session->avatar_path, '/'))
            : "{$basePath}/files/avatars/default.jpg";

        $cartMessage = '';
        if ($activeView === 'cart' && $isPost) {
            $cartMessage = $triggers['autoSolved']
                ? __('academy.workbench.cart_success')
                : __('academy.workbench.cart_insufficient');
        }

        $submitSolutionError = '';
        if ($subRoute === 'submit-solution' && $isPost && ! $triggers['autoSolved']) {
            $submitSolutionError = ! empty($profile['requiresSubmitAfterExfil']) && ! $triggers['exfiltrated']
                ? __('academy.workbench.solution_need_exfil')
                : __('academy.workbench.solution_wrong');
        }

        // Contextual Workbench Execution & Telemetry Logging
        $workbenchOutput = $this->buildWorkbenchOutput($lab, $archetype, $subRoute, $params, $rawBody, $requestHeaders, $session, $triggers, $isPost);
        $uploadedFiles = LabUploadedFile::where('user_id', $session->user_id)
            ->where('lab_id', $lab->id)
            ->orderByDesc('updated_at')
            ->get(['storage_key', 'content_type', 'expires_at_ms']);

        $exploitState = is_array($session->exploit_state) ? $session->exploit_state : [];
        $sessionJwt = $session->buildSessionJwt($currentUser !== '' ? $currentUser : null);

        $html = view('lab-env.show', [
            'lab' => $lab,
            'session' => $session,
            'profile' => $profile,
            'archetype' => $archetype,
            'archetypeMeta' => $archetypeMeta,
            'basePath' => $basePath,
            'baseUrl' => $baseUrl,
            'urlMode' => $this->urlService->isSubdomainMode() ? 'subdomain' : 'path',
            'labUiTheme' => in_array($session->ui_theme, ['dark', 'light'], true) ? $session->ui_theme : 'light',
            'labUiLocale' => $session->uiLocale(),
            'theme' => $theme,
            'isMystery' => $isMystery,
            'revealMystery' => $revealMystery,
            'defaultLandingView' => $defaultLandingView,
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
            'academySolved' => (bool) $session->solved,
            'validLoginTriggered' => $triggers['validLoginTriggered'],
            'adminDeleteCarlos' => $triggers['adminDeleteCarlos'],
            'visibleProducts' => $visibleProducts,
            'selectedProduct' => $selectedProduct,
            'labProducts' => $labProducts,
            'stockOutput' => $stockOutput,
            'blogPosts' => $blogPosts,
            'selectedPost' => $selectedPost,
            'sstiEval' => $sstiEval,
            'unionRows' => $unionRows,
            'categoriesList' => $categoriesList,
            'resolveProdImg' => $resolveProdImg,
            'currentUser' => $currentUser,
            'avatarSrc' => $avatarSrc,
            'uploadedFiles' => $uploadedFiles,
            'chatHistory' => is_array($session->chat_history) ? $session->chat_history : [],
            'exploitState' => $exploitState,
            'exploitFeedback' => $exploitFeedback,
            'exploitError' => $exploitError,
            'cartMessage' => $cartMessage,
            'submitSolutionError' => $submitSolutionError,
            'workbenchOutput' => $workbenchOutput,
            'sessionJwt' => $sessionJwt,
            'wienerApiKey' => $session->secret('wiener_api_key'),
            'csrfToken' => $session->secret('csrf_token'),
            'forgotToken' => $session->secret('forgot_password_token'),
            'trackingIdDefault' => $session->secret('tracking_id'),
            'requestHeaders' => $requestHeaders,
            'params' => $params,
        ])->render();

        $headers = array_merge([
            'Content-Type' => 'text/html; charset=utf-8',
            'Cache-Control' => 'no-store, no-cache, must-revalidate',
        ], $extraHeaders);

        $response = response($html, 200, $headers);
        $this->attachIsolatedLabCookies($response, $profile, $session, $cookiePath, $lab->category_id === 'jwt');

        return $response;
    }

    /**
     * @param  array<string, mixed>  $profile
     */
    private function attachIsolatedLabCookies(
        Response $response,
        array $profile,
        LabSession $session,
        string $cookiePath,
        bool $isJwtLab
    ): void {
        $sessionVal = $isJwtLab ? $session->buildSessionJwt() : $session->secret('lab_session_cookie');
        $response->headers->set(
            'Set-Cookie',
            "session={$sessionVal}; Path={$cookiePath}; HttpOnly; SameSite=Lax",
            false
        );

        if (! empty($profile['hasTrackingIdCookie'])) {
            $trackingId = $session->secret('tracking_id');
            $response->headers->set(
                'Set-Cookie',
                "TrackingId={$trackingId}; Path={$cookiePath}; SameSite=Lax",
                false
            );
        }

        $rawCookies = is_array($profile['cookies'] ?? null) ? $profile['cookies'] : [];
        foreach ($rawCookies as $raw) {
            if (is_string($raw) && str_starts_with(trim($raw), 'Admin=')) {
                $response->headers->set(
                    'Set-Cookie',
                    "Admin=false; Path={$cookiePath}; SameSite=Lax",
                    false
                );
                break;
            }
        }
    }

    /**
     * @param  array<string, string>  $params
     * @param  array<string, string>  $requestHeaders
     * @param  array<string, mixed>  $triggers
     * @return array<string, mixed>
     */
    private function buildWorkbenchOutput(
        Lab $lab,
        string $archetype,
        string $subRoute,
        array $params,
        string $rawBody,
        array $requestHeaders,
        LabSession $session,
        array $triggers,
        bool $isPost
    ): array {
        $cid = $lab->category_id;
        $status = $triggers['autoSolved']
            ? __('academy.workbench.out_status_solved')
            : ($triggers['exfiltrated'] ? __('academy.workbench.out_status_exfil') : '200 OK');

        $out = [
            'status' => $status,
            'headline' => '',
            'body' => '',
            'headers' => [
                'Host' => $requestHeaders['Host'] ?? 'localhost',
                'X-Lab-Archetype' => $archetype,
                'X-Cache' => 'MISS',
                'Cache-Control' => 'private, no-store',
                'X-Frame-Options' => $cid === 'clickjacking' ? __('academy.workbench.out_xfo_unprotected') : 'SAMEORIGIN',
            ],
        ];

        if ($cid === 'cross-origin-resource-sharing-cors') {
            $origin = trim((string) ($params['probeOrigin'] ?? ($requestHeaders['Origin'] ?? '')));
            if ($origin !== '') {
                $out['headers']['Access-Control-Allow-Origin'] = $origin;
                $out['headers']['Access-Control-Allow-Credentials'] = 'true';
                $out['headline'] = __('academy.workbench.out_cors_headline', ['origin' => $origin]);
                $out['body'] = json_encode([
                    'username' => $session->logged_in_user ?: 'wiener',
                    'apikey' => $session->secret('wiener_api_key'),
                    'cors_policy' => 'DYNAMIC_ORIGIN_REFLECTION',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            }
        } elseif ($cid === 'web-cache-poisoning' || $cid === 'http-host-header-attacks') {
            $fwdHost = trim((string) ($params['probeHost'] ?? ($requestHeaders['X-Forwarded-Host'] ?? ($requestHeaders['X-Host'] ?? ''))));
            if ($fwdHost !== '') {
                $out['headers']['X-Cache'] = __('academy.workbench.out_cache_poisoned');
                $out['headers']['X-Forwarded-Host'] = $fwdHost;
                $out['headline'] = __('academy.workbench.out_host_headline', ['host' => $fwdHost]);
                $out['body'] = "<script src=\"https://{$fwdHost}/resources/js/tracking.js\"></script>";
            }
        } elseif ($cid === 'web-cache-deception') {
            $probePath = trim((string) ($params['probePath'] ?? ''));
            if ($probePath !== '') {
                $cached = (bool) preg_match('/\.(js|css|jpg|png|ico|svg|webp)$/i', $probePath);
                $out['headers']['X-Cache'] = $cached ? __('academy.workbench.out_cache_static_hit') : 'MISS';
                $out['headline'] = __('academy.workbench.out_wcd_headline', ['path' => $probePath]);
                $out['body'] = json_encode([
                    'cached_publicly' => $cached,
                    'account' => $session->logged_in_user ?: 'wiener',
                    'apiKey' => $session->secret('wiener_api_key'),
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            }
        } elseif ($cid === 'graphql-api-vulnerabilities') {
            $gql = trim((string) ($params['graphqlQuery'] ?? ($params['query'] ?? '')));
            if ($gql !== '' || $subRoute === 'graphql') {
                if (preg_match('/__schema|__type|introspection/i', $gql)) {
                    $out['headline'] = __('academy.workbench.out_gql_introspection');
                    $out['body'] = json_encode([
                        'data' => [
                            '__schema' => [
                                'types' => [
                                    ['name' => 'Query', 'fields' => ['getProduct', 'getUser', 'login']],
                                    ['name' => 'Mutation', 'fields' => ['deleteUser', 'changeEmail']],
                                    ['name' => 'User', 'fields' => ['id', 'username', 'password', 'apiKey']],
                                ],
                            ],
                        ],
                    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                } elseif (preg_match('/carlos/i', $gql)) {
                    $out['headline'] = __('academy.workbench.out_gql_user_exposed');
                    $out['body'] = json_encode([
                        'data' => ['getUser' => ['id' => 2, 'username' => 'carlos', 'password' => $session->secret('carlos_password')]],
                    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                } else {
                    $out['headline'] = __('academy.workbench.out_gql_executed');
                    $out['body'] = json_encode([
                        'data' => ['getProduct' => ['id' => 7, 'name' => 'Giant Pillow Thing', 'price' => '$95.14']],
                    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                }
            }
        } elseif ($cid === 'api-testing') {
            $apiMethod = strtoupper((string) ($params['apiMethod'] ?? 'GET'));
            $apiPath = trim((string) ($params['apiPath'] ?? ''));
            if ($apiPath !== '' || $subRoute === 'api') {
                $path = $apiPath ?: '/api/user/wiener';
                $out['headline'] = "{$apiMethod} {$path}";
                if (str_contains(strtolower($path), 'carlos') || $apiMethod === 'DELETE' || $apiMethod === 'PATCH' || $apiMethod === 'OPTIONS') {
                    $out['body'] = json_encode([
                        'endpoint' => $path,
                        'method' => $apiMethod,
                        'allowed_methods' => ['GET', 'PATCH', 'DELETE', 'OPTIONS'],
                        'result' => $triggers['autoSolved'] ? __('academy.workbench.out_api_executed') : __('academy.workbench.out_api_reachable'),
                    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                } else {
                    $out['body'] = json_encode([
                        'username' => 'wiener',
                        'email' => 'wiener@normal-user.net',
                        'apiKey' => $session->secret('wiener_api_key'),
                        'docsHint' => __('academy.workbench.out_api_docs_hint'),
                    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                }
            }
        } elseif ($cid === 'information-disclosure') {
            $probePath = trim((string) ($params['probePath'] ?? ''));
            if ($probePath !== '') {
                $out['headline'] = "GET {$probePath}";
                $out['body'] = match (true) {
                    str_contains($probePath, '.git') => "ref: refs/heads/main\n# Exposed commit: admin fallback secret = {$session->secret('admin_password')}",
                    str_contains($probePath, 'phpinfo') => "PHP Version 8.3-sandbox\nSECRET_KEY = {$session->secret('file_secret')}",
                    str_contains($probePath, 'backup') => "BackupArchive.java.bak\npostgres://postgres:{$session->secret('admin_password')}@127.0.0.1:5432/academy",
                    str_contains($probePath, 'robots') => "User-agent: *\nDisallow: /administrator-panel\nDisallow: /backup\nDisallow: /cgi-bin/phpinfo.php",
                    default => __('academy.workbench.out_info_diag', ['path' => $probePath]),
                };
            }
        } elseif ($cid === 'insecure-deserialization') {
            $deser = trim((string) ($params['deserPayload'] ?? ''));
            if ($deser !== '') {
                $out['headline'] = __('academy.workbench.out_deser_headline');
                $out['body'] = $triggers['autoSolved']
                    ? __('academy.workbench.out_deser_solved')
                    : __('academy.workbench.out_deser_preview', ['payload' => $deser]);
            }
        } elseif ($cid === 'http-request-smuggling') {
            $smug = trim((string) ($params['probeBody'] ?? $rawBody));
            if ($smug !== '' && $isPost) {
                $out['headline'] = __('academy.workbench.out_smug_headline');
                $out['body'] = $triggers['autoSolved']
                    ? __('academy.workbench.out_smug_solved')
                    : __('academy.workbench.out_smug_forwarded', ['bytes' => strlen($smug)]);
            }
        } elseif ($cid === 'prototype-pollution') {
            $proto = trim((string) ($params['protoPayload'] ?? $rawBody));
            if ($proto !== '') {
                $out['headline'] = __('academy.workbench.out_proto_headline');
                $out['body'] = $triggers['autoSolved']
                    ? __('academy.workbench.out_proto_solved')
                    : __('academy.workbench.out_proto_safe');
            }
        } elseif ($cid === 'dom-based-vulnerabilities') {
            $dom = trim((string) ($params['domPayload'] ?? ($params['search'] ?? '')));
            if ($dom !== '') {
                $out['headline'] = __('academy.workbench.out_dom_headline');
                $out['body'] = __('academy.workbench.out_dom_body', ['val' => $dom]);
            }
        } elseif ($cid === 'jwt') {
            $jwtIn = trim((string) ($params['jwtToken'] ?? ''));
            if ($jwtIn !== '') {
                $out['headline'] = __('academy.workbench.out_jwt_headline');
                $out['body'] = $triggers['autoSolved']
                    ? __('academy.workbench.out_jwt_solved')
                    : __('academy.workbench.out_jwt_valid');
            }
        }

        if ($out['headline'] !== '' && $isPost) {
            $wb = is_array($session->workbench_state) ? $session->workbench_state : [];
            $logs = is_array($wb['logs'] ?? null) ? $wb['logs'] : [];
            $logs[] = '['.now()->format('H:i:s').'] '.$out['headline'].' -> '.$out['status'];
            $wb['logs'] = array_slice($logs, -8);
            $session->workbench_state = $wb;
            $session->save();
        }

        return $out;
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

    /**
     * @return array<string, string>
     */
    private function extractRequestHeaders(Request $request): array
    {
        $names = [
            'Host',
            'Origin',
            'X-Forwarded-Host',
            'X-Host',
            'X-Forwarded-Scheme',
            'X-Original-URL',
            'X-Rewrite-URL',
            'Transfer-Encoding',
            'Authorization',
        ];
        $out = [];
        foreach ($names as $name) {
            $val = $request->header($name);
            if (is_string($val) && trim($val) !== '') {
                $out[$name] = trim($val);
            }
        }

        return $out;
    }

    private function renderProductSvg(int $id): string
    {
        $palettes = [
            ['#0f131c', '#fe6e00', 'M20 70 L50 25 L80 70 Z'],
            ['#141925', '#06b6d4', 'M30 30 H70 V70 H30 Z'],
            ['#141925', '#00c758', 'M50 22 A28 28 0 1 0 50 78 A28 28 0 1 0 50 22'],
            ['#1a2132', '#edb200', 'M25 65 L40 30 L60 55 L75 25 L85 65 Z'],
            ['#141414', '#fe6e00', 'M25 35 H75 V65 H25 Z'],
            ['#0f131c', '#3080ff', 'M50 20 L78 50 L50 80 L22 50 Z'],
        ];
        [$bg, $fg, $shape] = $palettes[max($id - 1, 0) % count($palettes)];

        return '<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:160px;background:'.$bg.';border-radius:8px;display:block">'
            .'<path d="'.$shape.'" fill="'.$fg.'" opacity="0.92"/>'
            .'<circle cx="75" cy="25" r="8" fill="#ffffff" opacity="0.22"/>'
            .'</svg>';
    }
}
