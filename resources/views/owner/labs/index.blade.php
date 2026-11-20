@extends('layouts.academy')

@section('title', __('academy.owner.nav_labs').' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <h1>{{ __('academy.owner.nav_labs') }}</h1>
    <a href="/owner/labs/create" class="vla-btn vla-btn--primary">+ {{ __('academy.owner.create_lab') }}</a>
</div>

@include('owner._nav')

<form method="GET" action="/owner/labs" class="vla-filter-card">
    <div class="vla-filter-row">
        <input type="search" name="search" value="{{ $search }}" placeholder="Search lab title, href, or ID...">
        <select name="category">
            <option value="ALL">{{ __('academy.cve.all_categories') }}</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @selected($categoryId === $cat->id)>{{ $cat->title }}</option>
            @endforeach
        </select>
        <select name="difficulty">
            <option value="ALL">{{ __('academy.labs.all_levels') }}</option>
            <option value="APPRENTICE" @selected($difficulty === 'APPRENTICE')>Apprentice</option>
            <option value="PRACTITIONER" @selected($difficulty === 'PRACTITIONER')>Practitioner</option>
            <option value="EXPERT" @selected($difficulty === 'EXPERT')>Expert</option>
        </select>
        <button type="submit" class="vla-btn vla-btn--primary vla-btn--sm">{{ __('academy.labs.filter') }}</button>
    </div>
</form>

<div class="vla-table-wrap">
    <table class="vla-table">
        <thead>
            <tr>
                <th>Difficulty</th>
                <th>Title &amp; Path</th>
                <th>Category</th>
                <th>Theme</th>
                <th>{{ __('academy.owner.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($labs as $lab)
                <tr>
                    <td><span class="{{ $lab->difficulty_class }}">{{ $lab->difficulty }}</span></td>
                    <td>
                        <strong><a href="{{ $lab->href }}">{{ $lab->title }}</a></strong>
                        <div class="vla-muted-sm"><code>{{ $lab->href }}</code></div>
                    </td>
                    <td>{{ $lab->category?->title ?? $lab->category_id }}</td>
                    <td><span class="vla-badge vla-badge--muted">{{ $lab->profile['theme'] ?? 'ecommerce' }}</span></td>
                    <td>
                        <div class="vla-btn-group">
                            <a href="/owner/labs/{{ $lab->id }}/edit" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.owner.edit') }}</a>
                            <form method="POST" action="/owner/labs/{{ $lab->id }}" class="vla-inline-form">
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

<div class="vla-pagination">{{ $labs->links() }}</div>
@endsection
