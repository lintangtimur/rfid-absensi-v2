<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ulid\Ulid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "rfid" => Ulid::generate(true),
            "nama" => fake("id")->name(),
            "nim" => "15.N1.00". random_int(10, 99),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
