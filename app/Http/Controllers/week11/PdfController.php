<?php

namespace App\Http\Controllers\week11;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Process file upload.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get file from request
        $pdf = $request->file('file');

        // rename file
        $pdfName = 'pdf_' . time() . '.' . $pdf->extension();

        // move file to public/pdf/dropzone
        $pdf->move(public_path('pdf/dropzone'), $pdfName);

        // return response
        return response()->json(['success' => $pdfName]);
    }
}
