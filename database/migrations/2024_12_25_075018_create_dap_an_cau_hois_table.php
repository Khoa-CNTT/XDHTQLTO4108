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
        Schema::create('dap_an_cau_hois', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cau_hoi')->foreignId('cau_hois')->constrained('cau_hois');
            $table->string('ten_dap_an');
            $table->longText('noi_dung');
            $table->integer('is_dap_an_dung')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dap_an_cau_hois');
    }
};
