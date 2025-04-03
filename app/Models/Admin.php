<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = [
        'username',
        'password',
        'email',
        'phone',
        'trang_thai',
        'is_admin',
        'id_chuc_vu'
    ];
}
