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
        Schema::create('prowadzacy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('slug', 150)->unique();
            $table->string('tytul', 100)->nullable();
            $table->string('opis_krotki', 255)->nullable();
            $table->text('opis_pelny')->nullable();
            $table->string('zdjecie', 255)->nullable();
            $table->string('specjalizacja', 255)->nullable();
            $table->unsignedInteger('doswiadczenie_lata')->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('linkedin', 255)->nullable();
            $table->string('youtube', 255)->nullable();
            $table->string('strona_www', 255)->nullable();
            $table->boolean('czy_publiczny')->default(true);
            $table->unsignedInteger('kolejnosc')->default(0);
            $table->timestamps();

            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prowadzacy');
    }
};
