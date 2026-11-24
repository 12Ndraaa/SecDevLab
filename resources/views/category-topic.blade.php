@extends('layouts.academy')

@section('title', $category->localizedTitle().' | '.config('app.name'))

@section('content')
<ul class="breadcrumb-list" style="margin-bottom:14px">
    <li><a href="/web-security">{{ config('app.name') }}</a></li>
    <li><a href="/web-security/all-topics">{{ __('academy.nav.topics') }}</a></li>
    <li>{{ $category->localizedTitle() }}</li>
</ul>

<div class="vla-section-head" style="margin-top:0">
    <div>
        <h1 style="margin-bottom:6px">{{ $category->localizedTitle() }}</h1>
        <p class="vla-muted" style="margin:0">{{ __('academy.labs.category_labs_count', ['count' => $category->labs->count()]) }}</p>
    </div>
    <div class="vla-btn-group">
        <a href="/web-security/all-labs#{{ $category->id }}" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.nav.all_labs') }}</a>
        <a href="/cve?category={{ $category->id }}" class="vla-btn vla-btn--accent vla-btn--sm">{{ __('academy.nav.cve') }}</a>
    </div>
</div>

<div class="vla-card" style="margin-bottom:24px">
    <h2 style="margin-bottom:14px">{{ __('academy.nav.all_labs') }}: {{ $category->localizedTitle() }}</h2>
    @forelse ($category->labs as $lab)
        @include('partials.widgets.lab-status-card', ['lab' => $lab, 'isSolved' => isset($solvedMap[strtolower($lab->id)])])
    @empty
        <p class="vla-muted">{{ __('academy.labs.no_match') }}</p>
    @endforelse
</div>

@if ($relatedCves->isNotEmpty())
    <div class="vla-card">
        <h2 style="margin-bottom:14px">{{ __('academy.cve.title') }}</h2>
        <ul style="padding-left:18px;margin:0">
            @foreach ($relatedCves as $cve)
                <li style="margin-bottom:10px">
                    <span class="vla-badge {{ $cve->severityBadgeClass() }}">{{ $cve->cve_id }}</span>
                    <a href="/cve/{{ $cve->slug }}"><strong>{{ $cve->title }}</strong></a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
