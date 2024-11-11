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
        Schema::create('presence_students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('teach_pres_id')->constrained('presence_teachers');
            $table->foreignUuid('student_id')->constrained('students');
            $table->foreignUuid('subject_id')->constrained('subjects');
            $table->date('tanggal');
            $table->enum('status_kehadiran', ['Hadir', 'Sakit', 'Izin', 'Alpha']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presence_students');
    }
};
