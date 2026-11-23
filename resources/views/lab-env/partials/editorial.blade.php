@if ($activeView === 'post' && $selectedPost)
    <article class="lw-card lw-editorial-article">
        <img src="{{ $selectedPost->img }}" alt="{{ $selectedPost->title }}" style="width:100%;max-height:300px;object-fit:cover;border-radius:10px;margin-bottom:16px">
        <span class="lw-pill lw-pill--orange">{{ __('academy.workbench.editorial_dispatch') }}</span>
        <h2 style="margin:10px 0 6px">{{ $selectedPost->title }}</h2>
        <p class="lw-muted"><span id="blog-author">{{ $selectedPost->author }}</span> &bull; {{ $selectedPost->published_label }}</p>
        <p style="font-size:1.02rem;line-height:1.7">{{ $selectedPost->body }}</p>

        <hr style="border:none;border-top:1px solid var(--lw-border);margin:24px 0">
        <h3>{{ __('academy.workbench.reader_comments') }}</h3>
        @if ($commentParam !== '')
            <section class="lw-card" style="background:var(--lw-surface-2);margin-bottom:12px;padding:12px 14px;box-shadow:none">
                <p style="margin:0 0 4px"><strong>{{ __('academy.workbench.you_label') }}</strong> &bull; <span class="lw-muted">{{ __('academy.workbench.just_now') }}</span></p>
                <p style="margin:0">{{ $commentParam }}</p>
            </section>
        @endif
        <section class="lw-card" style="background:var(--lw-surface-2);margin-bottom:18px;padding:12px 14px;box-shadow:none">
            <p style="margin:0 0 4px"><strong>Carlos Montoya</strong> &bull; <span class="lw-muted">10 Nov 2026</span></p>
            <p style="margin:0">{{ __('academy.workbench.sample_comment') }}</p>
        </section>

        <form method="POST" action="{{ $basePath }}/post/comment" class="lw-form">
            <input type="hidden" name="postId" value="{{ $selectedPost->id }}">
            <h4 style="margin-bottom:4px">{{ __('academy.workbench.leave_comment') }}</h4>
            <label>{{ __('academy.workbench.comment_label') }}</label>
            <textarea name="comment" rows="4" required></textarea>
            <div class="lw-grid lw-grid--2">
                <div>
                    <label>{{ __('academy.workbench.name_label') }}</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label>{{ __('academy.workbench.email_label') }}:</label>
                    <input type="email" name="email" required>
                </div>
            </div>
            <label>{{ __('academy.workbench.website_label') }}</label>
            <input type="text" name="website">
            <div style="margin-top:14px;display:flex;gap:10px;flex-wrap:wrap">
                <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.post_comment_btn') }}</button>
                <a class="lw-btn" href="{{ $basePath !== '' ? $basePath.'/blog' : '/blog' }}">{{ __('academy.workbench.back_to_blog') }}</a>
            </div>
        </form>
    </article>
@else
    <div class="lw-editorial-masthead">
        <div>
            <span class="lw-pill lw-pill--orange">{{ __('academy.workbench.editorial_journal', ['category' => strtoupper($lab->category_id)]) }}</span>
            <h2 style="margin:8px 0 4px;font-size:1.55rem;color:var(--lw-heading)">
                @if ($activeView === 'dom-workbench')
                    {{ __('academy.workbench.ed_dom_title') }}
                @elseif ($activeView === 'clickjacking-workbench')
                    {{ __('academy.workbench.ed_clickjacking_title') }}
                @elseif ($activeView === 'ssti-workbench')
                    {{ __('academy.workbench.ed_ssti_title') }}
                @elseif ($activeView === 'prototype-workbench')
                    {{ __('academy.workbench.ed_proto_title') }}
                @else
                    {{ __('academy.workbench.ed_default_title') }}
                @endif
            </h2>
            <p class="lw-muted" style="margin:0">{{ __('academy.workbench.ed_sub') }}</p>
        </div>
        @if (!empty($profile['hasExploitServer']))
            <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/exploit-server">{{ __('academy.workbench.open_exploit_server') }}</a>
        @endif
    </div>

    @if ($activeView === 'clickjacking-workbench')
        <div class="lw-grid lw-grid--split" style="margin-bottom:18px">
            <div class="lw-card">
                <h3>{{ __('academy.workbench.framing_surface_title') }}</h3>
                <p class="lw-muted">{!! __('academy.workbench.framing_surface_sub_html', ['path' => e($basePath)]) !!}</p>
                <div style="display:flex;gap:10px;flex-wrap:wrap">
                    <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/exploit-server">{{ __('academy.workbench.craft_framing_btn') }}</a>
                    <a class="lw-btn" href="{{ $basePath }}/my-account">{{ __('academy.workbench.inspect_account_btn') }}</a>
                </div>
            </div>
            <div class="lw-diag-console">
                <div class="lw-diag-console__head">
                    <span>FRAME_DEFENSE_HEADERS</span>
                    <span>{{ __('academy.workbench.unprotected') }}</span>
                </div>
                <div class="lw-diag-console__body">X-Frame-Options        : {{ __('academy.workbench.framing_xfo_missing') }}
Content-Security-Policy: frame-ancestors * (lab target)
Framing Status         : {{ __('academy.workbench.framing_status_vulnerable') }}</div>
            </div>
        </div>
    @elseif ($activeView === 'prototype-workbench')
        <div class="lw-grid lw-grid--split" style="margin-bottom:18px">
            <div class="lw-card">
                <h3>{{ __('academy.workbench.proto_tester_title') }}</h3>
                <form method="POST" action="{{ $basePath }}/" class="lw-form">
                    <label for="proto-payload-input">{!! __('academy.workbench.proto_payload_html') !!}</label>
                    <textarea id="proto-payload-input" name="protoPayload" rows="4" class="lw-mono" placeholder='{"__proto__":{"isAdmin":true}}  OR  ?__proto__[transport_url]=data:,alert(1)//'>{{ $params['protoPayload'] ?? '' }}</textarea>
                    <div style="margin-top:12px">
                        <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.merge_proto_btn') }}</button>
                    </div>
                </form>
            </div>
            <div class="lw-diag-console">
                <div class="lw-diag-console__head">
                    <span>PROTOTYPE_GADGET_TRACE</span>
                    <span>SANDBOX</span>
                </div>
                <div class="lw-diag-console__body">{{ !empty($workbenchOutput['body']) ? $workbenchOutput['body'] : __('academy.workbench.proto_ready') }}</div>
            </div>
        </div>
    @endif

    <div class="lw-card" style="margin-bottom:20px">
        <form method="GET" action="{{ $basePath !== '' ? $basePath : '/' }}" class="lw-form" style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">
            <input type="text" name="search" value="{{ $searchParam }}" placeholder="{{ $activeView === 'ssti-workbench' ? __('academy.workbench.ssti_search_placeholder') : __('academy.workbench.blog_search_placeholder') }}" style="flex:1 1 220px">
            <button type="submit" class="lw-btn lw-btn--primary">{{ __('academy.workbench.search_the_blog') }}</button>
        </form>
        @if ($searchParam !== '')
            <h3 style="margin:14px 0 0;color:var(--lw-arch-accent)">{{ __('academy.workbench.blog_zero_results', ['term' => $sstiEval]) }}</h3>
        @endif
        @if ($activeView === 'dom-workbench' && !empty($workbenchOutput['body']))
            <div class="lw-diag-console" style="margin-top:14px">
                <div class="lw-diag-console__head">
                    <span>DOM_SOURCE_SINK_TRACE</span>
                    <span>{{ __('academy.workbench.tainted') }}</span>
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
                <a class="lw-btn lw-btn--primary" href="{{ $basePath }}/post?postId={{ $b->id }}">{{ __('academy.workbench.view_post') }}</a>
            </article>
        @endforeach
    </div>
@endif
