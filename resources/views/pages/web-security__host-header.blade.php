@extends('layouts.academy')

@section('title', 'HTTP Host header attacks | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="24">
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
        <h3>HTTP Host header attacks</h3>
        <ul>
            <li><a href="/web-security/host-header#what-is-the-http-host-header">What is the HTTP host header?</a></li>
            <li><a href="/web-security/host-header#what-is-an-http-host-header-attack">What is an HTTP Host header attack?</a></li>
            <li><a href="/web-security/host-header#how-do-http-host-header-vulnerabilities-arise">How vulnerabilities arise</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/host-header/exploiting#how-to-test-for-vulnerabilities-using-the-http-host-header">Testing for vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/host-header/exploiting#supply-an-arbitrary-host-header">Supply an arbitrary Host header</a></li>
                    <li><a href="/web-security/host-header/exploiting#check-for-flawed-validation">Check for flawed validation</a></li>
                    <li><a href="/web-security/host-header/exploiting#send-ambiguous-requests">Send ambiguous requests</a></li>
                    <li><a href="/web-security/host-header/exploiting#inject-host-override-headers">Inject host override headers</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/host-header/exploiting#how-to-exploit-the-http-host-header">Exploiting vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-3">
                        <label for="sub-nav-id-3">
                            <a href="/web-security/host-header/exploiting/password-reset-poisoning">Password reset poisoning</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/host-header/exploiting/password-reset-poisoning#how-does-a-password-reset-work">How does a password reset work?</a></li>
                            <li><a href="/web-security/host-header/exploiting/password-reset-poisoning#how-to-construct-a-password-reset-poisoning-attack">Constructing an attack</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/host-header/exploiting#web-cache-poisoning-via-the-host-header">Web cache poisoning</a></li>
                    <li><a href="/web-security/host-header/exploiting#exploiting-classic-server-side-vulnerabilities">Exploiting classic server-side vulnerabilities</a></li>
                    <li><a href="/web-security/host-header/exploiting#accessing-restricted-functionality">Bypassing authentication</a></li>
                    <li><a href="/web-security/host-header/exploiting#accessing-internal-websites-with-virtual-host-brute-forcing">Virtual host brute-forcing</a></li>
                    <li><a href="/web-security/host-header/exploiting#routing-based-ssrf">Routing-based SSRF</a></li>
                    <li><a href="/web-security/host-header/exploiting#connection-state-attacks">Connection state attacks</a></li>
                    <li><a href="/web-security/host-header/exploiting#ssrf-via-a-malformed-request-line">SSRF via a malformed request line</a></li>
                </ul>
            </li>
            <li><a href="/web-security/host-header#how-to-prevent-http-host-header-attacks">Preventing vulnerabilities</a></li>
            <li><a href="/web-security/all-labs#http-host-header-attacks">View all HTTP Host header labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/host-header"><span itemprop="name">HTTP Host header attacks</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">HTTP Host header attacks</h1><p>
            In this section, we'll discuss how misconfigurations and flawed business logic can expose websites to a variety of attacks via the HTTP Host header. We'll outline the high-level methodology for identifying websites that are vulnerable to HTTP Host header attacks and demonstrate how you can exploit this for the following kinds of attacks:
        </p><ul>
            <li>
                <a href="/web-security/host-header/exploiting/password-reset-poisoning">Password reset poisoning</a> <span class="label-light-green-small">LABS</span>
            </li>
            <li>
                <a href="/web-security/host-header/exploiting#web-cache-poisoning-via-the-host-header">Web cache poisoning</a> <span class="label-light-green-small">LABS</span>
            </li>
            <li>
                <a href="/web-security/host-header/exploiting#exploiting-classic-server-side-vulnerabilities">Exploiting classic server-side vulnerabilities</a>
            </li>
            <li>
                <a href="/web-security/host-header/exploiting#accessing-restricted-functionality">Bypassing authentication</a> <span class="label-light-green-small">LABS</span>
            </li>
            <li>
                <a href="/web-security/host-header/exploiting#accessing-internal-websites-with-virtual-host-brute-forcing">Virtual host brute-forcing</a>
            </li>
            <li>
                <a href="/web-security/host-header/exploiting#routing-based-ssrf">Routing-based SSRF</a> <span class="label-light-green-small">LABS</span>
            </li>
            <li>
                <a href="/web-security/host-header/exploiting#connection-state-attacks">Connection state attacks</a> <span class="label-light-green-small">LABS</span>
            </li>
        </ul><img alt="Host header attack" class="center-block" src="/web-security/images/host-header-attacks.jpg"><div class="highlightedarea">
            <h4>Labs</h4>
            <p>
                If you're already familiar with the basic concepts behind HTTP Host header vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
            </p>
            
        <ul><li><a href="/web-security/all-labs#http-host-header-attacks">View all HTTP Host header labs</a></li></ul></div><h2 id="what-is-the-http-host-header">What is the HTTP Host header?</h2><p>
            The HTTP Host header is a mandatory request header as of HTTP/1.1. It specifies the domain name that the client wants to access. For example, when a user visits <code>/web-security</code>, their browser will compose a request containing a Host header as follows:
        </p><code class="code-scrollable">GET /web-security HTTP/1.1
Host: portswigger.net</code><p>
            In some cases, such as when the request has been forwarded by an intermediary system, the Host value may be altered before it reaches the intended back-end component. We will discuss this scenario in more detail below.
        </p><h2 id="what-is-the-purpose-of-the-http-host-header">What is the purpose of the HTTP Host header?</h2><p>
            The purpose of the HTTP Host header is to help identify which back-end component the client wants to communicate with. If requests didn't contain Host headers, or if the Host header was malformed in some way, this could lead to issues when routing incoming requests to the intended application.
        </p><p>
            Historically, this ambiguity didn't exist because each IP address would only host content for a single domain. Nowadays, largely due to the ever-growing trend for cloud-based solutions and outsourcing much of the related architecture, it is common for multiple websites and applications to be accessible at the same IP address. This approach has also increased in popularity partly as a result of IPv4 address exhaustion.
        </p><p>
            When multiple applications are accessible via the same IP address, this is most commonly a result of one of the following scenarios.
        </p><h3 id="virtual-hosting">Virtual hosting</h3><p>
            One possible scenario is when a single web server hosts multiple websites or applications. This could be multiple websites with a single owner, but it is also possible for websites with different owners to be hosted on a single, shared platform. This is less common than it used to be, but still occurs with some cloud-based SaaS solutions.
        </p><p>
            In either case, although each of these distinct websites will have a different domain name, they all share a common IP address with the server. Websites hosted in this way on a single server are known as &quot;virtual hosts&quot;.
        </p><p>
            To a normal user accessing the website, a virtual host is often indistinguishable from a website being hosted on its own dedicated server.
        </p><h3 id="routing-traffic-via-an-intermediary">Routing traffic via an intermediary</h3><p>
            Another common scenario is when websites are hosted on distinct back-end servers, but all traffic between the client and servers is routed through an intermediary system. This could be a simple load balancer or a reverse proxy server of some kind. This setup is especially prevalent in cases where clients access the website via a content delivery network (CDN).
        </p><p>
            In this case, even though the websites are hosted on separate back-end servers, all of their domain names resolve to a single IP address of the intermediary component. This presents some of the same challenges as virtual hosting because the reverse proxy or load balancer needs to know the appropriate back-end to which it should route each request.
        </p><h3 id="how-does-the-http-host-header-solve-this-problem">How does the HTTP Host header solve this problem?</h3><p>
            In both of these scenarios, the Host header is relied on to specify the intended recipient. A common analogy is the process of sending a letter to somebody who lives in an apartment building. The entire building has the same street address, but behind this street address there are many different apartments that each need to receive the correct mail somehow. One solution to this problem is simply to include the apartment number or the recipient's name in the address. In the case of HTTP messages, the Host header serves a similar purpose.
        </p><p>
            When a browser sends the request, the target URL will resolve to the IP address of a particular server. When this server receives the request, it refers to the Host header to determine the intended back-end and forwards the request accordingly.
        </p><h2 id="what-is-an-http-host-header-attack">What is an HTTP Host header attack?</h2><p>
            HTTP Host header attacks exploit vulnerable websites that handle the value of the Host header in an unsafe way. If the server implicitly trusts the Host header, and fails to validate or escape it properly, an attacker may be able to use this input to inject harmful payloads that manipulate server-side behavior. Attacks that involve injecting a payload directly into the Host header are often known as &quot;Host header injection&quot; attacks.
        </p><p>
            Off-the-shelf web applications typically don't know what domain they are deployed on unless it is manually specified in a configuration file during setup. When they need to know the current domain, for example, to generate an absolute URL included in an email, they may resort to retrieving the domain from the Host header:
        </p><code class="code-scrollable">&lt;a href=&quot;https://_SERVER['HOST']/support&quot;&gt;Contact support&lt;/a&gt;</code><p>
            The header value may also be used in a variety of interactions between different systems of the website's infrastructure.
        </p><p>
            As the Host header is in fact user controllable, this practice can lead to a number of issues. If the input is not properly escaped or validated, the Host header is a potential vector for exploiting a range of other vulnerabilities, most notably:
        </p><ul>
            <li>
                Web cache poisoning
            </li>
            <li>
                Business logic flaws in specific functionality
            </li>
            <li>
                Routing-based SSRF
            </li>
            <li>
                Classic server-side vulnerabilities, such as SQL injection
            </li>
        </ul><h2 id="how-do-http-host-header-vulnerabilities-arise">How do HTTP Host header vulnerabilities arise?</h2><p>
            HTTP Host header vulnerabilities typically arise due to the flawed assumption that the header is not user controllable. This creates implicit trust in the Host header and results in inadequate validation or escaping of its value, even though an attacker can easily modify this using tools like Burp Proxy.
        </p><p>
            Even if the Host header itself is handled more securely, depending on the configuration of the servers that deal with incoming requests, the Host can potentially be overridden by injecting other headers. Sometimes website owners are unaware that these headers are supported by default and, as a result, they may not be treated with the same level of scrutiny.
        </p><p>
            In fact, many of these vulnerabilities arise not because of insecure coding but because of insecure configuration of one or more components in the related infrastructure. These configuration issues can occur because websites integrate third-party technologies into their architecture without necessarily understanding the configuration options and their security implications.
        </p><h2 id="exploiting-http-host-header-vulnerabilities">Exploiting HTTP Host header vulnerabilities</h2><p>
            By now, you should have a good understanding of what the HTTP Host header is. For pentesters and bug bounty hunters, we've created some additional guidance on how you can identify and exploit these kinds of vulnerabilities for yourself. We've also provided some deliberately vulnerable <span class="label-light-green-small">LABS</span> so that you can practice some of these techniques.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/host-header/exploiting">How to identify and exploit HTTP Host header vulnerabilities</a></li></ul></div><h2 id="how-to-prevent-http-host-header-attacks">How to prevent HTTP Host header attacks</h2><p>
            To prevent HTTP Host header attacks, the simplest approach is to avoid using the Host header altogether in server-side code. Double-check whether each URL really needs to be absolute. You will often find that you can just use a relative URL instead. This simple change can help you prevent web cache poisoning vulnerabilities in particular.
        </p><p>
            Other ways to prevent HTTP Host header attacks include:
        </p><h5>Protect absolute URLs</h5><p>
            When you have to use absolute URLs, you should require the current domain to be manually specified in a configuration file and refer to this value instead of the Host header. This approach would eliminate the threat of password reset poisoning, for example.
        </p><h5>Validate the Host header</h5><p>
            If you must use the Host header, make sure you validate it properly. This should involve checking it against a whitelist of permitted domains and rejecting or redirecting any requests for unrecognized hosts. You should consult the documentation of your framework for guidance on how to do this. For example, the Django framework provides the <code>ALLOWED_HOSTS</code> option in the settings file. This approach will reduce your exposure to Host header injection attacks.
        </p><h5>Don't support Host override headers</h5><p>
            It is also important to check that you do not support additional headers that may be used to construct these attacks, in particular <code>X-Forwarded-Host</code>. Remember that these may be supported by default.
        </p><h5>Whitelist permitted domains</h5><p>
            To prevent routing-based attacks on internal infrastructure, you should configure your load balancer or any reverse proxies to forward requests only to a whitelist of permitted domains.
        </p><h5>Be careful with internal-only virtual hosts</h5><p>
            When using virtual hosting, you should avoid hosting internal-only websites and applications on the same server as public-facing content. Otherwise, attackers may be able to access internal domains via Host header manipulation.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
