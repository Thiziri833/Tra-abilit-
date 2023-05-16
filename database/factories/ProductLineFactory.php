<?php

namespace Database\Factories;

use App\Models\Line;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productline>
 */
class ProductLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductLine::class;
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'line_id' => Line::factory(),
            'cadence' => $this->faker->numberBetween(100, 1000),
            'uniteprod' => $this->faker->randomElement(['kg', 'L', 'unit']),
        ];
    }
}
