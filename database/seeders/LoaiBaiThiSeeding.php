<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiBaiThiSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loai_bai_this')->delete();
        DB::table('loai_bai_this')->truncate();
        DB::table('loai_bai_this')->insert([
            ['ten_loai_bai_thi' => 'Bài kiểm tra thường kỳ', 'trang_thai' => 1],
            ['ten_loai_bai_thi' => 'Bài kiểm tra giữa kỳ', 'trang_thai' => 1],
            ['ten_loai_bai_thi' => 'Bài kiểm tra cuối kỳ', 'trang_thai' => 1],
            ['ten_loai_bai_thi' => 'Bài tập về nhà', 'trang_thai' => 1],
            ['ten_loai_bai_thi' => 'Bài tập thực hành', 'trang_thai' => 1],
        ]);
    }
}
