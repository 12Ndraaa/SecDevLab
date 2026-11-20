@extends('layouts.academy')

@section('title', 'Prototype pollution via browser APIs | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/prototype-pollution"><span itemprop="name">Prototype pollution</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/prototype-pollution/client-side"><span itemprop="name">Client-side vulnerabilities</span></a><meta itemprop="position" content="3" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/prototype-pollution/client-side/browser-apis"><span itemprop="name">Browser APIs</span></a><meta itemprop="position" content="4" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="DUPLICATE_HEADINGS" class="heading-2" id="prototype-pollution-via-browser-apis" chunk-id="64C01988920944D303C06F43E418C13A">Prototype pollution via browser APIs</h1><p>
            You may be surprised to learn that there are a number of widespread prototype pollution gadgets in the JavaScript APIs commonly provided in browsers. In this section, we'll show you how to exploit these for <a href="/web-security/cross-site-scripting/dom-based">DOM XSS</a>, potentially bypassing flawed prototype pollution defenses implemented by developers.
        </p><h2 id="portswigger-research" cms-ignore-validation="DUPLICATE_HEADINGS">SecDevLab research</h2><p>
            The labs in this section are based on original SecDevLab research. For a technical insight into how we were able to discover these gadgets and more using DOM Invader, check out the related blog post.
        </p><ul>
            <li>
                <a href="https://portswigger.net/research/widespread-prototype-pollution-gadgets">Widespread prototype pollution gadgets by Gareth Heyes</a>
            </li>
        </ul><h2 id="prototype-pollution-via-fetch" chunk-id="BB1026F7C27662EA8655F8257B1797CC">Prototype pollution via fetch()</h2><p>
            The <code>Fetch</code> API provides a simple way for developers to trigger HTTP requests using JavaScript. The <code>fetch()</code> method accepts two arguments:
        </p><ul>
            <li>
                <p>
                    The URL to which you want to send the request.
                </p>
            </li>
            <li>
                <p>
                    An options object that lets you to control parts of the request, such as the method, headers, body parameters, and so on.
                </p>
            </li>
        </ul><p>
            The following is an example of how you might send a <code>POST</code> request using <code>fetch()</code>:
        </p><code class="code-scrollable">fetch('https://normal-website.com/my-account/change-email', {
    method: 'POST',
    body: 'user=carlos&email=carlos%40ginandjuice.shop'
})</code><p>
            As you can see, we've explicitly defined <code>method</code> and <code>body</code> properties, but there are a number of other possible properties that we've left undefined. In this case, if an attacker can find a suitable source, they could potentially pollute <code>Object.prototype</code> with their own <code>headers</code> property. This may then be inherited by the options object passed into <code>fetch()</code> and subsequently used to generate the request.
        </p><p id="prototype-pollution-via-fetch-G2L7" chunk-id="31056E6342BCBD92C13CAA20410A8609">
            This can lead to a number of issues. For example, the following code is potentially vulnerable to DOM XSS via prototype pollution:
        </p><code class="code-scrollable">fetch('/my-products.json',{method:"GET"})
    .then((response) =&gt; response.json())
    .then((data) =&gt; {
        let username = data['x-username'];
        let message = document.querySelector('.message');
        if(username) {
            message.innerHTML = `My products. Logged in as &lt;b&gt;${username}&lt;/b&gt;`;
        }
        let productList = document.querySelector('ul.products');
        for(let product of data) {
            let product = document.createElement('li');
            product.append(product.name);
            productList.append(product);
        }
    })
    .catch(console.error);</code><p>
            To exploit this, an attacker could pollute <code>Object.prototype</code> with a <code>headers</code> property containing a malicious <code>x-username</code> header as follows:
        </p><code class="code-scrollable">?__proto__[headers][x-username]=&lt;img/src/onerror=alert(1)&gt;</code><p>
            Let's assume that server-side, this header is used to set the value of the <code>x-username</code> property in the returned JSON file. In the vulnerable client-side code above, this is then assigned to the <code>username</code> variable, which is later passed into the <code>innerHTML</code> sink, resulting in DOM XSS.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                You can use this technique to control any undefined properties of the options object passed to <code>fetch()</code>. This may enable you to add a malicious body to the request, for example.
            </p>
        </div><h2 id="prototype-pollution-via-object-defineproperty" chunk-id="744787862AA7C7F4D4D8CD454D7ADA8E">Prototype pollution via Object.defineProperty()</h2><p>
            Developers with some knowledge of prototype pollution may attempt to block potential gadgets by using the <code>Object.defineProperty()</code> method. This enables you to set a non-configurable, non-writable property directly on the affected object as follows:
        </p><code class="code-scrollable">Object.defineProperty(vulnerableObject, 'gadgetProperty', {
    configurable: false,
    writable: false
})</code><p>
            This may initially seem like a reasonable mitigation attempt as this prevents the vulnerable object from inheriting a malicious version of the gadget property via the prototype chain. However, this approach is inherently flawed.
        </p><p>
            Just like the <code>fetch()</code> method we looked at earlier, <code>Object.defineProperty()</code> accepts an options object, known as a "descriptor". You can see this in the example above. Among other things, developers can use this descriptor object to set an initial value for the property that's being defined. However, if the only reason that they're defining this property is to protect against prototype pollution, they might not bother setting a value at all.
        </p><p>
            In this case, an attacker may be able to bypass this defense by polluting <code>Object.prototype</code> with a malicious <code>value</code> property. If this is inherited by the descriptor object passed to <code>Object.defineProperty()</code>, the attacker-controlled value may be assigned to the gadget property after all.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '9F29EFFEAFAA743B0F87D5682F68184437DF0B23DB7CE32B2377869A95045976'])@verbatim<h3 id="what-next" cms-ignore-validation="DUPLICATE_HEADINGS">What next?</h3><p>
                JavaScript is now commonly used to build back-end functionality. Naturally, this means that prototype pollution can also occur in server-side contexts. In the next section, you'll learn how to safely detect and exploit these vulnerabilities in applications running on Node.js.
            </p><ul>
                <li>
                    <a href="/web-security/prototype-pollution/server-side"><span class="label-light-green-small">LABS</span> Server-side prototype pollution</a>
                </li>
            </ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
