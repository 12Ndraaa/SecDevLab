@extends('layouts.academy')

@section('title', 'Bypassing SameSite cookie restrictions | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/csrf"><span itemprop="name">CSRF</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/csrf/bypassing-samesite-restrictions"><span itemprop="name">Bypassing SameSite cookie restrictions</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2" id="bypassing-samesite-cookie-restrictions" chunk-id="CF8AD193B91CB12730D5794C68640BE9">Bypassing SameSite cookie restrictions</h1><p>
            SameSite is a browser security mechanism that determines when a website's cookies are included in requests originating from other websites. SameSite cookie restrictions provide partial protection against a variety of cross-site attacks, including CSRF, cross-site leaks, and some CORS exploits.
        </p><p>
            Since 2021, Chrome applies <code>Lax</code> SameSite restrictions by default if the website that issues the cookie doesn't explicitly set its own restriction level. This is a proposed standard, and we expect other major browsers to adopt this behavior in the future. As a result, it's essential to have solid grasp of how these restrictions work, as well as how they can potentially be bypassed, in order to thoroughly test for cross-site attack vectors.
        </p><p>
            In this section, we'll first cover how the SameSite mechanism works and clarify some of the related terminology. We'll then look at some of the most common ways you may be able to bypass these restrictions, enabling CSRF and other cross-site attacks on websites that may initially appear secure.
        </p><h2 id="what-is-a-site-in-the-context-of-samesite-cookies" chunk-id="E02BF72D476FABF367E415C66C8A3FE0">What is a site in the context of SameSite cookies?</h2><p>
            In the context of SameSite cookie restrictions, a site is defined as the top-level domain (TLD), usually something like <code>.com</code> or <code>.net</code>, plus one additional level of the domain name. This is often referred to as the TLD+1.
        </p><p>
            When determining whether a request is same-site or not, the URL scheme is also taken into consideration. This means that a link from <code>http://app.example.com</code> to <code>https://app.example.com</code> is treated as cross-site by most browsers.
        </p><img alt="What is the site for SameSite cookies?" src="/web-security/csrf/images/site-definition.png"><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                You may come across the term "effective top-level domain" (eTLD). This is just a way of accounting for the reserved multipart suffixes that are treated as top-level domains in practice, such as <code>.co.uk</code>.
            </p>
        </div><h2 id="what-s-the-difference-between-a-site-and-an-origin" chunk-id="42F1AF4E423C96A884FDF687B81B12C6">What's the difference between a site and an origin?</h2><p>
            The difference between a site and an origin is their scope; a site encompasses multiple domain names, whereas an origin only includes one. Although they're closely related, it's important not to use the terms interchangeably as conflating the two can have serious security implications.
        </p><p>
            Two URLs are considered to have the same origin if they share the exact same scheme, domain name, and port. Although note that the port is often inferred from the scheme.
        </p><img alt="Site vs origin" src="/web-security/csrf/images/site-vs-origin.png"><p>
            As you can see from this example, the term "site" is much less specific as it only accounts for the scheme and last part of the domain name. Crucially, this means that a cross-origin request can still be same-site, but not the other way around.
        </p><table class="is-nonresponsive-table">
            <tr>
                <td>
                    <strong>Request from</strong>
                </td>
                <td>
                    <strong>Request to</strong>
                </td>
                <td>
                    <strong>Same-site?</strong>
                </td>
                <td>
                    <strong>Same-origin?</strong>
                </td>
            </tr>
            <tr>
                <td>
                    <code>https://example.com</code>
                </td>
                <td>
                    <code>https://example.com</code>
                </td>
                <td>
                    Yes
                </td>
                <td>
                    Yes
                </td>
            </tr>
            <tr>
                <td>
                    <code>https://app.example.com</code>
                </td>
                <td>
                    <code>https://intranet.example.com</code>
                </td>
                <td>
                    Yes
                </td>
                <td>
                    No: mismatched domain name
                </td>
            </tr>
            <tr>
                <td>
                    <code>https://example.com</code>
                </td>
                <td>
                    <code>https://example.com:8080</code>
                </td>
                <td>
                    Yes
                </td>
                <td>
                    No: mismatched port
                </td>
            </tr>
            <tr>
                <td>
                    <code>https://example.com</code>
                </td>
                <td>
                    <code>https://example.co.uk</code>
                </td>
                <td>
                    No: mismatched eTLD
                </td>
                <td>
                    No: mismatched domain name
                </td>
            </tr>
            <tr>
                <td>
                    <code>https://example.com</code>
                </td>
                <td>
                    <code>http://example.com</code>
                </td>
                <td>
                    No: mismatched scheme
                </td>
                <td>
                    No: mismatched scheme
                </td>
            </tr>
        </table><p>
            This is an important distinction as it means that any vulnerability enabling arbitrary JavaScript execution can be abused to bypass site-based defenses on other domains belonging to the same site. We'll see an example of this in one of the labs later.
        </p><h2 id="how-does-samesite-work" chunk-id="BFC0EFC88CCA0CB42E67A37EEA938803">How does SameSite work?</h2><p>
            Before the SameSite mechanism was introduced, browsers sent cookies in every request to the domain that issued them, even if the request was triggered by an unrelated third-party website. SameSite works by enabling browsers and website owners to limit which cross-site requests, if any, should include specific cookies. This can help to reduce users' exposure to CSRF attacks, which induce the victim's browser to issue a request that triggers a harmful action on the vulnerable website. As these requests typically require a cookie associated with the victim's authenticated session, the attack will fail if the browser doesn't include this.
        </p><p>
            All major browsers currently support the following SameSite restriction levels:
        </p><ul>
            <li>
                <a href="/web-security/csrf/bypassing-samesite-restrictions#strict"><code>Strict</code></a>
            </li>
            <li>
                <a href="/web-security/csrf/bypassing-samesite-restrictions#lax"><code>Lax</code></a>
            </li>
            <li>
                <a href="/web-security/csrf/bypassing-samesite-restrictions#none"><code>None</code></a>
            </li>
        </ul><p id="how-does-samesite-work-F5K3" chunk-id="DDE42CFA9C0DA9C9E5D2A928879EFE0F">
            Developers can manually configure a restriction level for each cookie they set, giving them more control over when these cookies are used. To do this, they just have to include the <code>SameSite</code> attribute in the <code>Set-Cookie</code> response header, along with their preferred value:
        </p><code class="code-scrollable">Set-Cookie: session=0F8tgdOhi9ynR1M9wa3ODa; SameSite=Strict</code><p>
            Although this offers some protection against CSRF attacks, none of these restrictions provide guaranteed immunity, as we'll demonstrate using deliberately vulnerable, interactive labs later in this section.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                If the website issuing the cookie doesn't explicitly set a <code>SameSite</code> attribute, Chrome automatically applies <code>Lax</code> restrictions by default. This means that the cookie is only sent in cross-site requests that meet specific criteria, even though the developers never configured this behavior. As this is a proposed new standard, we expect other major browsers to adopt this behavior in future.
            </p>
        </div><h3 id="strict" chunk-id="CB4618FA5059EE1C5210CE6473E2C010">Strict</h3><p>
            If a cookie is set with the <code>SameSite=Strict</code> attribute, browsers will not send it in any cross-site requests. In simple terms, this means that if the target site for the request does not match the site currently shown in the browser's address bar, it will not include the cookie.
        </p><p>
            This is recommended when setting cookies that enable the bearer to modify data or perform other sensitive actions, such as accessing specific pages that are only available to authenticated users.
        </p><p>
            Although this is the most secure option, it can negatively impact the user experience in cases where cross-site functionality is desirable.
        </p><h3 id="lax" chunk-id="FBD01B73C868F9263340B8C0E4F8BE13">Lax</h3><p>
            <code>Lax</code> SameSite restrictions mean that browsers will send the cookie in cross-site requests, but only if both of the following conditions are met:
        </p><ul>
            <li>
                <p>
                    The request uses the <code>GET</code> method.
                </p>
            </li>
            <li>
                <p>
                    The request resulted from a top-level navigation by the user, such as clicking on a link.
                </p>
            </li>
        </ul><p>
            This means that the cookie is not included in cross-site <code>POST</code> requests, for example. As <code>POST</code> requests are generally used to perform actions that modify data or state (at least according to best practice), they are much more likely to be the target of CSRF attacks.
        </p><p>
            Likewise, the cookie is not included in background requests, such as those initiated by scripts, iframes, or references to images and other resources.
        </p><h3 id="none" chunk-id="2BF98F4B8487AE16D1F8513D453C0897">None</h3><p>
            If a cookie is set with the <code>SameSite=None</code> attribute, this effectively disables SameSite restrictions altogether, regardless of the browser. As a result, browsers will send this cookie in all requests to the site that issued it, even those that were triggered by completely unrelated third-party sites.
        </p><p>
            With the exception of Chrome, this is the default behavior used by major browsers if no <code>SameSite</code> attribute is provided when setting the cookie.
        </p><p>
            There are legitimate reasons for disabling SameSite, such as when the cookie is intended to be used from a third-party context and doesn't grant the bearer access to any sensitive data or functionality. Tracking cookies are a typical example.
        </p><p id="none-A4M5" chunk-id="861E1DBCBDF187AA7F816E67728636D9">
            If you encounter a cookie set with <code>SameSite=None</code> or with no explicit restrictions, it's worth investigating whether it's of any use. When the "Lax-by-default" behavior was first adopted by Chrome, this had the side-effect of breaking a lot of existing web functionality. As a quick workaround, some websites have opted to simply disable SameSite restrictions on all cookies, including potentially sensitive ones.
        </p><p>
            When setting a cookie with <code>SameSite=None</code>, the website must also include the <code>Secure</code> attribute, which ensures that the cookie is only sent in encrypted messages over HTTPS. Otherwise, browsers will reject the cookie and it won't be set.
        </p><code class="code-scrollable">Set-Cookie: trackingId=0F8tgdOhi9ynR1M9wa3ODa; SameSite=None; Secure</code><h2 id="bypassing-samesite-lax-restrictions-using-get-requests" chunk-id="9C9EEFD91FFD0563F05B9D2E9A682DE5">Bypassing SameSite Lax restrictions using GET requests</h2><p>
            In practice, servers aren't always fussy about whether they receive a <code>GET</code> or <code>POST</code> request to a given endpoint, even those that are expecting a form submission. If they also use <code>Lax</code> restrictions for their session cookies, either explicitly or due to the browser default, you may still be able to perform a CSRF attack by eliciting a <code>GET</code> request from the victim's browser.
        </p><p>
            As long as the request involves a top-level navigation, the browser will still include the victim's session cookie. The following is one of the simplest approaches to launching such an attack:
        </p><code class="code-scrollable">&lt;script&gt;
    document.location = 'https://vulnerable-website.com/account/transfer-payment?recipient=hacker&amount=1000000';
&lt;/script&gt;</code><p id="bypassing-samesite-lax-restrictions-using-get-requests-E2R0" chunk-id="640C7939DAC17E31DAC88BE46F0F5052">
            Even if an ordinary <code>GET</code> request isn't allowed, some frameworks provide ways of overriding the method specified in the request line. For example, Symfony supports the <code>_method</code> parameter in forms, which takes precedence over the normal method for routing purposes:
        </p><code class="code-scrollable">&lt;form action="https://vulnerable-website.com/account/transfer-payment" method="GET"&gt;
    &lt;input type="hidden" name="_method" value="POST"&gt;
    &lt;input type="hidden" name="recipient" value="hacker"&gt;
    &lt;input type="hidden" name="amount" value="1000000"&gt;
&lt;/form&gt;</code><p>
            Other frameworks support a variety of similar parameters.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'DDAE9BFFDCB03F70C0ECE2FAC25E236D84670C553A409D983F4D364A96ED45A3'])@verbatim<h2 id="bypassing-samesite-restrictions-using-on-site-gadgets" chunk-id="2FF7D1D0E1E1441D7D499DABD196A637">Bypassing SameSite restrictions using on-site gadgets</h2><p>
            If a cookie is set with the <code>SameSite=Strict</code> attribute, browsers won't include it in any cross-site requests. You may be able to get around this limitation if you can find a gadget that results in a secondary request within the same site.
        </p><p>
            One possible gadget is a client-side redirect that dynamically constructs the redirection target using attacker-controllable input like URL parameters. For some examples, see our materials on <a href="/web-security/dom-based/open-redirection">DOM-based open redirection</a>.
        </p><p id="bypassing-samesite-restrictions-using-on-site-gadgets-W4GF7" chunk-id="3E3229F1BFD0C67F591175991519CCDD">
            As far as browsers are concerned, these client-side redirects aren't really redirects at all; the resulting request is just treated as an ordinary, standalone request. Most importantly, this is a same-site request and, as such, will include all cookies related to the site, regardless of any restrictions that are in place.
        </p><p>
            If you can manipulate this gadget to elicit a malicious secondary request, this can enable you to bypass any SameSite cookie restrictions completely.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '0706592C0E05520A0D622E33957F791EDD8348E91EA46CC2899BAB8FD501E37B'])@verbatim<p>
            Note that the equivalent attack is not possible with server-side redirects. In this case, browsers recognize that the request to follow the redirect resulted from a cross-site request initially, so they still apply the appropriate cookie restrictions.
        </p><h2 id="bypassing-samesite-restrictions-via-vulnerable-sibling-domains" chunk-id="92993828DCD5E1FBD0BCB610B347FD38">Bypassing SameSite restrictions via vulnerable sibling domains</h2><p>
            Whether you're testing someone else's website or trying to secure your own, it's essential to keep in mind that a request can still be same-site even if it's issued cross-origin.
        </p><p>
            Make sure you thoroughly audit all of the available attack surface, including any sibling domains. In particular, vulnerabilities that enable you to elicit an arbitrary secondary request, such as XSS, can compromise site-based defenses completely, exposing all of the site's domains to cross-site attacks.
        </p><p>
            In addition to classic CSRF, don't forget that if the target website supports WebSockets, this functionality might be vulnerable to cross-site WebSocket hijacking (CSWSH), which is essentially just a CSRF attack targeting a WebSocket handshake. For more details, see our topic on <a href="/web-security/websockets">WebSocket vulnerabilities</a>.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '44CCA99334D60D91033BF4BD0908A142896514AF0A3C0C343F8017FE71781AE9'])@verbatim
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
