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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('subkelas_id')->constrained('subclasses');
            $table->foreignUuid('tahun_ajaran_id')->constrained('school_years');
            $table->string('nama');
            $table->string('nis');
            $table->string('nisn');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->enum('status', ['Lulus', 'Belum lulus']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};