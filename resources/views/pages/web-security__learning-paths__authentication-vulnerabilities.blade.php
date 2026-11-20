@extends('layouts.academy')

@section('title', 'Authentication vulnerabilities | '.config('app.name'))
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
                <h2 class="margin-top-tiny">Authentication vulnerabilities</h2>
                <p class="font-size-16">This learning path explores authentication vulnerabilities, which have a critical impact on security. You&#x27;ll learn about common mechanisms and vulnerabilities, and strategies for robust authentication.</p>
            </div>
        </div>
    </div>
    <div class="section-full-width theme-white padding-bottom-medium">
        <div class="learning-path-summary">
            <h2 class="heading-navy-1">Contents</h2>
            <div class="learning-path-summary-content">
                <div class="learning-path-summary-header">
                    <h3 class="heading-orange-1">Get started: What is authentication?</h3>
                    <p>
                        <svg height="11">
                            <rect x="0.3" y="0.5" width="100%" height="10" rx="5" fill="#f2f3f6"></rect>
                            <rect x="0.3" y="0.5" width="0%" height="10" rx="5" fill="#0066CC"></rect>
                        </svg>
                        <span class="margin-left-small heading-navy-1">0 of 55</span>
                    </p>
                </div>
                <a class="button-orange margin-bottom-medium" href="/web-security/learning-paths/authentication-vulnerabilities/what-is-authentication/authentication/what-is-authentication">GET STARTED
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
                        <strong>What is authentication?</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-in-progress  next-section-status-pending">
                            <p class="progress-status-circle progress-status-in-progress">
                                What is authentication?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                                    <a class="chevron-after margin-left-tiny" href="/web-security/learning-paths/authentication-vulnerabilities/what-is-authentication/authentication/what-is-authentication">Get started</a>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>What is the difference between authentication and authorization?</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                What is the difference between authentication and authorization?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>How do authentication vulnerabilities arise?</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                How do authentication vulnerabilities arise?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>What is the impact of vulnerable authentication?</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                What is the impact of vulnerable authentication?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                What is the impact of vulnerable authentication? - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Vulnerabilities in password-based login</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 19</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Vulnerabilities in password-based login
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Brute-force attacks
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Brute-forcing usernames
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Brute-forcing passwords
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Brute-forcing passwords - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Username enumeration
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Username enumeration - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Username enumeration via different responses
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Username enumeration via subtly different responses
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Username enumeration via response timing
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Flawed brute-force protection
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Broken brute-force protection, IP block
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Account locking
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Account locking - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Account locking - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Username enumeration via account lock
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                User rate limiting
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                HTTP basic authentication
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                HTTP basic authentication - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Vulnerabilities in multi-factor authentication</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 8</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Vulnerabilities in multi-factor authentication
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Vulnerabilities in multi-factor authentication - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Two-factor authentication tokens
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Bypassing two-factor authentication
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: 2FA simple bypass
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Flawed two-factor verification logic
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: 2FA broken logic
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Brute-forcing 2FA verification codes
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Vulnerabilities in other authentication mechanisms</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 15</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Vulnerabilities in other authentication mechanisms
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Keeping users logged in
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Keeping users logged in - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Brute-forcing a stay-logged-in cookie
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Keeping users logged in - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Offline password cracking
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Resetting user passwords
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Sending passwords by email
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Resetting passwords using a URL
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Resetting passwords using a URL - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Password reset broken logic
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Resetting passwords using a URL - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Password reset poisoning via middleware
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Changing user passwords
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Password brute-force via password change
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending " >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Preventing attacks on your own authentication mechanisms</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 8</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                Preventing attacks on your own authentication mechanisms
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                Take care with user credentials
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                Don&#x27;t count on users for security
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                Prevent username enumeration
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                Implement robust brute-force protection
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                Triple-check your verification logic
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                Don&#x27;t forget supplementary functionality
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  ">
                            <p class="progress-status-circle progress-status-pending">
                                Implement proper multi-factor authentication
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
