<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaPostRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Siswa;
use App\Services\SiswaService;

class SiswaController extends Controller
{
    protected SiswaService $siswaService;

    public function __construct(SiswaService $siswaService)
    {
        $this->siswaService = $siswaService;    
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();

        return view("siswa.index", compact("siswas"));
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
    public function store(SiswaPostRequest $siswaPostRequest)
    {
        $validated = $siswaPostRequest->validated();
        
        $data = $this->siswaService->addSiswa($validated);

        if($data instanceof Siswa){
            return redirect()->route("siswa")->with("msg", "Data berhasil ditambahkan");
        }elseif($data instanceof \Throwable){
            return redirect()->route("siswa")->with("error", $data->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = $this->siswaService->findSiswaById($id);
        
        return view("siswa.edit", compact("siswa"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $updateSiswaRequest)
    {
        $attr = $updateSiswaRequest->validated();
        
        $updated = $this->siswaService->updateSiswa($attr);
        if($updated){
            return redirect()->route("siswa")->with("msg","Data siswa berhasil dirubah");
        }

        return redirect()->route("siswa")->with("error","Data siswa gagal dirubah");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
