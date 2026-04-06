<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'customer_number' => 'CUST001',
            'name_or_company' => 'Constructora del Norte',
            'fiscal_name' => 'Constructora del Norte SA de CV',
            'rfc' => 'CON123456ABC',
            'fiscal_address' => 'Culiacán, Sinaloa',
            'email' => 'cliente1@correo.com',
        ]);

        Customer::create([
            'customer_number' => 'CUST002',
            'name_or_company' => 'Materiales Express',
            'fiscal_name' => 'Materiales Express SA de CV',
            'rfc' => 'MAT987654XYZ',
            'fiscal_address' => 'Mazatlán, Sinaloa',
            'email' => 'cliente2@correo.com',
        ]);
    }
}