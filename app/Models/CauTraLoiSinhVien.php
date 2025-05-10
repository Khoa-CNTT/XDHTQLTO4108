<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CauTraLoiSinhVien extends Model
{
    protected $table = 'cau_tra_loi_sinh_viens';
    protected $fillable = [
        'id_cau_hoi',
        'id_sinh_vien',
        'id_bai_thi',
        'id_dap_an',
        "tra_loi_bang_chu",
        "diem",
        "is_dung",
    ];
}
