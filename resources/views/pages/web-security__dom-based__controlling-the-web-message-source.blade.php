@extends('layouts.academy')

@section('title', 'Controlling the web message source | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="19">
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
        <h3>DOM-based vulnerabilities</h3>
        <ul>
            <li><a href="/web-security/dom-based#what-is-the-dom">What is the DOM?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/dom-based#what-is-taint-flow">Taint flow</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-2">
                        <label for="sub-nav-id-2">
                            <a href="/web-security/dom-based#common-sources">Sources</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/cross-site-scripting/dom-based#dom-xss-combined-with-reflected-and-stored-data">Reflected
                                and stored data</a></li>
                            <li><a href="/web-security/dom-based/controlling-the-web-message-source">Web messages</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/dom-based#which-sinks-can-lead-to-dom-based-vulnerabilities">Example
                        sinks</a></li>
                </ul>
            </li>
            <li><a href="/web-security/cross-site-scripting/dom-based">DOM-based XSS</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-7">
                <label for="sub-nav-id-7">
                    <a href="/web-security/dom-based/open-redirection">Open redirection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/open-redirection#what-is-the-impact-of-dom-based-open-redirection">Impact</a></li>
                    <li><a href="/web-security/dom-based/open-redirection#which-sinks-can-lead-to-dom-based-open-redirection-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/open-redirection#how-to-prevent-dom-based-open-redirection-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-8">
                <label for="sub-nav-id-8">
                    <a href="/web-security/dom-based/cookie-manipulation">Cookie manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/cookie-manipulation#what-is-the-impact-of-a-dom-based-cookie-manipulation-attack">Impact</a></li>
                    <li><a href="/web-security/dom-based/cookie-manipulation#which-sinks-can-lead-to-dom-based-cookie-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/cookie-manipulation#how-to-prevent-dom-based-cookie-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-9">
                <label for="sub-nav-id-9">
                    <a href="/web-security/dom-based/javascript-injection">JavaScript injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/javascript-injection#what-is-the-impact-of-a-dom-based-javascript-injection-attack">Impact</a></li>
                    <li><a href="/web-security/dom-based/javascript-injection#which-sinks-can-lead-to-dom-based-javascript-injection-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/javascript-injection#how-to-prevent-dom-based-javascript-injection-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-10">
                <label for="sub-nav-id-10">
                    <a href="/web-security/dom-based/document-domain-manipulation">Document-domain manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/document-domain-manipulation#which-sinks-can-lead-to-dom-based-document-domain-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/document-domain-manipulation#how-to-prevent-dom-based-document-domain-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-11">
                <label for="sub-nav-id-11">
                    <a href="/web-security/dom-based/websocket-url-poisoning">WebSocket-URL poisoning</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/websocket-url-poisoning#what-is-the-impact-of-websocket-url-poisoning">Impact</a></li>
                    <li><a href="/web-security/dom-based/websocket-url-poisoning#which-sinks-can-lead-to-websocket-url-poisoning-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/websocket-url-poisoning#how-to-prevent-dom-based-websocket-url-poisoning-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-12">
                <label for="sub-nav-id-12">
                    <a href="/web-security/dom-based/link-manipulation">Link manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/link-manipulation#what-is-the-impact-of-a-dom-based-link-manipulation-attack">Impact</a></li>
                    <li><a href="/web-security/dom-based/link-manipulation#which-sinks-can-lead-to-dom-based-link-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/link-manipulation#how-to-prevent-dom-based-link-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-13">
                <label for="sub-nav-id-13">
                    <a href="/web-security/dom-based/web-message-manipulation">Web message manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/web-message-manipulation#which-sinks-can-lead-to-dom-based-web-message-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/web-message-manipulation#how-to-prevent-dom-based-web-message-manipulation">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-14">
                <label for="sub-nav-id-14">
                    <a href="/web-security/dom-based/ajax-request-header-manipulation">Ajax request-header manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/ajax-request-header-manipulation#what-is-the-impact-of-dom-based-ajax-request-header-manipulation">Impact</a></li>
                    <li><a href="/web-security/dom-based/ajax-request-header-manipulation#which-sinks-can-lead-to-dom-based-ajax-request-header-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/ajax-request-header-manipulation#how-to-prevent-dom-based-ajax-request-header-manipulation">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-15">
                <label for="sub-nav-id-15">
                    <a href="/web-security/dom-based/local-file-path-manipulation">Local file-path manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/local-file-path-manipulation#what-is-the-impact-of-dom-based-local-file-path-manipulation">Impact</a></li>
                    <li><a href="/web-security/dom-based/local-file-path-manipulation#which-sinks-can-lead-to-dom-based-local-file-path-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/local-file-path-manipulation#how-to-prevent-dom-based-local-file-path-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-16">
                <label for="sub-nav-id-16">
                    <a href="/web-security/dom-based/client-side-sql-injection">Client-side SQL injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/client-side-sql-injection#what-is-the-impact-of-dom-based-client-side-sql-injection">Impact</a></li>
                    <li><a href="/web-security/dom-based/client-side-sql-injection#which-sinks-can-lead-to-dom-based-client-side-sql-injection-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/client-side-sql-injection#how-to-prevent-dom-based-client-side-sql-injection-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-17">
                <label for="sub-nav-id-17">
                    <a href="/web-security/dom-based/html5-storage-manipulation">HTML5-storage manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/html5-storage-manipulation#which-sinks-can-lead-to-dom-based-html5-storage-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/html5-storage-manipulation#how-to-prevent-dom-based-html5-storage-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-18">
                <label for="sub-nav-id-18">
                    <a href="/web-security/dom-based/client-side-xpath-injection">Client-side XPath injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/client-side-xpath-injection#what-is-the-impact-of-dom-based-xpath-injection">Impact</a></li>
                    <li><a href="/web-security/dom-based/client-side-xpath-injection#which-sinks-can-lead-to-xpath-injection-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/client-side-xpath-injection#how-to-prevent-dom-based-xpath-injection-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-19">
                <label for="sub-nav-id-19">
                    <a href="/web-security/dom-based/client-side-json-injection">Client-side JSON injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/client-side-json-injection#what-is-the-impact-of-a-dom-based-json-injection-attack">Impact</a></li>
                    <li><a href="/web-security/dom-based/client-side-json-injection#which-sinks-can-lead-to-dom-based-json-injection-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/client-side-json-injection#how-to-prevent-client-side-json-injection-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-20">
                <label for="sub-nav-id-20">
                    <a href="/web-security/dom-based/dom-data-manipulation">DOM-data manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/dom-data-manipulation#what-is-the-impact-of-dom-data-manipulation">Impact</a></li>
                    <li><a href="/web-security/dom-based/dom-data-manipulation#which-sinks-can-lead-to-dom-data-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/dom-data-manipulation#how-to-prevent-dom-data-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-21">
                <label for="sub-nav-id-21">
                    <a href="/web-security/dom-based/denial-of-service">Denial of service</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/denial-of-service#which-sinks-can-lead-to-dom-based-denial-of-service-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/denial-of-service#how-to-prevent-dom-based-denial-of-service-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-22">
                <label for="sub-nav-id-22">
                    <a href="/web-security/dom-based/controlling-the-web-message-source">Web message vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/controlling-the-web-message-source#what-is-the-impact-of-dom-based-web-message-vulnerabilities">Impact</a></li>
                    <li><a href="/web-security/dom-based/controlling-the-web-message-source#how-to-construct-an-attack-using-web-messages-as-the-source">Constructing an attack</a></li>
                    <li><a href="/web-security/dom-based/controlling-the-web-message-source#origin-verification">Origin verification</a></li>
                    <li><a href="/web-security/dom-based/controlling-the-web-message-source#which-sinks-can-lead-to-dom-based-web-message-vulnerabilities">Sinks</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-23">
                <label for="sub-nav-id-23">
                    <a href="/web-security/dom-based/dom-clobbering">DOM clobbering</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/dom-clobbering#how-to-exploit-dom-clobbering-vulnerabilities">Exploiting</a></li>
                    <li><a href="/web-security/dom-based/dom-clobbering#how-to-prevent-dom-clobbering-attacks">Preventing</a></li>
                </ul>
            </li>
            <li><a href="/web-security/dom-based#how-to-prevent-dom-based-taint-flow-vulnerabilities">Preventing vulnerabilities</a></li>
            <li><a href="/web-security/all-labs#dom-based-vulnerabilities">View all DOM-based vulnerability labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/dom-based"><span itemprop="name">DOM-based</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/dom-based/controlling-the-web-message-source"><span itemprop="name">Controlling the web message source</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Controlling the web message source</h1><p>
            In this section, we'll look at how web messages can be used as a source to exploit DOM-based vulnerabilities on the recipient page. We'll also describe how such an attack is constructed, including how common origin-verification techniques can often be bypassed.
		</p><p>
            If a page handles incoming web messages in an unsafe way, for example, by not verifying the origin of incoming messages correctly in the event listener, properties and functions that are called by the event listener can potentially become sinks. For example, an attacker could host a malicious <code>iframe</code> and use the <code>postMessage()</code> method to pass web message data to the vulnerable event listener, which then sends the payload to a sink on the parent page. This behavior means that you can use web messages as the source for propagating malicious data to any of those sinks.
        </p><h2 id="what-is-the-impact-of-dom-based-web-message-vulnerabilities">What is the impact of DOM-based web message vulnerabilities?</h2><p>
            The potential impact of the vulnerability depends on the destination document's handling of the incoming message. If the destination document trusts the sender not to transmit malicious data in the message, and handles the data in an unsafe way by passing it into a sink, then the joint behavior of the two documents may allow an attacker to compromise the user, for example.
        </p><h2 id="how-to-construct-an-attack-using-web-messages-as-the-source">How to construct an attack using web messages as the source</h2><p>
            Consider the following code:
        </p><code class="code-scrollable">&lt;script&gt;
window.addEventListener('message', function(e) {
&nbsp;&nbsp;eval(e.data);
});
&lt;/script&gt;</code><p>
            This is vulnerable because an attacker could inject a JavaScript payload by constructing the following <code>iframe</code>:
        </p><code class="code-scrollable">&lt;iframe src=&quot;//vulnerable-website&quot; onload=&quot;this.contentWindow.postMessage('print()','*')&quot;&gt</code><p>
            As the event listener does not verify the origin of the message, and the <code>postMessage()</code> method specifies the <code>targetOrigin</code> <code>"*"</code>, the event listener accepts the payload and passes it into a sink, in this case, the <code>eval()</code> function.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'CE814BAE27379E097E9D714CFB763781F05932D2B95C2B194386687A89F6E2AC'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '887F00FBADC4A46FC79D4827EBD012B3BA4D52BA2FEF5B09A0A8B9A30A42A6DE'])@verbatim<h2 id="origin-verification">Origin verification</h2><p>
            Even if an event listener does include some form of origin verification, this verification step can sometimes be fundamentally flawed. For example, consider the following code:
        </p><code class="code-scrollable">window.addEventListener('message', function(e) {
    if (e.origin.indexOf('normal-website.com') &gt; -1) {
        eval(e.data);
    }
});</code><p>
            The <code>indexOf</code> method is used to try and verify that the origin of the incoming message is the <code>normal-website.com</code> domain. However, in practice, it only checks whether the string <code>"normal-website.com"</code> is contained anywhere in the origin URL. As a result, an attacker could easily bypass this verification step if the origin of their malicious message was <code>http://www.normal-website.com.evil.net</code>, for example.
        </p><p>
            The same flaw also applies to verification checks that rely on the <code>startsWith()</code> or <code>endsWith()</code> methods. For example, the following event listener would regard the origin <code>http://www.malicious-websitenormal-website.com</code> as safe:
        </p><code class="code-scrollable">window.addEventListener('message', function(e) {
    if (e.origin.endsWith('normal-website.com')) {
        eval(e.data);
    }
});</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '912C5F0D3D0D2905771DA05AD007FD099D6FCD364CF93D4A3B855D2D64BDCAAC'])@verbatim<h2 id="which-sinks-can-lead-to-dom-based-web-message-vulnerabilities">Which sinks can lead to DOM-based web message vulnerabilities?</h2><p>
            As long as a website accepts web message data from an untrusted source due to a lack of adequate origin verification, any sinks that are used by the incoming message event listener could potentially lead to vulnerabilities.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
