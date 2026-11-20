@extends('layouts.academy')

@section('title', __('academy.dashboard.title').' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <div>
        <h1 style="margin-bottom:6px">{{ __('academy.dashboard.title') }}</h1>
        <p class="vla-muted" style="margin:0">{{ __('academy.dashboard.subtitle') }}</p>
    </div>
    <div class="vla-btn-group">
        @auth
            <a href="/certificate" class="vla-btn vla-btn--accent">{{ __('academy.dashboard.print_cert') }}</a>
        @endauth
        <a href="/web-security/all-labs" class="vla-btn vla-btn--primary">{{ __('academy.nav.all_labs') }}</a>
    </div>
</div>

@auth
<div class="vla-grid vla-grid--3" style="margin-bottom:18px">
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">{{ $points }}</div>
        <div class="vla-stat-box__label">{{ __('academy.dashboard.total_points') }}</div>
    </div>
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">#{{ $userRank ?? '-' }}</div>
        <div class="vla-stat-box__label">{{ __('academy.dashboard.current_rank') }}</div>
    </div>
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">{{ strtoupper($user->role) }}</div>
        <div class="vla-stat-box__label">{{ __('academy.auth.role') }} ({{ $user->name }})</div>
    </div>
</div>
@endauth

@include('partials.widget', ['id' => 'academy-accountstatus', 'largeView' => true])

<div class="vla-grid vla-grid--2" style="margin-top:26px">
    <div class="vla-card">
        <h3>{{ __('academy.dashboard.recent_solves') }}</h3>
        @if ($recentSolves->isEmpty())
            <p class="vla-muted-sm">{{ __('academy.dashboard.no_solves') }}</p>
        @else
            <ul style="padding-left:18px;margin:0">
                @foreach ($recentSolves as $sess)
                    @if ($sess->lab)
                        <li style="margin-bottom:10px">
                            <a href="{{ $sess->lab->href }}"><strong>{{ $sess->lab->title }}</strong></a>
                            <div class="vla-badge-row" style="margin-top:4px">
                                <span class="{{ $sess->lab->difficulty_class }}">{{ $sess->lab->difficulty }}</span>
                                <span class="vla-muted-sm">{{ $sess->solved_at?->format('d M Y H:i') }}</span>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif
    </div>

    <div class="vla-card">
        <h3>{{ __('academy.home.hot_cves') }}</h3>
        <ul style="padding-left:18px;margin:0">
            @foreach ($recentCves as $cve)
                <li style="margin-bottom:10px">
                    <span class="vla-badge {{ $cve->severityBadgeClass() }}">{{ $cve->cve_id }}</span>
                    <a href="/cve/{{ $cve->slug }}"><strong>{{ \Illuminate\Support\Str::limit($cve->title, 70) }}</strong></a>
                    @if ($cve->category)
                        <div class="vla-muted-sm">{{ $cve->category->title }}</div>
                    @endif
                </li>
            @endforeach
        </ul>
        <div style="margin-top:12px">
            <a href="/cve" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.home.view_all_cves') }}</a>
        </div>
    </div>
</div>

<div class="vla-section-head">
    <h2>{{ __('academy.dashboard.category_breakdown') }}</h2>
</div>
<div class="vla-grid vla-grid--3">
    @foreach ($categoryStats as $cs)
        <div class="vla-card vla-card--compact">
            <div class="vla-badge-row" style="justify-content:space-between">
                <a href="{{ $cs['topic_route'] }}"><strong>{{ $cs['title'] }}</strong></a>
                <span class="vla-muted-sm">{{ $cs['solved'] }} / {{ $cs['total'] }}</span>
            </div>
            <div class="dashboard-bar-track">
                <div class="dashboard-bar-fill vla-fill-total" style="width:{{ $cs['pct'] }}%"></div>
            </div>
        </div>
    @endforeach
</div>
@endsection
