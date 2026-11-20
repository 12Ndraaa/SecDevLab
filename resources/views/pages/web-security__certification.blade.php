@extends('layouts.academy')

@section('title', 'Burp Suite Certified Practitioner | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psproducts.css')

@section('academy_body')
@verbatim
<div no-keyword-injection="" class="wrapper" id="certification">

    <div class="hero theme-pro-2">
        <div class="container-columns">
            <div>
                <h1 cms-ignore-validation="HEADING_CAPITALIZATION" class="heading1-white heading-2" id="a-web-security-certification-from-the-makers-of-burp-suite">A <span>web security certification</span>, from the makers of Burp Suite</h1>
                <div class="container-buttons-left">
                    <a class="button-orange" href="https://portswigger.net/buy/certification">Get certified</a>
                    <a class="button-white" href="/web-security/certification/how-to-prepare">Get prepared</a>
                </div>
            </div>
            <img class="desktop-show" alt="Why become a SecDevLab Certified Practitioner" src="/web-security/certification/images/certified-secondary-hero.png">
        </div>
    </div>

    <div class="section-full-width theme-community-6">
        <h2 cms-ignore-validation="HEADING_CAPITALIZATION" id="what-is-a-burp-suite-certified-practitioner">What is a SecDevLab Certified Practitioner?</h2>
        <p>
            The SecDevLab Certified Practitioner (BSCP) is an official certification for web security professionals, from the makers of <a href="/web-security/all-labs">Burp Suite</a>. Becoming a SecDevLab Certified Practitioner demonstrates a deep knowledge of web security vulnerabilities, the correct mindset to exploit them, and of course, the Burp Suite skills needed to carry this out.
        </p>
    </div>

    <div class="section-full-width theme-community-6">
        <h2 cms-ignore-validation="HEADING_CAPITALIZATION" id="why-become-a-burp-suite-certified-practitioner">Why become a SecDevLab Certified Practitioner?</h2>
        <p>Successfully passing the SecDevLab Certified Practitioner exam indicates a high-level proficiency in web security testing. It is aimed at penetration testers, and the organizations that employ them. </p>
        <div class="container-columns-block">
            <div>
                <h3 id="prove-your-proficiency" class="align-vertically-self-center heading4-dark-blue">Prove your proficiency</h3>
                <div class="align-vertically-self-center margin-small-right">
                    <ul class="margin-small-right">
                        <li>
                            Demonstrate a deep knowledge of the latest vulnerability classes and how to exploit them.
                        </li>
                        <li>
                            Showcase your skills with Burp Suite Professional.
                        </li>
                        <li>
                            Prove your hacking ability to employers and the community.
                        </li>
                    </ul>
                </div>
                <a class="align-vertically-self-center button-orange-small" href="/web-security/certification/how-to-prepare">Learn more</a>
            </div>

            <div>
                <h3 id="upskill-your-team" class="align-vertically-self-center heading4-dark-blue">Upskill your team</h3>
                <div class="align-vertically-self-center margin-small-right">
                    <ul class="margin-small-right">
                        <li>
                            Prove the proficiency of your testing team to potential clients.
                        </li>
                        <li>
                            Easily identify the best new talent to join your team.
                        </li>
                        <li>
                            Develop your team's expertise with knowledge of the latest vulnerability classes and how to exploit them.
                        </li>
                    </ul>
                </div>
                <a class="align-vertically-self-center button-orange-small" href="https://portswigger.net/blog/packetlabs-ltd-delivers-advanced-testing-capabilities-with-burp-suite-certified-practitioners">Learn more</a>
            </div>
        </div>

        <div class="container-columns-block">
            <div class="container-columns-3">
                <p class="no-margin-bottom"><strong>New to web security? <a class="chevron-after" href="/web-security/all-topics">Start your journey here</a></strong></p>
            </div>
        </div>

    </div>

    <div class="section-full-width theme-white">
        <h2 id="useful-information-and-resources">Useful information and resources</h2>
        <p>The information below will help you to learn how best to prepare for the SecDevLab Certified Practitioner exam, what the technical and system requirements are, and how
            you can purchase an exam credit for yourself.
        </p>
        <div class="section theme-grey-5 spacer">
            <h3>Preparing to take the exam?</h3>
            <p>Before you take your exam, make sure to work through the preparation steps and read the hints and guidance.</p>
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/certification/how-to-prepare">
                    <div class="chevron-after">How to prepare for your exam</div>
                </a>
                <a href="/web-security/certification/exam-hints-and-guidance">
                    <div class="chevron-after">Hints and guidance</div>
                </a>
            </div>
        </div>
        <div class="section theme-grey-5 spacer">
            <h3>Technical requirements</h3>
            <p>When you're prepared to take your exam, make sure you first read through the requirements to ensure your machine is at the right specification, and you have access to
                all of the files and information you'll need.
            </p>
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/certification/how-it-works">
                    <div class="chevron-after">How to get your certification</div>
                </a>
                <a href="/web-security/certification/how-it-works#requirements">
                    <div class="chevron-after">System requirements</div>
                </a>
            </div>
        </div>
        <div class="section theme-grey-5 spacer">
            <h3>Buying your exam</h3>
            <p>When you're ready, and have completed all of the required preparation, you can purchase your exam credit. Remember, you'll also need access to an active subscription
                of Burp Suite Professional to be able to take the exam.
            </p>
            <div class="container-cards-white-medium-space-between">
                <a href="https://portswigger.net/buy/certification">
                    <div class="chevron-after">Get Burp Suite Certified for @endverbatim@include('partials.widget', ['id' => 'burp-certificationstartingprice'])@verbatim</div>
                </a>
                <a href="https://portswigger.net/buy/pro">
                    <div class="chevron-after">Buy Burp Suite Professional for @endverbatim@include('partials.widget', ['id' => 'burp-prostartingprice'])@verbatim</div>
                </a>
            </div>
        </div>
    </div>

    <div class="section-full-width theme-white">
        <div class="container-columns-66-percent-left">
            <div class="text-left">
                <h2 class="heading2-dark-blue " id="validate-your-certification">Validate <span>your certification</span></h2>
                <p>Each user who successfully passes the SecDevLab Certified Practitioner exam will receive a link to their certificate, with a unique certification identifier. This
                    identifier can be included on your CV, shared with employers, and posted to your social profiles.
                </p>
                <p>Your digital certificate clearly states the validity of your certification, including both the start and end dates. Once acquired, your certification will last for five years.</p>
                <p>For more information, please refer to the <a href="/web-security/certification/terms-and-conditions">terms and conditions</a>.</p>
                <p><a class="chevron-after" href="/web-security/certification/verify-your-certification">Verify your certification and view your certificate</a></p>
            </div>
            <div class="desktop-show text-center">
                <img alt="SecDevLab Certified Practitioner logo" src="/web-security/certification/images/validate-your-certification.svg">
            </div>
        </div>

    </div>

    <div class="banner text-center theme-navy-1">
        <div>
            <h2 cms-ignore-validation="HEADING_TOO_LONG" class="heading2-white " id="get-certified-with-burp-suite-the-application-security-testing-toolkit-used-by-more-than-60-000-security-professionals">
                Get certified with Burp Suite, the application security testing toolkit used by more than 60,000 security professionals.</h2>
            <div class="container-buttons">
                <a class="button-orange" href="https://portswigger.net/buy/certification">Get certified</a>
            </div>
        </div>
    </div>



</div>
@endverbatim
@endsection
