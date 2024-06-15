<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $fillable = [
        'id', 'nama_mahasiswa', 'nim', 'angkatan', 'fakultas', 'prodi'
    ];

    public function peminjaman()
    {
        return $this->hasMany(MPeminjaman::class, 'id_mahasiswa');
    }
}
