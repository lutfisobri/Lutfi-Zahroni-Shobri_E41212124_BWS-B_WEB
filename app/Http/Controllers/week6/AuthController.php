<?php

namespace App\Http\Controllers\week6;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login user
     */
    public function login()
    {
        // Validate request
        // jika gagal, akan redirect ke halaman login dengan pesan error
        $credential = $this->validate(request(), [
            'username' => 'required|string|exists:users,username',
            'password' => 'required|string'
        ], [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa text',
            'exists' => ':attribute tidak ditemukan'
        ]);

        // Check if user input email or username
        $loginType = filter_var($credential['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // create auth array
        $auth = [
            $loginType => $credential['username'],
            'password' => $credential['password']
        ];

        // Check if user authenticated
        if (Auth::attempt($auth)) {
            // If user authenticated, redirect to home page
            return redirect()->route('week6.view.home');
        }

        // If user not authenticated, redirect to login page with error message
        return redirect()->route('week6.view.login')->with('error', 'Username atau password salah');
    }

    /**
     * Register new user
     */
    public function register()
    {
        // Validate request
        // jika gagal, akan redirect ke halaman register dengan pesan error
        $credential = $this->validate(request(), [
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ], [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa text',
            'unique' => ':attribute sudah terdaftar',
            'email' => ':attribute harus berupa email',
            'min' => ':attribute minimal :min karakter',
            'confirmed' => ':attribute tidak sama dengan konfirmasi password'
        ]);

        // Hash password before insert to database
        $credential['password'] = bcrypt($credential['password']);

        // Insert to database
        $user = User::create($credential);

        // Check if user created
        if ($user) {
            // If user created, redirect to login page with success message
            return redirect()->route('week6.view.login')->with('success', 'Berhasil mendaftar, silahkan login');
        }

        // If user not created, redirect to register page with error message
        return redirect()->route('week6.view.register')->with('error', 'Gagal mendaftar');
    }

    /**
     * Logout user
     */
    public function logout()
    {
        // Logout user
        Auth::logout();

        // Redirect to login page
        return redirect()->route('week6.view.login');
    }
}
