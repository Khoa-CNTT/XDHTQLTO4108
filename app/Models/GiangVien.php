<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class GiangVien extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'giang_viens';
    protected $fillable = [
        'ho_va_ten',
        'ma_giang_vien',
        'email',
        'password',
        'so_dien_thoai',
        'thong_tin_chung',
        'anh_dai_dien',
        'trang_thai',
    ];
}
