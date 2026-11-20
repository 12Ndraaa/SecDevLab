@extends('layouts.academy')

@section('title', 'Finding HTTP request smuggling vulnerabilities | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling"><span itemprop="name">Request smuggling</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/finding"><span itemprop="name">Finding</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Finding HTTP request smuggling vulnerabilities</h1><p>
            In this section, we'll explain different techniques for finding HTTP request smuggling vulnerabilities.
        </p><h2 id="finding-http-request-smuggling-vulnerabilities-using-timing-techniques">Finding HTTP request smuggling vulnerabilities using timing techniques</h2><p>
            The most generally effective way to detect HTTP request smuggling vulnerabilities is to send requests that will cause a time delay in the application's responses if a vulnerability is present. This technique is used by Burp Scanner to automate the detection of request smuggling vulnerabilities.
        </p><h3 id="finding-cl-te-vulnerabilities-using-timing-techniques">Finding CL.TE vulnerabilities using timing techniques</h3><p>
            If an application is vulnerable to the CL.TE variant of request smuggling, then sending a request like the following will often cause a time delay:
        </p><code class="code-scrollable"><span class="blue">POST / HTTP/1.1
Host: vulnerable-website.com
Transfer-Encoding: chunked
Content-Length: 4

1
A</span>
<span class="orange">X</span></code><p>
            Since the front-end server uses the <code>Content-Length</code> header, it will forward only part of this request, omitting the <code>X</code>. The back-end server uses the <code>Transfer-Encoding</code> header, processes the first chunk, and then waits for the next chunk to arrive. This will cause an observable time delay.
        </p><h3 id="finding-te-cl-vulnerabilities-using-timing-techniques">Finding TE.CL vulnerabilities using timing techniques</h3><p>
            If an application is vulnerable to the TE.CL variant of request smuggling, then sending a request like the following will often cause a time delay:
        </p><code class="code-scrollable"><span class="blue">POST / HTTP/1.1
Host: vulnerable-website.com
Transfer-Encoding: chunked
Content-Length: 6

0</span>

<span class="orange">X</span></code><p>
            Since the front-end server uses the <code>Transfer-Encoding</code> header, it will forward only part of this request, omitting the <code>X</code>. The back-end server uses the <code>Content-Length</code> header, expects more content in the message body, and waits for the remaining content to arrive. This will cause an observable time delay.
        </p><div class="highlightedarea"> 
     <h4>Note</h4> 
     <p>The timing-based test for TE.CL vulnerabilities will potentially disrupt other application users if the application is vulnerable to the CL.TE variant of the vulnerability. So to be stealthy and minimize disruption, you should use the CL.TE test first and continue to the TE.CL test only if the first test is unsuccessful.</p> 
    </div><h2 id="confirming-http-request-smuggling-vulnerabilities-using-differential-responses">Confirming HTTP request smuggling vulnerabilities using differential responses</h2><p>
            When a probable request smuggling vulnerability has been detected, you can obtain further evidence for the vulnerability by exploiting it to trigger differences in the contents of the application's responses. This involves sending two requests to the application in quick succession:
        </p><ul>
            <li>
                An "attack" request that is designed to interfere with the processing of the next request.
            </li>
            <li>
                A "normal" request.
            </li>
        </ul><p>
            If the response to the normal request contains the expected interference, then the vulnerability is confirmed.
        </p><p>
            For example, suppose the normal request looks like this:
        </p><code class="code-scrollable">POST /search HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 11

q=smuggling</code><p>
            This request normally receives an HTTP response with status code 200, containing some search results.
        </p><p>
            The attack request that is needed to interfere with this request depends on the variant of request smuggling that is present: CL.TE vs TE.CL.
        </p><h3 id="confirming-cl-te-vulnerabilities-using-differential-responses">Confirming CL.TE vulnerabilities using differential responses</h3><p>
            To confirm a CL.TE vulnerability, you would send an attack request like this:
        </p><code class="code-scrollable"><span class="blue">POST /search HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 49
Transfer-Encoding: chunked

e
q=smuggling&amp;x=
0

</span><span class="orange">GET /404 HTTP/1.1
Foo: x</span></code><p>
            If the attack is successful, then the last two lines of this request are treated by the back-end server as belonging to the next request that is received. This will cause the subsequent "normal" request to look like this:
        </p><code class="code-scrollable"><span class="orange">GET /404 HTTP/1.1
Foo: x</span><span class="green">POST /search HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 11

q=smuggling</span></code><p>
            Since this request now contains an invalid URL, the server will respond with status code 404, indicating that the attack request did indeed interfere with it.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '15F066DF40DD7D208E9874AF7DBA51AC602D94871F25CCD02692A793EBFFE91F'])@verbatim<h3 id="confirming-te-cl-vulnerabilities-using-differential-responses">Confirming TE.CL vulnerabilities using differential responses</h3><p>
            To confirm a TE.CL vulnerability, you would send an attack request like this:
        </p><code class="code-scrollable"><span class="blue">POST /search HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 4
Transfer-Encoding: chunked

7b</span>
<span class="orange">GET /404 HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 144

x=
0</span></code><div class="highlightedarea"> 
     <h4>Note</h4> 
                <p>
                    To send this request using Burp Repeater, you will first need to go to the Repeater menu and ensure that the "Update Content-Length" option is unchecked.
                </p>
        <p>
            You need to include the trailing sequence <code>\r\n\r\n</code> following the final <code>0</code>.
        </p>
    </div><p>
            If the attack is successful, then everything from <code>GET /404</code> onwards is treated by the back-end server as belonging to the next request that is received. This will cause the subsequent "normal" request to look like this:
        </p><code class="code-scrollable"><span class="orange">GET /404 HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 144

x=
0

</span><span class="green">POST /search HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 11

q=smuggling</span></code><p>
            Since this request now contains an invalid URL, the server will respond with status code 404, indicating that the attack request did indeed interfere with it.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'FE9AB531836F0124048451639920EB523E4374DF7D3E1F492DC1985048ADEAE9'])@verbatim<div class="highlightedarea"> 
     <h4>Note</h4> 
        <p>
            Some important considerations should be kept in mind when attempting to confirm request smuggling vulnerabilities via interference with other requests:
        </p>
        <ul>
            <li>
                The "attack" request and the "normal" request should be sent to the server using different network connections. Sending both requests through the same connection won't prove that the vulnerability exists.
            </li>
            <li>
                The "attack" request and the "normal" request should use the same URL and parameter names, as far as possible. This is because many modern applications route front-end requests to different back-end servers based on the URL and parameters. Using the same URL and parameters increases the chance that the requests will be processed by the same back-end server, which is essential for the attack to work.
            </li>
            <li>
                When testing the "normal" request to detect any interference from the "attack" request, you are in a race with any other requests that the application is receiving at the same time, including those from other users. You should send the "normal" request immediately after the "attack" request. If the application is busy, you might need to perform multiple attempts to confirm the vulnerability.
            </li>
            <li>
                In some applications, the front-end server functions as a load balancer, and forwards requests to different back-end systems according to some load balancing algorithm. If your "attack" and "normal" requests are forwarded to different back-end systems, then the attack will fail. This is an additional reason why you might need to try several times before a vulnerability can be confirmed.
            </li>
            <li>
                If your attack succeeds in interfering with a subsequent request, but this wasn't the "normal" request that you sent to detect the interference, then this means that another application user was affected by your attack. If you continue performing the test, this could have a disruptive effect on other users, and you should exercise caution.
            </li>
        </ul>
		</div><div class="highlightedarea"> 
     <h4>Read more</h4> 
			
    <ul><li><a href="/web-security/request-smuggling/exploiting">Exploiting HTTP request smuggling vulnerabilities</a></li></ul></div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
