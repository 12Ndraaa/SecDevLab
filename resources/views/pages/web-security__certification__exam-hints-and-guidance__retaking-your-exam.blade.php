@extends('layouts.academy')

@section('title', 'Hints and guidance for retaking the Burp Suite Certified Practitioner exam | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psproducts.css')

@section('academy_body')
@verbatim
<div no-keyword-injection="" class="wrapper" id="certification">

    <div class="hero theme-pro-2">
        <div>
            <h1 id="retaking-your-exam" class="heading-2">Retaking your exam</h1>
            <h2 cms-ignore-validation="HEADING_TOO_LONG" id="advice-from-certified-users-to-help-you-prepare">Advice from certified users to help you prepare</h2>
        </div>
    </div>

    <div class="section theme-white">
        <p>The SecDevLab Certified Practitioner exam is challenging, that's why obtaining it is so valuable! That means that not only is there no shame in failing, you're likely to learn something from your failed attempts that will help you be
            better prepared for next time.
        </p>
        <p>If you haven't already, <a href="/web-security/certification/how-to-prepare">work through the suggested preparation steps for the exam</a>. Remember that these steps are designed to refresh knowledge and skills
            you already have, and will not be sufficient if they're the only experience you have of the vulnerabilities and exploit techniques.
        </p>
    </div>

    <div class="section theme-community-6">
        <h2 id="you-found-a-vulnerability-but-couldn-t-exploit-it">You found a vulnerability but couldn't exploit it</h2>
        <p>When you're testing professionally, finding the vulnerability is only ever half of the battle. After discovery, you should be asking yourself: "What could I do with it?". This might involve chaining it to other vulnerabilities, and being
            able to demonstrate the actual security impact.
        </p>
        <p>
            <ul>
                <li>If you're clear on what the vulnerability was, find the learning materials that cover it and read them to get a better understanding on how the exploit works.</li>
                <li>Next, see if there's an academy lab that's similar to the vulnerability you encountered and work on that.</li>
                <li>Look specifically for any labs that you haven't completed that involve some kind of practical exploitation solution, rather than just a generic PoC.</li>
                <li>If you were caught out by a filter, try other labs that involve filters, even in different topics - a lot of filter bypass techniques are generic.
                    Also, <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings">check out the page on obfuscating payloads</a>.
                </li>
                <li>Don't get tunnel vision. This sounds over-simplified, but having steps in place to recognize when to move on from testing a particular feature or trying a specific vulnerability class will help you not to make the same mistakes
                    again.
                </li>
            </ul>
        </p>
    </div>

    <div class="section theme-white">
        <h2 id="you-ran-out-of-time">You ran out of time</h2>
        <p>The time limit on the exam is reminiscent of the pressure you'll experience when testing professionally. Approaching the situation methodically, quickly gaining a clear view of the application, and using Burp Suite Professional's automated
            features will all help you.
        </p>
        <p>
            <ul>
                <li>If you spent a lot of time manually probing for vulnerabilities, brush up on your skills with Burp Suite Professional's automation tools. In particular, try <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing">using targeted scans to quickly identify vulnerabilities</a>.</li>
                <li><a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing/lab-discovering-vulnerabilities-quickly-with-targeted-scanning">Practice with the targeted scanning lab</a> - see if you can
                    create a step by step process to follow so you can replicate the steps quickly during the exam.
                </li>
                <li><a href="/web-security/mystery-lab-challenge">Practice mystery labs</a> to get better at identifying vulnerable behavior quickly.</li>
                <li>Once you're more comfortable solving mystery labs, try setting a timer to see how quickly you can do them.</li>
            </ul>
        </p>
    </div>

    <div class="section theme-community-6">
        <h2 id="you-couldn-t-find-a-vulnerability-at-all">You couldn't find a vulnerability at all</h2>
        <p>Unlike the labs on the Web Security Academy, during the exam you won't have any contextual clues as to what you're looking for. This means you'll need excellent discovery skills to supplement your knowledge of how different vulnerabilities
            work.
        </p>
        <p>
            <ul>
                <li>Make sure you've thoroughly mapped all of the available attack surface - this includes making sure you haven't missed any functionality, or places you can access.</li>
                <li>Improve your general discovery skills by <a href="/web-security/mystery-lab-challenge">working through some mystery labs</a> - leave the topic random to challenge yourself further.</li>
                <li>If you're less comfortable with some vulnerabilities over others, focus on your areas of weakness and read the learning materials to gain a deeper understanding of how the vulnerability class works.</li>
                <li>If you've only done one lab from some topics, go back and try to do additional labs from those topics.</li>
                <li>If you haven't already, <a href="/web-security/certification/how-to-prepare">complete all the prep steps</a> to double-check you're ready to sit the exam.</li>
            </ul>
        </p>
    </div>

    <div class="section theme-white">
        <h2 id="general-advice-and-guidance">General advice and guidance</h2>
        <p>Regardless of your level of experience, there's no substitute for time spent learning. Practicing your techniques, reviewing your processes, and refreshing your knowledge will all help you to be better prepared for your next attempt.</p>
        <p>
            <ul>
                <li>Review your project file from your previous exam attempt to see if you missed any clues.</li>
                <li><a href="/web-security/certification/exam-hints-and-guidance">Read through our exam hints and guidance</a>, as there may be something you missed there that would have helped you during your previous exam
                    attempt.
                </li>
                <li><a href="/web-security/all-labs">Select the most challenging-sounding labs in the Web Security Academy</a> and work on those until you can solve them without requiring use of the solutions.</li>
            </ul>
        </p>
    </div>

    <div class="section-full-width theme-navy-9 spacer">
        <div class="container-cards-white-medium-space-between">
            <a href="/web-security/certification/how-it-works">
                <h4>How the exam works</h4>
                <div class="chevron-after">Read more</div>
            </a>
            <a href="/web-security/certification/practice-exam">
                <h4>Take a practice exam</h4>
                <div class="chevron-after">Read more</div>
            </a>
            <a href="/web-security/certification/how-it-works#what-the-exam-involves">
                <h4>What the exam involves</h4>
                <div class="chevron-after">Read more</div>
            </a>
            <a href="/buy/certification">
                <h4>Buy your BSCP exam</h4>
                <div class="chevron-after">Buy now</div>
            </a>
        </div>
    </div>


</div>
@endverbatim
@endsection
