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

    public function checkRfid($data)
    {
        return $this->jadwalRepository->checkRfid($data);
    }

    public function homepage($hari, $waktu)
    {
        return $this->jadwalRepository->getTimeByDay($hari, $waktu);
    }

    public function addJadwal($attr)
    {
        return $this->jadwalRepository->insert($attr);
    }

    public function checkTimeAvailability($attr)
    {
        $res = $this->__getTime($attr['hari'], $attr['jam_mulai']);
     
        if($res){
            return true;
        }

        return false;
        
    }

    private function __getTime($hari, $waktuPeriksa)
    {
        $res = $this->jadwalRepository->getTimeByDay($hari, $waktuPeriksa);

        return $res;
    }

    public function findJadwalById($id)
    {
        return $this->jadwalRepository->getId($id);
    }

    public function update($data)
    {
        return $this->jadwalRepository->update($data);
    }
}