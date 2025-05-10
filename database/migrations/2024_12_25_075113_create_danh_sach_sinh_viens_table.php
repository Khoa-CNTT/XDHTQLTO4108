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
        Schema::create('danh_sach_sinh_viens', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sinh_vien');
            $table->integer('id_bai_thi');
            $table->double('diem_trac_nghiem')->nullable();
            $table->double('diem_tu_luan')->nullable();
            $table->double('diem_cau_hoi_ngan')->nullable();
            $table->text('link_tu_luan')->nullable();
            $table->integer('trang_thai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_sach_sinh_viens');
    }
};
