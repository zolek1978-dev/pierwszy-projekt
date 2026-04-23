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
        Schema::create('opinie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kurs_id')->constrained('kursy')->cascadeOnDelete();

            $table->unsignedTinyInteger('ocena'); // 1-5
            $table->string('tytul', 255)->nullable();
            $table->text('tresc')->nullable();

            $table->boolean('czy_opublikowana')->default(false);
            $table->boolean('czy_zweryfikowana')->default(false);

            $table->timestamp('data_publikacji')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opinie');
    }
};
