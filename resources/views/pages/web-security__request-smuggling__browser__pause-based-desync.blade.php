@extends('layouts.academy')

@section('title', 'Pause-based desync attacks | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling"><span itemprop="name">Request smuggling</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/browser"><span itemprop="name">Browser-powered</span></a><meta itemprop="position" content="3" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/browser/pause-based-desync"><span itemprop="name">Pause-based desync attacks</span></a><meta itemprop="position" content="4" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Pause-based desync attacks</h1><p>
            Seemingly secure websites may contain hidden desync vulnerabilities that only reveal themselves if you pause mid-request.
        </p><p>
            Servers are commonly configured with a read timeout. If they don't receive any more data for a certain amount of time, they treat the request as complete and issue a response, regardless of how many bytes they were told to expect. Pause-based desync vulnerabilities can occur when a server times out a request but leaves the connection open for reuse. Given the right conditions, this behavior can provide an alternative vector for both server-side and client-side desync attacks.
        </p><div class="highlightedarea">
            <h4>SecDevLab Research</h4>
            <p>
                The materials and labs in this section are based on <a href="https://portswigger.net/research/browser-powered-desync-attacks">Browser-Powered Desync Attacks: A New Frontier in HTTP Request Smuggling</a> by SecDevLab Research.
            </p>
        </div><h2 id="server-side-pause-based-desync">Server-side pause-based desync</h2><p>
            You can potentially use the pause-based technique to elicit <a href="/web-security/request-smuggling/browser/cl-0">CL.0</a>-like behavior, allowing you to construct server-side request smuggling exploits for websites that may initially appear secure.
        </p><p>
            This is dependent on the following conditions:
        </p><ul>
            <li>
                <p>
                    The front-end server must immediately forward each byte of the request to the back-end rather than waiting until it has received the full request.
                </p>
            </li>
            <li>
                <p>
                    The front-end server must not (or can be encouraged not to) time out requests before the back-end server.
                </p>
            </li>
            <li>
                <p>
                    The back-end server must leave the connection open for reuse following a read timeout.
                </p>
            </li>
        </ul><p>
            To demonstrate how this technique works, let's walk through an example. The following is a standard <a href="/web-security/request-smuggling/browser/cl-0">CL.0 request smuggling</a> probe:
        </p><code class="code-scrollable">POST /example HTTP/1.1
Host: vulnerable-website.com
Connection: keep-alive
Content-Type: application/x-www-form-urlencoded
Content-Length: 34

GET /hopefully404 HTTP/1.1
Foo: x</code><p>
            Consider what happens if we send the headers to a vulnerable website, but pause before sending the body.
        </p><ol>
            <li>
                <p>
                    The front-end forwards the headers to the back-end, then continues to wait for the remaining bytes promised by the <code>Content-Length</code> header.
                </p>
            </li>
            <li>
                <p>
                    After a while, the back-end times out and sends a response, even though it has only consumed part of the request. At this point, the front-end may or may not read in this response and forward it to us.
                </p>
            </li>
            <li>
                <p>
                    We finally send the body, which contains a basic request smuggling prefix in this case.
                </p>
            </li>
            <li>
                <p>
                    The front-end server treats this as a continuation of the initial request and forwards this to the back-end down the same connection.
                </p>
            </li>
            <li>
                <p>
                    The back-end server has already responded to the initial request, so assumes that these bytes are the start of another request.
                </p>
            </li>
        </ol><p>
            At this point, we have effectively achieved a CL.0 desync, poisoning the front-end/back-end connection with a request prefix.
        </p><p>
            We've found that servers are more likely to be vulnerable when they generate a response themselves rather than passing the request to the application.
        </p><div class="highlightedarea">
            <h4>SecDevLab Research</h4>
            <p>
                Our research team discovered this vulnerability on the widely used Apache HTTP Server, which exhibited this behavior when performing server-level redirects from <code>/example</code> to <code>/example/</code>. We reported this issue and it has been fixed in version 2.4.53, so make sure to update if you haven't already. For more details, check out <a href="https://portswigger.net/research/browser-powered-desync-attacks#pause">Browser-Powered Desync Attacks: A New Frontier in HTTP Request Smuggling</a> by SecDevLab Research.
            </p>
        </div><h3 id="testing-for-pause-based-cl-0-vulnerabilities">Testing for pause-based CL.0 vulnerabilities</h3><p>
            It's possible to test for pause-based CL.0 vulnerabilities using Burp Repeater, but only if the front-end server forwards the back-end's post-timeout response to you the moment it's generated, which isn't always the case. We recommend using the <a href="https://portswigger.net/bappstore/9abaa233088242e8be252cd4ff534988">Turbo Intruder</a> extension as it lets you pause mid-request then resume regardless of whether you've received a response.
        </p><ol>
            <li>
                <p>
                    In Burp Repeater, create a CL.0 request smuggling probe like we used in the example above, then send it to Turbo Intruder.
                </p>
                <code class="code-scrollable">POST /example HTTP/1.1
Host: vulnerable-website.com
Connection: keep-alive
Content-Type: application/x-www-form-urlencoded
Content-Length: 34

GET /hopefully404 HTTP/1.1
Foo: x</code>
            </li>
            <li>
                <p>
                    In Turbo Intruder's Python editor panel, adjust the request engine configuration to set the following options:
                </p>
                <code class="code-scrollable">concurrentConnections=1
requestsPerConnection=100
pipeline=False</code>
            </li>
            <li>
                <p>
                    Queue the request, adding the following arguments to the <code>queue()</code> interface:
                </p>
                <ul>
                    <li>
                        <code>pauseMarker</code> - A list of strings after which you want Turbo Intruder to pause.
                    </li>
                    <li>
                        <code>pauseTime</code> - The duration of the pause in milliseconds.
                    </li>
                </ul>
                <p>
                    For example, to pause after the headers for 60 seconds, queue the request as follows:
                </p>
                <code class="code-scrollable">engine.queue(target.req, pauseMarker=['\r\n\r\n'], pauseTime=60000)</code>
            </li>
            <li>
                <p>
                    Queue an arbitrary follow-up request as normal:
                </p>
                <code class="code-scrollable">followUp = 'GET / HTTP/1.1\r\nHost: vulnerable-website.com\r\n\r\n'
engine.queue(followUp)</code>
            </li>
            <li>
                <p>
                    Ensure that you're logging all responses to the results table:
                </p>
                <code class="code-scrollable">def handleResponse(req, interesting):
    table.add(req)</code>
            </li>
        </ol><p>
            When you first start the attack, you won't see any results in the table. However, after the specified pause duration, you should see two results. If the response to the second request matches what you expected from the smuggled prefix (in this case a 404), this strongly suggests that the desync was successful.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '15658AD1D00CCC9B99C99507C53DD7EC3472C9A0102AD3894E6C713F472630C8'])@verbatim<div class="highlightedarea">
            <h4>Note</h4>
            <p>
                Instead of using <code>pauseMarker</code> to specify a pause based on string matching, you can use the <code>pauseBefore</code> argument to specify an offset. For example, you could pause before the body by specifying an offset that's the inverse of the <code>Content-Length</code> (<code>pauseBefore=-34</code>).
            </p>
        </div><h2 id="client-side-pause-based-desync">Client-side pause-based desync</h2><p>
            In theory, it may be possible to perform a client-side variation of the pause-based CL.0 desync. Unfortunately, we haven't yet found a reliable way to make a browser pause mid-request. However, there is one possible workaround - an active MITM attack.
        </p><p>
            The encryption provided by TLS may prevent a MITM from reading traffic in-flight, but there's nothing to stop them from delaying the TCP packets on their way from the browser to the web server. By simply delaying the final packet until the web server issues a response, you may be able to desync the browser's connection.
        </p><p>
            The flow of this attack is similar to any other client-side desync attack. The user visits a malicious website, which causes their browser to issue a series of cross-domain requests to the target site. In this case, you need to deliberately pad the first request so that the operating system splits it into multiple TCP packets. As you control the padding, you can pad the request until the final packet has a distinct size so you can work out which one to delay.
        </p><p>
            For an example of how this might look in practice, see <a href="https://portswigger.net/research/browser-powered-desync-attacks#mitm">Browser-Powered Desync Attacks: A New Frontier in HTTP Request Smuggling</a>.
        </p><h2 id="how-to-prevent-pause-based-desync-vulnerabilities">How to prevent pause-based desync vulnerabilities</h2><p>
            For some high-level measures you can take to prevent pause-based desync vulnerabilities, and other forms of desync attack, see <a href="/web-security/request-smuggling#how-to-prevent-http-request-smuggling-vulnerabilities">How to prevent HTTP request smuggling vulnerabilities</a>.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
