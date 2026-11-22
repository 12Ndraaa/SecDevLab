<?php

namespace App\Http\Middleware;

use App\Http\Controllers\LabEnvironmentController;
use App\Services\LabUrlService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResolveSubdomainLab
{
    public function __construct(
        private readonly LabUrlService $urlService,
        private readonly LabSecurityHeaders $securityHeaders
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        if ($token = $this->urlService->extractTokenFromHost((string) $request->getHost())) {
            $tail = ltrim($request->getPathInfo(), '/');

            return $this->securityHeaders->handle(
                $request,
                fn (Request $req): Response => app(LabEnvironmentController::class)->handleByToken(
                    $req,
                    $token,
                    $tail !== '' ? $tail : null
                )
            );
        }

        return $next($request);
    }
}
