@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Order</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <input type="text" name="invoice_number" placeholder="Invoice Number" required>

        <select name="customer_id" required>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name_or_company }}</option>
            @endforeach
        </select>

        <input type="datetime-local" name="order_date" required>
        <textarea name="delivery_address" placeholder="Delivery Address" required></textarea>
        <textarea name="notes" placeholder="Notes"></textarea>

        <button type="submit">Save</button>
    </form>
</div>
@endsection