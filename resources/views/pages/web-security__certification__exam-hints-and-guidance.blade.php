@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Petunjuk dan Panduan Ujian' : 'Exam hints and guidance').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/certification">{{ $isId ? 'Sertifikasi' : 'Certification' }}</a></li>
        <li>{{ $isId ? 'Petunjuk dan panduan ujian' : 'Exam hints and guidance' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Metodologi Teknis' : 'Technical Methodology' }}</span>
        <h1>{{ $isId ? 'Petunjuk dan panduan pengerjaan ujian' : 'Exam hints and guidance' }}</h1>
        <p class="sdl-lead">
            @if ($isId)
                Pendekatan sistematis jauh lebih menentukan daripada mencoba ratusan payload acak. Gunakan daftar periksa metodologi ini saat menganalisis target ujian.
            @else
                Structured enumeration always outperforms brute-force payload guessing under a 4-hour clock. Keep this diagnostic checklist handy during practice exams.
            @endif
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/certification/practice-exam" class="vla-btn vla-btn--primary">{{ $isId ? 'Coba Ujian Praktik' : 'Practice Exam' }}</a>
            <a href="/web-security/certification/exam-hints-and-guidance/retaking-your-exam" class="vla-btn vla-btn--outline">{{ $isId ? 'Panduan Mengulang Ujian' : 'Retaking Your Exam' }}</a>
        </div>
    </section>

    <section class="sdl-grid sdl-grid--2 sdl-section">
        <div class="sdl-card">
            <h3>{{ $isId ? '1. Petakan seluruh permukaan serangan terlebih dahulu' : '1. Map the full surface before exploiting' }}</h3>
            <p>{{ $isId ? 'Telusuri seluruh rute publik, parameter tersembunyi, header HTTP, dan pesan error. Sering kali petunjuk eskalasi sudah tampak pada respons JSON atau halaman profil.' : 'Spider every public route, hidden query parameter, HTTP header, and verbose error payload before guessing exploits.' }}</p>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? '2. Cari potensi rantai kerentanan' : '2. Look for exploit chains across stages' }}</h3>
            <p>{{ $isId ? 'Jika sebuah fitur tampak aman secara terpisah, periksa apakah output dari satu endpoint dapat disisipkan ke parser atau template engine di endpoint lain.' : 'When an isolated endpoint looks hardened, test whether its stored output or side effects feed into another component.' }}</p>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? '3. Uji desinkronisasi HTTP & header proxy' : '3. Inspect HTTP parsing and headers' }}</h3>
            <p>{{ $isId ? 'Periksa perbedaan interpretasi antara proxy depan dan server aplikasi, termasuk header Host dan chunked encoding menggunakan referensi riset seperti' : 'Audit how reverse proxies and backends parse headers and body boundaries using open-source tools like' }} <a href="https://github.com/PortSwigger/http-request-smuggler" target="_blank" rel="noopener">http-request-smuggler</a>.</p>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? '4. Catat setiap bukti dan waktu eksploitasi' : '4. Document checkpoints as you go' }}</h3>
            <p>{{ $isId ? 'Simpan request dan response kunci di setiap tahap agar Anda tidak kehilangan progres ketika perlu menguji ulang sesi.' : 'Record key request-response pairs at every stage so you can cleanly reproduce progress or pivot quickly.' }}</p>
        </div>
    </section>
</div>
@endsection
