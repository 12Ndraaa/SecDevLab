@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', 'Johnny Villarreal | '.($isId ? 'Wawancara Peserta Terbaik' : 'High Flyers Interview').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/getting-started">{{ $isId ? 'Panduan memulai' : 'Getting started' }}</a></li>
        <li>Johnny Villarreal</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Peserta terbaik di Papan Peringkat' : 'High flyers in the Hall of Fame' }}</span>
        <h1>Johnny Villarreal: {{ $isId ? 'Menjadikan Eksploitasi Lab Sebagai Kebiasaan Harian' : 'Building real security depth through steady daily practice' }}</h1>
        <p class="sdl-lead">
            @if ($isId)
                Johnny berfokus pada keteraturan jadwal belajar, dokumentasi catatan eksploitasi pribadi, dan menguji ulang pemahaman di berbagai kategori kerentanan.
            @else
                Johnny combined a consistent daily study routine with detailed personal exploit notes across every major web vulnerability class.
            @endif
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/hall-of-fame" class="vla-btn vla-btn--outline">{{ $isId ? 'Lihat Papan Peringkat' : 'View Hall of Fame' }}</a>
            <a href="/web-security/getting-started" class="vla-btn vla-btn--primary">{{ $isId ? 'Kembali ke Panduan' : 'Back to Getting Started' }}</a>
        </div>
    </section>

    <div class="sdl-grid sdl-grid--2 sdl-section">
        <div class="sdl-card">
            <h3>{{ $isId ? 'Saran utama untuk pemula' : 'Top advice for beginners' }}</h3>
            <p>
                {{ $isId
                    ? 'Jangan terburu-buru melihat jawaban ketika mentok. Coba istirahat sejenak, baca ulang dokumentasi parameter atau header yang dikirim, lalu rumuskan hipotesis baru.'
                    : 'Resist checking solutions too early. Take a short break, inspect every request parameter again, and form a clear hypothesis before retrying.' }}
            </p>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? 'Kebiasaan mencatat yang membantu saat ujian' : 'Note-taking habits that pay off' }}</h3>
            <p>
                {{ $isId
                    ? 'Simpan pola payload, filter yang memicu celah, serta langkah verifikasi akhir dalam catatan ringkas agar mudah dirujuk ulang saat mengaudit aplikasi.'
                    : 'Document working bypass patterns, filter triggers, and verification steps in concise notes so you can recall them quickly during assessments.' }}
            </p>
        </div>
    </div>

    <div class="sdl-quote">
        <p>{{ $isId
            ? 'Latihan setiap hari dalam porsi kecil memberi hasil jauh lebih baik daripada menghafal ratusan payload sekaligus.'
            : 'Steady daily practice builds far deeper understanding than cramming hundreds of payloads without context.' }}</p>
        <cite>Johnny Villarreal</cite>
    </div>

    <div class="sdl-cta">
        <div>
            <h2 style="margin:0 0 4px">{{ $isId ? 'Jelajahi wawancara lainnya' : 'Explore more learner stories' }}</h2>
            <p class="vla-muted" style="margin:0">{{ $isId ? 'Baca catatan peserta lain atau pilih jalur belajar terarah.' : 'Read more practitioner notes or pick a structured learning path.' }}</p>
        </div>
        <div class="vla-btn-group">
            <a href="/web-security/getting-started/kamil-vavra" class="vla-btn vla-btn--outline">Kamil Vavra</a>
            <a href="/web-security/getting-started/andres-rauschecker" class="vla-btn vla-btn--outline">Andres Rauschecker</a>
            <a href="/web-security/all-labs" class="vla-btn vla-btn--primary">{{ $isId ? 'Semua Lab' : 'All Labs' }}</a>
        </div>
    </div>
</div>
@endsection
