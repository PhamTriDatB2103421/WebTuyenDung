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
        Schema::create('don_ung_tuyen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vitri_id'); // Không có khoá ngoại
            $table->unsignedBigInteger('nguoiUt_id');   // Không có khoá ngoại
            $table->unsignedBigInteger('trangthai_id'); // Không có khoá ngoại
            $table->timestamp('ngay_nop_don');
            $table->timestamp('ngay_cap_nhat')->nullable();
            $table->text('ghichu')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_ung_tuyen');
    }
};
