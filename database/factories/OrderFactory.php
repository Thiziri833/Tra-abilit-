<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Load>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numBC' => fake()->unique()->randomNumber(),
            'depotdest' => fake()->city(),
            'dateorder' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'customer_id' => Customer::factory(),
        ];
        }
}

