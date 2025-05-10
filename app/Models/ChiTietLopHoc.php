<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietLopHoc extends Model
{
    protected $table = 'chi_tiet_lop_hocs';
    protected $fillable = [
        'id_lop_hoc',
        'id_sinh_vien',
        'trang_thai',
    ];
}
