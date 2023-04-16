<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model untuk tabel pendidikan
 */
class Pendidikan extends Model
{
    use HasFactory;

    // nama tabel
    protected $table = "pendidikan";

    // primary key
    protected $primaryKey = "id";

    // kolom yang dapat diisi
    protected $fillable = [
        'nama', 'tingkatan', 'tahun_masuk', 'tahun_selesai'
    ];
}
