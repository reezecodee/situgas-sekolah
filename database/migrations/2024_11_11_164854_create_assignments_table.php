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
            $table->foreignUuid('teacher_id')->constrained('teachers');
            $table->foreignUuid('subject_id')->constrained('subjects');
            $table->foreignUuid('class_id')->constrained('classrooms');
            $table->string('judul');
            $table->text('deskripsi');
            $table->enum('status', ['Dibuka', 'Ditutup']);
            $table->date('deadline');
            $table->string('file_soal');
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
