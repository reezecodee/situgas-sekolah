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
            $table->foreignUuid('guru_id')->constrained('teachers');
            $table->foreignUuid('mapel_id')->constrained('subjects');
            $table->foreignUuid('subkelas_id')->constrained('subclasses');
            $table->date('tanggal');
            $table->string('pembelajaran_materi');
            $table->string('deskripsi');
            $table->enum('status_kehadiran', ['Hadir', 'Tidak hadir']);
            $table->text('keterangan')->nullable();
            $table->string('bukti');
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