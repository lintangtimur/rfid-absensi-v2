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
}