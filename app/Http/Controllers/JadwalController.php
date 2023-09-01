<?php

namespace App\Http\Controllers;

use App\Http\Requests\JadwalPostRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Jadwal;
use App\Services\JadwalService;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    protected const HARI = [
        "senin","selasa","rabu","kamis","jumat","sabtu"
    ];

    protected JadwalService $jadwalService;

    public function __construct(JadwalService $jadwalService)
    {
        $this->jadwalService = $jadwalService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hari = JadwalController::HARI;
        $jadwals = Jadwal::all();

        return view("jadwal.index", compact("hari",'jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JadwalPostRequest $jadwalPostRequest)
    {
        $attr = $jadwalPostRequest->validated();
        
        $pass = $this->jadwalService->checkTimeAvailability($attr);

        if($pass){
            return redirect()->route("jadwal")->with("error", "Waktu pada hari tersebut sudah di booking!");
        }

        $data = $this->jadwalService->addJadwal($attr);

        if($data instanceof Jadwal){
            return redirect()->route("jadwal")->with("msg", "Data berhasil ditambahkan");
        }elseif($data instanceof \Throwable){
            return redirect()->route("jadwal")->with("error", $data->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwal = $this->jadwalService->findJadwalById($id);
        $hari = JadwalController::HARI;

        return view("jadwal.edit", compact("jadwal", 'hari'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $updateJadwalRequest)
    {
        $attr = $updateJadwalRequest->validated();
        
        $updated = $this->jadwalService->update($attr);

        if($updated){
            return redirect()->route("jadwal")->with("msg","jadwal berhasil dirubah");
        }

        return redirect()->route("jadwal")->with("error","jadwal siswa gagal dirubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
