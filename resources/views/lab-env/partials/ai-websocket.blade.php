<div class="lw-chat-shell">
    <div class="lw-card">
        <div class="lw-chat-topbar">
            <div style="display:flex;align-items:center;gap:10px">
                <span class="lw-iam-emblem" style="width:36px;height:36px" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                </span>
                <div>
                    <h2 style="margin:0;font-size:1.08rem;color:var(--lw-heading)">
                        {{ $lab->category_id === 'websockets' ? 'Real-Time WebSocket Frame Relay' : 'Arti Ficial — AI Copilot & Tool Agent' }}
                    </h2>
                    <div class="lw-muted" style="font-size:0.78rem">
                        {{ $lab->category_id === 'websockets'
                            ? 'Transmit and inspect live WebSocket chat frames across the victim session relay.'
                            : 'Interact with Arti Ficial and probe indirect prompt injection or internal tool calls.' }}
                    </div>
                </div>
            </div>
            <span class="lw-pill lw-pill--emerald">Live chat &bull; Active</span>
        </div>

        <div id="chat-log" class="lw-chat-log">
            <div class="lw-chat-row">
                <span class="lw-chat-avatar" aria-hidden="true">AI</span>
                <div class="lw-chat-entry lw-chat-entry--bot">
                    <div class="lw-chat-entry__meta">Arti Ficial</div>
                    <div>Hello! How can I help you today?</div>
                </div>
            </div>
            @foreach ($chatHistory as $entry)
                @php $isBot = stripos((string) ($entry['sender'] ?? ''), 'arti') !== false || stripos((string) ($entry['sender'] ?? ''), 'system') !== false; @endphp
                <div class="lw-chat-row {{ $isBot ? '' : 'lw-chat-row--user' }}">
                    <span class="lw-chat-avatar" aria-hidden="true">{{ $isBot ? 'AI' : 'YOU' }}</span>
                    <div class="lw-chat-entry {{ $isBot ? 'lw-chat-entry--bot' : 'lw-chat-entry--user' }}">
                        <div class="lw-chat-entry__meta">{{ $entry['sender'] }}</div>
                        <div><strong>{{ $entry['sender'] }}:</strong> {{ $entry['text'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <form method="POST" action="{{ $basePath }}/chat" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap">
            <input type="text" name="message" id="chat-input" placeholder="Type a message or frame payload..." style="flex:1 1 240px" required>
            <button type="submit" class="lw-btn lw-btn--primary">Send</button>
        </form>
    </div>

    <div class="lw-receipt-panel">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
            <h3 style="margin:0;font-size:0.98rem">{{ $lab->category_id === 'websockets' ? 'WebSocket Relay' : 'Agent Tool Audit' }}</h3>
            <span class="lw-pill {{ $autoSolved ? 'lw-pill--emerald' : 'lw-pill--cyan' }}">{{ $autoSolved ? 'EXPLOITED' : 'MONITORING' }}</span>
        </div>
        <div class="lw-receipt-row"><span>Endpoint</span><code class="lw-mono">POST {{ $basePath }}/chat</code></div>
        <div class="lw-receipt-row"><span>Transport</span><code class="lw-mono">{{ $lab->category_id === 'websockets' ? 'WSS Relay' : 'Agent-RPC' }}</code></div>
        <div class="lw-receipt-row"><span>Frames Logged</span><strong class="lw-mono">{{ count($chatHistory) }}</strong></div>
        <div class="lw-receipt-row"><span>Available Tools</span><code class="lw-mono">{{ $lab->category_id === 'websockets' ? 'frame.relay' : 'product_info, delete_user' }}</code></div>
        <div class="lw-receipt-row"><span>Socket Channel</span><code class="lw-mono" style="font-size:0.74rem">{{ substr((string) $session->instance_token, 0, 8) }}.local</code></div>
    </div>
</div>
