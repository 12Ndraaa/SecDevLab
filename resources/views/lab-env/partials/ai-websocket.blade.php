<div class="lw-workbench-banner">
    <div>
        <span class="lw-pill lw-pill--cyan">AI AGENT &amp; WEBSOCKET // LIVE TERMINAL CONSOLE</span>
        <h2 style="margin:6px 0 2px;color:var(--lw-heading)">
            {{ $lab->category_id === 'websockets' ? 'Real-Time WebSocket Frame Console' : 'AI Assistant & LLM Tool Invocation Console' }}
        </h2>
        <p class="lw-muted" style="margin:0">
            {{ $lab->category_id === 'websockets'
                ? 'Inspect and transmit raw WebSocket chat frames across the victim session relay.'
                : 'Interact with Arti Ficial and test indirect prompt injection or unsafe internal tool invocations.' }}
        </p>
    </div>
    <span class="lw-token-chip">{{ $lab->category_id === 'websockets' ? 'STATUS: WS CONNECTED' : 'TOOLS: product_info, delete_user' }}</span>
</div>

<div class="lw-grid lw-grid--split">
    <div class="lw-card">
        <h3 style="margin-bottom:10px">Live chat</h3>
        <div id="chat-log" class="lw-chat-log">
            <div class="lw-chat-entry"><strong>Arti Ficial:</strong> Hello! How can I help you today?</div>
            @foreach ($chatHistory as $entry)
                <div class="lw-chat-entry"><strong>{{ $entry['sender'] }}:</strong> {{ $entry['text'] }}</div>
            @endforeach
        </div>
        <form method="POST" action="{{ $basePath }}/chat" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap">
            <input type="text" name="message" id="chat-input" placeholder="Type a message or frame payload..." style="flex:1 1 240px" required>
            <button type="submit" class="lw-btn lw-btn--primary">Send</button>
        </form>
    </div>

    <div class="lw-terminal">
        <div class="lw-terminal__bar">
            <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
            <span>{{ $lab->category_id === 'websockets' ? 'WSS_FRAME_INSPECTOR' : 'LLM_TOOL_AUDIT_LOG' }}</span>
        </div>
        <div class="lw-terminal__body">Endpoint : POST {{ $basePath }}/chat
Protocol : {{ $lab->category_id === 'websockets' ? 'wss://'.substr((string) $session->instance_token, 0, 8).'.secdevlab.local/chat' : 'Agent-RPC / SSR Relay' }}
Frames   : {{ count($chatHistory) }} recorded
State    : {{ $autoSolved ? 'EXPLOIT_CONFIRMED' : 'MONITORING' }}</div>
    </div>
</div>
