@verbatim
<aside class="nav-lhs" id="tree-nav" tree-nav-version="26">
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
        <h3>JWT attacks</h3>
        <ul>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/jwt#what-are-jwts">What are JSON web tokens (JWTs)?</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/jwt#jwt-format">Format</a></li>
                    <li><a href="/web-security/jwt#jwt-signature">Signature</a></li>
                    <li><a href="/web-security/jwt#jwt-vs-jws-vs-jwe">JWT vs JWS vs JWE</a></li>
                </ul>
            </li>
            <li><a href="/web-security/jwt#what-are-jwt-attacks">What are JWT attacks?</a></li>
            <li><a href="/web-security/jwt#what-is-the-impact-of-jwt-attacks">Impact of JWT attacks</a></li>
            <li><a href="/web-security/jwt#how-do-vulnerabilities-to-jwt-attacks-arise">How vulnerabilities arise</a></li>
            <li><a href="/web-security/jwt#how-to-work-with-jwts-in-burp-suite">Working with JWTs in Burp Suite</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-3">
                <label for="sub-nav-id-3">
                    <a href="/web-security/jwt#exploiting-flawed-jwt-signature-verification">Exploiting flawed JWT signature verification</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/jwt#accepting-arbitrary-signatures">Accepting arbitrary signatures</a></li>
                    <li><a href="/web-security/jwt#accepting-tokens-with-no-signature">Accepting tokens with no signature</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-4">
                <label for="sub-nav-id-4">
                    <a href="/web-security/jwt#brute-forcing-secret-keys">Brute-forcing secret keys</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/jwt#brute-forcing-secret-keys-using-hashcat">Using hashcat</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-5">
                <label for="sub-nav-id-5">
                    <a href="/web-security/jwt#jwt-header-parameter-injections">JWT header parameter injections</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/jwt#injecting-self-signed-jwts-via-the-jwk-parameter">jwk parameter</a></li>
                    <li><a href="/web-security/jwt#injecting-self-signed-jwts-via-the-jku-parameter">jku parameter</a></li>
                    <li><a href="/web-security/jwt#injecting-self-signed-jwts-via-the-kid-parameter">kid parameter</a></li>
                    <li><a href="/web-security/jwt#other-interesting-jwt-header-parameters">Other parameters</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-6">
                <label for="sub-nav-id-6">
                    <a href="/web-security/jwt/algorithm-confusion">Algorithm confusion attacks</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/jwt/algorithm-confusion#symmetric-vs-asymmetric-algorithms">Symmetric vs asymmetric algorithms</a></li>
                    <li><a href="/web-security/jwt/algorithm-confusion#how-do-algorithm-confusion-vulnerabilities-arise">How algorithm confusion vulnerabilities arise</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-7">
                        <label for="sub-nav-id-7">
                            <a href="/web-security/jwt/algorithm-confusion#performing-an-algorithm-confusion-attack">Performing an attack</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/jwt/algorithm-confusion#step-1-obtain-the-server-s-public-key">Obtain the server's public key</a></li>
                            <li><a href="/web-security/jwt/algorithm-confusion#step-2-convert-the-public-key-to-a-suitable-format">Convert the public key to a suitable format</a></li>
                            <li><a href="/web-security/jwt/algorithm-confusion#step-3-modify-your-jwt">Modify your JWT</a></li>
                            <li><a href="/web-security/jwt/algorithm-confusion#step-4-sign-the-jwt-using-the-public-key">Sign the JWT with the public key</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/jwt/algorithm-confusion#deriving-public-keys-from-existing-tokens">Deriving public keys from existing tokens</a></li>
                </ul>
            </li>
            <li><a href="/web-security/jwt#how-to-prevent-jwt-attacks">Preventing attacks</a></li>
            <li><a href="/web-security/all-labs#jwt">View all JWT labs</a></li>
        </ul>
    
            </nav>
        </aside>
@endverbatim
