<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(Request $request): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect('/users/youraccount/personaldetails');
        }

        return view('auth.login', [
            'returnUrl' => (string) $request->query('returnurl', ''),
        ]);
    }

    public function login(Request $request): RedirectResponse
    {
        $request->merge([
            'email' => strtolower(trim((string) $request->input('email', ''))),
        ]);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials)) {
            return back()
                ->withInput($request->only('email', 'returnurl'))
                ->withErrors(['email' => 'Invalid email or password.']);
        }

        $request->session()->regenerate();

        return redirect($this->safeReturnUrl((string) $request->input('returnurl', '')));
    }

    public function showRegister(Request $request): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect('/users/youraccount/personaldetails');
        }

        return view('auth.register', [
            'returnUrl' => (string) $request->query('returnurl', ''),
        ]);
    }

    public function register(Request $request): RedirectResponse
    {
        $request->merge([
            'email' => strtolower(trim((string) $request->input('email', ''))),
        ]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:191', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        // Public registration is strictly locked to standard learner role
        $user->role = User::ROLE_USER;
        $user->save();

        Auth::login($user);
        $request->session()->regenerate();

        return redirect($this->safeReturnUrl((string) $request->input('returnurl', '')));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/users');
    }

    public function account(): View
    {
        /** @var User $user */
        $user = Auth::user();
        $solvedSessions = $user->labSessions()
            ->with('lab')
            ->where('solved', true)
            ->orderByDesc('solved_at')
            ->get();

        return view('auth.account', [
            'user' => $user,
            'summary' => $user->progressSummary(),
            'solvedSessions' => $solvedSessions,
            'totalLabs' => Lab::count(),
        ]);
    }

    private function safeReturnUrl(string $url): string
    {
        $trimmed = trim($url);
        if ($trimmed !== '' && str_starts_with($trimmed, '/') && ! str_starts_with($trimmed, '//') && ! str_starts_with($trimmed, '/\\')) {
            return $trimmed;
        }

        return '/web-security/dashboard';
    }
}
