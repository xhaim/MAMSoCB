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
        Schema::create('livestocks', function (Blueprint $table) {
            $table->id();
            $table->string('rsbsa');
            $table->string('generated')->nullable();
            $table->string('barangay');
            $table->string('name')-> nullable();
            $table->string('birth')-> nullable();
            $table->string('age')-> nullable();
            $table->string('sex')-> nullable();
            $table->string('commodity')-> nullable();
            $table->double('head')-> nullable();
            $table->string('deceased')-> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestocks');
    }
};
