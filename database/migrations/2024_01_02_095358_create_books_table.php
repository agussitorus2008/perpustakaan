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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Relasi ke tabel users
            $table->string('title');
            $table->foreignId('category_id')->constrained(); // Relasi ke tabel categories
            $table->text('description');
            $table->integer('quantity');
            $table->string('pdf_path');
            $table->string('cover_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
