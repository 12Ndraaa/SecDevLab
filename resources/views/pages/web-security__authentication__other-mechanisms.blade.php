@extends('layouts.academy')

@section('title', 'Vulnerabilities in other authentication mechanisms | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/authentication"><span itemprop="name">Authentication vulnerabilities</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/authentication/other-mechanisms"><span itemprop="name">Other mechanisms</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2" id="vulnerabilities-in-other-authentication-mechanisms" chunk-id="B32A2F1254BC07AEDAC6C46AD659B3AD">Vulnerabilities in other authentication mechanisms</h1><p>
            In addition to the basic login functionality, most websites provide supplementary functionality to allow users to manage their account. For example, users can typically change their password or reset their password when they forget it. These mechanisms can also introduce vulnerabilities that can be exploited by an attacker.
        </p><p>
            Websites usually take care to avoid well-known vulnerabilities in their login pages. But it is easy to overlook the fact that you need to take similar steps to ensure that related functionality is equally as robust. This is especially important in cases where an attacker is able to create their own account and, consequently, has easy access to study these additional pages.
        </p><h2 id="keeping-users-logged-in" chunk-id="E5913227FE799046CB24A64EBBB5EBD2">Keeping users logged in</h2><p>
            A common feature is the option to stay logged in even after closing a browser session. This is usually a simple checkbox labeled something like &quot;Remember me&quot; or &quot;Keep me logged in&quot;.
        </p><p>
            This functionality is often implemented by generating a &quot;remember me&quot; token of some kind, which is then stored in a persistent cookie. As possessing this cookie effectively allows you to bypass the entire login process, it is best practice for this cookie to be impractical to guess. However, some websites generate this cookie based on a predictable concatenation of static values, such as the username and a timestamp. Some even use the password as part of the cookie. This approach is particularly dangerous if an attacker is able to create their own account because they can study their own cookie and potentially deduce how it is generated. Once they work out the formula, they can try to brute-force other users' cookies to gain access to their accounts.
        </p><p id="keeping-users-logged-in-R6B4" chunk-id="9CDBDB11775CB1B356908BC0E3940CC6">
            Some websites assume that if the cookie is encrypted in some way it will not be guessable even if it does use static values. While this may be true if done correctly, naively &quot;encrypting&quot; the cookie using a simple two-way encoding like Base64 offers no protection whatsoever. Even using proper encryption with a one-way hash function is not completely bulletproof. If the attacker is able to easily identify the hashing algorithm, and no salt is used, they can potentially brute-force the cookie by simply hashing their wordlists. This method can be used to bypass login attempt limits if a similar limit isn't applied to cookie guesses.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '2F93CCBFEE70335F0C3F0CC709C7F5B943C3FACC47E44078DC736744C336D304'])@verbatim<p>
            Even if the attacker is not able to create their own account, they may still be able to exploit this vulnerability. Using the usual techniques, such as XSS, an attacker could steal another user's &quot;remember me&quot; cookie and deduce how the cookie is constructed from that. If the website was built using an open-source framework, the key details of the cookie construction may even be publicly documented.
        </p><p id="keeping-users-logged-in-D0L6" chunk-id="325F53D2F733D0F619337E042F33817E">
            In some rare cases, it may be possible to obtain a user's actual password in cleartext from a cookie, even if it is hashed. Hashed versions of well-known password lists are available online, so if the user's password appears in one of these lists, decrypting the hash can occasionally be as trivial as just pasting the hash into a search engine. This demonstrates the importance of salt in effective encryption.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '151F941FEB521716A2B1005D474BCF3F4AD34DEE8790C892AF3E36C88C22A128'])@verbatim<h2 id="resetting-user-passwords" chunk-id="BEE02756694BE0A30739E198BE821080">Resetting user passwords</h2><p>
            In practice some users will forget their password, so it is common to have a way for them to reset it. As the usual password-based authentication is obviously impossible in this scenario, websites have to rely on alternative methods to make sure that the real user is resetting their own password. For this reason, the password reset functionality is inherently dangerous and needs to be implemented securely.
        </p><p>
            There are a few different ways that this feature is commonly implemented, with varying degrees of vulnerability.
        </p><h3 id="sending-passwords-by-email" chunk-id="634D7B237A341877836C0153D84A1632">Sending passwords by email</h3><p>
            It should go without saying that sending users their current password should never be possible if a website handles passwords securely in the first place. Instead, some websites generate a new password and send this to the user via email.
        </p><p>
            Generally speaking, sending persistent passwords over insecure channels is to be avoided. In this case, the security relies on either the generated password expiring after a very short period, or the user changing their password again immediately. Otherwise, this approach is highly susceptible to man-in-the-middle attacks.
        </p><p>
            Email is also generally not considered secure given that inboxes are both persistent and not really designed for secure storage of confidential information. Many users also automatically sync their inbox between multiple devices across insecure channels.
        </p><h3 id="resetting-passwords-using-a-url" chunk-id="B35A076D3EC20E054EDFEA8E42356E60">Resetting passwords using a URL</h3><p>
            A more robust method of resetting passwords is to send a unique URL to users that takes them to a password reset page. Less secure implementations of this method use a URL with an easily guessable parameter to identify which account is being reset, for example:
        </p><code class="code-scrollable">http://vulnerable-website.com/reset-password?user=victim-user</code><p>
            In this example, an attacker could change the <code>user</code> parameter to refer to any username they have identified. They would then be taken straight to a page where they can potentially set a new password for this arbitrary user.
        </p><p id="resetting-passwords-using-a-url-Y2K0" chunk-id="253EDF391126B5EE3B18384456999FDD">
            A better implementation of this process is to generate a high-entropy, hard-to-guess token and create the reset URL based on that. In the best case scenario, this URL should provide no hints about which user's password is being reset.
        </p><code class="code-scrollable">http://vulnerable-website.com/reset-password?token=a0ba0d1cb3b63d13822572fcff1a241895d893f659164d4cc550b421ebdd48a8</code><p>
            When the user visits this URL, the system should check whether this token exists on the back-end and, if so, which user's password it is supposed to reset. This token should expire after a short period of time and be destroyed immediately after the password has been reset.
        </p><p>
            However, some websites fail to also validate the token again when the reset form is submitted. In this case, an attacker could simply visit the reset form from their own account, delete the token, and leverage this page to reset an arbitrary user's password.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'A2AA25C63138601F68030A53721C7E4E4F97843EE4D4FFF8C485BCE7F03EA087'])@verbatim<p id="resetting-passwords-using-a-url-T3L6" chunk-id="CD35899F05D24FB14ED7495743596CE5">
            If the URL in the reset email is generated dynamically, this may also be vulnerable to password reset poisoning. In this case, an attacker can potentially steal another user's token and use it to change their password.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'EB59E3D1483FF8122D7FDE75E8E54FC95160EC5C56ABDF09F3EF419B02939A4C'])@verbatim<div class="highlightedarea">
            <h4>Read more</h4>
            <p><a href="/web-security/host-header/exploiting/password-reset-poisoning">Password reset poisoning</a></p>
        </div><h2 id="changing-user-passwords" chunk-id="4FC5BCC62B8A6DECF53963B416970271">Changing user passwords</h2><p>
            Typically, changing your password involves entering your current password and then the new password twice. These pages fundamentally rely on the same process for checking that usernames and current passwords match as a normal login page does. Therefore, these pages can be vulnerable to the same techniques.
        </p><p>
            Password change functionality can be particularly dangerous if it allows an attacker to access it directly without being logged in as the victim user. For example, if the username is provided in a hidden field, an attacker might be able to edit this value in the request to target arbitrary users. This can potentially be exploited to enumerate usernames and brute-force passwords.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '11CD0613AF5142781DC61C2957B8A8E46743D73F803B52C4EB6AF5A5A5EB6B0A'])@verbatim
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
