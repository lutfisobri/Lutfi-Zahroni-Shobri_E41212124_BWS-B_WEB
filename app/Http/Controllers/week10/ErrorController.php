<?php

namespace App\Http\Controllers\week10;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    /**
     * Display data or error 404.
     *
     * @return \Illuminate\Http\Response
     */
    public function name()
    {
        // validasi data
        if (request()->segment(4) != null) {
            // jika data ada, tampilkan data
            echo "Nama : " . request()->segment(4);
        } else {
            // jika data tidak ada, tampilkan error 404
            abort(404);
        }
    }
}
