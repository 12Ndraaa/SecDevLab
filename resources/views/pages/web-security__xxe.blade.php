@extends('layouts.academy')

@section('title', 'What is XXE (XML external entity) injection? Tutorial & Examples | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="41">
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
        <h3>XML external entity (XXE) injection</h3>
        <ul>
            <li><a href="/web-security/xxe#what-is-xml-external-entity-injection">What is XXE?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/xxe/xml-entities">XML entities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/xxe/xml-entities#what-is-xml">What is XML?</a></li>
                    <li><a href="/web-security/xxe/xml-entities#what-are-xml-entities">What are XML entities?</a></li>
                    <li><a href="/web-security/xxe/xml-entities#what-is-document-type-definition">Document type definition</a></li>
                    <li><a href="/web-security/xxe/xml-entities#what-are-xml-custom-entities">XML custom entities</a></li>
                    <li><a href="/web-security/xxe/xml-entities#what-are-xml-external-entities">XML external entities</a></li>
                </ul>
            </li>
            <li><a href="/web-security/xxe#how-do-xxe-vulnerabilities-arise">How vulnerabilities arise</a></li>
            <li><a href="/web-security/xxe#how-to-find-and-test-for-xxe-vulnerabilities">Testing for vulnerabilities</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/xxe#what-are-the-types-of-xxe-attacks">Exploiting vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/xxe#exploiting-xxe-to-retrieve-files">To retrieve files</a></li>
                    <li><a href="/web-security/xxe#exploiting-xxe-to-perform-ssrf-attacks">To perform SSRF attacks</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/xxe/blind">Blind vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/xxe/blind#detecting-blind-xxe-using-out-of-band-oast-techniques">Detecting using out-of-band techniques</a></li>
                    <li><a href="/web-security/xxe/blind#exploiting-blind-xxe-to-exfiltrate-data-out-of-band">Exploiting to exfiltrate data out-of-band</a></li>
                    <li><a href="/web-security/xxe/blind#exploiting-blind-xxe-to-retrieve-data-via-error-messages">Exploiting to retrieve data via error messages</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-4">
                        <label for="sub-nav-id-4">
                            <a href="/web-security/xxe/blind#exploiting-blind-xxe-by-repurposing-a-local-dtd">Exploiting by repurposing a local DTD</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/xxe/blind#locating-an-existing-dtd-file-to-repurpose">Locating an existing DTD file</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/xxe#finding-hidden-attack-surface-for-xxe-injection">Finding hidden attack surface</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/xxe#xinclude-attacks">XInclude attacks</a></li>
                    <li><a href="/web-security/xxe#xxe-attacks-via-file-upload">XXE attacks via file upload</a></li>
                    <li><a href="/web-security/xxe#xxe-attacks-via-modified-content-type">XXE attacks via modified content type</a></li>
                </ul>
            </li>
            <li><a href="/web-security/xxe#how-to-prevent-xxe-vulnerabilities">Preventing vulnerabilities</a></li>
            <li><a href="/web-security/all-labs#xml-external-entity-xxe-injection">View all XXE injection labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/xxe"><span itemprop="name">XXE injection</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">XML external entity (XXE) injection</h1><p>
            In this section, we'll explain what XML external entity injection is, describe some common examples, explain how to find and exploit various kinds of XXE injection, and summarize how to prevent XXE injection attacks.
        </p><h2 id="what-is-xml-external-entity-injection">What is XML external entity injection?</h2><p>
            XML external entity injection (also known as XXE) is a web security vulnerability that allows an attacker to interfere with an application's processing of XML data. It often allows an attacker to view files on the application server filesystem, and to interact with any back-end or external systems that the application itself can access.
        </p><p>
            In some situations, an attacker can escalate an XXE attack to compromise the underlying server or other back-end infrastructure, by leveraging the XXE vulnerability to perform server-side request forgery (SSRF) attacks.
        </p><img alt="XXE injection" src="/web-security/images/xxe-injection.svg"><div class="highlightedarea">
            <h4>Labs</h4>
            <p>
                If you're already familiar with the basic concepts behind XXE vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
            </p>
            
        <ul><li><a href="/web-security/all-labs#xml-external-entity-xxe-injection">View all XXE labs</a></li></ul></div><h2 id="how-do-xxe-vulnerabilities-arise">How do XXE vulnerabilities arise?</h2><p>
            Some applications use the XML format to transmit data between the browser and the server. Applications that do this virtually always use a standard library or platform API to process the XML data on the server. XXE vulnerabilities arise because the XML specification contains various potentially dangerous features, and standard parsers support these features even if they are not normally used by the application.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/xxe/xml-entities">Learn about the XML format, DTDs, and external entities</a></li></ul></div><p>
            XML external entities are a type of custom XML entity whose defined values are loaded from outside of the DTD in which they are declared. External entities are particularly interesting from a security perspective because they allow an entity to be defined based on the contents of a file path or URL.
        </p><h2 id="what-are-the-types-of-xxe-attacks">What are the types of XXE attacks?</h2><p>
            There are various types of XXE attacks:
        </p><ul>
            <li>
                <a href="/web-security/xxe#exploiting-xxe-to-retrieve-files">Exploiting XXE to retrieve files</a>, where an external entity is defined containing the contents of a file, and returned in the application's response.
            </li>
            <li>
                <a href="/web-security/xxe#exploiting-xxe-to-perform-ssrf-attacks">Exploiting XXE to perform SSRF attacks</a>, where an external entity is defined based on a URL to a back-end system.
            </li>
            <li>
                <a href="/web-security/xxe/blind#exploiting-blind-xxe-to-exfiltrate-data-out-of-band">Exploiting blind XXE exfiltrate data out-of-band</a>, where sensitive data is transmitted from the application server to a system that the attacker controls.
            </li>
            <li>
                <a href="/web-security/xxe/blind#exploiting-blind-xxe-to-retrieve-data-via-error-messages">Exploiting blind XXE to retrieve data via error messages</a>, where the attacker can trigger a parsing error message containing sensitive data.
            </li>
        </ul><h2 id="exploiting-xxe-to-retrieve-files">Exploiting XXE to retrieve files</h2><p>
            To perform an XXE injection attack that retrieves an arbitrary file from the server's filesystem, you need to modify the submitted XML in two ways:
        </p><ul>
            <li>
                Introduce (or edit) a <code>DOCTYPE</code> element that defines an external entity containing the path to the file.
            </li>
            <li>
                Edit a data value in the XML that is returned in the application's response, to make use of the defined external entity.
            </li>
        </ul><p>
            For example, suppose a shopping application checks for the stock level of a product by submitting the following XML to the server:
        </p><code class="code-scrollable">&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;
&lt;stockCheck&gt;&lt;productId&gt;381&lt;/productId&gt;&lt;/stockCheck&gt;</code><p>
            The application performs no particular defenses against XXE attacks, so you can exploit the XXE vulnerability to retrieve the <code>/etc/passwd</code> file by submitting the following XXE payload:
        </p><code class="code-scrollable">&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;
&lt;!DOCTYPE foo [ &lt;!ENTITY xxe SYSTEM &quot;file:///etc/passwd&quot;&gt; ]&gt;
&lt;stockCheck&gt;&lt;productId&gt;&amp;xxe;&lt;/productId&gt;&lt;/stockCheck&gt;</code><p>
            This XXE payload defines an external entity <code>&amp;xxe;</code> whose value is the contents of the <code>/etc/passwd</code> file and uses the entity within the <code>productId</code> value. This causes the application's response to include the contents of the file:
        </p><code class="code-scrollable">Invalid product ID: root:x:0:0:root:/root:/bin/bash
daemon:x:1:1:daemon:/usr/sbin:/usr/sbin/nologin
bin:x:2:2:bin:/bin:/usr/sbin/nologin
...</code><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                With real-world XXE vulnerabilities, there will often be a large number of data values within the submitted XML, any one of which might be used within the application's response. To test systematically for XXE vulnerabilities, you will generally need to test each data node in the XML individually, by making use of your defined entity and seeing whether it appears within the response.
            </p>
        </div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '96A4274D6672C286187A77CC2A99F9342B37C04786B8C9E88A91BD9759D3E7D4'])@verbatim<h2 id="exploiting-xxe-to-perform-ssrf-attacks">Exploiting XXE to perform SSRF attacks</h2><p>
            Aside from retrieval of sensitive data, the other main impact of XXE attacks is that they can be used to perform server-side request forgery (SSRF). This is a potentially serious vulnerability in which the server-side application can be induced to make HTTP requests to any URL that the server can access.
        </p><p>
            To exploit an XXE vulnerability to perform an SSRF attack, you need to define an external XML entity using the URL that you want to target, and use the defined entity within a data value. If you can use the defined entity within a data value that is returned in the application's response, then you will be able to view the response from the URL within the application's response, and so gain two-way interaction with the back-end system. If not, then you will only be able to perform blind SSRF attacks (which can still have critical consequences).
        </p><p>
            In the following XXE example, the external entity will cause the server to make a back-end HTTP request to an internal system within the organization's infrastructure:
        </p><code class="code-scrollable">&lt;!DOCTYPE foo [ &lt;!ENTITY xxe SYSTEM &quot;http://internal.vulnerable-website.com/&quot;&gt; ]&gt;</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'B856C63F6E47C5473568908B886232E76C6F1D02E9EBAE4FD2FFE9D26ADB1A56'])@verbatim<h2 id="blind-xxe-vulnerabilities">Blind XXE vulnerabilities</h2><p>
            Many instances of XXE vulnerabilities are blind. This means that the application does not return the values of any defined external entities in its responses, and so direct retrieval of server-side files is not possible.
        </p><p>
            Blind XXE vulnerabilities can still be detected and exploited, but more advanced techniques are required. You can sometimes use out-of-band techniques to find vulnerabilities and exploit them to exfiltrate data. And you can sometimes trigger XML parsing errors that lead to disclosure of sensitive data within error messages.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/xxe/blind">Finding and exploiting blind XXE vulnerabilities</a></li></ul></div><h2 id="finding-hidden-attack-surface-for-xxe-injection">Finding hidden attack surface for XXE injection</h2><p>
            Attack surface for XXE injection vulnerabilities is obvious in many cases, because the application's normal HTTP traffic includes requests that contain data in XML format. In other cases, the attack surface is less visible. However, if you look in the right places, you will find XXE attack surface in requests that do not contain any XML.
        </p><h3 id="xinclude-attacks">XInclude attacks</h3><p>
            Some applications receive client-submitted data, embed it on the server-side into an XML document, and then parse the document. An example of this occurs when client-submitted data is placed into a back-end SOAP request, which is then processed by the backend SOAP service.
        </p><p>
            In this situation, you cannot carry out a classic XXE attack, because you don't control the entire XML document and so cannot define or modify a <code>DOCTYPE</code> element. However, you might be able to use <code>XInclude</code> instead. <code>XInclude</code> is a part of the XML specification that allows an XML document to be built from sub-documents. You can place an <code>XInclude</code> attack within any data value in an XML document, so the attack can be performed in situations where you only control a single item of data that is placed into a server-side XML document.
        </p><p>
            To perform an <code>XInclude</code> attack, you need to reference the <code>XInclude</code> namespace and provide the path to the file that you wish to include. For example:
        </p><code class="code-scrollable">&lt;foo xmlns:xi=&quot;http://www.w3.org/2001/XInclude&quot;&gt;
&lt;xi:include parse=&quot;text&quot; href=&quot;file:///etc/passwd&quot;/&gt;&lt;/foo&gt;</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '68BB9B0D753781BEEB1BD78EC3BE309BED3DE2F8B62B6336DB6A92593BC5DAAA'])@verbatim<h3 id="xxe-attacks-via-file-upload">XXE attacks via file upload</h3><p>
            Some applications allow users to upload files which are then processed server-side. Some common file formats use XML or contain XML subcomponents. Examples of XML-based formats are office document formats like DOCX and image formats like SVG.
        </p><p>
            For example, an application might allow users to upload images, and process or validate these on the server after they are uploaded. Even if the application expects to receive a format like PNG or JPEG, the image processing library that is being used might support SVG images. Since the SVG format uses XML, an attacker can submit a malicious SVG image and so reach hidden attack surface for XXE vulnerabilities.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '5D6E610406B1DF6C657E111DF6297E961A822A0428F00DB9F7E7276F4A671A14'])@verbatim<h3 id="xxe-attacks-via-modified-content-type">XXE attacks via modified content type</h3><p>
            Most POST requests use a default content type that is generated by HTML forms, such as <code>application/x-www-form-urlencoded</code>. Some web sites expect to receive requests in this format but will tolerate other content types, including XML.
        </p><p>
            For example, if a normal request contains the following:
        </p><code class="code-scrollable">POST /action HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Content-Length: 7

foo=bar</code><p>
            Then you might be able submit the following request, with the same result:
        </p><code class="code-scrollable">POST /action HTTP/1.0
Content-Type: text/xml
Content-Length: 52

&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;&lt;foo&gt;bar&lt;/foo&gt;</code><p>
            If the application tolerates requests containing XML in the message body, and parses the body content as XML, then you can reach the hidden XXE attack surface simply by reformatting requests to use the XML format.
        </p><h2 id="how-to-find-and-test-for-xxe-vulnerabilities">How to find and test for XXE vulnerabilities</h2><p>
            The vast majority of XXE vulnerabilities can be found quickly and reliably using Burp Suite's web vulnerability scanner.
        </p><p>
            Manually testing for XXE vulnerabilities generally involves:
        </p><ul>
            <li>
                Testing for <a href="/web-security/xxe#exploiting-xxe-to-retrieve-files">file retrieval</a> by defining an external entity based on a well-known operating system file and using that entity in data that is returned in the application's response.
            </li>
            <li>
                Testing for <a href="/web-security/xxe/blind">blind XXE vulnerabilities</a> by defining an external entity based on a URL to a system that you control, and monitoring for interactions with that system. <a href="/web-security/all-labs">Burp Collaborator</a> is perfect for this purpose.
            </li>
            <li>
                Testing for vulnerable inclusion of user-supplied non-XML data within a server-side XML document by using an <a href="/web-security/xxe#xinclude-attacks">XInclude attack</a> to try to retrieve a well-known operating system file.
            </li>
        </ul><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                Keep in mind that XML is just a data transfer format. Make sure you also test any XML-based functionality for other vulnerabilities like XSS and SQL injection. You may need to encode your payload using XML escape sequences to avoid breaking the syntax, but you may also be able to use this to <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-xml-encoding">obfuscate your attack</a> in order to bypass weak defences.
            </p>
        </div><h2 id="how-to-prevent-xxe-vulnerabilities">How to prevent XXE vulnerabilities</h2><p>
            Virtually all XXE vulnerabilities arise because the application's XML parsing library supports potentially dangerous XML features that the application does not need or intend to use. The easiest and most effective way to prevent XXE attacks is to disable those features.
        </p><p>
            Generally, it is sufficient to disable resolution of external entities and disable support for <code>XInclude</code>. This can usually be done via configuration options or by programmatically overriding default behavior. Consult the documentation for your XML parsing library or API for details about how to disable unnecessary capabilities.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/all-labs">Find XXE vulnerabilities using Burp Suite's web vulnerability scanner</a></li></ul></div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
