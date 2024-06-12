<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// source models
use App\Models\Assistance;
use App\Models\Association;
use App\Models\Bamboo;
use App\Models\Cacao;
use App\Models\Coffee;
use App\Models\Corn;
use App\Models\CornSeeds;
use App\Models\Fert;
use App\Models\Fishery;
use App\Models\Fruits;
use App\Models\Livestock;
use App\Models\Livestockpopulation;
use App\Models\Registry;
use App\Models\Rental;
use App\Models\Ricehybrid;
use App\Models\Riceseeds;
use App\Models\Roms;
use App\Models\RootCrops;
use App\Models\Vacc;
use App\Models\Vegetable;
use App\Models\Vegreq;
use App\Models\VegSeeds;

// archive models
use App\Models\ArchivedAssistances;
use App\Models\ArchivedAssociations;
use App\Models\ArchivedBamboos;
use App\Models\ArchivedCacaos;
use App\Models\ArchivedCoffees;
use App\Models\ArchivedCorns;
use App\Models\ArchivedCornSeeds;
use App\Models\ArchivedFerts;
use App\Models\ArchivedFisheries;
use App\Models\ArchivedFruits;
use App\Models\ArchivedLivestocks;
use App\Models\ArchivedLivestockpopulations;
use App\Models\ArchivedRegistries;
use App\Models\ArchivedRentals;
use App\Models\ArchivedRicehybrids;
use App\Models\ArchivedRiceseeds;
use App\Models\ArchivedRoms;
use App\Models\ArchivedRootCrops;
use App\Models\ArchivedVaccs;
use App\Models\ArchivedVegetables;
use App\Models\ArchivedVegreqs;
use App\Models\ArchivedVegSeeds;

class YearlyArchiveController extends Controller
{
    public function archiveOldData()
    {
        // Get the current year
        $currentYear = date('Y');

        // Calculate the year 1 year ago
        $oneYearAgo = $currentYear - 1;

        // Archive old records from each source table to respective archived table
        $this->archiveRecords(Assistance::class, ArchivedAssistances::class, $oneYearAgo);
        $this->archiveRecords(Association::class, ArchivedAssociations::class, $oneYearAgo);
        $this->archiveRecords(Bamboo::class, ArchivedBamboos::class, $oneYearAgo);
        $this->archiveRecords(Cacao::class, ArchivedCacaos::class, $oneYearAgo);
        $this->archiveRecords(Coffee::class, ArchivedCoffees::class, $oneYearAgo);
        $this->archiveRecords(Corn::class, ArchivedCorns::class, $oneYearAgo);
        $this->archiveRecords(CornSeeds::class, ArchivedCornSeeds::class, $oneYearAgo);
        $this->archiveRecords(Fert::class, ArchivedFerts::class, $oneYearAgo);
        $this->archiveRecords(Fishery::class, ArchivedFisheries::class, $oneYearAgo);
        $this->archiveRecords(Fruits::class, ArchivedFruits::class, $oneYearAgo);
        $this->archiveRecords(Livestock::class, ArchivedLivestocks::class, $oneYearAgo);
        $this->archiveRecords(Livestockpopulation::class, ArchivedLivestockpopulations::class, $oneYearAgo);
        $this->archiveRecords(Registry::class, ArchivedRegistries::class, $oneYearAgo);
        $this->archiveRecords(Rental::class, ArchivedRentals::class, $oneYearAgo);
        $this->archiveRecords(Ricehybrid::class, ArchivedRicehybrids::class, $oneYearAgo);
        $this->archiveRecords(Riceseeds::class, ArchivedRiceseeds::class, $oneYearAgo);
        $this->archiveRecords(Roms::class, ArchivedRoms::class, $oneYearAgo);
        $this->archiveRecords(RootCrops::class, ArchivedRootCrops::class, $oneYearAgo);
        $this->archiveRecords(Vacc::class, ArchivedVaccs::class, $oneYearAgo);
        $this->archiveRecords(Vegetable::class, ArchivedVegetables::class, $oneYearAgo);
        $this->archiveRecords(Vegreq::class, ArchivedVegreqs::class, $oneYearAgo);
        $this->archiveRecords(VegSeeds::class, ArchivedVegSeeds::class, $oneYearAgo);

        return response()->json(['message' => 'Data archived successfully'], 200);
    }

    // Helper function to archive records
    private function archiveRecords($sourceModel, $archivedModel, $oneYearAgo)
    {
        // Retrieve old records from source table where creation date is less than 1 year from the current date
        $oldRecords = $sourceModel::whereRaw("YEAR(created_at) < ?", [$oneYearAgo])->get();

        // Archive old records to archived table
        foreach ($oldRecords as $record) {
            // Transfer record to archived table
            $archivedModel::create($record->toArray());

            // Delete record from source table
            $record->delete();
        }
    }
}
