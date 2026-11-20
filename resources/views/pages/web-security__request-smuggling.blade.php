@extends('layouts.academy')

@section('title', 'What is HTTP request smuggling? Tutorial & Examples | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling"><span itemprop="name">Request smuggling</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">HTTP request smuggling</h1><p>
            In this section, we'll explain HTTP request smuggling attacks and describe how common request smuggling vulnerabilities can arise.
        </p><img alt="HTTP request smuggling" src="/web-security/images/http-request-smuggling.svg"><div class="highlightedarea">
            <h4>Labs</h4>
            <p>
                If you're already familiar with HTTP request smuggling and just want to practice on a series of deliberately vulnerable sites, check out the link below for an overview of all labs in this topic.
            </p>
            
        <ul><li><a href="/web-security/all-labs#http-request-smuggling">View all HTTP request smuggling labs</a></li></ul></div><h2 id="what-is-http-request-smuggling">What is HTTP request smuggling?</h2><p>
            HTTP request smuggling is a technique for interfering with the way a web site processes sequences of HTTP requests that are received from
            one or more users. Request smuggling vulnerabilities are often critical in nature, allowing an attacker to bypass security controls, gain
            unauthorized access to sensitive data, and directly compromise other application users.
        </p><p>
            Request smuggling is primarily associated with HTTP/1 requests. However, websites that support HTTP/2 may be vulnerable, depending on their back-end architecture.
        </p><div class="highlightedarea">
            <h4>SecDevLab Research</h4>
            <p>
                HTTP request smuggling was first documented in 2005, and repopularized by SecDevLab's extensive research on the topic. For details, check out the following whitepapers:
            </p>
            <ul>
                <li><a href="/research/http-desync-attacks-request-smuggling-reborn">HTTP desync attacks: Request smuggling reborn</a></li>
                <li><a href="/research/http2">HTTP/2: The sequel is always worse</a></li>
                <li><a href="/research/browser-powered-desync-attacks">Browser-powered desync attacks: A new frontier in HTTP request smuggling</a></li>
            </ul>
        </div><h2 id="what-happens-in-an-http-request-smuggling-attack">What happens in an HTTP request smuggling attack?</h2><p>
            Today's web applications frequently employ chains of HTTP servers between users and the ultimate application logic. Users send requests to
            a front-end server (sometimes called a load balancer or reverse proxy) and this server forwards requests to one or more back-end servers.
            This type of architecture is increasingly common, and in some cases unavoidable, in modern cloud-based applications.
        </p><p>
            When the front-end server forwards HTTP requests to a back-end server, it typically sends several requests over the same back-end network
            connection, because this is much more efficient and performant. The protocol is very simple; HTTP requests are sent one after another, and
            the receiving server has to determine where one request ends and the next one begins:
        </p><img alt="Forwarding HTTP requests to a back-end server" src="/web-security/images/forwarding-http-requests-to-back-end-server.svg"><p>
            In this situation, it is crucial that the front-end and back-end systems agree about the boundaries between requests. Otherwise, an
            attacker might be able to send an ambiguous request that gets interpreted differently by the front-end and back-end systems:
        </p><img alt="Smuggling an HTTP request to a back-end server" src="/web-security/images/smuggling-http-request-to-back-end-server.svg"><p>
            Here, the attacker causes part of their front-end request to be interpreted by the back-end server as the start of the next request. It is
            effectively prepended to the next request, and so can interfere with the way the application processes that request. This is a request
            smuggling attack, and it can have devastating results.
        </p><h2 id="how-do-http-request-smuggling-vulnerabilities-arise">How do HTTP request smuggling vulnerabilities arise?</h2><p>
            Most HTTP request smuggling vulnerabilities arise because the HTTP/1 specification provides two different ways to specify where a request
            ends: the <code>Content-Length</code> header and the <code>Transfer-Encoding</code> header.
        </p><p>
            The <code>Content-Length</code> header is straightforward: it specifies the length of the message body in bytes. For
            example:
        </p><code class="code-scrollable">POST /search HTTP/1.1
Host: normal-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 11

q=smuggling</code><p>
            The <code>Transfer-Encoding</code> header can be used to specify that the message body uses chunked encoding. This
            means that the message body contains one or more chunks of data. Each chunk consists of the chunk size in bytes (expressed in
            hexadecimal), followed by a newline, followed by the chunk contents. The message is terminated with a chunk of size zero. For example:
        </p><code class="code-scrollable">POST /search HTTP/1.1
Host: normal-website.com
Content-Type: application/x-www-form-urlencoded
Transfer-Encoding: chunked

b
q=smuggling
0
</code><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                Many security testers are unaware that chunked encoding can be used in HTTP requests, for two reasons:
            </p>
            <ul>
                <li>
                    Burp Suite automatically unpacks chunked encoding to make messages easier to view and edit.
                </li>
                <li>
                Browsers do not normally use chunked encoding in requests, and it is normally seen only in server responses.
                </li>
            </ul>
        </div><p>
            As the HTTP/1 specification provides two different methods for specifying the length of HTTP messages, it is possible for a single
            message to use both methods at once, such that they conflict with each other. The specification attempts to prevent this problem by
            stating that if both the <code>Content-Length</code> and <code>Transfer-Encoding</code> headers are
            present, then the <code>Content-Length</code> header should be ignored. This might be sufficient to avoid ambiguity
            when only a single server is in play, but not when two or more servers are chained together. In this situation, problems can arise for two
            reasons:
        </p><ul>
            <li>
                Some servers do not support the <code>Transfer-Encoding</code> header in requests.
            </li>
            <li>
                Some servers that do support the <code>Transfer-Encoding</code> header can be induced not to process it if the
                header is obfuscated in some way.
            </li>
        </ul><p>
            If the front-end and back-end servers behave differently in relation to the (possibly obfuscated) <code>Transfer-Encoding</code>
            header, then they might disagree about the boundaries between successive requests, leading to request smuggling vulnerabilities.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                Websites that use HTTP/2 end-to-end are inherently immune to request smuggling attacks. As the HTTP/2 specification introduces a single, robust mechanism for specifying the length of a request, there is no way for an attacker to introduce the required ambiguity.
            </p>
            <p>
                However, many websites have an HTTP/2-speaking front-end server, but deploy this in front of back-end infrastructure that only supports HTTP/1. This means that the front-end effectively has to translate the requests it receives into HTTP/1. This process is known as HTTP downgrading. For more information, see <a href="/web-security/request-smuggling/advanced">Advanced request smuggling</a>.
            </p>
        </div><h2 id="how-to-perform-an-http-request-smuggling-attack">How to perform an HTTP request smuggling attack</h2><p>
            Classic request smuggling attacks involve placing both the <code>Content-Length</code> header and the <code>Transfer-Encoding</code>
            header into a single HTTP/1 request and manipulating these so that the front-end and back-end servers process the request differently. The
            exact way in which this is done depends on the behavior of the two servers:
        </p><ul>
            <li>
                CL.TE: the front-end server uses the <code>Content-Length</code> header and the back-end server uses the <code>Transfer-Encoding</code> header.
            </li>
            <li>
                TE.CL: the front-end server uses the <code>Transfer-Encoding</code> header and the back-end server uses the <code>Content-Length</code> header.
            </li>
            <li>
                TE.TE: the front-end and back-end servers both support the <code>Transfer-Encoding</code> header, but one of the
                servers can be induced not to process it by obfuscating the header in some way.
            </li>
        </ul><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                These techniques are only possible using HTTP/1 requests. Browsers and other clients, including Burp, use HTTP/2 by default to communicate with servers that explicitly advertise support for it during the TLS handshake.
            </p>
            <p>
                As a result, when testing sites with HTTP/2 support, you need to manually switch protocols in Burp Repeater. You can do this from the <strong>Request attributes</strong> section of the <strong>Inspector</strong> panel.
            </p>
        </div><h3 id="cl-te-vulnerabilities">CL.TE vulnerabilities</h3><p>
            Here, the front-end server uses the <code>Content-Length</code> header and the back-end server uses the <code>Transfer-Encoding</code> header. We can perform a simple HTTP request smuggling attack as follows:
        </p><code class="code-scrollable"><span class="blue">POST / HTTP/1.1
Host: vulnerable-website.com
Content-Length: 13
Transfer-Encoding: chunked

0</span>

<span class="orange">SMUGGLED</span></code><p>
            The front-end server processes the <code>Content-Length</code> header and determines that the request body is 13 bytes
            long, up to the end of <code>SMUGGLED</code>. This request is forwarded on to the back-end server.
        </p><p>
            The back-end server processes the <code>Transfer-Encoding</code> header, and so treats the message body as using
            chunked encoding. It processes the first chunk, which is stated to be zero length, and so is treated as terminating the request. The
            following bytes, <code>SMUGGLED</code>, are left unprocessed, and the back-end server will treat these as being the
            start of the next request in the sequence.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'EBC97ABBE886E96FACC0AAEE856F55E2A45D4784F5D9025FFA5E994B7D8BC2BB'])@verbatim<h3 id="te-cl-vulnerabilities">TE.CL vulnerabilities</h3><p>
            Here, the front-end server uses the <code>Transfer-Encoding</code> header and the back-end server uses the <code>Content-Length</code> header. We can perform a simple HTTP request smuggling attack as follows:
        </p><code class="code-scrollable"><span class="blue">POST / HTTP/1.1
Host: vulnerable-website.com
Content-Length: 3
Transfer-Encoding: chunked

8</span>
<span class="orange">SMUGGLED
0
</span></code><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                To send this request using Burp Repeater, you will first need to go to the Repeater menu and ensure that the "Update Content-Length"
                option is unchecked.
            </p>
            <p>
                You need to include the trailing sequence <code>\r\n\r\n</code> following the final <code>0</code>.
            </p>
        </div><p>
            The front-end server processes the <code>Transfer-Encoding</code> header, and so treats the message body as using
            chunked encoding. It processes the first chunk, which is stated to be 8 bytes long, up to the start of the line following <code>SMUGGLED</code>. It processes the second chunk, which is stated to be zero length, and so is treated as terminating
            the request. This request is forwarded on to the back-end server.
        </p><p>
            The back-end server processes the <code>Content-Length</code> header and determines that the request body is 3 bytes
            long, up to the start of the line following <code>8</code>. The following bytes, starting with <code>SMUGGLED</code>, are left unprocessed, and the back-end server will treat these as being the start of the next
            request in the sequence.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'A6AECBC5C1D7F95E7512642A6F11FCB8C5D568F7CD57AE0CE60A08C7140583B3'])@verbatim<h3 id="te-te-behavior-obfuscating-the-te-header">TE.TE behavior: obfuscating the TE header</h3><p>
            Here, the front-end and back-end servers both support the <code>Transfer-Encoding</code> header, but one of the servers
            can be induced not to process it by obfuscating the header in some way.
        </p><p>
            There are potentially endless ways to obfuscate the <code>Transfer-Encoding</code> header. For example:
        </p><code class="code-scrollable">Transfer-Encoding: xchunked

Transfer-Encoding : chunked

Transfer-Encoding: chunked
Transfer-Encoding: x

Transfer-Encoding:[tab]chunked

[space]Transfer-Encoding: chunked

X: X[\n]Transfer-Encoding: chunked

Transfer-Encoding
: chunked</code><p>
            Each of these techniques involves a subtle departure from the HTTP specification. Real-world code that implements a protocol specification
            rarely adheres to it with absolute precision, and it is common for different implementations to tolerate different variations from the
            specification. To uncover a TE.TE vulnerability, it is necessary to find some variation of the <code>Transfer-Encoding</code> header such that only one of the front-end or back-end servers processes it, while the
            other server ignores it.
        </p><p>
            Depending on whether it is the front-end or the back-end server that can be induced not to process the obfuscated <code>Transfer-Encoding</code> header, the remainder of the attack will take the same form as for the CL.TE or TE.CL
            vulnerabilities already described.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '417947BEC9FE621DFDC11F4D622CEF72B0021A6D872AA83CCA70AAF532B4B592'])@verbatim<h2 id="how-to-identify-http-request-smuggling-vulnerabilities">How to identify HTTP request smuggling vulnerabilities</h2><p>
            Check out the following section for some tips on how to identify HTTP request smuggling vulnerabilities for yourself. We've also provided some interactive <span class="label-light-green-small">LABS</span>, so you can see how this works in practice.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/request-smuggling/finding">Finding HTTP request smuggling vulnerabilities</a></li></ul></div><h2 id="how-to-exploit-http-request-smuggling-vulnerabilities">How to exploit HTTP request smuggling vulnerabilities</h2><p>
            Now that you're familiar with the basic concepts, let's take a look at how HTTP request smuggling can be used to craft a number of high-severity attacks. As usual, there are plenty of fully interactive <span class="label-light-green-small">LABS</span>, so you can try your hand at attacking realistic targets.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/request-smuggling/exploiting">Exploiting HTTP request smuggling vulnerabilities</a></li></ul></div><h2 id="advanced-http-request-smuggling">Advanced HTTP request smuggling</h2><p>
            If you've already completed the rest of our request smuggling labs, you're ready to learn some more advanced techniques. We've created a number of interactive <span class="label-light-green-small">LABS</span> based on real-world vulnerabilities discovered by SecDevLab researchers. You'll even get a chance to try out Burp's one-of-a-kind features for HTTP/2-based testing.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/request-smuggling/advanced">Advanced HTTP request smuggling vulnerabilities</a></li></ul></div><h2 id="browser-powered-request-smuggling" cms-ignore-validation="DUPLICATE_HEADINGS">Browser-powered request smuggling</h2><p no-keyword-injection="">
            The request smuggling techniques you've learned so far rely on sending intentionally malformed requests using dedicated hacking tools like Burp Repeater. In fact, it's possible to perform the same attacks using fully browser-compatible requests that desync the two servers using a perfectly normal <code>Content-Length</code> header.
        </p><p>
            This even enables you to launch client-side variations of these attacks, which induce a victim's browser to poison its own connection to the vulnerable website. Not only does this expose single-server sites to request smuggling-style attacks, it even enables you to attack sites that you don't have access to directly. Check out the learning materials and <span class="label-light-green-small">LABS</span> to learn how.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/request-smuggling/browser">Browser-powered request smuggling</a></li></ul></div><h2 id="how-to-prevent-http-request-smuggling-vulnerabilities">How to prevent HTTP request smuggling vulnerabilities</h2><p>
            HTTP request smuggling vulnerabilities arise in situations where the front-end server and back-end server use different mechanisms for determining the boundaries between requests. This may be due to discrepancies between whether HTTP/1 servers use the <code>Content-Length</code> header or chunked transfer encoding to determine where each request ends. In HTTP/2 environments, the common practice of <a href="/web-security/request-smuggling/advanced/http2-downgrading">downgrading HTTP/2 requests</a> for the back-end is also fraught with issues and enables or simplifies a number of additional attacks.
        </p><p>
            To prevent HTTP request smuggling vulnerabilities, we recommend the following high-level measures:
        </p><ul>
            <li>
                <p>
                    Use HTTP/2 end to end and disable HTTP downgrading if possible. HTTP/2 uses a robust mechanism for determining the length of requests and, when used end to end, is inherently protected against request smuggling. If you can't avoid HTTP downgrading, make sure you validate the rewritten request against the HTTP/1.1 specification. For example, reject requests that contain newlines in the headers, colons in header names, and spaces in the request method.
                </p>
            </li>
            <li>
                <p>
                    Make the front-end server normalize ambiguous requests and make the back-end server reject any that are still ambiguous, closing the TCP connection in the process.
                </p>
            </li>
            <li>
                <p>
                    Never assume that requests won't have a body. This is the fundamental cause of both CL.0 and client-side desync vulnerabilities.
                </p>
            </li>
            <li>
                <p>
                    Default to discarding the connection if server-level exceptions are triggered when handling requests.
                </p>
            </li>
            <li>
                <p>
                    If you route traffic through a forward proxy, ensure that upstream HTTP/2 is enabled if possible.
                </p>
            </li>
        </ul><p>
            As we've demonstrated in the learning materials, disabling reuse of back-end connections will help to mitigate certain kinds of attack, but this still doesn't protect you from <a href="/web-security/request-smuggling/advanced/request-tunnelling">request tunnelling</a> attacks.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/all-labs">Find HTTP request smuggling vulnerabilities using Burp Suite's web vulnerability
                scanner</a></li></ul></div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
