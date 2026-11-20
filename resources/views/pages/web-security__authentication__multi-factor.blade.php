@extends('layouts.academy')

@section('title', 'Vulnerabilities in multi-factor authentication | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/authentication"><span itemprop="name">Authentication vulnerabilities</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/authentication/multi-factor"><span itemprop="name">Multi-factor</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2" id="vulnerabilities-in-multi-factor-authentication" chunk-id="2582BDDA7B17932D2076FD935B388760">Vulnerabilities in multi-factor authentication</h1><p>
            In this section, we'll look at some of the vulnerabilities that can occur in multi-factor authentication mechanisms. We've also provided several interactive labs to demonstrate how you can exploit these vulnerabilities in multi-factor authentication.
        </p><p>
            Many websites rely exclusively on single-factor authentication using a password to authenticate users. However, some require users to prove their identity using multiple authentication factors.
        </p><p id="vulnerabilities-in-multi-factor-authentication-S8B3" chunk-id="30E8C4A4203A5D26B5E24CF4FF4EE17F">
            Verifying biometric factors is impractical for most websites. However, it is increasingly common to see both mandatory and optional two-factor authentication (2FA) based on <strong>something you know</strong> and <strong>something you have</strong>. This usually requires users to enter both a traditional password and a temporary verification code from an out-of-band physical device in their possession.
        </p><p>
            While it is sometimes possible for an attacker to obtain a single knowledge-based factor, such as a password, being able to simultaneously obtain another factor from an out-of-band source is considerably less likely. For this reason, two-factor authentication is demonstrably more secure than single-factor authentication. However, as with any security measure, it is only ever as secure as its implementation. Poorly implemented two-factor authentication can be beaten, or even bypassed entirely, just as single-factor authentication can.
        </p><p>
            It is also worth noting that the full benefits of multi-factor authentication are only achieved by verifying multiple <strong>different</strong> factors. Verifying the same factor in two different ways is not true two-factor authentication. Email-based 2FA is one such example. Although the user has to provide a password and a verification code, accessing the code only relies on them knowing the login credentials for their email account. Therefore, the knowledge authentication factor is simply being verified twice.
        </p><h2 id="two-factor-authentication-tokens" chunk-id="9F4C66AA239DFDA131B028DA9E874962">Two-factor authentication tokens</h2><p>
            Verification codes are usually read by the user from a physical device of some kind. Many high-security websites now provide users with a dedicated device for this purpose, such as the RSA token or keypad device that you might use to access your online banking or work laptop. In addition to being purpose-built for security, these dedicated devices also have the advantage of generating the verification code directly. It is also common for websites to use a dedicated mobile app, such as Google Authenticator, for the same reason.
        </p><p>
            On the other hand, some websites send verification codes to a user's mobile phone as a text message. While this is technically still verifying the factor of &quot;something you have&quot;, it is open to abuse. Firstly, the code is being transmitted via SMS rather than being generated by the device itself. This creates the potential for the code to be intercepted. There is also a risk of SIM swapping, whereby an attacker fraudulently obtains a SIM card with the victim's phone number. The attacker would then receive all SMS messages sent to the victim, including the one containing their verification code.
        </p><h2 id="bypassing-two-factor-authentication" chunk-id="341355F85FB1270A260DA4883394E3A4">Bypassing two-factor authentication</h2><p>
            At times, the implementation of two-factor authentication is flawed to the point where it can be bypassed entirely.
        </p><p>
            If the user is first prompted to enter a password, and then prompted to enter a verification code on a separate page, the user is effectively in a &quot;logged in&quot; state before they have entered the verification code. In this case, it is worth testing to see if you can directly skip to &quot;logged-in only&quot; pages after completing the first authentication step. Occasionally, you will find that a website doesn't actually check whether or not you completed the second step before loading the page.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '55A6F6D2DE02362486D2C507F3191ADB99FB573CD1583E7A69246D62445ED703'])@verbatim<h2 id="flawed-two-factor-verification-logic" chunk-id="EA525F083B62393D0574775DD7ACD542">Flawed two-factor verification logic</h2><p>
            Sometimes flawed logic in two-factor authentication means that after a user has completed the initial login step, the website doesn't adequately verify that the same user is completing the second step.
        </p><p>
            For example, the user logs in with their normal credentials in the first step as follows:
        </p><code class="code-scrollable">POST /login-steps/first HTTP/1.1
Host: vulnerable-website.com
...
username=carlos&amp;password=qwerty</code><p>
            They are then assigned a cookie that relates to their account, before being taken to the second step of the login process:
        </p><code class="code-scrollable">HTTP/1.1 200 OK
Set-Cookie: account=carlos

GET /login-steps/second HTTP/1.1
Cookie: account=carlos</code><p>
            When submitting the verification code, the request uses this cookie to determine which account the user is trying to access:
        </p><code class="code-scrollable">POST /login-steps/second HTTP/1.1
Host: vulnerable-website.com
Cookie: account=carlos
...
verification-code=123456</code><p>
            In this case, an attacker could log in using their own credentials but then change the value of the <code>account</code> cookie to any arbitrary username when submitting the verification code.
        </p><code class="code-scrollable">POST /login-steps/second HTTP/1.1
Host: vulnerable-website.com
Cookie: account=victim-user
...
verification-code=123456</code><p>
            This is extremely dangerous if the attacker is then able to brute-force the verification code as it would allow them to log in to arbitrary users' accounts based entirely on their username. They would never even need to know the user's password.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'CE4838D79961E13680EBEC4EC6B7F31FB30B57FF632815E0712C399F5D054B82'])@verbatim<h2 id="brute-forcing-2fa-verification-codes" chunk-id="D71F9C2E4F4685E2A84CAB42569E2F62">Brute-forcing 2FA verification codes</h2><p>
            As with passwords, websites need to take steps to prevent brute-forcing of the 2FA verification code. This is especially important because the code is often a simple 4 or 6-digit number. Without adequate brute-force protection, cracking such a code is trivial.
        </p><p>
            Some websites attempt to prevent this by automatically logging a user out if they enter a certain number of incorrect verification codes. This is ineffective in practice because an advanced attacker can even automate this multi-step process by <a href="/web-security/all-labs">creating macros</a> for Burp Intruder. The <a href="https://portswigger.net/bappstore/9abaa233088242e8be252cd4ff534988">Turbo Intruder</a> extension can also be used for this purpose.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '28468F8CE00FC3BD7C323D598659C718D294C4AA39E6A5E2B244B48B1116493E'])@verbatim
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
