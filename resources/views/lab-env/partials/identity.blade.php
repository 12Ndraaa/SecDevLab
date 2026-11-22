<div class="lw-workbench-banner">
    <div>
        <span class="lw-pill lw-pill--info">IDENTITY &amp; ACCESS // {{ strtoupper($lab->category_id) }}</span>
        <h2 style="margin:6px 0 2px;color:var(--lw-heading)">
            @if ($activeView === 'jwt-workbench')
                JWT Token &amp; Claim Verification Workbench
            @elseif ($activeView === 'oauth-workbench')
                OAuth 2.0 Client &amp; Redirect Workbench
            @elseif ($lab->category_id === 'cross-site-request-forgery-csrf')
                Account Profile &amp; CSRF Email Target
            @else
                Authentication &amp; Access Control Portal
            @endif
        </h2>
        <p class="lw-muted" style="margin:0">Inspect active credentials, session tokens, email change flows, or administrative access boundaries.</p>
    </div>
    <span class="lw-token-chip">Role: {{ $currentUser === 'administrator' ? 'ADMIN' : ($currentUser !== '' ? strtoupper($currentUser) : 'ANONYMOUS') }}</span>
</div>

<div class="lw-grid lw-grid--split">
    <div class="lw-card">
        @if ($currentUser !== '')
            <div id="account-details" style="margin-bottom:16px">
                <p style="margin:0 0 6px">Your username is: <strong>{{ $currentUser }}</strong></p>
                <p style="margin:0">Your API Key is: <code>{{ $wienerApiKey }}</code></p>
            </div>
        @else
            <form id="login-form" method="POST" action="{{ $basePath }}/login" class="lw-form">
                <h3 style="margin-bottom:4px">Sign In</h3>
                <p class="lw-muted" style="margin-top:0">Standard test credentials: <code>wiener:peter</code></p>
                <label for="login-user">Username</label>
                <input type="text" name="username" id="login-user" value="{{ $userParam }}" required>
                <label for="login-pass">Password</label>
                <input type="password" name="password" id="login-pass">
                <div style="margin-top:12px">
                    <button type="submit" class="lw-btn lw-btn--primary">Log in</button>
                </div>
            </form>
        @endif

        @if (!empty($profile['hasChangeEmail']) || $currentUser !== '')
            <hr style="border:none;border-top:1px solid var(--lw-border);margin:18px 0">
            <form class="lw-form" method="POST" action="{{ $basePath }}/my-account/change-email">
                <h4 style="margin:0 0 4px">Update Account Email</h4>
                <input type="hidden" name="action" value="change-email">
                <label for="acct-email">Email</label>
                <input type="email" name="email" id="acct-email" value="wiener@normal-user.net" required>
                <div style="margin-top:10px">
                    <button type="submit" class="lw-btn lw-btn--primary">Update email</button>
                </div>
            </form>
        @endif

        @if ($activeView === 'jwt-workbench' || $lab->category_id === 'jwt')
            <hr style="border:none;border-top:1px solid var(--lw-border);margin:18px 0">
            <form method="POST" action="{{ $basePath }}/jwt" class="lw-form">
                <h4 style="margin:0 0 4px">Submit / Replay Forged JWT</h4>
                <label for="jwt-token-input">Bearer / Session JWT:</label>
                <textarea id="jwt-token-input" name="jwtToken" rows="3" class="lw-mono" placeholder="eyJ...">{{ $params['jwtToken'] ?? $sessionJwt }}</textarea>
                <div style="margin-top:10px">
                    <button type="submit" class="lw-btn lw-btn--primary">Verify JWT Against Endpoint</button>
                </div>
            </form>
        @endif

        @if ($activeView === 'oauth-workbench' || $lab->category_id === 'oauth-authentication')
            <hr style="border:none;border-top:1px solid var(--lw-border);margin:18px 0">
            <form method="GET" action="{{ $basePath }}/oauth" class="lw-form">
                <h4 style="margin:0 0 4px">OAuth 2.0 Authorization Request Simulator</h4>
                <label for="oauth-client">client_id:</label>
                <input type="text" id="oauth-client" name="client_id" value="{{ $params['client_id'] ?? 'secdevlab_oauth_client' }}">
                <label for="oauth-redirect">redirect_uri:</label>
                <input type="text" id="oauth-redirect" name="redirect_uri" value="{{ $params['redirect_uri'] ?? $basePath.'/oauth/callback' }}" class="lw-mono">
                <label for="oauth-type">response_type:</label>
                <select id="oauth-type" name="response_type">
                    <option value="code" @selected(($params['response_type'] ?? 'code') === 'code')>code</option>
                    <option value="token" @selected(($params['response_type'] ?? '') === 'token')>token</option>
                </select>
                <div style="margin-top:10px">
                    <button type="submit" class="lw-btn lw-btn--primary">Send OAuth Authorization Request</button>
                </div>
            </form>
        @endif
    </div>

    <div class="lw-terminal">
        <div class="lw-terminal__bar">
            <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
            <span>IDENTITY_TELEMETRY // {{ strtoupper($lab->category_id) }}</span>
        </div>
        <div class="lw-terminal__body">Session User : {{ $currentUser !== '' ? $currentUser : 'unauthenticated' }}
Admin Access : {{ ($validLoginTriggered || str_contains($cookieHeader, 'Admin=true')) ? 'UNLOCKED' : 'RESTRICTED' }}
@if ($lab->category_id === 'jwt')
Issued JWT   : {{ $sessionJwt }}
@endif
@if (!empty($workbenchOutput['headline']))

[{{ $workbenchOutput['status'] }}] {{ $workbenchOutput['headline'] }}
{{ $workbenchOutput['body'] }}
@endif</div>
    </div>
</div>
