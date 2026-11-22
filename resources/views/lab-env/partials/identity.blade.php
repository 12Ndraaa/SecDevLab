<div class="lw-iam-header">
    <div class="lw-iam-brand">
        <span class="lw-iam-emblem" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
        </span>
        <div>
            <span class="lw-pill lw-pill--info">IDENTITY &amp; ACCESS // {{ strtoupper($lab->category_id) }}</span>
            <h2 style="margin:4px 0 0;color:var(--lw-heading);font-size:1.18rem">
                @if ($activeView === 'jwt-workbench')
                    JWT Token &amp; Claim Verification Workbench
                @elseif ($activeView === 'oauth-workbench')
                    OAuth 2.0 Client &amp; Redirect Workbench
                @elseif ($lab->category_id === 'cross-site-request-forgery-csrf')
                    Account Profile &amp; CSRF Email Target
                @else
                    SSO / Identity &amp; Access Control Portal
                @endif
            </h2>
        </div>
    </div>
    <span class="lw-token-chip">Principal: {{ $currentUser === 'administrator' ? 'ADMIN' : ($currentUser !== '' ? strtoupper($currentUser) : 'ANONYMOUS') }}</span>
</div>

<div class="lw-identity-grid">
    <div class="lw-card">
        @if ($currentUser !== '')
            <div id="account-details" style="padding:14px;border-radius:10px;background:var(--lw-surface-2);border:1px solid var(--lw-border);margin-bottom:16px">
                <p style="margin:0 0 6px">Your username is: <strong>{{ $currentUser }}</strong></p>
                <p style="margin:0">Your API Key is: <code>{{ $wienerApiKey }}</code></p>
            </div>
        @else
            <form id="login-form" method="POST" action="{{ $basePath }}/login" class="lw-form">
                <h3 style="margin-bottom:4px">SSO / Account Sign In</h3>
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

    <div style="display:flex;flex-direction:column;gap:16px">
        <div class="lw-card">
            <h3 style="margin-bottom:10px">Identity Security Posture</h3>
            <div class="lw-receipt-row"><span>Session Principal</span><strong class="lw-mono">{{ $currentUser !== '' ? $currentUser : 'unauthenticated' }}</strong></div>
            <div class="lw-receipt-row"><span>Admin Boundary</span><span class="lw-pill {{ ($validLoginTriggered || str_contains($cookieHeader, 'Admin=true')) ? 'lw-pill--emerald' : 'lw-pill--warning' }}">{{ ($validLoginTriggered || str_contains($cookieHeader, 'Admin=true')) ? 'UNLOCKED' : 'RESTRICTED' }}</span></div>
            <div class="lw-receipt-row"><span>Anti-CSRF Token</span><code class="lw-mono" style="font-size:0.74rem">{{ substr((string) $csrfToken, 0, 14) }}&hellip;</code></div>

            @if ($lab->category_id === 'jwt')
                @php $jwtParts = explode('.', (string) $sessionJwt); @endphp
                <div style="margin-top:14px">
                    <div class="lw-muted" style="font-size:0.78rem;margin-bottom:6px">Issued Session JWT (Header . Payload . Signature)</div>
                    <div class="lw-jwt-segments">
                        <span class="lw-jwt-part--hdr">{{ $jwtParts[0] ?? '' }}</span>.<span class="lw-jwt-part--pld">{{ $jwtParts[1] ?? '' }}</span>.<span class="lw-jwt-part--sig">{{ $jwtParts[2] ?? '' }}</span>
                    </div>
                </div>
            @endif

            @if (!empty($workbenchOutput['headline']))
                <div class="lw-alert {{ $autoSolved ? 'lw-alert--success' : 'lw-alert--info' }}" style="margin-top:14px;margin-bottom:0">
                    <div style="font-size:0.76rem;text-transform:uppercase;letter-spacing:0.04em">[{{ $workbenchOutput['status'] }}] {{ $workbenchOutput['headline'] }}</div>
                    <div class="lw-mono" style="font-size:0.8rem;margin-top:4px;white-space:pre-wrap">{{ $workbenchOutput['body'] }}</div>
                </div>
            @endif
        </div>
    </div>
</div>
