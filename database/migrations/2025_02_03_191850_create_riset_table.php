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
        Schema::create('riset', function (Blueprint $table) {
            $table->id();
            $table->string('judul_riset', 255);
            $table->unsignedBigInteger('id_lab')->nullable();
            $table->unsignedBigInteger('id_dosen');
            $table->integer('tahun')->nullable();
            $table->timestamps();

            $table->foreign('id_lab')->references('id')->on('laboratorium')->onDelete('set null');
            $table->foreign('id_dosen')->references('id')->on('dosen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riset');
    }
};
