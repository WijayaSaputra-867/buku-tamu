<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Guest;
use App\Models\Marquee;
use App\Models\Institution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Muhammad Wijaya Saputra',
            'email' => 'wijayasaputra679@gmail.com',
            'password' => Hash::make('Wijaya_21'),
        ]);

        Guest::factory(20)->create();

        Institution::factory(5)->create();

        Marquee::factory(10)->create();
    }
}
