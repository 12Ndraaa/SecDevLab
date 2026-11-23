<div class="lw-diag-strip">
    <div>
        <span class="lw-pill lw-pill--warning">{{ __('academy.workbench.http_pill', ['category' => strtoupper($lab->category_id)]) }}</span>
        <h2 style="margin:6px 0 2px;color:var(--lw-heading)">{{ __('academy.workbench.http_title') }}</h2>
        <p class="lw-muted" style="margin:0">{!! __('academy.workbench.http_sub_html', ['url' => e($baseUrl)]) !!}</p>
    </div>
    @if (!empty($profile['hasExploitServer']))
        <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/exploit-server">{{ __('academy.workbench.open_exploit_server') }}</a>
    @endif
</div>

<div class="lw-grid lw-grid--balanced">
    <div class="lw-ide-pane">
        <div class="lw-ide-pane__bar">
            <span>{{ __('academy.workbench.repeater_req_bar', ['category' => strtoupper($lab->category_id)]) }}</span>
            <span>{{ __('academy.workbench.wire_probe') }}</span>
        </div>
        <div class="lw-ide-pane__body">
            @if ($lab->category_id === 'cross-origin-resource-sharing-cors')
                <h3 style="margin-bottom:8px">{{ __('academy.workbench.cors_probe_title') }}</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-origin">{!! __('academy.workbench.cors_origin_html') !!}</label>
                    <input type="text" id="probe-origin" name="probeOrigin" value="{{ $params['probeOrigin'] ?? 'https://attacker.example' }}" class="lw-mono">
                    <div style="margin-top:12px;display:flex;gap:10px;flex-wrap:wrap">
                        <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.send_cors_btn') }}</button>
                        @if (!empty($profile['hasExploitServer']))
                            <a class="lw-btn" href="{{ $basePath }}/exploit-server">{{ __('academy.workbench.craft_xhr_btn') }}</a>
                        @endif
                    </div>
                </form>
            @elseif ($lab->category_id === 'web-cache-poisoning' || $lab->category_id === 'http-host-header-attacks')
                <h3 style="margin-bottom:8px">{{ __('academy.workbench.host_probe_title') }}</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-host">{!! __('academy.workbench.host_header_html') !!}</label>
                    <input type="text" id="probe-host" name="probeHost" value="{{ $params['probeHost'] ?? '' }}" placeholder="{{ __('academy.workbench.host_placeholder') }}" class="lw-mono">
                    <label for="probe-cb">{!! __('academy.workbench.cache_buster_html') !!}</label>
                    <input type="text" id="probe-cb" name="cb" value="{{ $params['cb'] ?? '1234' }}" class="lw-mono">
                    <div style="margin-top:12px">
                        <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.send_header_btn') }}</button>
                    </div>
                </form>
            @elseif ($lab->category_id === 'web-cache-deception')
                <h3 style="margin-bottom:8px">{{ __('academy.workbench.wcd_probe_title') }}</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-path">{{ __('academy.workbench.wcd_path_label') }}</label>
                    <input type="text" id="probe-path" name="probePath" value="{{ $params['probePath'] ?? '/my-account/wcd.js' }}" class="lw-mono">
                    <div style="margin-top:12px;display:flex;gap:10px;flex-wrap:wrap">
                        <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.test_path_norm_btn') }}</button>
                        @if (!empty($profile['hasExploitServer']))
                            <a class="lw-btn" href="{{ $basePath }}/exploit-server">{{ __('academy.workbench.deliver_exploit_btn') }}</a>
                        @endif
                    </div>
                </form>
            @elseif ($lab->category_id === 'http-request-smuggling')
                <h3 style="margin-bottom:8px">{{ __('academy.workbench.smug_probe_title') }}</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-body">{{ __('academy.workbench.smug_body_label') }}</label>
                    <textarea id="probe-body" name="probeBody" rows="6" class="lw-mono" placeholder="Transfer-Encoding: chunked&#10;Content-Length: 4&#10;&#10;0&#10;&#10;SMUGGLED">{{ $params['probeBody'] ?? '' }}</textarea>
                    <div style="margin-top:12px">
                        <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.transmit_smug_btn') }}</button>
                    </div>
                </form>
            @elseif ($lab->category_id === 'insecure-deserialization')
                <h3 style="margin-bottom:8px">{{ __('academy.workbench.deser_probe_title') }}</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="deser-payload">{{ __('academy.workbench.deser_label') }}</label>
                    <textarea id="deser-payload" name="deserPayload" rows="5" class="lw-mono" placeholder='O:4:"User":2:{s:8:"username";s:6:"wiener";s:5:"admin";b:1;}'>{{ $params['deserPayload'] ?? '' }}</textarea>
                    <div style="margin-top:12px">
                        <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.deser_btn') }}</button>
                    </div>
                </form>
            @elseif ($lab->category_id === 'information-disclosure')
                <h3 style="margin-bottom:8px">{{ __('academy.workbench.info_probe_title') }}</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-disc-path">{{ __('academy.workbench.info_path_label') }}</label>
                    <input type="text" id="probe-disc-path" name="probePath" value="{{ $params['probePath'] ?? '/robots.txt' }}" placeholder="/robots.txt, /.git/HEAD, /backup, /phpinfo, /actuator" class="lw-mono">
                    <div class="lw-repeater-presets">
                        <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.probe_endpoint_btn') }}</button>
                        <a class="lw-btn" href="{{ $basePath }}/robots.txt">/robots.txt</a>
                        <a class="lw-btn" href="{{ $basePath }}/.git/HEAD">/.git/HEAD</a>
                        <a class="lw-btn" href="{{ $basePath }}/backup">/backup</a>
                    </div>
                </form>
            @else
                <h3 style="margin-bottom:8px">{{ __('academy.workbench.scanner_title') }}</h3>
                <form method="POST" action="{{ $basePath }}/_workbench/probe" class="lw-form">
                    <label for="probe-scan-payload">{{ __('academy.workbench.scanner_label') }}</label>
                    <textarea id="probe-scan-payload" name="search" rows="4" class="lw-mono" placeholder="{{ __('academy.workbench.scanner_placeholder') }}">{{ $searchParam }}</textarea>
                    <div style="margin-top:12px">
                        <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.run_probe_btn') }}</button>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <div class="lw-ide-pane">
        <div class="lw-ide-pane__bar">
            <span>{{ __('academy.workbench.repeater_resp_bar') }}</span>
            <span class="lw-pill lw-pill--warning">{{ $workbenchOutput['status'] }}</span>
        </div>
        <div class="lw-ide-pane__body" style="display:flex;flex-direction:column;gap:14px">
            <div class="lw-table-wrap">
                <table class="lw-table">
                    <tbody>
                        @foreach ($workbenchOutput['headers'] as $hk => $hv)
                            <tr><th>{{ $hk }}</th><td class="lw-mono" style="font-size:0.8rem">{{ $hv }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="lw-diag-console">
                <div class="lw-diag-console__head">
                    <span>WIRE_BODY // {{ $workbenchOutput['headline'] ?: __('academy.workbench.raw_output') }}</span>
                    <span>HTTP/1.1</span>
                </div>
                <div class="lw-diag-console__body">@if (!empty($workbenchOutput['headline'])){{ $workbenchOutput['body'] }}@else {{ __('academy.workbench.http_ready', ['url' => $baseUrl]) }}@endif</div>
            </div>
        </div>
    </div>
</div>
