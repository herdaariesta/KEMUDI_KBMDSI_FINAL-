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
        Schema::create('program_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->string('nama');
            $table->string('divisi');
            $table->string('pic');
            $table->unsignedBigInteger('pagu_anggaran')->default(0);
            $table->string('jadwal')->nullable();
            $table->string('tempat')->nullable();
            $table->unsignedTinyInteger('progres_persen')->default(0);
            $table->string('progres_deskripsi')->nullable();
            $table->string('status_lpj')->default('Belum Terbit');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kerjas');
    }
};
