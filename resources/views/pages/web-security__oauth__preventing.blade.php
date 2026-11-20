@extends('layouts.academy')

@section('title', 'How to prevent OAuth authentication vulnerabilities | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="30">
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
        <h3>OAuth 2.0 authentication vulnerabilities</h3>
        <ul>
            <li><a href="/web-security/oauth#what-is-oauth">What is OAuth?</a></li>
            <li><a href="/web-security/oauth#how-does-oauth-2-0-work">How does OAuth 2.0 work?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/oauth/grant-types">OAuth grant types</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/oauth/grant-types#oauth-scopes">OAuth scopes</a></li>
                    <li><a href="/web-security/oauth/grant-types#authorization-code-grant-type">Authorization code grant type</a></li>
                    <li><a href="/web-security/oauth/grant-types#implicit-grant-type">Implicit grant type</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/oauth#oauth-authentication">OAuth authentication</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/oauth#identifying-oauth-authentication">Identifying</a></li>
                    <li><a href="/web-security/oauth#recon">Recon of the OAuth service</a></li>
                </ul>
            </li>
            <li><a href="/web-security/oauth#how-do-oauth-authentication-vulnerabilities-arise">How vulnerabilities arise</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/oauth#exploiting-oauth-authentication-vulnerabilities">Exploiting vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/oauth#improper-implementation-of-the-implicit-grant-type">Improper implementation of the implicit grant type</a></li>
                    <li><a href="/web-security/oauth#flawed-csrf-protection">Flawed CSRF protection</a></li>
                    <li><a href="/web-security/oauth#leaking-authorization-codes-and-access-tokens">Leaking authorization codes and access tokens</a></li>
                    <li><a href="/web-security/oauth#flawed-scope-validation">Flawed scope validation</a></li>
                    <li><a href="/web-security/oauth#unverified-user-registration">Unverified user registration</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/oauth/openid">OpenID Connect</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-6">
                        <label for="sub-nav-id-6">
                            <a href="/web-security/oauth/openid#how-does-openid-connect-work">How does OpenID Connect work?</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/oauth/openid#openid-connect-roles">Roles</a></li>
                            <li><a href="/web-security/oauth/openid#openid-connect-claims-and-scopes">Claims and scopes</a></li>
                            <li><a href="/web-security/oauth/openid#id-token">ID token</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/oauth/openid#identifying-openid-connect">Identifying OpenID Connect</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-7">
                        <label for="sub-nav-id-7">
                            <a href="/web-security/oauth/openid#openid-connect-vulnerabilities">Vulnerabilities</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/oauth/openid#unprotected-dynamic-client-registration">Unprotected dynamic client registration</a></li>
                            <li><a href="/web-security/oauth/openid#allowing-authorization-requests-by-reference">Allowing authorization requests by reference</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-8">
                <label for="sub-nav-id-8">
                    <a href="/web-security/oauth/preventing">Preventing vulnerabilities</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/oauth/preventing#for-oauth-service-providers">Service providers</a></li>
                    <li><a href="/web-security/oauth/preventing#for-oauth-client-applications">Client applications</a></li>
                </ul>
            </li>
            <li><a href="/web-security/all-labs#oauth-authentication">View all OAuth authentication labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/oauth"><span itemprop="name">OAuth authentication</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/oauth/preventing"><span itemprop="name">Preventing</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">How to prevent OAuth authentication vulnerabilities</h1><p>
            To prevent <a href="/web-security/oauth">OAuth authentication vulnerabilities</a>, it is essential for both the OAuth provider and the client application to implement robust validation of the key inputs, especially the <code>redirect_uri</code> parameter. There is very little built-in protection in the OAuth specification, so it's up to developers themselves to make the OAuth flow as secure as possible.
        </p><p>
            It is important to note that vulnerabilities can arise both on the side of the client application and the OAuth service itself. Even if your own implementation is rock solid, you're still ultimately reliant on the application at the other end being equally robust.
        </p><h2 id="for-oauth-service-providers">For OAuth service providers</h2><ul>
            <li>
                Require client applications to register a whitelist of valid <code>redirect_uris</code>. Wherever possible, use strict byte-for-byte comparison to validate the URI in any incoming requests. Only allow complete and exact matches rather than using pattern matching. This prevents attackers from accessing other pages on the whitelisted domains.
            </li>
            <li>
                Enforce use of the <code>state</code> parameter. Its value should also be bound to the user's session by including some unguessable, session-specific data, such as a hash containing the session cookie. This helps protect users against CSRF-like attacks. It also makes it much more difficult for an attacker to use any stolen authorization codes.
            </li>
            <li>
                On the resource server, make sure you verify that the access token was issued to the same <code>client_id</code> that is making the request. You should also check the scope being requested to make sure that this matches the scope for which the token was originally granted.
            </li>
        </ul><h2 id="for-oauth-client-applications">For OAuth client applications</h2><ul>
            <li>
                Make sure you fully understand the details of how OAuth works before implementing it. Many vulnerabilities are caused by a simple lack of understanding of what exactly is happening at each stage and how this can potentially be exploited.
            </li>
            <li>
                Use the <code>state</code> parameter even though it is not mandatory.
            </li>
            <li>
                Send a <code>redirect_uri</code> parameter not only to the <code>/authorization</code> endpoint, but also to the <code>/token</code> endpoint.
            </li>
            <li>
                When developing mobile or native desktop OAuth client applications, it is often not possible to keep the <code>client_secret</code> private. In these situations, the <code>PKCE</code> (<code>RFC 7636</code>) mechanism may be used to provide additional protection against access code interception or leakage.
            </li>
            <li>
                If you use the OpenID Connect <code>id_token</code>, make sure it is properly validated according to the JSON Web Signature, JSON Web Encryption, and OpenID specifications.
            </li>
            <li>
                Be careful with authorization codes - they may be leaked via <code>Referer</code> headers when external images, scripts, or CSS content is loaded. It is also important to not include them in the dynamically generated JavaScript files as they may be executed from external domains via <code>&lt;script&gt;</code> tags.
            </li>
        </ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
