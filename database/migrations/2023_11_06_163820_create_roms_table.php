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
        Schema::create('roms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('animal_id');
            $table->string('breed');
            $table->integer('born');
            $table->string('bcs');
            $table->string('lastcalving');
            $table->string('romsdate'); 
            $table->string('ovarian');
            $table->string('result');
            $table->string('ai');
            $table->string('ut');
            $table->string('w_iec');
            $table->string('bullid');
            $table->string('straws');
            $table->string('remark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roms');
    }
};
