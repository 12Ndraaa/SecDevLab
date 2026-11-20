@extends('layouts.academy')

@section('title', 'GraphQL API vulnerabilities | '.config('app.name'))
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
                <h2 class="margin-top-tiny">GraphQL API vulnerabilities</h2>
                <p class="font-size-16">This learning path explores common vulnerabilities associated with GraphQL APIs due to implementation and design flaws. You&#x27;ll learn how to find GraphQL endpoints, bypass some common defenses, and exploit a range of GraphQL API vulnerabilities.</p>
            </div>
        </div>
    </div>
    <div class="section-full-width theme-white padding-bottom-medium">
        <div class="learning-path-summary">
            <h2 class="heading-navy-1">Contents</h2>
            <div class="learning-path-summary-content">
                <div class="learning-path-summary-header">
                    <h3 class="heading-orange-1">Get started: Finding GraphQL endpoints</h3>
                    <p>
                        <svg height="11">
                            <rect x="0.3" y="0.5" width="100%" height="10" rx="5" fill="#f2f3f6"></rect>
                            <rect x="0.3" y="0.5" width="0%" height="10" rx="5" fill="#0066CC"></rect>
                        </svg>
                        <span class="margin-left-small heading-navy-1">0 of 29</span>
                    </p>
                </div>
                <a class="button-orange margin-bottom-medium" href="/web-security/learning-paths/graphql-api-vulnerabilities/finding-graphql-endpoints/graphql/finding-graphql-endpoints">GET STARTED
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
                        <strong>Finding GraphQL endpoints</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 6</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-in-progress next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-in-progress">
                                Finding GraphQL endpoints
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                                    <a class="chevron-after margin-left-tiny" href="/web-security/learning-paths/graphql-api-vulnerabilities/finding-graphql-endpoints/graphql/finding-graphql-endpoints">Get started</a>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Universal queries
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Common endpoint names
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Common endpoint names - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Request methods
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Initial testing
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Exploiting unsanitized arguments</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting unsanitized arguments
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting unsanitized arguments - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Discovering schema information</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 9</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Discovering schema information
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Using introspection
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Probing for introspection
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Running a full introspection query
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Visualizing introspection results
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Suggestions
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Suggestions - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Accessing private GraphQL posts
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Accidental exposure of private GraphQL fields
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Bypassing GraphQL introspection defenses</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 3</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Bypassing GraphQL introspection defenses
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Bypassing GraphQL introspection defenses - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Finding a hidden GraphQL endpoint
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Bypassing rate limiting using aliases</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 3</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Bypassing rate limiting using aliases
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Bypassing rate limiting using aliases - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Bypassing GraphQL brute force protections
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>GraphQL CSRF</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 3</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                GraphQL CSRF
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                How do CSRF over GraphQL vulnerabilities arise?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Performing CSRF exploits over GraphQL
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Preventing GraphQL attacks</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Preventing GraphQL attacks
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Preventing GraphQL brute-force attacks</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Preventing GraphQL brute force attacks
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending " >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Preventing CSRF over GraphQL</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  ">
                            <p class="progress-status-circle progress-status-pending">
                                Preventing CSRF over GraphQL
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
