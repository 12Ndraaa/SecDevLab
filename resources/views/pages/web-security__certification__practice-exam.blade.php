@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Ujian Praktik' : 'Practice exam').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/certification">{{ $isId ? 'Sertifikasi' : 'Certification' }}</a></li>
        <li>{{ $isId ? 'Ujian praktik' : 'Practice exam' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Simulasi Lingkungan Lokal' : 'Local Simulation' }}</span>
        <h1>{{ $isId ? 'Ujian praktik keamanan web' : 'Practical Security Practice Exam' }}</h1>
        <p class="sdl-lead">
            @if ($isId)
                Gunakan mode ujian praktik untuk menguji kesiapan menghadapi target acak tanpa petunjuk kategori, melatih kecepatan enumerasi HTTP, dan mengukur ketepatan eksploitasi berantai.
            @else
                Use the practice exam workflow to rehearse full exploitation cycles against unknown targets, build note-taking speed, and validate readiness before an assessment.
            @endif
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/mystery-lab-challenge" class="vla-btn vla-btn--primary">{{ $isId ? 'Mulai Tantangan Misteri' : 'Start Mystery Challenge' }}</a>
            <a href="/web-security/all-labs?level=PRACTITIONER" class="vla-btn vla-btn--outline">{{ $isId ? 'Latih Lab Practitioner' : 'Drill Practitioner Labs' }}</a>
        </div>
    </section>

    <section class="sdl-grid sdl-grid--2 sdl-section">
        <div class="sdl-card">
            <h3>{{ $isId ? 'Apa yang diuji pada simulasi' : 'What the practice drill tests' }}</h3>
            <ul class="sdl-check-list">
                <li><span class="sdl-check-list__dot"></span><span>{{ $isId ? 'Identifikasi permukaan serangan tanpa label topik sebelumnya.' : 'Attack surface mapping without topic category spoilers.' }}</span></li>
                <li><span class="sdl-check-list__dot"></span><span>{{ $isId ? 'Eksploitasi bertahap dari akses pengguna hingga admin atau kebocoran data.' : 'Multi-step chaining from unauthenticated surface to sensitive access.' }}</span></li>
                <li><span class="sdl-check-list__dot"></span><span>{{ $isId ? 'Disiplin manajemen waktu menggunakan penghitung TTL per sesi lab.' : 'Strict time discipline using per-session lab TTL timers.' }}</span></li>
            </ul>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? 'Prasyarat yang disarankan' : 'Recommended readiness check' }}</h3>
            <p>{{ $isId ? 'Selesaikan minimal 70% lab tingkat Apprentice dan Practitioner serta biasakan memakai fitur Mystery Lab sebelum melakukan simulasi berbatas waktu.' : 'Complete your core Apprentice and Practitioner labs first, then tackle 5+ Mystery Labs consecutively without hints.' }}</p>
            <a href="/web-security/dashboard" class="sdl-card__footer">{{ $isId ? 'Cek progres akun Anda' : 'Check account progress' }} &rarr;</a>
        </div>
    </section>
</div>
@endsection
