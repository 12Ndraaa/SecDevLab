@extends('layouts.academy')

@section('title', 'Same-origin policy (SOP) | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cors"><span itemprop="name">CORS</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cors/same-origin-policy"><span itemprop="name">Same-origin policy</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Same-origin policy (SOP)</h1><p>
            In this section we explain what the same-origin policy (SOP) is and how it is implemented.
		</p><h2 id="what-is-the-same-origin-policy">What is the same-origin policy?</h2><p>
            The same-origin policy is a web browser security mechanism that aims to prevent websites from attacking each other. 
		</p><p>
			The same-origin policy restricts scripts on one origin from accessing data from another origin. An origin consists of a URI scheme, domain and port number. For example, consider the following URL:
		</p><code class="code-scrollable">http://normal-website.com/example/example.html</code><p>
			This uses the scheme <code>http</code>, the domain <code>normal-website.com</code>, and the port number <code>80</code>. The following table shows how the same-origin policy will be applied if content at the above URL tries to access other origins:
		</p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    URL accessed
                </th>
				<th>
					Access permitted?
				</th>
            </tr>
            <tr>
                <td><code>
                    http://normal-website.com/example/
                </code></td>
				<td>
					Yes: same scheme, domain, and port			
				</td>
            </tr>
			<tr>
                <td><code>
                    http://normal-website.com/example2/
                </code></td>
				<td>
					Yes: same scheme, domain, and port				
				</td>
            </tr>
			<tr>
                <td><code>
                    https://normal-website.com/example/
                </code></td>
				<td>
					No: different scheme and port				
				</td>
            </tr>
			<tr>
                <td><code>
                    http://en.normal-website.com/example/
                </code></td>
				<td>
					No: different domain			
				</td>
            </tr>
			<tr>
                <td><code>
                    http://www.normal-website.com/example/
                </code></td>
				<td>
					No: different domain			
				</td>
			</tr>
				<tr>
                <td><code>
                    http://normal-website.com:8080/example/
                </code></td>
				<td>
					No: different port*			
				</td>
            </tr>
        </table><p>
			*Internet Explorer will allow this access because IE does not take account of the port number when applying the same-origin policy.
		</p><h2 id="why-is-the-same-origin-policy-necessary">Why is the same-origin policy necessary?</h2><p>
			When a browser sends an HTTP request from one origin to another, any cookies, including authentication session cookies, relevant to the other domain are also sent as part of the request. This means that the response will be generated within the user's session, and include any relevant data that is specific to the user. Without the same-origin policy, if you visited a malicious website, it would be able to read your emails from GMail, private messages from Facebook, etc.
		</p><h2 id="how-is-the-same-origin-policy-implemented">How is the same-origin policy implemented?</h2><p>
           The same-origin policy generally controls the access that JavaScript code has to content that is loaded cross-domain. Cross-origin loading of page resources is generally permitted. For example, the SOP allows embedding of images via the <code>&lt;img&gt;</code> tag, media via the <code>&lt;video&gt;</code> tag, and JavaScript via the <code>&lt;script&gt;</code> tag. However, while these external resources can be loaded by the page, any JavaScript on the page won't be able to read the contents of these resources.
        </p><p>
           There are various exceptions to the same-origin policy:
        </p><ul>
			<li>
				Some objects are writable but not readable cross-domain, such as the <code>location</code> object or the <code>location.href</code> property from iframes or new windows.
			</li>
			<li>
				Some objects are readable but not writable cross-domain, such as the <code>length</code> property of the <code>window</code> object (which stores the number of frames being used on the page) and the <code>closed</code> property.
			</li>
			<li>
				The <code>replace</code> function can generally be called cross-domain on the <code>location</code> object.
			</li>
			<li>
				You can call certain functions cross-domain. For example, you can call the functions <code>close</code>, <code>blur</code> and <code>focus</code> on a new window. The <code>postMessage</code> function can also be called on iframes and new windows in order to send messages from one domain to another.
			</li>
		</ul><p>
			Due to legacy requirements, the same-origin policy is more relaxed when dealing with cookies, so they are often accessible from all subdomains of a site even though each subdomain is technically a different origin. You can partially mitigate this risk using the <code>HttpOnly</code> cookie flag.
		</p><p>
			It's possible to relax same-origin policy using <code>document.domain</code>. This special property allows you to relax SOP for a specific domain, but only if it's part of your FQDN (fully qualified domain name). For example, you might have a domain <code>marketing.example.com</code> and you would like to read the contents of that domain on <code>example.com</code>. To do so, both domains need to set <code>document.domain</code> to <code>example.com</code>. Then SOP will allow access between the two domains despite their different origins. In the past it was possible to set <code>document.domain</code> to a TLD such as <code>com</code>, which allowed access between any domains on the same TLD, but now modern browsers prevent this.
		</p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
