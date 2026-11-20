@extends('layouts.academy')

@section('title', 'Frequently asked questions - Burp Suite Certified Practitioner | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psproducts.css')

@section('academy_body')
@verbatim
<div no-keyword-injection="" class="wrapper" id="certification">

    <div class="hero theme-pro-2">

        <div class="container-columns">
            <div>
                <h2 cms-ignore-validation="HEADING_CAPITALIZATION,DUPLICATE_HEADINGS" id="get-burp-suite-certified-for">Get Burp Suite Certified for @endverbatim@include('partials.widget', ['id' => 'burp-certificationstartingprice'])@verbatim</h2>
                <h1 class="heading1-white heading-2" id="frequently-asked-questions"><span>Frequently asked </span>questions</h1>
                <div class="container-buttons-left">
                    <a class="button-orange" href="https://portswigger.net/buy/certification">Get certified</a>
                    <a class="button-white" href="/web-security/certification/practice-exam">Take practice exam</a>
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
        <p class="intro">Some frequently asked questions relating to booking your exam, how to prepare, the process of taking your exam, and your certification.
        </p>
    </div>

    <div class="section theme-white">

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>Do I need a Burp Suite Professional license to take the exam?</h4>
                </summary>
                <div class="content">
                    <p>So long as you have access to a valid, active Burp Suite Professional license at the time of your certification exam, you will be able to use it to take the exam.</p>
                    <p>In addition, we require that you use a project file, which we may request up to a week after you have taken the exam to confirm your certificate or investigate any reported issues.</p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>Can I use third party tools to take the exam?</h4>
                </summary>
                <div class="content">
                    <p>Burp Suite Professional provides the essential functionality to solve the exam.</p>
                    <p>Some vulnerabilities are easier to solve with the following third party tools: ysoserial and HTTP Request Smuggler. These tools are used by certain labs at the "Practitioner" level.</p>
                    <p>We recommend caution when using other tools - they may turn out not to be suitable for your objective.</p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>Can I use BApp extensions to help me complete the exam?</h4>
                </summary>
                <div class="content">
                    <p>If you find them helpful, or feel that you benefit from having them, you may use any BApp extension you like to support you in completing the exam.</p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4 cms-ignore-validation="HEADING_TOO_LONG">Why do I need a Burp Suite Professional license to take the exam - couldn't I just use Burp Suite Community Edition instead?</h4>
                </summary>
                <div class="content">
                    <p>The SecDevLab Certified Practitioner certification is, first and foremost, an exam designed to test your skills with Burp Suite Professional. It has been designed specifically to test your abilities with
                        this software and, as such, cannot be completed with either Burp Suite Community Edition or any other web application security testing toolkit.
                    </p>
                    <p>In addition, we require that you use a project file, which we may request up to a week after you have taken the exam to confirm your certificate or investigate any reported issues.</p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4 cms-ignore-validation="HEADING_TOO_LONG">Can I use a Burp Suite Professional license that is registered to my employee email address to take the exam?</h4>
                </summary>
                <div class="content">
                    <p>If you have a Burp Suite Professional license, but it is registered under an email domain of the company you work for rather than your personal email address, you will still be absolutely fine, from a technical
                        perspective, to use that license for taking the exam.
                    </p>
                    <p>So long as you have access to a valid, active Burp Suite Professional license at the time of your certification you will be able to use it to take the exam.</p>
                    <p>If you have any concerns about using your license because it is registered to a company rather than to you personally, we would suggest taking them up with your employer as they will be best able to advise
                        you.
                    </p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>How do I prepare for the certification exam?</h4>
                </summary>
                <div class="content">
                    <p>We've created some resources to help you get ready for your SecDevLab Certified Practitioner exam.</p>
                    <p>Check out this page for everything you'll need to <a href="/web-security/certification/how-to-prepare">get prepared for the exam</a>; read through this page to <a href="/web-security/certification/how-it-works">understand the exam
                        process</a>, and all of the system requirements; and <a href="/web-security/certification/practice-exam">take our practice exam</a> as many times as you
                        need before you try the real exam.
                    </p>
                    <p>We've created a guide to <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing">using Burp Scanner during manual testing</a>, to make sure you've got
                        to grips with the full scope of scanning you'll need to perform during the exam. The exam also requires you to be able to <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings">
                            adapt your attack methods to bypass broken defenses</a> - specifically - obfuscating attacks using encodings.
                    </p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4 cms-ignore-validation="HEADING_TOO_LONG">If a new topic is added to the Web Security Academy, will it be on the exam?</h4>
                </summary>
                <div class="content">
                    <p>There is a one-month grace period before we add new topics to the exam. After that point, you should prepare for the possibility of the topic being included.</p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>Is the exam open book?</h4>
                </summary>
                <div class="content">
                    <p>The exam is open book - you may use any books, notes, or web resources you find useful.</p>
                    <p>Here are links to some resources you may want to have to hand when you take the exam:</p>
                    <ul>
                        <li><p><a href="/web-security/authentication/auth-lab-usernames">Username list</a>.</p></li>
                        <li><p><a href="/web-security/authentication/auth-lab-passwords">Password list</a>.</p></li>
                        <li><p><a href="/web-security/cross-site-scripting/cheat-sheet">XSS Cheat Sheet</a>.</p></li>
                    </ul>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>Is there a retake button within the exam?</h4>
                </summary>
                <div class="content">
                    <p>Once you have started the exam timer, there is no option to pause or reset your exam.</p>
                    <p>If you wish to retake the exam, you will need to purchase another exam and begin the process again.</p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>What happens if I make a mistake during the exam?</h4>
                </summary>
                <div class="content">
                    <p>Part of being a professional is handling responsibility. While exploiting each application, you will gain access to powerful functionality. If you use this to delete your own account or a core system
                        component, you may make your exam impossible to complete.
                    </p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4 cms-ignore-validation="HEADING_TOO_LONG">Can I contact you for hints and tips on how to complete the practice exam?</h4>
                </summary>
                <div class="content">
                    <p>As the practice exam is designed to be a test of whether you have the necessary skills required to complete the actual exam, we will not be able to give you hints about how to complete it.</p>
                    <p>If you need any guidance, please carefully read through all the advice given on the <a href="/web-security/certification/how-it-works#hints">"Hints and Tips"
                        section of our "How the exam process works"</a> page.
                    </p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>What skill levels do I need to be able to take the exam?</h4>
                </summary>
                <div class="content">
                    <p>Before attempting the SecDevLab Certified Practitioner exam, you should be comfortably able to complete all of the labs within the Web Security Academy labeled "Practitioner" or lower. There is
                        no set time frame for completing the labs, but you must be able to do so without requiring access to the solutions provided.
                    </p>
                    <p>In addition, we strongly advise that you fully familiarize yourself with the exploiting XSS labs within the XSS topic. To successfully pass the exam, you'll need to be able to capably perform the
                        exploits outlined within those materials.
                    </p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>What currencies do you accept when making payment for the exam?</h4>
                </summary>
                <div class="content">
                    <p>The exam is priced in three currencies: US dollars, Pounds Sterling, and Euros. If you want to pay using another currency, you can use a credit card denominated in that currency, and the conversion will
                        be handled automatically by your bank.
                    </p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>Do I need a user account to get a certification exam?</h4>
                </summary>
                <div class="content">
                    <p>In order to purchase a certification exam, you will need to create a user account on our website.</p>
                    <p>Once you have a registered user account, you will be able to purchase a certification exam from the "your account" page.</p>
                    <p>Please note that the name you provide in your user account is the name that will be displayed on the certificate should you achieve your certification. Please ensure that you set up your user account
                        using your real name, as we will not be able to make any changes to the digital certificate.
                    </p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>Why is automated proctoring a part of the exam process?</h4>
                </summary>
                <div class="content">
                    <p>The certification exam needs automated proctoring in order to enable us to verify that you yourself have achieved the certification, and that you are exactly who you say you are. By performing an
                        ID check on everybody who takes the exam, we are better able to make sure that nobody is able to cheat or lie in order to gain this qualification.
                    </p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4>How much time can I leave between buying my exam and booking it?</h4>
                </summary>
                <div class="content">
                    <p>Once you purchase your SecDevLab Certified Practitioner exam, your purchase does not expire. You can book your exam at any time after purchasing it.</p>
                </div>
            </details>
        </div>

        <div class="expandable-container">
            <details>
                <summary class="component is-expandable">
                    <h4 cms-ignore-validation="HEADING_TOO_LONG">Can I purchase multiple exams at one time?</h4>
                </summary>
                <div class="content">
                    <p>No - you may only purchase one exam at a time, as you may only have one active exam assigned to your SecDevLab user account at any one time.</p>
                </div>
            </details>
        </div>

    </div>



    <div class="section-full-width theme-navy-9">
        <div class="container-cards-white-medium-space-between">
            <a href="/web-security/certification/how-it-works">
                <h4>How the exam works</h4>
                <div class="chevron-after">Read more</div>
            </a>
            <a href="/web-security/certification/practice-exam">
                <h4>Take the practice exam</h4>
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
