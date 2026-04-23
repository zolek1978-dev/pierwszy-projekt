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
        Schema::create('certyfikaty', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kurs_id')->constrained('kursy')->cascadeOnDelete();

            $table->string('numer_certyfikatu', 100)->unique();
            $table->timestamp('data_wydania')->useCurrent();
            $table->string('sciezka_pliku', 255)->nullable();
            $table->string('kod_weryfikacyjny', 100)->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certyfikaty');
    }
};
