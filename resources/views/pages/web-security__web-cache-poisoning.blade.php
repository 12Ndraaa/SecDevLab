@extends('layouts.academy')

@section('title', 'Web cache poisoning | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="39">
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
        <h3>Web cache poisoning</h3>
        <ul>
            <li><a href="/web-security/web-cache-poisoning#what-is-web-cache-poisoning">What is web cache poisoning?</a></li>
            <li><a href="/web-security/web-cache-poisoning#how-does-a-web-cache-work">How does a web cache work?</a></li>
            <li><a href="/web-security/web-cache-poisoning#what-is-the-impact-of-a-web-cache-poisoning-attack">Impact of web cache poisoning</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/web-cache-poisoning#constructing-a-web-cache-poisoning-attack">Constructing an attack</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-2">
                        <label for="sub-nav-id-2">
                            <a href="/web-security/web-cache-poisoning#identify-and-evaluate-unkeyed-inputs">Identify and evaluate unkeyed inputs</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/web-cache-poisoning#param-miner">Param Miner</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/web-cache-poisoning#elicit-a-harmful-response-from-the-back-end-server">Elicit a harmful response</a></li>
                    <li><a href="/web-security/web-cache-poisoning#get-the-response-cached">Get the response cached</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/web-cache-poisoning/exploiting-design-flaws">Exploiting cache design flaws</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-deliver-an-xss-attack">Delivering an XSS attack</a></li>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-exploit-unsafe-handling-of-resource-imports">Exploit unsafe handling of resource imports</a></li>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-exploit-cookie-handling-vulnerabilities">Exploit cookie-handling vulnerabilities</a></li>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-multiple-headers-to-exploit-web-cache-poisoning-vulnerabilities">Using multiple headers</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-4">
                        <label for="sub-nav-id-4">
                            <a href="/web-security/web-cache-poisoning/exploiting-design-flaws#exploiting-responses-that-expose-too-much-information">Responses that expose too much information</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#cache-control-directives">Cache-control directives</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#vary-header">Vary header</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#using-web-cache-poisoning-to-exploit-dom-based-vulnerabilities">Exploiting DOM-based vulnerabilities</a></li>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws#chaining-web-cache-poisoning-vulnerabilities">Chaining web-cache poisoning vulnerabilities</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws">Exploiting cache implementation flaws</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-key-flaws">Key flaws</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-6">
                        <label for="sub-nav-id-6">
                            <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-probing-methodology">Probing for flaws</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#identify-a-suitable-cache-oracle">Identifying a suitable cache oracle</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#probe-key-handling">Probe key handling</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#identify-an-exploitable-gadget">Identifying an exploitable gadget</a></li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-7">
                        <label for="sub-nav-id-7">
                            <a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#exploiting-cache-key-flaws">Exploiting cache key flaws</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#unkeyed-port">Unkeyed port</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#unkeyed-query-string">Unkeyed query string</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-parameter-cloaking">Cache parameter cloaking</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#normalized-cache-keys">Normalized cache keys</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#cache-key-injection">Cache key injection</a></li>
                            <li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws#poisoning-internal-caches">Poisoning internal caches</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="/web-security/web-cache-poisoning#how-to-prevent-web-cache-poisoning-vulnerabilities">Preventing vulnerabilities</a></li>
            <li><a href="/web-security/web-cache-poisoning#web-cache-poisoning-research">Research</a></li>
            <li><a href="/web-security/all-labs#web-cache-poisoning">View all web cache poisoning labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/web-cache-poisoning"><span itemprop="name">Web cache poisoning</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Web cache poisoning</h1><p>
            In this section, we'll talk about what web cache poisoning is and what behaviors can lead to web cache poisoning vulnerabilities. We'll also look at some ways of exploiting these vulnerabilities and suggest ways you can reduce your exposure to them.
        </p><h2 id="what-is-web-cache-poisoning">What is web cache poisoning?</h2><p>
            Web cache poisoning is an advanced technique whereby an attacker exploits the behavior of a web server and cache so that a harmful HTTP response is served to other users.
        </p><p>
            Fundamentally, web cache poisoning involves two phases. First, the attacker must work out how to elicit a response from the back-end server that inadvertently contains some kind of dangerous payload. Once successful, they need to make sure that their response is cached and subsequently served to the intended victims.
        </p><p>
            A poisoned web cache can potentially be a devastating means of distributing numerous different attacks, exploiting vulnerabilities such as XSS, JavaScript injection, open redirection, and so on.
        </p><div class="highlightedarea">
            <h4>Labs</h4>
            <p>
                If you're already familiar with the basic concepts behind web cache poisoning and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
            </p>
            
        <ul><li><a href="/web-security/all-labs#web-cache-poisoning">View all web cache poisoning labs</a></li></ul></div><h3 id="web-cache-poisoning-research">Web cache poisoning research</h3><p>
			This technique was first popularized by our 2018 research paper, "Practical Web Cache Poisoning", and developed further in 2020 with a second research paper, "Web Cache Entanglement: Novel Pathways to Poisoning". If you're interested in a detailed description of how we discovered and exploited these vulnerabilities in the wild, the full write-ups are available on our research page.
		</p><div class="highlightedarea">
			<h4>Research</h4>
			<ul>
                <li>
				    <a href="/research/practical-web-cache-poisoning">Practical Web Cache Poisoning</a>
			    </li>
                <li>
                    <a href="/research/web-cache-entanglement">Web Cache Entanglement: Novel Pathways to Poisoning</a>
                </li>
            </ul>
		</div><h3 id="how-does-a-web-cache-work">How does a web cache work?</h3><p>
            To understand how web cache poisoning vulnerabilities arise, it is important to have a basic understanding of how web caches work.
        </p><p>
            If a server had to send a new response to every single HTTP request separately, this would likely overload the server, resulting in latency issues and a poor user experience, especially during busy periods. Caching is primarily a means of reducing such issues.
        </p><p>
            The cache sits between the server and the user, where it saves (caches) the responses to particular requests, usually for a fixed amount of time. If another user then sends an equivalent request, the cache simply serves a copy of the cached response directly to the user, without any interaction from the back-end. This greatly eases the load on the server by reducing the number of duplicate requests it has to handle.
        </p><img alt="Normal cache behavior" src="/web-security/images/caching.svg"><h4>Cache keys</h4><p>
            When the cache receives an HTTP request, it first has to determine whether there is a cached response that it can serve directly, or whether it has to forward the request for handling by the back-end server. Caches identify equivalent requests by comparing a predefined subset of the request's components, known collectively as the &quot;cache key&quot;. Typically, this would contain the request line and <code>Host</code> header. Components of the request that are not included in the cache key are said to be &quot;unkeyed&quot;.
        </p><p>
            If the cache key of an incoming request matches the key of a previous request, then the cache considers them to be equivalent. As a result, it will serve a copy of the cached response that was generated for the original request. This applies to all subsequent requests with the matching cache key, until the cached response expires.
        </p><p>
            Crucially, the other components of the request are ignored altogether by the cache. We'll explore the impact of this behavior in more detail later.
        </p><h2 id="what-is-the-impact-of-a-web-cache-poisoning-attack">What is the impact of a web cache poisoning attack?</h2><p>
            The impact of web cache poisoning is heavily dependent on two key factors:
        </p><ul>
			<li>
				<strong>What exactly the attacker can successfully get cached</strong><br>
				As the poisoned cache is more a means of distribution than a standalone attack, the impact of web cache poisoning is inextricably linked to how harmful the injected payload is. As with most kinds of attack, web cache poisoning can also be used in combination with other attacks to escalate the potential impact even further.
			</li>
			<li>
				<strong>The amount of traffic on the affected page</strong><br>
				The poisoned response will only be served to users who visit the affected page while the cache is poisoned. As a result, the impact can range from non-existent to massive depending on whether the page is popular or not. If an attacker managed to poison a cached response on the home page of a major website, for example, the attack could affect thousands of users without any subsequent interaction from the attacker.
			</li>
		</ul><p>
            Note that the duration of a cache entry doesn't necessarily affect the impact of web cache poisoning. An attack can usually be scripted in such a way that it re-poisons the cache indefinitely.
        </p><h2 id="constructing-a-web-cache-poisoning-attack">Constructing a web cache poisoning attack</h2><p>
            Generally speaking, constructing a basic web cache poisoning attack involves the following steps:
        </p><ol>
			<li><a href="/web-security/web-cache-poisoning#identify-and-evaluate-unkeyed-inputs">Identify and evaluate unkeyed inputs</a></li>
			<li><a href="/web-security/web-cache-poisoning#elicit-a-harmful-response-from-the-back-end-server">Elicit a harmful response from the back-end server</a></li>
			<li><a href="/web-security/web-cache-poisoning#get-the-response-cached">Get the response cached</a></li>
		</ol><h3 id="identify-and-evaluate-unkeyed-inputs">Identify and evaluate unkeyed inputs</h3><p>
            Any web cache poisoning attack relies on manipulation of unkeyed inputs, such as headers. Web caches ignore unkeyed inputs when deciding whether to serve a cached response to the user. This behavior means that you can use them to inject your payload and elicit a &quot;poisoned&quot; response which, if cached, will be served to all users whose requests have the matching cache key. Therefore, the first step when constructing a web cache poisoning attack is identifying unkeyed inputs that are supported by the server.
        </p><p>
            You can identify unkeyed inputs manually by adding random inputs to requests and observing whether or not they have an effect on the response. This can be obvious, such as reflecting the input in the response directly, or triggering an entirely different response. However, sometimes the effects are more subtle and require a bit of detective work to figure out. You can use tools such as Burp Comparer to compare the response with and without the injected input, but this still involves a significant amount of manual effort.
        </p><h4 id="param-miner">Param Miner</h4><p>
            Fortunately, you can automate the process of identifying unkeyed inputs by adding the <a href="/bappstore/17d2949a985c4b7ca092728dba871943">Param Miner</a> extension to Burp from the BApp store. To use Param Miner, you simply right-click on a request that you want to investigate and click "Guess headers". Param Miner then runs in the background, sending requests containing different inputs from its extensive, built-in list of headers. If a request containing one of its injected inputs has an effect on the response, Param Miner logs this in Burp, either in the "Issues" pane if you are using Burp Suite Professional, or in the "Output" tab of the extension ("Extensions" &gt; "Installed" &gt; "Param Miner" &gt; "Output") if you are using Burp Suite Community Edition.
		</p><p>
			For example, in the following screenshot, Param Miner found an unkeyed header <code>X-Forwarded-Host</code> on the home page of the website:
		</p><div class="rounded-dropshadow">
		    <img alt="Param miner" src="/web-security/images/param-miner.png">
        </div><p>
            <strong>Caution:</strong> When testing for unkeyed inputs on a live website, there is a risk of inadvertently causing the cache to serve your generated responses to real users. Therefore, it is important to make sure that your requests all have a unique cache key so that they will only be served to you. To do this, you can manually add a cache buster (such as a unique parameter) to the request line each time you make a request. Alternatively, if you are using Param Miner, there are options for automatically adding a cache buster to every request.
        </p><h3 id="elicit-a-harmful-response-from-the-back-end-server">Elicit a harmful response from the back-end server</h3><p>
            Once you have identified an unkeyed input, the next step is to evaluate exactly how the website processes it. Understanding this is essential to successfully eliciting a harmful response. If an input is reflected in the response from the server without being properly sanitized, or is used to dynamically generate other data, then this is a potential entry point for web cache poisoning.
        </p><h3 id="get-the-response-cached">Get the response cached</h3><p>
            Manipulating inputs to elicit a harmful response is half the battle, but it doesn't achieve much unless you can cause the response to be cached, which can sometimes be tricky.
        </p><p>
            Whether or not a response gets cached can depend on all kinds of factors, such as the file extension, content type, route, status code, and response headers. You will probably need to devote some time to simply playing around with requests on different pages and studying how the cache behaves. Once you work out how to get a response cached that contains your malicious input, you are ready to deliver the exploit to potential victims.
        </p><img alt="web cache poisoning" src="/web-security/images/cache-poisoning.svg"><h2 id="exploiting-web-cache-poisoning-vulnerabilities">Exploiting web cache poisoning vulnerabilities</h2><p>
			This basic process can be used to discover and exploit a variety of different web cache poisoning vulnerabilities.
		</p><p>
			In some cases, web cache poisoning vulnerabilities arise due to general flaws in the design of caches. Other times, the way in which a cache is implemented by a specific website can introduce unexpected quirks that can be exploited.
        </p><p>
            In the following sections, we'll outline some of the most common examples of both of these scenarios. We've also provided a number of interactive labs so that you can see some of these vulnerabilities in action and practice exploiting them.
		</p><div class="highlightedarea">
			<h4>Read more</h4>
			
			
		<ul><li><a href="/web-security/web-cache-poisoning/exploiting-design-flaws">Exploiting cache design flaws</a></li><li><a href="/web-security/web-cache-poisoning/exploiting-implementation-flaws">Exploiting cache implementation flaws</a></li></ul></div><h2 id="how-to-prevent-web-cache-poisoning-vulnerabilities">How to prevent web cache poisoning vulnerabilities</h2><p>
            The definitive way to prevent web cache poisoning would clearly be to disable caching altogether. While for many websites this might not be a realistic option, in other cases, it might be feasible. For example, if you only use caching because it was switched on by default when you adopted a CDN, it might be worth evaluating whether the default caching options really do reflect your needs.
        </p><p>
            Even if you do need to use caching, restricting it to purely static responses is also effective, provided you are sufficiently wary about what you class as &quot;static&quot;. For instance, make sure that an attacker can't trick the back-end server into retrieving their malicious version of a static resource instead of the genuine one.
        </p><p>
            This is also related to a wider point about web security. Most websites now incorporate a variety of third-party technologies into both their development processes and day-to-day operations. No matter how robust your own internal security posture may be, as soon as you incorporate third-party technology into your environment, you are relying on its developers also being as security-conscious as you are. On the basis that you are only as secure as your weakest point, it is vital to make sure that you fully understand the security implications of any third-party technology before you integrate it.
        </p><p>
            Specifically in the context of web cache poisoning, this not only means deciding whether to leave caching switched on by default, but also looking at which headers are supported by your CDN, for example. Several of the web cache poisoning vulnerabilities discussed above are exposed because an attacker is able to manipulate a series of obscure request headers, many of which are entirely unnecessary for the website's functionality. Again, you may be exposing yourself to these kinds of attacks without realizing, purely because you have implemented some technology that supports these unkeyed inputs by default. If a header isn't needed for the site to work, then it should be disabled.
        </p><p>
            You should also take the following precautions when implementing caching:
        </p><ul>
            <li>
                If you are considering excluding something from the cache key for performance reasons, rewrite the request instead.
            </li>
            <li>
                Don't accept fat <code>GET</code> requests. Be aware that some third-party technologies may permit this by default.</li>
            <li>
                Patch client-side vulnerabilities even if they seem unexploitable. Some of these vulnerabilities might actually be exploitable due to unpredictable quirks in your cache's behavior. It could be a matter of time before someone finds a quirk, whether it be cache-based or otherwise, that makes this vulnerability exploitable.</li>
        </ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
