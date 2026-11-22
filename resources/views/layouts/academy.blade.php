<!DOCTYPE html>
<html lang="{{ $uiLocale ?? app()->getLocale() }}" data-theme="{{ $uiTheme ?? session('ui_theme', 'dark') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name') ?: 'SecDevLab')</title>
    <link rel="icon" href="/content/images/logos/favicon.ico" type="image/x-icon">
    @hasSection('legacy_css')
        <link href="@yield('legacy_css')" rel="stylesheet" type="text/css">
        <link rel="preload" href="/content/fonts/ps-icons-small/ps-icons-small.woff?td2uot" as="font" crossorigin="anonymous">
        <link rel="preload" href="/content/fonts/ps-main/ps-icons.woff?l1la2n" as="font" crossorigin="anonymous">
    @endif
    <link href="/content/academy-modern.css" rel="stylesheet" type="text/css">
</head>
<body>
<header class="vla-topbar no-print" id="top">
    <div class="vla-topbar__inner">
        <a class="vla-brand" href="/">
            <span class="vla-brand__icon" aria-hidden="true">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="M9 12l2 2 4-4"/>
                </svg>
            </span>
            <span>{{ config('app.name') ?: 'SecDevLab' }}</span>
        </a>

        <input type="checkbox" id="vla-mobile-nav" class="vla-mobile-toggle-input">
        <label for="vla-mobile-nav" class="vla-mobile-toggle-label">Menu</label>

        <nav class="vla-nav" aria-label="Primary navigation">
            <a href="/" class="{{ request()->is('/') ? 'is-active' : '' }}">{{ __('academy.nav.home') }}</a>
            <a href="/web-security/all-topics" class="{{ request()->is('web-security/all-topics') ? 'is-active' : '' }}">{{ __('academy.nav.topics') }}</a>
            <a href="/web-security/all-labs" class="{{ request()->is('web-security/all-labs') ? 'is-active' : '' }}">{{ __('academy.nav.all_labs') }}</a>
            <a href="/cve" class="{{ request()->is('cve*') ? 'is-active' : '' }}">{{ __('academy.nav.cve') }}</a>
            <a href="/web-security/mystery-lab-challenge" class="{{ request()->is('web-security/mystery-lab-challenge*') ? 'is-active' : '' }}">{{ __('academy.nav.mystery') }}</a>
            <a href="/web-security/hall-of-fame" class="{{ request()->is('web-security/hall-of-fame', 'leaderboard') ? 'is-active' : '' }}">{{ __('academy.nav.leaderboard') }}</a>
            <a href="/web-security/dashboard" class="{{ request()->is('web-security/dashboard') ? 'is-active' : '' }}">{{ __('academy.nav.dashboard') }}</a>
            @auth
                <a href="/certificate" class="{{ request()->is('certificate*') ? 'is-active' : '' }}">{{ __('academy.nav.certificate') }}</a>
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
                <div class="vla-pill-switch" role="group" aria-label="Language">
                    <button type="submit" name="locale" value="en" class="{{ ($uiLocale ?? 'en') === 'en' ? 'is-active' : '' }}">EN</button>
                    <button type="submit" name="locale" value="id" class="{{ ($uiLocale ?? 'en') === 'id' ? 'is-active' : '' }}">ID</button>
                </div>
            </form>

            {{-- Pure-CSS Light / Dark Theme Switcher (Zero-JS Session, SVG Only) --}}
            <form method="POST" action="/preferences/theme" class="vla-inline-form">
                @csrf
                <input type="hidden" name="redirect_to" value="{{ request()->getRequestUri() }}">
                <button type="submit" class="vla-btn vla-btn--outline vla-btn--sm" title="{{ __('academy.nav.switch_theme') }}">
                    <span class="vla-icon" aria-hidden="true">
                        @if (($uiTheme ?? 'dark') === 'dark')
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="4"/>
                                <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                            </svg>
                        @else
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                            </svg>
                        @endif
                    </span>
                    <span>{{ ($uiTheme ?? 'dark') === 'dark' ? __('academy.nav.theme_light') : __('academy.nav.theme_dark') }}</span>
                </button>
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

<footer class="vla-footer no-print">
    <div class="vla-footer__inner">
        <div>
            <strong>{{ config('app.name') ?: 'SecDevLab' }}</strong>
            <div class="vla-muted-sm">{{ __('academy.footer.tagline') }}</div>
            <div class="vla-muted-sm">&copy; {{ date('Y') }} {{ config('app.name') ?: 'SecDevLab' }} &mdash; {{ __('academy.footer.copyright') }}</div>
        </div>
        <div class="vla-footer__links">
            <a href="/web-security/all-labs">{{ __('academy.nav.all_labs') }}</a>
            <a href="/web-security/all-topics">{{ __('academy.nav.topics') }}</a>
            <a href="/cve">{{ __('academy.nav.cve') }}</a>
            <a href="/web-security/hall-of-fame">{{ __('academy.nav.leaderboard') }}</a>
            <a href="/web-security/dashboard">{{ __('academy.nav.dashboard') }}</a>
        </div>
    </div>
</footer>
</body>
</html>
