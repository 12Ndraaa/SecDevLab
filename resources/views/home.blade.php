@extends('layouts.academy')

@section('title', (config('app.name') ?: 'SecDevLab').' — Cyber Security Academy & CVE Practice Lab')

@section('content')
<section class="vla-hero">
    <span class="vla-badge vla-badge--accent">{{ __('academy.home.badge') }}</span>
    <h1>{{ __('academy.home.hero_title') }}</h1>
    <p>{{ __('academy.home.hero_sub') }}</p>
    <div class="vla-btn-group">
        <a href="/web-security/all-labs" class="vla-btn vla-btn--primary">{{ __('academy.home.cta_labs') }}</a>
        <a href="/cve" class="vla-btn vla-btn--accent">{{ __('academy.home.cta_cve') }}</a>
        <a href="/web-security/mystery-lab-challenge" class="vla-btn vla-btn--outline">{{ __('academy.home.cta_mystery') }}</a>
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
        <div class="vla-card vla-card--compact">
            <div class="vla-badge-row" style="justify-content:space-between;margin-bottom:8px">
                <span class="vla-badge vla-badge--accent">{{ $cat->labs_count }} Labs</span>
                <a href="/web-security/all-labs#{{ $cat->id }}" class="vla-muted-sm">Catalog &rarr;</a>
            </div>
            <h3 style="margin-bottom:8px"><a href="{{ $cat->topic_route }}">{{ $cat->title }}</a></h3>
            <div class="vla-btn-group">
                <a href="{{ $cat->topic_route }}" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.nav.topics') }}</a>
                <a href="/cve?category={{ $cat->id }}" class="vla-btn vla-btn--outline vla-btn--sm">CVE</a>
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
        <article class="vla-card vla-card--compact">
            <div class="vla-badge-row" style="margin-bottom:10px">
                <span class="vla-badge {{ $cve->severityBadgeClass() }}">{{ $cve->severity }} {{ $cve->cvss_score ? '('.number_format($cve->cvss_score, 1).')' : '' }}</span>
                @if ($cve->is_hot)
                    <span class="vla-badge vla-badge--orange">{{ __('academy.cve.hot_badge') }}</span>
                @endif
                <span class="vla-badge vla-badge--muted">{{ $cve->cve_id }}</span>
            </div>
            <h3 style="margin-bottom:8px"><a href="/cve/{{ $cve->slug }}">{{ $cve->title }}</a></h3>
            <p class="vla-muted-sm" style="margin:0 0 12px">{{ \Illuminate\Support\Str::limit($cve->summary, 140) }}</p>
            <div class="vla-badge-row" style="justify-content:space-between">
                @if ($cve->category)
                    <a href="/web-security/all-labs#{{ $cve->category->id }}" class="vla-badge vla-badge--accent">{{ $cve->category->title }}</a>
                @else
                    <span class="vla-muted-sm">{{ __('academy.cve.uncategorized') }}</span>
                @endif
                <a href="/cve/{{ $cve->slug }}" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.cve.read_article') }}</a>
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
        <h4>{{ __('academy.home.step1_title') }}</h4>
        <p class="vla-muted-sm">{{ __('academy.home.step1_desc') }}</p>
    </div>
    <div class="vla-card vla-card--compact">
        <h4>{{ __('academy.home.step2_title') }}</h4>
        <p class="vla-muted-sm">{{ __('academy.home.step2_desc') }}</p>
    </div>
    <div class="vla-card vla-card--compact">
        <h4>{{ __('academy.home.step3_title') }}</h4>
        <p class="vla-muted-sm">{{ __('academy.home.step3_desc') }}</p>
    </div>
    <div class="vla-card vla-card--compact">
        <h4>{{ __('academy.home.step4_title') }}</h4>
        <p class="vla-muted-sm">{{ __('academy.home.step4_desc') }}</p>
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
            @foreach ($topLeaders as $leader)
                <tr>
                    <td><strong>#{{ $leader['rank'] }}</strong></td>
                    <td>{{ $leader['name'] }}</td>
                    <td>{{ $leader['solved_total'] }} / {{ $labsCount }}</td>
                    <td><span class="vla-badge vla-badge--accent">{{ $leader['points'] }} pts</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
