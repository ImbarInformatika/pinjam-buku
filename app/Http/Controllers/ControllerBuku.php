<?php

namespace App\Http\Controllers;

use App\Models\MBuku;
use App\Models\MPenerbit;
use Illuminate\Http\Request;

class ControllerBuku extends Controller
{
    public function index()
    {
        $buku = MBuku::with('penerbit')->get();
        return view('admin.navbar.daftar_buku', compact('buku'));
    }

    public function tambahbuku(Request $request)
    {
        $query = $request->input('query');
        $results = MPenerbit::where('nama_penerbit', 'LIKE', '%' . $query . '%')->get();

        $penerbit = MPenerbit::all();
        return view('admin.navbar.buku.tambah_buku', compact('penerbit', 'results'));
    }

    public function prosestambahbuku(Request $request)
    {
        $validasi = $request->validate([
            'judul_buku' =>  'required|string|max:255',
            'id_penerbit' => 'required|integer|exists:penerbit,id',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'jumlah_buku' => 'required|integer|min:1',
            'tanggal_pengadaan' => 'required|date',
        ]);

        MBuku::create([
            'judul_buku' => $request->judul_buku,
            'id_penerbit' => $request->id_penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_buku' => $request->jumlah_buku,
            'tanggal_pengadaan' => $request->tanggal_pengadaan
        ]);

        session()->flash('success_tambah', 'Data Buku Berhasil Ditambahkan');
        return redirect()->route('daftar-buku');
    }


    public function ubahbuku($id)
    {
        $penerbit = MPenerbit::all();
        $buku = MBuku::find($id);
        return view('admin.navbar.buku.ubah_buku', compact('buku', 'penerbit'));
    }


    public function prosesubahbuku(Request $request)
    {
        $validasi = $request->validate([
            'judul_buku' =>  'required|string|max:255',
            'id_penerbit' => 'required|integer|exists:penerbit,id',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'jumlah_buku' => 'required|integer|min:1',
            'tanggal_pengadaan' => 'required|date',
        ]);

        MBuku::where('id', $request->id)->update([
            'judul_buku' => $request->judul_buku,
            'id_penerbit' => $request->id_penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_buku' => $request->jumlah_buku,
            'tanggal_pengadaan' => $request->tanggal_pengadaan,

        ]);

        session()->flash('success_ubah', 'Data berhasil diubah');
        return redirect()->route('daftar-buku');
    }


    public function hapusbuku($id)
    {
        $buku = MBuku::find($id);

        if ($buku->peminjaman()->exists()) {
            session()->flash('eror_hapus', 'Buku sudah pernah dipinjam atau sedang dipinjam tidak bisa dihapus.');
        } else {
            $buku->delete();
            session()->flash('success_hapus', 'Data Berhasil Dihapus');
        }
        return redirect()->route('daftar-buku');
    }
}
