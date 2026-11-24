@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Pertanyaan Umum Sertifikasi' : 'Certification FAQs').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/certification">{{ $isId ? 'Sertifikasi' : 'Certification' }}</a></li>
        <li>{{ $isId ? 'Pertanyaan umum' : 'FAQs' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">FAQ</span>
        <h1>{{ $isId ? 'Pertanyaan yang sering diajukan seputar sertifikasi' : 'Certification frequently asked questions' }}</h1>
        <p class="sdl-lead">
            {{ $isId
                ? 'Rangkuman jawaban mengenai format evaluasi praktik, kesiapan materi di ' . $brand . ', serta cara mencetak sertifikat progres belajar Anda.'
                : 'Clear answers covering practical exam mechanics, readiness criteria across ' . $brand . ' labs, and local progress reporting.' }}
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/certification/how-to-prepare" class="vla-btn vla-btn--primary">{{ $isId ? 'Panduan Persiapan' : 'Prep Roadmap' }}</a>
            <a href="/certificate" class="vla-btn vla-btn--outline">{{ $isId ? 'Sertifikat Progres' : 'Progress Certificate' }}</a>
        </div>
    </section>

    <section class="sdl-faq sdl-section">
        <details open>
            <summary>{{ $isId ? '1. Seperti apa bentuk ujian praktisi keamanan web?' : '1. What is the format of the practical exam?' }}</summary>
            <p>{{ $isId
                ? 'Ujian berbentuk praktik langsung terhadap dua aplikasi web target yang rentan. Setiap target memiliki tiga tahap berturut-turut mulai dari akses pengguna awal hingga pengambilan rahasia sistem.'
                : 'It is a 100% hands-on evaluation featuring two vulnerable target web applications, each requiring three progressive exploitation stages.' }}</p>
        </details>

        <details>
            <summary>{{ $isId ? '2. Apakah materi di SecDevLab cukup untuk persiapan?' : '2. Are SecDevLab materials enough to prepare?' }}</summary>
            <p>{{ $isId
                ? 'Seluruh topik inti, 273 lab interaktif lintas tingkat kesulitan, dan fitur Mystery Lab dirancang untuk melatih teknik yang dibutuhkan pada skenario ujian.'
                : 'Yes. Working through the core topics, Practitioner labs, and Mystery Labs covers the exploitation skills needed for multi-stage assessments.' }}</p>
        </details>

        <details>
            <summary>{{ $isId ? '3. Alat dan catatan apa yang boleh digunakan?' : '3. What tools and references are allowed?' }}</summary>
            <p>{{ $isId
                ? 'Lingkungan ujian bersifat open-book: Anda dapat memanfaatkan HTTP proxy, skrip otomasi pribadi, dan dokumentasi catatan Anda sendiri.'
                : 'The assessment is open-book. HTTP interception proxies, custom helper scripts, and personal notes are permitted.' }}</p>
        </details>

        <details>
            <summary>{{ $isId ? '4. Bagaimana cara memverifikasi dan mencetak laporan progres lokal saya?' : '4. How do I print my local completion report?' }}</summary>
            <p>{{ $isId
                ? 'Masuk ke akun Anda lalu buka halaman Sertifikat Progres untuk melihat rekap penyelesaian per tingkat kesulitan dan mencetak laporan langsung lewat browser.'
                : 'Sign in and visit the Certificate page from your account menu to view and print your local completion breakdown.' }}</p>
        </details>
    </section>
</div>
@endsection
