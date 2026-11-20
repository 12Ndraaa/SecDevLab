@extends('layouts.academy')

@section('title', 'Hints and guidance for the Burp Suite Certified Practitioner exam | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psproducts.css')

@section('academy_body')
@verbatim
<div no-keyword-injection="" class="wrapper" id="certification">

    <div class="hero theme-pro-2">

        <div class="container-columns">
            <div>
                <h2 cms-ignore-validation="HEADING_CAPITALIZATION,DUPLICATE_HEADINGS" id="get-burp-suite-certified-for">Get Burp Suite Certified for @endverbatim@include('partials.widget', ['id' => 'burp-certificationstartingprice'])@verbatim</h2>
                <h1 class="heading1-white heading-2" id="hints-and-guidance-for-your-exam"><span>Hints and guidance </span>for your exam</h1>
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

        <div class="section theme-white">

            <h2 id="hints">Hints</h2>
            <p>You will have four hours to complete the SecDevLab Certified Practitioner exam. There are two applications, and each application contains deliberate vulnerabilities. This means that each application
                can be completed in three stages:
            </p>
            <ol>
                <li><p><strong>Stage 1</strong>: Access any user account.</p></li>
                <li><p><strong>Stage 2</strong>: Use your user account to access the admin interface at /admin, perhaps by elevating your privileges or compromising the administrator account.</p></li>
                <li><p><strong>Stage 3</strong>: Use the admin interface to read the contents of /home/carlos/secret from the server's filesystem, and submit it using "submit solution".</p></li>
            </ol>
            <p>We expect the three stages to be completed in order. This means that if you are in an  application, attempting to break into the admin interface is a waste of time if you haven't yet got access to
                a user account. Likewise, we do not recommend attempting to read files if you don't have access to an admin account.
            </p>
            <p>We restrict outbound traffic from the vulnerable servers to the internet. You won't be able to connect back to any internet server, except for the public Burp Collaborator server and the integrated exploit server.
                You can use the integrated exploit server to deliver any kind of payload to the vulnerable application or simulated user.
            </p>
            <p>Although some of the vulnerabilities are tricky to find, we do not intentionally hide files or pages that contain them. You never need to guess folders, filenames or parameter names.</p>

            <h2 id="exam-progression">Exam progression</h2>
            <p>To progress through stages, you need not only to identify vulnerabilities, but also exploit them. For example, if you identified an XSS vulnerability, triggering "alert" execution won't be enough to
                get access to the next stage: you need to actually exploit it against one of the simulated users and steal their session. Likewise, for SQL Injection vulnerabilities, you need to extract credentials
                from the database and use them to access the target account. You don't need to worry about tedious dumping of all database content though: all tables, columns, and local files are easily guessable and
                require just a couple of minutes to manually extract the required password or token.
            </p>
            <h2 id="techniques">Techniques</h2>
            <p>Scanning selected pages and insertion points with Burp Suite Professional will often help you quickly progress through the exam. Attempting a full application scan will not be feasible in the exam time
                frame. Some vulnerabilities are are very challenging to detect using only manual testing. If you get stuck, we highly recommend using Burp Scanner to help you tackle the problem.
            </p>
            <h2 id="guides">Guides</h2>
            <p>We've created a guide to <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing">using Burp Scanner during manual testing</a>, to make sure you've got
                to grips with the full scope of scanning you'll need to perform during the exam. The exam also requires you to be able to <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings">adapt
                    your attack methods to bypass broken defenses</a> - specifically - obfuscating attacks using encodings.
            </p>
            <p>The victim user is running Chromium. When using the <a href="/web-security/cross-site-scripting/cheat-sheet">XSS Cheat Sheet</a>, focus on vectors that work on Chrome. If your XSS
                attack works in Burp's browser or Chrome, chances are it'll work on the victim.
            </p>
            <h2 id="software">Software</h2>
            <p>Burp Suite Professional provides the essential functionality to solve the exam. Some vulnerabilities are easier to solve with the following third party tools: <a href="https://github.com/frohoff/ysoserial">ysoserial</a>
                and <a href="https://github.com/PortSwigger/http-request-smuggler">HTTP Request Smuggler</a>. These tools are used by certain labs at the "Practitioner" level. We recommend caution when using other tools - they may
                turn out not to be suitable for your objective.
            </p>

            <h2 id="problem-solving">Problem solving</h2>
            <p>If you come up with a solution that doesn't work as expected, we can offer some general advice on what to do:</p>
            <ol>
                <li><p>If you're attacking the victim user, test the attack out on your own browser first. Pay close attention to the HTTP traffic sequence in Burp.</p></li>
                <li><p>If your solution is adapted from an Academy lab, try to analyze how the application differs from the lab.</p></li>
                <li><p>Try to identify any assumptions you're making, and put them to the test.</p></li>
                <li><p>Refer back to <a href="/web-security/certification#what-does-a-burp-suite-certification-mean-for-me">the skill set the certification aims to prove</a>.</p></li>
            </ol>
        </div>

    <div class="section theme-community-6 spacer">
        <h2 id="taken-the-exam-and-didn-t-pass">Taken the exam and didn't pass?</h2>
        <p>To help you get better prepared for your next exam attempt, we've put together some helpful hints and advice.</p>
        <p><a href="/web-security/certification/exam-hints-and-guidance/retaking-your-exam">Read the tips for retaking your exam</a></p>
    </div>

    <div class="section-full-width theme-navy-9 spacer">
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
