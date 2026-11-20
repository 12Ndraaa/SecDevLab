@extends('layouts.academy')

@section('title', 'How to prepare for the Burp Suite Certified Practitioner exam | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psproducts.css')

@section('academy_body')
@verbatim
<div no-keyword-injection="" class="wrapper" id="certification">

    <div class="hero theme-pro-2">
        <div class="container-columns">
            <div>
                <h2 cms-ignore-validation="HEADING_CAPITALIZATION,DUPLICATE_HEADINGS" id="get-burp-suite-certified-for">Get Burp Suite Certified for @endverbatim@include('partials.widget', ['id' => 'burp-certificationstartingprice'])@verbatim</h2>
                <h1 class="heading1-white heading-2" id="how-to-prepare-for-your-certification">How to <span>prepare for your certification</span></h1>
                <div class="container-buttons-left">
                    <a class="button-orange" href="https://portswigger.net/buy/certification">Get certified</a>
                    <a class="button-white" href="/web-security/certification/practice-exam">Take a practice exam</a>
                </div>
            </div>
            <img class="desktop-show" alt="How to prepare for the SecDevLab Certified Practitioner exam" src="/web-security/certification/images/certified-secondary-hero.png">
        </div>
    </div>

    <div class="section-full-width theme-white">
        <h2 cms-ignore-validation="HEADING_CAPITALIZATION" id="make-sure-you-re-fully-prepared-to-undertake-the-burp-suite-certified-practitioner-exam">Make sure you're fully prepared to undertake the Burp
            Suite Certified Practitioner exam</h2>
        <p>The SecDevLab Certified Practitioner exam is challenging, and heavily focused on problem-solving. Obtaining this certification proves that you have a deep knowledge of web vulnerability classes, and the skills required to
            discover and exploit them. To be successful, you need to demonstrate a number of skills and abilities. The best way to prepare for the exam depends on your level of experience.
        </p>
        <h2 id="still-learning-the-fundamentals-of-web-security">Still learning the fundamentals of web security?</h2>
        <p>If you're still developing your web security knowledge, we recommend the following approach:</p>
        <ol>
            <li><a href="/web-security/all-topics">Work through the topics within the academy</a>, completing every apprentice and practitioner-level lab as you go.</li>
            <li>As you reach the end of each topic, <a href="/web-security/mystery-lab-challenge">use the mystery labs feature</a> to practice solving the labs with no contextual clues.</li>
            <li>When you've completed all the practitioner-level labs, <a href="/web-security/mystery-lab-challenge">practice solving mystery labs from all available topics</a> to develop your recon and discovery skills.</li>
            <li>Then <a href="/web-security/certification/practice-exam">complete a practice exam</a> to familiarize yourself with the exam format.</li>
            <li>Make sure to <a href="/web-security/certification/exam-hints-and-guidance">read the exam hints and tips</a>, as they contain invaluable information that you'll need to be successful in the exam.</li>
        </ol>
        <h2 id="think-you-ve-already-got-what-it-takes">Think you've already got what it takes?</h2>
        <p>If you already have extensive web security experience, you don't necessarily need to work your way through the entire Web Security Academy before sitting the SecDevLab Certified Practitioner exam. Completing the steps
            outlined below will help you to:
        </p>
        <ul>
            <li>Assess whether you have sufficient knowledge of the range of vulnerability classes covered.</li>
            <li>Refresh your knowledge of how to demonstrate security impact, turning vulnerabilities into high-severity exploits.</li>
            <li>Familiarize yourself with some of the Academy-specific mechanisms you'll need to use within the exam, such as our simulated exploit server.</li>
        </ul>
    </div>

    <div class="section-full-width theme-community-6">
        <h2 cms-ignore-validation="HEADING_CAPITALIZATION" id="step-1-complete-one-practitioner-lab-from-every-topic">Step 1: Complete one practitioner lab from every topic</h2>
        <p>Work through all of the labs on the list at the link below, completing each lab in turn. There is no set time frame for completing the labs, but you must be able to do so without requiring access to the solutions provided.</p>
        <p>If you're unable to complete the lab you selected, go back to the learning materials and read through the content carefully, working through all the labs in that topic to make sure you're comfortable with the vulnerability class
            and exploit techniques it covers.
        </p>
        <div class="container-buttons-left">
            <a class="chevron-after" href="/web-security/certification/how-to-prepare/practitioner-labs-prep-step-one">View the labs required to complete preparation step one</a>
        </div>
    </div>

    <div class="section-full-width theme-white">
        <h2 cms-ignore-validation="HEADING_CAPITALIZATION" id="step-2-complete-the-following-labs">Step 2: Complete the following labs</h2>
        <p>These labs have been selected because they reinforce core web security testing skills - such as understanding encodings and using them to evade defences, and proficiency in exploiting cross-user
            attacks. These specific labs support your exam preparation in terms of skill development, but they are in no way a list of the components you'll be expected to solve to complete the exam.
        </p>
        <div class="container-cards-white-medium-space-between">
            <a href="/web-security/cross-site-scripting/exploiting/lab-stealing-cookies">
                <h3>Exploiting cross-site scripting to steal cookies</h3>
                <div class="container-columns">
                    <div class="chevron-after">Go to lab</div>
                </div>
            </a>
            <a href="/web-security/sql-injection/blind/lab-out-of-band-data-exfiltration">
                <h3>Blind SQL injection with out-of-band data exfiltration</h3>
                <div class="container-columns">
                    <div class="chevron-after">Go to lab</div>
                </div>
            </a>
            <a href="/web-security/oauth/lab-oauth-forced-oauth-profile-linking">
                <h3>Forced OAuth profile linking</h3>
                <div class="container-columns">
                    <div class="chevron-after">Go to lab</div>
                </div>
            </a>
            <a href="/web-security/authentication/other-mechanisms/lab-brute-forcing-a-stay-logged-in-cookie">
                <h3>Brute-forcing a stay-logged-in cookie</h3>
                <div class="container-columns">
                    <div class="chevron-after">Go to lab</div>
                </div>
            </a>
            <a href="/web-security/request-smuggling/exploiting/lab-capture-other-users-requests">
                <h3>Exploiting HTTP request smuggling to capture other users' requests</h3>
                <div class="container-columns">
                    <div class="chevron-after">Go to lab</div>
                </div>
            </a>
            <a href="/web-security/ssrf/lab-ssrf-with-blacklist-filter">
                <h3>SSRF with blacklist-based input filter</h3>
                <div class="container-columns">
                    <div class="chevron-after">Go to lab</div>
                </div>
            </a>
            <a href="/web-security/sql-injection/lab-sql-injection-with-filter-bypass-via-xml-encoding">
                <h3>SQL injection with filter bypass via XML encoding</h3>
                <div class="container-columns">
                    <div class="chevron-after">Go to lab</div>
                </div>
            </a>
            <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing/lab-discovering-vulnerabilities-quickly-with-targeted-scanning">
                <h3>Discovering vulnerabilities quickly with targeted scanning</h3>
                <div class="container-columns">
                    <div class="chevron-after">Go to lab</div>
                </div>
            </a>
        </div>
    </div>

    <div class="section-full-width theme-community-6">
        <h2 cms-ignore-validation="HEADING_CAPITALIZATION,DUPLICATE_HEADINGS" id="step-3-complete-five-mystery-lab-challenges">Step 3: Complete five mystery lab challenges</h2>
        <p>Use the mystery lab challenge below to spin up five practitioner-level randomized lab challenges - you'll have to try and work out how to solve each challenge with no context, exactly as you
            would when performing recon in a real-world testing environment.
        </p>
        <p class="margin-bottom-medium">In some of the labs, you have access to your own account with the credentials <code>wiener:peter</code>. If you can enumerate usernames, you may also be able to brute-force the login using the following
            <a href="/web-security/authentication/auth-lab-usernames">username</a> and <a href="/web-security/authentication/auth-lab-passwords">password</a> wordlists.
        </p>
        @endverbatim@include('partials.widget', ['id' => 'academy-launch-mystery-lab'])@verbatim
    </div>

    <div class="section-full-width theme-white">
        <h2 cms-ignore-validation="HEADING_CAPITALIZATION" id="step-4-take-and-pass-a-practice-exam">Step 4: Take and pass a practice exam</h2>
        <p>The practice exams are designed to be a realistic test of all your web security skills. They will also allow you to get used to the format the real exam will use. Before you take a practice
            exam, <a href="/web-security/certification/exam-hints-and-guidance">read through the exam hints and guidance</a> for some tips and advice to help you succeed.
        </p>
        <p>If you are unable to pass a practice exam, we strongly suggest that you work through the steps outlined in this guide again to further hone your skills.</p>
        <p>You have two hours to complete your practice exam, which contains one vulnerable application for you to exploit.</p>
        <div class="container-buttons-left">
            <a class="button-orange" href="/web-security/certification/practice-exam">Take a practice exam</a>
        </div>
    </div>

    <div class="section-full-width theme-white text-center">
        <img alt="You must study and prepare to take the SecDevLab Certified Practitioner exam" src="/web-security/certification/images/exam.jpg">
    </div>


    <div class="section-full-width theme-navy-9">
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
