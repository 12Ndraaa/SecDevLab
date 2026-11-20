@verbatim
<aside class="nav-lhs" id="tree-nav" tree-nav-version="32">
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
        <h3>Prototype pollution</h3>
        <ul>
            <li><a href="/web-security/prototype-pollution">What is prototype pollution?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance">JavaScript prototypes and inheritance</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#what-is-an-object-in-javascript">What is an object in JavaScript?</a></li>
                    <li><a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#what-is-a-prototype-in-javascript">What is a prototype in JavaScript?</a></li>
                    <li><a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#how-does-object-inheritance-work-in-javascript">Object inheritance</a></li>
                    <li><a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#the-prototype-chain">Prototype chain</a></li>
                    <li><a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#accessing-an-object-s-prototype-using-proto">Accessing an object's prototype</a></li>
                    <li><a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#modifying-prototypes">Modifying prototypes</a></li>
                </ul>
            </li>
            <li><a href="/web-security/prototype-pollution#how-do-prototype-pollution-vulnerabilities-arise">How vulnerabilities arise</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/prototype-pollution#prototype-pollution-sources">Sources</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/prototype-pollution#prototype-pollution-via-the-url">URL</a></li>
                    <li><a href="/web-security/prototype-pollution#prototype-pollution-via-json-input">JSON input</a></li>
                </ul>
            </li>
            <li><a href="/web-security/prototype-pollution#prototype-pollution-sinks">Sinks</a></li>
            <li><a href="/web-security/prototype-pollution#prototype-pollution-gadgets">Gadgets</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/prototype-pollution/client-side">Client-side prototype pollution</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/prototype-pollution/client-side#finding-client-side-prototype-pollution-sources-manually">Finding sources manually</a></li>
                    <li><a href="/web-security/prototype-pollution/client-side#finding-client-side-prototype-pollution-sources-using-dom-invader">Finding sources using DOM Invader</a></li>
                    <li><a href="/web-security/prototype-pollution/client-side#finding-client-side-prototype-pollution-gadgets-manually">Finding gadgets manually</a></li>
                    <li><a href="/web-security/prototype-pollution/client-side#finding-client-side-prototype-pollution-gadgets-using-dom-invader">Finding gadgets using DOM Invader</a></li>
                    <li><a href="/web-security/prototype-pollution/client-side#prototype-pollution-via-the-constructor">Prototype pollution via the constructor</a></li>
                    <li><a href="/web-security/prototype-pollution/client-side#bypassing-flawed-key-sanitization">Bypassing flawed key sanitization</a></li>
                    <li><a href="/web-security/prototype-pollution/client-side#prototype-pollution-in-external-libraries">Prototype pollution in external libraries</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-4">
                        <label for="sub-nav-id-4">
                            <a href="/web-security/prototype-pollution/client-side/browser-apis">Prototype pollution via browser APIs</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/prototype-pollution/client-side/browser-apis#prototype-pollution-via-fetch">fetch() method</a></li>
                            <li><a href="/web-security/prototype-pollution/client-side/browser-apis#prototype-pollution-via-object-defineproperty">Object.defineProperty() method</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/prototype-pollution/server-side">Server-side prototype pollution</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/prototype-pollution/server-side#why-is-server-side-prototype-pollution-more-difficult-to-detect">Why is server-side prototype pollution more difficult to detect?</a></li>
                    <li><a href="/web-security/prototype-pollution/server-side#detecting-server-side-prototype-pollution-via-polluted-property-reflection">Detecting via polluted property reflection</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-6">
                        <label for="sub-nav-id-6">
                            <a href="/web-security/prototype-pollution/server-side#detecting-server-side-prototype-pollution-without-polluted-property-reflection">Detecting without polluted property reflection</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/prototype-pollution/server-side#status-code-override">Status code override</a></li>
                            <li><a href="/web-security/prototype-pollution/server-side#json-spaces-override">JSON spaces override</a></li>
                            <li><a href="/web-security/prototype-pollution/server-side#charset-override">Charset override</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/prototype-pollution/server-side#scanning-for-server-side-prototype-pollution-sources">Scanning for sources</a></li>
                    <li><a href="/web-security/prototype-pollution/server-side#bypassing-input-filters-for-server-side-prototype-pollution">Bypassing input filters</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-7">
                        <label for="sub-nav-id-7">
                            <a href="/web-security/prototype-pollution/server-side#remote-code-execution-via-server-side-prototype-pollution">Remote code execution</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/prototype-pollution/server-side#identifying-a-vulnerable-request">Identifying a vulnerable request</a></li>
                            <li><a href="/web-security/prototype-pollution/server-side#remote-code-execution-via-child-process-fork">child_process.fork() method</a></li>
                            <li><a href="/web-security/prototype-pollution/server-side#remote-code-execution-via-child-process-execsync">child_process.execSync() method</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-8">
                <label for="sub-nav-id-8">
                    <a href="/web-security/prototype-pollution/preventing">Preventing vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/prototype-pollution/preventing#sanitizing-property-keys">Sanitizing property keys</a></li>
                    <li><a href="/web-security/prototype-pollution/preventing#preventing-changes-to-prototype-objects">Preventing changes to prototype objects</a></li>
                    <li><a href="/web-security/prototype-pollution/preventing#preventing-an-object-from-inheriting-properties">Preventing an object from inheriting properties</a></li>
                    <li><a href="/web-security/prototype-pollution/preventing#using-safer-alternatives-where-possible">Using safer alternatives where possible</a></li>
                </ul>
            </li>
            <li><a href="/web-security/all-labs#prototype-pollution">View all prototype pollution labs</a></li>
        </ul>
    
            </nav>
        </aside>
@endverbatim
