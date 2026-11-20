@extends('layouts.academy')

@section('title', 'The Web Application Hacker\'s Handbook | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="-1">
            <nav class="nav-lhs-scrollable">
                <label class="nav-lhs-toggle-label" for="nav-lhs-toggle"></label>
                
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/web-application-hackers-handbook"><span itemprop="name">Web Application Hacker's Handbook</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">The Web Application Hacker's Handbook</h1><p>
            For over a decade, The Web Application Hacker's Handbook (WAHH) has been the de facto standard reference book for people who are learning about web security.
        </p><p>
            Very many people have asked for a third edition of WAHH. But rather than produce another printed book with non-interactive content that slowly goes out of date, we've decided to create the <a href="/web-security">Web Security Academy</a> instead.
        </p><p>
            The Web Security Academy contains high-quality learning materials, interactive vulnerability labs, and video tutorials. You can learn at your own pace, wherever and whenever suits you. Best of all, everything is free!
        </p><p>
            The Web Security Academy is a living resource that we'll continue updating with new material and labs, covering the latest developments in web security research. We very much hope that the Web Security Academy will fulfill the purpose that The Web Application Hacker's Handbook has done in the past, and help the next generation of web hackers acquire the skills and knowledge that they need.
        </p><p class="cta">
            <a class="cta-primary-2" href="/web-security">Access the Web Security Academy</a>
        </p>
        
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
