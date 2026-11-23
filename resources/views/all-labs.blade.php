@extends('layouts.academy')

@section('title', __('academy.labs.all_labs_title').' | '.config('app.name'))

@section('sidebar_left')
<aside class="nav-lhs" id="tree-nav">
    <nav class="nav-lhs-scrollable">
        <a class="nav-back" href="/web-security/all-topics">&larr; {{ __('academy.labs.back_to_topics') }}</a>
        <h3>{{ __('academy.labs.topic_categories') }}</h3>
        <ul>
            @foreach ($allCategories as $catNav)
                <li><a href="#{{ $catNav->id }}">{{ $catNav->title }}</a></li>
            @endforeach
        </ul>
    </nav>
</aside>
@endsection

@section('breadcrumbs')
<ul class="breadcrumb-list">
    <li><a href="/web-security">{{ config('app.name') }}</a></li>
    <li><a href="/web-security/all-labs">{{ __('academy.labs.all_labs_title') }}</a></li>
</ul>
@endsection

@section('content')
<div class="vla-section-head" style="margin-top:0;margin-bottom:14px">
    <h1 class="heading-2" style="margin:0">{{ __('academy.labs.all_labs_title') }}</h1>
    <span class="vla-mono-chip" id="stats-summary">{{ __('academy.labs.stats_summary', ['visible' => $visibleCount, 'total' => $totalLabs, 'solved' => $solvedTotal]) }}</span>
</div>

<div class="highlightedarea">
    <div class="vla-badge-row" style="justify-content:space-between">
        <div>
            <h4 style="margin:0 0 4px">{{ __('academy.labs.mystery_title') }}</h4>
            <p style="margin:0" class="vla-muted-sm">{{ __('academy.labs.mystery_desc') }}</p>
        </div>
        <a class="vla-btn vla-btn--outline vla-btn--sm" href="/web-security/mystery-lab-challenge">{{ __('academy.labs.mystery_cta') }}</a>
    </div>
</div>

<form class="vla-filter-card" method="GET" action="/web-security/all-labs" role="search" aria-label="{{ __('academy.labs.filter_aria') }}">
    <div class="vla-filter-row">
        <input type="search" id="filter-search" name="search" value="{{ $search }}" aria-label="{{ __('academy.labs.search_aria') }}" placeholder="{{ __('academy.labs.search_placeholder') }}">
        <select id="filter-difficulty" name="difficulty" aria-label="{{ __('academy.labs.difficulty_aria') }}">
            <option value="ALL" @selected($difficulty === 'ALL')>{{ __('academy.labs.all_levels') }} ({{ $totalLabs }})</option>
            <option value="APPRENTICE" @selected($difficulty === 'APPRENTICE')>Apprentice ({{ $difficultyTotals['APPRENTICE'] ?? 0 }})</option>
            <option value="PRACTITIONER" @selected($difficulty === 'PRACTITIONER')>Practitioner ({{ $difficultyTotals['PRACTITIONER'] ?? 0 }})</option>
            <option value="EXPERT" @selected($difficulty === 'EXPERT')>Expert ({{ $difficultyTotals['EXPERT'] ?? 0 }})</option>
        </select>
        <select id="filter-status" name="status" aria-label="{{ __('academy.labs.status_aria') }}">
            <option value="ALL" @selected($status === 'ALL')>{{ __('academy.labs.all_statuses') }}</option>
            <option value="UNSOLVED" @selected($status === 'UNSOLVED')>{{ __('academy.labs.not_solved') }}</option>
            <option value="SOLVED" @selected($status === 'SOLVED')>{{ __('academy.labs.solved') }}</option>
        </select>
        <button type="submit" class="vla-btn vla-btn--primary vla-btn--sm">{{ __('academy.labs.filter') }}</button>
        @if ($search !== '' || $difficulty !== 'ALL' || $status !== 'ALL' || ($categoryFilter ?? 'ALL') !== 'ALL')
            <a class="vla-btn vla-btn--outline vla-btn--sm" href="/web-security/all-labs">{{ __('academy.labs.reset') }}</a>
        @endif
    </div>
</form>

<div id="all-labs">
    @forelse ($categories as $category)
        <div class="vla-section-head" style="margin-top:26px">
            <h2 id="{{ $category->id }}">{{ $category->title }}</h2>
            <a href="/cve?category={{ $category->id }}" class="vla-badge vla-badge--muted">CVE &rarr;</a>
        </div>
        @foreach ($category->labs as $lab)
            @include('partials.widgets.lab-status-card', ['lab' => $lab, 'isSolved' => isset($solvedMap[strtolower($lab->id)])])
        @endforeach
    @empty
        <p>{{ __('academy.labs.no_match') }}</p>
    @endforelse
</div>

@include('partials.widget', ['id' => 'academy-registration-footer'])
@endsection
