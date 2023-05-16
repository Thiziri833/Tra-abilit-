<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = product::create([
            'code' => 'ddj568',
            'description' => 'nouveau produit',
            'DLUO' => '2025-05-07',
        ]);
        $product->save();
    }
}
