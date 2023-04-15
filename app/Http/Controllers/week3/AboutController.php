<?php
namespace App\Http\Controllers\week3;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $name = "Lutfi Zahroni Shobri";
        $courses = ["SI Website Framework Laravel", "Mobile Application Native", "Algoritma & Pemrograman"];
        return view('week3.views.about', compact('name', 'courses'));
    }
}