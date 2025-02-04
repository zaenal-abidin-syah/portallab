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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 18)->unique(); // NIP dengan panjang 18 karakter, unik
            $table->string('nama', 255); // Nama
            $table->string('email', 255)->unique();
            $table->enum('jenjang', ['s1', 's2', 's3'])->nullable(); // Enum jenjang
            $table->string('universitas', 255)->nullable(); // Universitas, boleh kosong
            $table->unsignedBigInteger('id_lab')->nullable(); // ID Lab, boleh kosong
            $table->string('akun_scopus', 255)->nullable(); // Akun Scopus, boleh kosong
            $table->string('akun_googleScholar', 255)->nullable(); // Akun Google Scholar, boleh kosong
            $table->string('akun_sinta', 255)->nullable(); // Akun Sinta, boleh kosong
            $table->string('foto', 255)->nullable(); // Foto dalam format BLOB, boleh kosong
            $table->timestamp('created_at')->useCurrent(); // Default pakai CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            // Foreign key ke tabel laboratorium (opsional)
            $table->foreign('id_lab')->references('id')->on('laboratorium')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
