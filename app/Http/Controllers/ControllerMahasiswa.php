<?php

namespace App\Http\Controllers;

use App\Models\MMahasiswa;
use Illuminate\Http\Request;


class ControllerMahasiswa extends Controller
{
    public function index()
    {
        $mahasiswa = MMahasiswa::all();
        return view('admin.navbar.daftar_mahasiswa', compact('mahasiswa'));
    }

    public function tambahmahasiswa()
    {
        return view('admin.navbar.mahasiswa.tambah_mahasiswa');
    }

    public function simpanmahasiswa(Request $request)
    {
        $validasi = $request->validate([
            'nama_mahasiswa' => 'required|regex:/^[^0-9]*$/|max:255',
            'nim' => 'required|string',
            'angkatan' => 'required|date_format:Y',
            'fakultas' => 'required|regex:/^[^0-9]*$/|max:255',
            'prodi' => 'required|regex:/^[^0-9]*$/|max:255',
        ]);

        if (MMahasiswa::where('nim', $request->nim)->exists()) {
            session()->flash('eror_edit', 'Data Gagal Ditambahkan. NIM ' . $request->nim . ' sudah ada');
            return redirect()->route('daftar-mahasiswa');
        } else {
            MMahasiswa::create([
                'nama_mahasiswa' => $request->nama_mahasiswa,
                'nim' => $request->nim,
                'angkatan' => $request->angkatan,
                'fakultas' => $request->fakultas,
                'prodi' => $request->prodi,
            ]);

            session()->flash('success_tambah', 'Data Mahasiswa Berhasil Ditambahkan');
            return redirect()->route('daftar-mahasiswa');
        }
    }

    public function ubahmahasiswa($id)
    {
        $mahasiswa = MMahasiswa::find($id);
        return view('admin.navbar.mahasiswa.ubah_mahasiswa', compact('mahasiswa'));
    }

    public function prosesubahmahasiswa(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|regex:/^[^0-9]*$/|max:255',
            'nim' => 'required|string',
            'angkatan' => 'required|date_format:Y',
            'fakultas' => 'required|regex:/^[^0-9]*$/|max:255',
            'prodi' => 'required|regex:/^[^0-9]*$/|max:255',
        ]);

        $nimExists = MMahasiswa::where('nim', $request->nim)
            ->where('id', '!=', $request->id)
            ->exists();

        if ($nimExists) {
            Session()->flash('eror_edit', 'Data Gagal Diubah. NIM ' . $request->nim . ' sudah ada');
            return redirect()->route('daftar-mahasiswa');
        }

        $mahasiswa = MMahasiswa::where('id', $request->id)->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
        ]);

        session()->flash('success_edit', 'Data Mahasiswa Berhasil Diubah');
        return redirect()->route('daftar-mahasiswa');
    }

    public function hapusmahasiswa($id)
    {
        $mahasiswa = MMahasiswa::find($id);

        if ($mahasiswa->peminjaman()->exists()) {
            session()->flash('eror_hapus', 'Mahasiswa masih meminjam buku dan tidak bisa dihapus.');
        } else {
            $mahasiswa->delete();
            session()->flash('success_hapus', 'Data Mahasiswa Berhasil Dihapus');
        }
        return redirect()->route('daftar-mahasiswa');
    }
}
