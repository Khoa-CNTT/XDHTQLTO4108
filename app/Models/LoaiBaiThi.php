<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiBaiThi extends Model
{
    protected $table = 'loai_bai_this';
    protected $fillable = ['ten_loai_bai_thi', 'trang_thai'];
}
