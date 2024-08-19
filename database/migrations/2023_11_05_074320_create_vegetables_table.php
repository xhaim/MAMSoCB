<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   

public function up()
{
    Schema::create('vegetables', function (Blueprint $table) {
        $table->id();
        $table->string('name')-> nullable();
        $table->string('barangay');
        $table->string('municipality')-> nullable();
        $table->string('sex')-> nullable();
        $table->string('affiliation')->nullable();
        $table->string('contact')-> nullable();
        $table->string('commodity')-> nullable();
        $table->string('area')-> nullable();
        $table->string('number_of_hills')-> nullable();
        $table->string('production')-> nullable();
        $table->string('market')-> nullable();
        $table->string('expansionarea')-> nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vegetables');
    }
};
