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
        'giang_vien_id',
        'id_mon_hoc',
    ];
}
