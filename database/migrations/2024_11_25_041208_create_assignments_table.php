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
            $table->foreignUuid('guru_id')->constrained('teachers');
            $table->foreignUuid('mapel_id')->constrained('subjects');
            $table->foreignUuid('subkelas_id')->constrained('subclasses');
            $table->string('judul_tugas');
            $table->string('deskripsi');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->enum('status', ['Dibuka', 'Sudah mencapai batas waktu']);
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
