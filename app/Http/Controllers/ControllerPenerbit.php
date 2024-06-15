<?php

namespace App\Http\Controllers;

use App\Models\MBuku;
use App\Models\MPenerbit;
use Illuminate\Http\Request;

class ControllerPenerbit extends Controller
{
    public function index()
    {
        $penerbit = MPenerbit::all();
        return view('admin.navbar.daftar_penerbit', compact('penerbit'));
    }

    public function tambahpenerbit()
    {
        return view('admin.navbar.penerbit.tambah_penerbit');
    }

    public function simpanpenerbit(Request $request)
    {
        $validasi = $request->validate([
            'nama_penerbit' => 'required|regex:/^[^0-9]*$/|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|numeric|digits_between:12,13'
        ]);

        MPenerbit::create([
            'nama_penerbit' => $request->nama_penerbit,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon
        ]);

        session()->flash('success_tambah', 'Data Berhasil Di Tambahkan');
        return redirect('daftar-penerbit');
    }

    public function ubahpenerbit($id)
    {
        $penerbit = MPenerbit::find($id);
        return view('admin.navbar.penerbit.ubah_penerbit', compact('penerbit'));
    }


    public function prosesubahpenerbit(Request $request)
    {
        $validasi = $request->validate([
            'nama_penerbit' => 'required|regex:/^[^0-9]*$/|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|numeric|digits_between:12,13'
        ]);

        $penerbit = MPenerbit::where('id', $request->id)->update([
            'nama_penerbit' => $request->nama_penerbit,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon
        ]);

        session()->flash('success_edit', 'Data Penerbit Berhasil Diubah');
        return redirect()->route('daftar-penerbit');
    }

    public function hapuspenerbit($id)
    {
        $penerbit = MPenerbit::find($id);

        if (!$penerbit) {
            session()->flash('error_hapus', 'Penerbit tidak ditemukan.');
            return redirect()->route('daftar-penerbit');
        }

        $bukuExists = MBuku::where('id_penerbit', $id)->exists();

        if ($bukuExists) {
            session()->flash('eror_hapus', 'Data gagal dihapus. ' . $penerbit->nama_penerbit . ' masih mempunyai buku.');
        } else {
            $penerbit->delete();
            session()->flash('success_hapus', 'Data penerbit berhasil dihapus.');
        }

        return redirect()->route('daftar-penerbit');
    }
}
