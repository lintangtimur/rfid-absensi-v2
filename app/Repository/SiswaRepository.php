<?php

namespace App\Repository;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class SiswaRepository
{
    protected Siswa $siswa;

    public function __construct(
        Siswa $siswa,
    ) {
        $this->siswa = $siswa; 
    }

    /**
     * Get All.
     */
    public function getAll(): Collection|array
    {
        return $this->siswa->get();
    }

    public function update($attr)
    {
        $s = $this->siswa->where("rfid","=",$attr["rfid"])->first();

        return $s->update($attr);
    }

    public function findId($id)
    {
        return $this->siswa->find($id);
    }

    public function insert($attr): Siswa|\Throwable
    {
        try {
            DB::beginTransaction();
            $siswa = $this->siswa->create($attr);

            DB::commit();

            return $siswa;
        } catch (\Throwable $e) {
            DB::rollBack();

            return $e;
        }
    }
}
