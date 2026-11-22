<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LabSecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        $response->headers->set('Referrer-Policy', 'no-referrer');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Robots-Tag', 'noindex, nofollow');
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate');

        if (! $response->headers->has('Content-Security-Policy')) {
            $response->headers->set(
                'Content-Security-Policy',
                "default-src 'self'; script-src 'none'; object-src 'none'; base-uri 'self'; form-action 'self'; frame-ancestors 'self'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self'; sandbox allow-forms allow-same-origin"
            );
        }

        return $response;
    }
}
