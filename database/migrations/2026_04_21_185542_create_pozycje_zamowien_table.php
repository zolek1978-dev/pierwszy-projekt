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
        Schema::create('pozycje_zamowien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zamowienie_id')->constrained('zamowienia')->cascadeOnDelete();
            $table->foreignId('kurs_id')->nullable()->constrained('kursy')->nullOnDelete();

            $table->string('nazwa', 255);
            $table->decimal('cena_jednostkowa', 10, 2);
            $table->unsignedInteger('ilosc')->default(1);
            $table->decimal('wartosc', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pozycje_zamowien');
    }
};
