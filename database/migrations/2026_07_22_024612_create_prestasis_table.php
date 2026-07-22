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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prestasi');
            $table->string('tingkat'); // Contoh: Sekolah, Kabupaten, Provinsi, Nasional
            $table->string('kategori'); // Contoh: Akademik, Olahraga, Seni
            $table->year('tahun');
            $table->string('penerima'); // Nama siswa atau tim
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
