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
        Schema::create('subject_teachers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('guru_id')->constrained('teachers');
            $table->foreignUuid('mapel_id')->constrained('subjects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_teachers');
    }
};