@extends('layouts.academy')

@section('title', 'DOM-based JavaScript injection | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/dom-based"><span itemprop="name">DOM-based</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/dom-based/javascript-injection"><span itemprop="name">JavaScript injection</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">DOM-based JavaScript injection</h1><p>
            In this section, we'll talk about DOM-based JavaScript-injection vulnerabilities, discuss how they can impact the victim, and suggest ways to reduce your exposure to JavaScript-injection vulnerabilities.
        </p><h2 id="what-is-dom-based-javascript-injection">What is DOM-based JavaScript injection?</h2><p>
            DOM-based JavaScript-injection vulnerabilities arise when a script executes attacker-controllable data as JavaScript. An attacker may be able to use the vulnerability to construct a URL that, if visited by another user, will cause arbitrary JavaScript supplied by the attacker to execute in the context of the user's browser session.
        </p><p>
            Users can be induced to visit the attacker's malicious URL in various ways, similar to the usual attack-delivery vectors for reflected cross-site scripting vulnerabilities. For more information, please refer to our page on <a href="/web-security/cross-site-scripting/dom-based">DOM XSS</a>.
        </p><h2 id="what-is-the-impact-of-a-dom-based-javascript-injection-attack">What is the impact of a DOM-based JavaScript-injection attack?</h2><p>
            The attacker-supplied code can perform a wide variety of actions, such as stealing the victim's session token or login credentials, performing arbitrary actions on the victim's behalf, or even logging their keystrokes.
        </p><h2 id="which-sinks-can-lead-to-dom-based-javascript-injection-vulnerabilities">Which sinks can lead to DOM-based JavaScript-injection vulnerabilities?</h2><p>
            The following are some of the main sinks that can lead to DOM-based JavaScript-injection vulnerabilities:
        </p><code class="code-scrollable">eval()
Function()
setTimeout()
setInterval()
setImmediate()
execCommand()
execScript()
msSetImmediate()
range.createContextualFragment()
crypto.generateCRMFRequest()</code><h2 id="how-to-prevent-dom-based-javascript-injection-vulnerabilities">How to prevent DOM-based JavaScript-injection vulnerabilities</h2><p>
            In addition to the general measures described on the <a href="/web-security/dom-based">DOM-based vulnerabilities</a> page, you should avoid allowing data from any untrusted source to be executed as JavaScript.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
