@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Verifikasi Sertifikat' : 'Verify your certification').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/certification">{{ $isId ? 'Sertifikasi' : 'Certification' }}</a></li>
        <li>{{ $isId ? 'Verifikasi sertifikat' : 'Verify certification' }}</li>
    </ul>

    <section class="sdl-hero">
        <div class="sdl-hero__grid">
            <div>
                <span class="sdl-eyebrow">{{ $isId ? 'Validasi Kredensial' : 'Credential Verification' }}</span>
                <h1>{{ $isId ? 'Verifikasi sertifikat & laporan pencapaian' : 'Verify completion credentials' }}</h1>
                <p class="sdl-lead">
                    @if ($isId)
                        Catatan penyelesaian lab pada instalasi {{ $brand }} tersimpan per akun di basis data lokal. Anda dapat meninjau atau mencetak ringkasan kelulusan lab kapan saja melalui halaman sertifikat pribadi.
                    @else
                        Solved lab records on this {{ $brand }} instance are tracked per authenticated account. View or print your personalized completion sheet directly from your account certificate page.
                    @endif
                </p>
                <div class="sdl-hero__actions">
                    <a href="/certificate" class="vla-btn vla-btn--primary">{{ $isId ? 'Buka Sertifikat Progres Saya' : 'View My Certificate' }}</a>
                    <a href="/web-security/hall-of-fame" class="vla-btn vla-btn--outline">{{ $isId ? 'Lihat Papan Peringkat' : 'View Hall of Fame' }}</a>
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
                        <div class="sdl-stat__val">PDF / Print</div>
                        <div class="sdl-stat__lbl">{{ $isId ? 'Laporan Siap Cetak' : 'Printable Sheet' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
