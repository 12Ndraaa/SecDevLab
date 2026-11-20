@extends('layouts.academy')

@section('title', __('academy.owner.nav_cves').' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <div>
        <h1 style="margin-bottom:6px">{{ __('academy.owner.nav_cves') }}</h1>
        <p class="vla-muted" style="margin:0">CRUD Artikel CVE, status publish/draft, tautan kategori/lab, dan impor trickest/cve.</p>
    </div>
    <a href="/owner/cves/create" class="vla-btn vla-btn--primary">+ {{ __('academy.owner.create_cve') }}</a>
</div>

@include('owner._nav')

<div id="trickest-sync" class="vla-card" style="margin-bottom:22px">
    <h3 style="margin-bottom:6px">{{ __('academy.owner.sync_title') }}</h3>
    <p class="vla-muted-sm" style="margin-bottom:14px">
        Repo: <code>https://github.com/trickest/cve.git</code> &bull; Default Local Dir: <code>{{ $defaultRepoPath }}</code>
        ({{ $repoExists ? 'Directory exists' : 'Not present yet' }})
    </p>
    <form method="POST" action="/owner/cves/import-trickest" class="vla-form">
        @csrf
        <div class="vla-grid vla-grid--4">
            <div class="vla-field">
                <label for="imp-years">Years (comma-separated)</label>
                <input id="imp-years" type="text" name="years" value="2024,2025,2026" required>
            </div>
            <div class="vla-field">
                <label for="imp-limit">Import Limit (0 = all)</label>
                <input id="imp-limit" type="number" name="limit" value="300" min="0" max="100000">
            </div>
            <div class="vla-field">
                <label for="imp-mode">Source Mode</label>
                <select id="imp-mode" name="mode">
                    <option value="local">Import from Local Clone Only</option>
                    <option value="clone_and_import">Sparse Clone / Pull + Import</option>
                </select>
            </div>
            <div class="vla-field">
                <label for="imp-path">Custom Repo Path (optional)</label>
                <input id="imp-path" type="text" name="repo_path" placeholder="{{ $defaultRepoPath }}">
            </div>
        </div>
        <div class="vla-badge-row" style="justify-content:space-between">
            <label style="display:inline-flex;align-items:center;gap:6px;font-weight:600">
                <input type="checkbox" name="hot_only" value="1"> Only import CVEs listed in <code>hot_cves.csv</code>
            </label>
            <button type="submit" class="vla-btn vla-btn--accent vla-btn--sm">Run trickest/cve Importer</button>
        </div>
    </form>
</div>

<form method="GET" action="/owner/cves" class="vla-filter-card">
    <div class="vla-filter-row">
        <input type="search" name="search" value="{{ $search }}" placeholder="Search CVE ID, title, product...">
        <select name="status">
            <option value="ALL">All statuses</option>
            <option value="published" @selected($status === 'published')>Published</option>
            <option value="draft" @selected($status === 'draft')>Draft</option>
        </select>
        <select name="severity">
            <option value="ALL">All severities</option>
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
                <th>CVE ID</th>
                <th>Title &amp; Product</th>
                <th>Severity</th>
                <th>Category</th>
                <th>Status</th>
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
                    <td>{{ $cve->category?->title ?? 'Uncategorized' }}</td>
                    <td>
                        <form method="POST" action="/owner/cves/{{ $cve->id }}/toggle-status" class="vla-inline-form">
                            @csrf
                            <button type="submit" class="vla-badge {{ $cve->status === 'published' ? 'vla-badge--solved' : 'vla-badge--muted' }}" style="cursor:pointer">
                                {{ strtoupper($cve->status) }}
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
