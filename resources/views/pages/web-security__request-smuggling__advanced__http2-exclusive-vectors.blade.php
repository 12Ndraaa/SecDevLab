@extends('layouts.academy')

@section('title', 'HTTP/2-exclusive vectors | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling"><span itemprop="name">Request smuggling</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/advanced"><span itemprop="name">Advanced</span></a><meta itemprop="position" content="3" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/advanced/http2-exclusive-vectors"><span itemprop="name">HTTP/2-exclusive vectors</span></a><meta itemprop="position" content="4" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">HTTP/2-exclusive vectors</h1><p>
            Due to the fact that HTTP/2 is a binary protocol rather than text-based, there are a number of potential vectors that are impossible to construct in HTTP/1 due to the limitations of its syntax.
        </p><p>
            We've already seen how you can <a href="/web-security/request-smuggling/advanced#request-smuggling-via-crlf-injection">inject CRLF sequences into a header value</a>. In this section, we'll give you an idea of some of the other HTTP/2-exclusive vectors you can use to inject payloads. Although these kinds of requests are officially prohibited by the HTTP/2 specification, some servers fail to validate and block them effectively.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                It's only possible to perform these attacks using the <a href="/web-security/all-labs">specialized HTTP/2 features</a> in Burp's Inspector panel.
            </p>
        </div><h2 id="injecting-via-header-names">Injecting via header names</h2><p>
            In HTTP/1, it's not possible for a header name to contain a colon because this character is used to indicate the end of the name to parsers. This is not the case in HTTP/2.
        </p><p>
            By combining colons with <code>\r\n</code> characters, you may be able to use an HTTP/2 header's name field to sneak other headers past front-end filters. These will then be interpreted as separate headers on the back-end once the request is rewritten using HTTP/1 syntax:
        </p><p>
            <strong>Front-end (HTTP/2)</strong>
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">foo: bar<span class="grey">\r\n</span>Transfer-Encoding: chunked<span class="grey">\r\n</span>X:</td>
                    <td class="tg-http2value">ignore</td>
                </tr>
                </tbody>
            </table>
        </div><p>
            <strong>Back-end (HTTP/1)</strong>
        </p><code class="code-scrollable">Foo: bar<span class="grey">\r\n</span>
Transfer-Encoding: chunked<span class="grey">\r\n</span>
X: ignore<span class="grey">\r\n</span></code><h2 id="injecting-via-pseudo-headers">Injecting via pseudo-headers</h2><p>
            HTTP/2 doesn't use a request line or status line. Instead, this data is passed via a series of "pseudo-headers" on the front of the request. In text-based representations of HTTP/2 messages, these are commonly prefixed with a colon to help differentiate them from normal headers. There five pseudo-headers in total:
        </p><ul>
            <li>
                <p>
                    <code>:method</code> - The request method.
                </p>
            </li>
            <li>
                <p>
                    <code>:path</code> - The request path. Note that this includes the query string.
                </p>
            </li>
            <li>
                <p>
                    <code>:authority</code> - Roughly equivalent to the HTTP/1 <code>Host</code> header.
                </p>
            </li>
            <li>
                <p>
                    <code>:scheme</code> - The request scheme, typically <code>http</code> or <code>https</code>.
                </p>
            </li>
            <li>
                <p>
                    <code>:status</code> - The response status code (not used in requests).
                </p>
            </li>
        </ul><p>
            When websites downgrade requests to HTTP/1, they use the values of some of these pseudo-headers to dynamically construct the request line. This enables some interesting new ways of constructing attacks.
        </p><h3 id="supplying-an-ambiguous-host">Supplying an ambiguous host</h3><p>
            Although the HTTP/1 <code>Host</code> header is effectively replaced by the <code>:authority</code> pseudo-header in HTTP/2, you're still allowed to send a <code>host</code> header in the request as well.
        </p><p>
            In some cases, this may result in two <code>Host</code> headers occurring in the rewritten HTTP/1 request, which opens up another possibility for bypassing front-end "duplicate <code>Host</code> header" filters, for example. This potentially makes the site vulnerable to a range of <a href="/web-security/host-header"><code>Host</code> header attacks</a> to which it may otherwise have been immune.
        </p><h3 id="supplying-an-ambiguous-path">Supplying an ambiguous path</h3><p>
            Trying to send a request with an ambiguous path is not possible in HTTP/1 due to how the request line is parsed. But as the path in HTTP/2 is specified using a pseudo-header, it's now possible to send a request with two distinct paths as follows:
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">POST</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:path</td>
                    <td class="tg-http2value">/anything</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:path</td>
                    <td class="tg-http2value">/admin</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:authority</td>
                    <td class="tg-http2value">vulnerable-website.com</td>
                </tr>
                </tbody>
            </table>
        </div><p>
            If there is a discrepancy between which path is validated by the website's access controls and which path is used to route the request, this may enable you to access endpoints that would otherwise be off limits.
        </p><h3 id="injecting-a-full-request-line">Injecting a full request line</h3><p>
            During downgrading, the value of the <code>:method</code> pseudo-header will be written to the very beginning of the resulting HTTP/1 request. If the server allows you to include spaces in the <code>:method</code> value, you may be able to inject an entirely different request line as follows:
        </p><p>
            <strong>Front-end (HTTP/2)</strong>
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">GET /admin HTTP/1.1</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:path</td>
                    <td class="tg-http2value">/anything</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:authority</td>
                    <td class="tg-http2value">vulnerable-website.com</td>
                </tr>
                </tbody>
            </table>
        </div><p>
            <strong>Back-end (HTTP/1)</strong>
        </p><code class="code-scrollable">GET /admin HTTP/1.1 /anything HTTP/1.1
Host: vulnerable-website.com</code><p>
            As long as the server also tolerates the arbitrary trailing characters in the request line, this provides another means of creating a request with an ambiguous path.
        </p><h3 id="injecting-a-url-prefix">Injecting a URL prefix</h3><p>
            Another interesting feature of HTTP/2 is the ability to explicitly specify a scheme in the request itself using the <code>:scheme</code> pseudo-header. Although this will ordinarily just contain <code>http</code> or <code>https</code>, you may be able to include arbitrary values.
        </p><p>
            This can be useful when the server uses the <code>:scheme</code> header to dynamically generate a URL, for example. In this case, you could add a prefix to the URL or even override it completely by pushing the real URL into the query string:
        </p><p>
            <strong>Request</strong>
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">GET</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:path</td>
                    <td class="tg-http2value">/anything</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:authority</td>
                    <td class="tg-http2value">vulnerable-website.com</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:scheme</td>
                    <td class="tg-http2value">https://evil-user.net/poison?</td>
                </tr>
                </tbody>
            </table>
        </div><p>
            <strong>Response</strong>
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:status</td>
                    <td class="tg-http2value">301</td>
                </tr>
                <tr>
                    <td class="tg-http2name">location</td>
                    <td class="tg-http2value">https://evil-user.net/poison?://vulnerable-website.com/anything/</td>
                </tr>
                </tbody>
            </table>
        </div><h3 id="injecting-newlines-into-pseudo-headers">Injecting newlines into pseudo-headers</h3><p>
            When injecting into the <code>:path</code> or <code>:method</code> pseudo-headers, you need to make sure that the resulting HTTP/1 request still has a valid request line.
        </p><p>
            As the <code>\r\n</code> terminates the request line in HTTP/1, simply adding <code>\r\n</code> part way through will just break the request. After downgrading, the rewritten request must contain the following sequence prior to the first <code>\r\n</code> that you inject:
        </p><code class="code-scrollable">&lt;method&gt; + space + &lt;path&gt; + space + HTTP/1.1</code><p>
            Just visualize where your injection falls within this sequence and include all of the remaining parts accordingly. For example, when injecting into the <code>:path</code>, you need to add a space and <code>HTTP/1.1</code> before the <code>\r\n</code> as follows:
        </p><p>
            <strong>Front-end (HTTP/2)</strong>
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">GET</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:path</td>
                    <td class="tg-http2value"><p class="pre-wrap">/example HTTP/1.1<span class="grey">\r\n</span>
Transfer-Encoding: chunked<span class="grey">\r\n</span>
X: x</p>
                    </td>
                </tr>
                <tr>
                    <td class="tg-http2name">:authority</td>
                    <td class="tg-http2value">vulnerable-website.com</td>
                </tr>
                </tbody>
            </table>
        </div><p>
            <strong>Back-end (HTTP/1)</strong>
        </p><code class="code-scrollable">GET /example HTTP/1.1<span class="grey">\r\n</span>
Transfer-Encoding: chunked<span class="grey">\r\n</span>
X: x HTTP/1.1<span class="grey">\r\n</span>
Host: vulnerable-website.com<span class="grey">\r\n</span>
<span class="grey">\r\n</span></code><p>
            Notice that in this case, we've also added an arbitrary trailing header to catch the space and protocol that were added automatically during rewriting.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
