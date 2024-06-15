<?php

namespace App\Http\Controllers;

use App\Models\MBuku;
use App\Models\MMahasiswa;
use App\Models\MPeminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ControllerPeminjaman extends Controller
{
    public function index()
    {
        $peminjaman = MPeminjaman::with('mahasiswa', 'buku')->get();
        return view('admin.navbar.daftar_peminjaman', compact('peminjaman'));
    }

    public function tambahpeminjaman()
    {
        $peminjaman = MPeminjaman::with('mahasiswa', 'buku')->get();
        $mahasiswa = MMahasiswa::all();
        $buku = MBuku::all();
        return view('admin.navbar.peminjaman.tambah_peminjaman', compact('peminjaman', 'mahasiswa', 'buku'));
    }

    public function simpanpeminjaman(Request $request)
    {
        $validasi = $request->validate([
            'id_mahasiswa' => 'required|string|exists:mahasiswa,id',
            'id_buku' => 'required|string|exists:buku,id',
            'no_telepon' => 'required|numeric|digits_between:12,13'
        ]);


        $tanggal_pinjam = Carbon::now();
        $tanggal_kembali = Carbon::now()->addDays(7);


        $selisih_hari = $tanggal_pinjam->diffInDays($tanggal_kembali);
        $denda = $selisih_hari > 7 ? ($selisih_hari - 7) * 2000 : 0;

        $buku = MBuku::find($request->id_buku);
        if ($buku && $buku->jumlah_buku > 0) {
            $buku->jumlah_buku -= 1;
            $buku->save();

            MPeminjaman::create([
                'id_mahasiswa' => $request->id_mahasiswa,
                'id_buku' => $request->id_buku,
                'no_telepon' => $request->no_telepon,
                'tanggal_pinjam' => $tanggal_pinjam,
                'tanggal_kembali' => $tanggal_kembali,
                'denda' => $denda,
                'status' => 'Belum Kembali'
            ]);

            session()->flash('success_tambah', 'Data Peminjaman Berhasil Ditambahkan');
        } else {
            session()->flash('eror_tambah', 'Buku tidak tersedia.');
        }

        return redirect()->route('daftar-peminjaman');
    }

    public function kembalikan($id)
    {
        $peminjaman = MPeminjaman::find($id);

        if ($peminjaman && $peminjaman->status == 'Belum Kembali') {
            $tanggal_kembali = Carbon::now();
            $selisih_hari = Carbon::parse($peminjaman->tanggal_pinjam)->diffInDays($tanggal_kembali);
            $denda = $selisih_hari > 7 ? ($selisih_hari - 7) * 2000 : 0;

            $buku = MBuku::find($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku += 1;
                $buku->save();
            }

            $peminjaman->update([
                'status' => 'Dikembalikkan',
                'denda' => $denda,
                'tanggal_kembali' => $tanggal_kembali
            ]);

            session()->flash('success_kembali', 'Data Berhasil Dikembalikkan');
        } else {
            session()->flash('eror_kembali', 'Peminjaman tidak ditemukan atau sudah dikembalikan.');
        }

        return redirect()->route('daftar-peminjaman');
    }
}
