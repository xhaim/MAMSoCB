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
        Schema::create('ricedistributionhybrid', function (Blueprint $table) {
            $table->id();
            $table->string('rsbsa');
            $table->string('name_first');
            $table->string('name_middle');
            $table->string('name_last');
            $table->string('suffix')->nullable();
            $table->string('barangay');
            $table->string('farm_location');
            $table->date('birthdate');
            $table->decimal('farm_area', 8, 2);
            $table->enum('sex', ['Male', 'Female']);
            $table->json('membership');// Assuming equipment is stored as JSON
            $table->integer('quantity');
            $table->date('date_received');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ricedistributionhybrid');
    }
};
