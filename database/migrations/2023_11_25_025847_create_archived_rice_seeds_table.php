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
        Schema::create('archived_rice_seeds', function (Blueprint $table) {
            $table->id();
            $table->string('variety')-> nullable();
            $table->integer('seeds_received')-> nullable();
            $table->date('date_received')-> nullable();
            $table->string('source_of_funds')-> nullable();
            // Add any additional columns needed for the archived table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('archived_rice_seeds');
    }
};
