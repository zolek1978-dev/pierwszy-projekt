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
        Schema::create('subskrybenci_newslettera', function (Blueprint $table) {
            $table->id();

            $table->string('email', 150)->unique();
            $table->string('imie', 100)->nullable();

            $table->string('status', 50)->default('aktywny');
            $table->boolean('zgoda_marketingowa')->default(false);

            $table->timestamp('data_zapisu')->useCurrent();
            $table->timestamp('data_wypisu')->nullable();

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subskrybenci_newslettera');
    }
};
