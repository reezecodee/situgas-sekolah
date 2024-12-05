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
        // Schema::create('recaps', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->foreignUuid('siswa_id')->constrained('students');
        //     $table->foreignUuid('subkelas_id')->constrained('subclasses');
        //     $table->foreignUuid('guru_id')->constrained('teachers');
        //     $table->foreignUuid('mapel_id')->constrained('subjects');
        //     $table->foreignUuid('tahun_ajar_id')->constrained('school_years');
        //     $table->string('nilai_pengetahuan');
        //     $table->string('predikat_pengetahuan');
        //     $table->string('nilai_keterampilan');
        //     $table->string('predikat_keterampilan');
        //     $table->date('tgl_pengiriman');
        //     $table->enum('status', ['Belum dicetak', 'Sudah dicetak']);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recaps');
    }
};
