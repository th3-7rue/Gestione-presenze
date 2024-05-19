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
        Schema::create('presenze', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
            $table->dateTime('inizio');
            $table->dateTime('uscita');
            $table->dateTime('entrata');
            $table->dateTime('fine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presenze');
    }
};
