@extends('layouts.academy')

@section('title', 'Lab: '.$lab->title.' | '.config('app.name'))

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
                <li><a href="/web-security/all-labs#{{ $category->id }}">View all {{ $category->title }} labs</a></li>
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
<h1 class="heading-2">Lab: {{ $lab->title }}</h1>

<div class="vla-badge-row" style="justify-content:space-between;margin-bottom:14px">
    @include('partials.widgets.lab-info', ['lab' => $lab, 'isSolved' => $isSolved])
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

<div class="container-buttons-left" style="margin:20px 0">
    <a class="button-orange" href="/academy/labs/launch/{{ $lab->id }}">
        <span class="icon-erlenmeyer"></span>ACCESS THE LAB
    </a>
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
        <h4>{{ __('academy.cve.title') }} &mdash; {{ $category->title }}</h4>
        <ul>
            @foreach ($relatedCves as $cve)
                <li>
                    <span class="vla-badge {{ $cve->severityBadgeClass() }}">{{ $cve->cve_id }}</span>
                    <a href="/cve/{{ $cve->slug }}">{{ $cve->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endif

@include('partials.widget', ['id' => 'academy-registration-footer'])
@endsection
