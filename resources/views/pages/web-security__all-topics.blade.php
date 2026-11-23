@extends('layouts.academy')

@php $isId = ($uiLocale ?? app()->getLocale()) === 'id'; @endphp
@section('title', ($isId ? 'Semua Materi Keamanan Web' : 'All Web Security Academy topics').' | '.(config('app.name') ?: 'SecDevLab'))
@section('legacy_css', '/content/psgenerictheme.css')

@section('academy_body')
<div class="wrapper" id="academy-started">

            <div class="section-full-width theme-white">
                <h1 cms-ignore-validation="DUPLICATE_HEADINGS" id="all-topics" class="heading2">{{ $isId ? 'Semua topik materi' : 'All topics' }}</h1>
                <p>
                    @if ($isId)
                        Bagi pemula di bidang keamanan web, memulai dari materi yang tepat bisa terasa membingungkan. Pelajari topik berikut secara berurutan sambil mengerjakan lab latihannya, dan lanjutkan ke topik berikutnya bila menemui kendala. Untuk panduan lebih terarah, lihat halaman <a href="/web-security/learning-paths">jalur belajar</a>.
                    @else
                        If you're new to web security, it can be difficult to know where to begin. We recommend working through the topics available, completing the labs as you go, but don't be afraid to move on to the next topic if you get stuck. You can go back to the more challenging labs once you've developed your skills further. If you want more guided support, please see our <a href="/web-security/learning-paths">learning paths</a>.
                    @endif
                </p>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <h2 id="server-side-topics">{{ $isId ? 'Topik sisi server' : 'Server-side topics' }}</h2>
                <p class="intro">
                    @if ($isId)
                        Untuk pemula, topik sisi server menjadi titik awal yang pas karena logikanya berfokus pada proses di backend. Materi dan lab pada bagian ini membentuk dasar teknis penting untuk pengujian selanjutnya.
                    @else
                        For complete beginners, we recommend starting with our server-side topics. These vulnerabilities are typically easier to learn because you only need to understand what's happening on the server. Our materials and labs will help you develop some of the core knowledge and skills that you will rely on time after time.
                    @endif
                </p>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/sql-injection">
                        <h3>SQL injection</h3>
                        <p>
                            @if ($isId)
                                SQL injection merupakan kerentanan klasik yang masih sering memicu kebocoran data berskala besar. Konsep dasarnya mudah dipelajari namun dampaknya berat, menjadikannya topik awal yang penting bagi pemula maupun penguji berpengalaman.
                            @else
                                SQL injection is an old-but-gold vulnerability responsible for many high-profile data breaches. Although relatively simple to learn, it can potentially be used for some high-severity exploits. This makes it an ideal first topic for beginners, and essential knowledge even for more experienced users.
                            @endif
                        </p>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">18 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                </div>
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/authentication">
                        <h3>{{ $isId ? 'Autentikasi' : 'Authentication' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">14 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/file-path-traversal">
                        <h3>Path traversal</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">6 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/os-command-injection">
                        <h3>Command injection</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">5 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/logic-flaws">
                        <h3>{{ $isId ? 'Kerentanan logika bisnis' : 'Business logic vulnerabilities' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">11 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/information-disclosure">
                        <h3>{{ $isId ? 'Kebocoran informasi' : 'Information disclosure' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">5 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/access-control">
                        <h3>{{ $isId ? 'Kontrol akses' : 'Access control' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">13 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/file-upload">
                        <h3>{{ $isId ? 'Kerentanan unggah berkas' : 'File upload vulnerabilities' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">7 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/race-conditions">
                        <h3>Race conditions</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">6 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/ssrf">
                        <h3>Server-side request forgery (SSRF)</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">7 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/xxe">
                        <h3>XXE injection</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">9 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/nosql-injection">
                        <h3>NoSQL injection</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">4 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/api-testing">
                        <h3>{{ $isId ? 'Pengujian API' : 'API testing' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">5 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/web-cache-deception">
                        <h3>Web cache deception</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">5 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                </div>
                <hr>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <h2 id="client-side-topics">{{ $isId ? 'Topik sisi klien' : 'Client-side topics' }}</h2>
                <p class="intro">
                    @if ($isId)
                        Kerentanan sisi klien menuntut pemahaman perilaku browser di atas keterampilan sisi server. Bagian ini melatih Anda mendeteksi dan mengeksploitasi vektor serangan pada sisi browser.
                    @else
                        Client-side vulnerabilities introduce an additional layer of complexity, which can make them slightly more challenging. These materials and labs will help you build on the server-side skills you've already learned and teach you how to identify and exploit some gnarly client-side vectors as well.
                    @endif
                </p>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/cross-site-scripting">
                        <h3>Cross-site scripting (XSS)</h3>
                        <p>
                            @if ($isId)
                                XSS merupakan salah satu celah paling umum sekaligus berdampak tinggi bila dirangkai dengan serangan lain. Topik ini memuat latihan mulai dari tingkat dasar hingga kasus lanjutan.
                            @else
                                Simply put, XSS is one of the most important vulnerabilities out there. It's both incredibly common and extremely powerful, especially when used as part of a wider exploit chain. This is a huge topic, with plenty of labs for complete beginners and seasoned pros alike.
                            @endif
                        </p>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">30 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                </div>
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/csrf">
                        <h3>Cross-site request forgery (CSRF)</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">12 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/cors">
                        <h3>Cross-origin resource sharing (CORS)</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">3 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/clickjacking">
                        <h3>Clickjacking</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">5 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/dom-based">
                        <h3>{{ $isId ? 'Kerentanan berbasis DOM' : 'DOM-based vulnerabilities' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">7 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/websockets">
                        <h3>WebSockets</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">3 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                </div>
                <hr>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <h2 id="advanced-topics">{{ $isId ? 'Topik lanjutan' : 'Advanced topics' }}</h2>
                <p class="intro">
                    @if ($isId)
                        Topik berikut membutuhkan pemahaman arsitektur yang lebih luas sebelum dipraktikkan. Kuasai materi dasar terlebih dahulu sebelum mengerjakan skenario lanjutan ini.
                    @else
                        These topics aren't necessarily more difficult to master but they generally require deeper understanding and a wider breadth of knowledge. We recommend getting to grips with the basics before tackling these labs, some of which are based on pioneering techniques discovered by our research team.
                    @endif
                </p>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/deserialization">
                        <h3>Insecure deserialization</h3>
                        <p>
                            @if ($isId)
                                Deserialisasi kerap dianggap rumit, padahal pola eksploitasinya dapat dipelajari secara bertahap untuk menemukan bug berisiko tinggi yang sering terlewat saat pengujian biasa.
                            @else
                                Deserialization has a reputation for being difficult to get your head around but it can be much easier to exploit than you might think. We'll guide you through the process step-by-step so you can pick off some high-severity bugs that even experienced testers may have missed altogether.
                            @endif
                        </p>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">10 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                </div>
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/llm-attacks">
                        <h3>{{ $isId ? 'Serangan Web LLM' : 'Web LLM attacks' }}</h3>
                        <span class="label-light-green-small">{{ $isId ? 'Lab baru tersedia' : 'New labs added' }}</span>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">7 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/graphql">
                        <h3>{{ $isId ? 'Kerentanan API GraphQL' : 'GraphQL API vulnerabilities' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">5 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/server-side-template-injection">
                        <h3>Server-side template injection</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">7 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/web-cache-poisoning">
                        <h3>Web cache poisoning</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">13 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/host-header">
                        <h3>{{ $isId ? 'Serangan HTTP Host header' : 'HTTP Host header attacks' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">7 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/request-smuggling">
                        <h3>HTTP request smuggling</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">22 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/oauth">
                        <h3>{{ $isId ? 'Autentikasi OAuth' : 'OAuth authentication' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">6 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/jwt">
                        <h3>{{ $isId ? 'Serangan JWT' : 'JWT attacks' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">8 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/prototype-pollution">
                        <h3>Prototype pollution</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">10 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                    <a href="/web-security/essential-skills">
                        <h3>{{ $isId ? 'Keterampilan dasar' : 'Essential skills' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Go to topic' }}</div>
                            <sup class="text-right">2 {{ $isId ? 'Lab' : 'Labs' }}</sup>
                        </div>
                    </a>
                </div>
                <hr>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <p class="heading-2">{{ config('app.name') ?: 'SecDevLab' }} Certified Practitioner</p>
                <p class="intro">
                    @if ($isId)
                        Ujian sertifikasi praktis menguji pemecahan masalah tanpa petunjuk. Disarankan menyelesaikan seluruh lab tingkat Apprentice dan Practitioner sebelum mencobanya.
                    @else
                        The SecDevLab Certified Practitioner exam is challenging, and heavily focused on problem-solving. To pass the exam, you will need to demonstrate a number of skills and abilities. We advise that you need to be able to complete all "Apprentice" and "Practitioner" level labs, so at this point in the learning path you're in a great position to give it a go.
                    @endif
                </p>
            </div>

            <div class="section theme-white">
                <h3 cms-ignore-validation="DUPLICATE_HEADINGS">{{ $isId ? 'Tantangan lab misteri' : 'Mystery lab challenge' }}</h3>
                <p>
                    @if ($isId)
                        Berbeda dari latihan biasa, saat ujian Anda tidak diberi tahu jenis kerentanan yang harus dicari. Gunakan peluncur lab misteri di bawah ini untuk mencoba tantangan acak tanpa konteks awal.
                    @else
                        Unlike when you complete labs on the Web Security Academy, during the exam you'll have no prior knowledge of the type of vulnerability that you need to find and exploit. Use the mystery lab challenge below to spin up a randomized lab that you'll have to try and work out how to solve with no context, just like in the exam.
                    @endif
                </p>
                <p>
                    @if ($isId)
                        Pada sebagian lab, tersedia akun uji <code>wiener:peter</code>. Bila berhasil mengidentifikasi username target, manfaatkan daftar kata <a href="/web-security/authentication/auth-lab-usernames">username</a> dan <a href="/web-security/authentication/auth-lab-passwords">password</a> berikut.
                    @else
                        In some of the labs, you have access to your own account with the credentials <code>wiener:peter</code>. If you can enumerate usernames, you may also be able to brute-force the login using the following <a href="/web-security/authentication/auth-lab-usernames">username</a> and <a href="/web-security/authentication/auth-lab-passwords">password</a> wordlists.
                    @endif
                </p>
                @include('partials.widget', ['id' => 'academy-launch-mystery-lab'])
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/certification">
                        <h3>{{ $isId ? 'Ujian sertifikasi' : 'The certification exam' }}</h3>
                        <p>
                            @if ($isId)
                                Untuk meraih sertifikat praktis, peserta mengerjakan beberapa tantangan eksploitasi web berbatas waktu guna membuktikan pemahaman celah dan teknik penyelesaiannya.
                            @else
                                In order to become a SecDevLab Certified Practitioner, you will need to undertake (and successfully pass) a four hour exam. This exam will consist of multiple practical challenges, designed to test your knowledge of vulnerabilities as well as your ability to exploit them.
                            @endif
                        </p>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Lihat detail' : 'Find out more' }}</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="section-full-width theme-grey-5 text-center">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/certification/practice-exam">
                        <h3>{{ $isId ? 'Latihan ujian praktik' : 'Prepare with the practice exam' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Mulai latihan ujian' : 'Take practice exam' }}</div>
                        </div>
                    </a>
                    <a href="/web-security/certification/how-it-works">
                        <h3>{{ $isId ? 'Pahami alur ujian' : 'Understand the exam process' }}</h3>
                        <div class="container-columns">
                            <div class="chevron-after">{{ $isId ? 'Lihat detail' : 'Find out more' }}</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="section-full-width theme-grey-5">
                <div class="container-cards-white-medium-space-between">
                    <a href="/web-security/dashboard">
                        <h3>{{ $isId ? 'Dasbor peserta' : 'User dashboard' }}</h3>
                        <div class="chevron-after">{{ $isId ? 'Selengkapnya' : 'Read more' }}</div>
                    </a>
                    <a href="/web-security/hall-of-fame">
                        <h3 cms-ignore-validation="HEADING_CAPITALIZATION">{{ $isId ? 'Papan Peringkat' : 'Hall of Fame' }}</h3>
                        <div class="chevron-after">{{ $isId ? 'Selengkapnya' : 'Read more' }}</div>
                    </a>
                    <a href="/web-security/getting-started">
                        <h3>{{ $isId ? 'Panduan memulai' : 'Getting started guide' }}</h3>
                        <div class="chevron-after">{{ $isId ? 'Selengkapnya' : 'Read more' }}</div>
                    </a>
                </div>
            </div>
    </div>
@endsection
