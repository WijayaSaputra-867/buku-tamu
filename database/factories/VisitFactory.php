<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_kunjungan' => fake()->realTextBetween($minNbChars = 5, $maxNbChars = 10, $indexSize = 2),
            'total_kunjungan' => 5
        ];
    }
}
