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
        Schema::create('kupony_rabatowe', function (Blueprint $table) {
            $table->id();
            $table->string('kod', 50)->unique();

            $table->string('typ_rabatu', 20); // procent / kwota
            $table->decimal('wartosc_rabatu', 10, 2);

            $table->timestamp('data_od')->nullable();
            $table->timestamp('data_do')->nullable();

            $table->unsignedInteger('limit_uzyc')->nullable();
            $table->unsignedInteger('liczba_uzyc')->default(0);

            $table->boolean('czy_aktywny')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kupony_rabatowe');
    }
};
