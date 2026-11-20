@extends('layouts.academy')

@section('title', 'Interview with Johnny Villarreal - Hall of Fame high flyer | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psgenerictheme.css')

@section('academy_body')
@verbatim
<div no-keyword-injection="" class="wrapper" id="academy-started">

        <div class="hero theme-white">
            <div class="container-columns-centered-image">
                <div>
                    <h2 cms-ignore-validation="DUPLICATE_HEADINGS" id="web-security-academy">Web Security Academy</h2>
                    <h1 cms-ignore-validation="HEADING_CAPITALIZATION" id="johnny-villarreal" class="heading-2">Johnny Villarreal</h1>
                    <h3 cms-ignore-validation="HEADING_CAPITALIZATION,DUPLICATE_HEADINGS">High flyers in the Hall of Fame</h3>
                </div>
                <img cms-ignore-validation="UNIQUE_IMG_ALT_TEXT" alt="Interviewing the Web Security Academy high flyers" src="/web-security/getting-started/images/wsa-hall-of-fame-interviews-smaller.jpg">
            </div>
        </div>

        <div class="hero theme-white spacer">
            <div class="container-columns-66-percent-left">
                <div class="text-left">
                    <p>You could say that Johnny has something of an interest in cybersecurity. When he's not red-teaming with Synack as an offensive security researcher, or working as a freelance penetration tester,
                        he's an instructor of cybersecurity at the University of California, Irvine. As it turns out, Johnny's "interest" in cybersecurity is more like an all-encompassing passion.
                    </p>
                    <p><strong>"I'm an avid user of Burp Suite Professional and as soon as I saw the Web Security Academy, especially with a big industry name like <a href="https://portswigger.net/research/james-kettle">
                        James Kettle</a> involved, I just knew I had to jump
                        on it."</strong>
                    </p>
                </div>

                <div>
                    <img cms-ignore-validation="UNIQUE_IMG_ALT_TEXT" alt="A high flyer in the Web Security Academy Hall of Fame" src="/web-security/getting-started/images/johnny-villarreal.jpg">
                </div>
            </div>
        </div>

        <div class="sticky-side-menu-white">
            <div>
                <aside>
                    <h4 cms-ignore-validation="HEADING_CAPITALIZATION">Getting to the top of the Hall of Fame</h4>
                    <a class="sticky-menu-link" href="/web-security/getting-started/johnny-villarreal#emma-s-portswigger-so-what-was-the-first-lab-you-completed-on-the-web-security-academy">Starting out</a>
                    <a class="sticky-menu-link" href="/web-security/getting-started/johnny-villarreal#es-are-there-any-topics-on-the-web-security-academy-that-you-ve-revisited-after-completing-the-labs">Training</a>
                    <a class="sticky-menu-link" href="/web-security/getting-started/johnny-villarreal#es-if-you-had-to-pick-one-thing-what-would-you-say-is-your-favorite-thing-about-the-web-security-academy">Favorites</a>
                    <a class="sticky-menu-link" href="/web-security/getting-started/johnny-villarreal#es-has-training-on-the-web-security-academy-enabled-you-to-do-anything-you-couldn-t-do-before">Advice</a>

                </aside>
                <span>

                    <div class="section theme-community-6 spacer">
                        <p>Having worked through all manner of training, including OSCP and various other certifications, he found himself interested in trying to up his game in the field of web application security.</p>
                        <p>He spent the first few months of the COVID-19 lockdown meticulously working his way through each and every one of the topics on the Web Security Academy, working for hours every day until he
                            had completed them all. Ranked in 4th place in our <a href="/web-security/hall-of-fame">Hall of Fame</a> (at the time of this interview), we wanted to find out how
                            the <a href="/web-security">Web Security Academy</a> helped Johnny to further his knowledge of web application security.</p>
                    </div>

                    <div class="section theme-community-6 spacer">
                        <h3 cms-ignore-validation="HEADING_TOO_LONG,HEADING_CAPITALIZATION" id="emma-s-portswigger-so-what-was-the-first-lab-you-completed-on-the-web-security-academy">Emma S (SecDevLab): So what was the first
                            lab you completed on the Web Security Academy?</h3>
                        <p>Johnny Villarreal: <a href="/web-security/ssrf">Server-side request forgery</a>, that's where I started. For a lot of us bug bounty hunters, it's a pretty hot topic. There are a lot of
                            people who walk off with $10k bounties from these programs and it's always "SSRF", "SSRF", "remote code execution", "SSRF" ...
                        </p>
                        <p><strong>"To find a place that had all of that information in one location, with a consistently high quality of labs, especially being free, it's a no-brainer. Why wouldn't you dive right into
                            it?!"</strong>
                        </p>
                    </div>

                    <div class="section theme-community-6 spacer">
                        <h3 cms-ignore-validation="HEADING_CAPITALIZATION,HEADING_TOO_LONG">ES: A new topic release would be a pretty exciting day for you then! How do you find out about the launch?</h3>
                        <p>JV: I actually have an alert set up, so I get buzzed whenever there are any updates from the Web Security Academy on <a href="https://twitter.com/WebSecAcademy">Twitter</a>. I absolutely love the labs, so
                            I have to know straight away when there's a new challenge for me to try and beat!
                        </p>
                    </div>

                    <div class="section theme-white">
                        <blockquote class="callout-quote-white">
                            <div>
                                <img cms-ignore-validation="UNIQUE_IMG_ALT_TEXT" alt="Blockquote" src="/web-security/getting-started/images/ps-quote-left-orange.svg">
                                <p>New topics being released without a schedule, I kinda like it. You guys release them when you release them, and then it's just a fight to the end until you figure it out. Regular and cosy
                                    schedules make it all a bit boring I think. We're all attackers after all, we like a bit of chaos.
                                </p>
                            </div>
                            <cite>
                                <span>
                                    <p><strong>Johnny Villarreal</strong></p>
                                </span>
                            </cite>
                        </blockquote>
                    </div>

                    <div class="section theme-community-6 spacer">
                        <h3 cms-ignore-validation="HEADING_TOO_LONG,HEADING_CAPITALIZATION">ES: And do you have any favorite topics on the Web Security Academy?</h3>
                        <p>JV: <a href="/web-security/host-header">HTTP host header attacks</a>, without a doubt, that whole topic blew my mind. The host header attack class is the focus, but it's also
                            relative to server-side request forgery. This one was really interesting to me because it's one of the weird, interesting quirks that I run into on real applications all of the time.
                        </p>
                        <p><strong>"I run into this so much that I've actually made a scanner for SSRF. I'm not calling it an SSRF scanner, but it kind of is ... It uses some of the things that I learned with that whole
                            vulnerability class where I could basically throw a few hundred URLs in, walk away, grab a beer, come back and have a bunch of callbacks to my C2 server."</strong>
                        </p>
                    </div>

                    <div class="section theme-community-6 spacer">
                        <h3 cms-ignore-validation="HEADING_TOO_LONG,HEADING_CAPITALIZATION" id="es-are-there-any-topics-on-the-web-security-academy-that-you-ve-revisited-after-completing-the-labs">ES: Are
                            there any topics on the Web Security Academy that you've revisited after completing the labs?</h3>
                        <p>JV: The ones I like to go back to are usually the topics that have multiple vulnerability classes in them. In one of the <a href="/web-security/deserialization">
                            deserialization</a> labs for example, you had to achieve <a href="/web-security/sql-injection">SQLi</a>.  That was mind blowing because you're doing
                            deserialization, so you're expecting remote code execution right off the bat to some degree, but it just didn't happen that way. This particular lab reminded me that while
                            certain restrictions in an application's environment will limit one path to exploitation, you can definitely still maximize impact by taking another exploit chain path such as
                            deserialization to SQLi.
                        </p>
                    </div>

                    <div class="section theme-community-6 spacer">
                        <h3 cms-ignore-validation="HEADING_TOO_LONG,HEADING_CAPITALIZATION">ES: Do you ever use the Web Security Academy to train other people? </h3>
                        <p>JV: Every time I run into newcomers, whether that's in the industry, students, or just friends, even when I'm hosting my workshops for people, I always recommend it. Within the
                            Synack Red Team, we have roughly 1500 researchers assessing assets every day. Whenever some of my fellow researchers figure out how to really push or chain certain vulnerabilities
                            they discover or just train in a certain vulnerability class, I often point them straight to you guys and the Web Security Academy. It's a great resource.
                        </p>
                    </div>

                    <div class="section theme-white">
                        <blockquote class="callout-quote-white">
                            <div>
                                <img cms-ignore-validation="UNIQUE_IMG_ALT_TEXT" alt="Blockquote" src="/web-security/getting-started/images/ps-quote-left-orange.svg">
                                <p>The Web Security Academy is one of the most realistic representations of some of the vulnerabilities and findings that we discover, in real life at real companies.</p>
                            </div>
                            <cite>
                                <span>
                                    <p><strong>Johnny Villarreal</strong></p>
                                </span>
                            </cite>
                        </blockquote>
                    </div>

                    <div class="section theme-community-6 spacer">
                        <h3 cms-ignore-validation="HEADING_TOO_LONG,HEADING_CAPITALIZATION">ES: Is Burp Suite essential to you, and your use of the Web Security Academy?</h3>
                        <p>JV: I think having <a href="/web-security/all-labs">Burp Suite Pro</a> is extremely convenient, because the features are all there. If I'm bruteforcing multi-factor
                            authentication, something like <a href="/web-security/all-labs">Burp Suite macros</a> makes it ten times
                            easier to accomplish that goal. You technically have everything you need to do it without Burp Suite, it just depends whether or not you want to rip your own hair out ...
                        </p>
                    </div>

                    <div class="section theme-community-6 spacer">
                        <h3 cms-ignore-validation="HEADING_TOO_LONG,HEADING_CAPITALIZATION" id="es-if-you-had-to-pick-one-thing-what-would-you-say-is-your-favorite-thing-about-the-web-security-academy">ES:
                            If you had to pick one thing, what would you say is your favorite thing about the Web Security Academy?</h3>
                        <p>JV: There are so many good things, but a really unspoken benefit for me is having an exploit server provided. I've ruined my own exploit server a whole load of times so it's brilliant
                            to have one there to work with. You can carry out <a href="https://portswigger.net/research/hunting-asynchronous-vulnerabilities">out-of-band exploitation</a>, or attacks that would
                            normally require you to have some sort of infrastructure of your own, so I really liked that it was provided for you.
                        </p>
                    </div>

                    <div class="section theme-community-6 spacer">
                        <h3 cms-ignore-validation="HEADING_TOO_LONG,HEADING_CAPITALIZATION">ES: Are there any topics you'd really love to see on the Web Security Academy in the future?</h3>
                        <p>JV: I loved the <a href="/web-security/logic-flaws/examples/lab-logic-flaws-authentication-bypass-via-encryption-oracle">business logic vulnerabilities lab with
                            the encryption oracle</a>, that was properly fascinating. I literally spent days doing the mental equivalent of running into a brick wall trying to solve that one. I'd love to see
                            more stuff on that, but maybe with some tutorials or at a level more suited to beginners.
                        </p>
                        <p><strong>"When I finally solved that business logic vulnerabilities lab I got such an adrenaline rush - we need more content on that so that more people get to enjoy that feeling!"</strong></p>
                    </div>

                    <div class="section theme-white">
                        <blockquote class="callout-quote-white">
                            <div>
                                <img cms-ignore-validation="UNIQUE_IMG_ALT_TEXT" alt="Blockquote" src="/web-security/getting-started/images/ps-quote-left-orange.svg">
                                <p>I think the Web Security Academy is a really great thing, it's almost a gift to the community in a lot of ways. From doing some of the labs, I even feel like I have enough knowledge to start
                                    doing my own research, or write my own tools.
                                </p>
                            </div>
                            <cite>
                                <span>
                                    <p><strong>Johnny Villarreal</strong></p>
                                </span>
                            </cite>
                        </blockquote>
                    </div>

                    <div class="section theme-community-6 spacer">
                        <h3 cms-ignore-validation="HEADING_TOO_LONG,HEADING_CAPITALIZATION" id="es-has-training-on-the-web-security-academy-enabled-you-to-do-anything-you-couldn-t-do-before">ES: Has training on the Web Security
                            Academy enabled you to do anything you couldn't do before?</h3>
                        <p>JV: I feel much more confident in my knowledge on how certain vulnerability classes work now. It's been such a huge benefit for me, and none of that would ever have been possible if I hadn't had those
                            <a href="/web-security/all-labs">labs</a> and <a href="/web-security/all-materials">learning materials</a> available to me.
                        </p>
                    </div>

                    <div class="section theme-community-6 spacer">
                        <h3 cms-ignore-validation="HEADING_CAPITALIZATION,HEADING_TOO_LONG">ES: And finally, do you have any advice for people just starting out on the Web Security Academy?</h3>
                        <p>JV: I would tell people that they should always start with <a href="/web-security/os-command-injection">command injection</a>, because they'd start seeing the impact of being able to
                            run commands on somebody else's server - that just makes it a lot more realistic in their perspective.
                        </p>
                    </div>

                    <div class="section theme-white">
                        <blockquote class="callout-quote-white">
                            <div>
                                <img cms-ignore-validation="UNIQUE_IMG_ALT_TEXT" alt="Blockquote" src="/web-security/getting-started/images/ps-quote-left-orange.svg">
                                <p>Sitting there on the Web Security Academy, doing this crazy brain puzzle with no solution, there's no better way in my opinion to spend your time. Sometimes I even crack open a beer or two.</p>
                            </div>
                            <cite>
                                <span>
                                    <p><strong>Johnny Villarreal</strong></p>
                                </span>
                            </cite>
                        </blockquote>
                    </div>

                </span>
            </div>
        </div>

        <div class="section-full-width theme-grey-5 text-center">
            <h3 cms-ignore-validation="HEADING_TOO_LONG,HEADING_CAPITALIZATION">Follow in Johnny's footsteps and get stuck into the Web Security Academy</h3>
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/all-topics">
                    <h3>Learning path for topics</h3>
                    <p>Not sure where to begin? We've laid it all out step by step for you.</p>
                    <div class="chevron-after">Read more</div>
                </a>
                <a href="/web-security/dashboard">
                    <h3>User dashboard</h3>
                    <p>Can't remember where you got to? Track your progress here.</p>
                    <div class="chevron-after">Read more</div>
                </a>
                <a href="/web-security/hall-of-fame">
                    <h3>Hall of Fame</h3>
                    <p>Want to feel inspired? Check out the leaderboard high-flyers.</p>
                    <div class="chevron-after">Read more</div>
                </a>
            </div>
        </div>
    </div>
@endverbatim
@endsection
