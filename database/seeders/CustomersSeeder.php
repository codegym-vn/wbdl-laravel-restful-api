<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = new Customer();
        $customer->name = "John";
        $customer->email = "John@example.com";
        $customer->phone = "123-456-1234";
        $customer->address = "New York, NY, USA";
        $customer->save();

        $customer = new Customer();
        $customer->name = "Tom";
        $customer->email = "Tom@example.com";
        $customer->phone = "453-456-1234";
        $customer->address = "New York, NY, USA";
        $customer->save();

        $customer = new Customer();
        $customer->name = "Mery";
        $customer->email = "Mery@example.com";
        $customer->phone = "883-456-1234";
        $customer->address = "New York, NY, USA";
        $customer->save();
    }
}
