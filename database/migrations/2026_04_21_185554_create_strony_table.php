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
        Schema::create('strony', function (Blueprint $table) {
            $table->id();

            $table->string('tytul', 255);
            $table->string('slug', 255)->unique();

            $table->longText('tresc');

            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();

            $table->boolean('czy_opublikowana')->default(false);
            $table->timestamp('data_publikacji')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('strony');
    }
};
