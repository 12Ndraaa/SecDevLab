@extends('layouts.academy')

@section('title', 'GraphQL API vulnerabilities | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="23">
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
        <h3>GraphQL API vulnerabilities</h3>
        <ul>
            <li><a href="/web-security/graphql">Overview</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/graphql/what-is-graphql">What is GraphQL?</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/graphql/what-is-graphql#how-graphql-works">How GraphQL works</a></li>
                    <li><a href="/web-security/graphql/what-is-graphql#what-is-a-graphql-schema">What is a GraphQL schema?</a></li>
                    <li><a href="/web-security/graphql/what-is-graphql#what-are-graphql-queries">What are GraphQL queries?</a></li>
                    <li><a href="/web-security/graphql/what-is-graphql#what-are-graphql-mutations">What are GraphQL mutations?</a></li>
                    <li><a href="/web-security/graphql/what-is-graphql#components-of-queries-and-mutations">Components of queries and mutations</a></li>
                    <li><a href="/web-security/graphql/what-is-graphql#subscriptions">Subscriptions</a></li>
                    <li><a href="/web-security/graphql/what-is-graphql#introspection">Introspection</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/graphql#finding-graphql-endpoints">Finding GraphQL endpoints</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/graphql#universal-queries">Universal queries</a></li>
                    <li><a href="/web-security/graphql#common-endpoint-names">Common endpoint names</a></li>
                    <li><a href="/web-security/graphql#request-methods">Request methods</a></li>
                    <li><a href="/web-security/graphql#initial-testing">Initial testing</a></li>
                </ul>
            </li>
            <li><a href="/web-security/graphql#exploiting-unsanitized-arguments">Exploiting unsanitized arguments</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/graphql#discovering-schema-information">Discovering schema information</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/graphql#using-introspection">Using introspection</a></li>
                    <li><a href="/web-security/graphql#probing-for-introspection">Probing for introspection</a></li>
                    <li><a href="/web-security/graphql#running-a-full-introspection-query">Running a full introspection query</a></li>
                    <li><a href="/web-security/graphql#visualizing-introspection-results">Visualizing introspection results</a></li>
                    <li><a href="/web-security/graphql#suggestions">Suggestions</a></li>
                </ul>
            </li>
            <li><a href="/web-security/graphql#bypassing-graphql-introspection-defenses">Bypassing GraphQL introspection defenses</a></li>
            <li><a href="/web-security/graphql#bypassing-rate-limiting-using-aliases">Bypassing rate limiting using aliases</a></li>
            <li><a href="/web-security/graphql#graphql-csrf">GraphQL CSRF</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/graphql#preventing-graphql-attacks">Preventing GraphQL attacks</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/graphql#preventing-graphql-brute-force-attacks">Preventing GraphQL brute force attacks</a></li>
                    <li><a href="/web-security/graphql#preventing-csrf-over-graphql">Preventing CSRF over GraphQL</a></li>
                </ul>
            </li>
            <li><a href="/web-security/all-labs#graphql-api-vulnerabilities">View all GraphQL labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/graphql"><span itemprop="name">GraphQL API vulnerabilities</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="HEADING_CAPITALIZATION" class="heading-2">
    GraphQL API vulnerabilities
</h1><p>
    GraphQL vulnerabilities generally arise due to implementation and design flaws. For example, the introspection feature may be left active, enabling attackers to query the API in order to glean information about its schema.
</p><p>
    GraphQL attacks usually take the form of malicious requests that can enable an attacker to obtain data or perform unauthorized actions. These attacks can have a severe impact, especially if the user is able to gain admin privileges by manipulating queries or executing a CSRF exploit. Vulnerable GraphQL APIs can also lead to information disclosure issues.
</p><p>
    In this section we'll look at how to test GraphQL APIs. Don't worry if you're not familiar with GraphQL - we'll cover the relevant details as we go. We've also provided some labs so you can practice what you've learned.
</p><img alt="GraphQL example" src="/web-security/graphql/images/graphql-graphic.png"><div class="highlightedarea">
    <h4>
        More information
    </h4>
    <ul>
        <li>
            <p>
                To find out what GraphQL is and how it works, see our <a href="/web-security/graphql/what-is-graphql">What is GraphQL</a> Web Security Academy page.
            </p>
        </li>
        <li>
            <p>
                To learn how to work with GraphQL in Burp Suite, see <a href="/web-security/all-labs">Working with GraphQL</a>.
            </p>
        </li>
    </ul>
</div><h2 id="finding-graphql-endpoints" chunk-id="BF3A96212059704B9282D676E0820997">
    Finding GraphQL endpoints
</h2><p>
    Before you can test a GraphQL API, you first need to find its endpoint. As GraphQL APIs use the same endpoint for all requests, this is a valuable piece of information.
</p><div class="highlightedarea">
    <h4>
        Note
    </h4>
    <p>
        This section explains how to probe for GraphQL endpoints manually. However, Burp Scanner can automatically test for GraphQL endpoints as part of its scans. It raises a "GraphQL endpoint found" issue if any such endpoints are discovered.
    </p>
</div><h3 id="universal-queries" chunk-id="749C106353304A83DD089BD86325054B">
    Universal queries
</h3><p>
    If you send <code>query{__typename}</code> to any GraphQL endpoint, it will include the string <code>{"data": {"__typename": "query"}}</code> somewhere in its response. This is known as a universal query, and is a useful tool in probing whether a URL corresponds to a GraphQL service.
</p><p>
    The query works because every GraphQL endpoint has a reserved field called <code>__typename</code> that returns the queried object's type as a string.
</p><h3 id="common-endpoint-names" chunk-id="6CF730435025FCC5E518F2567B2247DB">
    Common endpoint names
</h3><p>
    GraphQL services often use similar endpoint suffixes. When testing for GraphQL endpoints, you should look to send universal queries to the following locations:
</p><ul>
    <li><code>/graphql</code></li>
    <li><code>/api</code></li>
    <li><code>/api/graphql</code></li>
    <li><code>/graphql/api</code></li>
    <li><code>/graphql/graphql</code></li>
</ul><p id="common-endpoint-names-5L3D" chunk-id="66050A88946E560CA330B28682C801EC">
    If these common endpoints don't return a GraphQL response, you could also try appending <code>/v1</code> to the path.
</p><div class="highlightedarea">
    <h4>
        Note
    </h4>
    <p>
        GraphQL services will often respond to any non-GraphQL request with a "query not present" or similar error. You should bear this in mind when testing for GraphQL endpoints.
    </p>
</div><h3 id="request-methods" chunk-id="89D0A0DA46640846A88EB96B9048FF24">
    Request methods
</h3><p>
    The next step in trying to find GraphQL endpoints is to test using different request methods.
</p><p>
    It is best practice for production GraphQL endpoints to only accept POST requests that have a content-type of <code>application/json</code>, as this helps to protect against CSRF vulnerabilities. However, some endpoints may accept alternative methods, such as GET requests or POST requests that use a content-type of <code>x-www-form-urlencoded</code>.
</p><p>
    If you can't find the GraphQL endpoint by sending POST requests to common endpoints, try resending the universal query using alternative HTTP methods.
</p><h3 id="initial-testing" chunk-id="C6FF6F0167C0204B1C8965A7F5F63DE4">
    Initial testing
</h3><p>
    Once you have discovered the endpoint, you can send some test requests to understand a little more about how it works. If the endpoint is powering a website, try exploring the web interface in Burp's browser and use the HTTP history to examine the queries that are sent.
</p><h2 id="exploiting-unsanitized-arguments" chunk-id="BAC85D2743D6F54DA28982A6A175F44C">
    Exploiting unsanitized arguments
</h2><p>
    At this point, you can start to look for vulnerabilities. Testing query arguments is a good place to start.
</p><p>If the API uses arguments to access objects directly, it may be vulnerable to access control vulnerabilities. A user could potentially access information they should not have simply by supplying an argument that corresponds to that information. This is sometimes known as an insecure direct object reference (IDOR).
</p><div class="highlightedarea">
    <h4>
        More information
    </h4>
    <ul>
        <li>For a general explanation of GraphQL arguments, see <a href="/web-security/graphql/what-is-graphql#arguments">Arguments</a>.</li>
        <li>For further information on IDORs, see <a href="/web-security/access-control/idor">Insecure direct object references (IDOR)</a>.</li>
    </ul>
</div><p id="exploiting-unsanitized-arguments-Q9Q1" chunk-id="40954ED09E42F2B998A542B760766574">
    For example, the query below requests a product list for an online shop:
</p><code class="code-scrollable">
    #Example product query

    query {
        products {
            id
            name
            listed
        }
    }

</code><p>
    The product list returned contains only listed products.
</p><code class="code-scrollable">
    #Example product response

    {
        "data": {
            "products": [
                {
                    "id": 1,
                    "name": "Product 1",
                    "listed": true
                },
                {
                    "id": 2,
                    "name": "Product 2",
                    "listed": true
                },
                {
                    "id": 4,
                    "name": "Product 4",
                    "listed": true
                }
            ]
        }
    }

</code><p>
    From this information, we can infer the following:
</p><ul>
    <li>Products are assigned a sequential ID.</li>
    <li>Product ID 3 is missing from the list, possibly because it has been delisted.</li>
</ul><p>
    By querying the ID of the missing product, we can get its details, even though it is not listed on the shop and was not returned by the original product query.
</p><code class="code-scrollable">
    #Query to get missing product

    query {
        product(id: 3) {
            id
            name
            listed
        }
    }

</code><code class="code-scrollable">
    #Missing product response

    {
        "data": {
            "product": {
            "id": 3,
            "name": "Product 3",
            "listed": no
            }
        }
    }

</code><h2 id="discovering-schema-information" chunk-id="3CC9262F435EC2811CD2D829F9F81DF9">
    Discovering schema information
</h2><p>
    The next step in testing the API is to piece together information about the underlying schema.
</p><p>
    The best way to do this is to use introspection queries. Introspection is a built-in GraphQL function that enables you to query a server for information about the schema.
</p><p>
    Introspection helps you to understand how you can interact with a GraphQL API. It can also disclose potentially sensitive data, such as description fields.
</p><h3 id="using-introspection" chunk-id="D495AD68527BCFDA22C00387F3F128B3">
    Using introspection
</h3><p>
    To use introspection to discover schema information, query the <code>__schema</code> field. This field is available on the root type of all queries.
</p><p>
    Like regular queries, you can specify the fields and structure of the response you want to be returned when running an introspection query. For example, you might want the response to contain only the names of available mutations.
</p><div class="highlightedarea">
    <h4>
        Note
    </h4>
    <p>
        Burp can generate introspection queries for you. For more information, see <a href="/web-security/all-labs">Accessing GraphQL API schemas using introspection</a>.
    </p>
</div><h3 id="probing-for-introspection" chunk-id="F6AF3502351E201B576B0101EE6D29B1">
    Probing for introspection
</h3><p>
    It is best practice for introspection to be disabled in production environments, but this advice is not always followed.
</p><p>
    You can probe for introspection using the following simple query. If introspection is enabled, the response returns the names of all available queries.
</p><code class="code-scrollable">
    #Introspection probe request

    {
        "query": "{__schema{queryType{name}}}"
    }

</code><div class="highlightedarea">
    <h4>
        Note
    </h4>
    <p>
        Burp Scanner can automatically test for introspection during its scans. If it finds that introspection is enabled, it reports a "GraphQL introspection enabled" issue.
    </p>
</div><h3 id="running-a-full-introspection-query" chunk-id="009715701B37443FCD353C17B6D917C9">
    Running a full introspection query
</h3><p>
    The next step is to run a full introspection query against the endpoint so that you can get as much information on the underlying schema as possible.
</p><p>
    The example query below returns full details on all queries, mutations, subscriptions, types, and fragments.
</p><code class="code-scrollable">
    #Full introspection query

    query IntrospectionQuery {
        __schema {
            queryType {
                name
            }
            mutationType {
                name
            }
            subscriptionType {
                name
            }
            types {
             ...FullType
            }
            directives {
                name
                description
                args {
                    ...InputValue
            }
            onOperation  #Often needs to be deleted to run query
            onFragment   #Often needs to be deleted to run query
            onField      #Often needs to be deleted to run query
            }
        }
    }

    fragment FullType on __Type {
        kind
        name
        description
        fields(includeDeprecated: true) {
            name
            description
            args {
                ...InputValue
            }
            type {
                ...TypeRef
            }
            isDeprecated
            deprecationReason
        }
        inputFields {
            ...InputValue
        }
        interfaces {
            ...TypeRef
        }
        enumValues(includeDeprecated: true) {
            name
            description
            isDeprecated
            deprecationReason
        }
        possibleTypes {
            ...TypeRef
        }
    }

    fragment InputValue on __InputValue {
        name
        description
        type {
            ...TypeRef
        }
        defaultValue
    }

    fragment TypeRef on __Type {
        kind
        name
        ofType {
            kind
            name
            ofType {
                kind
                name
                ofType {
                    kind
                    name
                }
            }
        }
    }

</code><div class="highlightedarea">
    <h4>
        Note
    </h4>
    <p>
        If introspection is enabled but the above query doesn't run, try removing the <code>onOperation</code>, <code>onFragment</code>, and <code>onField</code> directives from the query structure. Many endpoints do not accept these directives as part of an introspection query, and you can often have more success with introspection by removing them.
    </p>
</div><h3 id="visualizing-introspection-results" chunk-id="DA1EC8077BA3B0044FF705FA2DFC7665">
    Visualizing introspection results
</h3><p>
    Responses to introspection queries can be full of information, but are often very long and hard to process.
</p><p>
    You can view relationships between schema entities more easily using a <a href="http://nathanrandal.com/graphql-visualizer/">GraphQL visualizer</a>. This is an online tool that takes the results of an introspection query and produces a visual representation of the returned data, including the relationships between operations and types.
</p><h3 id="suggestions" chunk-id="ADFC3550A0AD4B1E604A1A4B86A9EDDC">
    Suggestions
</h3><p>
    Even if introspection is entirely disabled, you can sometimes use suggestions to glean information on an API's structure.
</p><p>Suggestions are a feature of the Apollo GraphQL platform in which the server can suggest query amendments in
    error messages. These are generally used where a query is slightly incorrect but still recognizable (for
    example, <code>There is no entry for 'productInfo'. Did you mean 'productInformation' instead?</code>).</p><p>
    You can potentially glean useful information from this, as the response is effectively giving away valid parts of the schema.
</p><p id="suggestions-A4W2" chunk-id="07A1D7516D0DF17761FB18CC429F75F5">
    <a href="https://github.com/nikitastupin/clairvoyance">Clairvoyance</a> is a tool that uses suggestions to automatically recover all or part of a GraphQL schema, even when introspection is disabled. This makes it significantly less time consuming to piece together information from suggestion responses.
</p><p>
    In Apollo Server v4 and above, you can disable suggestions using the <code>hideSchemaDetailsFromClientErrors</code> option. For earlier versions, see <a href="https://github.com/apollographql/apollo-server/issues/3919#issuecomment-836503305">this GitHub thread</a> for a workaround.
</p><div class="highlightedarea">
    <h4>
        Note
    </h4>
    <p>
        Burp Scanner can automatically test for suggestions as part of its scans. If active suggestions are found, Burp Scanner reports a "GraphQL suggestions enabled" issue.
    </p>
</div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '417528E487706565F7A124CB5AA164335F05B77861A2C4875A5165D750DE9D3D'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'CCDA6760929EBECCAB51242F59B1573DD478087800B63C88FC8AA308DB137802'])@verbatim<h2 id="bypassing-graphql-introspection-defenses" chunk-id="846050A85548A049508458855D3DB525">
    Bypassing GraphQL introspection defenses
</h2><p>
    If you cannot get introspection queries to run for the API you are testing, try inserting a special character after the <code>__schema</code> keyword.
</p><p>
    When developers disable introspection, they could use a regex to exclude the <code>__schema</code> keyword in queries. You should try characters like spaces, new lines and commas, as they are ignored by GraphQL but not by flawed regex.
</p><p>
    As such, if the developer has only excluded <code>__schema{</code>, then the below introspection query would not be excluded.
</p><code class="code-scrollable">
    #Introspection query with newline

    {
        "query": "query{__schema
        {queryType{name}}}"
    }

</code><p>
    If this doesn't work, try running the probe over an alternative request method, as introspection may only be disabled over POST. Try a GET request, or a POST request with a content-type of <code>x-www-form-urlencoded</code>.
</p><p id="bypassing-graphql-introspection-defenses-L5A1" chunk-id="78A69CD97DE03BE9C83588D6FCA1F159">
    The example below shows an introspection probe sent via GET, with URL-encoded parameters.
</p><code class="code-scrollable">
    # Introspection probe as GET request

    GET /graphql?query=query%7B__schema%0A%7BqueryType%7Bname%7D%7D%7D

</code><div class="highlightedarea">
    <h4>
        Note
    </h4>
    <p>
        You can save GraphQL queries to the site map. For more information, see <a href="/web-security/all-labs">Working with GraphQL</a>.
    </p>
</div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '3A73E7AA263F5E0DB7AC8A1C6CD9EC592206484CEE2AC6FDE2DC304CB2D13129'])@verbatim<h2 id="bypassing-rate-limiting-using-aliases" chunk-id="E8C9D442544E2AC7FFF5148DF9FBFD08">
    Bypassing rate limiting using aliases
</h2><p>
    Ordinarily, GraphQL objects can't contain multiple properties with the same name. Aliases enable you to bypass this restriction by explicitly naming the properties you want the API to return. You can use aliases to return multiple instances of the same type of object in one request.
</p><div class="highlightedarea">
    <h4>
        More information
    </h4>
    <p>
        For more information on GraphQL aliases, see <a href="/web-security/graphql/what-is-graphql#aliases">Aliases</a>.
    </p>
</div><p>
    While aliases are intended to limit the number of API calls you need to make, they can also be used to brute force a GraphQL endpoint.
</p><p>
    Many endpoints will have some sort of rate limiter in place to prevent brute force attacks. Some rate limiters work based on the number of HTTP requests received rather than the number of operations performed on the endpoint. Because aliases effectively enable you to send multiple queries in a single HTTP message, they can bypass this restriction.
</p><p id="bypassing-rate-limiting-using-aliases-P4G7" chunk-id="9A4E446ADBA382CA10844C8F2C3ABC87">
    The simplified example below shows a series of aliased queries checking whether store discount codes are valid. This operation could potentially bypass rate limiting as it is a single HTTP request, even though it could potentially be used to check a vast number of discount codes at once.
</p><code class="code-scrollable">
    #Request with aliased queries

    query isValidDiscount($code: Int) {
        isValidDiscount(code:$code){
            valid
        }
        isValidDiscount2:isValidDiscount(code:$code){
            valid
        }
        isValidDiscount3:isValidDiscount(code:$code){
            valid
        }
    }

</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '1FF12F295E639070B0200DE527E0D58CD54FFE26907088691BE7155D78305DC9'])@verbatim<h2 id="graphql-csrf" chunk-id="868F177B8A6BA31EF49510C5FD2AD325">
    GraphQL CSRF
</h2><p no-keyword-injection="">
    Cross-site request forgery (CSRF) vulnerabilities enable an attacker to induce users to perform actions that they do not intend to perform. This is done by creating a malicious website that forges a cross-domain request to the vulnerable application.
</p><div class="highlightedarea">
    <h4>
        More information
    </h4>
    <p>
        For more information on CSRF vulnerabilities in general, see the <a href="/web-security/csrf">CSRF academy topic</a>.
    </p>
</div><p>
    GraphQL can be used as a vector for CSRF attacks, whereby an attacker creates an exploit that causes a victim's browser to send a malicious query as the victim user.
</p><h3 id="how-do-csrf-over-graphql-vulnerabilities-arise" chunk-id="E47888CCA3D5929F0787E322DD54E007">
    How do CSRF over GraphQL vulnerabilities arise?
</h3><p>
    CSRF vulnerabilities can arise where a GraphQL endpoint does not validate the content type of the requests sent to it and no CSRF tokens are implemented.
</p><p>
    POST requests that use a content type of <code>application/json</code> are secure against forgery as long as the content type is validated. In this case, an attacker wouldn't be able to make the victim's browser send this request even if the victim were to visit a malicious site.
</p><p>
    However, alternative methods such as GET, or any request that has a content type of <code>x-www-form-urlencoded</code>, can be sent by a browser and so may leave users vulnerable to attack if the endpoint accepts these requests. Where this is the case, attackers may be able to craft exploits to send malicious requests to the API.
</p><div class="highlightedarea">
    <p>
        The steps to construct a CSRF attack and deliver an exploit are the same for GraphQL-based CSRF vulnerabilities as they are for "regular" CSRF vulnerabilities. For more information on this process, see <a href="/web-security/csrf#how-to-construct-a-csrf-attack">How to construct a CSRF attack</a>.
    </p>
</div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'EE2C12983456A4312F8435C1FFB0292D55C10E35DD899DE6FB8BB3560257EF75'])@verbatim<h2 id="preventing-graphql-attacks" chunk-id="C82E39D2B3699B16747CFCD55D114588">Preventing GraphQL attacks</h2><p>
    To prevent many common GraphQL attacks, take the following steps when you deploy your API to production:
</p><ul>
    <li>
        <p>If your API is not intended for use by the general public, disable introspection on it. This makes it harder for an attacker to gain information about how the API works, and reduces the risk of unwanted information disclosure.</p>
        <p>For information on how to disable introspection in the Apollo GraphQL platform, see <a href="https://www.apollographql.com/blog/graphql/security/why-you-should-disable-graphql-introspection-in-production/#turning-off-introspection-in-production">this blog post</a>.</p>
    </li>
    <li>
        <p>If your API is intended for use by the general public then you will likely need to leave introspection enabled. However, you should review the API's schema to make sure  that it does not expose unintended fields to the public.</p>
    </li>
    <li>
        <p>Make sure that suggestions are disabled. This prevents attackers from being able to use Clairvoyance or similar tools to glean information about the underlying schema.</p>
        <p>In Apollo Server v4 and above, you can disable suggestions using the <code>hideSchemaDetailsFromClientErrors</code> option. For earlier versions, see <a href="https://github.com/apollographql/apollo-server/issues/3919#issuecomment-836503305">this GitHub thread</a> for a workaround.</p>
    </li>
    <li>
        <p>Make sure that your API's schema does not expose any private user fields, such as email addresses or user IDs.</p>
    </li>
</ul><h3 id="preventing-graphql-brute-force-attacks" chunk-id="7E55CA71D4274DB67D0A10367EEA9090">Preventing GraphQL brute force attacks</h3><p>
    It is sometimes possible to bypass standard rate limiting when using GraphQL APIs. For an example of this, see the <a href="/web-security/graphql#bypassing-rate-limiting-using-aliases">Bypassing rate limiting using aliases</a> section.
</p><p>
    With this in mind, there are design steps that you can take to defend your API against brute force attacks. This generally involves restricting the complexity of queries accepted by the API, and reducing the opportunity for attackers to execute denial-of-service (DoS) attacks.
</p><p>
    To defend against brute force attacks:
</p><ul>
    <li>
        <p>Limit the query depth of your API's queries. The term "query depth" refers to the number of levels of nesting within a query. Heavily-nested queries can have significant performance implications, and can potentially provide an opportunity for DoS attacks if they are accepted. By limiting the query depth your API accepts, you can reduce the chances of this happening.</p>
    </li>
    <li>
        <p>Configure operation limits. Operation limits enable you to configure the maximum number of unique fields, aliases, and root fields that your API can accept.</p>
    </li>
    <li>
        <p>Configure the maximum amount of bytes a query can contain.</p>
    </li>
    <li>
        <p>Consider implementing cost analysis on your API. Cost analysis is a process whereby a library application identifies the resource cost associated with running queries as they are received. If a query would be too computationally complex to run, the API drops it.</p>
    </li>
</ul><div class="highlightedarea">
    <h4>More information</h4>
    <p>
        For information on how to implement these features in Apollo, see <a href="https://www.apollographql.com/blog/graphql/security/securing-your-graphql-api-from-malicious-queries/">this blog post</a>.
    </p>
</div><h3 id="preventing-csrf-over-graphql" chunk-id="D42D5AAC0D8C046D14F5565940B54F08">Preventing CSRF over GraphQL</h3><p>
    To defend against GraphQL CSRF vulnerabilities specifically, make sure of the following when designing your API:
</p><ul>
    <li>
        <p>Your API only accepts queries over JSON-encoded POST.</p>
    </li>
    <li>
        <p>The API validates that content provided matches the supplied content type.</p>
    </li>
    <li>
        <p>The API has a secure CSRF token mechanism.</p>
    </li>
</ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
