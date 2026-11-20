@extends('layouts.academy')

@section('title', 'What is SQL Injection? Tutorial & Examples | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/sql-injection"><span itemprop="name">SQL injection</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">SQL injection</h1><p>
    In this section, we explain:
</p><ul>
    <li>
        What SQL injection (SQLi) is.
    </li>
    <li>
        How to find and exploit different types of SQLi vulnerabilities.
    </li>
    <li>
        How to prevent SQLi.
    </li>
</ul><img alt="SQL injection" src="/web-security/images/sql-injection.svg"><div class="highlightedarea">
    <h4>Labs</h4>
    <p>
        If you're familiar with the basic concepts behind SQLi vulnerabilities and want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access labs in this topic from the link below.
    </p>

    <ul><li><a href="/web-security/all-labs#sql-injection">View all SQL injection labs</a></li></ul></div><h2 id="what-is-sql-injection-sqli" chunk-id="96C7E465B966B722C42F938EEEF2DBFA">What is SQL injection (SQLi)?</h2><div class="container-columns-auto">
    <div>
        <p cms-metadescription="">
            SQL injection (SQLi) is a web security vulnerability that allows an attacker to interfere with the queries that an application makes to its database. This can allow an attacker to view data that they are not normally able to retrieve. This might include data that belongs to other users, or any other data that the application can access. In many cases, an attacker can modify or delete this data, causing persistent changes to the application's content or behavior.
        </p>
        <p>
            In some situations, an attacker can escalate a SQL injection attack to compromise the underlying server or other back-end infrastructure. It can also enable them to perform denial-of-service attacks.
        </p>
    </div>
</div><div class="youtube-wrapper text-center"><iframe src="https://www.youtube.com/embed/wX6tszfgYp4?origin=https://portswigger.net&rel=0" allowfullscreen=""></iframe></div><h2 id="what-is-the-impact-of-a-successful-sql-injection-attack">What is the impact of a successful SQL injection attack?</h2><p>
    A successful SQL injection attack can result in unauthorized access to sensitive data, such as:
</p><ul>
    <li>
        Passwords.
    </li>
    <li>
        Credit card details.
    </li>
    <li>
        Personal user information.
    </li>
</ul><p>
    SQL injection attacks have been used in many high-profile data breaches over the years. These have caused reputational damage and regulatory fines. In some cases, an attacker can obtain a persistent backdoor into an organization's systems, leading to a long-term compromise that can go unnoticed for an extended period.
</p><h2 id="how-to-detect-sql-injection-vulnerabilities" chunk-id="82B0A1E9E3844205177A4CBC9A76994C">How to detect SQL injection vulnerabilities</h2><p>
    You can detect SQL injection manually using a systematic set of tests against every entry point in the application. To do this, you would typically submit:
</p><ul>
    <li>
        The single quote character <code>'</code> and look for errors or other anomalies.
    </li>
    <li>
        Some SQL-specific syntax that evaluates to the base (original) value of the entry point, and to a different value, and look for systematic differences in the application responses.
    </li>
    <li>
        Boolean conditions such as <code>OR 1=1</code> and <code>OR 1=2</code>, and look for differences in the application's responses.
    </li>
    <li>
        Payloads designed to trigger time delays when executed within a SQL query, and look for differences in the time taken to respond.
    </li>
    <li>
        OAST payloads designed to trigger an out-of-band network interaction when executed within a SQL query, and monitor any resulting interactions.
    </li>
</ul><p>
    Alternatively, you can find the majority of SQL injection vulnerabilities quickly and reliably using Burp Scanner.
</p><h2 id="sql-injection-in-different-parts-of-the-query" chunk-id="B83D84BC2F7C8A346C02C8B1E8E6750B">SQL injection in different parts of the query</h2><p>
    Most SQL injection vulnerabilities occur within the <code>WHERE</code> clause of a <code>SELECT</code> query. Most experienced testers are familiar with this type of SQL injection.
</p><p>
    However, SQL injection vulnerabilities can occur at any location within the query, and within different query types. Some other common locations where SQL injection arises are:
</p><ul>
    <li>
        In <code>UPDATE</code> statements, within the updated values or the <code>WHERE</code> clause.
    </li>
    <li>
        In <code>INSERT</code> statements, within the inserted values.
    </li>
    <li>
        In <code>SELECT</code> statements, within the table or column name.
    </li>
    <li>
        In <code>SELECT</code> statements, within the <code>ORDER BY</code> clause.
    </li>
</ul><h2 id="sql-injection-examples">SQL injection examples</h2><p>
    There are lots of SQL injection vulnerabilities, attacks, and techniques, that occur in different situations. Some common SQL injection examples include:
</p><ul>
    <li><a href="/web-security/sql-injection#retrieving-hidden-data">Retrieving hidden data</a>, where you can modify a SQL query to return additional results.</li>
    <li><a href="/web-security/sql-injection#subverting-application-logic">Subverting application logic</a>, where you can change a query to interfere with the application's logic.</li>
    <li><a href="/web-security/sql-injection/union-attacks">UNION attacks</a>, where you can retrieve data from different database tables.</li>
    <li><a href="/web-security/sql-injection/blind">Blind SQL injection</a>, where the results of a query you control are not returned in the application's responses.</li>
</ul><h2 id="retrieving-hidden-data" chunk-id="AC218C86FE25180B642A5EABD7F21A27">Retrieving hidden data</h2><p>
    Imagine a shopping application that displays products in different categories. When the user clicks on the <strong>Gifts</strong> category, their browser requests the URL:
</p><code class="code-scrollable">https://insecure-website.com/products?category=Gifts</code><p>
    This causes the application to make a SQL query to retrieve details of the relevant products from the database:
</p><code class="code-scrollable">SELECT * FROM products WHERE category = 'Gifts' AND released = 1</code><p>
    This SQL query asks the database to return:
</p><ul>
    <li>
        all details (<code>*</code>)
    </li>
    <li>
        from the <code>products</code> table
    </li>
    <li>
        where the <code>category</code> is <code>Gifts</code>
    </li>
    <li>
        and <code>released</code> is <code>1</code>.
    </li>
</ul><p>
    The restriction <code>released = 1</code> is being used to hide products that are not released. We could assume for unreleased products, <code>released = 0</code>.
</p><p id="retrieving-hidden-data-2G4W" chunk-id="9D81D3110BEC9A0F629F3F4C66639757">
    The application doesn't implement any defenses against SQL injection attacks. This means an attacker can construct the following attack, for example:
</p><code class="code-scrollable">https://insecure-website.com/products?category=Gifts'--</code><p>
    This results in the SQL query:
</p><code class="code-scrollable">SELECT * FROM products WHERE category = 'Gifts'--' AND released = 1</code><p>
    Crucially, note that <code>--</code> is a comment indicator in SQL. This means that the rest of the query is interpreted as a comment, effectively removing it. In this example, this means the query no longer includes <code>AND released = 1</code>. As a result, all products are displayed, including those that are not yet released.
</p><p>
    You can use a similar attack to cause the application to display all the products in any category, including categories that they don't know about:
</p><code class="code-scrollable">https://insecure-website.com/products?category=Gifts'+OR+1=1--</code><p>
    This results in the SQL query:
</p><code class="code-scrollable">SELECT * FROM products WHERE category = 'Gifts' OR 1=1--' AND released = 1</code><p>
    The modified query returns all items where either the <code>category</code> is <code>Gifts</code>, or <code>1</code> is equal to <code>1</code>. As <code>1=1</code> is always true, the query returns all items.
</p><div class="highlightedarea">
    <h4>Warning</h4>
    <p>
        Take care when injecting the condition <code>OR 1=1</code> into a SQL query. Even if it appears to be harmless in the context you're injecting into, it's common for applications to use data from a single request in multiple different queries. If your condition reaches an <code>UPDATE</code> or <code>DELETE</code> statement, for example, it can result in an accidental loss of data.
    </p>
</div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'D9A071D8264E85184722707FF5747BBBD77963967D1D01F1B22F5DD8252F9767'])@verbatim<h2 id="subverting-application-logic" chunk-id="C228DC35A0860B89B87728F454CA7E06">Subverting application logic</h2><p>
    Imagine an application that lets users log in with a username and password. If a user submits the username <code>wiener</code> and the password <code>bluecheese</code>, the application checks the credentials by performing the following SQL query:
</p><code class="code-scrollable">SELECT * FROM users WHERE username = 'wiener' AND password = 'bluecheese'</code><p>
    If the query returns the details of a user, then the login is successful. Otherwise, it is rejected.
</p><p>
    In this case, an attacker can log in as any user without the need for a password. They can do this using the SQL comment sequence <code>--</code> to remove the password check from the <code>WHERE</code> clause of the query. For example, submitting the username <code>administrator'--</code> and a blank password results in the following query:
</p><code class="code-scrollable">SELECT * FROM users WHERE username = 'administrator'--' AND password = ''</code><p>
    This query returns the user whose <code>username</code> is <code>administrator</code> and successfully logs the attacker in as that user.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'BEFC0F5DDBC0E32A7ADC4C9D4D286582F462F70BF32A8D5DF15489D679DCD5C9'])@verbatim<h2 id="retrieving-data-from-other-database-tables">Retrieving data from other database tables</h2><p>
    In cases where the application responds with the results of a SQL query, an attacker can use a SQL injection vulnerability to retrieve data from other tables within the database. You can use the <code>UNION</code> keyword to execute an additional <code>SELECT</code> query and append the results to the original query.
</p><p>
    For example, if an application executes the following query containing the user input <code>Gifts</code>:
</p><code class="code-scrollable">SELECT name, description FROM products WHERE category = 'Gifts'</code><p>
    An attacker can submit the input:
</p><code class="code-scrollable">' UNION SELECT username, password FROM users--</code><p>
    This causes the application to return all usernames and passwords along with the names and descriptions of products.
</p><div class="highlightedarea">
    <h4>Read more</h4>

    <ul><li><a href="/web-security/sql-injection/union-attacks">SQL injection UNION attacks</a></li></ul></div><h2 id="blind-sql-injection-vulnerabilities">Blind SQL injection vulnerabilities</h2><p>
    Many instances of SQL injection are blind vulnerabilities. This means that the application does not return the results of the SQL query or the details of any database errors within its responses. Blind vulnerabilities can still be exploited to access unauthorized data, but the techniques involved are generally more complicated and difficult to perform.
</p><p>
    The following techniques can be used to exploit blind SQL injection vulnerabilities, depending on the nature of the vulnerability and the database involved:
</p><ul>
    <li>
        You can change the logic of the query to trigger a detectable difference in the application's response depending on the truth of a single condition. This might involve injecting a new condition into some Boolean logic, or conditionally triggering an error such as a divide-by-zero.
    </li>
    <li>
        You can conditionally trigger a time delay in the processing of the query. This enables you to infer the truth of the condition based on the time that the application takes to respond.
    </li>
    <li>
        You can trigger an out-of-band network interaction, using OAST techniques. This technique is extremely powerful and works in situations where the other techniques do not. Often, you can directly exfiltrate data via the out-of-band channel. For example, you can place the data into a DNS lookup for a domain that you control.
    </li>
</ul><div class="highlightedarea">
    <h4>Read more</h4>
    <ul><li><a href="/web-security/sql-injection/blind">Blind SQL injection</a></li></ul>
</div><h2 id="second-order-sql-injection" chunk-id="23F46C7E0FA437B314E3C4B4858B9620">Second-order SQL injection</h2><p>
    First-order SQL injection occurs when the application processes user input from an HTTP request and incorporates the input into a SQL query in an unsafe way.
</p><p>
    Second-order SQL injection occurs when the application takes user input from an HTTP request and stores it for future use. This is usually done by placing the input into a database, but no vulnerability occurs at the point where the data is stored. Later, when handling a different HTTP request, the application retrieves the stored data and incorporates it into a SQL query in an unsafe way. For this reason, second-order SQL injection is also known as stored SQL injection.
</p><img alt="Second-order SQL injection" src="/web-security/images/second-order-sql-injection.svg"><p>
    Second-order SQL injection often occurs in situations where developers are aware of SQL injection vulnerabilities, and so safely handle the initial placement of the input into the database. When the data is later processed, it is deemed to be safe, since it was previously placed into the database safely. At this point, the data is handled in an unsafe way, because the developer wrongly deems it to be trusted.
</p><h2 id="examining-the-database">Examining the database</h2><p>
    Some core features of the SQL language are implemented in the same way across popular database platforms, and so many ways of detecting and exploiting SQL injection vulnerabilities work identically on different types of database.
</p><p>
    However, there are also many differences between common databases. These mean that some techniques for detecting and exploiting SQL injection work differently on different platforms. For example:
</p><ul>
    <li>
        Syntax for string concatenation.
    </li>
    <li>
        Comments.
    </li>
    <li>
        Batched (or stacked) queries.
    </li>
    <li>
        Platform-specific APIs.
    </li>
    <li>
        Error messages.
    </li>
</ul><div class="highlightedarea">
    <h4>Read more</h4>
    <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>
</div><p>
    After you identify a SQL injection vulnerability, it's often useful to obtain information about the database. This information can help you to exploit the vulnerability.
</p><p>
    You can query the version details for the database. Different methods work for different database types. This means that if you find a particular method that works, you can infer the database type. For example, on Oracle you can execute:
</p><code class="code-scrollable">SELECT * FROM v$version</code><p>
    You can also identify what database tables exist, and the columns they contain. For example, on most databases you can execute the following query to list the tables:
</p><code class="code-scrollable">SELECT * FROM information_schema.tables</code><div class="highlightedarea">
    <h4>Read more</h4>

    <ul><li><a href="/web-security/sql-injection/examining-the-database">Examining the database in SQL injection attacks</a></li><li><a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a></li></ul></div><h2 id="sql-injection-in-different-contexts" chunk-id="44747A1BFC844F0CB134CDD91328D0E5">SQL injection in different contexts</h2><p>
    In the previous labs, you used the query string to inject your malicious SQL payload. However, you can perform SQL injection attacks using any controllable input that is processed as a SQL query by the application. For example, some websites take input in JSON or XML format and use this to query the database.
</p><p>
    These different formats may provide different ways for you to <a href="/web-security/essential-skills/obfuscating-attacks-using-encodings#obfuscation-via-xml-encoding">obfuscate attacks</a> that are otherwise blocked due to WAFs and other defense mechanisms. Weak implementations often look for common SQL injection keywords within the request, so you may be able to bypass these filters by encoding or escaping characters in the prohibited keywords. For example, the following XML-based SQL injection uses an XML escape sequence to encode the <code>S</code> character in <code>SELECT</code>:
</p><code class="code-scrollable">&lt;stockCheck&gt;
    &lt;productId&gt;123&lt;/productId&gt;
    &lt;storeId&gt;999 &amp;#x53;ELECT * FROM information_schema.tables&lt;/storeId&gt;
&lt;/stockCheck&gt;</code><p>
    This will be decoded server-side before being passed to the SQL interpreter.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'C8332AFEEB7ACF103DB621A4D16B7249C26F7040478A07FF274D2F98687B02B6'])@verbatim<h2 id="how-to-prevent-sql-injection" chunk-id="B88B781BA55F2D27C5FCE53A87F6F06D">How to prevent SQL injection</h2><p>
    You can prevent most instances of SQL injection using parameterized queries instead of string concatenation within the query. These parameterized queries are also known as "prepared statements".
</p><p>
    The following code is vulnerable to SQL injection because the user input is concatenated directly into the query:
</p><code class="code-scrollable">String query = &quot;SELECT * FROM products WHERE category = '&quot;+ input + &quot;'&quot;;
Statement statement = connection.createStatement();
ResultSet resultSet = statement.executeQuery(query);</code><p>
    You can rewrite this code in a way that prevents the user input from interfering with the query structure:
</p><code class="code-scrollable">PreparedStatement statement = connection.prepareStatement(&quot;SELECT * FROM products WHERE category = ?&quot;);
statement.setString(1, input);
ResultSet resultSet = statement.executeQuery();</code><p id="how-to-prevent-sql-injection-8J5N" chunk-id="A34309A44CA815FC6346738A98B48A4A">
   You can use parameterized queries for any situation where untrusted input appears as data within the query, including the <code>WHERE</code> clause and values in an <code>INSERT</code> or <code>UPDATE</code> statement. They can't be used to handle untrusted input in other parts of the query, such as table or column names, or the <code>ORDER BY</code> clause. Application functionality that places untrusted data into these parts of the query needs to take a different approach, such as:
    </p><ul>
    <li>
        Whitelisting permitted input values.
    </li>
    <li>
        Using different logic to deliver the required behavior.
    </li>
</ul><p>
    For a parameterized query to be effective in preventing SQL injection, the string that is used in the query must always be a hard-coded constant. It must never contain any variable data from any origin. Do not be tempted to decide case-by-case whether an item of data is trusted, and continue using string concatenation within the query for cases that are considered safe. It's easy to make mistakes about the possible origin of data, or for changes in other code to taint trusted data.
</p><div class="highlightedarea">
    <h4>Read more</h4>

    <ul><li><a href="/web-security/all-labs">Find SQL injection vulnerabilities using Burp Suite's web vulnerability scanner</a></li></ul></div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
