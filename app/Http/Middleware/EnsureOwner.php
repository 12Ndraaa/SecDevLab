<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureOwner
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (! $user) {
            return redirect('/users?returnurl='.urlencode($request->getRequestUri()));
        }

        if (! $user->isOwner()) {
            abort(403, 'Owner privileges are required to access this resource.');
        }

        return $next($request);
    }
}
