@extends('layouts.academy')

@section('title', __('academy.owner.nav_users').' | '.config('app.name'))

@section('content')
<div class="vla-section-head" style="margin-top:0">
    <h1>{{ __('academy.owner.nav_users') }}</h1>
    <a href="/owner/users/create" class="vla-btn vla-btn--primary">+ {{ __('academy.owner.create_user') }}</a>
</div>

@include('owner._nav')

<form method="GET" action="/owner/users" class="vla-filter-card">
    <div class="vla-filter-row">
        <input type="search" name="search" value="{{ $search }}" placeholder="Search name or email...">
        <select name="role">
            <option value="ALL">All roles</option>
            <option value="owner" @selected($role === 'owner')>Owner</option>
            <option value="user" @selected($role === 'user')>User</option>
        </select>
        <button type="submit" class="vla-btn vla-btn--primary vla-btn--sm">{{ __('academy.labs.filter') }}</button>
    </div>
</form>

<div class="vla-table-wrap">
    <table class="vla-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Solved Labs</th>
                <th>{{ __('academy.owner.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>#{{ $u->id }}</td>
                    <td><strong>{{ $u->name }}</strong></td>
                    <td>{{ $u->email }}</td>
                    <td><span class="vla-badge {{ $u->isOwner() ? 'vla-badge--orange' : 'vla-badge--accent' }}">{{ strtoupper($u->role) }}</span></td>
                    <td><strong>{{ $u->solved_count }}</strong></td>
                    <td>
                        <div class="vla-btn-group">
                            <a href="/owner/users/{{ $u->id }}/edit" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.owner.edit') }}</a>
                            <form method="POST" action="/owner/users/{{ $u->id }}/reset-progress" class="vla-inline-form">
                                @csrf
                                <button type="submit" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.owner.reset_progress') }}</button>
                            </form>
                            @if ($u->id !== Auth::id())
                                <form method="POST" action="/owner/users/{{ $u->id }}" class="vla-inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="vla-btn vla-btn--danger vla-btn--sm">{{ __('academy.owner.delete') }}</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="vla-pagination">{{ $users->links() }}</div>
@endsection
