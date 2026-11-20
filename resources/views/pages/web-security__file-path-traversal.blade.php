@extends('layouts.academy')

@section('title', 'What is path traversal, and how to prevent it? | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pswebsecacademy.css')

@section('academy_body')
@verbatim
<div class="wrapper-large">
    <div class="container-academy">

        <input class="nav-lhs-toggle-input" type="checkbox" id="nav-lhs-toggle">
        <aside class="nav-lhs" id="tree-nav" tree-nav-version="21">
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
        <h3>Path traversal</h3>
        <ul>
            <li><a href="/web-security/file-path-traversal#what-is-path-traversal">What is path traversal?</a></li>
            <li><a href="/web-security/file-path-traversal#reading-arbitrary-files-via-path-traversal">Reading arbitrary files via path traversal</a></li>
            <li><a href="/web-security/file-path-traversal#common-obstacles-to-exploiting-path-traversal-vulnerabilities">Common obstacles</a></li>
            <li><a href="/web-security/file-path-traversal#how-to-prevent-a-path-traversal-attack">Preventing</a></li>
            <li><a href="/web-security/all-labs#path-traversal">View all path traversal labs</a></li>
        </ul>
    
            </nav>
        </aside>
        <main>
            



<ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security"><span itemprop="name">Web Security Academy</span></a><meta itemprop="position" content="1" /></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/web-security/file-path-traversal"><span itemprop="name">Path traversal</span></a><meta itemprop="position" content="2" /></li></ul>    <div class="section theme-white">

        <h1 class="heading-2">Path traversal</h1><p>
    In this section, we explain:
</p><ul>
    <li>
        What path traversal is.
    </li>
    <li>
        How to carry out path traversal attacks and circumvent common obstacles.
    </li>
    <li>
        How to prevent path traversal vulnerabilities.
    </li>
</ul><img alt="Path traversal" src="/web-security/images/directory-traversal.svg"><div class="highlightedarea">
    <h4>Labs</h4>
    <p>
        If you're familiar with the basic concepts behind path traversal and want to practice exploiting them on some realistic, deliberately vulnerable targets, you can access labs in this topic from the link below.
    </p>

    <ul><li><a href="/web-security/all-labs#path-traversal">View all path traversal labs</a></li></ul></div><h2 id="what-is-path-traversal" chunk-id="BE60978E3A282FCFF0E233BFD8482619">What is path traversal?</h2><div class="container-columns-auto">
    <p cms-metadescription="">
        Path traversal is also known as directory traversal. These vulnerabilities enable an attacker to read arbitrary files on the server that is running an application. This might include:
    </p>
    <ul>
        <li>
            Application code and data.
        </li>
        <li>
            Credentials for back-end systems.
        </li>
        <li>
            Sensitive operating system files.
        </li>
    </ul>
    <p>
        In some cases, an attacker might be able to write to arbitrary files on the server, allowing them to modify application data or behavior, and ultimately take full control of the server.
    </p>
</div><div class="youtube-wrapper text-center"><iframe src="https://www.youtube.com/embed/NQwUDLMOrHo?origin=https://portswigger.net&rel=0" allowfullscreen=""></iframe></div><h2 id="reading-arbitrary-files-via-path-traversal" chunk-id="324F4AEC72719F69A7101B3FD47F7FC2">Reading arbitrary files via path traversal</h2><p>
    Imagine a shopping application that displays images of items for sale. This might load an image using the following HTML:
</p><code class="code-scrollable">&lt;img src=&quot;/loadImage?filename=218.png&quot;&gt;</code><p>
    The <code>loadImage</code> URL takes a <code>filename</code> parameter and returns the contents of the specified file. The image files are stored on disk in the location <code>/var/www/images/</code>. To return an image, the application appends the requested filename to this base directory and uses a filesystem API to read the contents of the file. In other words, the application reads from the following file path:
</p><code class="code-scrollable">/var/www/images/218.png</code><p>
    This application implements no defenses against path traversal attacks. As a result, an attacker can request the following URL to retrieve the <code>/etc/passwd</code> file from the server's filesystem:
</p><code class="code-scrollable">https://insecure-website.com/loadImage?filename=../../../etc/passwd</code><p>
    This causes the application to read from the following file path:
</p><code class="code-scrollable">/var/www/images/../../../etc/passwd</code><p>
    The sequence <code>../</code> is valid within a file path, and means to step up one level in the directory structure. The three consecutive <code>../</code> sequences step up from <code>/var/www/images/</code> to the filesystem root, and so the file that is actually read is:
</p><code class="code-scrollable">/etc/passwd</code><p>
    On Unix-based operating systems, this is a standard file containing details of the users that are registered on the server, but an attacker could retrieve other arbitrary files using the same technique.
</p><p>
    On Windows, both <code>../</code> and <code>..\</code> are valid directory traversal sequences. The following is an example of an equivalent attack against a Windows-based server:
</p><code class="code-scrollable">https://insecure-website.com/loadImage?filename=..\..\..\windows\win.ini</code>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '1EB25C72BBA9C28A06EF2EE3F090ECB4AB93ADF38414A9D0AE9F017F2208B937'])@verbatim<h2 id="common-obstacles-to-exploiting-path-traversal-vulnerabilities" chunk-id="32B7EF0938E6D35F3700BD6A43527ED7">Common obstacles to exploiting path traversal vulnerabilities</h2><p>Many applications that place user input into file paths implement defenses against path traversal attacks. These can often be bypassed.</p><p>If an application strips or blocks directory traversal sequences from the user-supplied filename, it might be possible to bypass the defense using a variety of techniques.</p><p>You might be able to use an absolute path from the filesystem root, such as <code>filename=/etc/passwd</code>, to directly reference a file without using any traversal sequences.</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '9901AEA6B495868D278AFD6098C443F412658D4BB95B4B7A22066BF79E0C6259'])@verbatim<p id="common-obstacles-to-exploiting-path-traversal-vulnerabilities-C3D4" chunk-id="A157D99A7BD446704E97FCB028B0BE1C">You might be able to use nested traversal sequences, such as <code>....//</code> or <code>....\/</code>. These revert to simple traversal sequences when the inner sequence is stripped.</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '18706D204E31E279885E0113EC3B6474DDAAAC7690C0A0DCE2B84DB0119691FE'])@verbatim<p id="common-obstacles-to-exploiting-path-traversal-vulnerabilities-D4E5" chunk-id="77CB8710C724486A2187B246CDD80ABF">In some contexts, such as in a URL path or the <code>filename</code> parameter of a <code>multipart/form-data</code> request, web servers may strip any directory traversal sequences before passing your input to the application. You can sometimes bypass this kind of sanitization by URL encoding, or even double URL encoding, the <code>../</code> characters. This results in <code>%2e%2e%2f</code> and <code>%252e%252e%252f</code> respectively. Various non-standard encodings, such as <code>..%c0%af</code> or <code>..%ef%bc%8f</code>, may also work.</p><p>For Burp Suite Professional users, Burp Intruder provides the predefined payload list <strong>Fuzzing - path traversal</strong>. This contains some encoded path traversal sequences that you can try.</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '0FF4CB8691CFFF7DC5D2C45682D859B9A5C3BA47CB98E42AA05A3391CD0CFC03'])@verbatim<p id="common-obstacles-to-exploiting-path-traversal-vulnerabilities-E5F6" chunk-id="D9F0016343885B877D46B3285B88BD57">An application may require the user-supplied filename to start with the expected base folder, such as <code>/var/www/images</code>. In this case, it might be possible to include the required base folder followed by suitable traversal sequences. For example: <code>filename=/var/www/images/../../../etc/passwd</code>.</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '7F09A80EC4CA0ACDBE9E0FD29231B98A8249B834AC60B8E2B296B470AD0F82A5'])@verbatim<p id="common-obstacles-to-exploiting-path-traversal-vulnerabilities-F6G7" chunk-id="90266C091F37D9C1D70C2A894B34F0FE">An application may require the user-supplied filename to end with an expected file extension, such as <code>.png</code>. In this case, it might be possible to use a null byte to effectively terminate the file path before the required extension. For example: <code>filename=../../../etc/passwd%00.png</code>.</p>@endverbatim@include('partials.widget', ['id' => 'academy-labstatus', 'labId' => '563206D375AAE19B45B636FBD08FAF36892E8229B2F84D5908110BBDB7798561'])@verbatim<h2 id="how-to-prevent-a-path-traversal-attack" chunk-id="DA3F122C8B45FBA7B99F4442CAEE4898">How to prevent a path traversal attack</h2><p>
    The most effective way to prevent path traversal vulnerabilities is to avoid passing user-supplied input to filesystem APIs altogether. Many application functions that do this can be rewritten to deliver the same behavior in a safer way.
</p><p>
    If you can't avoid passing user-supplied input to filesystem APIs, we recommend using two layers of defense to prevent attacks:
</p><ul>
    <li>
        Validate the user input before processing it. Ideally, compare the user input with a whitelist of permitted values. If that isn't possible, verify that the input contains only permitted content, such as alphanumeric characters only.
    </li>
    <li>
        After validating the supplied input, append the input to the base directory and use a platform filesystem API to canonicalize the path. Verify that the canonicalized path starts with the expected base directory.
    </li>
</ul><p>
    Below is an example of some simple Java code to validate the canonical path of a file based on user input:
</p><code class="code-scrollable">File file = new File(BASE_DIRECTORY, userInput);
if (file.getCanonicalPath().startsWith(BASE_DIRECTORY)) {
    // process file
}</code><div class="highlightedarea">
            <h4>Read more</h4>

    <ul><li><a href="/web-security/all-labs">Find directory traversal vulnerabilities using Burp Suite's web vulnerability scanner</a></li></ul></div>
        
        @endverbatim@include('partials.widget', ['id' => 'academy-registration-footer'])@verbatim
    
    </div>


    
    
    

            
        </main>
    </div>
</div>
@endverbatim
@endsection
