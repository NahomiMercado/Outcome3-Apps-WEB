@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users</h1>
    <a href="{{ route('users.create') }}">Create User</a>

    <table border="1" cellpadding="8">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name ?? 'No role' }}</td>
            <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection