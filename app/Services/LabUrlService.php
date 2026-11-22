<?php

namespace App\Services;

use App\Models\LabSession;
use Illuminate\Http\Request;

class LabUrlService
{
    public function wildcardDomain(): ?string
    {
        $dom = trim((string) config('lab.wildcard_domain', ''));

        return $dom !== '' ? strtolower(ltrim($dom, '.')) : null;
    }

    public function isSubdomainMode(): bool
    {
        return config('lab.url_mode') === 'subdomain' && $this->wildcardDomain() !== null;
    }

    public function isSubdomainRequest(?Request $request): bool
    {
        if (! $request) {
            return false;
        }

        return $this->extractTokenFromHost((string) $request->getHost()) !== null;
    }

    public function extractTokenFromHost(string $host): ?string
    {
        $wildcard = $this->wildcardDomain();
        if ($wildcard === null) {
            return null;
        }

        $cleanHost = strtolower(trim(explode(':', $host)[0]));
        $pattern = '/^([a-f0-9]{32,64})\.'.preg_quote($wildcard, '/').'$/i';
        if (preg_match($pattern, $cleanHost, $m)) {
            return strtolower($m[1]);
        }

        return null;
    }

    public function pathPrefix(LabSession $session, ?Request $request = null): string
    {
        if ($this->isSubdomainRequest($request) || $this->isSubdomainMode()) {
            return '';
        }

        return '/lab/'.strtolower((string) $session->instance_token);
    }

    public function cookiePath(LabSession $session, ?Request $request = null): string
    {
        $prefix = $this->pathPrefix($session, $request);

        return $prefix !== '' ? $prefix : '/';
    }

    /**
     * @param  array<string, scalar>  $query
     */
    public function launchRedirectTarget(LabSession $session, array $query = [], ?Request $request = null): string
    {
        $qs = $query !== [] ? '?'.http_build_query($query) : '';

        if ($this->isSubdomainMode()) {
            return $this->absoluteBaseUrl($session, $request).'/'.$qs;
        }

        return '/lab/'.strtolower((string) $session->instance_token).$qs;
    }

    public function absoluteBaseUrl(LabSession $session, ?Request $request = null): string
    {
        if ($this->isSubdomainMode() && $wildcard = $this->wildcardDomain()) {
            $scheme = $request ? $request->getScheme() : (config('app.force_https') ? 'https' : 'http');
            if (config('app.force_https')) {
                $scheme = 'https';
            }
            $portSuffix = '';
            if ($request) {
                $port = (int) $request->getPort();
                if ($port > 0 && ! (($scheme === 'http' && $port === 80) || ($scheme === 'https' && $port === 443))) {
                    $portSuffix = ':'.$port;
                }
            }

            return "{$scheme}://{$session->instance_token}.{$wildcard}{$portSuffix}";
        }

        return rtrim(url('/lab/'.strtolower((string) $session->instance_token)), '/');
    }
}
