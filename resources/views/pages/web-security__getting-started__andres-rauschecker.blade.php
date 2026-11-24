@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', 'Andres Rauschecker | '.($isId ? 'Wawancara Peserta Terbaik' : 'High Flyers Interview').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/getting-started">{{ $isId ? 'Panduan memulai' : 'Getting started' }}</a></li>
        <li>Andres Rauschecker</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Peserta terbaik di Papan Peringkat' : 'High flyers in the Hall of Fame' }}</span>
        <h1>Andres Rauschecker: {{ $isId ? 'Belajar Keamanan Web Lewat Eksperimen Langsung' : 'Turning curiosity into repeatable security intuition' }}</h1>
        <p class="sdl-lead">
            @if ($isId)
                Andres mulai mendalami keamanan siber ketika kuliah di bidang teknik jaringan, lalu rutin melatih kemampuan eksploitasi dari level dasar hingga skenario lanjutan.
            @else
                Andres first became interested in cybersecurity during his computer networking studies and steadily worked through hands-on labs to build lasting technical intuition.
            @endif
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/hall-of-fame" class="vla-btn vla-btn--outline">{{ $isId ? 'Lihat Papan Peringkat' : 'View Hall of Fame' }}</a>
            <a href="/web-security/getting-started" class="vla-btn vla-btn--primary">{{ $isId ? 'Kembali ke Panduan' : 'Back to Getting Started' }}</a>
        </div>
    </section>

    <div class="sdl-grid sdl-grid--2 sdl-section">
        <div class="sdl-card">
            <h3>{{ $isId ? 'Bagaimana Anda menjaga konsistensi saat menemui jalan buntu?' : 'How do you handle difficult labs?' }}</h3>
            <p>
                {{ $isId
                    ? 'Saat sebuah payload tidak bekerja sesuai dugaan, memetakan alur aplikasi kembali dari awal jauh lebih efektif daripada menebak secara acak. Luangkan waktu mencatat setiap perilaku HTTP yang aneh.'
                    : 'Whenever a payload fails, stepping back to map the application flow from scratch beats blind trial and error. Keep clean notes on every unexpected response behavior.' }}
            </p>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? 'Apa perbedaan terbesar antara teori dan praktik di lab?' : 'Why practice in live sandbox environments?' }}</h3>
            <p>
                {{ $isId
                    ? 'Membaca definisi kerentanan mudah dilakukan, tetapi hanya praktik berulang di lingkungan sandbox yang membuat Anda cepat mengenali celah di aplikasi nyata.'
                    : 'Reading about vulnerability classes gives you vocabulary, but hands-on repetition is what trains you to recognize subtle trust flaws under time pressure.' }}
            </p>
        </div>
    </div>

    <div class="sdl-quote">
        <p>{{ $isId
            ? 'Saya menyelesaikan lab secara bertahap hingga benar-benar paham mengapa kerentanan itu muncul, bukan sekadar menyalin solusi.'
            : 'I worked through labs methodically so I understood why each flaw existed rather than simply copying payloads.' }}</p>
        <cite>Andres Rauschecker</cite>
    </div>

    <div class="sdl-cta">
        <div>
            <h2 style="margin:0 0 4px">{{ $isId ? 'Jelajahi wawancara lainnya' : 'Explore more learner stories' }}</h2>
            <p class="vla-muted" style="margin:0">{{ $isId ? 'Pelajari strategi belajar peserta lain atau langsung mulai latihan di katalog lab.' : 'Read additional interviews or launch a challenge directly from the lab catalog.' }}</p>
        </div>
        <div class="vla-btn-group">
            <a href="/web-security/getting-started/johnny-villarreal" class="vla-btn vla-btn--outline">Johnny Villarreal</a>
            <a href="/web-security/getting-started/kamil-vavra" class="vla-btn vla-btn--outline">Kamil Vavra</a>
            <a href="/web-security/all-labs" class="vla-btn vla-btn--primary">{{ $isId ? 'Semua Lab' : 'All Labs' }}</a>
        </div>
    </div>
</div>
@endsection
