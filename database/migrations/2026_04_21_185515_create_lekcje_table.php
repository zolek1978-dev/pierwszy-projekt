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
        Schema::create('lekcje', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kurs_id')->constrained('kursy')->cascadeOnDelete();
            $table->foreignId('sekcja_kursu_id')->constrained('sekcje_kursow')->cascadeOnDelete();
            $table->foreignId('typ_lekcji_id')->constrained('typy_lekcji')->restrictOnDelete();

            $table->string('tytul', 255);
            $table->string('slug', 255)->unique();
            $table->string('opis_krotki', 500)->nullable();
            $table->longText('opis_pelny')->nullable();

            $table->unsignedInteger('czas_trwania_minuty')->default(0);
            $table->unsignedInteger('kolejnosc')->default(0);

            $table->boolean('czy_darmowa')->default(false);
            $table->boolean('czy_opublikowana')->default(false);
            $table->timestamp('data_publikacji')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lekcje');
    }
};
