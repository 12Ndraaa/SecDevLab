@if ($activeView === 'graphql' || $lab->category_id === 'graphql-api-vulnerabilities')
    <div class="lw-ide-pane">
        <div class="lw-ide-pane__bar">
            <span>{{ __('academy.workbench.gql_bar', ['path' => $basePath]) }}</span>
            <span>{{ __('academy.workbench.gql_bar_right') }}</span>
        </div>
        <div class="lw-ide-pane__body">
            <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;margin-bottom:14px">
                <div>
                    <h2 style="margin:0 0 2px;font-size:1.15rem">{{ __('academy.workbench.gql_title') }}</h2>
                    <p class="lw-muted" style="margin:0">{!! __('academy.workbench.gql_sub_html') !!}</p>
                </div>
                <span class="lw-token-chip">POST /graphql/v1</span>
            </div>

            <div class="lw-grid lw-grid--balanced">
                <form method="POST" action="{{ $basePath }}/graphql" class="lw-form">
                    <label for="graphql-query-input" style="margin-top:0">{{ __('academy.workbench.gql_payload_label') }}</label>
                    <textarea id="graphql-query-input" name="graphqlQuery" rows="10" class="lw-mono">{{ $params['graphqlQuery'] ?? "query {\n  getProduct(id: 7) {\n    id\n    name\n    price\n  }\n}" }}</textarea>
                    <div style="margin-top:12px;display:flex;gap:10px;flex-wrap:wrap">
                        <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.gql_exec_btn') }}</button>
                        <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/shop' : '/shop' }}">{{ __('academy.workbench.view_catalog') }}</a>
                    </div>
                </form>

                <div class="lw-diag-console">
                    <div class="lw-diag-console__head">
                        <span>{{ __('academy.workbench.response_json') }}</span>
                        <span>{{ $workbenchOutput['status'] }}</span>
                    </div>
                    <div class="lw-diag-console__body">{{ !empty($workbenchOutput['body']) ? $workbenchOutput['body'] : "{\n  \"data\": {\n    \"status\": \"".__('academy.workbench.gql_ready')."\"\n  }\n}" }}</div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="lw-ide-pane">
        <div class="lw-ide-pane__bar">
            <span>{{ __('academy.workbench.rest_bar', ['path' => $basePath]) }}</span>
            <span>{{ __('academy.workbench.rest_bar_right') }}</span>
        </div>
        <div class="lw-ide-pane__body">
            <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;margin-bottom:14px">
                <div>
                    <h2 style="margin:0 0 2px;font-size:1.15rem">{{ __('academy.workbench.rest_title') }}</h2>
                    <p class="lw-muted" style="margin:0">{!! __('academy.workbench.rest_sub_html') !!}</p>
                </div>
                <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/shop' : '/shop' }}">{{ __('academy.workbench.storefront_btn') }}</a>
            </div>

            <div class="lw-grid lw-grid--balanced">
                <form method="POST" action="{{ $basePath }}/api" class="lw-form">
                    <div class="lw-ide-urlbar">
                        <select id="api-method-select" name="apiMethod" aria-label="HTTP Method">
                            @foreach (['GET', 'POST', 'PATCH', 'DELETE', 'OPTIONS'] as $m)
                                <option value="{{ $m }}" @selected(strtoupper((string) ($params['apiMethod'] ?? 'GET')) === $m)>{{ $m }}</option>
                            @endforeach
                        </select>
                        <input type="text" id="api-path-input" name="apiPath" value="{{ $params['apiPath'] ?? '/api/user/wiener' }}" aria-label="API Path" class="lw-mono">
                        <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.send_api_btn') }}</button>
                    </div>
                    <label for="api-body-input">{{ __('academy.workbench.json_body_label') }}</label>
                    <textarea id="api-body-input" name="apiBody" rows="7" class="lw-mono" placeholder='{"email": "wiener@normal-user.net"}'>{{ $params['apiBody'] ?? '' }}</textarea>
                </form>

                <div class="lw-diag-console">
                    <div class="lw-diag-console__head">
                        <span>{{ __('academy.workbench.response_json') }}</span>
                        <span>{{ $workbenchOutput['status'] }}</span>
                    </div>
                    <div class="lw-diag-console__body">{{ !empty($workbenchOutput['body']) ? $workbenchOutput['body'] : "{\n  \"status\": \"".__('academy.workbench.rest_ready')."\"\n}" }}</div>
                </div>
            </div>
        </div>
    </div>
@endif
