@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tracking Result</h1>

    @if($order)
        <p><strong>Invoice:</strong> {{ $order->invoice_number }}</p>
        <p><strong>Customer:</strong> {{ $order->customer->name_or_company }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>
        <p><strong>Date:</strong> {{ $order->order_date }}</p>

        @if($order->status === 'Delivered' && $order->deliveredPhoto)
            <h3>Delivery Evidence</h3>
            <img src="{{ asset('storage/' . $order->deliveredPhoto->image_path) }}" width="300">
        @elseif($order->status === 'In process')
            <p>The order is currently being prepared.</p>
        @endif
    @else
        <p>Order not found.</p>
    @endif
</div>
@endsection
