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
        Schema::create('testy', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kurs_id')->constrained('kursy')->cascadeOnDelete();
            $table->foreignId('sekcja_kursu_id')->nullable()->constrained('sekcje_kursow')->nullOnDelete();
            $table->foreignId('lekcja_id')->nullable()->constrained('lekcje')->nullOnDelete();

            $table->string('tytul', 255);
            $table->text('opis')->nullable();

            $table->unsignedInteger('limit_czasu_minuty')->nullable();
            $table->unsignedTinyInteger('procent_zaliczenia')->default(50);
            $table->unsignedInteger('liczba_prob')->default(1);

            $table->boolean('czy_aktywny')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testy');
    }
};
