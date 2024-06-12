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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('applicant');
            $table->string('address');
            $table->string('location');
            $table->string('project_description');
            $table->string('contact');
            $table->string('actual_land_area_of_farm');
            $table->string('date_inspected')->nullable();
            $table->string('inspector')->nullable();
            $table->double('fuel_requirement', 10, 2)->nullable();
            $table->double('hours_of_operation', 10, 2)->nullable();
            $table->json('equipment')->nullable(); // Assuming equipment is stored as JSON
            $table->double('area', 10, 2)->nullable();
            $table->double('rental_rate', 10, 2)->nullable();
            $table->double('total_rental_amount', 10, 2)->nullable();
            $table->string('payment')->nullable();
            $table->string('or_number')->nullable();
            $table->date('payment_date')->nullable();
            $table->double('payment_amount', 10, 2)->nullable();
            $table->string('municipal_treasurer')->nullable();
            $table->string('source_of_fund')->nullable();
            $table->double('funds_available', 10, 2)->nullable();
            $table->string('municipal_accountant')->nullable();
            $table->string('municipal_budget_officer')->nullable();
            $table->string('municipal_mayor')->nullable();
            $table->string('schedule_of_operation');
            $table->string('plate_number_tractor')->nullable();
            $table->string('mao_tractor_incharge')->nullable();
            $table->double('actual_land_area_served', 10, 2)->nullable();
            $table->double('actual_hours_of_operation', 10, 2)->nullable();
            $table->text('remarks')->nullable();
            $table->string('mo_field_inspector')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
