@if ($activeView === 'graphql' || $lab->category_id === 'graphql-api-vulnerabilities')
    <div class="lw-workbench-banner">
        <div>
            <span class="lw-pill lw-pill--purple">API &amp; GRAPHQL // SCHEMA EXPLORER</span>
            <h2 style="margin:6px 0 2px;color:var(--lw-heading)">GraphQL Query &amp; Introspection Console</h2>
            <p class="lw-muted" style="margin:0">Execute queries and mutations against <code>POST {{ $basePath }}/graphql</code> and inspect schema responses.</p>
        </div>
        <span class="lw-token-chip">Endpoint: /graphql/v1</span>
    </div>

    <div class="lw-grid lw-grid--split">
        <div class="lw-card">
            <h3>Query / Mutation Composer</h3>
            <form method="POST" action="{{ $basePath }}/graphql" class="lw-form">
                <label for="graphql-query-input">GraphQL Payload:</label>
                <textarea id="graphql-query-input" name="graphqlQuery" rows="7" class="lw-mono">{{ $params['graphqlQuery'] ?? "query {\n  getProduct(id: 7) {\n    id\n    name\n    price\n  }\n}" }}</textarea>
                <div style="margin-top:12px;display:flex;gap:10px;flex-wrap:wrap">
                    <button type="submit" class="lw-btn lw-btn--primary">Execute GraphQL Query</button>
                    <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/shop' : '/shop' }}">View Catalog</a>
                </div>
            </form>
        </div>

        <div class="lw-terminal">
            <div class="lw-terminal__bar">
                <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
                <span>GRAPHQL_RESPONSE // JSON</span>
            </div>
            <div class="lw-terminal__body">{{ !empty($workbenchOutput['body']) ? $workbenchOutput['body'] : "{\n  \"data\": {\n    \"status\": \"Ready. Run query or __schema introspection.\"\n  }\n}" }}</div>
        </div>
    </div>
@else
    <div class="lw-workbench-banner">
        <div>
            <span class="lw-pill lw-pill--purple">API &amp; GRAPHQL // REST API EXPLORER</span>
            <h2 style="margin:6px 0 2px;color:var(--lw-heading)">REST API Endpoint &amp; Mass-Assignment Workbench</h2>
            <p class="lw-muted" style="margin:0">Discover hidden routes, test HTTP methods (<code>GET</code>, <code>PATCH</code>, <code>DELETE</code>, <code>OPTIONS</code>), and inspect responses.</p>
        </div>
        <span class="lw-token-chip">Endpoint: /api/*</span>
    </div>

    <div class="lw-grid lw-grid--split">
        <div class="lw-card">
            <h3>API Request Builder</h3>
            <form method="POST" action="{{ $basePath }}/api" class="lw-form">
                <label for="api-method-select">HTTP Method:</label>
                <select id="api-method-select" name="apiMethod">
                    @foreach (['GET', 'POST', 'PATCH', 'DELETE', 'OPTIONS'] as $m)
                        <option value="{{ $m }}" @selected(strtoupper((string) ($params['apiMethod'] ?? 'GET')) === $m)>{{ $m }}</option>
                    @endforeach
                </select>
                <label for="api-path-input">API Path:</label>
                <input type="text" id="api-path-input" name="apiPath" value="{{ $params['apiPath'] ?? '/api/user/wiener' }}" class="lw-mono">
                <label for="api-body-input">JSON Body (Optional):</label>
                <textarea id="api-body-input" name="apiBody" rows="4" class="lw-mono" placeholder='{"email": "wiener@normal-user.net"}'>{{ $params['apiBody'] ?? '' }}</textarea>
                <div style="margin-top:12px;display:flex;gap:10px;flex-wrap:wrap">
                    <button type="submit" class="lw-btn lw-btn--primary">Send API Request</button>
                    <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/shop' : '/shop' }}">Storefront</a>
                </div>
            </form>
        </div>

        <div class="lw-terminal">
            <div class="lw-terminal__bar">
                <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
                <span>API_RESPONSE // {{ $workbenchOutput['status'] }}</span>
            </div>
            <div class="lw-terminal__body">{{ !empty($workbenchOutput['body']) ? $workbenchOutput['body'] : "{\n  \"status\": \"Ready. Probe /api, /api/user/wiener, or try PATCH/OPTIONS/DELETE.\"\n}" }}</div>
        </div>
    </div>
@endif
