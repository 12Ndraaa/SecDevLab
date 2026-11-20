@extends('layouts.academy')

@section('title', 'Response queue poisoning | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="45">
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
        <h3>HTTP request smuggling</h3>
        <ul>
            <li><a href="/web-security/request-smuggling#what-is-http-request-smuggling">What is HTTP request smuggling?</a></li>
            <li><a href="/web-security/request-smuggling#how-do-http-request-smuggling-vulnerabilities-arise">How vulnerabilities arise</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/request-smuggling#how-to-perform-an-http-request-smuggling-attack">Performing an attack</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/request-smuggling#cl-te-vulnerabilities">CL.TE vulnerabilities</a></li>
                    <li><a href="/web-security/request-smuggling#te-cl-vulnerabilities">TE.CL vulnerabilities</a></li>
                    <li><a href="/web-security/request-smuggling#te-te-behavior-obfuscating-the-te-header">TE.TE vulnerabilities</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/request-smuggling/finding">Identifying vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/request-smuggling/finding#finding-cl-te-vulnerabilities-using-timing-techniques">CL.TE vulnerabilities</a></li>
                    <li><a href="/web-security/request-smuggling/finding#finding-te-cl-vulnerabilities-using-timing-techniques">TE.CL vulnerabilities</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/request-smuggling/finding#confirming-http-request-smuggling-vulnerabilities-using-differential-responses">Confirming vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/request-smuggling/finding#finding-cl-te-vulnerabilities-using-timing-techniques">CL.TE vulnerabilities</a></li>
                    <li><a href="/web-security/request-smuggling/finding#finding-te-cl-vulnerabilities-using-timing-techniques">TE.CL vulnerabilities</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/request-smuggling/exploiting">Exploiting vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-bypass-front-end-security-controls">Bypassing front-end security controls</a></li>
                    <li><a href="/web-security/request-smuggling/exploiting#revealing-front-end-request-rewriting">Revealing front-end request rewriting</a></li>
                    <li><a href="/web-security/request-smuggling/exploiting#bypassing-client-authentication">Bypassing client authentication</a></li>
                    <li><a href="/web-security/request-smuggling/exploiting#capturing-other-users-requests">Capturing other users' requests</a></li>
                    <li><a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-exploit-reflected-xss">Exploiting reflected XSS</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-5">
                        <label for="sub-nav-id-5">
                            <a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-turn-an-on-site-redirect-into-an-open-redirect">Turning an on-site redirect into an open redirect</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/request-smuggling/exploiting#turning-root-relative-redirects-into-open-redirects">Turning root-relative redirects into open redirects</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-perform-web-cache-poisoning">Web cache poisoning</a></li>
                    <li><a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-perform-web-cache-deception">Web cache deception</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-6">
                <label for="sub-nav-id-6">
                    <a href="/web-security/request-smuggling/advanced">Advanced request smuggling</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-7">
                        <label for="sub-nav-id-7">
                            <a href="/web-security/request-smuggling/advanced#http-2-request-smuggling">HTTP/2 request smuggling</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/request-smuggling/advanced#http-2-message-length">Message length</a></li>
                            <li><a href="/web-security/request-smuggling/advanced#http-2-downgrading">HTTP/2 downgrading</a></li>
                            <li><a href="/web-security/request-smuggling/advanced#h2-cl-vulnerabilities">H2.CL vulnerabilities</a></li>
                            <li><a href="/web-security/request-smuggling/advanced#h2-te-vulnerabilities">H2.TE vulnerabilities</a></li>
                            <li>
                                <input type="checkbox" id="sub-nav-id-8">
                                <label for="sub-nav-id-8">
                                    <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors">HTTP/2-exclusive vectors</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/request-smuggling/advanced#request-smuggling-via-crlf-injection">Request smuggling via CRLF injection</a></li>
                                    <li><a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#injecting-via-header-names">Injecting via header names</a></li>
                                    <li>
                                        <input type="checkbox" id="sub-nav-id-9">
                                        <label for="sub-nav-id-9">
                                            <a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#injecting-via-pseudo-headers">Injecting via pseudo-headers</a>
                                            <span class="icon-arrow-head-down"></span>
                                        </label>
                                        <ul>
                                            <li><a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#supplying-an-ambiguous-host">Supplying an ambiguous host</a></li>
                                            <li><a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#supplying-an-ambiguous-path">Supplying an ambiguous path</a></li>
                                            <li><a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#injecting-a-full-request-line">Injecting a full request line</a></li>
                                            <li><a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#injecting-a-url-prefix">Injecting a URL prefix</a></li>
                                            <li><a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors#injecting-newlines-into-pseudo-headers">Injecting newlines</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/web-security/request-smuggling/advanced#hidden-http-2-support">Hidden HTTP/2 support</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-10">
                        <label for="sub-nav-id-10">
                            <a href="/web-security/request-smuggling/advanced/response-queue-poisoning">Response queue poisoning</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/request-smuggling/advanced/response-queue-poisoning#what-is-the-impact-of-response-queue-poisoning">Impact</a></li>
                            <li>
                                <input type="checkbox" id="sub-nav-id-11">
                                <label for="sub-nav-id-11">
                                    <a href="/web-security/request-smuggling/advanced/response-queue-poisoning#how-to-construct-a-response-queue-poisoning-attack">Constructing an attack</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/request-smuggling/advanced/response-queue-poisoning#understanding-the-aftermath-of-request-smuggling">Understanding the aftermath of request smuggling</a></li>
                                    <li><a href="/web-security/request-smuggling/advanced/response-queue-poisoning#smuggling-a-complete-request">Smuggling a complete request</a></li>
                                    <li><a href="/web-security/request-smuggling/advanced/response-queue-poisoning#desynchronizing-the-response-queue">Desynchronizing the response queue</a></li>
                                    <li><a href="/web-security/request-smuggling/advanced/response-queue-poisoning#stealing-other-users-responses">Stealing other users' responses</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-12">
                        <label for="sub-nav-id-12">
                            <a href="/web-security/request-smuggling/advanced#http-2-request-splitting">HTTP/2 request splitting</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/request-smuggling/advanced#accounting-for-front-end-rewriting">Accounting for front-end rewriting</a></li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-13">
                        <label for="sub-nav-id-13">
                            <a href="/web-security/request-smuggling/advanced/request-tunnelling">HTTP request tunnelling</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/request-smuggling/advanced/request-tunnelling#request-tunnelling-with-http-2">HTTP/2 request tunnelling</a></li>
                            <li><a href="/web-security/request-smuggling/advanced/request-tunnelling#leaking-internal-headers-via-http-2-request-tunnelling">Leaking internal headers</a></li>
                            <li><a href="/web-security/request-smuggling/advanced/request-tunnelling#blind-request-tunnelling">Blind request tunnelling</a></li>
                            <li><a href="/web-security/request-smuggling/advanced/request-tunnelling#non-blind-request-tunnelling-using-head">Non-blind request tunnelling using HEAD requests</a></li>
                            <li><a href="/web-security/request-smuggling/advanced/request-tunnelling#web-cache-poisoning-via-http-2-request-tunnelling">Web cache poisoning</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/request-smuggling/advanced#0-cl-request-smuggling">0.CL request smuggling</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-14">
                <label for="sub-nav-id-14">
                    <a href="/web-security/request-smuggling/browser">Browser-powered request smuggling</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-15">
                        <label for="sub-nav-id-15">
                            <a href="/web-security/request-smuggling/browser/cl-0">CL.0 request smuggling</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/request-smuggling/browser/cl-0#testing-for-cl-0-vulnerabilities">Testing for CL.0 vulnerabilities</a></li>
                            <li><a href="/web-security/request-smuggling/browser/cl-0#eliciting-cl-0-behavior">Eliciting CL.0 behavior</a></li>
                            <li><a href="/web-security/request-smuggling/browser/cl-0#exploiting-cl-0-vulnerabilities">Exploiting CL.0 vulnerabilities</a></li>
                            <li><a href="/web-security/request-smuggling/browser/cl-0#h2-0-vulnerabilities">H2.0 vulnerabilities</a></li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-16">
                        <label for="sub-nav-id-16">
                            <a href="/web-security/request-smuggling/browser/client-side-desync">Client-side desync attacks</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/request-smuggling/browser/client-side-desync#what-is-a-client-side-desync-attack">What is a client-side desync attack?</a></li>
                            <li>
                                <input type="checkbox" id="sub-nav-id-17">
                                <label for="sub-nav-id-17">
                                    <a href="/web-security/request-smuggling/browser/client-side-desync#testing-for-client-side-desync-vulnerabilities">Testing for vulnerabilities</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/request-smuggling/browser/client-side-desync#probing-for-client-side-desync-vectors">Probing for client-side desync vectors</a></li>
                                    <li><a href="/web-security/request-smuggling/browser/client-side-desync#confirming-the-desync-vector-in-burp">Confirming the desync vector in Burp</a></li>
                                    <li><a href="/web-security/request-smuggling/browser/client-side-desync#building-a-proof-of-concept-in-a-browser">Building a proof of concept in a browser</a></li>
                                    <li><a href="/web-security/request-smuggling/browser/client-side-desync#handling-redirects">Handling redirects</a></li>
                                </ul>
                            </li>
                            <li>
                                <input type="checkbox" id="sub-nav-id-18">
                                <label for="sub-nav-id-18">
                                    <a href="/web-security/request-smuggling/browser/client-side-desync#exploiting-client-side-desync-vulnerabilities">Exploiting vulnerabilities</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/request-smuggling/browser/client-side-desync#client-side-variations-of-classic-attacks">Client-side
                                        variations of classic attacks</a></li>
                                    <li>
                                        <input type="checkbox" id="sub-nav-id-19">
                                        <label for="sub-nav-id-19">
                                            <a href="/web-security/request-smuggling/browser/client-side-desync#client-side-cache-poisoning">Client-side cache poisoning</a>
                                            <span class="icon-arrow-head-down"></span>
                                        </label>
                                        <ul>
                                            <li><a href="/web-security/request-smuggling/browser/client-side-desync#poisoning-the-cache-with-a-redirect">With a redirect</a></li>
                                            <li><a href="/web-security/request-smuggling/browser/client-side-desync#triggering-the-resource-import">Triggering the resource import</a></li>
                                            <li><a href="/web-security/request-smuggling/browser/client-side-desync#delivering-a-payload">Delivering a payload</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/web-security/request-smuggling/browser/client-side-desync#pivoting-attacks-against-internal-infrastructure">Pivoting attacks against internal infrastructure</a></li>
                                </ul>
                            </li>
                            <li>
                                <input type="checkbox" id="sub-nav-id-20">
                                <label for="sub-nav-id-20">
                                    <a href="/web-security/request-smuggling/browser/pause-based-desync">Pause-based desync attacks</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/request-smuggling/browser/pause-based-desync#server-side-pause-based-desync">Server side pause-based desync</a></li>
                                    <li><a href="/web-security/request-smuggling/browser/pause-based-desync#testing-for-pause-based-cl-0-vulnerabilities">Testing for pause-based CL.0 vulnerabilities</a></li>
                                    <li><a href="/web-security/request-smuggling/browser/pause-based-desync#client-side-pause-based-desync">Client-side pause-based desync</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="/web-security/request-smuggling#how-to-prevent-http-request-smuggling-vulnerabilities">Preventing vulnerabilities</a></li>
            <li><a href="/web-security/all-labs#http-request-smuggling">View all request smuggling labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling"><span itemprop="name">Request smuggling</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/advanced"><span itemprop="name">Advanced</span></a><meta itemprop="position" content="3" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/advanced/response-queue-poisoning"><span itemprop="name">Response queue poisoning</span></a><meta itemprop="position" content="4" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Response queue poisoning</h1><p>
            Response queue poisoning is a powerful form of request smuggling attack that causes a front-end server to start mapping responses from the back-end to the wrong requests. In practice, this means that all users of the same front-end/back-end connection are persistently served responses that were intended for someone else.
        </p><p>
            This is achieved by smuggling a complete request, thereby eliciting two responses from the back-end when the front-end server is only expecting one.
        </p><h2 id="what-is-the-impact-of-response-queue-poisoning">What is the impact of response queue poisoning?</h2><p>
            The impact of response queue poisoning is normally catastrophic. Once the queue is poisoned, an attacker can capture other users' responses simply by issuing arbitrary follow-up requests. These responses may contain sensitive personal or business data, as well as session tokens and the like, which effectively grant the attacker full access to the victim's account.
        </p><p>
            Response queue poisoning also causes significant collateral damage, effectively breaking the site for any other users whose traffic is being sent to the back-end over the same TCP connection. While attempting to browse the site as normal, users will receive seemingly random responses from the server, which will prevent most functions from working correctly.
        </p><h2 id="how-to-construct-a-response-queue-poisoning-attack">How to construct a response queue poisoning attack</h2><p>
            For a successful response queue poisoning attack, the following criteria must be met:
        </p><ul>
            <li>
                <p>
                    The TCP connection between the front-end server and back-end server is <a href="/web-security/request-smuggling#what-happens-in-an-http-request-smuggling-attack">reused for multiple request/response cycles</a>.
                </p>
            </li>
            <li>
                <p>
                    The attacker is able to successfully smuggle a complete, standalone request that receives its own distinct response from the back-end server.
                </p>
            </li>
            <li>
                <p>
                    The attack does not result in either server closing the TCP connection. Servers generally close incoming connections when they receive an invalid request because they can't determine where the request is supposed to end.
                </p>
            </li>
        </ul><h3 id="understanding-the-aftermath-of-request-smuggling">Understanding the aftermath of request smuggling</h3><p>
            Request smuggling attacks usually involve smuggling a partial request, which the server adds as a prefix to the start of the next request on the connection. It's important to note that the content of the smuggled request influences what happens to the connection following the initial attack.
        </p><p>
            If you just smuggle a request line with some headers, assuming that another request is sent on the connection shortly afterwards, the back-end ultimately still sees two complete requests.
        </p><img alt="Smuggling a prefix" src="/web-security/images/smuggling-http-request-to-back-end-server.svg"><p>
            If you instead smuggle a request that also contains a body, the next request on the connection will be appended to the body of the smuggled request. This often has the side-effect of truncating the final request based on the apparent <code>Content-Length</code>. As a result, the back-end effectively sees three requests, where the third "request" is just a series of leftover bytes:
        </p><p>
            <strong>Front-end (CL)</strong>
        </p><code class="code-scrollable"><span class="blue">POST / HTTP/1.1
Host: vulnerable-website.com
Content-Type: x-www-form-urlencoded
Content-Length: 120
Transfer-Encoding: chunked

0

POST /example HTTP/1.1
Host: vulnerable-website.com
Content-Type: x-www-form-urlencoded
Content-Length: 25

x=</span><span class="green">GET / HTTP/1.1
Host: vulnerable-website.com</span></code><p>
            <strong>Back-end (TE)</strong>
        </p><code class="code-scrollable"><span class="blue">POST / HTTP/1.1
Host: vulnerable-website.com
Content-Type: x-www-form-urlencoded
Content-Length: 120
Transfer-Encoding: chunked

0</span>

<span class="orange">POST /example HTTP/1.1
Host: vulnerable-website.com
Content-Type: x-www-form-urlencoded
Content-Length: 25

x=GET / HTTP/1.1
Host: v</span><span class="green">ulnerable-website.com</span></code><p>
            As these leftover bytes don't form a valid request, this typically results in an error, causing the server to close the connection.
        </p><h3 id="smuggling-a-complete-request">Smuggling a complete request</h3><p>
            With a bit of care, you can smuggle a complete request instead of just a prefix. As long as you send exactly two requests in one, any subsequent requests on the connection will remain unchanged:
        </p><p>
            <strong>Front-end (CL)</strong>
        </p><code class="code-scrollable"><span class="blue">POST / HTTP/1.1<span class="grey">\r\n</span>
Host: vulnerable-website.com<span class="grey">\r\n</span>
Content-Type: x-www-form-urlencoded<span class="grey">\r\n</span>
Content-Length: 61<span class="grey">\r\n</span>
Transfer-Encoding: chunked<span class="grey">\r\n</span>
<span class="grey">\r\n</span>
0<span class="grey">\r\n</span>
<span class="grey">\r\n</span>
GET /anything HTTP/1.1<span class="grey">\r\n</span>
Host: vulnerable-website.com<span class="grey">\r\n</span>
<span class="grey">\r\n</span></span>
<span class="green">GET / HTTP/1.1<span class="grey">\r\n</span>
Host: vulnerable-website.com<span class="grey">\r\n</span>
<span class="grey">\r\n</span></span></code><p>
            <strong>Back-end (TE)</strong>
        </p><code class="code-scrollable"><span class="blue">POST / HTTP/1.1<span class="grey">\r\n</span>
Host: vulnerable-website.com<span class="grey">\r\n</span>
Content-Type: x-www-form-urlencoded<span class="grey">\r\n</span>
Content-Length: 61<span class="grey">\r\n</span>
Transfer-Encoding: chunked<span class="grey">\r\n</span>
<span class="grey">\r\n</span>
0<span class="grey">\r\n</span>
<span class="grey">\r\n</span></span>
<span class="orange">GET /anything HTTP/1.1<span class="grey">\r\n</span>
Host: vulnerable-website.com<span class="grey">\r\n</span>
<span class="grey">\r\n</span></span>
<span class="green">GET / HTTP/1.1<span class="grey">\r\n</span>
Host: vulnerable-website.com\r\n
<span class="grey">\r\n</span></span></code><p>
            Notice that no invalid requests are hitting the back-end, so the connection should remain open following the attack.
        </p><h3 id="desynchronizing-the-response-queue">Desynchronizing the response queue</h3><p>
            When you smuggle a complete request, the front-end server still thinks it only forwarded a single request. On the other hand, the back-end sees two distinct requests, and will send two responses accordingly:
        </p><img alt="Poisoning the response queue" src="/web-security/request-smuggling/advanced/images/response-queue-poisoning.jpg"><p>
            The front-end correctly maps the first response to the initial "wrapper" request and forwards this on to the client. As there are no further requests awaiting a response, the unexpected second response is held in a queue on the connection between the front-end and back-end.
        </p><p>
            When the front-end receives another request, it forwards this to the back-end as normal. However, when issuing the response, it will send the first one in the queue, that is, the leftover response to the smuggled request.
        </p><p>
            The correct response from the back-end is then left without a matching request. This cycle is repeated every time a new request is forwarded down the same connection to the back-end.
        </p><h3 id="stealing-other-users-responses">Stealing other users' responses</h3><p>
            Once the response queue is poisoned, the attacker can just send an arbitrary request to capture another user's response.
        </p><img alt="Stealing other users' responses via response queue poisoning" src="/web-security/request-smuggling/advanced/images/stealing-other-users-responses.jpg"><p>
            They have no control over which responses they receive as they will always be sent the next response in the queue i.e. the response to the previous user's request. In some cases, this will be of limited interest. However, using tools like Burp Intruder, an attacker can easily automate the process of reissuing the request. By doing so, they can quickly grab an assortment of responses intended for different users, at least some of which are likely to contain useful data.
        </p><p>
            An attacker can continue to steal responses like this for as long as the front-end/back-end connection remains open. Exactly when a connection is closed differs from server to server, but a common default is to terminate a connection after it has handled 100 requests. It's also trivial to repoison a new connection once the current one is closed.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span></span> Tip</h4></summary><div class="content"><p>
                To make it easier to differentiate stolen responses from responses to your own requests, try using a non-existent path in both of the requests that you send. That way, your own requests should consistently receive a 404 response, for example.
            </p></div></details></div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'B0BEDD0F5D815C54107D42A83E72DE7254AA354F2DD106E6F2D8E47679ED2F60'])@verbatim<div class="highlightedarea">
            <h4>Notes</h4>
            <p>
                This attack is possible both via classic HTTP/1 request smuggling and by exploiting HTTP/2 downgrading.
            </p>
        </div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
