@extends('layouts.academy')

@section('title', 'Authentication vulnerabilities | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="13">
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
        <h3>Authentication vulnerabilities</h3>
        <ul>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/authentication#what-is-authentication">What is authentication?</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/authentication#what-is-the-difference-between-authentication-and-authorization">Authentication vs authorization</a></li>
                </ul>
            </li>
            <li><a href="/web-security/authentication#how-do-authentication-vulnerabilities-arise">How vulnerabilities arise</a></li>
            <li><a href="/web-security/authentication#what-is-the-impact-of-vulnerable-authentication">Impact of vulnerable authentication</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/authentication/password-based">Vulnerabilities in password-based authentication</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-3">
                        <label for="sub-nav-id-3">
                            <a href="/web-security/authentication/password-based#brute-force-attacks">Brute-force attacks</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/authentication/password-based#brute-forcing-usernames">Brute-forcing usernames</a></li>
                            <li><a href="/web-security/authentication/password-based#brute-forcing-passwords">Brute-forcing passwords</a></li>
                            <li><a href="/web-security/authentication/password-based#username-enumeration">Enumerating usernames</a></li>
                            <li>
                                <input type="checkbox" id="sub-nav-id-4">
                                <label for="sub-nav-id-4">
                                    <a href="/web-security/authentication/password-based#flawed-brute-force-protection">Flaws in brute-force protection</a>
                                    <span class="icon-arrow-head-down"></span>
                                </label>
                                <ul>
                                    <li><a href="/web-security/authentication/password-based#account-locking">Account locking</a></li>
                                    <li><a href="/web-security/authentication/password-based#user-rate-limiting">User rate limiting</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/web-security/authentication/password-based#http-basic-authentication">Exploiting HTTP basic authentication</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/authentication/multi-factor">Vulnerabilities in multi-factor authentication</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/authentication/multi-factor#two-factor-authentication-tokens">Two-factor authentication tokens</a></li>
                    <li><a href="/web-security/authentication/multi-factor#bypassing-two-factor-authentication">Bypassing two-factor authentication</a></li>
                    <li><a href="/web-security/authentication/multi-factor#flawed-two-factor-verification-logic">Bypassing two-factor authentication with flawed verification</a></li>
                    <li><a href="/web-security/authentication/multi-factor#brute-forcing-2fa-verification-codes">Brute-forcing two-factor authentication codes</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-6">
                <label for="sub-nav-id-6">
                    <a href="/web-security/authentication/other-mechanisms">Vulnerabilities in other authentication mechanisms</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/authentication/other-mechanisms#keeping-users-logged-in">Keeping users logged in</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-7">
                        <label for="sub-nav-id-7">
                            <a href="/web-security/authentication/other-mechanisms#resetting-user-passwords">Resetting user passwords</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/authentication/other-mechanisms#sending-passwords-by-email">Sending passwords by email</a></li>
                            <li><a href="/web-security/authentication/other-mechanisms#resetting-passwords-using-a-url">Resetting passwords using a URL</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/authentication/other-mechanisms#changing-user-passwords">Changing user passwords</a></li>
                </ul>
            </li>
            <li><a href="/web-security/authentication#vulnerabilities-in-third-party-authentication-mechanisms">Vulnerabilities in OAuth authentication</a></li>
            <li><a href="/web-security/authentication/securing">Securing your authentication mechanisms</a></li>
            <li><a href="/web-security/all-labs#authentication">View all authentication labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/authentication"><span itemprop="name">Authentication vulnerabilities</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2" id="authentication-vulnerabilities" chunk-id="AA1E3D832BBC0F8014E94436D2B23597">Authentication vulnerabilities</h1><p>
    Conceptually, authentication vulnerabilities are easy to understand. However, they are usually critical because of the clear relationship between authentication and security.
</p><p>
    Authentication vulnerabilities can allow attackers to gain access to sensitive data and functionality. They also expose additional attack surface for further exploits. For this reason, it's important to learn how to identify and exploit authentication vulnerabilities, and how to bypass common protection measures.
</p><p>
    In this section, we explain:
</p><ul>
    <li>
        The most common authentication mechanisms used by websites.
    </li>
    <li>
        Potential vulnerabilities in these mechanisms.
    </li>
    <li>
        Inherent vulnerabilities in different authentication mechanisms.
    </li>
    <li>
        Typical vulnerabilities that are introduced by their improper implementation.
    </li>
    <li>
        How you can make your own authentication mechanisms as robust as possible.
    </li>
</ul><img alt="Authentication vulnerabilities: password reset poisoning" class="center-block" src="/web-security/images/password-reset-poisoning.svg"><h2 id="labs" cms-ignore-validation="DUPLICATE_HEADINGS">Labs</h2><p>
    If you're familiar with the basic concepts behind authentication vulnerabilities and want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access labs in this topic from the link below.
</p><ul>
    <li><a href="/web-security/all-labs#authentication">View all authentication labs</a></li>
</ul><h2 id="what-is-authentication" chunk-id="0559CBF415CAC3B0F04CED3C09A2E896">What is authentication?</h2><p>
    Authentication is the process of verifying the identity of a user or client. Websites are potentially exposed to anyone who is connected to the internet. This makes robust authentication mechanisms integral to effective web security.
</p><p>
    There are three main types of authentication:
</p><ul>
    <li>
        Something you <strong>know</strong>, such as a password or the answer to a security question. These are sometimes called &quot;knowledge factors&quot;.
    </li>
    <li>
        Something you <strong>have</strong>, This is a physical object such as a mobile phone or security token. These are sometimes called &quot;possession factors&quot;.
    </li>
    <li>
        Something you <strong>are</strong> or do. For example, your biometrics or patterns of behavior. These are sometimes called &quot;inherence factors&quot;.
    </li>
</ul><p>
    Authentication mechanisms rely on a range of technologies to verify one or more of these factors.
</p><h3 id="what-is-the-difference-between-authentication-and-authorization" chunk-id="FCA5DF0EB67758A77EDA3490579353CE">What is the difference between authentication and authorization?</h3><p>
    Authentication is the process of verifying that a user is who they claim to be. Authorization involves verifying whether a user is allowed to do something.
</p><p>
    For example, authentication determines whether someone attempting to access a website with the username <code>Carlos123</code> really is the same person who created the account.
</p><p>
    Once <code>Carlos123</code> is authenticated, their permissions determine what they are authorized to do. For example, they may be authorized to access personal information about other users, or perform actions such as deleting another user's account.
</p><h2 id="how-do-authentication-vulnerabilities-arise" chunk-id="43CA82225EA450C5D8CCAE595119D6C3">How do authentication vulnerabilities arise?</h2><p>
    Most vulnerabilities in authentication mechanisms occur in one of two ways:
</p><ul>
    <li>
        The authentication mechanisms are weak because they fail to adequately protect against brute-force attacks.
    </li>
    <li>
        Logic flaws or poor coding in the implementation allow the authentication mechanisms to be bypassed entirely by an attacker. This is sometimes called &quot;broken authentication&quot;.
    </li>
</ul><p>
    In many areas of web development, logic flaws cause the website to behave unexpectedly, which may or may not be a security issue. However, as authentication is so critical to security, it's very likely that flawed authentication logic exposes the website to security issues.
</p><h2 id="what-is-the-impact-of-vulnerable-authentication" chunk-id="C9A37D4B0CB69EEFB9D5F268D2C54866">What is the impact of vulnerable authentication?</h2><p>
    The impact of authentication vulnerabilities can be severe. If an attacker bypasses authentication or brute-forces their way into another user's account, they have access to all the data and functionality that the compromised account has. If they are able to compromise a high-privileged account, such as a system administrator, they could take full control over the entire application and potentially gain access to internal infrastructure.
</p><p id="what-is-the-impact-of-vulnerable-authentication-R2D2" chunk-id="34BAD894F1555779449A0512B6B08AA3">
    Even compromising a low-privileged account might still grant an attacker access to data that they otherwise shouldn't have, such as commercially sensitive business information. Even if the account does not have access to any sensitive data, it might still allow the attacker to access additional pages, which provide a further attack surface. Often, high-severity attacks are not possible from publicly accessible pages, but they may be possible from an internal page.
</p><h2 id="vulnerabilities-in-authentication-mechanisms" chunk-id="4B01ABD886A7F6CCBEF88C3D2C028DEE">Vulnerabilities in authentication mechanisms</h2><p>
    A website's authentication system usually consists of several distinct mechanisms where vulnerabilities may occur. Some vulnerabilities are applicable across all of these contexts. Others are more specific to the functionality provided.
</p><p id="vulnerabilities-in-authentication-mechanisms-4L8Q" chunk-id="6834B423A8D405EA85D20D6827721021">
    We will look more closely at some of the most common vulnerabilities in the following areas:
</p><ul>
    <li>
        <a href="/web-security/authentication/password-based">Vulnerabilities in password-based login</a> <span class="label-light-green-small">LABS</span>
    </li>
    <li>
        <a href="/web-security/authentication/multi-factor">Vulnerabilities in multi-factor authentication</a> <span class="label-light-green-small">LABS</span>
    </li>
    <li>
        <a href="/web-security/authentication/other-mechanisms">Vulnerabilities in other authentication mechanisms</a> <span class="label-light-green-small">LABS</span>
    </li>
</ul><p>
    Several of the labs require you to enumerate usernames and brute-force passwords. To help you with this process, we provide a shortlist of candidate <a href="/web-security/authentication/auth-lab-usernames">usernames</a> and <a href="/web-security/authentication/auth-lab-passwords">passwords</a> that you should use to solve the labs.
</p><h3 id="vulnerabilities-in-third-party-authentication-mechanisms" chunk-id="EFFE3EB03978C9285A620D1A625FC207">Vulnerabilities in third-party authentication mechanisms</h3><p>
    If you love to hack authentication mechanisms and you've completed our main authentication, you may want to try our OAuth authentication labs.
</p><div class="highlightedarea">
    <h4>Read more</h4>
    <p>
        <a href="/web-security/oauth">OAuth authentication</a>
    </p>
</div><h2 id="preventing-attacks-on-your-own-authentication-mechanisms" chunk-id="CB4143F594FCFEF2F0764F6AE50DFB3C">Preventing attacks on your own authentication mechanisms</h2><p>
    We have demonstrated several ways in which websites can be vulnerable due to how they implement authentication. To reduce the risk of such attacks on your own websites, there are several principles that you should always try to follow.
</p><div class="highlightedarea">
    <h4>Read more</h4>
    <ul>
        <li><a href="/web-security/authentication/securing">How to secure your authentication mechanisms</a></li>
    </ul>
</div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
