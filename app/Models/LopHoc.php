<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    protected $table = 'lop_hocs';
    protected $fillable = [
        'ten_lop',
        'ma_lop',
        'trang_thai',
        'id_giang_vien',
        'id_mon_hoc',
    ];
}
