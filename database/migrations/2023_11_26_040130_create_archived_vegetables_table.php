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
        Schema::create('archived_vegetables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('sex');
            $table->string('affiliation');
            $table->string('contact');
            $table->string('commodity');
            $table->string('area');
            $table->string('number_of_hills');
            $table->string('production');
            $table->string('market');
            $table->string('expansionarea');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_vegetables');
    }
};
