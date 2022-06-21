<?php

use App\Models\Nasabah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\NasabahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $jumlahnasabah = Nasabah::count();
    $jumlahnasabahpria = Nasabah::where('jeniskelamin', 'Pria')->count();
    $jumlahnasabahwanita = Nasabah::where('jeniskelamin', 'Wanita')->count();


    return view('welcome', compact('jumlahnasabah', 'jumlahnasabahpria', 'jumlahnasabahwanita'));
})->middleware('auth');

Route::get('/nasabah', [NasabahController::class, 'index'])->name('nasabah')->middleware('auth');

// tambah data
Route::get('/tambahnasabah', [NasabahController::class, 'tambahnasabah'])->name('tambahnasabah')->middleware('auth');
Route::post('/insertdata', [NasabahController::class, 'insertdata'])->name('insertdata');

// edit data
Route::get('/tampildata/{id}', [NasabahController::class, 'tampildata'])->name('tampildata')->middleware('auth');
Route::post('/updatedata/{id}', [NasabahController::class, 'updatedata'])->name('updatedata');

// delete
Route::get('/delete/{id}', [NasabahController::class, 'delete'])->name('delete');

// export pdf
Route::get('/exportpdf', [NasabahController::class, 'exportpdf'])->name('exportpdf');

// login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

// daftar
Route::get('/daftar', [LoginController::class, 'daftar'])->name('daftar');
Route::post('/daftarbaru', [LoginController::class, 'daftarbaru'])->name('daftarbaru');

// logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// sampah
Route::get('/sampah', [SampahController::class, 'sampah'])->name('sampah');

// tambah data sampah
Route::get('/tambahsampah', [SampahController::class, 'tambahsampah'])->name('tambahsampah')->middleware('auth');
Route::post('/insertdatasampah', [SampahController::class, 'insertdatasampah'])->name('insertdatasampah');