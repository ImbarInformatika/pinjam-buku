<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = [
        'id', 'id_mahasiswa', 'id_buku', 'no_telepon', 'tanggal_pinjam', 'tanggal_kembali', 'denda', 'status'
    ];

    protected $casts = [
        'tanggal_pinjam' => 'datetime',
        'tanggal_kembali' => 'datetime',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(MMahasiswa::class, 'id_mahasiswa');
    }

    public function buku()
    {
        return $this->belongsTo(MBuku::class, 'id_buku');
    }
}
