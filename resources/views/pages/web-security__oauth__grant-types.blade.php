@extends('layouts.academy')

@section('title', 'OAuth grant types | Web Security Academy | '.config('app.name'))
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
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/oauth"><span itemprop="name">OAuth authentication</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/oauth/grant-types"><span itemprop="name">OAuth grant types</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">OAuth grant types</h1><p>
            In this section, we'll cover the basics of the two most common OAuth grant types. If you're completely new to OAuth, we recommend reading this section before attempting to complete our <a href="/web-security/oauth">OAuth authentication</a> labs.
        </p><h2 id="what-is-an-oauth-grant-type">What is an OAuth grant type?</h2><p>
            The OAuth grant type determines the exact sequence of steps that are involved in the OAuth process. The grant type also affects how the client application communicates with the OAuth service at each stage, including how the access token itself is sent. For this reason, grant types are often referred to as &quot;OAuth flows&quot;.
        </p><p>
            An OAuth service must be configured to support a particular grant type before a client application can initiate the corresponding flow. The client application specifies which grant type it wants to use in the initial authorization request it sends to the OAuth service.
        </p><p>
            There are several different grant types, each with varying levels of complexity and security considerations. We'll focus on the &quot;authorization code&quot; and &quot;implicit&quot; grant types as these are by far the most common.
        </p><h2 id="oauth-scopes">OAuth scopes</h2><p>
            For any OAuth grant type, the client application has to specify which data it wants to access and what kind of operations it wants to perform. It does this using the <code>scope</code> parameter of the authorization request it sends to the OAuth service.
        </p><p>
            For basic OAuth, the scopes for which a client application can request access are unique to each OAuth service. As the name of the scope is just an arbitrary text string, the format can vary dramatically between providers. Some even use a full URI as the scope name, similar to a REST API endpoint. For example, when requesting read access to a user's contact list, the scope name might take any of the following forms depending on the OAuth service being used:
        </p><code class="code-scrollable">scope=contacts
scope=contacts.read
scope=contact-list-r
scope=https://oauth-authorization-server.com/auth/scopes/user/contacts.readonly</code><p>
            When OAuth is used for authentication, however, the standardized OpenID Connect scopes are often used instead. For example, the scope <code>openid profile</code> will grant the client application read access to a predefined set of basic information about the user, such as their email address, username, and so on. We'll talk more about <a href="/web-security/oauth/openid">OpenID Connect</a> later.
        </p><h2 id="authorization-code-grant-type">Authorization code grant type</h2><p>
            The authorization code grant type initially looks quite complicated, but it's actually simpler than you think once you're familiar with a few basics.
        </p><p>
            In short, the client application and OAuth service first use redirects to exchange a series of browser-based HTTP requests that initiate the flow. The user is asked whether they consent to the requested access. If they accept, the client application is granted an &quot;authorization code&quot;. The client application then exchanges this code with the OAuth service to receive an &quot;access token&quot;, which they can use to make API calls to fetch the relevant user data.
        </p><p>
            All communication that takes place from the code/token exchange onward is sent server-to-server over a secure, preconfigured back-channel and is, therefore, invisible to the end user. This secure channel is established when the client application first registers with the OAuth service. At this time, a <code>client_secret</code> is also generated, which the client application must use to authenticate itself when sending these server-to-server requests.
        </p><p>
            As the most sensitive data (the access token and user data) is not sent via the browser, this grant type is arguably the most secure. Server-side applications should ideally always use this grant type if possible.
        </p><img alt="Flow for the OAuth authorization code grant type" src="/web-security/images/oauth-authorization-code-flow.jpg"><h4>1. Authorization request</h4><p>
            The client application sends a request to the OAuth service's <code>/authorization</code> endpoint asking for permission to access specific user data. Note that the endpoint mapping may vary between providers - our labs use the endpoint <code>/auth</code> for this purpose. However, you should always be able to identify the endpoint based on the parameters used in the request.
        </p><code class="code-scrollable">GET /authorization?client_id=12345&amp;redirect_uri=https://client-app.com/callback&amp;response_type=code&amp;scope=openid%20profile&amp;state=ae13d489bd00e3c24 HTTP/1.1
Host: oauth-authorization-server.com</code><p>
            This request contains the following noteworthy parameters, usually provided in the query string:
        </p><ul>
            <li>
                <code class="code-scrollable">client_id</code>
                <p>
                    Mandatory parameter containing the unique identifier of the client application. This value is generated when the client application registers with the OAuth service.
                </p>
            </li>
            <li>
                <code class="code-scrollable">redirect_uri</code>
                <p>
                    The URI to which the user's browser should be redirected when sending the authorization code to the client application. This is also known as the &quot;callback URI&quot; or &quot;callback endpoint&quot;. Many OAuth attacks are based on exploiting flaws in the validation of this parameter.
                </p>
            </li>
            <li>
                <code class="code-scrollable">response_type</code>
                <p>
                    Determines which kind of response the client application is expecting and, therefore, which flow it wants to initiate. For the authorization code grant type, the value should be <code>code</code>.
                </p>
            </li>
            <li>
                <code class="code-scrollable">scope</code>
                <p>
                    Used to specify which subset of the user's data the client application wants to access. Note that these may be custom scopes set by the OAuth provider or standardized scopes defined by the OpenID Connect specification. We'll cover <a href="/web-security/oauth/openid">OpenID Connect</a> in more detail later.
                </p>
            </li>
            <li>
                <code class="code-scrollable">state</code>
                <p>
                    Stores a unique, unguessable value that is tied to the current session on the client application. The OAuth service should return this exact value in the response, along with the authorization code. This parameter serves as a form of CSRF token for the client application by making sure that the request to its <code>/callback</code> endpoint is from the same person who initiated the OAuth flow.
                </p>
            </li>
        </ul><h4>2. User login and consent</h4><p>
            When the authorization server receives the initial request, it will redirect the user to a login page, where they will be prompted to log in to their account with the OAuth provider. For example, this is often their social media account.
        </p><p>
            They will then be presented with a list of data that the client application wants to access. This is based on the scopes defined in the authorization request. The user can choose whether or not to consent to this access.
        </p><p>
            It is important to note that once the user has approved a given scope for a client application, this step will be completed automatically as long as the user still has a valid session with the OAuth service. In other words, the first time the user selects &quot;Log in with social media&quot;, they will need to manually log in and give their consent, but if they revisit the client application later, they will often be able to log back in with a single click.
        </p><h4>3. Authorization code grant</h4><p>
            If the user consents to the requested access, their browser will be redirected to the <code>/callback</code> endpoint that was specified in the <code>redirect_uri</code> parameter of the authorization request. The resulting <code>GET</code> request will contain the authorization code as a query parameter. Depending on the configuration, it may also send the <code>state</code> parameter with the same value as in the authorization request.
        </p><code class="code-scrollable">GET /callback?code=a1b2c3d4e5f6g7h8&amp;state=ae13d489bd00e3c24 HTTP/1.1
Host: client-app.com</code><h4>4. Access token request</h4><p>
            Once the client application receives the authorization code, it needs to exchange it for an access token. To do this, it sends a server-to-server <code>POST</code> request to the OAuth service's <code>/token</code> endpoint. All communication from this point on takes place in a secure back-channel and, therefore, cannot usually be observed or controlled by an attacker.
        </p><code class="code-scrollable">POST /token HTTP/1.1
Host: oauth-authorization-server.com
&#8230;
client_id=12345&amp;client_secret=SECRET&amp;redirect_uri=https://client-app.com/callback&amp;grant_type=authorization_code&amp;code=a1b2c3d4e5f6g7h8</code><p>
            In addition to the <code>client_id</code> and authorization <code>code</code>, you will notice the following new parameters:
        </p><ul>
            <li>
                <code class="code-scrollable">client_secret</code>
                <p>
                    The client application must authenticate itself by including the secret key that it was assigned when registering with the OAuth service.
                </p>
            </li>
            <li>
                <code class="code-scrollable">grant_type</code>
                <p>
                    Used to make sure the new endpoint knows which grant type the client application wants to use. In this case, this should be set to <code>authorization_code</code>.
                </p>
            </li>
        </ul><h4>5. Access token grant</h4><p>
            The OAuth service will validate the access token request. If everything is as expected, the server responds by granting the client application an access token with the requested scope.
        </p><code class="code-scrollable">{
    &quot;access_token&quot;: &quot;z0y9x8w7v6u5&quot;,
    &quot;token_type&quot;: &quot;Bearer&quot;,
    &quot;expires_in&quot;: 3600,
    &quot;scope&quot;: &quot;openid profile&quot;,
    &#8230;
}</code><h4>6. API call</h4><p>
            Now the client application has the access code, it can finally fetch the user's data from the resource server. To do this, it makes an API call to the OAuth service's <code>/userinfo</code> endpoint. The access token is submitted in the <code>Authorization: Bearer</code> header to prove that the client application has permission to access this data.
        </p><code class="code-scrollable">GET /userinfo HTTP/1.1
Host: oauth-resource-server.com
Authorization: Bearer z0y9x8w7v6u5</code><h4>7. Resource grant</h4><p>
            The resource server should verify that the token is valid and that it belongs to the current client application. If so, it will respond by sending the requested resource i.e. the user's data based on the scope of the access token.
        </p><code class="code-scrollable">{
    &quot;username&quot;:&quot;carlos&quot;,
    &quot;email&quot;:&quot;carlos@carlos-montoya.net&quot;,
    &#8230;
}</code><p>
            The client application can finally use this data for its intended purpose. In the case of OAuth authentication, it will typically be used as an ID to grant the user an authenticated session, effectively logging them in.
        </p><h2 id="implicit-grant-type">Implicit grant type</h2><p>
            The implicit grant type is much simpler. Rather than first obtaining an authorization code and then exchanging it for an access token, the client application receives the access token immediately after the user gives their consent.
        </p><p>
            You may be wondering why client applications don't always use the implicit grant type. The answer is relatively simple - it is far less secure. When using the implicit grant type, all communication happens via browser redirects - there is no secure back-channel like in the authorization code flow. This means that the sensitive access token and the user's data are more exposed to potential attacks.
        </p><p>
            The implicit grant type is more suited to single-page applications and native desktop applications, which cannot easily store the <code>client_secret</code> on the back-end, and therefore, don't benefit as much from using the authorization code grant type.
        </p><img alt="Flow for the OAuth implicit grant type" src="/web-security/images/oauth-implicit-flow.jpg"><h4>1. Authorization request</h4><p>
            The implicit flow starts in much the same way as the authorization code flow. The only major difference is that the <code>response_type</code> parameter must be set to <code>token</code>.
        </p><code class="code-scrollable">GET /authorization?client_id=12345&amp;redirect_uri=https://client-app.com/callback&amp;response_type=token&amp;scope=openid%20profile&amp;state=ae13d489bd00e3c24 HTTP/1.1
Host: oauth-authorization-server.com</code><h4>2. User login and consent</h4><p>
            The user logs in and decides whether to consent to the requested permissions or not. This process is exactly the same as for the authorization code flow.
        </p><h4>3. Access token grant</h4><p>
            If the user gives their consent to the requested access, this is where things start to differ. The OAuth service will redirect the user's browser to the <code>redirect_uri</code> specified in the authorization request. However, instead of sending a query parameter containing an authorization code, it will send the access token and other token-specific data as a URL fragment.
        </p><code class="code-scrollable">GET /callback#access_token=z0y9x8w7v6u5&amp;token_type=Bearer&amp;expires_in=5000&amp;scope=openid%20profile&amp;state=ae13d489bd00e3c24 HTTP/1.1
Host: client-app.com</code><p>
            As the access token is sent in a URL fragment, it is never sent directly to the client application. Instead, the client application must use a suitable script to extract the fragment and store it.
        </p><h4>4. API call</h4><p>
            Once the client application has successfully extracted the access token from the URL fragment, it can use it to make API calls to the OAuth service's <code>/userinfo</code> endpoint. Unlike in the authorization code flow, this also happens via the browser.
        </p><code class="code-scrollable">GET /userinfo HTTP/1.1
Host: oauth-resource-server.com
Authorization: Bearer z0y9x8w7v6u5</code><h4>5. Resource grant</h4><p>
            The resource server should verify that the token is valid and that it belongs to the current client application. If so, it will respond by sending the requested resource i.e. the user's data based on the scope associated with the access token.
        </p><code class="code-scrollable">{
    &quot;username&quot;:&quot;carlos&quot;,
    &quot;email&quot;:&quot;carlos@carlos-montoya.net&quot;
}</code><p>
            The client application can finally use this data for its intended purpose. In the case of OAuth authentication, it will typically be used as an ID to grant the user an authenticated session, effectively logging them in.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            <p>
                Now that you know a bit more about how the different flows work, you should be able to follow our learning materials on how to exploit vulnerabilities in OAuth-based authentication mechanisms.
            </p>
            <p>
                <a href="/web-security/oauth">OAuth authentication vulnerabilities</a>
            </p>
        </div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
