<?php

namespace App\Http\Controllers\week10;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display nama.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nama)
    {
        // menampilkan nama
        return $nama;
    }

    /**
     * Display segment.
     *
     * @return \Illuminate\Http\Response
     */
    public function segment(Request $request)
    {
        // menampilkan segment ke-3
        return $request->segment(3);
    }

    /**
     * Display formulir.
     *
     * @return \Illuminate\Http\Response
     */
    public function formulir()
    {
        // menampilkan view formulir
        return view('week10.formulir');
    }

    /**
     * Prosess data formulir
     * 1. Validasi data
     * 2. Menampilkan data
     *
     * @return \Illuminate\Http\Response
     */
    public function proses(Request $request)
    {
        // validasi data
        $this->validation();

        // menyimpan data ke variabel baru
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        // menampilkan data
        return "Nama : $nama, Alamat : $alamat";
    }

    /**
     * Validasi data
     *
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validation()
    {
        // pesan error
        $message = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
        ];

        // validasi data
        $this->validate(request(), [
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|alpha',
        ], $message);
    }
}
