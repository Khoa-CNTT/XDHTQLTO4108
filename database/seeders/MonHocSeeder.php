<?php

namespace Database\Seeders;

use App\Models\MonHoc;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonHocSeeder extends Seeder
{
    public function run(): void
    {
        $monHocs = [
            [
                'ten_mon_hoc' => 'Anh Ngữ Cao Cấp 1',
                'ma_mon_hoc' => 'ENG',
                'ma_so_mon_hoc' => '301',
                'trang_thai' => 1,
                'so_tin_chi' => 2,
            ],
            [
                'ten_mon_hoc' => 'Anh Ngữ Cao Cấp 2',
                'ma_mon_hoc' => 'ENG',
                'ma_so_mon_hoc' => '302',
                'trang_thai' => 1,
                'so_tin_chi' => 2,
            ],
            [
                'ten_mon_hoc' => 'Anh Ngữ Sơ Cấp 1',
                'ma_mon_hoc' => 'ENG',
                'ma_so_mon_hoc' => '101',
                'trang_thai' => 1,
                'so_tin_chi' => 2,
            ],
            [
                'ten_mon_hoc' => 'Xử Lý Tín Hiệu Số',
                'ma_mon_hoc' => 'EE',
                'ma_so_mon_hoc' => '304',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Kỹ Thuật Lập Trình',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '201',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Cấu Trúc Dữ Liệu & Giải Thuật',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '202',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Lập Trình Hướng Đối Tượng',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '203',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Cơ Sở Dữ Liệu',
                'ma_mon_hoc' => 'IS',
                'ma_so_mon_hoc' => '216',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Hệ Điều Hành',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '343',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Mạng Máy Tính',
                'ma_mon_hoc' => 'NW',
                'ma_so_mon_hoc' => '301',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Công Nghệ Web',
                'ma_mon_hoc' => 'IS',
                'ma_so_mon_hoc' => '207',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Lập Trình Web',
                'ma_mon_hoc' => 'IS',
                'ma_so_mon_hoc' => '208',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Phân Tích Thiết Kế Hệ Thống',
                'ma_mon_hoc' => 'IS',
                'ma_so_mon_hoc' => '217',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Trí Tuệ Nhân Tạo',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '414',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Xử Lý Ảnh',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '415',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'An Toàn & Bảo Mật Hệ Thống',
                'ma_mon_hoc' => 'NW',
                'ma_so_mon_hoc' => '302',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Lập Trình Di Động',
                'ma_mon_hoc' => 'IS',
                'ma_so_mon_hoc' => '384',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Điện Toán Đám Mây',
                'ma_mon_hoc' => 'IS',
                'ma_so_mon_hoc' => '385',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Kiến Trúc Máy Tính',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '221',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Toán Rời Rạc',
                'ma_mon_hoc' => 'MA',
                'ma_so_mon_hoc' => '201',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
        ];

        DB::table('mon_hocs')->truncate();

        foreach($monHocs as $monHoc) {
            MonHoc::create($monHoc);
        }
    }
}
