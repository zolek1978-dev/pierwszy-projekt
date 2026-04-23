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
        Schema::create('sekcje_kursow', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kurs_id')->constrained('kursy')->cascadeOnDelete();
            $table->string('tytul', 255);
            $table->text('opis')->nullable();
            $table->unsignedInteger('kolejnosc')->default(0);
            $table->boolean('czy_publiczna')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekcje_kursow');
    }
};
