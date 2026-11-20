@extends('layouts.academy')

@section('title', 'CORS and the Access-Control-Allow-Origin response header | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="15">
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
        <h3>Cross-origin resource sharing (CORS)</h3>
        <ul>
            <li><a href="/web-security/cors#what-is-cors-cross-origin-resource-sharing">What is CORS?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/cors/same-origin-policy">Same-origin policy (SOP)</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cors/same-origin-policy#why-is-the-same-origin-policy-necessary">Why is SOP necessary?</a></li>
                    <li><a href="/web-security/cors/same-origin-policy#how-is-the-same-origin-policy-implemented">Implementation</a></li>
                    <li><a href="/web-security/cors#relaxation-of-the-same-origin-policy">Relaxation of the SOP</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/cors/access-control-allow-origin">Access-Control-Allow-Origin (ACAO) response header</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cors/access-control-allow-origin#implementing-simple-cross-origin-resource-sharing">Implementing simple CORS</a></li>
                    <li><a href="/web-security/cors/access-control-allow-origin#handling-cross-origin-resource-requests-with-credentials">Handling cross-origin resource requests with credentials</a></li>
                    <li><a href="/web-security/cors/access-control-allow-origin#relaxation-of-cors-specifications-with-wildcards">Relaxation of CORS specifications with wildcards</a></li>
                    <li><a href="/web-security/cors/access-control-allow-origin#pre-flight-checks">Pre-flight checks</a></li>
                    <li><a href="/web-security/cors/access-control-allow-origin#does-cors-protect-against-csrf">Does CORS protect against CSRF?</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/cors#vulnerabilities-arising-from-cors-configuration-issues">Vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cors#server-generated-acao-header-from-client-specified-origin-header">Server-generated ACAO header from client-specified Origin header</a></li>
                    <li><a href="/web-security/cors#errors-parsing-origin-headers">Errors parsing Origin headers</a></li>
                    <li><a href="/web-security/cors#whitelisted-null-origin-value">Whitelisted null Origin value</a></li>
                    <li><a href="/web-security/cors#exploiting-xss-via-cors-trust-relationships">Exploiting XSS via CORS trust relationships</a></li>
                    <li><a href="/web-security/cors#breaking-tls-with-poorly-configured-cors">Breaking TLS with poorly configured CORS</a></li>
                    <li><a href="/web-security/cors#intranets-and-cors-without-credentials">Intranets and CORS without credentials</a></li>
                </ul>
            </li>
            <li><a href="/web-security/cors#how-to-prevent-cors-based-attacks">Preventing attacks</a></li>
            <li><a href="/web-security/ssrf/url-validation-bypass-cheat-sheet">URL validation bypass cheat sheet</a></li>
            <li><a href="/web-security/all-labs#cross-origin-resource-sharing-cors">View all CORS labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cors"><span itemprop="name">CORS</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cors/access-control-allow-origin"><span itemprop="name">CORS and ACAO</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="HEADING_CAPITALIZATION" class="heading-2">CORS and the Access-Control-Allow-Origin response header</h1><p>
            In this section we explain what the <code>Access-Control-Allow-Origin</code> header is in respect of CORS, and how it forms part of CORS implementation.
        </p><p>
            The <a href="/web-security/cors">cross-origin resource sharing</a> specification provides controlled relaxation of the <a href="/web-security/cors/same-origin-policy">same-origin policy</a> for HTTP requests to one website domain from another through the use of a collection of HTTP headers. Browsers permit access to responses to cross-origin requests based upon these header instructions.
        </p><h2 id="what-is-the-access-control-allow-origin-response-header" cms-ignore-validation="HEADING_CAPITALIZATION">What is the Access-Control-Allow-Origin response header?</h2><p>
			The <code>Access-Control-Allow-Origin</code> header is included in the response from one website to a request originating from another website, and identifies the permitted origin of the request. A web browser compares the Access-Control-Allow-Origin with the requesting website's origin and permits access to the response if they match.
		</p><h2 id="implementing-simple-cross-origin-resource-sharing">Implementing simple cross-origin resource sharing
		</h2><p>
			The cross-origin resource sharing (CORS) specification prescribes header content exchanged between web servers and browsers that restricts origins for web resource requests outside of the origin domain. The CORS specification identifies a collection of protocol headers of which <code>Access-Control-Allow-Origin</code> is the most significant. This header is returned by a server when a website requests a cross-domain resource, with an <code>Origin</code> header added by the browser.
		</p><p>
			For example, suppose  a website with origin <code>normal-website.com</code> causes the following cross-domain request:
		</p><code class="code-scrollable">GET /data HTTP/1.1
Host: robust-website.com
Origin : https://normal-website.com</code><p>
			The server on <code>robust-website.com</code> returns the following response:
		</p><code class="code-scrollable">HTTP/1.1 200 OK
...
Access-Control-Allow-Origin: https://normal-website.com</code><p>
			The browser will allow code running on <code>normal-website.com</code> to access the response because the origins match.
		</p><p>
			The specification of <code>Access-Control-Allow-Origin</code> allows for multiple origins, or the value <code>null</code>, or the wildcard <code>*</code>. However, no browser supports multiple origins and there are restrictions on the use of the wildcard <code>*</code>.
		</p><h2 id="handling-cross-origin-resource-requests-with-credentials">Handling cross-origin resource requests with credentials
		</h2><p>
			The default behavior of cross-origin resource requests is for requests to be passed without credentials like cookies and the Authorization header. However, the cross-domain server can permit reading of the response when credentials are passed to it by setting the CORS <code>Access-Control-Allow-Credentials</code> header to true. Now if the requesting website uses JavaScript to declare that it is sending cookies with the request:
		</p><code class="code-scrollable">GET /data HTTP/1.1
Host: robust-website.com
...
Origin: https://normal-website.com
Cookie: JSESSIONID=&lt;value&gt;</code><p>
			And the response to the request is:
		</p><code class="code-scrollable">HTTP/1.1 200 OK
...
Access-Control-Allow-Origin: https://normal-website.com
Access-Control-Allow-Credentials: true</code><p>
			Then the browser will permit the requesting website to read the response, because the <code>Access-Control-Allow-Credentials</code> response header is set to <code>true</code>. Otherwise, the browser will not allow access to the response.
		</p><h2 id="relaxation-of-cors-specifications-with-wildcards">Relaxation of CORS specifications with wildcards
		</h2><p>
			The header <code>Access-Control-Allow-Origin</code> supports wildcards. For example:
		</p><code class="code-scrollable">Access-Control-Allow-Origin: *</code><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                Note that wildcards cannot be used within any other value. For example, the following header is <strong>not</strong> valid:
            </p>
            <code class="code-scrollable">Access-Control-Allow-Origin: https://*.normal-website.com</code>
        </div><p>
			Fortunately, from a security perspective, the use of the wildcard is restricted in the specification as you cannot combine the wildcard with the cross-origin transfer of credentials (authentication, cookies or client-side certificates). Consequently, a cross-domain server response of the form: 
		</p><code class="code-scrollable">Access-Control-Allow-Origin: *
Access-Control-Allow-Credentials: true</code><p>
		    is not permitted as this would be dangerously insecure, exposing any authenticated content on the target site to everyone.
	    </p><p>
			Given these constraints, some web servers dynamically create <code>Access-Control-Allow-Origin</code> headers based upon the client-specified origin. This is a workaround for CORS constraints that is not secure. We'll show you <a href="/web-security/cors#server-generated-acao-header-from-client-specified-origin-header">how this can be exploited</a> later.
		</p><h2 id="pre-flight-checks">Pre-flight checks
		</h2><p>
			The pre-flight check was added to the CORS specification to protect legacy resources from the expanded request options allowed by CORS. Under certain circumstances, when a cross-domain request includes a non-standard HTTP method or headers, the cross-origin request is preceded by a request using the <code>OPTIONS</code> method, and the CORS protocol necessitates an initial check on what methods and headers are permitted prior to allowing the cross-origin request. This is called the pre-flight check. The server returns a list of allowed methods in addition to the trusted origin and the browser checks to see if the requesting website's method is allowed.
		</p><p>
			For example, this is a pre-flight request that is seeking to use the <code>PUT</code> method together with a custom request header called <code>Special-Request-Header</code>:
		</p><code class="code-scrollable">OPTIONS /data HTTP/1.1
Host: &lt;some website&gt;
...
Origin: https://normal-website.com
Access-Control-Request-Method: PUT
Access-Control-Request-Headers: Special-Request-Header</code><p>
			The server might return a response like the following:
		</p><code class="code-scrollable">HTTP/1.1 204 No Content
...
Access-Control-Allow-Origin: https://normal-website.com
Access-Control-Allow-Methods: PUT, POST, OPTIONS
Access-Control-Allow-Headers: Special-Request-Header
Access-Control-Allow-Credentials: true
Access-Control-Max-Age: 240</code><p>
			This response sets out the allowed methods (<code>PUT</code>, <code>POST</code> and <code>OPTIONS</code>) and permitted request headers (<code>Special-Request-Header</code>). In this particular case the cross-domain server also allows the sending of credentials, and the <code>Access-Control-Max-Age</code> header defines a maximum timeframe for caching the pre-flight response for reuse. If the request methods and headers are permitted (as they are in this example) then the browser processes the cross-origin request in the usual way. Pre-flight checks add an extra HTTP request round-trip to the cross-domain request, so they increase the browsing overhead.
		</p><h2 id="does-cors-protect-against-csrf">Does CORS protect against CSRF?
		</h2><p>
			CORS does not provide protection against cross-site request forgery (CSRF) attacks, this is a common misconception.
		</p><p>
			CORS is a controlled relaxation of the same-origin policy, so poorly configured CORS may actually increase the possibility of CSRF attacks or exacerbate their impact.
		</p><p>
			There are various ways to perform CSRF attacks without using CORS, including simple HTML forms and cross-domain resource includes.
		</p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
