<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GiangVienSeeding extends Seeder
{
    public function run()
    {
        DB::table('giang_viens')->delete();
        DB::table('giang_viens')->truncate();
        DB::table('giang_viens')->insert([
            [
                'ho_va_ten' => 'Nguyễn Văn Bình',
                'can_cuoc' => '011203456789', // Hòa Bình, Nam
                'ma_giang_vien' => 'GV011',
                'email' => 'nguyenvanbinh@example.com',
                'password' => Hash::make('password123'),
                'so_dien_thoai' => '0911111111',
                'thong_tin_chung' => 'Khoa Công nghệ thông tin',
                'anh_dai_dien' => 'https://example.com/avatar11.jpg',
                'trang_thai' => 1,
            ],
            [
                'ho_va_ten' => 'Trần Thị Hoa',
                'can_cuoc' => '012302345678', // Thái Nguyên, Nữ
                'ma_giang_vien' => 'GV012',
                'email' => 'tranthihoa@example.com',
                'password' => Hash::make('password123'),
                'so_dien_thoai' => '0922222222',
                'thong_tin_chung' => 'Khoa Kinh tế',
                'anh_dai_dien' => 'https://example.com/avatar12.jpg',
                'trang_thai' => 1,
            ],
            [
                'ho_va_ten' => 'Lê Văn Hùng',
                'can_cuoc' => '013203456789', // Lạng Sơn, Nam
                'ma_giang_vien' => 'GV013',
                'email' => 'levanhung@example.com',
                'password' => Hash::make('password123'),
                'so_dien_thoai' => '0933333333',
                'thong_tin_chung' => 'Khoa Kỹ thuật cơ khí',
                'anh_dai_dien' => 'https://example.com/avatar13.jpg',
                'trang_thai' => 1,
            ],
            [
                'ho_va_ten' => 'Phạm Thị Lan',
                'can_cuoc' => '014302345678', // Quảng Ninh, Nữ
                'ma_giang_vien' => 'GV014',
                'email' => 'phamthilan@example.com',
                'password' => Hash::make('password123'),
                'so_dien_thoai' => '0944444444',
                'thong_tin_chung' => 'Khoa Y dược',
                'anh_dai_dien' => 'https://example.com/avatar14.jpg',
                'trang_thai' => 1,
            ],
            [
                'ho_va_ten' => 'Hoàng Văn Minh',
                'can_cuoc' => '015203456789', // Bắc Giang, Nam
                'ma_giang_vien' => 'GV015',
                'email' => 'hoangvanminh@example.com',
                'password' => Hash::make('password123'),
                'so_dien_thoai' => '0955555555',
                'thong_tin_chung' => 'Khoa Quản trị kinh doanh',
                'anh_dai_dien' => 'https://example.com/avatar15.jpg',
                'trang_thai' => 1,
            ],
            [
                'ho_va_ten' => 'Vũ Thị Ngọc',
                'can_cuoc' => '016302345678', // Hải Dương, Nữ
                'ma_giang_vien' => 'GV016',
                'email' => 'vuthingoc@example.com',
                'password' => Hash::make('password123'),
                'so_dien_thoai' => '0966666666',
                'thong_tin_chung' => 'Khoa Sư phạm',
                'anh_dai_dien' => 'https://example.com/avatar16.jpg',
                'trang_thai' => 1,
            ],
            [
                'ho_va_ten' => 'Đặng Văn Phúc',
                'can_cuoc' => '017203456789', // Hải Phòng, Nam
                'ma_giang_vien' => 'GV017',
                'email' => 'dangvanphuc@example.com',
                'password' => Hash::make('password123'),
                'so_dien_thoai' => '0977777777',
                'thong_tin_chung' => 'Khoa Luật',
                'anh_dai_dien' => 'https://example.com/avatar17.jpg',
                'trang_thai' => 1,
            ],
            [
                'ho_va_ten' => 'Phan Thị Quỳnh',
                'can_cuoc' => '018302345678', // Hưng Yên, Nữ
                'ma_giang_vien' => 'GV018',
                'email' => 'phanthiquynh@example.com',
                'password' => Hash::make('password123'),
                'so_dien_thoai' => '0988888888',
                'thong_tin_chung' => 'Khoa Báo chí',
                'anh_dai_dien' => 'https://example.com/avatar18.jpg',
                'trang_thai' => 1,
            ],
            [
                'ho_va_ten' => 'Nguyễn Thị Thanh',
                'can_cuoc' => '019302345678', // Thái Bình, Nữ
                'ma_giang_vien' => 'GV019',
                'email' => 'nguyenthithanh@example.com',
                'password' => Hash::make('password123'),
                'so_dien_thoai' => '0999999999',
                'thong_tin_chung' => 'Khoa Công nghệ sinh học',
                'anh_dai_dien' => 'https://example.com/avatar19.jpg',
                'trang_thai' => 1,
            ],
            [
                'ho_va_ten' => 'Trần Văn Tùng',
                'can_cuoc' => '020203456789', // Nam Định, Nam
                'ma_giang_vien' => 'GV020',
                'email' => 'tranvantung@example.com',
                'password' => Hash::make('password123'),
                'so_dien_thoai' => '0900000000',
                'thong_tin_chung' => 'Khoa Kỹ thuật điện',
                'anh_dai_dien' => 'https://example.com/avatar20.jpg',
                'trang_thai' => 1,
            ],
        ]);
    }
}
