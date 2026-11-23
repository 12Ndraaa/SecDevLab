@extends('layouts.academy')

@php $isId = ($uiLocale ?? app()->getLocale()) === 'id'; @endphp
@section('title', ($isId ? 'Akademi Keamanan Web: Latihan Gratis Offline' : 'Web Security Academy: Free Online Training').' | '.(config('app.name') ?: 'SecDevLab'))
@section('legacy_css', '/content/pslandingpages.css')

@section('academy_body')
<div class="container-section --center --gap-xlarge banner-academy-hero">
            <div class="container2 --width-narrow">
                <img alt="Web Security Academy" src="/web-security/images/landing-page/web-security-academy-logo.svg">
                <div class="container-h1 margin-top-m">
                    <h1 class="charcoal heading-2">{{ $isId ? 'Platform pelatihan keamanan web praktis dan lab CVE' : 'Free, hands-on web security training & CVE lab platform' }}</h1>
                </div>
                @include('partials.widget', ['id' => 'academy-startlearningcta'])
            </div>
        </div><div class="container-section --gap-small --width-fixed">
            <div class="container-keypoints">
                <div>
                    <img alt="{{ $isId ? 'Tingkatkan karier Anda' : 'Boost your career' }}" src="/web-security/images/landing-page/key-feature-icon-target.svg">
                    <div>
                        <p>{{ $isId ? 'Bekal karier keamanan siber' : 'Boost your career' }}</p>
                        <p>{{ $isId ? 'Latihan di Akademi Keamanan Web membantu membangun dasar kuat di bidang keamanan aplikasi.' : 'The Web Security Academy is a strong step toward a career in cybersecurity.' }}</p>
                    </div>
                </div>
                <div>
                    <img alt="{{ $isId ? 'Belajar fleksibel' : 'Flexible learning' }}" src="/web-security/images/landing-page/key-feature-icon-pencil.svg">
                    <div>
                        <p>{{ $isId ? 'Belajar sesuai ritme Anda' : 'Flexible learning' }}</p>
                        <p>{{ $isId ? 'Akses materi dan lab interaktif kapan saja dengan pelacakan progres otomatis.' : 'Learn anywhere, anytime, with free interactive labs and progress-tracking.' }}</p>
                    </div>
                </div>
                <div>
                    <img alt="{{ $isId ? 'Materi terkurasi' : 'Learn from experts' }}" src="/web-security/images/landing-page/key-feature-icon-book.svg">
                    <div>
                        <p>{{ $isId ? 'Materi teknis mendalam' : 'Learn from experts' }}</p>
                        <p>{{ $isId ? 'Disusun berdasarkan riset kerentanan web dan teknik eksploitasi yang teruji.' : "Produced by a world-class team - led by the author of The Web Application Hacker's Handbook." }}</p>
                    </div>
                </div>
            </div>
        </div><div class="section-full-width theme-white">
            <div class="container-columns-block">
                <a class="" href="/web-security/llm-attacks/ai-powered-scanner-vulnerabilities">
                    <img alt="AI-powered scanner vulnerabilities" class="desktop-show" src="/web-security/dashboard/images/hero-academy-getting-started-light-blue.jpg">
                    <div>
                        <h2>{{ $isId ? 'Lab baru: kerentanan pemindai berbasis AI' : 'New labs: AI-powered scanner vulnerabilities' }}</h2>
                        <p>
                            @if ($isId)
                                Pelajari bagaimana indirect prompt injection dapat memanipulasi pemindai aplikasi berbasis AI untuk menjalankan aksi tidak sah, membocorkan data, dan mengirim permintaan internal tanpa izin.
                            @else
                                Learn how indirect prompt injection can be used to manipulate AI-powered web application scanners into performing unintended actions, exfiltrating sensitive data, and making unauthorized internal requests.
                            @endif
                        </p>
                        <span class="chevron-after">{{ $isId ? 'Pelajari lebih lanjut' : 'Learn more' }}</span>
                    </div>
                </a>
            </div>
        </div><div class="container-section --center --gap-xlarge container-academy-vulnerabilities">
            <div class="container2 --width-fixed">
                <h2 id="learning-materials-and-labs">{{ $isId ? 'Materi belajar dan lab' : 'Learning materials and labs' }}</h2>
                <div class="container-cards-academy">
                    <input id="vulnerabilities-latest-1" type="radio" class="hidden ph-no-capture" name="slider-vulnerabilities-latest" value="1" checked="checked">
                    <input id="vulnerabilities-latest-2" type="radio" class="hidden ph-no-capture" name="slider-vulnerabilities-latest" value="2">
                    <input id="vulnerabilities-latest-3" type="radio" class="hidden ph-no-capture" name="slider-vulnerabilities-latest" value="3">
                    <input id="vulnerabilities-latest-4" type="radio" class="hidden ph-no-capture" name="slider-vulnerabilities-latest" value="4">
                    <p>{{ $isId ? 'Terbaru' : 'Latest' }}</p>
                    <div>
                        <div class="container-cards__nav-previous">
                            <label for="vulnerabilities-latest-1"></label>
                            <label for="vulnerabilities-latest-2"></label>
                            <label for="vulnerabilities-latest-3"></label>
                            <label for="vulnerabilities-latest-4"></label>
                        </div>
                        <a class="item-4 card-requestsmuggling" href="/web-security/web-cache-deception">
                            <div>
                                <p>Web cache deception</p>
                                <p>5 {{ $isId ? 'lab' : 'labs' }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                    <g transform="translate(-617.419 -1116.68)">
                                        <g transform="translate(618.419 1117.68)">
                                            <g>
                                                <path d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="none" stroke="#f63" stroke-width="2"></path>
                                            </g>
                                            <path d="M621.475,1126.156l6.121,7.564-6.121,7.435" transform="translate(-607.762 -1117.317)" fill="none" stroke="#f63" stroke-miterlimit="10" stroke-width="2"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </a>
                        <a class="item-1 card-ssrf" href="/web-security/llm-attacks">
                            <div>
                                <p>Web LLM attacks</p>
                                <p>7 {{ $isId ? 'lab' : 'labs' }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                    <g transform="translate(-617.419 -1116.68)">
                                        <g transform="translate(618.419 1117.68)">
                                            <g>
                                                <path d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="none" stroke="#f63" stroke-width="2"></path>
                                            </g>
                                            <path d="M621.475,1126.156l6.121,7.564-6.121,7.435" transform="translate(-607.762 -1117.317)" fill="none" stroke="#f63" stroke-miterlimit="10" stroke-width="2"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </a>
                        <a class="item-2 card-clickjacking" href="/web-security/api-testing">
                            <div>
                                <p>API testing</p>
                                <p>5 {{ $isId ? 'lab' : 'labs' }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                    <g transform="translate(-617.419 -1116.68)">
                                        <g transform="translate(618.419 1117.68)">
                                            <g>
                                                <path d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="none" stroke="#f63" stroke-width="2"></path>
                                            </g>
                                            <path d="M621.475,1126.156l6.121,7.564-6.121,7.435" transform="translate(-607.762 -1117.317)" fill="none" stroke="#f63" stroke-miterlimit="10" stroke-width="2"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </a>
                        <a class="item-3 card-websockets" href="/web-security/nosql-injection">
                            <div>
                                <p>NoSQL injection</p>
                                <p>4 {{ $isId ? 'lab' : 'labs' }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                    <g transform="translate(-617.419 -1116.68)">
                                        <g transform="translate(618.419 1117.68)">
                                            <g>
                                                <path d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="none" stroke="#f63" stroke-width="2"></path>
                                            </g>
                                            <path d="M621.475,1126.156l6.121,7.564-6.121,7.435" transform="translate(-607.762 -1117.317)" fill="none" stroke="#f63" stroke-miterlimit="10" stroke-width="2"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </a>
                        <div class="container-cards__nav-next">
                            <label for="vulnerabilities-latest-1"></label>
                            <label for="vulnerabilities-latest-2"></label>
                            <label for="vulnerabilities-latest-3"></label>
                            <label for="vulnerabilities-latest-4"></label>
                        </div>
                        <div class="container-cards__indicators">
                            <label for="vulnerabilities-latest-1"></label>
                            <label for="vulnerabilities-latest-2"></label>
                            <label for="vulnerabilities-latest-3"></label>
                            <label for="vulnerabilities-latest-4"></label>
                        </div>
                    </div>
                </div>
                <div class="container-cards-academy">
                    <input id="vulnerabilities-featured-1" type="radio" class="hidden ph-no-capture" name="slider-vulnerabilities-featured" value="1" checked="checked">
                    <input id="vulnerabilities-featured-2" type="radio" class="hidden ph-no-capture" name="slider-vulnerabilities-featured" value="2">
                    <input id="vulnerabilities-featured-3" type="radio" class="hidden ph-no-capture" name="slider-vulnerabilities-featured" value="3">
                    <input id="vulnerabilities-featured-4" type="radio" class="hidden ph-no-capture" name="slider-vulnerabilities-featured" value="4">
                    <p>{{ $isId ? 'Unggulan' : 'Featured' }}</p>
                    <div>
                        <div class="container-cards__nav-previous">
                            <label for="vulnerabilities-featured-1"></label>
                            <label for="vulnerabilities-featured-2"></label>
                            <label for="vulnerabilities-featured-3"></label>
                            <label for="vulnerabilities-featured-4"></label>
                        </div>
                        <a class="item-1 card-sqlinjection" href="/web-security/sql-injection">
                            <div>
                                <p>SQL injection</p>
                                <p>16 {{ $isId ? 'lab' : 'labs' }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                    <g transform="translate(-617.419 -1116.68)">
                                        <g transform="translate(618.419 1117.68)">
                                            <g>
                                                <path d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="none" stroke="#f63" stroke-width="2"></path>
                                            </g>
                                            <path d="M621.475,1126.156l6.121,7.564-6.121,7.435" transform="translate(-607.762 -1117.317)" fill="none" stroke="#f63" stroke-miterlimit="10" stroke-width="2"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </a>
                        <a class="item-2 card-xss" href="/web-security/cross-site-scripting">
                            <div>
                                <p>Cross-site scripting (XSS)</p>
                                <p>30 {{ $isId ? 'lab' : 'labs' }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                    <g transform="translate(-617.419 -1116.68)">
                                        <g transform="translate(618.419 1117.68)">
                                            <g>
                                                <path d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="none" stroke="#f63" stroke-width="2"></path>
                                            </g>
                                            <path d="M621.475,1126.156l6.121,7.564-6.121,7.435" transform="translate(-607.762 -1117.317)" fill="none" stroke="#f63" stroke-miterlimit="10" stroke-width="2"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </a>
                        <a class="item-3 card-csrf" href="/web-security/csrf">
                            <div>
                                <p>Cross-site request forgery (CSRF)</p>
                                <p>8 {{ $isId ? 'lab' : 'labs' }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                    <g transform="translate(-617.419 -1116.68)">
                                        <g transform="translate(618.419 1117.68)">
                                            <g>
                                                <path d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="none" stroke="#f63" stroke-width="2"></path>
                                            </g>
                                            <path d="M621.475,1126.156l6.121,7.564-6.121,7.435" transform="translate(-607.762 -1117.317)" fill="none" stroke="#f63" stroke-miterlimit="10" stroke-width="2"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </a>
                        <a class="item-4 card-directorytraversal" href="/web-security/xxe">
                            <div>
                                <p>XXE injection</p>
                                <p>9 {{ $isId ? 'lab' : 'labs' }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                    <g transform="translate(-617.419 -1116.68)">
                                        <g transform="translate(618.419 1117.68)">
                                            <g>
                                                <path d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="none" stroke="#f63" stroke-width="2"></path>
                                            </g>
                                            <path d="M621.475,1126.156l6.121,7.564-6.121,7.435" transform="translate(-607.762 -1117.317)" fill="none" stroke="#f63" stroke-miterlimit="10" stroke-width="2"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </a>
                        <div class="container-cards__nav-next">
                            <label for="vulnerabilities-featured-1"></label>
                            <label for="vulnerabilities-featured-2"></label>
                            <label for="vulnerabilities-featured-3"></label>
                            <label for="vulnerabilities-featured-4"></label>
                        </div>
                        <div class="container-cards__indicators">
                            <label for="vulnerabilities-featured-1"></label>
                            <label for="vulnerabilities-featured-2"></label>
                            <label for="vulnerabilities-featured-3"></label>
                            <label for="vulnerabilities-featured-4"></label>
                        </div>
                    </div>
                </div>
                <a class="h4 chevron-after2" href="/web-security/all-materials">{{ $isId ? 'Lihat semua materi belajar' : 'View all learning materials' }}</a><span class="padding-left-m"></span><a class="h4 chevron-after2" href="/web-security/all-labs">{{ $isId ? 'Lihat semua lab' : 'View all labs' }}</a>
            </div>
        </div><div class="container-section --gap-xlarge --center --text-large --width-narrow">
            <h2 id="up-to-the-minute-learning-resources">{{ $isId ? 'Sumber belajar praktis terkini' : 'Up-to-the-minute learning resources' }}</h2>
            @if ($isId)
                <p>Akademi Keamanan Web menyediakan materi keamanan aplikasi web secara teratur, memadukan catatan teknis dasar, panduan langkah demi langkah, dan <a href="/cve">artikel analisis CVE</a> serta <a href="/web-security/web-application-hackers-handbook">metodologi pengujian aplikasi</a>.</p>
                <p>Materi di sini disertai lab interaktif agar Anda bisa langsung mempraktikkan setiap konsep dan memahami cara celah ditemukan serta diperbaiki.</p>
            @else
                <p>The Web Security Academy is a structured training center for web application security. It combines foundational research materials, practical exploitation walkthroughs, and <a href="/cve">CVE analysis articles</a> alongside <a href="/web-security/web-application-hackers-handbook">application security methodology</a>.</p>
                <p>Unlike a textbook, the Academy also includes interactive labs where you can put what you learn to the test. If you want to improve your knowledge of ethical hacking, or you'd like to become a security researcher or pentester, you're in the right place.</p>
            @endif
        </div><div class="container-section --gap-xlarge --width-fixed --text-large --layout-column no-padding-top no-padding-bottom container-academy-steps ph-no-capture">
            <input id="step-learn" type="radio" class="hidden" name="slider-steps" value="learn" checked="checked">
            <label for="step-learn">
                <img alt="Learn" src="/web-security/images/landing-page/vulnerabilities-icon.svg"> {{ $isId ? 'Pelajari celah keamanan' : 'Learn about security vulnerabilities' }}
            </label>
            <div>
                <img alt="Learn visual" src="/web-security/images/landing-page/carousel-vulnerabilities.jpg">
            </div>
            <input id="step-signup" type="radio" class="hidden" name="slider-steps" value="signup">
            <label for="step-signup">
                <img alt="Practice" src="/web-security/images/landing-page/practice-hacking-icon.svg"> {{ $isId ? 'Praktik eksploitasi langsung' : 'Practice hacking like a professional' }}
            </label>
            <div>
                <img alt="Practice visual" src="/web-security/images/landing-page/carousel-practice-hacking.png">
            </div>
            <input id="step-test" type="radio" class="hidden" name="slider-steps" value="test">
            <label for="step-test">
                <img alt="Test" src="/web-security/images/landing-page/lab-icon.svg"> {{ $isId ? 'Uji kemampuan di lab interaktif' : 'Test yourself in our interactive labs' }}
            </label>
            <div>
                <img alt="Test visual" src="/web-security/images/landing-page/carousel-lab.jpg">
            </div>
            <input id="step-track" type="radio" class="hidden" name="slider-steps" value="track">
            <label for="step-track">
                <img alt="Track" src="/web-security/images/landing-page/progress-icon.svg"> {{ $isId ? 'Pantau progres Anda' : 'Track your progress' }}
            </label>
            <div>
                <img alt="Track visual" src="/web-security/images/landing-page/carousel-track-progress.png">
            </div>
        </div><div class="container-section --center --gap-xlarge">
            @include('partials.widget', ['id' => 'academy-startlearningcta'])
        </div><div class="container-section --gap-xlarge --width-fixed --text-large --layout-column no-padding-top">
            <div class="column-block --width-medium smallscreen-center">
                <h2 id="satisfy-your-curiosity-safely-and-legally">{{ $isId ? 'Belajar eksploitasi secara aman dan legal' : 'Satisfy your curiosity - safely and legally' }}</h2>
                @if ($isId)
                    <p>Latihan keamanan paling efektif dilakukan di lingkungan lokal terisolasi tanpa mengganggu sistem produksi. Karena itu setiap lab di {{ config('app.name') ?: 'SecDevLab' }} berjalan terpisah per pengguna.</p>
                    <p>Anda bisa mengakses seluruh lab dan mencatat progres secara teratur dengan <a href="/users/register">membuat akun</a>.</p>
                @else
                    <p>Interactive security training works best in an isolated local environment where you can test payloads safely without risking production systems. That's why every lab in {{ config('app.name') ?: 'SecDevLab' }} runs per-user in isolated storage.</p>
                    <p>The Web Security Academy exists to help anyone who wants to learn about web security in a safe and legal manner. You can access everything and track your progress by <a href="/users/register">creating an account</a>.</p>
                @endif
            </div>
            <div class="column-block --center --width-medium">
                <img alt="Student" src="/web-security/images/landing-page/student.png">
            </div>
        </div><div class="container-section --gap-xlarge --width-fixed --text-large --layout-column no-padding-top">
            <div class="column-block --center --width-medium smallscreen-flex--order-2">
                <img cms-ignore-validation="UNIQUE_IMG_ALT_TEXT" alt="Security Practice" src="/web-security/images/landing-page/community.png">
            </div>
            <div class="column-block --width-medium smallscreen-center">
                <h2 id="hack-like-the-pros-do">{{ $isId ? 'Uji aplikasi dengan metode penguji keamanan' : 'Hack like the pros do' }}</h2>
                @if ($isId)
                    <p>Keamanan aplikasi web paling cepat dipahami lewat praktik langsung, bukan hanya teori. {{ config('app.name') ?: 'SecDevLab' }} memudahkan Anda mencoba skenario pengujian aplikasi secara langsung.</p>
                    <p>Beberapa lab menuntut pemeriksaan permintaan HTTP, header, dan payload respons secara teliti. Jelajahi <a href="/web-security/all-labs">katalog lab lengkap</a> atau hubungkan tekniknya dengan artikel di <a href="/cve">Ensiklopedia CVE</a>.</p>
                @else
                    <p>Web security and ethical hacking are rewarding disciplines, and shouldn't be hidden behind opaque theory. {{ config('app.name') ?: 'SecDevLab' }} brings practical application security testing to every learner.</p>
                    <p>Some interactive labs require inspecting HTTP requests, headers, and response payloads carefully. Explore our <a href="/web-security/all-labs">full lab catalog</a> or correlate techniques with advisories in our <a href="/cve">CVE Encyclopedia</a>.</p>
                @endif
            </div>
        </div><div class="container-section --gap-xlarge --width-fixed --text-large --layout-column no-padding-top">
            <div class="column-block --width-medium smallscreen-center">
                <h2 id="web-security-training-built-for-humans-not-robots">{{ $isId ? 'Materi web security yang nyaman diikuti' : 'Web security training built for humans, not robots' }}</h2>
                @if ($isId)
                    <p>Membaca teori keamanan aplikasi bisa terasa membosankan bila tidak langsung dicoba. Karena itu setiap topik di sini dirancang berpasangan dengan lab praktik interaktif.</p>
                    <p>Setiap modul memuat penjelasan teknis yang ringkas sekaligus tantangan terisolasi untuk mengasah kemampuan analisis dan mitigasi.</p>
                @else
                    <p>Let's face it, some of the online web application training out there can be a bit dull. That's why we've taken a fully interactive approach to web security training.</p>
                    <p>While each topic in the Academy is explained in text, every module is paired with hands-on interactive labs designed to sharpen both offensive and defensive security skills.</p>
                @endif
            </div>
            <div class="column-block --center --width-medium">
                <img class="box-shadow2" alt="Video" src="/web-security/images/landing-page/video-graphic.jpg">
            </div>
        </div><div class="container-section --gap-xlarge --width-fixed --text-large --layout-column no-padding-top">
            <div class="column-block --center --width-medium smallscreen-flex--order-2">
                <img alt="Progress and Leaderboard" src="/web-security/images/landing-page/t-shirt-and-progress-bar.jpg">
            </div>
            <div class="column-block --width-medium smallscreen-center">
              <h2 id="track-your-progress-win-cool-swag">{{ $isId ? 'Pantau progres dan cetak sertifikat Anda' : 'Track your progress & earn your certificate' }}</h2>
              @if ($isId)
                  <p>Lab disusun bertahap agar menantang sekaligus menyenangkan untuk dipecahkan. Anda bisa membandingkan skor penyelesaian di <a href="/web-security/hall-of-fame">Papan Peringkat Akademi</a>.</p>
                  <p>Setiap lab yang diselesaikan menambah poin sesuai tingkat kesulitan di MySQL dan tercatat di <a href="/certificate">Sertifikat &amp; Laporan Progres</a> Anda.</p>
              @else
                  <p>Although we designed the labs to be fun, that doesn't necessarily mean they're easy. You can compare scores on the <a href="/web-security/hall-of-fame">Academy Leaderboard</a>.</p>
                  <p>Every solved lab awards difficulty-weighted points in MySQL, updates your live ranking, and contributes toward your printable <a href="/certificate">Academic Certificate &amp; Progress Report</a>.</p>
              @endif
            </div>
        </div><div class="container-section --width-fixed --text-large container-academy-topics">
            <h2 id="all-topics">{{ $isId ? 'Semua topik' : 'All topics' }}</h2>
            <div>
                <a href="/web-security/sql-injection">SQL injection</a>
                <a href="/web-security/cross-site-scripting">XSS</a>
                <a href="/web-security/csrf">CSRF</a>
                <a href="/web-security/clickjacking">Clickjacking</a>
                <a href="/web-security/cors">CORS</a>
                <a href="/web-security/xxe">XXE</a>
                <a href="/web-security/ssrf">SSRF</a>
                <a href="/web-security/request-smuggling">Request smuggling</a>
                <a href="/web-security/os-command-injection">Command injection</a>
                <a href="/web-security/server-side-template-injection">Server-side template injection</a>
                <a href="/web-security/deserialization">Insecure deserialization</a>
                <a href="/web-security/file-path-traversal">Path traversal</a>
                <a href="/web-security/access-control">{{ $isId ? 'Kontrol akses' : 'Access control' }}</a>
                <a href="/web-security/authentication">{{ $isId ? 'Autentikasi' : 'Authentication' }}</a>
                <a href="/web-security/oauth">{{ $isId ? 'Autentikasi OAuth' : 'OAuth authentication' }}</a>
                <a href="/web-security/logic-flaws">{{ $isId ? 'Logika bisnis' : 'Business logic vulnerabilities' }}</a>
                <a href="/web-security/websockets">WebSockets</a>
                <a href="/web-security/dom-based">DOM-based</a>
                <a href="/web-security/web-cache-poisoning">Web cache poisoning</a>
                <a href="/web-security/host-header">HTTP Host header attacks</a>
                <a href="/web-security/information-disclosure">{{ $isId ? 'Kebocoran informasi' : 'Information disclosure' }}</a>
                <a href="/web-security/file-upload">{{ $isId ? 'Unggah berkas' : 'File upload vulnerabilities' }}</a>
                <a href="/web-security/jwt">{{ $isId ? 'Serangan JWT' : 'JWT attacks' }}</a>
                <a href="/web-security/essential-skills">{{ $isId ? 'Keterampilan dasar' : 'Essential skills' }}</a>
                <a href="/web-security/prototype-pollution">Prototype pollution</a>
                <a href="/web-security/graphql">GraphQL API</a>
                <a href="/web-security/race-conditions">Race conditions</a>
                <a href="/web-security/nosql-injection">NoSQL injection</a>
                <a href="/web-security/api-testing">{{ $isId ? 'Pengujian API' : 'API testing' }}</a>
                <a href="/web-security/llm-attacks">{{ $isId ? 'Serangan Web LLM' : 'Web LLM attacks' }}</a>
                <a href="/web-security/web-cache-deception">Web cache deception</a>
                <a href="/web-security/video-guidelines">{{ $isId ? 'Panduan video' : 'Video guidelines' }}</a>
                <a href="/web-security/credits">{{ $isId ? 'Kredit' : 'Credits' }}</a>
                <a href="/web-security/lab-telemetry-privacy-notice">{{ $isId ? 'Kebijakan privasi telemetri lab' : 'Lab telemetry privacy notice' }}</a>
            </div>
        </div><div class="container-section --gap-xlarge --width-fixed">
            <div class="container-keypoints">
                <div>
                    <a href="/web-security/getting-started">
                        <p class="intro">{{ $isId ? 'Panduan memulai Akademi Keamanan Web' : 'Getting started with the Web Security Academy' }}</p>
                        <div class="chevron-after">{{ $isId ? 'Selengkapnya' : 'Find out more' }}</div>
                    </a>
                </div>
                <div>
                    <a href="/web-security/all-topics">
                        <p class="intro">{{ $isId ? 'Lihat semua topik materi' : 'View all Web Security Academy topics' }}</p>
                        <div class="chevron-after">{{ $isId ? 'Selengkapnya' : 'Find out more' }}</div>
                    </a>
                </div>
                <div>
                    <a href="/web-security/hall-of-fame">
                        <p class="intro">{{ $isId ? 'Pantau posisi di Papan Peringkat' : 'Track your progress in the Hall of Fame' }}</p>
                        <div class="chevron-after">{{ $isId ? 'Selengkapnya' : 'Find out more' }}</div>
                    </a>
                </div>
            </div>
        </div>@include('partials.widget', ['id' => 'academy-startlearningbanner'])
@endsection
