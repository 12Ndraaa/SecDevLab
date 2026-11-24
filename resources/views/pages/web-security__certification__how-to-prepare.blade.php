@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Cara Mempersiapkan Sertifikasi' : 'How to prepare for your certification').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/certification">{{ $isId ? 'Sertifikasi' : 'Certification' }}</a></li>
        <li>{{ $isId ? 'Cara mempersiapkan diri' : 'How to prepare' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Gratis (Mode Offline Lokal)' : 'Free Local Practice Track' }}</span>
        <h1>{{ $isId ? 'Dapatkan Sertifikasi Burp Suite & Persiapan Praktisi Keamanan Web' : 'How to prepare for your practical certification' }}</h1>
        <p class="sdl-lead">
            @if ($isId)
                Ujian praktisi keamanan web menuntut kemampuan eksploitasi nyata di bawah batas waktu. Ikuti rencana persiapan bertahap berikut agar Anda terbiasa mendeteksi celah tanpa bergantung pada petunjuk.
            @else
                Practical web security exams focus heavily on finding and chaining vulnerabilities under time pressure. Follow this progressive drill plan across our offline lab platform.
            @endif
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/all-labs" class="vla-btn vla-btn--primary">{{ $isId ? 'Jelajahi 273 Lab' : 'Browse 273 Labs' }}</a>
            <a href="/web-security/mystery-lab-challenge" class="vla-btn vla-btn--accent">{{ $isId ? 'Latih Lab Misteri' : 'Launch Mystery Labs' }}</a>
            <a href="/web-security/certification/practice-exam" class="vla-btn vla-btn--outline">{{ $isId ? 'Lihat Ujian Praktik' : 'Practice Exam' }}</a>
        </div>
    </section>

    <section class="sdl-section">
        <div class="sdl-grid sdl-grid--2">
            <div class="sdl-card">
                <span class="sdl-step-num">01</span>
                <h3>{{ $isId ? 'Tuntaskan Materi & Lab Apprentice' : 'Master every topic at Apprentice level' }}</h3>
                <p>{{ $isId ? 'Bangun fondasi dengan menyelesaikan seluruh topik utama dan lab tingkat dasar agar setiap kelas kerentanan mudah dikenali.' : 'Build broad coverage by completing topic writeups and Apprentice challenges across authentication, injection, and access control.' }}</p>
                <a href="/web-security/all-topics" class="sdl-card__footer">{{ $isId ? 'Buka daftar topik' : 'Open topic directory' }} &rarr;</a>
            </div>

            <div class="sdl-card">
                <span class="sdl-step-num">02</span>
                <h3>{{ $isId ? 'Kuasai Seluruh Lab Tingkat Practitioner' : 'Complete the Practitioner lab drills' }}</h3>
                <p>{{ $isId ? 'Selesaikan tantangan tingkat menengah yang mencerminkan skenario bypass WAF, filter input ketat, dan eksploitasi berantai.' : 'Work through Practitioner challenges covering parser differentials, strict validation bypasses, and privilege escalation.' }}</p>
                <a href="/web-security/certification/how-to-prepare/practitioner-labs-prep-step-one" class="sdl-card__footer">{{ $isId ? 'Panduan lab Practitioner' : 'Practitioner checklist' }} &rarr;</a>
            </div>

            <div class="sdl-card">
                <span class="sdl-step-num">03</span>
                <h3>{{ $isId ? 'Latihan Tanpa Petunjuk di Lab Misteri' : 'Train blind detection with Mystery Labs' }}</h3>
                <p>{{ $isId ? 'Lepaskan label kategori menggunakan fitur Lab Misteri untuk membiasakan diri memetakan aplikasi secara black-box.' : 'Switch to Mystery Labs so you practice identifying attack surfaces without knowing the vulnerability category ahead of time.' }}</p>
                <a href="/web-security/mystery-lab-challenge" class="sdl-card__footer">{{ $isId ? 'Buka Lab Misteri' : 'Try Mystery Lab' }} &rarr;</a>
            </div>

            <div class="sdl-card">
                <span class="sdl-step-num">04</span>
                <h3>{{ $isId ? 'Simulasi Ujian Berwaktu & Review Catatan' : 'Run timed mock drills & review notes' }}</h3>
                <p>{{ $isId ? 'Rangkum metodologi enumerasi pribadi, biasakan membaca respons HTTP dengan teliti, lalu ikuti alur ujian praktik.' : 'Consolidate personal checklists, verify exploit timing habits, and complete the practice exam drill.' }}</p>
                <a href="/web-security/certification/exam-hints-and-guidance" class="sdl-card__footer">{{ $isId ? 'Petunjuk ujian' : 'Exam hints & tips' }} &rarr;</a>
            </div>
        </div>
    </section>
</div>
@endsection
