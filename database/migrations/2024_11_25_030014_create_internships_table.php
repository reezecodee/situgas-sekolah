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
        // Schema::create('internships', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->foreignUuid('ketua_id')->constrained('students');
        //     $table->foreignUuid('subkelas_id')->constrained('subclasses');
        //     $table->foreignUuid('tahun_ajar_id')->constrained('school_years');
        //     $table->foreignUuid('guru_pembimbing_id')->constrained('teachers');
        //     $table->string('tempat_pkl');
        //     $table->string('alamat_pkl');
        //     $table->date('tgl_mulai');
        //     $table->date('tgl_selesai');
        //     $table->string('pembimbing_industri');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
