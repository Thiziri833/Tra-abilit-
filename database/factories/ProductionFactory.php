<?php

namespace Database\Factories;

use App\Models\Line;
use App\Models\product;
use App\Models\Structure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Production>
 */
class ProductionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Production::class;
    public function definition(): array
    {
        return [
            'dateprod' => fake()->date(),
            'equipe' => fake()->randomElement(['A', 'B', 'C', 'D']),
            'quart' => fake()->randomElement(['matin', 'soir', 'nuit']),
            'structure_id' => Structure::factory(),
            'line_id' => Line::factory(),
            'product_id' => product::factory(),
        ];
    }
}
