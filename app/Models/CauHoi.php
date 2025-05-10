<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    protected $table = 'cau_hois';
    protected $fillable = [
        'id_mon_hoc',
        'ten_cau_hoi',
        'loai_cau_hoi',
        'so_luong_dap_an',
        'slug'
    ];

    CONST TRAC_NGHIEM   = 1;
    CONST TU_LUAN       = 3;
    CONST TRA_LOI_NGAN  = 2;

    public function dapAn()
    {
        return $this->hasMany(DapAnCauHoi::class, 'id_cau_hoi')->select('id', 'ten_dap_an', 'noi_dung', 'id_cau_hoi');
    }
}
