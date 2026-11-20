@extends('layouts.academy')

@section('title', 'Examining the database in SQL injection attacks | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/sql-injection"><span itemprop="name">SQL injection</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/sql-injection/examining-the-database"><span itemprop="name">Examining the database</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2" id="examining-the-database-in-sql-injection-attacks" chunk-id="DB39E260AF9BFFD013FD195950185582">Examining the database in SQL injection attacks</h1><p>
    To exploit SQL injection vulnerabilities, it's often necessary to find information about the database. This includes:
</p><ul>
    <li>
        The type and version of the database software.
    </li>
    <li>
        The tables and columns that the database contains.
    </li>
</ul><h2 id="querying-the-database-type-and-version" chunk-id="3C463716763913CC51F11B0A14438002">Querying the database type and version</h2><p>
    You can potentially identify both the database type and version by injecting provider-specific queries to see if one works
</p><p>
    The following are some queries to determine the database version for some popular database types:
</p><table>
    <tr>
        <td>
            Database type
        </td>
        <td>
            Query
        </td>
    </tr>
    <tr>
        <td>
            Microsoft, MySQL
        </td>
        <td><code>
            SELECT @@version
        </code></td>
    </tr>
    <tr>
        <td>
            Oracle
        </td>
        <td><code>
            SELECT * FROM v$version
        </code></td>
    </tr>
    <tr>
        <td>
            PostgreSQL
        </td>
        <td><code>
            SELECT version()
        </code></td>
    </tr>
</table><p>
    For example, you could use a <code>UNION</code> attack with the following input:
</p><code class="code-scrollable">' UNION SELECT @@version--</code><p>
    This might return the following output. In this case, you can confirm that the database is Microsoft SQL Server and see the version used:
</p><code class="code-scrollable">Microsoft SQL Server 2016 (SP2) (KB4052908) - 13.0.5026.0 (X64)
Mar 18 2018 09:11:49
Copyright (c) Microsoft Corporation
Standard Edition (64-bit) on Windows Server 2016 Standard 10.0 &lt;X64&gt; (Build 14393: ) (Hypervisor)</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '974BD9DF06352F8B59C679F854A5BC7E3DB6C7FB83F72DB653509252A6D47E28'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '13E48D1949ABB8793E11DA34ED06A5811EA3A9B2BE0501A5E9F0DEB255D37406'])@verbatim<h2 id="listing-the-contents-of-the-database" chunk-id="B9609BB9C79F5D752F3084E4C202A2B7">Listing the contents of the database</h2><p>
    Most database types (except Oracle) have a set of views called the information schema. This provides information about the database.
</p><p>
    For example, you can query <code>information_schema.tables</code> to list the tables in the database:
</p><code class="code-scrollable">SELECT * FROM information_schema.tables</code><p>
    This returns output like the following:
</p><code class="code-scrollable">TABLE_CATALOG  TABLE_SCHEMA  TABLE_NAME  TABLE_TYPE
=====================================================
MyDatabase     dbo           Products    BASE TABLE
MyDatabase     dbo           Users       BASE TABLE
MyDatabase     dbo           Feedback    BASE TABLE</code><p>
    This output indicates that there are three tables, called <code>Products</code>, <code>Users</code>, and <code>Feedback</code>.
</p><p>
    You can then query <code>information_schema.columns</code> to list the columns in individual tables:
</p><code class="code-scrollable">SELECT * FROM information_schema.columns WHERE table_name = 'Users'</code><p>
    This returns output like the following:
</p><code class="code-scrollable">TABLE_CATALOG  TABLE_SCHEMA  TABLE_NAME  COLUMN_NAME  DATA_TYPE
=================================================================
MyDatabase     dbo           Users       UserId       int
MyDatabase     dbo           Users       Username     varchar
MyDatabase     dbo           Users       Password     varchar</code><p>
    This output shows the columns in the specified table and the data type of each column.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '81986ADD1FA6EC438867539CC2F562F01DCF9FAF6A0B82766269C3DBEEF30B00'])@verbatim<h3 id="listing-the-contents-of-an-oracle-database">Listing the contents of an Oracle database</h3><p>
    On Oracle, you can find the same information as follows:
</p><ul>
    <li>
        <p>
            You can list tables by querying <code>all_tables</code>:
        </p>
        <p>
            <code class="code-scrollable">SELECT * FROM all_tables</code>
        </p>
    </li>
    <li>
        <p>
            You can list columns by querying <code>all_tab_columns</code>:
        </p>
        <p>
            <code class="code-scrollable">SELECT * FROM all_tab_columns WHERE table_name = 'USERS'</code>
        </p>
    </li>
</ul>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'DE4256D42CC604A2A3F7E792C5FFF88DF1712F1537CD506ED2537EFEDBD4C665'])@verbatim
        
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
