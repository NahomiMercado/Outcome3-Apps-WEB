@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Detail</h1>

    <p><strong>Invoice:</strong> {{ $order->invoice_number }}</p>
    <p><strong>Customer:</strong> {{ $order->customer->name_or_company }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Address:</strong> {{ $order->delivery_address }}</p>
    <p><strong>Notes:</strong> {{ $order->notes }}</p>

    <h2>Change Status</h2>
    <form action="{{ route('orders.changeStatus', $order) }}" method="POST">
        @csrf
        @method('PATCH')

        <select name="status" required>
            <option value="Ordered">Ordered</option>
            <option value="In process">In process</option>
            <option value="In route">In route</option>
            <option value="Delivered">Delivered</option>
        </select>

        <textarea name="comment" placeholder="Comment"></textarea>
        <button type="submit">Update Status</button>
    </form>

    <h2>Upload Photo</h2>
    <form action="{{ route('orders.uploadPhoto', $order) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <select name="type" required>
            <option value="loaded">Loaded</option>
            <option value="delivered">Delivered</option>
        </select>

        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    <h2>Photos</h2>
    @foreach($order->photos as $photo)
        <div>
            <p>{{ $photo->type }}</p>
            <img src="{{ asset('storage/' . $photo->image_path) }}" width="250">
        </div>
    @endforeach

    <h2>Status History</h2>
    @foreach($order->statusHistory as $history)
        <p>
            {{ $history->old_status }} → {{ $history->new_status }}
            | {{ $history->comment }}
            | {{ $history->changed_at }}
        </p>
    @endforeach
</div>
@endsection