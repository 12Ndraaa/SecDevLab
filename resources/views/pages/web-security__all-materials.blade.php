@extends('layouts.academy')

@php $isId = ($uiLocale ?? app()->getLocale()) === 'id'; @endphp
@section('title', ($isId ? 'Semua materi belajar' : 'All learning materials').' | '.($isId ? 'Akademi Keamanan Web' : 'Web Security Academy').' | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="-1">
            <nav class="nav-lhs-scrollable">
                <label class="nav-lhs-toggle-label" for="nav-lhs-toggle"></label>
                
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">{{ $isId ? 'Akademi Keamanan Web' : 'Web Security Academy' }}</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/all-materials"><span itemprop="name">{{ $isId ? 'Semua materi' : 'All materials' }}</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">{{ $isId ? 'Semua materi belajar' : 'All learning materials' }}</h1><p>
            <a class="chevron-after" href="/web-security/all-materials/detailed">{{ $isId ? 'Lihat tampilan detail' : 'See detailed view' }}</a>
        </p>@verbatim<table class="is-nonresponsive-table">
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/learning-paths">Web Security Academy Learning Paths</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/race-conditions">Race conditions</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/graphql">GraphQL API vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/graphql/what-is-graphql">What is GraphQL?</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/all-topics">All topics</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/mystery-lab-challenge">Put your recon skills to the test</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/getting-started">Getting started with the Web Security Academy</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/prototype-pollution">What is prototype pollution?</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution/javascript-prototypes-and-inheritance">JavaScript prototypes and inheritance</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution/client-side">Client-side prototype pollution vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/prototype-pollution/client-side/browser-apis">Prototype pollution via browser APIs</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution/server-side">Server-side prototype pollution</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/prototype-pollution/preventing">Preventing prototype pollution vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/essential-skills">Essential skills</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings">Obfuscating attacks using encodings</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing">Using Burp Scanner during manual testing</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/sql-injection">SQL injection</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection/examining-the-database">Examining the database in SQL injection attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection/union-attacks">SQL injection UNION attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection/blind">Blind SQL injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/cross-site-scripting">Cross-site scripting</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/reflected">Reflected XSS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/stored">Stored XSS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/dom-based">DOM-based XSS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/contexts">Cross-site scripting contexts</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection">Client-side template injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/exploiting">Exploiting cross-site scripting vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/dangling-markup">Dangling markup injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/content-security-policy">Content security policy</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/preventing">How to prevent XSS</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cross-site-scripting/cheat-sheet">Cross-site scripting (XSS) cheat sheet</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/csrf">Cross-site request forgery (CSRF)</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf/xss-vs-csrf">XSS vs CSRF</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf/bypassing-token-validation">Bypassing CSRF token validation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf/bypassing-samesite-restrictions">Bypassing SameSite cookie restrictions</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf/bypassing-referer-based-defenses">Bypassing Referer-based CSRF defenses</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/csrf/preventing">How to prevent CSRF vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/xxe">XML external entity (XXE) injection</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe/xml-entities">XML entities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/xxe/blind">Finding and exploiting blind XXE vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/clickjacking">Clickjacking (UI redressing)</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/cors">Cross-origin resource sharing (CORS)</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cors/same-origin-policy">Same-origin policy (SOP)</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/cors/access-control-allow-origin">CORS and the Access-Control-Allow-Origin response header</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/ssrf">Server-side request forgery (SSRF)</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/ssrf/blind">Blind SSRF vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/request-smuggling">HTTP request smuggling</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling/finding">Finding HTTP request smuggling vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling/exploiting">Exploiting HTTP request smuggling vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling/advanced">Advanced request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors">HTTP/2-exclusive vectors</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced/response-queue-poisoning">Response queue poisoning</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced/request-tunnelling">HTTP request tunnelling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/advanced/http2-downgrading">HTTP/2 downgrading</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/request-smuggling/browser">Browser-powered request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/browser/cl-0">CL.0 request smuggling</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/browser/client-side-desync">Client-side desync attacks</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/request-smuggling/browser/pause-based-desync">Pause-based desync attacks</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/os-command-injection">OS command injection</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/server-side-template-injection">Server-side template injection</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/server-side-template-injection/exploiting">Exploiting server-side template injection vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/deserialization">Insecure deserialization</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/deserialization/exploiting">Exploiting insecure deserialization vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/file-path-traversal">Path traversal</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/access-control">Access control vulnerabilities and privilege escalation</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control/idor">Insecure direct object references (IDOR)</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/access-control/security-models">Access control security models</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/authentication">Authentication vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/password-based">Vulnerabilities in password-based login</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/multi-factor">Vulnerabilities in multi-factor authentication</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/other-mechanisms">Vulnerabilities in other authentication mechanisms</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/securing">How to secure your authentication mechanisms</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/auth-lab-usernames">Authentication lab usernames</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/authentication/auth-lab-passwords">Authentication lab passwords</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/oauth">OAuth 2.0 authentication vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth/grant-types">OAuth grant types</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth/openid">OpenID Connect</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/oauth/preventing">How to prevent OAuth authentication vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/logic-flaws">Business logic vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/logic-flaws/examples">Examples of business logic vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/websockets">Testing for WebSockets security vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/websockets/what-are-websockets">What are WebSockets?</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/websockets/cross-site-websocket-hijacking">Cross-site WebSocket hijacking</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/dom-based">DOM-based vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/controlling-the-web-message-source">Controlling the web message source</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/open-redirection">DOM-based open redirection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/cookie-manipulation">DOM-based cookie manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/javascript-injection">DOM-based JavaScript injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/document-domain-manipulation">DOM-based document-domain manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/websocket-url-poisoning">DOM-based WebSocket-URL poisoning</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/link-manipulation">DOM-based link manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/web-message-manipulation">Web message manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/ajax-request-header-manipulation">DOM-based Ajax request-header manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/local-file-path-manipulation">DOM-based local file-path manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/client-side-sql-injection">DOM-based client-side SQL injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/html5-storage-manipulation">DOM-based HTML5-storage manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/client-side-xpath-injection">DOM-based client-side XPath injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/client-side-json-injection">DOM-based client-side JSON injection</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/dom-data-manipulation">DOM-data manipulation</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/denial-of-service">DOM-based denial of service</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/dom-based/dom-clobbering">DOM clobbering</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/web-cache-poisoning">Web cache poisoning</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws">Exploiting cache design flaws</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws">Exploiting cache implementation flaws</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/host-header">HTTP Host header attacks</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/host-header/exploiting">How to identify and exploit HTTP Host header vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="3">
                    <a href="/web-security/host-header/exploiting/password-reset-poisoning">Password reset poisoning</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/information-disclosure">Information disclosure vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/information-disclosure/exploiting">How to find and exploit information disclosure vulnerabilities</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/file-upload">File upload vulnerabilities</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/jwt">JWT attacks</a></strong>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan="4">
                    <a href="/web-security/jwt/algorithm-confusion">Algorithm confusion attacks</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/video-guidelines">Guidelines for submitting video solutions</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/credits">Who is behind the Web Security Academy?</a></strong>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong><a href="/web-security/dashboard">Welcome back!</a></strong>
                </td>
            </tr>
        </table>
        
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
