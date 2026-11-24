@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Akademi Keamanan Web' : 'Web Security Academy').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <section class="sdl-hero">
        <div class="sdl-hero__grid">
            <div>
                <span class="sdl-eyebrow">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    {{ $brand }} &bull; {{ $isId ? 'Platform Pelatihan Keamanan Web' : 'Hands-On Security Training' }}
                </span>
                <h1>{{ $isId ? 'Platform pelatihan keamanan web praktis' : 'Hands-on web security training, from fundamentals to exploit chains' }}</h1>
                <p class="sdl-lead">
                    @if ($isId)
                        Pelajari cara kerja kerentanan web secara langsung di lingkungan lab yang terisolasi. Mulai dari teori dasar, uji payload nyata di workbench per sesi, lalu catat seluruh progres belajar Anda secara gratis.
                    @else
                        Learn how web vulnerabilities work by reading concise technical deep dives and exploiting isolated per-session labs directly inside your browser. Track your solved labs, explore real CVEs, and sharpen your defensive and offensive intuition.
                    @endif
                </p>
                <div class="sdl-hero__actions">
                    <a href="/web-security/getting-started" class="vla-btn vla-btn--primary">
                        {{ $isId ? 'Mulai Belajar' : 'Get started' }}
                    </a>
                    <a href="/web-security/all-labs" class="vla-btn vla-btn--accent">
                        {{ $isId ? 'Jelajahi 273 Lab' : 'Browse 273 Labs' }}
                    </a>
                    <a href="/web-security/learning-paths" class="vla-btn vla-btn--outline">
                        {{ $isId ? 'Jalur Belajar' : 'Learning paths' }}
                    </a>
                </div>
            </div>

            <div class="sdl-brand-panel">
                <img
                    src="/content/images/logos/secdevlab-icon-square-light.png?v={{ @filemtime(public_path('content/images/logos/secdevlab-icon-square-light.png')) ?: '1' }}"
                    alt="{{ $brand }}"
                    class="sdl-brand-panel__art sdl-brand-panel__art--light"
                    width="240"
                    height="240"
                >
                <img
                    src="/content/images/logos/secdevlab-icon-square-dark.png?v={{ @filemtime(public_path('content/images/logos/secdevlab-icon-square-dark.png')) ?: '1' }}"
                    alt="{{ $brand }}"
                    class="sdl-brand-panel__art sdl-brand-panel__art--dark"
                    width="240"
                    height="240"
                >
                <div class="sdl-stat-strip">
                    <div class="sdl-stat">
                        <div class="sdl-stat__val">273</div>
                        <div class="sdl-stat__lbl">{{ $isId ? 'Lab Interaktif' : 'Interactive Labs' }}</div>
                    </div>
                    <div class="sdl-stat">
                        <div class="sdl-stat__val">31</div>
                        <div class="sdl-stat__lbl">{{ $isId ? 'Topik Keamanan' : 'Security Topics' }}</div>
                    </div>
                    <div class="sdl-stat">
                        <div class="sdl-stat__val">8</div>
                        <div class="sdl-stat__lbl">{{ $isId ? 'Tipe Workbench' : 'Lab Archetypes' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sdl-section">
        <div class="sdl-section__head">
            <div>
                <h2>{{ $isId ? 'Bagaimana Anda berlatih di ' . $brand : 'Everything you need to practice effectively' }}</h2>
                <p class="vla-muted" style="margin:0">
                    {{ $isId ? 'Alur belajar yang menggabungkan dokumentasi teknis, lab terisolasi, dan indeks CVE nyata.' : 'Structured documentation paired with live per-session labs, progress tracking, and curated CVE references.' }}
                </p>
            </div>
        </div>

        <div class="sdl-grid sdl-grid--4">
            <a href="/web-security/all-topics" class="sdl-card">
                <span class="sdl-card__icon" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                </span>
                <h3>{{ $isId ? 'Materi & Referensi Teknis' : 'Technical Documentation' }}</h3>
                <p>{{ $isId ? 'Pelajari mekanisme SQL injection, XSS, SSRF, OAuth, dan kerentanan modern lainnya beserta langkah mitigasinya.' : 'Study the mechanics behind SQL injection, XSS, SSRF, OAuth, deserialization, and race conditions.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Lihat semua topik' : 'Explore 31 topics' }} &rarr;</span>
            </a>

            <a href="/web-security/all-labs" class="sdl-card">
                <span class="sdl-card__icon" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                </span>
                <h3>{{ $isId ? 'Lab Eksploitasi Terisolasi' : 'Isolated Lab Workbench' }}</h3>
                <p>{{ $isId ? 'Setiap peluncuran lab memberi sesi sandbox terpisah lengkap dengan token unik, batas waktu, dan inspektor HTTP.' : 'Launch dedicated per-user instances with capability tokens, TTL lifecycle controls, and realistic target UIs.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Buka katalog lab' : 'Browse all labs' }} &rarr;</span>
            </a>

            <a href="/web-security/learning-paths" class="sdl-card">
                <span class="sdl-card__icon" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </span>
                <h3>{{ $isId ? 'Jalur Belajar Terarah' : 'Structured Learning Paths' }}</h3>
                <p>{{ $isId ? 'Ikuti urutan modul bertahap mulai dari tingkat Apprentice hingga skenario eksploitasi lanjutan.' : 'Follow step-by-step pathways organized by vulnerability topic and difficulty tier from Apprentice upward.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Pilih jalur belajar' : 'View learning paths' }} &rarr;</span>
            </a>

            <a href="/web-security/dashboard" class="sdl-card">
                <span class="sdl-card__icon" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                </span>
                <h3>{{ $isId ? 'Pantau Progres & Peringkat' : 'Progress & Leaderboard' }}</h3>
                <p>{{ $isId ? 'Rekam jumlah lab terselesaikan per tingkat kesulitan, cetak sertifikat progres lokal, dan bandingkan skor di papan peringkat.' : 'Monitor solved labs by Apprentice, Practitioner, and Expert tiers, print reports, and check the hall of fame.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Buka dasbor' : 'Open dashboard' }} &rarr;</span>
            </a>
        </div>
    </section>

    <section class="sdl-section">
        <div class="sdl-section__head">
            <div>
                <h2>{{ $isId ? 'Akses Cepat Modul Unggulan' : 'Quick Links & Skill Checks' }}</h2>
                <p class="vla-muted" style="margin:0">{{ $isId ? 'Latih kemampuan deteksi celah secara acak atau telaah referensi cheat sheet.' : 'Test yourself without spoilers or jump straight into high-signal references.' }}</p>
            </div>
        </div>

        <div class="sdl-grid sdl-grid--3">
            <a href="/web-security/mystery-lab-challenge" class="sdl-card">
                <span class="sdl-badge">{{ $isId ? 'Uji Acak' : 'Blind Challenge' }}</span>
                <h3>{{ $isId ? 'Lab Misteri' : 'Mystery Lab Challenge' }}</h3>
                <p>{{ $isId ? 'Selesaikan skenario acak tanpa mengetahui kategori kerentanan sebelumnya untuk melatih analisis black-box.' : 'Launch a randomized lab with hidden category hints to sharpen real-world vulnerability discovery.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Coba lab misteri' : 'Try mystery lab' }} &rarr;</span>
            </a>

            <a href="/web-security/certification" class="sdl-card">
                <span class="sdl-badge">{{ $isId ? 'Persiapan Ujian' : 'Assessment' }}</span>
                <h3>{{ $isId ? 'Sertifikasi & Ujian Praktik' : 'Practical Certification Guide' }}</h3>
                <p>{{ $isId ? 'Pelajari alur persiapan ujian praktik keamanan aplikasi web dan panduan pengerjaan terstruktur.' : 'Review assessment format, methodology checklists, exam hints, and readiness criteria.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Lihat panduan sertifikasi' : 'View certification guide' }} &rarr;</span>
            </a>

            <a href="/cve" class="sdl-card">
                <span class="sdl-badge">CVE Index</span>
                <h3>{{ $isId ? 'Ensiklopedia CVE' : 'CVE Advisory Encyclopedia' }}</h3>
                <p>{{ $isId ? 'Telusuri referensi CVE berdasarkan tingkat keparahan dan hubungkan langsung dengan lab terkait.' : 'Inspect searchable CVE writeups mapped directly to hands-on vulnerability categories.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Jelajahi CVE' : 'Browse CVEs' }} &rarr;</span>
            </a>
        </div>
    </section>

    <section class="sdl-cta">
        <div>
            <h2 style="margin:0 0 6px">{{ $isId ? 'Siap mencoba lab pertama Anda?' : 'Ready to launch your first lab?' }}</h2>
            <p class="vla-muted" style="margin:0">
                @auth
                    {{ $isId ? 'Akun Anda aktif. Lanjutkan progres dari katalog lab atau halaman dasbor.' : 'Your session is active. Pick a topic from the catalog or resume from your dashboard.' }}
                @else
                    {{ $isId ? 'Masuk atau buat akun gratis untuk menyimpan riwayat penyelesaian lab dan skor Anda.' : 'Sign in or create a free account to persist solved lab state and track your progress.' }}
                @endauth
            </p>
        </div>
        <div class="vla-btn-group">
            @auth
                <a href="/web-security/dashboard" class="vla-btn vla-btn--primary">{{ $isId ? 'Buka Dasbor' : 'Open Dashboard' }}</a>
                <a href="/web-security/all-labs" class="vla-btn vla-btn--outline">{{ $isId ? 'Semua Lab' : 'All Labs' }}</a>
            @else
                <a href="/users/register" class="vla-btn vla-btn--primary">{{ $isId ? 'Buat Akun Gratis' : 'Create Free Account' }}</a>
                <a href="/users" class="vla-btn vla-btn--outline">{{ $isId ? 'Masuk' : 'Log In' }}</a>
            @endauth
        </div>
    </section>
</div>
@endsection
