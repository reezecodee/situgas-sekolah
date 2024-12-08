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
        Schema::create('teaching_schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tahun_ajaran_id')->constrained('school_years');
            $table->foreignUuid('pengampu_id')->constrained('subject_teachers');
            $table->foreignUuid('guru_id')->constrained('teachers');
            $table->foreignUuid('kelas_id')->constrained('classrooms');
            $table->string('hari');
            $table->string('jam_masuk');
            $table->string('jam_keluar');
            $table->string('jam_istirahat_masuk')->nullable();
            $table->string('jam_istirahat_keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_schedules');
    }
};
