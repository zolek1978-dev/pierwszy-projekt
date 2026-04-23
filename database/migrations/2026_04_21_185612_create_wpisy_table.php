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
        Schema::create('wpisy', function (Blueprint $table) {
            $table->id();

            $table->foreignId('autor_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kategoria_wpisu_id')->nullable()->constrained('kategorie_wpisow')->nullOnDelete();

            $table->string('tytul', 255);
            $table->string('slug', 255)->unique();

            $table->string('zajawka', 500)->nullable();
            $table->longText('tresc');

            $table->string('obrazek', 255)->nullable();

            $table->string('status', 50)->default('szkic');
            $table->timestamp('data_publikacji')->nullable();

            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wpisy');
    }
};
