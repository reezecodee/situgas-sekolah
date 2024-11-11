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
        Schema::create('reports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('periode_id')->constrained('periode_academics');
            $table->foreignUuid('student_id')->constrained('students');
            $table->string('nilai_pengetahuan');
            $table->string('rata_rata_pengetahuan');
            $table->string('predikat_pengetahuan');
            $table->string('nilai_keterampilan');
            $table->string('rata_rata_keterampilan');
            $table->string('predikat_keterampilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
