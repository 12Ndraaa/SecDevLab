<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CveArticle;
use App\Models\Lab;
use App\Models\LabSession;
use App\Models\User;
use App\Services\LabArchetypeResolver;
use App\Services\LabUrlService;
use App\Services\WidgetRenderer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AcademyController extends Controller
{
    public function landing(): View
    {
        $categoriesCount = Category::count();
        $labsCount = Lab::count();
        $cvesCount = CveArticle::published()->count();
        $learnersCount = User::count();

        $featuredCategories = Category::withCount('labs')
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

        $hotCves = CveArticle::published()
            ->with(['category:id,title', 'lab:id,title,href'])
            ->orderByDesc('is_hot')
            ->orderByDesc('cve_year')
            ->orderByDesc('cvss_score')
            ->limit(4)
            ->get();

        $topLeaders = $this->computeLeaderboard()->take(5)->values();

        return view('home', [
            'categoriesCount' => $categoriesCount,
            'labsCount' => $labsCount,
            'cvesCount' => $cvesCount,
            'learnersCount' => $learnersCount,
            'featuredCategories' => $featuredCategories,
            'hotCves' => $hotCves,
            'topLeaders' => $topLeaders,
        ]);
    }

    public function allLabs(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));
        $difficulty = strtoupper(trim((string) $request->query('difficulty', 'ALL')));
        $status = strtoupper(trim((string) $request->query('status', 'ALL')));
        $categoryFilter = trim((string) $request->query('category', 'ALL'));

        if (! in_array($difficulty, ['ALL', 'APPRENTICE', 'PRACTITIONER', 'EXPERT'], true)) {
            $difficulty = 'ALL';
        }
        if (! in_array($status, ['ALL', 'SOLVED', 'UNSOLVED'], true)) {
            $status = 'ALL';
        }

        $user = Auth::user();
        $solvedMap = $user ? $user->solvedLabIdMap() : [];

        $allCategories = Category::with('labs')->orderBy('sort_order')->get();
        $totalLabs = 0;
        $solvedTotal = 0;
        $difficultyTotals = ['APPRENTICE' => 0, 'PRACTITIONER' => 0, 'EXPERT' => 0];

        foreach ($allCategories as $cat) {
            foreach ($cat->labs as $lab) {
                $totalLabs++;
                if (isset($difficultyTotals[$lab->difficulty])) {
                    $difficultyTotals[$lab->difficulty]++;
                }
                if (isset($solvedMap[strtolower($lab->id)])) {
                    $solvedTotal++;
                }
            }
        }

        $qLower = mb_strtolower($search);
        $visibleCount = 0;
        $filteredCategories = [];

        foreach ($allCategories as $cat) {
            if ($categoryFilter !== '' && $categoryFilter !== 'ALL' && $cat->id !== $categoryFilter) {
                continue;
            }

            $matchingLabs = $cat->labs->filter(function (Lab $lab) use ($difficulty, $status, $qLower, $cat, $solvedMap): bool {
                $isSolved = isset($solvedMap[strtolower($lab->id)]);
                if ($difficulty !== 'ALL' && $lab->difficulty !== $difficulty) {
                    return false;
                }
                if ($status === 'SOLVED' && ! $isSolved) {
                    return false;
                }
                if ($status === 'UNSOLVED' && $isSolved) {
                    return false;
                }
                if ($qLower !== '') {
                    $inTitle = str_contains(mb_strtolower($lab->title), $qLower)
                        || str_contains(mb_strtolower($cat->title), $qLower);
                    $inDesc = str_contains(mb_strtolower($lab->description_html), $qLower);
                    if (! $inTitle && ! $inDesc) {
                        return false;
                    }
                }

                return true;
            })->values();

            if ($matchingLabs->isNotEmpty()) {
                $visibleCount += $matchingLabs->count();
                $clone = clone $cat;
                $clone->setRelation('labs', $matchingLabs);
                $filteredCategories[] = $clone;
            }
        }

        return view('all-labs', [
            'allCategories' => $allCategories,
            'categories' => $filteredCategories,
            'search' => $search,
            'difficulty' => $difficulty,
            'status' => $status,
            'categoryFilter' => $categoryFilter,
            'totalLabs' => $totalLabs,
            'visibleCount' => $visibleCount,
            'solvedTotal' => $solvedTotal,
            'difficultyTotals' => $difficultyTotals,
            'solvedMap' => $solvedMap,
        ]);
    }

    public function dashboard(): View
    {
        /** @var User|null $user */
        $user = Auth::user();
        $solvedMap = $user ? $user->solvedLabIdMap() : [];

        $categories = Category::with('labs:id,category_id,title,href,difficulty,sort_order')
            ->orderBy('sort_order')
            ->get();

        $categoryStats = [];
        foreach ($categories as $cat) {
            $total = $cat->labs->count();
            $solved = 0;
            foreach ($cat->labs as $lab) {
                if (isset($solvedMap[strtolower($lab->id)])) {
                    $solved++;
                }
            }
            $categoryStats[] = [
                'id' => $cat->id,
                'title' => $cat->title,
                'topic_route' => $cat->topic_route,
                'total' => $total,
                'solved' => $solved,
                'pct' => $total > 0 ? (int) round(($solved / $total) * 100) : 0,
            ];
        }

        $recentSolves = collect();
        $points = 0;
        $userRank = null;
        if ($user) {
            $recentSolves = $user->labSessions()
                ->with('lab.category')
                ->where('solved', true)
                ->orderByDesc('solved_at')
                ->limit(10)
                ->get();

            $leaders = $this->computeLeaderboard();
            $found = $leaders->firstWhere('user_id', $user->id);
            if ($found) {
                $points = $found['points'];
                $userRank = $found['rank'];
            }
        }

        $recentCves = CveArticle::published()
            ->with('category:id,title')
            ->orderByDesc('is_hot')
            ->orderByDesc('published_at')
            ->limit(4)
            ->get();

        return view('dashboard', [
            'user' => $user,
            'categoryStats' => $categoryStats,
            'recentSolves' => $recentSolves,
            'points' => $points,
            'userRank' => $userRank,
            'recentCves' => $recentCves,
        ]);
    }

    public function leaderboard(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));
        $categoryId = trim((string) $request->query('category', 'ALL'));

        $leaders = $this->computeLeaderboard($categoryId !== 'ALL' ? $categoryId : null);

        $currentUserEntry = Auth::check()
            ? $leaders->firstWhere('user_id', Auth::id())
            : null;

        if ($search !== '') {
            $q = mb_strtolower($search);
            $leaders = $leaders->filter(
                static fn (array $row): bool => str_contains(mb_strtolower($row['name']), $q)
            )->values();
        }

        $categories = Category::orderBy('sort_order')->get(['id', 'title']);

        return view('leaderboard', [
            'leaders' => $leaders,
            'currentUserEntry' => $currentUserEntry,
            'search' => $search,
            'categoryId' => $categoryId,
            'categories' => $categories,
        ]);
    }

    public function certificate(Request $request): View
    {
        /** @var User $user */
        $user = Auth::user();
        $mode = $request->query('mode') === 'report' ? 'report' : 'certificate';

        $solvedSessions = $user->labSessions()
            ->with('lab.category')
            ->where('solved', true)
            ->orderByDesc('solved_at')
            ->get();

        $summary = $user->progressSummary();
        $totalLabs = max(Lab::count(), 1);
        $completionPct = (int) round(($summary['total_solved'] / $totalLabs) * 100);

        $tier = match (true) {
            $summary['expert'] >= 10 || $summary['total_solved'] >= 150 => 'Offensive Security Master',
            $summary['practitioner'] >= 20 || $summary['total_solved'] >= 50 => 'Security Practitioner',
            $summary['total_solved'] >= 10 => 'Web Security Challenger',
            $summary['total_solved'] >= 1 => 'Cyber Apprentice',
            default => 'Enrolled Researcher',
        };

        $verificationCode = 'VLA-'.str_pad((string) $user->id, 4, '0', STR_PAD_LEFT).'-'.strtoupper(substr(hash('sha256', $user->id.'|'.$user->email.'|'.$summary['total_solved']), 0, 10));

        $categories = Category::with('labs:id,category_id')->orderBy('sort_order')->get();
        $solvedIds = $user->solvedLabIdMap();
        $categoryBreakdown = [];
        foreach ($categories as $cat) {
            $total = $cat->labs->count();
            $solved = 0;
            foreach ($cat->labs as $lab) {
                if (isset($solvedIds[strtolower($lab->id)])) {
                    $solved++;
                }
            }
            if ($solved > 0 || $mode === 'report') {
                $categoryBreakdown[] = [
                    'title' => $cat->title,
                    'solved' => $solved,
                    'total' => $total,
                    'pct' => $total > 0 ? (int) round(($solved / $total) * 100) : 0,
                ];
            }
        }

        return view('certificate', [
            'user' => $user,
            'mode' => $mode,
            'summary' => $summary,
            'totalLabs' => $totalLabs,
            'completionPct' => $completionPct,
            'tier' => $tier,
            'verificationCode' => $verificationCode,
            'solvedSessions' => $solvedSessions,
            'categoryBreakdown' => $categoryBreakdown,
        ]);
    }

    public function launchMysteryLab(Request $request, LabUrlService $urlService): RedirectResponse
    {
        $level = strtoupper((string) $request->query('level', 'ANY'));
        $category = (string) $request->query('category', 'ANY');

        $levelMap = ['0' => 'APPRENTICE', '1' => 'PRACTITIONER', '2' => 'EXPERT'];
        if (isset($levelMap[$level])) {
            $level = $levelMap[$level];
        }

        $query = Lab::query();
        if (in_array($level, ['APPRENTICE', 'PRACTITIONER', 'EXPERT'], true)) {
            $query->where('difficulty', $level);
        }
        if ($category !== '' && $category !== 'ANY' && $category !== '-1') {
            $query->where('category_id', $category);
        }

        $lab = $query->inRandomOrder()->first() ?? Lab::inRandomOrder()->firstOrFail();

        /** @var int $userId */
        $userId = (int) Auth::id();
        $theme = (string) $request->session()->get('ui_theme', 'light');
        $session = LabSession::forUserAndLab($userId, $lab->id, $theme);

        $target = $urlService->launchRedirectTarget($session, ['mystery' => 1], $request);

        return $urlService->isSubdomainMode() ? redirect()->away($target) : redirect($target);
    }

    public function launchLab(Request $request, string $labId, LabUrlService $urlService): RedirectResponse
    {
        $lab = Lab::find(strtolower($labId));
        if (! $lab) {
            abort(404);
        }

        /** @var int $userId */
        $userId = (int) Auth::id();
        $theme = (string) $request->session()->get('ui_theme', 'light');
        $session = LabSession::forUserAndLab($userId, $lab->id, $theme);

        $target = $urlService->launchRedirectTarget($session, [], $request);

        return $urlService->isSubdomainMode() ? redirect()->away($target) : redirect($target);
    }

    public function labControl(
        Request $request,
        string $token,
        LabUrlService $urlService,
        LabArchetypeResolver $archetypeResolver
    ): View {
        $session = LabSession::findByToken($token);
        if (! $session || ! $session->lab) {
            abort(404);
        }
        if ((int) $session->user_id !== (int) Auth::id()) {
            abort(403, 'You do not own this lab instance.');
        }

        return view('lab-env.control', [
            'session' => $session,
            'lab' => $session->lab,
            'archetype' => $archetypeResolver->meta($session->lab),
            'instanceUrl' => $urlService->launchRedirectTarget($session, [], $request),
            'absoluteUrl' => $urlService->absoluteBaseUrl($session, $request),
            'urlMode' => $urlService->isSubdomainMode() ? 'subdomain' : 'path',
        ]);
    }

    public function resetLabSession(Request $request, string $token, LabUrlService $urlService): RedirectResponse
    {
        $session = LabSession::findByToken($token);
        if (! $session || ! $session->lab) {
            abort(404);
        }
        if ((int) $session->user_id !== (int) Auth::id()) {
            abort(403, 'You do not own this lab instance.');
        }

        $theme = (string) $request->session()->get('ui_theme', 'light');
        $session->resetState($theme, true);

        if ($request->input('return_to') === 'detail') {
            return redirect($session->lab->href)
                ->with('status', 'Lab instance reset with a fresh 32-hex capability token and randomized secrets.');
        }

        $target = $urlService->launchRedirectTarget($session, [], $request);

        return $urlService->isSubdomainMode() ? redirect()->away($target) : redirect($target);
    }

    public function renewLabSession(Request $request, string $token, LabUrlService $urlService): RedirectResponse
    {
        $session = LabSession::findByToken($token);
        if (! $session || ! $session->lab) {
            abort(404);
        }
        if ((int) $session->user_id !== (int) Auth::id()) {
            abort(403, 'You do not own this lab instance.');
        }

        $session->renewTtl();

        if ($request->input('return_to') === 'detail') {
            return redirect($session->lab->href)
                ->with('status', 'Lab session TTL renewed (+'.LabSession::ttlMinutes().' minutes).');
        }

        $target = $urlService->launchRedirectTarget($session, [], $request);

        return $urlService->isSubdomainMode() ? redirect()->away($target) : redirect($target);
    }

    public function resetLabById(Request $request, string $labId, LabUrlService $urlService): RedirectResponse
    {
        $lab = Lab::find(strtolower($labId));
        if (! $lab) {
            abort(404);
        }

        /** @var int $userId */
        $userId = (int) Auth::id();
        $theme = (string) $request->session()->get('ui_theme', 'light');
        $session = LabSession::forUserAndLab($userId, $lab->id, $theme);
        $session->resetState($theme, true);

        if ($request->input('return_to') === 'detail') {
            return redirect($lab->href)
                ->with('status', 'Lab instance reset with a fresh 32-hex capability token and randomized secrets.');
        }

        $target = $urlService->launchRedirectTarget($session, [], $request);

        return $urlService->isSubdomainMode() ? redirect()->away($target) : redirect($target);
    }

    public function renewLabById(Request $request, string $labId, LabUrlService $urlService): RedirectResponse
    {
        $lab = Lab::find(strtolower($labId));
        if (! $lab) {
            abort(404);
        }

        /** @var int $userId */
        $userId = (int) Auth::id();
        $theme = (string) $request->session()->get('ui_theme', 'light');
        $session = LabSession::forUserAndLab($userId, $lab->id, $theme);
        $session->renewTtl();

        if ($request->input('return_to') === 'detail') {
            return redirect($lab->href)
                ->with('status', 'Lab session TTL renewed (+'.LabSession::ttlMinutes().' minutes).');
        }

        $target = $urlService->launchRedirectTarget($session, [], $request);

        return $urlService->isSubdomainMode() ? redirect()->away($target) : redirect($target);
    }

    public function widgets(Request $request, WidgetRenderer $renderer): JsonResponse
    {
        $items = $request->json()->all();
        if (! is_array($items)) {
            $items = [];
        }

        $out = [];
        foreach ($items as $w) {
            if (! is_array($w)) {
                continue;
            }
            $wid = (string) ($w['widgetId'] ?? '');
            $labId = $w['additionalData']['widget-lab-id'] ?? null;
            $largeView = ($w['additionalData']['widget-large-view'] ?? '') === 'true';

            $out[] = [
                'WidgetId' => $wid,
                'Html' => $renderer->render($wid, is_string($labId) ? $labId : null, $largeView),
                'ScriptSrc' => '',
            ];
        }

        return response()->json($out)->header('Cache-Control', 'no-store');
    }

    public function sessionInfo(): JsonResponse
    {
        return response()->json(['status' => 'ok'])->header('Cache-Control', 'no-store');
    }

    public function resolvePage(Request $request): View|Response
    {
        $urlService = app(LabUrlService::class);
        if ($subdomainToken = $urlService->extractTokenFromHost((string) $request->getHost())) {
            $tail = ltrim($request->getPathInfo(), '/');

            return app(LabEnvironmentController::class)->handleByToken($request, $subdomainToken, $tail !== '' ? $tail : null);
        }

        $cleanPath = '/'.ltrim(rtrim($request->getPathInfo(), '/'), '/');
        if ($cleanPath === '//') {
            $cleanPath = '/';
        }

        // 1. Check Lab Detail Pages in MySQL
        $lab = Lab::with('category')->where('href', $cleanPath)->first();
        if ($lab && $lab->category) {
            return $this->renderLabDetail($lab, $lab->category);
        }

        // 2. Check /web-security/* Learning Material Views ONLY (corporate routes removed -> 404)
        $routes = config('academy_routes', []);
        $withoutIndex = preg_replace('/\/index\.html$/i', '', $cleanPath) ?: $cleanPath;
        $matchedView = $routes[$cleanPath]
            ?? $routes[$cleanPath.'/index.html']
            ?? $routes[$withoutIndex]
            ?? ($cleanPath === '/web-security-academy' ? ($routes['/web-security'] ?? null) : null);

        if ($matchedView && view()->exists($matchedView)) {
            return view($matchedView);
        }

        // 3. Dynamic Owner-created Category Topic Pages (/web-security/<custom-topic>)
        if (str_starts_with($cleanPath, '/web-security')) {
            $dynamicCategory = Category::with('labs')
                ->whereIn('topic_route', [$cleanPath, $withoutIndex])
                ->first();

            if ($dynamicCategory) {
                $user = Auth::user();
                $solvedMap = $user ? $user->solvedLabIdMap() : [];
                $relatedCves = CveArticle::published()
                    ->where('category_id', $dynamicCategory->id)
                    ->orderByDesc('is_hot')
                    ->orderByDesc('cvss_score')
                    ->limit(6)
                    ->get();

                return view('category-topic', [
                    'category' => $dynamicCategory,
                    'solvedMap' => $solvedMap,
                    'relatedCves' => $relatedCves,
                ]);
            }
        }

        abort(404);
    }

    private function renderLabDetail(Lab $lab, Category $category): View
    {
        $user = Auth::user();
        $solvedMap = $user ? $user->solvedLabIdMap() : [];
        $isSolved = isset($solvedMap[strtolower($lab->id)]);

        $cleanDescriptionHtml = preg_replace(
            '/<div class="component-solution expandable-container">[\s\S]*$/i',
            '',
            (string) $lab->description_html
        ) ?? (string) $lab->description_html;

        $hintSections = [];
        $otherSections = [];
        foreach (is_array($lab->sections) ? $lab->sections : [] as $sec) {
            $title = (string) ($sec['title'] ?? '');
            $bodyHtml = $this->normalizeSectionBody((string) ($sec['bodyHtml'] ?? ''));
            if (preg_match('/hint/i', $title)) {
                $hintSections[] = [
                    'title' => $title,
                    'normalizedBodyHtml' => $bodyHtml,
                ];
            } else {
                $otherSections[] = [
                    'title' => $title,
                    'iconClass' => preg_match('/community/i', $title) ? 'icon-bulbs' : 'icon-bulb',
                    'normalizedBodyHtml' => $bodyHtml,
                ];
            }
        }

        $topicView = 'partials.topic-navs.'.$category->id;
        $topicAsideHtml = view()->exists($topicView) ? view($topicView)->render() : '';

        $pathSegments = array_values(array_filter(explode('/', $lab->href)));
        $breadcrumbs = [
            ['href' => '/web-security', 'name' => 'Web Security Academy'],
            ['href' => $category->topic_route, 'name' => $category->title],
        ];
        if (count($pathSegments) >= 4) {
            $subSlug = $pathSegments[2];
            $words = explode('-', $subSlug);
            $words[0] = ucfirst($words[0]);
            $breadcrumbs[] = [
                'href' => '/'.implode('/', array_slice($pathSegments, 0, 3)),
                'name' => implode(' ', $words),
            ];
        }
        $breadcrumbs[] = ['href' => $lab->href, 'name' => 'Lab'];

        $relatedCves = CveArticle::published()
            ->where(function ($q) use ($lab, $category) {
                $q->where('lab_id', $lab->id)
                    ->orWhere('category_id', $category->id);
            })
            ->orderByDesc('is_hot')
            ->orderByDesc('cvss_score')
            ->limit(4)
            ->get();

        $activeSession = $user
            ? LabSession::where('user_id', $user->id)->where('lab_id', strtolower($lab->id))->first()
            : null;
        $urlService = app(LabUrlService::class);
        $instanceUrl = ($activeSession && ! empty($activeSession->instance_token) && ! $activeSession->isExpired())
            ? $urlService->launchRedirectTarget($activeSession)
            : null;
        $archetype = app(LabArchetypeResolver::class)->meta($lab);

        return view('lab-detail', [
            'lab' => $lab,
            'category' => $category,
            'isSolved' => $isSolved,
            'activeSession' => $activeSession,
            'instanceUrl' => $instanceUrl,
            'archetype' => $archetype,
            'cleanDescriptionHtml' => $cleanDescriptionHtml,
            'hintSections' => $hintSections,
            'otherSections' => $otherSections,
            'topicAsideHtml' => $topicAsideHtml,
            'breadcrumbs' => $breadcrumbs,
            'relatedCves' => $relatedCves,
        ]);
    }

    private function normalizeSectionBody(string $bodyHtml): string
    {
        $trimmed = trim($bodyHtml);
        $trimmed = preg_replace('/<iframe(?![^>]*\bloading=)/i', '<iframe loading="lazy"', $trimmed) ?? $trimmed;
        if (str_starts_with($trimmed, '<div class="content">')) {
            return $trimmed;
        }

        return '<div class="content">'.$trimmed.'</div>';
    }

    /**
     * @return \Illuminate\Support\Collection<int, array<string, mixed>>
     */
    private function computeLeaderboard(?string $categoryId = null)
    {
        $users = User::all(['id', 'name', 'role', 'created_at']);
        $sessionsQuery = LabSession::with('lab:id,category_id,difficulty')
            ->where('solved', true);

        if ($categoryId) {
            $sessionsQuery->whereHas('lab', static fn ($q) => $q->where('category_id', $categoryId));
        }

        $sessionsByUser = $sessionsQuery->get()->groupBy('user_id');

        $rows = [];
        foreach ($users as $u) {
            $userSessions = $sessionsByUser->get($u->id, collect());
            $app = 0;
            $prac = 0;
            $exp = 0;
            $lastSolve = null;

            foreach ($userSessions as $s) {
                $diff = $s->lab?->difficulty ?? 'APPRENTICE';
                if ($diff === 'EXPERT') {
                    $exp++;
                } elseif ($diff === 'PRACTITIONER') {
                    $prac++;
                } else {
                    $app++;
                }
                if ($s->solved_at && ($lastSolve === null || $s->solved_at->gt($lastSolve))) {
                    $lastSolve = $s->solved_at;
                }
            }

            $points = ($app * User::DIFFICULTY_POINTS['APPRENTICE'])
                + ($prac * User::DIFFICULTY_POINTS['PRACTITIONER'])
                + ($exp * User::DIFFICULTY_POINTS['EXPERT']);

            $rows[] = [
                'user_id' => $u->id,
                'name' => $u->name,
                'role' => $u->role,
                'solved_total' => $app + $prac + $exp,
                'apprentice' => $app,
                'practitioner' => $prac,
                'expert' => $exp,
                'points' => $points,
                'last_solved_at' => $lastSolve,
            ];
        }

        usort($rows, static function (array $a, array $b): int {
            if ($b['points'] !== $a['points']) {
                return $b['points'] <=> $a['points'];
            }
            if ($b['solved_total'] !== $a['solved_total']) {
                return $b['solved_total'] <=> $a['solved_total'];
            }
            if ($a['last_solved_at'] && $b['last_solved_at']) {
                return $a['last_solved_at']->timestamp <=> $b['last_solved_at']->timestamp;
            }
            if ($a['last_solved_at'] !== null) {
                return -1;
            }
            if ($b['last_solved_at'] !== null) {
                return 1;
            }

            return strcmp($a['name'], $b['name']);
        });

        foreach ($rows as $idx => &$row) {
            $row['rank'] = $idx + 1;
        }
        unset($row);

        return collect($rows);
    }
}
