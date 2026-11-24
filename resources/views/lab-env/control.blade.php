@extends('layouts.academy')

@section('title', __('academy.control.page_title').' | '.config('app.name'))

@section('content')
<ul class="breadcrumb-list">
    <li><a href="/">{{ __('academy.nav.home') }}</a></li>
    <li><a href="/web-security/all-labs">{{ __('academy.nav.all_labs') }}</a></li>
    <li><a href="{{ $lab->href }}">{{ $lab->localizedTitle() }}</a></li>
    <li>{{ __('academy.control.breadcrumb') }}</li>
</ul>

<div class="vla-card" style="margin-bottom:22px">
    <div class="vla-badge-row" style="justify-content:space-between;margin-bottom:14px">
        <div class="vla-badge-row">
            <span class="vla-badge vla-badge--orange">{{ $archetype['short'] }}</span>
            <span class="vla-badge vla-badge--accent">{{ __('academy.control.mode_label') }} {{ strtoupper($urlMode) }}</span>
            @if ($session->isExpired())
                <span class="vla-badge vla-sev--critical">{{ __('academy.control.ttl_expired') }}</span>
            @else
                <span class="vla-badge vla-badge--solved">{{ __('academy.labs.ttl_label') }} {{ $session->remainingLabel() }}</span>
            @endif
        </div>
        <span class="vla-badge {{ $session->instance_solved ? 'vla-badge--solved' : 'vla-badge--muted' }}">
            {{ $session->instance_solved ? __('academy.control.instance_solved') : __('academy.control.instance_active') }}
        </span>
    </div>

    <h1 style="margin-bottom:8px">{{ $lab->localizedTitle() }}</h1>
    <p class="vla-muted"><strong>{{ $archetype['label'] }}</strong>: {{ $archetype['description'] }}</p>

    <div class="vla-terminal-card" style="margin:18px 0">
        <div class="vla-terminal-card__bar">
            <span class="vla-terminal-dots"><span></span><span></span><span></span></span>
            <span>{{ __('academy.control.telemetry_header') }}</span>
        </div>
        <div class="vla-terminal-card__body">
            <div><strong>{{ __('academy.control.instance_token') }}</strong> <code>{{ $session->instance_token }}</code></div>
            <div><strong>{{ __('academy.control.target_base_url') }}</strong> <code>{{ $absoluteUrl }}</code></div>
            <div><strong>{{ __('academy.control.expires_at') }}</strong> <code>{{ $session->expires_at?->format('Y-m-d H:i:s') ?? __('academy.common.na') }}</code></div>
            <div><strong>{{ __('academy.control.cookie_isolation') }}</strong> <code>{{ $urlMode === 'subdomain' ? 'Subdomain Origin + Path=/' : 'Path=/lab/'.$session->instance_token }}</code></div>
            <div><strong>{{ __('academy.control.academy_status') }}</strong> <code>{{ $session->solved ? __('academy.control.status_completed') : __('academy.control.status_in_progress') }}</code></div>
        </div>
    </div>

    <div class="vla-btn-group">
        <a href="{{ $instanceUrl }}" class="vla-btn vla-btn--primary">{{ __('academy.control.open_target') }}</a>

        <form method="POST" action="/academy/labs/session/{{ $session->instance_token }}/reset" class="vla-inline-form">
            @csrf
            <button type="submit" class="vla-btn vla-btn--danger">{{ __('academy.control.reset_btn') }}</button>
        </form>

        <form method="POST" action="/academy/labs/session/{{ $session->instance_token }}/renew" class="vla-inline-form">
            @csrf
            <button type="submit" class="vla-btn vla-btn--accent">{{ __('academy.control.renew_btn', ['minutes' => \App\Models\LabSession::ttlMinutes()]) }}</button>
        </form>

        <a href="{{ $lab->href }}" class="vla-btn vla-btn--outline">{{ __('academy.control.back_desc') }}</a>
    </div>
</div>
@endsection
