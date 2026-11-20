@extends('layouts.academy')

@section('title', 'Server-side request forgery (SSRF) attacks | '.config('app.name'))
@section('legacy_css', '/content/pslearningpaths.css')

@section('academy_body')
@verbatim
<div class="wrapper">
    <div class="section-full-width-medium-xx theme-navy-2">
        <div>
            <div class="margin-left-small margin-right-small">
                <a href="/web-security/learning-paths/" class="chevron-before">Back to all learning paths</a>
                <div class="margin-top-small">
                    <span class="label  theme-enterprise-1">PRACTITIONER</span>
                </div>
                <h2 class="margin-top-tiny">Server-side request forgery (SSRF) attacks</h2>
                <p class="font-size-16">This learning path teaches you about server-side request forgery (SSRF). You&#x27;ll learn about its impact, common techniques used in attacks, and how to defend against them.</p>
            </div>
        </div>
    </div>
    <div class="section-full-width theme-white padding-bottom-medium">
        <div class="learning-path-summary">
            <h2 class="heading-navy-1">Contents</h2>
            <div class="learning-path-summary-content">
                <div class="learning-path-summary-header">
                    <h3 class="heading-orange-1">Get started: What is SSRF?</h3>
                    <p>
                        <svg height="11">
                            <rect x="0.3" y="0.5" width="100%" height="10" rx="5" fill="#f2f3f6"></rect>
                            <rect x="0.3" y="0.5" width="0%" height="10" rx="5" fill="#0066CC"></rect>
                        </svg>
                        <span class="margin-left-small heading-navy-1">0 of 23</span>
                    </p>
                </div>
                <a class="button-orange margin-bottom-medium" href="/web-security/learning-paths/ssrf-attacks/ssrf-attacks-what-is-ssrf/ssrf/what-is-ssrf">GET STARTED
                                        <span class="icon-arrow-right margin-left-tiny"></span></a>
            </div>
            <hr class="custom-hr"/>
        </div>
    </div>

    <div class="section-full-width theme-white">

        <div class="expandable-progress-wrapper">
            <details class="expandable-progress-container progress-status-in-progress next-progress-status-in-progress next-section-status-pending" open>
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-in-progress">
                    <p>
                        <strong>What is SSRF?</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-in-progress  next-section-status-pending">
                            <p class="progress-status-circle progress-status-in-progress">
                                What is SSRF?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                                    <a class="chevron-after margin-left-tiny" href="/web-security/learning-paths/ssrf-attacks/ssrf-attacks-what-is-ssrf/ssrf/what-is-ssrf">Get started</a>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>What is the impact of SSRF attacks?</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                What is the impact of SSRF attacks?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Common SSRF attacks</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 6</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Common SSRF attacks
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                SSRF attacks against the server
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                SSRF attacks against the server - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Basic SSRF against the local server
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                SSRF attacks against other back-end systems
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Basic SSRF against another back-end system
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Circumventing common SSRF defenses</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 6</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Circumventing common SSRF defenses
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                SSRF with blacklist-based input filters
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SSRF with blacklist-based input filter
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                SSRF with whitelist-based input filters
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Bypassing SSRF filters via open redirection
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SSRF with filter bypass via open redirection vulnerability
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Blind SSRF vulnerabilities</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 5</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Blind SSRF vulnerabilities
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                What is the impact of blind SSRF vulnerabilities?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                How to find and exploit blind SSRF vulnerabilities
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                How to find and exploit blind SSRF vulnerabilities - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Blind SSRF with out-of-band detection
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending " >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Finding hidden attack surface for SSRF vulnerabilities</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 4</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                Finding hidden attack surface for SSRF vulnerabilities
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                Partial URLs in requests
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                URLs within data formats
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  ">
                            <p class="progress-status-circle progress-status-pending">
                                SSRF via the Referer header
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
        </div>
    </div>
</div>
@endverbatim
@endsection
