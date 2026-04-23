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
        Schema::create('postepy_kursow', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kurs_id')->constrained('kursy')->cascadeOnDelete();

            $table->unsignedInteger('liczba_ukonczonych_lekcji')->default(0);
            $table->decimal('procent_ukonczenia', 5, 2)->default(0);

            $table->timestamp('data_ostatniej_aktywnosci')->nullable();
            $table->timestamp('data_ukonczenia')->nullable();

            $table->timestamps();

            $table->unique(['user_id', 'kurs_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postepy_kursow');
    }
};
