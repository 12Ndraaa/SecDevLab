@extends('layouts.academy')

@section('title', 'Client-side prototype pollution vulnerabilities | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/prototype-pollution"><span itemprop="name">Prototype pollution</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/prototype-pollution/client-side"><span itemprop="name">Client-side vulnerabilities</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Client-side prototype pollution vulnerabilities</h1><p>
            In this section, you'll learn how to find client-side prototype pollution vulnerabilities in the wild. To help solidify your understanding of how these vulnerabilities work, we'll cover how to do this manually, as well as how you can use DOM Invader to automate much of this process. You'll also have the chance to practice what you've learned by exploiting prototype pollution for <a href="/web-security/cross-site-scripting/dom-based">DOM XSS</a> on some <a href="/web-security/all-labs#prototype-pollution">deliberately vulnerable <span class="label-light-green-small">LABS</span></a>.
        </p><div class="highlightedarea">
            <h4>What is prototype pollution?</h4>
            <p>
                This page assumes you have a basic knowledge of prototype pollution sources, sinks, and gadgets. If you haven't done so already, we recommend checking out the related content before continuing.
            </p>
            
        <ul><li><a href="/web-security/prototype-pollution">What is prototype pollution?</a></li></ul></div><h2 id="finding-client-side-prototype-pollution-sources-manually" chunk-id="53580ADE3C3C552AA9824F8DD8C1DBB4">Finding client-side prototype pollution sources manually</h2><p>
            Finding <a href="/web-security/prototype-pollution#prototype-pollution-sources">prototype pollution sources</a> manually is largely a case of trial and error. In short, you need to try different ways of adding an arbitrary property to <code>Object.prototype</code> until you find a source that works.
        </p><p>
            When testing for client-side vulnerabilities, this involves the following high-level steps:
        </p><ol>
            <li>
                <p>
                    Try to inject an arbitrary property via the query string, URL fragment, and any JSON input. For example:
                </p>
                <code>vulnerable-website.com/?__proto__[foo]=bar</code>
            </li>
            <li>
                <p>
                    In your browser console, inspect <code>Object.prototype</code> to see if you have successfully polluted it with your arbitrary property:
                </p>
                <code class="code-scrollable">Object.prototype.foo
// "bar" indicates that you have successfully polluted the prototype
// undefined indicates that the attack was not successful</code>
            </li>
            <li>
                <p>
                    If the property was not added to the prototype, try using different techniques, such as switching to dot notation rather than bracket notation, or vice versa:
                </p>
                <code class="code-scrollable">vulnerable-website.com/?__proto__.foo=bar</code>
            </li>
            <li>
                <p>
                    Repeat this process for each potential source.
                </p>
            </li>
        </ol><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span></span> Tip</h4></summary><div class="content"><p>
                If neither of these techniques is successful, you may still be able to <a href="/web-security/prototype-pollution/client-side#prototype-pollution-via-the-constructor">pollute the prototype via its constructor</a>. We'll cover how to do this in more detail later.
            </p></div></details></div><h2 id="finding-client-side-prototype-pollution-sources-using-dom-invader" chunk-id="9C54CE2938C051E450C013A307C83537">Finding client-side prototype pollution sources using DOM Invader</h2><p>
            As you can see, finding prototype pollution sources manually can be a fairly tedious process. Instead, we recommend using DOM Invader, which comes preinstalled with Burp's built-in browser. DOM Invader is able to automatically test for prototype pollution sources as you browse, which can save you a considerable amount of time and effort.
        </p><p id="finding-client-side-prototype-pollution-sources-using-dom-invader-F2K5">
            For more information, check out the <a href="/web-security/all-labs">DOM Invader documentation</a>.
        </p><h2 id="finding-client-side-prototype-pollution-gadgets-manually" chunk-id="28FEB6B9A7A15AABAD3D078D8A5E400A">Finding client-side prototype pollution gadgets manually</h2><p>
            Once you've <a href="/web-security/prototype-pollution/client-side#finding-client-side-prototype-pollution-sources-manually">identified a source</a> that lets you add arbitrary properties to the global <code>Object.prototype</code>, the next step is to find a suitable gadget that you can use to craft an exploit. In practice, we recommend <a href="/web-security/prototype-pollution/client-side#finding-client-side-prototype-pollution-gadgets-using-dom-invader">using DOM Invader</a> to do this, but it's useful to look at the manual process as it may help solidify your understanding of the vulnerability.
        </p><ol>
            <li>
                <p>
                    Look through the source code and identify any properties that are used by the application or any libraries that it imports.
                </p>
            </li>
            <li>
                <p>
                    In Burp, enable response interception (<strong>Proxy &gt; Options &gt; Intercept server responses</strong>) and intercept the response containing the JavaScript that you want to test.
                </p>
            </li>
            <li>
                <p>
                    Add a <code>debugger</code> statement at the start of the script, then forward any remaining requests and responses.
                </p>
            </li>
            <li>
                <p>
                    In Burp's browser, go to the page on which the target script is loaded. The <code>debugger</code> statement pauses execution of the script.
                </p>
            </li>
            <li>
                <p>
                    While the script is still paused, switch to the console and enter the following command, replacing <code>YOUR-PROPERTY</code> with one of the properties that you think is a potential gadget:
                </p>
                <code class="code-scrollable">Object.defineProperty(Object.prototype, 'YOUR-PROPERTY', {
    get() {
        console.trace();
        return 'polluted';
    }
})</code>

                <p>
                    The property is added to the global <code>Object.prototype</code>, and the browser will log a stack trace to the console whenever it is accessed.
                </p>
            </li>
            <li>
                <p>
                    Press the button to continue execution of the script and monitor the console. If a stack trace appears, this confirms that the property was accessed somewhere within the application.
                </p>
            </li>
            <li>
                <p>
                    Expand the stack trace and use the provided link to jump to the line of code where the property is being read.
                </p>
            </li>
            <li>
                <p>
                    Using the browser's debugger controls, step through each phase of execution to see if the property is passed to a sink, such as <code>innerHTML</code> or <code>eval()</code>.
                </p>
            </li>
            <li>
                <p>
                    Repeat this process for any properties that you think are potential gadgets.
                </p>
            </li>
        </ol><h2 id="finding-client-side-prototype-pollution-gadgets-using-dom-invader" chunk-id="71AE97E79E069E716187D7AAD85BD561">Finding client-side prototype pollution gadgets using DOM Invader</h2><p>
            As you can see from the previous steps, manually identifying prototype pollution gadgets in the wild can be a laborious task. Given that websites often rely on a number of third-party libraries, this may involve reading through thousands of lines of minified or obfuscated code, which makes things even trickier. DOM Invader can automatically scan for gadgets on your behalf and can even generate a DOM XSS proof-of-concept in some cases. This means you can find exploits on real-world sites in a matter of seconds rather than hours.
        </p><p id="finding-client-side-prototype-pollution-gadgets-using-dom-invader-D7G3">
            For more information, check out <a href="/web-security/all-labs">Scanning for prototype pollution gadgets with DOM Invader</a>.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '779D6590142EC062340C7103FC3F043C4A7FCF81748EF0740FC02B5DEC467114'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '3C3D65889EB00F3949889451470CA5FFFC13F3A2BF9CC1D93D539073460C15A1'])@verbatim<h2 id="prototype-pollution-via-the-constructor" chunk-id="8CC2CDFCF48E6BEEEE147BF5F4F81120">Prototype pollution via the constructor</h2><p>
            So far, we've looked exclusively at how you can get a reference to prototype objects via the special <code>__proto__</code> accessor property. As this is the classic technique for prototype pollution, a common defense is to strip any properties with the key <code>__proto__</code> from user-controlled objects before merging them. This approach is flawed as there are alternative ways to reference <code>Object.prototype</code> without relying on the <code>__proto__</code> string at all.
        </p><p>
            Unless its <a href="/web-security/prototype-pollution/preventing#preventing-an-object-from-inheriting-properties">prototype is set to <code>null</code></a>, every JavaScript object has a <code>constructor</code> property, which contains a reference to the constructor function that was used to create it. For example, you can create a new object either using literal syntax or by explicitly invoking the <code>Object()</code> constructor as follows:
        </p><code class="code-scrollable">let myObjectLiteral = {};
let myObject = new Object();</code><p>
            You can then reference the <code>Object()</code> constructor via the built-in <code>constructor</code> property:
        </p><code class="code-scrollable">myObjectLiteral.constructor            <span class="grey">// function Object(){...}</span>
myObject.constructor                   <span class="grey">// function Object(){...}</span></code><p>
            Remember that functions are also just objects under the hood. Each constructor function has a <code>prototype</code> property, which points to the prototype that will be assigned to any objects that are created by this constructor. As a result, you can also access any object's prototype as follows:
        </p><code class="code-scrollable">myObject.constructor.prototype        <span class="grey">// Object.prototype</span>
myString.constructor.prototype        <span class="grey">// String.prototype</span>
myArray.constructor.prototype         <span class="grey">// Array.prototype</span></code><p>
            As <code>myObject.constructor.prototype</code> is equivalent to <code>myObject.__proto__</code>, this provides an alternative vector for prototype pollution.
        </p><h2 id="bypassing-flawed-key-sanitization" chunk-id="1F84725BE2D9BDCA075024B8FE5DC294">Bypassing flawed key sanitization</h2><p>
            An obvious way in which websites attempt to prevent prototype pollution is by sanitizing property keys before merging them into an existing object. However, a common mistake is failing to recursively sanitize the input string. For example, consider the following URL:
        </p><code class="code-scrollable">vulnerable-website.com/?__pro__proto__to__.gadget=payload</code><p>
            If the sanitization process just strips the string <code>__proto__</code> without repeating this process more than once, this would result in the following URL, which is a potentially valid prototype pollution source:
        </p><code class="code-scrollable">vulnerable-website.com/?__proto__.gadget=payload</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'E62603F6C9B96D8F356C0843377815CE5DE0B885389F3CAD18552A666CD8246C'])@verbatim<h2 id="prototype-pollution-in-external-libraries" chunk-id="8A52B7A0B15DF6B8AEAC276B809EA0C8">Prototype pollution in external libraries</h2><p>
            As we've touched on already, prototype pollution gadgets may occur in third-party libraries that are imported by the application. In this case, we strongly recommend using DOM Invader's prototype pollution features to identify sources and gadgets. Not only is this much quicker, it also ensures you won't miss vulnerabilities that would otherwise be extremely tricky to notice.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'EDE1150EA7AF1F2A14C2724937AA94DF976DCC0EEC9169271E4DD546403491A1'])@verbatim<h3 id="what-next" cms-ignore-validation="DUPLICATE_HEADINGS">What next?</h3><p>
                SecDevLab Research discovered a number of widespread prototype pollution gadgets in the JavaScript APIs commonly provided in browsers. Learn how these potentially enable you to bypass weak prototype pollution defences for DOM XSS.
            </p><ul>
            <li>
            <a href="/web-security/prototype-pollution/client-side/browser-apis"><span class="label-light-green-small">LABS</span> Client-side prototype pollution via browser APIs</a>
        </li>
        </ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
