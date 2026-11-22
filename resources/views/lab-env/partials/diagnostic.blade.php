@if ($activeView === 'file-viewer')
    <div class="lw-diag-strip">
        <div>
            <span class="lw-pill lw-pill--cyan">DIAGNOSTIC // FILESYSTEM ASSET PROBE</span>
            <h2 style="margin:6px 0 2px;color:var(--lw-heading)">Asset Image Endpoint &amp; Path Traversal Explorer</h2>
            <p class="lw-muted" style="margin:0">Product thumbnails load via <code>{{ $basePath }}/image?filename=...</code>. Test traversal payloads directly.</p>
        </div>
        <span class="lw-token-chip">GET /image?filename=</span>
    </div>

    <div class="lw-diag-console" style="margin-bottom:18px">
        <div class="lw-diag-console__head">
            <span>FILESYSTEM_PROBE // GET {{ $basePath }}/image</span>
            <span>PARAM: filename</span>
        </div>
        <div style="padding:16px">
            <form method="GET" action="{{ $basePath }}/image" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">
                <input type="text" name="filename" value="{{ $params['filename'] ?? '30.jpg' }}" placeholder="e.g. ../../../../etc/passwd" class="lw-mono" style="flex:1 1 280px">
                <button type="submit" class="lw-btn lw-btn--primary">Fetch Asset</button>
            </form>
        </div>
    </div>

    <div class="lw-product-grid">
        @foreach ($visibleProducts as $p)
            <article class="lw-product-card">
                <img src="{{ $resolveProdImg($p) }}" alt="{{ $p->name }}">
                <h3>{{ $p->name }}</h3>
                <div class="lw-mono lw-muted" style="font-size:0.74rem;word-break:break-all">{{ $basePath }}/image?filename={{ $p->filename }}</div>
                <a class="lw-btn" href="{{ $basePath }}/product?productId={{ $p->id }}">Inspect Product</a>
            </article>
        @endforeach
    </div>
@else
    <div class="lw-diag-strip">
        <div>
            <span class="lw-pill lw-pill--cyan">DIAGNOSTIC // {{ strtoupper($lab->category_id) }}</span>
            <h2 style="margin:6px 0 2px;color:var(--lw-heading)">Warehouse Stock, XML &amp; SSRF Diagnostic Console</h2>
            <p class="lw-muted" style="margin:0">Inspect stock backend calls (<code>POST {{ $basePath }}/product/stock</code>) for OS command, SSRF, or XXE injection.</p>
        </div>
        <span class="lw-token-chip">TARGET: #stockCheckForm</span>
    </div>

    <div class="lw-grid lw-grid--split">
        <div class="lw-card">
            <div style="display:flex;gap:16px;flex-wrap:wrap;align-items:flex-start;margin-bottom:16px;padding-bottom:16px;border-bottom:1px solid var(--lw-border)">
                <img src="{{ $resolveProdImg($selectedProduct) }}" alt="{{ $selectedProduct->name }}" style="width:128px;height:128px;object-fit:cover;border-radius:10px;border:1px solid var(--lw-border)">
                <div style="flex:1;min-width:200px">
                    <span class="lw-pill lw-pill--cyan">{{ $selectedProduct->cat }}</span>
                    <h2 style="margin:8px 0 4px">{{ $selectedProduct->name }}</h2>
                    <div class="lw-price" style="margin-bottom:8px">{{ $selectedProduct->price }}</div>
                    <p class="lw-muted" style="margin:0">{{ $selectedProduct->desc }}</p>
                </div>
            </div>

            @if ($archetype === 'diagnostic' || !empty($profile['hasStockCheck']) || $storeIdParam !== '')
                <form id="stockCheckForm" action="{{ $basePath }}/product/stock" method="POST" class="lw-form">
                    <input type="hidden" name="productId" value="{{ $selectedProduct->id }}">
                    <label for="stock-store-select">Warehouse Location (<code>storeId</code>):</label>
                    <div style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">
                        <select id="stock-store-select" name="storeId" style="flex:1 1 200px">
                            <option value="London" @selected($storeIdParam === 'London')>London</option>
                            <option value="Paris" @selected($storeIdParam === 'Paris')>Paris</option>
                            <option value="Milan" @selected($storeIdParam === 'Milan')>Milan</option>
                        </select>
                        <button type="submit" class="lw-btn lw-btn--primary">Check stock</button>
                    </div>
                </form>

                <hr style="border:none;border-top:1px solid var(--lw-border);margin:18px 0">

                <form action="{{ $basePath }}/product/stock" method="POST" class="lw-form">
                    <input type="hidden" name="productId" value="{{ $selectedProduct->id }}">
                    <label for="diagnostic-custom-probe">Custom Stock / URL / XML / Command Probe (<code>storeId</code>):</label>
                    <textarea id="diagnostic-custom-probe" name="storeId" rows="3" class="lw-mono" placeholder="e.g. 1|whoami  OR  http://127.0.0.1/admin  OR  <!DOCTYPE foo [ <!ENTITY xxe SYSTEM &quot;file:///etc/passwd&quot;> ]>">{{ $storeIdParam }}</textarea>
                    <div style="margin-top:10px;display:flex;gap:10px;flex-wrap:wrap">
                        <button type="submit" class="lw-btn lw-btn--primary">Execute Diagnostic Probe</button>
                        <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/shop' : '/shop' }}">Return to list</a>
                    </div>
                </form>
            @else
                <div style="margin-top:12px">
                    <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/shop' : '/shop' }}">Return to list</a>
                </div>
            @endif

            @if (!empty($profile['hasCart']))
                <form action="{{ $basePath }}/cart" method="POST" style="margin-top:12px">
                    <input type="hidden" name="productId" value="{{ $selectedProduct->id }}">
                    <button type="submit" class="lw-btn lw-btn--accent">Add to cart</button>
                </form>
            @endif
        </div>

        @if ($archetype === 'diagnostic' || !empty($profile['hasStockCheck']) || $storeIdParam !== '')
            <div class="lw-diag-console">
                <div class="lw-diag-console__head">
                    <span>DIAGNOSTIC_STDOUT // stockCheckResult</span>
                    <span>{{ $storeIdParam !== '' ? 'PROBE EXECUTED' : 'IDLE' }}</span>
                </div>
                <div class="lw-diag-console__body" id="stockCheckResult">{{ $stockOutput !== '' ? $stockOutput : "Ready. Submit Check stock or send custom payload to POST {$basePath}/product/stock" }}</div>
            </div>
        @endif
    </div>
@endif
