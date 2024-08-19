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
            $table->string('name')-> nullable();
            $table->string('address')-> nullable();
            $table->string('animal_id')-> nullable();
            $table->string('breed')-> nullable();
            $table->integer('born')-> nullable();
            $table->string('bcs')-> nullable();
            $table->string('lastcalving')-> nullable();
            $table->string('romsdate')-> nullable(); 
            $table->string('ovarian')-> nullable();
            $table->string('result')-> nullable();
            $table->string('ai')-> nullable();
            $table->string('ut')-> nullable();
            $table->string('w_iec')-> nullable();
            $table->string('bullid')-> nullable();
            $table->string('straws')-> nullable();
            $table->string('remark')-> nullable();
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
