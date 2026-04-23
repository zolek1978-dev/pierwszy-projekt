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
        Schema::create('kategorie_kursow', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa', 150);
            $table->string('slug', 150)->unique();
            $table->string('opis_krotki', 255)->nullable();
            $table->text('opis_pelny')->nullable();
            $table->string('obrazek', 255)->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->boolean('czy_aktywna')->default(true);
            $table->unsignedInteger('kolejnosc')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategorie_kursow');
    }
};
