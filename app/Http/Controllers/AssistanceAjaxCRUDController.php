<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistance;
use App\Models\ArchivedAssistances; 
use Datatables;
use Illuminate\Support\Facades\DB;

class AssistanceAjaxCRUDController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Assistance::select('*'))
            ->addColumn('action', 'admin/assistance/assistance-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin/assistance/assistance');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

        $request->validate([
            // Your existing validation rules...
    
            'imageUpload1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageUpload2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload for imageUpload1
        $image1 = $request->file('imageUpload1');
        if ($image1) {
            $imageName1 = '_' . \Str::uuid() . '_1.' . $image1->extension();
            $image1->move(public_path('images'), $imageName1);
            $imagePath1 = 'images/' . $imageName1;
        } else {
            $imagePath1 = null;
        }

        // Handle image upload for imageUpload2
        $image2 = $request->file('imageUpload2');
        if ($image2) {
            $imageName2 = '_' . \Str::uuid() . '_2.' . $image2->extension();
            $image2->move(public_path('images'), $imageName2);
            $imagePath2 = 'images/' . $imageName2;
        } else {
            $imagePath2 = null;
        }

 
        $coffeeId = $request->id;
 
        $assistance   =   Assistance::updateOrCreate(
                    [
                     'id' => $coffeeId
                    ],
                    [
                        'rsbsa' => $request->rsbsa,
                        'date' => $request->date,
                        'timepicker' => $request->timepicker,
                        'name' => $request->name,
                        'gender' => $request->gender,
                        'birthdate' => $request->birthdate,
                        'spouse' => $request->spouse,
                        'spouse_gender' => $request->spouse_gender,
                        'spouse_birthdate' => $request->spouse_birthdate,
                        'dependents' => $request->dependents,
                        'income' => $request->income,
                        'address' => $request->address,
                      // PARTICULAR 1
            'purok' => $request-> purok,
            'brngy' => $request-> brngy,
            'geographic_coordinates' => $request-> geographic_coordinates,
            'title_no' => $request-> title_no,
            'tax_declarration_no' => $request-> tax_declarration_no,
            'tenure' => json_encode($request->tenure),
            'existing_crop' => $request -> existing_crop,
            'previous_crop'=> $request -> previous_crop,
            //TOPOGRAPHY
            'hectares' => $request-> hectares,
            'land' => json_encode($request->land),
            'soil_type' => $request-> soil_type,
            'source' => json_encode($request->source),
            // REMARKS
            'notes' => $request->notes,

            // AR Content 1
            'intended_crop' => $request->intended_crop,
            'evaluation_intended_crop' => $request->evaluation_intended_crop,
            'target_date_intended_crop' => $request->target_date_intended_crop,
            'completion_date_intended_crop' => $request->completion_date_intended_crop,
            'servedby_intended_crop' => $request->servedby_intended_crop,
            'conform_intended_crop' => $request->conform_intended_crop,

            // AR Content 2
            'program_applied' => $request->program_applied,
            'evaluation_program_applied' => $request->evaluation_program_applied,
            'target_date_program_applied' => $request->target_date_program_applied,
            'completion_date_program_applied' => $request->completion_date_program_applied,
            'servedby_program_applied' => $request->servedby_program_applied,
            'conform_program_applied' => $request->conform_program_applied,

             // AR Content 3
             'area_applied' => $request->area_applied,
             'evaluation_area_applied' => $request->evaluation_area_applied,
             'target_date_area_applied' => $request->target_date_area_applied,
             'completion_date_area_applied' => $request->completion_date_area_applied,
             'servedby_area_applied' => $request->servedby_area_applied,
             'conform_area_applied' => $request->conform_area_applied,
 
             // AR Content 4
             'land_preparation' => $request->land_preparation,
             'evaluation_land_preparation' => $request->evaluation_land_preparation,
             'target_date_land_preparation' => $request->target_date_land_preparation,
             'completion_date_land_preparation' => $request->completion_date_land_preparation,
             'servedby_land_preparation' => $request->servedby_land_preparation,
             'conform_land_preparation' => $request->conform_land_preparation,
 
             // AR 5
             'lay_outing' => $request->lay_outing,
             'evaluation_lay_outing' => $request->evaluation_lay_outing,
             'target_date_lay_outing' => $request->target_date_lay_outing,
             'completion_date_lay_outing' => $request->completion_date_lay_outing,
             'servedby_lay_outing' => $request->servedby_lay_outing,
             'conform_lay_outing' => $request->conform_lay_outing,
 
             // AR 6
             'farm_development' => $request->farm_development,
             'evaluation_farm_development' => $request->evaluation_farm_development,
             'target_date_farm_development' => $request->target_date_farm_development,
             'completion_date_farm_development' => $request->completion_date_farm_development,
             'servedby_farm_development' => $request->servedby_farm_development,
             'conform_farm_development' => $request->conform_farm_development,
 
             // Plowing
             'plowing' => $request->plowing,
             'evaluation_plowing' => $request->evaluation_plowing,
             'target_date_plowing' => $request->target_date_plowing,
             'completion_date_plowing' => $request->completion_date_plowing,
             'servedby_plowing' => $request->servedby_plowing,
             'conform_plowing' => $request->conform_plowing,
 
             // Harrowing
             'harrowing' => $request->harrowing,
             'evaluation_harrowing' => $request->evaluation_harrowing,
             'target_date_harrowing' => $request->target_date_harrowing,
             'completion_date_harrowing' => $request->completion_date_harrowing,
             'servedby_harrowing' => $request->servedby_harrowing,
             'conform_harrowing' => $request->conform_harrowing,
 
             // Rotavator
             'rotavator' => $request->rotavator,
             'evaluation_rotavator' => $request->evaluation_rotavator,
             'target_date_rotavator' => $request->target_date_rotavator,
             'completion_date_rotavator' => $request->completion_date_rotavator,
             'servedby_rotavator' => $request->servedby_rotavator,
             'conform_rotavator' => $request->conform_rotavator,
             
              // Seeds
            'seeds' => $request->seeds,
            'evaluation_seeds' => $request->evaluation_seeds,
            'target_date_seeds' => $request->target_date_seeds,
            'completion_date_seeds' => $request->completion_date_seeds,
            'servedby_seeds' => $request->servedby_seeds,
            'conform_seeds' => $request->conform_seeds,

            // Inoculant
            'inoculant' => $request->inoculant,
            'evaluation_inoculant' => $request->evaluation_inoculant,
            'target_date_inoculant' => $request->target_date_inoculant,
            'completion_date_inoculant' => $request->completion_date_inoculant,
            'servedby_inoculant' => $request->servedby_inoculant,
            'conform_inoculant' => $request->conform_inoculant,

            // Enrollment
            'enrollment' => $request->enrollment,
            'evaluation_enrollment' => $request->evaluation_enrollment,
            'target_date_enrollment' => $request->target_date_enrollment,
            'completion_date_enrollment' => $request->completion_date_enrollment,
            'servedby_enrollment' => $request->servedby_enrollment,
            'conform_enrollment' => $request->conform_enrollment,

            // Insurance Claim
            'insurance_claim' => $request->insurance_claim,
            'evaluation_insurance_claim' => $request->evaluation_insurance_claim,
            'target_date_insurance_claim' => $request->target_date_insurance_claim,
            'completion_date_insurance_claim' => $request->completion_date_insurance_claim,
            'servedby_insurance_claim' => $request->servedby_insurance_claim,
            'conform_insurance_claim' => $request->conform_insurance_claim,

            // Production
            'production' => $request->production,
            'evaluation_production' => $request->evaluation_production,
            'target_date_production' => $request->target_date_production,
            'completion_date_production' => $request->completion_date_production,
            'servedby_production' => $request->servedby_production,
            'conform_production' => $request->conform_production,

            // Fertilizer
            'fertilizer' => $request->fertilizer,
            'evaluation_fertilizer' => $request->evaluation_fertilizer,
            'target_date_fertilizer' => $request->target_date_fertilizer,
            'completion_date_fertilizer' => $request->completion_date_fertilizer,
            'servedby_fertilizer' => $request->servedby_fertilizer,
            'conform_fertilizer' => $request->conform_fertilizer,

            // Feeding Inputs
            'feeding_inputs' => $request->feeding_inputs,
            'evaluation_feeding_inputs' => $request->evaluation_feeding_inputs,
            'target_date_feeding_inputs' => $request->target_date_feeding_inputs,
            'completion_date_feeding_inputs' => $request->completion_date_feeding_inputs,
            'servedby_feeding_inputs' => $request->servedby_feeding_inputs,
            'conform_feeding_inputs' => $request->conform_feeding_inputs,
       
            // Pest Control
            'pest_control' => $request->pest_control,
            'evaluation_pest_control' => $request->evaluation_pest_control,
            'target_date_pest_control' => $request->target_date_pest_control,
            'completion_date_pest_control' => $request->completion_date_pest_control,
            'servedby_pest_control' => $request->servedby_pest_control,
            'conform_pest_control' => $request->conform_pest_control,

            // Irrigation
            'irrigation' => $request->irrigation,
            'evaluation_irrigation' => $request->evaluation_irrigation,
            'target_date_irrigation' => $request->target_date_irrigation,
            'completion_date_irrigation' => $request->completion_date_irrigation,
            'servedby_irrigation' => $request->servedby_irrigation,
            'conform_irrigation' => $request->conform_irrigation,

            // Post Harvest
            'post_harvest' => $request->post_harvest,
            'evaluation_post_harvest' => $request->evaluation_post_harvest,
            'target_date_post_harvest' => $request->target_date_post_harvest,
            'completion_date_post_harvest' => $request->completion_date_post_harvest,
            'servedby_post_harvest' => $request->servedby_post_harvest,
            'conform_post_harvest' => $request->conform_post_harvest,

            // Harvester
            'harvester' => $request->harvester,
            'evaluation_harvester' => $request->evaluation_harvester,
            'target_date_harvester' => $request->target_date_harvester,
            'completion_date_harvester' => $request->completion_date_harvester,
            'servedby_harvester' => $request->servedby_harvester,
            'conform_harvester' => $request->conform_harvester,

            // Hauling
            'hauling' => $request->hauling,
            'evaluation_hauling' => $request->evaluation_hauling,
            'target_date_hauling' => $request->target_date_hauling,
            'completion_date_hauling' => $request->completion_date_hauling,
            'servedby_hauling' => $request->servedby_hauling,
            'conform_hauling' => $request->conform_hauling,

            // Drying
            'drying' => $request->drying,
            'evaluation_drying' => $request->evaluation_drying,
            'target_date_drying' => $request->target_date_drying,
            'completion_date_drying' => $request->completion_date_drying,
            'servedby_drying' => $request->servedby_drying,
            'conform_drying' => $request->conform_drying,

            // Milling
            'milling' => $request->milling,
            'evaluation_milling' => $request->evaluation_milling,
            'target_date_milling' => $request->target_date_milling,
            'completion_date_milling' => $request->completion_date_milling,
            'servedby_milling' => $request->servedby_milling,
            'conform_milling' => $request->conform_milling,

            // Grading
            'grading' => $request->grading,
            'evaluation_grading' => $request->evaluation_grading,
            'target_date_grading' => $request->target_date_grading,
            'completion_date_grading' => $request->completion_date_grading,
            'servedby_grading' => $request->servedby_grading,
            'conform_grading' => $request->conform_grading,

            // Marketing
            'marketing' => $request->marketing,
            'evaluation_marketing' => $request->evaluation_marketing,
            'target_date_marketing' => $request->target_date_marketing,
            'completion_date_marketing' => $request->completion_date_marketing,
            'servedby_marketing' => $request->servedby_marketing,
            'conform_marketing' => $request->conform_marketing,

              // Others
              'others' => $request->others,
              'evaluation_others' => $request->evaluation_others,
              'target_date_others' => $request->target_date_others,
              'completion_date_others' => $request->completion_date_others,
              'servedby_others' => $request->servedby_others,
              'conform_others' => $request->conform_others,
  
              // Notes
              'notes' => $request->notes,
  
              // Image Uploads and Previews
              'imageUpload1' => $imagePath1,
              'imageUpload2' => $imagePath2,
  
              // Special Notes
              'special_notes' => $request->special_notes,
                    ]);    
                         
        return Response()->json($assistance);
 
    }
      

    public function storeWithIMG(Request $request)
    {  



    // FOR PHOTO EDIT WITHOUT LOOSING OTHER PHOTO DIRECTORY //
        $request->validate([
            // Your existing validation rules...
    
            
        'imageUpload1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        'imageUpload2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'imageUploadData1' => 'max:5000', // Adjust the rules as needed
            'imageUploadData2' => 'max:5000', // Adjust the rules as needed
        
        ]);

        $imagePath1 = null;
        $textInput1 = $request->input('imageUploadData1');
        $image1 = $request->file('imageUpload1');
        if ($textInput1 === "Not null" && $image1 && $image1->isValid()) {
            // Image upload field is not empty, use its data
            if ($image1 && $image1->isValid()) {
                
                if ($image1) {
                    $imageName1 = '_' . \Str::uuid() . '_1.' . $image1->extension();
                    $image1->move(public_path('images'), $imageName1);
                    $imagePath1 = 'images/' . $imageName1;
                } else {
                    $imagePath1 = null;
                }
                    }
        }
        else if($imagePath1 === null && $textInput1 !== " " && $textInput1 !== "Not null"){
            $imagePath1 = $textInput1; 
        } else {
            // Image upload field is empty, use data from the input field
            $imagePath1 = $textInput1;   
        }

        $imagePath2 = null;
        $textInput2 = $request->input('imageUploadData2');
        $image2 = $request->file('imageUpload2');
        if ($textInput2 === "Not null" && $image2 && $image2->isValid()) {
            // Image upload field is not empty, use its data
            if ($image2 && $image2->isValid()) {
                
                if ($image2) {
                    $imageName2 = '_' . \Str::uuid() . '_2.' . $image2->extension();
                    $image2->move(public_path('images'), $imageName2);
                    $imagePath2 = 'images/' . $imageName2;
                } else {
                    $imagePath2 = null;
                }
                    }
            
        }
         else if($imagePath2 === null && $textInput2 !== " " && $textInput2 !== "Not null"){
            $imagePath2 = $textInput2; 
         } else {
            // Image upload field is empty, use data from the input field
            $imagePath2 = $textInput2; 
            
        }
    // FOR PHOTO EDIT WITHOUT LOOSING OTHER PHOTO DIRECTORY //  
        

        
 
        $coffeeId = $request->id;
 
        $assistance   =   Assistance::updateOrCreate(
                    [
                     'id' => $coffeeId
                    ],
                    [
                        'rsbsa' => $request->rsbsa,
                        'date' => $request->date,
                        'timepicker' => $request->timepicker,
                        'name' => $request->name,
                        'gender' => $request->gender,
                        'birthdate' => $request->birthdate,
                        'spouse' => $request->spouse,
                        'spouse_gender' => $request->spouse_gender,
                        'spouse_birthdate' => $request->spouse_birthdate,
                        'dependents' => $request->dependents,
                        'income' => $request->income,
                        'address' => $request->address,
                      // PARTICULAR 1
            'purok' => $request-> purok,
            'brngy' => $request-> brngy,
            'geographic_coordinates' => $request-> geographic_coordinates,
            'title_no' => $request-> title_no,
            'tax_declarration_no' => $request-> tax_declarration_no,
            'tenure' => json_encode($request->tenure),
            'existing_crop' => $request -> existing_crop,
            'previous_crop'=> $request -> previous_crop,
            //TOPOGRAPHY
            'hectares' => $request-> hectares,
            'land' => json_encode($request->land),
            'soil_type' => $request-> soil_type,
            'source' => json_encode($request->source),
            // REMARKS
            'notes' => $request->notes,

            // AR Content 1
            'intended_crop' => $request->intended_crop,
            'evaluation_intended_crop' => $request->evaluation_intended_crop,
            'target_date_intended_crop' => $request->target_date_intended_crop,
            'completion_date_intended_crop' => $request->completion_date_intended_crop,
            'servedby_intended_crop' => $request->servedby_intended_crop,
            'conform_intended_crop' => $request->conform_intended_crop,

            // AR Content 2
            'program_applied' => $request->program_applied,
            'evaluation_program_applied' => $request->evaluation_program_applied,
            'target_date_program_applied' => $request->target_date_program_applied,
            'completion_date_program_applied' => $request->completion_date_program_applied,
            'servedby_program_applied' => $request->servedby_program_applied,
            'conform_program_applied' => $request->conform_program_applied,

             // AR Content 3
             'area_applied' => $request->area_applied,
             'evaluation_area_applied' => $request->evaluation_area_applied,
             'target_date_area_applied' => $request->target_date_area_applied,
             'completion_date_area_applied' => $request->completion_date_area_applied,
             'servedby_area_applied' => $request->servedby_area_applied,
             'conform_area_applied' => $request->conform_area_applied,
 
             // AR Content 4
             'land_preparation' => $request->land_preparation,
             'evaluation_land_preparation' => $request->evaluation_land_preparation,
             'target_date_land_preparation' => $request->target_date_land_preparation,
             'completion_date_land_preparation' => $request->completion_date_land_preparation,
             'servedby_land_preparation' => $request->servedby_land_preparation,
             'conform_land_preparation' => $request->conform_land_preparation,
 
             // AR 5
             'lay_outing' => $request->lay_outing,
             'evaluation_lay_outing' => $request->evaluation_lay_outing,
             'target_date_lay_outing' => $request->target_date_lay_outing,
             'completion_date_lay_outing' => $request->completion_date_lay_outing,
             'servedby_lay_outing' => $request->servedby_lay_outing,
             'conform_lay_outing' => $request->conform_lay_outing,
 
             // AR 6
             'farm_development' => $request->farm_development,
             'evaluation_farm_development' => $request->evaluation_farm_development,
             'target_date_farm_development' => $request->target_date_farm_development,
             'completion_date_farm_development' => $request->completion_date_farm_development,
             'servedby_farm_development' => $request->servedby_farm_development,
             'conform_farm_development' => $request->conform_farm_development,
 
             // Plowing
             'plowing' => $request->plowing,
             'evaluation_plowing' => $request->evaluation_plowing,
             'target_date_plowing' => $request->target_date_plowing,
             'completion_date_plowing' => $request->completion_date_plowing,
             'servedby_plowing' => $request->servedby_plowing,
             'conform_plowing' => $request->conform_plowing,
 
             // Harrowing
             'harrowing' => $request->harrowing,
             'evaluation_harrowing' => $request->evaluation_harrowing,
             'target_date_harrowing' => $request->target_date_harrowing,
             'completion_date_harrowing' => $request->completion_date_harrowing,
             'servedby_harrowing' => $request->servedby_harrowing,
             'conform_harrowing' => $request->conform_harrowing,
 
             // Rotavator
             'rotavator' => $request->rotavator,
             'evaluation_rotavator' => $request->evaluation_rotavator,
             'target_date_rotavator' => $request->target_date_rotavator,
             'completion_date_rotavator' => $request->completion_date_rotavator,
             'servedby_rotavator' => $request->servedby_rotavator,
             'conform_rotavator' => $request->conform_rotavator,
             
              // Seeds
            'seeds' => $request->seeds,
            'evaluation_seeds' => $request->evaluation_seeds,
            'target_date_seeds' => $request->target_date_seeds,
            'completion_date_seeds' => $request->completion_date_seeds,
            'servedby_seeds' => $request->servedby_seeds,
            'conform_seeds' => $request->conform_seeds,

            // Inoculant
            'inoculant' => $request->inoculant,
            'evaluation_inoculant' => $request->evaluation_inoculant,
            'target_date_inoculant' => $request->target_date_inoculant,
            'completion_date_inoculant' => $request->completion_date_inoculant,
            'servedby_inoculant' => $request->servedby_inoculant,
            'conform_inoculant' => $request->conform_inoculant,

            // Enrollment
            'enrollment' => $request->enrollment,
            'evaluation_enrollment' => $request->evaluation_enrollment,
            'target_date_enrollment' => $request->target_date_enrollment,
            'completion_date_enrollment' => $request->completion_date_enrollment,
            'servedby_enrollment' => $request->servedby_enrollment,
            'conform_enrollment' => $request->conform_enrollment,

            // Insurance Claim
            'insurance_claim' => $request->insurance_claim,
            'evaluation_insurance_claim' => $request->evaluation_insurance_claim,
            'target_date_insurance_claim' => $request->target_date_insurance_claim,
            'completion_date_insurance_claim' => $request->completion_date_insurance_claim,
            'servedby_insurance_claim' => $request->servedby_insurance_claim,
            'conform_insurance_claim' => $request->conform_insurance_claim,

            // Production
            'production' => $request->production,
            'evaluation_production' => $request->evaluation_production,
            'target_date_production' => $request->target_date_production,
            'completion_date_production' => $request->completion_date_production,
            'servedby_production' => $request->servedby_production,
            'conform_production' => $request->conform_production,

            // Fertilizer
            'fertilizer' => $request->fertilizer,
            'evaluation_fertilizer' => $request->evaluation_fertilizer,
            'target_date_fertilizer' => $request->target_date_fertilizer,
            'completion_date_fertilizer' => $request->completion_date_fertilizer,
            'servedby_fertilizer' => $request->servedby_fertilizer,
            'conform_fertilizer' => $request->conform_fertilizer,

            // Feeding Inputs
            'feeding_inputs' => $request->feeding_inputs,
            'evaluation_feeding_inputs' => $request->evaluation_feeding_inputs,
            'target_date_feeding_inputs' => $request->target_date_feeding_inputs,
            'completion_date_feeding_inputs' => $request->completion_date_feeding_inputs,
            'servedby_feeding_inputs' => $request->servedby_feeding_inputs,
            'conform_feeding_inputs' => $request->conform_feeding_inputs,
       
            // Pest Control
            'pest_control' => $request->pest_control,
            'evaluation_pest_control' => $request->evaluation_pest_control,
            'target_date_pest_control' => $request->target_date_pest_control,
            'completion_date_pest_control' => $request->completion_date_pest_control,
            'servedby_pest_control' => $request->servedby_pest_control,
            'conform_pest_control' => $request->conform_pest_control,

            // Irrigation
            'irrigation' => $request->irrigation,
            'evaluation_irrigation' => $request->evaluation_irrigation,
            'target_date_irrigation' => $request->target_date_irrigation,
            'completion_date_irrigation' => $request->completion_date_irrigation,
            'servedby_irrigation' => $request->servedby_irrigation,
            'conform_irrigation' => $request->conform_irrigation,

            // Post Harvest
            'post_harvest' => $request->post_harvest,
            'evaluation_post_harvest' => $request->evaluation_post_harvest,
            'target_date_post_harvest' => $request->target_date_post_harvest,
            'completion_date_post_harvest' => $request->completion_date_post_harvest,
            'servedby_post_harvest' => $request->servedby_post_harvest,
            'conform_post_harvest' => $request->conform_post_harvest,

            // Harvester
            'harvester' => $request->harvester,
            'evaluation_harvester' => $request->evaluation_harvester,
            'target_date_harvester' => $request->target_date_harvester,
            'completion_date_harvester' => $request->completion_date_harvester,
            'servedby_harvester' => $request->servedby_harvester,
            'conform_harvester' => $request->conform_harvester,

            // Hauling
            'hauling' => $request->hauling,
            'evaluation_hauling' => $request->evaluation_hauling,
            'target_date_hauling' => $request->target_date_hauling,
            'completion_date_hauling' => $request->completion_date_hauling,
            'servedby_hauling' => $request->servedby_hauling,
            'conform_hauling' => $request->conform_hauling,

            // Drying
            'drying' => $request->drying,
            'evaluation_drying' => $request->evaluation_drying,
            'target_date_drying' => $request->target_date_drying,
            'completion_date_drying' => $request->completion_date_drying,
            'servedby_drying' => $request->servedby_drying,
            'conform_drying' => $request->conform_drying,

            // Milling
            'milling' => $request->milling,
            'evaluation_milling' => $request->evaluation_milling,
            'target_date_milling' => $request->target_date_milling,
            'completion_date_milling' => $request->completion_date_milling,
            'servedby_milling' => $request->servedby_milling,
            'conform_milling' => $request->conform_milling,

            // Grading
            'grading' => $request->grading,
            'evaluation_grading' => $request->evaluation_grading,
            'target_date_grading' => $request->target_date_grading,
            'completion_date_grading' => $request->completion_date_grading,
            'servedby_grading' => $request->servedby_grading,
            'conform_grading' => $request->conform_grading,

            // Marketing
            'marketing' => $request->marketing,
            'evaluation_marketing' => $request->evaluation_marketing,
            'target_date_marketing' => $request->target_date_marketing,
            'completion_date_marketing' => $request->completion_date_marketing,
            'servedby_marketing' => $request->servedby_marketing,
            'conform_marketing' => $request->conform_marketing,

              // Others
              'others' => $request->others,
              'evaluation_others' => $request->evaluation_others,
              'target_date_others' => $request->target_date_others,
              'completion_date_others' => $request->completion_date_others,
              'servedby_others' => $request->servedby_others,
              'conform_others' => $request->conform_others,
  
              // Notes
              'notes' => $request->notes,            

              // Image Uploads and Previews
              'imageUpload1'=> $imagePath1,
              'imageUpload2'=> $imagePath2,
  
  
              // Special Notes
              'special_notes' => $request->special_notes,
                    ]);    

                    error_log('ImageUpload1 Path: ' . $imagePath1);
    error_log('ImageUpload2 Path: ' . $imagePath2);
        error_log('Text1 Path: ' . $textInput1);
    error_log('Text2 Path: ' . $textInput2);
                         
        return Response()->json($assistance);
 
    }
    // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if (request()->ajax()) {
            return datatables()->of(ArchivedAssistances::select('*'))
                ->addColumn('action', 'admin/assistance/archive-assistance-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin/assistance/assistance');
    }


   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:assistances,id',
       ]);

       // Get the record to be archived
       $assistances = Assistance::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedAssistances::create([

        'rsbsa' => $assistances->rsbsa,
        'date' => $assistances->date,
        'timepicker' => $assistances->timepicker,
        'name' => $assistances->name,
        'gender' => $assistances->gender,
        'birthdate' => $assistances->birthdate,
        'spouse' => $assistances->spouse,
        'spouse_gender' => $assistances->spouse_gender,
        'spouse_birthdate' => $assistances->spouse_birthdate,
        'dependents' => $assistances->dependents,
        'income' => $assistances->income,
        'address' => $assistances->address,
        'purok' => $assistances-> purok,
            'brngy' => $assistances-> brngy,
            'geographic_coordinates' => $assistances-> geographic_coordinates,
            'title_no' => $assistances-> title_no,
            'tax_declarration_no' => $assistances-> tax_declarration_no,
            'tenure' =>  $assistances->tenure,
            'existing_crop' => $assistances -> existing_crop,
            'previous_crop'=> $assistances -> previous_crop,
            //TOPOGRAPHY
            'hectares' => $assistances-> hectares,
            'land' =>  $assistances->land,
            'soil_type' => $assistances-> soil_type,
            'source' =>  $assistances->source,
            // REMARKS
            'notes' => $assistances->notes,
// AR Content 1
'intended_crop' => $assistances->intended_crop,
'evaluation_intended_crop' => $assistances->evaluation_intended_crop,
'target_date_intended_crop' => $assistances->target_date_intended_crop,
'completion_date_intended_crop' => $assistances->completion_date_intended_crop,
'servedby_intended_crop' => $assistances->servedby_intended_crop,
'conform_intended_crop' => $assistances->conform_intended_crop,

// AR Content 2
'program_applied' => $assistances->program_applied,
'evaluation_program_applied' => $assistances->evaluation_program_applied,
'target_date_program_applied' => $assistances->target_date_program_applied,
'completion_date_program_applied' => $assistances->completion_date_program_applied,
'servedby_program_applied' => $assistances->servedby_program_applied,
'conform_program_applied' => $assistances->conform_program_applied,

// AR Content 3
'area_applied' => $assistances->area_applied,
'evaluation_area_applied' => $assistances->evaluation_area_applied,
'target_date_area_applied' => $assistances->target_date_area_applied,
'completion_date_area_applied' => $assistances->completion_date_area_applied,
'servedby_area_applied' => $assistances->servedby_area_applied,
'conform_area_applied' => $assistances->conform_area_applied,

// AR Content 4
'land_preparation' => $assistances->land_preparation,
'evaluation_land_preparation' => $assistances->evaluation_land_preparation,
'target_date_land_preparation' => $assistances->target_date_land_preparation,
'completion_date_land_preparation' => $assistances->completion_date_land_preparation,
'servedby_land_preparation' => $assistances->servedby_land_preparation,
'conform_land_preparation' => $assistances->conform_land_preparation,

// AR 5
'lay_outing' => $assistances->lay_outing,
'evaluation_lay_outing' => $assistances->evaluation_lay_outing,
'target_date_lay_outing' => $assistances->target_date_lay_outing,
'completion_date_lay_outing' => $assistances->completion_date_lay_outing,
'servedby_lay_outing' => $assistances->servedby_lay_outing,
'conform_lay_outing' => $assistances->conform_lay_outing,

// AR 6
'farm_development' => $assistances->farm_development,
'evaluation_farm_development' => $assistances->evaluation_farm_development,
'target_date_farm_development' => $assistances->target_date_farm_development,
'completion_date_farm_development' => $assistances->completion_date_farm_development,
'servedby_farm_development' => $assistances->servedby_farm_development,
'conform_farm_development' => $assistances->conform_farm_development,

// Plowing
'plowing' => $assistances->plowing,
'evaluation_plowing' => $assistances->evaluation_plowing,
'target_date_plowing' => $assistances->target_date_plowing,
'completion_date_plowing' => $assistances->completion_date_plowing,
'servedby_plowing' => $assistances->servedby_plowing,
'conform_plowing' => $assistances->conform_plowing,

// Harrowing
'harrowing' => $assistances->harrowing,
'evaluation_harrowing' => $assistances->evaluation_harrowing,
'target_date_harrowing' => $assistances->target_date_harrowing,
'completion_date_harrowing' => $assistances->completion_date_harrowing,
'servedby_harrowing' => $assistances->servedby_harrowing,
'conform_harrowing' => $assistances->conform_harrowing,

// Rotavator
'rotavator' => $assistances->rotavator,
'evaluation_rotavator' => $assistances->evaluation_rotavator,
'target_date_rotavator' => $assistances->target_date_rotavator,
'completion_date_rotavator' => $assistances->completion_date_rotavator,
'servedby_rotavator' => $assistances->servedby_rotavator,
'conform_rotavator' => $assistances->conform_rotavator,

// Seeds
'seeds' => $assistances->seeds,
'evaluation_seeds' => $assistances->evaluation_seeds,
'target_date_seeds' => $assistances->target_date_seeds,
'completion_date_seeds' => $assistances->completion_date_seeds,
'servedby_seeds' => $assistances->servedby_seeds,
'conform_seeds' => $assistances->conform_seeds,

// Inoculant
'inoculant' => $assistances->inoculant,
'evaluation_inoculant' => $assistances->evaluation_inoculant,
'target_date_inoculant' => $assistances->target_date_inoculant,
'completion_date_inoculant' => $assistances->completion_date_inoculant,
'servedby_inoculant' => $assistances->servedby_inoculant,
'conform_inoculant' => $assistances->conform_inoculant,

// Enrollment
'enrollment' => $assistances->enrollment,
'evaluation_enrollment' => $assistances->evaluation_enrollment,
'target_date_enrollment' => $assistances->target_date_enrollment,
'completion_date_enrollment' => $assistances->completion_date_enrollment,
'servedby_enrollment' => $assistances->servedby_enrollment,
'conform_enrollment' => $assistances->conform_enrollment,

// Insurance Claim
'insurance_claim' => $assistances->insurance_claim,
'evaluation_insurance_claim' => $assistances->evaluation_insurance_claim,
'target_date_insurance_claim' => $assistances->target_date_insurance_claim,
'completion_date_insurance_claim' => $assistances->completion_date_insurance_claim,
'servedby_insurance_claim' => $assistances->servedby_insurance_claim,
'conform_insurance_claim' => $assistances->conform_insurance_claim,

// Production
'production' => $assistances->production,
'evaluation_production' => $assistances->evaluation_production,
'target_date_production' => $assistances->target_date_production,
'completion_date_production' => $assistances->completion_date_production,
'servedby_production' => $assistances->servedby_production,
'conform_production' => $assistances->conform_production,

// Fertilizer
'fertilizer' => $assistances->fertilizer,
'evaluation_fertilizer' => $assistances->evaluation_fertilizer,
'target_date_fertilizer' => $assistances->target_date_fertilizer,
'completion_date_fertilizer' => $assistances->completion_date_fertilizer,
'servedby_fertilizer' => $assistances->servedby_fertilizer,
'conform_fertilizer' => $assistances->conform_fertilizer,

// Feeding Inputs
'feeding_inputs' => $assistances->feeding_inputs,
'evaluation_feeding_inputs' => $assistances->evaluation_feeding_inputs,
'target_date_feeding_inputs' => $assistances->target_date_feeding_inputs,
'completion_date_feeding_inputs' => $assistances->completion_date_feeding_inputs,
'servedby_feeding_inputs' => $assistances->servedby_feeding_inputs,
'conform_feeding_inputs' => $assistances->conform_feeding_inputs,

// Pest Control
'pest_control' => $assistances->pest_control,
'evaluation_pest_control' => $assistances->evaluation_pest_control,
'target_date_pest_control' => $assistances->target_date_pest_control,
'completion_date_pest_control' => $assistances->completion_date_pest_control,
'servedby_pest_control' => $assistances->servedby_pest_control,
'conform_pest_control' => $assistances->conform_pest_control,

// Irrigation
'irrigation' => $assistances->irrigation,
'evaluation_irrigation' => $assistances->evaluation_irrigation,
'target_date_irrigation' => $assistances->target_date_irrigation,
'completion_date_irrigation' => $assistances->completion_date_irrigation,
'servedby_irrigation' => $assistances->servedby_irrigation,
'conform_irrigation' => $assistances->conform_irrigation,

// Post Harvest
'post_harvest' => $assistances->post_harvest,
'evaluation_post_harvest' => $assistances->evaluation_post_harvest,
'target_date_post_harvest' => $assistances->target_date_post_harvest,
'completion_date_post_harvest' => $assistances->completion_date_post_harvest,
'servedby_post_harvest' => $assistances->servedby_post_harvest,
'conform_post_harvest' => $assistances->conform_post_harvest,

// Harvester
'harvester' => $assistances->harvester,
'evaluation_harvester' => $assistances->evaluation_harvester,
'target_date_harvester' => $assistances->target_date_harvester,
'completion_date_harvester' => $assistances->completion_date_harvester,
'servedby_harvester' => $assistances->servedby_harvester,
'conform_harvester' => $assistances->conform_harvester,

// Hauling
'hauling' => $assistances->hauling,
'evaluation_hauling' => $assistances->evaluation_hauling,
'target_date_hauling' => $assistances->target_date_hauling,
'completion_date_hauling' => $assistances->completion_date_hauling,
'servedby_hauling' => $assistances->servedby_hauling,
'conform_hauling' => $assistances->conform_hauling,

// Drying
'drying' => $assistances->drying,
'evaluation_drying' => $assistances->evaluation_drying,
'target_date_drying' => $assistances->target_date_drying,
'completion_date_drying' => $assistances->completion_date_drying,
'servedby_drying' => $assistances->servedby_drying,
'conform_drying' => $assistances->conform_drying,

// Milling
'milling' => $assistances->milling,
'evaluation_milling' => $assistances->evaluation_milling,
'target_date_milling' => $assistances->target_date_milling,
'completion_date_milling' => $assistances->completion_date_milling,
'servedby_milling' => $assistances->servedby_milling,
'conform_milling' => $assistances->conform_milling,

// Grading
'grading' => $assistances->grading,
'evaluation_grading' => $assistances->evaluation_grading,
'target_date_grading' => $assistances->target_date_grading,
'completion_date_grading' => $assistances->completion_date_grading,
'servedby_grading' => $assistances->servedby_grading,
'conform_grading' => $assistances->conform_grading,

// Marketing
'marketing' => $assistances->marketing,
'evaluation_marketing' => $assistances->evaluation_marketing,
'target_date_marketing' => $assistances->target_date_marketing,
'completion_date_marketing' => $assistances->completion_date_marketing,
'servedby_marketing' => $assistances->servedby_marketing,
'conform_marketing' => $assistances->conform_marketing,

// Others
'others' => $assistances->others,
'evaluation_others' => $assistances->evaluation_others,
'target_date_others' => $assistances->target_date_others,
'completion_date_others' => $assistances->completion_date_others,
'servedby_others' => $assistances->servedby_others,
'conform_others' => $assistances->conform_others,

// Notes
'notes' => $assistances->notes,

// Image Uploads and Previews
'imageUpload1' => $assistances->imageUpload1,
'imageUpload2' => $assistances->imageUpload2,

// Special Notes
'special_notes' => $assistances->special_notes,

           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $assistances->delete();

       return response()->json(['success' => true]);
   }
    //  show
    public function getAssistanceDetails($id)
    {
        $rental = Assistance::find($id);
        return response()->json($rental);
    }
    // end show
   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_assistances,id',
       ]);

       // Get the record to be unarchived
       $archivedassistances = ArchivedAssistances::find($request->id);

       // Create a new record in the main table
       $assistances = Assistance::create([
        'rsbsa' => $archivedassistances->rsbsa,
                        'date' => $archivedassistances->date,
                        'timepicker' => $archivedassistances->timepicker,
                        'name' => $archivedassistances->name,
                        'gender' => $archivedassistances->gender,
                        'birthdate' => $archivedassistances->birthdate,
                        'spouse' => $archivedassistances->spouse,
                        'spouse_gender' => $archivedassistances->spouse_gender,
                        'spouse_birthdate' => $archivedassistances->spouse_birthdate,
                        'dependents' => $archivedassistances->dependents,
                        'income' => $archivedassistances->income,
                        'address' => $archivedassistances->address,
                       // PARTICULAR 1
                       'purok' => $archivedassistances-> purok,
                       'brngy' => $archivedassistances-> brngy,
                       'geographic_coordinates' => $archivedassistances-> geographic_coordinates,
                       'title_no' => $archivedassistances-> title_no,
                       'tax_declarration_no' => $archivedassistances-> tax_declarration_no,
                       'tenure' =>  ($archivedassistances->tenure),
                       'existing_crop' => $archivedassistances -> existing_crop,
                       'previous_crop'=> $archivedassistances -> previous_crop,
                       //TOPOGRAPHY
                       'hectares' => $archivedassistances-> hectares,
                       'land' =>  ($archivedassistances->land),
                       'soil_type' => $archivedassistances-> soil_type,
                       'source' =>  ($archivedassistances->source),
                       // REMARKS
                       'notes' => $archivedassistances->notes,

            // AR Content 1
            'intended_crop' => $archivedassistances->intended_crop,
            'evaluation_intended_crop' => $archivedassistances->evaluation_intended_crop,
            'target_date_intended_crop' => $archivedassistances->target_date_intended_crop,
            'completion_date_intended_crop' => $archivedassistances->completion_date_intended_crop,
            'servedby_intended_crop' => $archivedassistances->servedby_intended_crop,
            'conform_intended_crop' => $archivedassistances->conform_intended_crop,

            // AR Content 2
            'program_applied' => $archivedassistances->program_applied,
            'evaluation_program_applied' => $archivedassistances->evaluation_program_applied,
            'target_date_program_applied' => $archivedassistances->target_date_program_applied,
            'completion_date_program_applied' => $archivedassistances->completion_date_program_applied,
            'servedby_program_applied' => $archivedassistances->servedby_program_applied,
            'conform_program_applied' => $archivedassistances->conform_program_applied,

             // AR Content 3
             'area_applied' => $archivedassistances->area_applied,
             'evaluation_area_applied' => $archivedassistances->evaluation_area_applied,
             'target_date_area_applied' => $archivedassistances->target_date_area_applied,
             'completion_date_area_applied' => $archivedassistances->completion_date_area_applied,
             'servedby_area_applied' => $archivedassistances->servedby_area_applied,
             'conform_area_applied' => $archivedassistances->conform_area_applied,
 
             // AR Content 4
             'land_preparation' => $archivedassistances->land_preparation,
             'evaluation_land_preparation' => $archivedassistances->evaluation_land_preparation,
             'target_date_land_preparation' => $archivedassistances->target_date_land_preparation,
             'completion_date_land_preparation' => $archivedassistances->completion_date_land_preparation,
             'servedby_land_preparation' => $archivedassistances->servedby_land_preparation,
             'conform_land_preparation' => $archivedassistances->conform_land_preparation,
 
             // AR 5
             'lay_outing' => $archivedassistances->lay_outing,
             'evaluation_lay_outing' => $archivedassistances->evaluation_lay_outing,
             'target_date_lay_outing' => $archivedassistances->target_date_lay_outing,
             'completion_date_lay_outing' => $archivedassistances->completion_date_lay_outing,
             'servedby_lay_outing' => $archivedassistances->servedby_lay_outing,
             'conform_lay_outing' => $archivedassistances->conform_lay_outing,
 
             // AR 6
             'farm_development' => $archivedassistances->farm_development,
             'evaluation_farm_development' => $archivedassistances->evaluation_farm_development,
             'target_date_farm_development' => $archivedassistances->target_date_farm_development,
             'completion_date_farm_development' => $archivedassistances->completion_date_farm_development,
             'servedby_farm_development' => $archivedassistances->servedby_farm_development,
             'conform_farm_development' => $archivedassistances->conform_farm_development,
 
             // Plowing
             'plowing' => $archivedassistances->plowing,
             'evaluation_plowing' => $archivedassistances->evaluation_plowing,
             'target_date_plowing' => $archivedassistances->target_date_plowing,
             'completion_date_plowing' => $archivedassistances->completion_date_plowing,
             'servedby_plowing' => $archivedassistances->servedby_plowing,
             'conform_plowing' => $archivedassistances->conform_plowing,
 
             // Harrowing
             'harrowing' => $archivedassistances->harrowing,
             'evaluation_harrowing' => $archivedassistances->evaluation_harrowing,
             'target_date_harrowing' => $archivedassistances->target_date_harrowing,
             'completion_date_harrowing' => $archivedassistances->completion_date_harrowing,
             'servedby_harrowing' => $archivedassistances->servedby_harrowing,
             'conform_harrowing' => $archivedassistances->conform_harrowing,
 
             // Rotavator
             'rotavator' => $archivedassistances->rotavator,
             'evaluation_rotavator' => $archivedassistances->evaluation_rotavator,
             'target_date_rotavator' => $archivedassistances->target_date_rotavator,
             'completion_date_rotavator' => $archivedassistances->completion_date_rotavator,
             'servedby_rotavator' => $archivedassistances->servedby_rotavator,
             'conform_rotavator' => $archivedassistances->conform_rotavator,
             
              // Seeds
            'seeds' => $archivedassistances->seeds,
            'evaluation_seeds' => $archivedassistances->evaluation_seeds,
            'target_date_seeds' => $archivedassistances->target_date_seeds,
            'completion_date_seeds' => $archivedassistances->completion_date_seeds,
            'servedby_seeds' => $archivedassistances->servedby_seeds,
            'conform_seeds' => $archivedassistances->conform_seeds,

            // Inoculant
            'inoculant' => $archivedassistances->inoculant,
            'evaluation_inoculant' => $archivedassistances->evaluation_inoculant,
            'target_date_inoculant' => $archivedassistances->target_date_inoculant,
            'completion_date_inoculant' => $archivedassistances->completion_date_inoculant,
            'servedby_inoculant' => $archivedassistances->servedby_inoculant,
            'conform_inoculant' => $archivedassistances->conform_inoculant,

            // Enrollment
            'enrollment' => $archivedassistances->enrollment,
            'evaluation_enrollment' => $archivedassistances->evaluation_enrollment,
            'target_date_enrollment' => $archivedassistances->target_date_enrollment,
            'completion_date_enrollment' => $archivedassistances->completion_date_enrollment,
            'servedby_enrollment' => $archivedassistances->servedby_enrollment,
            'conform_enrollment' => $archivedassistances->conform_enrollment,

            // Insurance Claim
            'insurance_claim' => $archivedassistances->insurance_claim,
            'evaluation_insurance_claim' => $archivedassistances->evaluation_insurance_claim,
            'target_date_insurance_claim' => $archivedassistances->target_date_insurance_claim,
            'completion_date_insurance_claim' => $archivedassistances->completion_date_insurance_claim,
            'servedby_insurance_claim' => $archivedassistances->servedby_insurance_claim,
            'conform_insurance_claim' => $archivedassistances->conform_insurance_claim,

            // Production
            'production' => $archivedassistances->production,
            'evaluation_production' => $archivedassistances->evaluation_production,
            'target_date_production' => $archivedassistances->target_date_production,
            'completion_date_production' => $archivedassistances->completion_date_production,
            'servedby_production' => $archivedassistances->servedby_production,
            'conform_production' => $archivedassistances->conform_production,

            // Fertilizer
            'fertilizer' => $archivedassistances->fertilizer,
            'evaluation_fertilizer' => $archivedassistances->evaluation_fertilizer,
            'target_date_fertilizer' => $archivedassistances->target_date_fertilizer,
            'completion_date_fertilizer' => $archivedassistances->completion_date_fertilizer,
            'servedby_fertilizer' => $archivedassistances->servedby_fertilizer,
            'conform_fertilizer' => $archivedassistances->conform_fertilizer,

            // Feeding Inputs
            'feeding_inputs' => $archivedassistances->feeding_inputs,
            'evaluation_feeding_inputs' => $archivedassistances->evaluation_feeding_inputs,
            'target_date_feeding_inputs' => $archivedassistances->target_date_feeding_inputs,
            'completion_date_feeding_inputs' => $archivedassistances->completion_date_feeding_inputs,
            'servedby_feeding_inputs' => $archivedassistances->servedby_feeding_inputs,
            'conform_feeding_inputs' => $archivedassistances->conform_feeding_inputs,
       
            // Pest Control
            'pest_control' => $archivedassistances->pest_control,
            'evaluation_pest_control' => $archivedassistances->evaluation_pest_control,
            'target_date_pest_control' => $archivedassistances->target_date_pest_control,
            'completion_date_pest_control' => $archivedassistances->completion_date_pest_control,
            'servedby_pest_control' => $archivedassistances->servedby_pest_control,
            'conform_pest_control' => $archivedassistances->conform_pest_control,

            // Irrigation
            'irrigation' => $archivedassistances->irrigation,
            'evaluation_irrigation' => $archivedassistances->evaluation_irrigation,
            'target_date_irrigation' => $archivedassistances->target_date_irrigation,
            'completion_date_irrigation' => $archivedassistances->completion_date_irrigation,
            'servedby_irrigation' => $archivedassistances->servedby_irrigation,
            'conform_irrigation' => $archivedassistances->conform_irrigation,

            // Post Harvest
            'post_harvest' => $archivedassistances->post_harvest,
            'evaluation_post_harvest' => $archivedassistances->evaluation_post_harvest,
            'target_date_post_harvest' => $archivedassistances->target_date_post_harvest,
            'completion_date_post_harvest' => $archivedassistances->completion_date_post_harvest,
            'servedby_post_harvest' => $archivedassistances->servedby_post_harvest,
            'conform_post_harvest' => $archivedassistances->conform_post_harvest,

            // Harvester
            'harvester' => $archivedassistances->harvester,
            'evaluation_harvester' => $archivedassistances->evaluation_harvester,
            'target_date_harvester' => $archivedassistances->target_date_harvester,
            'completion_date_harvester' => $archivedassistances->completion_date_harvester,
            'servedby_harvester' => $archivedassistances->servedby_harvester,
            'conform_harvester' => $archivedassistances->conform_harvester,

            // Hauling
            'hauling' => $archivedassistances->hauling,
            'evaluation_hauling' => $archivedassistances->evaluation_hauling,
            'target_date_hauling' => $archivedassistances->target_date_hauling,
            'completion_date_hauling' => $archivedassistances->completion_date_hauling,
            'servedby_hauling' => $archivedassistances->servedby_hauling,
            'conform_hauling' => $archivedassistances->conform_hauling,

            // Drying
            'drying' => $archivedassistances->drying,
            'evaluation_drying' => $archivedassistances->evaluation_drying,
            'target_date_drying' => $archivedassistances->target_date_drying,
            'completion_date_drying' => $archivedassistances->completion_date_drying,
            'servedby_drying' => $archivedassistances->servedby_drying,
            'conform_drying' => $archivedassistances->conform_drying,

            // Milling
            'milling' => $archivedassistances->milling,
            'evaluation_milling' => $archivedassistances->evaluation_milling,
            'target_date_milling' => $archivedassistances->target_date_milling,
            'completion_date_milling' => $archivedassistances->completion_date_milling,
            'servedby_milling' => $archivedassistances->servedby_milling,
            'conform_milling' => $archivedassistances->conform_milling,

            // Grading
            'grading' => $archivedassistances->grading,
            'evaluation_grading' => $archivedassistances->evaluation_grading,
            'target_date_grading' => $archivedassistances->target_date_grading,
            'completion_date_grading' => $archivedassistances->completion_date_grading,
            'servedby_grading' => $archivedassistances->servedby_grading,
            'conform_grading' => $archivedassistances->conform_grading,

            // Marketing
            'marketing' => $archivedassistances->marketing,
            'evaluation_marketing' => $archivedassistances->evaluation_marketing,
            'target_date_marketing' => $archivedassistances->target_date_marketing,
            'completion_date_marketing' => $archivedassistances->completion_date_marketing,
            'servedby_marketing' => $archivedassistances->servedby_marketing,
            'conform_marketing' => $archivedassistances->conform_marketing,

              // Others
              'others' => $archivedassistances->others,
              'evaluation_others' => $archivedassistances->evaluation_others,
              'target_date_others' => $archivedassistances->target_date_others,
              'completion_date_others' => $archivedassistances->completion_date_others,
              'servedby_others' => $archivedassistances->servedby_others,
              'conform_others' => $archivedassistances->conform_others,
  
              // Notes
              'notes' => $archivedassistances->notes,
  
              // Image Uploads and Previews
            'imageUpload1' => $archivedassistances->imageUpload1,
            'imageUpload2' => $archivedassistances->imageUpload2,
            
              // Special Notes
              'special_notes' => $archivedassistances->special_notes,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedassistances->delete();

       return response()->json(['success' => true]);
   }


   // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING //

      
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $assistance  = Assistance::where($where)->first();
      
        return Response()->json($assistance);
    }
      
      
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
        {
            $assistance = ArchivedAssistances::findOrFail($request->id);

            // Delete image files
            $imagePath1 = public_path($assistance->imageUpload1);
            $imagePath2 = public_path($assistance->imageUpload2);

            if (file_exists($imagePath1)) {
                unlink($imagePath1);
            }

            if (file_exists($imagePath2)) {
                unlink($imagePath2);
            }

            // Update the database to remove image paths
            $assistance->update([
                'imageUpload1' => null,
                'imageUpload2' => null,
            ]);

            // Delete the assistance record
            $assistance->delete();

            return response()->json(['message' => 'Assistance and associated images deleted successfully.']);
        }


    
    
}
