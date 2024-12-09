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
        Schema::create('presence_teachers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tahun_ajaran_id')->constrained('school_years');
            $table->foreignUuid('jadwal_mengajar_id')->constrained('teaching_schedules');
            $table->foreignUuid('guru_id')->constrained('teachers');
            // $table->foreignUuid('mapel_id')->constrained('subjects');
            $table->foreignUuid('kelas_id')->constrained('classrooms');
            // $table->foreignUuid('subkelas_id')->constrained('subclasses');
            $table->date('tanggal');
            $table->string('pembelajaran_materi')->nullable();
            $table->string('deskripsi')->nullable();
            $table->enum('status_kehadiran', ['Hadir', 'Tidak hadir']);
            $table->string('bukti')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presence_teachers');
    }
};
