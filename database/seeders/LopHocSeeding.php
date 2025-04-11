<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LopHocSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lop_hocs')->delete();
        DB::table('lop_hocs')->truncate();
        DB::table('lop_hocs')->insert([
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'ENG_301_1_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 12,
                'id_mon_hoc' => 1,
            ],
            [
                'ten_lop' => 'L02',
                'ma_lop' => 'ENG_301_2_L02',
                'trang_thai' => 1,
                'id_giang_vien' => 12,
                'id_mon_hoc' => 1,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'ENG_302_3_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 12,
                'id_mon_hoc' => 2,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'ENG_101_4_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 12,
                'id_mon_hoc' => 3,
            ],
            [
                'ten_lop' => 'N01',
                'ma_lop' => 'EE_304_5_N01',
                'trang_thai' => 1,
                'id_giang_vien' => 4,
                'id_mon_hoc' => 4,
            ],
            [
                'ten_lop' => 'N02',
                'ma_lop' => 'EE_304_6_N02',
                'trang_thai' => 1,
                'id_giang_vien' => 4,
                'id_mon_hoc' => 4,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'CS_201_7_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 1,
                'id_mon_hoc' => 5,
            ],
            [
                'ten_lop' => 'L02',
                'ma_lop' => 'CS_201_8_L02',
                'trang_thai' => 1,
                'id_giang_vien' => 1,
                'id_mon_hoc' => 5,
            ],
            [
                'ten_lop' => 'L03',
                'ma_lop' => 'CS_201_9_L03',
                'trang_thai' => 1,
                'id_giang_vien' => 13,
                'id_mon_hoc' => 5,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'CS_202_10_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 1,
                'id_mon_hoc' => 6,
            ],
            [
                'ten_lop' => 'L02',
                'ma_lop' => 'CS_202_11_L02',
                'trang_thai' => 1,
                'id_giang_vien' => 13,
                'id_mon_hoc' => 6,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'CS_203_12_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 1,
                'id_mon_hoc' => 7,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'IS_216_13_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 7,
                'id_mon_hoc' => 8,
            ],
            [
                'ten_lop' => 'L02',
                'ma_lop' => 'IS_216_14_L02',
                'trang_thai' => 1,
                'id_giang_vien' => 7,
                'id_mon_hoc' => 8,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'CS_343_15_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 13,
                'id_mon_hoc' => 9,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'NW_301_16_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 16,
                'id_mon_hoc' => 10,
            ],
            [
                'ten_lop' => 'L02',
                'ma_lop' => 'NW_301_17_L02',
                'trang_thai' => 1,
                'id_giang_vien' => 16,
                'id_mon_hoc' => 10,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'IS_207_18_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 7,
                'id_mon_hoc' => 11,
            ],
            [
                'ten_lop' => 'L02',
                'ma_lop' => 'IS_207_19_L02',
                'trang_thai' => 1,
                'id_giang_vien' => 7,
                'id_mon_hoc' => 11,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'IS_208_20_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 7,
                'id_mon_hoc' => 12,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'IS_217_21_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 7,
                'id_mon_hoc' => 13,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'CS_414_22_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 1,
                'id_mon_hoc' => 14,
            ],
            [
                'ten_lop' => 'L02',
                'ma_lop' => 'CS_414_23_L02',
                'trang_thai' => 1,
                'id_giang_vien' => 1,
                'id_mon_hoc' => 14,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'CS_415_24_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 1,
                'id_mon_hoc' => 15,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'NW_302_25_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 16,
                'id_mon_hoc' => 16,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'IS_384_26_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 7,
                'id_mon_hoc' => 17,
            ],
            [
                'ten_lop' => 'L02',
                'ma_lop' => 'IS_384_27_L02',
                'trang_thai' => 1,
                'id_giang_vien' => 7,
                'id_mon_hoc' => 17,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'IS_385_28_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 7,
                'id_mon_hoc' => 18,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'CS_221_29_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 13,
                'id_mon_hoc' => 19,
            ],
            [
                'ten_lop' => 'L01',
                'ma_lop' => 'MA_201_30_L01',
                'trang_thai' => 1,
                'id_giang_vien' => 2,
                'id_mon_hoc' => 20,
            ],
        ]);
    }
}
