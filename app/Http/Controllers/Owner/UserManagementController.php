<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\LabSession;
use App\Models\LabUploadedFile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));
        $role = strtolower(trim((string) $request->query('role', 'ALL')));

        $query = User::withCount(['labSessions as solved_count' => static fn ($q) => $q->where('solved', true)]);
        if ($search !== '') {
            $like = '%'.$search.'%';
            $query->where(function ($q) use ($like) {
                $q->where('name', 'like', $like)->orWhere('email', 'like', $like);
            });
        }
        if (in_array($role, [User::ROLE_OWNER, User::ROLE_USER], true)) {
            $query->where('role', $role);
        }

        $users = $query->orderBy('role')->orderByDesc('solved_count')->orderBy('id')->paginate(20)->withQueryString();

        return view('owner.users.index', [
            'users' => $users,
            'search' => $search,
            'role' => $role,
        ]);
    }

    public function create(): View
    {
        return view('owner.users.form', [
            'managedUser' => new User(['role' => User::ROLE_USER]),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->merge([
            'email' => strtolower(trim((string) $request->input('email', ''))),
        ]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:191', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', Rule::in([User::ROLE_OWNER, User::ROLE_USER])],
        ]);

        $user = new User([
            'name' => trim($data['name']),
            'email' => strtolower(trim($data['email'])),
            'password' => $data['password'],
        ]);
        $user->role = $data['role'];
        $user->save();

        return redirect('/owner/users')->with('status', __('academy.owner.flash_user_created', ['name' => $user->name, 'role' => $user->role]));
    }

    public function edit(User $user): View
    {
        return view('owner.users.form', [
            'managedUser' => $user,
            'isEdit' => true,
            'summary' => $user->progressSummary(),
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->merge([
            'email' => strtolower(trim((string) $request->input('email', ''))),
        ]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:191', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:6'],
            'role' => ['required', Rule::in([User::ROLE_OWNER, User::ROLE_USER])],
        ]);

        if ($user->id === Auth::id() && $data['role'] !== User::ROLE_OWNER) {
            return back()->withErrors(['role' => __('academy.owner.flash_user_demote_err')]);
        }

        $user->name = trim($data['name']);
        $user->email = strtolower(trim($data['email']));
        if (! empty($data['password'])) {
            $user->password = $data['password'];
        }
        $user->role = $data['role'];
        $user->save();

        return redirect('/owner/users')->with('status', __('academy.owner.flash_user_updated', ['name' => $user->name]));
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === Auth::id()) {
            return redirect('/owner/users')->with('error', __('academy.owner.flash_user_delete_err'));
        }

        $name = $user->name;
        $user->delete();

        return redirect('/owner/users')->with('status', __('academy.owner.flash_user_deleted', ['name' => $name]));
    }

    public function resetProgress(User $user): RedirectResponse
    {
        $deletedSessions = LabSession::where('user_id', $user->id)->delete();
        LabUploadedFile::where('user_id', $user->id)->delete();

        return redirect()->back(302, [], '/owner/users')
            ->with('status', __('academy.owner.flash_progress_reset', ['name' => $user->name, 'count' => $deletedSessions]));
    }
}
