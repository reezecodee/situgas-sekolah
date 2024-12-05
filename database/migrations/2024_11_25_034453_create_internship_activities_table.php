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
        // Schema::create('internship_activities', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->foreignUuid('pkl_id')->constrained('internships');
        //     $table->foreignUuid('siswa_id')->constrained('students');
        //     $table->date('tanggal');
        //     $table->string('kegiatan');
        //     $table->enum('status_kehadiran', ['Hadir', 'Tidak hadir']);
        //     $table->text('keterangan')->nullable();
        //     $table->string('bukti');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_activities');
    }
};
