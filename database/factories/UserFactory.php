<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private function getRandArray($data = []){
        $count_data = count($data) - 1;
        $result = $data[mt_rand(0, $count_data)];
        return $result;
    }

    public function definition(): array
    {
        $gender = $this->getRandArray(['Laki-laki', 'Perempuan']);
        return [
            'name' => fake()->name(),   
            'email' => fake()->unique()->safeEmail(),
            'gender' => $gender,
            'phone' => fake()->e164PhoneNumber(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
