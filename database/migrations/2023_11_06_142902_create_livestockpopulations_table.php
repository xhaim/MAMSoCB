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
            $table->string('name')-> nullable();
            $table->integer('kabawm')-> nullable();
            $table->integer('kabawf')-> nullable();
            $table->integer('totalkabaw')-> nullable();
            $table->integer('bakam')-> nullable();
            $table->integer('bakaf')-> nullable();
            $table->integer('totalbaka')-> nullable();
            $table->integer('baboyf')-> nullable();
            $table->integer('baboym')-> nullable();
            $table->integer('totalbaboy')-> nullable();
            $table->integer('kandingm')-> nullable();
            $table->integer('kandingf')-> nullable();
            $table->integer('totalkanding')-> nullable();
            $table->integer('kabayom')-> nullable();
            $table->integer('kabayof')-> nullable();
            $table->integer('totalkabayo')-> nullable();
            $table->integer('irom')-> nullable();
            $table->integer('irof')-> nullable();
            $table->integer('totaliro')-> nullable();
            $table->integer('manokf')-> nullable();
            $table->integer('manokm')-> nullable();
            $table->integer('totalmanok')-> nullable();
            $table->integer('bebem')-> nullable();
            $table->integer('bebef')-> nullable();
            $table->integer('totalbebe')-> nullable();
            $table->integer('quailm')-> nullable();
            $table->integer('quailf')-> nullable();
            $table->integer('totalquail')-> nullable();
            $table->integer('broilerm')-> nullable();
            $table->integer('broilerf')-> nullable();
            $table->integer('totalbroiler')-> nullable();
            $table->integer('rabbitm')-> nullable();
            $table->integer('rabbitf')-> nullable();
            $table->integer('totalrabbit')-> nullable();
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
