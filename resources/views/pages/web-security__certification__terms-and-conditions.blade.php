@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Syarat dan Ketentuan Sertifikasi' : 'Certification terms and conditions').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/certification">{{ $isId ? 'Sertifikasi' : 'Certification' }}</a></li>
        <li>{{ $isId ? 'Syarat dan ketentuan' : 'Terms and conditions' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Pedoman Penggunaan Lab' : 'Platform Guidelines' }}</span>
        <h1>{{ $isId ? 'Syarat dan ketentuan evaluasi praktik ' . $brand : $brand . ' assessment terms and conditions' }}</h1>
        <p class="sdl-lead">
            {{ $isId
                ? 'Ketentuan berikut mengatur penggunaan lingkungan latihan, integritas pengerjaan mandiri, serta batas lingkup sandbox di platform lokal ' . $brand . '.'
                : 'These guidelines cover acceptable testing boundaries, independent work integrity, and sandbox usage within the local ' . $brand . ' training environment.' }}
        </p>
    </section>

    <section class="sdl-grid sdl-grid--2 sdl-section">
        <div class="sdl-card">
            <h3>{{ $isId ? '1. Lingkup Sandbox & Isolasi Sesi' : '1. Sandbox Scope & Session Isolation' }}</h3>
            <p>{{ $isId
                ? 'Seluruh aktivitas eksploitasi hanya boleh dijalankan di dalam sesi workbench terisolasi yang disediakan oleh ' . $brand . '. Setiap token instansi dibatasi TTL dan terpisah per akun.'
                : 'All exploitation exercises are strictly scoped to isolated workbench sessions issued by ' . $brand . ' under per-user capability tokens.' }}</p>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? '2. Integritas Pengerjaan Mandiri' : '2. Independent Assessment Integrity' }}</h3>
            <p>{{ $isId
                ? 'Sertifikat progres mencatat penyelesaian lab yang dijalankan melalui mekanisme verifikasi asli lab, bukan pintasan skrip eksternal atau manipulasi database.'
                : 'Completion records reflect labs solved through genuine vulnerability triggers inside each workbench rather than direct DB tampering.' }}</p>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? '3. Referensi Terbuka' : '3. Open-Book Study Resources' }}</h3>
            <p>{{ $isId
                ? 'Peserta dianjurkan memakai catatan pribadi, skrip diagnostik, maupun alat proxy selama pengujian terhadap sesi lab miliknya sendiri.'
                : 'Learners may use personal notes, diagnostic scripts, and web proxies strictly against their own active workbench instances.' }}</p>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? '4. Ketentuan Situs Web Terkait' : '4. Related Website Usage Terms' }}</h3>
            <p>{{ $isId
                ? 'Tinjau pula pedoman penggunaan situs lokal dan kebijakan telemetri sesi lab di halaman terkait.'
                : 'Please review the local platform terms of use and lab telemetry notice for additional details.' }}</p>
            <a href="/web-security/certification/terms-and-conditions/website-terms-of-use" class="sdl-card__footer">{{ $isId ? 'Ketentuan penggunaan situs' : 'Website terms of use' }} &rarr;</a>
        </div>
    </section>
</div>
@endsection
