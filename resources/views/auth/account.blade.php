@extends('layouts.academy')

@section('title', __('academy.auth.account_title').' | '.config('app.name'))

@section('content')
<div class="vla-card" style="margin-bottom:22px">
    <div class="vla-badge-row" style="justify-content:space-between;margin-bottom:14px">
        <div>
            <h1 style="margin:0 0 6px">{{ __('academy.auth.account_title') }}</h1>
            <span class="vla-role-pill {{ $user->isOwner() ? 'vla-role-pill--owner' : 'vla-role-pill--user' }}">{{ strtoupper($user->isOwner() ? __('academy.common.role_owner') : __('academy.common.role_user')) }}</span>
        </div>
        <div class="vla-btn-group">
            <a href="/certificate" class="vla-btn vla-btn--accent vla-btn--sm">{{ __('academy.dashboard.print_cert') }}</a>
            @if ($user->isOwner())
                <a href="/owner" class="vla-btn vla-btn--primary vla-btn--sm">{{ __('academy.nav.owner_panel') }}</a>
            @endif
        </div>
    </div>

    <p><strong>{{ __('academy.auth.name') }}:</strong> {{ $user->name }}</p>
    <p><strong>{{ __('academy.auth.email') }}:</strong> {{ $user->email }}</p>
    <p><strong>{{ __('academy.auth.total_labs_solved') }}:</strong> {{ $solvedSessions->count() }} / {{ $totalLabs }} ({{ $summary['points'] }} {{ __('academy.common.pts') }})</p>

    <form method="POST" action="/users/logout" style="margin-top:14px">
        @csrf
        <button type="submit" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.nav.logout') }}</button>
    </form>
</div>

@include('partials.widget', ['id' => 'academy-accountstatus', 'largeView' => true])

<div class="vla-section-head">
    <h2>{{ __('academy.auth.solved_labs_heading') }}</h2>
</div>
@if ($solvedSessions->isEmpty())
    <div class="vla-card"><p class="vla-muted">{{ __('academy.dashboard.no_solves') }}</p></div>
@else
    @foreach ($solvedSessions as $session)
        @if ($session->lab)
            @include('partials.widgets.lab-status-card', ['lab' => $session->lab, 'isSolved' => true])
        @endif
    @endforeach
@endif
@endsection
