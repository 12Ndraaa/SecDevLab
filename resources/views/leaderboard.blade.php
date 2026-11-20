@extends('layouts.academy')

@section('title', __('academy.leaderboard.title').' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <div>
        <h1 style="margin-bottom:6px">{{ __('academy.leaderboard.title') }}</h1>
        <p class="vla-muted" style="margin:0">{{ __('academy.leaderboard.subtitle') }}</p>
    </div>
    <a href="/web-security/all-labs" class="vla-btn vla-btn--primary">{{ __('academy.nav.all_labs') }}</a>
</div>

@if ($currentUserEntry)
    <div class="vla-card" style="margin-bottom:20px;border-color:var(--vla-accent)">
        <div class="vla-badge-row" style="justify-content:space-between">
            <div>
                <span class="vla-badge vla-badge--accent">{{ __('academy.leaderboard.your_position') }}</span>
                <strong style="margin-left:10px">#{{ $currentUserEntry['rank'] }} &mdash; {{ $currentUserEntry['name'] }}</strong>
            </div>
            <div class="vla-badge-row">
                <span class="vla-badge vla-badge--solved">{{ $currentUserEntry['solved_total'] }} Solved</span>
                <span class="vla-badge vla-badge--orange">{{ $currentUserEntry['points'] }} pts</span>
            </div>
        </div>
    </div>
@endif

<form method="GET" action="/web-security/hall-of-fame" class="vla-filter-card">
    <div class="vla-filter-row">
        <input type="search" name="search" value="{{ $search }}" placeholder="{{ __('academy.leaderboard.search_placeholder') }}">
        <select name="category">
            <option value="ALL">{{ __('academy.cve.all_categories') }}</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @selected($categoryId === $cat->id)>{{ $cat->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="vla-btn vla-btn--primary vla-btn--sm">{{ __('academy.labs.filter') }}</button>
        @if ($search !== '' || $categoryId !== 'ALL')
            <a href="/web-security/hall-of-fame" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.labs.reset') }}</a>
        @endif
    </div>
</form>

<div class="vla-table-wrap">
    <table class="vla-table">
        <thead>
            <tr>
                <th>{{ __('academy.leaderboard.rank') }}</th>
                <th>{{ __('academy.leaderboard.learner') }}</th>
                <th>{{ __('academy.leaderboard.role') }}</th>
                <th>{{ __('academy.leaderboard.solved_total') }}</th>
                <th>{{ __('academy.leaderboard.breakdown') }}</th>
                <th>{{ __('academy.leaderboard.points') }}</th>
                <th>{{ __('academy.leaderboard.last_solve') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($leaders as $row)
                <tr class="{{ Auth::id() === $row['user_id'] ? 'is-highlight' : '' }}">
                    <td><strong>#{{ $row['rank'] }}</strong></td>
                    <td><strong>{{ $row['name'] }}</strong></td>
                    <td><span class="vla-badge {{ $row['role'] === 'owner' ? 'vla-badge--orange' : 'vla-badge--muted' }}">{{ strtoupper($row['role']) }}</span></td>
                    <td><strong>{{ $row['solved_total'] }}</strong></td>
                    <td>
                        <span class="label-light-green-small">A: {{ $row['apprentice'] }}</span>
                        <span class="label-light-blue-small">P: {{ $row['practitioner'] }}</span>
                        <span class="label-purple-small">E: {{ $row['expert'] }}</span>
                    </td>
                    <td><span class="vla-badge vla-badge--accent">{{ $row['points'] }} pts</span></td>
                    <td class="vla-muted-sm">{{ $row['last_solved_at'] ? $row['last_solved_at']->format('d M Y H:i') : '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="7">{{ __('academy.leaderboard.empty') }}</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
