<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;


class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::factory()->count(10)->create();
    }
}
