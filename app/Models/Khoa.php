<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
 {
     protected $table = 'khoas';
     protected $fillable = [
         'ten_khoa',
         'ma_khoa',
         'trang_thai',
         'ghi_chu',
     ];
 }
