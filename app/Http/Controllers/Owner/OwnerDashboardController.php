<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CveArticle;
use App\Models\Lab;
use App\Models\LabSession;
use App\Models\User;
use App\Services\TrickestCveImporter;
use Illuminate\View\View;

class OwnerDashboardController extends Controller
{
    public function index(TrickestCveImporter $importer): View
    {
        $repoPath = $importer->defaultRepoPath();
        $repoCloned = is_dir($repoPath.DIRECTORY_SEPARATOR.'.git');
        $hasHotCsv = is_file($repoPath.DIRECTORY_SEPARATOR.'hot_cves.csv');

        return view('owner.dashboard', [
            'stats' => [
                'users' => User::count(),
                'owners' => User::where('role', User::ROLE_OWNER)->count(),
                'categories' => Category::count(),
                'labs' => Lab::count(),
                'cves_total' => CveArticle::count(),
                'cves_published' => CveArticle::where('status', 'published')->count(),
                'cves_draft' => CveArticle::where('status', 'draft')->count(),
                'cves_hot' => CveArticle::where('is_hot', true)->count(),
                'total_solves' => LabSession::where('solved', true)->count(),
            ],
            'repoPath' => $repoPath,
            'repoCloned' => $repoCloned,
            'hasHotCsv' => $hasHotCsv,
            'recentCves' => CveArticle::with('category:id,title')->latest('updated_at')->limit(5)->get(),
            'recentSolves' => LabSession::with(['user:id,name', 'lab:id,title,difficulty'])
                ->where('solved', true)
                ->orderByDesc('solved_at')
                ->limit(6)
                ->get(),
        ]);
    }
}
