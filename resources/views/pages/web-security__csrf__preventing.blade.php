@extends('layouts.academy')

@section('title', 'How to prevent CSRF vulnerabilities | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/csrf"><span itemprop="name">CSRF</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/csrf/preventing"><span itemprop="name">How to prevent CSRF vulnerabilities</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">How to prevent CSRF vulnerabilities</h1><p>
            In this section, we'll provide some high-level guidance on how you can protect your own websites from the kinds of vulnerabilities we've demonstrated in our CSRF labs.
        </p><h2 id="use-csrf-tokens">Use CSRF tokens</h2><p>
            The most robust way to defend against CSRF attacks is to include a CSRF token within relevant requests. The token must meet the following criteria:
        </p><ul>
            <li>
                <p>
                    Unpredictable with high entropy, as for session tokens in general.
                </p>
            </li>
            <li>
                <p>
                    Tied to the user's session.
                </p>
            </li>
            <li>
                <p>
                    Strictly validated in every case before the relevant action is executed.
                </p>
            </li>
        </ul><h3 id="how-should-csrf-tokens-be-generated">How should CSRF tokens be generated?</h3><p>
            CSRF tokens should contain significant entropy and be strongly unpredictable, with the same properties as session tokens in general.
        </p><p>
            You should use a cryptographically secure pseudo-random number generator (CSPRNG), seeded with the timestamp when it was created plus a static secret.
        </p><p>
            If you need further assurance beyond the strength of the CSPRNG, you can generate individual tokens by concatenating its output with some user-specific entropy and take a strong hash of the whole structure. This presents an additional barrier to an attacker who attempts to analyze the tokens based on a sample that are issued to them.
        </p><h3 id="how-should-csrf-tokens-be-transmitted">How should CSRF tokens be transmitted?</h3><p>
            CSRF tokens should be treated as secrets and handled in a secure manner throughout their lifecycle. An approach that is normally effective is to transmit the token to the client within a hidden field of an HTML form that is submitted using the POST method. The token will then be included as a request parameter when the form is submitted:
        </p><code class="code-scrollable">&lt;input type=&quot;hidden&quot; name=&quot;csrf-token&quot; value=&quot;CIwNZNlR4XbisJF39I8yWnWX9wX4WFoz&quot; /&gt;</code><p>
            For additional safety, the field containing the CSRF token should be placed as early as possible within the HTML document, ideally before any non-hidden input fields and before any locations where user-controllable data is embedded within the HTML. This mitigates against various techniques in which an attacker can use crafted data to manipulate the HTML document and capture parts of its contents.
        </p><p>
            An alternative approach, of placing the token into the URL query string, is somewhat less safe because the query string:
        </p><ul>
            <li>
                Is logged in various locations on the client and server side;
            </li>
            <li>
                Is liable to be transmitted to third parties within the HTTP Referer header; and
            </li>
            <li>
                can be displayed on-screen within the user's browser.
            </li>
        </ul><p>
            Some applications transmit CSRF tokens within a custom request header. This presents a further defense against an attacker who manages to predict or capture another user's token, because browsers do not normally allow custom headers to be sent cross-domain. However, the approach limits the application to making CSRF-protected requests using XHR (as opposed to HTML forms) and might be deemed over-complicated for many situations.
        </p><p>
            CSRF tokens should not be transmitted within cookies.
        </p><h3 id="how-should-csrf-tokens-be-validated">How should CSRF tokens be validated?</h3><p>
            When a CSRF token is generated, it should be stored server-side within the user's session data. When a subsequent request is received that requires validation, the server-side application should verify that the request includes a token which matches the value that was stored in the user's session. This validation must be performed regardless of the HTTP method or content type of the request. If the request does not contain any token at all, it should be rejected in the same way as when an invalid token is present.
        </p><h2 id="use-strict-samesite-cookie-restrictions">Use Strict SameSite cookie restrictions</h2><p>
            In addition to implementing robust CSRF token validation, we recommend explicitly setting your own SameSite restrictions with each cookie you issue. By doing so, you can control exactly which contexts the cookie will be used in, regardless of the browser.
        </p><p>
            Even if all browsers eventually adopt the "Lax-by-default" policy, this isn't suitable for every cookie and can be more easily bypassed than <code>Strict</code> restrictions. In the meantime, the inconsistency between different browsers also means that only a subset of your users will benefit from any SameSite protections at all.
        </p><p>
            Ideally, you should use the <code>Strict</code> policy by default, then lower this to <code>Lax</code> only if you have a good reason to do so. Never disable SameSite restrictions with <code>SameSite=None</code> unless you're fully aware of the security implications.
        </p><h2 id="be-wary-of-cross-origin-same-site-attacks">Be wary of cross-origin, same-site attacks</h2><p>
            Although properly configured SameSite restrictions provide good protection from cross-site attacks, it's vital to understand that they are completely powerless against cross-origin, same-site attacks.
        </p><p>
            If possible, we recommend isolating insecure content, such as user-uploaded files, on a separate site from any sensitive functionality or data. When testing a site, be sure to thoroughly audit all of the available attack surface belonging to the same site, including any of its sibling domains.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
