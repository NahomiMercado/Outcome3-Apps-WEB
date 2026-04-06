@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halcon - Order Tracking</h1>

    <form action="{{ route('track') }}" method="POST">
        @csrf
        <div>
            <label>Customer Number:</label>
            <input type="text" name="customer_number" required>
        </div>

        <div>
            <label>Invoice Number:</label>
            <input type="text" name="invoice_number" required>
        </div>

        <button type="submit">Search</button>
    </form>
</div>
@endsection