@extends('layouts.academy')

@section('title', __('academy.owner.nav_categories').' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <h1>{{ __('academy.owner.nav_categories') }}</h1>
    <a href="/owner/categories/create" class="vla-btn vla-btn--primary">+ {{ __('academy.owner.create_category') }}</a>
</div>

@include('owner._nav')

<form method="GET" action="/owner/categories" class="vla-filter-card">
    <div class="vla-filter-row">
        <input type="search" name="search" value="{{ $search }}" placeholder="Search category slug or title...">
        <button type="submit" class="vla-btn vla-btn--primary vla-btn--sm">{{ __('academy.labs.filter') }}</button>
    </div>
</form>

<div class="vla-table-wrap">
    <table class="vla-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Slug ID</th>
                <th>Title</th>
                <th>Topic Route</th>
                <th>Labs</th>
                <th>CVEs</th>
                <th>{{ __('academy.owner.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{ $cat->sort_order }}</td>
                    <td><code>{{ $cat->id }}</code></td>
                    <td><strong>{{ $cat->title }}</strong></td>
                    <td><a href="{{ $cat->topic_route }}">{{ $cat->topic_route }}</a></td>
                    <td><span class="vla-badge vla-badge--accent">{{ $cat->labs_count }}</span></td>
                    <td><span class="vla-badge vla-badge--muted">{{ $cat->cve_articles_count }}</span></td>
                    <td>
                        <div class="vla-btn-group">
                            <a href="/owner/categories/{{ $cat->id }}/edit" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.owner.edit') }}</a>
                            <form method="POST" action="/owner/categories/{{ $cat->id }}" class="vla-inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="vla-btn vla-btn--danger vla-btn--sm">{{ __('academy.owner.delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
