@extends('layouts.academy')

@section('title', 'Web cache deception lab delimiter list | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="38">
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
        <h3>Web cache deception</h3>
        <ul>
            <li><a href="/web-security/web-cache-deception">Overview</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/web-cache-deception#web-caches">Web caches</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/web-cache-deception#cache-keys">Cache keys</a></li>
                    <li><a href="/web-security/web-cache-deception#cache-rules">Cache rules</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/web-cache-deception#constructing-a-web-cache-deception-attack">Constructing an attack</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/web-cache-deception#using-a-cache-buster">Using a cache buster</a></li>
                    <li><a href="/web-security/web-cache-deception#detecting-cached-responses">Detecting cached responses</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/web-cache-deception#exploiting-static-extension-cache-rules">Exploiting static extension cache rules</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/web-cache-deception#path-mapping-discrepancies">Path mapping discrepancies</a></li>
                    <li><a href="/web-security/web-cache-deception#exploiting-path-mapping-discrepancies">Exploiting path mapping discrepancies</a></li>
                    <li><a href="/web-security/web-cache-deception#delimiter-discrepancies">Delimiter discrepancies</a></li>
                    <li><a href="/web-security/web-cache-deception#exploiting-delimiter-discrepancies">Exploiting delimiter discrepancies</a></li>
                    <li><a href="/web-security/web-cache-deception#delimiter-decoding-discrepancies">Delimiter decoding discrepancies</a></li>
                    <li><a href="/web-security/web-cache-deception#exploiting-delimiter-decoding-discrepancies">Exploiting delimiter decoding discrepancies</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/web-cache-deception#exploiting-static-directory-cache-rules">Exploiting static directory cache rules</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/web-cache-deception#normalization-discrepancies">Normalization discrepancies</a></li>
                    <li><a href="/web-security/web-cache-deception#detecting-normalization-by-the-origin-server">Detecting normalization by the origin server</a></li>
                    <li><a href="/web-security/web-cache-deception#detecting-normalization-by-the-cache-server">Detecting normalization by the cache server</a></li>
                    <li><a href="/web-security/web-cache-deception#exploiting-normalization-by-the-origin-server">Exploiting normalization by the origin server</a></li>
                    <li><a href="/web-security/web-cache-deception#exploiting-normalization-by-the-cache-server">Exploiting normalization by the cache server</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/web-cache-deception#exploiting-file-name-cache-rules">Exploiting file name cache rules</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/web-cache-deception#detecting-normalization-discrepancies">Detecting normalization discrepancies</a></li>
                    <li><a href="/web-security/web-cache-deception#exploiting-normalization-discrepancies">Exploiting normalization discrepancies</a></li>
                </ul>
            </li>
            <li><a href="/web-security/web-cache-deception#preventing-web-cache-deception-vulnerabilities">Preventing vulnerabilities</a></li>
            <li><a href="/web-security/web-cache-deception#portswigger-research">Research</a></li>
            <li><a href="/web-security/all-labs#web-cache-deception">View all web cache deception labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/web-cache-deception"><span itemprop="name">Web cache deception</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/web-cache-deception/wcd-lab-delimiter-list"><span itemprop="name">Delimiter list</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Web cache deception lab delimiter list</h1><p>You can use the following list to help you solve the <a href="/web-security/web-cache-deception">Web cache deception</a> labs.</p><code class="code-scrollable">!
"
#
$
%
&
'
(
)
*
+
,
-
.
/
:
;
&lt;
=
&gt;
?
@
[
\
]
^
_
`
{
|
}
~
%21
%22
%23
%24
%25
%26
%27
%28
%29
%2A
%2B
%2C
%2D
%2E
%2F
%3A
%3B
%3C
%3D
%3E
%3F
%40
%5B
%5C
%5D
%5E
%5F
%60
%7B
%7C
%7D
%7E</code>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
