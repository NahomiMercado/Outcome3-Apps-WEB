@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <ul>
        <li><a href="{{ route('users.index') }}">Users</a></li>
        <li><a href="{{ route('orders.index') }}">Orders</a></li>
        <li><a href="{{ route('archived-orders.index') }}">Archived Orders</a></li>
    </ul>
</div>
@endsection