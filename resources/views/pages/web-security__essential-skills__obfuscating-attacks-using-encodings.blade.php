@extends('layouts.academy')

@section('title', 'Obfuscating attacks using encodings | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="20">
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
        <h3>Essential skills</h3>
        <ul>
            <li><a href="/web-security/essential-skills">Overview</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings">Obfuscating attacks using encodings</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#context-specific-decoding">Context-specific decoding</a></li>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#decoding-discrepancies">Decoding
                        discrepancies</a></li>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-url-encoding">URL encoding</a></li>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-double-url-encoding">Double URL encoding</a></li>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-html-encoding">HTML encoding</a></li>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-xml-encoding">XML encoding</a></li>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-unicode-escaping">Unicode escaping</a></li>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-hex-escaping">Hex escaping</a></li>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-octal-escaping">Octal escaping</a></li>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-multiple-encodings">Multiple encodings</a></li>
                    <li><a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-the-sql-char-function">SQL CHAR() function</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing">Using Burp Scanner</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing#scanning-a-specific-request">Scanning a specific request</a></li>
                    <li><a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing#scanning-custom-insertion-points">Scanning custom insertion points</a></li>
                    <li><a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing#scanning-non-standard-data-structures">Scanning non-standard data structures</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/essential-skills#identifying-unknown-vulnerabilities">Identifying unknown vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/mystery-lab-challenge">Mystery lab challenge</a></li>
                </ul>
            </li>
            <li><a href="/web-security/all-labs#essential-skills">View all essential skills labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/essential-skills"><span itemprop="name">Essential skills</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/essential-skills/obfuscating-attacks-using-encodings"><span itemprop="name">Obfuscating attacks using encodings</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Obfuscating attacks using encodings</h1><p>
            In this section, we'll show you how you can take advantage of the standard decoding performed by websites to evade input filters and inject harmful payloads for a variety of attacks, such as XSS and SQL injection.
        </p><h2 id="context-specific-decoding">Context-specific decoding</h2><p>
            Both clients and servers use a variety of different encodings to pass data between systems. When they want to actually use the data, this often means they have to decode it first. The exact sequence of decoding steps that are performed depends on the context in which the data appears. For example, a query parameter is typically URL decoded server-side, while the text content of an HTML element may be HTML decoded client-side.
        </p><p>
            When constructing an attack, you should think about where exactly your payload is being injected. If you can infer how your input is being decoded based on this context, you can potentially identify alternative ways to represent the same payload.
        </p><h2 id="decoding-discrepancies">Decoding discrepancies</h2><p>
            Injection attacks often involve injecting payloads that use recognizable patterns, such as HTML tags, JavaScript functions, or SQL statements. As the inputs for these payloads are almost never expected to contain user-supplied code or markup, websites often implement defences that block requests containing these suspicious patterns.
        </p><p>
            However, these kinds of input filters also need to decode the input in order to check whether it's safe or not. From a security perspective, it's vital that the decoding performed when checking the input is the same as the decoding performed by the back-end server or browser when it eventually uses the data. Any discrepancy can enable an attacker to sneak harmful payloads past the filter by applying different encodings that will automatically be removed later.
        </p><h2 id="obfuscation-via-url-encoding">Obfuscation via URL encoding</h2><p>
            In URLs, a series of reserved characters carry special meaning. For example, an ampersand (<code>&amp;</code>) is used as a delimiter to separate parameters in the query string. The problem is, URL-based inputs may contain these characters for a different reason. Consider a parameter containing a user's search query. What happens if the user searches for something like &quot;Fish &amp; Chips&quot;?
        </p><p>
            Browsers automatically URL encode any characters that may cause ambiguity for parsers. This usually means substituting them with a <code>%</code> character and their 2-digit hex code as follows:
        </p><code class="code-scrollable">[...]/?search=Fish+%26+Chips</code><p>
            This ensures that the ampersand will not be mistaken for a delimiter.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                Although the space character can be encoded as <code>%20</code>, it is often represented by a plus (<code>+</code>) instead, as in the example above.
            </p>
        </div><p>
            Any URL-based input is automatically URL decoded server-side before it is assigned to the relevant variables. This means that, as far as most servers are concerned, sequences like <code>%22</code>, <code>%3C</code>, and <code>%3E</code> in a query parameter are synonymous with <code>&quot;</code>, <code>&lt;</code>, and <code>&gt;</code> characters respectively. In other words, you can inject URL-encoded data via the URL and it will usually still be interpreted correctly by the back-end application.
        </p><p>
            Occasionally, you may find that WAFs and suchlike fail to properly URL decode your input when checking it. In this case, you may be able to smuggle payloads to the back-end application simply by encoding any characters or words that are blacklisted. For example, in a SQL injection attack, you might encode the keywords, so <code>SELECT</code> becomes <code>%53%45%4C%45%43%54</code> and so on.
        </p><h2 id="obfuscation-via-double-url-encoding">Obfuscation via double URL encoding</h2><p>
            For one reason or another, some servers perform two rounds of URL decoding on any URLs they receive. This isn't necessarily an issue in its own right, provided that any security mechanisms also double-decode the input when checking it. Otherwise, this discrepancy enables an attacker to smuggle malicious input to the back-end by simply encoding it twice.
        </p><p>
            Let's say you're trying to inject a standard XSS PoC, such as <code>&lt;img src=x onerror=alert(1)&gt;</code>, via a query parameter. In this case, the URL might look something like this:
        </p><code class="code-scrollable">[...]/?search=%3Cimg%20src%3Dx%20onerror%3Dalert(1)%3E</code><p>
            When checking the request, if a WAF performs the standard URL decoding, it will easily identify this well-known payload. The request is blocked from ever reaching the back-end. But what if you double-encode the injection? In practice, this means that the <code>%</code> characters themselves are then replaced with <code>%25</code>:
        </p><code class="code-scrollable">[...]/?search=%253Cimg%2520src%253Dx%2520onerror%253Dalert(1)%253E</code><p>
            As the WAF only decodes this once, it may not be able to identify that the request is dangerous. If the back-end server subsequently double-decodes this input, the payload will be successfully injected.
        </p><h2 id="obfuscation-via-html-encoding">Obfuscation via HTML encoding</h2><p>
            In HTML documents, certain characters need to be escaped or encoded to prevent the browser from incorrectly interpreting them as part of the markup. This is achieved by substituting the offending characters with a reference, prefixed with an ampersand and terminated with a semicolon. In many cases, a name can be used for the reference. For example, the sequence <code>&amp;colon;</code> represents a colon character.
        </p><p>
            Alternatively, the reference may be provided using the character's decimal or hex code point, in this case, <code>&amp;#58;</code> and <code>&amp;#x3a;</code> respectively.
        </p><p>
            In specific locations within the HTML, such as the text content of an element or the value of an attribute, browsers will automatically decode these references when they parse the document. When injecting inside such a location, you can occasionally take advantage of this to obfuscate payloads for client-side attacks, hiding them from any server-side defences that are in place.
        </p><p>
            If you look closely at the XSS payload from our earlier example, notice that the payload is being injected inside an HTML attribute, namely the <code>onerror</code> event handler. If the server-side checks are looking for the <code>alert()</code> payload explicitly, they might not spot this if you HTML encode one or more of the characters:
        </p><code class="code-scrollable">&lt;img src=x onerror=&quot;&amp;#x61;lert(1)&quot;&gt;</code><p>
            When the browser renders the page, it will decode and execute the injected payload.
        </p><h3 id="leading-zeros">Leading zeros</h3><p>
            Interestingly, when using decimal or hex-style HTML encoding, you can optionally include an arbitrary number of leading zeros in the code points. Some WAFs and other input filters fail to adequately account for this.
        </p><p>
            If your payload still gets blocked after HTML encoding it, you may find that you can evade the filter just by prefixing the code points with a few zeros:
        </p><code class="code-scrollable">&lt;a href=&quot;javascript&amp;#00000000000058;alert(1)&quot;&gt;Click me&lt;/a&gt;</code><h2 id="obfuscation-via-xml-encoding">Obfuscation via XML encoding</h2><p>
            XML is closely related to HTML and also supports character encoding using the same numeric escape sequences. This enables you to include special characters in the text content of elements without breaking the syntax, which can come in handy when testing for XSS via XML-based input, for example.
        </p><p>
            Even if you don't need to encode any special characters to avoid syntax errors, you can potentially take advantage of this behavior to obfuscate payloads in the same way as you do with HTML encoding. The difference is that your payload is decoded by the server itself, rather than client-side by a browser. This is useful for bypassing WAFs and other filters, which may block your requests if they detect certain keywords associated with SQL injection attacks.
        </p><code class="code-scrollable">&lt;stockCheck&gt;
    &lt;productId&gt;
        123
    &lt;/productId&gt;
    &lt;storeId&gt;
        999 &amp;#x53;ELECT * FROM information_schema.tables
    &lt;/storeId&gt;
&lt;/stockCheck&gt;</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'C8332AFEEB7ACF103DB621A4D16B7249C26F7040478A07FF274D2F98687B02B6'])@verbatim<h2 id="obfuscation-via-unicode-escaping">Obfuscation via unicode escaping</h2><p>
            Unicode escape sequences consist of the prefix <code>\u</code> followed by the four-digit hex code for the character. For example, <code>\u003a</code> represents a colon. ES6 also supports a new form of unicode escape using curly braces: <code>\u{3a}</code>.
        </p><p>
            When parsing strings, most programming languages decode these unicode escapes. This includes the JavaScript engine used by browsers. When injecting into a string context, you can obfuscate client-side payloads using unicode, just like we did with HTML escapes in the example above.
        </p><p>
            For example, let's say you're trying to exploit DOM XSS where your input is passed to the <code>eval()</code> sink as a string. If your initial attempts are blocked, try escaping one of the characters as follows:
        </p><code class="code-scrollable">eval(&quot;\u0061lert(1)&quot;)</code><p>
            As this will remain encoded server-side, it may go undetected until the browser decodes it again.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                Inside a string, you can escape any characters like this. However, outside of a string, escaping some characters will result in a syntax error. This includes opening and closing parentheses, for example.
            </p>
        </div><p>
            It's also worth noting that the ES6-style unicode escapes also allow optional leading zeros, so some WAFs may be easily fooled using the same technique we used for HTML encodings. For example:
        </p><code class="code-scrollable">&lt;a href=&quot;javascript:\u{00000000061}alert(1)&quot;&gt;Click me&lt;/a&gt;</code><h2 id="obfuscation-via-hex-escaping">Obfuscation via hex escaping</h2><p>
            Another option when injecting into a string context is to use hex escapes, which represent characters using their hexadecimal code point, prefixed with <code>\x</code>. For example, the lowercase letter <code>a</code> is represented by <code>\x61</code>.
        </p><p>
            Just like unicode escapes, these will be decoded client-side as long as the input is evaluated as a string:
        </p><code class="code-scrollable">eval(&quot;\x61lert&quot;)</code><p>
            Note that you can sometimes also obfuscate SQL statements in a similar manner using the prefix <code>0x</code>. For example, <code>0x53454c454354</code> may be decoded to form the <code>SELECT</code> keyword.
        </p><h2 id="obfuscation-via-octal-escaping">Obfuscation via octal escaping</h2><p>
            Octal escaping works in pretty much the same way as hex escaping, except that the character references use a base-8 numbering system rather than base-16. These are prefixed with a standalone backslash, meaning that the lowercase letter <code>a</code> is represented by <code>\141</code>.
        </p><code class="code-scrollable">eval(&quot;\141lert(1)&quot;)</code><h2 id="obfuscation-via-multiple-encodings">Obfuscation via multiple encodings</h2><p>
            It is important to note that you can combine encodings to hide your payloads behind multiple layers of obfuscation. Look at the <code>javascript:</code> URL in the following example:
        </p><code class="code-scrollable">&lt;a href=&quot;javascript:&amp;bsol;u0061lert(1)&quot;&gt;Click me&lt;/a&gt;</code><p>
            Browsers will first HTML decode <code>&amp;bsol;,</code> resulting in a backslash. This has the effect of turning the otherwise arbitrary <code>u0061</code> characters into the unicode escape <code>\u0061</code>:
        </p><code class="code-scrollable">&lt;a href=&quot;javascript:\u0061lert(1)&quot;&gt;Click me&lt;/a&gt;</code><p>
            This is then decoded further to form a functioning XSS payload:
        </p><code class="code-scrollable">&lt;a href=&quot;javascript:alert(1)&quot;&gt;Click me&lt;/a&gt;</code><p>
            Clearly, to successfully inject a payload in this way, you need a solid understanding of which decoding is performed on your input and in what order.
        </p><h2 id="obfuscation-via-the-sql-char-function">Obfuscation via the SQL CHAR() function</h2><p>
            Although not strictly a form of encoding, in some cases, you may be able to obfuscate your SQL injection attacks using the <code>CHAR()</code>function. This accepts a single decimal or hex code point and returns the matching character. Hex codes must be prefixed with <code>0x</code>. For example, both <code>CHAR(83)</code> and <code>CHAR(0x53)</code> return the capital letter <code>S</code>.
        </p><p>
            By concatenating the returned values, you can use this approach to obfuscate blocked keywords. For example, even if <code>SELECT</code> is blacklisted, the following injection initially appears harmless:
        </p><code class="code-scrollable">CHAR(83)+CHAR(69)+CHAR(76)+CHAR(69)+CHAR(67)+CHAR(84)</code><p>
            However, when this is processed as SQL by the application, it will dynamically construct the <code>SELECT</code> keyword and execute the injected query.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
