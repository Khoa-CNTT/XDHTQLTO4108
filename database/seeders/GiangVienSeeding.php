<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GiangVienSeeding extends Seeder
{
    public function run(): void
    {
        // Reset bảng giảng viên
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('giang_viens')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('giang_viens')->insert([
            [
                'ma_giang_vien' => 'GV0001',
                'ho_va_ten' => 'Nguyễn Văn Bình',
                'email' => 'nguyenvanbinh@example.com',
                'password' => Hash::make('12345678'),
                'can_cuoc' => '049203456789',
                'so_dien_thoai' => '0945556378',
                'anh_dai_dien' => 'https://example.com/avatar11.jpg',
                'khoa_id' => 1, // Công nghệ thông tin
                'thong_tin_chung' => 'Khoa Công nghệ thông tin',
                'trang_thai' => 1,
            ],
            [
                'ma_giang_vien' => 'GV0002',
                'ho_va_ten' => 'Trần Thị Hoa',
                'email' => 'tranthihoa@example.com',
                'password' => Hash::make('12345678'),
                'can_cuoc' => '023203456789',
                'so_dien_thoai' => '0367923456',
                'anh_dai_dien' => 'https://example.com/avatar12.jpg',
                'khoa_id' => 3, // Kinh tế
                'thong_tin_chung' => 'Khoa Kinh tế',
                'trang_thai' => 1,
            ],
            [
                'ma_giang_vien' => 'GV0003',
                'ho_va_ten' => 'Lê Văn Hùng',
                'email' => 'levanhung@example.com',
                'password' => Hash::make('12345678'),
                'can_cuoc' => '022203456789',
                'so_dien_thoai' => '0753669345',
                'anh_dai_dien' => 'https://example.com/avatar13.jpg',
                'khoa_id' => 4, // Ngoại ngữ
                'thong_tin_chung' => 'Khoa Ngoại ngữ',
                'trang_thai' => 1,
            ],
            [
                'ma_giang_vien' => 'GV0004',
                'ho_va_ten' => 'Phạm Thị Lan',
                'email' => 'phamthilan@example.com',
                'password' => Hash::make('12345678'),
                'can_cuoc' => '033203456789',
                'so_dien_thoai' => '0374965890',
                'anh_dai_dien' => 'https://example.com/avatar14.jpg',
                'khoa_id' => 5, // Điện - Điện tử
                'thong_tin_chung' => 'Khoa Điện - Điện tử',
                'trang_thai' => 1,
            ],
        ]);
    }
}
