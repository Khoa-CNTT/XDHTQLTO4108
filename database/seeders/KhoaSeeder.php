<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tắt kiểm tra ràng buộc khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Xoá dữ liệu cũ
        DB::table('khoas')->truncate();

        // Bật lại kiểm tra ràng buộc
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Thêm dữ liệu mới
        DB::table('khoas')->insert([
            [
                'ten_khoa' => 'Công Nghệ Thông Tin',
                'ma_khoa' => 'CNTT',
                'trang_thai' => 1,
                'ghi_chu' => 'Chuyên ngành phần mềm và mạng',
            ],
            [
                'ten_khoa' => 'Du Lịch',
                'ma_khoa' => 'DL',
                'trang_thai' => 1,
                'ghi_chu' => 'Chuyên ngành hướng dẫn viên du lịch',
            ],
            [
                'ten_khoa' => 'Kinh Tế',
                'ma_khoa' => 'KT',
                'trang_thai' => 1,
                'ghi_chu' => 'Chuyên ngành quản trị kinh doanh, tài chính',
            ],
            [
                'ten_khoa' => 'Ngoại Ngữ',
                'ma_khoa' => 'NN',
                'trang_thai' => 1,
                'ghi_chu' => 'Chuyên ngành tiếng Anh, tiếng Nhật',
            ],
            [
                'ten_khoa' => 'Điện - Điện Tử',
                'ma_khoa' => 'DĐT',
                'trang_thai' => 1,
                'ghi_chu' => 'Công nghệ kỹ thuật điện và tự động hóa',
            ],
        ]);
    }
}
