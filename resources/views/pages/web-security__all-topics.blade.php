@extends('layouts.academy')

@section('title', 'All Web Security Academy topics | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psgenerictheme.css')

@section('academy_body')
@verbatim
<div class="wrapper" id="academy-started">

            <div class="section-full-width theme-white">
                <h1 cms-ignore-validation="DUPLICATE_HEADINGS" id="all-topics" class="heading2">All topics</h1>
                <p>If you're new to web security, it can be difficult to know where to begin. We recommend working through the topics available, completing the labs as you go, but don't be afraid to move on to the next topic if you get
                    stuck. You can go back to the more challenging labs once you've developed your skills further. If you want more guided support, please see our <a href="/web-security/learning-paths">learning paths</a>.
                </p>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <h2 id="server-side-topics">Server-side topics</h2>
                <p class="intro">For complete beginners, we recommend starting with our server-side topics. These vulnerabilities are typically easier to learn because you only need to understand what's happening on the
                    server. Our materials and labs will help you develop some of the core knowledge and skills that you will rely on time after time.
                </p>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/sql-injection">
                        <h3>SQL injection</h3>
                        <p>SQL injection is an old-but-gold vulnerability responsible for many high-profile data breaches. Although relatively simple to learn, it can potentially be used for some high-severity exploits. This
                            makes it an ideal first topic for beginners, and essential knowledge even for more experienced users.
                        </p>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">18 Labs</sup>
                        </div>
                    </a>
                </div>
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/authentication">
                        <h3>Authentication</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">14 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/file-path-traversal">
                        <h3>Path traversal</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">6 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/os-command-injection">
                        <h3>Command injection </h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">5 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/logic-flaws">
                        <h3>Business logic vulnerabilities </h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">11 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/information-disclosure">
                        <h3>Information disclosure </h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">5 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/access-control">
                        <h3>Access control</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">13 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/file-upload">
                        <h3>File upload vulnerabilities</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">7 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/race-conditions">
                        <h3>Race conditions</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">6 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/ssrf">
                        <h3>Server-side request forgery (SSRF)</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">7 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/xxe">
                        <h3>XXE injection</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">9 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/nosql-injection">
                        <h3>NoSQL injection</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">4 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/api-testing">
                        <h3>API testing</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">5 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/web-cache-deception">
                        <h3>Web cache deception</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">5 Labs</sup>
                        </div>
                    </a>
                </div>
                <hr>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <h2 id="client-side-topics">Client-side topics</h2>
                <p class="intro">Client-side vulnerabilities introduce an additional layer of complexity, which can make them slightly more challenging. These materials and labs will help you build on the server-side skills
                    you've already learned and teach you how to identify and exploit some gnarly client-side vectors as well.
                </p>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/cross-site-scripting">
                        <h3>Cross-site scripting (XSS)</h3>
                        <p>Simply put, XSS is one of the most important vulnerabilities out there. It's both incredibly common and extremely powerful, especially when used as part of a wider exploit chain. This is a huge
                            topic, with plenty of labs for complete beginners and seasoned pros alike.
                        </p>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">30 Labs</sup>
                        </div>
                    </a>
                </div>
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/csrf">
                        <h3>Cross-site request forgery (CSRF)</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">12 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/cors">
                        <h3>Cross-origin resource sharing (CORS)</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">3 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/clickjacking">
                        <h3>Clickjacking </h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">5 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/dom-based">
                        <h3>DOM-based vulnerabilities</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">7 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/websockets">
                        <h3>WebSockets </h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">3 Labs</sup>
                        </div>
                    </a>
                </div>
                <hr>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <h2 id="advanced-topics">Advanced topics</h2>
                <p class="intro">These topics aren't necessarily more difficult to master but they generally require deeper understanding and a wider breadth of knowledge. We recommend getting to grips with the basics
                    before tackling these labs, some of which are based on pioneering techniques discovered by our world-class research team.
                </p>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/deserialization">
                        <h3>Insecure deserialization</h3>
                        <p>Deserialization has a reputation for being difficult to get your head around but it can be much easier to exploit than you might think. We'll guide you through the process step-by-step so you can
                            pick off some high-severity bugs that even experienced testers may have missed altogether.
                        </p>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">10 Labs</sup>
                        </div>
                    </a>
                </div>
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/llm-attacks">
                        <h3>Web LLM attacks</h3>
                        <span class="label-light-green-small">New labs added</span>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">7 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/graphql">
                        <h3>GraphQL API vulnerabilities </h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">5 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/server-side-template-injection">
                        <h3>Server-side template injection </h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">7 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/web-cache-poisoning">
                        <h3>Web cache poisoning</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">13 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/host-header">
                        <h3>HTTP Host header attacks</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">7 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/request-smuggling">
                        <h3>HTTP request smuggling</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">22 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/oauth">
                        <h3>OAuth authentication</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">6 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/jwt">
                        <h3>JWT attacks</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">8 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/prototype-pollution">
                        <h3>Prototype pollution</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">10 Labs</sup>
                        </div>
                    </a>
                    <a href="/web-security/essential-skills">
                        <h3>Essential skills</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Go to topic</div>
                            <sup class="text-right">2 Labs</sup>
                        </div>
                    </a>
                </div>
                <hr>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <p class="heading-2">SecDevLab Certified Practitioner</p>
                <p class="intro">The SecDevLab Certified Practitioner exam is challenging, and heavily focused on problem-solving. To pass the exam, you will need to demonstrate a number of skills and abilities. We advise that
                    you need to be able to complete all "Apprentice" and "Practitioner" level labs, so at this point in the learning path you're in a great position to give it a go.
                </p>
            </div>

            <div class="section theme-white">
                <h3 cms-ignore-validation="DUPLICATE_HEADINGS">Mystery lab challenge</h3>
                <p>Unlike when you complete labs on the Web Security Academy, during the exam you'll have no prior knowledge of the type of vulnerability that you need to find and exploit. Use the mystery
                        lab challenge below to spin up a randomized lab that you'll have to try and work out how to solve with no context, just like in the exam.
                </p>
                <p>In some of the labs, you have access to your own account with the credentials <code>wiener:peter</code>. If you can enumerate usernames, you may also be able to brute-force the login using the following
                    <a href="/web-security/authentication/auth-lab-usernames">username</a> and <a href="/web-security/authentication/auth-lab-passwords">password</a> wordlists.
                </p>
                @endverbatim@include('partials.widget', ['id' => 'academy-launch-mystery-lab'])@verbatim
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/certification">
                        <h3>The certification exam</h3>
                        <p>In order to become a SecDevLab Certified Practitioner, you will need to undertake (and successfully pass) a four hour exam. This exam will consist of multiple practical challenges, designed to test your knowledge
                            of vulnerabilities as well as your ability to exploit them.
                        </p>
                        <div class="container-columns">
                            <div class="chevron-after">Find out more</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/certification/practice-exam">
                        <h3>Prepare with the practice exam</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Take practice exam</div>
                        </div>
                    </a>
                    <a href="/web-security/certification/how-it-works">
                        <h3>Understand the exam process</h3>
                        <div class="container-columns">
                            <div class="chevron-after">Find out more</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="section-full-width theme-white text-center">
                <h2 cms-ignore-validation="DUPLICATE_HEADINGS" id="want-the-latest-from-the-web-security-academy">Want the latest from the Web Security Academy?</h2>
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

            <div class="section-full-width theme-grey-5">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/dashboard">
                        <h3>User dashboard</h3>
                        <div class="chevron-after">Read more</div>
                    </a>
                    <a href="/web-security/hall-of-fame">
                        <h3 cms-ignore-validation="HEADING_CAPITALIZATION">Hall of Fame</h3>
                        <div class="chevron-after">Read more</div>
                    </a>
                    <a href="/web-security/getting-started">
                        <h3>Getting started guide</h3>
                        <div class="chevron-after">Read more</div>
                    </a>
                </div>
            </div>
    </div>
@endverbatim
@endsection
