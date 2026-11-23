@extends('layouts.academy')

@section('title', ($isEdit ? __('academy.owner.edit_user_title') : __('academy.owner.create_user')).' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <h1>{{ $isEdit ? __('academy.owner.edit_user_heading', ['name' => $managedUser->name]) : __('academy.owner.create_user') }}</h1>
    <a href="/owner/users" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.owner.cancel') }}</a>
</div>

@include('owner._nav')

@if ($errors->any())
    <div class="vla-alert vla-alert--error">
        @foreach ($errors->all() as $err)
            <div>{{ $err }}</div>
        @endforeach
    </div>
@endif

<div class="vla-card" style="max-width:640px">
    <form method="POST" action="{{ $isEdit ? '/owner/users/'.$managedUser->id : '/owner/users' }}" class="vla-form">
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif

        <div class="vla-field">
            <label for="usr-name">{{ __('academy.owner.user_name_req') }}</label>
            <input id="usr-name" type="text" name="name" value="{{ old('name', $managedUser->name) }}" required>
        </div>

        <div class="vla-field">
            <label for="usr-email">{{ __('academy.owner.user_email_req') }}</label>
            <input id="usr-email" type="email" name="email" value="{{ old('email', $managedUser->email) }}" required>
        </div>

        <div class="vla-field">
            <label for="usr-role">{{ __('academy.owner.user_role_req') }}</label>
            <select id="usr-role" name="role" required>
                <option value="user" @selected(old('role', $managedUser->role) === 'user')>{{ __('academy.owner.role_user_opt') }}</option>
                <option value="owner" @selected(old('role', $managedUser->role) === 'owner')>{{ __('academy.owner.role_owner_opt') }}</option>
            </select>
        </div>

        <div class="vla-field">
            <label for="usr-pass">{{ $isEdit ? __('academy.owner.password_keep_hint') : __('academy.owner.password_min_hint') }}</label>
            <input id="usr-pass" type="password" name="password" {{ $isEdit ? '' : 'required' }} minlength="6">
        </div>

        <div class="vla-btn-group">
            <button type="submit" class="vla-btn vla-btn--primary">{{ __('academy.owner.save') }}</button>
            <a href="/owner/users" class="vla-btn vla-btn--outline">{{ __('academy.owner.cancel') }}</a>
        </div>
    </form>

    @if ($isEdit && isset($summary))
        <hr style="margin:22px 0;border-color:var(--vla-border)">
        <p class="vla-muted-sm">{{ __('academy.owner.col_solved_labs') }}: <strong>{{ $summary['total_solved'] }}</strong> ({{ $summary['points'] }} {{ __('academy.common.pts') }})</p>
        <form method="POST" action="/owner/users/{{ $managedUser->id }}/reset-progress">
            @csrf
            <button type="submit" class="vla-btn vla-btn--danger vla-btn--sm">{{ __('academy.owner.reset_progress') }}</button>
        </form>
    @endif
</div>
@endsection
