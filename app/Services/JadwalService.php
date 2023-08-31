<?php
namespace App\Services;

use App\Repository\JadwalRepository;
use Carbon\Carbon;

class JadwalService
{
    protected JadwalRepository $jadwalRepository;

    public function __construct(JadwalRepository $jadwalRepository)
    {
        $this->jadwalRepository = $jadwalRepository;
    }

    public function addJadwal($attr)
    {
        return $this->jadwalRepository->insert($attr);
    }

    public function checkTimeAvailability($attr)
    {
        // Waktu yang ingin Anda periksa
        $waktuPeriksa = Carbon::createFromFormat('H:i:s', $attr['jam_mulai']); // Ganti dengan waktu yang ingin diperiksa

        $res = $this->__getTime($attr['hari']);

        // Rentang waktu
        $waktuMulai = Carbon::createFromFormat('H:i:s', $res->jam_mulai); // Ganti dengan waktu mulai rentang
        $waktuAkhir = Carbon::createFromFormat('H:i:s', $res->jam_akhir); // Ganti dengan waktu akhir rentang

        // Memeriksa apakah waktu periksa berada dalam rentang
        if ($waktuPeriksa->between($waktuMulai, $waktuAkhir)) {
            return true;
        } else {
            return false;
        }
    }

    private function __getTime($hari)
    {
        $res = $this->jadwalRepository->getTimeByDay($hari);
        return $res;
    }
}