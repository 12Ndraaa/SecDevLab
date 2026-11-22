<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleAndTheme
{
    public function handle(Request $request, Closure $next): Response
    {
        $hasSession = $request->hasSession();
        $locale = $hasSession
            ? (string) $request->session()->get('locale', config('app.locale', 'en'))
            : (string) config('app.locale', 'en');
        if (! in_array($locale, ['en', 'id'], true)) {
            $locale = 'en';
        }
        App::setLocale($locale);

        $theme = $hasSession
            ? (string) $request->session()->get('ui_theme', 'light')
            : 'light';
        if (! in_array($theme, ['dark', 'light'], true)) {
            $theme = 'light';
        }

        View::share('uiLocale', $locale);
        View::share('uiTheme', $theme);

        return $next($request);
    }
}
