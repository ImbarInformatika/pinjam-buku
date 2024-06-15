<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBuku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = [
        'id', 'judul_buku', 'id_penerbit', 'tahun_terbit', 'jumlah_buku', 'tanggal_pengadaan'
    ];

    public function penerbit()
    {
        return $this->belongsTo(MPenerbit::class, 'id_penerbit', 'id');
    }

    public function peminjaman()
    {
        return $this->hasMany(MPeminjaman::class, 'id_buku', 'id');
    }
}
