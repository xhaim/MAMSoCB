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
        Schema::create('archived_veg_seeds', function (Blueprint $table) {
            $table->id();
            $table->string('variety');
            $table->string('seeds_received');
            $table->string('date_received');
            $table->string('source_of_funds');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_veg_seeds');
    }
};
