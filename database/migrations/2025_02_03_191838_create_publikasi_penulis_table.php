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
        Schema::create('publikasi_penulis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_publikasi');
            $table->unsignedBigInteger('id_dosen');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_publikasi')->references('id')->on('publikasi')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id')->on('dosen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasi_penulis');
    }
};
