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
        Schema::create('role_uprawnienia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rola_id')->constrained('role')->cascadeOnDelete();
            $table->foreignId('uprawnienie_id')->constrained('uprawnienia')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['rola_id', 'uprawnienie_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_uprawnienia');
    }
};
