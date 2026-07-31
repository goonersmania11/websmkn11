<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_items', function (Blueprint $table) {
            $table->id();
            $table->string('type')->index();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('summary')->nullable();
            $table->longText('body')->nullable();
            $table->string('category')->nullable()->index();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->date('event_date')->nullable();
            $table->string('extra_1')->nullable();
            $table->string('extra_2')->nullable();
            $table->string('extra_3')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();

            $table->unique(['type', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_items');
    }
};
