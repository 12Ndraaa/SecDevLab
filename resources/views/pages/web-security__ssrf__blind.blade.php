@extends('layouts.academy')

@section('title', 'Blind SSRF vulnerabilities | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/ssrf"><span itemprop="name">SSRF</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/ssrf/blind"><span itemprop="name">Blind</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Blind SSRF vulnerabilities</h1><p>
            In this section, we'll explain what blind server-side request forgery is, describe some common blind SSRF examples, and explain how to find and exploit blind SSRF vulnerabilities.
        </p><h2 id="what-is-blind-ssrf">What is blind SSRF?</h2><p>
            Blind SSRF vulnerabilities arise when an application can be induced to issue a back-end HTTP request to a supplied URL, but the response from the back-end request is not returned in the application's front-end response.
        </p><h2 id="what-is-the-impact-of-blind-ssrf-vulnerabilities" chunk-id="680530EB0B8DBAAD69FAF716184FF333">What is the impact of blind SSRF vulnerabilities?</h2><p>
            The impact of blind SSRF vulnerabilities is often lower than fully informed SSRF vulnerabilities because of their one-way nature. They cannot be trivially exploited to retrieve sensitive data from back-end systems, although in some situations they can be exploited to achieve full remote code execution.
        </p><h2 id="how-to-find-and-exploit-blind-ssrf-vulnerabilities" chunk-id="617C56F3685EB711E7095CEA704D84FD">How to find and exploit blind SSRF vulnerabilities</h2><p>
            The most reliable way to detect blind SSRF vulnerabilities is using out-of-band (OAST) techniques. This involves attempting to trigger an HTTP request to an external system that you control, and monitoring for network interactions with that system.
        </p><p>
            The easiest and most effective way to use out-of-band techniques is using <a href="/web-security/all-labs">Burp Collaborator</a>. You can use <a href="/web-security/all-labs">Burp Collaborator</a> to generate unique domain names, send these in payloads to the application, and monitor for any interaction with those domains. If an incoming HTTP request is observed coming from the application, then it is vulnerable to SSRF.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                It is common when testing for SSRF vulnerabilities to observe a DNS look-up for the supplied Collaborator domain, but no subsequent HTTP request. This typically happens because the application attempted to make an HTTP request to the domain, which caused the initial DNS lookup, but the actual HTTP request was blocked by network-level filtering. It is relatively common for infrastructure to allow outbound DNS traffic, since this is needed for so many purposes, but block HTTP connections to unexpected destinations.
            </p>
        </div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '47869588C5B299D864F0E0FB23D97CB0BA5C5A686FCDC0DE3A03637DAF1BA3AF'])@verbatim<p id="how-to-find-and-exploit-blind-ssrf-vulnerabilities-I4A9" chunk-id="3BF6D3F14A5EAA83FD63D27BE051FC5D">
            Simply identifying a blind SSRF vulnerability that can trigger out-of-band HTTP requests doesn't in itself provide a route to exploitability. Since you cannot view the response from the back-end request, the behavior can't be used to explore content on systems that the application server can reach. However, it can still be leveraged to probe for other vulnerabilities on the server itself or on other back-end systems. You can blindly sweep the internal IP address space, sending payloads designed to detect well-known vulnerabilities. If those payloads also employ blind out-of-band techniques, then you might uncover a critical vulnerability on an unpatched internal server.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'D453C6B39EFC515EB918548D6FF29DDDE86D0D0361AB5453B626309DE0E3A958'])@verbatim<p>
            Another avenue for exploiting blind SSRF vulnerabilities is to induce the application to connect to a system under the attacker's control, and return malicious responses to the HTTP client that makes the connection. If you can exploit a serious client-side vulnerability in the server's HTTP implementation, you might be able to achieve remote code execution within the application infrastructure.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="https://portswigger.net/blog/cracking-the-lens-targeting-https-hidden-attack-surface#remoteclient">Cracking the lens: Remote client exploits</a></li></ul></div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
