<!DOCTYPE html>
<html lang="{{ $uiLocale ?? app()->getLocale() }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name') ?: 'SecDevLab')</title>
    <link rel="icon" type="image/png" href="/content/images/logos/secdevlab-favicon.png?v={{ @filemtime(public_path('content/images/logos/secdevlab-favicon.png')) ?: '1' }}">
    @hasSection('legacy_css')
        @php
            $legacyCssHref = trim((string) $__env->yieldContent('legacy_css'));
            $legacyCssPath = strtok($legacyCssHref, '?') ?: $legacyCssHref;
            $legacyCssVer = @filemtime(public_path(ltrim($legacyCssPath, '/'))) ?: '1';
        @endphp
        <link href="{{ $legacyCssPath }}?v={{ $legacyCssVer }}" rel="stylesheet" type="text/css">
    @endif
    <link href="/content/fonts/fonts.css?v={{ @filemtime(public_path('content/fonts/fonts.css')) ?: '1' }}" rel="stylesheet" type="text/css">
    <link href="/content/academy-modern.css?v={{ @filemtime(public_path('content/academy-modern.css')) ?: '2' }}" rel="stylesheet" type="text/css">
</head>
<body>
@php
    $brandName = config('app.name') ?: 'SecDevLab';
@endphp
<header class="vla-topbar no-print" id="top">
    <div class="vla-topbar__inner">
        <a class="vla-brand" href="/" aria-label="{{ $brandName }}">
            <img src="/content/images/logos/secdevlab-logo-wide-light.png?v={{ @filemtime(public_path('content/images/logos/secdevlab-logo-wide-light.png')) ?: '1' }}" alt="{{ $brandName }}" class="vla-brand__logo" height="34">
            <span class="vla-sr-only">{{ $brandName }}</span>
        </a>

        <input type="checkbox" id="vla-mobile-nav" class="vla-mobile-toggle-input">
        <label for="vla-mobile-nav" class="vla-mobile-toggle-label" aria-label="{{ __('academy.nav.toggle_nav') }}">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            <span>{{ __('academy.nav.menu') }}</span>
        </label>

        <nav class="vla-nav" aria-label="{{ __('academy.nav.primary_nav') }}">
            <a href="/web-security/all-topics" class="{{ request()->is('web-security/all-topics') ? 'is-active' : '' }}">{{ __('academy.nav.topics') }}</a>
            <a href="/web-security/all-labs" class="{{ request()->is('web-security/all-labs') ? 'is-active' : '' }}">{{ __('academy.nav.all_labs') }}</a>
            <a href="/cve" class="{{ request()->is('cve*') ? 'is-active' : '' }}">{{ __('academy.nav.cve') }}</a>
            <a href="/web-security/mystery-lab-challenge" class="{{ request()->is('web-security/mystery-lab-challenge*') ? 'is-active' : '' }}">{{ __('academy.nav.mystery') }}</a>
            <a href="/web-security/hall-of-fame" class="{{ request()->is('web-security/hall-of-fame', 'leaderboard') ? 'is-active' : '' }}">{{ __('academy.nav.leaderboard') }}</a>
            <a href="/web-security/dashboard" class="{{ request()->is('web-security/dashboard') ? 'is-active' : '' }}">{{ __('academy.nav.dashboard') }}</a>
            @auth
                @if (Auth::user()->isOwner())
                    <a href="/owner" class="is-owner-link {{ request()->is('owner*') ? 'is-active' : '' }}">{{ __('academy.nav.owner_panel') }}</a>
                @endif
            @endauth
        </nav>

        <div class="vla-actions">
            {{-- Bilingual Switcher (Zero-JS Session) --}}
            <form method="POST" action="/preferences/locale" class="vla-inline-form">
                @csrf
                <input type="hidden" name="redirect_to" value="{{ request()->getRequestUri() }}">
                <div class="vla-pill-switch" role="group" aria-label="{{ __('academy.nav.language') }}">
                    <button type="submit" name="locale" value="en" class="{{ ($uiLocale ?? 'en') === 'en' ? 'is-active' : '' }}">EN</button>
                    <button type="submit" name="locale" value="id" class="{{ ($uiLocale ?? 'en') === 'id' ? 'is-active' : '' }}">ID</button>
                </div>
            </form>

            @include('partials.header-auth')
        </div>
    </div>
</header>

<div class="vla-shell">
    @hasSection('academy_body')
        <div class="vla-learning-content">
            @yield('academy_body')
        </div>
    @else
        @hasSection('sidebar_left')
            <div class="wrapper-large">
                <div class="container-academy">
                    <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle" hidden>
                    @yield('sidebar_left')
                    <main>
                        @yield('breadcrumbs')
                        <div class="section theme-white">
                            @if (session('status'))
                                <div class="vla-alert vla-alert--success">{{ session('status') }}</div>
                            @endif
                            @if (session('error'))
                                <div class="vla-alert vla-alert--error">{{ session('error') }}</div>
                            @endif
                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        @else
            <main class="vla-container">
                @if (session('status'))
                    <div class="vla-alert vla-alert--success no-print">{{ session('status') }}</div>
                @endif
                @if (session('error'))
                    <div class="vla-alert vla-alert--error no-print">{{ session('error') }}</div>
                @endif
                @yield('content')
            </main>
        @endif
    @endif
</div>

@if (trim((string) $__env->yieldContent('hide_footer')) === '')
<footer class="vla-footer no-print">
    <div class="vla-footer__inner">
        <div class="vla-footer__brand">
            <img src="/content/images/logos/secdevlab-mascot.png?v={{ @filemtime(public_path('content/images/logos/secdevlab-mascot.png')) ?: '1' }}" alt="" class="vla-footer__mascot" width="32" height="32" aria-hidden="true">
            <div>
                <strong>{{ $brandName }}</strong>
                <nav class="vla-footer__social" aria-label="{{ __('academy.footer.social_aria') }}">
                    <a href="https://github.com/12Ndraaa/SecDevLab" target="_blank" rel="noopener noreferrer" aria-label="GitHub" title="GitHub">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12 0.297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/axlendraa/" target="_blank" rel="noopener noreferrer" aria-label="Instagram" title="Instagram">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/in/axlendra-haris-sanjaya-19b8a6372/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" title="LinkedIn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
        <div class="vla-footer__links">
            <a href="/">{{ __('academy.nav.home') }}</a>
            <a href="/web-security/all-labs">{{ __('academy.nav.all_labs') }}</a>
            <a href="/web-security/all-topics">{{ __('academy.nav.topics') }}</a>
            <a href="/cve">{{ __('academy.nav.cve') }}</a>
            <a href="/web-security/hall-of-fame">{{ __('academy.nav.leaderboard') }}</a>
            <a href="/web-security/dashboard">{{ __('academy.nav.dashboard') }}</a>
            @auth
                <a href="/certificate">{{ __('academy.nav.certificate') }}</a>
            @endauth
        </div>
    </div>
</footer>
@endif
</body>
</html>
