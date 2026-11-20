@verbatim
<aside class="nav-lhs" id="tree-nav" tree-nav-version="39">
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
        <h3>Web cache poisoning</h3>
        <ul>
            <li><a href="/web-security/web-cache-poisoning#what-is-web-cache-poisoning">What is web cache poisoning?</a></li>
            <li><a href="/web-security/web-cache-poisoning#how-does-a-web-cache-work">How does a web cache work?</a></li>
            <li><a href="/web-security/web-cache-poisoning#what-is-the-impact-of-a-web-cache-poisoning-attack">Impact of web cache poisoning</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/web-cache-poisoning#constructing-a-web-cache-poisoning-attack">Constructing an attack</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-2">
                        <label for="sub-nav-id-2">
                            <a href="/web-security/web-cache-poisoning#identify-and-evaluate-unkeyed-inputs">Identify and evaluate unkeyed inputs</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/web-cache-poisoning#param-miner">Param Miner</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/web-cache-poisoning#elicit-a-harmful-response-from-the-back-end-server">Elicit a harmful response</a></li>
                    <li><a href="/web-security/web-cache-poisoning#get-the-response-cached">Get the response cached</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws">Exploiting cache design flaws</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-deliver-an-xss-attack">Delivering an XSS attack</a></li>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-exploit-unsafe-handling-of-resource-imports">Exploit unsafe handling of resource imports</a></li>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-exploit-cookie-handling-vulnerabilities">Exploit cookie-handling vulnerabilities</a></li>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-multiple-headers-to-exploit-web-cache-poisoning-vulnerabilities">Using multiple headers</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-4">
                        <label for="sub-nav-id-4">
                            <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#exploiting-responses-that-expose-too-much-information">Responses that expose too much information</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#cache-control-directives">Cache-control directives</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#vary-header">Vary header</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-exploit-dom-based-vulnerabilities">Exploiting DOM-based vulnerabilities</a></li>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#chaining-web-cache-poisoning-vulnerabilities">Chaining web-cache poisoning vulnerabilities</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws">Exploiting cache implementation flaws</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-key-flaws">Key flaws</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-6">
                        <label for="sub-nav-id-6">
                            <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-probing-methodology">Probing for flaws</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#identify-a-suitable-cache-oracle">Identifying a suitable cache oracle</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#probe-key-handling">Probe key handling</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#identify-an-exploitable-gadget">Identifying an exploitable gadget</a></li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-7">
                        <label for="sub-nav-id-7">
                            <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#exploiting-cache-key-flaws">Exploiting cache key flaws</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#unkeyed-port">Unkeyed port</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#unkeyed-query-string">Unkeyed query string</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-parameter-cloaking">Cache parameter cloaking</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#normalized-cache-keys">Normalized cache keys</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-key-injection">Cache key injection</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#poisoning-internal-caches">Poisoning internal caches</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="/web-security/web-cache-poisoning#how-to-prevent-web-cache-poisoning-vulnerabilities">Preventing vulnerabilities</a></li>
            <li><a href="/web-security/web-cache-poisoning#web-cache-poisoning-research">Research</a></li>
            <li><a href="/web-security/all-labs#web-cache-poisoning">View all web cache poisoning labs</a></li>
        </ul>
    
            </nav>
        </aside>
@endverbatim
