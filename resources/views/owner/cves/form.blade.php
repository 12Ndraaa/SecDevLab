@extends('layouts.academy')

@section('title', ($isEdit ? 'Edit '.$article->cve_id : __('academy.owner.create_cve')).' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <h1>{{ $isEdit ? 'Edit '.$article->cve_id : __('academy.owner.create_cve') }}</h1>
    <a href="/owner/cves" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.owner.cancel') }}</a>
</div>

@include('owner._nav')

@if ($errors->any())
    <div class="vla-alert vla-alert--error">
        @foreach ($errors->all() as $err)
            <div>{{ $err }}</div>
        @endforeach
    </div>
@endif

<div class="vla-card">
    <form method="POST" action="{{ $isEdit ? '/owner/cves/'.$article->id : '/owner/cves' }}" class="vla-form">
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif

        <div class="vla-grid vla-grid--3">
            <div class="vla-field">
                <label for="cve_id">CVE ID *</label>
                <input id="cve_id" type="text" name="cve_id" value="{{ old('cve_id', $article->cve_id) }}" placeholder="CVE-2025-12345" required>
            </div>
            <div class="vla-field">
                <label for="cve_year">Year *</label>
                <input id="cve_year" type="number" name="cve_year" value="{{ old('cve_year', $article->cve_year) }}" min="1999" max="2035" required>
            </div>
            <div class="vla-field">
                <label for="status">Publish Status *</label>
                <select id="status" name="status" required>
                    <option value="published" @selected(old('status', $article->status) === 'published')>Published</option>
                    <option value="draft" @selected(old('status', $article->status) === 'draft')>Draft</option>
                </select>
            </div>
        </div>

        <div class="vla-field">
            <label for="title">Article Title *</label>
            <input id="title" type="text" name="title" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="vla-grid vla-grid--3">
            <div class="vla-field">
                <label for="severity">Severity *</label>
                <select id="severity" name="severity" required>
                    @foreach (\App\Models\CveArticle::SEVERITIES as $sev)
                        <option value="{{ $sev }}" @selected(old('severity', $article->severity) === $sev)>{{ $sev }}</option>
                    @endforeach
                </select>
            </div>
            <div class="vla-field">
                <label for="cvss_score">CVSS Score (0.0 – 10.0)</label>
                <input id="cvss_score" type="number" step="0.1" min="0" max="10" name="cvss_score" value="{{ old('cvss_score', $article->cvss_score) }}">
            </div>
            <div class="vla-field">
                <label for="affected_product">Affected Product</label>
                <input id="affected_product" type="text" name="affected_product" value="{{ old('affected_product', $article->affected_product) }}">
            </div>
        </div>

        <div class="vla-grid vla-grid--2">
            <div class="vla-field">
                <label for="category_id">Related Lab Category (Optional / Nullable)</label>
                <select id="category_id" name="category_id">
                    <option value="">-- Uncategorized --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id', $article->category_id) === $cat->id)>{{ $cat->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="vla-field">
                <label for="lab_id">Direct Related Practice Lab (Optional)</label>
                <select id="lab_id" name="lab_id">
                    <option value="">-- Auto / None --</option>
                    @foreach ($labs as $lab)
                        <option value="{{ $lab->id }}" @selected(old('lab_id', $article->lab_id) === $lab->id)>[{{ $lab->category_id }}] {{ $lab->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="vla-field">
            <label for="summary">Executive Summary</label>
            <textarea id="summary" name="summary" rows="3">{{ old('summary', $article->summary) }}</textarea>
        </div>

        <div class="vla-field">
            <label for="technical_analysis">Technical Analysis</label>
            <textarea id="technical_analysis" name="technical_analysis" rows="5">{{ old('technical_analysis', $article->technical_analysis) }}</textarea>
        </div>

        <div class="vla-field">
            <label for="poc_content">Proof of Concept (PoC) / Payload</label>
            <textarea id="poc_content" name="poc_content" rows="5">{{ old('poc_content', $article->poc_content) }}</textarea>
        </div>

        <div class="vla-field">
            <label for="mitigation">Mitigation &amp; Remediation</label>
            <textarea id="mitigation" name="mitigation" rows="3">{{ old('mitigation', $article->mitigation) }}</textarea>
        </div>

        <div class="vla-field">
            <label for="references_text">References (1 URL per line)</label>
            @php
                $refsText = is_array($article->references_json) ? implode("\n", $article->references_json) : '';
            @endphp
            <textarea id="references_text" name="references_text" rows="3">{{ old('references_text', $refsText) }}</textarea>
        </div>

        <div class="vla-field">
            <label style="display:inline-flex;align-items:center;gap:8px;cursor:pointer">
                <input type="checkbox" name="is_hot" value="1" @checked(session()->hasOldInput() ? (bool) old('is_hot') : (bool) $article->is_hot)>
                Mark as Hot CVE (Featured)
            </label>
        </div>

        <div class="vla-btn-group">
            <button type="submit" class="vla-btn vla-btn--primary">{{ __('academy.owner.save') }}</button>
            <a href="/owner/cves" class="vla-btn vla-btn--outline">{{ __('academy.owner.cancel') }}</a>
        </div>
    </form>
</div>
@endsection
