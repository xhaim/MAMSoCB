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
        Schema::create('archived_fruits', function (Blueprint $table) {
            $table->id();
            $table->string('name')-> nullable();
            $table->string('sex')-> nullable();
            $table->string('purok')-> nullable();
            $table->string('barangay');
            $table->string('bearing')-> nullable();
            $table->string('non_bearing')-> nullable();
            $table->string('total')-> nullable();
            $table->string('area')-> nullable();
            $table->string('age')-> nullable();
            $table->string('fruits_trees_harvested')-> nullable();
            $table->string('kilo')-> nullable();
            $table->string('season')-> nullable();
            $table->string('varieties')-> nullable();
            $table->string('group')-> nullable();
            $table->string('remark')-> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_fruits');
    }
};
