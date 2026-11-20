@extends('layouts.academy')

@section('title', 'What is cross-site scripting (XSS) and how to prevent it? | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting"><span itemprop="name">Cross-site scripting</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Cross-site scripting</h1><p>
            In this section, we'll explain what cross-site scripting is, describe the different varieties of cross-site scripting vulnerabilities, and spell out how to find and prevent cross-site scripting.
        </p><h2 id="what-is-cross-site-scripting-xss">What is cross-site scripting (XSS)?</h2><p>
            Cross-site scripting (also known as XSS) is a web security vulnerability that allows an attacker to compromise the interactions that users have with a vulnerable application. It allows an attacker to circumvent the same origin policy, which is designed to segregate different websites from each other. Cross-site scripting vulnerabilities normally allow an attacker to masquerade as a victim user, to carry out any actions that the user is able to perform, and to access any of the user's data. If the victim user has privileged access within the application, then the attacker might be able to gain full control over all of the application's functionality and data.
        </p><h2 id="how-does-xss-work">How does XSS work?</h2><p>
            Cross-site scripting works by manipulating a vulnerable web site so that it returns malicious JavaScript to users. When the malicious code executes inside a victim's browser, the attacker can fully compromise their interaction with the application.
        </p><img alt="Cross-site scripting" src="/web-security/images/cross-site-scripting.svg"><div class="highlightedarea">
            <h4>Labs</h4>
            <p>
                If you're already familiar with the basic concepts behind XSS vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
            </p>

        <ul><li><a href="/web-security/all-labs#cross-site-scripting">View all XSS labs</a></li></ul></div><h2 id="xss-proof-of-concept">XSS proof of concept</h2><p>
            You can confirm most kinds of XSS vulnerability by injecting a payload that causes your own browser to execute some arbitrary JavaScript. It's long been common practice to use the <code>alert()</code> function for this purpose because it's short, harmless, and pretty hard to miss when it's successfully called. In fact, you solve the majority of our XSS labs by invoking <code>alert()</code> in a simulated victim's browser.
        </p><p>
            Unfortunately, there's a slight hitch if you use Chrome. From version 92 onward (July 20th, 2021), cross-origin iframes are prevented from calling <code>alert()</code>. As these are used to construct some of the more advanced XSS attacks, you'll sometimes need to use an alternative PoC payload. In this scenario, we recommend the <code>print()</code> function. If you're interested in learning more about this change and why we like <code>print()</code>, <a href="/research/alert-is-dead-long-live-print">check out our blog post</a> on the subject.
        </p><p>
            As the simulated victim in our labs uses Chrome, we've amended the affected labs so that they can also be solved using <code>print()</code>. We've indicated this in the instructions wherever relevant.
        </p><h2 id="what-are-the-types-of-xss-attacks">What are the types of XSS attacks?</h2><p>
            There are three main types of XSS attacks. These are:
        </p><ul>
            <li>
                <a href="/web-security/cross-site-scripting#reflected-cross-site-scripting">Reflected XSS</a>, where the malicious script comes from the current HTTP request.
            </li>
            <li>
                <a href="/web-security/cross-site-scripting#stored-cross-site-scripting">Stored XSS</a>, where the malicious script comes from the website's database.
            </li>
            <li>
                <a href="/web-security/cross-site-scripting#dom-based-cross-site-scripting">DOM-based XSS</a>, where the vulnerability exists in client-side code rather than server-side code.
            </li>
        </ul><h2 id="reflected-cross-site-scripting" cms-ignore-validation="DUPLICATE_HEADINGS">Reflected cross-site scripting</h2><p>
            Reflected XSS is the simplest variety of cross-site scripting. It arises when an application receives data in an HTTP request and includes that data within the immediate response in an unsafe way.
        </p><p>
            Here is a simple example of a reflected XSS vulnerability:
        </p><code class="code-scrollable">https://insecure-website.com/status?message=All+is+well.
&lt;p&gt;Status: All is well.&lt;/p&gt;</code><p>
            The application doesn't perform any other processing of the data, so an attacker can easily construct an attack like this:
        </p><code class="code-scrollable">https://insecure-website.com/status?message=&lt;script&gt;/*+Bad+stuff+here...+*/&lt;/script&gt;
&lt;p&gt;Status: &lt;script&gt;/* Bad stuff here... */&lt;/script&gt;&lt;/p&gt;</code><p>
            If the user visits the URL constructed by the attacker, then the attacker's script executes in the user's browser, in the context of that user's session with the application. At that point, the script can carry out any action, and retrieve any data, to which the user has access.
        </p><div class="highlightedarea">
            <h4>Read more</h4>


        <ul><li><a href="/web-security/cross-site-scripting/reflected">Reflected cross-site scripting</a></li><li><a href="/web-security/cross-site-scripting/cheat-sheet">Cross-site scripting cheat sheet</a></li></ul></div><h2 id="stored-cross-site-scripting" cms-ignore-validation="DUPLICATE_HEADINGS">Stored cross-site scripting</h2><p>
            Stored XSS (also known as persistent or second-order XSS) arises when an application receives data from an untrusted source and includes that data within its later HTTP responses in an unsafe way.
        </p><p>
            The data in question might be submitted to the application via HTTP requests; for example, comments on a blog post, user nicknames in a chat room, or contact details on a customer order. In other cases, the data might arrive from other untrusted sources; for example, a webmail application displaying messages received over SMTP, a marketing application displaying social media posts, or a network monitoring application displaying packet data from network traffic.
        </p><p>
            Here is a simple example of a stored XSS vulnerability. A message board application lets users submit messages, which are displayed to other users:
        </p><code class="code-scrollable">&lt;p&gt;Hello, this is my message!&lt;/p&gt;</code><p>
            The application doesn't perform any other processing of the data, so an attacker can easily send a message that attacks other users:
        </p><code class="code-scrollable">&lt;p&gt;&lt;script&gt;/* Bad stuff here... */&lt;/script&gt;&lt;/p&gt;</code><div class="highlightedarea">
            <h4>Read more</h4>


        <ul><li><a href="/web-security/cross-site-scripting/stored">Stored cross-site scripting</a></li><li><a href="/web-security/cross-site-scripting/cheat-sheet">Cross-site scripting cheat sheet</a></li></ul></div><h2 id="dom-based-cross-site-scripting" cms-ignore-validation="DUPLICATE_HEADINGS">DOM-based cross-site scripting</h2><p>
            DOM-based XSS (also known as DOM XSS) arises when an application contains some client-side JavaScript that processes data from an untrusted source in an unsafe way, usually by writing the data back to the DOM.
        </p><p>
            In the following example, an application uses some JavaScript to read the value from an input field and write that value to an element within the HTML:
        </p><code class="code-scrollable">var search = document.getElementById('search').value;
var results = document.getElementById('results');
results.innerHTML = 'You searched for: ' + search;</code><p>
            If the attacker can control the value of the input field, they can easily construct a malicious value that causes their own script to execute:
        </p><code class="code-scrollable">You searched for: &lt;img src=1 onerror='/* Bad stuff here... */'&gt;</code><p>
            In a typical case, the input field would be populated from part of the HTTP request, such as a URL query string parameter, allowing the attacker to deliver an attack using a malicious URL, in the same manner as reflected XSS.
        </p><div class="highlightedarea">
            <h4>Read more</h4>

        <ul><li><a href="/web-security/cross-site-scripting/dom-based">DOM-based cross-site scripting</a></li></ul></div><h2 id="what-can-xss-be-used-for">What can XSS be used for?</h2><p>
            An attacker who exploits a cross-site scripting vulnerability is typically able to:
        </p><ul>
            <li>
                Impersonate or masquerade as the victim user.
            </li>
            <li>
                Carry out any action that the user is able to perform.
            </li>
            <li>
                Read any data that the user is able to access.
            </li>
            <li>
                Capture the user's login credentials.
            </li>
            <li>
                Perform virtual defacement of the web site.
            </li>
            <li>
                Inject trojan functionality into the web site.
            </li>
        </ul><h2 id="impact-of-xss-vulnerabilities">Impact of XSS vulnerabilities</h2><p>
            The actual impact of an XSS attack generally depends on the nature of the application, its functionality and data, and the status of the compromised user. For example:
        </p><ul>
            <li>
                In a brochureware application, where all users are anonymous and all information is public, the impact will often be minimal.
            </li>
            <li>
                In an application holding sensitive data, such as banking transactions, emails, or healthcare records, the impact will usually be serious.
            </li>
            <li>
                If the compromised user has elevated privileges within the application, then the impact will generally be critical, allowing the attacker to take full control of the vulnerable application and compromise all users and their data.
            </li>
        </ul><div class="highlightedarea">
            <h4>Read more</h4>

        <ul><li><a href="/web-security/cross-site-scripting/exploiting">Exploiting cross-site scripting vulnerabilities</a></li></ul></div><h2 id="how-to-find-and-test-for-xss-vulnerabilities">How to find and test for XSS vulnerabilities</h2><p>
            The vast majority of XSS vulnerabilities can be found quickly and reliably using Burp Suite's web vulnerability scanner.
        </p><p>
            Manually testing for reflected and stored XSS normally involves submitting some simple unique input (such as a short alphanumeric string) into every entry point in the application, identifying every location where the submitted input is returned in HTTP responses, and testing each location individually to determine whether suitably crafted input can be used to execute arbitrary JavaScript. In this way, you can determine the <a href="/web-security/cross-site-scripting/contexts">context</a> in which the XSS occurs and select a suitable payload to exploit it.
        </p><p>
            Manually testing for DOM-based XSS arising from URL parameters involves a similar process: placing some simple unique input in the parameter, using the browser's developer tools to search the DOM for this input, and testing each location to determine whether it is exploitable. However, other types of DOM XSS are harder to detect. To find DOM-based vulnerabilities in non-URL-based input (such as <code>document.cookie</code>) or non-HTML-based sinks (like <code>setTimeout</code>), there is no substitute for reviewing JavaScript code, which can be extremely time-consuming. Burp Suite's web vulnerability scanner combines static and dynamic analysis of JavaScript to reliably automate the detection of DOM-based vulnerabilities.
        </p><div class="highlightedarea">
            <h4>Read more</h4>

        <ul><li><a href="/web-security/cross-site-scripting/contexts">Cross-site scripting contexts</a></li></ul></div><h2 id="content-security-policy" cms-ignore-validation="DUPLICATE_HEADINGS">Content security policy</h2><p>
            Content security policy (CSP) is a browser mechanism that aims to mitigate the impact of cross-site scripting and some other vulnerabilities. If an application that employs CSP contains XSS-like behavior, then the CSP might hinder or prevent exploitation of the vulnerability. Often, the CSP can be circumvented to enable exploitation of the underlying vulnerability.
        </p><div class="highlightedarea">
            <h4>Read more</h4>

        <ul><li><a href="/web-security/cross-site-scripting/content-security-policy">Content security policy</a></li></ul></div><h2 id="dangling-markup-injection" cms-ignore-validation="DUPLICATE_HEADINGS">Dangling markup injection </h2><p>
            Dangling markup injection is a technique that can be used to capture data cross-domain in situations where a full cross-site scripting exploit is not possible, due to input filters or other defenses. It can often be exploited to capture sensitive information that is visible to other users, including CSRF tokens that can be used to perform unauthorized actions on behalf of the user.
        </p><div class="highlightedarea">
            <h4>Read more</h4>

        <ul><li><a href="/web-security/cross-site-scripting/dangling-markup">Dangling markup injection</a></li></ul></div><h2 id="how-to-prevent-xss-attacks">How to prevent XSS attacks</h2><p>
            Preventing cross-site scripting is trivial in some cases but can be much harder depending on the complexity of the application and the ways it handles user-controllable data.
        </p><p>
            In general, effectively preventing XSS vulnerabilities is likely to involve a combination of the following measures:
        </p><ul>
            <li>
                <strong>Filter input on arrival.</strong> At the point where user input is received, filter as strictly as possible based on what is expected or valid input.
            </li>
            <li>
                <strong>Encode data on output.</strong> At the point where user-controllable data is output in HTTP responses, encode the output to prevent it from being interpreted as active content. Depending on the output context, this might require applying combinations of HTML, URL, JavaScript, and CSS encoding.
            </li>
            <li>
                <strong>Use appropriate response headers.</strong> To prevent XSS in HTTP responses that aren't intended to contain any HTML or JavaScript, you can use the <code>Content-Type</code> and <code>X-Content-Type-Options</code> headers to ensure that browsers interpret the responses in the way you intend.
            </li>
            <li>
                <strong>Content Security Policy.</strong> As a last line of defense, you can use Content Security Policy (CSP) to reduce the severity of any XSS vulnerabilities that still occur.
            </li>
        </ul><div class="highlightedarea">
            <h4>Read more</h4>


        <ul><li><a href="/web-security/cross-site-scripting/preventing">How to prevent XSS</a></li><li><a href="/web-security/all-labs">Find XSS vulnerabilities using Burp Suite's web vulnerability scanner</a></li></ul></div><h2 id="common-questions-about-cross-site-scripting">Common questions about cross-site scripting</h2><p>
            <strong>How common are XSS vulnerabilities?</strong> XSS vulnerabilities are very common, and XSS is probably the most frequently occurring web security vulnerability.
        </p><p>
            <strong>How common are XSS attacks?</strong> It is difficult to get reliable data about real-world XSS attacks, but it is probably less frequently exploited than other vulnerabilities.
        </p><p>
            <strong>What is the difference between XSS and CSRF?</strong> XSS involves causing a web site to return malicious JavaScript, while CSRF involves inducing a victim user to perform actions they do not intend to do.
        </p><p>
            <strong>What is the difference between XSS and SQL injection?</strong> XSS is a client-side vulnerability that targets other application users, while SQL injection is a server-side vulnerability that targets the application's database.
        </p><p>
            <strong>How do I prevent XSS in PHP?</strong> Filter your inputs with a whitelist of allowed characters and use type hints or type casting. Escape your outputs with <code>htmlentities</code> and <code>ENT_QUOTES</code> for HTML contexts, or JavaScript Unicode escapes for JavaScript contexts.
        </p><p>
            <strong>How do I prevent XSS in Java?</strong> Filter your inputs with a whitelist of allowed characters and use a library such as Google Guava to HTML-encode your output for HTML contexts, or use JavaScript Unicode escapes for JavaScript contexts.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
