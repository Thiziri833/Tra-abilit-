<?php

namespace Database\Seeders;

use App\Models\ProductLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productline = ProductLine::create([
            'product_id'=> 1,
            'line_id'=> 1,
            'cadence' => 150,
            'uniteprod' => 'L',
        ]);
    }
}
