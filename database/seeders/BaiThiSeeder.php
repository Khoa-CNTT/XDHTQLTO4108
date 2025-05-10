<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaiThiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bai_this')->delete();
        DB::table('bai_this')->truncate();

        $data = [
            [
                'ten_bai_thi'        => 'Kiểm tra giữa kỳ Cơ Sở Dữ Liệu',
                'id_loai_bai_thi'    => 1, // Giữa kỳ
                'thoi_gian_bat_dau'  => Carbon::now()->addDays(1)->setHour(8)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(1)->setHour(9)->setMinute(30),
                'trang_thai'         => 1,
                'id_giang_vien'      => 1,
                'id_mon_hoc'         => 1, // CSDL
                'id_lop_hoc'         => 1,
                'mat_khau'           => '123456'
            ],
            [
                'ten_bai_thi'        => 'Thi cuối kỳ Cơ Sở Dữ Liệu',
                'id_loai_bai_thi'    => 2, // Cuối kỳ
                'thoi_gian_bat_dau'  => Carbon::now()->addDays(15)->setHour(13)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(15)->setHour(14)->setMinute(30),
                'trang_thai'         => 1,
                'id_giang_vien'      => 1,
                'id_mon_hoc'         => 1,
                'id_lop_hoc'         => 1,
                'mat_khau'           => '123456'
            ],
            [
                'ten_bai_thi'        => 'Kiểm tra 15 phút CSDL - Chương 1',
                'id_loai_bai_thi'    => 3, // Kiểm tra
                'thoi_gian_bat_dau'  => Carbon::now()->subDays(5)->setHour(7)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->subDays(5)->setHour(7)->setMinute(15),
                'trang_thai'         => 0,
                'id_giang_vien'      => 1,
                'id_mon_hoc'         => 1,
                'id_lop_hoc'         => 1,
                'mat_khau'           => null
            ],
            [
                'ten_bai_thi'        => 'Kiểm tra giữa kỳ Lập Trình Hướng Đối Tượng',
                'id_loai_bai_thi'    => 1,
                'thoi_gian_bat_dau'  => Carbon::now()->addDays(2)->setHour(9)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(2)->setHour(10)->setMinute(30),
                'trang_thai'         => 1,
                'id_giang_vien'      => 2,
                'id_mon_hoc'         => 2, // OOP
                'id_lop_hoc'         => 2,
                'mat_khau'           => '123456'
            ],
            [
                'ten_bai_thi'        => 'Thi cuối kỳ Lập Trình Hướng Đối Tượng',
                'id_loai_bai_thi'    => 2,
                'thoi_gian_bat_dau'  => Carbon::now()->addDays(20)->setHour(13)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(20)->setHour(14)->setMinute(30),
                'trang_thai'         => 1,
                'id_giang_vien'      => 2,
                'id_mon_hoc'         => 2,
                'id_lop_hoc'         => 2,
                'mat_khau'           => '123456'
            ],
            [
                'ten_bai_thi'        => 'Kiểm tra 15 phút OOP - Chương 2',
                'id_loai_bai_thi'    => 3,
                'thoi_gian_bat_dau'  => Carbon::now()->subDays(3)->setHour(9)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->subDays(3)->setHour(9)->setMinute(15),
                'trang_thai'         => 0,
                'id_giang_vien'      => 2,
                'id_mon_hoc'         => 2,
                'id_lop_hoc'         => 2,
                'mat_khau'           => null
            ],
            [
                'ten_bai_thi'        => 'Kiểm tra giữa kỳ Cấu Trúc Dữ Liệu & Giải Thuật',
                'id_loai_bai_thi'    => 1,
                'thoi_gian_bat_dau'  => Carbon::now()->addDays(3)->setHour(7)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(3)->setHour(8)->setMinute(30),
                'trang_thai'         => 1,
                'id_giang_vien'      => 3,
                'id_mon_hoc'         => 3, // CTDL
                'id_lop_hoc'         => 3,
                'mat_khau'           => '123456'
            ],
            [
                'ten_bai_thi'        => 'Thi cuối kỳ Cấu Trúc Dữ Liệu & Giải Thuật',
                'id_loai_bai_thi'    => 2,
                'thoi_gian_bat_dau'  => Carbon::now()->addDays(25)->setHour(13)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(25)->setHour(14)->setMinute(30),
                'trang_thai'         => 1,
                'id_giang_vien'      => 3,
                'id_mon_hoc'         => 3,
                'id_lop_hoc'         => 3,
                'mat_khau'           => '123456'
            ],
            [
                'ten_bai_thi'        => 'Kiểm tra 15 phút CTDL - Chương 3',
                'id_loai_bai_thi'    => 3,
                'thoi_gian_bat_dau'  => Carbon::now()->subDays(1)->setHour(7)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->subDays(1)->setHour(7)->setMinute(15),
                'trang_thai'         => 0,
                'id_giang_vien'      => 3,
                'id_mon_hoc'         => 3,
                'id_lop_hoc'         => 3,
                'mat_khau'           => null
            ],
            [
                'ten_bai_thi'        => 'Kiểm tra giữa kỳ Anh Ngữ Cao Cấp 2',
                'id_loai_bai_thi'    => 1,
                'thoi_gian_bat_dau'  => Carbon::now()->addDays(4)->setHour(9)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(4)->setHour(10)->setMinute(30),
                'trang_thai'         => 1,
                'id_giang_vien'      => 4,
                'id_mon_hoc'         => 4, // English
                'id_lop_hoc'         => 4,
                'mat_khau'           => '123456'
            ],
            [
                'ten_bai_thi'        => 'Thi cuối kỳ Anh Ngữ Cao Cấp 2',
                'id_loai_bai_thi'    => 2,
                'thoi_gian_bat_dau'  => Carbon::now()->addDays(30)->setHour(13)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(30)->setHour(14)->setMinute(30),
                'trang_thai'         => 1,
                'id_giang_vien'      => 4,
                'id_mon_hoc'         => 4,
                'id_lop_hoc'         => 4,
                'mat_khau'           => '123456'
            ],
            [
                'ten_bai_thi'        => 'Kiểm tra Speaking',
                'id_loai_bai_thi'    => 3,
                'thoi_gian_bat_dau'  => Carbon::now()->addHours(2)->setMinute(0),
                'thoi_gian_ket_thuc' => Carbon::now()->addHours(2)->setMinute(30),
                'trang_thai'         => 1,
                'id_giang_vien'      => 4,
                'id_mon_hoc'         => 4,
                'id_lop_hoc'         => 4,
                'mat_khau'           => null
            ],
        ];

        foreach($data as $item) {
            DB::table('bai_this')->insert($item);
        }
    }
}
