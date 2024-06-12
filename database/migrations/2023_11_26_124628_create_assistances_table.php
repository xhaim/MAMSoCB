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
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->text('rsbsa')->nullable();
            $table->text('date')->nullable();
            $table->text('timepicker')->nullable();
            $table->text('name')->nullable();
            $table->text('gender')->nullable();
            $table->text('birthdate')->nullable();
            $table->text('spouse')->nullable();
            $table->text('spouse_gender')->nullable();
            $table->text('spouse_birthdate')->nullable();
            $table->text('dependents')->nullable();
            $table->text('income')->nullable();
            $table->text('address')->nullable();
            // particular
            $table->text('purok')->nullable();
            $table->text('brngy')->nullable();
            $table->text('geographic_coordinates')->nullable();
            $table->text('title_no')->nullable();
            $table->text('tax_declarration_no')->nullable();
            $table->json('tenure')->nullable();
            $table->text('existing_crop')->nullable();
            $table->text('previous_crop')->nullable();
            // TOPOGRAPHY
            $table->text('hectares')->nullable();
            $table->json('land')->nullable();
            $table->text('soil_type')->nullable();
            $table->json('source')->nullable();

        
 
             // AR Content 1
             $table->text('intended_crop')->nullable();
             $table->text('evaluation_intended_crop')->nullable();
             $table->text('target_date_intended_crop')->nullable();
             $table->text('completion_date_intended_crop')->nullable();
             $table->text('servedby_intended_crop')->nullable();
             $table->text('conform_intended_crop')->nullable();
 
             // AR Content 2
             $table->text('program_applied')->nullable();
             $table->text('evaluation_program_applied')->nullable();
             $table->text('target_date_program_applied')->nullable();
             $table->text('completion_date_program_applied')->nullable();
             $table->text('servedby_program_applied')->nullable();
             $table->text('conform_program_applied')->nullable();
 
             // AR Content 3
             $table->text('area_applied')->nullable();
             $table->text('evaluation_area_applied')->nullable();
             $table->text('target_date_area_applied')->nullable();
             $table->text('completion_date_area_applied')->nullable();
             $table->text('servedby_area_applied')->nullable();
             $table->text('conform_area_applied')->nullable();
 
             // AR Content 4
             $table->text('land_preparation')->nullable();
             $table->text('evaluation_land_preparation')->nullable();
             $table->text('target_date_land_preparation')->nullable();
             $table->text('completion_date_land_preparation')->nullable();
             $table->text('servedby_land_preparation')->nullable();
             $table->text('conform_land_preparation')->nullable();

             // AR 5
            $table->text('lay_outing')->nullable();
            $table->text('evaluation_lay_outing')->nullable();
            $table->text('target_date_lay_outing')->nullable();
            $table->text('completion_date_lay_outing')->nullable();
            $table->text('servedby_lay_outing')->nullable();
            $table->text('conform_lay_outing')->nullable();

            // AR 6
            $table->text('farm_development')->nullable();
            $table->text('evaluation_farm_development')->nullable();
            $table->text('target_date_farm_development')->nullable();
            $table->text('completion_date_farm_development')->nullable();
            $table->text('servedby_farm_development')->nullable();
            $table->text('conform_farm_development')->nullable();

            // Plowing
$table->text('plowing')->nullable();
$table->text('evaluation_plowing')->nullable();
$table->text('target_date_plowing')->nullable();
$table->text('completion_date_plowing')->nullable();
$table->text('servedby_plowing')->nullable();
$table->text('conform_plowing')->nullable();

// Harrowing
$table->text('harrowing')->nullable();
$table->text('evaluation_harrowing')->nullable();
$table->text('target_date_harrowing')->nullable();
$table->text('completion_date_harrowing')->nullable();
$table->text('servedby_harrowing')->nullable();
$table->text('conform_harrowing')->nullable();

// Rotavator
$table->text('rotavator')->nullable();
$table->text('evaluation_rotavator')->nullable();
$table->text('target_date_rotavator')->nullable();
$table->text('completion_date_rotavator')->nullable();
$table->text('servedby_rotavator')->nullable();
$table->text('conform_rotavator')->nullable();

// Seeds
$table->text('seeds')->nullable();
$table->text('evaluation_seeds')->nullable();
$table->text('target_date_seeds')->nullable();
$table->text('completion_date_seeds')->nullable();
$table->text('servedby_seeds')->nullable();
$table->text('conform_seeds')->nullable();

// Inoculant
$table->text('inoculant')->nullable();
$table->text('evaluation_inoculant')->nullable();
$table->text('target_date_inoculant')->nullable();
$table->text('completion_date_inoculant')->nullable();
$table->text('servedby_inoculant')->nullable();
$table->text('conform_inoculant')->nullable();

// Enrollment
$table->text('enrollment')->nullable();
$table->text('evaluation_enrollment')->nullable();
$table->text('target_date_enrollment')->nullable();
$table->text('completion_date_enrollment')->nullable();
$table->text('servedby_enrollment')->nullable();
$table->text('conform_enrollment')->nullable();

// Insurance Claim
$table->text('insurance_claim')->nullable();
$table->text('evaluation_insurance_claim')->nullable();
$table->text('target_date_insurance_claim')->nullable();
$table->text('completion_date_insurance_claim')->nullable();
$table->text('servedby_insurance_claim')->nullable();
$table->text('conform_insurance_claim')->nullable();

// Production
$table->text('production')->nullable();
$table->text('evaluation_production')->nullable();
$table->text('target_date_production')->nullable();
$table->text('completion_date_production')->nullable();
$table->text('servedby_production')->nullable();
$table->text('conform_production')->nullable();

// Fertilizer
$table->text('fertilizer')->nullable();
$table->text('evaluation_fertilizer')->nullable();
$table->text('target_date_fertilizer')->nullable();
$table->text('completion_date_fertilizer')->nullable();
$table->text('servedby_fertilizer')->nullable();
$table->text('conform_fertilizer')->nullable();

// Feeding Inputs
$table->text('feeding_inputs')->nullable();
$table->text('evaluation_feeding_inputs')->nullable();
$table->text('target_date_feeding_inputs')->nullable();
$table->text('completion_date_feeding_inputs')->nullable();
$table->text('servedby_feeding_inputs')->nullable();
$table->text('conform_feeding_inputs')->nullable();

// Pest Control
$table->text('pest_control')->nullable();
$table->text('evaluation_pest_control')->nullable();
$table->text('target_date_pest_control')->nullable();
$table->text('completion_date_pest_control')->nullable();
$table->text('servedby_pest_control')->nullable();
$table->text('conform_pest_control')->nullable();

// Irrigation
$table->text('irrigation')->nullable();
$table->text('evaluation_irrigation')->nullable();
$table->text('target_date_irrigation')->nullable();
$table->text('completion_date_irrigation')->nullable();
$table->text('servedby_irrigation')->nullable();
$table->text('conform_irrigation')->nullable();

// Post Harvest
$table->text('post_harvest')->nullable();
$table->text('evaluation_post_harvest')->nullable();
$table->text('target_date_post_harvest')->nullable();
$table->text('completion_date_post_harvest')->nullable();
$table->text('servedby_post_harvest')->nullable();
$table->text('conform_post_harvest')->nullable();

// Harvester
$table->text('harvester')->nullable();
$table->text('evaluation_harvester')->nullable();
$table->text('target_date_harvester')->nullable();
$table->text('completion_date_harvester')->nullable();
$table->text('servedby_harvester')->nullable();
$table->text('conform_harvester')->nullable();

// Hauling
$table->text('hauling')->nullable();
$table->text('evaluation_hauling')->nullable();
$table->text('target_date_hauling')->nullable();
$table->text('completion_date_hauling')->nullable();
$table->text('servedby_hauling')->nullable();
$table->text('conform_hauling')->nullable();

// Drying
$table->text('drying')->nullable();
$table->text('evaluation_drying')->nullable();
$table->text('target_date_drying')->nullable();
$table->text('completion_date_drying')->nullable();
$table->text('servedby_drying')->nullable();
$table->text('conform_drying')->nullable();

// Milling
$table->text('milling')->nullable();
$table->text('evaluation_milling')->nullable();
$table->text('target_date_milling')->nullable();
$table->text('completion_date_milling')->nullable();
$table->text('servedby_milling')->nullable();
$table->text('conform_milling')->nullable();

// Grading
$table->text('grading')->nullable();
$table->text('evaluation_grading')->nullable();
$table->text('target_date_grading')->nullable();
$table->text('completion_date_grading')->nullable();
$table->text('servedby_grading')->nullable();
$table->text('conform_grading')->nullable();

// Marketing
$table->text('marketing')->nullable();
$table->text('evaluation_marketing')->nullable();
$table->text('target_date_marketing')->nullable();
$table->text('completion_date_marketing')->nullable();
$table->text('servedby_marketing')->nullable();
$table->text('conform_marketing')->nullable();

// Others
$table->text('others')->nullable();
$table->text('evaluation_others')->nullable();
$table->text('target_date_others')->nullable();
$table->text('completion_date_others')->nullable();
$table->text('servedby_others')->nullable();
$table->text('conform_others')->nullable();

// Notes
$table->text('notes')->nullable();

// Image Uploads and Previews
$table->text('imageUpload1')->nullable();
$table->text('imageUpload2')->nullable();

// Special Notes
$table->text('special_notes')->nullable();

 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistances');
    }
};
