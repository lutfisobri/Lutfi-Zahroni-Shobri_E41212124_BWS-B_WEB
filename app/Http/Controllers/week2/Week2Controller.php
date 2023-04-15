<?php
namespace App\Http\Controllers\week2;

use App\Http\Controllers\Controller;

class Week2Controller extends Controller
{
    public function index()
    {
        return "Halo ini adalah method index, dalam controller Week2Controller.";
    }

    public function show($id)
    {
        return "Halo ini adalah method show, dalam controller Week2Controller. Parameter yang diberikan adalah $id";
    }
}