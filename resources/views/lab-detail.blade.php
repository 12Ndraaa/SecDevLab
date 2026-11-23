@extends('layouts.academy')

@section('title', __('academy.labs.lab_prefix').$lab->title.' | '.config('app.name'))

@section('sidebar_left')
@if (!empty($topicAsideHtml))
    {!! $topicAsideHtml !!}
@else
    <aside class="nav-lhs" id="tree-nav">
        <nav class="nav-lhs-scrollable">
            <a class="nav-back" href="/web-security/all-topics">&larr; {{ __('academy.labs.back_to_topics') }}</a>
            <h3>{{ $category->title }}</h3>
            <ul>
                <li><a href="{{ $category->topic_route }}">{{ $category->title }}</a></li>
                <li><a href="/web-security/all-labs#{{ $category->id }}">{{ __('academy.labs.view_all_category_labs', ['category' => $category->title]) }}</a></li>
            </ul>
        </nav>
    </aside>
@endif
@endsection

@section('breadcrumbs')
<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList">
    @foreach ($breadcrumbs as $idx => $bc)
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="{{ $bc['href'] }}"><span itemprop="name">{{ $bc['name'] }}</span></a>
            <meta itemprop="position" content="{{ $idx + 1 }}" />
        </li>
    @endforeach
</ul>
@endsection

@section('content')
<h1 class="heading-2">{{ __('academy.labs.lab_prefix') }}{{ $lab->title }}</h1>

<div class="vla-badge-row" style="justify-content:space-between;margin-bottom:16px">
    <div class="vla-badge-row">
        @include('partials.widgets.lab-info', ['lab' => $lab, 'isSolved' => $isSolved])
        @if (!empty($archetype))
            <span class="vla-badge vla-badge--accent">{{ $archetype['short'] }}</span>
        @endif
    </div>
    @include('partials.widget', ['id' => 'academy-sharepage'])
</div>

{!! $cleanDescriptionHtml !!}

@foreach ($hintSections as $s)
    <div class="component-solution expandable-container">
        <details>
            <summary><h4><span class="icon-erlenmeyer"></span> {{ $s['title'] }}</h4></summary>
            {!! $s['normalizedBodyHtml'] !!}
        </details>
    </div>
@endforeach

<div class="vla-instance-bar">
    <div>
        <div class="vla-badge-row" style="margin-bottom:6px">
            <span class="vla-badge vla-badge--accent">{{ __('academy.labs.isolated_target') }}</span>
            @if (!empty($instanceUrl) && !empty($activeSession))
                <span class="vla-mono-chip">{{ __('academy.labs.token_label') }} {{ substr($activeSession->instance_token, 0, 12) }}&hellip;</span>
                <span class="vla-badge vla-badge--solved">{{ __('academy.labs.ttl_label') }} {{ $activeSession->remainingLabel() }}</span>
            @else
                <span class="vla-muted-sm">{{ __('academy.labs.assigns_token_desc') }}</span>
            @endif
        </div>
        @if (!empty($archetype))
            <div class="vla-muted-sm"><strong>{{ $archetype['label'] }}</strong>: {{ $archetype['description'] }}</div>
        @endif
    </div>

    <div class="vla-btn-group">
        <a class="button-orange" href="/academy/labs/launch/{{ $lab->id }}">
            <span class="vla-icon" aria-hidden="true">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 3h6M10 3v5l-5.5 9.5A2 2 0 0 0 6.2 20.5h11.6a2 2 0 0 0 1.7-3L14 8V3"/></svg>
            </span>
            <span>{{ !empty($instanceUrl) ? __('academy.labs.open_instance') : __('academy.labs.access_lab') }}</span>
        </a>

        @if (!empty($activeSession))
            <form method="POST" action="/academy/labs/{{ $lab->id }}/reset" class="vla-inline-form">
                @csrf
                <input type="hidden" name="return_to" value="detail">
                <button type="submit" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.labs.reset_instance') }}</button>
            </form>
            <form method="POST" action="/academy/labs/{{ $lab->id }}/renew" class="vla-inline-form">
                @csrf
                <input type="hidden" name="return_to" value="detail">
                <button type="submit" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.labs.renew_ttl') }}</button>
            </form>
        @endif
    </div>
</div>

@foreach ($otherSections as $s)
    <div class="component-solution expandable-container">
        <details>
            <summary><h4><span class="{{ $s['iconClass'] }}"></span> {{ $s['title'] }}</h4></summary>
            {!! $s['normalizedBodyHtml'] !!}
        </details>
    </div>
@endforeach

@if (isset($relatedCves) && $relatedCves->isNotEmpty())
    <div class="highlightedarea" style="margin-top:24px">
        <h4 style="margin-bottom:10px">{{ __('academy.cve.title') }} ({{ $category->title }})</h4>
        <ul style="margin:0;padding-left:18px">
            @foreach ($relatedCves as $cve)
                <li style="margin-bottom:6px">
                    <span class="vla-badge {{ $cve->severityBadgeClass() }}">{{ $cve->cve_id }}</span>
                    <a href="/cve/{{ $cve->slug }}">{{ $cve->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endif

@include('partials.widget', ['id' => 'academy-registration-footer'])
@endsection
