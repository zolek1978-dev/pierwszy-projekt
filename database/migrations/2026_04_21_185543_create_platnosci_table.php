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
        Schema::create('platnosci', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zamowienie_id')->constrained('zamowienia')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->foreignId('status_platnosci_id')->constrained('statusy_platnosci')->restrictOnDelete();

            $table->string('operator_platnosci', 100)->nullable();
            $table->string('identyfikator_transakcji', 255)->nullable();

            $table->decimal('kwota', 10, 2);
            $table->string('waluta', 10)->default('PLN');

            $table->timestamp('data_platnosci')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platnosci');
    }
};
