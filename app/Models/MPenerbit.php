<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPenerbit extends Model
{
    use HasFactory;

    protected $table = 'penerbit';
    protected $fillable = [
        'id', 'nama_penerbit', 'alamat', 'no_telepon',
    ];

    public function buku()
    {
        return $this->hasMany(MBuku::class, 'id_penerbit', 'id');
    }
}
