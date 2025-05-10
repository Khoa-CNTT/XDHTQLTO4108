<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bai_this', function (Blueprint $table) {
            $table->double('diem_trac_nghiem', 2, 2)->default(0);
            $table->double('diem_tra_loi_ngan', 2, 2)->default(0);
            $table->double('diem_tu_luan', 2, 2)->default(0);
            $table->integer('so_cau_trac_nghiem')->default(0);
            $table->integer('so_cau_tra_loi_ngan')->default(0);
            $table->integer('so_cau_tu_luan')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bai_this', function (Blueprint $table) {
            //
        });
    }
};
