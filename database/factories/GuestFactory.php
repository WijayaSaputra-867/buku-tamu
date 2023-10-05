<?php

namespace Database\Factories;

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
    private function getRandArray($data = []){
        $count_data = count($data) - 1;
        $result = $data[mt_rand(0, $count_data)];
        return $result;
    }
    public function definition(): array
    {
        $gender = $this->getRandArray(['Laki-laki', 'Perempuan']);
        
        return [
            'user_checkin' => mt_rand(1, 10),
            'nama_tamu' => fake()->name(),
            'keperluan_tamu' => fake()->realTextBetween($minNbChars = 10, $maxNbChars = 20, $indexSize = 2),
            'bertemu' => fake()->name(),
            'jk' => $gender,
            'asal_instansi' => fake()->company(),
            'telepon' => fake()->e164PhoneNumber(),
            'check_in' => fake()->dateTimeBetween('-5 year', 'now'),
            'kode_kunjungan' => fake()->realTextBetween($minNbChars = 5, $maxNbChars = 10, $indexSize = 2),
        ];
    }
}
