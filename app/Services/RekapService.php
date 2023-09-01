<?php

namespace App\Services;

use App\Repository\RekapRepository;

class RekapService
{
    protected RekapRepository $rekapRepo;

    public function __construct(RekapRepository $rekapRepository)
    {
        $this->rekapRepo = $rekapRepository;
    }

    public function absen($data, $jadwal)
    {
        return $this->rekapRepo->insert($data->id, $jadwal->id);
    }
}