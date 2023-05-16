<?php

namespace Database\Seeders;

use App\Models\Production;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $production = Production::create([
            'dateprod' => '2023-05-21',
            'equipe' => 'A',
            'quart' => 'matin',
            'structure_id'=> 1,
            'line_id'=> 1,
            'product_id'=> 1,
        ]);
    }
}
