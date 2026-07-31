<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jurusans', function (Blueprint $table) {
            $table->text('short_description')->nullable()->after('deskripsi');
            $table->string('icon')->nullable()->after('gambar');
            $table->json('competencies')->nullable()->after('misi');
            $table->json('career_prospects')->nullable()->after('competencies');
            $table->json('facilities')->nullable()->after('career_prospects');
            $table->boolean('is_published')->default(true)->after('facilities');
            $table->integer('sort_order')->default(0)->after('is_published');
        });
    }

    public function down(): void
    {
        Schema::table('jurusans', function (Blueprint $table) {
            $table->dropColumn([
                'short_description', 'icon', 'competencies',
                'career_prospects', 'facilities', 'is_published', 'sort_order',
            ]);
        });
    }
};
