<div class="vla-cta-banner no-print">
    <div class="vla-cta-banner__inner">
        <div>
            <h3>
                @if($user)
                    {{ __('academy.nav.dashboard') }}: {{ $user->name }}
                @else
                    {{ config('app.name') ?: 'SecDevLab' }}
                @endif
            </h3>
            <ul>
                <li>{{ __('academy.home.step2_desc') }}</li>
                <li>{{ __('academy.home.step3_desc') }}</li>
                <li>{{ __('academy.home.step4_desc') }}</li>
            </ul>
        </div>
        <div class="vla-cta-banner__actions">
            @if($user)
                <a class="vla-btn vla-btn--primary" href="/web-security/dashboard">{{ __('academy.nav.dashboard') }}</a>
                <a class="vla-btn vla-btn--outline" href="/certificate">{{ __('academy.nav.certificate') }}</a>
            @else
                <a class="vla-btn vla-btn--primary" href="/users/register">{{ __('academy.nav.register') }}</a>
                <a class="vla-btn vla-btn--outline" href="/users">{{ __('academy.nav.login') }}</a>
            @endif
        </div>
    </div>
</div>
