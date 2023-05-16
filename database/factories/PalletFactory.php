<?php

namespace Database\Factories;

use App\Models\Printing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productiondetail>
 */
class PalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pallet::class;
    public function definition(): array
    {
        return [
            // ean13 ça veut dire quoi ean13 et SSCC n'est pas le <meme></meme>
            'SSCC' => fake()->lexify(),
            'datefab' => fake()->dateTime(),
            'DLUO' => fake()->dateTimeBetween('+1 week', '+1 year'),
            'quantiteplt' => fake()->numberBetween(1, 1000),
            'printing_id' => Printing::factory(),
        ];
    }
}
