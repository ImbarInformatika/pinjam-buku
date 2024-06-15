<?php

use App\Http\Controllers\ControllerBuku;
use App\Http\Controllers\ControllerDashboard;
use App\Http\Controllers\ControllerDepan;
use App\Http\Controllers\ControllerMahasiswa;
use App\Http\Controllers\ControllerPeminjaman;
use App\Http\Controllers\ControllerPenerbit;
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


// BAGIAN DEPANs
Route::get('/login', [ControllerDepan::class, 'login'])->name('login');
Route::post('/proses-login', [ControllerDepan::class, 'proseslogin'])->name('proses-login');
Route::post('/logout', [ControllerDepan::class, 'logout'])->name('logout');




Route::group(['middleware' => 'auth'], function () {
    // DASHBOARD
    Route::get('/', [ControllerDashboard::class, 'index'])->name('dashboard');



    // BUKU
    Route::get('/daftar-buku', [ControllerBuku::class, 'index'])->name('daftar-buku');
    Route::get('/tambah-buku', [ControllerBuku::class, 'tambahbuku'])->name('tambah-buku');
    Route::post('/proses-tambah-buku', [ControllerBuku::class, 'prosestambahbuku'])->name('proses-tambah-buku');
    Route::post('/proses-ubah-buku', [ControllerBuku::class, 'prosesubahbuku'])->name('proses-ubah-buku');
    Route::get('/ubah-buku/{id}', [ControllerBuku::class, 'ubahbuku'])->name('ubah-buku');
    Route::get('/hapus-buku/{id}', [ControllerBuku::class, 'hapusbuku'])->name('hapus-buku');


    // PENERBIT
    Route::get('/daftar-penerbit', [ControllerPenerbit::class, 'index'])->name('daftar-penerbit');
    Route::get('/tambah-penerbit', [ControllerPenerbit::class, 'tambahpenerbit'])->name('tambah-penerbit');
    Route::post('/simpan-penerbit', [ControllerPenerbit::class, 'simpanpenerbit'])->name('simpan-penerbit');
    Route::get('/ubah-penerbit/{id}', [ControllerPenerbit::class, 'ubahpenerbit'])->name('ubah-penerbit');
    Route::post('/proses-ubah-penerbit', [ControllerPenerbit::class, 'prosesubahpenerbit'])->name('proses-ubah-penerbit');
    Route::get('/hapus-penerbit/{id}', [ControllerPenerbit::class, 'hapuspenerbit'])->name('hapus-penerbit');


    // MAHASISWA
    Route::get('/daftar-mahasiswa', [ControllerMahasiswa::class, 'index'])->name('daftar-mahasiswa');
    Route::get('/tambah-mahasiswa', [ControllerMahasiswa::class, 'tambahmahasiswa'])->name('tambah-mahasiswa');
    Route::post('/simpan-mahasiswa', [ControllerMahasiswa::class, 'simpanmahasiswa'])->name('simpan-mahasiswa');
    Route::get('/ubah-mahasiswa/{id}', [ControllerMahasiswa::class, 'ubahmahasiswa'])->name('ubah-mahasiswa');
    Route::post('/proses-ubah-mahasiswa', [ControllerMahasiswa::class, 'prosesubahmahasiswa'])->name('proses-ubah-mahasiswa');
    Route::get('/hapus-mahasiswa/{id}', [ControllerMahasiswa::class, 'hapusmahasiswa'])->name('hapus-mahasiswa');


    // PEMINJAMAN
    Route::get('/daftar-peminjaman', [ControllerPeminjaman::class, 'index'])->name('daftar-peminjaman');
    Route::get('/tambah-peminjaman', [ControllerPeminjaman::class, 'tambahpeminjaman'])->name('tambah-peminjaman');
    Route::post('/simpan-peminjaman', [ControllerPeminjaman::class, 'simpanpeminjaman'])->name('simpan-peminjaman');
    Route::put('/kembalikan/{id}', [ControllerPeminjaman::class, 'kembalikan'])->name('kembalikan');
});
