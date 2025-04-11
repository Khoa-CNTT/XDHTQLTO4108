<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function getData(){
        $sinhVien = SinhVien::get();
        return response()->json([
            'sinhvien'  => $sinhVien
        ]);
    }
}
