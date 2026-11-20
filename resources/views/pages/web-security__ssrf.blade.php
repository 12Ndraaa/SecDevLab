@extends('layouts.academy')

@section('title', 'What is SSRF (Server-side request forgery)? Tutorial & Examples | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="37">
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
        <h3>Server-side request forgery (SSRF)</h3>
        <ul>
            <li><a href="/web-security/ssrf#what-is-ssrf">What is SSRF?</a></li>
            <li><a href="/web-security/ssrf#what-is-the-impact-of-ssrf-attacks">Impact</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/ssrf#common-ssrf-attacks">Common SSRF attacks</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/ssrf#ssrf-attacks-against-the-server">Against the server itself</a></li>
                    <li><a href="/web-security/ssrf#ssrf-attacks-against-other-back-end-systems">Against other back-end systems</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/ssrf#circumventing-common-ssrf-defenses">Circumventing common SSRF defenses</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/ssrf#ssrf-with-blacklist-based-input-filters">Blacklist-based input filters</a></li>
                    <li><a href="/web-security/ssrf#ssrf-with-whitelist-based-input-filters">Whitelist-based input filters</a></li>
                    <li><a href="/web-security/ssrf#bypassing-ssrf-filters-via-open-redirection">Bypassing filters via open redirection</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/ssrf/blind">Blind SSRF vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/ssrf/blind#what-is-the-impact-of-blind-ssrf-vulnerabilities">Impact</a></li>
                    <li><a href="/web-security/ssrf/blind#how-to-find-and-exploit-blind-ssrf-vulnerabilities">Finding and exploiting blind SSRF</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/ssrf#finding-hidden-attack-surface-for-ssrf-vulnerabilities">Finding hidden attack surface for SSRF</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/ssrf#partial-urls-in-requests">Partial URLs in requests</a></li>
                    <li><a href="/web-security/ssrf#urls-within-data-formats">URLs within data formats</a></li>
                    <li><a href="/web-security/ssrf#ssrf-via-the-referer-header">SSRF via the Referer header</a></li>
                </ul>
            </li>
            <li><a href="/web-security/ssrf/url-validation-bypass-cheat-sheet">URL validation bypass cheat sheet</a></li>
            <li><a href="/web-security/all-labs#server-side-request-forgery-ssrf">View all SSRF labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/ssrf"><span itemprop="name">SSRF</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Server-side request forgery (SSRF)</h1><p>
            In this section we explain what server-side request forgery (SSRF) is, and describe some common examples. We also show you how to find and exploit SSRF vulnerabilities.
        </p><h2 id="what-is-ssrf" chunk-id="E28CDAABE42128410B6D5D4D518873AC">What is SSRF?</h2><p>
            Server-side request forgery is a web security vulnerability that allows an attacker to cause the server-side application to make requests to an unintended location.
        </p><p>
            In a typical SSRF attack, the attacker might cause the server to make a connection to internal-only services within the organization's infrastructure. In other cases, they may be able to force the server to connect to arbitrary external systems. This could leak sensitive data, such as authorization credentials.
        </p><img alt="SSRF" src="/web-security/images/server-side%20request%20forgery.svg"><h2 id="labs" cms-ignore-validation="DUPLICATE_HEADINGS">Labs</h2><p>
                If you're familiar with the basic concepts behind SSRF vulnerabilities and want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access labs in this topic from the link below.
            </p><ul>
            <li><a href="/web-security/all-labs#server-side-request-forgery-ssrf">View all SSRF labs</a></li>
        </ul><h2 id="what-is-the-impact-of-ssrf-attacks" chunk-id="0FD3AAA34BA37F6B8A3F6F8FC50AFF81">What is the impact of SSRF attacks?</h2><p>
            A successful SSRF attack can often result in unauthorized actions or access to data within the organization. This can be in the vulnerable application, or on other back-end systems that the application can communicate with. In some situations, the SSRF vulnerability might allow an attacker to perform arbitrary command execution.
        </p><p>
            An SSRF exploit that causes connections to external third-party systems might result in malicious onward attacks. These can appear to originate from the organization hosting the vulnerable application.
        </p><h2 id="common-ssrf-attacks" chunk-id="8CD8B879C03CABFFF0174F56438286A5">Common SSRF attacks</h2><p>
            SSRF attacks often exploit trust relationships to escalate an attack from the vulnerable application and perform unauthorized actions. These trust relationships might exist in relation to the server, or in relation to other back-end systems within the same organization.
        </p><h3 id="ssrf-attacks-against-the-server" chunk-id="436028183561A17E1875B0DD79536D05">SSRF attacks against the server</h3><p>
            In an SSRF attack against the server, the attacker causes the application to make an HTTP request back to the server that is hosting the application, via its loopback network interface. This typically involves supplying a URL with a hostname like <code>127.0.0.1</code> (a reserved IP address that points to the loopback adapter) or <code>localhost</code> (a commonly used name for the same adapter).
        </p><p>
            For example, imagine a shopping application that lets the user view whether an item is in stock in a particular store. To provide the stock information, the application must query various back-end REST APIs. It does this by passing the URL to the relevant back-end API endpoint via a front-end HTTP request. When a user views the stock status for an item, their browser makes the following request:
        </p><code class="code-scrollable">POST /product/stock HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Content-Length: 118

stockApi=http://stock.weliketoshop.net:8080/product/stock/check%3FproductId%3D6%26storeId%3D1</code><p>
            This causes the server to make a request to the specified URL, retrieve the stock status, and return this to the user.
        </p><p>
            In this example, an attacker can modify the request to specify a URL local to the server:
        </p><code class="code-scrollable">POST /product/stock HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Content-Length: 118

stockApi=http://localhost/admin</code><p>
            The server fetches the contents of the <code>/admin</code> URL and returns it to the user.
        </p><p>
            An attacker can visit the <code>/admin</code> URL, but the administrative functionality is normally only accessible to authenticated users. This means an attacker won't see anything of interest. However, if the request to the <code>/admin</code> URL comes from the local machine, the normal access controls are bypassed. The application grants full access to the administrative functionality, because the request appears to originate from a trusted location.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'C12FEB39A2450B08C055E9E00A51DC9457D91C3B07B1C435D560F7A0A1CD959A'])@verbatim<p id="ssrf-attacks-against-the-server-2P1V" chunk-id="23EFDE77AC95E7DCD1DC71660D869751">
            Why do applications behave in this way, and implicitly trust requests that come from the local machine? This can arise for various reasons:
        </p><ul>
            <li>
                The access control check might be implemented in a different component that sits in front of the application server. When a connection is made back to the server, the check is bypassed.
            </li>
            <li>
                For disaster recovery purposes, the application might allow administrative access without logging in, to any user coming from the local machine. This provides a way for an administrator to recover the system if they lose their credentials. This assumes that only a fully trusted user would come directly from the server.
            </li>
            <li>
                The administrative interface might listen on a different port number to the main application, and might not be reachable directly by users.
            </li>
        </ul><p>
            These kind of trust relationships, where requests originating from the local machine are handled differently than ordinary requests, often make SSRF into a critical vulnerability.
        </p><h3 id="ssrf-attacks-against-other-back-end-systems" chunk-id="30AC8EE71A47B61D17989DD2C845F503">SSRF attacks against other back-end systems</h3><p>
            In some cases, the application server is able to interact with back-end systems that are not directly reachable by users. These systems often have non-routable private IP addresses. The back-end systems are normally protected by the network topology, so they often have a weaker security posture. In many cases, internal back-end systems contain sensitive functionality that can be accessed without authentication by anyone who is able to interact with the systems.
        </p><p>
            In the previous example, imagine there is an administrative interface at the back-end URL <code>http://192.168.0.68/admin</code>. An attacker can submit the following request to exploit the SSRF vulnerability, and access the administrative interface:
        </p><code class="code-scrollable">POST /product/stock HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Content-Length: 118

stockApi=http://192.168.0.68/admin</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '41B2FC5F623CE28DCC489F78C8F94EF2B7DE75258C86CFF17B68ECC861409328'])@verbatim<h2 id="circumventing-common-ssrf-defenses" chunk-id="E569B87E6B88D63C4F7CFCAFCAEE30BE">Circumventing common SSRF defenses</h2><p>
            It is common to see applications containing SSRF behavior together with defenses aimed at preventing malicious exploitation. Often, these defenses can be circumvented.
        </p><h3 id="ssrf-with-blacklist-based-input-filters" chunk-id="92EEA457B17B91B74082463A3D293A4C">SSRF with blacklist-based input filters</h3><p>
            Some applications block input containing hostnames like <code>127.0.0.1</code> and <code>localhost</code>, or sensitive URLs like <code>/admin</code>. In this situation, you can often circumvent the filter using the following techniques:
        </p><ul>
            <li>
                Use an alternative IP representation of <code>127.0.0.1</code>, such as <code>2130706433</code>, <code>017700000001</code>, or <code>127.1</code>.
            </li>
            <li>
                Register your own domain name that resolves to <code>127.0.0.1</code>. You can use <code>spoofed.burpcollaborator.net</code> for this purpose.
            </li>
            <li>
                Obfuscate blocked strings using URL encoding or case variation.
            </li>
            <li>
                Provide a URL that you control, which redirects to the target URL. Try using different redirect codes, as well as different protocols for the target URL. For example, switching from an <code>http:</code> to <code>https:</code> URL during the redirect has been shown to bypass some anti-SSRF filters.
            </li>
        </ul>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'F97F7DF5A96DA8563EDC18E5544B8EF962F8EE47ABD9B9BB3D30706F15BFF341'])@verbatim<h3 id="ssrf-with-whitelist-based-input-filters" chunk-id="97F8A639A6C80B9317B4DB9DA67A4553">SSRF with whitelist-based input filters</h3><p>
            Some applications only allow inputs that match, a whitelist of permitted values. The filter may look for a match at the beginning of the input, or contained within in it. You may be able to bypass this filter by exploiting inconsistencies in URL parsing.
        </p><p>
            The URL specification contains a number of features that are likely to be overlooked when URLs implement ad-hoc parsing and validation using this method:
        </p><ul>
            <li>
                <p>
                    You can embed credentials in a URL before the hostname, using the <code>@</code> character. For example:
                </p>
                <code class="code-scrollable">https://expected-host:fakepassword@evil-host</code>
            </li>
            <li>
                <p>
                    You can use the <code>#</code> character to indicate a URL fragment. For example:
                </p>
                <code class="code-scrollable">https://evil-host#expected-host</code>
            </li>
            <li>
                <p>
                    You can leverage the DNS naming hierarchy to place required input into a fully-qualified DNS name that you control. For example:
                </p>
                <code class="code-scrollable">https://expected-host.evil-host</code>
            </li>
            <li>
                You can URL-encode characters to confuse the URL-parsing code. This is particularly useful if the code that implements the filter handles URL-encoded characters differently than the code that performs the back-end HTTP request. You can also try <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-double-url-encoding">double-encoding</a> characters; some servers recursively URL-decode the input they receive, which can lead to further discrepancies.
            </li>
            <li>
                You can use combinations of these techniques together.
            </li>
        </ul>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '7E946E5CC74A1C4DF272BA01DF0415B53548E0DFDB326D35F1D58E9B38DCBDA4'])@verbatim<div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/blog/top-10-web-hacking-techniques-of-2017#1">A new era of SSRF</a></li></ul></div><h3 id="bypassing-ssrf-filters-via-open-redirection" chunk-id="EFDE7F3DB016062DB747B9A5A8E65ED7">Bypassing SSRF filters via open redirection</h3><p>
            It is sometimes possible to bypass filter-based defenses by exploiting an open redirection vulnerability.
        </p><p>
            In the previous example, imagine the user-submitted URL is strictly validated to prevent malicious exploitation of the SSRF behavior. However, the application whose URLs are allowed contains an open redirection vulnerability. Provided the API used to make the back-end HTTP request supports redirections, you can construct a URL that satisfies the filter and results in a redirected request to the desired back-end target.
        </p><p>
            For example, the application contains an open redirection vulnerability in which the following URL:
        </p><code class="code-scrollable">/product/nextProduct?currentProductId=6&amp;path=http://evil-user.net</code><p>
            returns a redirection to:
        </p><code class="code-scrollable">http://evil-user.net</code><p>
            You can leverage the open redirection vulnerability to bypass the URL filter, and exploit the SSRF vulnerability as follows:
        </p><code class="code-scrollable">POST /product/stock HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Content-Length: 118

stockApi=http://weliketoshop.net/product/nextProduct?currentProductId=6&amp;path=http://192.168.0.68/admin</code><p>
            This SSRF exploit works because the application first validates that the supplied <code>stockAPI</code> URL is on an allowed domain, which it is. The application then requests the supplied URL, which triggers the open redirection. It follows the redirection, and makes a request to the internal URL of the attacker's choosing.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '3BD839053DB0960DAF7046201A4B58936BA21CBB4A15840DB8237690EB2C4BE7'])@verbatim<h2 id="blind-ssrf-vulnerabilities" chunk-id="897DC0CA7893B46F57B60742DCCD848A" cms-ignore-validation="DUPLICATE_HEADINGS">Blind SSRF vulnerabilities</h2><p>
            Blind SSRF vulnerabilities occur if you can cause an application to issue a back-end HTTP request to a supplied URL, but the response from the back-end request is not returned in the application's front-end response.
        </p><p>
            Blind SSRF is harder to exploit but sometimes leads to full remote code execution on the server or other back-end components.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/ssrf/blind">Finding and exploiting blind SSRF vulnerabilities</a></li></ul></div><h2 id="finding-hidden-attack-surface-for-ssrf-vulnerabilities" chunk-id="2C62CAAD15C9151092AC6CC0537612E6">Finding hidden attack surface for SSRF vulnerabilities</h2><p>
            Many server-side request forgery vulnerabilities are easy to find, because the application's normal traffic involves request parameters containing full URLs. Other examples of SSRF are harder to locate.
        </p><h3 id="partial-urls-in-requests" chunk-id="79CFE8DB42C38EA78A5B5186C14033C8">Partial URLs in requests</h3><p>
            Sometimes, an application places only a hostname or part of a URL path into request parameters. The value submitted is then incorporated server-side into a full URL that is requested. If the value is readily recognized as a hostname or URL path, the potential attack surface might be obvious. However, exploitability as full SSRF might be limited because you do not control the entire URL that gets requested.
        </p><h3 id="urls-within-data-formats" chunk-id="E9815F390CE0D80923B1C2A2722B138B">URLs within data formats</h3><p>
            Some applications transmit data in formats with a specification that allows the inclusion of URLs that might get requested by the data parser for the format. An obvious example of this is the XML data format, which has been widely used in web applications to transmit structured data from the client to the server. When an application accepts data in XML format and parses it, it might be vulnerable to XXE injection. It might also be vulnerable to SSRF via XXE. We'll cover this in more detail when we look at XXE injection vulnerabilities.
        </p><h3 id="ssrf-via-the-referer-header" chunk-id="DEA5DFF4856445851D3A263FDFB1FB33">SSRF via the Referer header</h3><p>
            Some applications use server-side analytics software to track visitors. This software often logs the Referer header in requests, so it can track incoming links. Often the analytics software visits any third-party URLs that appear in the Referer header. This is typically done to analyze the contents of referring sites, including the anchor text that is used in the incoming links. As a result, the Referer header is often a useful attack surface for SSRF vulnerabilities.
        </p><p id="ssrf-via-the-referer-header-V2L8">
            See <a href="/web-security/ssrf/blind">Blind SSRF vulnerabilities</a> for examples of vulnerabilities involving the Referer header.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul>
            <li><a href="/blog/cracking-the-lens-targeting-https-hidden-attack-surface#aux">Cracking the lens: Targeting auxiliary systems</a></li>
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
