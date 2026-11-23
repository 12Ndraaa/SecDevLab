@extends('layouts.academy')

@section('title', $article->cve_id.' - '.$article->title.' | '.config('app.name'))

@section('content')
<ul class="breadcrumb-list" style="margin-bottom:14px">
    <li><a href="/">{{ __('academy.nav.home') }}</a></li>
    <li><a href="/cve">{{ __('academy.nav.cve') }}</a></li>
    <li>{{ $article->cve_id }}</li>
</ul>

<div class="vla-card" style="margin-bottom:20px">
    <div class="vla-badge-row" style="margin-bottom:12px">
        <span class="vla-badge {{ $article->severityBadgeClass() }} vla-mono">
            {{ $article->severity }} {{ $article->cvss_score !== null ? 'CVSS '.number_format($article->cvss_score, 1) : '' }}
        </span>
        @if ($article->is_hot)
            <span class="vla-badge vla-badge--orange">{{ __('academy.cve.hot_badge') }}</span>
        @endif
        @if ($article->status !== 'published')
            <span class="vla-badge vla-badge--muted">{{ __('academy.cve.draft_badge') }}</span>
        @endif
        <span class="vla-mono-chip">{{ $article->cve_id }}</span>
        <span class="vla-badge vla-badge--muted">{{ __('academy.cve.source_label') }}: {{ $article->source_repo }}</span>
    </div>

    <h1 style="margin-bottom:12px">{{ $article->title }}</h1>

    <div class="vla-grid vla-grid--3" style="margin-top:16px">
        <div class="vla-card vla-card--compact" style="background:var(--vla-surface-2);box-shadow:none">
            <div class="vla-muted-sm">{{ __('academy.cve.affected_product') }}</div>
            <strong>{{ $article->affected_product ?: '-' }}</strong>
        </div>
        <div class="vla-card vla-card--compact" style="background:var(--vla-surface-2);box-shadow:none">
            <div class="vla-muted-sm">{{ __('academy.cve.related_category') }}</div>
            @if ($article->category)
                <a href="{{ $article->category->topic_route }}"><strong>{{ $article->category->title }}</strong></a>
            @else
                <strong>{{ __('academy.cve.uncategorized') }}</strong>
            @endif
        </div>
        <div class="vla-card vla-card--compact" style="background:var(--vla-surface-2);box-shadow:none">
            <div class="vla-muted-sm">{{ __('academy.cve.cvss_score') }}</div>
            <strong class="vla-mono">{{ $article->cvss_score !== null ? number_format($article->cvss_score, 1).' / 10.0' : $article->severity }}</strong>
        </div>
    </div>

    @if (Auth::user()?->isOwner())
        <div class="vla-btn-group" style="margin-top:16px">
            <a href="/owner/cves/{{ $article->id }}/edit" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.owner.edit') }}</a>
            <a href="/cve" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.cve.back_to_list') }}</a>
        </div>
    @endif
</div>

<div class="vla-grid vla-grid--2">
    <div class="vla-card">
        <h2>{{ __('academy.cve.summary') }}</h2>
        <p>{{ $article->summary ?: '-' }}</p>

        <h2 style="margin-top:24px">{{ __('academy.cve.technical_analysis') }}</h2>
        <div style="white-space:pre-line">{{ $article->technical_analysis ?: '-' }}</div>

        <h2 style="margin-top:24px">{{ __('academy.cve.mitigation') }}</h2>
        <div style="white-space:pre-line">{{ $article->mitigation ?: '-' }}</div>
    </div>

    <div>
        <div class="vla-card" style="margin-bottom:20px">
            <h2>{{ __('academy.cve.poc') }}</h2>
            <div class="vla-terminal-card">
                <div class="vla-terminal-card__bar">
                    <span class="vla-terminal-dots"><span></span><span></span><span></span></span>
                    <span>PoC // {{ $article->cve_id }}</span>
                </div>
                <pre class="vla-code-block" style="margin:0;border:none;border-radius:0">{{ $article->poc_content ?: __('academy.cve.no_poc') }}</pre>
            </div>
        </div>

        <div class="vla-card" style="margin-bottom:20px">
            <h2>{{ __('academy.cve.practice_labs') }}</h2>
            @if ($article->lab)
                <div class="highlightedarea" style="margin-top:0">
                    <div class="vla-badge vla-badge--orange" style="margin-bottom:8px">{{ __('academy.cve.direct_lab') }}</div>
                    <div><strong><a href="{{ $article->lab->href }}">{{ $article->lab->title }}</a></strong></div>
                    <div class="vla-btn-group" style="margin-top:10px">
                        <a href="{{ $article->lab->href }}" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.cve.lab_details') }}</a>
                        <a href="/academy/labs/launch/{{ $article->lab->id }}" class="vla-btn vla-btn--primary vla-btn--sm">{{ __('academy.cve.launch_lab') }}</a>
                    </div>
                </div>
            @endif

            @if ($relatedLabs->isNotEmpty())
                <ul style="padding-left:18px;margin:10px 0 0">
                    @foreach ($relatedLabs as $rl)
                        <li style="margin-bottom:10px">
                            <span class="{{ $rl->difficulty_class }}">{{ $rl->difficulty }}</span>
                            <a href="{{ $rl->href }}"><strong>{{ $rl->title }}</strong></a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="vla-muted-sm">{{ __('academy.cve.no_linked_labs') }} <a href="/web-security/all-labs">{{ __('academy.nav.all_labs') }}</a>.</p>
            @endif
        </div>

        <div class="vla-card">
            <h2>{{ __('academy.cve.references') }}</h2>
            @if (!empty($article->references_json))
                <ul style="padding-left:18px;margin:0;word-break:break-all">
                    @foreach ($article->references_json as $ref)
                        <li style="margin-bottom:6px">
                            @if (str_starts_with($ref, 'http://') || str_starts_with($ref, 'https://'))
                                <a href="{{ $ref }}" rel="noreferrer" target="_blank">{{ $ref }}</a>
                            @else
                                {{ $ref }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="vla-muted-sm">{{ __('academy.cve.no_references') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
