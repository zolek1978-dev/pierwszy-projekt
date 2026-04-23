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
        Schema::create('wiadomosci_kontaktowe', function (Blueprint $table) {
            $table->id();

            $table->string('imie', 100);
            $table->string('nazwisko', 100)->nullable();
            $table->string('email', 150);
            $table->string('telefon', 50)->nullable();

            $table->string('temat', 255)->nullable();
            $table->text('wiadomosc');

            $table->string('status', 50)->default('nowa');
            $table->string('ip_uzytkownika', 50)->nullable();

            $table->timestamps();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiadomosci_kontaktowe');
    }
};
