<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        //cek tanggal sekarang apakah masuk dalam jadwal
        return view("index");
    }
}
