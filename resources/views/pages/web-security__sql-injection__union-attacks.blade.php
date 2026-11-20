@extends('layouts.academy')

@section('title', 'SQL injection UNION attacks | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="36">
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
        <h3>SQL injection</h3>
        <ul>
            <li><a href="/web-security/sql-injection#what-is-sql-injection-sqli">What is SQL injection?</a></li>
            <li><a href="/web-security/sql-injection#what-is-the-impact-of-a-successful-sql-injection-attack">What is the impact of SQL injection?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/sql-injection#how-to-detect-sql-injection-vulnerabilities">Detecting SQL injection vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/sql-injection#sql-injection-in-different-parts-of-the-query">In different parts of the query</a></li>
                    <li><a href="/web-security/sql-injection#sql-injection-in-different-contexts">In different contexts</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/sql-injection#sql-injection-examples">Examples of SQL injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/sql-injection#retrieving-hidden-data">Retrieving hidden data</a></li>
                    <li><a href="/web-security/sql-injection#subverting-application-logic">Subverting application logic</a></li>
                    <li><a href="/web-security/sql-injection#retrieving-data-from-other-database-tables">Retrieving data from other tables</a></li>
                    <li><a href="/web-security/sql-injection#examining-the-database">Examining the database</a></li>
                    <li><a href="/web-security/sql-injection#blind-sql-injection-vulnerabilities">Blind SQL injection</a></li>
                    <li><a href="/web-security/sql-injection#second-order-sql-injection">Second-order SQL injection</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-7">
                <label for="sub-nav-id-7">
                    <a href="/web-security/sql-injection/examining-the-database">Examining the database</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/sql-injection/examining-the-database#querying-the-database-type-and-version">Querying the type and version</a></li>
                    <li><a href="/web-security/sql-injection/examining-the-database#listing-the-contents-of-the-database">Listing the contents</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-6">
                <label for="sub-nav-id-6">
                    <a href="/web-security/sql-injection/union-attacks">UNION attacks</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/sql-injection/union-attacks#determining-the-number-of-columns-required">Determining the number of columns</a></li>
                    <li><a href="/web-security/sql-injection/union-attacks#finding-columns-with-a-useful-data-type">Finding columns with a useful data type</a></li>
                    <li><a href="/web-security/sql-injection/union-attacks#using-a-sql-injection-union-attack-to-retrieve-interesting-data">Retrieving interesting data</a></li>
                    <li><a href="/web-security/sql-injection/union-attacks#retrieving-multiple-values-within-a-single-column">Retrieving multiple values in a single column</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-8">
                <label for="sub-nav-id-8">
                    <a href="/web-security/sql-injection/blind">Blind SQL injection</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/sql-injection/blind#what-is-blind-sql-injection">What is blind SQL injection?</a></li>
                    <li><a href="/web-security/sql-injection/blind#exploiting-blind-sql-injection-by-triggering-conditional-responses">Triggering conditional responses</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-9">
                        <label for="sub-nav-id-9">
                            <a href="/web-security/sql-injection/blind#error-based-sql-injection">Error-based SQL injection</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/sql-injection/blind#exploiting-blind-sql-injection-by-triggering-conditional-errors">Inferring information using conditional errors</a></li>
                            <li><a href="/web-security/sql-injection/blind#extracting-sensitive-data-via-verbose-sql-error-messages">Extracting data via verbose error messages</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/sql-injection/blind#exploiting-blind-sql-injection-by-triggering-time-delays">Triggering time delays</a></li>
                    <li><a href="/web-security/sql-injection/blind#exploiting-blind-sql-injection-using-out-of-band-oast-techniques">Out-of-band (OAST) techniques</a></li>
                    <li><a href="/web-security/sql-injection/blind#how-to-prevent-blind-sql-injection-attacks">Preventing blind SQL injection</a></li>
                </ul>
            </li>
            <li><a href="/web-security/sql-injection#how-to-prevent-sql-injection">How to prevent SQL injection</a></li>
            <li><a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a></li>
            <li><a href="/web-security/all-labs#sql-injection">View all SQL injection labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/sql-injection"><span itemprop="name">SQL injection</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/sql-injection/union-attacks"><span itemprop="name">UNION attacks</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2" id="sql-injection-union-attacks" chunk-id="A036F5CA9601C621ED2F4196E53B3A98">SQL injection UNION attacks</h1><p>
            When an application is vulnerable to SQL injection, and the results of the query are returned within the application's responses, you can use the <code>UNION</code> keyword to retrieve data from other tables within the database. This is commonly known as a SQL injection UNION attack.
        </p><p>
            The <code>UNION</code> keyword enables you to execute one or more additional <code>SELECT</code> queries and append the results to the original query. For example:
        </p><code class="code-scrollable">SELECT a, b FROM table1 UNION SELECT c, d FROM table2</code><p>
            This SQL query returns a single result set with two columns, containing values from columns <code>a</code> and <code>b</code> in <code>table1</code> and columns <code>c</code> and <code>d</code> in <code>table2</code>.
        </p><p id="sql-injection-union-attacks-1C9I" chunk-id="9ADB49CD2D04E0B2B53AF8B8DA9CAA9C">
            For a <code>UNION</code> query to work, two key requirements must be met:
        </p><ul>
            <li>
                The individual queries must return the same number of columns.
            </li>
            <li>
                The data types in each column must be compatible between the individual queries.
            </li>
        </ul><p>
            To carry out a SQL injection UNION attack, make sure that your attack meets these two requirements. This normally involves finding out:
        </p><ul>
            <li>
                How many columns are being returned from the original query.
            </li>
            <li>
                Which columns returned from the original query are of a suitable data type to hold the results from the injected query.
            </li>
        </ul><h2 id="determining-the-number-of-columns-required" chunk-id="3D64915DC76F7B5964D74ED50F145F86">Determining the number of columns required</h2><p>
            When you perform a SQL injection UNION attack, there are two effective methods to determine how many columns are being returned from the original query.
        </p><p>
            One method involves injecting a series of <code>ORDER BY</code> clauses and incrementing the specified column index until an error occurs. For example, if the injection point is a quoted string within the <code>WHERE</code> clause of the original query, you would submit:
        </p><code class="code-scrollable">' ORDER BY 1--
' ORDER BY 2--
' ORDER BY 3--
etc.</code><p>
            This series of payloads modifies the original query to order the results by different columns in the result set. The column in an <code>ORDER BY</code> clause can be specified by its index, so you don't need to know the names of any columns. When the specified column index exceeds the number of actual columns in the result set, the database returns an error, such as:
        </p><code class="code-scrollable">The ORDER BY position number 3 is out of range of the number of items in the select list.</code><p>
            The application might actually return the database error in its HTTP response, but it may also issue a generic error response. In other cases, it may simply return no results at all. Either way, as long as you can detect some difference in the response, you can infer how many columns are being returned from the query.
        </p><p id="determining-the-number-of-columns-required-6R5T" chunk-id="01B33223D6B50E8C16078824D76E8B7F">
            The second method involves submitting a series of <code>UNION SELECT</code> payloads specifying a different number of null values:
        </p><code class="code-scrollable">' UNION SELECT NULL--
' UNION SELECT NULL,NULL--
' UNION SELECT NULL,NULL,NULL--
etc.</code><p>
            If the number of nulls does not match the number of columns, the database returns an error, such as:
        </p><code class="code-scrollable">All queries combined using a UNION, INTERSECT or EXCEPT operator must have an equal number of expressions in their target lists.</code><p>
            We use <code>NULL</code> as the values returned from the injected <code>SELECT</code> query because the data types in each column must be compatible between the original and the injected queries. <code>NULL</code> is convertible to every common data type, so it maximizes the chance that the payload will succeed when the column count is correct.
        </p><p>
            As with the <code>ORDER BY</code> technique, the application might actually return the database error in its HTTP response, but may return a generic error or simply return no results. When the number of nulls matches the number of columns, the database returns an additional row in the result set, containing null values in each column. The effect on the HTTP response depends on the application's code. If you are lucky, you will see some additional content within the response, such as an extra row on an HTML table. Otherwise, the null values might trigger a different error, such as a <code>NullPointerException</code>. In the worst case, the response might look the same as a response caused by an incorrect number of nulls. This would make this method ineffective.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'C0CF223D86B3189EA471D7A4DFE43987F9306DCD549BE77599964DA1B517B307'])@verbatim<h2 id="database-specific-syntax" chunk-id="F54BA5909029D8A5980395109968E862">Database-specific syntax</h2><p>
            On Oracle, every <code>SELECT</code> query must use the <code>FROM</code> keyword and specify a valid table. There is a built-in table on Oracle called <code>dual</code> which can be used for this purpose. So the injected queries on Oracle would need to look like:
        </p><code class="code-scrollable">' UNION SELECT NULL FROM DUAL--</code><p>
            The payloads described use the double-dash comment sequence <code>--</code> to comment out the remainder of the original query following the injection point. On MySQL, the double-dash sequence must be followed by a space. Alternatively, the hash character <code>#</code> can be used to identify a comment.
        </p><p>
            For more details of database-specific syntax, see the <a chunk-keep-link="" href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>.
        </p><h2 id="finding-columns-with-a-useful-data-type" chunk-id="4631D8CA256487BEB110DAD7B994C872">Finding columns with a useful data type</h2><p>
           A SQL injection UNION attack enables you to retrieve the results from an injected query. The interesting data that you want to retrieve is normally in string form. This means you need to find one or more columns in the original query results whose data type is, or is compatible with, string data.
        </p><p>
            After you determine the number of required columns, you can probe each column to test whether it can hold string data. You can submit a series of <code>UNION SELECT</code> payloads that place a string value into each column in turn. For example, if the query returns four columns, you would submit:
        </p><code class="code-scrollable">' UNION SELECT 'a',NULL,NULL,NULL--
' UNION SELECT NULL,'a',NULL,NULL--
' UNION SELECT NULL,NULL,'a',NULL--
' UNION SELECT NULL,NULL,NULL,'a'--</code><p>
            If the column data type is not compatible with string data, the injected query will cause a database error, such as:
        </p><code class="code-scrollable">Conversion failed when converting the varchar value 'a' to data type int.</code><p>
            If an error does not occur, and the application's response contains some additional content including the injected string value, then the relevant column is suitable for retrieving string data.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'DC3FF4B519F1A96F0BD7507A607CED9CA7F87900EB196D0A9B25001DE1833F5E'])@verbatim<h2 id="using-a-sql-injection-union-attack-to-retrieve-interesting-data" chunk-id="2DEF3DE3DE58207CCF57A3FBD8BE60EF">Using a SQL injection UNION attack to retrieve interesting data</h2><p>
            When you have determined the number of columns returned by the original query and found which columns can hold string data, you are in a position to retrieve interesting data.
        </p><p>
            Suppose that:
        </p><ul>
            <li>
                The original query returns two columns, both of which can hold string data.
            </li>
            <li>
                The injection point is a quoted string within the <code>WHERE</code> clause.
            </li>
            <li>
                The database contains a table called <code>users</code> with the columns <code>username</code> and <code>password</code>.
            </li>
        </ul><p>
            In this example, you can retrieve the contents of the <code>users</code> table by submitting the input:
        </p><code class="code-scrollable">' UNION SELECT username, password FROM users--</code><p>
            In order to perform this attack, you need to know that there is a table called <code>users</code> with two columns called <code>username</code> and <code>password</code>. Without this information, you would have to guess the names of the tables and columns. All modern databases provide ways to examine the database structure, and determine what tables and columns they contain.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'C94C990A42D1B1F39E53806B1D0D1AD51A43E1F2D5EC1A602C144D7817D3E91C'])@verbatim<div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/sql-injection/examining-the-database">Examining the database in SQL injection attacks</a></li></ul></div><h2 id="retrieving-multiple-values-within-a-single-column" chunk-id="E74D93DAB595EE363AE6B91A691A2CCD">Retrieving multiple values within a single column</h2><p>
            In some cases the query in the previous example may only return a single column.
        </p><p>
            You can retrieve multiple values together within this single column by concatenating the values together. You can include a separator to let you distinguish the combined values. For example, on Oracle you could submit the input:
        </p><code class="code-scrollable">' UNION SELECT username || '~' || password FROM users--</code><p>
            This uses the double-pipe sequence <code>||</code> which is a string concatenation operator on Oracle. The injected query concatenates together the values of the <code>username</code> and <code>password</code> fields, separated by the <code>~</code> character.
        </p><p>
            The results from the query contain all the usernames and passwords, for example:
        </p><code class="code-scrollable">...
administrator~s3cure
wiener~peter
carlos~montoya
...</code><p>
            Different databases use different syntax to perform string concatenation. For more details, see the <a chunk-keep-link="" href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '7C96FA50C7C53C9F9C96467A8B9E76F070DAFCF9BFDCC4F04FC786EF0B0819D2'])@verbatim
        
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
