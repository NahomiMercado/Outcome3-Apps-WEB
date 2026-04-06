@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Archived Orders</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>Invoice</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Restore</th>
        </tr>

        @foreach($orders as $order)
        <tr>
            <td>{{ $order->invoice_number }}</td>
            <td>{{ $order->customer->name_or_company }}</td>
            <td>{{ $order->status }}</td>
            <td>
                <form action="{{ route('archived-orders.restore', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Restore</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection