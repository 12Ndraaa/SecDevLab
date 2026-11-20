@extends('layouts.academy')

@section('title', 'Using Burp Scanner during manual testing | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/essential-skills"><span itemprop="name">Essential skills</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/essential-skills/using-burp-scanner-during-manual-testing"><span itemprop="name">Using Burp Scanner during manual testing</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Using Burp Scanner during manual testing</h1><p>
            In this section, we'll show you a number of ways you can optimize your manual testing workflow by using Burp Scanner to supplement your own knowledge and intuition. Not only will this help you cover more ground, you'll be able to spend your time where it matters rather than on tedious preliminary work.
        </p><h2 id="scanning-a-specific-request">Scanning a specific request</h2><p>
            When you come across an interesting function or behavior, your first instinct may be to send the relevant requests to Repeater or Intruder and investigate further. But it's often beneficial to hand the request to Burp Scanner as well. It can get to work on the more repetitive aspects of testing while you put your skills to better use elsewhere.
        </p><p>
            If you right-click on a request and select <strong>Do active scan</strong>, Burp Scanner will use its default configuration to audit only this request.
        </p><div class="rounded-dropshadow">
            <img alt="Do active scan" src="/web-security/essential-skills/images/scanning-active-scan.png">
        </div><p>
            This may not catch every last vulnerability, but it could potentially flag things up in seconds that could otherwise have taken hours to find. It may also help you to rule out certain attacks almost immediately. You can still perform more targeted testing using Burp's manual tools, but you'll be able to focus your efforts on specific inputs and a narrower range of potential vulnerabilities.
        </p><p>
            Even if you already use Burp Scanner to run a general crawl and audit of new targets, switching to this more targeted approach to auditing can massively reduce your overall scan time.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '096E751392D26A789766B80531B5930FE3295D0856C2E072AB0818276834AF9E'])@verbatim<h2 id="scanning-custom-insertion-points">Scanning custom insertion points</h2><p>
            It's easy to see the benefits of limiting your scans to a single request, but you can take this a step further by only testing specific inputs within that request. You can do this from the message editor.
        </p><p>
            Highlight the insertion point you're interested in, then right-click and select <strong>Scan selected insertion point</strong>.
        </p><div class="rounded-dropshadow">
            <img alt="Scan selected insertion point" src="/web-security/essential-skills/images/scan-selected-insertion-point.png">
        </div><p>
            This lets you focus on the input that you're interested in, instead of scanning additional content that you know is unlikely to be useful.
        </p><p>
            Although you can just define a single insertion point using Intruder, it's often quicker to use the <a href="https://portswigger.net/bappstore/ca7ee4e746b54514a0ca5059329e926f">Scan manual insertion point</a> extension. You can highlight any sequence of characters within the request, typically a parameter value, and select <strong>Extensions &gt; Scan manual insertion point</strong> from the context menu.
        </p><p>
            This approach can yield results incredibly quickly, giving you something to work with in just a couple of seconds. It also means you can choose to scan inputs that Burp Scanner normally doesn't use, such as custom header values.
        </p><h2 id="scanning-non-standard-data-structures">Scanning non-standard data structures</h2><p>
            As you're free to define insertion points in arbitrary positions, you can also target a specific substring within a value. Among other things, this can be useful for scanning non-standard data structures.
        </p><p>
            When dealing with common formats, such as JSON, Burp Scanner is able to parse the data and place payloads in the correct positions without breaking the structure. However, consider a parameter that looks something like this:
        </p><code class="code-scrollable">user=048857-carlos</code><p>
            Using our intuition, we can take a guess that this will be treated as two distinct values by the back-end: an ID of some kind and what appears to be a username, separated by a hyphen. However, Burp Scanner will treat this all as a single value. As a result, it will just place payloads at the end of the parameter, or replace the value entirely.
        </p><p>
            To help scan non-standard data structures, you can scan a single part of a parameter. In this example you may want to target <code>carlos</code>. You can highlight <code>carlos</code> in the message editor, then right-click and select <strong>Scan selected insertion point</strong>.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'AA337200EF03F4ADB1C669E54C672A13150D20A25CEE6622930F71C424F0AFFC'])@verbatim<p>
            You can also use Intruder to define multiple insertion points. In the example above, you can define insertion points for <code>048857</code> and <code>carlos</code>, then right-click and select <strong>Scan defined insertion points</strong>.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
