<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customer = Customer::first();
        $admin = User::first();

        Order::create([
            'invoice_number' => 'FAC001',
            'customer_id' => $customer->id,
            'created_by' => $admin->id,
            'order_date' => now(),
            'delivery_address' => 'Sucursal centro',
            'status' => 'Ordered',
            'notes' => 'Pedido de prueba',
        ]);

        Order::create([
            'invoice_number' => 'FAC002',
            'customer_id' => $customer->id,
            'created_by' => $admin->id,
            'order_date' => now(),
            'delivery_address' => 'Obra norte',
            'status' => 'In process',
            'notes' => 'Pedido en preparación',
        ]);
    }
}