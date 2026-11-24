@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Jalur Belajar' : 'Learning paths').' | '.$brand)

@section('academy_body')
<div class="sdl-page" id="academy-started">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li>{{ $isId ? 'Jalur belajar' : 'Learning paths' }}</li>
    </ul>

    <section class="sdl-hero">
        <div class="sdl-hero__grid">
            <div>
                <span class="sdl-eyebrow">{{ $isId ? 'Kurikulum Terstruktur' : 'Structured Curriculum' }}</span>
                <h1 id="web-security-academy-learning-paths">{{ $isId ? 'Jalur Belajar Akademi Keamanan Web' : 'SecDevLab Learning Paths' }}</h1>
                <p class="sdl-lead">
                    @if ($isId)
                        Rangkaian materi bertahap untuk mempelajari keamanan aplikasi web secara teratur sesuai tempo belajar Anda sendiri, mulai dari konsep dasar hingga skenario eksploitasi lanjutan.
                    @else
                        Structured pathways organize our topics and interactive labs step by step so you can build practical web security skills at your own pace.
                    @endif
                </p>
                <div class="sdl-hero__actions">
                    <a href="/web-security/all-topics" class="vla-btn vla-btn--outline">{{ $isId ? 'Semua Topik' : 'All Topics' }}</a>
                    <a href="/web-security/all-labs" class="vla-btn vla-btn--primary">{{ $isId ? 'Katalog Lab' : 'Lab Catalog' }}</a>
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
                        <div class="sdl-stat__val">17</div>
                        <div class="sdl-stat__lbl">{{ $isId ? 'Jalur Terarah' : 'Guided Paths' }}</div>
                    </div>
                    <div class="sdl-stat">
                        <div class="sdl-stat__val">3</div>
                        <div class="sdl-stat__lbl">{{ $isId ? 'Tingkat Kesulitan' : 'Difficulty Tiers' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sdl-section">
        @include('partials.widget', ['id' => 'academy-available-learning-paths'])
    </section>
</div>
@endsection
