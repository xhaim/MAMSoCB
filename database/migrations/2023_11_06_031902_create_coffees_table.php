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
        Schema::create('coffees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sex');
            $table->string('purok');
            $table->string('barangay');
            $table->string('bearing');
            $table->string('non_bearing');
            $table->string('total');
            $table->string('area');
            $table->string('age');
            $table->string('coffee_trees_harvested');
            $table->string('kilo');
            $table->string('season');
            $table->string('varieties');
            $table->string('group');
            $table->string('remark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffees');
    }
};
