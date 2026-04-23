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
        Schema::create('postepy_lekcji', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kurs_id')->constrained('kursy')->cascadeOnDelete();
            $table->foreignId('lekcja_id')->constrained('lekcje')->cascadeOnDelete();

            $table->boolean('czy_ukonczona')->default(false);
            $table->timestamp('data_ukonczenia')->nullable();

            $table->unsignedInteger('czas_ogladania_sekundy')->default(0);

            $table->timestamps();

            $table->unique(['user_id', 'lekcja_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postepy_lekcji');
    }
};
