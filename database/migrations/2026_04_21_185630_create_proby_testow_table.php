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
        Schema::create('proby_testow', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('test_id')->constrained('testy')->cascadeOnDelete();

            $table->decimal('wynik_procentowy', 5, 2)->default(0);
            $table->unsignedInteger('liczba_punktow')->default(0);
            $table->boolean('czy_zaliczony')->default(false);

            $table->timestamp('data_rozpoczecia')->nullable();
            $table->timestamp('data_zakonczenia')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proby_testow');
    }
};
