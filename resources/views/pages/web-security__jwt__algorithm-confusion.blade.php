@extends('layouts.academy')

@section('title', 'Algorithm confusion attacks | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
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
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/jwt"><span itemprop="name">JWT attacks</span></a><meta itemprop="position" content="2" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/jwt/algorithm-confusion"><span itemprop="name">Algorithm confusion attacks</span></a><meta itemprop="position" content="3" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Algorithm confusion attacks</h1><p>
            Algorithm confusion attacks (also known as key confusion attacks) occur when an attacker is able to force the server to verify the signature of a JSON web token (<a href="/web-security/jwt">JWT</a>) using a different algorithm than is intended by the website's developers. If this case isn't handled properly, this may enable attackers to forge valid JWTs containing arbitrary values without needing to know the server's secret signing key.
        </p><h2 id="symmetric-vs-asymmetric-algorithms">Symmetric vs asymmetric algorithms</h2><p>
            JWTs can be signed using a range of different algorithms. Some of these, such as HS256 (HMAC + SHA-256) use a "symmetric" key. This means that the server uses a single key to both sign and verify the token. Clearly, this needs to be kept secret, just like a password.
        </p><img alt="Signing and verifying JWTs using a symmetric algorithm" src="/web-security/jwt/images/jwt-symmetric-signing-algorithm.jpg"><p>
            Other algorithms, such as RS256 (RSA + SHA-256) use an "asymmetric" key pair. This consists of a private key, which the server uses to sign the token, and a mathematically related public key that can be used to verify the signature.
        </p><img alt="Signing and verifying JWTs using an asymmetric algorithm" src="/web-security/jwt/images/jwt-asymmetric-signing-algorithm.jpg"><p>
            As the names suggest, the private key must be kept secret, but the public key is often shared so that anybody can verify the signature of tokens issued by the server.
        </p><h2 id="how-do-algorithm-confusion-vulnerabilities-arise">How do algorithm confusion vulnerabilities arise?</h2><p>
            Algorithm confusion vulnerabilities typically arise due to flawed implementation of JWT libraries. Although the actual verification process differs depending on the algorithm used, many libraries provide a single, algorithm-agnostic method for verifying signatures. These methods rely on the <code>alg</code> parameter in the token's header to determine the type of verification they should perform.
        </p><p>
            The following pseudo-code shows a simplified example of what the declaration for this generic <code>verify()</code> method might look like in a JWT library:
        </p><code class="code-scrollable">function verify(token, secretOrPublicKey){
    algorithm = token.getAlgHeader();
    if(algorithm == "RS256"){
        // Use the provided key as an RSA public key
    } else if (algorithm == "HS256"){
        // Use the provided key as an HMAC secret key
    }
}</code><p>
            Problems arise when website developers who subsequently use this method assume that it will exclusively handle JWTs signed using an asymmetric algorithm like RS256. Due to this flawed assumption, they may always pass a fixed public key to the method as follows:
        </p><code class="code-scrollable">publicKey = &lt;public-key-of-server&gt;;
token = request.getCookie("session");
verify(token, publicKey);</code><p>
            In this case, if the server receives a token signed using a symmetric algorithm like HS256, the library's generic <code>verify()</code> method will treat the public key as an HMAC secret. This means that an attacker could sign the token using HS256 and the public key, and the server will use the same public key to verify the signature.
        </p><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                The public key you use to sign the token must be absolutely identical to the public key stored on the server. This includes using the same format (such as X.509 PEM) and preserving any non-printing characters like newlines. In practice, you may need to experiment with different formatting in order for this attack to work.
            </p>
        </div><h2 id="performing-an-algorithm-confusion-attack">Performing an algorithm confusion attack</h2><p>
            An algorithm confusion attack generally involves the following high-level steps:
        </p><ol>
            <li>
                <p>
                    <a href="/web-security/jwt/algorithm-confusion#step-1-obtain-the-server-s-public-key">Obtain the server's public key</a>
                </p>
            </li>
            <li>
                <p>
                    <a href="/web-security/jwt/algorithm-confusion#step-2-convert-the-public-key-to-a-suitable-format">Convert the public key to a suitable format</a>
                </p>
            </li>
            <li>
                <p>
                    <a href="/web-security/jwt/algorithm-confusion#step-3-modify-your-jwt">Create a malicious JWT</a> with a modified payload and the <code>alg</code> header set to <code>HS256</code>.
                </p>
            </li>
            <li>
                <p>
                    <a href="/web-security/jwt/algorithm-confusion#step-4-sign-the-jwt-using-the-public-key">Sign the token with HS256</a>, using the public key as the secret.
                </p>
            </li>
        </ol><p>
            In this section, we'll walk through this process in more detail, demonstrating how you can perform this kind of attack using Burp Suite.
        </p><h3 id="step-1-obtain-the-server-s-public-key" cms-ignore-validation="HEADING_CAPITALIZATION">Step 1 - Obtain the server's public key</h3><p>
            Servers sometimes expose their public keys as JSON Web Key (JWK) objects via a standard endpoint mapped to <code>/jwks.json</code> or <code>/.well-known/jwks.json</code>, for example. These may be stored in an array of JWKs called <code>keys</code>. This is known as a JWK Set.
        </p><code class="code-scrollable">{
    "keys": [
        {
            "kty": "RSA",
            "e": "AQAB",
            "kid": "75d0ef47-af89-47a9-9061-7c02a610d5ab",
            "n": "o-yy1wpYmffgXBxhAUJzHHocCuJolwDqql75ZWuCQ_cb33K2vh9mk6GPM9gNN4Y_qTVX67WhsN3JvaFYw-fhvsWQ"
        },
        {
            "kty": "RSA",
            "e": "AQAB",
            "kid": "d8fDFo-fS9-faS14a9-ASf99sa-7c1Ad5abA",
            "n": "fc3f-yy1wpYmffgXBxhAUJzHql79gNNQ_cb33HocCuJolwDqmk6GPM4Y_qTVX67WhsN3JvaFYw-dfg6DH-asAScw"
        }
    ]
}</code><p>
            Even if the key isn't exposed publicly, you may be able to <a href="/web-security/jwt/algorithm-confusion#deriving-public-keys-from-existing-tokens">extract it from a pair of existing JWTs</a>.
        </p><h3 id="step-2-convert-the-public-key-to-a-suitable-format" cms-ignore-validation="HEADING_CAPITALIZATION">Step 2 - Convert the public key to a suitable format</h3><p>
            Although the server may expose their public key in JWK format, when verifying the signature of a token, it will use its own copy of the key from its local filesystem or database. This may be stored in a different format.
        </p><p>
            In order for the attack to work, the version of the key that you use to sign the JWT must be identical to the server's local copy. In addition to being in the same format, every single byte must match, including any non-printing characters.
        </p><p>
            For the purpose of this example, let's assume that we need the key in X.509 PEM format. You can convert a JWK to a PEM using the <a href="https://portswigger.net/bappstore/26aaa5ded2f74beea19e2ed8345a93dd">JWT Editor</a> extension in Burp as follows:
        </p><ol>
            <li>
                <p>
                    With the extension loaded, in Burp's main tab bar, go to the <strong>JWT Editor Keys</strong> tab.
                </p>
            </li>
            <li>
                <p>
                    Click <strong>New RSA</strong> Key. In the dialog, paste the JWK that you obtained earlier.
                </p>
            </li>
            <li>
                <p>
                    Select the <strong>PEM</strong> radio button and copy the resulting PEM key.
                </p>
            </li>
            <li>
                <p>
                    Go to the <strong>Decoder</strong> tab and Base64-encode the PEM.
                </p>
            </li>
            <li>
                <p>
                    Go back to the <strong>JWT Editor Keys</strong> tab and click <strong>New Symmetric Key</strong>.
                </p>
            </li>
            <li>
                <p>
                    In the dialog, click <strong>Generate</strong> to generate a new key in JWK format.
                </p>
            </li>
            <li>
                <p>
                    Replace the generated value for the <code>k</code> parameter with a Base64-encoded PEM key that you just copied.
                </p>
            </li>
            <li>
                <p>
                    Save the key.
                </p>
            </li>
        </ol><h3 id="step-3-modify-your-jwt" cms-ignore-validation="HEADING_CAPITALIZATION">Step 3 - Modify your JWT</h3><p>
            Once you have the public key in a suitable format, you can <a href="/web-security/all-labs">modify the JWT</a> however you like. Just make sure that the <code>alg</code> header is set to <code>HS256</code>.
        </p><h3 id="step-4-sign-the-jwt-using-the-public-key" cms-ignore-validation="HEADING_CAPITALIZATION">Step 4 - Sign the JWT using the public key</h3><p>
            <a href="/web-security/all-labs">Sign the token</a> using the HS256 algorithm with the RSA public key as the secret.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '9D708E568BF709FEA5F6EE5EC1ADEE4A431698058D548D2AAAC268A4DDB4E87A'])@verbatim<h2 id="deriving-public-keys-from-existing-tokens">Deriving public keys from existing tokens</h2><p>
            In cases where the public key isn't readily available, you may still be able to test for algorithm confusion by deriving the key from a pair of existing JWTs. This process is relatively simple using tools such as <code>jwt_forgery.py</code>. You can find this, along with several other useful scripts, on the <a href="https://github.com/silentsignal/rsa_sign2n"><code>rsa_sign2n</code> GitHub repository</a>.
        </p><p>
            We have also created a simplified version of this tool, which you can run as a single command:
        </p><code>
            docker run --rm -it portswigger/sig2n &lt;token1&gt; &lt;token2&gt;
        </code><div class="highlightedarea">
            <h4>Note</h4>
            <p>
                You need the Docker CLI to run either version of the tool. The first time you run this command, it will automatically pull the image from Docker Hub, which may take a few minutes.
            </p>
        </div><p>
            This uses the JWTs that you provide to calculate one or more potential values of <code>n</code>. Don't worry too much about what this means - all you need to know is that only one of these matches the value of <code>n</code> used by the server's key. For each potential value, our script outputs:
        </p><ul>
            <li>
                <p>
                    A Base64-encoded PEM key in both X.509 and PKCS1 format.
                </p>
            </li>
            <li>
                <p>
                    A forged JWT signed using each of these keys.
                </p>
            </li>
        </ul><p>
            To identify the correct key, use Burp Repeater to send a request containing each of the forged JWTs. Only one of these will be accepted by the server. You can then use the matching key to construct an algorithm confusion attack.
        </p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => 'E63829C5FB147E8E34A3E9A001773DB6312F2A223A1062FD226F44290457DA78'])@verbatim<p>
            For more information on how this process works, and details of how to use the standard <code>jwt_forgery.py</code> tool, please refer to the documentation provided in the <a href="https://github.com/silentsignal/rsa_sign2n">repository</a>.
        </p><div class="highlightedarea">
            <h4>Read more</h4>
            <p>
                For more labs, check out the rest of our topic on JWT attacks.
            </p>
            <p>
                <a href="/web-security/jwt">JWT attacks</a>
            </p>
        </div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
