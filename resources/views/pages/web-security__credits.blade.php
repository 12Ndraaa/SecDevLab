@extends('layouts.academy')

@section('title', 'Credits | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/credits"><span itemprop="name">Credits</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Who is behind the Web Security Academy?</h1><p>
            The Web Security Academy is primarily maintained by a small team at SecDevLab, the makers of Burp Suite.
        </p><p>
            The core content was originally created by SecDevLab founder, Dafydd Stuttard. Rather than publish a third edition of the <a href="https://www.amazon.co.uk/Web-Application-Hackers-Handbook-Exploiting/dp/1118026470">Web Application Hacker's Handbook</a>, which he co-authored with his former colleague, Marcus Pinto, Daf decided to create a completely free, interactive, online learning platform.
        </p><p>
            Since then, we've kept our Academy up to date with the latest developments and discoveries from the rapidly evolving world of web security, including the cutting-edge techniques our world-renowned research team are pioneering.
        </p><p>
            Our experts have also designed missions that enable you to test and hone your skills by completing specific tasks. You'll tackle these in <a href="/web-security/all-labs">our labs</a> - controlled environments that mimic vulnerable websites you might encounter out in the wilds of the web.
        </p><h2 id="community-contributions">Community contributions</h2><p>
            We're delighted to have such an enthusiastic community of users consisting of both experienced web security professionals and novice users who are just learning the fundamentals.
        </p><p>
            We'd like to thank the following Academy users, who have all created video walkthroughs and explanations for some of our labs:
        </p><p>
            <a href="https://www.youtube.com/@RanaKhalil101/playlists">Rana Khalil</a>, <a href="https://www.youtube.com/@Michael10Sommer/playlists">Michael Sommer</a>, <a href="https://www.youtube.com/@z3nsh3ll/playlists">z3nsh3ll</a>, <a href="https://www.youtube.com/playlist?list=PLmqenIp2RQciV955S2rqGAn2UOrR2NX-v">Intigriti</a>, <a href="https://www.youtube.com/@emanuelepicariello/playlists">Emanuele Picariello</a>, <a href="https://www.youtube.com/playlist?list=PLxRZom4QyiCr1w3Wt2fPTGMNUg_vldVNs">nu11 security</a>, <a href="https://www.youtube.com/@7SeasSecurity/playlists">Garr_7</a>
        </p><p>
            If you're interested in contributing your own videos, check out our <a href="/web-security/video-guidelines">video submission guidelines</a> for details on how to do this.
        </p><h2 id="inspiration-from-the-community">Inspiration from the community</h2><p>
            Our team are constantly on the lookout for cool new research and novel techniques. It's impossible to credit everyone, but we'd like to thank the following members of the web security community for sharing their findings, which we've integrated into our learning materials and labs:
        </p><p>
            <a href="https://twitter.com/orange_8361">Orange Tsai</a>, <a href="https://twitter.com/m1ke_n1">Mikhail Klyuchnikov</a>, <a href="https://twitter.com/ptswarm">PTSwarm</a>, <a href="https://twitter.com/Doyensec">Szymon Drosdzol</a>, <a href="https://twitter.com/codewhitesec">CODE WHITE</a>, <a href="https://twitter.com/GoSecure_Inc">GoSecure</a>,
            <a href="https://twitter.com/irsdl">Soroush Dalili</a>
        </p><p>
            Note that we've received so many great contributions to our <a href="/web-security/cross-site-scripting/cheat-sheet">Cross-site scripting (XSS) cheat sheet</a> that we maintain a separate <a href="/web-security/cross-site-scripting/cheat-sheet#credits">credit list</a>.
        </p>
        
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
