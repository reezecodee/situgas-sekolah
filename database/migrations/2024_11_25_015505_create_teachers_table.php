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
        Schema::create('teachers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->string('nama');
            $table->string('nuptk')->nullable();
            // $table->enum('jk', ['Laki-laki', 'Perempuan']);
            // $table->string('telepon');
            // $table->text('alamat');
            $table->string('tgl_lahir');
            $table->enum('status', ['Aktif', 'Tidak aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
