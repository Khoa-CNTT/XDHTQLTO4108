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
        // Schema::create('cau_tra_loi_sinh_viens', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('id_cau_hoi');
        //     $table->integer('id_sinh_vien');
        //     $table->integer('id_bai_thi');
        //     $table->integer('id_dap_an');
        //     $table->timestamps();
        // });

        Schema::create('cau_tra_loi_sinh_viens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cau_hoi')->constrained('cau_hois');
            $table->foreignId('id_sinh_vien')->constrained('sinh_viens');
            $table->foreignId('id_bai_thi')->constrained('bai_this');
            $table->integer('id_dap_an')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cau_tra_loi_sinh_viens');
    }
};
