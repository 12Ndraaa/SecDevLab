@extends('layouts.academy')

@section('title', (config('app.name') ?: 'SecDevLab').' - '.__('academy.home.meta_title'))

@section('content')
<section class="vla-hero">
    <div class="vla-hero-grid">
        <div>
            <h1 style="margin-top:0">{{ __('academy.home.hero_title') }}</h1>
            <p>{{ __('academy.home.hero_sub') }}</p>
            <div class="vla-btn-group">
                <a href="/web-security/all-labs" class="vla-btn vla-btn--primary">
                    <span class="vla-icon" aria-hidden="true">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 3h6M10 3v5l-5.5 9.5A2 2 0 0 0 6.2 20.5h11.6a2 2 0 0 0 1.7-3L14 8V3"/></svg>
                    </span>
                    <span>{{ __('academy.home.cta_labs') }}</span>
                </a>
                <a href="/cve" class="vla-btn vla-btn--outline">
                    <span class="vla-icon" aria-hidden="true">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </span>
                    <span>{{ __('academy.home.cta_cve') }}</span>
                </a>
                <a href="/web-security/mystery-lab-challenge" class="vla-btn vla-btn--ghost">{{ __('academy.home.cta_mystery') }} &rarr;</a>
            </div>
        </div>

        <div class="vla-terminal-card" aria-label="{{ __('academy.home.spec_label') }}">
            <div class="vla-terminal-card__bar">
                <span class="vla-terminal-dots"><span></span><span></span><span></span></span>
                <span>{{ __('academy.home.spec_header') }}</span>
            </div>
            <div class="vla-terminal-card__body">
                <div><span class="vla-term-prompt">$</span> <span class="vla-term-cmd">{{ __('academy.home.spec_cmd') }}</span></div>
                <div class="vla-term-ok">+ {{ __('academy.home.spec_capability') }}</div>
                <div>+ {{ __('academy.home.spec_cookie') }}</div>
                <div>+ {{ __('academy.home.spec_csp') }}</div>
                <div>+ {{ __('academy.home.spec_archetypes') }}</div>
                <div>+ {{ __('academy.home.spec_catalog', ['labs' => $labsCount, 'categories' => $categoriesCount]) }}</div>
            </div>
        </div>
    </div>
</section>

<div class="vla-grid vla-grid--4">
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">{{ $categoriesCount }}</div>
        <div class="vla-stat-box__label">{{ __('academy.home.stat_categories') }}</div>
    </div>
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">{{ $labsCount }}</div>
        <div class="vla-stat-box__label">{{ __('academy.home.stat_labs') }}</div>
    </div>
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">{{ $cvesCount }}</div>
        <div class="vla-stat-box__label">{{ __('academy.home.stat_cves') }}</div>
    </div>
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">{{ $learnersCount }}</div>
        <div class="vla-stat-box__label">{{ __('academy.home.stat_learners') }}</div>
    </div>
</div>

<div class="vla-section-head">
    <h2>{{ __('academy.home.featured_topics') }}</h2>
    <a href="/web-security/all-topics" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.home.view_all_topics') }}</a>
</div>
<div class="vla-grid vla-grid--3">
    @foreach ($featuredCategories as $cat)
        <div class="vla-card vla-card--compact vla-card-hover">
            <div class="vla-badge-row" style="justify-content:space-between;margin-bottom:10px">
                <span class="vla-badge vla-badge--accent">{{ $cat->labs_count }} {{ __('academy.common.labs') }}</span>
                <a href="/web-security/all-labs#{{ $cat->id }}" class="vla-muted-sm">{{ __('academy.common.catalog') }} &rarr;</a>
            </div>
            <h3 style="margin-bottom:12px;font-size:1.05rem"><a href="{{ $cat->topic_route }}">{{ $cat->title }}</a></h3>
            <div class="vla-btn-group">
                <a href="{{ $cat->topic_route }}" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.nav.topics') }}</a>
                <a href="/cve?category={{ $cat->id }}" class="vla-btn vla-btn--ghost vla-btn--sm">CVE</a>
            </div>
        </div>
    @endforeach
</div>

<div class="vla-section-head">
    <h2>{{ __('academy.home.hot_cves') }}</h2>
    <a href="/cve" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.home.view_all_cves') }}</a>
</div>
<div class="vla-grid vla-grid--2">
    @forelse ($hotCves as $cve)
        <article class="vla-card vla-card--compact vla-card-hover">
            <div class="vla-badge-row" style="margin-bottom:10px">
                <span class="vla-badge {{ $cve->severityBadgeClass() }}">{{ $cve->severity }} {{ $cve->cvss_score ? '('.number_format($cve->cvss_score, 1).')' : '' }}</span>
                @if ($cve->is_hot)
                    <span class="vla-badge vla-badge--orange">{{ __('academy.cve.hot_badge') }}</span>
                @endif
                <span class="vla-mono-chip">{{ $cve->cve_id }}</span>
            </div>
            <h3 style="margin-bottom:8px;font-size:1.05rem"><a href="/cve/{{ $cve->slug }}">{{ $cve->title }}</a></h3>
            <p class="vla-muted-sm" style="margin:0 0 14px">{{ \Illuminate\Support\Str::limit($cve->summary, 140) }}</p>
            <div class="vla-badge-row" style="justify-content:space-between">
                @if ($cve->category)
                    <a href="/web-security/all-labs#{{ $cve->category->id }}" class="vla-badge vla-badge--accent">{{ $cve->category->title }}</a>
                @else
                    <span class="vla-muted-sm">{{ __('academy.cve.uncategorized') }}</span>
                @endif
                <a href="/cve/{{ $cve->slug }}" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.cve.read_article') }} &rarr;</a>
            </div>
        </article>
    @empty
        <div class="vla-card"><p class="vla-muted">{{ __('academy.cve.empty') }}</p></div>
    @endforelse
</div>

<div class="vla-section-head">
    <h2>{{ __('academy.home.how_it_works') }}</h2>
</div>
<div class="vla-grid vla-grid--4">
    <div class="vla-card vla-card--compact">
        <span class="vla-step-num">01</span>
        <h4 style="margin-bottom:6px">{{ preg_replace('/^\d+\.\s*/', '', __('academy.home.step1_title')) }}</h4>
        <p class="vla-muted-sm" style="margin:0">{{ __('academy.home.step1_desc') }}</p>
    </div>
    <div class="vla-card vla-card--compact">
        <span class="vla-step-num">02</span>
        <h4 style="margin-bottom:6px">{{ preg_replace('/^\d+\.\s*/', '', __('academy.home.step2_title')) }}</h4>
        <p class="vla-muted-sm" style="margin:0">{{ __('academy.home.step2_desc') }}</p>
    </div>
    <div class="vla-card vla-card--compact">
        <span class="vla-step-num">03</span>
        <h4 style="margin-bottom:6px">{{ preg_replace('/^\d+\.\s*/', '', __('academy.home.step3_title')) }}</h4>
        <p class="vla-muted-sm" style="margin:0">{{ __('academy.home.step3_desc') }}</p>
    </div>
    <div class="vla-card vla-card--compact">
        <span class="vla-step-num">04</span>
        <h4 style="margin-bottom:6px">{{ preg_replace('/^\d+\.\s*/', '', __('academy.home.step4_title')) }}</h4>
        <p class="vla-muted-sm" style="margin:0">{{ __('academy.home.step4_desc') }}</p>
    </div>
</div>

<div class="vla-section-head">
    <h2>{{ __('academy.home.top_learners') }}</h2>
    <a href="/web-security/hall-of-fame" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.home.view_leaderboard') }}</a>
</div>
<div class="vla-table-wrap">
    <table class="vla-table">
        <thead>
            <tr>
                <th>{{ __('academy.leaderboard.rank') }}</th>
                <th>{{ __('academy.leaderboard.learner') }}</th>
                <th>{{ __('academy.leaderboard.solved_total') }}</th>
                <th>{{ __('academy.leaderboard.points') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($topLeaders as $leader)
                <tr>
                    <td class="vla-mono"><strong>#{{ $leader['rank'] }}</strong></td>
                    <td><strong>{{ $leader['name'] }}</strong></td>
                    <td class="vla-mono">{{ $leader['solved_total'] }} / {{ $labsCount }}</td>
                    <td><span class="vla-badge vla-badge--accent vla-mono">{{ $leader['points'] }} {{ __('academy.common.pts') }}</span></td>
                </tr>
            @empty
                <tr><td colspan="4" class="vla-muted">{{ __('academy.leaderboard.empty') }}</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
