@extends('layouts.academy')

@section('title', 'Bypassing CSRF token validation | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/csrf"><span itemprop="name">CSRF</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/csrf/bypassing-token-validation"><span itemprop="name">Bypassing CSRF token validation</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Bypassing CSRF token validation</h1><p>
            In this section, we'll explain what CSRF tokens are, how they protect against CSRF attacks, and how you can potentially bypass these defenses.
        </p><h2 id="what-is-a-csrf-token" chunk-id="083D356264CB1E93D6DEDBCB77A59AB2">What is a CSRF token?</h2><p>
            A CSRF token is a unique, secret, and unpredictable value that is generated by the server-side application and shared with the client. When issuing a request to perform a sensitive action, such as submitting a form, the client must include the correct CSRF token. Otherwise, the server will refuse to perform the requested action.
        </p><p>
            A common way to share CSRF tokens with the client is to include them as a hidden parameter in an HTML form, for example:
        </p><code class="code-scrollable">&lt;form name="change-email-form" action="/my-account/change-email" method="POST"&gt;
    &lt;label&gt;Email&lt;/label&gt;
    &lt;input required type="email" name="email" value="example@normal-website.com"&gt;
    &lt;input required type="hidden" name="csrf" value="50FaWgdOhi9M9wyna8taR1k3ODOR8d6u"&gt;
    &lt;button class='button' type='submit'&gt; Update email &lt;/button&gt;
&lt;/form&gt;</code><p id="what-is-a-csrf-token-L1A9" chunk-id="A4AE20C86BFFC6CDA90064F2CD23333B">
            Submitting this form results in the following request:
        </p><code class="code-scrollable">POST /my-account/change-email HTTP/1.1
Host: normal-website.com
Content-Length: 70
Content-Type: application/x-www-form-urlencoded

csrf=50FaWgdOhi9M9wyna8taR1k3ODOR8d6u&email=example@normal-website.com</code><p>
            When implemented correctly, CSRF tokens help protect against CSRF attacks by making it difficult for an attacker to construct a valid request on behalf of the victim. As the attacker has no way of predicting the correct value for the CSRF token, they won't be able to include it in the malicious request.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                CSRF tokens don't have to be sent as hidden parameters in a <code>POST</code> request. Some applications place CSRF tokens in HTTP headers, for example. The way in which tokens are transmitted has a significant impact on the security of a mechanism as a whole. For more information, see <a href="/web-security/csrf/preventing">How to prevent CSRF vulnerabilities</a>.
            </p>
        </div><h2 id="common-flaws-in-csrf-token-validation" chunk-id="A67A4A6E4720C1CD8D31A45C4CB78F19">Common flaws in CSRF token validation</h2><p>
            CSRF vulnerabilities typically arise due to flawed validation of CSRF tokens. In this section, we'll cover some of the most common issues that enable attackers to bypass these defenses.
        </p><h3 id="validation-of-csrf-token-depends-on-request-method" chunk-id="4B9FA43250273227B3D90F330FC5F4C8">Validation of CSRF token depends on request method</h3><p>
            Some applications correctly validate the token when the request uses the POST method but skip the validation when the GET method is used.
        </p><p>
            In this situation, the attacker can switch to the GET method to bypass the validation and deliver a CSRF attack:
        </p><code class="code-scrollable">GET /email/change?email=pwned@evil-user.net HTTP/1.1
Host: vulnerable-website.com
Cookie: session=2yQIDcpia41WrATfjPqvm9tOkDvkMvLm</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '67B30F1019D4DA5703CFB696AE747D43ECCA9801FA36D4BEC720290C4E09451E'])@verbatim<h3 id="validation-of-csrf-token-depends-on-token-being-present" chunk-id="D6D3F6759E30C65A2D78E8AE7A547C50">Validation of CSRF token depends on token being present</h3><p>
            Some applications correctly validate the token when it is present but skip the validation if the token is omitted.
        </p><p>
            In this situation, the attacker can remove the entire parameter containing the token (not just its value) to bypass the validation and deliver a CSRF attack:
        </p><code class="code-scrollable">POST /email/change HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 25
Cookie: session=2yQIDcpia41WrATfjPqvm9tOkDvkMvLm

email=pwned@evil-user.net</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '464B3CE68CB4A94B23C4DCA52F5535B394CB9D940479664818F3FD06C514CD42'])@verbatim<h3 id="csrf-token-is-not-tied-to-the-user-session" chunk-id="D6F39C0DAAE0F97C26AB1DD16A08D760">CSRF token is not tied to the user session</h3><p>
            Some applications do not validate that the token belongs to the same session as the user who is making the request. Instead, the application maintains a global pool of tokens that it has issued and accepts any token that appears in this pool.
        </p><p>
            In this situation, the attacker can log in to the application using their own account, obtain a valid token, and then feed that token to the victim user in their CSRF attack.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '9EAE9022063A6E38C28FC4B7904B4AC75CA324323CEB51DAC385AD7DC5C734E5'])@verbatim<h3 id="csrf-token-is-tied-to-a-non-session-cookie" chunk-id="41EFFD12D7065DE1D46DE800A5786F3F">CSRF token is tied to a non-session cookie</h3><p>
            In a variation on the preceding vulnerability, some applications do tie the CSRF token to a cookie, but not to the same cookie that is used to track sessions. This can easily occur when an application employs two different frameworks, one for session handling and one for CSRF protection, which are not integrated together:
        </p><code class="code-scrollable">POST /email/change HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 68
Cookie: session=pSJYSScWKpmC60LpFOAHKixuFuM4uXWF; csrfKey=rZHCnSzEp8dbI6atzagGoSYyqJqTz5dv

csrf=RhV7yQDO0xcq9gLEah2WVbmuFqyOq7tY&amp;email=wiener@normal-user.com</code><p id="csrf-token-is-tied-to-a-non-session-cookie=D4L1" chunk-id="F7D1CB6AA61EF8ABF7DA4A85A9D82D97">
            This situation is harder to exploit but is still vulnerable. If the website contains any behavior that allows an attacker to set a cookie in a victim's browser, then an attack is possible. The attacker can log in to the application using their own account, obtain a valid token and associated cookie, leverage the cookie-setting behavior to place their cookie into the victim's browser, and feed their token to the victim in their CSRF attack.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'E32727C0220C06992583BA03B02655E4EDBC8C9127FFF08A29AD3C40C169495D'])@verbatim<div class="highlightedarea">
            <h4>Note</h4>
            <p>
                The cookie-setting behavior does not even need to exist within the same web application as the CSRF vulnerability. Any other application within the same overall DNS domain can potentially be leveraged to set cookies in the application that is being targeted, if the cookie that is controlled has suitable scope. For example, a cookie-setting function on <code>staging.demo.normal-website.com</code> could be leveraged to place a cookie that is submitted to <code>secure.normal-website.com</code>.
            </p>
        </div><h3 id="csrf-token-is-simply-duplicated-in-a-cookie" chunk-id="2DAEE9A933BC273BBDAAA6ADA45CD3E6">CSRF token is simply duplicated in a cookie</h3><p>
            In a further variation on the preceding vulnerability, some applications do not maintain any server-side record of tokens that have been issued, but instead duplicate each token within a cookie and a request parameter. When the subsequent request is validated, the application simply verifies that the token submitted in the request parameter matches the value submitted in the cookie. This is sometimes called the "double submit" defense against CSRF, and is advocated because it is simple to implement and avoids the need for any server-side state:
        </p><code class="code-scrollable">POST /email/change HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 68
Cookie: session=1DQGdzYbOJQzLP7460tfyiv3do7MjyPw; csrf=R8ov2YBfTYmzFyjit8o2hKBuoIjXXVpa

csrf=R8ov2YBfTYmzFyjit8o2hKBuoIjXXVpa&amp;email=wiener@normal-user.com</code><p>
            In this situation, the attacker can again perform a CSRF attack if the website contains any cookie setting functionality. Here, the attacker doesn't need to obtain a valid token of their own. They simply invent a token (perhaps in the required format, if that is being checked), leverage the cookie-setting behavior to place their cookie into the victim's browser, and feed their token to the victim in their CSRF attack.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '681E7CF13B94031AF2AF240C4C07E7885859B8205E31BD6B511ABB2077BC0227'])@verbatim
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
