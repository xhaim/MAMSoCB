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
        Schema::create('archived_corn', function (Blueprint $table) {
            $table->id();
            $table->string('rsbsa')-> nullable();
            $table->string('generated')-> nullable();
            $table->string('association')-> nullable();
            $table->string('barangay')-> nullable();
            $table->string('name')-> nullable();
            $table->string('birth')-> nullable();
            $table->string('season')-> nullable();
            $table->string('age')-> nullable();
            $table->string('sex')-> nullable();
            $table->string('cropping')-> nullable();
            $table->double('area')-> nullable();
            $table->string('location')-> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_corn')-> nullable();
    }
};
