@verbatim
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
@endverbatim
