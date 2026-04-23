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
        Schema::create('materialy_lekcji', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lekcja_id')->constrained('lekcje')->cascadeOnDelete();

            $table->string('nazwa', 255);
            $table->string('typ_pliku', 50)->nullable();
            $table->string('sciezka_pliku', 255);
            $table->unsignedBigInteger('rozmiar_pliku')->nullable();

            $table->boolean('czy_publiczny')->default(false);
            $table->unsignedInteger('kolejnosc')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialy_lekcji');
    }
};
