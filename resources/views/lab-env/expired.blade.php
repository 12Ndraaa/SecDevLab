<!DOCTYPE html>
<html lang="{{ $labUiLocale ?? app()->getLocale() }}" data-theme="{{ in_array($session->ui_theme, ['dark', 'light'], true) ? $session->ui_theme : 'light' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/content/images/logos/secdevlab-favicon.png?v={{ @filemtime(public_path('content/images/logos/secdevlab-favicon.png')) ?: '1' }}">
    <link href="/content/fonts/fonts.css?v={{ @filemtime(public_path('content/fonts/fonts.css')) ?: '1' }}" rel="stylesheet">
    <link href="/content/lab-workbench.css?v={{ @filemtime(public_path('content/lab-workbench.css')) ?: '2' }}" rel="stylesheet">
    <title>{{ __('academy.expired.page_title') }} | {{ config('app.name') ?: 'SecDevLab' }}</title>
</head>
<body>
<header class="sdl-command-header">
    <div class="sdl-command-bar">
        <div class="sdl-command-bar__top">
            <a class="sdl-command-brand" href="/" aria-label="{{ config('app.name') ?: 'SecDevLab' }}">
                <span class="sdl-command-brand__badge" aria-hidden="true">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="M9 12l2 2 4-4"/>
                    </svg>
                </span>
                <img src="/content/images/logos/secdevlab-logo-wide-light.png?v={{ @filemtime(public_path('content/images/logos/secdevlab-logo-wide-light.png')) ?: '1' }}" alt="{{ config('app.name') ?: 'SecDevLab' }}" class="sdl-command-brand__logo sdl-command-brand__logo--light" height="28">
                <img src="/content/images/logos/secdevlab-logo-wide-dark.png?v={{ @filemtime(public_path('content/images/logos/secdevlab-logo-wide-dark.png')) ?: '1' }}" alt="{{ config('app.name') ?: 'SecDevLab' }}" class="sdl-command-brand__logo sdl-command-brand__logo--dark" height="28">
                <span class="lw-sr-only">{{ config('app.name') ?: 'SecDevLab' }}</span>
            </a>
            <span class="lw-pill lw-pill--danger">{{ __('academy.expired.badge') }}</span>
        </div>
    </div>
</header>

<main class="lw-shell" style="max-width:760px;padding-top:42px">
    <div class="lw-card">
        <div class="lw-terminal" style="margin-bottom:18px">
            <div class="lw-terminal__bar">
                <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
                <span>{{ __('academy.expired.terminal_head') }}</span>
            </div>
            <div class="lw-terminal__body">{{ __('academy.expired.terminal_body', [
    'token' => $session->instance_token,
    'lab' => $lab->id,
    'archetype' => $archetype['short'],
    'expired_at' => $session->expires_at?->toIso8601String() ?? __('academy.common.na'),
    'brand' => config('app.name') ?: 'SecDevLab',
]) }}</div>
        </div>

        <h1 style="margin:0 0 8px;color:var(--lw-heading);font-size:1.35rem">{{ $lab->localizedTitle($labUiLocale ?? app()->getLocale()) }}</h1>
        <p class="lw-muted" style="margin:0 0 18px">
            {{ __('academy.expired.relaunch_note', ['brand' => config('app.name') ?: 'SecDevLab']) }}
        </p>

        <div style="display:flex;flex-wrap:wrap;gap:10px">
            <a class="lw-btn lw-btn--primary" href="/academy/labs/launch/{{ $lab->id }}">{{ __('academy.expired.relaunch_btn') }}</a>
            <a class="lw-btn" href="{{ $lab->href }}">{{ __('academy.expired.back_desc') }}</a>
            <a class="lw-btn" href="/web-security/all-labs">{{ __('academy.expired.all_labs') }}</a>
        </div>
    </div>
</main>
</body>
</html>
