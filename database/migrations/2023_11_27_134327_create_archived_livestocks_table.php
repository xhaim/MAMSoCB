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
        Schema::create('archived_livestocks', function (Blueprint $table) {
            $table->id();
            $table->string('rsbsa');
            $table->string('generated')->nullable();
            $table->string('barangay');
            $table->string('name');
            $table->string('birth');
            $table->string('age');
            $table->string('sex');
            $table->string('commodity');
            $table->double('head');
            $table->string('deceased');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_livestocks');
    }
};
