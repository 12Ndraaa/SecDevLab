@extends('layouts.academy')

@section('title', 'Clickjacking (UI redressing) | '.config('app.name'))
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
                <h2 class="margin-top-tiny">Clickjacking (UI redressing)</h2>
                <p class="font-size-16">This learning path deals with clickjacking attacks. You&#x27;ll learn the fundamentals of clickjacking, how to construct basic attacks, and implement server-side and client-side defense strategies.</p>
            </div>
        </div>
    </div>
    <div class="section-full-width theme-white padding-bottom-medium">
        <div class="learning-path-summary">
            <h2 class="heading-navy-1">Contents</h2>
            <div class="learning-path-summary-content">
                <div class="learning-path-summary-header">
                    <h3 class="heading-orange-1">Get started: What is clickjacking?</h3>
                    <p>
                        <svg height="11">
                            <rect x="0.3" y="0.5" width="100%" height="10" rx="5" fill="#f2f3f6"></rect>
                            <rect x="0.3" y="0.5" width="0%" height="10" rx="5" fill="#0066CC"></rect>
                        </svg>
                        <span class="margin-left-small heading-navy-1">0 of 19</span>
                    </p>
                </div>
                <a class="button-orange margin-bottom-medium" href="/web-security/learning-paths/clickjacking/clickjacking-what-is-clickjacking/clickjacking/what-is-clickjacking">GET STARTED
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
                        <strong>What is clickjacking?</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-in-progress next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-in-progress">
                                What is clickjacking?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                                    <a class="chevron-after margin-left-tiny" href="/web-security/learning-paths/clickjacking/clickjacking-what-is-clickjacking/clickjacking/what-is-clickjacking">Get started</a>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                What is clickjacking? - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>How to construct a basic clickjacking attack</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 3</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                How to construct a basic clickjacking attack
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                How to construct a basic clickjacking attack - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Basic clickjacking with CSRF token protection
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Clickbandit</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Clickbandit
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Clickjacking with prefilled form input</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Clickjacking with prefilled form input
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Clickjacking with form input data prefilled from a URL parameter
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Frame busting scripts</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 3</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Frame busting scripts
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Frame busting scripts - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Clickjacking with a frame buster script
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Combining clickjacking with a DOM XSS attack</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Combining clickjacking with a DOM XSS attack
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Exploiting clickjacking vulnerability to trigger DOM-based XSS
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Multistep clickjacking</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Multistep clickjacking
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Multistep clickjacking
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>How to prevent clickjacking attacks</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                How to prevent clickjacking attacks
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>X-Frame-Options</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                X-Frame-Options
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending " >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Content Security Policy (CSP)</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                Content Security Policy (CSP)
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  ">
                            <p class="progress-status-circle progress-status-pending">
                                Content Security Policy (CSP) - Continued
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
