@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brandName = config('app.name') ?: 'SecDevLab';
@endphp
@section('title', $brandName.' Certified Practitioner | '.($isId ? 'Akademi Keamanan Web' : 'Web Security Academy').' | '.$brandName)
@section('legacy_css', '/content/psproducts.css')

@section('academy_body')
<div no-keyword-injection="" class="wrapper" id="certification">

    <div class="hero theme-pro-2">
        <div class="container-columns">
            <div>
                <h1 cms-ignore-validation="HEADING_CAPITALIZATION" class="heading1-white heading-2" id="a-web-security-certification-from-the-makers-of-burp-suite">
                    @if ($isId)
                        <span>Sertifikasi keamanan web</span> resmi dari {{ $brandName }}
                    @else
                        A <span>web security certification</span> from {{ $brandName }}
                    @endif
                </h1>
                <div class="container-buttons-left">
                    <a class="button-orange" href="/web-security/certification/verify-your-certification">{{ $isId ? 'Lihat sertifikat' : 'Get certified' }}</a>
                    <a class="button-white" href="/web-security/certification/how-to-prepare">{{ $isId ? 'Persiapan ujian' : 'Get prepared' }}</a>
                </div>
            </div>
            <img class="desktop-show" alt="{{ $brandName }} Certified Practitioner" src="/web-security/certification/images/certified-secondary-hero.png">
        </div>
    </div>

    <div class="section-full-width theme-community-6">
        <h2 cms-ignore-validation="HEADING_CAPITALIZATION" id="what-is-a-burp-suite-certified-practitioner">
            {{ $isId ? 'Apa itu '.$brandName.' Certified Practitioner?' : 'What is a '.$brandName.' Certified Practitioner?' }}
        </h2>
        <p>
            @if ($isId)
                {{ $brandName }} Certified Practitioner adalah sertifikasi praktik untuk penguji keamanan web. Sertifikat ini menunjukkan penguasaan konsep kerentanan web, pola pikir eksploitasi yang tepat, serta keterampilan menguji celah secara langsung di <a href="/web-security/all-labs">lab Akademi</a>.
            @else
                The {{ $brandName }} Certified Practitioner is a practical certification for web security professionals. Earning it shows solid knowledge of web security vulnerabilities, an authentic offensive mindset, and hands-on exploitation skills across <a href="/web-security/all-labs">Academy labs</a>.
            @endif
        </p>
    </div>

    <div class="section-full-width theme-community-6">
        <h2 cms-ignore-validation="HEADING_CAPITALIZATION" id="why-become-a-burp-suite-certified-practitioner">
            {{ $isId ? 'Mengapa mengikuti sertifikasi '.$brandName.'?' : 'Why become a '.$brandName.' Certified Practitioner?' }}
        </h2>
        <p>
            {{ $isId
                ? 'Lulus uji sertifikasi ini menandakan kemampuan praktis pengujian keamanan web yang kuat bagi penguji penetrasi maupun tim keamanan.'
                : 'Passing the practical exam indicates solid proficiency in web security testing, built for penetration testers and security engineering teams.' }}
        </p>
        <div class="container-columns-block">
            <div>
                <h3 id="prove-your-proficiency" class="align-vertically-self-center heading4-dark-blue">{{ $isId ? 'Buktikan kemampuan Anda' : 'Prove your proficiency' }}</h3>
                <div class="align-vertically-self-center margin-small-right">
                    <ul class="margin-small-right">
                        <li>{{ $isId ? 'Tunjukkan pemahaman mendalam atas kelas kerentanan web modern dan teknik eksploitasinya.' : 'Demonstrate a deep knowledge of current vulnerability classes and how to exploit them.' }}</li>
                        <li>{{ $isId ? 'Tunjukkan ketelitian dalam menganalisis serta memodifikasi lalu lintas HTTP.' : 'Showcase disciplined HTTP inspection and request tampering skills.' }}</li>
                        <li>{{ $isId ? 'Buktikan kemampuan pengujian praktis Anda melalui laporan pencapaian terverifikasi.' : 'Prove your hands-on testing skills with a verifiable progress certificate.' }}</li>
                    </ul>
                </div>
                <a class="align-vertically-self-center button-orange-small" href="/web-security/certification/how-to-prepare">{{ $isId ? 'Pelajari selengkapnya' : 'Learn more' }}</a>
            </div>

            <div>
                <h3 id="upskill-your-team" class="align-vertically-self-center heading4-dark-blue">{{ $isId ? 'Tingkatkan kapabilitas tim' : 'Upskill your team' }}</h3>
                <div class="align-vertically-self-center margin-small-right">
                    <ul class="margin-small-right">
                        <li>{{ $isId ? 'Tunjukkan standar kompetensi tim pengujian kepada pemangku kepentingan.' : 'Establish clear testing benchmarks across your security team.' }}</li>
                        <li>{{ $isId ? 'Identifikasi kesiapan anggota tim melalui tantangan eksploitasi nyata.' : 'Evaluate practical skills using realistic exploitation scenarios.' }}</li>
                        <li>{{ $isId ? 'Perkuat wawasan tim terhadap celah web terbaru beserta mitigasinya.' : "Develop your team's familiarity with recent vulnerability classes and mitigations." }}</li>
                    </ul>
                </div>
                <a class="align-vertically-self-center button-orange-small" href="/web-security/all-topics">{{ $isId ? 'Jelajahi topik' : 'Explore topics' }}</a>
            </div>
        </div>

        <div class="container-columns-block">
            <div class="container-columns-3">
                <p class="no-margin-bottom">
                    <strong>
                        {{ $isId ? 'Baru memulai di keamanan web?' : 'New to web security?' }}
                        <a class="chevron-after" href="/web-security/all-topics">{{ $isId ? 'Mulai perjalanan belajar di sini' : 'Start your journey here' }}</a>
                    </strong>
                </p>
            </div>
        </div>

    </div>

    <div class="section-full-width theme-white">
        <h2 id="useful-information-and-resources">{{ $isId ? 'Informasi dan panduan berguna' : 'Useful information and resources' }}</h2>
        <p>
            {{ $isId
                ? 'Panduan di bawah membantu Anda mempersiapkan diri menghadapi ujian praktik, memahami persyaratan sistem, serta memeriksa status sertifikat Anda.'
                : 'The resources below explain how to prepare for the practical exam, review system requirements, and check your completion certificate.' }}
        </p>
        <div class="section theme-grey-5 spacer">
            <h3>{{ $isId ? 'Sedang mempersiapkan ujian?' : 'Preparing to take the exam?' }}</h3>
            <p>{{ $isId ? 'Sebelum memulai ujian, ikuti langkah persiapan dan baca petunjuk serta panduan pelaksanaan ujian.' : 'Before taking the exam, work through the preparation steps and read the hints and guidance.' }}</p>
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/certification/how-to-prepare">
                    <div class="chevron-after">{{ $isId ? 'Cara mempersiapkan ujian' : 'How to prepare for your exam' }}</div>
                </a>
                <a href="/web-security/certification/exam-hints-and-guidance">
                    <div class="chevron-after">{{ $isId ? 'Petunjuk dan panduan' : 'Hints and guidance' }}</div>
                </a>
            </div>
        </div>
        <div class="section theme-grey-5 spacer">
            <h3>{{ $isId ? 'Persyaratan teknis' : 'Technical requirements' }}</h3>
            <p>{{ $isId ? 'Pastikan Anda membaca alur kerja serta kebutuhan teknis terlebih dahulu agar perangkat siap dipakai selama latihan.' : 'Review the requirements first to make sure your environment is ready before launching practice labs.' }}</p>
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/certification/how-it-works">
                    <div class="chevron-after">{{ $isId ? 'Cara kerja sertifikasi' : 'How to get your certification' }}</div>
                </a>
                <a href="/web-security/certification/how-it-works#requirements">
                    <div class="chevron-after">{{ $isId ? 'Persyaratan sistem' : 'System requirements' }}</div>
                </a>
            </div>
        </div>
        <div class="section theme-grey-5 spacer">
            <h3>{{ $isId ? 'Akses ujian dan lab offline' : 'Offline access and exam readiness' }}</h3>
            <p>{{ $isId ? 'Seluruh lab latihan, simulasi ujian misteri, dan penerbitan sertifikat progres di '.$brandName.' tersedia gratis secara lokal.' : 'All practice labs, mystery lab challenges, and progress certificates in '.$brandName.' are available offline at no cost.' }}</p>
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/mystery-lab-challenge">
                    <div class="chevron-after">{{ $isId ? 'Akses ujian praktik:' : 'Practical exam access:' }} @include('partials.widget', ['id' => 'burp-certificationstartingprice'])</div>
                </a>
                <a href="/web-security/all-labs">
                    <div class="chevron-after">{{ $isId ? 'Lingkungan lab penuh:' : 'Full lab environment:' }} @include('partials.widget', ['id' => 'burp-prostartingprice'])</div>
                </a>
            </div>
        </div>
    </div>

    <div class="section-full-width theme-white">
        <div class="container-columns-66-percent-left">
            <div class="text-left">
                <h2 class="heading2-dark-blue" id="validate-your-certification">
                    @if ($isId)
                        Validasi <span>sertifikat Anda</span>
                    @else
                        Validate <span>your certification</span>
                    @endif
                </h2>
                <p>{{ $isId ? 'Setiap peserta yang menyelesaikan latihan atau mencapai ambang skor akan memperoleh laporan progres serta kode verifikasi sertifikat unik yang dapat dicetak.' : 'Learners who reach qualification milestones receive a verifiable certificate page with a unique completion code that can be printed or saved.' }}</p>
                <p>{{ $isId ? 'Halaman sertifikat mencantumkan ringkasan pencapaian level Apprentice, Practitioner, dan Expert beserta tanggal penerbitannya.' : 'Your digital certificate lists solved lab milestones across Apprentice, Practitioner, and Expert tiers along with the issue date.' }}</p>
                <p>{{ $isId ? 'Untuk ketentuan penggunaan platform, lihat halaman' : 'For platform terms, please refer to the' }} <a href="/web-security/certification/terms-and-conditions">{{ $isId ? 'syarat dan ketentuan' : 'terms and conditions' }}</a>.</p>
                <p><a class="chevron-after" href="/web-security/certification/verify-your-certification">{{ $isId ? 'Periksa verifikasi dan lihat sertifikat Anda' : 'Verify your certification and view your certificate' }}</a></p>
            </div>
            <div class="desktop-show text-center">
                <img alt="{{ $brandName }} Certified Practitioner logo" src="/web-security/certification/images/validate-your-certification.svg">
            </div>
        </div>

    </div>

    <div class="banner text-center theme-navy-1">
        <div>
            <h2 cms-ignore-validation="HEADING_TOO_LONG" class="heading2-white" id="get-certified-with-burp-suite-the-application-security-testing-toolkit-used-by-more-than-60-000-security-professionals">
                {{ $isId
                    ? 'Uji keterampilan eksploitasi web Anda bersama '.$brandName.' dan raih sertifikat pencapaian praktis.'
                    : 'Build and verify your web exploitation skills with '.$brandName.' hands-on certification training.' }}
            </h2>
            <div class="container-buttons">
                <a class="button-orange" href="/certificate">{{ $isId ? 'Buka Sertifikat' : 'Open Certificate' }}</a>
            </div>
        </div>
    </div>

</div>
@endsection
