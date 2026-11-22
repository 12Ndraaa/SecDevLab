<div class="lw-diag-strip">
    <div>
        <span class="lw-pill lw-pill--warning">HTTP REPEATER // {{ strtoupper($lab->category_id) }}</span>
        <h2 style="margin:6px 0 2px;color:var(--lw-heading)">Protocol, Cache &amp; Wire Repeater Console</h2>
        <p class="lw-muted" style="margin:0">Send simulated HTTP probes or target <code>{{ $baseUrl }}</code> directly from Burp Repeater / curl.</p>
    </div>
    @if (!empty($profile['hasExploitServer']))
        <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/exploit-server">Open Exploit Server</a>
    @endif
</div>

<div class="lw-grid lw-grid--balanced">
    <div class="lw-ide-pane">
        <div class="lw-ide-pane__bar">
            <span>REPEATER REQUEST // {{ strtoupper($lab->category_id) }}</span>
            <span>WIRE PROBE</span>
        </div>
        <div class="lw-ide-pane__body">
            @if ($lab->category_id === 'cross-origin-resource-sharing-cors')
                <h3 style="margin-bottom:8px">CORS Origin Reflection Probe</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-origin">Simulated <code>Origin</code> Header:</label>
                    <input type="text" id="probe-origin" name="probeOrigin" value="{{ $params['probeOrigin'] ?? 'https://attacker.example' }}" class="lw-mono">
                    <div style="margin-top:12px;display:flex;gap:10px;flex-wrap:wrap">
                        <button type="submit" class="lw-btn lw-btn--primary">Send CORS Probe</button>
                        @if (!empty($profile['hasExploitServer']))
                            <a class="lw-btn" href="{{ $basePath }}/exploit-server">Craft XHR / fetch PoC</a>
                        @endif
                    </div>
                </form>
            @elseif ($lab->category_id === 'web-cache-poisoning' || $lab->category_id === 'http-host-header-attacks')
                <h3 style="margin-bottom:8px">Unkeyed Header / Host Injection Probe</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-host">Injected <code>X-Forwarded-Host</code> / <code>Host</code>:</label>
                    <input type="text" id="probe-host" name="probeHost" value="{{ $params['probeHost'] ?? '' }}" placeholder="e.g. exploit-server.local" class="lw-mono">
                    <label for="probe-cb">Cache Buster Query (<code>cb</code>):</label>
                    <input type="text" id="probe-cb" name="cb" value="{{ $params['cb'] ?? '1234' }}" class="lw-mono">
                    <div style="margin-top:12px">
                        <button type="submit" class="lw-btn lw-btn--primary">Send Header Probe</button>
                    </div>
                </form>
            @elseif ($lab->category_id === 'web-cache-deception')
                <h3 style="margin-bottom:8px">Cache Key Path Confusion Probe</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-path">Target Path Payload:</label>
                    <input type="text" id="probe-path" name="probePath" value="{{ $params['probePath'] ?? '/my-account/wcd.js' }}" class="lw-mono">
                    <div style="margin-top:12px;display:flex;gap:10px;flex-wrap:wrap">
                        <button type="submit" class="lw-btn lw-btn--primary">Test Path Normalization</button>
                        @if (!empty($profile['hasExploitServer']))
                            <a class="lw-btn" href="{{ $basePath }}/exploit-server">Deliver via Exploit Server</a>
                        @endif
                    </div>
                </form>
            @elseif ($lab->category_id === 'http-request-smuggling')
                <h3 style="margin-bottom:8px">Raw HTTP Request Desync Probe (CL.TE / TE.CL)</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-body">Raw Smuggled HTTP Payload:</label>
                    <textarea id="probe-body" name="probeBody" rows="6" class="lw-mono" placeholder="Transfer-Encoding: chunked&#10;Content-Length: 4&#10;&#10;0&#10;&#10;SMUGGLED">{{ $params['probeBody'] ?? '' }}</textarea>
                    <div style="margin-top:12px">
                        <button type="submit" class="lw-btn lw-btn--primary">Transmit Smuggling Probe</button>
                    </div>
                </form>
            @elseif ($lab->category_id === 'insecure-deserialization')
                <h3 style="margin-bottom:8px">Serialized Cookie / Object Inspector</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="deser-payload">Serialized Token (PHP / Java / PHAR):</label>
                    <textarea id="deser-payload" name="deserPayload" rows="5" class="lw-mono" placeholder='O:4:"User":2:{s:8:"username";s:6:"wiener";s:5:"admin";b:1;}'>{{ $params['deserPayload'] ?? '' }}</textarea>
                    <div style="margin-top:12px">
                        <button type="submit" class="lw-btn lw-btn--primary">Deserialize Payload</button>
                    </div>
                </form>
            @elseif ($lab->category_id === 'information-disclosure')
                <h3 style="margin-bottom:8px">Exposed Endpoint &amp; Debug Discovery</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-disc-path">Discovery Path:</label>
                    <input type="text" id="probe-disc-path" name="probePath" value="{{ $params['probePath'] ?? '/robots.txt' }}" placeholder="/robots.txt, /.git/HEAD, /backup, /phpinfo, /actuator" class="lw-mono">
                    <div class="lw-repeater-presets">
                        <button type="submit" class="lw-btn lw-btn--primary">Probe Endpoint</button>
                        <a class="lw-btn" href="{{ $basePath }}/robots.txt">/robots.txt</a>
                        <a class="lw-btn" href="{{ $basePath }}/.git/HEAD">/.git/HEAD</a>
                        <a class="lw-btn" href="{{ $basePath }}/backup">/backup</a>
                    </div>
                </form>
            @else
                <h3 style="margin-bottom:8px">Multi-Vector HTTP Request Scanner</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-scan-payload">Test Parameter / Data Structure Payload:</label>
                    <textarea id="probe-scan-payload" name="search" rows="4" class="lw-mono" placeholder="Submit SQLi, XSS, SSTI, Path Traversal, or Command payload...">{{ $searchParam }}</textarea>
                    <div style="margin-top:12px">
                        <button type="submit" class="lw-btn lw-btn--primary">Run Probe</button>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <div class="lw-ide-pane">
        <div class="lw-ide-pane__bar">
            <span>REPEATER RESPONSE // HEADERS &amp; BODY</span>
            <span class="lw-pill lw-pill--warning">{{ $workbenchOutput['status'] }}</span>
        </div>
        <div class="lw-ide-pane__body" style="display:flex;flex-direction:column;gap:14px">
            <div class="lw-table-wrap">
                <table class="lw-table">
                    <tbody>
                        @foreach ($workbenchOutput['headers'] as $hk => $hv)
                            <tr><th style="width:165px">{{ $hk }}</th><td class="lw-mono" style="font-size:0.8rem">{{ $hv }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="lw-diag-console">
                <div class="lw-diag-console__head">
                    <span>WIRE_BODY // {{ $workbenchOutput['headline'] ?: 'RAW OUTPUT' }}</span>
                    <span>HTTP/1.1</span>
                </div>
                <div class="lw-diag-console__body">@if (!empty($workbenchOutput['headline'])){{ $workbenchOutput['body'] }}@else Ready. Submit a probe on the left or send real HTTP requests via Burp / curl to {{ $baseUrl }}.@endif</div>
            </div>
        </div>
    </div>
</div>
