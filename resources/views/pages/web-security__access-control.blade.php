@extends('layouts.academy')

@section('title', 'Access control vulnerabilities and privilege escalation | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="10">
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
        <h3>Access control</h3>
        <ul>
            <li>
                <input type="checkbox" id="sub-nav-id-0">
                <label for="sub-nav-id-0">
                    <a href="/web-security/access-control#what-is-access-control">What is access control?</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/access-control#vertical-access-controls">Vertical access controls</a></li>
                    <li><a href="/web-security/access-control#horizontal-access-controls">Horizontal access controls</a></li>
                    <li><a href="/web-security/access-control#context-dependent-access-controls">Context-dependent access controls</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/access-control#vertical-privilege-escalation">Vertical privilege escalation</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/access-control#unprotected-functionality">Unprotected functionality</a></li>
                    <li><a href="/web-security/access-control#parameter-based-access-control-methods">Parameter-based access control</a></li>
                    <li><a href="/web-security/access-control#broken-access-control-resulting-from-platform-misconfiguration">Platform misconfiguration</a></li>
                    <li><a href="/web-security/access-control#broken-access-control-resulting-from-url-matching-discrepancies">URL-matching discrepancies</a></li>
                </ul>
            </li>
            <li><a href="/web-security/access-control#horizontal-privilege-escalation">Horizontal privilege escalation</a></li>
            <li><a href="/web-security/access-control#horizontal-to-vertical-privilege-escalation">Horizontal to vertical privilege escalation</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/access-control/idor">Insecure direct object references (IDOR)</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/access-control/idor#idor-vulnerability-with-direct-reference-to-database-objects">Direct references to database objects</a></li>
                    <li><a href="/web-security/access-control/idor#idor-vulnerability-with-direct-reference-to-static-files">Direct references to static files</a></li>
                </ul>
            </li>
            <li><a href="/web-security/access-control#access-control-vulnerabilities-in-multi-step-processes">Vulnerabilities in multi-step processes</a></li>
            <li><a href="/web-security/access-control#referer-based-access-control">Vulnerabilities in Referer-based controls</a></li>
            <li><a href="/web-security/access-control#location-based-access-control">Vulnerabilities in location-based controls</a></li>
            <li><a href="/web-security/access-control#how-to-prevent-access-control-vulnerabilities">Preventing</a></li>
            <li><a href="/web-security/all-labs#access-control-vulnerabilities">View all access control labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/access-control"><span itemprop="name">Access control</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Access control vulnerabilities and privilege escalation</h1><p>
			In this section, we describe:
		</p><ul>
			<li>
				Privilege escalation.
			</li>
			<li>
				The types of vulnerabilities that can arise with access control.
			</li>
			<li>
				How to prevent access control vulnerabilities.
			</li>
		</ul><div class="highlightedarea">
			<h4>Labs</h4>
			<p>
				If you're familiar with the basic concepts behind access control vulnerabilities and want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access labs in this topic from the link below.
			</p>
			
		<ul><li><a href="/web-security/all-labs#access-control-vulnerabilities">View all access control labs</a></li></ul></div><h2 id="what-is-access-control" chunk-id="4A7EF9E11D106FF5B02E9AAA3232BACD">What is access control?</h2><p>
		    Access control is the application of constraints on who or what is authorized to perform actions or access resources. In the context of web applications, access control is dependent on authentication and session management:
	    </p><ul>
		    <li><strong>Authentication</strong> confirms that the user is who they say they are.</li>
		    <li><strong>Session management</strong> identifies which subsequent HTTP requests are being made by that same user. </li>
		    <li><strong>Access control</strong> determines whether the user is allowed to carry out the action that they are attempting to perform. </li>
		</ul><p>
			Broken access controls are common and often present a critical security vulnerability. Design and management of access controls is a complex and dynamic problem that applies business, organizational, and legal constraints to a technical implementation. Access control design decisions have to be made by humans so the potential for errors is high.
		</p><img alt="Access control vulnerability" src="/web-security/images/access-control.svg"><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/access-control/security-models">Access control security models</a></li></ul></div><h3 id="vertical-access-controls">Vertical access controls</h3><p>
		    Vertical access controls are mechanisms that restrict access to sensitive functionality to specific types of users.
	    </p><p>
			With vertical access controls, different types of users have access to different application functions. For example, an administrator might be able to modify or delete any user's account, while an ordinary user has no access to these actions. Vertical access controls can be more fine-grained implementations of security models designed to enforce business policies such as separation of duties and least privilege.
		</p><h3 id="horizontal-access-controls">Horizontal access controls</h3><p>
		    Horizontal access controls are mechanisms that restrict access to resources to specific users.
	    </p><p>
			With horizontal access controls, different users have access to a subset of resources of the same type. For example, a banking application will allow a user to view transactions and make payments from their own accounts, but not the accounts of any other user. 
		</p><h3 id="context-dependent-access-controls">Context-dependent access controls</h3><p>
		    Context-dependent access controls restrict access to functionality and resources based upon the state of the application or the user's interaction with it.
	    </p><p>
		    Context-dependent access controls prevent a user performing actions in the wrong order. For example, a retail website might prevent users from modifying the contents of their shopping cart after they have made payment.
	    </p><h2 id="examples-of-broken-access-controls">Examples of broken access controls</h2><p>
			Broken access control vulnerabilities exist when a user can access resources or perform actions that they are not supposed to be able to.
		</p><h3 id="vertical-privilege-escalation" chunk-id="F9830C713CF303D38C690531601F4C7D">Vertical privilege escalation</h3><p>
			If a user can gain access to functionality that they are not permitted to access then this is vertical privilege escalation. For example, if a non-administrative user can gain access to an admin page where they can delete user accounts, then this is vertical privilege escalation.
		</p><h4 id="unprotected-functionality" chunk-id="2B86324A38656A397CA7B5C56EDC619C">Unprotected functionality</h4><p>
			At its most basic, vertical privilege escalation arises where an application does not enforce any protection for sensitive functionality. For example, administrative functions might be linked from an administrator's welcome page but not from a user's welcome page. However, a user might be able to access the administrative functions by browsing to the relevant admin URL.
		</p><p>
			For example, a website might host sensitive functionality at the following URL:
		</p><code class="code-scrollable">https://insecure-website.com/admin</code><p>
			This might be accessible by any user, not only administrative users who have a link to the functionality in their user interface. In some cases, the administrative URL might be disclosed in other locations, such as the <code>robots.txt</code> file:
		</p><code class="code-scrollable">https://insecure-website.com/robots.txt</code><p>
			Even if the URL isn't disclosed anywhere, an attacker may be able to use a wordlist to brute-force the location of the sensitive functionality.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'EFB3CD7D563D637400D229D7B4949233047F1B2808B1D46393322D66594A8DE2'])@verbatim<p id="unprotected-functionality-5I3H" chunk-id="BFDAE123A915F2C7A20C837AC50E7835">
			In some cases, sensitive functionality is concealed by giving it a less predictable URL. This is an example of so-called "security by obscurity". However, hiding sensitive functionality does not provide effective access control because users might discover the obfuscated URL in a number of ways.
		</p><p>
			Imagine an application that hosts administrative functions at the following URL:
		</p><code class="code-scrollable">https://insecure-website.com/administrator-panel-yb556</code><p>
			This might not be directly guessable by an attacker. However, the application might still leak the URL to users. The URL might be disclosed in JavaScript that constructs the user interface based on the user's role:
		</p><code class="code-scrollable">&lt;script&gt;
	var isAdmin = false;
	if (isAdmin) {
		...
		var adminPanelTag = document.createElement('a');
		adminPanelTag.setAttribute('href', 'https://insecure-website.com/administrator-panel-yb556');
		adminPanelTag.innerText = 'Admin panel';
		...
	}
&lt;/script&gt;</code><p>
			This script adds a link to the user's UI if they are an admin user. However, the script containing the URL is visible to all users regardless of their role.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '878A6A3A7BF5CA38441716313E1AD46697052F36B6C82C4A6BDA1A98E28F446F'])@verbatim<h4 id="parameter-based-access-control-methods" chunk-id="3D720FEF2753C28133750A7F7B06CAAE">Parameter-based access control methods</h4><p>
			Some applications determine the user's access rights or role at login, and then store this information in a user-controllable location. This could be:
		</p><ul>
			<li>
				A hidden field.
			</li>
			<li>
				A cookie.
			</li>
			<li>
				A preset query string parameter.
			</li>
		</ul><p>
			The application makes access control decisions based on the submitted value. For example:
		</p><code class="code-scrollable">https://insecure-website.com/login/home.jsp?admin=true
https://insecure-website.com/login/home.jsp?role=1</code><p>
			This approach is insecure because a user can modify the value and access functionality they're not authorized to, such as administrative functions.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'F97895E072D86380DD3FDD12E2D6CEB6090708B4E3E0CD0990FE741AFB553B2E'])@verbatim@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '703ED76CC046C2C9C06B661C1C25F53F7C1CB238E9B7FA9AFF664177FD7C7773'])@verbatim<h4 id="broken-access-control-resulting-from-platform-misconfiguration">Broken access control resulting from platform misconfiguration</h4><p>
			Some applications enforce access controls at the platform layer. they do this by restricting access to specific URLs and HTTP methods based on the user's role. For example, an application might configure a rule as follows:
		</p><code class="code-scrollable">DENY: POST, /admin/deleteUser, managers</code><p>
		    This rule denies access to the <code>POST</code> method on the URL <code>/admin/deleteUser</code>, for users in the managers group. Various things can go wrong in this situation, leading to access control bypasses.
	    </p><p>
		    Some application frameworks support various non-standard HTTP headers that can be used to override the URL in the original request, such as <code>X-Original-URL</code> and <code>X-Rewrite-URL</code>. If a website uses rigorous front-end controls to restrict access based on the URL, but the application allows the URL to be overridden via a request header, then it might be possible to bypass the access controls using a request like the following:
	    </p><code class="code-scrollable">POST / HTTP/1.1
X-Original-URL: /admin/deleteUser
...</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '9955F5350904EDABE30089828D2C08ACE886493264A0B469354503102379A3E9'])@verbatim<p>
    An alternative attack relates to the HTTP method used in the request. The front-end controls described in the previous sections restrict access based on the URL and HTTP method. Some websites tolerate different HTTP request methods when performing an action. If an attacker can use the <code>GET</code> (or another) method to perform actions on a restricted URL, they can bypass the access control that is implemented at the platform layer.
</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'E115E4B43D59771BB787573F305861A795FB30F2447CEF9B53618F4232D1C83B'])@verbatim<h4 id="broken-access-control-resulting-from-url-matching-discrepancies">Broken access control resulting from URL-matching discrepancies</h4><p>
			Websites can vary in how strictly they match the path of an incoming request to a defined endpoint. For example, they may tolerate inconsistent capitalization, so a request to <code>/ADMIN/DELETEUSER</code> may still be mapped to the <code>/admin/deleteUser</code> endpoint. If the access control mechanism is less tolerant, it may treat these as two different endpoints and fail to enforce the correct restrictions as a result.
		</p><p>
			Similar discrepancies can arise if developers using the Spring framework have enabled the <code>useSuffixPatternMatch</code> option. This allows paths with an arbitrary file extension to be mapped to an equivalent endpoint with no file extension. In other words, a request to <code>/admin/deleteUser.anything</code> would still match the <code>/admin/deleteUser</code> pattern. Prior to Spring 5.3, this option is enabled by default.
		</p><p>
			On other systems, you may encounter discrepancies in whether <code>/admin/deleteUser</code> and <code>/admin/deleteUser/</code> are treated as distinct endpoints. In this case, you may be able to bypass access controls by appending a trailing slash to the path.
		</p><h3 id="horizontal-privilege-escalation" chunk-id="32497DA2008417AED31915AF869585B0">Horizontal privilege escalation</h3><p>
			Horizontal privilege escalation occurs if a user is able to gain access to resources belonging to another user, instead of their own resources of that type. For example, if an employee can access the records of other employees as well as their own, then this is horizontal privilege escalation.
		</p><p>
			Horizontal privilege escalation attacks may use similar types of exploit methods to vertical privilege escalation. For example, a user might access their own account page using the following URL:
		</p><code class="code-scrollable">https://insecure-website.com/myaccount?id=123</code><p>
			If an attacker modifies the <code>id</code> parameter value to that of another user, they might gain access to another user's account page, and the associated data and functions.
		</p><div class="highlightedarea">
			<h4>Note</h4>
			<p>
				This is an example of an insecure direct object reference (IDOR) vulnerability. This type of vulnerability arises where user-controller parameter values are used to access resources or functions directly.
			</p>
		</div>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'CF2D0A74362EE20A8F6FFB1028E3B44FEE9AE125F418ED15832E4A8A2073BFF9'])@verbatim<p>
			In some applications, the exploitable parameter does not have a predictable value. For example, instead of an incrementing number, an application might use globally unique identifiers (GUIDs) to identify users. This may prevent an attacker from guessing or predicting another user's identifier. However, the GUIDs belonging to other users might be disclosed elsewhere in the application where users are referenced, such as user messages or reviews.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '9D95A9E677B81F605D40D00001FFBC8BBB0F0EE73773A3A37727FBDE0406B779'])@verbatim<p id="horizontal-privilege-escalation-0U2P" chunk-id="E97F2D4FE0F94B4E0DC89E294FC2BDAD">
			In some cases, an application does detect when the user is not permitted to access the resource, and returns a redirect to the login page. However, the response containing the redirect might still include some sensitive data belonging to the targeted user, so the attack is still successful.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '114DE45758E410D7A7458144D568A9C3B78A4BE3A14DAF61D4E552610739359D'])@verbatim<h3 id="horizontal-to-vertical-privilege-escalation" chunk-id="A2CF99F49A5740802962487C2BF11D7A">Horizontal to vertical privilege escalation</h3><p>
			Often, a horizontal privilege escalation attack can be turned into a vertical privilege escalation, by compromising a more privileged user. For example, a horizontal escalation might allow an attacker to reset or capture the password belonging to another user. If the attacker targets an administrative user and compromises their account, then they can gain administrative access and so perform vertical privilege escalation.
		</p><p>
			An attacker might be able to gain access to another user's account page using the parameter tampering technique already described for horizontal privilege escalation:
		</p><code class="code-scrollable">https://insecure-website.com/myaccount?id=456</code><p>
			If the target user is an application administrator, then the attacker will gain access to an administrative account page. This page might disclose the administrator's password or provide a means of changing it, or might provide direct access to privileged functionality.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '9038DF39E72961A071967A83C2472BF2EDB0EF9595E6F13BD05CE1B2DCE81234'])@verbatim<h3 id="insecure-direct-object-references">Insecure direct object references</h3><p>
			Insecure direct object references (IDORs) are a subcategory of access control vulnerabilities. IDORs occur if an application uses user-supplied input to access objects directly and an attacker can modify the input to obtain unauthorized access. It was popularized by its appearance in the OWASP 2007 Top Ten. It's just one example of many implementation mistakes that can provide a means to bypass access controls.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'BF6B2F755E63BA10EEFDB6633048FC5CF8E4C1D5F386A756FD8E4B6864D70857'])@verbatim<div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/access-control/idor">Insecure direct object references (IDOR)</a></li></ul></div><h3 id="access-control-vulnerabilities-in-multi-step-processes">Access control vulnerabilities in multi-step processes</h3><p>
		    Many websites implement important functions over a series of steps. This is common when:
		</p><ul>
			<li>
				A variety of inputs or options need to be captured.
			</li>
			<li>
				The user needs to review and confirm details before the action is performed.
			</li>
		</ul><p>
			For example, the administrative function to update user details might involve the following steps:
	    </p><ol>
		    <li>Load the form that contains details for a specific user.</li>
		    <li>Submit the changes.</li>
		    <li>Review the changes and confirm.</li>
		</ol><p>
		    Sometimes, a website will implement rigorous access controls over some of these steps, but ignore others. Imagine a website where access controls are correctly applied to the first and second steps, but not to the third step. The website assumes that a user will only reach step 3 if they have already completed the first steps, which are properly controlled. An attacker can gain unauthorized access to the function by skipping the first two steps and directly submitting the request for the third step with the required parameters.
	    </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '48EA5EFF7577D0D5E50C64B5D91F3E2FCC175EBB055C95F30BF8E909F6BA9D2C'])@verbatim<h3 id="referer-based-access-control">Referer-based access control</h3><p>
			Some websites base access controls on the <code>Referer</code> header submitted in the HTTP request. The <code>Referer</code> header can be added to requests by browsers to indicate which page initiated a request.
		</p><p>
			For example, an application robustly enforces access control over the main administrative page at <code>/admin</code>, but for sub-pages such as <code>/admin/deleteUser</code> only inspects the <code>Referer</code> header. If the <code>Referer</code> header contains the main <code>/admin</code> URL, then the request is allowed.
		</p><p>
			In this case, the <code>Referer</code> header can be fully controlled by an attacker. This means that they can forge direct requests to sensitive sub-pages by supplying the required <code>Referer</code> header, and gain unauthorized access.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '16E507638191C125691E9F9D752A1D42BF2E8FA811002B872CA607BD2CD8C334'])@verbatim<h3 id="location-based-access-control">Location-based access control</h3><p>
			Some websites enforce access controls based on the user's geographical location. This can apply, for example, to banking applications or media services where state legislation or business restrictions apply. These access controls can often be circumvented by the use of web proxies, VPNs, or manipulation of client-side geolocation mechanisms.
		</p><h2 id="how-to-prevent-access-control-vulnerabilities">How to prevent access control vulnerabilities</h2><p>
			Access control vulnerabilities can be prevented by taking a defense-in-depth approach and applying the following principles:
		</p><ul>
			<li>
				Never rely on obfuscation alone for access control.
			</li>
			<li>
				Unless a resource is intended to be publicly accessible, deny access by default.
			</li>
			<li>
				Wherever possible, use a single application-wide mechanism for enforcing access controls.
			</li>
			<li>
				At the code level, make it mandatory for developers to declare the access that is allowed for each resource, and deny access by default.
			</li>
			<li>
				Thoroughly audit and test access controls to ensure they work as designed.
			</li>
		</ul>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
