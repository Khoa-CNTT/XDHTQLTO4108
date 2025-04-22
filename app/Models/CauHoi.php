<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    protected $table = 'cau_hois';
    protected $fillable = [
        'id_mon_hoc',
        'ten_cau_hoi',
        'dap_an_dung',
        'dap_an_a',
        'dap_an_b',
        'dap_an_c',
        'dap_an_d',
        'noi_dung_tra_loi',
        'loai_cau_hoi',
        'chuan_dau_ra'
    ];

    public function monHoc()
    {
        return $this->belongsTo(MonHoc::class, 'id_mon_hoc');
    }
}
