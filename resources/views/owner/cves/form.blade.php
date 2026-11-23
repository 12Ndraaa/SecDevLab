@extends('layouts.academy')

@section('title', ($isEdit ? __('academy.owner.edit_cve_title', ['id' => $article->cve_id]) : __('academy.owner.create_cve')).' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <h1>{{ $isEdit ? __('academy.owner.edit_cve_title', ['id' => $article->cve_id]) : __('academy.owner.create_cve') }}</h1>
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
                <label for="cve_id">{{ __('academy.owner.cve_id_label') }}</label>
                <input id="cve_id" type="text" name="cve_id" value="{{ old('cve_id', $article->cve_id) }}" placeholder="CVE-2025-12345" required>
            </div>
            <div class="vla-field">
                <label for="cve_year">{{ __('academy.owner.cve_year_label') }}</label>
                <input id="cve_year" type="number" name="cve_year" value="{{ old('cve_year', $article->cve_year) }}" min="1999" max="2035" required>
            </div>
            <div class="vla-field">
                <label for="status">{{ __('academy.owner.publish_status_label') }}</label>
                <select id="status" name="status" required>
                    <option value="published" @selected(old('status', $article->status) === 'published')>{{ __('academy.common.published') }}</option>
                    <option value="draft" @selected(old('status', $article->status) === 'draft')>{{ __('academy.common.draft') }}</option>
                </select>
            </div>
        </div>

        <div class="vla-field">
            <label for="title">{{ __('academy.owner.article_title_label') }}</label>
            <input id="title" type="text" name="title" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="vla-grid vla-grid--3">
            <div class="vla-field">
                <label for="severity">{{ __('academy.owner.severity_label') }}</label>
                <select id="severity" name="severity" required>
                    @foreach (\App\Models\CveArticle::SEVERITIES as $sev)
                        <option value="{{ $sev }}" @selected(old('severity', $article->severity) === $sev)>{{ $sev }}</option>
                    @endforeach
                </select>
            </div>
            <div class="vla-field">
                <label for="cvss_score">{{ __('academy.owner.cvss_label') }}</label>
                <input id="cvss_score" type="number" step="0.1" min="0" max="10" name="cvss_score" value="{{ old('cvss_score', $article->cvss_score) }}">
            </div>
            <div class="vla-field">
                <label for="affected_product">{{ __('academy.owner.affected_product_label') }}</label>
                <input id="affected_product" type="text" name="affected_product" value="{{ old('affected_product', $article->affected_product) }}">
            </div>
        </div>

        <div class="vla-grid vla-grid--2">
            <div class="vla-field">
                <label for="category_id">{{ __('academy.owner.related_category_opt') }}</label>
                <select id="category_id" name="category_id">
                    <option value="">{{ __('academy.owner.none_uncategorized') }}</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id', $article->category_id) === $cat->id)>{{ $cat->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="vla-field">
                <label for="lab_id">{{ __('academy.owner.direct_lab_opt') }}</label>
                <select id="lab_id" name="lab_id">
                    <option value="">{{ __('academy.owner.none_auto') }}</option>
                    @foreach ($labs as $lab)
                        <option value="{{ $lab->id }}" @selected(old('lab_id', $article->lab_id) === $lab->id)>[{{ $lab->category_id }}] {{ $lab->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="vla-field">
            <label for="summary">{{ __('academy.owner.summary_label') }}</label>
            <textarea id="summary" name="summary" rows="3">{{ old('summary', $article->summary) }}</textarea>
        </div>

        <div class="vla-field">
            <label for="technical_analysis">{{ __('academy.owner.technical_label') }}</label>
            <textarea id="technical_analysis" name="technical_analysis" rows="5">{{ old('technical_analysis', $article->technical_analysis) }}</textarea>
        </div>

        <div class="vla-field">
            <label for="poc_content">{{ __('academy.owner.poc_label') }}</label>
            <textarea id="poc_content" name="poc_content" rows="5">{{ old('poc_content', $article->poc_content) }}</textarea>
        </div>

        <div class="vla-field">
            <label for="mitigation">{{ __('academy.owner.mitigation_label') }}</label>
            <textarea id="mitigation" name="mitigation" rows="3">{{ old('mitigation', $article->mitigation) }}</textarea>
        </div>

        <div class="vla-field">
            <label for="references_text">{{ __('academy.owner.references_label') }}</label>
            @php
                $refsText = is_array($article->references_json) ? implode("\n", $article->references_json) : '';
            @endphp
            <textarea id="references_text" name="references_text" rows="3">{{ old('references_text', $refsText) }}</textarea>
        </div>

        <div class="vla-field">
            <label style="display:inline-flex;align-items:center;gap:8px;cursor:pointer">
                <input type="checkbox" name="is_hot" value="1" @checked(session()->hasOldInput() ? (bool) old('is_hot') : (bool) $article->is_hot)>
                {{ __('academy.owner.mark_hot') }}
            </label>
        </div>

        <div class="vla-btn-group">
            <button type="submit" class="vla-btn vla-btn--primary">{{ __('academy.owner.save') }}</button>
            <a href="/owner/cves" class="vla-btn vla-btn--outline">{{ __('academy.owner.cancel') }}</a>
        </div>
    </form>
</div>
@endsection
