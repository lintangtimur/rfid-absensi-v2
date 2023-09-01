<?php

namespace App\Http\Controllers;

use App\Services\JadwalService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;

class HomepageController extends Controller
{
    protected JadwalService $jadwalService;

    public function __construct(JadwalService $jadwalService)
    {
        $this->jadwalService = $jadwalService;;
    }

    public function index()
    {
        // tampilkan jadwal waktu sekarang
        $hariSekarang =strtolower(Carbon::now()->isoFormat('dddd', Lang::get('id')));
        $waktuSekarang = Carbon::now()->format('H:i');
        
        $jadwal = $this->jadwalService->homepage($hariSekarang, $waktuSekarang);
        
        
        return view("index", compact("jadwal", 'waktuSekarang'));
    }
}
