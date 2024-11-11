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
            $table->foreignUuid('assign_id')->constrained('assignments');
            $table->foreignUuid('teacher_id')->constrained('teachers');
            $table->foreignUuid('student_id')->constrained('students');
            $table->foreignUuid('subject_id')->constrained('subjects');
            $table->string('nilai')->nullable();
            $table->string('link_jawaban');
            $table->string('komentar');
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
