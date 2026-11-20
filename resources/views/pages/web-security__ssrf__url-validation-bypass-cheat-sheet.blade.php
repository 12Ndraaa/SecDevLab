@extends('layouts.academy')

@section('title', 'URL validation bypass cheat sheet for SSRF/CORS/Redirect - 2024 Edition | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psacademy.css')

@section('academy_body')
@verbatim
<ol class="container ps-breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/ssrf"><span itemprop="name">SSRF</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/ssrf/url-validation-bypass-cheat-sheet"><span itemprop="name">URL validation bypass cheat sheet</span></a><meta itemprop="position" content="3" /></li></ol>        <section class="maincontainer">
                <div class="container">
                    
    <h1>URL validation bypass cheat sheet</h1>


<p>This cheat sheet contains payloads for bypassing URL validation. These wordlists are useful for attacks such as <a href="/web-security/ssrf">server-side request forgery</a>,
            <a href="/web-security/cors">CORS misconfigurations</a>, and <a href="/web-security/dom-based/open-redirection">open redirection</a>.
        </p>
        <div id="cheatsheet">
            <iframe src="https://cheat-sheets.portswigger.net/" class="cheatsheet-content-iframe" sandbox="allow-scripts allow-popups allow-top-navigation-by-user-activation" allow="clipboard-read; clipboard-write"></iframe>
        </div>
        


                </div>
        </section>
@endverbatim
@endsection
