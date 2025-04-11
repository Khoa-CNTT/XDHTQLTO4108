<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use Illuminate\Http\Request;

class GiangVienController extends Controller
{
    public function getData(){
        $giangVien = GiangVien::get();
        return response()->json([
            'giangvien'  => $giangVien
        ]); 
    }
}
