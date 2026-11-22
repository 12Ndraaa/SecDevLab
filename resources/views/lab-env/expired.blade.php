<!DOCTYPE html>
<html lang="en" data-theme="{{ $session->ui_theme ?: 'dark' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/content/images/logos/favicon.ico" type="image/x-icon">
    <link href="/content/lab-workbench.css" rel="stylesheet">
    <title>Lab Session Expired | {{ config('app.name') ?: 'SecDevLab' }}</title>
</head>
<body>
<header class="sdl-command-header">
    <div class="sdl-command-bar">
        <div class="sdl-command-bar__top">
            <a class="sdl-command-brand" href="/">
                <span class="sdl-command-brand__badge" aria-hidden="true">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="M9 12l2 2 4-4"/>
                    </svg>
                </span>
                <span>{{ config('app.name') ?: 'SecDevLab' }}</span>
            </a>
            <span class="lw-pill lw-pill--danger">SESSION EXPIRED (410)</span>
        </div>
    </div>
</header>

<main class="lw-shell" style="max-width:760px;padding-top:42px">
    <div class="lw-card">
        <div class="lw-terminal" style="margin-bottom:18px">
            <div class="lw-terminal__bar">
                <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
                <span>INSTANCE_LIFECYCLE // TTL_EXPIRED</span>
            </div>
            <div class="lw-terminal__body">HTTP/1.1 410 Gone
Instance-Token: {{ $session->instance_token }}
Lab-ID:         {{ $lab->id }}
Archetype:      {{ $archetype['short'] }}
Expired-At:     {{ $session->expires_at?->toIso8601String() ?? 'N/A' }}

This ephemeral lab instance reached its TTL and was decommissioned.
Your SecDevLab account progress remains safely preserved.</div>
        </div>

        <h1 style="margin:0 0 8px;color:var(--lw-heading);font-size:1.35rem">{{ $lab->title }}</h1>
        <p class="lw-muted" style="margin:0 0 18px">
            Relaunch from SecDevLab to allocate a fresh 32-hex capability token and randomized target secrets.
        </p>

        <div style="display:flex;flex-wrap:wrap;gap:10px">
            <a class="lw-btn lw-btn--primary" href="/academy/labs/launch/{{ $lab->id }}">Launch Fresh Lab Instance</a>
            <a class="lw-btn" href="{{ $lab->href }}">Back to Lab Description</a>
            <a class="lw-btn" href="/web-security/all-labs">All Labs</a>
        </div>
    </div>
</main>
</body>
</html>
