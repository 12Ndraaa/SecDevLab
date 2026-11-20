@extends('layouts.academy')

@section('title', 'Advanced request smuggling | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling"><span itemprop="name">Request smuggling</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/request-smuggling/advanced"><span itemprop="name">Advanced</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Advanced request smuggling</h1><p>
            In this section, we'll build on the concepts you've learned so far and teach you some more advanced HTTP request smuggling techniques. We'll also cover a variety of HTTP/2-based attacks that are made possible thanks to <a href="/web-security/all-labs">Burp's unique HTTP/2-testing capabilities</a>. Don't worry if you're new to HTTP/2 - we'll cover all the essentials as we go.
        </p><p>
            In particular, we'll look at:
        </p><ul>
            <li>
                <p>
                    How common HTTP/2 implementations enable a range of <a href="/web-security/request-smuggling/advanced#http-2-request-smuggling">powerful new vectors for request smuggling</a>, making a number of previously secure sites vulnerable to these kinds of attacks.
                </p>
            </li>
            <li>
                <p>
                    How you can use request smuggling to persistently <a href="/web-security/request-smuggling/advanced/response-queue-poisoning">poison the response queue</a>, effectively enabling full-site takeover.
                </p>
            </li>
            <li>
                <p>
                    How you can use HTTP/2-exclusive inputs to construct high-severity exploits <a href="/web-security/request-smuggling/advanced/request-tunnelling">even when the target doesn't reuse the connection</a> between the front-end and back-end servers at all.
                </p>
            </li>
        </ul><p>
            To help you practice what you've learned, we've provided deliberately vulnerable labs throughout. These are based on real-world vulnerabilities first presented at Black Hat USA 2021 by our Director of Research, <a href="https://portswigger.net/research/james-kettle">James Kettle</a>.
        </p><div class="highlightedarea">
            <h4>SecDevLab Research</h4>
            
        <ul><li><a href="https://portswigger.net/research/http2">HTTP/2: The Sequel Is Always Worse</a></li></ul></div><h2 id="http-2-request-smuggling">HTTP/2 request smuggling</h2><p>
            In this section, we'll show you how, contrary to popular belief, implementing HTTP/2 has actually made many websites more vulnerable to request smuggling, even if they were previously safe from these kinds of attacks.
        </p><h3 id="http-2-message-length">HTTP/2 message length</h3><p>
            Request smuggling is fundamentally about exploiting discrepancies between how different servers interpret the length of a request. HTTP/2 introduces a single, robust mechanism for doing this, which has long been thought to make it inherently immune to request smuggling.
        </p><p>
            Although you won't see this in Burp, HTTP/2 messages are sent over the wire as a series of separate "frames". Each frame is preceded by an explicit length field, which tells the server exactly how many bytes to read in. Therefore, the length of the request is the sum of its frame lengths.
        </p><p>
            In theory, this mechanism means there is no opportunity for an attacker to introduce the ambiguity required for request smuggling, as long as the website uses HTTP/2 end to end. In the wild, however, this is often not the case due to the widespread but dangerous practice of HTTP/2 downgrading.
        </p><h3 id="http-2-downgrading" cms-ignore-validation="DUPLICATE_HEADINGS">HTTP/2 downgrading</h3><p>
            HTTP/2 downgrading is the process of rewriting HTTP/2 requests using HTTP/1 syntax to generate an equivalent HTTP/1 request. Web servers and reverse proxies often do this in order to offer HTTP/2 support to clients while communicating with back-end servers that only speak HTTP/1. This practice is a prerequisite for many of the attacks covered in this section.
        </p><img alt="HTTP/2 downgrading" src="/web-security/request-smuggling/advanced/images/http2-downgrading.jpg"><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/request-smuggling/advanced/http2-downgrading">What is HTTP/2 downgrading?</a></li></ul></div><div class="highlightedarea">
            <h4>Note on HTTP/2 message representation</h4>
            <p>
                As HTTP/2 is a binary protocol, we've used some artistic license to represent HTTP/2 messages in a human-readable format throughout these materials:
            </p>
            <ul>
                <li>
                    <p>
                        We display each message as a single entity, rather than separate "frames".
                    </p>
                </li>
                <li>
                    <p>
                        We display the headers using plain text name and value fields.
                    </p>
                </li>
                <li>
                    <p>
                        We prefix pseudo-header names with a colon to help differentiate them from normal headers.
                    </p>
                </li>
            </ul>
            <p>
                This closely resembles the way <a href="/web-security/all-labs">Burp represents HTTP/2 messages</a> in the Inspector, but note that they don't actually look like this on the wire.
            </p>
        </div><h3 id="h2-cl-vulnerabilities">H2.CL vulnerabilities</h3><p>
           HTTP/2 requests don't have to specify their length explicitly in a header. During downgrading, this means front-end servers often add an HTTP/1 <code>Content-Length</code> header, deriving its value using <a href="/web-security/request-smuggling/advanced#http-2-message-length">HTTP/2's built-in length mechanism</a>. Interestingly, HTTP/2 requests can also include their own <code>content-length</code> header. In this case, some front-end servers will simply reuse this value in the resulting HTTP/1 request.
        </p><p>
            The spec dictates that any <code>content-length</code> header in an HTTP/2 request must match the length calculated using the built-in mechanism, but this isn't always validated properly before downgrading. As a result, it may be possible to smuggle requests by injecting a misleading <code>content-length</code> header. Although the front-end will use the implicit HTTP/2 length to determine where the request ends, the HTTP/1 back-end has to refer to the <code>Content-Length</code> header derived from your injected one, resulting in a desync.
        </p><p>
            <strong>Front-end (HTTP/2)</strong>
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">POST</td>
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
                    <td class="tg-http2name">content-type</td>
                    <td class="tg-http2value">application/x-www-form-urlencoded</td>
                </tr>
                <tr>
                    <td class="tg-http2name">content-length</td>
                    <td class="tg-http2value">0</td>
                </tr>
                <tr>
                    <td class="tg-http2response" colspan="2">
                        <p class="pre-wrap">GET /admin HTTP/1.1
Host: vulnerable-website.com
Content-Length: 10

x=1</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><p>
            <strong>Back-end (HTTP/1)</strong>
        </p><code class="code-scrollable">POST /example HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 0

<span class="orangeCode">GET /admin HTTP/1.1
Host: vulnerable-website.com
Content-Length: 10

x=1</span><span class="greenCode">GET / H</span></code><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span></span> Tip</h4></summary><div class="content"><p>
                When performing some request smuggling attacks, you will want headers from the victim's request to be appended to your smuggled prefix. However, these can interfere with your attack in some cases, resulting in duplicate header errors and suchlike. In the example above, we've mitigated this by including a trailing parameter and a <code>Content-Length</code> header in the smuggled prefix. By using a <code>Content-Length</code> header that is slightly longer than the body, the victim's request will still be appended to your smuggled prefix but will be truncated before the headers.
            </p></div></details></div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '94FED48630D16B9ADC01888E546E50F8E94C1BAE77065A94140339F20303EF55'])@verbatim<h3 id="h2-te-vulnerabilities">H2.TE vulnerabilities</h3><p>
            Chunked transfer encoding is incompatible with HTTP/2 and the spec recommends that any <code>transfer-encoding: chunked</code> header you try to inject should be stripped or the request blocked entirely. If the front-end server fails to do this, and subsequently downgrades the request for an HTTP/1 back-end that does support chunked encoding, this can also enable request smuggling attacks.
        </p><p>
            <strong>Front-end (HTTP/2)</strong>
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">POST</td>
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
                    <td class="tg-http2name">content-type</td>
                    <td class="tg-http2value">application/x-www-form-urlencoded</td>
                </tr>
                <tr>
                    <td class="tg-http2name">transfer-encoding</td>
                    <td class="tg-http2value">chunked</td>
                </tr>
                <tr>
                    <td class="tg-http2response" colspan="2">
                        <p class="pre-wrap">0

GET /admin HTTP/1.1
Host: vulnerable-website.com
Foo: bar</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><p>
            <strong>Back-end (HTTP/1)</strong>
        </p><code class="code-scrollable">POST /example HTTP/1.1
Host: vulnerable-website.com
Content-Type: application/x-www-form-urlencoded
Transfer-Encoding: chunked

0

<span class="orangeCode">GET /admin HTTP/1.1
Host: vulnerable-website.com
Foo: bar</span></code><p>
            If a website is vulnerable to either H2.CL or H2.TE request smuggling, you can potentially leverage this behavior to perform the same attacks that we covered in our <a href="/web-security/request-smuggling">previous request smuggling labs</a>.
        </p><h3 id="hidden-http-2-support">Hidden HTTP/2 support</h3><p>
            Browsers and other clients, including Burp, typically only use HTTP/2 to communicate with servers that explicitly advertise support for it via ALPN as part of the TLS handshake.
        </p><p>
            Some servers support HTTP/2 but fail to declare this properly due to misconfiguration. In such cases, it can appear as though the server only supports HTTP/1.1 because clients default to this as a fallback option. As a result, testers may overlook viable HTTP/2 attack surface and miss protocol-level issues, such as the examples of HTTP/2 downgrade-based request smuggling that we covered above.
        </p><p>
            To force Burp Repeater to use HTTP/2 so that you can test for this misconfiguration manually:
        </p><ol>
            <li>From the <strong>Settings</strong> dialog, go to <strong>Tools &gt; Repeater</strong>.</li>
            <li>Under <strong>Connections</strong>, enable the <strong>Allow HTTP/2 ALPN override</strong> option.</li>
            <li>In Repeater, go to the <strong>Inspector</strong> panel and expand the <strong>Request attributes</strong> section.</li>
            <li>Use the switch to set the <strong>Protocol</strong> to <strong>HTTP/2</strong>. Burp will now send all requests on this tab using HTTP/2, regardless of whether the server advertises support for this.</li>
        </ol><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                If you're using Burp Suite Professional, Burp Scanner automatically detects instances of hidden HTTP/2 support.
            </p>
        </div><h2 id="response-queue-poisoning" cms-ignore-validation="DUPLICATE_HEADINGS">Response queue poisoning</h2><p>
            Response queue poisoning is a powerful request smuggling attack that enables you to steal arbitrary responses intended for other users, potentially compromising their accounts and even the entire site.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/request-smuggling/advanced/response-queue-poisoning">Response queue poisoning</a></li></ul></div><h2 id="request-smuggling-via-crlf-injection">Request smuggling via CRLF injection</h2><p>
            Even if websites take steps to prevent basic H2.CL or H2.TE attacks, such as validating the <code>content-length</code> or stripping any <code>transfer-encoding</code> headers, HTTP/2's binary format enables some novel ways to bypass these kinds of front-end measures.
        </p><p>
            In HTTP/1, you can sometimes exploit discrepancies between how servers handle standalone newline (<code>\n</code>) characters to smuggle prohibited headers. If the back-end treats this as a delimiter, but the front-end server does not, some front-end servers will fail to detect the second header at all.
        </p><code class="code-scrollable">Foo: bar<span class="grey">\n</span>Transfer-Encoding: chunked</code><p>
            This discrepancy doesn't exist with the handling of a full CRLF (<code>\r\n</code>) sequence because all HTTP/1 servers agree that this terminates the header.
        </p><p>
            On the other hand, as HTTP/2 messages are binary rather than text-based, the boundaries of each header are based on explicit, predetermined offsets rather than delimiter characters. This means that <code>\r\n</code> no longer has any special significance within a header value and, therefore, can be included <strong>inside</strong> the value itself without causing the header to be split:
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">foo</td>
                    <td class="tg-http2value">bar<span class="blueCode"><span class="grey">\r\n</span></span>Transfer-Encoding: chunked</td>
                </tr>
                </tbody>
            </table>
        </div><p>
            This may seem relatively harmless on its own, but when this is rewritten as an HTTP/1 request, the <code>\r\n</code> will once again be interpreted as a header delimiter. As a result, an HTTP/1 back-end server would see two distinct headers:
        </p><code class="code-scrollable">Foo: bar
Transfer-Encoding: chunked</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '7D452275BA41F1AA0FC50B97490AE64B428D6401C7F193516BD15466490D8E01'])@verbatim<div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/request-smuggling/advanced/http2-exclusive-vectors">Additional HTTP/2-exclusive attack vectors</a></li></ul></div><h2 id="http-2-request-splitting">HTTP/2 request splitting</h2><p>
            When we looked at <a href="/web-security/request-smuggling/advanced/response-queue-poisoning">response queue poisoning</a>, you learned how to split a single HTTP request into exactly two complete requests on the back-end. In the example we looked at, the split occurred inside the message body, but when HTTP/2 downgrading is in play, you can also cause this split to occur in the headers instead.
        </p><p>
            This approach is more versatile because you aren't dependent on using request methods that are allowed to contain a body. For example, you can even use a <code>GET</code> request:
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">GET</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:path</td>
                    <td class="tg-http2value">/</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:authority</td>
                    <td class="tg-http2value">vulnerable-website.com</td>
                </tr>
                <tr>
                    <td class="tg-http2name">foo</td>
                    <td class="tg-http2value"><p class="pre-wrap">bar<span class="grey">\r\n</span>
<span class="grey">\r\n</span>
GET /admin HTTP/1.1<span class="grey">\r\n</span>
Host: vulnerable-website.com</p></td>
                </tr>
                </tbody>
            </table>
        </div><p>
            This is also useful in cases where the <code>content-length</code> is validated and the back-end doesn't support chunked encoding.
        </p><h3 id="accounting-for-front-end-rewriting">Accounting for front-end rewriting</h3><p>
            To split a request in the headers, you need to understand how the request is rewritten by the front-end server and account for this when adding any HTTP/1 headers manually. Otherwise, one of the requests may be missing mandatory headers.
        </p><p>
            For example, you need to ensure that both requests received by the back-end contain a <code>Host</code> header. Front-end servers typically strip the <code>:authority</code> pseudo-header and replace it with a new HTTP/1 <code>Host</code> header during downgrading. There are different approaches for doing this, which can influence where you need to position the <code>Host</code> header that you're injecting.
        </p><p>
            Consider the following request:
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">GET</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:path</td>
                    <td class="tg-http2value">/</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:authority</td>
                    <td class="tg-http2value">vulnerable-website.com</td>
                </tr>
                <tr>
                    <td class="tg-http2name">foo</td>
                    <td class="tg-http2value"><p class="pre-wrap">bar<span class="grey">\r\n</span>
<span class="grey">\r\n</span>
GET /admin HTTP/1.1<span class="grey">\r\n</span>
Host: vulnerable-website.com</p></td>
                </tr>
                </tbody>
            </table>
        </div><p>
            During rewriting, some front-end servers append the new <code>Host</code> header to the end of the current list of headers. As far as an HTTP/2 front-end is concerned, this after the <code>foo</code> header. Note that this is also after the point at which the request will be split on the back-end. This means that the first request would have no <code>Host</code> header at all, while the smuggled request would have two. In this case, you need to position your injected <code>Host</code> header so that it ends up in the first request once the split occurs:
        </p><div class="tg-wrap">
            <table class="tg">
                <tbody>
                <tr>
                    <td class="tg-http2name">:method</td>
                    <td class="tg-http2value">GET</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:path</td>
                    <td class="tg-http2value">/</td>
                </tr>
                <tr>
                    <td class="tg-http2name">:authority</td>
                    <td class="tg-http2value">vulnerable-website.com</td>
                </tr>
                <tr>
                    <td class="tg-http2name">foo</td>
                    <td class="tg-http2value"><p class="pre-wrap">bar<span class="grey">\r\n</span>
Host: vulnerable-website.com<span class="grey">\r\n</span>
<span class="grey">\r\n</span>
GET /admin HTTP/1.1</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><p>
            You will also need to adjust the positioning of any internal headers that you want to inject in a similar manner.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'D8E66F883C0EFDD6CD4CCBBF6A654382ED2D13D5277BAB587AA37904D5EC4211'])@verbatim<div class="component-solution expandable-container">
            
            
        <details><summary><h4><span></span> Tip</h4></summary><div class="content"><p>
                In the example above, we've split the request in a way that triggers <a href="/web-security/request-smuggling/advanced/response-queue-poisoning">response queue poisoning</a>, but you can also smuggle prefixes for classic request smuggling attacks in this way. In this case, your injected headers may clash with the headers in the request that is appended to your prefix on the back-end, resulting in duplicate header errors or causing the request to be terminated in the wrong place. To mitigate this, you can include a trailing body parameter in the smuggled prefix along with a <code>Content-Length</code> header that is slightly longer than the body. The victim's request will still be appended to your smuggled prefix but will be truncated before the headers.
            </p></div></details></div><h2 id="http-request-tunnelling" cms-ignore-validation="DUPLICATE_HEADINGS">HTTP request tunnelling</h2><p>
            Many of the request smuggling attacks we've covered so far are only possible because the same connection between the front-end and back-end server is used for handling multiple requests. HTTP request tunnelling provides a way to craft high-severity exploits even when there is no connection reuse at all.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/request-smuggling/advanced/request-tunnelling">HTTP request tunnelling</a></li></ul></div><h2 id="0-cl-request-smuggling">0.CL request smuggling</h2><p>
            0.CL desync attacks occur when the front-end server ignores a <code>Content-Length</code> header that the back-end server processes. This scenario was long considered unexploitable due to connection deadlocks between servers.
        </p><p>
            However, by combining a 0.CL attack with an early-response gadget - a technique to make the back-end respond before receiving the complete request body - attackers can break the deadlock, then use a double desync to build a full exploit. This breakthrough enables the exploitation of 0.CL scenarios.
        </p><p>
            For more technical details, see the accompanying whitepaper: <a href="https://portswigger.net/research/http1-must-die">HTTP/1.1 Must Die</a>.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '4BAD74C356692BBAAB9602C955308F8A1B04CB866034F32286993566EFC8CC66'])@verbatim
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
