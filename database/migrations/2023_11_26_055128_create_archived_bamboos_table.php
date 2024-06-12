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
        Schema::create('archived_bamboos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sex');
            $table->string('birthday');
            $table->string('purok');
            $table->string('barangay');
            $table->string('newly');
            $table->string('harvestable');
            $table->string('total');
            $table->string('area');
            $table->string('age');
            $table->string('per_month');
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
        Schema::dropIfExists('archived_bamboos');
    }
};
