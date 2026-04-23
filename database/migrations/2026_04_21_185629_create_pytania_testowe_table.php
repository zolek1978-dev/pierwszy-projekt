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
        Schema::create('pytania_testowe', function (Blueprint $table) {
            $table->id();

            $table->foreignId('test_id')->constrained('testy')->cascadeOnDelete();

            $table->text('tresc');
            $table->string('typ_pytania', 50)->default('jednokrotnego_wyboru');
            $table->unsignedInteger('punkty')->default(1);
            $table->unsignedInteger('kolejnosc')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pytania_testowe');
    }
};
