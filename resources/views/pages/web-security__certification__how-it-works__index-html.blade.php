@extends('layouts.academy')

@section('title', 'How the Burp Suite Certified Practitioner exam process works | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psproducts.css')

@section('academy_body')
@verbatim
<div no-keyword-injection="" class="wrapper" id="certification">

    <div class="hero theme-pro-2">

        <div class="container-columns">
            <div>
                <h2 cms-ignore-validation="HEADING_CAPITALIZATION,DUPLICATE_HEADINGS" id="get-burp-suite-certified-for">Get Burp Suite Certified for @endverbatim@include('partials.widget', ['id' => 'burp-certificationstartingprice'])@verbatim</h2>
                <h1 class="heading1-white heading-2" id="how-to-get-your-certification"><span>How to </span>get your certification</h1>
                <div class="container-buttons-left">
                    <a class="button-orange" href="https://portswigger.net/buy/certification">Get certified</a>
                    <a class="button-white" href="/web-security/certification/how-to-prepare">Get prepared</a>
                </div>
            </div>
            <img cms-ignore-validation="UNIQUE_IMG_ALT_TEXT" class="desktop-show" alt="SecDevLab" src="/web-security/certification/images/certified-secondary-hero.png">
        </div>

    </div>

    <div class="notification-tab-teal-50">
        <p>Ready to take the exam?
            <a href="/web-security/certification/how-it-works#what-the-exam-involves">Here's what you need to know.</a></p>
    </div>

    <div class="section theme-white text-center">
        <p class="intro">The SecDevLab Certified Practitioner exam is a challenging practical examination designed to demonstrate your web security testing knowledge and Burp Suite skills. To pass the certification exam, you are required to
            demonstrate an in-depth knowledge of a wide range of vulnerability classes, and the Burp Suite functionality required to support you in discovery, understanding, and exploitation.
        </p>
    </div>

    <div class="sticky-side-menu-white">
        <div>
            <aside>
                <h4 cms-ignore-validation="HEADING_CAPITALIZATION">In this guide</h4>

                <a class="sticky-menu-link" href="/web-security/certification/how-it-works#overview">Overview</a>
                <a class="sticky-menu-link" href="/web-security/certification/how-it-works#purchasing-your-exam">Purchasing your exam</a>
                <a class="sticky-menu-link" href="/web-security/certification/how-it-works#preparing-for-the-exam">Preparing for the exam</a>
                <a class="sticky-menu-link" href="/web-security/certification/how-it-works#what-the-exam-involves">What the exam involves</a>
                <a class="sticky-menu-link" href="/web-security/certification/how-it-works#exam-conditions">Exam conditions</a>
                <a class="sticky-menu-link" href="/web-security/certification/how-it-works#requirements">Requirements</a>
                <a class="sticky-menu-link" href="/web-security/certification/how-it-works#system">System</a>
                <a class="sticky-menu-link" href="/web-security/certification/how-it-works#your-exam-results">Your exam results</a>

            </aside>
            <span>

                <div class="section theme-community-6">
                    <h3 id="overview">Overview</h3>
                    <p>The exam follows a process that is similar to the labs in the Web Security Academy, and the practice exam. However, in order to take the exam you first need to go through our automated identity verification process.
                    </p>
                    <p>To become a SecDevLab Certified Practitioner, you need to work through the following steps:</p>

                    <ol>
                        <li><p>Purchase your certification exam.</p></li>
                        <li><p>Check the system requirements.</p></li>
                        <li><p>Configure your device to work with our proctoring software, and upload your ID documents.</p></li>
                        <li><p>Take your certification exam.</p></li>
                        <li><p>Get your certification results.</p></li>
                    </ol>
                    <h4>You'll need a Burp Suite Professional subscription to take the exam.</h4>
                    <p>To undertake the certification exam, you will need access to an active subscription of Burp Suite Professional. <a href="https://portswigger.net/buy/pro">Get a subscription to Burp
                        Suite Professional now</a>, if you don't already have access to a separate license.
                    </p>
                </div>

                <div class="section theme-white">
                    <h3 id="purchasing-your-exam">Purchasing your exam</h3>
                    <p>You can purchase a SecDevLab Certified Practitioner exam from your SecDevLab user account. Once you have purchased your exam, you will need to configure your device to work with our proctoring service. This service also verifies your identity before your exam starts.</p>
                    <h4>How does an automated proctoring service work?</h4>
                    <p>The process is simple, and involves an ID check by our automated proctor. You will be unable to pass the exam until we have verified your ID.
                    </p>
                    <div class="container-buttons-left">
                        <a class="chevron-after" href="https://portswigger.net/buy/certification">Purchase your SecDevLab Certified Practitioner exam now</a>
                    </div>
                </div>

                <div class="banner-layered theme-pro-2 spacer">
                    <div>
                        <h2 cms-ignore-validation="HEADING_TOO_LONG,HEADING_CAPITALIZATION" class="heading2-white " id="overall-my-experience-was-totally-crazy-fun-i-don-t-think-i-ve-ever-taken-an-exam-like-this-since-the-oscp-it-was-always-a-wild-ride-and-one-of-the-most-enjoyable">"Overall my
                            experience was totally crazy fun, I don't think I've ever taken an exam like this since the OSCP. It was always a wild ride and one of the most enjoyable."
                        </h2>
                        <h4>Johnny Villarreal</h4>
                    </div>
                </div>

                <div class="section theme-community-6 spacer">
                    <h3 id="using-our-proctoring-service">Using our proctoring service</h3>
                    <p>In order to complete your exam, you need to configure your device to work with our proctoring service. You also need to upload an image of a government-issued photo ID. This can be a driver's license, passport, military identification card, or another form of acceptable ID. </p>
                    <p>Make sure that your name and photo are visible and that the image is clear and bright enough to be easily read.</p>
                    <h4>Use a non-proxied browser to start proctoring</h4>
                    <p>Start the proctoring process in a browser that is not configured to use Burp Proxy. Do not send your proctoring session through Burp. Once proctoring has started, use your proxied browser to work with the exam applications.</p>
                </div>

                <div class="section theme-white">
                    <h3 id="preparing-for-the-exam">Preparing for the exam</h3>
                    <p>Before you take your real exam, we strongly advise that you work through our four preparation steps. They have been designed to thoroughly prepare you, by testing the wide variety of both vulnerabilities and skills that you
                        will be required to demonstrate to successfully pass the exam.
                    </p>
                    <p>The preparation steps should also help you to gauge the difficulty level of the exam, and therefore judge for yourself whether you are at the required skill level to gain the certification.</p>
                    <p>There are no restrictions on the amount of times you may complete the preparation steps.</p>
                    <div class="container-buttons-left">
                        <a class="button-orange" href="/web-security/certification/how-to-prepare">Go to exam preparation steps</a>
                    </div>
                </div>

                <div class="section theme-community-6">
                    <h3 id="what-the-exam-involves">What the exam involves</h3>
                    <p>In order to take the exam, you will first need to log in to your SecDevLab user account. You will find a button labeled "Take exam". By clicking this button, you will begin the official exam process. Once you have successfully completed the automated proctoring session, your exam will begin.
                    </p>
                    <p>You will have four hours to complete the SecDevLab Certified Practitioner exam. There are two applications, and each application contains deliberate vulnerabilities. This means that each application
                        can be completed in three stages:
                    </p>
                    <ol>
                        <li><p><strong>Stage 1</strong>: Access any user account.</p></li>
                        <li><p><strong>Stage 2</strong>: Use your user account to access the admin interface, perhaps by elevating your privileges or compromising the administrator account.</p></li>
                        <li><p><strong>Stage 3</strong>: Use the admin interface to read the contents of /home/carlos/secret from the server's filesystem, and submit it using "submit solution".</p></li>
                    </ol>
                    <p>While exploiting each application, you will gain access to powerful functionality. If you use this to delete your own account or a core system component, you may make your exam impossible to complete.</p>
                    <p>There is always an administrator account with the username "<strong>administrator</strong>", plus a lower-privileged account usually called "<strong>carlos</strong>". If you find a
                        username enumeration vulnerability, you may be able to break into a low-privileged account using the following <a href="/web-security/authentication/auth-lab-usernames">
                            username list</a> and <a href="/web-security/authentication/auth-lab-passwords">password list</a>.
                    </p>
                    <p>Each application has up to one active user, who will be logged in either as a user or an administrator. You can assume that they will visit the homepage of the site every 15 seconds, and click any
                        links in any emails they receive from the application. You can use exploit server's "send to victim" functionality to target them with reflected vulnerabilities.
                    </p>
                    <p>If you find an SSRF vulnerability, you can use it to read files by accessing an internal-only service, running on localhost on port 6566.</p>
                    <p>Host header attacks are fair game, but the _lab and _lab_analytics cookies are part of the core exam functionality - please don't waste your time tampering with them.</p>
                    <p>To understand the skills required to take this exam, please refer to the <a href="/web-security/certification/how-to-prepare">prepare for the exam</a> page.</p>
                </div>

                <div class="section theme-white">
                    <h3 id="exam-conditions">Exam conditions</h3>
                    <p>The integrity of the SecDevLab Certified Practitioner exam is what makes it so valuable, so we have a robust system for identifying and banning people who attempt to cheat. Here's what you need to know:</p>
                    <ul>
                        <li><p>Any cheating will result in a permanent ban.</p></li>
                        <li><p>You must use a Burp project file for the full period of the exam, and submit that project file for analysis.</p></li>
                        <li><p>You must complete the exam without help from anyone.</p></li>
                        <li><p>You must not share your exam addresses with anyone.</p></li>
                    </ul>
                </div>

                <div class="section theme-community-6">
                    <h3 id="requirements">Requirements</h3>
                    <p>The following sections outline the requirements for the exam. Please make sure you read these sections thoroughly before purchasing your certification exam.</p>
                </div>

                <div class="section theme-community-6">
                    <h4>Proficiency/skill</h4>
                    <p>To pass the certification exam, you are required to demonstrate an in-depth knowledge of a wide range of vulnerability classes, and the Burp Suite functionality required to support you in discovery, understanding, and exploitation.</p>
                    <p>To get ready for the challenges you'll face in the certification exam, please refer to the <a href="/web-security/certification/how-to-prepare">how to prepare for the exam</a> page.</p>
                </div>

                <div class="section theme-community-6">
                    <h4>Language</h4>
                    <p>All exam materials will be presented in English. If you can comfortably read the learning materials within the Web Security Academy, and all of the exam guidance pages, the exam will not present
                        you with any language-based challenges.
                    </p>
                </div>

                <div class="section theme-white">
                    <h3 id="system">System</h3>
                    <p>Operating system:</p>
                    <ul>
                        <li><p>MacOS X 10.5 or higher.</p></li>
                        <li><p>Windows Vista or higher.</p></li>
                        <li><p>Linux</p></li>
                        <li><p>ChromeOS.</p></li>
                    </ul>
                    <h4>Browser:</h4>
                    <ul>
                        <li><p>The latest version of Google Chrome - please disable your pop-up blocker.</p></li>
                    </ul>
                    <h4>Hardware:</h4>
                    <ul>
                        <li><p>Desktop or laptop.</p></li>
                        <li><p>Built-in or external webcam.</p></li>
                        <li><p>Built-in or external microphone.</p></li>
                    </ul>
                    <p>Please note that tablets and mobile devices are not supported.</p>
                    <h4>Internet:</h4>
                    <ul>
                        <li><p>An upload and download speed of 2Mbps.</p></li>
                        <li><p>Hot spots are not recommended because a reliable internet connection is essential.</p></li>
                    </ul>
                    <h4>Software:</h4>
                    <ul>
                        <li><p>Burp Suite Professional. Please note that it will not be possible for you to complete the exam without Burp Suite Professional.</p></li>
                        <li><p>In addition, we require that you use a project file, which we may request up to a week after you have taken the exam to confirm your certificate or investigate any reported issues.</p></li>
                    </ul>
                    <div class="container-buttons-left">
                        <a class="chevron-after" href="https://portswigger.net/buy/pro">Get Burp Suite Professional</a>
                    </div>
                </div>

                <div class="section theme-community-6 spacer">
                    <h3 id="your-exam-results">Your exam results</h3>
                    <p>We will notify you by email with your results. If you successfully pass the SecDevLab Certified Practitioner exam, you will receive a link to your certificate by email. If you failed the exam, we will
                        let you know by email. We will also provide you with resources and guidance to help you prepare for re-booking your certification exam.
                    </p>
                    <p>If you haven't received your results after 3-5 working days, log in to your SecDevLab user account to check the status of your exam.</p>
                    <p>If you successfully pass the exam, and become a SecDevLab Certified Practitioner, make sure you let the world know! Add your certification status to your social channels and profiles, and let
                        your employers and prospective employers know.
                    </p>
                </div>

                <div class="section theme-white">
                    <h3 id="verifying-your-exam-results">Verifying your exam results</h3>
                    <p>If your employer (or prospective employer) wishes to validate your certification, you will need to share the unique code on your certificate and the <a href="/web-security/certification/verify-your-certification">
                        link to the validation platform</a>.
                    </p>
                </div>

            </span>
        </div>
    </div>

    <div class="section-full-width theme-navy-9 spacer">
        <div class="container-cards-white-medium-space-between">
            <a href="/web-security/certification/how-it-works">
                <h4>How the exam works</h4>
                <div class="chevron-after">Read more</div>
            </a>
            <a href="/web-security/certification/exam-hints-and-guidance">
                <h4>Exam hints and guidance</h4>
                <div class="chevron-after">Read more</div>
            </a>
            <a href="/web-security/certification/how-it-works#what-the-exam-involves">
                <h4>What the exam involves</h4>
                <div class="chevron-after">Read more</div>
            </a>
            <a href="https://portswigger.net/buy/certification">
                <h4>Buy your BSCP exam</h4>
                <div class="chevron-after">Buy now</div>
            </a>
        </div>
    </div>


</div>
@endverbatim
@endsection
