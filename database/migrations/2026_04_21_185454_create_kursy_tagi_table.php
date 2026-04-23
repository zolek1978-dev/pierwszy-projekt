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
        Schema::create('kursy_tagi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kurs_id')->constrained('kursy')->cascadeOnDelete();
            $table->foreignId('tag_kursu_id')->constrained('tagi_kursow')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['kurs_id', 'tag_kursu_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursy_tagi');
    }
};
