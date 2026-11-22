<?php

use App\Http\Middleware\EnsureOwner;
use App\Http\Middleware\LabSecurityHeaders;
use App\Http\Middleware\ResolveSubdomainLab;
use App\Http\Middleware\SetLocaleAndTheme;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function (): void {
            Route::middleware([LabSecurityHeaders::class])
                ->group(base_path('routes/lab.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
        $middleware->prepend(ResolveSubdomainLab::class);

        $middleware->web(append: [
            SetLocaleAndTheme::class,
        ]);

        $middleware->alias([
            'owner' => EnsureOwner::class,
        ]);

        $middleware->redirectGuestsTo(
            fn (Request $request): string => '/users?returnurl='.urlencode($request->getRequestUri())
        );

        $middleware->validateCsrfTokens(except: [
            'lab/*',
            'api/widgets',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
