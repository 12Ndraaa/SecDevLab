@extends('layouts.academy')

@section('title', 'Preventing prototype pollution vulnerabilities | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/prototype-pollution"><span itemprop="name">Prototype pollution</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/prototype-pollution/preventing"><span itemprop="name">Preventing</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="DUPLICATE_HEADINGS" class="heading-2" id="preventing-prototype-pollution-vulnerabilities" chunk-id="899E077C31BB58581A9167D89D2B6B71">Preventing prototype pollution vulnerabilities</h1><p>
            We recommend patching any prototype pollution vulnerabilities you identify in your websites, regardless of whether these are coupled with exploitable gadgets. Even if you're confident that you haven't missed any, there's no guarantee that future updates to your own code or any libraries you use won't introduce new gadgets, paving the way for viable exploits.
        </p><p>
            In this section, we'll provide some high-level advice on some of the measures you can take to protect your own websites from the threats we've covered in our labs. We'll also cover some common pitfalls to avoid.
        </p><h2 id="sanitizing-property-keys" chunk-id="D9BE1D579380384A1A30DF3D78772933">Sanitizing property keys</h2><p>
            One of the more obvious ways to prevent prototype pollution vulnerabilities is to sanitize property keys before merging them into existing objects. This way, you can prevent an attacker from injecting keys such as <code>__proto__</code>, which reference the object's prototype.
        </p><p>
            Using an allowlist of permitted keys is the most effective way to do this. However, as this is not feasible in many cases, it's common to use a blocklist instead, removing any potentially dangerous strings from user input.
        </p><p>
            Although this is a quick fix to implement, truly robust blocklisting is inherently tricky, as demonstrated by sites that successfully block <code>__proto__</code>, but fail to account for an attacker <a href="/web-security/prototype-pollution/client-side#prototype-pollution-via-the-constructor">polluting an object's prototype via its constructor</a>. Likewise, weak implementations can also be <a href="/web-security/prototype-pollution/client-side#bypassing-flawed-key-sanitization">bypassed using simple obfuscation techniques</a>. For this reason, we only recommend this as a stopgap rather than a long-term solution.
        </p><h2 id="preventing-changes-to-prototype-objects" chunk-id="910B653A0E34C9C2BA71CE24CFF95F31">Preventing changes to prototype objects</h2><p>
            A more robust approach to preventing prototype pollution vulnerabilities is to prevent prototype objects from being changed at all.
        </p><p>
            Invoking the <code>Object.freeze()</code> method on an object ensures that its properties and their values can no longer be modified, and no new properties can be added. As prototypes are just objects themselves, you can use this method to proactively cut off any potential sources:
        </p><code class="code-scrollable">Object.freeze(Object.prototype);</code><p>
            The <code>Object.seal()</code> method is similar, but still allows changes to the values of existing properties. This may be a good compromise if you're unable to use <code>Object.freeze()</code> for any reason.
        </p><h2 id="preventing-an-object-from-inheriting-properties" chunk-id="D21195A6E3937AC792E88787A22B6C5A">Preventing an object from inheriting properties</h2><p>
            While you can use <code>Object.freeze()</code> to block potential prototype pollution sources, you can also take measures to eliminate gadgets. This way, even if an attacker identifies a prototype pollution vulnerability, it is likely to be unexploitable.
        </p><p>
            By default, all objects inherit from the global <code>Object.prototype</code> either directly or indirectly via the prototype chain. However, you can also manually set an object's prototype by creating it using the <code>Object.create()</code> method. Not only does this let you assign any object you like as the new object's prototype, you can also create the object with a <code>null</code> prototype, which ensures that it won't inherit any properties at all.
        </p><code class="code-scrollable">let myObject = Object.create(null);
Object.getPrototypeOf(myObject);    <span class="grey">// null</span></code><h2 id="using-safer-alternatives-where-possible" chunk-id="CED6F1D76A2B21A24F4D8FC0D7C88E1F">Using safer alternatives where possible</h2><p>
            Another robust defense against prototype pollution is to use objects that provide built-in protection. For example, when defining an options object, you could use a <code>Map</code> instead. Although a map can still inherit malicious properties, they have a built-in <code>get()</code> method that only returns properties that are defined directly on the map itself:
        </p><code class="code-scrollable">Object.prototype.evil = 'polluted';
let options = new Map();
options.set('transport_url', 'https://normal-website.com');

options.evil;                    <span class="grey">// 'polluted'</span>
options.get('evil');             <span class="grey">// undefined</span>
options.get('transport_url');    <span class="grey">// 'https://normal-website.com'</span></code><p>
            A <code>Set</code> is another alternative if you're just storing values rather than <code>key:value</code> pairs. Just like maps, sets provide built-in methods that only return properties that were defined directly on the object itself:
        </p><code class="code-scrollable">Object.prototype.evil = 'polluted';
let options = new Set();
options.add('safe');

options.evil;           <span class="grey">// 'polluted';</span>
option.has('evil');     <span class="grey">// false</span>
options.has('safe');    <span class="grey">// true</span></code>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
