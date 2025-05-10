<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->delete();
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            'username'      => 'admin',
            'password'      => bcrypt('123456'),
            'email'         => 'admin@gmail.com',
            'phone'         => '0987654321',
            'trang_thai'    => 1,
            'is_admin'      => 1,
            'id_chuc_vu'    => 0,
        ]);
    }
}
