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
        Schema::create('cau_hois', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mon_hoc');
            $table->string('ten_cau_hoi');
            $table->integer('loai_cau_hoi')->comment('1: Trắc nghiệm, 2: Tự luận, 3: Trả lời ngắn');
            $table->integer('so_luong_dap_an');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cau_hois');
    }
};
