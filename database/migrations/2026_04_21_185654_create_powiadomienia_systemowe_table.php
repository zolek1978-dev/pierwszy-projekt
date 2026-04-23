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
        Schema::create('powiadomienia_systemowe', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->string('tytul', 255);
            $table->text('tresc');

            $table->string('typ', 50)->nullable(); // info, sukces, blad

            $table->boolean('czy_przeczytane')->default(false);
            $table->timestamp('data_przeczytania')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('powiadomienia_systemowe');
    }
};
