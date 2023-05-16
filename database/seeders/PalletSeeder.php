<?php

namespace Database\Seeders;

use App\Models\Pallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pallet = Pallet::create([
        'SSCC' => 12524,
        'datefab' => '2023-09-14',
        'DLUO' => '2025-09-14',
        'quantiteplt' => 500,
        'priting_id'=> 1,
        ]);
    }
}
