@if ($activeView === 'post' && $selectedPost)
    <div class="lw-card">
        <img src="{{ $selectedPost->img }}" alt="{{ $selectedPost->title }}" style="width:100%;max-height:280px;object-fit:cover;border-radius:10px;margin-bottom:14px">
        <span class="lw-pill lw-pill--orange">EDITORIAL POST</span>
        <h2 style="margin:10px 0 6px">{{ $selectedPost->title }}</h2>
        <p class="lw-muted"><span id="blog-author">{{ $selectedPost->author }}</span> | {{ $selectedPost->published_label }}</p>
        <p>{{ $selectedPost->body }}</p>

        <hr style="border:none;border-top:1px solid var(--lw-border);margin:20px 0">
        <h3>Comments</h3>
        @if ($commentParam !== '')
            <section class="lw-card" style="background:var(--lw-surface-2);margin-bottom:12px;padding:12px 14px">
                <p style="margin:0 0 4px"><strong>You</strong> | Just now</p>
                <p style="margin:0">{{ $commentParam }}</p>
            </section>
        @endif
        <section class="lw-card" style="background:var(--lw-surface-2);margin-bottom:16px;padding:12px 14px">
            <p style="margin:0 0 4px"><strong>Carlos Montoya</strong> | 10 Nov 2026</p>
            <p style="margin:0">Great write-up! Make sure to sanitize user-supplied website links and comment bodies.</p>
        </section>

        <form method="POST" action="{{ $basePath }}/post/comment" class="lw-form">
            <input type="hidden" name="postId" value="{{ $selectedPost->id }}">
            <h4>Leave a comment</h4>
            <label>Comment:</label>
            <textarea name="comment" rows="4" required></textarea>
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Website:</label>
            <input type="text" name="website">
            <div style="margin-top:12px;display:flex;gap:10px">
                <button type="submit" class="lw-btn lw-btn--primary">Post comment</button>
                <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/blog' : '/blog' }}">Back to Blog</a>
            </div>
        </form>
    </div>
@else
    <div class="lw-workbench-banner">
        <div>
            <span class="lw-pill lw-pill--orange">EDITORIAL &amp; SINK // {{ strtoupper($lab->category_id) }}</span>
            <h2 style="margin:6px 0 2px;color:var(--lw-heading)">
                @if ($activeView === 'dom-workbench')
                    DOM Source-to-Sink &amp; Editorial Workbench
                @elseif ($activeView === 'clickjacking-workbench')
                    Clickjacking &amp; UI Redressing Workbench
                @elseif ($activeView === 'ssti-workbench')
                    Server-Side Template Sandbox &amp; Blog
                @elseif ($activeView === 'prototype-workbench')
                    Prototype Pollution Gadget &amp; JSON Merge Workbench
                @else
                    Security Engineering Editorial Blog
                @endif
            </h2>
            <p class="lw-muted" style="margin:0">Test reflected/stored XSS, DOM sinks, clickjacking frames, SSTI expressions, or prototype gadgets.</p>
        </div>
        @if (!empty($profile['hasExploitServer']))
            <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/exploit-server">Open Exploit Server</a>
        @endif
    </div>

    @if ($activeView === 'clickjacking-workbench')
        <div class="lw-grid lw-grid--split" style="margin-bottom:18px">
            <div class="lw-card">
                <h3>Target Account Framing Surface</h3>
                <p class="lw-muted">Victim account actions on <code>{{ $basePath }}/my-account</code> lack anti-framing protections.</p>
                <div style="display:flex;gap:10px;flex-wrap:wrap">
                    <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/exploit-server">Craft Framing PoC in Exploit Server</a>
                    <a class="lw-btn" href="{{ $basePath }}/my-account">Inspect My Account Target</a>
                </div>
            </div>
            <div class="lw-terminal">
                <div class="lw-terminal__bar">
                    <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
                    <span>FRAME_DEFENSE_HEADERS</span>
                </div>
                <div class="lw-terminal__body">X-Frame-Options        : MISSING / UNPROTECTED
Content-Security-Policy: frame-ancestors * (lab target)
Framing Status         : VULNERABLE TO UI REDRESSING</div>
            </div>
        </div>
    @elseif ($activeView === 'prototype-workbench')
        <div class="lw-grid lw-grid--split" style="margin-bottom:18px">
            <div class="lw-card">
                <h3>Prototype Pollution Gadget Tester</h3>
                <form method="POST" action="{{ $basePath }}/" class="lw-form">
                    <label for="proto-payload-input">Query or JSON <code>__proto__</code> Payload:</label>
                    <textarea id="proto-payload-input" name="protoPayload" rows="4" class="lw-mono" placeholder='{"__proto__":{"isAdmin":true}}  OR  ?__proto__[transport_url]=data:,alert(1)//'>{{ $params['protoPayload'] ?? '' }}</textarea>
                    <div style="margin-top:12px">
                        <button type="submit" class="lw-btn lw-btn--primary">Merge Payload into Object</button>
                    </div>
                </form>
            </div>
            <div class="lw-terminal">
                <div class="lw-terminal__bar">
                    <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
                    <span>PROTOTYPE_GADGET_TRACE</span>
                </div>
                <div class="lw-terminal__body">{{ !empty($workbenchOutput['body']) ? $workbenchOutput['body'] : 'Ready. Submit __proto__ or constructor.prototype payload.' }}</div>
            </div>
        </div>
    @endif

    <div class="lw-card" style="margin-bottom:18px">
        <form method="GET" action="{{ $basePath !== '' ? $basePath : '/' }}" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">
            <input type="text" name="search" value="{{ $searchParam }}" placeholder="{{ $activeView === 'ssti-workbench' ? ('Test template expression e.g. '.chr(123).chr(123).'7*7'.chr(125).chr(125).' or search...') : 'Search the blog...' }}" style="flex:1 1 260px">
            <button type="submit" class="lw-btn lw-btn--primary">Search the blog</button>
        </form>
        @if ($searchParam !== '')
            <h3 style="margin:14px 0 0;color:var(--lw-orange)">0 search results for '{{ $sstiEval }}'</h3>
        @endif
        @if ($activeView === 'dom-workbench' && !empty($workbenchOutput['body']))
            <div class="lw-terminal" style="margin-top:14px">
                <div class="lw-terminal__bar">
                    <span class="lw-terminal__dots"><span></span><span></span><span></span></span>
                    <span>DOM_SOURCE_SINK_TRACE</span>
                </div>
                <div class="lw-terminal__body">{{ $workbenchOutput['body'] }}</div>
            </div>
        @endif
    </div>

    <div class="lw-blog-grid">
        @foreach ($blogPosts as $b)
            <article class="lw-blog-card">
                <a href="{{ $basePath }}/post?postId={{ $b->id }}"><img src="{{ $b->img }}" alt="{{ $b->title }}"></a>
                <h3>{{ $b->title }}</h3>
                <p class="lw-muted" style="margin:0;flex:1">{{ $b->excerpt }}</p>
                <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/post?postId={{ $b->id }}">View post</a>
            </article>
        @endforeach
    </div>
@endif
