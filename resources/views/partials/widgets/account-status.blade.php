@if($largeView)
@php
    $pct = (int) round(($totalSolved / $allTotal) * 100);
    $appPct = (int) round(($counts['APPRENTICE']['solved'] / $counts['APPRENTICE']['total']) * 100);
    $pracPct = (int) round(($counts['PRACTITIONER']['solved'] / $counts['PRACTITIONER']['total']) * 100);
    $expPct = (int) round(($counts['EXPERT']['solved'] / $counts['EXPERT']['total']) * 100);
@endphp
<div class="dashboard-progress-grid">
    <div class="dashboard-progress-card">
        <span class="label-light-green-small">APPRENTICE</span>
        <h4>{{ $counts['APPRENTICE']['solved'] }} / {{ $counts['APPRENTICE']['total'] }} Labs Solved ({{ $appPct }}%)</h4>
        <div class="dashboard-bar-track"><div class="dashboard-bar-fill vla-fill-apprentice" style="width:{{ $appPct }}%"></div></div>
    </div>
    <div class="dashboard-progress-card">
        <span class="label-light-blue-small">PRACTITIONER</span>
        <h4>{{ $counts['PRACTITIONER']['solved'] }} / {{ $counts['PRACTITIONER']['total'] }} Labs Solved ({{ $pracPct }}%)</h4>
        <div class="dashboard-bar-track"><div class="dashboard-bar-fill vla-fill-practitioner" style="width:{{ $pracPct }}%"></div></div>
    </div>
    <div class="dashboard-progress-card">
        <span class="label-purple-small">EXPERT</span>
        <h4>{{ $counts['EXPERT']['solved'] }} / {{ $counts['EXPERT']['total'] }} Labs Solved ({{ $expPct }}%)</h4>
        <div class="dashboard-bar-track"><div class="dashboard-bar-fill vla-fill-expert" style="width:{{ $expPct }}%"></div></div>
    </div>
    <div class="dashboard-progress-card dashboard-progress-card--summary">
        <div>
            <strong class="vla-summary-stat">{{ __('academy.dashboard.total_progress') }}: {{ $totalSolved }} / {{ $allTotal }} ({{ $pct }}%)</strong>
            <div class="dashboard-bar-track"><div class="dashboard-bar-fill vla-fill-total" style="width:{{ $pct }}%"></div></div>
            @guest
                <p class="vla-muted-sm" style="margin-top:10px">{{ __('academy.dashboard.guest_notice') }}</p>
            @endguest
        </div>
        <div class="vla-btn-group" style="margin-top:14px">
            <a class="vla-btn vla-btn--primary vla-btn--sm" href="/web-security/all-labs">{{ __('academy.nav.all_labs') }}</a>
            <a class="vla-btn vla-btn--outline vla-btn--sm" href="/web-security/mystery-lab-challenge">{{ __('academy.nav.mystery') }}</a>
        </div>
    </div>
</div>
@else
<input class="hidden" id="trackerpopup" type="checkbox">
<div class="widgetcontainer-box is-twobtns academy-account-status pin-to-bottom {{ $user ? 'is-logged-in' : 'is-logged-out' }}" id="AcademyAccountStatusWidget">
    @if($user)
        <p class="hidden-when-collapsed">{{ $user->name }}: {{ $totalSolved }} / {{ $allTotal }} Labs Solved</p>
        <div class="flex-center">
            <a class="button-orange-small" href="/web-security/dashboard">{{ __('academy.nav.dashboard') }}</a>
            <a class="button-white-small" href="/web-security/all-labs">{{ __('academy.nav.all_labs') }}</a>
        </div>
    @else
        <p class="hidden-when-collapsed">{{ __('academy.dashboard.guest_notice') }}</p>
        <div class="flex-center">
            <a class="button-orange-small" href="/users/register">{{ __('academy.nav.register') }}</a>
            <a class="button-white-small" href="/users">{{ __('academy.nav.login') }}</a>
        </div>
    @endif
</div>
@endif
