<?php

// app/Http/Controllers/CsvImportController.php
namespace App\Http\Controllers;

use App\Models\Registry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CsvImportController extends Controller
{
    public function showForm()
    {
        return view('csv.importRegistries');
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

            // Check if 'rsbsa_id' is already registered
            $existingRecord = DB::table('registries')
                ->where('rsbsa_id', $rowData['rsbsa_id'])
                ->first();

            // If 'rsbsa_id' is not already registered, insert the data
            if (!$existingRecord) {
                $registryData = [
                    
                'rsbsa_id' => $rowData['rsbsa_id'],
                'generated_id' => $rowData['generated_id'],
                'date_enrolled' => $rowData['date_enrolled'],

                'hh_member' => $rowData['hh_member'],
                'surname' => $rowData['surname'],
                'firstname' => $rowData['firstname'],
                'middlename' => $rowData['middlename'],
                'gender' => $rowData['gender'],
                'age' => $rowData['age'],
                'birthdate' => $rowData['birthdate'],

                'hh_member2' => $rowData['hh_member2'],
                'surname2' => $rowData['surname2'],
                'firstname2' => $rowData['firstname2'],
                'middlename2' => $rowData['middlename2'],
                'gender2' => $rowData['gender2'],
                'age2' => $rowData['age2'],
                'birthdate2' => $rowData['birthdate2'],

                'hh_member3' => $rowData['hh_member3'],
                'surname3' => $rowData['surname3'],
                'firstname3' => $rowData['firstname3'],
                'middlename3' => $rowData['middlename3'],
                'gender3' => $rowData['gender3'],
                'age3' => $rowData['age3'],
                'birthdate3' => $rowData['birthdate3'],

                'hh_member4' => $rowData['hh_member4'],
                'surname4' => $rowData['surname4'],
                'firstname4' => $rowData['firstname4'],
                'middlename4' => $rowData['middlename4'],
                'gender4' => $rowData['gender4'],
                'age4' => $rowData['age4'],
                'birthdate4' => $rowData['birthdate4'],

                'hh_member5' => $rowData['hh_member5'],
                'surname5' => $rowData['surname5'],
                'firstname5' => $rowData['firstname5'],
                'middlename5' => $rowData['middlename5'],
                'gender5' => $rowData['gender5'],
                'age5' => $rowData['age5'],
                'birthdate5' => $rowData['birthdate5'],

                'hh_member6' => $rowData['hh_member6'],
                'surname6' => $rowData['surname6'],
                'firstname6' => $rowData['firstname6'],
                'middlename6' => $rowData['middlename6'],
                'gender6' => $rowData['gender6'],
                'age6' => $rowData['age6'],
                'birthdate6' => $rowData['birthdate6'],
                
                'hh_member7' => $rowData['hh_member7'],
                'surname7' => $rowData['surname7'],
                'firstname7' => $rowData['firstname7'],
                'middlename7' => $rowData['middlename7'],
                'gender7' => $rowData['gender7'],
                'age7' => $rowData['age7'],
                'birthdate7' => $rowData['birthdate7'],
                
                'hh_member8' => $rowData['hh_member8'],
                'surname8' => $rowData['surname8'],
                'firstname8' => $rowData['firstname8'],
                'middlename8' => $rowData['middlename8'],
                'gender8' => $rowData['gender8'],
                'age8' => $rowData['age8'],
                'birthdate8' => $rowData['birthdate8'],
                
                'hh_member9' => $rowData['hh_member9'],
                'surname9' => $rowData['surname9'],
                'firstname9' => $rowData['firstname9'],
                'middlename9' => $rowData['middlename9'],
                'gender9' => $rowData['gender9'],
                'age9' => $rowData['age9'],
                'birthdate9' => $rowData['birthdate9'],
                
                'hh_member10' => $rowData['hh_member10'],
                'surname10' => $rowData['surname10'],
                'firstname10' => $rowData['firstname10'],
                'middlename10' => $rowData['middlename10'],
                'gender10' => $rowData['gender10'],
                'age10' => $rowData['age10'],
                'birthdate10' => $rowData['birthdate10'],

                'hh_member11' => $rowData['hh_member11'],
                'surname11' => $rowData['surname11'],
                'firstname11' => $rowData['firstname11'],
                'middlename11' => $rowData['middlename11'],
                'gender11' => $rowData['gender11'],
                'age11' => $rowData['age11'],
                'birthdate11' => $rowData['birthdate11'],
                
                'hh_member12' => $rowData['hh_member12'],
                'surname12' => $rowData['surname12'],
                'firstname12' => $rowData['firstname12'],
                'middlename12' => $rowData['middlename12'],
                'gender12' => $rowData['gender12'],
                'age12' => $rowData['age12'],
                'birthdate12' => $rowData['birthdate12'],
                
                'hh_member13' => $rowData['hh_member13'],
                'surname13' => $rowData['surname13'],
                'firstname13' => $rowData['firstname13'],
                'middlename13' => $rowData['middlename13'],
                'gender13' => $rowData['gender13'],
                'age13' => $rowData['age13'],
                'birthdate13' => $rowData['birthdate13'],
                
                'hh_member14' => $rowData['hh_member14'],
                'surname14' => $rowData['surname14'],
                'firstname14' => $rowData['firstname14'],
                'middlename14' => $rowData['middlename14'],
                'gender14' => $rowData['gender14'],
                'age14' => $rowData['age14'],
                'birthdate14' => $rowData['birthdate14'],
                
                'hh_member15' => $rowData['hh_member15'],
                'surname15' => $rowData['surname15'],
                'firstname15' => $rowData['firstname15'],
                'middlename15' => $rowData['middlename15'],
                'gender15' => $rowData['gender15'],
                'age15' => $rowData['age15'],
                'birthdate15' => $rowData['birthdate15'],
                
                'hh_member16' => $rowData['hh_member16'],
                'surname16' => $rowData['surname16'],
                'firstname16' => $rowData['firstname16'],
                'middlename16' => $rowData['middlename16'],
                'gender16' => $rowData['gender16'],
                'age16' => $rowData['age16'],
                'birthdate16' => $rowData['birthdate16'],
                
                'hh_member17' => $rowData['hh_member17'],
                'surname17' => $rowData['surname17'],
                'firstname17' => $rowData['firstname17'],
                'middlename17' => $rowData['middlename17'],
                'gender17' => $rowData['gender17'],
                'age17' => $rowData['age17'],
                'birthdate17' => $rowData['birthdate17'],
                
                'hh_member18' => $rowData['hh_member18'],
                'surname18' => $rowData['surname18'],
                'firstname18' => $rowData['firstname18'],
                'middlename18' => $rowData['middlename18'],
                'gender18' => $rowData['gender18'],
                'age18' => $rowData['age18'],
                'birthdate18' => $rowData['birthdate18'],
                
                'hh_member19' => $rowData['hh_member19'],
                'surname19' => $rowData['surname19'],
                'firstname19' => $rowData['firstname19'],
                'middlename19' => $rowData['middlename19'],
                'gender19' => $rowData['gender19'],
                'age19' => $rowData['age19'],
                'birthdate19' => $rowData['birthdate19'],
                
                'hh_member20' => $rowData['hh_member20'],
                'surname20' => $rowData['surname20'],
                'firstname20' => $rowData['firstname20'],
                'middlename20' => $rowData['middlename20'],
                'gender20' => $rowData['gender20'],
                'age20' => $rowData['age20'],
                'birthdate20' => $rowData['birthdate20'],
    
                'income_source' => $rowData['income_source'],
                'est_annual_income' => $rowData['est_annual_income'],
                'address' => $rowData['address'],
                'sitio_purok' => $rowData['sitio_purok'],
                'barangay' => $rowData['barangay'],
                'city' => $rowData['city'],
                'geo_coordinates' => $rowData['geo_coordinates'],
                'years_of_residency' => $rowData['years_of_residency'],

                'membership' => $rowData['membership'],
                'position' => $rowData['position'],
                'member_since' => $rowData['member_since'],
                'status' => $rowData['status'],
                
                'membership2' => $rowData['membership2'],
                'position2' => $rowData['position2'],
                'member_since2' => $rowData['member_since2'],
                'status2' => $rowData['status2'],

                'membership3' => $rowData['membership3'],
                'position3' => $rowData['position3'],
                'member_since3' => $rowData['member_since3'],
                'status3' => $rowData['status3'],

                'membership4' => $rowData['membership4'],
                'position4' => $rowData['position4'],
                'member_since4' => $rowData['member_since4'],
                'status4' => $rowData['status4'],

                'membership5' => $rowData['membership5'],
                'position5' => $rowData['position5'],
                'member_since5' => $rowData['member_since5'],
                'status5' => $rowData['status5'],

                'award' => $rowData['award'],
                'awarding_body' => $rowData['awarding_body'],
                'date_received' => $rowData['date_received'],

                'award2' => $rowData['award2'],
                'awarding_body2' => $rowData['awarding_body2'],
                'date_received2' => $rowData['date_received2'],

                'award3' => $rowData['award3'],
                'awarding_body3' => $rowData['awarding_body3'],
                'date_received3' => $rowData['date_received3'],

                'award4' => $rowData['award4'],
                'awarding_body4' => $rowData['awarding_body4'],
                'date_received4' => $rowData['date_received4'],

                'award5' => $rowData['award5'],
                'awarding_body5' => $rowData['awarding_body5'],
                'date_received5' => $rowData['date_received5'],

                
                'remarks' => $rowData['remarks'],

                'purok' => $rowData['purok'],
                'brngy' => $rowData['brngy'],
                'geographic_coordinates' => $rowData['geographic_coordinates'],
                'title_no' => $rowData['title_no'],
                'tax_declarration_no' => $rowData['tax_declarration_no'],
                'tenure' => json_encode($rowData['tenure']),
                'existing_crop' => $rowData['existing_crop'],
                'previous_crop' => $rowData['previous_crop'],
                'hectares' => $rowData['hectares'],
                'land' => json_encode($rowData['land']),
                'soil_type' => $rowData['soil_type'],
                'source' => json_encode($rowData['source']),
                'notes' => $rowData['notes'],

                'purok2' => $rowData['purok2'],
                'brngy2' => $rowData['brngy2'],
                'geographic_coordinates2' => $rowData['geographic_coordinates2'],
                'title_no2' => $rowData['title_no2'],
                'tax_declarration_no2' => $rowData['tax_declarration_no2'],
                'tenure2' => json_encode($rowData['tenure2']),
                'existing_crop2' => $rowData['existing_crop2'],
                'previous_crop2' => $rowData['previous_crop2'],
                'hectares2' => $rowData['hectares2'],
                'land2' => json_encode($rowData['land2']),
                'soil_type2' => $rowData['soil_type2'],
                'source2' => json_encode($rowData['source2']),
                'notes2' => $rowData['notes2'],
                
                'purok3' => $rowData['purok3'],
                'brngy3' => $rowData['brngy3'],
                'geographic_coordinates3' => $rowData['geographic_coordinates3'],
                'title_no3' => $rowData['title_no3'],
                'tax_declarration_no3' => $rowData['tax_declarration_no3'],
                'tenure3' => json_encode($rowData['tenure3']),
                'existing_crop3' => $rowData['existing_crop3'],
                'previous_crop3' => $rowData['previous_crop3'],
                'hectares3' => $rowData['hectares3'],
                'land3' => json_encode($rowData['land3']),
                'soil_type3' => $rowData['soil_type3'],
                'source3' => json_encode($rowData['source3']),
                'notes3' => $rowData['notes3'],
                
                // ... other fields ...
            ];

            // Insert data into the database
            DB::table('registries')->insert($registryData);
        }
    }
        return redirect('/registry-crud-datatable')->with('success', 'CSV imported successfully.');
    }
}
