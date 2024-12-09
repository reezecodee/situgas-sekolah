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
        Schema::create('presence_students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('absen_guru_id')->constrained('presence_teachers');
            $table->foreignUuid('mapel_id')->constrained('subjects');
            $table->foreignUuid('siswa_id')->constrained('students');
            $table->enum('status_kehadiran', ['Hadir', 'Izin', 'Alpha', 'Sakit']);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presence_students');
    }
};
