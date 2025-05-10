<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table = 'mon_hocs';
    protected $fillable = [
        'ten_mon_hoc',
        'ma_mon_hoc',
        'ma_so_mon_hoc',
        'trang_thai',
        'so_tin_chi',
    ];
}
