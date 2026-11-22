<div class="lw-workbench-banner">
    <div>
        <span class="lw-pill lw-pill--emerald">MEDIA PORTAL // FILE UPLOAD VULNERABILITIES</span>
        <h2 style="margin:6px 0 2px;color:var(--lw-heading)">User Avatar &amp; Media Storage Portal</h2>
        <p class="lw-muted" style="margin:0">Upload user avatars via <code>POST {{ $basePath }}/my-account/avatar</code> and inspect execution inside sandboxed virtual storage.</p>
    </div>
    <span class="lw-token-chip">Upload Rule: {{ strtoupper((string) ($profile['uploadRule'] ?? 'standard')) }}</span>
</div>

@if ($activeView === 'upload-result')
    <div class="lw-alert lw-alert--success">{{ $uploadMsg }}</div>
@endif

<div class="lw-grid lw-grid--split">
    <div class="lw-card">
        <div style="display:flex;gap:14px;align-items:center;margin-bottom:16px">
            <img class="avatar" src="{{ $avatarSrc }}" alt="Avatar" style="width:76px;height:76px;border-radius:50%;object-fit:cover;border:2px solid var(--lw-orange)">
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
            <label for="avatar-file-input">Upload Avatar File (<code>multipart/form-data</code>):</label>
            <input type="file" name="avatar" id="avatar-file-input" required>
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

    <div class="lw-terminal">
        <div class="lw-terminal__bar">
            <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
            <span>VIRTUAL_STORAGE // {{ $basePath }}/files/</span>
        </div>
        <div class="lw-terminal__body">@if ($uploadedFiles->isEmpty())No custom files uploaded in this session yet.
Default avatar: {{ $basePath }}/files/avatars/default.jpg
Target secret file: /home/carlos/secret@else
Uploaded files in this isolated session:
@foreach ($uploadedFiles as $uf)
- {{ $uf->storage_key }} ({{ $uf->content_type }}) -> {{ $basePath }}/files/{{ $uf->storage_key }}
@endforeach
@endif</div>
    </div>
</div>

@if ($uploadedFiles->isNotEmpty())
    <div class="lw-card" style="margin-top:18px">
        <h3>Uploaded Session Files</h3>
        <div style="display:flex;flex-wrap:wrap;gap:8px">
            @foreach ($uploadedFiles as $uf)
                <a class="lw-btn lw-btn--accent" href="{{ $basePath }}/files/{{ $uf->storage_key }}">Execute / Fetch {{ $uf->storage_key }}</a>
            @endforeach
        </div>
    </div>
@endif
