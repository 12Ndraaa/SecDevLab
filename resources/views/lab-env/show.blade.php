<!DOCTYPE html>
<html lang="en">
<!--LAB_HEAD_START-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/content/images/logos/favicon.ico" type="image/x-icon">
    <link href="/resources/labheader/css/academyLabHeader.css" rel="stylesheet">
    <link href="{{ $themeCssHref }}" rel="stylesheet">
    <link href="/content/ps-responsive-fixes.css" rel="stylesheet">
    <title>{{ $isMystery ? 'Mystery Lab Challenge' : $lab->title }}</title>
</head>
<!--LAB_HEAD_END-->
<body>
<!--LAB_HEADER_START-->
<div id="academyLabHeader" data-lab-id="{{ strtolower($lab->id) }}" data-auto-solved="{{ $autoSolved ? 'true' : 'false' }}">
    <section id="notification-labsolved" class="{{ $autoSolved ? 'notification-labsolved' : 'notification-labsolved-hidden' }}">
        <div class="container">
            <h4>Congratulations, you solved the lab!</h4>
            <div>
                <span>Share your skills!</span>
                <a class="button" href="{{ $lab->href }}">
                    Continue learning
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 28 30" enable-background="new 0 0 28 30" xml:space="preserve" title="back-arrow">
                        <g>
                            <polygon points="1.4,0 0,1.2 12.6,15 0,28.8 1.4,30 15.1,15"></polygon>
                            <polygon points="14.3,0 12.9,1.2 25.6,15 12.9,28.8 14.3,30 28,15"></polygon>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <section class="academyLabBanner">
        <div class="container">
            <div class="logo"></div>
            <div class="title-container">
                <h2 id="banner-lab-title">{{ $isMystery && !$revealMystery ? 'Mystery Lab Challenge' : $lab->title }}</h2>
                @if ($isMystery && !$revealMystery)
                    <a class="button" href="/lab-env/{{ $lab->id }}?mystery=1&amp;reveal=1">Reveal Objective</a>
                @endif
                @if (!empty($profile['hasSubmitSolution']))
                    <details class="ps-inline-details">
                        <summary id="submitSolution" class="button">Submit solution</summary>
                        <div id="submit-solution-modal" class="ps-inline-details__panel">
                            <form method="POST" action="/lab-env/{{ $lab->id }}/submit-solution">
                                <label for="solution-answer-input">Enter the exfiltrated secret, password, API key, or hostname required by the lab:</label>
                                <div style="display:flex;gap:8px;flex-wrap:wrap;align-items:center;margin-top:8px">
                                    <input type="text" name="answer" id="solution-answer-input" placeholder="Paste the exfiltrated secret, key, or hostname..." style="margin-bottom:0;flex:1" required>
                                    <button type="submit" class="button">Submit</button>
                                </div>
                            </form>
                        </div>
                    </details>
                @endif
                @if (!empty($profile['hasExploitServer']))
                    <a id="exploit-link" class="button" href="/lab-env/{{ $lab->id }}/exploit-server">Go to exploit server</a>
                @endif
                @if (!empty($profile['hasEmailClient']))
                    <a id="email-link" class="button" href="/lab-env/{{ $lab->id }}/email">Email client</a>
                @endif
                <a class="link-back" href="{{ $lab->href }}">
                    Back&nbsp;to&nbsp;lab&nbsp;description&nbsp;
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 28 30" enable-background="new 0 0 28 30" xml:space="preserve" title="back-arrow">
                        <g>
                            <polygon points="1.4,0 0,1.2 12.6,15 0,28.8 1.4,30 15.1,15"></polygon>
                            <polygon points="14.3,0 12.9,1.2 25.6,15 12.9,28.8 14.3,30 28,15"></polygon>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="widgetcontainer-lab-status {{ $autoSolved ? 'is-solved' : 'is-notsolved' }}" id="env-status-widget">
                <span>LAB</span>
                <p id="env-status-text">{{ $autoSolved ? 'Solved' : 'Not solved' }}</p>
                <span class="lab-status-icon"></span>
            </div>
        </div>
    </section>
</div>
<!--LAB_HEADER_END-->

<div theme="{{ $theme }}">
    <section class="maincontainer">
        <div class="container">
            <header class="navigation-header">
                <section class="top-links">
                    <a href="/lab-env/{{ $lab->id }}">Home</a><p>|</p>
                    @if (!empty($profile['hasLiveChat']))
                        <a href="/lab-env/{{ $lab->id }}/chat">Live chat</a><p>|</p>
                    @endif
                    @if (!empty($profile['hasAdminPanel']) && ($validLoginTriggered || str_contains($cookieHeader, 'Admin=true')))
                        <a href="/lab-env/{{ $lab->id }}/admin">Admin panel</a><p>|</p>
                    @endif
                    @if (!empty($profile['hasMyAccount']))
                        <a href="/lab-env/{{ $lab->id }}/my-account">My account</a><p>|</p>
                    @endif
                    @if (!empty($profile['hasCart']))
                        <a href="/lab-env/{{ $lab->id }}?view=cart">My cart</a><p>|</p>
                    @endif
                </section>
            </header>

            <header class="notification-header">
                @if (!empty($submitSolutionError))
                    <p class="is-warning" style="padding:8px 12px;margin:8px 0;background:#fdecea;border:1px solid #e57373;color:#b71c1c">
                        {{ $submitSolutionError }}
                    </p>
                @endif
                @if ($exfiltrated && !$autoSolved && !empty($profile['requiresMultiStep']))
                    <p class="is-warning" style="padding:8px 12px;margin:8px 0">
                        Step 1 complete (data exfiltrated). Complete the final step ({{ !empty($profile['requiresLoginAfterExfil']) ? 'log in as administrator via My account' : 'click Submit solution' }}) to solve the lab.
                    </p>
                @endif
            </header>

            @if ($activeView === 'product')
                <div class="is-page">
                    <h2>{{ $selectedProduct->name }}</h2>
                    <img src="/resources/images/rating{{ $selectedProduct->stars }}.png" alt="{{ $selectedProduct->stars }} stars">
                    <img src="{{ $resolveProdImg($selectedProduct) }}" alt="{{ $selectedProduct->name }}">
                    <h3>{{ $selectedProduct->price }}</h3>
                    <p>{{ $selectedProduct->desc }}</p>
                    @if (!empty($profile['hasStockCheck']) || $storeIdParam !== '')
                        <form id="stockCheckForm" action="/lab-env/{{ $lab->id }}/product/stock" method="POST">
                            <input type="hidden" name="productId" value="{{ $selectedProduct->id }}">
                            <select name="storeId">
                                <option value="London">London</option>
                                <option value="Paris">Paris</option>
                                <option value="Milan">Milan</option>
                            </select>
                            <button type="submit" class="button">Check stock</button>
                        </form>
                        <span id="stockCheckResult">{{ $stockOutput }}</span>
                    @endif
                    @if (!empty($profile['hasCart']))
                        <form action="/lab-env/{{ $lab->id }}/cart" method="POST" style="margin-top:12px">
                            <input type="hidden" name="productId" value="{{ $selectedProduct->id }}">
                            <button type="submit" class="button">Add to cart</button>
                        </form>
                    @endif
                    <div class="is-linkback">
                        <a href="/lab-env/{{ $lab->id }}">Return to list</a>
                    </div>
                </div>

            @elseif ($activeView === 'blog' || $activeView === 'post')
                <section class="blog-header">
                    <img src="/resources/images/blog.svg" alt="We Like To Blog">
                </section>
                @if (!empty($profile['hasSearchBox']) || $searchParam !== '')
                    <section class="search">
                        <form method="GET" action="/lab-env/{{ $lab->id }}">
                            <input type="text" name="search" value="{{ $searchParam }}" placeholder="Search the blog...">
                            <button type="submit" class="button">Search the blog</button>
                        </form>
                    </section>
                @endif
                @if ($searchParam !== '')
                    <section class="blog-header">
                        <h2>0 search results for '{{ $sstiEval }}'</h2>
                    </section>
                @endif
                @if ($selectedPost)
                    <div class="blog-post">
                        <img src="{{ $selectedPost->img }}" alt="{{ $selectedPost->title }}">
                        <h2>{{ $selectedPost->title }}</h2>
                        <p><span id="blog-author">{{ $selectedPost->author }}</span> | {{ $selectedPost->published_label }}</p>
                        <p>{{ $selectedPost->body }}</p>
                        <hr>
                        <h3>Comments</h3>
                        @if ($commentParam !== '')
                            <section class="comment">
                                <p><strong>You</strong> | Just now</p>
                                <p>{{ $commentParam }}</p>
                            </section>
                        @endif
                        <section class="comment">
                            <p><strong>Carlos Montoya</strong> | 10 Nov 2026</p>
                            <p>Great write-up! Make sure to sanitize user-supplied website links and comment bodies.</p>
                        </section>
                        <form method="POST" action="/lab-env/{{ $lab->id }}/post/comment" class="login-form">
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
                            <button type="submit" class="button">Post comment</button>
                        </form>
                        <div class="is-linkback">
                            <a href="/lab-env/{{ $lab->id }}">Back to Blog</a>
                        </div>
                    </div>
                @else
                    <div class="blog-list">
                        @foreach ($blogPosts as $b)
                            <div class="blog-post">
                                <a href="/lab-env/{{ $lab->id }}/post?postId={{ $b->id }}"><img src="{{ $b->img }}" alt="{{ $b->title }}"></a>
                                <h2>{{ $b->title }}</h2>
                                <p>{{ $b->excerpt }}</p>
                                <a class="button is-small" href="/lab-env/{{ $lab->id }}/post?postId={{ $b->id }}">View post</a>
                            </div>
                        @endforeach
                    </div>
                @endif

            @elseif ($activeView === 'upload-result')
                <header class="notification-header"></header>
                <p>{{ $uploadMsg }}</p>
                <p><a href="/lab-env/{{ $lab->id }}/my-account" title="Back to My Account">Back to My Account</a></p>

            @elseif ($activeView === 'account' || $activeView === 'my-account' || $activeView === 'login')
                <section class="ecoms-pageheader">
                    <h2>{{ $currentUser !== '' ? 'My Account' : 'Login' }}</h2>
                </section>
                <div class="login-form">
                    @if ($currentUser !== '')
                        <div id="account-details">
                            @if (!empty($profile['hasAvatarUpload']))
                                <p><img class="avatar" src="{{ $avatarSrc }}" alt="Avatar" style="width:96px;height:96px;border-radius:50%;object-fit:cover;display:block;margin-bottom:12px"></p>
                            @endif
                            <p>Your username is: <strong>{{ $currentUser }}</strong></p>
                            <p>Your API Key is: <code>Bk92xPq7Lm4vNz8Qw1Er5Ty3Ui6Op0As</code></p>
                        </div>
                    @else
                        <form id="login-form" method="POST" action="/lab-env/{{ $lab->id }}/login">
                            <label for="login-user">Username</label>
                            <input type="text" name="username" id="login-user" value="{{ $userParam }}" required>
                            <label for="login-pass">Password</label>
                            <input type="password" name="password" id="login-pass">
                            <button type="submit" class="button">Log in</button>
                        </form>
                    @endif

                    @if ($currentUser !== '' && !empty($profile['hasAvatarUpload']))
                        <hr>
                        <form id="avatar-upload-form" action="/lab-env/{{ $lab->id }}/my-account/avatar" method="POST" enctype="multipart/form-data">
                            <label for="avatar-file-input">Avatar</label>
                            <input type="file" name="avatar" id="avatar-file-input" required>
                            <input type="hidden" name="user" value="{{ $currentUser }}">
                            <input type="hidden" name="csrf" value="c8f9e1a2b3d4567890abcdef12345678">
                            <button type="submit" class="button">Upload</button>
                        </form>
                    @endif

                    @if (!empty($profile['hasChangeEmail']) || $currentUser !== '')
                        <hr>
                        <form class="login-form" method="POST" action="/lab-env/{{ $lab->id }}/my-account/change-email">
                            <input type="hidden" name="action" value="change-email">
                            <label for="acct-email">Email</label>
                            <input type="email" name="email" id="acct-email" value="wiener@normal-user.net" required>
                            <button type="submit" class="button">Update email</button>
                        </form>
                    @endif
                </div>

            @elseif ($activeView === 'admin')
                <section class="ecoms-pageheader">
                    <h2>Users</h2>
                </section>
                <div>
                    @if ($adminDeleteCarlos)
                        <p>User carlos deleted successfully.</p>
                    @else
                        <div>
                            <span>carlos - </span>
                            <a href="/lab-env/{{ $lab->id }}/admin/delete?username=carlos">Delete</a>
                        </div>
                        <div>
                            <span>wiener - </span>
                            <a href="/lab-env/{{ $lab->id }}/admin/delete?username=wiener">Delete</a>
                        </div>
                    @endif
                </div>

            @elseif ($activeView === 'cart')
                <section class="ecoms-pageheader">
                    <h2>Your Cart</h2>
                </section>
                <div class="login-form">
                    <p><strong>Store credit:</strong> $100.00</p>
                    @if ($cartMessage !== '')
                        <p class="is-warning" style="padding:8px 12px;margin:8px 0">{{ $cartMessage }}</p>
                    @endif
                    <table class="is-table-list">
                        <thead><tr><th>Product</th><th>Price</th><th>Quantity</th></tr></thead>
                        <tbody>
                            <tr>
                                <td>Lightweight "l33t" Leather Jacket</td>
                                <td>$1337.00</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                    <form method="POST" action="/lab-env/{{ $lab->id }}/cart">
                        <input type="hidden" name="price" value="1337">
                        <label for="cart-qty">Quantity:</label>
                        <input type="number" id="cart-qty" name="quantity" value="1">
                        <label for="cart-coupon">Coupon:</label>
                        <input type="text" id="cart-coupon" name="coupon" placeholder="Enter coupon code">
                        <button type="submit" class="button">Place order</button>
                    </form>
                </div>

            @elseif ($activeView === 'chat')
                <section class="ecoms-pageheader">
                    <h2>Live chat</h2>
                </section>
                <div class="login-form">
                    <div id="chat-log" style="height:240px;overflow-y:auto;background:#fff;border:1px solid #cbd0d1;padding:12px;margin-bottom:12px">
                        <p><strong>Arti Ficial:</strong> Hello! How can I help you today?</p>
                        @foreach ($chatHistory as $entry)
                            <p><strong>{{ $entry['sender'] }}:</strong> {{ $entry['text'] }}</p>
                        @endforeach
                    </div>
                    <form method="POST" action="/lab-env/{{ $lab->id }}/chat" style="display:flex;gap:8px">
                        <input type="text" name="message" id="chat-input" placeholder="Type a message..." style="margin-bottom:0;flex:1" required>
                        <button type="submit" class="button" style="margin:0">Send</button>
                    </form>
                </div>

            @elseif ($activeView === 'email')
                <section class="ecoms-pageheader">
                    <h2>Email client</h2>
                </section>
                <table class="is-table-list">
                    <thead><tr><th>From</th><th>Subject</th><th>Body</th></tr></thead>
                    <tbody>
                        <tr>
                            <td>no-reply@ginandjuice.shop</td>
                            <td>Account registration / password reset</td>
                            <td><a href="/lab-env/{{ $lab->id }}/my-account?temp-forgot-password-token=d8f9a2b4c6e1073">https://ginandjuice.shop/forgot-password?temp-forgot-password-token=d8f9a2b4c6e1073</a></td>
                        </tr>
                    </tbody>
                </table>

            @elseif ($activeView === 'exploit-server')
                <section class="ecoms-pageheader">
                    <h2>Exploit Server</h2>
                </section>
                @if ($exploitError !== '')
                    <p class="is-warning" style="padding:8px 12px;margin:8px 0;background:#fdecea;border:1px solid #e57373;color:#b71c1c">{{ $exploitError }}</p>
                @endif
                @if ($exploitFeedback !== '')
                    <p class="is-warning" style="padding:8px 12px;margin:8px 0;background:#e8f5e9;border:1px solid #66bb6a;color:#1b5e20">{{ $exploitFeedback }}</p>
                @endif
                <form method="POST" action="/lab-env/{{ $lab->id }}/exploit-server" class="login-form">
                    <label for="exp-path">File:</label>
                    <input type="text" id="exp-path" name="responseFile" value="{{ $exploitState['responseFile'] ?? '/exploit' }}">
                    <label for="exp-head">Head:</label>
                    <textarea id="exp-head" name="responseHead" rows="3">{{ $exploitState['responseHead'] ?? "HTTP/1.1 200 OK\nContent-Type: text/html; charset=utf-8" }}</textarea>
                    <label for="exp-body">Body:</label>
                    <textarea id="exp-body" name="responseBody" rows="6" placeholder="Enter your exploit payload (e.g. HTML/JS/CSRF/Clickjacking/CORS PoC)...">{{ $exploitState['responseBody'] ?? '' }}</textarea>
                    <div>
                        <button type="submit" name="formAction" value="STORE" class="button">Store</button>
                        <button type="submit" name="formAction" value="DELIVER_TO_VICTIM" class="button">Deliver exploit to victim</button>
                        <button type="submit" name="formAction" value="ACCESS_LOG" class="button">Access log</button>
                    </div>
                </form>
                @if (!empty($exploitState['accessLog']))
                    <div style="margin-top:16px">
                        <h4>Access Log</h4>
                        <pre style="background:#f5f5f5;padding:12px;border:1px solid #cbd0d1">{{ implode("\n", $exploitState['accessLog']) }}</pre>
                    </div>
                @endif

            @else
                <section class="ecoms-pageheader">
                    <img src="/resources/images/shop.svg" alt="We Like To Shop">
                </section>
                @if (!empty($profile['hasSearchBox']) && empty($profile['hasCategoryFilter']))
                    <section class="search">
                        <form method="GET" action="/lab-env/{{ $lab->id }}">
                            <input type="text" name="search" value="{{ $searchParam }}" placeholder="Search products...">
                            <button type="submit" class="button">Search</button>
                        </form>
                    </section>
                @else
                    <section class="search-filters">
                        <label>Refine your search:</label>
                        @foreach ($categoriesList as $c)
                            <a class="filter-category {{ $categoryParam === $c['label'] ? 'selected' : '' }}" href="{{ $c['href'] }}">{{ $c['label'] }}</a>
                        @endforeach
                    </section>
                @endif

                @if ($searchParam !== '')
                    <p style="margin:10px 0">Search results for '{{ $sstiEval }}'</p>
                @endif

                @if (!empty($unionRows))
                    <table class="is-table-list">
                        <tbody>
                            @foreach ($unionRows as $r)
                                <tr><th>{{ $r['col1'] }}</th><td>{{ $r['col2'] }}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <section class="container-list-tiles">
                    @foreach ($visibleProducts as $p)
                        <div>
                            <img src="{{ $resolveProdImg($p) }}" alt="{{ $p->name }}">
                            <h3>{{ $p->name }}</h3>
                            <img src="/resources/images/rating{{ $p->stars }}.png" alt="{{ $p->stars }} stars">
                            {{ $p->price }}
                            <a class="button" href="/lab-env/{{ $lab->id }}/product?productId={{ $p->id }}">View details</a>
                        </div>
                    @endforeach
                </section>
            @endif
        </div>
    </section>
    <div class="footer-wrapper"></div>
</div>
</body>
</html>
