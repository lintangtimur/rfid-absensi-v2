<?php

namespace App\Repository;

use App\Models\Rekap;

class RekapRepository
{
    protected Rekap $rekap;

    public function __construct(Rekap $rekap)
    {
        $this->rekap = $rekap;
    }

    public function insert($siswa_id, $jadwal_id)
    {
        return $this->rekap->create([
            "jadwal_id"=> $jadwal_id,
            "siswa_id"=>$siswa_id
        ]);
    }
}