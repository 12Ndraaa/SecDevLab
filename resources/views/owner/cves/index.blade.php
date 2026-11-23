@extends('layouts.academy')

@section('title', __('academy.owner.nav_cves').' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <div>
        <h1 style="margin-bottom:6px">{{ __('academy.owner.nav_cves') }}</h1>
        <p class="vla-muted" style="margin:0">{{ __('academy.owner.cves_crud_desc') }}</p>
    </div>
    <a href="/owner/cves/create" class="vla-btn vla-btn--primary">+ {{ __('academy.owner.create_cve') }}</a>
</div>

@include('owner._nav')

<div id="trickest-sync" class="vla-card" style="margin-bottom:22px">
    <h3 style="margin-bottom:6px">{{ __('academy.owner.sync_title') }}</h3>
    <p class="vla-muted-sm" style="margin-bottom:14px">
        Repo: <code>https://github.com/trickest/cve.git</code> &bull; {{ __('academy.owner.default_local_dir') }} <code>{{ $defaultRepoPath }}</code>
        ({{ $repoExists ? __('academy.owner.dir_exists') : __('academy.owner.not_present') }})
    </p>
    <form method="POST" action="/owner/cves/import-trickest" class="vla-form">
        @csrf
        <div class="vla-grid vla-grid--4">
            <div class="vla-field">
                <label for="imp-years">{{ __('academy.owner.years_label') }}</label>
                <input id="imp-years" type="text" name="years" value="2024,2025,2026" required>
            </div>
            <div class="vla-field">
                <label for="imp-limit">{{ __('academy.owner.import_limit_label') }}</label>
                <input id="imp-limit" type="number" name="limit" value="300" min="0" max="100000">
            </div>
            <div class="vla-field">
                <label for="imp-mode">{{ __('academy.owner.source_mode_label') }}</label>
                <select id="imp-mode" name="mode">
                    <option value="local">{{ __('academy.owner.mode_local') }}</option>
                    <option value="clone_and_import">{{ __('academy.owner.mode_clone') }}</option>
                </select>
            </div>
            <div class="vla-field">
                <label for="imp-path">{{ __('academy.owner.custom_repo_path_label') }}</label>
                <input id="imp-path" type="text" name="repo_path" placeholder="{{ $defaultRepoPath }}">
            </div>
        </div>
        <div class="vla-badge-row" style="justify-content:space-between">
            <label style="display:inline-flex;align-items:center;gap:6px;font-weight:600">
                <input type="checkbox" name="hot_only" value="1"> {{ __('academy.owner.hot_only_checkbox') }} <code>hot_cves.csv</code>
            </label>
            <button type="submit" class="vla-btn vla-btn--accent vla-btn--sm">{{ __('academy.owner.run_importer_btn') }}</button>
        </div>
    </form>
</div>

<form method="GET" action="/owner/cves" class="vla-filter-card">
    <div class="vla-filter-row">
        <input type="search" name="search" value="{{ $search }}" placeholder="{{ __('academy.owner.cve_search_placeholder') }}">
        <select name="status">
            <option value="ALL">{{ __('academy.common.all_statuses') }}</option>
            <option value="published" @selected($status === 'published')>{{ __('academy.common.published') }}</option>
            <option value="draft" @selected($status === 'draft')>{{ __('academy.common.draft') }}</option>
        </select>
        <select name="severity">
            <option value="ALL">{{ __('academy.common.all_severities') }}</option>
            @foreach (\App\Models\CveArticle::SEVERITIES as $sev)
                <option value="{{ $sev }}" @selected($severity === $sev)>{{ $sev }}</option>
            @endforeach
        </select>
        <button type="submit" class="vla-btn vla-btn--primary vla-btn--sm">{{ __('academy.labs.filter') }}</button>
    </div>
</form>

<div class="vla-table-wrap">
    <table class="vla-table">
        <thead>
            <tr>
                <th>{{ __('academy.owner.col_cve_id') }}</th>
                <th>{{ __('academy.owner.col_title_product') }}</th>
                <th>{{ __('academy.owner.col_severity') }}</th>
                <th>{{ __('academy.owner.col_category') }}</th>
                <th>{{ __('academy.owner.col_status') }}</th>
                <th>{{ __('academy.owner.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $cve)
                <tr>
                    <td>
                        <strong><a href="/cve/{{ $cve->slug }}">{{ $cve->cve_id }}</a></strong>
                        @if ($cve->is_hot)
                            <div><span class="vla-badge vla-badge--orange">HOT</span></div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ \Illuminate\Support\Str::limit($cve->title, 70) }}</strong>
                        <div class="vla-muted-sm">{{ \Illuminate\Support\Str::limit($cve->affected_product, 65) }}</div>
                    </td>
                    <td><span class="vla-badge {{ $cve->severityBadgeClass() }}">{{ $cve->severity }} ({{ $cve->cvss_score ?? '-' }})</span></td>
                    <td>{{ $cve->category?->title ?? __('academy.cve.uncategorized') }}</td>
                    <td>
                        <form method="POST" action="/owner/cves/{{ $cve->id }}/toggle-status" class="vla-inline-form">
                            @csrf
                            <button type="submit" class="vla-badge {{ $cve->status === 'published' ? 'vla-badge--solved' : 'vla-badge--muted' }}" style="cursor:pointer">
                                {{ $cve->status === 'published' ? strtoupper(__('academy.common.published')) : strtoupper(__('academy.common.draft')) }}
                            </button>
                        </form>
                    </td>
                    <td>
                        <div class="vla-btn-group">
                            <a href="/owner/cves/{{ $cve->id }}/edit" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.owner.edit') }}</a>
                            <form method="POST" action="/owner/cves/{{ $cve->id }}" class="vla-inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="vla-btn vla-btn--danger vla-btn--sm">{{ __('academy.owner.delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">{{ __('academy.cve.empty') }}</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="vla-pagination">{{ $articles->links() }}</div>
@endsection
