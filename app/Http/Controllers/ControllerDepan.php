<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerDepan extends Controller
{
    public function login()
    {
        return view('login');
    }


    public function proseslogin(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Mengambil credential dari request
        $credentials = $request->only('email', 'password');

        // Cari pengguna berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Verifikasi kata sandi
        if ($user && $user->password === $credentials['password']) {
            // Jika berhasil login, redirect ke dashboard
            Auth::login($user);
            session()->flash('berhasil_login', 'Anda berhasil login!');
            return redirect()->route('dashboard');
        }

        // Jika gagal login, kembali ke halaman login dengan error message
        return back()->withErrors([
            session()->flash('gagal_login', 'Gagal Login')
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->flash('berhasil_keluar', 'Berhasil Logout');
        return redirect('/');
    }
}
