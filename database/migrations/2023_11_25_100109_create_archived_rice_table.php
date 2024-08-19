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
        Schema::create('archived_rice', function (Blueprint $table) {
            $table->id();
            $table->string('rsbsa')-> nullable();
            $table->string('name_first')-> nullable();
            $table->string('name_middle')-> nullable();
            $table->string('name_last')-> nullable();
            $table->string('suffix')->nullable();
            $table->string('barangay');
            $table->string('farm_location')-> nullable();
            $table->date('birthdate')-> nullable();
            $table->decimal('farm_area', 8, 2);
            $table->enum('sex', ['Male', 'Female']);
            $table->string('membership')-> nullable();// Assuming equipment is stored as JSON
            $table->integer('quantity')-> nullable();
            $table->date('date_received')-> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_rice');
    }
};
