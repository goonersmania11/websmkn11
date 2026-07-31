<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->unsignedBigInteger('jurusan_id')->nullable()->after('jenis_kelamin');
            $table->boolean('is_published')->default(true)->after('jurusan_id');
            $table->integer('sort_order')->default(0)->after('is_published');
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']);
            $table->dropColumn(['jurusan_id', 'is_published', 'sort_order']);
        });
    }
};
