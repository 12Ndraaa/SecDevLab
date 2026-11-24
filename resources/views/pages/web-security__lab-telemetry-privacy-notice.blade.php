@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Pemberitahuan Privasi Telemetri Lab Akademi' : 'Academy Labs Telemetry Privacy Notice').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li>{{ $isId ? 'Pemberitahuan Privasi Telemetri Lab Akademi' : 'Academy Labs Telemetry Privacy Notice' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Privasi & Telemetri Sesi' : 'Session Telemetry Privacy' }}</span>
        <h1>{{ $isId ? 'Pemberitahuan Privasi Telemetri Lab Akademi' : 'Academy Labs Telemetry Privacy Notice' }}</h1>
        <p class="sdl-lead">
            {{ $isId
                ? 'Dokumen ini menjelaskan data sesi lab apa saja yang dicatat secara lokal di dalam aplikasi ' . $brand . ' ketika Anda menjalankan lab praktik dan menyimpan progres penyelesaian.'
                : 'This notice outlines what session telemetry is recorded locally inside ' . $brand . ' when you launch labs and track completion progress.' }}
        </p>
    </section>

    <section class="sdl-grid sdl-grid--2 sdl-section">
        <div class="sdl-card">
            <h2>{{ $isId ? '1. Siapa kami' : '1. Who we are' }}</h2>
            <p>{{ $isId
                ? $brand . ' adalah platform pelatihan keamanan aplikasi web berbasis isolasi per sesi lokal. Semua data progres dan instansi lab disimpan pada database instance Anda sendiri.'
                : $brand . ' is a localized hands-on web security training environment. All progress and lab session records stay inside this instance database.' }}</p>
        </div>

        <div class="sdl-card">
            <h2>{{ $isId ? '2. Data yang disimpan per sesi lab' : '2. Session data stored locally' }}</h2>
            <p>{{ $isId
                ? 'Saat Anda meluncurkan lab, sistem mencatat ID pengguna, token instansi sementara, status penyelesaian lab, serta log probe HTTP workbench untuk keperluan verifikasi skenario.'
                : 'When you launch a lab, the platform tracks your user ID, scoped capability token, solved flag state, and workbench HTTP probe logs used to evaluate solutions.' }}</p>
        </div>

        <div class="sdl-card">
            <h2>{{ $isId ? '3. Isolasi & Kedaluwarsa Sesi (TTL)' : '3. Session isolation & TTL expiry' }}</h2>
            <p>{{ $isId
                ? 'Setiap sesi lab otomatis berakhir sesuai batas waktu (TTL) dan tidak mengirim telemetri ke server eksternal pihak ketiga.'
                : 'Lab sessions automatically expire when their TTL elapses and no third-party external telemetry is transmitted.' }}</p>
        </div>

        <div class="sdl-card">
            <h2>{{ $isId ? '4. Pertanyaan & Pengaturan Akun' : '4. Questions & account controls' }}</h2>
            <p>{{ $isId
                ? 'Anda dapat memantau seluruh lab terselesaikan melalui Dasbor atau mengelola akun langsung dari halaman Pengaturan Akun.'
                : 'You can inspect your solved lab history in your Dashboard or manage your session from the Account page.' }}</p>
            <a href="/users/your-account" class="sdl-card__footer">{{ $isId ? 'Halaman Akun' : 'Account settings' }} &rarr;</a>
        </div>
    </section>
</div>
@endsection
