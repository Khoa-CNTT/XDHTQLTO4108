<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiThi extends Model
{
    protected $table = 'bai_this';
    protected $fillable = [
        'ten_bai_thi',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'thoi_gian_thi',
        'trang_thai',
        'id_mon_hoc',
        'id_lop_hoc',
        'id_loai_bai_thi',
    ];

}

