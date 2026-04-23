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
        Schema::create('wpisy_tagi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('wpis_id')->constrained('wpisy')->cascadeOnDelete();
            $table->foreignId('tag_wpisu_id')->constrained('tagi_wpisow')->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['wpis_id', 'tag_wpisu_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wpisy_tagi');
    }
};
