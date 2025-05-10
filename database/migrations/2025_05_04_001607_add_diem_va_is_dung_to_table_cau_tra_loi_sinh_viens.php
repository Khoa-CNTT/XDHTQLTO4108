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
        Schema::table('cau_tra_loi_sinh_viens', function (Blueprint $table) {
            $table->text("tra_loi_bang_chu")->nullable()->after('id_dap_an');
            $table->double("diem", 2, 2)->default(0)->after('tra_loi_bang_chu');
            $table->integer("is_dung")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cau_tra_loi_sinh_viens', function (Blueprint $table) {
            //
        });
    }
};
