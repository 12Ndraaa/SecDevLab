@extends('layouts.academy')

@section('title', 'Getting started | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psgenerictheme.css')

@section('academy_body')
@verbatim
<div no-keyword-injection="" class="wrapper" id="academy-started">

        <div class="hero">
            <div class="container-columns-centered-image">
                <div>
                    <h1 id="getting-started-with-the-web-security-academy" class="heading-2">Getting started with the Web Security Academy</h1>
                    <h4 cms-ignore-validation="HEADING_TOO_LONG">Follow our beginner's guide to web security, to boost your cybersecurity skills one vulnerability at a time.</h4>
                </div>
                <img alt="Getting started with the Web Security Academy" src="/web-security/getting-started/images/hero-academy-getting-started.jpg">
            </div>
        </div>

        <div class="section-full-width theme-grey-5 text-center">
            <h2 id="how-the-web-security-academy-works">How the Web Security Academy works</h2>

            <div class="container-columns-centered container-cards-white">
                <div>
                    <img alt="Read our learning materials" src="/web-security/getting-started/images/practice-our-learning.jpg">
                    <p><strong>1. Read our learning materials</strong></p>
                    <p>Learn about how vulnerabilities arise, and how they can be exploited in the wild.</p>
                    <a class="button-orange-small" href="/web-security/all-topics">View all topics</a>
                </div>

                <div>
                    <img alt="Practice your skills" src="/web-security/getting-started/images/practice-your-skills.jpg">
                    <p><strong>2. Practice your skills</strong></p>
                    <p>Put your skills to the test with our interactive labs and real-world scenarios.</p>
                    <a class="button-orange-small" href="/web-security/all-topics">View all topics</a>
                </div>

                <div>
                    <img alt="Track your progress" src="/web-security/getting-started/images/track-your-progress.jpg">
                    <p><strong>3. Track your progress</strong></p>
                    <p>Progress from Apprentice to Expert level, and track your rank on our Hall of Fame.</p>
                    <a class="button-orange-small" href="/web-security/dashboard">Visit dashboard</a>
                </div>
            </div>
        </div>

        <div class="section theme-white text-center">
            <h2 id="get-started-with-your-first-topic">Get started with your first topic</h2>
            <p class="intro">With so many topics to choose from, you may not be quite sure where to begin. We've created a variety of learning paths to help get you started on your journey with the Web Security Academy.</p>
        </div>

        <div class="section-full-width theme-white text-center">
            <a class="callout-large-orange" href="/web-security/learning-paths">
                <picture>
                    <img alt="Get started with your first Academy topic" src="/web-security/getting-started/images/academy-recommended-topic.jpg">
                </picture>
                <div>
                    <p>Learning paths</p>
                    <p>Guided learning paths through the Web Security Academy</p>
                    <span class="icon-arrow-right"></span>
                </div>
            </a>
        </div>

        <div class="section theme-white text-center">
            <h3 cms-ignore-validation="HEADING_CAPITALIZATION">Feeling confident? Pick a topic to begin</h3>
            <p class="intro">Whatever your experience level might be, we've got a topic for you to get stuck into. Pick one from the suggestions below, or view our full topic list to get started.</p>
        </div>

        <div class="section-full-width theme-white text-center">
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/sql-injection">
                    <h3>SQL Injection</h3>
                    <div class="chevron-after">Visit topic</div>
                </a>
                <a href="/web-security/authentication">
                    <h3>Authentication</h3>
                    <div class="chevron-after">Visit topic</div>
                </a>
                <a href="/web-security/cross-site-scripting">
                    <h3>Cross-site scripting (XSS)</h3>
                    <div class="chevron-after">Visit topic</div>
                </a>
                <a href="/web-security/logic-flaws">
                    <h3>Business logic vulnerabilities</h3>
                    <div class="chevron-after">Visit topic</div>
                </a>
            </div>
        </div>

        <div class="section-full-width theme-white text-center">
            <a class="chevron-after" href="/web-security/all-topics">View our full list of topics</a>
        </div>

        <div class="section-full-width theme-grey-5 text-center">
            <h2 id="find-your-way-around-burp-suite-with-our-video-tutorials">Find your way around Burp Suite with our video tutorials</h2>
            <p class="intro">We've created a handy set of Burp Suite tutorial videos, to guide you through some of the key tools you'll need when working on the Web Security Academy.</p>
        </div>

        <div class="section-full-width theme-grey-5 text-center">
            <div class="container-columns-3">
                <a class="youtube-lightbox-link" href="https://www.youtube.com/embed/ouDe5sJ_uC8">
                    <img src="/images/youtube/oude5sj_uc8.jpg">
                    <p>How to intercept HTTP requests and responses using Burp Suite Professional</p>
                </a>
                <a class="youtube-lightbox-link" href="https://www.youtube.com/embed/_Wifm2g9ugg">
                    <img src="/images/youtube/_wifm2g9ugg.jpg">
                    <p>How to resend individual requests with Burp Repeater</p>
                </a>
                <a class="youtube-lightbox-link" href="https://www.youtube.com/embed/nECt-0zW0O4">
                    <img src="/images/youtube/nect-0zw0o4.jpg">
                    <p>A guide to the Burp Suite Professional user interface</p>
                </a>
            </div>
            <a id="lightbox-trigger" class="youtube-lightbox" href="/web-security">Place Holder</a>
        </div>

        <div class="section-full-width theme-grey-5 text-center">
            <div class="container-columns-line-vertical-separators">
                <a class="chevron-after text-right" href="/web-security/all-labs">View all video tutorials</a>
                <a class="chevron-after text-left" href="/web-security/getting-started">Burp documentation</a>
            </div>
        </div>

        <div class="section-full-width theme-white text-center">
            <h2 id="keep-up-with-the-latest-from-the-web-security-academy">Keep up with the latest from the Web Security Academy</h2>
            <p class="intro">Follow us on Twitter for new topic releases, and to get involved with our wider community.</p>
            <div class="container-buttons">
                <a class="button-blue" href="https://twitter.com/WebSecAcademy"><span class="icon-twitter"></span>Follow us on twitter</a>
            </div>
        </div>

        <div class="section theme-white">
            <blockquote class="callout-quote-twitter">
                <div>
                    <span class="twitter-icon"></span>
                    <p>Learning about web security @WebSecAcademy and don't know how I made it this long in the web design world without getting into this. Now I am hooked. Can't stop playing around in their labs. Just spent an
                        entire long weekend in front of the laptop #websec
                    </p>
                </div>
                <cite>
                    <div>
                    <span>
                        <p><strong>@CodeWithFrida</strong></p>
                    </span>
                    </div>
                </cite>
            </blockquote>
        </div>

        <div class="section-full-width theme-white">
            <div class="image-slider-white-quoteblock">
                <p class="heading2">Hall of Fame high flyers</p>

                <input type="radio" class="ph-no-capture" name="slider-blockquote" id="slider1-1" checked="checked">
                <div>
                    <div>
                        <figure><img alt="Johnny Villarreal" src="/web-security/getting-started/images/johnny-villarreal.jpg"></figure>
                        <div>
                            <p>To find a place that had all of that information in one location, with a consistently high quality of labs, especially being free, it's a no-brainer. Why wouldn't you dive right into it?!
                                <sup>
                                    <strong>Johnny Villarreal</strong>
                                </sup>
                            </p>
                            <a class="chevron-after" href="/web-security/getting-started/johnny-villarreal">Read about Johnny's Web Security Academy experience</a>
                        </div>
                    </div>
                    <label for="slider1-3">
                        <span class="icon-arrow-head-left"></span>
                    </label>
                    <label for="slider1-2">
                        <span class="icon-arrow-head-right"></span>
                    </label>
                </div>

                <input type="radio" class="ph-no-capture" name="slider-blockquote" id="slider1-2">
                <div>
                    <div>
                        <figure><img alt="Kamil Vavra" src="/web-security/getting-started/images/kamil-vavra.jpg"></figure>
                        <div>
                            <p>I find that having Burp Suite Pro is really helpful for some of the Web Security Academy labs, so as I'm learning more skills by doing the labs I'm also learning how to use Burp Suite better as well.
                                I just don't think I'd be able to learn the same kinds of skills, to the same level, by doing OSCP or any of those kinds of qualifications.
                                <sup>
                                    <strong>Kamil Vavra</strong>
                                </sup>
                            </p>
                            <a class="chevron-after" href="/web-security/getting-started/kamil-vavra">Read about Kamil's Web Security Academy experience</a>
                        </div>
                    </div>
                    <label for="slider1-1">
                        <span class="icon-arrow-head-left"></span>
                    </label>
                    <label for="slider1-3">
                        <span class="icon-arrow-head-right"></span>
                    </label>
                </div>

                <input type="radio" class="ph-no-capture" name="slider-blockquote" id="slider1-3">
                <div>
                    <div>
                        <figure><img alt="Andres Rauschecker" src="/web-security/getting-started/images/andres-rauschecker.jpg"></figure>
                        <div>
                            <p>SecDevLab is a huge company in the cybersecurity field that gives back and creates a community. The way that Burp has developed, how you listen to the community, and create free learning materials.
                                It's absolutely amazing.
                                <sup>
                                    <strong>Andres Rauschecker</strong>
                                </sup>
                            </p>
                            <a class="chevron-after" href="/web-security/getting-started/andres-rauschecker">Read about Andres' Web Security Academy experience</a>
                        </div>
                    </div>
                    <label for="slider1-2">
                        <span class="icon-arrow-head-left"></span>
                    </label>
                    <label for="slider1-1">
                        <span class="icon-arrow-head-right"></span>
                    </label>
                </div>

            </div>
        </div>

        <div class="section-full-width theme-grey-5">
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/all-topics">
                    <h3>An overview of all topics</h3>
                    <div class="chevron-after">Read more</div>
                </a>
                <a href="/web-security/dashboard">
                    <h3>User dashboard</h3>
                    <div class="chevron-after">Read more</div>
                </a>
                <a href="/web-security/hall-of-fame">
                    <h3>Hall of Fame</h3>
                    <div class="chevron-after">Read more</div>
                </a>
            </div>
        </div>

        <div class="section-full-width theme-white">
            <div class="container-columns-block">
                <a href="/web-security/certification">
                    <img alt="SecDevLab Certified Practitioner certificate" src="/web-security/images/landing-pages/academy-homepage-cert-banner.png">
                    <div>
                        <h2 class="heading2-dark-blue " id="get-burp-suite-certified">Get Burp Suite certified</h2>
                        <p>Prove your ability to detect and exploit common web vulnerabilities, with the security testing software used by more than 70,000 security professionals worldwide.</p>
                        <span class="chevron-after">Ready for the challenge?</span>
                    </div>
                </a>
            </div>
        </div>

    </div>
@endverbatim
@endsection
