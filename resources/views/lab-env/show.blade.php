<!DOCTYPE html>
<html lang="{{ $labUiLocale ?? app()->getLocale() }}" data-theme="{{ $labUiTheme }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/content/fonts/fonts.css?v={{ @filemtime(public_path('content/fonts/fonts.css')) ?: '1' }}" rel="stylesheet">
    <link href="/content/lab-workbench.css?v={{ @filemtime(public_path('content/lab-workbench.css')) ?: '2' }}" rel="stylesheet">
    <title>{{ $isMystery && !$revealMystery ? __('academy.workbench.mystery_title') : $lab->localizedTitle($labUiLocale ?? app()->getLocale()) }} | {{ config('app.name') ?: 'SecDevLab' }}</title>
</head>
<body class="lw-archetype--{{ $archetype }}">
@php
    $activeLabLocale = $labUiLocale ?? app()->getLocale();
    $brandName = config('app.name') ?: 'SecDevLab';
    $localizedLabTitle = $lab->localizedTitle($activeLabLocale);
    $localizedCategoryTitle = $lab->category?->localizedTitle($activeLabLocale);
@endphp
<div id="academyLabHeader"
     class="sdl-command-header"
     data-lab-id="{{ strtolower($lab->id) }}"
     data-archetype="{{ $archetype }}"
     data-instance-token="{{ $session->instance_token }}"
     data-auto-solved="{{ $autoSolved ? 'true' : 'false' }}">

    <section id="notification-labsolved" class="{{ $autoSolved ? 'notification-labsolved' : 'notification-labsolved-hidden' }}">
        <div class="sdl-solved-inner">
            <h4>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
                <span>{{ __('academy.workbench.congrats_title') }}</span>
            </h4>
            <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
                <span>{{ __('academy.workbench.progress_saved', ['brand' => $brandName]) }}</span>
                <a class="lw-btn" href="{{ $lab->href }}">{{ __('academy.workbench.continue_learning') }} &rarr;</a>
            </div>
        </div>
    </section>

    <section class="sdl-command-bar">
        <div class="sdl-command-bar__top">
            <a class="sdl-command-brand" href="/">
                <span class="sdl-command-brand__badge" aria-hidden="true">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="M9 12l2 2 4-4"/>
                    </svg>
                </span>
                <span>{{ $brandName }}</span>
            </a>

            <div class="sdl-command-title">
                <h2 id="banner-lab-title">{{ $isMystery && !$revealMystery ? __('academy.workbench.mystery_title') : $localizedLabTitle }}</h2>
            </div>

            <div class="sdl-action-group">
                <span class="lw-pill lw-pill--{{ $archetypeMeta['tone'] }}">{{ $archetypeMeta['short'] }}</span>
                @if ($lab->category)
                    <a class="lw-pill" href="{{ $lab->category->topic_route }}">{{ $localizedCategoryTitle }}</a>
                @endif
                <div class="widgetcontainer-lab-status {{ $autoSolved ? 'is-solved' : 'is-notsolved' }}" id="env-status-widget">
                    <span>{{ __('academy.workbench.status_lab') }}</span>
                    <p id="env-status-text">{{ $autoSolved ? __('academy.workbench.status_solved') : __('academy.workbench.status_not_solved') }}</p>
                </div>
                @if ($academySolved && !$autoSolved)
                    <span class="lw-pill lw-pill--emerald">{{ __('academy.workbench.academy_solved_pill') }}</span>
                @endif
            </div>
        </div>

        <div class="sdl-command-meta">
            <div class="sdl-telemetry-group">
                <details class="ps-inline-details">
                    <summary class="lw-token-chip" title="{{ __('academy.workbench.token_summary_title') }}">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        <span>{{ __('academy.labs.token_label') }} {{ substr((string) $session->instance_token, 0, 12) }}&hellip;</span>
                    </summary>
                    <div class="ps-inline-details__panel ps-inline-details__panel--left">
                        <div style="font-weight:700;margin-bottom:6px;color:var(--lw-heading)">{{ __('academy.workbench.token_popover_title') }}</div>
                        <div class="lw-mono" style="font-size:0.78rem;word-break:break-all;margin-bottom:8px">{{ $session->instance_token }}</div>
                        <div style="font-weight:700;margin-bottom:4px;color:var(--lw-heading)">{{ __('academy.workbench.target_url_popover') }}</div>
                        <div class="lw-mono" style="font-size:0.78rem;word-break:break-all">{{ $baseUrl }}</div>
                    </div>
                </details>

                <span class="lw-token-chip">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span>{{ __('academy.labs.ttl_label') }} {{ $session->remainingLabel($activeLabLocale) }}</span>
                </span>

                <span class="lw-pill">{{ __('academy.workbench.mode_isolated', ['mode' => strtoupper($urlMode)]) }}</span>
            </div>

            <div class="sdl-action-group">
                @if ($isMystery && !$revealMystery)
                    <a class="lw-btn lw-btn--primary" href="{{ $basePath !== '' ? $basePath : '/' }}?mystery=1&amp;reveal=1">{{ __('academy.workbench.reveal_objective') }}</a>
                @endif

                @if (!empty($profile['hasSubmitSolution']) || !empty($profile['requiresSubmitAfterExfil']))
                    <details class="ps-inline-details">
                        <summary id="submitSolution" class="lw-btn lw-btn--primary">{{ __('academy.workbench.submit_solution') }}</summary>
                        <div id="submit-solution-modal" class="ps-inline-details__panel">
                            <form method="POST" action="{{ $basePath }}/submit-solution" class="lw-form">
                                <label for="solution-answer-input">{{ __('academy.workbench.submit_prompt') }}</label>
                                <div style="display:flex;gap:8px;flex-wrap:wrap;align-items:center;margin-top:8px">
                                    <input type="text" name="answer" id="solution-answer-input" placeholder="{{ __('academy.workbench.submit_placeholder') }}" style="flex:1 1 180px;min-width:0;margin:0" required>
                                    <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.submit_btn') }}</button>
                                </div>
                            </form>
                        </div>
                    </details>
                @endif

                @if (!empty($profile['hasExploitServer']))
                    <a id="exploit-link" class="lw-btn lw-btn--accent" href="{{ $basePath }}/exploit-server">{{ __('academy.workbench.go_exploit_server') }}</a>
                @endif

                @if (!empty($profile['hasEmailClient']))
                    <a id="email-link" class="lw-btn lw-btn--accent" href="{{ $basePath }}/email">{{ __('academy.workbench.email_client') }}</a>
                @endif

                <a class="lw-btn" href="/academy/labs/session/{{ $session->instance_token }}/control">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
                    <span>{{ __('academy.workbench.reset_renew') }}</span>
                </a>

                <form method="POST" action="{{ $basePath }}/_locale" style="display:inline;margin:0">
                    <div class="lw-pill-switch" role="group" aria-label="{{ __('academy.workbench.switch_language') }}">
                        <button type="submit" name="ui_locale" value="en" class="{{ $activeLabLocale === 'en' ? 'is-active' : '' }}">EN</button>
                        <button type="submit" name="ui_locale" value="id" class="{{ $activeLabLocale === 'id' ? 'is-active' : '' }}">ID</button>
                    </div>
                </form>

                <form method="POST" action="{{ $basePath }}/_theme" style="display:inline;margin:0">
                    <button type="submit" class="lw-btn" title="{{ __('academy.workbench.switch_theme') }}">
                        @if ($labUiTheme === 'dark')
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/></svg>
                            <span>{{ __('academy.workbench.theme_light') }}</span>
                        @else
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                            <span>{{ __('academy.workbench.theme_dark') }}</span>
                        @endif
                    </button>
                </form>

                <a class="lw-btn" href="{{ $lab->href }}">{{ __('academy.workbench.back_desc') }} &rarr;</a>
            </div>
        </div>
    </section>
</div>

<main class="lw-shell">
    <nav class="lw-subnav" aria-label="{{ __('academy.workbench.nav_aria') }}">
        <div class="lw-subnav__links">
            <a href="{{ $basePath !== '' ? $basePath : '/' }}" class="{{ $activeView === $defaultLandingView ? 'is-active' : '' }}">{{ __('academy.workbench.nav_home') }}</a>
            @if ($archetype === 'storefront' || !empty($profile['hasCategoryFilter']))
                <a href="{{ $basePath }}/shop" class="{{ $activeView === 'shop' ? 'is-active' : '' }}">{{ __('academy.workbench.nav_storefront') }}</a>
            @endif
            @if (!empty($profile['hasLiveChat']))
                <a href="{{ $basePath }}/chat" class="{{ $activeView === 'chat' ? 'is-active' : '' }}">{{ __('academy.workbench.nav_live_chat') }}</a>
            @endif
            @if (!empty($profile['hasAdminPanel']) && ($validLoginTriggered || str_contains($cookieHeader, 'Admin=true')))
                <a href="{{ $basePath }}/admin" class="{{ $activeView === 'admin' ? 'is-active' : '' }}">{{ __('academy.workbench.nav_admin_panel') }}</a>
            @endif
            @if (!empty($profile['hasMyAccount']))
                <a href="{{ $basePath }}/my-account" class="{{ in_array($activeView, ['my-account', 'login', 'account', 'media-portal'], true) ? 'is-active' : '' }}">{{ __('academy.workbench.nav_my_account') }}</a>
            @endif
            @if (!empty($profile['hasCart']))
                <a href="{{ $basePath }}/cart" class="{{ $activeView === 'cart' ? 'is-active' : '' }}">{{ __('academy.workbench.nav_my_cart') }}</a>
            @endif
            @if ($lab->category_id === 'graphql-api-vulnerabilities')
                <a href="{{ $basePath }}/graphql" class="{{ $activeView === 'graphql' ? 'is-active' : '' }}">{{ __('academy.workbench.nav_graphql') }}</a>
            @elseif ($lab->category_id === 'api-testing')
                <a href="{{ $basePath }}/api" class="{{ $activeView === 'api-explorer' ? 'is-active' : '' }}">{{ __('academy.workbench.nav_api') }}</a>
            @endif
        </div>
        <div class="lw-muted lw-mono" style="font-size:0.78rem">
            {{ $archetypeMeta['prompt'] }}
        </div>
    </nav>

    @if (!empty($submitSolutionError))
        <div class="lw-alert lw-alert--error">{{ $submitSolutionError }}</div>
    @endif

    @if ($exfiltrated && !$autoSolved && !empty($profile['requiresMultiStep']))
        <div class="lw-alert lw-alert--warning">
            {{ __('academy.workbench.step1_banner', ['next' => !empty($profile['requiresLoginAfterExfil']) ? __('academy.workbench.step1_next_login') : __('academy.workbench.step1_next_submit')]) }}
        </div>
    @endif

    @if ($activeView === 'admin')
        <div class="lw-workbench-banner">
            <div>
                <span class="lw-pill lw-pill--danger">{{ __('academy.workbench.admin_pill') }}</span>
                <h2 style="margin:6px 0 2px;color:var(--lw-heading)">{{ __('academy.workbench.admin_title') }}</h2>
                <p class="lw-muted" style="margin:0">{{ __('academy.workbench.admin_sub') }}</p>
            </div>
        </div>
        <div class="lw-card">
            @if ($adminDeleteCarlos)
                <div class="lw-alert lw-alert--success">{{ __('academy.workbench.user_deleted_msg', ['user' => 'carlos']) }}</div>
            @else
                <div class="lw-table-wrap">
                    <table class="lw-table">
                        <thead><tr><th>{{ __('academy.workbench.col_username') }}</th><th>{{ __('academy.workbench.col_action') }}</th></tr></thead>
                        <tbody>
                            <tr>
                                <td><strong>carlos</strong></td>
                                <td><a class="lw-btn lw-btn--primary" href="{{ $basePath }}/admin/delete?username=carlos">{{ __('academy.workbench.delete_btn') }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>wiener</strong></td>
                                <td><a class="lw-btn" href="{{ $basePath }}/admin/delete?username=wiener">{{ __('academy.workbench.delete_btn') }}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    @elseif ($activeView === 'email')
        <div class="lw-workbench-banner">
            <div>
                <span class="lw-pill lw-pill--info">{{ __('academy.workbench.email_pill') }}</span>
                <h2 style="margin:6px 0 2px;color:var(--lw-heading)">{{ __('academy.workbench.email_title') }}</h2>
                <p class="lw-muted" style="margin:0">{{ __('academy.workbench.email_sub') }}</p>
            </div>
        </div>
        <div class="lw-card">
            <div class="lw-table-wrap">
                <table class="lw-table">
                    <thead><tr><th>{{ __('academy.workbench.col_from') }}</th><th>{{ __('academy.workbench.col_subject') }}</th><th>{{ __('academy.workbench.col_body') }}</th></tr></thead>
                    <tbody>
                        <tr>
                            <td class="lw-mono">no-reply@secdevlab.local</td>
                            <td>{{ __('academy.workbench.email_subject') }}</td>
                            <td>
                                <a class="lw-mono" href="{{ $basePath }}/my-account?temp-forgot-password-token={{ $forgotToken }}">
                                    {{ $baseUrl }}/my-account?temp-forgot-password-token={{ $forgotToken }}
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    @elseif ($activeView === 'exploit-server')
        <div class="lw-workbench-banner">
            <div>
                <span class="lw-pill lw-pill--orange">{{ __('academy.workbench.exploit_pill') }}</span>
                <h2 style="margin:6px 0 2px;color:var(--lw-heading)">{{ __('academy.workbench.exploit_title') }}</h2>
                <p class="lw-muted" style="margin:0">{{ __('academy.workbench.exploit_sub') }}</p>
            </div>
        </div>

        @if ($exploitError !== '')
            <div class="lw-alert lw-alert--error">{{ $exploitError }}</div>
        @endif
        @if ($exploitFeedback !== '')
            <div class="lw-alert lw-alert--success">{{ $exploitFeedback }}</div>
        @endif

        <div class="lw-grid lw-grid--split">
            <div class="lw-card">
                <form method="POST" action="{{ $basePath }}/exploit-server" class="lw-form">
                    <label for="exp-path">{{ __('academy.workbench.file_label') }}</label>
                    <input type="text" id="exp-path" name="responseFile" value="{{ $exploitState['responseFile'] ?? '/exploit' }}" class="lw-mono">
                    <label for="exp-head">{{ __('academy.workbench.head_label') }}</label>
                    <textarea id="exp-head" name="responseHead" rows="3" class="lw-mono">{{ $exploitState['responseHead'] ?? "HTTP/1.1 200 OK\nContent-Type: text/html; charset=utf-8" }}</textarea>
                    <label for="exp-body">{{ __('academy.workbench.body_label') }}</label>
                    <textarea id="exp-body" name="responseBody" rows="7" class="lw-mono" placeholder="{{ __('academy.workbench.exploit_placeholder') }}">{{ $exploitState['responseBody'] ?? '' }}</textarea>
                    <div style="margin-top:14px;display:flex;gap:10px;flex-wrap:wrap">
                        <button type="submit" name="formAction" value="STORE" class="lw-btn">{{ __('academy.workbench.store_btn') }}</button>
                        <button type="submit" name="formAction" value="DELIVER_TO_VICTIM" class="lw-btn lw-btn--primary">{{ __('academy.workbench.deliver_btn') }}</button>
                        <button type="submit" name="formAction" value="ACCESS_LOG" class="lw-btn">{{ __('academy.workbench.access_log_btn') }}</button>
                    </div>
                </form>
            </div>

            <div class="lw-terminal">
                <div class="lw-terminal__bar">
                    <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
                    <span>EXPLOIT_SERVER_ACCESS_LOG</span>
                </div>
                <div class="lw-terminal__body">{{ !empty($exploitState['accessLog']) ? implode("\n", $exploitState['accessLog']) : __('academy.workbench.access_log_empty') }}</div>
            </div>
        </div>

    @elseif ($activeView === 'chat')
        @include('lab-env.partials.ai-websocket')

    @elseif ($activeView === 'cart' || $activeView === 'shop')
        @include('lab-env.partials.storefront')

    @elseif ($activeView === 'product' || $activeView === 'file-viewer')
        @include('lab-env.partials.diagnostic')

    @elseif (in_array($activeView, ['media-portal', 'upload-result'], true))
        @include('lab-env.partials.media-upload')

    @elseif (in_array($activeView, ['graphql', 'api-explorer'], true))
        @include('lab-env.partials.api-graphql')

    @elseif (in_array($activeView, ['jwt-workbench', 'oauth-workbench'], true))
        @include('lab-env.partials.identity')

    @elseif (in_array($activeView, ['my-account', 'login', 'account'], true))
        @if ($archetype === 'media-upload')
            @include('lab-env.partials.media-upload')
        @else
            @include('lab-env.partials.identity')
        @endif

    @elseif (in_array($activeView, ['blog', 'post', 'dom-workbench', 'clickjacking-workbench', 'ssti-workbench', 'prototype-workbench'], true))
        @include('lab-env.partials.editorial')

    @elseif ($activeView === 'http-inspector')
        @include('lab-env.partials.http-inspector')

    @else
        @include('lab-env.partials.' . $archetype)
    @endif
</main>
</body>
</html>
