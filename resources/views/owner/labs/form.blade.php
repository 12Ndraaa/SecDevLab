@extends('layouts.academy')

@section('title', ($isEdit ? __('academy.owner.edit_lab_title') : __('academy.owner.create_lab')).' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <h1>{{ $isEdit ? __('academy.owner.edit_lab_heading', ['title' => $lab->title]) : __('academy.owner.create_lab') }}</h1>
    <a href="/owner/labs" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.owner.cancel') }}</a>
</div>

@include('owner._nav')

@if ($errors->any())
    <div class="vla-alert vla-alert--error">
        @foreach ($errors->all() as $err)
            <div>{{ $err }}</div>
        @endforeach
    </div>
@endif

@php
    $prof = is_array($lab->profile) ? $lab->profile : [];
    $sections = is_array($lab->sections) ? $lab->sections : [];
    $hintDefault = '';
    $solDefault = '';
    foreach ($sections as $sec) {
        if (stripos((string) ($sec['title'] ?? ''), 'hint') !== false) {
            $hintDefault = (string) ($sec['bodyHtml'] ?? '');
        } elseif (stripos((string) ($sec['title'] ?? ''), 'solution') !== false && $solDefault === '') {
            $solDefault = (string) ($sec['bodyHtml'] ?? '');
        }
    }
    $payloadsDefault = is_array($prof['solutionPayloads'] ?? null) ? implode("\n", $prof['solutionPayloads']) : '';
@endphp

<div class="vla-card">
    <form method="POST" action="{{ $isEdit ? '/owner/labs/'.$lab->id : '/owner/labs' }}" class="vla-form">
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif

        <div class="vla-grid vla-grid--3">
            <div class="vla-field">
                <label for="lab-cat">{{ __('academy.owner.lab_cat_label') }}</label>
                <select id="lab-cat" name="category_id" required>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id', $lab->category_id) === $cat->id)>{{ $cat->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="vla-field">
                <label for="lab-diff">{{ __('academy.owner.lab_diff_label') }}</label>
                <select id="lab-diff" name="difficulty" required>
                    <option value="APPRENTICE" @selected(old('difficulty', $lab->difficulty) === 'APPRENTICE')>APPRENTICE</option>
                    <option value="PRACTITIONER" @selected(old('difficulty', $lab->difficulty) === 'PRACTITIONER')>PRACTITIONER</option>
                    <option value="EXPERT" @selected(old('difficulty', $lab->difficulty) === 'EXPERT')>EXPERT</option>
                </select>
            </div>
            <div class="vla-field">
                <label for="lab-theme">{{ __('academy.owner.lab_theme_label') }}</label>
                <select id="lab-theme" name="theme" required>
                    <option value="ecommerce" @selected(old('theme', $prof['theme'] ?? 'ecommerce') === 'ecommerce')>{{ __('academy.owner.theme_ecommerce') }}</option>
                    <option value="blog" @selected(old('theme', $prof['theme'] ?? 'ecommerce') === 'blog')>{{ __('academy.owner.theme_blog') }}</option>
                </select>
            </div>
        </div>

        <div class="vla-grid vla-grid--3">
            <div class="vla-field vla-field--span2">
                <label for="lab-title">{{ __('academy.owner.lab_title_label') }}</label>
                <input id="lab-title" type="text" name="title" value="{{ old('title', $lab->title) }}" required>
            </div>
            <div class="vla-field">
                <label for="lab-order">{{ __('academy.owner.sort_order_label') }}</label>
                <input id="lab-order" type="number" name="sort_order" value="{{ old('sort_order', $lab->sort_order ?? 1) }}" required>
            </div>
        </div>

        <div class="vla-field">
            <label for="lab-href">{!! __('academy.owner.lab_href_html') !!}</label>
            <input id="lab-href" type="text" name="href" value="{{ old('href', $lab->href ?: '/web-security/sql-injection/lab-custom-') }}" required>
        </div>

        <div class="vla-field">
            <label for="lab-desc">{{ __('academy.owner.lab_desc_label') }}</label>
            <textarea id="lab-desc" name="description_html" rows="4" required>{{ old('description_html', $lab->description_html) }}</textarea>
        </div>

        <div class="vla-grid vla-grid--2">
            <div class="vla-field">
                <label for="lab-hint">{{ __('academy.owner.lab_hint_label') }}</label>
                <textarea id="lab-hint" name="hint_text" rows="3">{{ old('hint_text', $hintDefault) }}</textarea>
            </div>
            <div class="vla-field">
                <label for="lab-sol">{{ __('academy.owner.lab_sol_label') }}</label>
                <textarea id="lab-sol" name="solution_text" rows="3">{{ old('solution_text', $solDefault) }}</textarea>
            </div>
        </div>

        <div class="vla-field">
            <label for="lab-payloads">{{ __('academy.owner.lab_payloads_label') }}</label>
            <textarea id="lab-payloads" name="solution_payloads" rows="3">{{ old('solution_payloads', $payloadsDefault) }}</textarea>
        </div>

        @php $hasOld = session()->hasOldInput(); @endphp
        <div class="vla-badge-row" style="margin-bottom:18px">
            <label><input type="checkbox" name="has_my_account" value="1" @checked($hasOld ? (bool) old('has_my_account') : !empty($prof['hasMyAccount']))> {{ __('academy.owner.flag_my_account') }}</label>
            <label><input type="checkbox" name="has_admin_panel" value="1" @checked($hasOld ? (bool) old('has_admin_panel') : !empty($prof['hasAdminPanel']))> {{ __('academy.owner.flag_admin_panel') }}</label>
            <label><input type="checkbox" name="has_live_chat" value="1" @checked($hasOld ? (bool) old('has_live_chat') : !empty($prof['hasLiveChat']))> {{ __('academy.owner.flag_live_chat') }}</label>
            <label><input type="checkbox" name="has_exploit_server" value="1" @checked($hasOld ? (bool) old('has_exploit_server') : !empty($prof['hasExploitServer']))> {{ __('academy.owner.flag_exploit_server') }}</label>
            <label><input type="checkbox" name="has_email_client" value="1" @checked($hasOld ? (bool) old('has_email_client') : !empty($prof['hasEmailClient']))> {{ __('academy.owner.flag_email_client') }}</label>
            <label><input type="checkbox" name="has_submit_solution" value="1" @checked($hasOld ? (bool) old('has_submit_solution') : !empty($prof['hasSubmitSolution']))> {{ __('academy.owner.flag_submit_solution') }}</label>
            <label><input type="checkbox" name="has_cart" value="1" @checked($hasOld ? (bool) old('has_cart') : !empty($prof['hasCart']))> {{ __('academy.owner.flag_cart') }}</label>
        </div>

        <div class="vla-btn-group">
            <button type="submit" class="vla-btn vla-btn--primary">{{ __('academy.owner.save') }}</button>
            <a href="/owner/labs" class="vla-btn vla-btn--outline">{{ __('academy.owner.cancel') }}</a>
        </div>
    </form>
</div>
@endsection
