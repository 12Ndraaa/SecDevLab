@extends('layouts.academy')

@section('title', 'NoSQL injection | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/nosql-injection"><span itemprop="name">NoSQL injection</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 cms-ignore-validation="HEADING_CAPITALIZATION" class="heading-2">
    NoSQL injection
</h1><p>
    NoSQL injection is a vulnerability where an attacker is able to interfere with the queries that an application makes to a NoSQL database. NoSQL injection may enable an attacker to:
</p><ul>
    <li>Bypass authentication or protection mechanisms.</li>
    <li>Extract or edit data.</li>
    <li>Cause a denial of service.</li>
    <li>Execute code on the server.</li>
</ul><p>
    NoSQL databases store and retrieve data in a format other than traditional SQL relational tables. They use a wide range of query languages instead of a universal standard like SQL, and have fewer relational constraints.
</p><img alt="NoSQL injection example" src="/web-security/nosql-injection/images/nosql-injection-graphic.svg"><div class="highlightedarea">
    <h4>
        More information
    </h4>
    <p>
        For more information about NoSQL databases and how they differ from SQL databases, see <a href="/web-security/nosql-injection/nosql-databases">NoSQL databases</a>.
    </p>
</div><h2 id="types-of-nosql-injection" chunk-id="DD3BBFDDC5ECEA0BD2A8053B1EF2EFED">Types of NoSQL injection</h2><p>
    There are two different types of NoSQL injection:
</p><ul>
    <li>Syntax injection - This occurs when you can break the NoSQL query syntax, enabling you to inject your own
        payload. The methodology is similar to that used in SQL injection. However the nature of the attack varies
        significantly, as NoSQL databases use a range of query languages, types of query syntax, and different data structures.</li>
    <li>Operator injection - This occurs when you can use NoSQL query operators to manipulate queries.</li>
</ul><p>
    In this topic, we'll look at how to test for NoSQL vulnerabilities in general, then focus on exploiting vulnerabilities in MongoDB, which is the most popular NoSQL database. We've also provided some labs so you can practice what you've learned.
</p><h2 id="nosql-syntax-injection" chunk-id="9FEED9AD857CA039D983940143EDB5AB">
    NoSQL syntax injection
</h2><p>
    You can potentially detect NoSQL injection vulnerabilities by attempting to break the query syntax. To do this, systematically test each input by submitting fuzz strings and special characters that trigger a database error or some other detectable behavior if they're not adequately sanitized or filtered by the application.
</p><p>
    If you know the API language of the target database, use special characters and fuzz strings that are relevant to that language. Otherwise, use a variety of fuzz strings to target multiple API languages.
</p><h3 id="detecting-syntax-injection-in-mongodb" chunk-id="5DA4F7CE419559485D8527DD57DF2094">Detecting syntax injection in MongoDB</h3><p>
    Consider a shopping application that displays products in different categories. When the user selects the <strong>Fizzy drinks</strong> category, their browser requests the following URL:
</p><code class="code-scrollable">https://insecure-website.com/product/lookup?category=fizzy</code><p>
    This causes the application to send a JSON query to retrieve relevant products from the <code>product</code> collection in the MongoDB database:
</p><code class="code-scrollable">this.category == 'fizzy'</code><p>
    To test whether the input may be vulnerable, submit a fuzz string in the value of the <code>category</code> parameter. An example string for MongoDB is:
</p><code class="code-scrollable">'"`{
;$Foo}
$Foo \xYZ
</code><p>
    Use this fuzz string to construct the following attack:
</p><code class="code-scrollable">https://insecure-website.com/product/lookup?category='%22%60%7b%0d%0a%3b%24Foo%7d%0d%0a%24Foo%20%5cxYZ%00</code><p>If this causes a change from the original response, this may indicate that user input isn't filtered or sanitized correctly.</p><div class="highlightedarea">
    <h4>Note</h4>
    <p>
        NoSQL injection vulnerabilities can occur in a variety of contexts, and you need to adapt your fuzz strings accordingly. Otherwise, you may simply trigger validation errors that mean the application never executes your query.
    </p>
    <p>
        In this example, we're injecting the fuzz string via the URL, so the string is URL-encoded. In some applications, you may need to inject your payload via a JSON property instead. In this case, this payload would become
        <code>'\"`{\r;$Foo}\n$Foo \\xYZ\u0000</code>.
    </p>
</div><h4 id="determining-which-characters-are-processed" chunk-id="58EBCE8B0F779410280E9948C51A7B44">Determining which characters are processed</h4><p>
    To determine which characters are interpreted as syntax by the application, you can inject individual characters. For example, you could submit <code>'</code>, which results in the following MongoDB query:
</p><code class="code-scrollable">this.category == '''</code><p>
    If this causes a change from the original response, this may indicate that the <code>'</code> character has broken the query syntax and caused a syntax error. You can confirm this by submitting a valid query string in the input, for example by escaping the quote:
</p><code class="code-scrollable">this.category == '\''</code><p>
    If this doesn't cause a syntax error, this may mean that the application is vulnerable to an injection attack.
</p><h4 id="confirming-conditional-behavior" chunk-id="E98AF4D5C9249A308F369DA394EAD9E3">Confirming conditional behavior</h4><p>
    After detecting a vulnerability, the next step is to determine whether you can influence boolean conditions using NoSQL syntax.
</p><p>
    To test this, send two requests, one with a false condition and one with a true condition. For example you could use the conditional statements
    <code>' && 0 && 'x</code> and <code>' && 1 && 'x</code> as follows:
</p><code class="code-scrollable">https://insecure-website.com/product/lookup?category=fizzy'+%26%26+0+%26%26+'x</code><code class="code-scrollable">https://insecure-website.com/product/lookup?category=fizzy'+%26%26+1+%26%26+'x</code><p>
    If the application behaves differently, this suggests that the false condition impacts the query logic, but the true condition doesn't. This indicates that injecting this style of syntax impacts a server-side query.
</p><h4 id="overriding-existing-conditions" chunk-id="86751EEB1BF6B004D628A47DBF1BC082">Overriding existing conditions</h4><p>
    Now that you have identified that you can influence boolean conditions, you can attempt to override existing conditions to exploit the vulnerability. For example, you can inject a JavaScript condition that always evaluates to true, such as
    <code>'||'1'=='1</code>:
</p><code class="code-scrollable">https://insecure-website.com/product/lookup?category=fizzy%27%7c%7c%27%31%27%3d%3d%27%31</code><p>
    This results in the following MongoDB query:
</p><code class="code-scrollable">this.category == 'fizzy'||'1'=='1'</code><p>
    As the injected condition is always true, the modified query returns all items. This enables you to view all the products in any category, including hidden or unknown categories.
</p><div class="highlightedarea">
    <h4>Warning</h4>
    <p>
        Take care when injecting a condition that always evaluates to true into a NoSQL query. Although this may be harmless in the initial context you're injecting into, it's common for applications to use data from a single request in multiple different queries. If an application uses it when updating or deleting data, for example, this can result in accidental data loss.
    </p>
</div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '8878778FC200A649AA733122E9E01376459C5E0B2A67F4AB76EF510E2659D168'])@verbatim<p id="overriding-existing-conditions-K3L9" chunk-id="995A9B59A71FC62A8AC17F409C718FC8">
    You could also add a null character after the category value. MongoDB may ignore all characters after a null character. This means that any additional conditions on the MongoDB query are ignored. For example, the query may have an additional
    <code>this.released</code> restriction:
</p><code class="code-scrollable">this.category == 'fizzy' && this.released == 1</code><p>
    The restriction <code>this.released == 1</code> is used to only show products that are released. For unreleased products, presumably <code>this.released == 0</code>.
</p><p>
    In this case, an attacker could construct an attack as follows:
</p><code class="code-scrollable">https://insecure-website.com/product/lookup?category=fizzy'%00</code><p>
    This results in the following NoSQL query:
</p><code class="code-scrollable">this.category == 'fizzy'\u0000' && this.released == 1</code><p>
    If MongoDB ignores all characters after the null character, this removes the requirement for the released field to be set to 1. As a result, all products in the
    <code>fizzy</code> category are displayed, including unreleased products.
</p><h2 id="nosql-operator-injection" chunk-id="E0D0C0B7BAB3E249ACEC26E038FF644B">NoSQL operator injection</h2><p>
    NoSQL databases often use query operators, which provide ways to specify conditions that data must meet to be included in the query result. Examples of MongoDB query operators include:
</p><ul>
    <li><code>$where</code> - Matches documents that satisfy a JavaScript expression.</li>
    <li><code>$ne</code> - Matches all values that are not equal to a specified value.</li>
    <li><code>$in</code> - Matches all of the values specified in an array.</li>
    <li><code>$regex</code> - Selects documents where values match a specified regular expression.</li>
</ul><p>
    You may be able to inject query operators to manipulate NoSQL queries. To do this, systematically submit different operators into a range of user inputs, then review the responses for error messages or other changes.
</p><h3 id="submitting-query-operators" chunk-id="570941B10F06AF5ADB3593F4BF6B429A">Submitting query operators</h3><p>
    In JSON messages, you can insert query operators as nested objects. For example, <code>{"username":"wiener"}</code> becomes <code>{"username":{"$ne":"invalid"}}</code>.
</p><p>
    For URL-based inputs, you can insert query operators via URL parameters. For example, <code>username=wiener</code> becomes
    <code>username[$ne]=invalid</code>. If this doesn't work, you can try the following:
</p><ol>
    <li>Convert the request method from <code>GET</code> to <code>POST</code>.</li>
    <li>Change the <code>Content-Type</code> header to <code>application/json</code>.</li>
    <li>Add JSON to the message body.</li>
    <li>Inject query operators in the JSON.</li>
</ol><div class="highlightedarea">
    <h4>Note</h4>
    <p>
        You can use the <a href="/bappstore/db57ecbe2cb7446292a94aa6181c9278">Content Type Converter</a> extension to automatically convert the request method and change a URL-encoded <code>POST</code> request to JSON.
    </p>
</div><h3 id="detecting-operator-injection-in-mongodb" chunk-id="A4AB7BEE6D2F62867DC1C14A77DBDD52">Detecting operator injection in MongoDB</h3><p>
    Consider a vulnerable application that accepts a username and password in the body of a <code>POST</code> request:
</p><code class="code-scrollable">{"username":"wiener","password":"peter"}</code><p>
    Test each input with a range of operators. For example, to test whether the username input processes the query operator, you could try the following injection:
</p><code class="code-scrollable">{"username":{"$ne":"invalid"},"password":"peter"}</code><p>
    If the <code>$ne</code> operator is applied, this queries all users where the username is not equal to <code>invalid</code>.
</p><p>
    If both the username and password inputs process the operator, it may be possible to bypass authentication using the following payload:
</p><code class="code-scrollable">{"username":{"$ne":"invalid"},"password":{"$ne":"invalid"}}</code><p>
    This query returns all login credentials where both the username and password are not equal to <code>invalid</code>. As a result, you're logged into the application as the first user in the collection.
</p><p>
    To target an account, you can construct a payload that includes a known username, or a username that you've guessed. For example:
</p><code class="code-scrollable">{"username":{"$in":["admin","administrator","superadmin"]},"password":{"$ne":""}}</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '522964EAB6F4E4217F650C420F52A617E4CC1EC23DB87621F575AFDE879E30E8'])@verbatim<h2 id="exploiting-syntax-injection-to-extract-data" chunk-id="B101BE3BDE9FE5084652294214D69408">Exploiting syntax injection to extract data </h2><p>
    In many NoSQL databases, some query operators or functions can run limited JavaScript code, such as MongoDB's <code>$where</code> operator and <code>mapReduce()</code> function. This means that, if a vulnerable application uses these operators or functions, the database may evaluate the JavaScript as part of the query. You may therefore be able to use JavaScript functions to extract data from the database.
</p><h3 id="exfiltrating-data-in-mongodb" chunk-id="9CA580598C2D67412A83D694424C596E">Exfiltrating data in MongoDB</h3><p>
    Consider a vulnerable application that allows users to look up other registered usernames and displays their role. This triggers a request to the URL:
</p><code class="code-scrollable">https://insecure-website.com/user/lookup?username=admin</code><p>
    This results in the following NoSQL query of the <code>users</code> collection:
</p><code class="code-scrollable">{"$where":"this.username == 'admin'"}</code><p>
    As the query uses the <code>$where</code> operator, you can attempt to inject JavaScript functions into this query so that it returns sensitive data. For example, you could send the following payload:
</p><code class="code-scrollable">admin' && this.password[0] == 'a' || 'a'=='b</code><p>
    This returns the first character of the user's password string, enabling you to extract the password character by character.
</p><p>
    You could also use the JavaScript <code>match()</code> function to extract information. For example, the following payload enables you to identify whether the password contains digits:
</p><code class="code-scrollable">admin' && this.password.match(/\d/) || 'a'=='b</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '4A6884BA4C15A8785848B9E6BD721F6E7086C5DDFA9E3ACCE8D35F44EFFBCA30'])@verbatim<h4 id="identifying-field-names" chunk-id="40A8163ACADC538DDFFB33EE6834E331">Identifying field names</h4><p>
    Because MongoDB handles semi-structured data that doesn't require a fixed schema, you may need to identify valid fields in the collection before you can extract data using JavaScript injection.
</p><p>
    For example, to identify whether the MongoDB database contains a <code>password</code> field, you could submit the following payload:
</p><code class="code-scrollable">https://insecure-website.com/user/lookup?username=admin'+%26%26+this.password!%3d'</code><p>
    Send the payload again for an existing field and for a field that doesn't exist. In this example, you know that the <code>username</code> field exists, so you could send the following payloads:
</p><code class="code-scrollable">admin' && this.username!=' </code><code class="code-scrollable">admin' && this.foo!='</code><p>
    If the <code>password</code> field exists, you'd expect the response to be identical to the response for the existing field (<code>username</code>), but different to the response for the field that doesn't exist (<code>foo</code>).
</p><p id="identifying-field-names-4G0S" chunk-id="1E7712758069021C2CB0D9F162443FB3">
    If you want to test different field names, you could perform a dictionary attack, by using a wordlist to cycle through different potential field names.
</p><div class="highlightedarea">
    <h4>Note</h4>
    <p>
        You can alternatively use NoSQL operator injection to extract field names character by character. This enables you to identify field names without having to guess or perform a dictionary attack. We'll teach you how to do this in the next section.
    </p>
</div><h2 id="exploiting-nosql-operator-injection-to-extract-data" chunk-id="D49BFF942B8AD18E74F3AF0A904A34C3">Exploiting NoSQL operator injection to extract data</h2><p>
    Even if the original query doesn't use any operators that enable you to run arbitrary JavaScript, you may be able to inject one of these operators yourself. You can then use boolean conditions to determine whether the application executes any JavaScript that you inject via this operator.
</p><h3 id="injecting-operators-in-mongodb" chunk-id="C7DDCF20F4CDCF7D243C3632B12D87F6">Injecting operators in MongoDB</h3><p>
    Consider a vulnerable application that accepts username and password in the body of a <code>POST</code> request:
</p><code class="code-scrollable">{"username":"wiener","password":"peter"}</code><p>
    To test whether you can inject operators, you could try adding the <code>$where</code> operator as an additional parameter, then send one request where the condition evaluates to false, and another that evaluates to true. For example:
</p><code class="code-scrollable">{"username":"wiener","password":"peter", "$where":"0"}</code><code class="code-scrollable">{"username":"wiener","password":"peter", "$where":"1"}</code><p>
    If there is a difference between the responses, this may indicate that the JavaScript expression in the <code>$where</code> clause is being evaluated.
</p><h4 id="extracting-field-names" chunk-id="05456CCA578AF9F0F2A1FE1FB6EC74F6">Extracting field names</h4><p>
    If you have injected an operator that enables you to run JavaScript, you may be able to use the <code>keys()</code> method to extract the name of data fields. For example, you could submit the following payload:
</p><code class="code-scrollable">"$where":"Object.keys(this)[0].match('^.{0}a.*')"</code><p>
    This inspects the first data field in the user object and returns the first character of the field name. This enables you to extract the field name character by character.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '41DE2D2E1FE38DE02AF99BD28B3A70858514E70F701486D13B7EAE2D40E4AEAE'])@verbatim<h4 id="exfiltrating-data-using-operators" chunk-id="D5DE16ED186D305CDBA446C4955B5F96">Exfiltrating data using operators</h4><p>
    Alternatively, you may be able to extract data using operators that don't enable you to run JavaScript. For example, you may be able to use the
    <code>$regex</code> operator to extract data character by character.
</p><p>
    Consider a vulnerable application that accepts a username and password in the body of a <code>POST</code> request. For example:
</p><code class="code-scrollable">{"username":"myuser","password":"mypass"}</code><p>
    You could start by testing whether the <code>$regex</code> operator is processed as follows:
</p><code class="code-scrollable">{"username":"admin","password":{"$regex":"^.*"}}</code><p>
    If the response to this request is different to the one you receive when you submit an incorrect password, this indicates that the application may be vulnerable. You can use the <code>$regex</code> operator to extract data character by character. For example, the following payload checks whether the password begins with an
    <code>a</code>:
</p><code class="code-scrollable">{"username":"admin","password":{"$regex":"^a.*"}}</code><h2 id="timing-based-injection" chunk-id="7ACF57C1A6C7143CAE90C6D235481F7B">Timing based injection</h2><p>
    Sometimes triggering a database error doesn't cause a difference in the application's response. In this situation, you may still be able to detect and exploit the vulnerability by using JavaScript injection to trigger a conditional time delay.
</p><p>
    To conduct timing-based NoSQL injection:
</p><ol>
    <li>Load the page several times to determine a baseline loading time.</li>
    <li>Insert a timing based payload into the input. A timing based payload causes an intentional delay in the response when
        executed. For example, <code>{"$where": "sleep(5000)"}</code> causes an intentional delay of 5000 ms on successful injection.</li>
    <li>Identify whether the response loads more slowly. This indicates a successful injection.</li>
</ol><p>
    The following timing based payloads will trigger a time delay if the password beings with the letter <code>a</code>:
</p><code class="code-scrollable">admin'+function(x){var waitTill = new Date(new Date().getTime() + 5000);while((x.password[0]==="a") && waitTill &gt; new Date()){};}(this)+'</code><code class="code-scrollable">admin'+function(x){if(x.password[0]==="a"){sleep(5000)};}(this)+'</code><h2 id="preventing-nosql-injection" chunk-id="02B353C7BB3499AB838C35110F0A4DFC">Preventing NoSQL injection</h2><p>
    The appropriate way to prevent NoSQL injection attacks depends on the specific NoSQL technology in use. As such, we recommend reading the security documentation for your NoSQL database of choice. That said, the following broad guidelines will also help:
</p><ul>
    <li>Sanitize and validate user input, using an allowlist of accepted characters.</li>
    <li>Insert user input using parameterized queries instead of concatenating user input directly into the query.</li>
    <li>To prevent operator injection, apply an allowlist of accepted keys.</li>
</ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
