<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CornAjaxController;
use App\Http\Controllers\AssociationAjaxCRUDController;
use App\Http\Controllers\RiceSeedsAjaxCRUDController;
use App\Http\Controllers\VegSeedsAjaxCRUDController;
use App\Http\Controllers\CornSeedsAjaxCRUDController;
use App\Http\Controllers\LivestockAjaxCRUDController;
use App\Http\Controllers\FertilizerAjaxCRUDController;
use App\Http\Controllers\RentalAjaxCRUDController;
use App\Http\Controllers\RiceHybridAjaxCrudContoller;
use App\Http\Controllers\RegistryAjaxCrudController;
use App\Http\Controllers\DataTableAjaxCRUDController;
use App\Http\Controllers\VegetableAjaxCRUDController; 
use App\Http\Controllers\RootcropAjaxCRUDController;
use App\Http\Controllers\CacaoAjaxCRUDController;
use App\Http\Controllers\CoffeeAjaxCRUDController; 
use App\Http\Controllers\FruitsAjaxCRUDController; 
use App\Http\Controllers\BambooAjaxCRUDController;
use App\Http\Controllers\LivestockPopulationAjaxCRUDController;
use App\Http\Controllers\ROMSAjaxCRUDController; 
use App\Http\Controllers\VaccinationAjaxCRUDController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dash;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\CsvAssistanceImportController;
use App\Http\Controllers\VegReqController;
use App\Http\Controllers\AssistanceAjaxCRUDController;
use App\Http\Controllers\CsvLivestockController;
use App\Http\Controllers\YearlyArchiveController;
use App\Http\Controllers\ArchiveController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/registry-printable', function () {
    return view('admin.registry.registry-printable');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'checkRole:superad']], function () {
    // user management
    Route::get('user-management', [UserController::class, 'index']);
    Route::post('store-user', [UserController::class, 'store']);
    Route::post('edit-user', [UserController::class, 'edit']);
    Route::post('delete-user', [UserController::class, 'destroy']);
    Route::get('get-user-details/{id}', [UserController::class, 'getUserDetails'])->name('user.details');
    Route::get('/register', function () {
        return view('dashboard');
    }); 

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [Dash::class, 'showRowCount']);

// association
Route::get('assoc-crud-datatable', [AssociationAjaxCRUDController::class, 'index']);
Route::post('store-assoc', [AssociationAjaxCRUDController::class, 'store']);
Route::post('edit-assoc', [AssociationAjaxCRUDController::class, 'edit']);
Route::post('delete-assoc', [AssociationAjaxCRUDController::class, 'destroy']);
Route::get('get-association-details/{id}', [AssociationAjaxCrudController::class, 'getAssociationDetails'])->name('association.details');
Route::get('/print-assoc', [AssociationAjaxCrudController::class, 'fetchData']);
Route::get('/print-assocbar', [AssociationAjaxCrudController::class, 'fetchSpecificBarangay']);

Route::post('/assoc/archive', [AssociationAjaxCrudController::class, 'archive'])->name('assoc.archive');
Route::post('/assoc/restore', [AssociationAjaxCrudController::class, 'restore'])->name('assoc.restore');
Route::get('assoc-archive-datatable', [AssociationAjaxCrudController::class, 'archive_index']);
// Add this route to your web.php file
Route::post('/check-association', [AssociationAjaxCrudController::class, 'checkAssociation'])->name('check.association');


// corn
Route::get('corn-crud-datatable', [CornAjaxController::class, 'index']);
Route::post('store-corn', [CornAjaxController::class, 'store']);
Route::post('edit-corn', [CornAjaxController::class, 'edit']);
Route::post('delete-corn', [CornAjaxController::class, 'destroy']);
Route::get('/print-corn', [CornAjaxController::class, 'fetchData']);
Route::get('/print-cornbar', [CornAjaxController::class, 'fetchSpecificBarangay']);

Route::post('/corn/archive', [CornAjaxController::class, 'archive'])->name('corn.archive');
Route::post('/corn/restore', [CornAjaxController::class, 'restore'])->name('corn.restore');
Route::get('corn-archive-datatable', [CornAjaxController::class, 'archive_index']);
Route::post('/check-rsbsa-corn',[CornAjaxController::class, 'checkRsbsa'])->name('check.rsbsa.corn');

// rice seeds
Route::get('riceseeds-crud-datatable', [RiceSeedsAjaxCRUDController::class, 'index']);
Route::post('store-riceseeds', [RiceSeedsAjaxCRUDController::class, 'store']);
Route::post('edit-riceseeds', [RiceSeedsAjaxCRUDController::class, 'edit']);
Route::post('delete-riceseeds', [RiceSeedsAjaxCRUDController::class, 'destroy']);

Route::post('/rice-seeds/archive', [RiceSeedsAjaxCrudController::class, 'archive'])->name('rice-seeds.archive');
Route::post('/rice-seeds/restore', [RiceSeedsAjaxCrudController::class, 'restore'])->name('rice-seeds.restore');
Route::get('riceseeds-archive-datatable', [RiceSeedsAjaxCRUDController::class, 'archive_index']);


// Vegetable seeds
Route::get('vegseeds-crud-datatable', [VegSeedsAjaxCRUDController::class, 'index']);
Route::post('store-vegseeds', [VegSeedsAjaxCRUDController::class, 'store']);
Route::post('edit-vegseeds', [VegSeedsAjaxCRUDController::class, 'edit']);
Route::post('delete-vegseeds', [VegSeedsAjaxCRUDController::class, 'destroy']);

Route::post('/vegseeds/archive', [VegSeedsAjaxCRUDController::class, 'archive'])->name('vegseeds.archive');
Route::post('/vegseeds/restore', [VegSeedsAjaxCRUDController::class, 'restore'])->name('vegseeds.restore');
Route::get('vegseeds-archive-datatable', [VegSeedsAjaxCRUDController::class, 'archive_index']);

// corn Seeds
Route::get('cornseeds-crud-datatable', [CornSeedsAjaxCRUDController::class, 'index']);
Route::post('store-cornseeds', [CornSeedsAjaxCRUDController::class, 'store']);
Route::post('edit-cornseeds', [CornSeedsAjaxCRUDController::class, 'edit']);
Route::post('delete-cornseeds', [CornSeedsAjaxCRUDController::class, 'destroy']);

Route::post('/cornseeds/archive', [CornSeedsAjaxCRUDController::class, 'archive'])->name('cornseeds.archive');
Route::post('/cornseeds/restore', [CornSeedsAjaxCRUDController::class, 'restore'])->name('cornseeds.restore');
Route::get('cornseeds-archive-datatable', [CornSeedsAjaxCRUDController::class, 'archive_index']);

// livestock
Route::get('livestock-crud-datatable', [LivestockAjaxCRUDController::class, 'index']);
Route::post('store-livestock', [LivestockAjaxCRUDController::class, 'store']);
Route::post('edit-livestock', [LivestockAjaxCRUDController::class, 'edit']);
Route::post('delete-livestock', [LivestockAjaxCRUDController::class, 'destroy']);
Route::get('/print-livestock', [LivestockAjaxCRUDController::class, 'fetchData']);

Route::post('/livestock/archive', [LivestockAjaxCRUDController::class, 'archive'])->name('livestock.archive');
Route::post('/livestock/restore', [LivestockAjaxCRUDController::class, 'restore'])->name('livestock.restore');
Route::get('livestock-archive-datatable', [LivestockAjaxCRUDController::class, 'archive_index']);
Route::post('/check-rsbsa-livestock', [LivestockAjaxCRUDController::class, 'checkRsbsa'])->name('check.rsbsa.livestock');


// Fertilizer
Route::get('fert-crud-datatable', [FertilizerAjaxCRUDController::class, 'index']);
Route::post('store-fert', [FertilizerAjaxCRUDController::class, 'store']);
Route::post('edit-fert', [FertilizerAjaxCRUDController::class, 'edit']);
Route::post('delete-fert', [FertilizerAjaxCRUDController::class, 'destroy']);

Route::post('/fert/archive', [FertilizerAjaxCRUDController::class, 'archive'])->name('fert.archive');
Route::post('/fert/restore', [FertilizerAjaxCRUDController::class, 'restore'])->name('fert.restore');
Route::get('fert-archive-datatable', [FertilizerAjaxCRUDController::class, 'archive_index']);

// Rental Tractor
Route::get('rental-crud-datatable', [RentalAjaxCRUDController::class, 'index']);
Route::post('store-rental', [RentalAjaxCRUDController::class, 'store']);
Route::post('edit-rental', [RentalAjaxCRUDController::class, 'edit']);
Route::post('delete-rental', [RentalAjaxCRUDController::class, 'destroy']);
Route::get('get-rental-details/{id}', [RentalAjaxCRUDController::class, 'getRentalDetails'])->name('rental.details');
Route::post('/check-schedule-conflict', [RentalAjaxCRUDController::class ,'checkScheduleConflict']);

Route::post('/rental/archive', [RentalAjaxCRUDController::class, 'archive'])->name('rental.archive');
Route::post('/rental/restore', [RentalAjaxCRUDController::class, 'restore'])->name('rental.restore');
Route::get('rental-archive-datatable', [RentalAjaxCRUDController::class, 'archive_index']);

// Rice Hybrid
Route::get('ricehybrid-crud-datatable', [RiceHybridAjaxCrudContoller::class, 'index']);
Route::post('store-ricehybrid', [RiceHybridAjaxCrudContoller::class, 'store']);
Route::post('edit-ricehybrid', [RiceHybridAjaxCrudContoller::class, 'edit']);
Route::post('delete-ricehybrid', [RiceHybridAjaxCrudContoller::class, 'destroy']);

Route::get('get-farmer-details/{id}', [RiceHybridAjaxCrudContoller::class, 'getFarmerDetails'])->name('farmer.details');
Route::get('/print-rice', [RiceHybridAjaxCrudContoller::class, 'fetchData']);
Route::get('/print-ricebar', [RiceHybridAjaxCrudContoller::class, 'fetchSpecificBarangay']);

Route::post('/ricehybrid/archive', [RiceHybridAjaxCrudContoller::class, 'archive'])->name('ricehybrid.archive');
Route::post('/ricehybrid/restore', [RiceHybridAjaxCrudContoller::class, 'restore'])->name('ricehybrid.restore');
Route::get('ricehybrid-archive-datatable', [RiceHybridAjaxCrudContoller::class, 'archive_index']);
Route::post('/check-rsbsa',[RiceHybridAjaxCrudContoller::class, 'checkRsbsa'])->name('check.rsbsa');


// Registry
Route::get('registry-crud-datatable', [RegistryAjaxCrudController::class, 'index']);
Route::post('store-registry', [RegistryAjaxCrudController::class, 'store']);
Route::post('edit-registry', [RegistryAjaxCrudController::class, 'edit']);
Route::post('delete-registry', [RegistryAjaxCrudController::class, 'destroy']);
Route::get('get-registry-details/{id}', [RegistryAjaxCrudController::class, 'getRegistryDetails'])->name('farmer.details');

Route::get('/upload-csv-registry', [CsvImportController::class, 'showForm']);
Route::post('/upload-csv-registry', [CsvImportController::class, 'import']);

Route::post('/registry/archive', [RegistryAjaxCrudController::class, 'archive'])->name('registry.archive');
Route::post('/registry/restore', [RegistryAjaxCrudController::class, 'restore'])->name('registry.restore');
Route::get('registry-archive-datatable', [RegistryAjaxCrudController::class, 'archive_index']);
// Add this route to your web.php file
Route::post('/check-rsbsa-id', [RegistryAjaxCrudController::class, 'checkRsbsaId'])->name('check.rsbsa_id');




// Fishery
Route::get('fishery-crud-datatable', [DataTableAjaxCRUDController::class, 'index']);
Route::post('store-fishery', [DataTableAjaxCRUDController::class, 'store']);
Route::post('edit-fishery', [DataTableAjaxCRUDController::class, 'edit']);
Route::post('delete-fishery', [DataTableAjaxCRUDController::class, 'destroy']);

Route::post('/fishery/archive', [DataTableAjaxCRUDController::class, 'archive'])->name('fishery.archive');
Route::post('/fishery/restore', [DataTableAjaxCRUDController::class, 'restore'])->name('fishery.restore');
Route::get('fishery-archive-datatable', [DataTableAjaxCRUDController::class, 'archive_index']);
Route::get('get-fishery-details/{id}', [DataTableAjaxCRUDController::class, 'getFisheryDetails'])->name('fishery.details');

Route::post('/check-registration-no', [DataTableAjaxCRUDController::class, 'checkRegistrationNo'])->name('check.registration_no');


// vegetable
Route::get('veg-crud-datatable', [VegetableAjaxCRUDController::class, 'index']);
Route::post('store-veg', [VegetableAjaxCRUDController::class, 'store']);
Route::post('edit-veg', [VegetableAjaxCRUDController::class, 'edit']);
Route::post('delete-veg', [VegetableAjaxCRUDController::class, 'destroy']);
Route::get('/print-veg', [VegetableAjaxCRUDController::class, 'fetchData']);
Route::get('/print-vegbar', [VegetableAjaxCRUDController::class, 'fetchSpecificBarangay']);

Route::post('/veg/archive', [VegetableAjaxCRUDController::class, 'archive'])->name('veg.archive');
Route::post('/veg/restore', [VegetableAjaxCRUDController::class, 'restore'])->name('veg.restore');
Route::get('veg-archive-datatable', [VegetableAjaxCRUDController::class, 'archive_index']);
// Add this route to your web.php file
Route::post('/check-farmer-name', [VegetableAjaxCRUDController::class, 'checkFarmerName'])->name('check.farmer_name');


//Rootcrops
Route::get('root-crud-datatable', [RootcropAjaxCRUDController::class, 'index']);
Route::post('store-root', [RootcropAjaxCRUDController::class, 'store']);
Route::post('edit-root', [RootcropAjaxCRUDController::class, 'edit']);
Route::post('delete-root', [RootcropAjaxCRUDController::class, 'destroy']);
Route::get('/print-root', [RootcropAjaxCRUDController::class, 'fetchData']);
Route::get('/print-rootbar', [RootcropAjaxCRUDController::class, 'fetchSpecificBarangay']);

Route::post('/root/archive', [RootcropAjaxCRUDController::class, 'archive'])->name('root.archive');
Route::post('/root/restore', [RootcropAjaxCRUDController::class, 'restore'])->name('root.restore');
Route::get('root-archive-datatable', [RootcropAjaxCRUDController::class, 'archive_index']);
Route::post('/check-name-root', [RootcropAjaxCRUDController::class, 'checkName'])->name('check.name.root');

// Cacao
Route::get('cacao-crud-datatable', [CacaoAjaxCRUDController::class, 'index']);
Route::post('store-cacao', [CacaoAjaxCRUDController::class, 'store']);
Route::post('edit-cacao', [CacaoAjaxCRUDController::class, 'edit']);
Route::post('delete-cacao', [CacaoAjaxCRUDController::class, 'destroy']);
Route::get('/print-cacao', [CacaoAjaxCRUDController::class, 'fetchData']);
Route::get('/print-cacaobar', [CacaoAjaxCRUDController::class, 'fetchSpecificBarangay']);

Route::post('/cacao/archive', [CacaoAjaxCRUDController::class, 'archive'])->name('cacao.archive');
Route::post('/cacao/restore', [CacaoAjaxCRUDController::class, 'restore'])->name('cacao.restore');
Route::get('cacao-archive-datatable', [CacaoAjaxCRUDController::class, 'archive_index']);
Route::post('/check-name-cacao', [CacaoAjaxCRUDController::class, 'checkName'])->name('check.name.cacao');

// coffee
Route::get('coffee-crud-datatable', [CoffeeAjaxCRUDController::class, 'index']);
Route::post('store-coffee', [CoffeeAjaxCRUDController::class, 'store']);
Route::post('edit-coffee', [CoffeeAjaxCRUDController::class, 'edit']);
Route::post('delete-coffee', [CoffeeAjaxCRUDController::class, 'destroy']);
Route::get('/print-coffee', [CoffeeAjaxCRUDController::class, 'fetchData']);
Route::get('/print-coffeebar', [CoffeeAjaxCRUDController::class, 'fetchSpecificBarangay']);

Route::post('/coffee/archive', [CoffeeAjaxCRUDController::class, 'archive'])->name('coffee.archive');
Route::post('/coffee/restore', [CoffeeAjaxCRUDController::class, 'restore'])->name('coffee.restore');
Route::get('coffee-archive-datatable', [CoffeeAjaxCRUDController::class, 'archive_index']);

// fruits
Route::get('fruits-crud-datatable', [FruitsAjaxCRUDController::class, 'index']);
Route::post('store-fruits', [FruitsAjaxCRUDController::class, 'store']);
Route::post('edit-fruits', [FruitsAjaxCRUDController::class, 'edit']);
Route::post('delete-fruits', [FruitsAjaxCRUDController::class, 'destroy']);
Route::get('/print-fruits', [FruitsAjaxCRUDController::class, 'fetchData']);
Route::get('/print-fruitsbar', [FruitsAjaxCRUDController::class, 'fetchSpecificBarangay']);

Route::post('/fruits/archive', [FruitsAjaxCRUDController::class, 'archive'])->name('fruits.archive');
Route::post('/fruits/restore', [FruitsAjaxCRUDController::class, 'restore'])->name('fruits.restore');
Route::get('fruits-archive-datatable', [FruitsAjaxCRUDController::class, 'archive_index']);

// bamboo
Route::get('bamboo-crud-datatable', [BambooAjaxCRUDController::class, 'index']);
Route::post('store-bamboo', [BambooAjaxCRUDController::class, 'store']);
Route::post('edit-bamboo', [BambooAjaxCRUDController::class, 'edit']);
Route::post('delete-bamboo', [BambooAjaxCRUDController::class, 'destroy']);
Route::get('/print-bamboo', [BambooAjaxCRUDController::class, 'fetchData']);
Route::get('/print-bamboobar', [BambooAjaxCRUDController::class, 'fetchSpecificBarangay']);

Route::post('/bamboo/archive', [BambooAjaxCRUDController::class, 'archive'])->name('bamboo.archive');
Route::post('/bamboo/restore', [BambooAjaxCRUDController::class, 'restore'])->name('bamboo.restore');
Route::get('bamboo-archive-datatable', [BambooAjaxCRUDController::class, 'archive_index']);

// Livestockpopu
Route::get('popu-crud-datatable', [LivestockPopulationAjaxCRUDController::class, 'index']);
Route::post('store-popu', [LivestockPopulationAjaxCRUDController::class, 'store']);
Route::post('edit-popu', [LivestockPopulationAjaxCRUDController::class, 'edit']);
Route::post('delete-popu', [LivestockPopulationAjaxCRUDController::class, 'destroy']);
Route::get('/print-popu', [LivestockPopulationAjaxCRUDController::class, 'fetchData']);

Route::post('/popu/archive', [LivestockPopulationAjaxCRUDController::class, 'archive'])->name('popu.archive');
Route::post('/popu/restore', [LivestockPopulationAjaxCRUDController::class, 'restore'])->name('popu.restore');
Route::get('popu-archive-datatable', [LivestockPopulationAjaxCRUDController::class, 'archive_index']);

Route::get('/upload-csv-popu', [CsvLivestockController::class, 'showForm']);
Route::post('/upload-csv-popu', [CsvLivestockController::class, 'import']);


// ROMS
Route::get('roms-crud-datatable', [ROMSAjaxCRUDController::class, 'index']);
Route::post('store-roms', [ROMSAjaxCRUDController::class, 'store']);
Route::post('edit-roms', [ROMSAjaxCRUDController::class, 'edit']);
Route::post('delete-roms', [ROMSAjaxCRUDController::class, 'destroy']);
Route::get('/print-roms', [ROMSAjaxCRUDController::class, 'fetchData']);

Route::post('/roms/archive', [ROMSAjaxCRUDController::class, 'archive'])->name('roms.archive');
Route::post('/roms/restore', [ROMSAjaxCRUDController::class, 'restore'])->name('roms.restore');
Route::get('roms-archive-datatable', [ROMSAjaxCRUDController::class, 'archive_index']);
// Add this route to your web.php file
Route::post('/check-name', [ROMSAjaxCRUDController::class, 'checkName'])->name('check.name');



// vaccination
Route::get('vacc-crud-datatable', [VaccinationAjaxCRUDController::class, 'index']);
Route::post('store-vacc', [VaccinationAjaxCRUDController::class, 'store']);
Route::post('edit-vacc', [VaccinationAjaxCRUDController::class, 'edit']);
Route::post('delete-vacc', [VaccinationAjaxCRUDController::class, 'destroy']);
Route::get('/print-vacc', [VaccinationAjaxCRUDController::class, 'fetchData']);

Route::post('/vacc/archive', [VaccinationAjaxCRUDController::class, 'archive'])->name('vacc.archive');
Route::post('/vacc/restore', [VaccinationAjaxCRUDController::class, 'restore'])->name('vacc.restore');
Route::get('vacc-archive-datatable', [VaccinationAjaxCRUDController::class, 'archive_index']);

// veg req
Route::get('vegreq-crud-datatable', [VegReqController::class, 'index']);
Route::post('store-vegreq', [VegReqController::class, 'store']);
Route::post('edit-vegreq', [VegReqController::class, 'edit']);
Route::post('delete-vegreq', [VegReqController::class, 'destroy']);

Route::post('/vegreq/archive', [VegReqController::class, 'archive'])->name('vegreq.archive');
Route::post('/vegreq/restore', [VegReqController::class, 'restore'])->name('vegreq.restore');
Route::get('vegreq-archive-datatable', [VegReqController::class, 'archive_index']);

//assistance
Route::get('assistance-crud-datatable', [AssistanceAjaxCRUDController::class, 'index']);
Route::post('store-assistance', [AssistanceAjaxCRUDController::class, 'store']);
Route::post('store-assistance-withIMG', [AssistanceAjaxCRUDController::class, 'storeWithIMG']);
Route::post('edit-assistance', [AssistanceAjaxCRUDController::class, 'edit']);
Route::post('delete-assistance', [AssistanceAjaxCRUDController::class, 'destroy']);

Route::post('/assistance/archive', [AssistanceAjaxCRUDController::class, 'archive'])->name('vegreq.archive');
Route::post('/assistance/restore', [AssistanceAjaxCRUDController::class, 'restore'])->name('vegreq.restore');
Route::get('assistance-archive-datatable', [AssistanceAjaxCRUDController::class, 'archive_index']);

Route::get('/upload-csv', [CsvAssistanceImportController::class, 'showForm']);
Route::post('/upload-csv', [CsvAssistanceImportController::class, 'import']);
Route::get('get-assistance-details/{id}', [AssistanceAjaxCRUDController::class, 'getAssistanceDetails'])->name('assistance.details');

// Route::get('/archive', [YearlyArchiveController::class, 'archiveOldData']);

Route::get('/archive-old-data', [ArchiveController::class, 'archiveOldData']);

});