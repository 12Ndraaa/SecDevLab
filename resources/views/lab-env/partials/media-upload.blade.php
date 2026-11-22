<div class="lw-store-hero">
    <div>
        <span class="lw-pill lw-pill--emerald">MEDIA STUDIO // FILE UPLOAD VULNERABILITIES</span>
        <h2 style="margin:6px 0 2px;color:var(--lw-heading)">Creator Avatar &amp; Media Storage Portal</h2>
        <p class="lw-muted" style="margin:0">Upload user avatars via <code>POST {{ $basePath }}/my-account/avatar</code> and inspect execution inside sandboxed virtual storage.</p>
    </div>
    <span class="lw-token-chip">Rule: {{ strtoupper((string) ($profile['uploadRule'] ?? 'standard')) }}</span>
</div>

@if ($activeView === 'upload-result')
    <div class="lw-alert lw-alert--success">{{ $uploadMsg }}</div>
@endif

<div class="lw-studio-shell">
    <div class="lw-card">
        <div class="lw-studio-avatar-card">
            <img class="avatar" src="{{ $avatarSrc }}" alt="Avatar" style="width:74px;height:74px;border-radius:50%;object-fit:cover;border:2.5px solid var(--lw-arch-accent)">
            <div>
                @if ($currentUser !== '')
                    <div id="account-details">
                        <p style="margin:0 0 4px">Your username is: <strong>{{ $currentUser }}</strong></p>
                        <p style="margin:0" class="lw-muted">Your API Key is: <code>{{ $wienerApiKey }}</code></p>
                    </div>
                @else
                    <p style="margin:0 0 4px"><strong>Guest Media Session</strong></p>
                    <p class="lw-muted" style="margin:0">Sign in as <code>wiener:peter</code> or test multipart uploads directly.</p>
                @endif
            </div>
        </div>

        <form id="avatar-upload-form" action="{{ $basePath }}/my-account/avatar" method="POST" enctype="multipart/form-data" class="lw-form">
            <div class="lw-upload-dropzone">
                <div class="lw-upload-dropzone__head">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="17 8 12 3 7 8"/>
                        <line x1="12" y1="3" x2="12" y2="15"/>
                    </svg>
                    <label for="avatar-file-input" style="margin:0">Select Avatar File (<code>multipart/form-data</code>)</label>
                </div>
                <input type="file" name="avatar" id="avatar-file-input" required>
                <div class="lw-muted" style="margin-top:8px;font-size:0.78rem">Stored inside isolated per-session MySQL blob vault at <code>{{ $basePath }}/files/</code></div>
            </div>
            <input type="hidden" name="user" value="{{ $currentUser ?: 'wiener' }}">
            <input type="hidden" name="csrf" value="{{ $csrfToken }}">
            <div style="margin-top:12px">
                <button type="submit" class="lw-btn lw-btn--primary">Upload Avatar</button>
            </div>
        </form>

        @if ($currentUser === '')
            <hr style="border:none;border-top:1px solid var(--lw-border);margin:18px 0">
            <form id="login-form" method="POST" action="{{ $basePath }}/login" class="lw-form">
                <h4 style="margin-bottom:6px">Account Login (Demo: <code>wiener:peter</code>)</h4>
                <label for="login-user">Username</label>
                <input type="text" name="username" id="login-user" value="{{ $userParam }}" required>
                <label for="login-pass">Password</label>
                <input type="password" name="password" id="login-pass">
                <div style="margin-top:12px">
                    <button type="submit" class="lw-btn">Log in</button>
                </div>
            </form>
        @endif
    </div>

    <div class="lw-card">
        <div style="display:flex;justify-content:space-between;align-items:center;gap:8px;margin-bottom:10px">
            <h3 style="margin:0">Virtual Storage Vault</h3>
            <span class="lw-pill lw-pill--emerald">{{ $uploadedFiles->count() }} {{ $uploadedFiles->count() === 1 ? 'File' : 'Files' }}</span>
        </div>
        <p class="lw-muted" style="margin:0 0 14px">Target secret path: <code>/home/carlos/secret</code></p>

        @if ($uploadedFiles->isEmpty())
            <div class="lw-alert lw-alert--info" style="margin:0 0 14px">
                No custom files uploaded yet.
            </div>
            <div class="lw-vault-list">
                <div class="lw-vault-item">
                    <div style="min-width:0">
                        <div class="lw-mono" style="font-size:0.82rem;font-weight:700">avatars/default.jpg</div>
                        <div class="lw-muted" style="font-size:0.76rem">image/jpeg &bull; {{ $basePath }}/files/avatars/default.jpg</div>
                    </div>
                    <span class="lw-pill">DEFAULT</span>
                </div>
            </div>
        @else
            <div class="lw-vault-list">
                @foreach ($uploadedFiles as $uf)
                    <div class="lw-vault-item">
                        <div style="min-width:0">
                            <div class="lw-mono" style="font-size:0.82rem;font-weight:700;word-break:break-all">{{ $uf->storage_key }}</div>
                            <div class="lw-muted" style="font-size:0.76rem">{{ $uf->content_type }} &bull; {{ $basePath }}/files/{{ $uf->storage_key }}</div>
                        </div>
                        <a class="lw-btn lw-btn--accent" href="{{ $basePath }}/files/{{ $uf->storage_key }}">Execute / Fetch</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
