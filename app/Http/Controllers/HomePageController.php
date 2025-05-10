<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function indexAdmin()
    {
        return view("Admin.Page.HomePage.index");
    }

    public function index()
    {
        return view('SinhVien.homepage');
    }
}
