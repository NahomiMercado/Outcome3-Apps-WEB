<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderPhoto;
use App\Models\OrderStatusHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('orders.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|unique:orders,invoice_number',
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'delivery_address' => 'required',
            'notes' => 'nullable',
        ]);

        Order::create([
            'invoice_number' => $request->invoice_number,
            'customer_id' => $request->customer_id,
            'created_by' => Auth::id(),
            'order_date' => $request->order_date,
            'delivery_address' => $request->delivery_address,
            'status' => 'Ordered',
            'notes' => $request->notes,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load(['customer', 'photos', 'statusHistory.user']);
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'invoice_number' => 'required|unique:orders,invoice_number,' . $order->id,
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'delivery_address' => 'required',
            'notes' => 'nullable',
        ]);

        $order->update($request->only([
            'invoice_number',
            'customer_id',
            'order_date',
            'delivery_address',
            'notes'
        ]));

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order archived successfully.');
    }

    public function changeStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:Ordered,In process,In route,Delivered',
            'comment' => 'nullable|string',
        ]);

        $oldStatus = $order->status;

        $order->update([
            'status' => $request->status,
        ]);

        OrderStatusHistory::create([
            'order_id' => $order->id,
            'old_status' => $oldStatus,
            'new_status' => $request->status,
            'changed_by' => Auth::id(),
            'comment' => $request->comment,
            'changed_at' => now(),
        ]);

        return redirect()->route('orders.show', $order)->with('success', 'Status updated successfully.');
    }

    public function uploadPhoto(Request $request, Order $order)
    {
        $request->validate([
            'type' => 'required|in:loaded,delivered',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('orders', 'public');

        OrderPhoto::create([
            'order_id' => $order->id,
            'uploaded_by' => Auth::id(),
            'type' => $request->type,
            'image_path' => $path,
            'uploaded_at' => now(),
        ]);

        return redirect()->route('orders.show', $order)->with('success', 'Photo uploaded successfully.');
    }
}