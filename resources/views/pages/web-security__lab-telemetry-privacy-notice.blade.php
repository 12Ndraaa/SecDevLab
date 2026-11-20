@extends('layouts.academy')

@section('title', 'Academy Lab Telemetry Privacy Notice | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psproducts.css')

@section('academy_body')
@verbatim
<div no-keyword-injection="" class="wrapper">
    <div class="hero theme-navy-1">
        <div>
            <h1 class="text-left" id="academy-lab-telemetry-privacy-notice" cms-ignore-validation="HEADING_CAPITALIZATION">Academy Lab Telemetry Privacy Notice</h1>
        </div>
    </div>
    <div class="sticky-side-menu-white">
        <div>
            <aside>
                <h4>Contents</h4>
                <div>
                    <a href="/web-security/lab-telemetry-privacy-notice#1-who-we-are">1. Who we are</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#2-what-data-we-collect">2. What data we collect</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#3-special-note-on-personal-data">3. Special note on personal data</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#4-how-we-use-your-data">4. How we use your data</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#5-legal-basis-for-processing">5. Legal basis for processing</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#6-data-minimisation-and-controls">6. Data minimisation and controls</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#7-sharing-of-data">7. Sharing of data</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#8-international-transfers">8. International transfers</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#9-data-retention">9. Data retention</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#10-your-rights">10. Your rights</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#11-security">11. Security</a>
                    <a href="/web-security/lab-telemetry-privacy-notice#12-updates-to-this-notice">12. Updates to this notice</a>
                </div>
            </aside>
            <span>
                <div class="section theme-white">
                    <h2 id="1-who-we-are" cms-ignore-validation="HEADING_CAPITALIZATION">1. Who we are</h2>
                    <p>
                        SecDevLab Ltd is the data controller and responsible for your personal data (collectively referred to as "SecDevLab", "we", "us" or "our" in this privacy notice).
                    </p>
                    <p>
                        If you have any questions about this notice or how we use your data, please contact:
                    </p>
                    <p>
                        SecDevLab Ltd<br>
                        6 Booths Park<br>
                        Chelford Road<br>
                        Knutsford<br>
                        WA16 8ZS<br>
                        United Kingdom
                    </p>
                    <p><a href="mailto:hello@portswigger.net">hello@portswigger.net</a></p>
                </div>
                <div class="section theme-white">
                    <h2 id="2-what-data-we-collect" cms-ignore-validation="HEADING_CAPITALIZATION">2. What data we collect</h2>
                    <p>
                        We only collect telemetry data in specific Academy labs, and these labs are always clearly and visibly marked before you access them.
                    </p>
                    <p>This means:</p>
                    <ul>
                        <li>You will know in advance when a lab includes telemetry or AI interaction tracking.</li>
                        <li>There is no hidden or background data collection outside these labelled labs.</li>
                        <li>You can choose whether or not to proceed.</li>
                    </ul>
                    <p>
                        When you enter a marked lab, we collect technical and interaction data such as activity events, tool usage, and AI interactions, as outlined below:
                    </p>
                    <h3 id="a-user-and-session-data" cms-ignore-validation="HEADING_CAPITALIZATION">a) User and session data</h3>
                    <ul>
                        <li>User ID</li>
                        <li>Session ID</li>
                        <li>Lab identifiers and titles</li>
                        <li>Session server instance information (e.g. hostname)</li>
                    </ul>
                    <h3 id="b-activity-and-interaction-data" cms-ignore-validation="HEADING_CAPITALIZATION">b) Activity and interaction data</h3>
                    <ul>
                        <li>Lab start and completion events</li>
                        <li>Comments submitted (including free-text content)</li>
                        <li>Product reviews (including content and username)</li>
                        <li>Actions taken within labs</li>
                    </ul>
                    <h3 id="c-ai-scanner-and-tool-interaction-data" cms-ignore-validation="HEADING_CAPITALIZATION">c) AI scanner and tool interaction data</h3>
                    <ul>
                        <li>AI model used and scan activity</li>
                        <li>Iterations, tool calls, and execution results</li>
                        <li>Messages sent to and from the AI system (content may include user input)</li>
                        <li>Findings generated during scans</li>
                    </ul>
                    <h3 id="d-content-data-user-generated" cms-ignore-validation="HEADING_CAPITALIZATION">d) Content data (user-generated)</h3>
                    <ul>
                        <li>Blog comment content and author name (free-text field)</li>
                        <li>Product review content</li>
                    </ul>
                    <p><strong>Important:</strong> Free-text fields may contain personal data if entered by users.</p>
                </div>
                <div class="section theme-white">
                    <h2 id="3-special-note-on-personal-data" cms-ignore-validation="HEADING_CAPITALIZATION">3. Special note on personal data</h2>
                    <p>
                        We do not intentionally require users to provide personal data when using Academy Labs. However, as some features include free-text input fields, users may choose to enter information that contains personal data.
                    </p>
                    <p>
                        Users are therefore expected to take care not to include personal data unnecessarily. Where personal data is included, Academy Labs users should use commercially reasonable efforts to minimise any transfer of Customer Personal Data to SecDevLab. This includes, where reasonably practicable, removing, anonymising, or pseudonymising personal data in any content submitted as part of the labs.
                    </p>
                </div>
                <div class="section theme-white">
                    <h2 id="4-how-we-use-your-data">4. How we use your data</h2>
                    <p>We process telemetry data for the following purposes:</p>
                    <ul>
                        <li>To operate and maintain the Academy platform and labs.</li>
                        <li>To monitor performance and ensure system reliability.</li>
                        <li>To detect and investigate security issues or misuse.</li>
                        <li>To analyse and improve product functionality and user experience.</li>
                        <li>To develop and improve AI-powered features.</li>
                    </ul>
                </div>
                <div class="section theme-white">
                    <h2 id="5-legal-basis-for-processing" cms-ignore-validation="HEADING_CAPITALIZATION">5. Legal basis for processing</h2>
                    <p>Under UK GDPR, we rely on:</p>
                    <ul>
                        <li>Legitimate interests (Article 6(1)(f)), namely:
                            <ul>
                                <li>maintaining platform performance and security</li>
                                <li>improving our products and services</li>
                                <li>understanding how labs are used</li>
                            </ul>
                        </li>
                    </ul>
                    <p>Where telemetry is not strictly necessary, we ensure that:</p>
                    <ul>
                        <li>data collection is proportionate</li>
                        <li>privacy risks are minimised (e.g. truncation, filtering, pseudonymisation)</li>
                    </ul>
                </div>
                <div class="section theme-white">
                    <h2 id="6-data-minimisation-and-controls" cms-ignore-validation="HEADING_CAPITALIZATION">6. Data minimisation and controls</h2>
                    <p>We implement the following safeguards:</p>
                    <ul>
                        <li>Telemetry is only enabled for selected labs.</li>
                        <li>Data fields may be truncated (e.g. message/tool content limits).</li>
                        <li>We remove or mask personal data where feasible before analysis.</li>
                        <li>We regularly review whether all collected fields are necessary.</li>
                    </ul>
                </div>
                <div class="section theme-white">
                    <h2 id="7-sharing-of-data" cms-ignore-validation="HEADING_CAPITALIZATION">7. Sharing of data</h2>
                    <p>We may share telemetry data with:</p>
                    <ul>
                        <li>Service providers supporting hosting, analytics, and infrastructure.</li>
                        <li>Internal teams for product development and security.</li>
                    </ul>
                    <p>We do not share personal data for marketing purposes.</p>
                    <p>All third parties are subject to appropriate data processing agreements.</p>
                </div>
                <div class="section theme-white">
                    <h2 id="8-international-transfers" cms-ignore-validation="HEADING_CAPITALIZATION">8. International transfers</h2>
                    <p>Where data is transferred outside the UK, we ensure appropriate safeguards are in place, such as:</p>
                    <ul>
                        <li>UK International Data Transfer Agreement (IDTA), or</li>
                        <li>Adequacy regulations</li>
                    </ul>
                </div>
                <div class="section theme-white">
                    <h2 id="9-data-retention" cms-ignore-validation="HEADING_CAPITALIZATION">9. Data retention</h2>
                    <p>We retain telemetry data only for as long as necessary to:</p>
                    <ul>
                        <li>fulfil the purposes outlined above</li>
                        <li>comply with legal and regulatory obligations</li>
                    </ul>
                </div>
                <div class="section theme-white">
                    <h2 id="10-your-rights" cms-ignore-validation="HEADING_CAPITALIZATION">10. Your rights</h2>
                    <p>Under UK GDPR, you have the right to:</p>
                    <ul>
                        <li>Access your personal data.</li>
                        <li>Request correction or deletion.</li>
                        <li>Restrict or object to processing.</li>
                        <li>Data portability (where applicable).</li>
                    </ul>
                    <p>To exercise your rights, contact:</p>
                    <p>
                        SecDevLab Ltd<br>
                        6 Booths Park<br>
                        Chelford Road<br>
                        Knutsford<br>
                        WA16 8ZS<br>
                        United Kingdom
                    </p>
                    <p><a href="mailto:hello@portswigger.net">hello@portswigger.net</a></p>
                </div>
                <div class="section theme-white">
                    <h2 id="11-security">11. Security</h2>
                    <p>We implement appropriate technical and organisational measures to protect data, including:</p>
                    <ul>
                        <li>Access controls.</li>
                        <li>Data minimisation and truncation.</li>
                        <li>Monitoring and logging safeguards.</li>
                    </ul>
                </div>
                <div class="section theme-white">
                    <h2 id="12-updates-to-this-notice" cms-ignore-validation="HEADING_CAPITALIZATION">12. Updates to this notice</h2>
                    <p>
                        We may update this notice from time to time. The latest version will always be available on our platform.
                    </p>
                </div>
            </span>
        </div>
    </div>
</div>
@endverbatim
@endsection
