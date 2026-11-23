@extends('layouts.academy')

@php $isId = ($uiLocale ?? app()->getLocale()) === 'id'; @endphp
@section('title', ($isId ? 'Jalur Belajar' : 'Learning paths').' | '.(config('app.name') ?: 'SecDevLab'))
@section('legacy_css', '/content/pslearningpaths.css')

@section('academy_body')
<div class="wrapper" id="academy-started">
    <div class="section-full-width-medium-xx theme-navy-2">
        <div class="container-columns align-vertically-center">
            <div class="margin-left-small margin-right-small">
                <span class="label theme-community-1">{{ $isId ? 'BARU' : 'NEW' }}</span>
                <h1 cms-ignore-validation="DUPLICATE_HEADINGS,HEADING_CAPITALIZATION" id="web-security-academy-learning-paths" class="heading-1 margin-top-tiny">
                    {{ $isId ? 'Jalur Belajar Akademi Keamanan Web' : 'Web Security Academy Learning Paths' }}
                </h1>
                <p class="font-size-16">
                    @if ($isId)
                        Rangkaian materi bertahap untuk mempelajari keamanan aplikasi web secara teratur sesuai tempo belajar Anda sendiri.
                    @else
                        Our structured pathways guide your study of web security step by step, helping you advance at your own pace while building solid practical understanding.
                    @endif
                </p>
            </div>
            <img class="mobile-hidden" alt="{{ $isId ? 'Jalur Belajar Akademi' : 'Web Security Academy Learning Paths' }}" src="/images/banners/learning-path.png">
        </div>
    </div>
    @include('partials.widget', ['id' => 'academy-available-learning-paths'])
</div>
@endsection
