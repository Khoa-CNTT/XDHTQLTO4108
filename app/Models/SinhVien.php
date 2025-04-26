<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class SinhVien extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
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
        'hash_reset',
    ];
}
