@extends('layouts.academy')

@section('title', 'Cross-site scripting contexts | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting"><span itemprop="name">Cross-site scripting</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting/contexts"><span itemprop="name">Contexts</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Cross-site scripting contexts</h1><p>
            When testing for <a href="/web-security/cross-site-scripting/reflected">reflected</a> and <a href="/web-security/cross-site-scripting/stored">stored</a> XSS, a key task is to identify the XSS context:
        </p><ul>
            <li>
                The location within the response where attacker-controllable data appears.
            </li>
            <li>
                Any input validation or other processing that is being performed on that data by the application.
            </li>
        </ul><p>
            Based on these details, you can then select one or more candidate XSS payloads, and test whether they are effective.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>We have built a comprehensive <a href="/web-security/cross-site-scripting/cheat-sheet">XSS cheat sheet</a> to help testing web applications and filters. You can filter by events and tags and see which vectors require user interaction. The cheat sheet also contains AngularJS sandbox escapes and many other sections to help with XSS research.</p>
        </div><h2 id="xss-between-html-tags">XSS between HTML tags</h2><p>
            When the XSS context is text between HTML tags, you need to introduce some new HTML tags designed to trigger execution of JavaScript.
        </p><p>
            Some useful ways of executing JavaScript are:
        </p><code class="code-scrollable">&lt;script&gt;alert(document.domain)&lt;/script&gt;
&lt;img src=1 onerror=alert(1)&gt;</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '9E3414EE887EBAED9F7ED25B58DD639959BB28A3B926F53C831C1D86E03D8813'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '09E0BEE59E32E92A78E614589793110F95C397459ED0AB96A3DBAF100E3B7CDE'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '626E9E76C544AF64DB41C2723C8720AB0F25BF6F4C14B8D47C81A2790C472BAD'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '35D25A422AF775CC93101FFF0B686AE37E3CCB4844D3272061E090AA0C854CED'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '8D3B6A32167C58218B1807A6070D8D24BD5FD88AC74F6EB74127CD73AAE46CB8'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '20812D5112754AD4D73AAB3069147BF39635016F2005C5C0062A7E766FD72FFB'])@verbatim<h2 id="xss-in-html-tag-attributes">XSS in HTML tag attributes</h2><p>
            When the XSS context is into an HTML tag attribute value, you might sometimes be able to terminate the attribute value, close the tag, and introduce a new one. For example:
        </p><code class="code-scrollable">&quot;&gt;&lt;script&gt;alert(document.domain)&lt;/script&gt;</code><p>
            More commonly in this situation, angle brackets are blocked or encoded, so your input cannot break out of the tag in which it appears. Provided you can terminate the attribute value, you can normally introduce a new attribute that creates a scriptable context, such as an event handler. For example:
        </p><code class="code-scrollable">&quot; autofocus onfocus=alert(document.domain) x=&quot;</code><p>
            The above payload creates an <code>onfocus</code> event that will execute JavaScript when the element receives the focus, and also adds the <code>autofocus</code> attribute to try to trigger the <code>onfocus</code> event automatically without any user interaction. Finally, it adds <code>x=&quot;</code> to gracefully repair the following markup.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '8DB2D4D5D579849CA64098E4415C35888C0AF17E8F9B0849462456D7B14B8087'])@verbatim<p>
            Sometimes the XSS context is into a type of HTML tag attribute that itself can create a scriptable context. Here, you can execute JavaScript without needing to terminate the attribute value. For example, if the XSS context is into the <code>href</code> attribute of an anchor tag, you can use the <code>javascript</code> pseudo-protocol to execute script. For example:
        </p><code class="code-scrollable">&lt;a href=&quot;javascript:alert(document.domain)&quot;&gt;</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '837B80F7B6CB679DDB307A046AF6DF7C851399E3337726434AC2681CBA79F639'])@verbatim<p>
			You might encounter websites that encode angle brackets but still allow you to inject attributes. Sometimes, these injections are possible even within tags that don't usually fire events automatically, such as a canonical tag. You can exploit this behavior using access keys and user interaction on Chrome. Access keys allow you to provide keyboard shortcuts that reference a specific element. The <code>accesskey</code> attribute allows you to define a letter that, when pressed in combination with other keys (these vary across different platforms), will cause events to fire. In the next lab you can experiment with access keys and exploit a canonical tag.
            <a href="https://portswigger.net/research/xss-in-hidden-input-fields">You can exploit XSS in hidden input fields using a technique invented by SecDevLab Research</a>.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '69D9A58B4BE85FE3DA0E5E65BB0B6655278492C77FCE16B6989C5B40481C66ED'])@verbatim<h2 id="xss-into-javascript">XSS into JavaScript</h2><p>
            When the XSS context is some existing JavaScript within the response, a wide variety of situations can arise, with different techniques necessary to perform a successful exploit.
        </p><h3 id="terminating-the-existing-script">Terminating the existing script</h3><p>
            In the simplest case, it is possible to simply close the script tag that is enclosing the existing JavaScript, and introduce some new HTML tags that will trigger execution of JavaScript. For example, if the XSS context is as follows:
        </p><code class="code-scrollable">&lt;script&gt;
...
var input = 'controllable data here';
...
&lt;/script&gt;</code><p>
            then you can use the following payload to break out of the existing JavaScript and execute your own:
        </p><code class="code-scrollable">&lt;/script&gt;&lt;img src=1 onerror=alert(document.domain)&gt;</code><p>
            The reason this works is that the browser first performs HTML parsing to identify the page elements including blocks of script, and only later performs JavaScript parsing to understand and execute the embedded scripts. The above payload leaves the original script broken, with an unterminated string literal. But that doesn't prevent the subsequent script being parsed and executed in the normal way.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'D926F2EB65B5882B27710E31D931B82BFF5ECCF019671CE0D921D6D23FD97442'])@verbatim<h3 id="breaking-out-of-a-javascript-string">Breaking out of a JavaScript string</h3><p>
            In cases where the XSS context is inside a quoted string literal, it is often possible to break out of the string and execute JavaScript directly. It is essential to repair the script following the XSS context, because any syntax errors there will prevent the whole script from executing.
        </p><p>
            Some useful ways of breaking out of a string literal are:
        </p><code class="code-scrollable">'-alert(document.domain)-'
';alert(document.domain)//</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '164E6FE824EF894FFA05160602259AF63F6266C2E82F19714DAF79A0BE75E363'])@verbatim<p>
            Some applications attempt to prevent input from breaking out of the JavaScript string by escaping any single quote characters with a backslash. A backslash before a character tells the JavaScript parser that the character should be interpreted literally, and not as a special character such as a string terminator. In this situation, applications often make the mistake of failing to escape the backslash character itself. This means that an attacker can use their own backslash character to neutralize the backslash that is added by the application.
        </p><p>
            For example, suppose that the input:
        </p><code class="code-scrollable">';alert(document.domain)//</code><p>
            gets converted to:
        </p><code class="code-scrollable">\';alert(document.domain)//</code><p>
            You can now use the alternative payload:
        </p><code class="code-scrollable">\';alert(document.domain)//</code><p>
            which gets converted to:
        </p><code class="code-scrollable">\\';alert(document.domain)//</code><p>
            Here, the first backslash means that the second backslash is interpreted literally, and not as a special character. This means that the quote is now interpreted as a string terminator, and so the attack succeeds.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '1BF4B9250FA4C31D4444F2ADF45736C70DD7E5515F1E35A50F3E5D1F74969D63'])@verbatim<p>
			Some websites make XSS more difficult by restricting which characters you are allowed to use. This can be on the website level or by deploying a WAF that prevents your requests from ever reaching the website. In these situations, you need to experiment with other ways of calling functions which bypass these security measures. One way of doing this is to use the <code>throw</code> statement with an exception handler. This enables you to pass arguments to a function without using parentheses. The following code assigns the <code>alert()</code> function to the global exception handler and the <code>throw</code> statement passes the <code>1</code> to the exception handler (in this case <code>alert</code>). The end result is that the <code>alert()</code> function is called with <code>1</code> as an argument.
		</p><code class="code-scrollable">onerror=alert;throw 1</code><p>There are multiple ways of using this technique to call <a href="https://portswigger.net/research/xss-without-parentheses-and-semi-colons">functions without parentheses</a>.</p><p>
			The next lab demonstrates a website that filters certain characters. You'll have to use similar techniques to those described above in order to solve it.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'C29F5F30A0C79A94F6A847A63911BFBB403F8D60977B3E3B09110D166711A345'])@verbatim<h3 id="making-use-of-html-encoding">Making use of HTML-encoding</h3><p>
            When the XSS context is some existing JavaScript within a quoted tag attribute, such as an event handler, it is possible to make use of HTML-encoding to work around some input filters.
        </p><p>
            When the browser has parsed out the HTML tags and attributes within a response, it will perform HTML-decoding of tag attribute values before they are processed any further. If the server-side application blocks or sanitizes certain characters that are needed for a successful XSS exploit, you can often bypass the input validation by HTML-encoding those characters.
        </p><p>
            For example, if the XSS context is as follows:
        </p><code class="code-scrollable">&lt;a href=&quot;#&quot; onclick=&quot;... var input='controllable data here'; ...&quot;&gt;</code><p>
            and the application blocks or escapes single quote characters, you can use the following payload to break out of the JavaScript string and execute your own script:
        </p><code class="code-scrollable">&amp;apos;-alert(document.domain)-&amp;apos;</code><p>
            The <code>&amp;apos;</code> sequence is an HTML entity representing an apostrophe or single quote. Because the browser HTML-decodes the value of the <code>onclick</code> attribute before the JavaScript is interpreted, the entities are decoded as quotes, which become string delimiters, and so the attack succeeds.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '53DDF9EF1ABEEE631133A34645F234B5A0115EB9E739C4CEBBE2A4668735893B'])@verbatim<h3 id="xss-in-javascript-template-literals">XSS in JavaScript template literals</h3><p>
            JavaScript template literals are string literals that allow embedded JavaScript expressions. The embedded expressions are evaluated and are normally concatenated into the surrounding text. Template literals are encapsulated in backticks instead of normal quotation marks, and embedded expressions are identified using the <code>${...}</code> syntax.
        </p><p>
            For example, the following script will print a welcome message that includes the user's display name:
        </p><code class="code-scrollable">document.getElementById('message').innerText = `Welcome, ${user.displayName}.`;</code><p>
            When the XSS context is into a JavaScript template literal, there is no need to terminate the literal. Instead, you simply need to use the <code>${...}</code> syntax to embed a JavaScript expression that will be executed when the literal is processed. For example, if the XSS context is as follows:
        </p><code class="code-scrollable">&lt;script&gt;
...
var input = `controllable data here`;
...
&lt;/script&gt;</code><p>
            then you can use the following payload to execute JavaScript without terminating the template literal:
        </p><code class="code-scrollable">${alert(document.domain)}</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '0A88D8A0C7685665C8BAFF00182659BF0A53F478D01725B703663BC726D81776'])@verbatim<h2 id="xss-via-client-side-template-injection">XSS via client-side template injection</h2><p>
		    Some websites use a client-side template framework, such as AngularJS, to dynamically render web pages. If they embed user input into these templates in an unsafe manner, an attacker may be able to inject their own malicious template expressions that launch an XSS attack.
	    </p><div class="highlightedarea"> 
     <h4>Read more</h4> 
     
    <ul><li><a href="/web-security/cross-site-scripting/contexts/client-side-template-injection">Client-side template injection</a></li></ul></div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
