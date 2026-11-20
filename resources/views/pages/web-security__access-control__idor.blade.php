@extends('layouts.academy')

@section('title', 'Insecure direct object references (IDOR) | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="10">
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
        <h3>Access control</h3>
        <ul>
            <li>
                <input type="checkbox" id="sub-nav-id-0">
                <label for="sub-nav-id-0">
                    <a href="/web-security/access-control#what-is-access-control">What is access control?</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/access-control#vertical-access-controls">Vertical access controls</a></li>
                    <li><a href="/web-security/access-control#horizontal-access-controls">Horizontal access controls</a></li>
                    <li><a href="/web-security/access-control#context-dependent-access-controls">Context-dependent access controls</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/access-control#vertical-privilege-escalation">Vertical privilege escalation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/access-control#unprotected-functionality">Unprotected functionality</a></li>
                    <li><a href="/web-security/access-control#parameter-based-access-control-methods">Parameter-based access control</a></li>
                    <li><a href="/web-security/access-control#broken-access-control-resulting-from-platform-misconfiguration">Platform misconfiguration</a></li>
                    <li><a href="/web-security/access-control#broken-access-control-resulting-from-url-matching-discrepancies">URL-matching discrepancies</a></li>
                </ul>
            </li>
            <li><a href="/web-security/access-control#horizontal-privilege-escalation">Horizontal privilege escalation</a></li>
            <li><a href="/web-security/access-control#horizontal-to-vertical-privilege-escalation">Horizontal to vertical privilege escalation</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/access-control/idor">Insecure direct object references (IDOR)</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/access-control/idor#idor-vulnerability-with-direct-reference-to-database-objects">Direct references to database objects</a></li>
                    <li><a href="/web-security/access-control/idor#idor-vulnerability-with-direct-reference-to-static-files">Direct references to static files</a></li>
                </ul>
            </li>
            <li><a href="/web-security/access-control#access-control-vulnerabilities-in-multi-step-processes">Vulnerabilities in multi-step processes</a></li>
            <li><a href="/web-security/access-control#referer-based-access-control">Vulnerabilities in Referer-based controls</a></li>
            <li><a href="/web-security/access-control#location-based-access-control">Vulnerabilities in location-based controls</a></li>
            <li><a href="/web-security/access-control#how-to-prevent-access-control-vulnerabilities">Preventing</a></li>
            <li><a href="/web-security/all-labs#access-control-vulnerabilities">View all access control labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/access-control"><span itemprop="name">Access control</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/access-control/idor"><span itemprop="name">IDOR</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Insecure direct object references (IDOR)</h1><p>
            In this section, we will explain what insecure direct object references (IDOR) are and describe some common vulnerabilities.
        </p><h2 id="what-are-insecure-direct-object-references-idor">What are insecure direct object references (IDOR)?</h2><p>
            Insecure direct object references (IDOR) are a type of access control vulnerability that arises when an application uses user-supplied input to access objects directly. The term IDOR was popularized by its appearance in the OWASP 2007 Top Ten. However, it is just one example of many access control implementation mistakes that can lead to access controls being circumvented. IDOR vulnerabilities are most commonly associated with horizontal privilege escalation, but they can also arise in relation to vertical privilege escalation.
		</p><h2 id="idor-examples">IDOR examples</h2><p>
		    There are many examples of access control vulnerabilities where user-controlled parameter values are used to access resources or functions directly.
	    </p><h3 id="idor-vulnerability-with-direct-reference-to-database-objects">IDOR vulnerability with direct reference to database objects</h3><p>
		    Consider a website that uses the following URL to access the customer account page, by retrieving information from the back-end database:
	    </p><code class="code-scrollable">https://insecure-website.com/customer_account?customer_number=132355</code><p>
		    Here, the customer number is used directly as a record index in queries that are performed on the back-end database. If no other controls are in place, an attacker can simply modify the <code>customer_number</code> value, bypassing access controls to view the records of other customers. This is an example of an IDOR vulnerability leading to horizontal privilege escalation.
	    </p><p>
			An attacker might be able to perform horizontal and vertical privilege escalation by altering the user to one with additional privileges while bypassing access controls. Other possibilities include exploiting password leakage or modifying parameters once the attacker has landed in the user's accounts page, for example.
		</p><h3 id="idor-vulnerability-with-direct-reference-to-static-files">IDOR vulnerability with direct reference to static files</h3><p>
		    IDOR vulnerabilities often arise when sensitive resources are located in static files on the server-side filesystem. For example, a website might save chat message transcripts to disk using an incrementing filename, and allow users to retrieve these by visiting a URL like the following:
	    </p><code class="code-scrollable">https://insecure-website.com/static/12144.txt</code><p>
		    In this situation, an attacker can simply modify the filename to retrieve a transcript created by another user and potentially obtain user credentials and other sensitive data.
	    </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'BF6B2F755E63BA10EEFDB6633048FC5CF8E4C1D5F386A756FD8E4B6864D70857'])@verbatim
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
