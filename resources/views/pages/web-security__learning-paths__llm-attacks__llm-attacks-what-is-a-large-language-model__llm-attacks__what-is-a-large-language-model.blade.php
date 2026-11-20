@extends('layouts.academy')

@section('title', 'Error | '.config('app.name'))
@section('legacy_css', '/content/psdefault.css')

@section('academy_body')
@verbatim
<section class="banner-container banner-default">
            <div class="container">
                    <h1>Error</h1>
            </div>
        </section>
        
<section class="maincontainer">
    <div id="MainContent" class="container">
        <p>An error occurred. We apologise for the inconvenience.</p>
    </div>
</section>
@endverbatim
@endsection
