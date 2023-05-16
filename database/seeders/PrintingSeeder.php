<?php

namespace Database\Seeders;

use App\Models\Printing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrintingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $printing = Printing::create([
        'dateimp' => '2023-04-21',
        'quantite' => 100,
        'LOT' => 'C',
        'user_id'=> 1,
        'production_id'=> 1,
    ]);
    }
}
