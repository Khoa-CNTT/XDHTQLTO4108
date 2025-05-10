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
        Schema::create('giang_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('ma_giang_vien')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('so_dien_thoai');
            $table->longText('thong_tin_chung')->nullable();
            $table->longText('anh_dai_dien')->nullable();
            $table->integer('trang_thai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giang_viens');
    }
};
