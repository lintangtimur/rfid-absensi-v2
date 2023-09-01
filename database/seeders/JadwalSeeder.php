<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makul = [
            "kecerdasan buatan",
            "aplikom",
            "sistem basis data",
            "kewirausahaan",
            "keamanan data",
            "scripting dengan php",
            "pengantar akuntansi"
        ];

        $jam = [
            "mulai" => [
                "07:00:00", "08:30:00"
            ],
            "akhir" => [
                "08:00:00", "09:30:00"
            ]
            ];
    }
}
