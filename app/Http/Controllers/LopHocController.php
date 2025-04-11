<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    public function getData(){
        $lopHoc = LopHoc::get();
        return response()->json([
            'lophoc'    => $lopHoc
        ]);
    }
}
