@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}">Create Order</a>

    <table border="1" cellpadding="8">
        <tr>
            <th>Invoice</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>

        @foreach($orders as $order)
        <tr>
            <td>{{ $order->invoice_number }}</td>
            <td>{{ $order->customer->name_or_company }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->order_date }}</td>
            <td>
                <a href="{{ route('orders.show', $order) }}">View</a>
                <a href="{{ route('orders.edit', $order) }}">Edit</a>

                <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Archive</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection