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
        // Schema::create('majors', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->string('nama');
        //     $table->string('kode');
        //     $table->string('deskripsi')->nullable();
        //     $table->enum('status', ['Aktif', 'Tidak aktif']);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};
