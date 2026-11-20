@extends('layouts.academy')

@section('title', ($isEdit ? 'Edit Category' : __('academy.owner.create_category')).' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <h1>{{ $isEdit ? 'Edit Category: '.$category->title : __('academy.owner.create_category') }}</h1>
    <a href="/owner/categories" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.owner.cancel') }}</a>
</div>

@include('owner._nav')

@if ($errors->any())
    <div class="vla-alert vla-alert--error">
        @foreach ($errors->all() as $err)
            <div>{{ $err }}</div>
        @endforeach
    </div>
@endif

<div class="vla-card" style="max-width:680px">
    <form method="POST" action="{{ $isEdit ? '/owner/categories/'.$category->id : '/owner/categories' }}" class="vla-form">
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif

        @if (! $isEdit)
            <div class="vla-field">
                <label for="cat-id">Category Slug ID * (lowercase letters, numbers, hyphens)</label>
                <input id="cat-id" type="text" name="id" value="{{ old('id', $category->id) }}" placeholder="api-security" required>
            </div>
        @else
            <div class="vla-field">
                <label>Category Slug ID</label>
                <input type="text" value="{{ $category->id }}" disabled>
            </div>
        @endif

        <div class="vla-field">
            <label for="cat-title">Category Title *</label>
            <input id="cat-title" type="text" name="title" value="{{ old('title', $category->title) }}" required>
        </div>

        <div class="vla-field">
            <label for="cat-route">Learning Topic Route *</label>
            <input id="cat-route" type="text" name="topic_route" value="{{ old('topic_route', $category->topic_route ?: '/web-security/') }}" required>
        </div>

        <div class="vla-field">
            <label for="cat-order">Sort Order *</label>
            <input id="cat-order" type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}" required>
        </div>

        <div class="vla-btn-group">
            <button type="submit" class="vla-btn vla-btn--primary">{{ __('academy.owner.save') }}</button>
            <a href="/owner/categories" class="vla-btn vla-btn--outline">{{ __('academy.owner.cancel') }}</a>
        </div>
    </form>
</div>
@endsection
