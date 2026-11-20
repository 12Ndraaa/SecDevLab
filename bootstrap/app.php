<?php

use App\Http\Middleware\EnsureOwner;
use App\Http\Middleware\SetLocaleAndTheme;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
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
            'lab-env/*',
            'api/widgets',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
