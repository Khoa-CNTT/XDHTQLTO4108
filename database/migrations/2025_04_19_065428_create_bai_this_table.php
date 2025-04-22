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
            $table->string('ten_bai_thi'); // Tên bài thi
            $table->date('ngay_bat_dau'); // Ngày bắt đầu
            $table->date('ngay_ket_thuc'); // Ngày kết thúc
            $table->integer('thoi_gian_thi')->nullable();
            $table->integer('trang_thai')->default(1); // Trạng thái (1: hoạt động, 0: không hoạt động)
            $table->integer('id_mon_hoc'); // ID môn học
            $table->integer('id_lop_hoc'); // ID lớp học
            $table->integer('id_loai_bai_thi'); // ID loại bài thi
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
