<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model untuk tabel pengalaman kerja
 */
class PengalamanKerja extends Model
{
    use HasFactory;

    // nama tabel
    protected $table = 'pengalaman_kerja';

    // primary key
    protected $primaryKey = 'id';

    // kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'jabatan',
        'tahun_masuk',
        'tahun_keluar',
    ];
}
