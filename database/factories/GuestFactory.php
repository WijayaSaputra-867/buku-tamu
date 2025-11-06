<?php

namespace Database\Factories;

use App\Models\Institution;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'institution_id' => Institution::factory(),
            'name' => fake()->name(),
            'needed_field' => fake()->sentence(4),
            'meeting_person' => fake()->name(),
            'gender' => fake()->randomElement(['male', 'female']),
            'phone' => fake()->e164PhoneNumber(),
            'photo' => 'img/default.png',
            'check_in_at' => now()
        ];
    }
}
