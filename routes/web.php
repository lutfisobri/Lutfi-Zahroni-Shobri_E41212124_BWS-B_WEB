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

    

    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('week6.view.login');
    });

    Route::get('/dashboard', fn()=> view('admin.dashboard'));
});