@extends('layouts.academy')

@section('title', 'SQL injection | '.config('app.name'))
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
                <h2 class="margin-top-tiny">SQL injection</h2>
                <p class="font-size-16">This learning path introduces SQL injection (SQLi), a critical web vulnerability. You&#x27;ll learn how to detect and exploit SQLi to uncover hidden data and manipulate application behavior, as well as essential techniques to secure applications against SQLi attacks.</p>
            </div>
        </div>
    </div>
    <div class="section-full-width theme-white padding-bottom-medium">
        <div class="learning-path-summary">
            <h2 class="heading-navy-1">Contents</h2>
            <div class="learning-path-summary-content">
                <div class="learning-path-summary-header">
                    <h3 class="heading-orange-1">Get started: What is SQL injection (SQLi)?</h3>
                    <p>
                        <svg height="11">
                            <rect x="0.3" y="0.5" width="100%" height="10" rx="5" fill="#f2f3f6"></rect>
                            <rect x="0.3" y="0.5" width="0%" height="10" rx="5" fill="#0066CC"></rect>
                        </svg>
                        <span class="margin-left-small heading-navy-1">0 of 51</span>
                    </p>
                </div>
                <a class="button-orange margin-bottom-medium" href="/web-security/learning-paths/sql-injection/sql-injection-what-is-sql-injection/sql-injection/what-is-sql-injection-sqli">GET STARTED
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
                        <strong>What is SQL injection?</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-in-progress  next-section-status-pending">
                            <p class="progress-status-circle progress-status-in-progress">
                                What is SQL injection (SQLi)?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                                    <a class="chevron-after margin-left-tiny" href="/web-security/learning-paths/sql-injection/sql-injection-what-is-sql-injection/sql-injection/what-is-sql-injection-sqli">Get started</a>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>How to detect SQL injection vulnerabilities</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                How to detect SQL injection vulnerabilities
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                SQL injection in different parts of the query
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Retrieving hidden data</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 3</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Retrieving hidden data
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Retrieving hidden data - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SQL injection vulnerability in WHERE clause allowing retrieval of hidden data
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Subverting application logic</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Subverting application logic
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SQL injection vulnerability allowing login bypass
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>SQL injection UNION attacks</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                SQL injection UNION attacks
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                SQL injection UNION attacks - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Determining the number of columns required</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 4</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Determining the number of columns required
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Determining the number of columns required - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SQL injection UNION attack, determining the number of columns returned by the query
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Database-specific syntax
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Finding columns with a useful data type</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Finding columns with a useful data type
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SQL injection UNION attack, finding a column containing text
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Using a SQL injection UNION attack to retrieve interesting data</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Using a SQL injection UNION attack to retrieve interesting data
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SQL injection UNION attack, retrieving data from other tables
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Retrieving multiple values within a single column</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Retrieving multiple values within a single column
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SQL injection UNION attack, retrieving multiple values in a single column
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Examining the database</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 5</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Examining the database in SQL injection attacks
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Querying the database type and version
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SQL injection attack, querying the database type and version on MySQL and Microsoft
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Listing the contents of the database
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SQL injection attack, listing the database contents on non-Oracle databases
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Blind SQL injection</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Blind SQL injection
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                What is blind SQL injection?
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Exploiting blind SQL injection by triggering conditional responses</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 4</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting blind SQL injection by triggering conditional responses
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting blind SQL injection by triggering conditional responses - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting blind SQL injection by triggering conditional responses - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Blind SQL injection with conditional responses
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Error-based SQL injection</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 7</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Error-based SQL injection
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting blind SQL injection by triggering conditional errors
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting blind SQL injection by triggering conditional errors - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Blind SQL injection with conditional errors
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Extracting sensitive data via verbose SQL error messages
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Extracting sensitive data via verbose SQL error messages - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Visible error-based SQL injection
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Exploiting blind SQL injection by triggering time delays</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 3</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting blind SQL injection by triggering time delays
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting blind SQL injection by triggering time delays - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Blind SQL injection with time delays and information retrieval
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Exploiting blind SQL injection using out-of-band (OAST) techniques</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 5</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting blind SQL injection using out-of-band (OAST) techniques
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting blind SQL injection using out-of-band (OAST) techniques - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Blind SQL injection with out-of-band interaction
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Exploiting blind SQL injection using out-of-band (OAST) techniques - Continued
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: Blind SQL injection with out-of-band data exfiltration
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>SQL injection in different contexts</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                SQL injection in different contexts
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Lab: SQL injection with filter bypass via XML encoding
                                    <span class="label theme-enterprise-1 margin-left-tiny">PRACTITIONER</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending next-section-status-pending" >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>Second-order SQL injection</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 1</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  next-section-status-pending">
                            <p class="progress-status-circle progress-status-pending">
                                Second-order SQL injection
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                </div>
            </details>
            <details class="expandable-progress-container progress-status-pending next-progress-status-pending " >
                <hr>
                <summary class="expandable-progress-container-summary progress-status-circle progress-status-pending">
                    <p>
                        <strong>How to prevent SQL injection</strong>
                        <span></span>
                        <span class="expandable-progress-container-summary-amount">0 of 2</span>
                    </p>
                </summary>
                <hr>
                <div class="content">
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending next-progress-status-pending ">
                            <p class="progress-status-circle progress-status-pending">
                                How to prevent SQL injection
                                    <span class="label theme-dastardly margin-left-tiny">APPRENTICE</span>
                            </p>
                        </div>
                        <div class="expandable-progress-container-item progress-item-link progress-status-pending  ">
                            <p class="progress-status-circle progress-status-pending">
                                How to prevent SQL injection - Continued
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
