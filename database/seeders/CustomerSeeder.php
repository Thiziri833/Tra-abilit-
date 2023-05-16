<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = Customer::create([
            'code' => 212564863,
            'name' => 'thiziri',
            'wilaya' => 'bejaia',
            'activite' => 'magazin',
        ]);
        $customer->save();
    }
}
