@extends('layouts.academy')

@section('title', 'What is GraphQL? | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/graphql"><span itemprop="name">GraphQL API vulnerabilities</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/graphql/what-is-graphql"><span itemprop="name">What is GraphQL?</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="HEADING_CAPITALIZATION" class="heading-2">
    What is GraphQL?
</h1><p>
    GraphQL is an API query language that is designed to facilitate efficient communication between clients and servers. It enables the user to specify exactly what data they want in the response, helping to avoid the large response objects and multiple calls that can sometimes be seen with REST APIs.
</p><p>
    GraphQL services define a contract through which a client can communicate with a server. The client doesn't need to know where the data resides. Instead, clients send queries to a GraphQL server, which fetches data from the relevant places. As GraphQL is platform-agnostic, it can be implemented with a wide range of programming languages and can be used to communicate with virtually any data store.
</p><div class="highlightedarea">
    <h4>
        Note
    </h4>
    <p>
        This page offers an overview of what GraphQL is and how it works. For specific information on how to test for GraphQL vulnerabilities, see <a href="/web-security/graphql">GraphQL API vulnerabilities</a>.
    </p>
</div><h2 id="how-graphql-works">
    How GraphQL works
</h2><p>
    GraphQL schemas define the structure of the service's data, listing the available objects (known as types), fields, and relationships.
</p><p>
    The data described by a GraphQL schema can be manipulated using three types of operation:
</p><ul>
    <li>
        Queries fetch data.
    </li>
    <li>
        Mutations add, change, or remove data.
    </li>
    <li>
        Subscriptions are similar to queries, but set up a permanent connection by which a server can proactively push data to a client in the specified format.
    </li>
</ul><p>
    All GraphQL operations use the same endpoint, and are generally sent as a POST request. This is significantly different to REST APIs, which use operation-specific endpoints across a range of HTTP methods. With GraphQL, the type and name of the operation define how the query is handled, rather than the endpoint it is sent to or the HTTP method used.
</p><p>
    GraphQL services generally respond to operations with a JSON object in the structure requested.
</p><h2 id="what-is-a-graphql-schema">
    What is a GraphQL schema?
</h2><p>
    In GraphQL, the schema represents a contract between the frontend and backend of the service. It defines the data available as a series of types, using a human-readable schema definition language. These types can then be implemented by a service.
</p><p>
    Most of the types defined are object types, which define the objects available and the fields and arguments they have. Each field has its own type, which can either be another object or a scalar, enum, union, interface, or custom type.
</p><p>
    The example below shows a simple schema definition for a Product type. The <code>!</code> operator indicates that the field is non-nullable when called (that is, mandatory).
</p><code class="code-scrollable">
    #Example schema definition

    type Product {
        id: ID!
        name: String!
        description: String!
        price: Int
    }

</code><p>
    Schemas must also include at least one available query. Usually, they also contain details of available mutations.
</p><h2 id="what-are-graphql-queries">
    What are GraphQL queries?
</h2><p>
    GraphQL queries retrieve data from the data store. They are roughly equivalent to GET requests in a REST API.
</p><p>
    Queries usually have the following key components:
</p><ul>
    <li>
        A <code>query</code> operation type. This is technically optional but encouraged, as it explicitly tells the server that the incoming request is a query.
    </li>
    <li>
        A query name. This can be anything you want. The query name is optional, but encouraged as it can help with debugging.
    </li>
    <li>
        A data structure. This is the data that the query should return.
    </li>
    <li>
        Optionally, one or more arguments. These are used to create queries that return details of a specific object (for example "give me the name and description of the product that has the ID 123").
    </li>
</ul><p>
    The example below shows a query called <code>myGetProductQuery</code> that requests the name, and description fields of a product with the <code>id</code> of <code>123</code>.
</p><code class="code-scrollable">
    #Example query

    query myGetProductQuery {
        getProduct(id: 123) {
            name
            description
        }
    }

</code><p>
    Note that the product type may contain more fields in the schema than those requested here. The ability to request only the data you need is a significant part of the flexibility of GraphQL.
</p><h2 id="what-are-graphql-mutations">
    What are GraphQL mutations?
</h2><p>
    Mutations change data in some way, either adding, deleting, or editing it. They are roughly equivalent to a REST API's POST, PUT, and DELETE methods.
</p><p>
    Like queries, mutations have an operation type, name, and structure for the returned data. However, mutations always take an input of some type. This can be an inline value, but in practice is generally provided as a variable.
</p><p>
    The example below shows a mutation to create a new product and its associated response. In this case, the service is configured to automatically assign an ID to new products, which has been returned as requested.
</p><code class="code-scrollable">
    #Example mutation request

    mutation {
        createProduct(name: "Flamin' Cocktail Glasses", listed: "yes") {
            id
            name
            listed
        }
    }

</code><code class="code-scrollable">
    #Example mutation response

    {
        "data": {
            "createProduct": {
                "id": 123,
                "name": "Flamin' Cocktail Glasses",
                "listed": "yes"
            }
        }
    }

</code><h2 id="components-of-queries-and-mutations">
    Components of queries and mutations
</h2><p>
    The GraphQL syntax includes several common components for queries and mutations.
</p><h3 id="fields">
    Fields
</h3><p>
    All GraphQL types contain items of queryable data called fields. When you send a query or mutation, you specify which of the fields you want the API to return. The response mirrors the content specified in the request.
</p><p>
    The example below shows a query to get ID and name details for all employees, and its associated response. In this case, <code>id</code>, <code>name.firstname</code>, and <code>name.lastname</code> are the fields requested.
</p><code class="code-scrollable">
    #Request

    query myGetEmployeeQuery {
        getEmployees {
            id
            name {
                firstname
                lastname
            }
        }
    }

</code><code class="code-scrollable">
    #Response

    {
        "data": {
            "getEmployees": [
                {
                    "id": 1,
                    "name" {
                        "firstname": "Carlos",
                        "lastname": "Montoya"
                    }
                },
                {
                    "id": 2,
                    "name" {
                        "firstname": "Peter",
                        "lastname": "Wiener"
                    }
                }
            ]
        }
    }

</code><h3 id="arguments">
    Arguments
</h3><p>
    Arguments are values that are provided for specific fields. The arguments that can be accepted for a type are defined in the schema.
</p><p>
    When you send a query or mutation that contains arguments, the GraphQL server determines how to respond based on its configuration. For example, it might return a specific object rather than details of all objects.
</p><p>
    The example below shows a <code>getEmployee</code> request that takes an employee ID as an argument. In this case, the server responds with only the details of the employee who matches that ID.
</p><code class="code-scrollable">
    #Example query with arguments

    query myGetEmployeeQuery {
        getEmployees(id:1) {
            name {
                firstname
                lastname
            }
        }
    }

</code><code class="code-scrollable">
    #Response to query

    {
        "data": {
            "getEmployees": [
            {
                "name" {
                    "firstname": Carlos,
                    "lastname": Montoya
                    }
                }
            ]
        }
    }

</code><div class="highlightedarea">
    <h4>
        Note
    </h4>
    <p>
        If user-supplied arguments are used to access objects directly then a GraphQL API can be vulnerable to access control vulnerabilities such as insecure direct object references (IDOR).
    </p>
</div><h3 id="variables">
    Variables
</h3><p>
    Variables enable you to pass dynamic arguments, rather than having arguments directly within the query itself.
</p><p>
    Variable-based queries use the same structure as queries using inline arguments, but certain aspects of the query are taken from a separate JSON-based variables dictionary. They enable you to reuse a common structure among multiple queries, with only the value of the variable itself changing.
</p><p>
    When building a query or mutation that uses variables, you need to:
</p><ul>
    <li>
        Declare the variable and type.
    </li>
    <li>
        Add the variable name in the appropriate place in the query.
    </li>
    <li>
        Pass the variable key and value from the variable dictionary.
    </li>
</ul><p>
    The example below shows the same query as in the previous example, but with the ID passed as a variable instead of as a direct part of the query string.
</p><code class="code-scrollable">
    #Example query with variable

    query getEmployeeWithVariable($id: ID!) {
        getEmployees(id:$id) {
            name {
                firstname
                lastname
            }
         }
    }

    Variables:
    {
        "id": 1
    }

</code><p>
    In this example, the variable is declared in the first line with (<code>$id: ID!</code>). The <code>!</code> indicates that this is a required field for this query. It is then used as an argument in the second line with (<code>id:$id</code>). Finally, the value of the variable itself is set in the variable JSON dictionary. For information on how to test for these vulnerabilities, see <a href="/web-security/graphql">GraphQL API vulnerabilities</a>.
</p><h3 id="aliases">
    Aliases
</h3><p>GraphQL objects can't contain multiple properties with the same name. For example, the following query is invalid
        because it tries to return the <code>product</code> type twice.</p><code class="code-scrollable">
    #Invalid query

    query getProductDetails {
        getProduct(id: 1) {
            id
            name
        }
        getProduct(id: 2) {
            id
            name
        }
    }

</code><p>
    Aliases enable you to bypass this restriction by explicitly naming the properties you want the API to return. You can use aliases to return multiple instances of the same type of object in one request. This helps to reduce the number of API calls needed.
</p><p>
    In the example below, the query uses aliases to specify a unique name for both products. This query now passes validation, and the details are returned.
</p><code class="code-scrollable">
    #Valid query using aliases

    query getProductDetails {
        product1: getProduct(id: "1") {
            id
            name
        }
        product2: getProduct(id: "2") {
            id
            name
        }
    }

</code><code class="code-scrollable">
    #Response to query

    {
        "data": {
            "product1": {
                "id": 1,
                "name": "Juice Extractor"
             },
            "product2": {
                "id": 2,
                "name": "Fruit Overlays"
            }
        }
    }

</code><div class="highlightedarea">
    <h4>
        Note
    </h4>
    <p>
        Using aliases with mutations effectively enables you to send multiple GraphQL messages in one HTTP request.
    </p>
    <p>
        For more information on how to use this technique to bypass some rate limit controls, see <a href="/web-security/graphql#bypassing-rate-limiting-using-aliases">Bypassing rate limiting using aliases</a>.
    </p>
</div><h3 id="fragments">
    Fragments
</h3><p>
    Fragments are reusable parts of queries or mutations. They contain a subset of the fields belonging to the associated type.
</p><p>
    Once defined, they can be included in queries or mutations. If they are subsequently changed, the change is included in every query or mutation that calls the fragment.
</p><p>
    The example below shows a <code>getProduct</code> query in which the details of the product are contained in a <code>productInfo</code> fragment.
</p><code class="code-scrollable">
    #Example fragment

    fragment productInfo on Product {
        id
        name
        listed
    }

</code><code class="code-scrollable">
    #Query calling the fragment

    query {
        getProduct(id: 1) {
            ...productInfo
            stock
        }
    }

</code><code class="code-scrollable">
    #Response including fragment fields

    {
        "data": {
            "getProduct": {
                "id": 1,
                "name": "Juice Extractor",
                "listed": "no",
                "stock": 5
            }
        }
    }

</code><h2 id="subscriptions">
    Subscriptions
</h2><p>
    Subscriptions are a special type of query. They enable clients to establish a long-lived connection with a server so that the server can then push real-time updates to the client without the need to continually poll for data. They are primarily useful for small changes to large objects and for functionality that requires small real-time updates (like chat systems or collaborative editing).
</p><p>
    As with regular queries and mutations, the subscription request defines the shape of the data to be returned.
</p><p>
    Subscriptions are commonly implemented using WebSockets.
</p><h2 id="introspection">
    Introspection
</h2><p>
    Introspection is a built-in GraphQL function that enables you to query a server for information about the schema. It is commonly used by applications such as GraphQL IDEs and documentation generation tools.
</p><p>Like regular queries, you can specify the fields and structure of the response you want to be returned. For example,
    you might want the response to only contain the names of available mutations.</p><p>Introspection can represent a serious information disclosure risk, as it can be used to access potentially sensitive
    information (such as field descriptions) and help an attacker to learn how they can interact with the API. It is
    best practice for introspection to be disabled in production environments.</p><div class="highlightedarea">
    <h4>Note</h4>
    <p>For more information on how to use GraphQL introspection queries and test for introspection vulnerabilities, see <a href="/web-security/graphql">GraphQL API vulnerabilities</a>.</p>
</div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
