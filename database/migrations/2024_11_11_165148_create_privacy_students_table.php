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
        Schema::create('privacy_students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_lengkap');
            $table->string('nis');
            $table->string('nisn');
            $table->string('ttl');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('status_anak', ['Kandung', 'Angkat']);
            $table->integer('anak-ke');
            $table->string('alamat_siswa');
            $table->string('telepon_rumah');
            $table->string('sekolah_asal');
            $table->string('di_kelas');
            $table->string('pada_tanggal');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('alamat_ortu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('nama_wali');
            $table->string('pekerjaan_wali');
            $table->string('alamat_wali');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacy_students');
    }
};
