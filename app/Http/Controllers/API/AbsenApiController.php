<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\JadwalService;
use App\Services\RekapService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class AbsenApiController extends Controller
{
    protected JadwalService $jadwalService;
    protected RekapService $rekapService;

    public function __construct(JadwalService $jadwalService, RekapService $rekapService){
        $this->jadwalService = $jadwalService;
        $this->rekapService = $rekapService;
    }

    public function store(Request $request)
    {
        $rfid = $request->rfid;
        $hariSekarang =strtolower(Carbon::now()->isoFormat('dddd', Lang::get('id')));
        $waktuSekarang = Carbon::now()->format('H:i');

        $res = $this->jadwalService->checkRfid($rfid);
        $jadwal = $this->jadwalService->homepage($hariSekarang, $waktuSekarang);

        if($res){
            $this->rekapService->absen($res, $jadwal);
        }else{
            return response()->json([
                "error"=>true,
                "message"=>"siswa tidak ada dalam DB"
            ]);
        }

        return response()->json([
            "error"=>false,
            "msg"=>"sukses"
        ]);
    }
}
