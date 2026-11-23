@extends('layouts.academy')

@section('title', __('academy.cve.title').' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <div>
        <h1 style="margin-bottom:6px">{{ __('academy.cve.title') }}</h1>
        <p class="vla-muted" style="margin:0">{{ __('academy.cve.subtitle') }}</p>
    </div>
    <div class="vla-badge-row">
        <span class="vla-badge vla-badge--accent vla-mono">{{ __('academy.cve.published_count', ['count' => $totalPublished]) }}</span>
        <span class="vla-badge vla-badge--orange vla-mono">{{ __('academy.cve.hot_count', ['count' => $hotCount]) }}</span>
        @if (Auth::user()?->isOwner())
            <a href="/owner/cves" class="vla-btn vla-btn--primary vla-btn--sm">{{ __('academy.owner.nav_cves') }}</a>
        @endif
    </div>
</div>

<form method="GET" action="/cve" class="vla-filter-card">
    <div class="vla-filter-row">
        <input type="search" name="search" value="{{ $search }}" placeholder="{{ __('academy.cve.search_placeholder') }}">
        <select name="year">
            <option value="ALL">{{ __('academy.cve.all_years') }}</option>
            @foreach ($years as $y)
                <option value="{{ $y }}" @selected((string) $year === (string) $y)>{{ $y }}</option>
            @endforeach
        </select>
        <select name="severity">
            <option value="ALL">{{ __('academy.cve.all_severities') }}</option>
            @foreach (\App\Models\CveArticle::SEVERITIES as $sev)
                <option value="{{ $sev }}" @selected($severity === $sev)>{{ $sev }}</option>
            @endforeach
        </select>
        <select name="category">
            <option value="ALL">{{ __('academy.cve.all_categories') }}</option>
            <option value="UNCATEGORIZED" @selected($categoryId === 'UNCATEGORIZED')>{{ __('academy.cve.uncategorized') }}</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @selected($categoryId === $cat->id)>{{ $cat->title }}</option>
            @endforeach
        </select>
        <label style="display:inline-flex;align-items:center;gap:6px;font-size:0.84rem;font-weight:600;cursor:pointer">
            <input type="checkbox" name="hot" value="1" @checked($hotOnly)> {{ __('academy.cve.hot_only') }}
        </label>
        <button type="submit" class="vla-btn vla-btn--primary vla-btn--sm">{{ __('academy.cve.filter') }}</button>
        @if ($search !== '' || $year !== 'ALL' || $severity !== 'ALL' || $categoryId !== 'ALL' || $hotOnly)
            <a href="/cve" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.cve.reset') }}</a>
        @endif
    </div>
</form>

<div class="vla-grid vla-grid--2">
    @forelse ($articles as $cve)
        <article class="vla-card vla-card-hover">
            <div class="vla-badge-row" style="margin-bottom:10px">
                <span class="vla-badge {{ $cve->severityBadgeClass() }} vla-mono">
                    {{ $cve->severity }} {{ $cve->cvss_score !== null ? number_format($cve->cvss_score, 1) : '' }}
                </span>
                @if ($cve->is_hot)
                    <span class="vla-badge vla-badge--orange">{{ __('academy.cve.hot_badge') }}</span>
                @endif
                @if ($cve->status !== 'published')
                    <span class="vla-badge vla-badge--muted">{{ __('academy.cve.draft_badge') }}</span>
                @endif
                <span class="vla-mono-chip">{{ $cve->cve_id }}</span>
                <span class="vla-muted-sm vla-mono">{{ $cve->cve_year }}</span>
            </div>

            <h3 style="margin-bottom:8px;font-size:1.06rem"><a href="/cve/{{ $cve->slug }}">{{ $cve->title }}</a></h3>

            @if ($cve->affected_product)
                <div class="vla-muted-sm" style="margin-bottom:8px">
                    <strong>{{ __('academy.cve.affected_product') }}:</strong> {{ \Illuminate\Support\Str::limit($cve->affected_product, 90) }}
                </div>
            @endif

            <p class="vla-muted-sm" style="margin:0 0 14px">{{ \Illuminate\Support\Str::limit($cve->summary, 165) }}</p>

            <div class="vla-badge-row" style="justify-content:space-between">
                @if ($cve->category)
                    <a href="/web-security/all-labs#{{ $cve->category->id }}" class="vla-badge vla-badge--accent">{{ $cve->category->title }}</a>
                @else
                    <span class="vla-badge vla-badge--muted">{{ __('academy.cve.uncategorized') }}</span>
                @endif
                <a href="/cve/{{ $cve->slug }}" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.cve.read_article') }} &rarr;</a>
            </div>
        </article>
    @empty
        <div class="vla-card" style="grid-column:1 / -1">
            <p class="vla-muted">{{ __('academy.cve.empty') }}</p>
        </div>
    @endforelse
</div>

<div class="vla-pagination">
    {{ $articles->links() }}
</div>
@endsection
