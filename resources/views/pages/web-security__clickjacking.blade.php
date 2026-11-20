@extends('layouts.academy')

@section('title', 'What is Clickjacking? Tutorial & Examples | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="14">
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
        <h3>Clickjacking</h3>
        <ul>
            <li><a href="/web-security/clickjacking#what-is-clickjacking">What is clickjacking?</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/clickjacking#how-to-construct-a-basic-clickjacking-attack">Constructing an attack</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/clickjacking#clickbandit">Using Clickbandit</a></li>
                </ul>
            </li>
            <li><a href="/web-security/clickjacking#clickjacking-with-prefilled-form-input">Clickjacking with prefilled form input</a></li>
            <li><a href="/web-security/clickjacking#frame-busting-scripts">Frame busting scripts</a></li>
            <li><a href="/web-security/clickjacking#combining-clickjacking-with-a-dom-xss-attack">Combining clickjacking with a DOM XSS attack</a></li>
            <li><a href="/web-security/clickjacking#multistep-clickjacking">Multistep clickjacking</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/clickjacking#how-to-prevent-clickjacking-attacks">Preventing attacks</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/clickjacking#x-frame-options">X-Frame-Options</a></li>
                    <li><a href="/web-security/clickjacking#content-security-policy-csp">Content Security Policy (CSP)</a></li>
                </ul>
            </li>
            <li><a href="/web-security/all-labs#clickjacking">View all clickjacking labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/clickjacking"><span itemprop="name">Clickjacking</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Clickjacking (UI redressing)</h1><p>
			In this section we will explain what clickjacking is, describe common examples of clickjacking attacks and discuss how to protect against these attacks.
		</p><h2 id="what-is-clickjacking" chunk-id="D796EF496282CBED091E68D2B08214D9">What is clickjacking?</h2><p>
			Clickjacking is an interface-based attack in which a user is tricked into clicking on actionable content on a hidden website by clicking on some other content in a decoy website. Consider the following example:
		</p><p>
			A web user accesses a decoy website (perhaps this is a link provided by an email) and clicks on a button to win a prize. Unknowingly, they have been deceived by an attacker into pressing an alternative hidden button and this results in the payment of an account on another site. This is an example of a clickjacking attack. The technique depends upon the incorporation of an invisible, actionable web page (or multiple pages) containing a button or hidden link, say, within an iframe. The iframe is overlaid on top of the user's anticipated decoy web page content. This attack differs from a <a href="/web-security/csrf">CSRF</a> attack in that the user is required to perform an action such as a button click whereas a CSRF attack depends upon forging an entire request without the user's knowledge or input.
		</p><img alt="clickjacking" src="/web-security/images/clickjacking-infographic.svg"><p id="what-is-clickjacking-G52S" chunk-id="3A9A66FE5D5765DE76CD061DB3A18683">
			Protection against CSRF attacks is often provided by the use of a <a href="/web-security/csrf#common-defences-against-csrf">CSRF token</a>: a session-specific, single-use number or nonce. Clickjacking attacks are not mitigated by the CSRF token as a target session is established with content loaded from an authentic website and with all requests happening on-domain. CSRF tokens are placed into requests and passed to the server as part of a normally behaved session. The difference compared to a normal user session is that the process occurs within a hidden iframe.
		</p><div class="highlightedarea">
			<h4>Labs</h4>
			<p>
				If you're already familiar with the basic concepts behind clickjacking vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
			</p>
			
		<ul><li><a href="/web-security/all-labs#clickjacking">View all clickjacking labs</a></li></ul></div><h2 id="how-to-construct-a-basic-clickjacking-attack" chunk-id="443EA83CD44C9BC5B2A0C8C9C648705F">How to construct a basic clickjacking attack</h2><p>
			Clickjacking attacks use CSS to create and manipulate layers. The attacker incorporates the target website as an iframe layer overlaid on the decoy website. An example using the style tag and parameters is as follows:
	  </p><code class="code-scrollable">&lt;head&gt;
	&lt;style&gt;
		#target_website {
			position:relative;
			width:128px;
			height:128px;
			opacity:0.00001;
			z-index:2;
			}
		#decoy_website {
			position:absolute;
			width:300px;
			height:400px;
			z-index:1;
			}
	&lt;/style&gt;
&lt;/head&gt;
...
&lt;body&gt;
	&lt;div id="decoy_website"&gt;
	...decoy web content here...
	&lt;/div&gt;
	&lt;iframe id="target_website" src="https://vulnerable-website.com"&gt;
	&lt;/iframe&gt;
&lt;/body&gt;</code><p id="how-to-construct-a-basic-clickjacking-attack-A5G7" chunk-id="5B5DACBEE5234FEF31D1EBC295DCD047">
			The target website iframe is positioned within the browser so that there is a precise overlap of the target action with the decoy website using appropriate width and height position values. Absolute and relative position values are used to ensure that the target website accurately overlaps the decoy regardless of screen size, browser type and platform. The z-index determines the stacking order of the iframe and website layers. The opacity value is defined as 0.0 (or close to 0.0) so that the iframe content is transparent to the user. Browser clickjacking protection might apply threshold-based iframe transparency detection (for example, Chrome version 76 includes this behavior but Firefox does not). The attacker selects opacity values so that the desired effect is achieved without triggering protection behaviors.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'CCFDC81094E272982BB5995E349D1FEE4CB10179392ED6B49586FED5837006A0'])@verbatim<h3 id="clickbandit" chunk-id="2E79F75A89959B0B0BE6B10EEEDC9463">Clickbandit</h3><p>
			Although you can manually create a clickjacking proof of concept as described above, this can be fairly tedious and time-consuming in practice. When you're testing for clickjacking in the wild, we recommend using Burp's <a href="/web-security/all-labs">Clickbandit</a> tool instead. This lets you use your browser to perform the desired actions on the frameable page, then creates an HTML file containing a suitable clickjacking overlay. You can use this to generate an interactive proof of concept in a matter of seconds, without having to write a single line of HTML or CSS.
		</p><h2 id="clickjacking-with-prefilled-form-input" chunk-id="1CA607DEC309C8A03B5C16128F58676E">Clickjacking with prefilled form input</h2><p>
			Some websites that require form completion and submission permit prepopulation of form inputs using GET parameters prior to submission. Other websites might require text before form submission. As GET values form part of the URL then the target URL can be modified to incorporate values of the attacker's choosing and the transparent "submit" button is overlaid on the decoy site as in the basic clickjacking example.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '8A7EC1665250F513F8AB3C341F7FCEF5402A497D59FA90E673BFD30CD47FF766'])@verbatim<h2 id="frame-busting-scripts" chunk-id="232ADBC2E8F035B759B6800C0F92B99D">Frame busting scripts</h2><p>
			Clickjacking attacks are possible whenever websites can be framed. Therefore, preventative techniques are based upon restricting the framing capability for websites. A common client-side protection enacted through the web browser is to use frame busting or frame breaking scripts. These can be implemented via proprietary browser JavaScript add-ons or extensions such as NoScript. Scripts are often crafted so that they perform some or all of the following behaviors:
		</p><ul>
			<li>check and enforce that the current application window is the main or top window,</li>
			<li>make all frames visible,</li>
			<li>prevent clicking on invisible frames,</li>
			<li>intercept and flag potential clickjacking attacks to the user.</li>
		</ul><p id="frame-busting-scripts-Y6G4" chunk-id="22B9135F051CDCFF3F33F5ED860F4EB2">
			Frame busting techniques are often browser and platform specific and because of the flexibility of HTML they can usually be circumvented by attackers. As frame busters are JavaScript then the browser's security settings may prevent their operation or indeed the browser might not even support JavaScript. An effective attacker workaround against frame busters is to use the HTML5 iframe <code>sandbox</code> attribute. When this is set with the <code>allow-forms</code> or <code>allow-scripts</code> values and the <code>allow-top-navigation</code> value is omitted then the frame buster script can be neutralized as the iframe cannot check whether or not it is the top window:
		</p><code class="code-scrollable">&lt;iframe id="victim_website" src="https://victim-website.com" sandbox="allow-forms"&gt;&lt;/iframe&gt;</code><p>
			Both the <code>allow-forms</code> and <code>allow-scripts</code> values permit the specified actions within the iframe but top-level navigation is disabled. This inhibits frame busting behaviors while allowing functionality within the targeted site.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '71C2BCC46F11BE8E063FA976C68B2383FB1DFD04C1BE432086D3F030159F15AE'])@verbatim<h2 id="combining-clickjacking-with-a-dom-xss-attack" chunk-id="21244240FA3D1EB4D59B3A22D00F4F93">Combining clickjacking with a DOM XSS attack</h2><p>
			So far, we have looked at clickjacking as a self-contained attack. Historically, clickjacking has been used to perform behaviors such as boosting "likes" on a Facebook page. However, the true potency of clickjacking is revealed when it is used as a carrier for another attack such as a <a href="/web-security/cross-site-scripting/dom-based">DOM XSS</a> attack. Implementation of this combined attack is relatively straightforward assuming that the attacker has first identified the XSS exploit. The XSS exploit is then combined with the iframe target URL so that the user clicks on the button or link and consequently executes the DOM XSS attack.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'D259E02FBD358D4B88E4DE6938C6BCD31A3C35A7BA4FC54FA4352A3822990F24'])@verbatim<h2 id="multistep-clickjacking" chunk-id="0EC0F7B3710B17B162D8EE16554860F4">Multistep clickjacking</h2><p>
			Attacker manipulation of inputs to a target website may necessitate multiple actions. For example, an attacker might want to trick a user into buying something from a retail website so items need to be added to a shopping basket before the order is placed. These actions can be implemented by the attacker using multiple divisions or iframes. Such attacks require considerable precision and care from the attacker perspective if they are to be effective and stealthy.
		</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '5B7DC27B9539EC5079973204AADB5F58A9A78906B0A16BF6AF46CA0407ADA9A2'])@verbatim<h2 id="how-to-prevent-clickjacking-attacks" chunk-id="6835773FC5BB3E0176D577CCFAC3A2E9">How to prevent clickjacking attacks</h2><p>
			We have discussed a commonly encountered browser-side prevention mechanism, namely frame busting scripts. However, we have seen that it is often straightforward for an attacker to circumvent these protections. Consequently, server driven protocols have been devised that constrain browser iframe usage and mitigate against clickjacking.
		</p><p>
			Clickjacking is a browser-side behavior and its success or otherwise depends upon browser functionality and conformity to prevailing web standards and best practice. Server-side protection against clickjacking is provided by defining and communicating constraints over the use of components such as iframes. However, implementation of protection depends upon browser compliance and enforcement of these constraints. Two mechanisms for server-side clickjacking protection are X-Frame-Options and Content Security Policy.
		</p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/all-labs">Find clickjacking vulnerabilities using Burp Suite's web vulnerability scanner</a></li></ul></div><h3 id="x-frame-options" chunk-id="B99B1939ED4FB2D759D526493C0466CD" cms-ignore-validation="HEADING_CAPITALIZATION">X-Frame-Options</h3><p>
			X-Frame-Options was originally introduced as an unofficial response header in Internet Explorer 8 and it was rapidly adopted within other browsers. The header provides the website owner with control over the use of iframes or objects so that inclusion of a web page within a frame can be prohibited with the <code>deny</code> directive:
		</p><code class="code-scrollable">X-Frame-Options: deny</code><p>
			Alternatively, framing can be restricted to the same origin as the website using the <code>sameorigin</code> directive
		</p><code class="code-scrollable">X-Frame-Options: sameorigin</code><p>
			or to a named website using the <code>allow-from</code> directive:
		</p><code class="code-scrollable">X-Frame-Options: allow-from https://normal-website.com</code><p>
			X-Frame-Options is not implemented consistently across browsers (the <code>allow-from</code> directive is not supported in Chrome version 76 or Safari 12 for example). However, when properly applied in conjunction with Content Security Policy as part of a multi-layer defense strategy it can provide effective protection against clickjacking attacks.
		</p><h3 id="content-security-policy-csp" chunk-id="00ECA0DA609824F5FD2AD0D552E50656" cms-ignore-validation="HEADING_CAPITALIZATION">Content Security Policy (CSP)</h3><p>
			Content Security Policy (CSP) is a detection and prevention mechanism that provides mitigation against attacks such as XSS and clickjacking. CSP is usually implemented in the web server as a return header of the form:
		</p><code class="code-scrollable">Content-Security-Policy: policy</code><p>
			where policy is a string of policy directives separated by semicolons. The CSP provides the client browser with information about permitted sources of web resources that the browser can apply to the detection and interception of malicious behaviors.
		</p><p id="content-security-policy-csp-F4H7" chunk-id="3D14DEFB9A5140F15CB44471B6746B38">
			The recommended clickjacking protection is to incorporate the <code>frame-ancestors</code> directive in the application's Content Security Policy. The <code>frame-ancestors 'none'</code> directive is similar in behavior to the X-Frame-Options <code>deny</code> directive. The <code>frame-ancestors 'self'</code> directive is broadly equivalent to the X-Frame-Options <code>sameorigin</code> directive. The following CSP whitelists frames to the same domain only:
		</p><code class="code-scrollable">Content-Security-Policy: frame-ancestors &#39;self&#39;;</code><p>
			Alternatively, framing can be restricted to named sites:
		</p><code class="code-scrollable">Content-Security-Policy: frame-ancestors normal-website.com;</code><p>
			To be effective against clickjacking and XSS, CSPs need careful development, implementation and testing and should be used as part of a multi-layer defense strategy.
		</p><div class="highlightedarea">
            <h4>Read more</h4>
            
        <ul><li><a href="/web-security/cross-site-scripting/content-security-policy#protecting-against-clickjacking-using-csp">Protecting against clickjacking using CSP</a></li></ul></div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
