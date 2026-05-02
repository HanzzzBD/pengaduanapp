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
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id('id_aspirasi');
            $table->string('username');
            $table->unsignedBigInteger('id_pelapor');
            $table->unsignedBigInteger('id_kategori');
            $table->string('status');
            $table->text('feedback')->nullable();
            $table->timestamps();

            $table->foreign('username')->references('username')->on('admins')->onDelete('cascade');
            $table->foreign('id_pelapor')->references('id_pelapor')->on('input_aspirasis')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kat')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
