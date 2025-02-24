<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaxConfiguration>
 */
class TaxConfigurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'min_amount' => $this->faker->randomFloat(2, 0, 335000),
            'max_amount' => $this->faker->randomFloat(2, 0, 10000000),
            'rate' => $this->faker->randomFloat(2, 0, 100),
            'effective_date' => $this->faker->date()
        ];
    }
}
