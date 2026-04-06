<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ArchivedOrderController extends Controller
{
    public function index()
    {
        $orders = Order::onlyTrashed()->with('customer')->latest()->get();
        return view('archived-orders.index', compact('orders'));
    }

    public function restore($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->restore();

        return redirect()->route('archived-orders.index')->with('success', 'Order restored successfully.');
    }
}