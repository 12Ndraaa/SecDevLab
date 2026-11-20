<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Lab;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WidgetRenderer
{
    /** @var array<string, string>|null */
    private static ?array $officialWidgets = null;

    /** @var array<string, Lab>|null */
    private static ?array $labsById = null;

    /**
     * Render any academy widget-id completely server-side (Zero-JS).
     */
    public function render(string $widgetId, ?string $labId = null, bool $largeView = false, ?User $user = null): string
    {
        $user ??= Auth::user();
        $solvedMap = $user ? $user->solvedLabIdMap() : [];

        if ($widgetId === 'academy-labstatus' && $labId) {
            $lab = $this->findLab($labId);
            if (! $lab) {
                return '';
            }
            $isSolved = isset($solvedMap[strtolower($lab->id)]);

            return view('partials.widgets.lab-status-card', [
                'lab' => $lab,
                'isSolved' => $isSolved,
            ])->render();
        }

        if ($widgetId === 'academy-labinfo' && $labId) {
            $lab = $this->findLab($labId);
            if (! $lab) {
                return '';
            }
            $isSolved = isset($solvedMap[strtolower($lab->id)]);

            return view('partials.widgets.lab-info', [
                'lab' => $lab,
                'isSolved' => $isSolved,
            ])->render();
        }

        if ($widgetId === 'academy-launchlab' && $labId) {
            $id = strtolower($labId);

            return '<div class="container-buttons-left"><a class="button-orange" href="/academy/labs/launch/'.e($id).'"><span class="icon-erlenmeyer"></span>'.e(__('academy.labs.access_lab')).'</a></div>';
        }

        if ($widgetId === 'academy-accountstatus') {
            return $this->renderAccountStatus($largeView, $user, $solvedMap);
        }

        if ($widgetId === 'academy-launch-mystery-lab') {
            $categories = Category::orderBy('sort_order')->get(['id', 'title']);

            return view('partials.widgets.launch-mystery-lab', [
                'categories' => $categories,
            ])->render();
        }

        if ($widgetId === 'academy-registration-footer') {
            return view('partials.widgets.registration-footer', [
                'user' => $user,
            ])->render();
        }

        if ($widgetId === 'academy-validatecertification') {
            return '<div class="vla-card"><p>'.e((string) (config('app.name') ?: 'SecDevLab')).': Verify local academic certificates on the <a href="/certificate">Certificate &amp; Progress Report</a> page.</p></div>';
        }

        if ($widgetId === 'academy-sharepage') {
            return '<div class="vla-badge-row"><a class="vla-btn vla-btn--outline vla-btn--sm" href="/cve">CVE Encyclopedia</a><a class="vla-btn vla-btn--outline vla-btn--sm" href="/web-security/all-labs">All Labs</a></div>';
        }

        if ($widgetId === 'academy-startlearningcta') {
            if ($user) {
                return '<div class="vla-btn-group"><a href="/web-security/all-labs" class="vla-btn vla-btn--primary">'.e(__('academy.home.cta_labs')).'</a><a href="/web-security/dashboard" class="vla-btn vla-btn--outline">'.e(__('academy.nav.dashboard')).'</a></div>';
            }

            return '<div class="vla-btn-group"><a href="/users/register" class="vla-btn vla-btn--primary">'.e(__('academy.nav.register')).'</a><a href="/users" class="vla-btn vla-btn--outline">'.e(__('academy.nav.login')).'</a></div>';
        }

        if ($widgetId === 'academy-startlearningbanner') {
            return view('partials.widgets.registration-footer', [
                'user' => $user,
            ])->render();
        }

        if ($widgetId === 'burp-certificationstartingprice' || $widgetId === 'burp-prostartingprice') {
            return '<span>Free (Local Offline Mode)</span>';
        }

        $official = $this->loadOfficialWidgets();
        $html = $official[$widgetId] ?? '<div class="widgetcontainer-box"></div>';
        $html = $this->stripScriptsAndNoscripts($html);

        $brandName = e((string) (config('app.name') ?: 'SecDevLab'));

        return str_replace(['PortSwigger', 'Burp Suite'], [$brandName, $brandName], $html);
    }

    /**
     * @param  array<string, true>  $solvedMap
     */
    private function renderAccountStatus(bool $largeView, ?User $user, array $solvedMap): string
    {
        $totals = Lab::selectRaw('difficulty, COUNT(*) as total')
            ->groupBy('difficulty')
            ->pluck('total', 'difficulty')
            ->all();

        $appTotal = (int) ($totals['APPRENTICE'] ?? 61);
        $pracTotal = (int) ($totals['PRACTITIONER'] ?? 173);
        $expTotal = (int) ($totals['EXPERT'] ?? 39);
        $allTotal = $appTotal + $pracTotal + $expTotal;

        $solvedCounts = ['APPRENTICE' => 0, 'PRACTITIONER' => 0, 'EXPERT' => 0];
        $totalSolved = 0;

        if ($user && ! empty($solvedMap)) {
            $solvedByDiff = Lab::whereIn('id', array_keys($solvedMap))
                ->selectRaw('difficulty, COUNT(*) as cnt')
                ->groupBy('difficulty')
                ->pluck('cnt', 'difficulty')
                ->all();

            foreach ($solvedCounts as $diff => $_) {
                $solvedCounts[$diff] = (int) ($solvedByDiff[$diff] ?? 0);
                $totalSolved += $solvedCounts[$diff];
            }
        }

        return view('partials.widgets.account-status', [
            'largeView' => $largeView,
            'user' => $user,
            'allTotal' => max($allTotal, 1),
            'totalSolved' => $totalSolved,
            'counts' => [
                'APPRENTICE' => ['solved' => $solvedCounts['APPRENTICE'], 'total' => max($appTotal, 1)],
                'PRACTITIONER' => ['solved' => $solvedCounts['PRACTITIONER'], 'total' => max($pracTotal, 1)],
                'EXPERT' => ['solved' => $solvedCounts['EXPERT'], 'total' => max($expTotal, 1)],
            ],
        ])->render();
    }

    private function findLab(string $labId): ?Lab
    {
        if (self::$labsById === null) {
            self::$labsById = [];
            foreach (Lab::all(['id', 'category_id', 'title', 'href', 'difficulty', 'difficulty_class']) as $lab) {
                self::$labsById[strtolower($lab->id)] = $lab;
            }
        }

        return self::$labsById[strtolower($labId)] ?? null;
    }

    public static function clearRuntimeCache(): void
    {
        self::$labsById = null;
        self::$officialWidgets = null;
    }

    /**
     * @return array<string, string>
     */
    private function loadOfficialWidgets(): array
    {
        if (self::$officialWidgets !== null) {
            return self::$officialWidgets;
        }

        $path = database_path('seeders/data/official_widgets.json');
        $list = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
        self::$officialWidgets = [];
        foreach ($list ?: [] as $w) {
            if (! empty($w['WidgetId'])) {
                self::$officialWidgets[$w['WidgetId']] = (string) ($w['Html'] ?? '');
            }
        }

        return self::$officialWidgets;
    }

    private function stripScriptsAndNoscripts(string $html): string
    {
        $html = preg_replace('/<script\b[^>]*>[\s\S]*?<\/script>/i', '', $html) ?? $html;
        $html = preg_replace('/<noscript\b[^>]*>[\s\S]*?<\/noscript>/i', '', $html) ?? $html;

        return $html;
    }
}
