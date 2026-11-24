@php
    $isId = app()->getLocale() === 'id';
    $paths = [
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'Web cache deception',
            'title_id' => 'Web cache deception',
            'desc' => "This learning path covers web cache deception vulnerabilities. You'll learn how to identify discrepancies between how the origin server and cache handle requests and how to leverage the discrepancies to create path confusion.",
            'desc_id' => 'Jalur ini membahas celah web cache deception. Anda akan mempelajari cara melihat perbedaan penanganan request antara server asal dan cache, lalu memanfaatkannya untuk memicu path confusion.',
            'path_url' => '/web-security/learning-paths/web-cache-deception',
            'start_url' => '/web-security/learning-paths/web-cache-deception/wcd-web-caches/web-cache-deception/web-caches',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'WebSockets vulnerabilities',
            'title_id' => 'Kerentanan WebSockets',
            'desc' => 'This learning path covers the identification and exploitation of security vulnerabilities specific to WebSockets in web applications.',
            'desc_id' => 'Jalur ini membahas cara menemukan dan mengeksploitasi celah keamanan yang spesifik pada koneksi WebSockets di aplikasi web.',
            'path_url' => '/web-security/learning-paths/websockets-security-vulnerabilities',
            'start_url' => '/web-security/learning-paths/websockets-security-vulnerabilities/websockets/websockets/websockets',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'Authentication vulnerabilities',
            'title_id' => 'Kerentanan autentikasi',
            'desc' => "This learning path explores authentication vulnerabilities, which have a critical impact on security. You'll learn about common mechanisms and vulnerabilities, and strategies for robust authentication.",
            'desc_id' => 'Jalur ini mengulas berbagai celah autentikasi yang berdampak besar pada keamanan akun, mulai dari mekanisme login umum hingga cara menerapkan autentikasi yang lebih aman.',
            'path_url' => '/web-security/learning-paths/authentication-vulnerabilities',
            'start_url' => '/web-security/learning-paths/authentication-vulnerabilities/what-is-authentication/authentication/what-is-authentication',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'Server-side request forgery (SSRF) attacks',
            'title_id' => 'Serangan Server-side request forgery (SSRF)',
            'desc' => "This learning path teaches you about server-side request forgery (SSRF). You'll learn about its impact, common techniques used in attacks, and how to defend against them.",
            'desc_id' => 'Jalur ini menjelaskan cara kerja SSRF, dampaknya terhadap layanan internal, teknik eksploitasi yang umum dipakai, dan langkah pencegahannya.',
            'path_url' => '/web-security/learning-paths/ssrf-attacks',
            'start_url' => '/web-security/learning-paths/ssrf-attacks/ssrf-attacks-what-is-ssrf/ssrf/what-is-ssrf',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'Prototype pollution',
            'title_id' => 'Prototype pollution',
            'desc' => "This learning path introduces you to prototype pollution vulnerabilities in JavaScript. You'll learn what prototype pollution is, how it can be exploited, and how to prevent it in your applications.",
            'desc_id' => 'Jalur ini mengenalkan celah prototype pollution pada JavaScript, cara kerjanya, pola eksploitasinya di sisi klien maupun server, serta pencegahannya.',
            'path_url' => '/web-security/learning-paths/prototype-pollution',
            'start_url' => '/web-security/learning-paths/prototype-pollution/prototype-pollution/prototype-pollution/what-is-prototype-pollution',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'Clickjacking (UI redressing)',
            'title_id' => 'Clickjacking (UI redressing)',
            'desc' => "This learning path deals with clickjacking attacks. You'll learn the fundamentals of clickjacking, how to construct basic attacks, and implement server-side and client-side defense strategies.",
            'desc_id' => 'Jalur ini membahas serangan clickjacking, mulai dari konsep dasar, penyusunan skenario framing, hingga proteksi di sisi server dan browser.',
            'path_url' => '/web-security/learning-paths/clickjacking',
            'start_url' => '/web-security/learning-paths/clickjacking/clickjacking-what-is-clickjacking/clickjacking/what-is-clickjacking',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'GraphQL API vulnerabilities',
            'title_id' => 'Kerentanan API GraphQL',
            'desc' => "This learning path explores common vulnerabilities associated with GraphQL APIs due to implementation and design flaws. You'll learn how to find GraphQL endpoints, bypass some common defenses, and exploit a range of GraphQL API vulnerabilities.",
            'desc_id' => 'Jalur ini mengulas celah yang muncul pada API GraphQL akibat kesalahan desain dan implementasi, termasuk penemuan endpoint, teknik melewati proteksi, dan skenario eksploitasinya.',
            'path_url' => '/web-security/learning-paths/graphql-api-vulnerabilities',
            'start_url' => '/web-security/learning-paths/graphql-api-vulnerabilities/finding-graphql-endpoints/graphql/finding-graphql-endpoints',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'Cross-origin resource sharing (CORS)',
            'title_id' => 'Cross-origin resource sharing (CORS)',
            'desc' => 'This learning path provides an in-depth understanding of CORS, including common examples of CORS-based attacks and how to protect against these attacks.',
            'desc_id' => 'Jalur ini membahas konfigurasi CORS yang keliru, contoh serangan lintas origin yang sering ditemukan, dan cara mengamankannya.',
            'path_url' => '/web-security/learning-paths/cors',
            'start_url' => '/web-security/learning-paths/cors/cors-what-is-cors-cross-origin-resource-sharing/cors/what-is-cors-cross-origin-resource-sharing',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'Path traversal',
            'title_id' => 'Path traversal',
            'desc' => "This learning path covers path traversal vulnerabilities. You'll learn how to carry out path traversal attacks and circumvent common obstacles. You'll also learn how to prevent path traversal attacks.",
            'desc_id' => 'Jalur ini mengulas celah path traversal, cara melewati penyaringan input berkas yang umum, dan langkah mitigasi di sisi server.',
            'path_url' => '/web-security/learning-paths/path-traversal',
            'start_url' => '/web-security/learning-paths/path-traversal/what-is-path-traversal/file-path-traversal/what-is-path-traversal',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'NoSQL injection',
            'title_id' => 'NoSQL injection',
            'desc' => "This learning path covers the detection, exploitation, and prevention of NoSQL injection vulnerabilities. You'll explore the differences between NoSQL and SQL injection, learn how to perform NoSQL syntax injection, and how to use NoSQL operators to manipulate queries.",
            'desc_id' => 'Jalur ini membahas deteksi, eksploitasi, dan pencegahan NoSQL injection, termasuk perbedaannya dengan SQL injection serta manipulasi query lewat operator NoSQL.',
            'path_url' => '/web-security/learning-paths/nosql-injection',
            'start_url' => '/web-security/learning-paths/nosql-injection/types-of-nosql-injection/nosql-injection/types-of-nosql-injection',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'Race conditions',
            'title_id' => 'Race conditions',
            'desc' => "This learning path covers race conditions, a common vulnerability in web applications where concurrent processes lead to unintended behavior. You'll learn how to identify, exploit, and prevent race conditions using parallel request techniques.",
            'desc_id' => 'Jalur ini mengulas race condition ketika proses paralel memicu perilaku tak terduga, termasuk cara mendeteksi, menguji dengan request paralel, dan mencegahnya.',
            'path_url' => '/web-security/learning-paths/race-conditions',
            'start_url' => '/web-security/learning-paths/race-conditions/race-conditions-limit-overrun/race-conditions/limit-overrun-race-conditions',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'File upload vulnerabilities',
            'title_id' => 'Kerentanan unggah berkas',
            'desc' => "In this learning path, you'll explore how simple file upload functions can become a vector for severe attacks. You'll learn how to bypass common defense mechanisms to upload a web shell, enabling full control over a vulnerable web server.",
            'desc_id' => 'Pada jalur ini Anda mempelajari bagaimana fitur unggah berkas bisa membuka jalan bagi eksekusi kode lewat web shell bila validasi ekstensi atau kontennya lemah.',
            'path_url' => '/web-security/learning-paths/file-upload-vulnerabilities',
            'start_url' => '/web-security/learning-paths/file-upload-vulnerabilities/what-are-file-upload-vulnerabilities/file-upload/what-are-file-upload-vulnerabilities',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'API testing',
            'title_id' => 'Pengujian API',
            'desc' => "This learning path teaches you how to test APIs that aren't fully used by the website front-end. You'll learn key API recon skills to help you discover more attack surface. In addition, you'll learn how to identify server-side parameter pollution vulnerabilities that may impact internal APIs.",
            'desc_id' => 'Jalur ini melatih cara menguji endpoint API yang tidak terlihat di antarmuka web, memetakan permukaan serangan API, dan mendeteksi server-side parameter pollution.',
            'path_url' => '/web-security/learning-paths/api-testing',
            'start_url' => '/web-security/learning-paths/api-testing/api-testing-api-recon/api-testing/api-recon',
        ],
        [
            'level' => 'APPRENTICE',
            'badge_class' => 'theme-dastardly',
            'title' => 'Server-side vulnerabilities',
            'title_id' => 'Kerentanan sisi server',
            'desc' => "This learning path introduces you to a range of common server-side vulnerabilities. This is perfect if you're new to web security and want to get an overview of the kinds of vulnerabilities that exist, as well as how an attacker might identify and exploit them in real-world systems.",
            'desc_id' => 'Jalur ini cocok untuk pemula yang ingin mengenal berbagai celah sisi server yang umum serta cara penyerang mengidentifikasi dan memanfaatkannya.',
            'path_url' => '/web-security/learning-paths/server-side-vulnerabilities-apprentice',
            'start_url' => '/web-security/learning-paths/server-side-vulnerabilities-apprentice/path-traversal-apprentice/file-path-traversal/what-is-path-traversal',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'SQL injection',
            'title_id' => 'SQL injection',
            'desc' => "This learning path introduces SQL injection (SQLi), a critical web vulnerability. You'll learn how to detect and exploit SQLi to uncover hidden data and manipulate application behavior, as well as essential techniques to secure applications against SQLi attacks.",
            'desc_id' => 'Jalur ini mengenalkan SQL injection dari deteksi dasar hingga ekstraksi data dan pengendalian kueri, beserta teknik pencegahannya.',
            'path_url' => '/web-security/learning-paths/sql-injection',
            'start_url' => '/web-security/learning-paths/sql-injection/sql-injection-what-is-sql-injection/sql-injection/what-is-sql-injection-sqli',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'Web LLM attacks',
            'title_id' => 'Serangan Web LLM',
            'desc' => "This learning path teaches you how to perform attacks using Large Language Models (LLMs). You'll learn how to construct attacks that take advantage of an LLM's access to data, API, and user information that you would not be able to access directly.",
            'desc_id' => 'Jalur ini membahas cara menguji keamanan fitur AI berbasis LLM dengan memanfaatkan akses model ke data, API internal, dan informasi pengguna.',
            'path_url' => '/web-security/learning-paths/llm-attacks',
            'start_url' => '/web-security/learning-paths/llm-attacks/llm-attacks-what-is-a-large-language-model/llm-attacks/what-is-a-large-language-model',
        ],
        [
            'level' => 'PRACTITIONER',
            'badge_class' => 'theme-enterprise-2',
            'title' => 'Cross-site request forgery (CSRF)',
            'title_id' => 'Cross-site request forgery (CSRF)',
            'desc' => "This learning path covers CSRF (Cross-Site Request Forgery). You'll learn about some common CSRF vulnerabilities, and how to prevent them.",
            'desc_id' => 'Jalur ini membahas celah Cross-Site Request Forgery (CSRF), skenario pengiriman request lintas situs yang umum terjadi, dan cara mengamankannya.',
            'path_url' => '/web-security/learning-paths/csrf',
            'start_url' => '/web-security/learning-paths/csrf/csrf-what-is-csrf/csrf/what-is-csrf',
        ],
    ];
@endphp
<div class="section-full-width">
    <h2 class="heading-navy-1 margin-left-small margin-bottom-small margin-right-small">{{ $isId ? 'Semua jalur belajar' : 'All learning paths' }}</h2>

    @if (!$user)
        <div class="learning-path-alert">
            @if ($isId)
                <a href="/users?returnurl=%2fweb-security%2flearning-paths">Masuk</a> atau
                <a href="/users/register">buat akun gratis</a> untuk menjalankan lab interaktif dan menyimpan progres belajar Anda.
            @else
                <a href="/users?returnurl=%2fweb-security%2flearning-paths">Sign in</a> or
                <a href="/users/register">create a free account</a> to access our interactive labs and track your learning progress.
            @endif
        </div>
    @endif

    <div class="container-columns">
        @foreach ($paths as $item)
            <div class="progress-cards theme-navy-9">
                <div class="progress-cards-content">
                    <div class="progress-cards-content-labels">
                        <span class="label {{ $item['badge_class'] }}">{{ $item['level'] }}</span>
                    </div>
                    <h3>{{ $isId ? $item['title_id'] : $item['title'] }}</h3>
                    <p>{{ $isId ? $item['desc_id'] : $item['desc'] }}</p>
                    <hr>
                    <div class="progress-cards-content-buttons">
                        <a class="chevron-after no-wrap" href="{{ $item['path_url'] }}">{{ $isId ? 'Lihat jalur' : 'View path' }}</a>
                        <a class="vla-btn vla-btn--outline vla-btn--sm" href="{{ $item['start_url'] }}">
                            <span>{{ $isId ? 'MULAI' : 'GET STARTED' }}</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
