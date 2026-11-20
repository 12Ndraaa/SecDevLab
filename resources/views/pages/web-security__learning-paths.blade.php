@extends('layouts.academy')

@section('title', 'Learning paths | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/pslearningpaths.css')

@section('academy_body')
@verbatim
<div class="wrapper" id="academy-started">
        <div class="section-full-width-medium-xx theme-navy-2">
            <div class="container-columns align-vertically-center">
                <div class="margin-left-small margin-right-small">
                    <span class="label theme-community-1">NEW</span>
                    <h1 cms-ignore-validation="DUPLICATE_HEADINGS,HEADING_CAPITALIZATION" id="web-security-academy-learning-paths" class="heading-1 margin-top-tiny">Web Security Academy Learning Paths</h1>
                        <p class="font-size-16">Our carefully curated pathways provide a structured approach to learning
                            web security, empowering you to advance at your own pace while ensuring a deep understanding
                            of the subject matter. </p>
                </div>
                <img class="mobile-hidden" alt="Web Security Academy Learning Paths" src="/images/banners/learning-path.png">
            </div>
        </div>
        @endverbatim@include('partials.widget', ['id' => 'academy-available-learning-paths'])@verbatim
    </div>
@endverbatim
@endsection
