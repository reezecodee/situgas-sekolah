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
        Schema::create('study_results', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tahun_ajaran_id')->constrained('school_years');
            $table->foreignUuid('siswa_id')->constrained('students');
            $table->foreignUuid('mapel_id')->constrained('subjects');
            $table->foreignUuid('guru_id')->constrained('teachers');
            $table->string('nilai_pengetahuan');
            $table->string('nilai_keterampilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_results');
    }
};
