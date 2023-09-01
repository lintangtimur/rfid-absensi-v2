<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
//     // return view('welcome');
// });

Route::get("siswa", [SiswaController::class, "index"])->name("siswa");
Route::post("siswa/post", [SiswaController::class, "store"])->name("siswa.add");
Route::get("siswa/{id}", [SiswaController::class, "edit"])->name("siswa.edit")->middleware("signed");
Route::post("siswa/update", [SiswaController::class, "update"])->name("siswa.update");

Route::get("jadwal",[JadwalController::class, "index"])->name("jadwal");
Route::post("jadwal/post", [JadwalController::class, "store"])->name("jadwal.add");
Route::get("jadwal/{id}", [JadwalController::class, "edit"])->name("jadwal.edit")->middleware("signed");
Route::post("jadwal/update", [JadwalController::class, "update"])->name("jadwal.update");


Route::get("/", [HomepageController::class, "index"])->name("homepage");