@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Cara Kerja Ujian Sertifikasi' : 'How the certification exam works').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/certification">{{ $isId ? 'Sertifikasi' : 'Certification' }}</a></li>
        <li>{{ $isId ? 'Cara kerja ujian' : 'How it works' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Struktur Evaluasi' : 'Assessment Structure' }}</span>
        <h1>{{ $isId ? 'Bagaimana ujian praktisi keamanan web bekerja' : 'How the practical exam works' }}</h1>
        <p class="sdl-lead">
            @if ($isId)
                Ujian berlangsung dalam lingkungan sandbox berbatas waktu dan menguji kemampuan Anda mengeksekusi tiga tahap eksploitasi pada setiap aplikasi target, mulai dari akses awal hingga membaca berkas sistem sensitif.
            @else
                The practical exam takes place in a timed sandbox containing two vulnerable web applications. Each target requires completing three progressive exploitation stages from initial foothold to file disclosure.
            @endif
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/certification/how-to-prepare" class="vla-btn vla-btn--primary">{{ $isId ? 'Rencana Persiapan' : 'How to Prepare' }}</a>
            <a href="/web-security/certification/exam-hints-and-guidance" class="vla-btn vla-btn--outline">{{ $isId ? 'Petunjuk Ujian' : 'Exam Hints' }}</a>
        </div>
    </section>

    <section class="sdl-section">
        <div class="sdl-grid sdl-grid--3">
            <div class="sdl-card">
                <span class="sdl-step-num">1</span>
                <h3>{{ $isId ? 'Tahap 1: Akses Awal' : 'Stage 1: User Access' }}</h3>
                <p>{{ $isId ? 'Temukan celah autentikasi, logika bisnis, atau kebocoran sesi untuk mengambil alih akun pengguna biasa.' : 'Identify authentication flaws, XSS vectors, or broken session handling to gain standard user privileges.' }}</p>
            </div>

            <div class="sdl-card">
                <span class="sdl-step-num">2</span>
                <h3>{{ $isId ? 'Tahap 2: Eskalasi ke Admin' : 'Stage 2: Privilege Escalation' }}</h3>
                <p>{{ $isId ? 'Gabungkan celah kontrol akses, CSRF, atau manipulasi parameter untuk menaikkan hak akses menjadi administrator.' : 'Combine access control flaws, CSRF, or token manipulation to escalate into administrative features.' }}</p>
            </div>

            <div class="sdl-card">
                <span class="sdl-step-num">3</span>
                <h3>{{ $isId ? 'Tahap 3: Akses Berkas Sensitif' : 'Stage 3: Secret Extraction' }}</h3>
                <p>{{ $isId ? 'Manfaatkan fitur admin yang rentan (seperti XXE, SSRF, SQLi, atau deserialization) untuk membaca rahasia dari sistem.' : 'Abuse privileged administrative sinks via SQLi, XXE, SSRF, or deserialization to read the target secret.' }}</p>
            </div>
        </div>
    </section>

    <section class="sdl-card sdl-section">
        <h3>{{ $isId ? 'Prinsip Penilaian & Kelulusan' : 'Scoring & Completion Rules' }}</h3>
        <ul class="sdl-check-list">
            <li><span class="sdl-check-list__dot"></span><span>{{ $isId ? 'Batas waktu pengerjaan standar adalah 4 jam untuk menyelesaikan kedua aplikasi target.' : 'Standard assessment window is 4 hours across two independent vulnerable applications.' }}</span></li>
            <li><span class="sdl-check-list__dot"></span><span>{{ $isId ? 'Tidak ada catatan atau tool yang dilarang; Anda bebas menguji payload dan menggunakan proxy maupun skrip pribadi.' : 'Open-book environment: custom scripts, HTTP proxies, and personal reference notes are encouraged.' }}</span></li>
            <li><span class="sdl-check-list__dot"></span><span>{{ $isId ? 'Penilaian didasarkan pada bukti eksploitasi nyata di lingkungan lab, bukan soal pilihan ganda.' : 'Grading is strictly practical based on verified stage completion rather than multiple-choice trivia.' }}</span></li>
        </ul>
    </section>
</div>
@endsection
