@extends('layouts.academy')

@section('title', 'JavaScript prototypes and inheritance | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/prototype-pollution"><span itemprop="name">Prototype pollution</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance"><span itemprop="name">JavaScript prototypes and inheritance</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="DUPLICATE_HEADINGS" class="heading-2">JavaScript prototypes and inheritance</h1><p>
            JavaScript uses a prototypal inheritance model, which is quite different from the class-based model used by many other languages. In this section, we'll provide a basic overview of how this works, which should give you enough of an understanding to follow our learning materials on <a href="/web-security/prototype-pollution">prototype pollution vulnerabilities</a>.
        </p><h2 id="what-is-an-object-in-javascript" chunk-id="E201E08209845BEB699AA76D2C099F01">What is an object in JavaScript?</h2><p>
            A JavaScript object is essentially just a collection of <code>key:value</code> pairs known as "properties". For example, the following object could represent a user:
        </p><code class="code-scrollable">const user =  {
    username: "wiener",
    userId: 01234,
    isAdmin: false
}</code><p>
            You can access the properties of an object by using either dot notation or bracket notation to refer to their respective keys:
        </p><code class="code-scrollable">user.username     <span class="grey">// "wiener"</span>
user['userId']    <span class="grey">// 01234</span></code><p id="what-is-an-object-in-javascript-G3Q0" chunk-id="FD707D60EADEAAFB104C40974C915246">
            As well as data, properties may also contain executable functions. In this case, the function is known as a "method".
        </p><code class="code-scrollable">const user =  {
    username: "wiener",
    userId: 01234,
    exampleMethod: function(){
        <span class="grey">// do something</span>
    }
}</code><p>
            The example above is an "object literal", which means it was created using curly brace syntax to explicitly declare its properties and their initial values. However, it's important to understand that almost everything in JavaScript is an object under the hood. Throughout these materials, the term "object" refers to all entities, not just object literals.
        </p><h2 id="what-is-a-prototype-in-javascript" chunk-id="B5CCFB5DBB0B16FC649FE771B3D3D695">What is a prototype in JavaScript?</h2><p>
            Every object in JavaScript is linked to another object of some kind, known as its prototype. By default, JavaScript automatically assigns new objects one of its built-in prototypes. For example, strings are automatically assigned the built-in <code>String.prototype</code>. You can see some more examples of these global prototypes below:
        </p><code class="code-scrollable">let myObject = {};
Object.getPrototypeOf(myObject);    <span class="grey">// Object.prototype</span>

let myString = "";
Object.getPrototypeOf(myString);    <span class="grey">// String.prototype</span>

let myArray = [];
Object.getPrototypeOf(myArray);	    <span class="grey">// Array.prototype</span>

let myNumber = 1;
Object.getPrototypeOf(myNumber);    <span class="grey">// Number.prototype</span></code><p>
            Objects automatically inherit all of the properties of their assigned prototype, unless they already have their own property with the same key. This enables developers to create new objects that can reuse the properties and methods of existing objects.
        </p><p>
            The built-in prototypes provide useful properties and methods for working with basic data types. For example, the <code>String.prototype</code> object has a <code>toLowerCase()</code> method. As a result, all strings automatically have a ready-to-use method for converting them to lowercase. This saves developers having to manually add this behavior to each new string that they create.
        </p><h2 id="how-does-object-inheritance-work-in-javascript" chunk-id="A52F4C9F0D58A3BF1986399B22C78643">How does object inheritance work in JavaScript?</h2><p>
            Whenever you reference a property of an object, the JavaScript engine first tries to access this directly on the object itself. If the object doesn't have a matching property, the JavaScript engine looks for it on the object's prototype instead. Given the following objects, this enables you to reference <code>myObject.propertyA</code>, for example:
        </p><img alt="JavaScript prototypal inheritance" src="/web-security/prototype-pollution/images/prototype-pollution-inheritance.svg"><p id="how-does-object-inheritance-work-in-javascript-A4P4" chunk-id="7EBF8BF90E3B92DF58AAC8C7B3C82A6C">
            You can use your browser console to see this behavior in action. First, create a completely empty object:
        </p><code class="code-scrollable">let myObject = {};</code><p>
            Next, type <code>myObject</code> followed by a dot. Notice that the console prompts you to select from a list of properties and methods:
        </p><div class="rounded-dropshadow">
            <img alt="Inspecting prototypal inheritance in the browser console" src="/web-security/prototype-pollution/images/prototype-pollution-console-screenshot.png">
        </div><p>
            Even though there are no properties or methods defined for the object itself, it has inherited some from the built-in <code>Object.prototype</code>.
        </p><h2 id="the-prototype-chain" chunk-id="C97095BF80B04D60D7633C3E4F6DB7FC">The prototype chain</h2><p>
            Note that an object's prototype is just another object, which should also have its own prototype, and so on. As virtually everything in JavaScript is an object under the hood, this chain ultimately leads back to the top-level <code>Object.prototype</code>, whose prototype is simply <code>null</code>.
        </p><img alt="JavaScript prototype chain" src="/web-security/prototype-pollution/images/prototype-pollution-prototype-chain.svg"><p>
            Crucially, objects inherit properties not just from their immediate prototype, but from all objects above them in the prototype chain. In the example above, this means that the <code>username</code> object has access to the properties and methods of both <code>String.prototype</code> and <code>Object.prototype</code>.
        </p><h2 id="accessing-an-object-s-prototype-using-proto" chunk-id="8B0E2C7C1FAC716AC9228AEC0EDEB94F">Accessing an object's prototype using __proto__</h2><p>
            Every object has a special property that you can use to access its prototype. Although this doesn't have a formally standardized name, <code>__proto__</code> is the de facto standard used by most browsers. If you're familiar with object-oriented languages, this property serves as both a getter and setter for the object's prototype. This means you can use it to read the prototype and its properties, and even reassign them if necessary.
        </p><p>
            As with any property, you can access <code>__proto__</code> using either bracket or dot notation:
        </p><code class="code-scrollable">username.__proto__
username['__proto__']</code><p>
            You can even chain references to <code>__proto__</code> to work your way up the prototype chain:
        </p><code class="code-scrollable">username.__proto__                        <span class="grey">// String.prototype</span>
username.__proto__.__proto__              <span class="grey">// Object.prototype</span>
username.__proto__.__proto__.__proto__    <span class="grey">// null</span></code><h2 id="modifying-prototypes" chunk-id="CCFD2F7BF397239A1DD003100E89DDF5">Modifying prototypes</h2><p>
            Although it's generally considered bad practice, it is possible to modify JavaScript's built-in prototypes just like any other object. This means developers can customize or override the behavior of built-in methods, and even add new methods to perform useful operations.
        </p><p>
            For example, modern JavaScript provides the <code>trim()</code> method for strings, which enables you to easily remove any leading or trailing whitespace. Before this built-in method was introduced, developers sometimes added their own custom implementation of this behavior to the <code>String.prototype</code> object by doing something like this:
        </p><code class="code-scrollable">String.prototype.removeWhitespace = function(){
    <span class="grey">// remove leading and trailing whitespace</span>
}</code><p>
            Thanks to the prototypal inheritance, all strings would then have access to this method:
        </p><code class="code-scrollable">let searchTerm = "  example ";
searchTerm.removeWhitespace();    <span class="grey">// "example"</span></code><h3 id="what-next" cms-ignore-validation="DUPLICATE_HEADINGS">What next?</h3><p>
                Now that you have a basic understanding of how prototypes and inheritance work in JavaScript, let's take a look at how implementation flaws can lead to a security vulnerability known as prototype pollution:
            </p><ul><li><a href="/web-security/prototype-pollution">What is prototype pollution?</a></li></ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
