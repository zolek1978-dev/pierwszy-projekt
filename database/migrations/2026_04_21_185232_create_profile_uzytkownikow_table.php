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
        Schema::create('profile_uzytkownikow', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('imie', 100)->nullable();
            $table->string('nazwisko', 100)->nullable();
            $table->string('telefon', 30)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->text('bio')->nullable();
            $table->date('data_urodzenia')->nullable();
            $table->string('miasto', 100)->nullable();
            $table->string('kraj', 100)->nullable();
            $table->string('strona_www', 255)->nullable();
            $table->string('linkedin', 255)->nullable();
            $table->string('github', 255)->nullable();
            $table->boolean('czy_publiczny')->default(false);
            $table->timestamps();

            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_uzytkownikow');
    }
};
