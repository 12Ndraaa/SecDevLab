@extends('layouts.academy')

@section('title', 'NoSQL databases | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="29">
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
        <h3>NoSQL injection</h3>
        <ul>
            <li><a href="/web-security/nosql-injection">Overview</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/nosql-injection/nosql-databases">NoSQL databases</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/nosql-injection/nosql-databases#nosql-database-models">NoSQL database models</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/nosql-injection#nosql-syntax-injection">NoSQL syntax injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-3">
                        <label for="sub-nav-id-3">
                            <a href="/web-security/nosql-injection#detecting-syntax-injection-in-mongodb">Detecting syntax injection in MongoDB</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/nosql-injection#determining-which-characters-are-processed">Determining which characters are processed</a></li>
                            <li><a href="/web-security/nosql-injection#confirming-conditional-behavior">Confirming conditional behavior</a></li>
                            <li><a href="/web-security/nosql-injection#overriding-existing-conditions">Overriding existing conditions</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/nosql-injection#nosql-operator-injection">NoSQL operator injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/nosql-injection#submitting-query-operators">Submitting query operators</a></li>
                    <li><a href="/web-security/nosql-injection#detecting-operator-injection-in-mongodb">Detecting operator injection in MongoDB</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/nosql-injection#exploiting-syntax-injection-to-extract-data">Exploiting syntax injection to extract data</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-6">
                        <label for="sub-nav-id-6">
                            <a href="/web-security/nosql-injection#exfiltrating-data-in-mongodb">Exfiltrating data in MongoDB</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/nosql-injection#identifying-field-names">Identifying field names</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-7">
                <label for="sub-nav-id-7">
                    <a href="/web-security/nosql-injection#exploiting-nosql-operator-injection-to-extract-data">Exploiting NoSQL operator injection to extract data</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-8">
                        <label for="sub-nav-id-8">
                            <a href="/web-security/nosql-injection#injecting-operators-in-mongodb">Injecting operators in MongoDB</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/nosql-injection#extracting-field-names">Extracting field names</a></li>
                            <li><a href="/web-security/nosql-injection#exfiltrating-data-using-operators">Exfiltrating data using operators</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="/web-security/nosql-injection#timing-based-injection">Timing based injection</a></li>
            <li><a href="/web-security/nosql-injection#preventing-nosql-injection">Preventing NoSQL injection</a></li>
            <li><a href="/web-security/all-labs#nosql-injection">View all NoSQL labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/nosql-injection"><span itemprop="name">NoSQL injection</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/nosql-injection/nosql-databases"><span itemprop="name">NoSQL databases</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="HEADING_CAPITALIZATION" class="heading-2">
    NoSQL databases
</h1><p>
    NoSQL databases store and retrieve data in a format other than traditional SQL relational tables. They are designed to handle large volumes of unstructured or semi-structured data. As such they typically have fewer relational constraints and consistency checks than SQL, and claim significant benefits in terms of scalability, flexibility, and performance.
</p><p>
    Like SQL databases, users interact with data in NoSQL databases using queries that are passed by the application to the database. However, different NoSQL databases use a wide range of query languages instead of a universal standard like SQL (Structured Query Language). This may be a custom query language or a common language like XML or JSON.
</p><h2 id="nosql-database-models">NoSQL database models</h2><p>
    There is a wide variety of NoSQL databases. In order to detect vulnerabilities in a NoSQL database, it helps to understand the model framework and language.
</p><p>
    Some common types of NoSQL databases include:
</p><ul>
    <li>Document stores - These store data in flexible, semi-structured documents. They typically use formats such as
        JSON, BSON, and XML, and are queried in an API or query language. Examples include MongoDB and Couchbase.</li>
    <li>Key-value stores - These store data in a key-value format. Each data field is associated with a unique key string.
        Values are retrieved based on the unique key. Examples include Redis and Amazon DynamoDB.</li>
    <li>Wide-column stores - These organize related data into flexible column families rather than traditional rows. Examples
        include Apache Cassandra and Apache HBase.</li>
    <li>Graph databases - These use nodes to store data entities, and edges to store relationships between entities. Examples
        include Neo4j and Amazon Neptune.</li>
</ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
