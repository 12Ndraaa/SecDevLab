<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Lab Instance URL Mode ('path' or 'subdomain')
    |--------------------------------------------------------------------------
    | Default 'path' uses /lab/{token}/... (Railway Free & local compatible).
    | Set LAB_URL_MODE=subdomain and LAB_WILDCARD_DOMAIN to use {token}.domain.
    */
    'url_mode' => strtolower((string) env('LAB_URL_MODE', 'path')) === 'subdomain'
        ? 'subdomain'
        : 'path',

    'wildcard_domain' => ($dom = trim((string) env('LAB_WILDCARD_DOMAIN', ''))) !== ''
        ? strtolower(ltrim($dom, '.'))
        : null,

    /*
    |--------------------------------------------------------------------------
    | Ephemeral Lab Session TTL (Minutes)
    |--------------------------------------------------------------------------
    */
    'ttl_minutes' => max(5, (int) env('LAB_SESSION_TTL_MINUTES', 60)),
];
