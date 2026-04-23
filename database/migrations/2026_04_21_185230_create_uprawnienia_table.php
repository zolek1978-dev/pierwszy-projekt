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
        Schema::create('uprawnienia', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa', 150);
            $table->string('slug', 150)->unique();
            $table->text('opis')->nullable();
            $table->boolean('czy_systemowe')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uprawnienia');
    }
};
