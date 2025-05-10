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
        Schema::create('bai_this', function (Blueprint $table) {
            $table->id();
            $table->string('ten_bai_thi');
            $table->integer('id_loai_bai_thi');
            $table->dateTime('thoi_gian_bat_dau');
            $table->dateTime('thoi_gian_ket_thuc');
            $table->integer('trang_thai')->default(1);
            $table->integer('id_giang_vien');
            $table->integer('id_mon_hoc');
            $table->integer('id_lop_hoc')->nullable();
            $table->string('mat_khau')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bai_this');
    }
};
