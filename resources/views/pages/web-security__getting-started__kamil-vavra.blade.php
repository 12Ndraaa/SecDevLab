@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', 'Kamil Vavra | '.($isId ? 'Wawancara Peserta Terbaik' : 'High Flyers Interview').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/getting-started">{{ $isId ? 'Panduan memulai' : 'Getting started' }}</a></li>
        <li>Kamil Vavra</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Peserta terbaik di Papan Peringkat' : 'High flyers in the Hall of Fame' }}</span>
        <h1>Kamil Vavra: {{ $isId ? 'Mengurai Masalah Kompleks Menjadi Langkah Terukur' : 'Breaking down complex HTTP exploits systematically' }}</h1>
        <p class="sdl-lead">
            @if ($isId)
                Kamil memulai dari kategori dasar lalu menantang diri pada topik lanjutan seperti HTTP request smuggling dan deserialization melalui pendekatan analisis permintaan yang teliti.
            @else
                Kamil progressed from foundational topics to advanced research areas like HTTP request smuggling and insecure deserialization through disciplined request inspection.
            @endif
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/hall-of-fame" class="vla-btn vla-btn--outline">{{ $isId ? 'Lihat Papan Peringkat' : 'View Hall of Fame' }}</a>
            <a href="/web-security/getting-started" class="vla-btn vla-btn--primary">{{ $isId ? 'Kembali ke Panduan' : 'Back to Getting Started' }}</a>
        </div>
    </section>

    <div class="sdl-grid sdl-grid--2 sdl-section">
        <div class="sdl-card">
            <h3>{{ $isId ? 'Menghadapi topik tingkat lanjut' : 'Approaching advanced topics' }}</h3>
            <p>
                {{ $isId
                    ? 'Saat mempelajari request smuggling atau race condition, pecah perilaku front-end dan back-end secara terpisah agar sumber desinkronisasi terlihat jelas.'
                    : 'When tackling request smuggling or race conditions, isolate front-end vs back-end parsing behavior first so desynchronization boundaries become clear.' }}
            </p>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? 'Pentingnya menguji lab misteri' : 'Sharpening skills with mystery labs' }}</h3>
            <p>
                {{ $isId
                    ? 'Lab misteri menghilangkan petunjuk topik, sehingga Anda terbiasa melakukan enumerasi awal sebagaimana saat mengaudit aplikasi sungguhan.'
                    : 'Mystery labs remove category spoilers, forcing you to enumerate and triage targets just as you would on a real engagement.' }}
            </p>
        </div>
    </div>

    <div class="sdl-quote">
        <p>{{ $isId
            ? 'Setelah berhasil memecahkan lab sendiri tanpa melihat petunjuk, konsep teknisnya melekat jauh lebih kuat.'
            : 'Once you solve a difficult challenge on your own after carefully analyzing the traffic, the concept stays with you permanently.' }}</p>
        <cite>Kamil Vavra</cite>
    </div>

    <div class="sdl-cta">
        <div>
            <h2 style="margin:0 0 4px">{{ $isId ? 'Jelajahi wawancara lainnya' : 'Explore more learner stories' }}</h2>
            <p class="vla-muted" style="margin:0">{{ $isId ? 'Baca wawancara praktisi lain atau pilih jalur belajar berikutnya.' : 'Read additional stories or pick your next learning pathway.' }}</p>
        </div>
        <div class="vla-btn-group">
            <a href="/web-security/getting-started/johnny-villarreal" class="vla-btn vla-btn--outline">Johnny Villarreal</a>
            <a href="/web-security/getting-started/andres-rauschecker" class="vla-btn vla-btn--outline">Andres Rauschecker</a>
            <a href="/web-security/all-labs" class="vla-btn vla-btn--primary">{{ $isId ? 'Semua Lab' : 'All Labs' }}</a>
        </div>
    </div>
</div>
@endsection
