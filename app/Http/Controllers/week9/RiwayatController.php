<?php

namespace App\Http\Controllers\week9;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil request page dari url
        $pendidikans = Pendidikan::paginate(10);

        // mengirim data ke view
        return view('week9.riwayat_pendidikan', compact('pendidikans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // membuat variabel kosong untuk dikirim ke view
        $pendidikans = null;

        // mengirim data ke view
        return view('week9.pendidikan_form', compact('pendidikans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data
        $this->validation($request);

        // menyimpan data ke database
        Pendidikan::create([
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_selesai' => $request->tahun_selesai
        ]);

        // redirect ke halaman pendidikan
        return redirect()->route('week9.pendidikan.index')->with('success', 'Data Riwayat Pendidikan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mengambil data berdasarkan id
        $pendidikans = Pendidikan::paginate(10);

        // mengirim data ke view
        return view('week9.riwayat_pendidikan', compact('pendidikans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data berdasarkan id
        $pendidikans = Pendidikan::find($id);

        // mengirim data ke view
        return view('week9.pendidikan_form', compact('pendidikans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi data
        $this->validation($request);

        // menyimpan data ke database
        Pendidikan::find($id)->update([
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_selesai' => $request->tahun_selesai
        ]);

        // redirect ke halaman pendidikan
        return redirect()->route('week9.pendidikan.index')->with('success', 'Data Riwayat Pendidikan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data berdasarkan id
        Pendidikan::find($id)->delete();
        return redirect()->route('week9.pendidikan.index')->with('success', 'Data Riwayat Pendidikan berhasil dihapus');
    }

    private function validation(Request $request)
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
            'tahun_masuk' => 'required|digits:4|integer|min:1900|max:2100',
            'tahun_selesai' => 'required|digits:4|integer|min:1900|max:2100'
        ], [
            'nama.required' => 'Nama Sekolah / Universitas harus diisi',
            'tahun_masuk.required' => 'Tahun Masuk harus diisi',
            'tahun_selesai.required' => 'Tahun Selesai harus diisi',
            'tahun_masuk.digits' => 'Tahun Masuk harus 4 digit',
            'tahun_selesai.digits' => 'Tahun Selesai harus 4 digit',
            'tahun_masuk.integer' => 'Tahun Masuk harus berupa angka',
            'tahun_selesai.integer' => 'Tahun Selesai harus berupa angka',
            'tahun_masuk.min' => 'Tahun Masuk minimal 1900',
            'tahun_selesai.min' => 'Tahun Selesai minimal 1900',
            'tahun_masuk.max' => 'Tahun Masuk maksimal 2100',
            'tahun_selesai.max' => 'Tahun Selesai maksimal 2100'
        ]);
    }
}
