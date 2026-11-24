@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Ketentuan Penggunaan Situs' : 'Website terms of use').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/certification">{{ $isId ? 'Sertifikasi' : 'Certification' }}</a></li>
        <li>{{ $isId ? 'Ketentuan penggunaan situs' : 'Website terms of use' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Dokumen Platform' : 'Platform Policy' }}</span>
        <h1>{{ $isId ? 'Ketentuan penggunaan situs web ' . $brand : $brand . ' website terms of use' }}</h1>
        <p class="sdl-lead">
            {{ $isId
                ? 'Aturan dasar pemanfaatan materi edukasi, lingkungan simulasi kerentanan, serta isolasi akun pengguna pada platform ' . $brand . '.'
                : 'General terms governing access to educational documentation, isolated vulnerability sandboxes, and user accounts on ' . $brand . '.' }}
        </p>
    </section>

    <section class="sdl-card sdl-section">
        <h3>{{ $isId ? 'Ringkasan Penggunaan yang Diperbolehkan' : 'Permitted Educational Use' }}</h3>
        <ul class="sdl-check-list">
            <li><span class="sdl-check-list__dot"></span><span>{{ $isId ? 'Seluruh payload dan teknik yang dipelajari hanya untuk latihan di sandbox terotorisasi dan riset keamanan defensif.' : 'Techniques and payload examples are provided solely for authorized sandbox practice and defensive engineering.' }}</span></li>
            <li><span class="sdl-check-list__dot"></span><span>{{ $isId ? 'Setiap pengguna bertanggung jawab menjaga kredensial akun serta token sesi instansi lab miliknya masing-masing.' : 'Account holders are responsible for keeping login credentials and active instance tokens confidential.' }}</span></li>
            <li><span class="sdl-check-list__dot"></span><span>{{ $isId ? 'Untuk pertanyaan administratif atau laporan bug lokal, hubungi administrator instance ' . $brand . ' Anda.' : 'For administrative inquiries on this local deployment, contact your ' . $brand . ' platform maintainer.' }}</span></li>
        </ul>
    </section>
</div>
@endsection
