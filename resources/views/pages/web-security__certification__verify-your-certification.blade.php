@extends('layouts.academy')

@section('title', 'Verify your Burp Suite Certified Practitioner certification code | Web Security Academy | '.config('app.name'))
@section('legacy_css', '/content/psproducts.css')

@section('academy_body')
@verbatim
<div no-keyword-injection="" class="wrapper" id="certification">

    <div class="hero theme-pro-2">
        <div class="container-columns">
            <div>
                <h1 cms-ignore-validation="DUPLICATE_HEADINGS" class="heading1-white heading-2" id="validate-your-certification"><span>Validate </span>your certification</h1>
                <h3>Demonstrate your web security testing knowledge and Burp Suite skills to the world.</h3>
            </div>
            <img cms-ignore-validation="UNIQUE_IMG_ALT_TEXT" class="desktop-show" alt="SecDevLab" src="/web-security/certification/images/certified-secondary-hero.png">
        </div>
    </div>

    <div class="section theme-white text-center">
        <p class="intro">Enter your unique certification token into the box below, then click "validate". If your token is valid, your SecDevLab Certified Practitioner certificate will be displayed.</p>
    </div>

    <div class="section theme-white text-center">
        @endverbatim@include('partials.widget', ['id' => 'academy-validatecertification'])@verbatim
    </div>


</div>
@endverbatim
@endsection
