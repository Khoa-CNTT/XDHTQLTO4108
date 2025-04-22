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
        Schema::table('sinh_viens', function (Blueprint $table) {
            $table->unsignedBigInteger('khoa_id')->nullable();

            // Nếu bạn có ràng buộc khóa ngoại:
            $table->foreign('khoa_id')->references('id')->on('khoas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sinh_viens', function (Blueprint $table) {
            $table->dropForeign(['khoa_id']);
            $table->dropColumn('khoa_id');
        });
    }
};
