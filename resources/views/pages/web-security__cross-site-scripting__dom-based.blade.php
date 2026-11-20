@extends('layouts.academy')

@section('title', 'What is DOM-based XSS (cross-site scripting)? Tutorial & Examples | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="16">
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
        <h3>Cross-site scripting (XSS)</h3>
        <ul>
            <li><a href="/web-security/cross-site-scripting#what-is-cross-site-scripting-xss">What is XSS?</a></li>
            <li><a href="/web-security/cross-site-scripting#how-does-xss-work">How does XSS work?</a></li>
            <li><a href="/web-security/cross-site-scripting#impact-of-xss-vulnerabilities">Impact of an attack</a></li>
            <li><a href="/web-security/cross-site-scripting#xss-proof-of-concept">Proof of concept</a></li>
            <li><a href="/web-security/cross-site-scripting#how-to-find-and-test-for-xss-vulnerabilities">Testing</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/cross-site-scripting/reflected">Reflected XSS</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/reflected#impact-of-reflected-xss-attacks">Impact</a></li>
                    <li><a href="/web-security/cross-site-scripting/reflected#reflected-xss-in-different-contexts">Contexts</a></li>
                    <li><a href="/web-security/cross-site-scripting/reflected#how-to-find-and-test-for-reflected-xss-vulnerabilities">Testing</a></li>
                    <li><a href="/web-security/cross-site-scripting/reflected#common-questions-about-reflected-cross-site-scripting">FAQs</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/cross-site-scripting/stored">Stored XSS</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/stored#impact-of-stored-xss-attacks">Impact</a></li>
                    <li><a href="/web-security/cross-site-scripting/stored#stored-xss-in-different-contexts">Contexts</a></li>
                    <li><a href="/web-security/cross-site-scripting/stored#how-to-find-and-test-for-stored-xss-vulnerabilities">Testing for vulnerabilities</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/cross-site-scripting/dom-based">DOM-based XSS</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-4">
                        <label for="sub-nav-id-4">
                            <a href="/web-security/cross-site-scripting/dom-based#how-to-test-for-dom-based-cross-site-scripting">Testing</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/cross-site-scripting/dom-based#testing-html-sinks">HTML sinks</a></li>
                            <li><a href="/web-security/cross-site-scripting/dom-based#testing-javascript-execution-sinks">JavaScript execution sinks</a></li>
                            <li><a href="/web-security/cross-site-scripting/dom-based#testing-for-dom-xss-using-dom-invader">Using DOM Invader</a></li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-5">
                        <label for="sub-nav-id-5">
                            <a href="/web-security/cross-site-scripting/dom-based#exploiting-dom-xss-with-different-sources-and-sinks">Exploiting</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li>
                                <input type="checkbox" id="sub-nav-id-6">
                                <label for="sub-nav-id-6">
                                    <a href="/web-security/cross-site-scripting/dom-based#sources-and-sinks-in-third-party-dependencies">In third-party dependencies</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/cross-site-scripting/dom-based#dom-xss-in-jquery">jQuery</a></li>
                                    <li><a href="/web-security/cross-site-scripting/dom-based#dom-xss-in-angularjs">AngularJS</a></li>
                                </ul>
                            </li>
                            <li><a href="/web-security/cross-site-scripting/dom-based#dom-xss-combined-with-reflected-and-stored-data">DOM
                                XSS combined with reflected and stored data</a></li>
                            <li><a href="/web-security/cross-site-scripting/dom-based#which-sinks-can-lead-to-dom-xss-vulnerabilities">Sinks</a></li>
                            <li><a href="/web-security/cross-site-scripting/dom-based#how-to-prevent-dom-xss-vulnerabilities">Preventing</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-7">
                <label for="sub-nav-id-7">
                    <a href="/web-security/cross-site-scripting/contexts">XSS contexts</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/contexts#xss-between-html-tags">Between HTML tags</a></li>
                    <li><a href="/web-security/cross-site-scripting/contexts#xss-in-html-tag-attributes">In HTML tag attributes</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-8">
                        <label for="sub-nav-id-8">
                            <a href="/web-security/cross-site-scripting/contexts#xss-into-javascript">JavaScript</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/cross-site-scripting/contexts#terminating-the-existing-script">Terminating the existing script</a></li>
                            <li><a href="/web-security/cross-site-scripting/contexts#breaking-out-of-a-javascript-string">Breaking out of a string</a></li>
                            <li><a href="/web-security/cross-site-scripting/contexts#making-use-of-html-encoding">Using HTML-encoding</a></li>
                            <li><a href="/web-security/cross-site-scripting/contexts#xss-in-javascript-template-literals">Template literals</a></li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-9">
                        <label for="sub-nav-id-9">
                            <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection">Client-side template injection</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#what-is-the-angularjs-sandbox">AngularJS sandbox</a></li>
                            <li>
                                <input type="checkbox" id="sub-nav-id-10">
                                <label for="sub-nav-id-10">
                                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#how-does-an-angularjs-sandbox-escape-work">AngularJS sandbox escape</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#constructing-an-advanced-angularjs-sandbox-escape">Constructing an advanced escape</a></li>
                                </ul>
                            </li>
                            <li>
                                <input type="checkbox" id="sub-nav-id-11">
                                <label for="sub-nav-id-11">
                                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#how-does-an-angularjs-csp-bypass-work">AngularJS CSP bypass</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#bypassing-a-csp-with-an-angularjs-sandbox-escape">Bypassing a CSP with an AngularJS sandbox escape</a></li>
                                </ul>
                            </li>
                            <li><a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#how-to-prevent-client-side-template-injection-vulnerabilities">Preventing</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-12">
                <label for="sub-nav-id-12">
                    <a href="/web-security/cross-site-scripting/exploiting">Exploiting XSS vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/exploiting#exploiting-cross-site-scripting-to-steal-cookies">To steal cookies</a></li>
                    <li><a href="/web-security/cross-site-scripting/exploiting#exploiting-cross-site-scripting-to-capture-passwords">To capture passwords</a></li>
                    <li><a href="/web-security/cross-site-scripting/exploiting#exploiting-cross-site-scripting-to-bypass-csrf-protections">To perform CSRF</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-13">
                <label for="sub-nav-id-13">
                    <a href="/web-security/cross-site-scripting/dangling-markup">Dangling markup injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/dangling-markup#how-to-prevent-dangling-markup-attacks">Preventing attacks</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-14">
                <label for="sub-nav-id-14">
                    <a href="/web-security/cross-site-scripting/content-security-policy">Content security policy (CSP)</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/content-security-policy#mitigating-xss-attacks-using-csp">Mitigating XSS attacks</a></li>
                    <li><a href="/web-security/cross-site-scripting/content-security-policy#mitigating-dangling-markup-attacks-using-csp">Mitigating dangling markup attacks</a></li>
                    <li><a href="/web-security/cross-site-scripting/content-security-policy#bypassing-csp-with-policy-injection">Bypassing CSP</a></li>
                    <li><a href="/web-security/cross-site-scripting/content-security-policy#protecting-against-clickjacking-using-csp">Protecting against clickjacking</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-15">
                <label for="sub-nav-id-15">
                    <a href="/web-security/cross-site-scripting/preventing">Preventing XSS attacks</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/preventing#encode-data-on-output">Encode data on output</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-16">
                        <label for="sub-nav-id-16">
                            <a href="/web-security/cross-site-scripting/preventing#validate-input-on-arrival">Validate input on arrival</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/cross-site-scripting/preventing#whitelisting-vs-blacklisting">Whitelisting vs blacklisting</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/cross-site-scripting/preventing#allowing-safe-html">Allowing "safe" HTML</a></li>
                    <li><a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-using-a-template-engine">Using a template engine</a></li>
                    <li><a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-in-php">In PHP</a></li>
                    <li><a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-client-side-in-javascript">In JavaScript</a></li>
                    <li><a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-in-jquery">In jQuery</a></li>
                    <li><a href="/web-security/cross-site-scripting/preventing#mitigating-xss-using-content-security-policy-csp">Using CSP</a></li>
                </ul>
            </li>
            <li><a href="/web-security/cross-site-scripting/cheat-sheet">Cheat sheet</a></li>
            <li><a href="/web-security/all-labs#cross-site-scripting">View all XSS labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting"><span itemprop="name">Cross-site scripting</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting/dom-based"><span itemprop="name">DOM-based</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">DOM-based XSS</h1><p>
            In this section, we'll describe DOM-based cross-site scripting (DOM XSS), explain how to find DOM XSS vulnerabilities, and talk about how to exploit DOM XSS with different sources and sinks.
        </p><h2 id="what-is-dom-based-cross-site-scripting">What is DOM-based cross-site scripting? </h2><p>
			DOM-based XSS vulnerabilities usually arise when JavaScript takes data from an attacker-controllable source, such as the URL, and passes it to a sink that supports dynamic code execution, such as <code>eval()</code> or <code>innerHTML</code>. This enables attackers to execute malicious JavaScript, which typically allows them to hijack other users' accounts.
		</p><p>
			To deliver a DOM-based XSS attack, you need to place data into a source so that it is propagated to a sink and causes execution of arbitrary JavaScript.
		</p><p>
			The most common source for DOM XSS is the URL, which is typically accessed with the <code>window.location</code> object. An attacker can construct a link to send a victim to a vulnerable page with a payload in the query string and fragment portions of the URL. In certain circumstances, such as when targeting a 404 page or a website running PHP, the payload can also be placed in the path.
		</p><p>
			For a detailed explanation of the taint flow between sources and sinks, please refer to the <a href="/web-security/dom-based">DOM-based vulnerabilities</a> page.
		</p><h2 id="how-to-test-for-dom-based-cross-site-scripting">How to test for DOM-based cross-site scripting</h2><p>
			The majority of DOM XSS vulnerabilities can be found quickly and reliably using Burp Suite's web vulnerability scanner. To test for DOM-based cross-site scripting manually, you generally need to use a browser with developer tools, such as Chrome. You need to work through each available source in turn, and test each one individually.
        </p><h3 id="testing-html-sinks">Testing HTML sinks</h3><p>
            To test for DOM XSS in an HTML sink, place a random alphanumeric string into the source (such as <code>location.search</code>), then use developer tools to inspect the HTML and find where your string appears. Note that the browser's "View source" option won't work for DOM XSS testing because it doesn't take account of changes that have been performed in the HTML by JavaScript. In Chrome's developer tools, you can use <code>Control+F</code> (or <code>Command+F</code> on MacOS) to search the DOM for your string.
		</p><p>
			For each location where your string appears within the DOM, you need to identify the context. Based on this context, you need to refine your input to see how it is processed. For example, if your string appears within a double-quoted attribute then try to inject double quotes in your string to see if you can break out of the attribute.
		</p><p>
			Note that browsers behave differently with regards to URL-encoding, Chrome, Firefox, and Safari will URL-encode <code>location.search</code> and <code>location.hash</code>, while IE11 and Microsoft Edge (pre-Chromium) will not URL-encode these sources. If your data gets URL-encoded before being processed, then an XSS attack is unlikely to work.
        </p><h3 id="testing-javascript-execution-sinks">Testing JavaScript execution sinks</h3><p>
        	Testing JavaScript execution sinks for DOM-based XSS is a little harder. With these sinks, your input doesn't necessarily appear anywhere within the DOM, so you can't search for it. Instead you'll need to use the JavaScript debugger to determine whether and how your input is sent to a sink.
		</p><p>
			For each potential source, such as <code>location</code>, you first need to find cases within the page's JavaScript code where the source is being referenced. In Chrome's developer tools, you can use <code>Control+Shift+F</code> (or <code>Command+Alt+F</code> on MacOS) to search all the page's JavaScript code for the source.
		</p><p>
			Once you've found where the source is being read, you can use the JavaScript debugger to add a break point and follow how the source's value is used. You might find that the source gets assigned to other variables. If this is the case, you'll need to use the search function again to track these variables and see if they're passed to a sink. When you find a sink that is being assigned data that originated from the source, you can use the debugger to inspect the value by hovering over the variable to show its value before it is sent to the sink. Then, as with HTML sinks, you need to refine your input to see if you can deliver a successful XSS attack.
		</p><h3 id="testing-for-dom-xss-using-dom-invader">Testing for DOM XSS using DOM Invader</h3><p>
			Identifying and exploiting DOM XSS in the wild can be a tedious process, often requiring you to manually trawl through complex, minified JavaScript. If you use Burp's browser, however, you can take advantage of its built-in DOM Invader extension, which does a lot of the hard work for you.
		</p><div class="highlightedarea">
			<h4>Read more</h4>
			
		<ul><li><a href="/web-security/all-labs">DOM Invader documentation</a></li></ul></div><h2 id="exploiting-dom-xss-with-different-sources-and-sinks">Exploiting DOM XSS with different sources and sinks</h2><p>
			In principle, a website is vulnerable to DOM-based cross-site scripting if there is an executable path via which data can propagate from source to sink. In practice, different sources and sinks have differing properties and behavior that can affect exploitability, and determine what techniques are necessary. Additionally, the website's scripts might perform validation or other processing of data that must be accommodated when attempting to exploit a vulnerability. There are a variety of sinks that are relevant to DOM-based vulnerabilities. Please refer to the <a href="/web-security/cross-site-scripting/dom-based#which-sinks-can-lead-to-dom-xss-vulnerabilities">list</a> below for details.
        </p><p>
            The <code>document.write</code> sink works with <code>script</code> elements, so you can use a simple payload, such as the one below:
        </p><code class="code-scrollable">document.write('... &lt;script&gt;alert(document.domain)&lt;/script&gt; ...');</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '6127DF9244C9ACEDC241085D647719A0D9975C5AF692444A9C913566FD2FD88B'])@verbatim<p>
			Note, however, that in some situations the content that is written to <code>document.write</code> includes some surrounding context that you need to take account of in your exploit. For example, you might need to close some existing elements before using your JavaScript payload.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '20F0960254C2299D1E38D95C6131EED58E897552311335C61EA0C8D324D7CA71'])@verbatim<p>
            The <code>innerHTML</code> sink doesn't accept <code>script</code> elements on any modern browser, nor will <code>svg onload</code> events fire. This means you will need to use alternative elements like <code>img</code> or <code>iframe</code>. Event handlers such as <code>onload</code> and <code>onerror</code> can be used in conjunction with these elements. For example:
        </p><code class="code-scrollable">element.innerHTML='... &lt;img src=1 onerror=alert(document.domain)&gt; ...'</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '643E053E185D7855C6C7EA780BB082FA545FDD40E72AABC79F1742EB2AD07914'])@verbatim<h3 id="sources-and-sinks-in-third-party-dependencies">Sources and sinks in third-party dependencies</h3><p>
			Modern web applications are typically built using a number of third-party libraries and frameworks, which often provide additional functions and capabilities for developers. It's important to remember that some of these are also potential sources and sinks for DOM XSS.
		</p><h4 id="dom-xss-in-jquery">DOM XSS in jQuery</h4><p>
            If a JavaScript library such as jQuery is being used, look out for sinks that can alter DOM elements on the page. For instance, jQuery's <code>attr()</code> function can change the attributes of DOM elements. If data is read from a user-controlled source like the URL, then passed to the <code>attr()</code> function, then it may be possible to manipulate the value sent to cause XSS. For example, here we have some JavaScript that changes an anchor element's <code>href</code> attribute using data from the URL:
        </p><code class="code-scrollable">$(function() {
	$('#backLink').attr(&quot;href&quot;,(new URLSearchParams(window.location.search)).get('returnUrl'));
});</code><p>
            You can exploit this by modifying the URL so that the <code>location.search</code> source contains a malicious JavaScript URL. After the page's JavaScript applies this malicious URL to the back link's <code>href</code>, clicking on the back link will execute it:
        </p><code class="code-scrollable">?returnUrl=javascript:alert(document.domain)</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'FDE8784B9C158CAC28B9D1A29D6331D2A28CF38742E1C59454BE9A1FE37CFF54'])@verbatim<p>
			Another potential sink to look out for is jQuery's <code>$()</code> selector function, which can be used to inject malicious objects into the DOM.
		</p><p>
			jQuery used to be extremely popular, and a classic DOM XSS vulnerability was caused by websites using this selector in conjunction with the <code>location.hash</code> source for animations or auto-scrolling to a particular element on the page. This behavior was often implemented using a vulnerable <code>hashchange</code> event handler, similar to the following:
		</p><code class="code-scrollable">$(window).on('hashchange', function() {
	var element = $(location.hash);
	element[0].scrollIntoView();
});</code><p>
			As the <code>hash</code> is user controllable, an attacker could use this to inject an XSS vector into the <code>$()</code> selector sink. More recent versions of jQuery have patched this particular vulnerability by preventing you from injecting HTML into a selector when the input begins with a hash character (<code>#</code>). However, you may still find vulnerable code in the wild.
		</p><p>
			To actually exploit this classic vulnerability, you'll need to find a way to trigger a <code>hashchange</code> event without user interaction. One of the simplest ways of doing this is to deliver your exploit via an <code>iframe</code>:
		</p><code class="code-scrollable">&lt;iframe src="https://vulnerable-website.com#" onload="this.src+='&lt;img src=1 onerror=alert(1)&gt;'"&gt;</code><p>
			In this example, the <code>src</code> attribute points to the vulnerable page with an empty hash value. When the <code>iframe</code> is loaded, an XSS vector is appended to the hash, causing the <code>hashchange</code> event to fire.
		</p><div class="highlightedarea">
			<h4>Note</h4>
			<p>
				Even newer versions of jQuery can still be vulnerable via the <code>$()</code> selector sink, provided you have full control over its input from a source that doesn't require a <code>#</code> prefix.
			</p>
		</div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'B73AAD4EFA87DFE5458720E5A4713F2B416825E550DC9D161F58635DB7A48DCD'])@verbatim<h4 id="dom-xss-in-angularjs">DOM XSS in AngularJS</h4><p>
            If a framework like AngularJS is used, it may be possible to execute JavaScript without angle brackets or events. When a site uses the <code>ng-app</code> attribute on an HTML element, it will be processed by AngularJS. In this case, AngularJS will execute JavaScript inside double curly braces that can occur directly in HTML or inside attributes.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '7DD0E73FE7CD3372360932722C0DFA1B3D73637170C9107AB1FB90C1AE2B4AE1'])@verbatim<h2 id="dom-xss-combined-with-reflected-and-stored-data">DOM XSS combined with reflected and stored data</h2><p>
			Some pure DOM-based vulnerabilities are self-contained within a single page. If a script reads some data from the URL and writes it to a dangerous sink, then the vulnerability is entirely client-side.
		</p><p>
			However, sources aren't limited to data that is directly exposed by browsers - they can also originate from the website. For example, websites often reflect URL parameters in the HTML response from the server. This is commonly associated with normal XSS, but it can also lead to reflected DOM XSS vulnerabilities.
		</p><p>
			In a reflected DOM XSS vulnerability, the server processes data from the request, and echoes the data into the response. The reflected data might be placed into a JavaScript string literal, or a data item within the DOM, such as a form field. A script on the page then processes the reflected data in an unsafe way, ultimately writing it to a dangerous sink.
		</p><code class="code-scrollable">eval('var data = "reflected string"');</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '954173DE38D3D0F6588C4A98D6400A1335A3EF78D9A8CE701A6609FB87941E96'])@verbatim<p>
			Websites may also store data on the server and reflect it elsewhere. In a stored DOM XSS vulnerability, the server receives data from one request, stores it, and then includes the data in a later response. A script within the later response contains a sink which then processes the data in an unsafe way.
		</p><code class="code-scrollable">element.innerHTML = comment.author</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'A2E1B73B9B37946F3A6B2D3BEF063907DB04EEDE2EC15F0B9C17518818B81EC8'])@verbatim<h2 id="which-sinks-can-lead-to-dom-xss-vulnerabilities">Which sinks can lead to DOM-XSS vulnerabilities?</h2><p>
			The following are some of the main sinks that can lead to DOM-XSS vulnerabilities:
		</p><code class="code-scrollable">document.write()
document.writeln()
document.domain
element.innerHTML
element.outerHTML
element.insertAdjacentHTML
element.onevent</code><p>
			The following jQuery functions are also sinks that can lead to DOM-XSS vulnerabilities:
		</p><code class="code-scrollable">add()
after()
append()
animate()
insertAfter()
insertBefore()
before()
html()
prepend()
replaceAll()
replaceWith()
wrap()
wrapInner()
wrapAll()
has()
constructor()
init()
index()
jQuery.parseHTML()
$.parseHTML()</code><h2 id="how-to-prevent-dom-xss-vulnerabilities">How to prevent DOM-XSS vulnerabilities</h2><p>
			In addition to the general measures described on the <a href="/web-security/dom-based">DOM-based vulnerabilities</a> page, you should avoid allowing data from any untrusted source to be dynamically written to the HTML document.
		</p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
