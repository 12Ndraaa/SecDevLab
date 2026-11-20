@extends('layouts.academy')

@section('title', __('academy.auth.register_title').' | '.config('app.name'))

@section('content')
<div class="ps-auth-card">
    <h1 style="margin-bottom:8px">{{ __('academy.auth.register_title') }}</h1>
    <p class="vla-muted-sm" style="margin-bottom:18px">{{ __('academy.auth.register_desc') }}</p>

    @if ($errors->any())
        <div class="vla-alert vla-alert--error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/users/register">
        @csrf
        @if (!empty($returnUrl))
            <input type="hidden" name="returnurl" value="{{ $returnUrl }}">
        @endif

        <label for="reg-name">{{ __('academy.auth.name') }}</label>
        <input id="reg-name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name">

        <label for="reg-email">{{ __('academy.auth.email') }}</label>
        <input id="reg-email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

        <label for="reg-password">{{ __('academy.auth.password') }}</label>
        <input id="reg-password" type="password" name="password" required minlength="6" autocomplete="new-password">

        <label for="reg-password-confirm">{{ __('academy.auth.password_confirm') }}</label>
        <input id="reg-password-confirm" type="password" name="password_confirmation" required minlength="6" autocomplete="new-password">

        <div style="margin-top:18px">
            <button type="submit" class="vla-btn vla-btn--primary" style="width:100%">{{ __('academy.auth.register_btn') }}</button>
        </div>
    </form>

    <p class="vla-muted-sm" style="margin-top:16px">
        {{ __('academy.auth.has_account') }}
        <a href="/users{{ !empty($returnUrl) ? '?returnurl='.urlencode($returnUrl) : '' }}">{{ __('academy.nav.login') }}</a>
    </p>
</div>
@endsection
