@extends('layouts.academy')

@section('title', 'DOM-based vulnerabilities | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="19">
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
        <h3>DOM-based vulnerabilities</h3>
        <ul>
            <li><a href="/web-security/dom-based#what-is-the-dom">What is the DOM?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/dom-based#what-is-taint-flow">Taint flow</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-2">
                        <label for="sub-nav-id-2">
                            <a href="/web-security/dom-based#common-sources">Sources</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/cross-site-scripting/dom-based#dom-xss-combined-with-reflected-and-stored-data">Reflected
                                and stored data</a></li>
                            <li><a href="/web-security/dom-based/controlling-the-web-message-source">Web messages</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/dom-based#which-sinks-can-lead-to-dom-based-vulnerabilities">Example
                        sinks</a></li>
                </ul>
            </li>
            <li><a href="/web-security/cross-site-scripting/dom-based">DOM-based XSS</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-7">
                <label for="sub-nav-id-7">
                    <a href="/web-security/dom-based/open-redirection">Open redirection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/open-redirection#what-is-the-impact-of-dom-based-open-redirection">Impact</a></li>
                    <li><a href="/web-security/dom-based/open-redirection#which-sinks-can-lead-to-dom-based-open-redirection-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/open-redirection#how-to-prevent-dom-based-open-redirection-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-8">
                <label for="sub-nav-id-8">
                    <a href="/web-security/dom-based/cookie-manipulation">Cookie manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/cookie-manipulation#what-is-the-impact-of-a-dom-based-cookie-manipulation-attack">Impact</a></li>
                    <li><a href="/web-security/dom-based/cookie-manipulation#which-sinks-can-lead-to-dom-based-cookie-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/cookie-manipulation#how-to-prevent-dom-based-cookie-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-9">
                <label for="sub-nav-id-9">
                    <a href="/web-security/dom-based/javascript-injection">JavaScript injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/javascript-injection#what-is-the-impact-of-a-dom-based-javascript-injection-attack">Impact</a></li>
                    <li><a href="/web-security/dom-based/javascript-injection#which-sinks-can-lead-to-dom-based-javascript-injection-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/javascript-injection#how-to-prevent-dom-based-javascript-injection-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-10">
                <label for="sub-nav-id-10">
                    <a href="/web-security/dom-based/document-domain-manipulation">Document-domain manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/document-domain-manipulation#which-sinks-can-lead-to-dom-based-document-domain-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/document-domain-manipulation#how-to-prevent-dom-based-document-domain-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-11">
                <label for="sub-nav-id-11">
                    <a href="/web-security/dom-based/websocket-url-poisoning">WebSocket-URL poisoning</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/websocket-url-poisoning#what-is-the-impact-of-websocket-url-poisoning">Impact</a></li>
                    <li><a href="/web-security/dom-based/websocket-url-poisoning#which-sinks-can-lead-to-websocket-url-poisoning-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/websocket-url-poisoning#how-to-prevent-dom-based-websocket-url-poisoning-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-12">
                <label for="sub-nav-id-12">
                    <a href="/web-security/dom-based/link-manipulation">Link manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/link-manipulation#what-is-the-impact-of-a-dom-based-link-manipulation-attack">Impact</a></li>
                    <li><a href="/web-security/dom-based/link-manipulation#which-sinks-can-lead-to-dom-based-link-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/link-manipulation#how-to-prevent-dom-based-link-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-13">
                <label for="sub-nav-id-13">
                    <a href="/web-security/dom-based/web-message-manipulation">Web message manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/web-message-manipulation#which-sinks-can-lead-to-dom-based-web-message-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/web-message-manipulation#how-to-prevent-dom-based-web-message-manipulation">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-14">
                <label for="sub-nav-id-14">
                    <a href="/web-security/dom-based/ajax-request-header-manipulation">Ajax request-header manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/ajax-request-header-manipulation#what-is-the-impact-of-dom-based-ajax-request-header-manipulation">Impact</a></li>
                    <li><a href="/web-security/dom-based/ajax-request-header-manipulation#which-sinks-can-lead-to-dom-based-ajax-request-header-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/ajax-request-header-manipulation#how-to-prevent-dom-based-ajax-request-header-manipulation">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-15">
                <label for="sub-nav-id-15">
                    <a href="/web-security/dom-based/local-file-path-manipulation">Local file-path manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/local-file-path-manipulation#what-is-the-impact-of-dom-based-local-file-path-manipulation">Impact</a></li>
                    <li><a href="/web-security/dom-based/local-file-path-manipulation#which-sinks-can-lead-to-dom-based-local-file-path-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/local-file-path-manipulation#how-to-prevent-dom-based-local-file-path-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-16">
                <label for="sub-nav-id-16">
                    <a href="/web-security/dom-based/client-side-sql-injection">Client-side SQL injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/client-side-sql-injection#what-is-the-impact-of-dom-based-client-side-sql-injection">Impact</a></li>
                    <li><a href="/web-security/dom-based/client-side-sql-injection#which-sinks-can-lead-to-dom-based-client-side-sql-injection-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/client-side-sql-injection#how-to-prevent-dom-based-client-side-sql-injection-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-17">
                <label for="sub-nav-id-17">
                    <a href="/web-security/dom-based/html5-storage-manipulation">HTML5-storage manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/html5-storage-manipulation#which-sinks-can-lead-to-dom-based-html5-storage-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/html5-storage-manipulation#how-to-prevent-dom-based-html5-storage-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-18">
                <label for="sub-nav-id-18">
                    <a href="/web-security/dom-based/client-side-xpath-injection">Client-side XPath injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/client-side-xpath-injection#what-is-the-impact-of-dom-based-xpath-injection">Impact</a></li>
                    <li><a href="/web-security/dom-based/client-side-xpath-injection#which-sinks-can-lead-to-xpath-injection-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/client-side-xpath-injection#how-to-prevent-dom-based-xpath-injection-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-19">
                <label for="sub-nav-id-19">
                    <a href="/web-security/dom-based/client-side-json-injection">Client-side JSON injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/client-side-json-injection#what-is-the-impact-of-a-dom-based-json-injection-attack">Impact</a></li>
                    <li><a href="/web-security/dom-based/client-side-json-injection#which-sinks-can-lead-to-dom-based-json-injection-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/client-side-json-injection#how-to-prevent-client-side-json-injection-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-20">
                <label for="sub-nav-id-20">
                    <a href="/web-security/dom-based/dom-data-manipulation">DOM-data manipulation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/dom-data-manipulation#what-is-the-impact-of-dom-data-manipulation">Impact</a></li>
                    <li><a href="/web-security/dom-based/dom-data-manipulation#which-sinks-can-lead-to-dom-data-manipulation-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/dom-data-manipulation#how-to-prevent-dom-data-manipulation-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-21">
                <label for="sub-nav-id-21">
                    <a href="/web-security/dom-based/denial-of-service">Denial of service</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/denial-of-service#which-sinks-can-lead-to-dom-based-denial-of-service-vulnerabilities">Sinks</a></li>
                    <li><a href="/web-security/dom-based/denial-of-service#how-to-prevent-dom-based-denial-of-service-vulnerabilities">Preventing</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-22">
                <label for="sub-nav-id-22">
                    <a href="/web-security/dom-based/controlling-the-web-message-source">Web message vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/controlling-the-web-message-source#what-is-the-impact-of-dom-based-web-message-vulnerabilities">Impact</a></li>
                    <li><a href="/web-security/dom-based/controlling-the-web-message-source#how-to-construct-an-attack-using-web-messages-as-the-source">Constructing an attack</a></li>
                    <li><a href="/web-security/dom-based/controlling-the-web-message-source#origin-verification">Origin verification</a></li>
                    <li><a href="/web-security/dom-based/controlling-the-web-message-source#which-sinks-can-lead-to-dom-based-web-message-vulnerabilities">Sinks</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-23">
                <label for="sub-nav-id-23">
                    <a href="/web-security/dom-based/dom-clobbering">DOM clobbering</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/dom-based/dom-clobbering#how-to-exploit-dom-clobbering-vulnerabilities">Exploiting</a></li>
                    <li><a href="/web-security/dom-based/dom-clobbering#how-to-prevent-dom-clobbering-attacks">Preventing</a></li>
                </ul>
            </li>
            <li><a href="/web-security/dom-based#how-to-prevent-dom-based-taint-flow-vulnerabilities">Preventing vulnerabilities</a></li>
            <li><a href="/web-security/all-labs#dom-based-vulnerabilities">View all DOM-based vulnerability labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/dom-based"><span itemprop="name">DOM-based</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">DOM-based vulnerabilities</h1><p>
            In this section, we will describe what the DOM is, explain how insecure processing of DOM data can introduce vulnerabilities, and suggest how you can prevent DOM-based vulnerabilities on your websites.
        </p><div class="highlightedarea">
            <h4>Labs</h4>
            <p>
                If you're already familiar with the basic concepts behind DOM-based vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
            </p>
            
        <ul><li><a href="/web-security/all-labs#dom-based-vulnerabilities">View all DOM-based vulnerability labs</a></li></ul></div><h2 id="what-is-the-dom">What is the DOM?</h2><p>
            The Document Object Model (DOM) is a web browser's hierarchical representation of the elements on the page. Websites can use JavaScript to manipulate the nodes and objects of the DOM, as well as their properties. DOM manipulation in itself is not a problem. In fact, it is an integral part of how modern websites work. However, JavaScript that handles data insecurely can enable various attacks. DOM-based vulnerabilities arise when a website contains JavaScript that takes an attacker-controllable value, known as a source, and passes it into a dangerous function, known as a sink.
        </p><h2 id="taint-flow-vulnerabilities">Taint-flow vulnerabilities</h2><p>
            Many DOM-based vulnerabilities can be traced back to problems with the way client-side code manipulates attacker-controllable data.
        </p><h3 id="what-is-taint-flow">What is taint flow?</h3><p>
			To either exploit or mitigate these vulnerabilities, it is important to first familiarize yourself with the basics of taint flow between sources and sinks.
		</p><div class="component-definition">
			<h4>Sources</h4>
			<p>
			    A source is a JavaScript property that accepts data that is potentially attacker-controlled. An example of a source is the <code>location.search</code> property because it reads input from the query string, which is relatively simple for an attacker to control. Ultimately, any property that can be controlled by the attacker is a potential source. This includes the referring URL (exposed by the <code>document.referrer</code> string), the user's cookies (exposed by the <code>document.cookie</code> string), and web messages.
		    </p>
        </div><div class="component-definition">
			<h4>Sinks</h4>
			<p>
			    A sink is a potentially dangerous JavaScript function or DOM object that can cause undesirable effects if attacker-controlled data is passed to it. For example, the <code>eval()</code> function is a sink because it processes the argument that is passed to it as JavaScript. An example of an HTML sink is <code>document.body.innerHTML</code> because it potentially allows an attacker to inject malicious HTML and execute arbitrary JavaScript.
		    </p>
		</div><p>
            Fundamentally, DOM-based vulnerabilities arise when a website passes data from a source to a sink, which then handles the data in an unsafe way in the context of the client's session.
        </p><p>
            The most common source is the URL, which is typically accessed with the <code>location</code> object. An attacker can construct a link to send a victim to a vulnerable page with a payload in the query string and fragment portions of the URL. Consider the following code:
        </p><code class="code-scrollable">goto = location.hash.slice(1)
if (goto.startsWith('https:')) {
&nbsp;&nbsp;location = goto;
}</code><p>
            This is vulnerable to DOM-based open redirection because the <code>location.hash</code> source is handled in an unsafe way. If the URL contains a hash fragment that starts with <code>https:</code>, this code extracts the value of the <code>location.hash</code> property and sets it as the <code>location</code> property of the <code>window</code>. An attacker could exploit this vulnerability by constructing the following URL:
        </p><code class="code-scrollable">https://www.innocent-website.com/example#https://www.evil-user.net</code><p>
            When a victim visits this URL, the JavaScript sets the value of the <code>location</code> property to <code>https://www.evil-user.net</code>, which automatically redirects the victim to the malicious site. This behavior could easily be exploited to construct a phishing attack, for example.
        </p><h3 id="common-sources">Common sources</h3><p>
            The following are typical sources that can be used to exploit a variety of taint-flow vulnerabilities:
        </p><code class="code-scrollable">document.URL
document.documentURI
document.URLUnencoded
document.baseURI
location
document.cookie
document.referrer
window.name
history.pushState
history.replaceState
localStorage
sessionStorage
IndexedDB (mozIndexedDB, webkitIndexedDB, msIndexedDB)
Database</code><p>
            The following kinds of data can also be used as sources to exploit taint-flow vulnerabilities:
        </p><ul>
			<li><a href="/web-security/cross-site-scripting/dom-based#dom-xss-combined-with-reflected-and-stored-data">Reflected data</a> <span class="label-light-green-small">LABS</span></li>
			<li><a href="/web-security/cross-site-scripting/dom-based#dom-xss-combined-with-reflected-and-stored-data">Stored data</a> <span class="label-light-green-small">LABS</span></li>
			<li><a href="/web-security/dom-based/controlling-the-web-message-source">Web messages</a> <span class="label-light-green-small">LABS</span></li>
		</ul><h3 id="which-sinks-can-lead-to-dom-based-vulnerabilities">Which sinks can lead to DOM-based vulnerabilities?</h3><p>
            The following list provides a quick overview of common DOM-based vulnerabilities and an example of a sink that can lead to each one. For a more comprehensive list of relevant sinks, please refer to the vulnerability-specific pages by clicking the links below.
        </p><table>
            <tr>
                <th>
                    DOM-based vulnerability
                </th>
                <th>
                    Example sink
                </th>
            </tr>
            <tr>
                <td>
                    <a href="/web-security/cross-site-scripting/dom-based">DOM XSS</a> <span class="label-light-green-small">LABS</span> 
                </td>
                <td>
                    <code>
                        document.write()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/web-security/dom-based/open-redirection">Open redirection</a> <span class="label-light-green-small">LABS</span>
                </td>
                <td>
                    <code>
                        window.location
                    </code>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/web-security/dom-based/cookie-manipulation">Cookie manipulation</a> <span class="label-light-green-small">LABS</span>
                </td>
                <td>
                    <code>
                        document.cookie
                    </code>
                </td>
            </tr>
            <tr>
                <td>
					<a href="/web-security/dom-based/javascript-injection">JavaScript injection</a>
                </td>
                <td>
                    <code>
                        eval()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/web-security/dom-based/document-domain-manipulation">Document-domain manipulation</a>
                </td>
                <td>
                    <code>
                        document.domain
                    </code>
                </td>
            </tr>
            <tr>
                <td>
					<a href="/web-security/dom-based/websocket-url-poisoning">WebSocket-URL poisoning</a>
                </td>
                <td>
                    <code>
                        WebSocket()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
					<a href="/web-security/dom-based/link-manipulation">Link manipulation</a>
                </td>
                <td>
                    <code>
                        element.src
                    </code>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/web-security/dom-based/web-message-manipulation">Web message manipulation</a>
                </td>
                <td>
                    <code>
                        postMessage()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/web-security/dom-based/ajax-request-header-manipulation">Ajax request-header manipulation</a>
                </td>
                <td>
                    <code>
                        setRequestHeader()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/web-security/dom-based/local-file-path-manipulation">Local file-path manipulation</a>
                </td>
                <td>
                    <code>
                        FileReader.readAsText()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
					<a href="/web-security/dom-based/client-side-sql-injection">Client-side SQL injection</a>
                </td>
                <td>
                    <code>
                        ExecuteSql()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/web-security/dom-based/html5-storage-manipulation">HTML5-storage manipulation</a>
                </td>
                <td>
                    <code>
                        sessionStorage.setItem()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/web-security/dom-based/client-side-xpath-injection">Client-side XPath injection</a>
                </td>
                <td>
                    <code>
                        document.evaluate()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
					<a href="/web-security/dom-based/client-side-json-injection">Client-side JSON injection</a>
                </td>
                <td>
                    <code>
                        JSON.parse()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
					<a href="/web-security/dom-based/dom-data-manipulation">DOM-data manipulation</a>
                </td>
                <td>
                    <code>
                        element.setAttribute()
                    </code>
                </td>
            </tr>
            <tr>
                <td>
					<a href="/web-security/dom-based/denial-of-service">Denial of service</a>
                </td>
                <td>
                    <code>
                        RegExp()
                    </code>
                </td>
            </tr>
        </table><h3 id="how-to-prevent-dom-based-taint-flow-vulnerabilities">How to prevent DOM-based taint-flow vulnerabilities</h3><p>
            There is no single action you can take to eliminate the threat of DOM-based attacks entirely. However, generally speaking, the most effective way to avoid DOM-based vulnerabilities is to avoid allowing data from any untrusted source to dynamically alter the value that is transmitted to any sink.
        </p><p>
            If the desired functionality of the application means that this behavior is unavoidable, then defenses must be implemented within the client-side code. In many cases, the relevant data can be validated on a whitelist basis, only allowing content that is known to be safe. In other cases, it will be necessary to sanitize or encode the data. This can be a complex task, and depending on the context into which the data is to be inserted, may involve a combination of JavaScript escaping, HTML encoding, and URL encoding, in the appropriate sequence.
        </p><p>
            For measures you can take to prevent specific vulnerabilities, please refer to the corresponding vulnerability pages linked from the table above.
        </p><h2 id="dom-clobbering" cms-ignore-validation="DUPLICATE_HEADINGS">DOM clobbering</h2><p>
            DOM clobbering is an advanced technique in which you inject HTML into a page to manipulate the DOM and ultimately change the behavior of JavaScript on the website. The most common form of DOM clobbering uses an anchor element to overwrite a global variable, which is then used by the application in an unsafe way, such as generating a dynamic script URL.
        </p><div class="highlightedarea">
     <h4>Read more</h4>
        <p>
            <a href="/web-security/dom-based/dom-clobbering">DOM clobbering</a>
        </p>
		</div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
