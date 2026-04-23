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
        Schema::create('kursy', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kategoria_kursu_id')->constrained('kategorie_kursow')->restrictOnDelete();
            $table->foreignId('prowadzacy_id')->constrained('prowadzacy')->restrictOnDelete();
            $table->foreignId('poziom_kursu_id')->constrained('poziomy_kursow')->restrictOnDelete();
            $table->foreignId('status_kursu_id')->constrained('statusy_kursow')->restrictOnDelete();

            $table->string('tytul', 255);
            $table->string('slug', 255)->unique();
            $table->string('podtytul', 255)->nullable();

            $table->string('opis_krotki', 500)->nullable();
            $table->longText('opis_pelny')->nullable();
            $table->text('dla_kogo')->nullable();
            $table->text('czego_sie_nauczysz')->nullable();
            $table->text('wymagania_wstepne')->nullable();

            $table->string('miniatura', 255)->nullable();
            $table->string('obrazek_glowny', 255)->nullable();
            $table->string('jezyk', 50)->default('polski');

            $table->unsignedInteger('czas_trwania_minuty')->default(0);
            $table->unsignedInteger('liczba_lekcji')->default(0);

            $table->decimal('cena', 10, 2)->default(0);
            $table->decimal('cena_promocyjna', 10, 2)->nullable();

            $table->boolean('czy_darmowy')->default(false);
            $table->boolean('czy_wyrozniony')->default(false);
            $table->boolean('czy_bestseller')->default(false);
            $table->boolean('czy_nowy')->default(false);

            $table->timestamp('data_publikacji')->nullable();

            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursy');
    }
};
