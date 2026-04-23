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
        Schema::create('zamowienia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->foreignId('status_zamowienia_id')->constrained('statusy_zamowien')->restrictOnDelete();
            $table->foreignId('status_platnosci_id')->constrained('statusy_platnosci')->restrictOnDelete();

            $table->string('numer_zamowienia', 100)->unique();

            $table->decimal('wartosc_brutto', 10, 2);
            $table->string('waluta', 10)->default('PLN');

            $table->string('metoda_platnosci', 50)->nullable();

            $table->timestamp('data_zlozenia')->useCurrent();
            $table->timestamp('data_oplacenia')->nullable();

            $table->string('imie', 100);
            $table->string('nazwisko', 100);
            $table->string('email', 150);
            $table->string('telefon', 50)->nullable();

            $table->string('nazwa_firmy', 255)->nullable();
            $table->string('nip', 50)->nullable();

            $table->string('ulica', 255)->nullable();
            $table->string('kod_pocztowy', 20)->nullable();
            $table->string('miasto', 100)->nullable();
            $table->string('kraj', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zamowienia');
    }
};
