<?php

namespace Database\Factories;

use App\Models\Production;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Impression>
 */
class PrintingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Printing::class;
    public function definition(): array
    {
        return [
            'dateimp' => fake()->dateTime(),
            'quantite' => fake()->numberBetween(1, 1000),
            'LOT' => fake()->word(),
            'user_id' => User::factory(),
            'production_id' => Production::factory(),
        ];
    }
}
