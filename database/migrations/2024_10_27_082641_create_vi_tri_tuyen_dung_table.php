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
        Schema::create('vi_tri_tuyen_dung', function (Blueprint $table) {
            $table->id();
            $table->string('tenvitri');
            $table->text('mota')->nullable();
            $table->text('yeucau')->nullable();
            $table->unsignedBigInteger('dot_id');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vi_tri_tuyen_dung');
    }
};
