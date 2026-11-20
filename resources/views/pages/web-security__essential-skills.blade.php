@extends('layouts.academy')

@section('title', 'Essential skills for web application security testing | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/essential-skills"><span itemprop="name">Essential skills</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Essential skills</h1><p>
            We design the labs for the Web Security Academy to be as realistic as possible, but you should keep in mind that each lab demonstrates just one possible variation of a given vulnerability. In practice, it's important to be able to recognize subtly different occurrences of the same underlying bugs and know how to adapt the techniques you've learned accordingly.
        </p><p>
            In this section, you'll learn some broadly applicable skills that will help you to apply what you've learned from our labs to other live targets. We cover a range of general tips and tricks, as well as how to use some of Burp's lesser-known features to optimize your workflow. We've also provided some additional labs, so you can test these out for yourself.
        </p><p>
            We plan to expand this section to cover more essential skills in the near future.
        </p><h2 cms-ignore-validation="DUPLICATE_HEADINGS" id="obfuscating-attacks-using-encodings">Obfuscating attacks using encodings</h2><p>
            Simply copying the attacks from our lab solutions and attempting them on real sites will only get you so far. Websites that you test will have often already been audited by other users and had a number of patches applied to them. To take your skills further, you'll need to adapt the techniques you've learned to overcome these additional obstacles, unearthing vulnerabilities that other testers may have overlooked.
        </p><p>
            In this section, we'll provide some suggestions on how you can obfuscate harmful payloads to evade input filters and other flawed defenses. Specifically, you'll learn how to use standard encodings to take advantage of misconfigurations and handling discrepancies between connected systems.
        </p><div class="highlightedarea">
            <h4>Learn more</h4>
            <ul>
                <li>
                    <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings">Obfuscating attacks using encodings</a>
                </li>
                <li>
                    <a href="/web-security/sql-injection/lab-sql-injection-with-filter-bypass-via-xml-encoding"><span class="label-light-green-small">LAB</span> SQL injection with filter bypass via XML encoding</a>
                </li>
            </ul>
        </div><h2 cms-ignore-validation="DUPLICATE_HEADINGS" id="using-burp-scanner-during-manual-testing">Using Burp Scanner during manual testing</h2><p>
            Testing for certain types of vulnerability can be fairly tedious, especially ones that involve trying numerous injection techniques in every controllable input. Doing this manually is often impractical due to real-life time constraints, which can lead to you missing critical vulnerabilities.
        </p><p>
            There are a number of ways you can optimize your workflow by using Burp Scanner to supplement your own knowledge and intuition. Not only does this reduce the chance of you overlooking things, it can save you valuable time by helping you to rapidly identify potential attack vectors. This means you can concentrate your time and effort on things that can't be easily automated, such as working out how to exploit the vulnerable behavior or chain it with your other findings.
        </p><div class="highlightedarea">
            <h4>Learn more</h4>
            <ul>
                <li>
                    <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing"><span class="label-light-green-small">LABS</span> Using Burp Scanner during manual testing</a>
                </li>
            </ul>
        </div><h2 id="identifying-unknown-vulnerabilities">Identifying unknown vulnerabilities</h2><p>
            When attempting one of our labs, you usually know the exact vulnerability you need to look for. This is obviously not the case when testing genuine websites. To help you bridge this gap, we've created a mystery lab feature that lets you practice identifying vulnerabilities without any prior knowledge of them.
        </p><div class="highlightedarea">
            <h4>Learn more</h4>
            <ul>
                <li>
                    <a href="/web-security/mystery-lab-challenge"><span class="label-light-green-small">LABS</span> Mystery lab challenge</a>
                </li>
            </ul>
        </div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
