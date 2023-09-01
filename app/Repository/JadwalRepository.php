<?php

namespace App\Repository;

use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;

class JadwalRepository
{
    protected Jadwal $jadwal;

    public function __construct(
        Jadwal $jadwal,
    ) {
        $this->jadwal = $jadwal; 
    }

    public function insert($attr)
    {
        try {
            DB::beginTransaction();
            $jadwal = $this->jadwal->create($attr);

            DB::commit();

            return $jadwal;
        } catch (\Throwable $e) {
            DB::rollBack();

            return $e;
        }
    }

    public function getTimeByDay($hari, $waktuPeriksa)
    {
        $data = $this->jadwal->where("hari",'=',$hari)
            ->whereTime("jam_akhir","<=", $waktuPeriksa)
            ->first();
        
        return $data;
    }
    
}
