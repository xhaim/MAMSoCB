<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livestockpopulation;
use App\Models\ArchivedLivestockpopulations;

class ArchiveController extends Controller
{
    public function archiveOldData()
    {
        // Get current year
        $currentYear = date('Y');

        // Get data to be archived based on condition (created at less than 1 year from current year)
        $dataToArchive = Livestockpopulation::whereYear('created_at', '<', $currentYear - 1)->get();

        // Archive data
        foreach ($dataToArchive as $data) {
            // Create archived record
            $archivedData = new ArchivedLivestockpopulations();
            $archivedData->name = $data->name;
            $archivedData->kabawm = $data->kabawm;
            $archivedData->kabawf = $data->kabawf;
            $archivedData->totalkabaw = $data->totalkabaw;
            $archivedData->bakam = $data->bakam;
            $archivedData->bakaf = $data->bakaf;
            $archivedData->totalbaka = $data->totalbaka;
            $archivedData->baboyf = $data->baboyf;
            $archivedData->baboym = $data->baboym;
            $archivedData->totalbaboy = $data->totalbaboy;
            $archivedData->kandingm = $data->kandingm;
            $archivedData->kandingf = $data->kandingf;
            $archivedData->totalkanding = $data->totalkanding;
            $archivedData->kabayom = $data->kabayom;
            $archivedData->kabayof = $data->kabayof;
            $archivedData->totalkabayo = $data->totalkabayo;
            $archivedData->irom = $data->irom;
            $archivedData->irof = $data->irof;
            $archivedData->totaliro = $data->totaliro;
            $archivedData->manokf = $data->manokf;
            $archivedData->manokm = $data->manokm;
            $archivedData->totalmanok = $data->totalmanok;
            $archivedData->bebem = $data->bebem;
            $archivedData->bebef = $data->bebef;
            $archivedData->totalbebe = $data->totalbebe;
            $archivedData->quailm = $data->quailm;
            $archivedData->quailf = $data->quailf;
            $archivedData->totalquail = $data->totalquail;
            $archivedData->broilerm = $data->broilerm;
            $archivedData->broilerf = $data->broilerf;
            $archivedData->totalbroiler = $data->totalbroiler;
            $archivedData->rabbitm = $data->rabbitm;
            $archivedData->rabbitf = $data->rabbitf;
            $archivedData->totalrabbit = $data->totalrabbit;

            // Save archived data
            $archivedData->save();

            // Delete data from main table
            $data->delete();
        }

        return response()->json(['message' => 'Data archived successfully']);
    }
}
