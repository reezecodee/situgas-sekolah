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
        Schema::create('subclasses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tahun_ajaran_id')->constrained('school_years');
            $table->foreignUuid('kelas_id')->constrained('classrooms');
            $table->string('nama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subclasses');
    }
};
