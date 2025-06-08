<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\lokers>
 */
class LokersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_loker' => 'Loker ' . $this->faker->unique()->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['kosong', 'digunakan', 'pending', 'servis']),
        ];
    }
}
