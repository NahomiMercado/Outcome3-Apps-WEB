<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function track(Request $request)
    {
        $request->validate([
            'customer_number' => 'required',
            'invoice_number' => 'required',
        ]);

        $order = Order::with(['customer', 'deliveredPhoto'])
            ->where('invoice_number', $request->invoice_number)
            ->whereHas('customer', function ($query) use ($request) {
                $query->where('customer_number', $request->customer_number);
            })
            ->first();

        return view('tracking-result', compact('order'));
    }
}