<div class="vla-subnav">
    <a href="/owner" class="{{ request()->is('owner') ? 'is-active' : '' }}">{{ __('academy.owner.nav_overview') }}</a>
    <a href="/owner/cves" class="{{ request()->is('owner/cves*') ? 'is-active' : '' }}">{{ __('academy.owner.nav_cves') }}</a>
    <a href="/owner/categories" class="{{ request()->is('owner/categories*') ? 'is-active' : '' }}">{{ __('academy.owner.nav_categories') }}</a>
    <a href="/owner/labs" class="{{ request()->is('owner/labs*') ? 'is-active' : '' }}">{{ __('academy.owner.nav_labs') }}</a>
    <a href="/owner/users" class="{{ request()->is('owner/users*') ? 'is-active' : '' }}">{{ __('academy.owner.nav_users') }}</a>
</div>
