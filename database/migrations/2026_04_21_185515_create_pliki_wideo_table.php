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
        Schema::create('pliki_wideo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lekcja_id')->constrained('lekcje')->cascadeOnDelete();

            $table->string('zrodlo', 50)->nullable(); // youtube, vimeo, local
            $table->string('url', 255);

            $table->unsignedInteger('czas_trwania_sekundy')->default(0);
            $table->boolean('czy_pobieralne')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pliki_wideo');
    }
};
