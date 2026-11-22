@if ($activeView === 'post' && $selectedPost)
    <article class="lw-card lw-editorial-article">
        <img src="{{ $selectedPost->img }}" alt="{{ $selectedPost->title }}" style="width:100%;max-height:300px;object-fit:cover;border-radius:10px;margin-bottom:16px">
        <span class="lw-pill lw-pill--orange">EDITORIAL DISPATCH</span>
        <h2 style="margin:10px 0 6px">{{ $selectedPost->title }}</h2>
        <p class="lw-muted"><span id="blog-author">{{ $selectedPost->author }}</span> &bull; {{ $selectedPost->published_label }}</p>
        <p style="font-size:1.02rem;line-height:1.7">{{ $selectedPost->body }}</p>

        <hr style="border:none;border-top:1px solid var(--lw-border);margin:24px 0">
        <h3>Reader Comments</h3>
        @if ($commentParam !== '')
            <section class="lw-card" style="background:var(--lw-surface-2);margin-bottom:12px;padding:12px 14px;box-shadow:none">
                <p style="margin:0 0 4px"><strong>You</strong> &bull; <span class="lw-muted">Just now</span></p>
                <p style="margin:0">{{ $commentParam }}</p>
            </section>
        @endif
        <section class="lw-card" style="background:var(--lw-surface-2);margin-bottom:18px;padding:12px 14px;box-shadow:none">
            <p style="margin:0 0 4px"><strong>Carlos Montoya</strong> &bull; <span class="lw-muted">10 Nov 2026</span></p>
            <p style="margin:0">Great write-up! Make sure to sanitize user-supplied website links and comment bodies.</p>
        </section>

        <form method="POST" action="{{ $basePath }}/post/comment" class="lw-form">
            <input type="hidden" name="postId" value="{{ $selectedPost->id }}">
            <h4 style="margin-bottom:4px">Leave a comment</h4>
            <label>Comment:</label>
            <textarea name="comment" rows="4" required></textarea>
            <div class="lw-grid lw-grid--2">
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
            </div>
            <label>Website:</label>
            <input type="text" name="website">
            <div style="margin-top:14px;display:flex;gap:10px">
                <button type="submit" class="lw-btn lw-btn--primary">Post comment</button>
                <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/blog' : '/blog' }}">Back to Blog</a>
            </div>
        </form>
    </article>
@else
    <div class="lw-editorial-masthead">
        <div>
            <span class="lw-pill lw-pill--orange">EDITORIAL JOURNAL // {{ strtoupper($lab->category_id) }}</span>
            <h2 style="margin:8px 0 4px;font-size:1.55rem;color:var(--lw-heading)">
                @if ($activeView === 'dom-workbench')
                    The SecDev DOM Sink &amp; Editorial Review
                @elseif ($activeView === 'clickjacking-workbench')
                    Clickjacking &amp; UI Redressing Target Surface
                @elseif ($activeView === 'ssti-workbench')
                    Server-Side Template Sandbox &amp; Blog
                @elseif ($activeView === 'prototype-workbench')
                    Prototype Pollution Gadget &amp; Editorial Feed
                @else
                    The SecDev Engineering Journal
                @endif
            </h2>
            <p class="lw-muted" style="margin:0">Explore reflected/stored XSS, DOM sources/sinks, framing targets, SSTI templates, or prototype gadgets.</p>
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
            <div class="lw-diag-console">
                <div class="lw-diag-console__head">
                    <span>FRAME_DEFENSE_HEADERS</span>
                    <span>UNPROTECTED</span>
                </div>
                <div class="lw-diag-console__body">X-Frame-Options        : MISSING / UNPROTECTED
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
            <div class="lw-diag-console">
                <div class="lw-diag-console__head">
                    <span>PROTOTYPE_GADGET_TRACE</span>
                    <span>SANDBOX</span>
                </div>
                <div class="lw-diag-console__body">{{ !empty($workbenchOutput['body']) ? $workbenchOutput['body'] : 'Ready. Submit __proto__ or constructor.prototype payload.' }}</div>
            </div>
        </div>
    @endif

    <div class="lw-card" style="margin-bottom:20px">
        <form method="GET" action="{{ $basePath !== '' ? $basePath : '/' }}" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">
            <input type="text" name="search" value="{{ $searchParam }}" placeholder="{{ $activeView === 'ssti-workbench' ? ('Test template expression e.g. '.chr(123).chr(123).'7*7'.chr(125).chr(125).' or search...') : 'Search the blog...' }}" style="flex:1 1 260px">
            <button type="submit" class="lw-btn lw-btn--primary">Search the blog</button>
        </form>
        @if ($searchParam !== '')
            <h3 style="margin:14px 0 0;color:var(--lw-arch-accent)">0 search results for '{{ $sstiEval }}'</h3>
        @endif
        @if ($activeView === 'dom-workbench' && !empty($workbenchOutput['body']))
            <div class="lw-diag-console" style="margin-top:14px">
                <div class="lw-diag-console__head">
                    <span>DOM_SOURCE_SINK_TRACE</span>
                    <span>TAINTED</span>
                </div>
                <div class="lw-diag-console__body">{{ $workbenchOutput['body'] }}</div>
            </div>
        @endif
    </div>

    <div class="lw-blog-grid">
        @foreach ($blogPosts as $b)
            <article class="lw-blog-card">
                <a href="{{ $basePath }}/post?postId={{ $b->id }}"><img src="{{ $b->img }}" alt="{{ $b->title }}"></a>
                <div class="lw-muted" style="font-size:0.76rem">{{ $b->author }} &bull; {{ $b->published_label }}</div>
                <h3>{{ $b->title }}</h3>
                <p class="lw-muted" style="margin:0;flex:1">{{ $b->excerpt }}</p>
                <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/post?postId={{ $b->id }}">View post</a>
            </article>
        @endforeach
    </div>
@endif
