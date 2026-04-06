@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $user->name }}" required>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <input type="password" name="password" placeholder="New password (optional)">

        <select name="role_id" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>

        <select name="is_active" required>
            <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
        </select>

        <button type="submit">Update</button>
    </form>
</div>
@endsection