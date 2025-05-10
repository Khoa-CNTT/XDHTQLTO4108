<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhSachSinhVien extends Model
{
    protected $table = 'danh_sach_sinh_vien';
    protected $fillable = [
        'id_sinh_vien',
        'id_bai_thi',
        'diem_trac_nghiem',
        'diem_tu_luan',
        'diem_cau_hoi_ngan',
        'link_tu_luan',
        'trang_thai',
    ];
}
