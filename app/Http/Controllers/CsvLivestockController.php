<?php

namespace App\Http\Controllers;

use App\Models\Livestockpopulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CsvLivestockController extends Controller
{
    public function showForm()
    {
        return view('csv.importLivestockPopulation');
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
                'name' => $rowData['name'],
                'kabawm' => $rowData['kabaw_male'],
                'kabawf' => $rowData['kabaw_female'],
                'totalkabaw' => $rowData['total_kabaw'],
                'bakam' => $rowData['baka_male'],
                'bakaf' => $rowData['baka_female'],
                'totalbaka' => $rowData['total_baka'],
                'baboyf' => $rowData['anay'],
                'baboym' => $rowData['butakal'],
                'totalbaboy' => $rowData['total_baboy'],
                'kandingm' => $rowData['kanding_male'],
                'kandingf' => $rowData['kanding_female'],
                'totalkanding' => $rowData['total_kanding'],
                'kabayom' => $rowData['kabayo_male'],
                'kabayof' => $rowData['kabayo_female'],
                'totalkabayo' => $rowData['total_kabayo'],
                'irom' => $rowData['iro_male'],
                'irof' => $rowData['iro_female'],
                'totaliro' => $rowData['total_iro'],
                'manokf' => $rowData['manok_female'],
                'manokm' => $rowData['manok_male'],
                'totalmanok' => $rowData['total_manok'],
                'bebem' => $rowData['bebe_male'],
                'bebef' => $rowData['bebe_female'],
                'totalbebe' => $rowData['total_bebe'],
                'quailm' => $rowData['quail_male'],
                'quailf' => $rowData['quail_female'],
                'totalquail' => $rowData['total_quail'],
                'broilerm' => $rowData['broiler_male'],
                'broilerf' => $rowData['broiler_female'],
                'totalbroiler' => $rowData['total_broiler'],
                'rabbitm' => $rowData['rabbit_male'],
                'rabbitf' => $rowData['rabbit_female'],
                'totalrabbit' => $rowData['total_rabbit'],
                'created_at' => Carbon::now(), 
            ];
            
            // Insert data into the database
            DB::table('livestockpopulations')->insert($registryData);
        }

        return redirect('/popu-crud-datatable')->with('success', 'CSV imported successfully.');
    }
}
