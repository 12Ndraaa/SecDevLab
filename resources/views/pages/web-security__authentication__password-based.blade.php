@extends('layouts.academy')

@section('title', 'Vulnerabilities in password-based login | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/authentication"><span itemprop="name">Authentication vulnerabilities</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/authentication/password-based"><span itemprop="name">Password-based</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2" id="vulnerabilities-in-password-based-login" chunk-id="6EB3E41A5F13125DDCB80D482C23FDB7">Vulnerabilities in password-based login</h1><p>
    For websites that adopt a password-based login process, users either register for an account themselves or they are assigned an account by an administrator. This account is associated with a unique username and a secret password, which the user enters in a login form to authenticate themselves.
</p><p>
    In this scenario, the fact that they know the secret password is taken as sufficient proof of the user's identity. This means that the security of the website is compromised if an attacker is able to either obtain or guess the login credentials of another user.
</p><p>
    This can be achieved in a number of ways. The following sections show how an attacker can use brute-force attacks, and some of the flaws in brute-force protection. You'll also learn about the vulnerabilities in HTTP basic authentication.
</p><h2 id="brute-force-attacks" chunk-id="30090EAFB91FAAF16D27DB5371ECFCB7">Brute-force attacks</h2><p>
    A brute-force attack is when an attacker uses a system of trial and error to guess valid user credentials. These attacks are typically automated using wordlists of usernames and passwords. Automating this process, especially using dedicated tools, potentially enables an attacker to make vast numbers of login attempts at high speed.
</p><p>
    Brute-forcing is not always just a case of making completely random guesses at usernames and passwords. By also using basic logic or publicly available knowledge, attackers can fine-tune brute-force attacks to make much more educated guesses. This considerably increases the efficiency of such attacks. Websites that rely on password-based login as their sole method of authenticating users can be highly vulnerable if they do not implement sufficient brute-force protection.
</p><h3 id="brute-forcing-usernames" chunk-id="61A136074F2C4AAF011C3D3269D397D0">Brute-forcing usernames</h3><p>
    Usernames are especially easy to guess if they conform to a recognizable pattern, such as an email address. For example, it is very common to see business logins in the format <code>firstname.lastname@somecompany.com</code>. However, even if there is no obvious pattern, sometimes even high-privileged accounts are created using predictable usernames, such as <code>admin</code> or <code>administrator</code>.
</p><p>
    During auditing, check whether the website discloses potential usernames publicly. For example, are you able to access user profiles without logging in? Even if the actual content of the profiles is hidden, the name used in the profile is sometimes the same as the login username. You should also check HTTP responses to see if any email addresses are disclosed. Occasionally, responses contain email addresses of high-privileged users, such as administrators or IT support.
</p><h3 id="brute-forcing-passwords" chunk-id="90BCED01F027083AB368B8E27A5DF702">Brute-forcing passwords</h3><p>
    Passwords can similarly be brute-forced, with the difficulty varying based on the strength of the password. Many websites adopt some form of password policy, which forces users to create high-entropy passwords that are, theoretically at least, harder to crack using brute-force alone. This typically involves enforcing passwords with:
</p><ul>
    <li>A minimum number of characters</li>
    <li>A mixture of lower and uppercase letters</li>
    <li>At least one special character</li>
</ul><p id="brute-forcing-passwords-S8Q6" chunk-id="C16003B03BE33038EDF212DED0574515">
    However, while high-entropy passwords are difficult for computers alone to crack, we can use a basic knowledge of human behavior to exploit the vulnerabilities that users unwittingly introduce to this system. Rather than creating a strong password with a random combination of characters, users often take a password that they can remember and try to crowbar it into fitting the password policy. For example, if <code>mypassword</code> is not allowed, users may try something like <code>Mypassword1!</code> or <code>Myp4$$w0rd</code> instead.
</p><p>
    In cases where the policy requires users to change their passwords on a regular basis, it is also common for users to just make minor, predictable changes to their preferred password. For example, <code>Mypassword1!</code> becomes <code>Mypassword1?</code> or <code>Mypassword2!.</code>
</p><p>
    This knowledge of likely credentials and predictable patterns means that brute-force attacks can often be much more sophisticated, and therefore effective, than simply iterating through every possible combination of characters.
</p><h3 id="username-enumeration" chunk-id="8370E0EC76B027B30C7F6B9F803E5005">Username enumeration</h3><p>
    Username enumeration is when an attacker is able to observe changes in the website's behavior in order to identify whether a given username is valid.
</p><p>
    Username enumeration typically occurs either on the login page, for example, when you enter a valid username but an incorrect password, or on registration forms when you enter a username that is already taken. This greatly reduces the time and effort required to brute-force a login because the attacker is able to quickly generate a shortlist of valid usernames.
</p><p id="username-enumeration-F2L5" chunk-id="D0B29AB1D8BB37F873634E1E03113CF9">
    While attempting to brute-force a login page, you should pay particular attention to any differences in:
</p><ul>
    <li><strong>Status codes</strong>: During a brute-force attack, the returned HTTP status code is likely to be the same for the vast majority of guesses because most of them will be wrong. If a guess returns a different status code, this is a strong indication that the username was correct. It is best practice for websites to always return the same status code regardless of the outcome, but this practice is not always followed.</li>
    <li><strong>Error messages</strong>: Sometimes the returned error message is different depending on whether both the username AND password are incorrect or only the password was incorrect. It is best practice for websites to use identical, generic messages in both cases, but small typing errors sometimes creep in. Just one character out of place makes the two messages distinct, even in cases where the character is not visible on the rendered page.</li>
    <li><strong>Response times</strong>: If most of the requests were handled with a similar response time, any that deviate from this suggest that something different was happening behind the scenes. This is another indication that the guessed username might be correct. For example, a website might only check whether the password is correct if the username is valid. This extra step might cause a slight increase in the response time. This may be subtle, but an attacker can make this delay more obvious by entering an excessively long password that the website takes noticeably longer to handle.</li>
</ul>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'BB33E208E844C60FAA4FE5876260053B536745D65312212A398EF5799FAD29C8'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '4EACBB457E9AE79CC134BD8A335D37D42545FA6AA7306FF2F1D68B2CD9A1FE0D'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'AAC0059C54F24F1874AC6C39B2FA9F7B5E0D5AB84AD797D4CA300275CF14C842'])@verbatim<h2 id="flawed-brute-force-protection" chunk-id="61EDD73CDF9246FB6D13FFBBF5EF2DED">Flawed brute-force protection</h2><p>
    It is highly likely that a brute-force attack will involve many failed guesses before the attacker successfully compromises an account. Logically, brute-force protection revolves around trying to make it as tricky as possible to automate the process and slow down the rate at which an attacker can attempt logins. The two most common ways of preventing brute-force attacks are:
</p><ul>
    <li>Locking the account that the remote user is trying to access if they make too many failed login attempts</li>
    <li>Blocking the remote user's IP address if they make too many login attempts in quick succession</li>
</ul><p>
    Both approaches offer varying degrees of protection, but neither is invulnerable, especially if implemented using flawed logic.
</p><p>
    For example, you might sometimes find that your IP is blocked if you fail to log in too many times. In some implementations, the counter for the number of failed attempts resets if the IP owner logs in successfully. This means an attacker would simply have to log in to their own account every few attempts to prevent this limit from ever being reached.
</p><p>
    In this case, merely including your own login credentials at regular intervals throughout the wordlist is enough to render this defense virtually useless.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '6D4CC1C44751EE06710496EA067AA78C8B2CB01E7686737E13A7E88261D1471A'])@verbatim<h3 id="account-locking" chunk-id="609BCD3CC7CA5E8CE98553EEFA897277">Account locking</h3><p>
    One way in which websites try to prevent brute-forcing is to lock the account if certain suspicious criteria are met, usually a set number of failed login attempts. Just as with normal login errors, responses from the server indicating that an account is locked can also help an attacker to enumerate usernames.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '4B100811651A2CACCD08E1EE3D2A1C92A26C52CFC3D73F7EE773282373D39D3C'])@verbatim<p>
    Locking an account offers a certain amount of protection against targeted brute-forcing of a specific account. However, this approach fails to adequately prevent brute-force attacks in which the attacker is just trying to gain access to any random account they can.
</p><p id="account-locking-C8S2" chunk-id="0F5FD90C0368A5561B01644A1F35D12B">
    For example, the following method can be used to work around this kind of protection:
</p><ol>
    <li>Establish a list of candidate usernames that are likely to be valid. This could be through username enumeration or simply based on a list of common usernames.</li>
    <li>Decide on a very small shortlist of passwords that you think at least one user is likely to have. Crucially, the number of passwords you select must not exceed the number of login attempts allowed. For example, if you have worked out that limit is 3 attempts, you need to pick a maximum of 3 password guesses.</li>
    <li>Using a tool such as Burp Intruder, try each of the selected passwords with each of the candidate usernames. This way, you can attempt to brute-force every account without triggering the account lock. You only need a single user to use one of the three passwords in order to compromise an account.</li>
</ol><p id="account-locking-G5D3" chunk-id="918834D96433479F3733BC225C6CB0ED">
    Account locking also fails to protect against credential stuffing attacks. This involves using a massive dictionary of <code>username:password</code> pairs, composed of genuine login credentials stolen in data breaches. Credential stuffing relies on the fact that many people reuse the same username and password on multiple websites and, therefore, there is a chance that some of the compromised credentials in the dictionary are also valid on the target website. Account locking does not protect against credential stuffing because each username is only being attempted once. Credential stuffing is particularly dangerous because it can sometimes result in the attacker compromising many different accounts with just a single automated attack.
</p><h3 id="user-rate-limiting" chunk-id="9C98211F45A261C30282069167AD9D21">User rate limiting</h3><p>
    Another way websites try to prevent brute-force attacks is through user rate limiting. In this case, making too many login requests within a short period of time causes your IP address to be blocked. Typically, the IP can only be unblocked in one of the following ways:
</p><ul>
    <li>Automatically after a certain period of time has elapsed</li>
    <li>Manually by an administrator</li>
    <li>Manually by the user after successfully completing a CAPTCHA</li>
</ul><p>
    User rate limiting is sometimes preferred to account locking due to being less prone to username enumeration and denial of service attacks. However, it is still not completely secure. As we saw an example of in an earlier lab, there are several ways an attacker can manipulate their apparent IP in order to bypass the block.
</p><p>
    As the limit is based on the rate of HTTP requests sent from the user's IP address, it is sometimes also possible to bypass this defense if you can work out how to guess multiple passwords with a single request.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'DD916D2AF3738D723A751992EE4FE00DB3C6300559F2E7A5A7EFB312D264CAA0'])@verbatim<h2 id="http-basic-authentication" chunk-id="456C38BECC1F5A1B2BDE36416CF98A18">HTTP basic authentication</h2><p>
    Although fairly old, its relative simplicity and ease of implementation means you might sometimes see HTTP basic authentication being used. In HTTP basic authentication, the client receives an authentication token from the server, which is constructed by concatenating the username and password, and encoding it in Base64. This token is stored and managed by the browser, which automatically adds it to the <code>Authorization</code> header of every subsequent request as follows:
</p><code class="code-scrollable">Authorization: Basic base64(username:password)</code><p id="http-basic-authentication-K3L0" chunk-id="C78F6CBE3C0EC2A0EBA81FC4A4DCC0F0">
    For a number of reasons, this is generally not considered a secure authentication method. Firstly, it involves repeatedly sending the user's login credentials with every request. Unless the website also implements HSTS, user credentials are open to being captured in a man-in-the-middle attack.
</p><p>
    In addition, implementations of HTTP basic authentication often don't support brute-force protection. As the token consists exclusively of static values, this can leave it vulnerable to being brute-forced.
</p><p>
    HTTP basic authentication is also particularly vulnerable to session-related exploits, notably CSRF, against which it offers no protection on its own.
</p><p>
    In some cases, exploiting vulnerable HTTP basic authentication might only grant an attacker access to a seemingly uninteresting page. However, in addition to providing a further attack surface, the credentials exposed in this way might be reused in other, more confidential contexts.
</p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
