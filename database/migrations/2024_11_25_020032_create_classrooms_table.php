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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('prodi_id')->constrained('majors');
            $table->foreignUuid('wali_kelas_id')->constrained('teachers');
            $table->foreignUuid('tahun_ajaran_id')->constrained('school_years');
            $table->string('nama');
            $table->enum('tingkat', ['X', 'XI', 'XII']);
            $table->enum('status', ['Aktif', 'Tidak aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
