<div class="lw-chat-shell">
    <div class="lw-card">
        <div class="lw-chat-topbar">
            <div style="display:flex;align-items:center;gap:10px;min-width:0">
                <span class="lw-iam-emblem" style="width:36px;height:36px" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                </span>
                <div style="min-width:0">
                    <h2 style="margin:0;font-size:1.08rem;color:var(--lw-heading)">
                        {{ $lab->category_id === 'websockets' ? __('academy.workbench.ws_title') : __('academy.workbench.ai_title') }}
                    </h2>
                    <div class="lw-muted" style="font-size:0.78rem">
                        {{ $lab->category_id === 'websockets'
                            ? __('academy.workbench.ws_sub')
                            : __('academy.workbench.ai_sub') }}
                    </div>
                </div>
            </div>
            <span class="lw-pill lw-pill--emerald">{{ __('academy.workbench.nav_live_chat') }} &bull; {{ $labUiLocale === 'id' ? 'Aktif' : 'Active' }}</span>
        </div>

        <div id="chat-log" class="lw-chat-log">
            <div class="lw-chat-row">
                <span class="lw-chat-avatar" aria-hidden="true">AI</span>
                <div class="lw-chat-entry lw-chat-entry--bot">
                    <div class="lw-chat-entry__meta">Arti Ficial</div>
                    <div>{{ __('academy.workbench.ai_greeting') }}</div>
                </div>
            </div>
            @foreach ($chatHistory as $entry)
                @php
                    $isBot = stripos((string) ($entry['sender'] ?? ''), 'arti') !== false || stripos((string) ($entry['sender'] ?? ''), 'system') !== false;
                    $senderLabel = $isBot ? $entry['sender'] : __('academy.workbench.you_label');
                @endphp
                <div class="lw-chat-row {{ $isBot ? '' : 'lw-chat-row--user' }}">
                    <span class="lw-chat-avatar" aria-hidden="true">{{ $isBot ? 'AI' : __('academy.workbench.you_avatar') }}</span>
                    <div class="lw-chat-entry {{ $isBot ? 'lw-chat-entry--bot' : 'lw-chat-entry--user' }}">
                        <div class="lw-chat-entry__meta">{{ $senderLabel }}</div>
                        <div><strong>{{ $senderLabel }}:</strong> {{ $entry['text'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <form method="POST" action="{{ $basePath }}/chat" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap">
            <input type="text" name="message" id="chat-input" placeholder="{{ __('academy.workbench.chat_placeholder') }}" style="flex:1 1 220px" required>
            <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.send_btn') }}</button>
        </form>
    </div>

    <div class="lw-receipt-panel">
        <div style="display:flex;justify-content:space-between;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:12px">
            <h3 style="margin:0;font-size:0.98rem">{{ $lab->category_id === 'websockets' ? __('academy.workbench.ws_audit_title') : __('academy.workbench.ai_audit_title') }}</h3>
            <span class="lw-pill {{ $autoSolved ? 'lw-pill--emerald' : 'lw-pill--cyan' }}">{{ $autoSolved ? __('academy.workbench.exploited') : __('academy.workbench.monitoring') }}</span>
        </div>
        <div class="lw-receipt-row"><span>{{ __('academy.workbench.endpoint_label') }}</span><code class="lw-mono">POST {{ $basePath }}/chat</code></div>
        <div class="lw-receipt-row"><span>{{ __('academy.workbench.transport_label') }}</span><code class="lw-mono">{{ $lab->category_id === 'websockets' ? 'WSS Relay' : 'Agent-RPC' }}</code></div>
        <div class="lw-receipt-row"><span>{{ __('academy.workbench.frames_logged') }}</span><strong class="lw-mono">{{ count($chatHistory) }}</strong></div>
        <div class="lw-receipt-row"><span>{{ __('academy.workbench.available_tools') }}</span><code class="lw-mono">{{ $lab->category_id === 'websockets' ? 'frame.relay' : 'product_info, delete_user' }}</code></div>
        <div class="lw-receipt-row"><span>{{ __('academy.workbench.socket_channel') }}</span><code class="lw-mono" style="font-size:0.74rem">{{ substr((string) $session->instance_token, 0, 8) }}.local</code></div>
    </div>
</div>
