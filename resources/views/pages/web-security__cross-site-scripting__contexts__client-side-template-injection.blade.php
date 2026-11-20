@extends('layouts.academy')

@section('title', 'Client-side template injection | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting"><span itemprop="name">Cross-site scripting</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting/contexts"><span itemprop="name">Contexts</span></a><meta itemprop="position" content="3" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting/contexts/client-side-template-injection"><span itemprop="name">Client-side template injection</span></a><meta itemprop="position" content="4" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="DUPLICATE_HEADINGS" class="heading-2">Client-side template injection</h1><p>
            In this section, we'll look at client-side template injection vulnerabilities and how you can exploit them for XSS attacks. This attack technique was pioneered by our research team - read more in <a href="https://portswigger.net/research/xss-without-html-client-side-template-injection-with-angularjs">XSS without HTML: Client-Side Template
            Injection with AngularJS</a>. Although client-side template injection is a generic issue, we'll focus on examples from the AngularJS framework as this is the most common. We'll describe how you can craft exploits that escape from the AngularJS sandbox, and how you can potentially use AngularJS features to bypass content security policy (CSP).
        </p><h2 id="what-is-client-side-template-injection">What is client-side template injection?</h2><p>
            Client-side template injection vulnerabilities arise when applications using a client-side template framework dynamically embed user input in web pages. When rendering a page, the framework scans it for template expressions and executes any that it encounters. An attacker can exploit this by supplying a malicious template expression that launches a cross-site scripting (XSS) attack.
        </p><h2 id="what-is-the-angularjs-sandbox">What is the AngularJS sandbox?</h2><p>
            The AngularJS sandbox is a mechanism that prevents access to potentially dangerous objects, such as <code>window</code> or <code>document</code>, in AngularJS template expressions. It also prevents access to potentially dangerous properties, such as <code>__proto__</code>. Despite not being considered a security boundary by the AngularJS team, the wider developer community generally thinks otherwise. Although bypassing the sandbox was initially challenging, security researchers have discovered numerous ways of doing so. As a result, it was eventually removed from AngularJS in version 1.6. However, many legacy applications still use older versions of AngularJS and may be vulnerable as a result.
        </p><h2 id="how-does-the-angularjs-sandbox-work">How does the AngularJS sandbox work?</h2><p>
            The sandbox works by parsing an expression, rewriting the JavaScript, and then using various functions to test whether the rewritten code contains any dangerous objects. For example, the <code>ensureSafeObject()</code> function checks whether a given object references itself. This is one way to detect the <code>window</code> object, for example. The <code>Function</code> constructor is detected in roughly the same way, by checking whether the constructor property references itself.
        </p><p>
            The <code>ensureSafeMemberName()</code> function checks each property access of the object and, if it contains dangerous properties such as <code>__proto__</code> or  <code>__lookupGetter__</code>, the object will be blocked. The <code>ensureSafeFunction()</code>function prevents <code>call()</code>, <code>apply()</code>, <code>bind()</code>, or <code>constructor()</code> from being called.
        </p><p>
            You can see the sandbox in action for yourself by visiting <a href="http://jsfiddle.net/2zs2yv7o/1/">this fiddle</a> and setting a breakpoint at line 13275 of the <code>angular.js</code> file. The variable <code>fnString</code> contains your rewritten code, so you can look at how AngularJS transforms it.
        </p><h2 id="how-does-an-angularjs-sandbox-escape-work">How does an AngularJS sandbox escape work?</h2><p>
            A sandbox escape involves tricking the sandbox into thinking the malicious expression is benign. The most well-known escape uses the modified <code>charAt()</code> function globally within an expression:
        </p><code class="code-scrollable">'a'.constructor.prototype.charAt=[].join</code><p>
            When it was initially discovered, AngularJS did not prevent this modification. The attack works by overwriting the function using the <code>[].join</code> method, which causes the <code>charAt()</code> function to return all the characters sent to it, rather than a specific single character. Due to the logic of the <code>isIdent()</code> function in AngularJS, it compares what it thinks is a single character against multiple characters. As the first character of the longer string are within the range of the compared characters, the <code>isIdent()</code> function always returns true, as demonstrated by the following example:
        </p><code class="code-scrollable">isIdent = function(ch) {
    return ('a' &lt;= ch &amp;&amp; ch &lt;= 'z' || 'A' &lt;= ch &amp;&amp; ch &lt;= 'Z' || '_' === ch || ch === '$');
}
isIdent('x9=9a9l9e9r9t9(919)')</code><p>
            Once the <code>isIdent()</code> function is fooled, you can inject malicious JavaScript. For example, an expression such as <code>$eval('x=alert(1)')</code> would be allowed because AngularJS treats every character as an identifier. Note that we need to use AngularJS's <code>$eval()</code> function because overwriting the <code>charAt()</code> function will only take effect once the sandboxed code is executed. This technique would then bypass the sandbox and allow arbitrary JavaScript execution.
            SecDevLab Research <a href="https://portswigger.net/research/xss-without-html-client-side-template-injection-with-angularjs">broke the AngularJS sandbox comprehensively, multiple times</a>.
        </p><h3 id="constructing-an-advanced-angularjs-sandbox-escape">Constructing an advanced AngularJS sandbox escape</h3><p>
			So you've learned how a basic sandbox escape works, but you may encounter sites that are more restrictive with which characters they allow. For example, a site may prevent you from using double or single quotes. In this situation, you need to use functions such as <code>String.fromCharCode()</code> to generate your characters. Although AngularJS prevents access to the <code>String</code> constructor within an expression, you can get round this by using the constructor property of a string instead. This obviously requires a string, so to construct an attack like this, you would need to find a way of creating a string without using single or double quotes.
		</p><p>
			In a standard sandbox escape, you would use <code>$eval()</code> to execute your JavaScript payload, but in the lab below, the <code>$eval()</code> function is undefined. Fortunately, we can use the <code>orderBy</code> filter instead. The typical syntax of an <code>orderBy</code> filter is as follows:
		</p><code class="code-scrollable">[123]|orderBy:'Some string'</code><p>
			Note that the <code>|</code> operator has a different meaning than in JavaScript. Normally, this is a bitwise <code>OR</code> operation, but in AngularJS it indicates a filter operation. In the code above, we are sending the array <code>[123]</code>  on the left to the <code>orderBy</code> filter on the right. The colon signifies an argument to send to the filter, which in this case is a string. The <code>orderBy</code> filter is normally used to sort an object, but it also accepts an expression, which means we can use it to pass a payload.
		</p><p>
			You should now have all the tools you need to tackle the next lab.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'D82E3A0CA07B096A36C320BDAF6F10AC92869A49F98D1ADFD16B4FFDC05390F1'])@verbatim<h2 id="how-does-an-angularjs-csp-bypass-work">How does an AngularJS CSP bypass work?</h2><p>
            Content security policy (CSP) bypasses work in a similar way to standard sandbox escapes, but usually involve some HTML injection. When the CSP mode is active in AngularJS, it parses template expressions differently and avoids using the <code>Function</code> constructor. This means the standard sandbox escape described above will no longer work.
        </p><p>
            Depending on the specific policy, the CSP will block JavaScript events. However, AngularJS defines its own events that can be used instead. When inside an event, AngularJS defines a special <code>$event</code> object, which simply references the browser event object. You can use this object to perform a CSP bypass. On Chrome, there is a special property on the <code>$event/event</code> object called <code>path</code>. This property contains an array of objects that causes the event to be executed. The last property is always the <code>window</code> object, which we can use to perform a sandbox escape. By passing this array to the <code>orderBy</code> filter, we can enumerate the array and use the last element (the <code>window</code> object) to execute a global function, such as <code>alert()</code>. The following code demonstrates this:
        </p><code class="code-scrollable">&lt;input autofocus ng-focus=&quot;$event.path|orderBy:'[].constructor.from([1],alert)'&quot;&gt;</code><p>
            Notice that the <code>from()</code> function is used, which allows you to convert an object to an array and call a given function (specified in the second argument) on every element of that array. In this case, we are calling the <code>alert()</code> function. We cannot call the function directly because the AngularJS sandbox would parse the code and detect that the <code>window</code> object is being used to call a function. Using the <code>from()</code> function instead effectively hides the <code>window</code> object from the sandbox, allowing us to inject malicious code.
		</p><p>SecDevLab Research <a href="https://portswigger.net/research/angularjs-csp-bypass-in-56-characters">created a CSP bypass using AngularJS in 56 characters using this technique</a>.</p><h3 id="bypassing-a-csp-with-an-angularjs-sandbox-escape">Bypassing a CSP with an AngularJS sandbox escape</h3><p>
			This next lab employs a length restriction, so the above vector will not work. In order to exploit the lab, you need to think of various ways of hiding the <code>window</code> object from the AngularJS sandbox. One way of doing this is to use the <code>array.map()</code> function as follows:
		</p><code class="code-scrollable">[1].map(alert)</code><p>
			<code>map()</code> accepts a function as an argument and will call it for each item in the array. This will bypass the sandbox because the reference to the <code>alert()</code> function is being used without explicitly referencing the <code>window</code>. To solve the lab, try various ways of executing <code>alert()</code> without triggering AngularJS's <code>window</code> detection.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '978FEBC1996CDDC2B7CD48D98A7675B4C51E498017943479C16896589A51C363'])@verbatim<h2 id="how-to-prevent-client-side-template-injection-vulnerabilities">How to prevent client-side template injection vulnerabilities</h2><p>
            To prevent client-side template injection vulnerabilities, avoid using untrusted user input to generate templates or expressions. If this is not practical, consider filtering out template expression syntax from user input prior to embedding it within client-side templates.
        </p><p>
            Note that HTML-encoding is not sufficient to prevent client-side template injection attacks, because frameworks perform an HTML-decode of relevant content prior to locating and executing template expressions.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
