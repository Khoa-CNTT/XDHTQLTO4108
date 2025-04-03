<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonHocSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mon_hocs')->delete();
        DB::table('mon_hocs')->truncate();
        DB::table('mon_hocs')->insert([
            [
                'ten_mon_hoc' => 'Hệ Phân Tán (J2EE, .NET)',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '420',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Công Nghệ Phần Mềm',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '403',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Writing - Level 3',
                'ma_mon_hoc' => 'ENG',
                'ma_so_mon_hoc' => '217',
                'trang_thai' => 1,
                'so_tin_chi' => 1,
            ],
            [
                'ten_mon_hoc' => 'Listening - Level 3',
                'ma_mon_hoc' => 'ENG',
                'ma_so_mon_hoc' => '218',
                'trang_thai' => 1,
                'so_tin_chi' => 1,
            ],
            [
                'ten_mon_hoc' => 'Kinh Tế Chính Trị Marx - Lenin',
                'ma_mon_hoc' => 'POS',
                'ma_so_mon_hoc' => '151',
                'trang_thai' => 1,
                'so_tin_chi' => 2,
            ],
            [
                'ten_mon_hoc' => 'Lịch Sử Đảng Cộng Sản Việt Nam',
                'ma_mon_hoc' => 'HIS',
                'ma_so_mon_hoc' => '362',
                'trang_thai' => 1,
                'so_tin_chi' => 2,
            ],
            [
                'ten_mon_hoc' => 'Đồ Án CDIO',
                'ma_mon_hoc' => 'SE',
                'ma_so_mon_hoc' => '447',
                'trang_thai' => 1,
                'so_tin_chi' => 1,
            ],
            [
                'ten_mon_hoc' => 'Lập Trình Ứng Dụng .NET',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '464',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Phương Pháp Luận (gồm Nghiên Cứu Khoa Học)',
                'ma_mon_hoc' => 'PHI',
                'ma_so_mon_hoc' => '100',
                'trang_thai' => 1,
                'so_tin_chi' => 2,
            ],
            [
                'ten_mon_hoc' => 'Toán Cao Cấp A1',
                'ma_mon_hoc' => 'MTH',
                'ma_so_mon_hoc' => '103',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Lịch Sử Văn Minh Thế Giới 1',
                'ma_mon_hoc' => 'HIS',
                'ma_so_mon_hoc' => '221',
                'trang_thai' => 1,
                'so_tin_chi' => 2,
            ],
            [
                'ten_mon_hoc' => 'Hướng Nghiệp 1',
                'ma_mon_hoc' => 'DTE-IT',
                'ma_so_mon_hoc' => '102',
                'trang_thai' => 1,
                'so_tin_chi' => 1,
            ],
            [
                'ten_mon_hoc' => 'Triết Học Marx - Lenin',
                'ma_mon_hoc' => 'PHI',
                'ma_so_mon_hoc' => '150',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Nói & Trình Bày (tiếng Việt)',
                'ma_mon_hoc' => 'COM',
                'ma_so_mon_hoc' => '141',
                'trang_thai' => 1,
                'so_tin_chi' => 1,
            ],
            [
                'ten_mon_hoc' => 'Tin Học Ứng Dụng',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '201',
                'trang_thai' => 1,
                'so_tin_chi' => 3,
            ],
            [
                'ten_mon_hoc' => 'Toán Cao Cấp A2',
                'ma_mon_hoc' => 'MTH',
                'ma_so_mon_hoc' => '104',
                'trang_thai' => 1,
                'so_tin_chi' => 4,
            ],
            [
                'ten_mon_hoc' => 'Sức Khỏe Môi Trường',
                'ma_mon_hoc' => 'EVR',
                'ma_so_mon_hoc' => '205',
                'trang_thai' => 1,
                'so_tin_chi' => 2,
            ],
            [
                'ten_mon_hoc' => 'Giới Thiệu Về Khoa Học Máy Tính',
                'ma_mon_hoc' => 'COS',
                'ma_so_mon_hoc' => '100',
                'trang_thai' => 1,
                'so_tin_chi' => 1,
            ],
            [
                'ten_mon_hoc' => 'Lập Trình Cơ Sở',
                'ma_mon_hoc' => 'CS',
                'ma_so_mon_hoc' => '211',
                'trang_thai' => 1,
                'so_tin_chi' => 4,
            ],
            [
                'ten_mon_hoc' => 'Hướng Nghiệp 2',
                'ma_mon_hoc' => 'DTE-IT',
                'ma_so_mon_hoc' => '152',
                'trang_thai' => 1,
                'so_tin_chi' => 1,
            ],
        ]);
    }
}
