<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderproduct = OrderProduct::create([
            'order_id'=> 1,
            'product_id'=> 1,
            'quantiteplt' => 250,
        ]);
    }
}
