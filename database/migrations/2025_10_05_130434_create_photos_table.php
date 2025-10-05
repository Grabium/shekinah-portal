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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('path')->unique();
            $table->string('original_filename')->unique();
            $table->string('mime_type');
            $table->unsignedBigInteger('file_size');
            $table->foreignId('highlights_id')->nullable()->index()->constrained()->onDelete('cascade');
            $table->foreignId('albums_id')->nullable()->constrained()->onDelete('cascade');
            $table->boolean('is_thumb')->default(false)->index(); //caso true, se houver uma cópia dela em /thumbs
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
