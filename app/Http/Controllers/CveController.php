<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CveArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CveController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));
        $year = trim((string) $request->query('year', 'ALL'));
        $severity = strtoupper(trim((string) $request->query('severity', 'ALL')));
        $categoryId = trim((string) $request->query('category', 'ALL'));
        $hotOnly = $request->query('hot') === '1';

        $isOwner = Auth::user()?->isOwner() ?? false;

        $query = CveArticle::with(['category:id,title,topic_route', 'lab:id,category_id,title,href,difficulty']);
        if (! $isOwner) {
            $query->published();
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $like = '%'.$search.'%';
                $q->where('cve_id', 'like', $like)
                    ->orWhere('title', 'like', $like)
                    ->orWhere('affected_product', 'like', $like)
                    ->orWhere('summary', 'like', $like);
            });
        }

        if ($year !== '' && $year !== 'ALL' && is_numeric($year)) {
            $query->where('cve_year', (int) $year);
        }

        if (in_array($severity, CveArticle::SEVERITIES, true)) {
            $query->where('severity', $severity);
        }

        if ($categoryId === 'UNCATEGORIZED') {
            $query->whereNull('category_id');
        } elseif ($categoryId !== '' && $categoryId !== 'ALL') {
            $query->where('category_id', $categoryId);
        }

        if ($hotOnly) {
            $query->where('is_hot', true);
        }

        $articles = $query
            ->orderByDesc('is_hot')
            ->orderByDesc('cve_year')
            ->orderByDesc('cvss_score')
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        $years = CveArticle::query()
            ->when(! $isOwner, static fn ($q) => $q->published())
            ->select('cve_year')
            ->distinct()
            ->orderByDesc('cve_year')
            ->pluck('cve_year');

        $categories = Category::orderBy('sort_order')->get(['id', 'title']);

        $totalPublished = CveArticle::published()->count();
        $hotCount = CveArticle::published()->where('is_hot', true)->count();

        return view('cve.index', [
            'articles' => $articles,
            'years' => $years,
            'categories' => $categories,
            'search' => $search,
            'year' => $year,
            'severity' => $severity,
            'categoryId' => $categoryId,
            'hotOnly' => $hotOnly,
            'totalPublished' => $totalPublished,
            'hotCount' => $hotCount,
        ]);
    }

    public function show(string $slug): View
    {
        $article = CveArticle::with(['category', 'lab', 'author:id,name'])
            ->where('slug', strtolower($slug))
            ->orWhere('cve_id', strtoupper($slug))
            ->firstOrFail();

        if ($article->status !== 'published' && ! (Auth::user()?->isOwner() ?? false)) {
            abort(404);
        }

        $relatedLabs = $article->relatedLabs(4);

        return view('cve.show', [
            'article' => $article,
            'relatedLabs' => $relatedLabs,
        ]);
    }
}
