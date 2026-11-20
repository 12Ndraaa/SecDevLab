@extends('layouts.academy')

@section('title', 'Business logic vulnerabilities | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="28">
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
        <h3>Business logic vulnerabilities</h3>
        <ul>
            <li><a href="/web-security/logic-flaws#what-are-business-logic-vulnerabilities">What are business logic vulnerabilities?</a></li>
            <li><a href="/web-security/logic-flaws#how-do-business-logic-vulnerabilities-arise">How do business logic vulnerabilities arise?</a></li>
            <li><a href="/web-security/logic-flaws#what-is-the-impact-of-business-logic-vulnerabilities">Impact</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/logic-flaws/examples">Examples</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/logic-flaws/examples#excessive-trust-in-client-side-controls">Excessive trust in client-side controls</a></li>
                    <li><a href="/web-security/logic-flaws/examples#failing-to-handle-unconventional-input">Failing to handle unconventional input</a></li>
                    <li><a href="/web-security/logic-flaws/examples#making-flawed-assumptions-about-user-behavior">Making flawed assumptions about user behavior</a></li>
                    <li><a href="/web-security/logic-flaws/examples#domain-specific-flaws">Domain-specific flaws</a></li>
                    <li><a href="/web-security/logic-flaws/examples#providing-an-encryption-oracle">Providing an encryption oracle</a></li>
                    <li><a href="/web-security/logic-flaws/examples#email-address-parser-discrepancies">Email address parser discrepancies</a></li>
                </ul>
            </li>
            <li><a href="/web-security/logic-flaws#how-to-prevent-business-logic-vulnerabilities">Preventing</a></li>
            <li><a href="/web-security/all-labs#business-logic-vulnerabilities">View all business logic labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/logic-flaws"><span itemprop="name">Business logic vulnerabilities</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Business logic vulnerabilities</h1><p>
            In this section, we'll introduce the concept of business logic vulnerabilities and explain how they can arise due to flawed assumptions about user behavior. We'll discuss the potential impact of logic flaws and teach you how they can be exploited. You can also practice what you've learned using our interactive labs, which are based on real bugs that we've encountered in the wild. Finally, we'll provide some general best practices to help you prevent these kinds of logic flaws arising in your own applications.
        </p><img alt="Business logic vulnerabilities" class="center-block" src="/web-security/images/logic-flaws.jpg"><div class="highlightedarea">
            <h4>Labs</h4>
            <p>
                If you're already familiar with the basic concepts behind business logic vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
            </p>
            
        <ul><li><a href="/web-security/all-labs#business-logic-vulnerabilities">View all business logic vulnerabilities labs</a></li></ul></div><h2 id="what-are-business-logic-vulnerabilities">What are business logic vulnerabilities?</h2><p>
            Business logic vulnerabilities are flaws in the design and implementation of an application that allow an attacker to elicit unintended behavior. This potentially enables attackers to manipulate legitimate functionality to achieve a malicious goal. These flaws are generally the result of failing to anticipate unusual application states that may occur and, consequently, failing to handle them safely.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                In this context, the term &quot;business logic&quot; simply refers to the set of rules that define how the application operates. As these rules aren't always directly related to a business, the associated vulnerabilities are also known as &quot;application logic vulnerabilities&quot; or simply &quot;logic flaws&quot;.
            </p>
        </div><p>
            Logic flaws are often invisible to people who aren't explicitly looking for them as they typically won't be exposed by normal use of the application. However, an attacker may be able to exploit behavioral quirks by interacting with the application in ways that developers never intended.
        </p><p>
            One of the main purposes of business logic is to enforce the rules and constraints that were defined when designing the application or functionality. Broadly speaking, the business rules dictate how the application should react when a given scenario occurs. This includes preventing users from doing things that will have a negative impact on the business or that simply don't make sense.
        </p><p>
            Flaws in the logic can allow attackers to circumvent these rules. For example, they might be able to complete a transaction without going through the intended purchase workflow. In other cases, broken or non-existent validation of user-supplied data might allow users to make arbitrary changes to transaction-critical values or submit nonsensical input. By passing unexpected values into server-side logic, an attacker can potentially induce the application to do something that it isn't supposed to.
        </p><p>
            Logic-based vulnerabilities can be extremely diverse and are often unique to the application and its specific functionality. Identifying them often requires a certain amount of human knowledge, such as an understanding of the business domain or what goals an attacker might have in a given context. This makes them difficult to detect using automated vulnerability scanners. As a result, logic flaws are a great target for bug bounty hunters and manual testers in general.
        </p><h2 id="how-do-business-logic-vulnerabilities-arise">How do business logic vulnerabilities arise?</h2><p>
            Business logic vulnerabilities often arise because the design and development teams make flawed assumptions about how users will interact with the application. These bad assumptions can lead to inadequate validation of user input. For example, if the developers assume that users will pass data exclusively via a web browser, the application may rely entirely on weak client-side controls to validate input. These are easily bypassed by an attacker using an intercepting proxy.
        </p><p>
            Ultimately, this means that when an attacker deviates from the expected user behavior, the application fails to take appropriate steps to prevent this and, subsequently, fails to handle the situation safely.
        </p><p>
            Logic flaws are particularly common in overly complicated systems that even the development team themselves do not fully understand. To avoid logic flaws, developers need to understand the application as a whole. This includes being aware of how different functions can be combined in unexpected ways. Developers working on large code bases may not have an intimate understanding of how all areas of the application work. Someone working on one component could make flawed assumptions about how another component works and, as a result, inadvertently introduce serious logic flaws. If the developers do not explicitly document any assumptions that are being made, it is easy for these kinds of vulnerabilities to creep into an application.
        </p><h2 id="what-is-the-impact-of-business-logic-vulnerabilities">What is the impact of business logic vulnerabilities?</h2><p>
            The impact of business logic vulnerabilities can, at times, be fairly trivial. It is a broad category and the impact is highly variable. However, any unintended behavior can potentially lead to high-severity attacks if an attacker is able to manipulate the application in the right way. For this reason, quirky logic should ideally be fixed even if you can't work out how to exploit it yourself. There is always a risk that someone else will be able to.
        </p><p>
            Fundamentally, the impact of any logic flaw depends on what functionality it is related to. If the flaw is in the authentication mechanism, for example, this could have a serious impact on your overall security. Attackers could potentially exploit this for privilege escalation, or to bypass authentication entirely, gaining access to sensitive data and functionality. This also exposes an increased attack surface for other exploits.
        </p><p>
            Flawed logic in financial transactions can obviously lead to massive losses for the business through stolen funds, fraud, and so on.
        </p><p>
            You should also note that even though logic flaws may not allow an attacker to benefit directly, they could still allow a malicious party to damage the business in some way.
        </p><h2 id="what-are-some-examples-of-business-logic-vulnerabilities">What are some examples of business logic vulnerabilities?</h2><p>
            The best way to understand business logic vulnerabilities is to look at real-world cases and learn from the mistakes that were made. We've provided concrete examples of a variety of common logic flaws, as well as some deliberately vulnerable websites so that you can practice exploiting these vulnerabilities yourself.
        </p><div class="highlightedarea">
			<h4>Read more</h4>
			
		<ul><li><a href="/web-security/logic-flaws/examples">Examples of business logic vulnerabilities</a></li></ul></div><h2 id="how-to-prevent-business-logic-vulnerabilities">How to prevent business logic vulnerabilities</h2><p>
            In short, the keys to preventing business logic vulnerabilities are to:
        </p><ul>
            <li>Make sure developers and testers understand the domain that the application serves</li>
            <li>Avoid making implicit assumptions about user behavior or the behavior of other parts of the application</li>
        </ul><p>
            You should identify what assumptions you have made about the server-side state and implement the necessary logic to verify that these assumptions are met. This includes making sure that the value of any input is sensible before proceeding.
        </p><p>
            It is also important to make sure that both developers and testers are able to fully understand these assumptions and how the application is supposed to react in different scenarios. This can help the team to spot logic flaws as early as possible. To facilitate this, the development team should adhere to the following best practices wherever possible:
        </p><ul>
			<li>
				Maintain clear design documents and data flows for all transactions and workflows, noting any assumptions that are made at each stage.
			</li>
			<li>
				Write code as clearly as possible. If it's difficult to understand what is supposed to happen, it will be difficult to spot any logic flaws. Ideally, well-written code shouldn't need documentation to understand it. In unavoidably complex cases, producing clear documentation is crucial to ensure that other developers and testers know what assumptions are being made and exactly what the expected behavior is.
			</li>
			<li>
				Note any references to other code that uses each component. Think about any side-effects of these dependencies if a malicious party were to manipulate them in an unusual way.
			</li>
		</ul><p>
            Due to the relatively unique nature of many logic flaws, it is easy to brush them off as a one-time mistake due to human error and move on. However, as we've demonstrated, these flaws are often the result of bad practices in the initial phases of building the application. Analyzing why a logic flaw existed in the first place, and how it was missed by the team, can help you to spot weaknesses in your processes. By making minor adjustments, you can increase the likelihood that similar flaws will be cut off at the source or caught earlier in the development process.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
