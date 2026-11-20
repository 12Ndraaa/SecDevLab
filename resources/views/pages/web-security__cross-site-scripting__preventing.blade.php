@extends('layouts.academy')

@section('title', 'How to prevent XSS | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="16">
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
        <h3>Cross-site scripting (XSS)</h3>
        <ul>
            <li><a href="/web-security/cross-site-scripting#what-is-cross-site-scripting-xss">What is XSS?</a></li>
            <li><a href="/web-security/cross-site-scripting#how-does-xss-work">How does XSS work?</a></li>
            <li><a href="/web-security/cross-site-scripting#impact-of-xss-vulnerabilities">Impact of an attack</a></li>
            <li><a href="/web-security/cross-site-scripting#xss-proof-of-concept">Proof of concept</a></li>
            <li><a href="/web-security/cross-site-scripting#how-to-find-and-test-for-xss-vulnerabilities">Testing</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/cross-site-scripting/reflected">Reflected XSS</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/reflected#impact-of-reflected-xss-attacks">Impact</a></li>
                    <li><a href="/web-security/cross-site-scripting/reflected#reflected-xss-in-different-contexts">Contexts</a></li>
                    <li><a href="/web-security/cross-site-scripting/reflected#how-to-find-and-test-for-reflected-xss-vulnerabilities">Testing</a></li>
                    <li><a href="/web-security/cross-site-scripting/reflected#common-questions-about-reflected-cross-site-scripting">FAQs</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/cross-site-scripting/stored">Stored XSS</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/stored#impact-of-stored-xss-attacks">Impact</a></li>
                    <li><a href="/web-security/cross-site-scripting/stored#stored-xss-in-different-contexts">Contexts</a></li>
                    <li><a href="/web-security/cross-site-scripting/stored#how-to-find-and-test-for-stored-xss-vulnerabilities">Testing for vulnerabilities</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/cross-site-scripting/dom-based">DOM-based XSS</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-4">
                        <label for="sub-nav-id-4">
                            <a href="/web-security/cross-site-scripting/dom-based#how-to-test-for-dom-based-cross-site-scripting">Testing</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/cross-site-scripting/dom-based#testing-html-sinks">HTML sinks</a></li>
                            <li><a href="/web-security/cross-site-scripting/dom-based#testing-javascript-execution-sinks">JavaScript execution sinks</a></li>
                            <li><a href="/web-security/cross-site-scripting/dom-based#testing-for-dom-xss-using-dom-invader">Using DOM Invader</a></li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-5">
                        <label for="sub-nav-id-5">
                            <a href="/web-security/cross-site-scripting/dom-based#exploiting-dom-xss-with-different-sources-and-sinks">Exploiting</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li>
                                <input type="checkbox" id="sub-nav-id-6">
                                <label for="sub-nav-id-6">
                                    <a href="/web-security/cross-site-scripting/dom-based#sources-and-sinks-in-third-party-dependencies">In third-party dependencies</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/cross-site-scripting/dom-based#dom-xss-in-jquery">jQuery</a></li>
                                    <li><a href="/web-security/cross-site-scripting/dom-based#dom-xss-in-angularjs">AngularJS</a></li>
                                </ul>
                            </li>
                            <li><a href="/web-security/cross-site-scripting/dom-based#dom-xss-combined-with-reflected-and-stored-data">DOM
                                XSS combined with reflected and stored data</a></li>
                            <li><a href="/web-security/cross-site-scripting/dom-based#which-sinks-can-lead-to-dom-xss-vulnerabilities">Sinks</a></li>
                            <li><a href="/web-security/cross-site-scripting/dom-based#how-to-prevent-dom-xss-vulnerabilities">Preventing</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-7">
                <label for="sub-nav-id-7">
                    <a href="/web-security/cross-site-scripting/contexts">XSS contexts</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/contexts#xss-between-html-tags">Between HTML tags</a></li>
                    <li><a href="/web-security/cross-site-scripting/contexts#xss-in-html-tag-attributes">In HTML tag attributes</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-8">
                        <label for="sub-nav-id-8">
                            <a href="/web-security/cross-site-scripting/contexts#xss-into-javascript">JavaScript</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/cross-site-scripting/contexts#terminating-the-existing-script">Terminating the existing script</a></li>
                            <li><a href="/web-security/cross-site-scripting/contexts#breaking-out-of-a-javascript-string">Breaking out of a string</a></li>
                            <li><a href="/web-security/cross-site-scripting/contexts#making-use-of-html-encoding">Using HTML-encoding</a></li>
                            <li><a href="/web-security/cross-site-scripting/contexts#xss-in-javascript-template-literals">Template literals</a></li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-9">
                        <label for="sub-nav-id-9">
                            <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection">Client-side template injection</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#what-is-the-angularjs-sandbox">AngularJS sandbox</a></li>
                            <li>
                                <input type="checkbox" id="sub-nav-id-10">
                                <label for="sub-nav-id-10">
                                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#how-does-an-angularjs-sandbox-escape-work">AngularJS sandbox escape</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#constructing-an-advanced-angularjs-sandbox-escape">Constructing an advanced escape</a></li>
                                </ul>
                            </li>
                            <li>
                                <input type="checkbox" id="sub-nav-id-11">
                                <label for="sub-nav-id-11">
                                    <a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#how-does-an-angularjs-csp-bypass-work">AngularJS CSP bypass</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#bypassing-a-csp-with-an-angularjs-sandbox-escape">Bypassing a CSP with an AngularJS sandbox escape</a></li>
                                </ul>
                            </li>
                            <li><a href="/web-security/cross-site-scripting/contexts/client-side-template-injection#how-to-prevent-client-side-template-injection-vulnerabilities">Preventing</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-12">
                <label for="sub-nav-id-12">
                    <a href="/web-security/cross-site-scripting/exploiting">Exploiting XSS vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/exploiting#exploiting-cross-site-scripting-to-steal-cookies">To steal cookies</a></li>
                    <li><a href="/web-security/cross-site-scripting/exploiting#exploiting-cross-site-scripting-to-capture-passwords">To capture passwords</a></li>
                    <li><a href="/web-security/cross-site-scripting/exploiting#exploiting-cross-site-scripting-to-bypass-csrf-protections">To perform CSRF</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-13">
                <label for="sub-nav-id-13">
                    <a href="/web-security/cross-site-scripting/dangling-markup">Dangling markup injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/dangling-markup#how-to-prevent-dangling-markup-attacks">Preventing attacks</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-14">
                <label for="sub-nav-id-14">
                    <a href="/web-security/cross-site-scripting/content-security-policy">Content security policy (CSP)</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/content-security-policy#mitigating-xss-attacks-using-csp">Mitigating XSS attacks</a></li>
                    <li><a href="/web-security/cross-site-scripting/content-security-policy#mitigating-dangling-markup-attacks-using-csp">Mitigating dangling markup attacks</a></li>
                    <li><a href="/web-security/cross-site-scripting/content-security-policy#bypassing-csp-with-policy-injection">Bypassing CSP</a></li>
                    <li><a href="/web-security/cross-site-scripting/content-security-policy#protecting-against-clickjacking-using-csp">Protecting against clickjacking</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-15">
                <label for="sub-nav-id-15">
                    <a href="/web-security/cross-site-scripting/preventing">Preventing XSS attacks</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/cross-site-scripting/preventing#encode-data-on-output">Encode data on output</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-16">
                        <label for="sub-nav-id-16">
                            <a href="/web-security/cross-site-scripting/preventing#validate-input-on-arrival">Validate input on arrival</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/cross-site-scripting/preventing#whitelisting-vs-blacklisting">Whitelisting vs blacklisting</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/cross-site-scripting/preventing#allowing-safe-html">Allowing "safe" HTML</a></li>
                    <li><a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-using-a-template-engine">Using a template engine</a></li>
                    <li><a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-in-php">In PHP</a></li>
                    <li><a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-client-side-in-javascript">In JavaScript</a></li>
                    <li><a href="/web-security/cross-site-scripting/preventing#how-to-prevent-xss-in-jquery">In jQuery</a></li>
                    <li><a href="/web-security/cross-site-scripting/preventing#mitigating-xss-using-content-security-policy-csp">Using CSP</a></li>
                </ul>
            </li>
            <li><a href="/web-security/cross-site-scripting/cheat-sheet">Cheat sheet</a></li>
            <li><a href="/web-security/all-labs#cross-site-scripting">View all XSS labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting"><span itemprop="name">Cross-site scripting</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/cross-site-scripting/preventing"><span itemprop="name">Preventing</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">How to prevent XSS</h1><p>
            In this section, we'll describe some general principles for preventing cross-site scripting vulnerabilities and ways of using various common technologies for protecting against XSS attacks.
        </p><p>
            Cross-site scripting prevention can generally be achieved via two layers of defense:
        </p><ul>
            <li><a href="/web-security/cross-site-scripting/preventing#encode-data-on-output">Encode data on output</a></li>
            <li><a href="/web-security/cross-site-scripting/preventing#validate-input-on-arrival">Validate input on arrival</a></li>
        </ul><div class="component">
    <p>
        You can use Burp Scanner to scan your web sites for numerous security vulnerabilities including XSS. Burp's cutting-edge scanning logic replicates the actions of a skilled attacker and is able to achieve correspondingly high coverage of XSS vulnerabilities. You can use Burp Scanner to gain assurance that your defenses against XSS attacks are working effectively.
    </p>
    <div class="cta margin-top-m margin-bottom-m"><a class="cta-primary-2" href="/web-security/all-labs">Learn more about Burp Scanner</a></div>
    </div><h2 id="encode-data-on-output">Encode data on output</h2><p>
            Encoding should be applied directly before user-controllable data is written to a page, because the context you're writing into determines what kind of encoding you need to use. For example, values inside a JavaScript string require a different type of escaping to those in an HTML context.
        </p><p>
            In an HTML context, you should convert non-whitelisted values into HTML entities:
        </p><ul>
            <li>
                <code>&lt;</code> converts to: <code>&amp;lt;</code>
            </li>
            <li>
                <code>&gt;</code> converts to: <code>&amp;gt;</code>
            </li>
        </ul><p>
            In a JavaScript string context, non-alphanumeric values should be Unicode-escaped:
        </p><ul>
            <li>
                <code>&lt;</code> converts to: <code>\u003c</code>
            </li>
            <li>
                <code>&gt;</code> converts to: <code>\u003e</code>
            </li>
        </ul><p>
            Sometimes you'll need to apply multiple layers of encoding, in the correct order. For example, to safely embed user input inside an event handler, you need to deal with both the JavaScript context and the HTML context. So you need to first Unicode-escape the input, and then HTML-encode it:
        </p><code class="code-scrollable">&lt;a href=&quot;#&quot; onclick=&quot;x='This string needs two layers of escaping'&quot;&gt;test&lt;/a&gt;</code><h2 id="validate-input-on-arrival">Validate input on arrival</h2><p>
            Encoding is probably the most important line of XSS defense, but it is not sufficient to prevent XSS vulnerabilities in every context. You should also validate input as strictly as possible at the point when it is first received from a user.
        </p><p>
            Examples of input validation include:
        </p><ul>
            <li>
                If a user submits a URL that will be returned in responses, validating that it starts with a safe protocol such as HTTP and HTTPS. Otherwise someone might exploit your site with a harmful protocol like <code>javascript</code> or <code>data</code>.
            </li>
            <li>
                If a user supplies a value that it expected to be numeric, validating that the value actually contains an integer.
            </li>
            <li>
                Validating that input contains only an expected set of characters.
            </li>
        </ul><p>
            Input validation should ideally work by blocking invalid input. An alternative approach, of attempting to clean invalid input to make it valid, is more error prone and should be avoided wherever possible.
        </p><h3 id="whitelisting-vs-blacklisting">Whitelisting vs blacklisting</h3><p>
            Input validation should generally employ whitelists rather than blacklists. For example, instead of trying to make a list of all harmful protocols (<code>javascript</code>, <code>data</code>, etc.), simply make a list of safe protocols (HTTP, HTTPS) and disallow anything not on the list. This will ensure your defense doesn't break when new harmful protocols appear and make it less susceptible to attacks that seek to obfuscate invalid values to evade a blacklist.
        </p><h2 id="allowing-safe-html">Allowing "safe" HTML</h2><p>
            Allowing users to post HTML markup should be avoided wherever possible, but sometimes it's a business requirement. For example, a blog site might allow comments to be posted containing some limited HTML markup.
        </p><p>
            The classic approach is to try to filter out potentially harmful tags and JavaScript. You can try to implement this using a whitelist of safe tags and attributes, but thanks to discrepancies in browser parsing engines and quirks like mutation XSS, this approach is extremely difficult to implement securely.
        </p><p>
            The least bad option is to use a JavaScript library that performs filtering and encoding in the user's browser, such as DOMPurify. Other libraries allow users to provide content in markdown format and convert the markdown into HTML. Unfortunately, all these libraries have XSS vulnerabilities from time to time, so this is not a perfect solution. If you do use one you should monitor closely for security updates.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                In addition to JavaScript, other content such as CSS and even regular HTML can be harmful in some situations.
            </p>
            <p>
                <a class="chevron-after" href="https://portswigger.net/research/detecting-and-exploiting-path-relative-stylesheet-import-prssi-vulnerabilities#badcss">Attacks using malicious CSS</a>
            </p>
        </div><h2 id="how-to-prevent-xss-using-a-template-engine">How to prevent XSS using a template engine</h2><p>
            Many modern websites use server-side template engines such as Twig and Freemarker to embed dynamic content in HTML. These typically define their own escaping system. For example, in Twig, you can use the <code>e()</code> filter, with an argument defining the context:
        </p><code class="code-scrollable">{{ user.firstname | e('html') }}</code><p>
            Some other template engines, such as Jinja and React, escape dynamic content by default which effectively prevents most occurrences of XSS.
        </p><p>
            We recommend reviewing escaping features closely when you evaluate whether to use a given template engine or framework.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                If you directly concatenate user input into template strings, you will be vulnerable to <a href="https://portswigger.net/kb/issues/00101080_server-side-template-injection">server-side template injection</a> which is often more serious than XSS.
            </p>
        </div><h2 id="how-to-prevent-xss-in-php">How to prevent XSS in PHP</h2><p>
            In PHP there is a built-in function to encode entities called <code>htmlentities</code>. You should call this function to escape your input when inside an HTML context. The function should be called with three arguments:
        </p><ul>
            <li>
                Your input string.
            </li>
            <li>
                <code>ENT_QUOTES</code>, which is a flag that specifies all quotes should be encoded.
            </li>
            <li>
                The character set, which in most cases should be UTF-8.
            </li>
        </ul><p>
            For example:
        </p><code class="code-scrollable">&lt;?php echo htmlentities($input, ENT_QUOTES, 'UTF-8');?&gt;</code><p>
            When in a JavaScript string context, you need to Unicode-escape input as already described. Unfortunately, PHP doesn't provide an API to Unicode-escape a string. Here is some code to do that in PHP:
        </p><code class="code-scrollable">&lt;?php</code><code class="code-scrollable">function jsEscape($str) {
    $output = '';
    $str = str_split($str);
    for($i=0;$i&lt;count($str);$i++) {
        $chrNum = ord($str[$i]);
        $chr = $str[$i];
        if($chrNum === 226) {
            if(isset($str[$i+1]) &amp;&amp; ord($str[$i+1]) === 128) {
                if(isset($str[$i+2]) &amp;&amp; ord($str[$i+2]) === 168) {
                    $output .= '\u2028';
                    $i += 2;
                    continue;
                }
                if(isset($str[$i+2]) &amp;&amp; ord($str[$i+2]) === 169) {
                    $output .= '\u2029';
                    $i += 2;
                    continue;
                }
            }
        }
        switch($chr) {
            case &quot;'&quot;:
            case '&quot;':
            case &quot;\n&quot;;
            case &quot;\r&quot;;
            case &quot;&amp;&quot;;
            case &quot;\\&quot;;
            case &quot;&lt;&quot;:
            case &quot;&gt;&quot;:
                $output .= sprintf(&quot;\\u%04x&quot;, $chrNum);
            break;
            default:
                $output .= $str[$i];
            break;
    }
    }
    return $output;
}
?&gt;</code><p>
            Here is how to use the <code>jsEscape</code> function in PHP:
        </p><code class="code-scrollable">&lt;script&gt;x = '&lt;?php echo jsEscape($_GET['x'])?&gt;';&lt;/script&gt;</code><p>
            Alternatively, you could use a template engine.
        </p><h2 id="how-to-prevent-xss-client-side-in-javascript">How to prevent XSS client-side in JavaScript</h2><p>
            To escape user input in an HTML context in JavaScript, you need your own HTML encoder because JavaScript doesn't provide an API to encode HTML. Here is some example JavaScript code that converts a string to HTML entities:
        </p><code class="code-scrollable">function htmlEncode(str){
    return String(str).replace(/[^\w. ]/gi, function(c){
        return '&amp;#'+c.charCodeAt(0)+';';
    });
}</code><p>
            You would then use this function as follows:
        </p><code class="code-scrollable">&lt;script&gt;document.body.innerHTML = htmlEncode(untrustedValue)&lt;/script&gt;</code><p>
            If your input is inside a JavaScript string, you need an encoder that performs Unicode escaping. Here is a sample Unicode-encoder:
        </p><code class="code-scrollable">function jsEscape(str){
    return String(str).replace(/[^\w. ]/gi, function(c){
        return '\\u'+('0000'+c.charCodeAt(0).toString(16)).slice(-4);
    });
}</code><p>
            You would then use this function as follows:
        </p><code class="code-scrollable">&lt;script&gt;document.write('&lt;script&gt;x=&quot;'+jsEscape(untrustedValue)+'&quot;;&lt;\/script&gt;')&lt;/script&gt;</code><h2 id="how-to-prevent-xss-in-jquery">How to prevent XSS in jQuery</h2><p>
            The most common form of XSS in jQuery is when you pass user input to a jQuery selector. Web developers would often use <code>location.hash</code> and pass it to the selector which would cause XSS as jQuery would render the HTML. jQuery recognized this issue and patched their selector logic to check if input begins with a hash. Now jQuery will only render HTML if the first character is a <code>&lt;</code>. If you pass untrusted data to the jQuery selector, ensure you correctly escape the value using the <code>jsEscape</code> function above.
        </p><h2 id="mitigating-xss-using-content-security-policy-csp">Mitigating XSS using content security policy (CSP)</h2><p>
            Content security policy (CSP) is the last line of defense against cross-site scripting. If your XSS prevention fails, you can use CSP to mitigate XSS by restricting what an attacker can do.
        </p><p>
            CSP lets you control various things, such as whether external scripts can be loaded and whether inline scripts will be executed. To deploy CSP you need to include an HTTP response header called <code>Content-Security-Policy</code> with a value containing your policy.
        </p><p>
            An example CSP is as follows:
        </p><code class="code-scrollable">default-src 'self'; script-src 'self'; object-src 'none'; frame-src 'none'; base-uri 'none';</code><p>
            This policy specifies that resources such as images and scripts can only be loaded from the same origin as the main page. So even if an attacker can successfully inject an XSS payload they can only load resources from the current origin. This greatly reduces the chance that an attacker can exploit the XSS vulnerability.
        </p><p>
            If you require loading of external resources, ensure you only allow scripts that do not aid an attacker to exploit your site. For example, if you whitelist certain domains then an attacker can load any script from those domains. Where possible, try to host resources on your own domain.
        </p><p>
            If that is not possible then you can use hash- or nonce-based policy to allow scripts on different domains. A nonce is a random string that is added as an attribute of a script or resource, which will only be executed if the random string matches the server-generated one. An attacker is unable to guess the randomized string and therefore cannot invoke a script or resource with a valid nonce and so the resource will not be executed.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/cross-site-scripting/content-security-policy#mitigating-xss-attacks-using-csp">Mitigating XSS attacks using CSP</a></li></ul></div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
