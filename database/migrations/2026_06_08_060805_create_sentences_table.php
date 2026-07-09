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
        Schema::create('sentences', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel vocabs
            $table->foreignId('vocab_id')
                  ->constrained('vocabs')
                  ->onDelete('cascade');

            // Kalimat bahasa Inggris
            $table->text('english');

            // Arti bahasa Indonesia
            $table->text('indonesia');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentences');
    }
};