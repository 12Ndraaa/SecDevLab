@extends('layouts.academy')

@section('title', 'Testing for WebSockets security vulnerabilities | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/websockets"><span itemprop="name">WebSockets</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Testing for WebSockets security vulnerabilities</h1><p>
    In this section, we'll explain how to manipulate WebSocket messages and connections, describe the kinds of security vulnerabilities that can arise with WebSockets, and give some examples of exploiting WebSockets vulnerabilities.
</p><h2 id="websockets" chunk-id="014337C80F9291E7BE4747E7D4B5F00F">WebSockets</h2><p>
    WebSockets are widely used in modern web applications. They are initiated over HTTP and provide long-lived connections with asynchronous communication in both directions.
</p><p>
    WebSockets are used for all kinds of purposes, including performing user actions and transmitting sensitive information. Virtually any web security vulnerability that arises with regular HTTP can also arise in relation to WebSockets communications.
</p><div class="highlightedarea">
    <h4>Read more</h4>
    <ul><li><a href="/web-security/websockets/what-are-websockets">What are WebSockets?</a></li></ul></div><img alt="WebSockets" src="/web-security/images/websockets.svg"><div class="highlightedarea">
    <h4>Labs</h4>
    <p>
        If you're already familiar with the basic concepts behind WebSockets vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
    </p>

    <ul><li><a href="/web-security/all-labs#websockets">View all WebSockets labs</a></li></ul></div><h2 id="manipulating-websocket-traffic" chunk-id="AC2008CD6312130C882A78059A838241">Manipulating WebSocket traffic</h2><p>
    Finding WebSockets security vulnerabilities generally involves manipulating them in ways that the application doesn't expect. You can do this using Burp Suite.
</p><p>
    You can use Burp Suite to:
</p><ul>
    <li><a href="/web-security/websockets#intercepting-and-modifying-websocket-messages"> Intercept and modify WebSocket messages.</a></li>
    <li><a href="/web-security/websockets#replaying-and-generating-new-websocket-messages"> Replay and generate new WebSocket messages.</a></li>
    <li><a href="/web-security/websockets#manipulating-websocket-connections"> Manipulate WebSocket connections.</a></li>
</ul><h3 id="intercepting-and-modifying-websocket-messages" chunk-id="5E355A525EA30A132566525A5CD6C1DD">Intercepting and modifying WebSocket messages</h3><p>
    You can use Burp Proxy to intercept and modify WebSocket messages, as follows:
</p><ul>
    <li>
        Open Burp's browser.
    </li>
    <li>
        Browse to the application function that uses WebSockets. You can determine that WebSockets are being used by using the application and looking for entries appearing in the WebSockets history tab within Burp Proxy.
    </li>
    <li>
        In the Intercept tab of Burp Proxy, ensure that interception is turned on.
    </li>
    <li>
        When a WebSocket message is sent from the browser or server, it will be displayed in the Intercept tab for you to view or modify. Press the Forward button to forward the message.
    </li>
</ul><div class="highlightedarea">
    <h4>Note</h4>
    <p>
        You can configure whether client-to-server or server-to-client messages are intercepted in Burp Proxy. Do this in the Settings dialog, in the <a href="/web-security/all-labs">WebSocket interception rules</a> settings.
    </p>
</div><h3 id="replaying-and-generating-new-websocket-messages" chunk-id="ECA9D8D5EA2F1AA709B54CA79F5F4D0B">Replaying and generating new WebSocket messages</h3><p>
    As well as intercepting and modifying WebSocket messages on the fly, you can replay individual messages and generate new messages. You can do this using Burp Repeater:
</p><ul>
    <li>
        In Burp Proxy, select a message in the WebSockets history, or in the Intercept tab, and choose "Send to Repeater" from the context menu.
    </li>
    <li>
        In Burp Repeater, you can now edit the message that was selected, and send it over and over.
    </li>
    <li>
        You can enter a new message and send it in either direction, to the client or server.
    </li>
    <li>
        In the "History" panel within Burp Repeater, you can view the history of messages that have been transmitted over the WebSocket connection. This includes messages that you have generated in Burp Repeater, and also any that were generated by the browser or server via the same connection.
    </li>
    <li>
        If you want to edit and resend any message in the history panel, you can do this by selecting the message and choosing "Edit and resend" from the context menu.
    </li>
</ul><h3 id="manipulating-websocket-connections" chunk-id="817CB57E4E9E8EA2FF20C45642B612EA">Manipulating WebSocket connections</h3><p>
    As well as manipulating WebSocket messages, it is sometimes necessary to manipulate the <a href="/web-security/websockets/what-are-websockets#how-are-websocket-connections-established">WebSocket handshake</a> that establishes the connection.
</p><p>
    There are various situations in which manipulating the WebSocket handshake might be necessary:
</p><ul>
    <li>
        It can enable you to reach more attack surface.
    </li>
    <li>
        Some attacks might cause your connection to drop so you need to establish a new one.
    </li>
    <li>
        Tokens or other data in the original handshake request might be stale and need updating.
    </li>
</ul><p id="manipulating-websocket-connections-J2A0" chunk-id="80DA40CBB25F7C008C240128FC073CEF">
    You can manipulate the WebSocket handshake using Burp Repeater:
</p><ul>
    <li> Send a WebSocket message to Burp Repeater as <a href="/web-security/websockets#replaying-and-generating-new-websocket-messages">already described</a>. </li>
    <li>
        In Burp Repeater, click on the pencil icon next to the WebSocket URL. This opens a wizard that lets you attach to an existing connected WebSocket, clone a connected WebSocket, or reconnect to a disconnected WebSocket.
    </li>
    <li>
        If you choose to clone a connected WebSocket or reconnect to a disconnected WebSocket, then the wizard will show full details of the WebSocket handshake request, which you can edit as required before the handshake is performed.
    </li>
    <li>
        When you click "Connect", Burp will attempt to carry out the configured handshake and display the result. If a new WebSocket connection was successfully established, you can then use this to send new messages in Burp Repeater.
    </li>
</ul><h2 id="websockets-security-vulnerabilities" chunk-id="F7F6CB132FBC91BFF6A531883251E71A">WebSockets security vulnerabilities</h2><p>
    In principle, practically any web security vulnerability might arise in relation to WebSockets:
</p><ul>
    <li>
        User-supplied input transmitted to the server might be processed in unsafe ways, leading to vulnerabilities such as SQL injection or XML external entity injection.
    </li>
    <li>
        Some blind vulnerabilities reached via WebSockets might only be detectable using <a href="/blog/oast-out-of-band-application-security-testing">out-of-band (OAST) techniques</a>.
    </li>
    <li>
        If attacker-controlled data is transmitted via WebSockets to other application users, then it might lead to XSS or other client-side vulnerabilities.
    </li>
</ul><h3 id="manipulating-websocket-messages-to-exploit-vulnerabilities" chunk-id="766C1E78B6CB87E5D788E753A3D1E69A">Manipulating WebSocket messages to exploit vulnerabilities</h3><p>
    The majority of input-based vulnerabilities affecting WebSockets can be found and exploited by <a href="/web-security/websockets#intercepting-and-modifying-websocket-messages">tampering with the contents of WebSocket messages</a>.
</p><p>
    For example, suppose a chat application uses WebSockets to send chat messages between the browser and the server. When a user types a chat message, a WebSocket message like the following is sent to the server:
</p><code class="code-scrollable">{&quot;message&quot;:&quot;Hello Carlos&quot;}</code><p>
    The contents of the message are transmitted (again via WebSockets) to another chat user, and rendered in the user's browser as follows:
</p><code class="code-scrollable">&lt;td&gt;Hello Carlos&lt;/td&gt;</code><p>
    In this situation, provided no other input processing or defenses are in play, an attacker can perform a proof-of-concept XSS attack by submitting the following WebSocket message:
</p><code class="code-scrollable">{&quot;message&quot;:&quot;&lt;img src=1 onerror='alert(1)'&gt;&quot;}</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'DDDCBACFE04ECCC56D7FBF70F27DD50A1732BC533A5F5237A067A80651EF4BAB'])@verbatim<h3 id="manipulating-the-websocket-handshake-to-exploit-vulnerabilities" chunk-id="003D8A855C93097C5D86B97556B4E353">Manipulating the WebSocket handshake to exploit vulnerabilities</h3><p>
    Some WebSockets vulnerabilities can only be found and exploited by <a href="/web-security/websockets#manipulating-websocket-connections">manipulating the WebSocket handshake</a>. These vulnerabilities tend to involve design flaws, such as:
</p><ul>
    <li>
        Misplaced trust in HTTP headers to perform security decisions, such as the <code>X-Forwarded-For</code> header.
    </li>
    <li>
        Flaws in session handling mechanisms, since the session context in which WebSocket messages are processed is generally determined by the session context of the handshake message.
    </li>
    <li>
        Attack surface introduced by custom HTTP headers used by the application.
    </li>
</ul>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'F745F6C86FD28635CF5BDC4071BCBBD639D2CE9755D8AB435C059FB2C96E90F4'])@verbatim<h3 id="using-cross-site-websockets-to-exploit-vulnerabilities" chunk-id="D2F38BE79D928CEA4B1605ACE2E1D7DA">Using cross-site WebSockets to exploit vulnerabilities</h3><p>
    Some WebSockets security vulnerabilities arise when an attacker makes a cross-domain WebSocket connection from a web site that the attacker controls. This is known as a cross-site WebSocket hijacking attack, and it involves exploiting a cross-site request forgery (CSRF) vulnerability on a WebSocket handshake. The attack often has a serious impact, allowing an attacker to perform privileged actions on behalf of the victim user or capture sensitive data to which the victim user has access.
</p><div class="highlightedarea">
    <h4>Read more</h4>

    <ul><li><a href="/web-security/websockets/cross-site-websocket-hijacking">Cross-site WebSockets hijacking</a></li></ul></div><h2 id="how-to-secure-a-websocket-connection" chunk-id="C26407213AEB432597C8784CC718038C">How to secure a WebSocket connection</h2><p>
    To minimize the risk of security vulnerabilities arising with WebSockets, use the following guidelines:
</p><ul>
    <li>Use the <code>wss://</code> protocol (WebSockets over TLS).</li>
    <li>Hard code the URL of the WebSockets endpoint, and certainly don't incorporate user-controllable data into this URL. </li>
    <li>Protect the WebSocket handshake message against CSRF, to avoid cross-site WebSockets hijacking vulnerabilities.</li>
    <li>Treat data received via the WebSocket as untrusted in both directions. Handle data safely on both the server and client ends, to prevent input-based vulnerabilities such as SQL injection and cross-site scripting.</li>
</ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
