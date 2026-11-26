<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleAndTheme
{
    public function handle(Request $request, Closure $next): Response
    {
        $hasSession = $request->hasSession();

        $locale = '';
        if (Auth::check()) {
            $pendingLocale = (string) Cache::pull('secdevlab_pending_locale:'.Auth::id(), '');
            if (in_array($pendingLocale, ['en', 'id'], true)) {
                $locale = $pendingLocale;
                if ($hasSession) {
                    $request->session()->put('locale', $locale);
                }
                Cookie::queue(cookie(
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
        }
        if (! in_array($locale, ['en', 'id'], true) && $hasSession && $request->session()->has('locale')) {
            $locale = (string) $request->session()->get('locale', '');
        }
        if (! in_array($locale, ['en', 'id'], true)) {
            $cookieLocale = (string) $request->cookie('secdevlab_locale', '');
            if (in_array($cookieLocale, ['en', 'id'], true)) {
                $locale = $cookieLocale;
                if ($hasSession) {
                    $request->session()->put('locale', $locale);
                }
            }
        }
        if (! in_array($locale, ['en', 'id'], true) && Auth::check()) {
            $userLocale = (string) Cache::get('secdevlab_user_locale:'.Auth::id(), '');
            if (in_array($userLocale, ['en', 'id'], true)) {
                $locale = $userLocale;
                if ($hasSession) {
                    $request->session()->put('locale', $locale);
                }
            }
        }
        if (! in_array($locale, ['en', 'id'], true)) {
            $locale = (string) config('app.locale', 'en');
        }
        if (! in_array($locale, ['en', 'id'], true)) {
            $locale = 'en';
        }
        App::setLocale($locale);
        Carbon::setLocale($locale);

        if ($hasSession && $request->session()->has('ui_theme')) {
            $request->session()->forget('ui_theme');
        }
        if ($request->cookies->has('secdevlab_theme')) {
            Cookie::queue(Cookie::forget('secdevlab_theme'));
        }

        View::share('uiLocale', $locale);
        View::share('uiTheme', 'light');

        return $next($request);
    }
}
