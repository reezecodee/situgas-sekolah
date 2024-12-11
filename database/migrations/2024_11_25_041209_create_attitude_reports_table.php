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
        Schema::create('attitude_reports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('siswa_id')->constrained('students');
            $table->foreignUuid('tahun_ajaran_id')->constrained('school_years');
            $table->enum('predikat_spiritual', ['SANGAT BAIK', 'BAIK', 'CUKUP', 'BURUK']);
            $table->text('deskripsi_spiritual');
            $table->enum('predikat_sosial', ['SANGAT BAIK', 'BAIK', 'CUKUP', 'BURUK']);
            $table->text('deskripsi_sosial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attitude_reports');
    }
};
