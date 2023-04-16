<?php

namespace App\Http\Controllers\week9;

use App\Http\Controllers\Controller;
use App\Models\PengalamanKerja as ModelsPengalamanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengalamanKerja extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengambil request page dari url
        $page = request()->page ?? 1;

        // mengambil data dari database dengan pagination
        $pengalaman_kerja = ModelsPengalamanKerja::paginate(10, ['*'], 'page', $page);

        // mengirim data ke view
        return view('week9.pengalaman_kerja', compact('pengalaman_kerja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // membuat variabel kosong untuk dikirim ke view
        $pengalaman_kerja = null;

        // mengirim data ke view
        return view('week9.pengalaman_kerja_form', compact('pengalaman_kerja'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data
        $this->validation($request);

        // menyimpan data ke database
        DB::table('pengalaman_kerja')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        // redirect ke halaman pengalaman kerja
        return redirect()->route('week9.kerja.index')->with('success', 'Data Pengalaman Kerja baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function validation(Request $request)
    {
        // validasi data
        /**
         * required = tidak boleh kosong
         * string = harus berupa string
         * digits = harus berupa angka dengan jumlah digit tertentu
         * integer = harus berupa angka
         * min = harus lebih besar dari nilai tertentu
         * max = harus lebih kecil dari nilai tertentu
         */
        $this->validate($request, [
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'tahun_masuk' => 'required|digits:4|integer|min:1900|max:2100',
            'tahun_keluar' => 'required|digits:4|integer|min:1900|max:2100',
        ], [
            'nama.required' => 'Nama Perusahaan harus diisi',
            'jabatan.required' => 'Jabatan harus diisi',
            'tahun_masuk.required' => 'Tahun Masuk harus diisi',
            'tahun_keluar.required' => 'Tahun Keluar harus diisi',
            'tahun_masuk.digits' => 'Tahun Masuk harus 4 digit',
            'tahun_keluar.digits' => 'Tahun Keluar harus 4 digit',
            'tahun_masuk.integer' => 'Tahun Masuk harus berupa angka',
            'tahun_keluar.integer' => 'Tahun Keluar harus berupa angka',
            'tahun_masuk.min' => 'Tahun Masuk tidak boleh kurang dari 1900',
            'tahun_keluar.min' => 'Tahun Keluar tidak boleh kurang dari 1900',
            'tahun_masuk.max' => 'Tahun Masuk tidak boleh lebih dari 2100',
            'tahun_keluar.max' => 'Tahun Keluar tidak boleh lebih dari 2100',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // mengambil data pengalaman kerja berdasarkan id
        $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();

        // mengirim data ke view
        return view('week9.pengalaman_kerja_form', compact('pengalaman_kerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validasi data
        $this->validation($request);

        // menyimpan data ke database
        DB::table('pengalaman_kerja')->where('id', $id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        // redirect ke halaman pengalaman kerja
        return redirect()->route('week9.kerja.index')->with('success', 'Data Pengalaman Kerja berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // menghapus data pengalaman kerja berdasarkan id
        DB::table('pengalaman_kerja')->where('id', $id)->delete();

        // redirect ke halaman pengalaman kerja
        return redirect()->route('week9.kerja.index')->with('success', 'Data Pengalaman Kerja berhasil dihapus');
    }
}
