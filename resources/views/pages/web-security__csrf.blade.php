@extends('layouts.academy')

@section('title', 'What is CSRF (Cross-site request forgery)? Tutorial & Examples | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/csrf"><span itemprop="name">CSRF</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Cross-site request forgery (CSRF)</h1><p>
    In this section, we'll explain what cross-site request forgery is, describe some examples of common CSRF vulnerabilities, and explain how to prevent CSRF attacks.
</p><h2 id="what-is-csrf" chunk-id="88CAA5E97030FAE3461158680965BAAE">What is CSRF?</h2><p>
    Cross-site request forgery (also known as CSRF) is a web security vulnerability that allows an attacker to induce users to perform actions that they do not intend to perform. It allows an attacker to partly circumvent the same origin policy, which is designed to prevent different websites from interfering with each other.
</p><img alt="CSRF" src="/web-security/images/cross-site%20request%20forgery.svg"><div class="highlightedarea">
    <h4>Labs</h4>
    <p>
        If you're already familiar with the basic concepts behind CSRF vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
    </p>

    <ul><li><a href="/web-security/all-labs#cross-site-request-forgery-csrf">View all CSRF labs</a></li></ul></div><h2 id="what-is-the-impact-of-a-csrf-attack" chunk-id="911CF2B7139CBAAFEC9462EC2B5741AB">What is the impact of a CSRF attack?</h2><p>
    In a successful CSRF attack, the attacker causes the victim user to carry out an action unintentionally. For example, this might be to change the email address on their account, to change their password, or to make a funds transfer. Depending on the nature of the action, the attacker might be able to gain full control over the user's account. If the compromised user has a privileged role within the application, then the attacker might be able to take full control of all the application's data and functionality.
</p><h2 id="how-does-csrf-work" chunk-id="FF84A57D1944422E4766E6F8A7BFE481">How does CSRF work?</h2><p>
    For a CSRF attack to be possible, three key conditions must be in place:
</p><ul>
    <li>
        <strong>A relevant action.</strong> There is an action within the application that the attacker has a reason to induce. This might be a privileged action (such as modifying permissions for other users) or any action on user-specific data (such as changing the user's own password).
    </li>
    <li>
        <strong>Cookie-based session handling.</strong> Performing the action involves issuing one or more HTTP requests, and the application relies solely on session cookies to identify the user who has made the requests. There is no other mechanism in place for tracking sessions or validating user requests.
    </li>
    <li>
        <strong>No unpredictable request parameters.</strong> The requests that perform the action do not contain any parameters whose values the attacker cannot determine or guess. For example, when causing a user to change their password, the function is not vulnerable if an attacker needs to know the value of the existing password.
    </li>
</ul><p id="how-does-csrf-work-K6D1" chunk-id="6C3BF182DFD95A3BA3B661C48FB8E2C6">
    For example, suppose an application contains a function that lets the user change the email address on their account. When a user performs this action, they make an HTTP request like the following:
</p><code class="code-scrollable">POST /email/change HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 30
Cookie: session=yvthwsztyeQkAPzeQ5gHgTvlyxHfsAfE

email=wiener@normal-user.com</code><p>
    This meets the conditions required for CSRF:
</p><ul>
    <li>
        The action of changing the email address on a user's account is of interest to an attacker. Following this action, the attacker will typically be able to trigger a password reset and take full control of the user's account.
    </li>
    <li>
        The application uses a session cookie to identify which user issued the request. There are no other tokens or mechanisms in place to track user sessions.
    </li>
    <li>
        The attacker can easily determine the values of the request parameters that are needed to perform the action.
    </li>
</ul><p id="how-does-csrf-work-A0S0" chunk-id="5418DFE5C4FE359A61D42166072A2AC4">
    With these conditions in place, the attacker can construct a web page containing the following HTML:
</p><code class="code-scrollable">&lt;html&gt;
    &lt;body&gt;
        &lt;form action=&quot;https://vulnerable-website.com/email/change&quot; method=&quot;POST&quot;&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;email&quot; value=&quot;pwned@evil-user.net&quot; /&gt;
        &lt;/form&gt;
        &lt;script&gt;
            document.forms[0].submit();
        &lt;/script&gt;
    &lt;/body&gt;
&lt;/html&gt;</code><p id="how-does-csrf-work-G3L8" chunk-id="42FA8EABABEA715C57CE545DEE424F3E">
    If a victim user visits the attacker's web page, the following will happen:
</p><ul>
    <li>
        The attacker's page will trigger an HTTP request to the vulnerable website.
    </li>
    <li>
        If the user is logged in to the vulnerable website, their browser will automatically include their session cookie in the request (assuming <a href="/web-security/csrf#common-defences-against-csrf">SameSite cookies</a> are not being used).
    </li>
    <li>
        The vulnerable website will process the request in the normal way, treat it as having been made by the victim user, and change their email address.
    </li>
</ul><div class="highlightedarea">
    <h4>Note</h4>
    <p>
        Although CSRF is normally described in relation to cookie-based session handling, it also arises in other contexts where the application automatically adds some user credentials to requests, such as HTTP Basic authentication and certificate-based authentication.
    </p>
</div><h2 id="how-to-construct-a-csrf-attack" chunk-id="D694704A9B58A7216F10D4882B12399D">How to construct a CSRF attack</h2><p>
    Manually creating the HTML needed for a CSRF exploit can be cumbersome, particularly where the desired request contains a large number of parameters, or there are other quirks in the request. The easiest way to construct a CSRF exploit is using the <a href="/web-security/all-labs">CSRF PoC generator</a> that is built in to Burp Suite Professional:
</p><ul>
    <li>
        Select a request anywhere in Burp Suite Professional that you want to test or exploit.
    </li>
    <li>
        From the right-click context menu, select Engagement tools / Generate CSRF PoC.
    </li>
    <li>
        Burp Suite will generate some HTML that will trigger the selected request (minus cookies, which will be added automatically by the victim's browser).
    </li>
    <li>
        You can tweak various options in the CSRF PoC generator to fine-tune aspects of the attack. You might need to do this in some unusual situations to deal with quirky features of requests.
    </li>
    <li>
        Copy the generated HTML into a web page, view it in a browser that is logged in to the vulnerable website, and test whether the intended request is issued successfully and the desired action occurs.
    </li>
</ul>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'E099D35E2901DA6366800094B6799C4B2A46E0EF8A5B0A66CF018A9138AF817D'])@verbatim<h2 id="how-to-deliver-a-csrf-exploit" chunk-id="9F6CFFC4A32D2BA1FDEC33D82DF233CB">How to deliver a CSRF exploit</h2><p>
    The delivery mechanisms for cross-site request forgery attacks are essentially the same as for reflected XSS. Typically, the attacker will place the malicious HTML onto a website that they control, and then induce victims to visit that website. This might be done by feeding the user a link to the website, via an email or social media message. Or if the attack is placed into a popular website (for example, in a user comment), they might just wait for users to visit the website.
</p><p>
    Note that some simple CSRF exploits employ the GET method and can be fully self-contained with a single URL on the vulnerable website. In this situation, the attacker may not need to employ an external site, and can directly feed victims a malicious URL on the vulnerable domain. In the preceding example, if the request to change email address can be performed with the GET method, then a self-contained attack would look like this:
</p><code class="code-scrollable">&lt;img src=&quot;https://vulnerable-website.com/email/change?email=pwned@evil-user.net&quot;&gt;</code><div class="highlightedarea">
    <h4>Read more</h4>

    <ul><li><a href="/web-security/csrf/xss-vs-csrf">XSS vs CSRF</a></li></ul></div><h2 id="common-defences-against-csrf" chunk-id="E02CBC287933CC5A46D107CBA61CB069">Common defences against CSRF</h2><p>
    Nowadays, successfully finding and exploiting CSRF vulnerabilities often involves bypassing anti-CSRF measures deployed by the target website, the victim's browser, or both. The most common defenses you'll encounter are as follows:
</p><ul>
    <li>
        <p>
            <strong>CSRF tokens</strong> - A CSRF token is a unique, secret, and unpredictable value that is generated by the server-side application and shared with the client. When attempting to perform a sensitive action, such as submitting a form, the client must include the correct CSRF token in the request. This makes it very difficult for an attacker to construct a valid request on behalf of the victim.
        </p>
    </li>
    <li>
        <p>
            <strong>SameSite cookies</strong> - SameSite is a browser security mechanism that determines when a website's cookies are included in requests originating from other websites. As requests to perform sensitive actions typically require an authenticated session cookie, the appropriate SameSite restrictions may prevent an attacker from triggering these actions cross-site. Since 2021, Chrome enforces <code>Lax</code> SameSite restrictions by default. As this is the proposed standard, we expect other major browsers to adopt this behavior in future.
        </p>
    </li>
    <li>
        <p>
            <strong>Referer-based validation</strong> - Some applications make use of the HTTP Referer header to attempt to defend against CSRF attacks, normally by verifying that the request originated from the application's own domain. This is generally less effective than CSRF token validation.
        </p>
    </li>
</ul><p id="common-defences-against-csrf-L2P8" chunk-id="F4906705D974E8EBF052E8DFDBCC87BB">
    For a more detailed description of each of these defenses, as well as how they can potentially be bypassed, check out the following materials. These include interactive labs that let you practice what you've learned on realistic, deliberately vulnerable targets.
</p><div class="highlightedarea">
    <h4>Read more</h4>
    <ul>
        <li>
            <a href="/web-security/csrf/bypassing-token-validation"><span class="label-light-green-small">LABS</span> Bypassing CSRF token validation</a>
        </li>
        <li>
            <a href="/web-security/csrf/bypassing-samesite-restrictions"><span class="label-light-green-small">LABS</span> Bypassing SameSite cookie restrictions</a>
        </li>
        <li>
            <a href="/web-security/csrf/bypassing-referer-based-defenses"><span class="label-light-green-small">LABS</span> Bypassing Referer-based CSRF defenses</a>
        </li>
    </ul>
</div><p>
    For details on how to properly implement these defenses in order to prevent some of these issues on your own websites, see <a href="/web-security/csrf/preventing">How to prevent CSRF vulnerabilities</a>
</p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
