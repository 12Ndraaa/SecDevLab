@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Panduan Mengulang Ujian' : 'Retaking your exam').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/certification">{{ $isId ? 'Sertifikasi' : 'Certification' }}</a></li>
        <li><a href="/web-security/certification/exam-hints-and-guidance">{{ $isId ? 'Petunjuk ujian' : 'Exam hints' }}</a></li>
        <li>{{ $isId ? 'Mengulang ujian' : 'Retaking your exam' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Evaluasi Pasca Ujian' : 'Post-Attempt Review' }}</span>
        <h1>{{ $isId ? 'Strategi menghadapi ujian ulang dengan hasil lebih baik' : 'Retaking your exam with a sharper game plan' }}</h1>
        <p class="sdl-lead">
            @if ($isId)
                Belum berhasil pada percobaan pertama bukan akhir perjalanan. Gunakan hasil evaluasi untuk memetakan area yang menghambat waktu Anda sebelum memulai simulasi berikutnya.
            @else
                Missing the passing mark on your first try highlights specific bottleneck areas. Audit what slowed you down before running another timed attempt.
            @endif
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/mystery-lab-challenge" class="vla-btn vla-btn--primary">{{ $isId ? 'Latih Lab Misteri' : 'Launch Mystery Labs' }}</a>
            <a href="/web-security/certification/how-to-prepare" class="vla-btn vla-btn--outline">{{ $isId ? 'Panduan Persiapan' : 'Prep Guide' }}</a>
        </div>
    </section>

    <section class="sdl-grid sdl-grid--3 sdl-section">
        <div class="sdl-card">
            <span class="sdl-step-num">01</span>
            <h3>{{ $isId ? 'Tinjau tahap yang terlewat' : 'Diagnose stalled stages' }}</h3>
            <p>{{ $isId ? 'Identifikasi apakah kendala muncul saat enumerasi awal, eskalasi hak akses, atau ekstraksi payload lanjutan.' : 'Pinpoint whether time was lost during initial foothold discovery, privilege escalation, or final payload execution.' }}</p>
        </div>

        <div class="sdl-card">
            <span class="sdl-step-num">02</span>
            <h3>{{ $isId ? 'Perkuat topik terlemah' : 'Drill weaker categories' }}</h3>
            <p>{{ $isId ? 'Ulangi seluruh lab tingkat Practitioner di topik terkait tanpa melihat solusi hingga alurnya terasa alami.' : 'Re-solve Practitioner labs in those categories from scratch until every detection signal is second nature.' }}</p>
        </div>

        <div class="sdl-card">
            <span class="sdl-step-num">03</span>
            <h3>{{ $isId ? 'Perbaiki manajemen waktu' : 'Refine time budgeting' }}</h3>
            <p>{{ $isId ? 'Alokasikan waktu enumerasi terukur per aplikasi target dan segera catat temuan kecil sebelum berpindah vektor.' : 'Set clear timeboxes per application stage so stubborn dead ends never starve the remaining target.' }}</p>
        </div>
    </section>
</div>
@endsection
