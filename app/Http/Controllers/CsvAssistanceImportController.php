<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistance;
use Illuminate\Support\Facades\DB;

class CsvAssistanceImportController extends Controller
{
    
    public function showForm()
    {
        return view('csv.importAssistance');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        // Assuming the CSV has a header row
        $data = array_map('str_getcsv', file($path));
        $headers = array_shift($data);

        foreach ($data as $row) {
            $rowData = array_combine($headers, $row);

            // Replace 'NULL' values with null
            $rowData = array_map(function ($value) {
                return ($value === 'NULL') ? null : $value;
            }, $rowData);

            // Adjust the keys based on your model's fillable properties
            $registryData = [
                               
                // ... other fields ...
                'rsbsa' => $rowData['rsbsa'],
                'date' => $rowData['date'],
                'timepicker' => $rowData['timepicker'],
                'name' => $rowData['name'],
                'gender' => $rowData['gender'],
                'birthdate' => $rowData['birthdate'],
                'spouse' => $rowData['spouse'],
                'spouse_gender' => $rowData['spouse_gender'],
                'spouse_birthdate' => $rowData['spouse_birthdate'],
                'dependents' => $rowData['dependents'],
                'income' => $rowData['income'],
                'address' => $rowData['address'],
              // PARTICULAR 1
                'purok' => $rowData['purok'],
                'brngy' => $rowData['brngy'],
                'geographic_coordinates' => $rowData['geographic_coordinates'],
                'title_no' => $rowData['title_no'],
                'tax_declarration_no' => $rowData['tax_declarration_no'],
                'tenure' => json_encode($rowData['tenure']),
                'existing_crop' => $rowData['existing_crop'],
                'previous_crop'=> $rowData['previous_crop'],
                //TOPOGRAPHY
                'hectares' => $rowData['hectares'],
                'land' => json_encode($rowData['land']),
                'soil_type' => $rowData['soil_type'],
                'source' => json_encode($rowData['source']),
                // REMARKS
                'notes' => $rowData['notes'],

                // AR Content 1
                'intended_crop' => $rowData['intended_crop'],
                'evaluation_intended_crop' => $rowData['evaluation_intended_crop'],
                'target_date_intended_crop' => $rowData['target_date_intended_crop'],
                'completion_date_intended_crop' => $rowData['completion_date_intended_crop'],
                'servedby_intended_crop' => $rowData['servedby_intended_crop'],
                'conform_intended_crop' => $rowData['conform_intended_crop'],

                // AR Content 2
                'program_applied' => $rowData['program_applied'],
                'evaluation_program_applied' => $rowData['evaluation_program_applied'],
                'target_date_program_applied' => $rowData['target_date_program_applied'],
                'completion_date_program_applied' => $rowData['completion_date_program_applied'],
                'servedby_program_applied' => $rowData['servedby_program_applied'],
                'conform_program_applied' => $rowData['conform_program_applied'],

                // AR Content 3
                'area_applied' => $rowData['area_applied'],
                'evaluation_area_applied' => $rowData['evaluation_area_applied'],
                'target_date_area_applied' => $rowData['target_date_area_applied'],
                'completion_date_area_applied' => $rowData['completion_date_area_applied'],
                'servedby_area_applied' => $rowData['servedby_area_applied'],
                'conform_area_applied' => $rowData['conform_area_applied'],

                // AR Content 4
                'land_preparation' => $rowData['land_preparation'],
                'evaluation_land_preparation' => $rowData['evaluation_land_preparation'],
                'target_date_land_preparation' => $rowData['target_date_land_preparation'],
                'completion_date_land_preparation' => $rowData['completion_date_land_preparation'],
                'servedby_land_preparation' => $rowData['servedby_land_preparation'],
                'conform_land_preparation' => $rowData['conform_land_preparation'],

                // AR 5
                'lay_outing' => $rowData['lay_outing'],
                'evaluation_lay_outing' => $rowData['evaluation_lay_outing'],
                'target_date_lay_outing' => $rowData['target_date_lay_outing'],
                'completion_date_lay_outing' => $rowData['completion_date_lay_outing'],
                'servedby_lay_outing' => $rowData['servedby_lay_outing'],
                'conform_lay_outing' => $rowData['conform_lay_outing'],

                // AR 6
                'farm_development' => $rowData['farm_development'],
                'evaluation_farm_development' => $rowData['evaluation_farm_development'],
                'target_date_farm_development' => $rowData['target_date_farm_development'],
                'completion_date_farm_development' => $rowData['completion_date_farm_development'],
                'servedby_farm_development' => $rowData['servedby_farm_development'],
                'conform_farm_development' => $rowData['conform_farm_development'],

                // Plowing
                'plowing' => $rowData['plowing'],
                'evaluation_plowing' => $rowData['evaluation_plowing'],
                'target_date_plowing' => $rowData['target_date_plowing'],
                'completion_date_plowing' => $rowData['completion_date_plowing'],
                'servedby_plowing' => $rowData['servedby_plowing'],
                'conform_plowing' => $rowData['conform_plowing'],

                // Harrowing
                'harrowing' => $rowData['harrowing'],
                'evaluation_harrowing' => $rowData['evaluation_harrowing'],
                'target_date_harrowing' => $rowData['target_date_harrowing'],
                'completion_date_harrowing' => $rowData['completion_date_harrowing'],
                'servedby_harrowing' => $rowData['servedby_harrowing'],
                'conform_harrowing' => $rowData['conform_harrowing'],

                // Rotavator
                'rotavator' => $rowData['rotavator'],
                'evaluation_rotavator' => $rowData['evaluation_rotavator'],
                'target_date_rotavator' => $rowData['target_date_rotavator'],
                'completion_date_rotavator' => $rowData['completion_date_rotavator'],
                'servedby_rotavator' => $rowData['servedby_rotavator'],
                'conform_rotavator' => $rowData['conform_rotavator'],
                
                // Seeds
                'seeds' => $rowData['seeds'],
                'evaluation_seeds' => $rowData['evaluation_seeds'],
                'target_date_seeds' => $rowData['target_date_seeds'],
                'completion_date_seeds' => $rowData['completion_date_seeds'],
                'servedby_seeds' => $rowData['servedby_seeds'],
                'conform_seeds' => $rowData['conform_seeds'],

                // Inoculant
                'inoculant' => $rowData['inoculant'],
                'evaluation_inoculant' => $rowData['evaluation_inoculant'],
                'target_date_inoculant' => $rowData['target_date_inoculant'],
                'completion_date_inoculant' => $rowData['completion_date_inoculant'],
                'servedby_inoculant' => $rowData['servedby_inoculant'],
                'conform_inoculant' => $rowData['conform_inoculant'],

                // Enrollment
                'enrollment' => $rowData['enrollment'],
                'evaluation_enrollment' => $rowData['evaluation_enrollment'],
                'target_date_enrollment' => $rowData['target_date_enrollment'],
                'completion_date_enrollment' => $rowData['completion_date_enrollment'],
                'servedby_enrollment' => $rowData['servedby_enrollment'],
                'conform_enrollment' => $rowData['conform_enrollment'],

                // Insurance Claim
                'insurance_claim' => $rowData['insurance_claim'],
                'evaluation_insurance_claim' => $rowData['evaluation_insurance_claim'],
                'target_date_insurance_claim' => $rowData['target_date_insurance_claim'],
                'completion_date_insurance_claim' => $rowData['completion_date_insurance_claim'],
                'servedby_insurance_claim' => $rowData['servedby_insurance_claim'],
                'conform_insurance_claim' => $rowData['conform_insurance_claim'],

                // Production
                'production' => $rowData['production'],
                'evaluation_production' => $rowData['evaluation_production'],
                'target_date_production' => $rowData['target_date_production'],
                'completion_date_production' => $rowData['completion_date_production'],
                'servedby_production' => $rowData['servedby_production'],
                'conform_production' => $rowData['conform_production'],

                // Fertilizer
                'fertilizer' => $rowData['fertilizer'],
                'evaluation_fertilizer' => $rowData['evaluation_fertilizer'],
                'target_date_fertilizer' => $rowData['target_date_fertilizer'],
                'completion_date_fertilizer' => $rowData['completion_date_fertilizer'],
                'servedby_fertilizer' => $rowData['servedby_fertilizer'],
                'conform_fertilizer' => $rowData['conform_fertilizer'],

                // Feeding Inputs
                'feeding_inputs' => $rowData['feeding_inputs'],
                'evaluation_feeding_inputs' => $rowData['evaluation_feeding_inputs'],
                'target_date_feeding_inputs' => $rowData['target_date_feeding_inputs'],
                'completion_date_feeding_inputs' => $rowData['completion_date_feeding_inputs'],
                'servedby_feeding_inputs' => $rowData['servedby_feeding_inputs'],
                'conform_feeding_inputs' => $rowData['conform_feeding_inputs'],

                // Pest Control
                'pest_control' => $rowData['pest_control'],
                'evaluation_pest_control' => $rowData['evaluation_pest_control'],
                'target_date_pest_control' => $rowData['target_date_pest_control'],
                'completion_date_pest_control' => $rowData['completion_date_pest_control'],
                'servedby_pest_control' => $rowData['servedby_pest_control'],
                'conform_pest_control' => $rowData['conform_pest_control'],

                // Irrigation
                'irrigation' => $rowData['irrigation'],
                'evaluation_irrigation' => $rowData['evaluation_irrigation'],
                'target_date_irrigation' => $rowData['target_date_irrigation'],
                'completion_date_irrigation' => $rowData['completion_date_irrigation'],
                'servedby_irrigation' => $rowData['servedby_irrigation'],
                'conform_irrigation' => $rowData['conform_irrigation'],

                // Post Harvest
                'post_harvest' => $rowData['post_harvest'],
                'evaluation_post_harvest' => $rowData['evaluation_post_harvest'],
                'target_date_post_harvest' => $rowData['target_date_post_harvest'],
                'completion_date_post_harvest' => $rowData['completion_date_post_harvest'],
                'servedby_post_harvest' => $rowData['servedby_post_harvest'],
                'conform_post_harvest' => $rowData['conform_post_harvest'],

                // Harvester
                'harvester' => $rowData['harvester'],
                'evaluation_harvester' => $rowData['evaluation_harvester'],
                'target_date_harvester' => $rowData['target_date_harvester'],
                'completion_date_harvester' => $rowData['completion_date_harvester'],
                'servedby_harvester' => $rowData['servedby_harvester'],
                'conform_harvester' => $rowData['conform_harvester'],

                // Hauling
                'hauling' => $rowData['hauling'],
                'evaluation_hauling' => $rowData['evaluation_hauling'],
                'target_date_hauling' => $rowData['target_date_hauling'],
                'completion_date_hauling' => $rowData['completion_date_hauling'],
                'servedby_hauling' => $rowData['servedby_hauling'],
                'conform_hauling' => $rowData['conform_hauling'],

                // Drying
                'drying' => $rowData['drying'],
                'evaluation_drying' => $rowData['evaluation_drying'],
                'target_date_drying' => $rowData['target_date_drying'],
                'completion_date_drying' => $rowData['completion_date_drying'],
                'servedby_drying' => $rowData['servedby_drying'],
                'conform_drying' => $rowData['conform_drying'],

                // Milling
                'milling' => $rowData['milling'],
                'evaluation_milling' => $rowData['evaluation_milling'],
                'target_date_milling' => $rowData['target_date_milling'],
                'completion_date_milling' => $rowData['completion_date_milling'],
                'servedby_milling' => $rowData['servedby_milling'],
                'conform_milling' => $rowData['conform_milling'],

                // Grading
                'grading' => $rowData['grading'],
                'evaluation_grading' => $rowData['evaluation_grading'],
                'target_date_grading' => $rowData['target_date_grading'],
                'completion_date_grading' => $rowData['completion_date_grading'],
                'servedby_grading' => $rowData['servedby_grading'],
                'conform_grading' => $rowData['conform_grading'],

                // Marketing
                'marketing' => $rowData['marketing'],
                'evaluation_marketing' => $rowData['evaluation_marketing'],
                'target_date_marketing' => $rowData['target_date_marketing'],
                'completion_date_marketing' => $rowData['completion_date_marketing'],
                'servedby_marketing' => $rowData['servedby_marketing'],
                'conform_marketing' => $rowData['conform_marketing'],

                // Others
                'others' => $rowData['others'],
                'evaluation_others' => $rowData['evaluation_others'],
                'target_date_others' => $rowData['target_date_others'],
                'completion_date_others' => $rowData['completion_date_others'],
                'servedby_others' => $rowData['servedby_others'],
                'conform_others' => $rowData['conform_others'],

                // Notes
                'notes' => $rowData['notes'],

                // Image Uploads and Previews
                'imageUpload1' => $rowData['imageUpload1'],
               
                
                'imageUpload2' => $rowData['imageUpload2'],
                
               

                // Special Notes
                'special_notes' => $rowData['special_notes'],
                'created_at' => $rowData['created_at'],
                'updated_at' => $rowData['updated_at'],
            ];

            // Insert data into the database
            DB::table('assistances')->insert($registryData);
        }

        return redirect('/assistance-crud-datatable')->with('success', 'CSV imported successfully.');
    }
}
