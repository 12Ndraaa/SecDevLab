@extends('layouts.academy')

@section('title', 'Video guidelines | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/video-guidelines"><span itemprop="name">Guidelines for submitting video solutions</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Guidelines for submitting video solutions</h1><p>
            We're very grateful to the enthusiastic community of users who put time and effort into creating video solutions for our labs. If you're interested in submitting your own videos to be featured on the Web Security Academy, the following guidelines should help you get started.
        </p><h4>How do I submit a video solution for the Web Security Academy?</h4><p>
            To submit a video solution for the Web Security Academy:
        </p><ol>
            <li>
                <p>
                    Carefully <a href="/web-security/video-guidelines#what-are-the-requirements-for-new-video-solutions">read our requirements</a> and record your video.
                </p>
            </li>
            <li>
                <p>
                    Upload the video to YouTube and make sure that it is publicly accessible.
                </p>
            </li>
            <li>
                <p>
                    Contact our customer support team on <code>support@portswigger.net</code>.
                </p>
            </li>
            <li>
                <p>
                    Our team will review the video to make sure that it meets our requirements. If so, we will add it to a backlog of videos that we plan to embed.
                </p>
            </li>
        </ol><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                We add new videos to the site in batches, usually about once per month. We're a small team and can't always process videos as quickly as we'd like.
            </p>
        </div><h4 id="what-are-the-requirements-for-new-video-solutions">What are the requirements for new video solutions?</h4><p>
            Your video must:
        </p><ul>
            <li>
                <p>
                    Be accurate, clear, and explain how to solve the lab. Ideally, it should help other users understand why they need to perform certain steps, rather than just show them what to do.
                </p>
            </li>
            <li>
                <p>
                    Demonstrate how to solve a single lab. This makes it much easier for us to embed within the individual lab pages.
                </p>
            </li>
            <li>
                <p>
                    Be uploaded to YouTube and publicly accessible. We do not host any videos ourselves and do not support embedding videos from other platforms.
                </p>
            </li>
        </ul><p>
            Your video must not:
        </p><ul>
            <li>
                <p>
                    Contain any sponsored messages or other forms of paid promotion. We will accept videos containing YouTube-generated ads, but please avoid advertising products and services within the main video content.
                </p>
            </li>
            <li>
                <p>
                    Contain background music.
                </p>
            </li>
            <li>
                <p>
                    Be excessively long. In general, we don't expect videos to be longer than about 15 minutes, although we may make exceptions where necessary.
                </p>
            </li>
        </ul><h4>How do we manage videos?</h4><ul>
            <li>
                We prioritize videos for labs that don't yet have a video solution.
            </li>
            <li>
                We list a maximum of three video solutions for each lab.
            </li>
            <li>
                We review videos every couple of years, to make sure that they're still relevant. This is because we develop Burp's interface and capabilities all the time, which unfortunately means videos can become obsolete.
            </li>
            <li>
                If your video has been up for a while and uses an old version of Burp, we'll aim to let you know that we're thinking of replacing it. This gives you the opportunity to update it, if you choose to.
            </li>
        </ul><h4>Will you commission me to make videos?</h4><p>
            We do not currently have any plans to commission users to make videos for us. The Web Security Academy is a free resource that we provide with the aim of helping users develop their knowledge and skills. All of the community solution videos were created independently by users for their own YouTube channels - we just reference these from the lab solution pages, with their permission of course.
        </p>
        
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
