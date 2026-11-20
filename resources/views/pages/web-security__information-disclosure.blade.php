@extends('layouts.academy')

@section('title', 'Information disclosure vulnerabilities | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="25">
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
        <h3>Information disclosure</h3>
        <ul>
            <li><a href="/web-security/information-disclosure#what-is-information-disclosure">What is information disclosure?</a></li>
            <li><a href="/web-security/information-disclosure#examples-of-information-disclosure">Examples</a></li>
            <li><a href="/web-security/information-disclosure#how-do-information-disclosure-vulnerabilities-arise">How do information disclosure vulnerabilities arise?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/information-disclosure#what-is-the-impact-of-information-disclosure-vulnerabilities">Impact</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/information-disclosure#how-to-assess-the-severity-of-information-disclosure-vulnerabilities">Assessing the severity</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/information-disclosure/exploiting#how-to-test-for-information-disclosure-vulnerabilities">Testing for information disclosure</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/information-disclosure/exploiting#fuzzing">Fuzzing</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#using-burp-scanner">Using Burp Scanner</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#using-burp-s-engagement-tools">Using Burp's engagement tools</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#engineering-informative-responses">Engineering informative responses</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/information-disclosure/exploiting#common-sources-of-information-disclosure">Common sources of information disclosure</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/information-disclosure/exploiting#files-for-web-crawlers">Files for web crawlers</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#directory-listings">Directory listings</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#developer-comments">Developer comments</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#error-messages">Error messages</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#debugging-data">Debugging data</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#user-account-pages">User account pages</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#source-code-disclosure-via-backup-files">Backup files</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#information-disclosure-due-to-insecure-configuration">Insecure configuration</a></li>
                    <li><a href="/web-security/information-disclosure/exploiting#version-control-history">Version control history</a></li>
                </ul>
            </li>
            <li><a href="/web-security/information-disclosure#how-to-prevent-information-disclosure-vulnerabilities">Preventing</a></li>
            <li><a href="/web-security/all-labs#information-disclosure">View all information disclosure labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/information-disclosure"><span itemprop="name">Information disclosure</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Information disclosure vulnerabilities</h1><p>
            In this section, we'll explain the basics of information disclosure vulnerabilities and describe how you can find and exploit them. We'll also offer some guidance on how you can prevent information disclosure vulnerabilities in your own websites.
        </p><img alt="Information disclosure infographic" class="center-block" src="/web-security/images/information-disclosure.jpg"><p>
			Learning to find and exploit information disclosure is a vital skill for any tester. You are likely to encounter it on a regular basis and, once you know how to exploit it effectively, it can help you to improve your testing efficiency and enable you to find additional, high-severity bugs.
		</p><div class="highlightedarea">
			<h4>Labs</h4>
			<p>
				If you're already familiar with the basic concepts behind information disclosure vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
			</p>
			
		<ul><li><a href="/web-security/all-labs#information-disclosure">View all information disclosure labs</a></li></ul></div><h2 id="what-is-information-disclosure">What is information disclosure?</h2><p>
            Information disclosure, also known as information leakage, is when a website unintentionally reveals sensitive information to its users. Depending on the context, websites may leak all kinds of information to a potential attacker, including:
        </p><ul>
			<li>
				Data about other users, such as usernames or financial information
			</li>
			<li>
				Sensitive commercial or business data
			</li>
			<li>
				Technical details about the website and its infrastructure
			</li>
		</ul><p>
            The dangers of leaking sensitive user or business data are fairly obvious, but disclosing technical information can sometimes be just as serious. Although some of this information will be of limited use, it can potentially be a starting point for exposing an additional attack surface, which may contain other interesting vulnerabilities. The knowledge that you are able to gather could even provide the missing piece of the puzzle when trying to construct complex, high-severity attacks.
        </p><p>
            Occasionally, sensitive information might be carelessly leaked to users who are simply browsing the website in a normal fashion. More commonly, however, an attacker needs to elicit the information disclosure by interacting with the website in unexpected or malicious ways. They will then carefully study the website's responses to try and identify interesting behavior.
        </p><h3 id="examples-of-information-disclosure">Examples of information disclosure</h3><p>
			Some basic examples of information disclosure are as follows:
		</p><ul>
			<li>
				Revealing the names of hidden directories, their structure, and their contents via a <code>robots.txt</code> file or directory listing			
			</li>
			<li>
				Providing access to source code files via temporary backups  			
			</li>
			<li>
				Explicitly mentioning database table or column names in error messages
			</li>
			<li>
				Unnecessarily exposing highly sensitive information, such as credit card details			
			</li>
			<li>
				Hard-coding API keys, IP addresses, database credentials, and so on in the source code
			</li>
			<li>
				Hinting at the existence or absence of resources, usernames, and so on via subtle differences in application behavior
			</li>
		</ul><p>
			In this topic, you will learn how to find and exploit some of these examples and more.
		</p><div class="highlightedarea">
			<h4>Read more</h4>
			
		<ul><li><a href="/web-security/information-disclosure/exploiting">How to find and exploit information disclosure vulnerabilities</a></li></ul></div><h2 id="how-do-information-disclosure-vulnerabilities-arise">How do information disclosure vulnerabilities arise?</h2><p>
            Information disclosure vulnerabilities can arise in countless different ways, but these can broadly be categorized as follows:
        </p><ul>
			<li>
				<strong>Failure to remove internal content from public content</strong>. For example, developer comments in markup are sometimes visible to users in the production environment.
			</li>
			<li>
				<strong>Insecure configuration of the website and related technologies</strong>. For example, failing to disable debugging and diagnostic features can sometimes provide attackers with useful tools to help them obtain sensitive information. Default configurations can also leave websites vulnerable, for example, by displaying overly verbose error messages.
			</li>
			<li>
				<strong>Flawed design and behavior of the application</strong>. For example, if a website returns distinct responses when different error states occur, this can also allow attackers to <a href="/web-security/authentication/password-based#username-enumeration">enumerate sensitive data</a>, such as valid user credentials.
			</li>
		</ul><h2 id="what-is-the-impact-of-information-disclosure-vulnerabilities">What is the impact of information disclosure vulnerabilities?</h2><p>
            Information disclosure vulnerabilities can have both a direct and indirect impact depending on the purpose of the website and, therefore, what information an attacker is able to obtain. In some cases, the act of disclosing sensitive information alone can have a high impact on the affected parties. For example, an online shop leaking its customers' credit card details is likely to have severe consequences.
        </p><p>
            On the other hand, leaking technical information, such as the directory structure or which third-party frameworks are being used, may have little to no direct impact. However, in the wrong hands, this could be the key information required to construct any number of other exploits. The severity in this case depends on what the attacker is able to do with this information.
        </p><h3 id="how-to-assess-the-severity-of-information-disclosure-vulnerabilities">How to assess the severity of information disclosure vulnerabilities</h3><p>
            Although the ultimate impact can potentially be very severe, it is only in specific circumstances that information disclosure is a high-severity issue on its own. During testing, the disclosure of technical information in particular is often only of interest if you are able to demonstrate how an attacker could do something harmful with it.
        </p><p>
            For example, the knowledge that a website is using a particular framework version is of limited use if that version is fully patched. However, this information becomes significant when the website is using an old version that contains a known vulnerability. In this case, performing a devastating attack could be as simple as applying a publicly documented exploit.
        </p><p>
            It is important to exercise common sense when you find that potentially sensitive information is being leaked. It is likely that minor technical details can be discovered in numerous ways on many of the websites you test. Therefore, your main focus should be on the impact and exploitability of the leaked information, not just the presence of information disclosure as a standalone issue. The obvious exception to this is when the leaked information is so sensitive that it warrants attention in its own right.
        </p><h2 id="exploiting-information-disclosure">Exploiting information disclosure</h2><p>
            We've put together some more practical advice to help you identify and exploit these kinds of vulnerabilities. You can also practice these techniques using our interactive labs.
        </p><div class="highlightedarea">
			<h4>Read more</h4>
			
		<ul><li><a href="/web-security/information-disclosure/exploiting">How to find and exploit information disclosure vulnerabilities</a></li></ul></div><h2 id="how-to-prevent-information-disclosure-vulnerabilities">How to prevent information disclosure vulnerabilities</h2><p>
            Preventing information disclosure completely is tricky due to the huge variety of ways in which it can occur. However, there are some general best practices that you can follow to minimize the risk of these kinds of vulnerability creeping into your own websites.
        </p><ul>
			<li>
				Make sure that everyone involved in producing the website is fully aware of what information is considered sensitive. Sometimes seemingly harmless information can be much more useful to an attacker than people realize. Highlighting these dangers can help make sure that sensitive information is handled more securely in general by your organization.
			</li>
			<li>
				Audit any code for potential information disclosure as part of your QA or build processes. It should be relatively easy to automate some of the associated tasks, such as stripping developer comments.
			</li>
			<li>
				Use generic error messages as much as possible. Don't provide attackers with clues about application behavior unnecessarily.
			</li>
			<li>
				Double-check that any debugging or diagnostic features are disabled in the production environment.
			</li>
			<li>
				Make sure you fully understand the configuration settings, and security implications, of any third-party technology that you implement. Take the time to investigate and disable any features and settings that you don't actually need.
			</li>
		</ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
