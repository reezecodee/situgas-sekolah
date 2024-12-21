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
            $table->foreignUuid('wali_kelas_id')->nullable()->constrained('teachers');
            $table->string('nama');
            $table->enum('tingkat', ['VII', 'VIII', 'IX'])->index();
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
