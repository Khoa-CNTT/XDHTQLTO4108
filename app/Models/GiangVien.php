<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    protected $table = 'giang_viens';
    protected $fillable = [
        'ho_va_ten',
        'can_cuoc',
        'ma_giang_vien',
        'email',
        'password',
        'so_dien_thoai',
        'thong_tin_chung',
        'anh_dai_dien',
        'trang_thai',
        'khoa_id',
        'hash_reset',
    ];
}
