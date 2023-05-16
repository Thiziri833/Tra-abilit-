<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $line = Line::create([
        'name' => '1L',
        'description' => 'produit huile 1 litre',
        'structure_id'=> 1,
    ]);
       $line = Line::create([
        'name' => '2L',
        'description' => 'produit huile 2 litre',
        'structure_id'=> 1,
    ]);
       $line = Line::create([
        'name' => '3L',
        'description' => 'produit huile 3 litre',
        'structure_id'=> 1,
    ]);
    //    $line->save();
    }
}
