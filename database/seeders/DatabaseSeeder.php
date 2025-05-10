<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $this->call([
            AdminSeeder::class,
            SinhVienSeeder::class,
            GiangVienSeeder::class,
            MonHocSeeder::class,
            LopHocSeeder::class,
            CauHoiSeeder::class,
            LoaiBaiThiSeeder::class,
            BaiThiSeeder::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
