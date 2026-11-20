@extends('layouts.academy')

@section('title', 'Cross-site WebSocket hijacking | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="40">
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
        <h3>WebSockets</h3>
        <ul>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/websockets/what-are-websockets">What are WebSockets?</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/websockets/what-are-websockets#what-is-the-difference-between-http-and-websockets">HTTP vs WebSockets</a></li>
                    <li><a href="/web-security/websockets/what-are-websockets#how-are-websocket-connections-established">How are connections established?</a></li>
                    <li><a href="/web-security/websockets/what-are-websockets#what-do-websocket-messages-look-like">What do WebSocket messages look like?</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/websockets#manipulating-websocket-traffic">Manipulating WebSocket traffic</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/websockets#intercepting-and-modifying-websocket-messages">Intercepting and modifying messages</a></li>
                    <li><a href="/web-security/websockets#replaying-and-generating-new-websocket-messages">Replaying and generating new messages</a></li>
                    <li><a href="/web-security/websockets#manipulating-websocket-connections">Manipulating WebSocket connections</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/websockets#websockets-security-vulnerabilities">Exploiting vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/websockets#manipulating-websocket-messages-to-exploit-vulnerabilities">Manipulating WebSocket messages</a></li>
                    <li><a href="/web-security/websockets#manipulating-the-websocket-handshake-to-exploit-vulnerabilities">Manipulating the WebSocket handshake</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-4">
                        <label for="sub-nav-id-4">
                            <a href="/web-security/websockets/cross-site-websocket-hijacking">Cross-site WebSocket hijacking</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/websockets/cross-site-websocket-hijacking#what-is-the-impact-of-cross-site-websocket-hijacking">Impact</a></li>
                            <li><a href="/web-security/websockets/cross-site-websocket-hijacking#performing-a-cross-site-websocket-hijacking-attack">Performing an attack</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="/web-security/websockets#how-to-secure-a-websocket-connection">Securing a WebSocket connection</a></li>
            <li><a href="/web-security/all-labs#websockets">View all WebSockets labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/websockets"><span itemprop="name">WebSockets</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/websockets/cross-site-websocket-hijacking"><span itemprop="name">CSWSH</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Cross-site WebSocket hijacking</h1><p>
            In this section, we'll explain cross-site WebSocket hijacking (CSWSH), describe the impact of a compromise, and spell out how to perform a cross-site WebSocket hijacking attack.
        </p><h2 id="what-is-cross-site-websocket-hijacking" chunk-id="6EE1159F14EFFB53A5F46B6479D18972">What is cross-site WebSocket hijacking?</h2><p>
            Cross-site WebSocket hijacking (also known as cross-origin WebSocket hijacking) involves a cross-site request forgery (CSRF) vulnerability on a <a href="/web-security/websockets/what-are-websockets#how-are-websocket-connections-established">WebSocket handshake</a>. It arises when the WebSocket handshake request relies solely on HTTP cookies for session handling and does not contain any CSRF tokens or other unpredictable values.
        </p><p>
            An attacker can create a malicious web page on their own domain which establishes a cross-site WebSocket connection to the vulnerable application. The application will handle the connection in the context of the victim user's session with the application.
        </p><p>
            The attacker's page can then send arbitrary messages to the server via the connection and read the contents of messages that are received back from the server. This means that, unlike regular CSRF, the attacker gains two-way interaction with the compromised application.
        </p><h2 id="what-is-the-impact-of-cross-site-websocket-hijacking" chunk-id="02131F90B6FC666E5DCBBE953FD380B7">What is the impact of cross-site WebSocket hijacking?</h2><p>
            A successful cross-site WebSocket hijacking attack will often enable an attacker to:
        </p><ul>
            <li>
                <strong>Perform unauthorized actions masquerading as the victim user.</strong> As with regular CSRF, the attacker can send arbitrary messages to the server-side application. If the application uses client-generated WebSocket messages to perform any sensitive actions, then the attacker can generate suitable messages cross-domain and trigger those actions.
            </li>
            <li>
                <strong>Retrieve sensitive data that the user can access.</strong> Unlike with regular CSRF, cross-site WebSocket hijacking gives the attacker two-way interaction with the vulnerable application over the hijacked WebSocket. If the application uses server-generated WebSocket messages to return any sensitive data to the user, then the attacker can intercept those messages and capture the victim user's data.
            </li>
        </ul><h2 id="performing-a-cross-site-websocket-hijacking-attack" chunk-id="0900BB26CEF65090B3CE4EF5B2857BEF">Performing a cross-site WebSocket hijacking attack</h2><p>
            Since a cross-site WebSocket hijacking attack is essentially a CSRF vulnerability on a WebSocket handshake, the first step to performing an attack is to review the WebSocket handshakes that the application carries out and determine whether they are protected against CSRF.
        </p><p>
            In terms of the <a href="/web-security/csrf#how-does-csrf-work">normal conditions for CSRF attacks</a>, you typically need to find a handshake message that relies solely on HTTP cookies for session handling and doesn't employ any tokens or other unpredictable values in request parameters.
        </p><p id="performing-a-cross-site-websocket-hijacking-attack-K5P6" chunk-id="1B16D72DED13A5421BF93A11C05B67D2">
            For example, the following WebSocket handshake request is probably vulnerable to CSRF, because the only session token is transmitted in a cookie:
        </p><code class="code-scrollable">GET /chat HTTP/1.1
Host: normal-website.com
Sec-WebSocket-Version: 13
Sec-WebSocket-Key: wDqumtseNBJdhkihL6PW7w==
Connection: keep-alive, Upgrade
Cookie: session=KOsEJNuflw4Rd9BDNrVmvwBF9rEijeE2
Upgrade: websocket</code><div class="highlightedarea">
            <h4>Note</h4>
        <p>
            The <code>Sec-WebSocket-Key</code> header contains a random value to prevent errors from caching proxies, and is not used for authentication or session handling purposes.
        </p>
		</div><p id="performing-a-cross-site-websocket-hijacking-attack-D5E9" chunk-id="8911E7771394861C0F5840378C6C4645">
            If the WebSocket handshake request is vulnerable to CSRF, then an attacker's web page can perform a cross-site request to open a WebSocket on the vulnerable site. What happens next in the attack depends entirely on the application's logic and how it is using WebSockets. The attack might involve:
        </p><ul>
            <li> Sending WebSocket messages to perform unauthorized actions on behalf of the victim user. </li>
            <li> Sending WebSocket messages to retrieve sensitive data. </li>
            <li>
                Sometimes, just waiting for incoming messages to arrive containing sensitive data.
            </li>
        </ul>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'A15EC3915BDC09700EEA6C9FD20970DE0AAF2BFBB87B3E7EC3D8D9800B8E542D'])@verbatim
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
