<div class="vla-btn-group">
    @auth
        <a class="vla-btn vla-btn--accent vla-btn--sm" href="/users/youraccount/personaldetails">
            {{ Auth::user()->name }}
            <span class="vla-badge {{ Auth::user()->isOwner() ? 'vla-badge--orange' : 'vla-badge--muted' }}" style="padding:1px 6px;font-size:0.65rem">{{ strtoupper(Auth::user()->role) }}</span>
        </a>
        <form method="POST" action="/users/logout" class="vla-inline-form">
            @csrf
            <button type="submit" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.nav.logout') }}</button>
        </form>
    @else
        <a class="vla-btn vla-btn--primary vla-btn--sm" href="/users/register">{{ __('academy.nav.register') }}</a>
        <a class="vla-btn vla-btn--outline vla-btn--sm" href="/users">{{ __('academy.nav.login') }}</a>
    @endauth
</div>
