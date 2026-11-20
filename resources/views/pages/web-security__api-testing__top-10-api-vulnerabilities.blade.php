@extends('layouts.academy')

@section('title', 'Web Security Academy alignment with the OWASP Top 10 API vulnerabilities | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="12">
            <nav class="nav-lhs-scrollable">
                <label class="nav-lhs-toggle-label" for="nav-lhs-toggle"></label>
                

        <a class="nav-back" href="/web-security/all-topics">
            <span class="icon-arrow-head-left"></span>
            Back to all topics
        </a>
        <input type="checkbox" id="nav-main-id">
        <label class="nav-label" for="nav-main-id">
            <span class="icon-arrow-head-down"></span>
        </label>
        <h3>API testing</h3>
        <ul>
            <li><a href="/web-security/api-testing">Overview</a></li>
            <li>
                <a href="/web-security/api-testing#api-recon">API recon</a>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/api-testing#api-documentation">API documentation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <a href="/web-security/api-testing#discovering-api-documentation">Discovering API documentation</a>
                    </li>
                    <li>
                        <a href="/web-security/api-testing#using-machine-readable-documentation">Using machine-readable API documentation</a>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/api-testing#identifying-api-endpoints">Identifying API endpoints</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-3">
                        <label for="sub-nav-id-3">
                            <a href="/web-security/api-testing#interacting-with-api-endpoints">Interacting with API endpoints</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li>
                                <a href="/web-security/api-testing#identifying-supported-http-methods">Identifying supported HTTP methods</a>
                            </li>
                            <li>
                                <a href="/web-security/api-testing#identifying-supported-content-types">Identifying supported content types</a>
                            </li>
                            <li>
                                <a href="/web-security/api-testing#using-intruder-to-find-hidden-endpoints">Using Intruder to find hidden endpoints</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/api-testing#finding-hidden-parameters">Finding hidden parameters</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-5">
                        <label for="sub-nav-id-5">
                            <a href="/web-security/api-testing#mass-assignment-vulnerabilities">Mass assignment vulnerabilities</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li>
                                <a href="/web-security/api-testing#identifying-hidden-parameters">Identifying hidden parameters</a>
                            </li>
                            <li>
                                <a href="/web-security/api-testing#testing-mass-assignment-vulnerabilities">Testing mass assignment vulnerabilities</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="/web-security/api-testing#preventing-vulnerabilities-in-apis">Preventing vulnerabilities in APIs</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-6">
                <label for="sub-nav-id-6">
                    <a href="/web-security/api-testing/server-side-parameter-pollution">Server-side parameter pollution</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-7">
                        <label for="sub-nav-id-7">
                            <a href="/web-security/api-testing/server-side-parameter-pollution#testing-for-server-side-parameter-pollution-in-the-query-string">Testing the query string</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li>
                                <a href="/web-security/api-testing/server-side-parameter-pollution#truncating-query-strings">Truncating query strings</a>
                            </li>
                            <li>
                                <a href="/web-security/api-testing/server-side-parameter-pollution#injecting-invalid-parameters">Injecting invalid parameters</a>
                            </li>
                            <li>
                                <a href="/web-security/api-testing/server-side-parameter-pollution#injecting-valid-parameters">Injecting valid parameters</a>
                            </li>
                            <li>
                                <a href="/web-security/api-testing/server-side-parameter-pollution#overriding-existing-parameters">Overriding existing parameters</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/web-security/api-testing/server-side-parameter-pollution#testing-for-server-side-parameter-pollution-in-rest-paths">Testing REST paths</a>
                    </li>
                    <li>
                        <a href="/web-security/api-testing/server-side-parameter-pollution#testing-for-server-side-parameter-pollution-in-structured-data-formats">Testing structured data formats</a>
                    </li>
                    <li>
                        <a href="/web-security/api-testing/server-side-parameter-pollution#testing-with-automated-tools">Testing with automated tools</a>
                    </li>
                    <li>
                        <a href="/web-security/api-testing/server-side-parameter-pollution#preventing-server-side-parameter-pollution">Preventing server-side parameter pollution</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/web-security/api-testing/top-10-api-vulnerabilities">Alignment with the OWASP Top 10 API vulnerabilities</a>
            </li>
            <li>
                <a href="/web-security/all-labs#api-testing">View all API testing labs</a>
            </li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/api-testing"><span itemprop="name">API testing</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/api-testing/top-10-api-vulnerabilities"><span itemprop="name">Alignment with the OWASP Top 10 API vulnerabilities</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="HEADING_CAPITALIZATION" class="heading-2">
    Web Security Academy alignment with the OWASP Top 10 API vulnerabilities
</h1><p>
    The OWASP Foundation periodically publishes a list of critical API-specific security risks. Although some of these risks have a different name in the context of APIs, many of them align with our existing Web Security Academy topics.
</p><p>
    The table below specifies which Web Security Academy topics are relevant to the OWASP Top 10 API vulnerabilities:
</p><table class="grid-table grid-table-size-1-2">
    <tbody>
    <tr>
        <td><p><strong>Risk</strong></p></td>
        <td><p><strong>Relevant Web Security Academy topics</strong></p></td>
    </tr>
    <tr>
        <td>
            <p>Broken object level authorization</p>
        </td>
        <td>
            <p>
                <a href="/web-security/access-control">Access control vulnerabilities and privilege escalation</a>
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Broken authentication</p>
        </td>
        <td>
            <p>
                <a href="/web-security/authentication">Authentication vulnerabilities</a>
                </p>
            <p>
                <a href="/web-security/oauth">OAuth 2.0 authentication vulnerabilities</a>
                </p>
            <p>
                <a href="/web-security/jwt">JWT attacks</a>
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Broken object property level authorization</p>
        </td>
        <td>
                <p>
                    <a href="/web-security/api-testing#mass-assignment-vulnerabilities">Mass assignment vulnerabilities</a>
                </p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Unrestricted resource consumption</p>
        </td>
        <td>
                <p>
                    <a href="/web-security/race-conditions">Race conditions</a>
                </p>
                <p>
                    <a href="/web-security/file-upload">File upload vulnerabilities</a>
                </p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Broken function level authorization</p>
        </td>
        <td>
            <p>
                <a href="/web-security/access-control">Access control vulnerabilities and privilege escalation</a>
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Unrestricted access to sensitive business flows</p>
        </td>
        <td>
            <p>
                <a href="/web-security/logic-flaws">Business logic vulnerabilities</a>
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Server side request forgery</p>
        </td>
        <td>
            <p>
                <a href="/web-security/ssrf">Server-side request forgery (SSRF)</a>
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Security misconfiguration</p>
        </td>
        <td>
            <p><a href="/web-security/cors">Cross-origin resource sharing (CORS)</a></p>
            <p><a href="/web-security/information-disclosure">Information disclosure vulnerabilities</a></p>
            <p><a href="/web-security/host-header">HTTP Host header attacks</a></p>
            <p><a href="/web-security/request-smuggling">HTTP request smuggling</a></p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Improper inventory management</p>
        </td>
        <td>
            <p><a href="/web-security/api-testing">API testing</a></p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Unsafe consumption of APIs</p>
        </td>
        <td>
            <p><a href="/web-security/api-testing">API testing</a></p>
        </td>
    </tr>
    </tbody>
</table><p>
    You can read more about the OWASP API Top 10 on the OWASP website, at <a href="https://owasp.org/API-Security/editions/2023/en/0x00-header/">OWASP API Security Top 10 - 2023</a>.
</p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
