<?php
namespace App\Services;

use App\Repository\SiswaRepository;


class SiswaService {
    
    protected SiswaRepository $siswaRepository;

    public function __construct(SiswaRepository $siswaRepository)
    {
        $this->siswaRepository = $siswaRepository;    
    }

    public function findSiswaById($id)
    {
        return $this->siswaRepository->findId($id);
    }

    public function addSiswa($attr)
    {
        return $this->siswaRepository->insert($attr);
    }

    public function updateSiswa($attr)
    {
        return $this->siswaRepository->update($attr);
    }
}