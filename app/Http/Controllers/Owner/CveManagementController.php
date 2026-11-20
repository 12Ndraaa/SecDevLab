<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CveArticle;
use App\Models\Lab;
use App\Services\TrickestCveImporter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CveManagementController extends Controller
{
    public function index(Request $request, TrickestCveImporter $importer): View
    {
        $search = trim((string) $request->query('search', ''));
        $status = strtolower(trim((string) $request->query('status', 'ALL')));
        $severity = strtoupper(trim((string) $request->query('severity', 'ALL')));

        $query = CveArticle::with(['category:id,title', 'lab:id,title,href']);
        if ($search !== '') {
            $like = '%'.$search.'%';
            $query->where(function ($q) use ($like) {
                $q->where('cve_id', 'like', $like)
                    ->orWhere('title', 'like', $like)
                    ->orWhere('affected_product', 'like', $like);
            });
        }
        if (in_array($status, CveArticle::STATUSES, true)) {
            $query->where('status', $status);
        }
        if (in_array($severity, CveArticle::SEVERITIES, true)) {
            $query->where('severity', $severity);
        }

        $articles = $query->orderByDesc('is_hot')->orderByDesc('cve_year')->orderByDesc('id')->paginate(20)->withQueryString();

        return view('owner.cves.index', [
            'articles' => $articles,
            'search' => $search,
            'status' => $status,
            'severity' => $severity,
            'defaultRepoPath' => $importer->defaultRepoPath(),
            'repoExists' => is_dir($importer->defaultRepoPath()),
        ]);
    }

    public function create(): View
    {
        return view('owner.cves.form', [
            'article' => new CveArticle(['cve_year' => (int) date('Y'), 'severity' => 'HIGH', 'status' => 'published', 'cvss_score' => 7.5]),
            'categories' => Category::orderBy('sort_order')->get(['id', 'title']),
            'labs' => Lab::orderBy('category_id')->orderBy('sort_order')->get(['id', 'category_id', 'title']),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateCve($request);
        $data['slug'] = strtolower($data['cve_id']);
        $data['author_id'] = Auth::id();
        $data['source_repo'] = 'manual';
        $data['published_at'] = $data['status'] === 'published' ? now() : null;

        CveArticle::create($data);

        return redirect('/owner/cves')->with('status', "CVE {$data['cve_id']} created.");
    }

    public function edit(CveArticle $cve): View
    {
        return view('owner.cves.form', [
            'article' => $cve,
            'categories' => Category::orderBy('sort_order')->get(['id', 'title']),
            'labs' => Lab::orderBy('category_id')->orderBy('sort_order')->get(['id', 'category_id', 'title']),
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, CveArticle $cve): RedirectResponse
    {
        $data = $this->validateCve($request, $cve->id);
        $data['slug'] = strtolower($data['cve_id']);
        if ($data['status'] === 'published' && ! $cve->published_at) {
            $data['published_at'] = now();
        }

        $cve->update($data);

        return redirect('/owner/cves')->with('status', "CVE {$cve->cve_id} updated.");
    }

    public function destroy(CveArticle $cve): RedirectResponse
    {
        $cveId = $cve->cve_id;
        $cve->delete();

        return redirect('/owner/cves')->with('status', "CVE {$cveId} deleted.");
    }

    public function toggleStatus(CveArticle $cve): RedirectResponse
    {
        $next = $cve->status === 'published' ? 'draft' : 'published';
        $cve->status = $next;
        if ($next === 'published' && ! $cve->published_at) {
            $cve->published_at = now();
        }
        $cve->save();

        return redirect()->back(302, [], '/owner/cves')->with('status', "CVE {$cve->cve_id} status changed to {$next}.");
    }

    public function importTrickest(Request $request, TrickestCveImporter $importer): RedirectResponse
    {
        $data = $request->validate([
            'years' => ['required', 'string', 'max:100'],
            'limit' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'repo_path' => ['nullable', 'string', 'max:500'],
            'mode' => ['required', Rule::in(['local', 'clone_and_import'])],
            'hot_only' => ['nullable', 'boolean'],
        ]);

        $years = array_values(array_filter(array_map(
            static fn (string $y): int => (int) trim($y),
            explode(',', $data['years'])
        )));
        if (empty($years)) {
            $years = TrickestCveImporter::DEFAULT_YEARS;
        }

        $limit = $request->filled('limit') ? (int) $data['limit'] : 300;
        $hotOnly = ! empty($data['hot_only']);
        $targetDir = ! empty($data['repo_path']) ? trim((string) $data['repo_path']) : $importer->defaultRepoPath();

        if ($data['mode'] === 'clone_and_import') {
            @set_time_limit(0);
            $cloneRes = $importer->sparseCloneOrUpdate($years, $targetDir);
            if (! $cloneRes['ok']) {
                return redirect('/owner/cves')->with('error', 'Sparse clone failed: '.$cloneRes['message']);
            }
        }

        @set_time_limit(0);
        $res = $importer->importFromDirectory($targetDir, $years, $limit, $hotOnly, Auth::id());
        if (! $res['ok']) {
            return redirect('/owner/cves')->with('error', $res['message']);
        }

        return redirect('/owner/cves')->with('status', $res['message']);
    }

    /**
     * @return array<string, mixed>
     */
    private function validateCve(Request $request, ?int $ignoreId = null): array
    {
        $request->merge([
            'cve_id' => strtoupper(trim((string) $request->input('cve_id', ''))),
        ]);

        $validated = $request->validate([
            'cve_id' => [
                'required',
                'string',
                'max:32',
                'regex:/^CVE-\d{4}-\d{4,}$/i',
                Rule::unique('cve_articles', 'cve_id')->ignore($ignoreId),
            ],
            'cve_year' => ['required', 'integer', 'min:1999', 'max:2035'],
            'category_id' => ['nullable', 'string', Rule::exists('categories', 'id')],
            'lab_id' => ['nullable', 'string', Rule::exists('labs', 'id')],
            'title' => ['required', 'string', 'max:500'],
            'cvss_score' => ['nullable', 'numeric', 'min:0', 'max:10'],
            'severity' => ['required', Rule::in(CveArticle::SEVERITIES)],
            'affected_product' => ['nullable', 'string', 'max:500'],
            'summary' => ['nullable', 'string'],
            'technical_analysis' => ['nullable', 'string'],
            'poc_content' => ['nullable', 'string'],
            'mitigation' => ['nullable', 'string'],
            'references_text' => ['nullable', 'string'],
            'is_hot' => ['nullable', 'boolean'],
            'status' => ['required', Rule::in(CveArticle::STATUSES)],
        ]);

        $refs = [];
        if (! empty($validated['references_text'])) {
            foreach (preg_split('/\R+/', (string) $validated['references_text']) ?: [] as $line) {
                $t = trim($line);
                if ($t !== '') {
                    $refs[] = $t;
                }
            }
        }

        return [
            'cve_id' => strtoupper(trim($validated['cve_id'])),
            'cve_year' => (int) $validated['cve_year'],
            'category_id' => ($validated['category_id'] ?? '') !== '' ? $validated['category_id'] : null,
            'lab_id' => ($validated['lab_id'] ?? '') !== '' ? $validated['lab_id'] : null,
            'title' => trim($validated['title']),
            'cvss_score' => isset($validated['cvss_score']) && $validated['cvss_score'] !== '' ? round((float) $validated['cvss_score'], 1) : null,
            'severity' => strtoupper($validated['severity']),
            'affected_product' => $validated['affected_product'] ?? null,
            'summary' => $validated['summary'] ?? null,
            'technical_analysis' => $validated['technical_analysis'] ?? null,
            'poc_content' => $validated['poc_content'] ?? null,
            'mitigation' => $validated['mitigation'] ?? null,
            'references_json' => $refs,
            'is_hot' => $request->boolean('is_hot'),
            'status' => $validated['status'],
        ];
    }
}
