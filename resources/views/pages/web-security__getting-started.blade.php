@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brandName = config('app.name') ?: 'SecDevLab';
@endphp
@section('title', ($isId ? 'Panduan Memulai' : 'Getting started').' | '.($isId ? 'Akademi Keamanan Web' : 'Web Security Academy').' | '.$brandName)
@section('legacy_css', '/content/psgenerictheme.css')

@section('academy_body')
<div no-keyword-injection="" class="wrapper" id="academy-started">

        <div class="hero">
            <div class="container-columns-centered-image">
                <div>
                    <h1 id="getting-started-with-the-web-security-academy" class="heading-2">
                        {{ $isId ? 'Panduan memulai Akademi Keamanan Web' : 'Getting started with the Web Security Academy' }}
                    </h1>
                    <h4 cms-ignore-validation="HEADING_TOO_LONG">
                        {{ $isId
                            ? 'Ikuti panduan dasar keamanan aplikasi web ini untuk mengasah keterampilan pengujian kerentanan secara bertahap.'
                            : "Follow our beginner's guide to web security, to boost your cybersecurity skills one vulnerability at a time." }}
                    </h4>
                </div>
                <img alt="{{ $isId ? 'Memulai belajar keamanan web' : 'Getting started with the Web Security Academy' }}" src="/web-security/getting-started/images/hero-academy-getting-started.jpg">
            </div>
        </div>

        <div class="section-full-width theme-grey-5 text-center">
            <h2 id="how-the-web-security-academy-works">{{ $isId ? 'Cara kerja Akademi Keamanan Web' : 'How the Web Security Academy works' }}</h2>

            <div class="container-columns-centered container-cards-white">
                <div>
                    <img alt="{{ $isId ? 'Pelajari materi teori' : 'Read our learning materials' }}" src="/web-security/getting-started/images/practice-our-learning.jpg">
                    <p><strong>{{ $isId ? '1. Pelajari materi teori' : '1. Read our learning materials' }}</strong></p>
                    <p>{{ $isId ? 'Pahami bagaimana kerentanan terjadi pada kode aplikasi dan bagaimana celah tersebut dieksploitasi.' : 'Learn about how vulnerabilities arise, and how they can be exploited in the wild.' }}</p>
                    <a class="button-orange-small" href="/web-security/all-topics">{{ $isId ? 'Lihat semua topik' : 'View all topics' }}</a>
                </div>

                <div>
                    <img alt="{{ $isId ? 'Latih keterampilan di lab' : 'Practice your skills' }}" src="/web-security/getting-started/images/practice-your-skills.jpg">
                    <p><strong>{{ $isId ? '2. Latih keterampilan Anda' : '2. Practice your skills' }}</strong></p>
                    <p>{{ $isId ? 'Uji pemahaman Anda melalui lab interaktif dan skenario aplikasi nyata yang terisolasi per akun.' : 'Put your skills to the test with our interactive labs and real-world scenarios.' }}</p>
                    <a class="button-orange-small" href="/web-security/all-topics">{{ $isId ? 'Lihat semua topik' : 'View all topics' }}</a>
                </div>

                <div>
                    <img alt="{{ $isId ? 'Pantau progres belajar' : 'Track your progress' }}" src="/web-security/getting-started/images/track-your-progress.jpg">
                    <p><strong>{{ $isId ? '3. Pantau progres Anda' : '3. Track your progress' }}</strong></p>
                    <p>{{ $isId ? 'Naik bertahap dari level Apprentice hingga Expert, lalu lihat posisi Anda di papan peringkat.' : 'Progress from Apprentice to Expert level, and track your rank on our Hall of Fame.' }}</p>
                    <a class="button-orange-small" href="/web-security/dashboard">{{ $isId ? 'Buka dasbor' : 'Visit dashboard' }}</a>
                </div>
            </div>
        </div>

        <div class="section theme-white text-center">
            <h2 id="get-started-with-your-first-topic">{{ $isId ? 'Mulai dari topik pertama Anda' : 'Get started with your first topic' }}</h2>
            <p class="intro">
                {{ $isId
                    ? 'Dengan banyaknya pilihan topik, terkadang sulit menentukan langkah awal. Kami menyusun jalur belajar terarah agar Anda bisa memulai dengan urutan yang jelas.'
                    : "With so many topics to choose from, you may not be quite sure where to begin. We've created a variety of learning paths to help get you started on your journey with the Web Security Academy." }}
            </p>
        </div>

        <div class="section-full-width theme-white text-center">
            <a class="callout-large-orange" href="/web-security/learning-paths">
                <picture>
                    <img alt="{{ $isId ? 'Mulai topik pertama Akademi' : 'Get started with your first Academy topic' }}" src="/web-security/getting-started/images/academy-recommended-topic.jpg">
                </picture>
                <div>
                    <p>{{ $isId ? 'Jalur belajar' : 'Learning paths' }}</p>
                    <p>{{ $isId ? 'Panduan belajar bertahap di Akademi Keamanan Web' : 'Guided learning paths through the Web Security Academy' }}</p>
                    <span class="icon-arrow-right"></span>
                </div>
            </a>
        </div>

        <div class="section theme-white text-center">
            <h3 cms-ignore-validation="HEADING_CAPITALIZATION">{{ $isId ? 'Siap mencoba? Pilih topik untuk memulai' : 'Feeling confident? Pick a topic to begin' }}</h3>
            <p class="intro">
                {{ $isId
                    ? 'Apa pun tingkat pengalaman Anda saat ini, pilih salah satu topik di bawah ini atau buka daftar lengkap untuk langsung berlatih.'
                    : "Whatever your experience level might be, we've got a topic for you to get stuck into. Pick one from the suggestions below, or view our full topic list to get started." }}
            </p>
        </div>

        <div class="section-full-width theme-white text-center">
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/sql-injection">
                    <h3>SQL Injection</h3>
                    <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Visit topic' }}</div>
                </a>
                <a href="/web-security/authentication">
                    <h3>{{ $isId ? 'Autentikasi' : 'Authentication' }}</h3>
                    <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Visit topic' }}</div>
                </a>
                <a href="/web-security/cross-site-scripting">
                    <h3>Cross-site scripting (XSS)</h3>
                    <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Visit topic' }}</div>
                </a>
                <a href="/web-security/logic-flaws">
                    <h3>{{ $isId ? 'Kerentanan logika bisnis' : 'Business logic vulnerabilities' }}</h3>
                    <div class="chevron-after">{{ $isId ? 'Buka topik' : 'Visit topic' }}</div>
                </a>
            </div>
        </div>

        <div class="section-full-width theme-white text-center">
            <a class="chevron-after" href="/web-security/all-topics">{{ $isId ? 'Lihat daftar lengkap semua topik' : 'View our full list of topics' }}</a>
        </div>

        <div class="section-full-width theme-grey-5 text-center">
            <h2 id="find-your-way-around-burp-suite-with-our-video-tutorials">{{ $isId ? 'Kenali alur kerja pengujian request HTTP' : 'Learn HTTP request testing workflows' }}</h2>
            <p class="intro">
                {{ $isId
                    ? 'Pelajari cara mencegat, memodifikasi, dan mengirim ulang request HTTP saat mengerjakan lab interaktif di Akademi.'
                    : 'Walk through practical techniques for intercepting, modifying, and replaying HTTP requests across Academy labs.' }}
            </p>
        </div>

        <div class="section-full-width theme-grey-5 text-center">
            <div class="container-columns-3">
                <a class="youtube-lightbox-link" href="/web-security/all-labs">
                    <img src="/images/youtube/oude5sj_uc8.jpg" alt="{{ $isId ? 'Inspeksi request dan respons HTTP' : 'Intercepting HTTP requests and responses' }}">
                    <p>{{ $isId ? 'Cara memeriksa lalu lintas request dan respons HTTP pada target lab' : 'How to inspect HTTP requests and responses against lab targets' }}</p>
                </a>
                <a class="youtube-lightbox-link" href="/web-security/all-labs">
                    <img src="/images/youtube/_wifm2g9ugg.jpg" alt="{{ $isId ? 'Pengujian ulang dengan HTTP Repeater' : 'Resending individual requests with Repeater' }}">
                    <p>{{ $isId ? 'Cara mengirim ulang request dengan payload khusus menggunakan HTTP Repeater' : 'How to resend custom requests using the built-in HTTP Repeater' }}</p>
                </a>
                <a class="youtube-lightbox-link" href="/web-security/all-topics">
                    <img src="/images/youtube/nect-0zw0o4.jpg" alt="{{ $isId ? 'Panduan antarmuka workbench lab' : 'Guide to the lab workbench interface' }}">
                    <p>{{ $isId ? 'Panduan penggunaan antarmuka workbench dan alat inspeksi di setiap lab' : 'A guide to the workbench interface and inspection panels' }}</p>
                </a>
            </div>
        </div>

        <div class="section-full-width theme-grey-5 text-center">
            <div class="container-columns-line-vertical-separators">
                <a class="chevron-after text-right" href="/web-security/all-labs">{{ $isId ? 'Jelajahi semua lab interaktif' : 'Explore all interactive labs' }}</a>
                <a class="chevron-after text-left" href="/cve">{{ $isId ? 'Baca ensiklopedia artikel CVE' : 'Browse the CVE Encyclopedia' }}</a>
            </div>
        </div>

        <div class="section-full-width theme-white text-center">
            <h2 id="keep-up-with-the-latest-from-the-web-security-academy">{{ $isId ? 'Ikuti materi terbaru di Akademi Keamanan Web' : 'Keep up with the latest from the Web Security Academy' }}</h2>
            <p class="intro">{{ $isId ? 'Pelajari materi topik kerentanan terbaru beserta analisis studi kasus CVE yang terhubung ke lab praktik.' : 'Explore new vulnerability topics, practical payloads, and synced CVE advisories.' }}</p>
            <div class="container-buttons">
                <a class="button-blue" href="/cve">{{ $isId ? 'Buka Artikel CVE' : 'Browse CVE Articles' }}</a>
            </div>
        </div>

        <div class="section-full-width theme-white">
            <div class="image-slider-white-quoteblock">
                <p class="heading2">{{ $isId ? 'Cerita peserta Hall of Fame' : 'Hall of Fame learners' }}</p>

                <input type="radio" class="ph-no-capture" name="slider-blockquote" id="slider1-1" checked="checked">
                <div>
                    <div>
                        <figure><img alt="Johnny Villarreal" src="/web-security/getting-started/images/johnny-villarreal.jpg"></figure>
                        <div>
                            <p>{{ $isId
                                ? 'Menemukan satu tempat yang menyatukan teori dan latihan lab gratis dengan kualitas konsisten sangat membantu saya memahami keamanan web dari nol.'
                                : 'To find a place that had all of that information in one location, with a consistently high quality of labs, especially being free, made it an easy starting point.' }}
                                <sup>
                                    <strong>Johnny Villarreal</strong>
                                </sup>
                            </p>
                            <a class="chevron-after" href="/web-security/getting-started/johnny-villarreal">{{ $isId ? 'Baca kisah Johnny di Akademi' : "Read about Johnny's Academy experience" }}</a>
                        </div>
                    </div>
                    <label for="slider1-3">
                        <span class="icon-arrow-head-left"></span>
                    </label>
                    <label for="slider1-2">
                        <span class="icon-arrow-head-right"></span>
                    </label>
                </div>

                <input type="radio" class="ph-no-capture" name="slider-blockquote" id="slider1-2">
                <div>
                    <div>
                        <figure><img alt="Kamil Vavra" src="/web-security/getting-started/images/kamil-vavra.jpg"></figure>
                        <div>
                            <p>{{ $isId
                                ? 'Berlatih di lab Akademi membantu saya membiasakan diri membaca request HTTP secara teliti sambil menguji celah nyata pada berbagai aplikasi.'
                                : 'Working through the Academy labs steadily builds practical testing instincts, teaching you how to read HTTP behavior and craft focused exploits.' }}
                                <sup>
                                    <strong>Kamil Vavra</strong>
                                </sup>
                            </p>
                            <a class="chevron-after" href="/web-security/getting-started/kamil-vavra">{{ $isId ? 'Baca kisah Kamil di Akademi' : "Read about Kamil's Academy experience" }}</a>
                        </div>
                    </div>
                    <label for="slider1-1">
                        <span class="icon-arrow-head-left"></span>
                    </label>
                    <label for="slider1-3">
                        <span class="icon-arrow-head-right"></span>
                    </label>
                </div>

                <input type="radio" class="ph-no-capture" name="slider-blockquote" id="slider1-3">
                <div>
                    <div>
                        <figure><img alt="Andres Rauschecker" src="/web-security/getting-started/images/andres-rauschecker.jpg"></figure>
                        <div>
                            <p>{{ $isId
                                ? 'Materi gratis yang terstruktur bersama skenario lab terbuka membuat komunitas keamanan web punya standar latihan praktis yang bisa diikuti siapa saja.'
                                : 'Open learning materials paired with interactive labs give the security community a solid practical foundation anyone can follow.' }}
                                <sup>
                                    <strong>Andres Rauschecker</strong>
                                </sup>
                            </p>
                            <a class="chevron-after" href="/web-security/getting-started/andres-rauschecker">{{ $isId ? 'Baca kisah Andres di Akademi' : "Read about Andres' Academy experience" }}</a>
                        </div>
                    </div>
                    <label for="slider1-2">
                        <span class="icon-arrow-head-left"></span>
                    </label>
                    <label for="slider1-1">
                        <span class="icon-arrow-head-right"></span>
                    </label>
                </div>

            </div>
        </div>

        <div class="section-full-width theme-grey-5">
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/all-topics">
                    <h3>{{ $isId ? 'Ringkasan semua topik' : 'An overview of all topics' }}</h3>
                    <div class="chevron-after">{{ $isId ? 'Selengkapnya' : 'Read more' }}</div>
                </a>
                <a href="/web-security/dashboard">
                    <h3>{{ $isId ? 'Dasbor peserta' : 'User dashboard' }}</h3>
                    <div class="chevron-after">{{ $isId ? 'Selengkapnya' : 'Read more' }}</div>
                </a>
                <a href="/web-security/hall-of-fame">
                    <h3>{{ $isId ? 'Papan Peringkat' : 'Hall of Fame' }}</h3>
                    <div class="chevron-after">{{ $isId ? 'Selengkapnya' : 'Read more' }}</div>
                </a>
            </div>
        </div>

        <div class="section-full-width theme-white">
            <div class="container-columns-block">
                <a href="/web-security/certification">
                    <img alt="{{ $brandName }} Certified Practitioner" src="/web-security/images/landing-pages/academy-homepage-cert-banner.png">
                    <div>
                        <h2 class="heading2-dark-blue" id="get-burp-suite-certified">{{ $isId ? 'Raih sertifikat praktisi '.$brandName : 'Get '.$brandName.' certified' }}</h2>
                        <p>{{ $isId ? 'Buktikan kemampuan Anda mendeteksi dan mengeksploitasi celah keamanan web yang umum melalui ujian praktik berbatas waktu.' : 'Prove your ability to detect and exploit common web vulnerabilities through practical hands-on testing challenges.' }}</p>
                        <span class="chevron-after">{{ $isId ? 'Siap menghadapi tantangannya?' : 'Ready for the challenge?' }}</span>
                    </div>
                </a>
            </div>
        </div>

    </div>
@endsection
