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
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('kelas_id')->constrained('classrooms')->cascadeOnDelete();
            $table->string('nama');
            $table->string('nisn');
            $table->string('tgl_lahir');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->enum('status', ['Lulus', 'Belum lulus'])->index();
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
