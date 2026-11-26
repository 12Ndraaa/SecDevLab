<?php

namespace App\Http\Controllers;

use App\Models\LabSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PreferenceController extends Controller
{
    public function setLocale(Request $request): RedirectResponse
    {
        $locale = strtolower(trim((string) $request->input('locale', 'en')));
        if (! in_array($locale, ['en', 'id'], true)) {
            $locale = 'en';
        }

        $request->session()->put('locale', $locale);
        $request->session()->save();

        if (Auth::check()) {
            $userId = (int) Auth::id();
            Cache::forget("secdevlab_pending_locale:{$userId}");
            Cache::forever("secdevlab_user_locale:{$userId}", $locale);
            LabSession::where('user_id', $userId)
                ->get()
                ->each(static fn (LabSession $s) => $s->setUiLocale($locale, false));
        }

        return $this->safeBack($request)->withCookie(cookie(
            'secdevlab_locale',
            $locale,
            60 * 24 * 365,
            '/',
            null,
            null,
            true,
            false,
            'lax'
        ));
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
