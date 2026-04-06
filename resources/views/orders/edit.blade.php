@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="invoice_number" value="{{ $order->invoice_number }}" required>

        <select name="customer_id" required>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name_or_company }}
                </option>
            @endforeach
        </select>

        <input type="datetime-local" name="order_date" value="{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d\TH:i') }}" required>
        <textarea name="delivery_address" required>{{ $order->delivery_address }}</textarea>
        <textarea name="notes">{{ $order->notes }}</textarea>

        <button type="submit">Update</button>
    </form>
</div>
@endsection