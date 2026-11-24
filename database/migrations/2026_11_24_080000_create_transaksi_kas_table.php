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
        Schema::create('transaksi_kas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_kerja_id')->nullable()->constrained('program_kerjas')->nullOnDelete();
            $table->date('tanggal');
            $table->string('deskripsi');
            $table->string('pihak_terkait');
            $table->enum('jenis', ['masuk', 'keluar']);
            $table->string('kategori');
            $table->decimal('nominal', 15, 2);
            $table->unsignedTinyInteger('minggu_ke')->default(1);
            $table->string('bukti_transaksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kas');
    }
};
