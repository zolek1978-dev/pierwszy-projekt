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
        Schema::create('typy_lekcji', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa', 100);
            $table->string('slug', 100)->unique();
            $table->text('opis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typy_lekcji');
    }
};
