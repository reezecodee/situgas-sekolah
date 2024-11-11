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
            $table->foreignUuid('class_id')->constrained('classrooms');
            $table->foreignUuid('subject_id')->constrained('subjects');
            $table->foreignUuid('teacher_id')->constrained('teachers');
            $table->date('tanggal');
            $table->enum('status_kehadiran', ['Hadir', 'Tidak hadir']);
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
