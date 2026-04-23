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
        Schema::create('pytania_faq', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategoria_faq_id')->constrained('kategorie_faq')->cascadeOnDelete();

            $table->string('pytanie', 255);
            $table->text('odpowiedz');

            $table->unsignedInteger('kolejnosc')->default(0);
            $table->boolean('czy_opublikowane')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pytania_faq');
    }
};
