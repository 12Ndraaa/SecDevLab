@if ($activeView === 'graphql' || $lab->category_id === 'graphql-api-vulnerabilities')
    <div class="lw-ide-pane">
        <div class="lw-ide-pane__bar">
            <span>GRAPHQL IDE WORKBENCH // POST {{ $basePath }}/graphql</span>
            <span>SCHEMA / INTROSPECTION</span>
        </div>
        <div class="lw-ide-pane__body">
            <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;margin-bottom:14px">
                <div>
                    <h2 style="margin:0 0 2px;font-size:1.15rem">GraphQL Query &amp; Introspection Console</h2>
                    <p class="lw-muted" style="margin:0">Execute queries and mutations against <code>/graphql/v1</code> and inspect JSON output.</p>
                </div>
                <span class="lw-token-chip">POST /graphql/v1</span>
            </div>

            <div class="lw-grid lw-grid--balanced">
                <form method="POST" action="{{ $basePath }}/graphql" class="lw-form">
                    <label for="graphql-query-input" style="margin-top:0">GraphQL Payload:</label>
                    <textarea id="graphql-query-input" name="graphqlQuery" rows="10" class="lw-mono">{{ $params['graphqlQuery'] ?? "query {\n  getProduct(id: 7) {\n    id\n    name\n    price\n  }\n}" }}</textarea>
                    <div style="margin-top:12px;display:flex;gap:10px;flex-wrap:wrap">
                        <button type="submit" class="lw-btn lw-btn--primary">Execute GraphQL Query</button>
                        <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/shop' : '/shop' }}">View Catalog</a>
                    </div>
                </form>

                <div class="lw-diag-console">
                    <div class="lw-diag-console__head">
                        <span>RESPONSE // JSON</span>
                        <span>{{ $workbenchOutput['status'] }}</span>
                    </div>
                    <div class="lw-diag-console__body">{{ !empty($workbenchOutput['body']) ? $workbenchOutput['body'] : "{\n  \"data\": {\n    \"status\": \"Ready. Run query or __schema introspection.\"\n  }\n}" }}</div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="lw-ide-pane">
        <div class="lw-ide-pane__bar">
            <span>REST API CLIENT // {{ $basePath }}/api</span>
            <span>OPENAPI / MASS ASSIGNMENT</span>
        </div>
        <div class="lw-ide-pane__body">
            <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;margin-bottom:14px">
                <div>
                    <h2 style="margin:0 0 2px;font-size:1.15rem">REST API Endpoint &amp; Mass-Assignment Workbench</h2>
                    <p class="lw-muted" style="margin:0">Discover hidden routes, test HTTP methods (<code>GET</code>, <code>PATCH</code>, <code>DELETE</code>, <code>OPTIONS</code>), and inspect responses.</p>
                </div>
                <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/shop' : '/shop' }}">Storefront</a>
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
                        <button type="submit" class="lw-btn lw-btn--primary">Send API Request</button>
                    </div>
                    <label for="api-body-input">JSON Body (Optional):</label>
                    <textarea id="api-body-input" name="apiBody" rows="7" class="lw-mono" placeholder='{"email": "wiener@normal-user.net"}'>{{ $params['apiBody'] ?? '' }}</textarea>
                </form>

                <div class="lw-diag-console">
                    <div class="lw-diag-console__head">
                        <span>RESPONSE // JSON</span>
                        <span>{{ $workbenchOutput['status'] }}</span>
                    </div>
                    <div class="lw-diag-console__body">{{ !empty($workbenchOutput['body']) ? $workbenchOutput['body'] : "{\n  \"status\": \"Ready. Probe /api, /api/user/wiener, or try PATCH/OPTIONS/DELETE.\"\n}" }}</div>
                </div>
            </div>
        </div>
    </div>
@endif
