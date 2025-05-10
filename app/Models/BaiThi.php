<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiThi extends Model
{
    protected $table = 'bai_this';
    protected $fillable = [
        'ten_bai_thi',
        'id_loai_bai_thi',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
        'trang_thai',
        'id_giang_vien',
        'id_mon_hoc',
        'mat_khau',
        'id_lop_hoc',
        'diem_trac_nghiem',
        'diem_tra_loi_ngan',
        'diem_tu_luan',
        'so_cau_trac_nghiem',
        'so_cau_tra_loi_ngan',
        'so_cau_tu_luan',
    ];
}
