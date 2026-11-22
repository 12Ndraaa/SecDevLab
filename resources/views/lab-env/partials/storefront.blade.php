@if ($activeView === 'cart')
    <div class="lw-store-hero">
        <div>
            <span class="lw-pill lw-pill--emerald">STOREFRONT // CART &amp; RACE LOGIC</span>
            <h2 style="margin:6px 0 2px;color:var(--lw-heading)">Checkout &amp; Order Ledger</h2>
            <p class="lw-muted" style="margin:0">Inspect price integrity, coupon validation, quantity bounds, and concurrent checkout logic.</p>
        </div>
        <span class="lw-token-chip">Store Credit: $100.00</span>
    </div>

    @if ($cartMessage !== '')
        <div class="lw-alert {{ $autoSolved ? 'lw-alert--success' : 'lw-alert--warning' }}">{{ $cartMessage }}</div>
    @endif

    <div class="lw-grid lw-grid--split">
        <div class="lw-card">
            <h3>Shopping Cart Summary</h3>
            <div class="lw-table-wrap" style="margin-bottom:16px">
                <table class="lw-table">
                    <thead><tr><th>Product</th><th>Price</th><th>Quantity</th></tr></thead>
                    <tbody>
                        <tr>
                            <td><strong>Lightweight "l33t" Leather Jacket</strong></td>
                            <td class="lw-mono">$1337.00</td>
                            <td class="lw-mono">1</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form method="POST" action="{{ $basePath }}/cart" class="lw-form">
                <input type="hidden" name="price" value="1337">
                <label for="cart-qty">Quantity:</label>
                <input type="number" id="cart-qty" name="quantity" value="1">
                <label for="cart-coupon">Coupon:</label>
                <input type="text" id="cart-coupon" name="coupon" placeholder="Enter coupon code (e.g. promo code)">
                <div style="margin-top:14px;display:flex;gap:10px;flex-wrap:wrap">
                    <button type="submit" class="lw-btn lw-btn--primary">Place order</button>
                    <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/shop' : '/shop' }}">Browse Store Catalog</a>
                </div>
            </form>
        </div>

        <div class="lw-receipt-panel">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                <h3 style="margin:0">Order Receipt Telemetry</h3>
                <span class="lw-pill {{ $autoSolved ? 'lw-pill--emerald' : 'lw-pill--warning' }}">{{ $autoSolved ? 'ORDER_ACCEPTED' : 'INSUFFICIENT_CREDIT' }}</span>
            </div>
            <div class="lw-receipt-row"><span>Account Balance</span><strong class="lw-mono">$100.00</strong></div>
            <div class="lw-receipt-row"><span>Target Item</span><strong class="lw-mono">$1337.00</strong></div>
            <div class="lw-receipt-row"><span>Checkout Endpoint</span><code class="lw-mono">POST {{ $basePath }}/cart</code></div>
            <div class="lw-receipt-row"><span>Mutable Parameters</span><code class="lw-mono">price, quantity, coupon</code></div>
            <div class="lw-receipt-row"><span>Category Context</span><span class="lw-mono">{{ strtoupper($lab->category_id) }}</span></div>
        </div>
    </div>
@else
    <div class="lw-store-hero">
        <div>
            <span class="lw-pill lw-pill--emerald">COMMERCE CATALOG // {{ strtoupper($lab->category_id) }}</span>
            <h2 style="margin:6px 0 2px;color:var(--lw-heading)">SecDev Commerce Storefront</h2>
            <p class="lw-muted" style="margin:0">Filter retail categories, inspect catalog queries, or test SQL/NoSQL parameter injection.</p>
        </div>
        @if (!empty($profile['hasTrackingIdCookie']))
            <span class="lw-token-chip">TrackingId={{ $trackingIdDefault }}</span>
        @endif
    </div>

    <div class="lw-card" style="margin-bottom:18px">
        @if (!empty($profile['hasSearchBox']) && empty($profile['hasCategoryFilter']))
            <form method="GET" action="{{ $basePath !== '' ? $basePath : '/' }}" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">
                <input type="text" name="search" value="{{ $searchParam }}" placeholder="Search products..." style="flex:1 1 240px">
                <button type="submit" class="lw-btn lw-btn--primary">Search</button>
            </form>
        @else
            <div class="lw-filter-pills">
                <strong style="font-size:0.84rem;color:var(--lw-heading)">Refine your search:</strong>
                @foreach ($categoriesList as $c)
                    <a class="filter-category {{ $categoryParam === $c['label'] ? 'selected' : '' }}" href="{{ $c['href'] }}">{{ $c['label'] }}</a>
                @endforeach
            </div>
            <form method="GET" action="{{ $basePath }}/filter" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">
                <input type="text" name="category" value="{{ $categoryParam === 'All' ? '' : $categoryParam }}" placeholder="Custom category filter payload (e.g. Gifts' OR 1=1--)" style="flex:1 1 260px">
                <button type="submit" class="lw-btn lw-btn--primary">Apply Filter</button>
            </form>
        @endif

        @if ($searchParam !== '')
            <p class="lw-muted" style="margin:12px 0 0">Search results for '{{ $sstiEval }}'</p>
        @endif
    </div>

    @if (!empty($unionRows))
        <div class="lw-card" style="margin-bottom:18px;border-color:var(--lw-arch-accent)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                <h3 style="margin:0">Database Query Output (UNION Result)</h3>
                <span class="lw-pill lw-pill--emerald">SQL ROWS RETURNED</span>
            </div>
            <div class="lw-table-wrap">
                <table class="lw-table">
                    <tbody>
                        @foreach ($unionRows as $r)
                            <tr><th>{{ $r['col1'] }}</th><td class="lw-mono">{{ $r['col2'] }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <div class="lw-product-grid">
        @foreach ($visibleProducts as $p)
            <article class="lw-product-card">
                <img src="{{ $resolveProdImg($p) }}" alt="{{ $p->name }}">
                <h3>{{ $p->name }}</h3>
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <span class="lw-price">{{ $p->price }}</span>
                    <span class="lw-pill">{{ $p->cat }}</span>
                </div>
                <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/product?productId={{ $p->id }}">View details</a>
            </article>
        @endforeach
    </div>
@endif
