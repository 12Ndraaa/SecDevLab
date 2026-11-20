@extends('layouts.academy')

@section('title', 'Insecure deserialization | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="18">
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
        <h3>Insecure deserialization</h3>
        <ul>
            <li><a href="/web-security/deserialization#what-is-serialization">What is serialization?</a></li>
            <li><a href="/web-security/deserialization#serialization-vs-deserialization">Serialization vs deserialization</a></li>
            <li><a href="/web-security/deserialization#what-is-insecure-deserialization">What is insecure deserialization?</a></li>
            <li><a href="/web-security/deserialization#how-do-insecure-deserialization-vulnerabilities-arise">How vulnerabilities arise</a></li>
            <li><a href="/web-security/deserialization#what-is-the-impact-of-insecure-deserialization">Impact</a></li>
            <li>
                <input type="checkbox" id="sub-nav-id-1">
                <label for="sub-nav-id-1">
                    <a href="/web-security/deserialization/exploiting#how-to-identify-insecure-deserialization">Identifying</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li><a href="/web-security/deserialization/exploiting#php-serialization-format">PHP serialization format</a></li>
                    <li><a href="/web-security/deserialization/exploiting#java-serialization-format">Java serialization format</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="sub-nav-id-2">
                <label for="sub-nav-id-2">
                    <a href="/web-security/deserialization/exploiting">Exploiting</a>
                    <span class="icon-arrow-head-down"></span>
                </label>
                <ul>
                    <li>
                        <input type="checkbox" id="sub-nav-id-3">
                        <label for="sub-nav-id-3">
                            <a href="/web-security/deserialization/exploiting#manipulating-serialized-objects">Manipulating serialized objects</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/deserialization/exploiting#modifying-object-attributes">Object attributes</a></li>
                            <li><a href="/web-security/deserialization/exploiting#modifying-data-types">Data types</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/deserialization/exploiting#using-application-functionality">Using application functionality</a></li>
                    <li><a href="/web-security/deserialization/exploiting#magic-methods">Magic methods</a></li>
                    <li><a href="/web-security/deserialization/exploiting#injecting-arbitrary-objects">Injecting arbitrary objects</a></li>
                    <li>
                        <input type="checkbox" id="sub-nav-id-4">
                        <label for="sub-nav-id-4">
                            <a href="/web-security/deserialization/exploiting#gadget-chains">Gadget chains</a>
                            <span class="icon-arrow-head-down"></span>
                        </label>
                        <ul>
                            <li><a href="/web-security/deserialization/exploiting#working-with-pre-built-gadget-chains">Pre-built gadget chains</a></li>
                            <li><a href="/web-security/deserialization/exploiting#working-with-documented-gadget-chains">Documented gadget chains</a></li>
                        </ul>
                    </li>
                    <li><a href="/web-security/deserialization/exploiting#creating-your-own-exploit">Creating your own exploit</a></li>
                    <li><a href="/web-security/deserialization/exploiting#phar-deserialization">PHAR deserialization</a></li>
                    <li><a href="/web-security/deserialization/exploiting#exploiting-deserialization-using-memory-corruption">Memory corruption</a></li>
                </ul>
            </li>
            <li><a href="/web-security/deserialization#how-to-prevent-insecure-deserialization-vulnerabilities">Preventing vulnerabilities</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/deserialization"><span itemprop="name">Insecure deserialization</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Insecure deserialization</h1><p>
            In this section, we'll cover what insecure deserialization is and describe how it can potentially expose websites to high-severity attacks. We'll highlight typical scenarios and demonstrate some widely applicable techniques using concrete examples of PHP, Ruby, and Java deserialization. We'll also look at some ways that you can avoid insecure deserialization vulnerabilities in your own websites.
        </p><img alt="Insecure deserialization infographic" src="/web-security/images/deserialization-infographic.jpg"><div class="highlightedarea">
            <h4>Labs</h4>
            <p>
                If you're already familiar with the basic concepts behind deserialization vulnerabilities and just want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access all of the labs in this topic from the link below.
            </p>
            
        <ul><li><a href="/web-security/all-labs#insecure-deserialization">View all deserialization labs</a></li></ul></div><h2 id="what-is-serialization">What is serialization?</h2><p>
            <strong>Serialization</strong> is the process of converting complex data structures, such as objects and their fields, into a &quot;flatter&quot; format that can be sent and received as a sequential stream of bytes. Serializing data makes it much simpler to:
        </p><ul>
			<li>
				Write complex data to inter-process memory, a file, or a database
			</li>
			<li>
				Send complex data, for example, over a network, between different components of an application, or in an API call
			</li>
		</ul><p>
            Crucially, when serializing an object, its state is also persisted. In other words, the object's attributes are preserved, along with their assigned values.
        </p><h3 id="serialization-vs-deserialization">Serialization vs deserialization</h3><p>
            <strong>Deserialization</strong> is the process of restoring this byte stream to a fully functional replica of the original object, in the exact state as when it was serialized. The website's logic can then interact with this deserialized object, just like it would with any other object.
        </p><img alt="Diagram of serialization and deserialization" src="/web-security/images/deserialization-diagram.jpg"><p>
            Many programming languages offer native support for serialization. Exactly how objects are serialized depends on the language. Some languages serialize objects into binary formats, whereas others use different string formats, with varying degrees of human readability. Note that all of the original object's attributes are stored in the serialized data stream, including any private fields. To prevent a field from being serialized, it must be explicitly marked as &quot;transient&quot; in the class declaration.
        </p><p>
            Be aware that when working with different programming languages, serialization may be referred to as marshalling (Ruby) or pickling (Python). These terms are synonymous with &quot;serialization&quot; in this context.
        </p><h2 id="what-is-insecure-deserialization">What is insecure deserialization?</h2><p>
            Insecure deserialization is when user-controllable data is deserialized by a website. This potentially enables an attacker to manipulate serialized objects in order to pass harmful data into the application code.
        </p><p>
            It is even possible to replace a serialized object with an object of an entirely different class. Alarmingly, objects of any class that is available to the website will be deserialized and instantiated, regardless of which class was expected. For this reason, insecure deserialization is sometimes known as an &quot;object injection&quot; vulnerability.
        </p><p>
            An object of an unexpected class might cause an exception. By this time, however, the damage may already be done. Many deserialization-based attacks are completed <strong>before</strong> deserialization is finished. This means that the deserialization process itself can initiate an attack, even if the website's own functionality does not directly interact with the malicious object. For this reason, websites whose logic is based on strongly typed languages can also be vulnerable to these techniques.
        </p><h2 id="how-do-insecure-deserialization-vulnerabilities-arise">How do insecure deserialization vulnerabilities arise?</h2><p>
            Insecure deserialization typically arises because there is a general lack of understanding of how dangerous deserializing user-controllable data can be. Ideally, user input should never be deserialized at all.
        </p><p>
            However, sometimes website owners think they are safe because they implement some form of additional check on the deserialized data. This approach is often ineffective because it is virtually impossible to implement validation or sanitization to account for every eventuality. These checks are also fundamentally flawed as they rely on checking the data after it has been deserialized, which in many cases will be too late to prevent the attack.
        </p><p>
            Vulnerabilities may also arise because deserialized objects are often assumed to be trustworthy. Especially when using languages with a binary serialization format, developers might think that users cannot read or manipulate the data effectively. However, while it may require more effort, it is just as possible for an attacker to exploit binary serialized objects as it is to exploit string-based formats.
        </p><p>
            Deserialization-based attacks are also made possible due to the number of dependencies that exist in modern websites. A typical site might implement many different libraries, which each have their own dependencies as well. This creates a massive pool of classes and methods that is difficult to manage securely. As an attacker can create instances of any of these classes, it is hard to predict which methods can be invoked on the malicious data. This is especially true if an attacker is able to chain together a long series of unexpected method invocations, passing data into a sink that is completely unrelated to the initial source. It is, therefore, almost impossible to anticipate the flow of malicious data and plug every potential hole.
        </p><p>
            In short, it can be argued that it is not possible to securely deserialize untrusted input.
        </p><h2 id="what-is-the-impact-of-insecure-deserialization">What is the impact of insecure deserialization?</h2><p>
            The impact of insecure deserialization can be very severe because it provides an entry point to a massively increased attack surface. It allows an attacker to reuse existing application code in harmful ways, resulting in numerous other vulnerabilities, often remote code execution.
        </p><p>
            Even in cases where remote code execution is not possible, insecure deserialization can lead to privilege escalation, arbitrary file access, and denial-of-service attacks.
        </p><h2 id="how-to-exploit-insecure-deserialization-vulnerabilities">How to exploit insecure deserialization vulnerabilities</h2><p>
            Now that you're familiar with the basics of serialization and deserialization, we can look at how you can exploit insecure deserialization vulnerabilities.
        </p><div class="highlightedarea">
			<h4>Read more</h4>
			
			<ul><li><a href="/web-security/deserialization/exploiting">Exploiting insecure deserialization vulnerabilities</a></li></ul></div><h2 id="how-to-prevent-insecure-deserialization-vulnerabilities">How to prevent insecure deserialization vulnerabilities</h2><p>
            Generally speaking, deserialization of user input should be avoided unless absolutely necessary. The high severity of exploits that it potentially enables, and the difficulty in protecting against them, outweigh the benefits in many cases.
        </p><p>
            If you do need to deserialize data from untrusted sources, incorporate robust measures to make sure that the data has not been tampered with. For example, you could implement a digital signature to check the integrity of the data. However, remember that any checks must take place <strong>before</strong> beginning the deserialization process. Otherwise, they are of little use.
        </p><p>
            If possible, you should avoid using generic deserialization features altogether. Serialized data from these methods contains all attributes of the original object, including private fields that potentially contain sensitive information. Instead, you could create your own class-specific serialization methods so that you can at least control which fields are exposed.
        </p><p>
            Finally, remember that the vulnerability is the deserialization of user input, not the presence of gadget chains that subsequently handle the data. Don't rely on trying to eliminate gadget chains that you identify during testing. It is impractical to try and plug them all due to the web of cross-library dependencies that almost certainly exist on your website. At any given time, publicly documented memory corruption exploits are also a factor, meaning that your application may be vulnerable regardless.
        </p>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
