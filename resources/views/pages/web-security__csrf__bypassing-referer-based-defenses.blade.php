@extends('layouts.academy')

@section('title', 'Bypassing Referer-based CSRF defenses | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="75">
            <nav class="nav-lhs-scrollable">
                <label class="nav-lhs-toggle-label" for="nav-lhs-toggle"></label>
                

        <a class="nav-back" href="/web-security/all-topics">
            <span class="icon-arrow-head-left"></span>
            Back to all topics
        </a>
        <input type="checkbox" id="nav-main-id">
        <label class="nav-label" for="nav-main-id">
            <span class="icon-arrow-head-down"></span>
        </label>
        <h3>Cross-site request forgery (CSRF)</h3>
        <ul>
            <li><a href="/web-security/csrf#what-is-csrf">What is CSRF?</a></li>
            <li><a href="/web-security/csrf#what-is-the-impact-of-a-csrf-attack">Impact</a></li>
            <li><a href="/web-security/csrf#how-does-csrf-work">How does CSRF work?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/csrf/xss-vs-csrf">XSS vs CSRF</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/csrf/xss-vs-csrf#can-csrf-tokens-prevent-xss-attacks">Can CSRF tokens prevent XSS attacks?</a></li>
                </ul>
            </li>
            <li><a href="/web-security/csrf#how-to-construct-a-csrf-attack">Constructing an attack</a></li>
            <li><a href="/web-security/csrf#how-to-deliver-a-csrf-exploit">Delivering an exploit</a></li>
            <li><a href="/web-security/csrf#common-defences-against-csrf">Defences</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/csrf/bypassing-token-validation">Bypassing CSRF token validation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/csrf/bypassing-token-validation#what-is-a-csrf-token">What is a CSRF token?</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-3">
                        <label for="sub-nav-id-3">
                            <a href="/web-security/csrf/bypassing-token-validation#common-flaws-in-csrf-token-validation">Flaws in CSRF token validation</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/csrf/bypassing-token-validation#validation-of-csrf-token-depends-on-request-method">Validation depends on request method</a></li>
                            <li><a href="/web-security/csrf/bypassing-token-validation#validation-of-csrf-token-depends-on-token-being-present">Validation depends on token being present</a></li>
                            <li><a href="/web-security/csrf/bypassing-token-validation#csrf-token-is-not-tied-to-the-user-session">Token isn't tied to user session</a></li>
                            <li><a href="/web-security/csrf/bypassing-token-validation#csrf-token-is-tied-to-a-non-session-cookie">Token is tied to a non-session cookie</a></li>
                            <li><a href="/web-security/csrf/bypassing-token-validation#csrf-token-is-simply-duplicated-in-a-cookie">Token is duplicated in a cookie</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions">Bypassing SameSite cookie restrictions</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/csrf/bypassing-samesite-restrictions#what-is-a-site-in-the-context-of-samesite-cookies">What is a site?</a></li>
                    <li><a href="/web-security/csrf/bypassing-samesite-restrictions#what-s-the-difference-between-a-site-and-an-origin">Site vs origin</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-5">
                        <label for="sub-nav-id-5">
                            <a href="/web-security/csrf/bypassing-samesite-restrictions#how-does-samesite-work">How does SameSite work?</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/csrf/bypassing-samesite-restrictions#strict">Strict restriction level</a></li>
                            <li><a href="/web-security/csrf/bypassing-samesite-restrictions#lax">Lax restriction level</a></li>
                            <li><a href="/web-security/csrf/bypassing-samesite-restrictions#none">No SameSite restrictions</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/csrf/bypassing-samesite-restrictions#bypassing-samesite-lax-restrictions-using-get-requests">Bypassing Lax restrictions using GET requests</a></li>
                    <li><a href="/web-security/csrf/bypassing-samesite-restrictions#bypassing-samesite-restrictions-using-on-site-gadgets">Bypassing restrictions using on-site gadgets</a></li>
                    <li><a href="/web-security/csrf/bypassing-samesite-restrictions#bypassing-samesite-restrictions-via-vulnerable-sibling-domains">Bypassing restrictions via vulnerable sibling domains</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-6">
                <label for="sub-nav-id-6">
                    <a href="/web-security/csrf/bypassing-referer-based-defenses">Bypassing Referer-based CSRF defenses</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/csrf/bypassing-referer-based-defenses#validation-of-referer-depends-on-header-being-present">Validation of Referer depends on header being present</a></li>
                    <li><a href="/web-security/csrf/bypassing-referer-based-defenses#validation-of-referer-can-be-circumvented">Validation of Referer can be circumvented</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-7">
                <label for="sub-nav-id-7">
                    <a href="/web-security/csrf/preventing">Preventing CSRF vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-8">
                        <label for="sub-nav-id-8">
                            <a href="/web-security/csrf/preventing#use-csrf-tokens">CSRF tokens</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/csrf/preventing#how-should-csrf-tokens-be-generated">Generating</a></li>
                            <li><a href="/web-security/csrf/preventing#how-should-csrf-tokens-be-transmitted">Transmitting</a></li>
                            <li><a href="/web-security/csrf/preventing#how-should-csrf-tokens-be-validated">Validating</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/csrf/preventing#use-strict-samesite-cookie-restrictions">Strict SameSite cookie restrictions</a></li>
                    <li><a href="/web-security/csrf/preventing#be-wary-of-cross-origin-same-site-attacks">Be wary of cross-origin, same-site attacks</a></li>
                </ul>
            </li>
            <li><a href="/web-security/all-labs#cross-site-request-forgery-csrf">View all CSRF labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/csrf"><span itemprop="name">CSRF</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/csrf/bypassing-referer-based-defenses"><span itemprop="name">Bypassing Referer-based CSRF defenses</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2" id="bypassing-referer-based-csrf-defenses" chunk-id="6B2FCED5AC010CE35EEC8C55F348A187">Bypassing Referer-based CSRF defenses</h1><p>
            Aside from defenses that employ CSRF tokens, some applications make use of the HTTP <code>Referer</code> header to attempt to defend against CSRF attacks, normally by verifying that the request originated from the application's own domain. This approach is generally less effective and is often subject to bypasses.
        </p><div class="component-definition">
            <h4>Referer header</h4>
            <p>
                The HTTP Referer header (which is inadvertently misspelled in the HTTP specification) is an optional request header that contains the URL of the web page that linked to the resource that is being requested. It is generally added automatically by browsers when a user triggers an HTTP request, including by clicking a link or submitting a form. Various methods exist that allow the linking page to withhold or modify the value of the <code>Referer</code> header. This is often done for privacy reasons.
            </p>
        </div><h2 id="validation-of-referer-depends-on-header-being-present" chunk-id="7F420CDF4FBC3257439EE5EC4A78F05F">Validation of Referer depends on header being present</h2><p>
            Some applications validate the <code>Referer</code> header when it is present in requests but skip the validation if the header is omitted.
        </p><p>
            In this situation, an attacker can craft their CSRF exploit in a way that causes the victim user's browser to drop the <code>Referer</code> header in the resulting request. There are various ways to achieve this, but the easiest is using a META tag within the HTML page that hosts the CSRF attack:
        </p><code class="code-scrollable">&lt;meta name=&quot;referrer&quot; content=&quot;never&quot;&gt;</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '827802FA22CC24000BB63CD4A2787BA5076B3C9727323EA512DC392BA98842B8'])@verbatim<h2 id="validation-of-referer-can-be-circumvented" chunk-id="E91B2568E5D0BEE5069614DB6D4DF5D3">Validation of Referer can be circumvented</h2><p>
            Some applications validate the <code>Referer</code> header in a naive way that can be bypassed. For example, if the application validates that the domain in the <code>Referer</code> starts with the expected value, then the attacker can place this as a subdomain of their own domain:
        </p><code class="code-scrollable">http://vulnerable-website.com.attacker-website.com/csrf-attack</code><p>
            Likewise, if the application simply validates that the <code>Referer</code> contains its own domain name, then the attacker can place the required value elsewhere in the URL:
        </p><code class="code-scrollable">http://attacker-website.com/csrf-attack?vulnerable-website.com</code><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                Although you may be able to identify this behavior using Burp, you will often find that this approach no longer works when you go to test your proof-of-concept in a browser. In an attempt to reduce the risk of sensitive data being leaked in this way, many browsers now strip the query string from the <code>Referer</code> header by default.
            </p>
            <p>
                You can override this behavior by making sure that the response containing your exploit has the <code>Referrer-Policy: unsafe-url</code> header set (note that <code>Referrer</code> is spelled correctly in this case, just to make sure you're paying attention!). This ensures that the full URL will be sent, including the query string.
            </p>
        </div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '16D017D6CC0162F41EA71950A84E47E8A8B7914D65E26F917EA8FD2366287791'])@verbatim
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
