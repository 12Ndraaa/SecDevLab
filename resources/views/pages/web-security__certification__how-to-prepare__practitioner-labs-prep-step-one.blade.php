@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Persiapan Lab Practitioner' : 'Practitioner lab preparation').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/certification">{{ $isId ? 'Sertifikasi' : 'Certification' }}</a></li>
        <li><a href="/web-security/certification/how-to-prepare">{{ $isId ? 'Cara mempersiapkan diri' : 'How to prepare' }}</a></li>
        <li>{{ $isId ? 'Lab Practitioner' : 'Practitioner labs' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Tahap 02 Persiapan' : 'Prep Step 02' }}</span>
        <h1>{{ $isId ? 'Menyelesaikan seluruh lab tingkat Practitioner' : 'Tackling the Practitioner lab tier' }}</h1>
        <p class="sdl-lead">
            {{ $isId
                ? 'Lab tingkat Practitioner mensimulasikan skenario bypass validasi dan eskalasi dunia nyata. Selesaikan seluruh lab di tingkat ini agar Anda siap menghadapi target ujian tanpa petunjuk.'
                : 'Practitioner challenges bridge foundational mechanics and multi-step real-world bypasses. Completing this tier builds the speed needed for timed evaluations.' }}
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/all-labs?level=PRACTITIONER" class="vla-btn vla-btn--primary">{{ $isId ? 'Filter Lab Practitioner' : 'Browse Practitioner Labs' }}</a>
            <a href="/web-security/certification/how-to-prepare" class="vla-btn vla-btn--outline">{{ $isId ? 'Kembali ke Rencana Persiapan' : 'Back to Prep Guide' }}</a>
        </div>
    </section>

    <section class="sdl-grid sdl-grid--3 sdl-section">
        <div class="sdl-card">
            <h3>{{ $isId ? 'Fokus pada eksploitasi berantai' : 'Prioritize exploit chaining' }}</h3>
            <p>{{ $isId ? 'Latih kemampuan menggabungkan dua celah kecil seperti CORS + XSS atau SSRF + parser differential menjadi dampak kritis.' : 'Practice pairing low-severity findings like open redirects or header quirks into impactful exploitation chains.' }}</p>
        </div>
        <div class="sdl-card">
            <h3>{{ $isId ? 'Ulangi lab sulit setelah 48 jam' : 'Re-solve tricky labs cold' }}</h3>
            <p>{{ $isId ? 'Jika sempat membuka petunjuk, ulangi lab yang sama dua hari kemudian tanpa membuka catatan untuk memastikan konsepnya benar-benar dikuasai.' : 'Whenever you needed a hint, re-attempt that same lab cleanly 48 hours later without notes.' }}</p>
        </div>
        <div class="sdl-card">
            <h3>{{ $isId ? 'Pantau progres per topik di dasbor' : 'Track topic coverage' }}</h3>
            <p>{{ $isId ? 'Pastikan tidak ada kategori utama yang tertinggal sebelum beralih ke Lab Misteri.' : 'Confirm balanced completion across server-side, client-side, and access control topics in your dashboard.' }}</p>
        </div>
    </section>
</div>
@endsection
