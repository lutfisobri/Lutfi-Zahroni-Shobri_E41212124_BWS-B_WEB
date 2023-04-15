<?php
namespace App\Http\Controllers\week6;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Employes;

class Employe extends Controller
{
    public function login(Request $request) {
        if (Employes::getEmployes($request)) {
            return view('week4.admin.home');
        }
        return view('week4.home');
    }
}