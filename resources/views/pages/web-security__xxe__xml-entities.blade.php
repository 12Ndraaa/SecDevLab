@extends('layouts.academy')

@section('title', 'Guide to XML entities with examples | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/xxe"><span itemprop="name">XXE injection</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/xxe/xml-entities"><span itemprop="name">XML entities</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">XML entities</h1><p>
            In this section, we'll explain some key features of XML that are relevant to understanding <a href="/web-security/xxe">XXE vulnerabilities</a>.
        </p><h2 id="what-is-xml">What is XML?</h2><p>
            XML stands for "extensible markup language". XML is a language designed for storing and transporting data. Like HTML, XML uses a tree-like structure of tags and data. Unlike HTML, XML does not use predefined tags, and so tags can be given names that describe the data. Earlier in the web's history, XML was in vogue as a data transport format (the "X" in "AJAX" stands for "XML"). But its popularity has now declined in favor of the JSON format.
        </p><h2 id="what-are-xml-entities">What are XML entities?</h2><p>
            XML entities are a way of representing an item of data within an XML document, instead of using the data itself. Various entities are built in to the specification of the XML language. For example, the entities <code>&amp;lt;</code> and <code>&amp;gt;</code> represent the characters <code>&lt;</code> and <code>&gt;</code>. These are metacharacters used to denote XML tags, and so must generally be represented using their entities when they appear within data.
        </p><h2 id="what-is-document-type-definition">What is document type definition?</h2><p>
            The XML document type definition (DTD) contains declarations that can define the structure of an XML document, the types of data values it can contain, and other items. The DTD is declared within the optional <code>DOCTYPE</code> element at the start of the XML document. The DTD can be fully self-contained within the document itself (known as an "internal DTD") or can be loaded from elsewhere (known as an "external DTD") or can be hybrid of the two.
        </p><h2 id="what-are-xml-custom-entities">What are XML custom entities?</h2><p>
            XML allows custom entities to be defined within the DTD. For example:
        </p><code class="code-scrollable">&lt;!DOCTYPE foo [ &lt;!ENTITY myentity "my entity value" &gt; ]&gt;</code><p>
            This definition means that any usage of the entity reference <code>&amp;myentity;</code> within the XML document will be replaced with the defined value: "<code>my entity value</code>".
        </p><h2 id="what-are-xml-external-entities">What are XML external entities?</h2><p>
            XML external entities are a type of custom entity whose definition is located outside of the DTD where they are declared.
        </p><p>
            The declaration of an external entity uses the <code>SYSTEM</code> keyword and must specify a URL from which the value of the entity should be loaded. For example:
        </p><code class="code-scrollable">&lt;!DOCTYPE foo [ &lt;!ENTITY ext SYSTEM "http://normal-website.com" &gt; ]&gt;</code><p>
            The URL can use the <code>file://</code> protocol, and so external entities can be loaded from file. For example:
        </p><code class="code-scrollable">&lt;!DOCTYPE foo [ &lt;!ENTITY ext SYSTEM "file:///path/to/file" &gt; ]&gt;</code><p>
            XML external entities provide the primary means by which <a href="/web-security/xxe">XML external entity attacks</a> arise.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
