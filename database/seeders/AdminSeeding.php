<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->delete();
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            [
                'username' => 'admin1',
                'password' => '123456',
                'email' => 'admin1@example.com',
                'phone' => '0123456789',
                'trang_thai' => 1,
                'is_admin' => true,
                'id_chuc_vu' => 1,
            ],
            [
                'username' => 'admin2',
                'password' => '123456',
                'email' => 'admin2@example.com',
                'phone' => '0987654321',
                'trang_thai' => 1,
                'is_admin' => true,
                'id_chuc_vu' => 2,
            ],
        ]);
    }
}
