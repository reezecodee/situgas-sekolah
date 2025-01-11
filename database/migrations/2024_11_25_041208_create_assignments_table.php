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
        Schema::create('assignments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tahun_ajaran_id')->constrained('school_years');
            $table->foreignUuid('pengampu_id')->constrained('subject_teachers');
            $table->foreignUuid('guru_id')->constrained('teachers');
            $table->foreignUuid('jadwal_mengajar_id')->constrained('teaching_schedules');
            $table->foreignUuid('kelas_id')->constrained('classrooms');
            $table->string('judul_tugas');
            $table->string('deskripsi');
            $table->string('file_soal');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
