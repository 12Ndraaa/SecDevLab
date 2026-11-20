@extends('layouts.academy')

@section('title', 'What are WebSockets? | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/websockets"><span itemprop="name">WebSockets</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/websockets/what-are-websockets"><span itemprop="name">What are WebSockets?</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">What are WebSockets?</h1><p>
            WebSockets are a bi-directional, full duplex communications protocol initiated over HTTP. They are commonly used in modern web applications for streaming data and other asynchronous traffic.
        </p><p>
            In this section, we'll explain the difference between HTTP and WebSockets, describe how WebSocket connections are established, and outline what WebSocket messages look like.
        </p><h2 id="what-is-the-difference-between-http-and-websockets">What is the difference between HTTP and WebSockets?</h2><p>
            Most communication between web browsers and web sites uses HTTP. With HTTP, the client sends a request and the server returns a response. Typically, the response occurs immediately, and the transaction is complete. Even if the network connection stays open, this will be used for a separate transaction of a request and a response.
        </p><p>
            Some modern web sites use WebSockets. WebSocket connections are initiated over HTTP and are typically long-lived. Messages can be sent in either direction at any time and are not transactional in nature. The connection will normally stay open and idle until either the client or the server is ready to send a message.
        </p><p>
            WebSockets are particularly useful in situations where low-latency or server-initiated messages are required, such as real-time feeds of financial data.
        </p><h2 id="how-are-websocket-connections-established">How are WebSocket connections established?</h2><p>
            WebSocket connections are normally created using client-side JavaScript like the following:
        </p><code class="code-scrollable">var ws = new WebSocket(&quot;wss://normal-website.com/chat&quot;);</code><div class="highlightedarea">
            <h4>Note</h4>
        <p>
            The <code>wss</code> protocol establishes a WebSocket over an encrypted TLS connection, while the <code>ws</code> protocol uses an unencrypted connection.
        </p>
		</div><p>
            To establish the connection, the browser and server perform a WebSocket handshake over HTTP. The browser issues a WebSocket handshake request like the following:
        </p><code class="code-scrollable">GET /chat HTTP/1.1
Host: normal-website.com
Sec-WebSocket-Version: 13
Sec-WebSocket-Key: wDqumtseNBJdhkihL6PW7w==
Connection: keep-alive, Upgrade
Cookie: session=KOsEJNuflw4Rd9BDNrVmvwBF9rEijeE2
Upgrade: websocket</code><p>
            If the server accepts the connection, it returns a WebSocket handshake response like the following:
        </p><code class="code-scrollable">HTTP/1.1 101 Switching Protocols
Connection: Upgrade
Upgrade: websocket
Sec-WebSocket-Accept: 0FFP+2nmNIf/h+4BP36k9uzrYGk=</code><p>
            At this point, the network connection remains open and can be used to send WebSocket messages in either direction.
        </p><div class="highlightedarea">
            <h4>Note</h4>
        <p>
            Several features of the WebSocket handshake messages are worth noting:
        </p>
        <ul>
            <li>
                The <code>Connection</code> and <code>Upgrade</code> headers in the request and response indicate that this is a WebSocket handshake.
            </li>
            <li>
                The <code>Sec-WebSocket-Version</code> request header specifies the WebSocket protocol version that the client wishes to use. This is typically <code>13</code>.
            </li>
            <li>
                The <code>Sec-WebSocket-Key</code> request header contains a Base64-encoded random value, which should be randomly generated in each handshake request.
            </li>
            <li>
                The <code>Sec-WebSocket-Accept</code> response header contains a hash of the value submitted in the <code>Sec-WebSocket-Key</code> request header, concatenated with a specific string defined in the protocol specification. This is done to prevent misleading responses resulting from misconfigured servers or caching proxies.
            </li>
        </ul>
		</div><h2 id="what-do-websocket-messages-look-like">What do WebSocket messages look like?</h2><p>
            Once a WebSocket connection has been established, messages can be sent asynchronously in either direction by the client or server.
        </p><p>
            A simple message could be sent from the browser using client-side JavaScript like the following:
        </p><code class="code-scrollable">ws.send(&quot;Peter Wiener&quot;);</code><p>
            In principle, WebSocket messages can contain any content or data format. In modern applications, it is common for JSON to be used to send structured data within WebSocket messages.
        </p><p>
            For example, a chat-bot application using WebSockets might send a message like the following:
        </p><code class="code-scrollable">{&quot;user&quot;:&quot;Hal Pline&quot;,&quot;content&quot;:&quot;I wanted to be a Playstation growing up, not a device to answer your inane questions&quot;}</code>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
