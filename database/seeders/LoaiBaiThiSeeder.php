<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiBaiThiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('loai_bai_this')->delete();
        DB::table('loai_bai_this')->truncate();

        DB::table('loai_bai_this')->insert([
            [
                'ten_loai_bai_thi'  => 'Bài Thi Giữa Kỳ',
                'trang_thai'        => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'ten_loai_bai_thi'  => 'Bài Thi Cuối Kỳ',
                'trang_thai'        => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'ten_loai_bai_thi'  => 'Bài Kiểm Tra 15 Phút',
                'trang_thai'        => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'ten_loai_bai_thi'  => 'Bài Kiểm Tra 1 Tiết',
                'trang_thai'        => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'ten_loai_bai_thi'  => 'Bài Tập Về Nhà',
                'trang_thai'        => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'ten_loai_bai_thi'  => 'Bài Thi Thực Hành',
                'trang_thai'        => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
