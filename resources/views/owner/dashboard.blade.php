@extends('layouts.academy')

@section('title', __('academy.owner.title').' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <div>
        <h1 style="margin-bottom:6px">{{ __('academy.owner.title') }}</h1>
        <p class="vla-muted" style="margin:0">{{ __('academy.owner.subtitle') }}</p>
    </div>
    <a href="/owner/cves/create" class="vla-btn vla-btn--primary">{{ __('academy.owner.create_cve') }}</a>
</div>

@include('owner._nav')

<div class="vla-grid vla-grid--4" style="margin-bottom:24px">
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">{{ $stats['cves_total'] }}</div>
        <div class="vla-stat-box__label">CVE Articles ({{ $stats['cves_published'] }} Pub / {{ $stats['cves_draft'] }} Draft)</div>
    </div>
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">{{ $stats['categories'] }}</div>
        <div class="vla-stat-box__label">Lab Categories</div>
    </div>
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">{{ $stats['labs'] }}</div>
        <div class="vla-stat-box__label">Interactive Labs</div>
    </div>
    <div class="vla-stat-box">
        <div class="vla-stat-box__num">{{ $stats['users'] }}</div>
        <div class="vla-stat-box__label">Users ({{ $stats['total_solves'] }} Lab Solves)</div>
    </div>
</div>

<div class="vla-card" style="margin-bottom:24px">
    <h3>{{ __('academy.owner.sync_title') }}</h3>
    <p class="vla-muted-sm">{{ __('academy.owner.sync_desc') }}</p>
    <p class="vla-muted-sm">
        Local Repo Path: <code>{{ $repoPath }}</code> &bull;
        Clone Status: <strong>{{ $repoCloned ? 'Ready (.git found)' : 'Not cloned yet' }}</strong> &bull;
        <code>hot_cves.csv</code>: <strong>{{ $hasHotCsv ? 'Detected' : 'Missing' }}</strong>
    </p>
    <p class="vla-muted-sm">CLI Command: <code>php artisan cve:sync-trickest --years=2024,2025,2026 --limit=300</code></p>
    <a href="/owner/cves#trickest-sync" class="vla-btn vla-btn--outline vla-btn--sm">Open Importer Controls</a>
</div>

<div class="vla-grid vla-grid--2">
    <div class="vla-card">
        <h3>Latest CVE Articles</h3>
        <ul style="padding-left:18px;margin:0">
            @foreach ($recentCves as $cve)
                <li style="margin-bottom:8px">
                    <span class="vla-badge {{ $cve->severityBadgeClass() }}">{{ $cve->cve_id }}</span>
                    <a href="/owner/cves/{{ $cve->id }}/edit">{{ \Illuminate\Support\Str::limit($cve->title, 60) }}</a>
                    <span class="vla-badge vla-badge--muted">{{ strtoupper($cve->status) }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="vla-card">
        <h3>Recent Learner Activity</h3>
        @if ($recentSolves->isEmpty())
            <p class="vla-muted-sm">No completed labs recorded yet.</p>
        @else
            <ul style="padding-left:18px;margin:0">
                @foreach ($recentSolves as $s)
                    <li style="margin-bottom:8px">
                        <strong>{{ $s->user?->name ?? 'User' }}</strong> solved
                        <a href="{{ $s->lab?->href ?? '#' }}">{{ $s->lab?->title ?? $s->lab_id }}</a>
                        <span class="vla-muted-sm">({{ $s->solved_at?->format('d M H:i') }})</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
