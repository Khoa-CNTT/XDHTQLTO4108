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
            $table->integer('id_mon_hoc'); // Khóa ngoại cho môn học
            $table->string('ten_cau_hoi'); // Tên câu hỏi
            $table->string('dap_an_dung'); // Đáp án đúng
            $table->string('dap_an_a'); // Đáp án A
            $table->string('dap_an_b'); // Đáp án B
            $table->string('dap_an_c'); // Đáp án C
            $table->string('dap_an_d'); // Đáp án D
            $table->text('noi_dung_tra_loi')->nullable(); // Nội dung trả lời cho tự luận hoặc câu hỏi lời ngắn
            $table->integer('loai_cau_hoi'); // Loại câu hỏi
            $table->text('chuan_dau_ra')->nullable(); // Chuẩn đầu ra
            $table->timestamps();

            // Khóa ngoại

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
