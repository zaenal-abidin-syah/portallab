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
        Schema::create('fasilitas_lab', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fasilitas');
            $table->unsignedBigInteger('id_lab');
            $table->integer('jumlah');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_fasilitas')->references('id')->on('fasilitas')->onDelete('cascade');
            $table->foreign('id_lab')->references('id')->on('laboratorium')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_lab');
    }
};
