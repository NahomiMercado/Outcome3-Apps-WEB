@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <select name="role_id" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <select name="is_active" required>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>

        <button type="submit">Save</button>
    </form>
</div>
@endsection