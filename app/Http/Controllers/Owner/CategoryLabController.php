<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lab;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryLabController extends Controller
{
    // --- CATEGORIES CRUD ---

    public function categoriesIndex(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));
        $query = Category::withCount(['labs', 'cveArticles'])->orderBy('sort_order');
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', '%'.$search.'%')
                    ->orWhere('title', 'like', '%'.$search.'%');
            });
        }

        return view('owner.categories.index', [
            'categories' => $query->get(),
            'search' => $search,
        ]);
    }

    public function createCategory(): View
    {
        $nextOrder = ((int) Category::max('sort_order')) + 1;

        return view('owner.categories.form', [
            'category' => new Category(['sort_order' => $nextOrder]),
            'isEdit' => false,
        ]);
    }

    public function storeCategory(Request $request): RedirectResponse
    {
        $request->merge([
            'id' => strtolower(trim((string) $request->input('id', ''))),
        ]);

        $data = $request->validate([
            'id' => ['required', 'string', 'max:100', 'regex:/^[a-z0-9-]+$/', Rule::unique('categories', 'id')],
            'title' => ['required', 'string', 'max:255'],
            'topic_route' => ['required', 'string', 'max:191', 'starts_with:/web-security'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);

        Category::create([
            'id' => strtolower($data['id']),
            'title' => trim($data['title']),
            'topic_route' => rtrim(trim($data['topic_route']), '/'),
            'lab_count' => 0,
            'sort_order' => (int) $data['sort_order'],
        ]);

        return redirect('/owner/categories')->with('status', "Category '{$data['title']}' created.");
    }

    public function editCategory(Category $category): View
    {
        return view('owner.categories.form', [
            'category' => $category,
            'isEdit' => true,
        ]);
    }

    public function updateCategory(Request $request, Category $category): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'topic_route' => ['required', 'string', 'max:191', 'starts_with:/web-security'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);

        $category->update([
            'title' => trim($data['title']),
            'topic_route' => rtrim(trim($data['topic_route']), '/'),
            'sort_order' => (int) $data['sort_order'],
        ]);
        $category->syncLabCount();

        return redirect('/owner/categories')->with('status', "Category '{$category->title}' updated.");
    }

    public function destroyCategory(Category $category): RedirectResponse
    {
        $title = $category->title;
        $category->delete();

        return redirect('/owner/categories')->with('status', "Category '{$title}' deleted.");
    }

    // --- LABS CRUD ---

    public function labsIndex(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));
        $categoryId = trim((string) $request->query('category', 'ALL'));
        $difficulty = strtoupper(trim((string) $request->query('difficulty', 'ALL')));

        $query = Lab::with('category:id,title');
        if ($search !== '') {
            $like = '%'.$search.'%';
            $query->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                    ->orWhere('href', 'like', $like)
                    ->orWhere('id', 'like', $like);
            });
        }
        if ($categoryId !== '' && $categoryId !== 'ALL') {
            $query->where('category_id', $categoryId);
        }
        if (in_array($difficulty, ['APPRENTICE', 'PRACTITIONER', 'EXPERT'], true)) {
            $query->where('difficulty', $difficulty);
        }

        $labs = $query->orderBy('category_id')->orderBy('sort_order')->paginate(25)->withQueryString();

        return view('owner.labs.index', [
            'labs' => $labs,
            'categories' => Category::orderBy('sort_order')->get(['id', 'title']),
            'search' => $search,
            'categoryId' => $categoryId,
            'difficulty' => $difficulty,
        ]);
    }

    public function createLab(): View
    {
        return view('owner.labs.form', [
            'lab' => new Lab([
                'difficulty' => 'APPRENTICE',
                'sort_order' => 1,
                'profile' => ['theme' => 'ecommerce', 'hasCategoryFilter' => true, 'solutionPayloads' => []],
            ]),
            'categories' => Category::orderBy('sort_order')->get(['id', 'title']),
            'isEdit' => false,
        ]);
    }

    public function storeLab(Request $request): RedirectResponse
    {
        $data = $this->validateLab($request);
        $labId = hash('sha256', $data['href'].'|'.microtime(true));

        $lab = Lab::create([
            'id' => $labId,
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'href' => $data['href'],
            'difficulty' => $data['difficulty'],
            'difficulty_class' => Lab::difficultyClassFor($data['difficulty']),
            'description_html' => $data['description_html'],
            'sections' => $data['sections'],
            'profile' => $data['profile'],
            'sort_order' => $data['sort_order'],
        ]);

        $lab->category?->syncLabCount();

        return redirect('/owner/labs')->with('status', "Lab '{$lab->title}' created.");
    }

    public function editLab(Lab $lab): View
    {
        return view('owner.labs.form', [
            'lab' => $lab,
            'categories' => Category::orderBy('sort_order')->get(['id', 'title']),
            'isEdit' => true,
        ]);
    }

    public function updateLab(Request $request, Lab $lab): RedirectResponse
    {
        $oldCategory = $lab->category;
        $data = $this->validateLab($request, $lab->id, $lab->profile ?? [], $lab->sections ?? []);

        $lab->update([
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'href' => $data['href'],
            'difficulty' => $data['difficulty'],
            'difficulty_class' => Lab::difficultyClassFor($data['difficulty']),
            'description_html' => $data['description_html'],
            'sections' => $data['sections'],
            'profile' => $data['profile'],
            'sort_order' => $data['sort_order'],
        ]);

        if ($oldCategory && $oldCategory->id !== $lab->category_id) {
            $oldCategory->syncLabCount();
        }
        $lab->category?->syncLabCount();

        return redirect('/owner/labs')->with('status', "Lab '{$lab->title}' updated.");
    }

    public function destroyLab(Lab $lab): RedirectResponse
    {
        $cat = $lab->category;
        $title = $lab->title;
        $lab->delete();
        $cat?->syncLabCount();

        return redirect('/owner/labs')->with('status', "Lab '{$title}' deleted.");
    }

    /**
     * @param  array<string, mixed>  $existingProfile
     * @param  list<array<string, mixed>>  $existingSections
     * @return array<string, mixed>
     */
    private function validateLab(
        Request $request,
        ?string $ignoreLabId = null,
        array $existingProfile = [],
        array $existingSections = []
    ): array {
        $rawHref = trim((string) $request->input('href', ''));
        if ($rawHref !== '') {
            $request->merge([
                'href' => '/'.ltrim(rtrim(Str::lower($rawHref), '/'), '/'),
            ]);
        }

        $validated = $request->validate([
            'category_id' => ['required', 'string', Rule::exists('categories', 'id')],
            'title' => ['required', 'string', 'max:500'],
            'href' => [
                'required',
                'string',
                'max:191',
                'starts_with:/web-security/',
                Rule::unique('labs', 'href')->ignore($ignoreLabId, 'id'),
            ],
            'difficulty' => ['required', Rule::in(['APPRENTICE', 'PRACTITIONER', 'EXPERT'])],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'description_html' => ['required', 'string'],
            'hint_text' => ['nullable', 'string'],
            'solution_text' => ['nullable', 'string'],
            'theme' => ['required', Rule::in(['ecommerce', 'blog'])],
            'solution_payloads' => ['nullable', 'string'],
        ]);

        $desc = trim($validated['description_html']);
        if (! str_starts_with($desc, '<')) {
            $desc = '<p>'.nl2br(e($desc)).'</p>';
        }

        $sections = [];
        $hint = trim((string) ($validated['hint_text'] ?? ''));
        $solution = trim((string) ($validated['solution_text'] ?? ''));
        if ($hint !== '') {
            $sections[] = [
                'title' => 'Hint',
                'bodyHtml' => str_starts_with($hint, '<') ? $hint : '<p>'.nl2br(e($hint)).'</p>',
            ];
        }
        if ($solution !== '') {
            $sections[] = [
                'title' => 'Solution',
                'bodyHtml' => str_starts_with($solution, '<') ? $solution : '<p>'.nl2br(e($solution)).'</p>',
            ];
        }
        foreach ($existingSections as $sec) {
            $secTitle = (string) ($sec['title'] ?? '');
            if (stripos($secTitle, 'hint') === false && stripos($secTitle, 'solution') === false) {
                $sections[] = $sec;
            } elseif (stripos($secTitle, 'community') !== false) {
                $sections[] = $sec;
            }
        }

        $payloads = [];
        if (! empty($validated['solution_payloads'])) {
            foreach (preg_split('/\R+/', (string) $validated['solution_payloads']) ?: [] as $line) {
                $t = trim($line);
                if ($t !== '') {
                    $payloads[] = $t;
                }
            }
        }

        $profile = array_merge([
            'categoryId' => $validated['category_id'],
            'difficulty' => $validated['difficulty'],
            'theme' => $validated['theme'],
            'hasCategoryFilter' => $validated['theme'] === 'ecommerce',
            'hasSearchBox' => true,
            'productIds' => [7, 12, 17, 9, 14, 19, 8, 13, 18, 10, 15, 20],
            'blogPostIds' => [1, 2, 3, 4],
        ], $existingProfile, [
            'categoryId' => $validated['category_id'],
            'title' => trim($validated['title']),
            'href' => rtrim(trim($validated['href']), '/'),
            'difficulty' => $validated['difficulty'],
            'theme' => $validated['theme'],
            'hasCategoryFilter' => $validated['theme'] === 'ecommerce',
            'hasLiveChat' => $request->boolean('has_live_chat'),
            'hasExploitServer' => $request->boolean('has_exploit_server'),
            'hasEmailClient' => $request->boolean('has_email_client'),
            'hasSubmitSolution' => $request->boolean('has_submit_solution'),
            'hasAdminPanel' => $request->boolean('has_admin_panel'),
            'hasMyAccount' => $request->boolean('has_my_account'),
            'hasCart' => $request->boolean('has_cart'),
            'isCustomLab' => true,
            'solutionPayloads' => $payloads,
        ]);

        return [
            'category_id' => $validated['category_id'],
            'title' => trim($validated['title']),
            'href' => '/'.ltrim(rtrim(Str::lower(trim($validated['href'])), '/'), '/'),
            'difficulty' => $validated['difficulty'],
            'sort_order' => (int) $validated['sort_order'],
            'description_html' => $desc,
            'sections' => $sections,
            'profile' => $profile,
        ];
    }
}
