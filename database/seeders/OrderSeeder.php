<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::create([
            'numBC' => 5698,
            'depotdest' => 'alger',
            'dateorder' => '2025-06-25',
            'customer_id' => 1,
        ]);
    }
}
