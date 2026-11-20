<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function setLocale(Request $request): RedirectResponse
    {
        $locale = strtolower(trim((string) $request->input('locale', 'en')));
        if (! in_array($locale, ['en', 'id'], true)) {
            $locale = 'en';
        }

        $request->session()->put('locale', $locale);

        return $this->safeBack($request);
    }

    public function toggleTheme(Request $request): RedirectResponse
    {
        $requested = strtolower(trim((string) $request->input('theme', '')));
        if (in_array($requested, ['dark', 'light'], true)) {
            $next = $requested;
        } else {
            $current = (string) $request->session()->get('ui_theme', 'dark');
            $next = $current === 'dark' ? 'light' : 'dark';
        }

        $request->session()->put('ui_theme', $next);

        return $this->safeBack($request);
    }

    private function safeBack(Request $request): RedirectResponse
    {
        $redirect = trim((string) $request->input('redirect_to', ''));
        if ($redirect !== '' && str_starts_with($redirect, '/') && ! str_starts_with($redirect, '//') && ! str_starts_with($redirect, '/\\')) {
            return redirect($redirect);
        }

        return redirect()->back(302, [], '/');
    }
}
