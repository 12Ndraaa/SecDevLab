@extends('layouts.academy')

@section('title', ($isEdit ? 'Edit Lab' : __('academy.owner.create_lab')).' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <h1>{{ $isEdit ? 'Edit Lab: '.$lab->title : __('academy.owner.create_lab') }}</h1>
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
                <label for="lab-cat">Category *</label>
                <select id="lab-cat" name="category_id" required>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id', $lab->category_id) === $cat->id)>{{ $cat->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="vla-field">
                <label for="lab-diff">Difficulty *</label>
                <select id="lab-diff" name="difficulty" required>
                    <option value="APPRENTICE" @selected(old('difficulty', $lab->difficulty) === 'APPRENTICE')>APPRENTICE</option>
                    <option value="PRACTITIONER" @selected(old('difficulty', $lab->difficulty) === 'PRACTITIONER')>PRACTITIONER</option>
                    <option value="EXPERT" @selected(old('difficulty', $lab->difficulty) === 'EXPERT')>EXPERT</option>
                </select>
            </div>
            <div class="vla-field">
                <label for="lab-theme">Environment Theme *</label>
                <select id="lab-theme" name="theme" required>
                    <option value="ecommerce" @selected(old('theme', $prof['theme'] ?? 'ecommerce') === 'ecommerce')>E-Commerce Shop</option>
                    <option value="blog" @selected(old('theme', $prof['theme'] ?? 'ecommerce') === 'blog')>Security Blog</option>
                </select>
            </div>
        </div>

        <div class="vla-grid vla-grid--3">
            <div class="vla-field vla-field--span2">
                <label for="lab-title">Lab Title *</label>
                <input id="lab-title" type="text" name="title" value="{{ old('title', $lab->title) }}" required>
            </div>
            <div class="vla-field">
                <label for="lab-order">Sort Order *</label>
                <input id="lab-order" type="number" name="sort_order" value="{{ old('sort_order', $lab->sort_order ?? 1) }}" required>
            </div>
        </div>

        <div class="vla-field">
            <label for="lab-href">Lab Detail URL Path * (must start with <code>/web-security/</code>)</label>
            <input id="lab-href" type="text" name="href" value="{{ old('href', $lab->href ?: '/web-security/sql-injection/lab-custom-') }}" required>
        </div>

        <div class="vla-field">
            <label for="lab-desc">Description (HTML or plain text) *</label>
            <textarea id="lab-desc" name="description_html" rows="4" required>{{ old('description_html', $lab->description_html) }}</textarea>
        </div>

        <div class="vla-grid vla-grid--2">
            <div class="vla-field">
                <label for="lab-hint">Hint Section (Optional)</label>
                <textarea id="lab-hint" name="hint_text" rows="3">{{ old('hint_text', $hintDefault) }}</textarea>
            </div>
            <div class="vla-field">
                <label for="lab-sol">Solution Section (Optional)</label>
                <textarea id="lab-sol" name="solution_text" rows="3">{{ old('solution_text', $solDefault) }}</textarea>
            </div>
        </div>

        <div class="vla-field">
            <label for="lab-payloads">Solution Payloads (1 accepted payload per line)</label>
            <textarea id="lab-payloads" name="solution_payloads" rows="3">{{ old('solution_payloads', $payloadsDefault) }}</textarea>
        </div>

        @php $hasOld = session()->hasOldInput(); @endphp
        <div class="vla-badge-row" style="margin-bottom:18px">
            <label><input type="checkbox" name="has_my_account" value="1" @checked($hasOld ? (bool) old('has_my_account') : !empty($prof['hasMyAccount']))> My Account</label>
            <label><input type="checkbox" name="has_admin_panel" value="1" @checked($hasOld ? (bool) old('has_admin_panel') : !empty($prof['hasAdminPanel']))> Admin Panel</label>
            <label><input type="checkbox" name="has_live_chat" value="1" @checked($hasOld ? (bool) old('has_live_chat') : !empty($prof['hasLiveChat']))> Live Chat</label>
            <label><input type="checkbox" name="has_exploit_server" value="1" @checked($hasOld ? (bool) old('has_exploit_server') : !empty($prof['hasExploitServer']))> Exploit Server</label>
            <label><input type="checkbox" name="has_email_client" value="1" @checked($hasOld ? (bool) old('has_email_client') : !empty($prof['hasEmailClient']))> Email Client</label>
            <label><input type="checkbox" name="has_submit_solution" value="1" @checked($hasOld ? (bool) old('has_submit_solution') : !empty($prof['hasSubmitSolution']))> Submit Solution</label>
            <label><input type="checkbox" name="has_cart" value="1" @checked($hasOld ? (bool) old('has_cart') : !empty($prof['hasCart']))> Cart</label>
        </div>

        <div class="vla-btn-group">
            <button type="submit" class="vla-btn vla-btn--primary">{{ __('academy.owner.save') }}</button>
            <a href="/owner/labs" class="vla-btn vla-btn--outline">{{ __('academy.owner.cancel') }}</a>
        </div>
    </form>
</div>
@endsection
