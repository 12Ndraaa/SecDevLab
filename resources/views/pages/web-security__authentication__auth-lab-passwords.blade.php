@extends('layouts.academy')

@section('title', 'Authentication lab passwords | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/authentication"><span itemprop="name">Authentication vulnerabilities</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/authentication/auth-lab-passwords"><span itemprop="name">Password list</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Authentication lab passwords</h1><p>You can copy and paste the following list to Burp Intruder to help you solve the <a href="/web-security/authentication">Authentication</a> labs.</p><code class="code-scrollable">123456
password
12345678
qwerty
123456789
12345
1234
111111
1234567
dragon
123123
baseball
abc123
football
monkey
letmein
shadow
master
666666
qwertyuiop
123321
mustang
1234567890
michael
654321
superman
1qaz2wsx
7777777
121212
000000
qazwsx
123qwe
killer
trustno1
jordan
jennifer
zxcvbnm
asdfgh
hunter
buster
soccer
harley
batman
andrew
tigger
sunshine
iloveyou
2000
charlie
robert
thomas
hockey
ranger
daniel
starwars
klaster
112233
george
computer
michelle
jessica
pepper
1111
zxcvbn
555555
11111111
131313
freedom
777777
pass
maggie
159753
aaaaaa
ginger
princess
joshua
cheese
amanda
summer
love
ashley
nicole
chelsea
biteme
matthew
access
yankees
987654321
dallas
austin
thunder
taylor
matrix
mobilemail
mom
monitor
monitoring
montana
moon
moscow</code>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
