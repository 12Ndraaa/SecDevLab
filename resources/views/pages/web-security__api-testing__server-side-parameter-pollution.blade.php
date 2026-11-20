@extends('layouts.academy')

@section('title', 'Server-side parameter pollution | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/api-testing"><span itemprop="name">API testing</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/api-testing/server-side-parameter-pollution"><span itemprop="name">Server-side parameter pollution</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2" id="server-side-parameter-pollution" chunk-id="E2DAA7D061DE2F97AECF63DC320CBD97">
    Server-side parameter pollution
</h1><p>
    Some systems contain internal APIs that aren't directly accessible from the internet. Server-side parameter pollution occurs when a website embeds user input in a server-side request to an internal API without adequate encoding. This means that an attacker may be able to manipulate or inject parameters, which may enable them to, for example:
</p><ul>
    <li>Override existing parameters.</li>
    <li>Modify the application behavior.</li>
    <li>Access unauthorized data.</li>
</ul><p>
    You can test any user input for any kind of parameter pollution. For example, query parameters, form fields, headers, and URL path parameters may all be vulnerable.
</p><img alt="server-side parameter pollution example" src="/web-security/api-testing/images/api-testing-2.jpg"><div class="highlightedarea">
    <h4>Note</h4>
    <p>
        This vulnerability is sometimes called HTTP parameter pollution. However, this term is also used to refer to a web application firewall (WAF) bypass technique. To avoid confusion, in this topic we'll only refer to server-side parameter pollution.
    </p>
    <p>
        In addition, despite the similar name, this vulnerability class has very little in common with <a href="/web-security/prototype-pollution/server-side">server-side
        prototype pollution</a>.
    </p>
</div><h2 id="testing-for-server-side-parameter-pollution-in-the-query-string" chunk-id="9471BA7E4747026021C9653B29F6E129">Testing for server-side parameter pollution in the query string</h2><p>
    To test for server-side parameter pollution in the query string, place query syntax characters like <code>#</code>,
    <code>&</code>, and <code>=</code> in your input and observe how the application responds.
</p><p>
    Consider a vulnerable application that enables you to search for other users based on their username. When you search for a user, your browser makes the following request:
</p><code class="code-scrollable">GET /userSearch?name=<span class="blue">peter</span>&back=/home</code><p>
    To retrieve user information, the server queries an internal API with the following request:
</p><code class="code-scrollable">GET /users/search?name=<span class="blue">peter</span>&publicProfile=true</code><h3 id="truncating-query-strings" chunk-id="97EE47EBF9F3472BB87B384AA172B36C">Truncating query strings</h3><p>
    You can use a URL-encoded <code>#</code> character to attempt to truncate the server-side request. To help you interpret the response, you could also add a string after the <code>#</code> character.
</p><p>
    For example, you could modify the query string to the following:
</p><code class="code-scrollable">GET /userSearch?name=<span class="blue">peter</span><span class="red">%23foo</span>&back=/home</code><p>
    The front-end will try to access the following URL:
</p><code class="code-scrollable">GET /users/search?name=<span class="blue">peter</span><span class="red">#foo</span>&publicProfile=true</code><div class="highlightedarea">
    <h4>Note</h4>
    <p>
        It's essential that you URL-encode the <code>#</code> character. Otherwise the front-end application will interpret it as a fragment identifier and it won't be passed to the internal API.
    </p>
</div><p>
    Review the response for clues about whether the query has been truncated. For example, if the response returns the user <code>peter</code>, the server-side query may have been truncated. If an <code>Invalid name</code> error message is returned, the application may have treated
    <code>foo</code> as part of the username. This suggests that the server-side request may not have been truncated.
</p><p>
    If you're able to truncate the server-side request, this removes the requirement for the <code>publicProfile</code> field to be set to true. You may be able to exploit this to return non-public user profiles.
</p><h3 id="injecting-invalid-parameters" chunk-id="4753B0B083A625C6776F407AD6296092">
    Injecting invalid parameters
</h3><p>
    You can use an URL-encoded <code>&</code> character to attempt to add a second parameter to the server-side request.
</p><p>
    For example, you could modify the query string to the following:
</p><code class="code-scrollable">GET /userSearch?name=<span class="blue">peter</span><span class="red">%26foo=xyz</span>&back=/home</code><p>
    This results in the following server-side request to the internal API:
</p><code class="code-scrollabble">GET /users/search?name=<span class="blue">peter</span><span class="red">&foo=xyz</span>&publicProfile=true</code><p>
    Review the response for clues about how the additional parameter is parsed. For example, if the response is unchanged this may indicate that the parameter was successfully injected but ignored by the application.
</p><p>
    To build up a more complete picture, you'll need to test further.
</p><h3 id="injecting-valid-parameters" chunk-id="E22115305659260F23C855E6C0B5D73D">Injecting valid parameters</h3><p>
    If you're able to modify the query string, you can then attempt to add a second valid parameter to the server-side request.
</p><div class="highlightedarea">
    <h4>Related pages</h4>
    <p>
        For information on how to identify parameters that you can inject into the query string, see the <a href="/web-security/api-testing#finding-hidden-parameters">Finding hidden
        parameters</a> section.
    </p>
</div><p>
    For example, if you've identified the <code>email</code> parameter, you could add it to the query string as follows:
</p><code class="code-scrollable">GET /userSearch?name=<span class="blue">peter</span><span class="red">%26email=foo</span>&back=/home</code><p>
    This results in the following server-side request to the internal API:
</p><code class="code-scrollable">GET /users/search?name=<span class="blue">peter</span><span class="red">&email=foo</span>&publicProfile=true</code><p>
    Review the response for clues about how the additional parameter is parsed.
</p><h3 id="overriding-existing-parameters" chunk-id="62D471909602BD09B02525DAAED143FE">Overriding existing parameters</h3><p>
    To confirm whether the application is vulnerable to server-side parameter pollution, you could try to override the original parameter. Do this by injecting a second parameter with the same name.
</p><p>
    For example, you could modify the query string to the following:
</p><code class="code-scrollable">GET /userSearch?name=<span class="blue">peter</span><span class="red">%26name=carlos</span>&back=/home</code><p>
    This results in the following server-side request to the internal API:
</p><code class="code-scrollable">GET /users/search?name=<span class="blue">peter</span><span class="red">&name=carlos</span>&publicProfile=true</code><p>
    The internal API interprets two <code>name</code> parameters. The impact of this depends on how the application processes the second parameter. This varies across different web technologies. For example:
</p><ul>
    <li>PHP parses the last parameter only. This would result in a user search for <code>carlos</code>.</li>
    <li>ASP.NET combines both parameters. This would result in a user search for <code>peter,carlos</code>, which might result in an <code>Invalid username</code> error message.</li>
    <li>Node.js / express parses the first parameter only. This would result in a user search for <code>peter</code>, giving an unchanged result.</li>
</ul><p>
    If you're able to override the original parameter, you may be able to conduct an exploit. For example, you could add
    <code>name=administrator</code> to the request. This may enable you to log in as the administrator user.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'D74FC3117A595F2183EB88A24360BB9C2A7472A910E4E97B4907971835D1F4E3'])@verbatim<h2 id="testing-for-server-side-parameter-pollution-in-rest-paths" chunk-id="0B19929002F4EF28F05BCE462B568DDD">Testing for server-side parameter pollution in REST paths</h2><p>
    A RESTful API may place parameter names and values in the URL path, rather than the query string. For example, consider the following path:
</p><code class="code-scrollable">/api/users/123</code><p>
    The URL path might be broken down as follows:
</p><ul>
    <li><code>/api</code> is the root API endpoint.</li>
    <li><code>/users</code> represents a resource, in this case <code>users</code>.</li>
    <li><code>/123</code>represents a parameter, here an identifier for the specific user.</li>
</ul><p>
    Consider an application that enables you to edit user profiles based on their username. Requests are sent to the following endpoint:
</p><code class="code-scrollable">GET /edit_profile.php?name=peter</code><p>
    This results in the following server-side request:
</p><code class="code-scrollable">GET /api/private/users/peter</code><p>
    An attacker may be able to manipulate server-side URL path parameters to exploit the API. To test for this vulnerability, add path traversal sequences to modify parameters and observe how the application responds.
</p><p>
    You could submit URL-encoded <code>peter/../admin</code> as the value of the <code>name</code> parameter:
</p><code class="code-scrollable">GET /edit_profile.php?name=peter%2f..%2fadmin</code><p>
    This may result in the following server-side request:
</p><code class="code-scrollable">GET /api/private/users/peter/../admin</code><p>
    If the server-side client or back-end API normalize this path, it may be resolved to <code>/api/private/users/admin</code>.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '4967CB9AD484265A5742AFB7B567C2732E03C1753EC5232085B0D0FC48A426F5'])@verbatim<h2 id="testing-for-server-side-parameter-pollution-in-structured-data-formats" chunk-id="C427AB34631115954527DDE677A1425F">Testing for server-side parameter pollution in structured data formats</h2><p>
    An attacker may be able to manipulate parameters to exploit vulnerabilities in the server's processing of other structured data formats, such as a JSON or XML. To test for this, inject unexpected structured data into user inputs and see how the server responds.
</p><p>
    Consider an application that enables users to edit their profile, then applies their changes with a request to a server-side API. When you edit your name, your browser makes the following request:
</p><code class="code-scrollable">POST /myaccount
name=<span class="red">peter</span>
</code><p>
    This results in the following server-side request:
</p><code class="code-scrollable">PATCH /users/7312/update
<span class="blue">{"name":"</span><span class="red">peter</span><span class="blue">"}</span>
</code><p>
    You can attempt to add the <code>access_level</code> parameter to the request as follows:
</p><code class="code-scrollable">POST /myaccount
name=<span class="red">peter","access_level":"administrator</span></code><p>
    If the user input is added to the server-side JSON data without adequate validation or sanitization, this results in the following server-side request:
</p><code class="code-scrollable">PATCH /users/7312/update
<span class="blue">{"name":"</span><span class="red">peter","access_level":"administrator</span><span class="blue">"}</span>
</code><p>
    This may result in the user <code>peter</code> being given administrator access.
</p><div class="highlightedarea">
    <h4>Related pages</h4>
    <p>
        For information on how to identify parameters that you can inject into the query string, see the <a href="/web-security/api-testing#finding-hidden-parameters">Finding hidden
        parameters</a> section.
    </p>
</div><p id="testing-for-server-side-parameter-pollution-in-structured-data-formats-1" chunk-id="03A80C454F0A42CF5E82595DCEB1A842">
    Consider a similar example, but where the client-side user input is in JSON data. When you edit your name, your browser makes the following request:
</p><code class="code-scrollable">POST /myaccount
{"name": "<span class="red">peter</span>"}
</code><p>
    This results in the following server-side request:
</p><code class="code-scrollable">PATCH /users/7312/update
<span class="blue">{"name":"</span><span class="red">peter</span><span class="blue">"}</span>
</code><p>
    You can attempt to add the <code>access_level</code> parameter to the request as follows:
</p><code class="code-scrollable">POST /myaccount
<span class="blue">{"name": "</span><span class="red">peter\",\"access_level\":\"administrator</span><span class="blue">"}</span></code><p>
    If the user input is decoded, then added to the server-side JSON data without adequate encoding, this results in the following server-side request:
</p><code class="code-scrollable">PATCH /users/7312/update
<span class="blue">{"name":"</span><span class="red">peter","access_level":"administrator</span><span class="blue">"}</span></code><p>
    Again, this may result in the user <code>peter</code> being given administrator access.
</p><p>
    Structured format injection can also occur in responses. For example, this can occur if user input is stored securely in a database, then embedded into a JSON response from a back-end API without adequate encoding. You can usually detect and exploit structured format injection in responses in the same way you can in requests.
</p><div class="highlightedarea">
    <h4>Note</h4>
    <p>
        This example below is in JSON, but server-side parameter pollution can occur in any structured data format. For an example in XML, see the
        <a href="/web-security/xxe#xinclude-attacks">XInclude attacks</a> section in the XML external entity (XXE) injection topic.
    </p>
</div><h2 id="testing-with-automated-tools" chunk-id="F7954688CFF1C46DA8624232206EECD5">Testing with automated tools</h2><p>
    Burp includes automated tools that can help you detect server-side parameter pollution vulnerabilities.
</p><p>
    Burp Scanner automatically detects suspicious input transformations when performing an audit. These occur when an application receives user input, transforms it in some way, then performs further processing on the result. This behavior doesn't necessarily constitute a vulnerability, so you'll need to do further testing using the manual techniques outlined above. For more information, see the <a href="https://portswigger.net/kb/issues/00400d00_suspicious-input-transformation-reflected">Suspicious
    input transformation</a> issue definition.
</p><p>
    You can also use the Backslash Powered Scanner BApp to identify server-side injection vulnerabilities. The scanner classifies inputs as boring, interesting, or vulnerable. You'll need to investigate interesting inputs using the manual techniques outlined above. For more information, see the <a href="https://portswigger.net/research/backslash-powered-scanning-hunting-unknown-vulnerability-classes">Backslash
    Powered Scanning: hunting unknown vulnerability classes</a> whitepaper.
</p><h2 id="preventing-server-side-parameter-pollution" chunk-id="8CEEDBD6761F0D2AC90596ABA4087525">Preventing server-side parameter pollution</h2><p>
    To prevent server-side parameter pollution, use an allowlist to define characters that don't need encoding, and make sure all other user input is encoded before it's included in a server-side request. You should also make sure that all input adheres to the expected format and structure.
</p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
