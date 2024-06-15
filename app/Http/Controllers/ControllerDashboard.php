<?php

namespace App\Http\Controllers;

use App\Models\MBuku;
use App\Models\MMahasiswa;
use App\Models\MPeminjaman;
use App\Models\MPenerbit;

class ControllerDashboard extends Controller
{
    public function index()
    {
        $jumlah_mahasiswa = MMahasiswa::count();
        $jumlah_penerbit = MPenerbit::count();
        $jumlah_buku = MBuku::sum('jumlah_buku');
        $jumlah_buku_dipinjam = MPeminjaman::where('status', 'Belum Kembali')->count();
        $jumlah_buku_ada = $jumlah_buku - $jumlah_buku_dipinjam;
        return view('admin.navbar.dashboard', compact('jumlah_mahasiswa', 'jumlah_penerbit', 'jumlah_buku', 'jumlah_buku_dipinjam', 'jumlah_buku_ada'));
    }
}
