@if ($activeView === 'cart')
    <div class="lw-store-hero">
        <div>
            <span class="lw-pill lw-pill--emerald">{{ __('academy.workbench.store_cart_pill') }}</span>
            <h2 style="margin:6px 0 2px;color:var(--lw-heading)">{{ __('academy.workbench.store_cart_title') }}</h2>
            <p class="lw-muted" style="margin:0">{{ __('academy.workbench.store_cart_sub') }}</p>
        </div>
        <span class="lw-token-chip">{{ __('academy.workbench.store_credit') }}</span>
    </div>

    @if ($cartMessage !== '')
        <div class="lw-alert {{ $autoSolved ? 'lw-alert--success' : 'lw-alert--warning' }}">{{ $cartMessage }}</div>
    @endif

    <div class="lw-grid lw-grid--split">
        <div class="lw-card">
            <h3>{{ __('academy.workbench.cart_summary') }}</h3>
            <div class="lw-table-wrap" style="margin-bottom:16px">
                <table class="lw-table">
                    <thead><tr><th>{{ __('academy.workbench.col_product') }}</th><th>{{ __('academy.workbench.col_price') }}</th><th>{{ __('academy.workbench.col_quantity') }}</th></tr></thead>
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
                <label for="cart-qty">{{ __('academy.workbench.qty_label') }}</label>
                <input type="number" id="cart-qty" name="quantity" value="1">
                <label for="cart-coupon">{{ __('academy.workbench.coupon_label') }}</label>
                <input type="text" id="cart-coupon" name="coupon" placeholder="{{ __('academy.workbench.coupon_placeholder') }}">
                <div style="margin-top:14px;display:flex;gap:10px;flex-wrap:wrap">
                    <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.place_order') }}</button>
                    <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/shop' : '/shop' }}">{{ __('academy.workbench.browse_catalog') }}</a>
                </div>
            </form>
        </div>

        <div class="lw-receipt-panel">
            <div style="display:flex;justify-content:space-between;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:12px">
                <h3 style="margin:0">{{ __('academy.workbench.receipt_title') }}</h3>
                <span class="lw-pill {{ $autoSolved ? 'lw-pill--emerald' : 'lw-pill--warning' }}">{{ $autoSolved ? __('academy.workbench.order_accepted') : __('academy.workbench.insufficient_credit_pill') }}</span>
            </div>
            <div class="lw-receipt-row"><span>{{ __('academy.workbench.account_balance') }}</span><strong class="lw-mono">$100.00</strong></div>
            <div class="lw-receipt-row"><span>{{ __('academy.workbench.target_item') }}</span><strong class="lw-mono">$1337.00</strong></div>
            <div class="lw-receipt-row"><span>{{ __('academy.workbench.checkout_endpoint') }}</span><code class="lw-mono">POST {{ $basePath }}/cart</code></div>
            <div class="lw-receipt-row"><span>{{ __('academy.workbench.mutable_params') }}</span><code class="lw-mono">price, quantity, coupon</code></div>
            <div class="lw-receipt-row"><span>{{ __('academy.workbench.category_context') }}</span><span class="lw-mono">{{ strtoupper($lab->category_id) }}</span></div>
        </div>
    </div>
@else
    <div class="lw-store-hero">
        <div>
            <span class="lw-pill lw-pill--emerald">{{ __('academy.workbench.commerce_pill', ['category' => strtoupper($lab->category_id)]) }}</span>
            <h2 style="margin:6px 0 2px;color:var(--lw-heading)">{{ __('academy.workbench.commerce_title') }}</h2>
            <p class="lw-muted" style="margin:0">{{ __('academy.workbench.commerce_sub') }}</p>
        </div>
        @if (!empty($profile['hasTrackingIdCookie']))
            <span class="lw-token-chip">TrackingId={{ $trackingIdDefault }}</span>
        @endif
    </div>

    <div class="lw-card" style="margin-bottom:18px">
        @if (!empty($profile['hasSearchBox']) && empty($profile['hasCategoryFilter']))
            <form method="GET" action="{{ $basePath !== '' ? $basePath : '/' }}" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">
                <input type="text" name="search" value="{{ $searchParam }}" placeholder="{{ __('academy.workbench.search_products_placeholder') }}" style="flex:1 1 220px">
                <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.search_btn') }}</button>
            </form>
        @else
            <div class="lw-filter-pills">
                <strong style="font-size:0.84rem;color:var(--lw-heading)">{{ __('academy.workbench.refine_search') }}</strong>
                @foreach ($categoriesList as $c)
                    <a class="filter-category {{ $categoryParam === $c['label'] ? 'selected' : '' }}" href="{{ $c['href'] }}">{{ ($c['label'] === 'All' && ($labUiLocale ?? app()->getLocale()) === 'id') ? 'Semua' : $c['label'] }}</a>
                @endforeach
            </div>
            <form method="GET" action="{{ $basePath }}/filter" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">
                <input type="text" name="category" value="{{ $categoryParam === 'All' ? '' : $categoryParam }}" placeholder="{{ __('academy.workbench.custom_category_placeholder') }}" style="flex:1 1 220px">
                <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.apply_filter') }}</button>
            </form>
        @endif

        @if ($searchParam !== '')
            <p class="lw-muted" style="margin:12px 0 0">{{ __('academy.workbench.search_results_for', ['term' => $sstiEval]) }}</p>
        @endif
    </div>

    @if (!empty($unionRows))
        <div class="lw-card" style="margin-bottom:18px;border-color:var(--lw-arch-accent)">
            <div style="display:flex;justify-content:space-between;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:10px">
                <h3 style="margin:0">{{ __('academy.workbench.union_output_title') }}</h3>
                <span class="lw-pill lw-pill--emerald">{{ __('academy.workbench.sql_rows_returned') }}</span>
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
                <div style="display:flex;justify-content:space-between;align-items:center;gap:8px;flex-wrap:wrap">
                    <span class="lw-price">{{ $p->price }}</span>
                    <span class="lw-pill">{{ $p->cat }}</span>
                </div>
                <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/product?productId={{ $p->id }}">{{ __('academy.workbench.view_details') }}</a>
            </article>
        @endforeach
    </div>
@endif
