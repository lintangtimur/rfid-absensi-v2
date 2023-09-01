<?php

namespace App\Repository;

use App\Models\Jadwal;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class JadwalRepository
{
    protected Jadwal $jadwal;
    protected Siswa $siswa;

    public function __construct(
        Jadwal $jadwal,
        Siswa $siswa
    ) {
        $this->jadwal = $jadwal; 
        $this->siswa = $siswa;
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

    public function checkRfid($data)
    {
        //cek apakah rfid tersebut ada dalam DB
        return $this->siswa->where("rfid","=",$data)->first();
    }

    public function getTimeByDay($hari, $waktuPeriksa)
    {
        $data = $this->jadwal->where("hari",'=',$hari)
            ->whereTime('jam_mulai', '<=', $waktuPeriksa)
            ->whereTime('jam_akhir', '>=', $waktuPeriksa)
            ->first();
        
            
        return $data;
    }

    public function getId($id)
    {
        return $this->jadwal->where("id","=",$id)->first();
    }
    
    public function update($data)
    {
        $s = $this->jadwal->where("id","=",$data["jadwal_id"])->first();

        return $s->update($data);
    }
}
