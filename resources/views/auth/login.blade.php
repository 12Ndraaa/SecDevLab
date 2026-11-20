@extends('layouts.academy')

@section('title', __('academy.auth.login_title').' | '.config('app.name'))

@section('content')
<div class="ps-auth-card">
    <h1 style="margin-bottom:8px">{{ __('academy.auth.login_title') }}</h1>
    <p class="vla-muted-sm" style="margin-bottom:18px">{{ __('academy.auth.login_desc') }}</p>

    @if ($errors->any())
        <div class="vla-alert vla-alert--error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if (session('status'))
        <div class="vla-alert vla-alert--success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="/users">
        @csrf
        @if (!empty($returnUrl))
            <input type="hidden" name="returnurl" value="{{ $returnUrl }}">
        @endif

        <label for="login-email">{{ __('academy.auth.email') }}</label>
        <input id="login-email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

        <label for="login-password">{{ __('academy.auth.password') }}</label>
        <input id="login-password" type="password" name="password" required autocomplete="current-password">

        <div style="margin-top:18px">
            <button type="submit" class="vla-btn vla-btn--primary" style="width:100%">{{ __('academy.auth.login_btn') }}</button>
        </div>
    </form>

    <p class="vla-muted-sm" style="margin-top:16px">
        {{ __('academy.auth.no_account') }}
        <a href="/users/register{{ !empty($returnUrl) ? '?returnurl='.urlencode($returnUrl) : '' }}">{{ __('academy.nav.register') }}</a>
    </p>

    <div class="highlightedarea" style="margin-top:18px;margin-bottom:0">
        <strong>{{ __('academy.auth.demo_accounts') }}</strong>
        <ul style="margin:8px 0 0;padding-left:18px;font-size:0.84rem">
            <li><strong>Owner:</strong> <code>owner@secdevlab.local</code> / <code>owner12345</code></li>
            <li><strong>User:</strong> <code>user@secdevlab.local</code> / <code>user12345</code></li>
        </ul>
    </div>
</div>
@endsection
