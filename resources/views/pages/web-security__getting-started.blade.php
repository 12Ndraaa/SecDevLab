@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Panduan Memulai' : 'Getting started').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li>{{ $isId ? 'Panduan memulai' : 'Getting started' }}</li>
    </ul>

    <section class="sdl-hero">
        <div class="sdl-hero__grid">
            <div>
                <span class="sdl-eyebrow">{{ $isId ? 'Panduan Pemula' : 'Onboarding Guide' }}</span>
                <h1>{{ $isId ? 'Panduan memulai Akademi Keamanan Web' : 'Getting started with ' . $brand }}</h1>
                <p class="sdl-lead">
                    @if ($isId)
                        Mulai perjalanan keamanan web Anda langkah demi langkah. Pelajari konsep kerentanan dari referensi singkat, jalankan lab sandbox per sesi langsung di browser, lalu pantau progres Anda hingga siap menghadapi studi kasus nyata.
                    @else
                        Build real web security skills step by step. Read concise vulnerability writeups, test payloads inside isolated per-session labs, and track your solved challenges across every difficulty tier.
                    @endif
                </p>
                <div class="sdl-hero__actions">
                    <a href="/web-security/sql-injection" class="vla-btn vla-btn--primary">
                        {{ $isId ? 'Mulai dari SQL Injection' : 'Start with SQL Injection' }}
                    </a>
                    <a href="/web-security/learning-paths" class="vla-btn vla-btn--outline">
                        {{ $isId ? 'Lihat Jalur Belajar' : 'Browse Learning Paths' }}
                    </a>
                </div>
            </div>

            <div class="sdl-brand-panel">
                <img
                    src="/content/images/logos/secdevlab-mascot.png?v={{ @filemtime(public_path('content/images/logos/secdevlab-mascot.png')) ?: '1' }}"
                    alt="{{ $brand }}"
                    width="112"
                    height="112"
                    style="width:112px;height:112px;object-fit:contain"
                >
                <div class="sdl-stat-strip">
                    <div class="sdl-stat">
                        <div class="sdl-stat__val">{{ $isId ? 'Gratis' : 'Open' }}</div>
                        <div class="sdl-stat__lbl">{{ $isId ? 'Akses Materi & Lab' : 'Labs & Writeups' }}</div>
                    </div>
                    <div class="sdl-stat">
                        <div class="sdl-stat__val">3</div>
                        <div class="sdl-stat__lbl">{{ $isId ? 'Level Praktik' : 'Practice Tiers' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sdl-section">
        <div class="sdl-section__head">
            <div>
                <h2>{{ $isId ? 'Alur belajar yang disarankan' : 'Recommended learning workflow' }}</h2>
                <p class="vla-muted" style="margin:0">{{ $isId ? 'Empat tahap praktis agar pemahaman teori langsung tersambung dengan eksploitasi nyata.' : 'Four practical steps to connect vulnerability theory directly with exploitation.' }}</p>
            </div>
        </div>

        <div class="sdl-grid sdl-grid--4">
            <div class="sdl-card">
                <span class="sdl-step-num">01</span>
                <h3>{{ $isId ? 'Pahami Pola Kerentanan' : 'Study the flaw pattern' }}</h3>
                <p>{{ $isId ? 'Baca materi topik untuk memahami akar masalah di sisi kode dan cara penyerang memanfaatkannya.' : 'Read topic guides to see how insecure input handling or trust assumptions break.' }}</p>
                <a href="/web-security/all-topics" class="sdl-card__footer">{{ $isId ? 'Daftar topik' : 'All topics' }} &rarr;</a>
            </div>

            <div class="sdl-card">
                <span class="sdl-step-num">02</span>
                <h3>{{ $isId ? 'Luncurkan Lab Terisolasi' : 'Exploit interactive labs' }}</h3>
                <p>{{ $isId ? 'Mulai dari level Apprentice, lanjut ke Practitioner, lalu uji pemahaman dengan tingkat Expert.' : 'Start with Apprentice challenges, advance to Practitioner, and test mastery on Expert labs.' }}</p>
                <a href="/web-security/all-labs" class="sdl-card__footer">{{ $isId ? 'Semua 273 lab' : 'Browse 273 labs' }} &rarr;</a>
            </div>

            <div class="sdl-card">
                <span class="sdl-step-num">03</span>
                <h3>{{ $isId ? 'Ukur Kemampuan Tanpa Petunjuk' : 'Practice blind discovery' }}</h3>
                <p>{{ $isId ? 'Gunakan Lab Misteri untuk mengidentifikasi jenis kerentanan tanpa mengetahui topiknya terlebih dahulu.' : 'Use Mystery Labs to diagnose and exploit an unknown vulnerability category on your own.' }}</p>
                <a href="/web-security/mystery-lab-challenge" class="sdl-card__footer">{{ $isId ? 'Lab misteri' : 'Mystery labs' }} &rarr;</a>
            </div>

            <div class="sdl-card">
                <span class="sdl-step-num">04</span>
                <h3>{{ $isId ? 'Rekam Progres & Uji Diri' : 'Track progress & review' }}</h3>
                <p>{{ $isId ? 'Pantau statistik per kategori di dasbor Anda dan tinjau kesiapan ujian sertifikasi.' : 'Monitor category completion in your dashboard and prepare for practical assessments.' }}</p>
                <a href="/web-security/dashboard" class="sdl-card__footer">{{ $isId ? 'Buka dasbor' : 'Dashboard' }} &rarr;</a>
            </div>
        </div>
    </section>

    <section class="sdl-section">
        <div class="sdl-section__head">
            <div>
                <h2>{{ $isId ? 'Catatan belajar dari para peserta papan peringkat' : 'Insights from top practitioners' }}</h2>
                <p class="vla-muted" style="margin:0">{{ $isId ? 'Bagaimana praktisi keamanan web membangun konsistensi latihan dari nol.' : 'How experienced learners structured their study routines and note-taking.' }}</p>
            </div>
        </div>

        <div class="sdl-grid sdl-grid--3">
            <a href="/web-security/getting-started/johnny-villarreal" class="sdl-card">
                <span class="sdl-avatar-badge">JV</span>
                <h3>Johnny Villarreal</h3>
                <p>{{ $isId ? 'Cara menjaga fokus belajar dari awal, menyusun catatan pribadi, dan mengatasi lab sulit tanpa terburu-buru melihat solusi.' : 'Building disciplined study habits, writing personal notes, and pushing through tough labs.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Baca wawancara' : 'Read interview' }} &rarr;</span>
            </a>

            <a href="/web-security/getting-started/kamil-vavra" class="sdl-card">
                <span class="sdl-avatar-badge">KV</span>
                <h3>Kamil Vavra</h3>
                <p>{{ $isId ? 'Strategi memahami skenario HTTP request smuggling dan memperdalam analisis alur request-response.' : 'Breaking down complex request smuggling scenarios and methodical HTTP debugging.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Baca wawancara' : 'Read interview' }} &rarr;</span>
            </a>

            <a href="/web-security/getting-started/andres-rauschecker" class="sdl-card">
                <span class="sdl-avatar-badge">AR</span>
                <h3>Andres Rauschecker</h3>
                <p>{{ $isId ? 'Bagaimana latihan berulang di sandbox membentuk intuisi cepat saat menghadapi target aplikasi nyata.' : 'How consistent sandbox repetition translates directly into real-world pentest intuition.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Baca wawancara' : 'Read interview' }} &rarr;</span>
            </a>
        </div>
    </section>

    <section class="sdl-cta">
        <div>
            <h2 style="margin:0 0 6px">{{ $isId ? 'Topik rekomendasi untuk pemula: SQL Injection' : 'Recommended starting topic: SQL Injection' }}</h2>
            <p class="vla-muted" style="margin:0">{{ $isId ? 'Salah satu celah paling mendasar untuk memahami bagaimana validasi kueri dan autentikasi dapat ditembus.' : 'One of the clearest entry points for learning how backend input handling and database queries interact.' }}</p>
        </div>
        <div class="vla-btn-group">
            <a href="/web-security/sql-injection" class="vla-btn vla-btn--primary">{{ $isId ? 'Pelajari SQL Injection' : 'Study SQL Injection' }}</a>
            <a href="/web-security/certification" class="vla-btn vla-btn--outline">{{ $isId ? 'Panduan Sertifikasi' : 'Certification Guide' }}</a>
        </div>
    </section>
</div>
@endsection
