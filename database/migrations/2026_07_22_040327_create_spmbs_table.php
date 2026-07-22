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
        Schema::create('spmbs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->text('persyaratan')->nullable();
            $table->string('jadwal')->nullable();
            $table->text('alur_pendaftaran')->nullable();
            $table->string('link_pendaftaran')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spmbs');
    }
};
