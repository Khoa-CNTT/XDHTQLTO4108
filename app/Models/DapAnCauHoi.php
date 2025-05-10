<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DapAnCauHoi extends Model
{
    protected $table = 'dap_an_cau_hois';
    protected $fillable = [
        'id_cau_hoi',
        'ten_dap_an',
        'noi_dung',
        'is_dap_an_dung'
    ];

    CONST IS_DAP_AN_DUNG = 1;
}
