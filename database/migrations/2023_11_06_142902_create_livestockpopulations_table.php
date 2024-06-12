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
        Schema::create('livestockpopulations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('kabawm');
            $table->integer('kabawf');
            $table->integer('totalkabaw');
            $table->integer('bakam');
            $table->integer('bakaf');
            $table->integer('totalbaka');
            $table->integer('baboyf');
            $table->integer('baboym');
            $table->integer('totalbaboy');
            $table->integer('kandingm');
            $table->integer('kandingf');
            $table->integer('totalkanding');
            $table->integer('kabayom');
            $table->integer('kabayof');
            $table->integer('totalkabayo');
            $table->integer('irom');
            $table->integer('irof');
            $table->integer('totaliro');
            $table->integer('manokf');
            $table->integer('manokm');
            $table->integer('totalmanok');
            $table->integer('bebem');
            $table->integer('bebef');
            $table->integer('totalbebe');
            $table->integer('quailm');
            $table->integer('quailf');
            $table->integer('totalquail');
            $table->integer('broilerm');
            $table->integer('broilerf');
            $table->integer('totalbroiler');
            $table->integer('rabbitm');
            $table->integer('rabbitf');
            $table->integer('totalrabbit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestockpopulations');
    }
};
