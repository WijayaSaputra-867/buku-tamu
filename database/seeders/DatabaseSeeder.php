<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guest;
use App\Models\User;
use App\Models\Visit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    private function getRandArray($data = []){
        $count_data = count($data) - 1;
        $result = $data[mt_rand(0, $count_data)];
        return $result;
    }
    public function run(): void
    {
        User::factory(10)->create();

        $nama = 'M.Wijaya Saputra';
        $instansi = 'Dwiguna';
        $kode = md5($nama . $instansi);

        Guest::factory(5)->create([
            'nama_tamu' => $nama,
            'asal_instansi' => $instansi,
            'kode_kunjungan' => $kode
        ]);
        Visit::factory()->create([
            'kode_kunjungan' => $kode,
        ]);
        $nama = 'Dimas Cahyo Nugroho';
        $instansi = 'Dwiguna';
        $kode = md5($nama . $instansi);

        Guest::factory(5)->create([
            'nama_tamu' => $nama,
            'asal_instansi' => $instansi,
            'kode_kunjungan' => $kode
        ]);
        Visit::factory()->create([
            'kode_kunjungan' => $kode,
        ]);
        $nama = 'Andriansyah';
        $instansi = 'Dwiguna';
        $kode = md5($nama . $instansi);

        Guest::factory(5)->create([
            'nama_tamu' => $nama,
            'asal_instansi' => $instansi,
            'kode_kunjungan' => $kode
        ]);
        Visit::factory()->create([
            'kode_kunjungan' => $kode,
        ]);
        $nama = 'M.Wijaya Saputra';
        $instansi = 'Bhakti Insani';
        $kode = md5($nama . $instansi);

        Guest::factory(5)->create([
            'nama_tamu' => $nama,
            'asal_instansi' => $instansi,
            'kode_kunjungan' => $kode
        ]);
        Visit::factory()->create([
            'kode_kunjungan' => $kode,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
