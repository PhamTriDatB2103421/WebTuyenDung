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
        Schema::create('nguoi_ung_tuyen', function (Blueprint $table) {
            $table->id();
            $table->string('hoten');
            $table->date('ngaysinh');
            $table->string('gioitinh');
            $table->string('diachi');
            $table->string('email')->unique();
            $table->string('sodienthoai');
            $table->unsignedBigInteger('user_id')->nullable(); // Không có khoá ngoại
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_ung_tuyen');
    }
};
