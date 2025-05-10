<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhSachCauHoi extends Model
{
    protected $table = 'danh_sach_cau_hois';
    protected $fillable = ['id_bai_thi', 'id_cau_hoi', 'trang_thai', 'diem_cau_hoi'];
}
