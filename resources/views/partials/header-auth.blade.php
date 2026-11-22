<div class="vla-auth-cluster">
    @auth
        <details class="vla-account-dropdown">
            <summary class="vla-account-pill" title="{{ Auth::user()->name }}">
                <span class="vla-account-pill__avatar" aria-hidden="true">{{ strtoupper(substr((string) Auth::user()->name, 0, 1)) }}</span>
                <span class="vla-account-pill__name">{{ Auth::user()->name }}</span>
                <span class="vla-role-pill {{ Auth::user()->isOwner() ? 'vla-role-pill--owner' : 'vla-role-pill--user' }}">{{ strtoupper(Auth::user()->role) }}</span>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
            </summary>
            <div class="vla-account-dropdown__menu">
                <div class="vla-account-dropdown__head">
                    <strong>{{ Auth::user()->name }}</strong>
                    <span>{{ Auth::user()->email }}</span>
                </div>
                <a href="/users/youraccount/personaldetails">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <span>{{ __('academy.nav.account') }}</span>
                </a>
                <a href="/certificate">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                    <span>{{ __('academy.nav.certificate') }}</span>
                </a>
                @if (Auth::user()->isOwner())
                    <a href="/owner">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                        <span>{{ __('academy.nav.owner_panel') }}</span>
                    </a>
                @endif
                <form method="POST" action="/users/logout" class="vla-account-dropdown__logout">
                    @csrf
                    <button type="submit">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        <span>{{ __('academy.nav.logout') }}</span>
                    </button>
                </form>
            </div>
        </details>
    @else
        <a class="vla-btn vla-btn--ghost vla-btn--sm" href="/users">{{ __('academy.nav.login') }}</a>
        <a class="vla-btn vla-btn--primary vla-btn--sm" href="/users/register">{{ __('academy.nav.register') }}</a>
    @endauth
</div>
