@extends('layouts.academy')

@section('title', ($isEdit ? 'Edit User' : __('academy.owner.create_user')).' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <h1>{{ $isEdit ? 'Edit User: '.$managedUser->name : __('academy.owner.create_user') }}</h1>
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
            <label for="usr-name">Full Name *</label>
            <input id="usr-name" type="text" name="name" value="{{ old('name', $managedUser->name) }}" required>
        </div>

        <div class="vla-field">
            <label for="usr-email">Email Address *</label>
            <input id="usr-email" type="email" name="email" value="{{ old('email', $managedUser->email) }}" required>
        </div>

        <div class="vla-field">
            <label for="usr-role">Role *</label>
            <select id="usr-role" name="role" required>
                <option value="user" @selected(old('role', $managedUser->role) === 'user')>User (Learner)</option>
                <option value="owner" @selected(old('role', $managedUser->role) === 'owner')>Owner (Administrator)</option>
            </select>
        </div>

        <div class="vla-field">
            <label for="usr-pass">{{ $isEdit ? 'New Password (leave blank to keep current)' : 'Password * (min 6 chars)' }}</label>
            <input id="usr-pass" type="password" name="password" {{ $isEdit ? '' : 'required' }} minlength="6">
        </div>

        <div class="vla-btn-group">
            <button type="submit" class="vla-btn vla-btn--primary">{{ __('academy.owner.save') }}</button>
            <a href="/owner/users" class="vla-btn vla-btn--outline">{{ __('academy.owner.cancel') }}</a>
        </div>
    </form>

    @if ($isEdit && isset($summary))
        <hr style="margin:22px 0;border-color:var(--vla-border)">
        <p class="vla-muted-sm">Solved Labs: <strong>{{ $summary['total_solved'] }}</strong> ({{ $summary['points'] }} pts)</p>
        <form method="POST" action="/owner/users/{{ $managedUser->id }}/reset-progress">
            @csrf
            <button type="submit" class="vla-btn vla-btn--danger vla-btn--sm">{{ __('academy.owner.reset_progress') }}</button>
        </form>
    @endif
</div>
@endsection
