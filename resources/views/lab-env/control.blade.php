@extends('layouts.academy')

@section('title', 'Lab Instance Control | '.config('app.name'))

@section('content')
<ul class="breadcrumb-list">
    <li><a href="/">{{ __('academy.nav.home') }}</a></li>
    <li><a href="/web-security/all-labs">{{ __('academy.nav.all_labs') }}</a></li>
    <li><a href="{{ $lab->href }}">{{ $lab->title }}</a></li>
    <li>Instance Control</li>
</ul>

<div class="vla-card" style="margin-bottom:22px">
    <div class="vla-badge-row" style="justify-content:space-between;margin-bottom:14px">
        <div class="vla-badge-row">
            <span class="vla-badge vla-badge--orange">{{ $archetype['short'] }}</span>
            <span class="vla-badge vla-badge--accent">Mode: {{ strtoupper($urlMode) }}</span>
            @if ($session->isExpired())
                <span class="vla-badge vla-sev--critical">TTL EXPIRED</span>
            @else
                <span class="vla-badge vla-badge--solved">TTL: {{ $session->remainingLabel() }}</span>
            @endif
        </div>
        <span class="vla-badge {{ $session->instance_solved ? 'vla-badge--solved' : 'vla-badge--muted' }}">
            Instance: {{ $session->instance_solved ? 'Solved' : 'Active' }}
        </span>
    </div>

    <h1 style="margin-bottom:8px">{{ $lab->title }}</h1>
    <p class="vla-muted">{{ $archetype['label'] }} &mdash; {{ $archetype['description'] }}</p>

    <div class="vla-terminal-card" style="margin:18px 0">
        <div class="vla-terminal-card__bar">
            <span class="vla-terminal-dots"><span></span><span></span><span></span></span>
            <span>CAPABILITY TOKEN TELEMETRY (BURP / CURL READY)</span>
        </div>
        <div class="vla-terminal-card__body">
            <div><strong>Instance Token:</strong> <code>{{ $session->instance_token }}</code></div>
            <div><strong>Target Base URL:</strong> <code>{{ $absoluteUrl }}</code></div>
            <div><strong>Expires At (UTC):</strong> <code>{{ $session->expires_at?->format('Y-m-d H:i:s') ?? 'N/A' }}</code></div>
            <div><strong>Cookie Isolation:</strong> <code>{{ $urlMode === 'subdomain' ? 'Subdomain Origin + Path=/' : 'Path=/lab/'.$session->instance_token }}</code></div>
            <div><strong>Academy Status:</strong> <code>{{ $session->solved ? 'COMPLETED' : 'IN PROGRESS' }}</code></div>
        </div>
    </div>

    <div class="vla-btn-group">
        <a href="{{ $instanceUrl }}" class="vla-btn vla-btn--primary">Open Lab Target</a>

        <form method="POST" action="/academy/labs/session/{{ $session->instance_token }}/reset" class="vla-inline-form">
            @csrf
            <button type="submit" class="vla-btn vla-btn--danger">Reset Instance (New Token &amp; Secrets)</button>
        </form>

        <form method="POST" action="/academy/labs/session/{{ $session->instance_token }}/renew" class="vla-inline-form">
            @csrf
            <button type="submit" class="vla-btn vla-btn--accent">Renew TTL (+{{ \App\Models\LabSession::ttlMinutes() }}m)</button>
        </form>

        <a href="{{ $lab->href }}" class="vla-btn vla-btn--outline">Back to Lab Description</a>
    </div>
</div>
@endsection
