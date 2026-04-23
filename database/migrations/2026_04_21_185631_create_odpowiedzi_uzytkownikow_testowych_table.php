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
        Schema::create('odpowiedzi_uzytkownikow_testowych', function (Blueprint $table) {
            $table->id();

            $table->foreignId('proba_testu_id')->constrained('proby_testow')->cascadeOnDelete();
            $table->foreignId('pytanie_testowe_id')->constrained('pytania_testowe')->cascadeOnDelete();
            $table->foreignId('odpowiedz_testowa_id')->nullable()->constrained('odpowiedzi_testowe')->nullOnDelete();

            $table->text('tresc_odpowiedzi')->nullable();
            $table->boolean('czy_poprawna')->default(false);
            $table->unsignedInteger('liczba_punktow')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odpowiedzi_uzytkownikow_testowych');
    }
};
