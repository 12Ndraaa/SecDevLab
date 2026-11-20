@extends('layouts.academy')

@section('title', 'HTTP request tunnelling | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling"><span itemprop="name">Request smuggling</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/advanced"><span itemprop="name">Advanced</span></a><meta itemprop="position" content="3" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/advanced/request-tunnelling"><span itemprop="name">Request tunnelling</span></a><meta itemprop="position" content="4" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">HTTP request tunnelling</h1><p>
            Many of the request smuggling attacks we've covered are only possible because the same connection between the front-end and back-end handles multiple requests. Although some servers will reuse the connection for any requests, others have stricter  policies.
        </p><p>
            For example, some servers only allow requests originating from the same IP address or the same client to reuse the connection. Others won't reuse the connection at all, which limits what you can achieve through classic request smuggling as you have no obvious way to influence other users' traffic.
        </p><img alt="No connection reuse between the front-end and back-end" src="/web-security/request-smuggling/advanced/images/no-connection-reuse.png"><p>
            Although you can't poison the socket to interfere with other users' requests, you can still send a single request that will elicit two responses from the back-end. This potentially enables you to hide a request and its matching response from the front-end altogether.
        </p><img alt="HTTP request tunnelling" src="/web-security/request-smuggling/advanced/images/http-request-tunnelling.jpg"><p>
            You can use this technique to bypass front-end security measures that may otherwise prevent you from sending certain requests. In fact, even some mechanisms designed specifically to prevent request smuggling attacks fail to stop request tunnelling.
        </p><p>
            Tunneling requests to the back-end in this way offers a more limited form of request smuggling, but it can still lead to high-severity exploits in the right hands.
        </p><h2 id="request-tunnelling-with-http-2">Request tunnelling with HTTP/2</h2><p>
            Request tunnelling is possible with both HTTP/1 and HTTP/2 but is considerably more difficult to detect in HTTP/1-only environments. Due to the way persistent (<code>keep-alive</code>) connections work in HTTP/1, even if you do receive two responses, this doesn't necessarily confirm that the request was successfully smuggled.
        </p><p>
            In HTTP/2 on the other hand, each "stream" should only ever contain a single request and response. If you receive an HTTP/2 response with what appears to be an HTTP/1 response in the body, you can be confident that you've successfully tunneled a second request.
        </p><h2 id="leaking-internal-headers-via-http-2-request-tunnelling">Leaking internal headers via HTTP/2 request tunnelling</h2><p>
            When request tunnelling is your only option, you won't be able to leak internal headers using the technique we covered in <a href="/web-security/request-smuggling/exploiting/lab-reveal-front-end-request-rewriting">one of our earlier labs</a>, but HTTP/2 downgrading enables an alternative solution.
        </p><p>
            You can potentially trick the front-end into appending the internal headers inside what will become a body parameter on the back-end. Let's say we send a request that looks something like this:
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">POST</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:path</td>
                    <td class="tg-http2value">/comment</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:authority</td>
                    <td class="tg-http2value">vulnerable-website.com</td>
                </tr>
                <tr>
                    <td class="tg-http2name">content-type</td>
                    <td class="tg-http2value">application/x-www-form-urlencoded</td>
                </tr>
                <tr>
                    <td class="tg-http2name">foo</td>
                    <td class="tg-http2value"><p class="pre-wrap">bar<span class="grey">\r\n</span>
Content-Length: 200<span class="grey">\r\n</span>
<span class="grey">\r\n</span>
comment=</p></td>
                </tr>
                <tr>
                    <td class="tg-http2response" colspan="2">
                        x=1
                    </td>
                </tr>
                </tbody>
            </table>
        </div><p>
            In this case, both the front-end and back-end agree that there is only one request. What's interesting is that they can be made to disagree on where the headers end.
        </p><p>
            The front-end sees everything we've injected as part of a header, so adds any new headers after the trailing <code>comment=</code> string. On the other hand, the back-end sees the <code>\r\n\r\n</code> sequence and thinks this is the end of the headers. The <code>comment=</code> string, along with the internal headers, are treated as part of the body. The result is a <code>comment</code> parameter with the internal headers as its value.
        </p><code class="code-scrollable">POST /comment HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 200

comment=X-Internal-Header: secretContent-Length: 3
x=1</code><h2 id="blind-request-tunnelling">Blind request tunnelling</h2><p>
            Some front-end servers read in all the data they receive from the back-end. This means that if you successfully tunnel a request, they will potentially forward both responses to the client, with the response to the tunnelled request nested inside the body of the main response.
        </p><p>
            Other front-end servers only read in the number of bytes specified in the <code>Content-Length</code> header of the response, so only the first response is forwarded to the client. This results in a blind request tunnelling vulnerability because you won't be able to see the response to your tunnelled request.
        </p><h2 id="non-blind-request-tunnelling-using-head">Non-blind request tunnelling using HEAD</h2><p>
            Blind request tunnelling can be tricky to exploit, but you can occasionally make these vulnerabilities non-blind by using <code>HEAD</code> requests.
        </p><p>
            Responses to <code>HEAD</code> requests often contain a <code>content-length</code> header even though they don't have a body of their own. This normally refers to the length of the resource that would be returned by a <code>GET</code> request to the same endpoint. Some front-end servers fail to account for this and attempt to read in the number of bytes specified in the header regardless. If you successfully tunnel a request past a front-end server that does this, this behavior may cause it to over-read the response from the back-end. As a result, the response you receive may contain bytes from the start of the response to your tunnelled request.
        </p><p>
            <strong>Request</strong>
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">HEAD</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:path</td>
                    <td class="tg-http2value">/example</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:authority</td>
                    <td class="tg-http2value">vulnerable-website.com</td>
                </tr>
                <tr>
                    <td class="tg-http2name">foo</td>
                    <td class="tg-http2value"><p class="pre-wrap">bar<span class="grey">\r\n</span>
<span class="grey">\r\n</span>
GET /tunnelled HTTP/1.1<span class="grey">\r\n</span>
Host: vulnerable-website.com<span class="grey">\r\n</span>
X: x</p>
                    </td>
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
                    <td class="tg-http2value">200</td>
                </tr>
                <tr>
                    <td class="tg-http2name">content-type</td>
                    <td class="tg-http2value">text/html</td>
                </tr>
                <tr>
                    <td class="tg-http2name">content-length</td>
                    <td class="tg-http2value">131</td>
                </tr>
                <tr>
                    <td class="tg-http2response" colspan="2"><p class="pre-wrap">HTTP/1.1 200 OK
Content-Type: text/html
Content-Length: 4286

&lt;!DOCTYPE html&gt;
&lt;h1&gt;Tunnelled&lt;/h1&gt;
&lt;p&gt;This is a tunnelled respo</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><p>
            As you're effectively mixing the <code>content-length</code> header from one response with the body of another, using this technique successfully is a bit of a balancing act.
        </p><p>
            If the endpoint to which you send your <code>HEAD</code> request returns a resource that is shorter than the tunnelled response you're trying to read, it may be truncated before you can see anything interesting, as in the example above. On the other hand, if the returned <code>content-length</code> is longer than the response to your tunnelled request, you will likely encounter a timeout as the front-end server is left waiting for additional bytes to arrive from the back-end.
        </p><p>
            Fortunately, with a bit of trial and error, you can often overcome these issues using one of the following solutions:
        </p><ul>
            <li>
                <p>
                    Point your <code>HEAD</code> request to a different endpoint that returns a longer or shorter resource as required.
                </p>
            </li>
            <li>
                <p>
                    If the resource is too short, use a reflected input in the main <code>HEAD</code> request to inject arbitrary padding characters. Even though you won't actually see your input being reflected, the returned <code>content-length</code> will still increase accordingly.
                </p>
            </li>
            <li>
                <p>
                    If the resource is too long, use a reflected input in the tunnelled request to inject arbitrary characters so that the length of the tunnelled response matches or exceeds the length of the expected content.
                </p>
            </li>
        </ul>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '2C96A65B32A69545E9A98AF5520A14BD4B397C70DD6B643C34C46352310B2F9B'])@verbatim<h2 id="web-cache-poisoning-via-http-2-request-tunnelling">Web cache poisoning via HTTP/2 request tunnelling</h2><p>
            Even though request tunnelling is generally more limited than classic request smuggling, you can sometimes still construct high-severity attacks. For example, you may be able to combine the request tunnelling techniques we've looked at so far for an extra-powerful form of web cache poisoning.
        </p><p>
            With non-blind request tunnelling, you can effectively mix and match the headers from one response with the body of another. If the response in the body reflects unencoded user input, you may be able to leverage this behavior for reflected XSS in contexts where the browser would not normally execute the code.
        </p><p>
            For example, the following response contains unencoded, attacker-controllable input:
        </p><code class="code-scrollable">HTTP/1.1 200 OK
Content-Type: application/json

{ "name" : "test&lt;script&gt;alert(1)&lt;/script&gt;" }
[etc.]</code><p>
            By itself, this is relatively harmless. The <code>Content-Type</code> means that this payload will simply be interpreted as JSON by the browser. But consider what would happen if you tunnel the request to the back-end instead. This response would appear inside the body of a different response, effectively inheriting its headers, including the <code>content-type</code>.
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:status</td>
                    <td class="tg-http2value">200</td>
                </tr>
                <tr>
                    <td class="tg-http2name">content-type</td>
                    <td class="tg-http2value">text/html</td>
                </tr>
                <tr>
                    <td class="tg-http2name">content-length</td>
                    <td class="tg-http2value">174</td>
                </tr>
                <tr>
                    <td class="tg-http2response" colspan="2"><p class="pre-wrap">HTTP/1.1 200 OK
Content-Type: application/json

{ "name" : "test&lt;script&gt;alert(1)&lt;/script&gt;" }
[etc.]</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><p>
            As caching takes place on the front-end, caches can also be tricked into serving these mixed responses to other users.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '97E46BF5F67DA1E25EF00C1A6414642112874BA9122DC3608C709510DEFCE4F1'])@verbatim
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
