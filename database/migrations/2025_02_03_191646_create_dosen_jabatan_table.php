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
        Schema::create('dosen_jabatan', function (Blueprint $table) {
            $table->id(); // int(11) AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('id_dosen'); // Foreign Key ke tabel dosen
            $table->unsignedBigInteger('id_lab')->nullable(); // Foreign Key ke tabel dosen
            $table->unsignedBigInteger('id_jabatan')->nullable(); // Foreign Key ke tabel jabatan, opsional
            $table->integer('dari_tahun')->nullable(); // Tahun mulai menjabat, opsional
            $table->integer('sampai_tahun')->nullable(); // Tahun selesai menjabat, opsional
            $table->timestamp('created_at')->useCurrent(); // Default CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Auto update saat update data

            // Definisi Foreign Key
            $table->foreign('id_dosen')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('id_lab')->references('id')->on('laboratorium')->onDelete('set null');
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_jabatan');
    }
};
