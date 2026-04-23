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
        Schema::create('odpowiedzi_testowe', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pytanie_testowe_id')->constrained('pytania_testowe')->cascadeOnDelete();

            $table->text('tresc');
            $table->boolean('czy_poprawna')->default(false);
            $table->unsignedInteger('kolejnosc')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odpowiedzi_testowe');
    }
};
