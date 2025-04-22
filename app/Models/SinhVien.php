<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table = 'sinh_viens';
    protected $fillable = [
        'ho_va_ten',
        'can_cuoc',
        'ma_sinh_vien',
        'email',
        'password',
        'so_dien_thoai',
        'thong_tin_chung',
        'anh_dai_dien',
        'trang_thai',
        'khoa_id',
    ];
}
