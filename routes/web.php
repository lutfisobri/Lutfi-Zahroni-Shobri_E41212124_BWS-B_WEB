<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Route adalah sebuah alamat URL yang dapat diakses oleh pengguna
 * 
 * Example:
 * ```php
 * Route::get('/', function () {
 *    return view('welcome');
 * });
 * ```
 * Maka ketika pengguna mengakses alamat http://localhost:8000/ maka akan menampilkan view welcome
 * 
 * 
 * @see \Illuminate\Routing\Route
 */
function routes() {}

// Week 2
Route::prefix('/week2')->group(function () {
    // route untuk menampilkan Hello World
    Route::get('/', function () {
        return "Hello World";
    });

    // route untuk memanggil UserController
    Route::get('/user', 'App\Http\Controllers\week2\Week2Controller@index');

    // route untuk memanggil UserController dengan parameter
    Route::get('/user/{id}', 'App\Http\Controllers\week2\Week2Controller@show');

    // route untuk menampilkan halaman about
    Route::get('/about', fn () => view('week2.about'));

    // route resource untuk user
    Route::resource('/week3', 'App\Http\Controllers\week2\UserController');
});

// Week 3
Route::prefix('/week3')->group(function () {
    // route untuk menampilkan halaman home
    Route::get('/', fn () => view('week3.home'));

    // route untuk menampilkan halaman home dengan layout
    Route::get('/home', fn () => view('week3.views.home'));

    // route untuk menampilkan halaman about me
    Route::get('/about', 'App\Http\Controllers\week3\AboutController@index');
});

// Week 4
Route::prefix('/week4')->group(function () {
    // route untuk menampilkan halaman landing page
    Route::get('/', fn () => view('week4.home'));

    // route untuk menampilkan halaman home dengan admin panel
    Route::get('/admin', fn () => view('week4.admin.home'));
});

// Week 6
Route::prefix('/week6')->group(function () {
    // route untuk menampilkan halaman login
    Route::get('/login', fn () => view('week6.login'))->name('week6.view.login')->middleware('guest');

    // route dengan method post untuk login yang akan memanggil AuthController
    Route::post('/login', 'App\Http\Controllers\week6\AuthController@login')->name('week6.login');

    // route untuk menampilkan halaman register
    Route::get('/register', fn () => view('week6.register'))->name('week6.view.register')->middleware('guest');

    // route dengan method post untuk register yang akan memanggil AuthController
    Route::post('/register', 'App\Http\Controllers\week6\AuthController@register')->name('week6.register');

    // route untuk menampilkan halaman home
    Route::get('/home', fn () => view('week4.admin.home'))->name('week6.view.home')->middleware('auth');
});


// week 9
Route::prefix('/week9')->group(function () {
    Route::prefix('/kerja')->group(function() {
        // route untuk menampilkan halaman index
        Route::get('/', 'App\Http\Controllers\week9\PengalamanKerja@index')->name('week9.kerja.index');

        // route untuk menampilkan halaman create
        Route::get('/create', 'App\Http\Controllers\week9\PengalamanKerja@create')->name('week9.kerja.create');

        // route untuk menyimpan data
        Route::post('/store', 'App\Http\Controllers\week9\PengalamanKerja@store')->name('week9.kerja.store');

        // route untuk menampilkan halaman edit
        Route::get('/edit/{id}', 'App\Http\Controllers\week9\PengalamanKerja@edit')->name('week9.kerja.edit');

        // route untuk mengupdate data
        Route::post('/update/{id}', 'App\Http\Controllers\week9\PengalamanKerja@update')->name('week9.kerja.update');

        // route untuk menghapus data
        Route::delete('/delete/{id}', 'App\Http\Controllers\week9\PengalamanKerja@delete')->name('week9.kerja.delete');
    });

    Route::prefix('/pendidikan')->group(function() {
        // route untuk menampilkan halaman index
        Route::get('/', 'App\Http\Controllers\week9\RiwayatController@index')->name('week9.pendidikan.index');

        // route untuk menampilkan halaman create
        Route::get('/create', 'App\Http\Controllers\week9\RiwayatController@create')->name('week9.pendidikan.create');

        // route untuk menyimpan data
        Route::post('/store', 'App\Http\Controllers\week9\RiwayatController@store')->name('week9.pendidikan.store');

        // route untuk menampilkan halaman edit
        Route::get('/edit/{id}', 'App\Http\Controllers\week9\RiwayatController@edit')->name('week9.pendidikan.edit');

        // route untuk mengupdate data
        Route::post('/update/{id}', 'App\Http\Controllers\week9\RiwayatController@update')->name('week9.pendidikan.update');

        // route untuk menghapus data
        Route::delete('/delete/{id}', 'App\Http\Controllers\week9\RiwayatController@destroy')->name('week9.pendidikan.delete');
    });

    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('week6.view.login');
    });

    Route::get('/dashboard', fn()=> view('admin.dashboard'));
});

// week 10
Route::prefix('/week10')->group(function () {
    Route::prefix('/session')->group(function () {
        // route untuk memanggil controller dan membuat session
        Route::get('/create', 'App\Http\Controllers\week10\SessionController@create')->name('week10.session.create');

        // route untuk menampilkan session
        Route::get('/show', 'App\Http\Controllers\week10\SessionController@show')->name('week10.session.show');

        // route untuk menghapus session
        Route::get('/delete', 'App\Http\Controllers\week10\SessionController@delete')->name('week10.session.delete');
    });

    Route::prefix('/request')->group(function () {
        // route untuk menangkap request dari url dengan parameter name
        Route::get('/user/{name}', 'App\Http\Controllers\week10\RequestController@index')->name('week10.request.index');

        // route untuk menangkap request dari url dengan parameter name
        Route::get('/segment/{name}', 'App\Http\Controllers\week10\RequestController@segment')->name('week10.request.segment');

        // route untuk menampilkan halaman form
        Route::get('/formulir', 'App\Http\Controllers\week10\RequestController@formulir')->name('week10.request.formulir');

        // route untuk menangkap request dari form
        Route::post('/formulir/proses', 'App\Http\Controllers\week10\RequestController@proses')->name('week10.request.proses');
    });

    Route::prefix('/error')->group(function(){
        // route untuk menampilkan halaman error internal server error 500
        Route::get('/test', 'App\Http\Controllers\week10\ErrorController@server')->name('week10.error.500');

        // route untuk menampilkan halaman name dengan parameter name
        // jika parameter name tidak diisi maka akan menampilkan error 404
        Route::get('/name/{name?}', 'App\Http\Controllers\week10\ErrorController@name')->name('week10.error.name');
    });
});

// week 11
Route::prefix('/week11')->group(function(){
    // route untuk menampilkan halaman upload image
    Route::get('/image', fn() => view('week11.upload'))->name('week11.image');

    // route untuk upload image
    Route::post('/image/upload', 'App\Http\Controllers\week11\ImageController@upload')->name('week11.image.upload');

    // route untuk menampilkan halaman resize image
    Route::get('/image/resize', fn() => view('week11.resize'))->name('week11.image.resize.show');

    // route untuk resize image
    Route::post('/image/resize', 'App\Http\Controllers\week11\ImageController@resize')->name('week11.image.resize');

    // route untuk menampilkan halaman upload multiple image
    Route::get('/image/dropzone', fn() => view('week11.dropzone'))->name('week11.dropzone');

    // route untuk upload multiple image
    Route::post('/image/dropzone/upload', 'App\Http\Controllers\week11\ImageController@dropzone')->name('week11.dropzone.upload');

    // route untuk menampilkan halaman upload pdf
    Route::get('/pdf', fn() => view('week11.pdf'))->name('week11.pdf');

    // route untuk upload pdf
    Route::post('/pdf/store', 'App\Http\Controllers\week11\PdfController@store')->name('week11.pdf.store');
});