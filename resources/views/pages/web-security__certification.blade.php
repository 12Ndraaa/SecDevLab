@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Sertifikasi Keamanan Web' : 'Web Security Certification').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li>{{ $isId ? 'Sertifikasi' : 'Certification' }}</li>
    </ul>

    <section class="sdl-hero">
        <div class="sdl-hero__grid">
            <div>
                <span class="sdl-eyebrow">{{ $isId ? 'Evaluasi Praktik Lokal' : 'Practical Skills Assessment' }}</span>
                <h1>{{ $isId ? 'Sertifikasi keamanan web' : 'Practical Web Security Certification' }}</h1>
                <p class="sdl-lead">
                    @if ($isId)
                        Uji kesiapan Anda sebagai praktisi keamanan aplikasi web melalui simulasi eksploitasi bertahap, persiapan terstruktur di seluruh kategori lab, dan sertifikat progres lokal {{ $brand }}.
                    @else
                        Validate your ability to discover and exploit web vulnerabilities end to end through structured topic preparation, practice exams, and {{ $brand }} completion credentials.
                    @endif
                </p>
                <div class="sdl-hero__actions">
                    <a href="/web-security/certification/how-to-prepare" class="vla-btn vla-btn--primary">
                        {{ $isId ? 'Cara Mempersiapkan Diri' : 'How to Prepare' }}
                    </a>
                    <a href="/web-security/certification/practice-exam" class="vla-btn vla-btn--accent">
                        {{ $isId ? 'Ujian Praktik' : 'Practice Exam' }}
                    </a>
                    <a href="/certificate" class="vla-btn vla-btn--outline">
                        {{ $isId ? 'Lihat Sertifikat Progres' : 'Progress Certificate' }}
                    </a>
                </div>
            </div>

            <div class="sdl-brand-panel">
                <img
                    src="/content/images/logos/secdevlab-icon-square-light.png?v={{ @filemtime(public_path('content/images/logos/secdevlab-icon-square-light.png')) ?: '1' }}"
                    alt="{{ $brand }}"
                    class="sdl-brand-panel__art"
                    width="220"
                    height="220"
                >
                <div class="sdl-stat-strip">
                    <div class="sdl-stat">
                        <div class="sdl-stat__val">4h</div>
                        <div class="sdl-stat__lbl">{{ $isId ? 'Simulasi Ujian' : 'Exam Format' }}</div>
                    </div>
                    <div class="sdl-stat">
                        <div class="sdl-stat__val">2</div>
                        <div class="sdl-stat__lbl">{{ $isId ? 'Target Aplikasi' : 'Target Apps' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sdl-section">
        <div class="sdl-section__head">
            <div>
                <h2>{{ $isId ? 'Panduan & Persiapan Ujian' : 'Exam Guide & Preparation Resources' }}</h2>
                <p class="vla-muted" style="margin:0">{{ $isId ? 'Pilih tahapan di bawah ini untuk memahami format penilaian, strategi pengerjaan, dan latihan tanpa spoiler.' : 'Follow these guides to review exam mechanics, preparation milestones, and hands-on practice workflows.' }}</p>
            </div>
        </div>

        <div class="sdl-grid sdl-grid--3">
            <a href="/web-security/certification/how-it-works" class="sdl-card">
                <span class="sdl-badge">{{ $isId ? 'Format Ujian' : 'Format' }}</span>
                <h3>{{ $isId ? 'Cara Kerja Ujian' : 'How the exam works' }}</h3>
                <p>{{ $isId ? 'Pahami struktur dua aplikasi target, pembagian tiga tahap eksploitasi, serta aturan penilaian praktis.' : 'Understand the two-application assessment layout, three exploitation stages, and scoring criteria.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Pelajari format' : 'Read format guide' }} &rarr;</span>
            </a>

            <a href="/web-security/certification/how-to-prepare" class="sdl-card">
                <span class="sdl-badge">{{ $isId ? 'Persiapan' : 'Preparation' }}</span>
                <h3>{{ $isId ? 'Cara Mempersiapkan Ujian' : 'How to prepare' }}</h3>
                <p>{{ $isId ? 'Rencana latihan bertahap dari level Apprentice, Practitioner, hingga Mystery Labs sebelum simulasi ujian.' : 'Step-by-step roadmap spanning Apprentice, Practitioner, Mystery Labs, and mock exam drills.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Lihat rencana belajar' : 'View prep roadmap' }} &rarr;</span>
            </a>

            <a href="/web-security/certification/practice-exam" class="sdl-card">
                <span class="sdl-badge">{{ $isId ? 'Simulasi' : 'Practice' }}</span>
                <h3>{{ $isId ? 'Ujian Praktik' : 'Practice exam' }}</h3>
                <p>{{ $isId ? 'Latih manajemen waktu dengan menyelesaikan rangkaian skenario acak berantai dalam mode simulasi lokal.' : 'Rehearse time-boxed multi-stage exploitation across unknown categories before test day.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Mulai latihan' : 'Open practice guide' }} &rarr;</span>
            </a>

            <a href="/web-security/certification/exam-hints-and-guidance" class="sdl-card">
                <span class="sdl-badge">{{ $isId ? 'Strategi' : 'Guidance' }}</span>
                <h3>{{ $isId ? 'Petunjuk & Strategi Ujian' : 'Exam hints and guidance' }}</h3>
                <p>{{ $isId ? 'Tinjau daftar referensi teknis, teknik enumerasi awal, dan daftar periksa verifikasi temuan.' : 'Review reconnaissance checklists, methodology tips, and open-source auditing tools.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Baca panduan' : 'Read hints & tips' }} &rarr;</span>
            </a>

            <a href="/web-security/certification/verify-your-certification" class="sdl-card">
                <span class="sdl-badge">{{ $isId ? 'Verifikasi' : 'Credentials' }}</span>
                <h3>{{ $isId ? 'Verifikasi Sertifikat' : 'Verify certification' }}</h3>
                <p>{{ $isId ? 'Cek kelayakan progres akun Anda atau cetak sertifikat kelulusan lab langsung dari sistem lokal.' : 'Check credential guidelines and print your signed local SecDevLab progress report.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Buka verifikasi' : 'Check credentials' }} &rarr;</span>
            </a>

            <a href="/web-security/certification/frequently-asked-questions/index.html" class="sdl-card">
                <span class="sdl-badge">FAQ</span>
                <h3>{{ $isId ? 'Pertanyaan Umum' : 'Frequently asked questions' }}</h3>
                <p>{{ $isId ? 'Jawaban singkat seputar syarat persiapan, lingkungan sandbox, dan langkah mengulang ujian.' : 'Clear answers on prerequisites, environment rules, preparation milestones, and retakes.' }}</p>
                <span class="sdl-card__footer">{{ $isId ? 'Baca FAQ' : 'View FAQ' }} &rarr;</span>
            </a>
        </div>
    </section>

    <section class="sdl-cta">
        <div>
            <h2 style="margin:0 0 6px">{{ $isId ? 'Ingin cetak laporan pencapaian Anda?' : 'Need a printable achievement summary?' }}</h2>
            <p class="vla-muted" style="margin:0">{{ $isId ? 'Setiap lab yang selesai di akun Anda tercatat otomatis dan siap dicetak sebagai laporan progres resmi ' . $brand . '.' : 'Completed labs are recorded on your account and can be exported anytime as a printable ' . $brand . ' progress report.' }}</p>
        </div>
        <div class="vla-btn-group">
            <a href="/certificate" class="vla-btn vla-btn--primary">{{ $isId ? 'Buka Sertifikat Progres' : 'Open Certificate Page' }}</a>
            <a href="/web-security/dashboard" class="vla-btn vla-btn--outline">{{ $isId ? 'Dasbor Belajar' : 'Learning Dashboard' }}</a>
        </div>
    </section>
</div>
@endsection
