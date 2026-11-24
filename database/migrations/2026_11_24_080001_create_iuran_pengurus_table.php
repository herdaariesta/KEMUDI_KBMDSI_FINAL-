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
        Schema::create('iuran_pengurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota');
            $table->string('divisi');
            $table->string('periode')->default('Mei 2026');
            $table->decimal('nominal', 15, 2)->default(60000);
            $table->enum('status', ['lunas', 'belum'])->default('belum');
            $table->date('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran_pengurus');
    }
};
