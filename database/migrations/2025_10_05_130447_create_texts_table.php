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
        Schema::create('texts', function (Blueprint $table) {
            $table->id();
            $table->timestampsTz();
            $table->string('content', 1000);
            $table->foreignId('highlights_id')->nullable()->index()->constrained()->onDelete('cascade');
            $table->foreignId('prayers_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('scheduled_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('texts');
    }
};
