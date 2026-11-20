@extends('layouts.academy')

@section('title', 'OpenID Connect | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/oauth"><span itemprop="name">OAuth authentication</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/oauth/openid"><span itemprop="name">OpenID Connect</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">OpenID Connect</h1><p>
            In this section, we'll provide some key background information about OpenID Connect that will help you understand some of the <a href="/web-security/oauth/openid#openid-connect-vulnerabilities">vulnerabilities</a> we're going to cover. If you're new to OAuth and OpenID Connect specifically, we recommend reading this section before attempting to complete our OpenID-based labs.
        </p><h2 id="what-is-openid-connect">What is OpenID Connect?</h2><p>
            OpenID Connect extends the OAuth protocol to provide a dedicated identity and authentication layer that sits on top of the <a href="/web-security/oauth#how-does-oauth-2-0-work">basic OAuth implementation</a>. It adds some simple functionality that enables better support for the authentication use case of OAuth.
        </p><p>
            OAuth was not initially designed with authentication in mind; it was intended to be a means of delegating authorizations for specific resources between applications. However, many websites began customizing OAuth for use as an authentication mechanism. To achieve this, they typically requested read access to some basic user data and, if they were granted this access, assumed that the user authenticated themselves on the side of the OAuth provider.
        </p><p>
            These plain <a href="/web-security/oauth#oauth-authentication">OAuth authentication</a> mechanisms were far from ideal. For a start, the client application had no way of knowing when, where, or how the user was authenticated. As each of these implementations was a custom workaround of sorts, there was also no standard way of requesting user data for this purpose. To support OAuth properly, client applications would have to configure separate OAuth mechanisms for each provider, each with different endpoints, unique sets of scopes, and so on.
        </p><p>
            OpenID Connect solves a lot of these problems by adding standardized, identity-related features to make authentication via OAuth work in a more reliable and uniform way.
        </p><h2 id="how-does-openid-connect-work">How does OpenID Connect work?</h2><p>
            OpenID Connect slots neatly into the normal <a href="/web-security/oauth/grant-types">OAuth flows</a>. From the client application's perspective, the key difference is that there is an additional, standardized set of scopes that are the same for all providers, and an extra response type: <code>id_token</code>.
        </p><h3 id="openid-connect-roles">OpenID Connect roles</h3><p>
            The roles for OpenID Connect are essentially the same as for standard OAuth. The main difference is that the specification uses slightly different terminology.
        </p><ul>
            <li>
                <strong>Relying party</strong> - The application that is requesting authentication of a user. This is synonymous with the OAuth client application.
            </li>
            <li>
                <strong>End user</strong> - The user who is being authenticated. This is synonymous with the OAuth resource owner.
            </li>
            <li>
                <strong>OpenID provider</strong> - An OAuth service that is configured to support OpenID Connect.
            </li>
        </ul><h3 id="openid-connect-claims-and-scopes">OpenID Connect claims and scopes</h3><p>
            The term &quot;claims&quot; refers to the <code>key:value</code> pairs that represent information about the user on the resource server. One example of a claim could be <code>&quot;family_name&quot;:&quot;Montoya&quot;</code>.
        </p><p>
            Unlike basic OAuth, whose <a href="/web-security/oauth/grant-types#oauth-scopes">scopes are unique to each provider</a>, all OpenID Connect services use an identical set of scopes. In order to use OpenID Connect, the client application must specify the scope <code>openid</code> in the authorization request. They can then include one or more of the other standard scopes:
        </p><ul>
            <li>
                <code class="code-scrollable">profile</code>
            </li>
            <li>
                <code class="code-scrollable">email</code>
            </li>
            <li>
                <code class="code-scrollable">address</code>
            </li>
            <li>
                <code class="code-scrollable">phone</code>
            </li>
        </ul><p>
            Each of these scopes corresponds to read access for a subset of claims about the user that are defined in the OpenID specification. For example, requesting the scope <code>openid profile</code> will grant the client application read access to a series of claims related to the user's identity, such as <code>family_name</code>, <code>given_name</code>, <code>birth_date</code>, and so on.
        </p><h3 id="id-token">ID token</h3><p>
            The other main addition provided by OpenID Connect is the <code>id_token</code> response type. This returns a JSON web token (JWT) signed with a JSON web signature (JWS). The JWT payload contains a list of claims based on the scope that was initially requested. It also contains information about how and when the user was last authenticated by the OAuth service. The client application can use this to decide whether or not the user has been sufficiently authenticated.
        </p><p>
            The main benefit of using <code>id_token</code> is the reduced number of requests that need to be sent between the client application and the OAuth service, which could provide better performance overall. Instead of having to get an access token and then request the user data separately, the ID token containing this data is sent to the client application immediately after the user has authenticated themselves.
        </p><p>
            Rather than simply relying on a trusted channel, as happens in basic OAuth, the integrity of the data transmitted in an ID token is based on a JWT cryptographic signature. For this reason, the use of ID tokens may help protect against some man-in-the-middle attacks. However, given that the cryptographic keys for signature verification are transmitted over the same network channel (normally exposed on <code>/.well-known/jwks.json</code>), some attacks are still possible.
        </p><p>
            Note that multiple response types are supported by OAuth, so it's perfectly acceptable for a client application to send an authorization request with both a basic OAuth response type and OpenID Connect's <code>id_token</code> response type:
        </p><code class="code-scrollable">response_type=id_token token
response_type=id_token code</code><p>
            In this case, both an ID token and either a code or access token will be sent to the client application at the same time.
        </p><h2 id="identifying-openid-connect">Identifying OpenID Connect</h2><p>
            If OpenID connect is actively being used by the client application, this should be obvious from the authorization request. The most foolproof way to check is to look for the mandatory <code>openid</code> scope.
        </p><p>
            Even if the login process does not initially appear to be using OpenID Connect, it is still worth checking whether the OAuth service supports it. You can simply try adding the <code>openid</code> scope or changing the response type to <code>id_token</code> and observing whether this results in an error.
        </p><p>
            As with basic OAuth, it's also a good idea to take a look at the OAuth provider's documentation to see if there's any useful information about their OpenID Connect support. You may also be able to access the configuration file from the standard endpoint <code>/.well-known/openid-configuration</code>.
        </p><h2 id="openid-connect-vulnerabilities">OpenID Connect vulnerabilities</h2><p>
            The specification for OpenID Connect is much stricter than that of basic OAuth, which means there is generally less potential for quirky implementations with glaring vulnerabilities. That said, as it is just a layer that sits on top of OAuth, the client application or OAuth service may still be vulnerable to some of the OAuth-based attacks we looked at earlier. In fact, you might have noticed that all of our <a href="/web-security/all-labs#oauth-authentication">OAuth authentication labs</a> also use OpenID Connect.
        </p><p>
            In this section, we'll look at some additional vulnerabilities that may be introduced by some of the extra features of OpenID Connect.
        </p><h3 id="unprotected-dynamic-client-registration">Unprotected dynamic client registration</h3><p>
            The OpenID specification outlines a standardized way of allowing client applications to register with the OpenID provider. If dynamic client registration is supported, the client application can register itself by sending a <code>POST</code> request to a dedicated <code>/registration</code> endpoint. The name of this endpoint is usually provided in the configuration file and documentation.
        </p><p>
            In the request body, the client application submits key information about itself in JSON format. For example, it will often be required to include an array of whitelisted redirect URIs. It can also submit a range of additional information, such as the names of the endpoints they want to expose, a name for their application, and so on. A typical registration request may look something like this:
        </p><code class="code-scrollable">POST /openid/register HTTP/1.1
Content-Type: application/json
Accept: application/json
Host: oauth-authorization-server.com
Authorization: Bearer ab12cd34ef56gh89

{
    &quot;application_type&quot;: &quot;web&quot;,
    &quot;redirect_uris&quot;: [
        &quot;https://client-app.com/callback&quot;,
        &quot;https://client-app.com/callback2&quot;
        ],
    &quot;client_name&quot;: &quot;My Application&quot;,
    &quot;logo_uri&quot;: &quot;https://client-app.com/logo.png&quot;,
    &quot;token_endpoint_auth_method&quot;: &quot;client_secret_basic&quot;,
    &quot;jwks_uri&quot;: &quot;https://client-app.com/my_public_keys.jwks&quot;,
    &quot;userinfo_encrypted_response_alg&quot;: &quot;RSA1_5&quot;,
    &quot;userinfo_encrypted_response_enc&quot;: &quot;A128CBC-HS256&quot;,
    &#8230;
}</code><p>
            The OpenID provider should require the client application to authenticate itself. In the example above, they're using an HTTP bearer token. However, some providers will allow dynamic client registration without any authentication, which enables an attacker to register their own malicious client application. This can have various consequences depending on how the values of these attacker-controllable properties are used.
        </p><p>
            For example, you may have noticed that some of these properties can be provided as URIs. If any of these are accessed by the OpenID provider, this can potentially lead to second-order SSRF vulnerabilities unless additional security measures are in place.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '832ABA2EE324F0E0D7FD3881ACFF87490BF540D183EBBECCFFFFD71F5310A150'])@verbatim<h3 id="allowing-authorization-requests-by-reference">Allowing authorization requests by reference</h3><p>
            Up to this point, we've looked at the standard way of submitting the required parameters for the authorization request i.e. via the query string. Some OpenID providers give you the option to pass these in as a JSON web token (JWT) instead. If this feature is supported, you can send a single <code>request_uri</code> parameter pointing to a JSON web token that contains the rest of the OAuth parameters and their values. Depending on the configuration of the OAuth service, this <code>request_uri</code> parameter is another potential vector for SSRF.
        </p><p>
            You might also be able to use this feature to bypass validation of these parameter values. Some servers may effectively validate the query string in the authorization request, but may fail to adequately apply the same validation to parameters in a JWT, including the <code>redirect_uri</code>.
        </p><p>
            To check whether this option is supported, you should look for the <code>request_uri_parameter_supported</code> option in the configuration file and documentation. Alternatively, you can just try adding the <code>request_uri</code> parameter to see if it works. You will find that some servers support this feature even if they don't explicitly mention it in their documentation.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
