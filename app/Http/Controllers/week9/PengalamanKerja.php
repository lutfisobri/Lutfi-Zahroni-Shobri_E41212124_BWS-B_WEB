<?php
namespace App\Http\Controllers\week9;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengalamanKerja extends Controller {
    public function index()
    {
        return view('week9.pengalaman_kerja');
    }

    public function create()
    {
        $pengalaman_kerja = null;
        return view('week9.pengalaman_kerja_form', compact('pengalaman_kerja'));
    }

    public function store(Request $request)
    {
        DB::table('pengalaman_kerja')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return redirect()->route('week9.pengalaman_kerja.index')->with('success', 'Data Pengalaman Kerja baru berhasil ditambahkan');
    }
}