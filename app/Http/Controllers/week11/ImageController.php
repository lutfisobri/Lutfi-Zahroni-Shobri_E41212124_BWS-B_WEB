<?php

namespace App\Http\Controllers\week11;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Termwind\Components\Dd;

class ImageController extends Controller
{
    /**
     * process upload image.
     */
    public function upload()
    {
        // validate request
        $this->validate(request(), [
            'image' => 'required',
            'description' => 'required'
        ]);

        // get file from request
        $image = request()->file('image');

        // menampilkan nama file
        echo 'File Name: ' . $image->getClientOriginalName();
        echo '<br>';

        // menampilkan ekstensi file
        echo 'File Extension: ' . $image->getClientOriginalExtension();
        echo '<br>';

        // menampilkan letak penyimpanan sementara file
        echo 'File Real Path: ' . $image->getRealPath();
        echo '<br>';

        // menampilkan ukuran file
        echo 'File Size: ' . $image->getSize();
        echo '<br>';

        // menampilkan tipe mime
        echo 'File Mime Type: ' . $image->getMimeType();

        // menyimpan file ke folder public/images
        $image->move(public_path('images'), $image->getClientOriginalName());
    }

    /**
     * process upload image.
     * 
     * @return \Illuminate\Http\Response
     */
    public function resize()
    {
        // validate request
        $this->validate(request(), [
            'image' => 'required',
            'description' => 'required'
        ]);

        // get file from request
        $path = public_path('images');

        // create folder if not exist
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        // get file from request
        $image = request()->file('image');

        // rename file
        $name = 'img' . uniqid() . '.' . $image->getClientOriginalExtension();

        // resize image
        $canvas = Image::canvas(200, 200);

        // proses resize image
        $resizeImage = Image::make($image)->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });

        // insert image to canvas
        $canvas->insert($resizeImage, 'center');

        // check if image saved
        if ($canvas->save($path . '/' . $name)) {
            // if success return back with success message
            return back()->with('success', 'Image saved successfully');
        } else {
            // if failed return back with error message
            return back()->with('error', 'Image failed to save');
        }
    }

    /**
     * process upload multiple image.
     */
    public function dropzone()
    {
        // get file from request
        $image = request()->file('file');

        // rename file
        $name = time() . '.' . $image->extension();

        // move file to public/img/dropzone
        $image->move(public_path('img/dropzone'), $name);

        // return response
        return response()->json(['success' => $name]);
    }
}
