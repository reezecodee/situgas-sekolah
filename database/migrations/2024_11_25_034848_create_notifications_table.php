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
        // Schema::create('notifications', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->foreignUuid('pengirim_id')->constrained('users');
        //     $table->foreignUuid('penerima_id')->nullable()->constrained('users');
        //     $table->string('judul');
        //     $table->text('pesan');
        //     $table->date('tanggal');
        //     $table->enum('status', ['Belum dilihat', 'Sudah dilihat']);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
