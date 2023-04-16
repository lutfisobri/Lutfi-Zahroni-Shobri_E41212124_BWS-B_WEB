<?php

namespace App\Http\Controllers\week10;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Create session.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // menambahkan data ke session
        $request->session()->put('nama', 'Lutfi Zahroni Shobri');

        // menampilkan pesan
        echo "Data telah ditambahkan ke session.";
    }

    /**
     * Display session.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // validasi session
        if ($request->session()->has('nama')) {
            // menampilkan data session
            echo $request->session()->get('nama');
        } else {
            // menampilkan pesan
            echo "Tidak ada data dalam session.";
        }
    }

    /**
     * Delete session.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // menghapus data session
        $request->session()->forget('nama');

        // menampilkan pesan
        echo "Data telah dihapus dari session.";
    }
}
