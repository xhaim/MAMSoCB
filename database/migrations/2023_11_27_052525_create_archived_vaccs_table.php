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
        Schema::create('archived_vaccs', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name')-> nullable();
            $table->string('birthday')-> nullable();
            $table->string('dog_name')-> nullable();
            $table->string('origin')-> nullable();
            $table->string('breed')-> nullable();
            $table->string('color')-> nullable();
            $table->integer('ageyr')->nullable(); 
            $table->integer('age_month')->nullable();
            $table->string('sex_male')->nullable(); 
            $table->string('sex_female')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_vaccs');
    }
};
