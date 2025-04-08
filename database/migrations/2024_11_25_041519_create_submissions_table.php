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
        Schema::create('submissions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('siswa_id')->constrained('students')->cascadeOnDelete();
            $table->foreignUuid('penugasan_id')->constrained('assignments')->cascadeOnDelete();
            $table->string('file_pengerjaan');
            $table->date('tanggal');
            $table->string('nilai')->nullable();
            $table->string('komentar_guru')->nullable();
            $table->enum('status', ['Dikerjakan', 'Belum dikerjakan', 'Telat mengumpulkan', 'Tidak dikerjakan'])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
