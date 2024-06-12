<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

// Define the closure-based command
Artisan::command('transfer:old-data', function () {
    // Transfer old data to the destination table

    // ------------------------------------------------Livestock Population Schedule-------------------------------------//
    DB::statement('
        INSERT INTO archived_popus
        SELECT *
        FROM livestockpopulations
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM livestockpopulations
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');
    // ------------------------------------------------Livestock Population Schedule-------------------------------------//
    
     // ------------------------------------------------Assistance  Schedule-------------------------------------//
     DB::statement('
     INSERT INTO archived_assistances
     SELECT *
     FROM assistances
     WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM assistances
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');
    // -----------------------------------------------Assistance Schedule-------------------------------------//

    // ------------------------------------------------Associations  Schedule-------------------------------------//
        DB::statement('
        INSERT INTO archived_assocs
        SELECT *
        FROM associations
        WHERE YEAR(created_at) < YEAR(NOW())
       ');
   
       $this->info('Old data transferred successfully.');
   
       // Delete transferred data from the source table
       DB::statement('
           DELETE FROM associations
           WHERE YEAR(created_at) < YEAR(NOW())
       ');
   
       $this->info('Transferred data deleted from the source table.');
       
    // -----------------------------------------------Associations Schedule-------------------------------------//
   
    // ------------------------------------------------bamboos  Schedule-------------------------------------//
        DB::statement('
        INSERT INTO archived_bamboos
        SELECT *
        FROM bamboos
        WHERE YEAR(created_at) < YEAR(NOW())
       ');
   
       $this->info('Old data transferred successfully.');
   
       // Delete transferred data from the source table
       DB::statement('
           DELETE FROM bamboos
           WHERE YEAR(created_at) < YEAR(NOW())
       ');
   
       $this->info('Transferred data deleted from the source table.');
       
    // -----------------------------------------------bamboos Schedule-------------------------------------//
   
    // ------------------------------------------------cacaos  Schedule-------------------------------------//
        DB::statement('
        INSERT INTO archived_cacaos
        SELECT *
        FROM cacaos
        WHERE YEAR(created_at) < YEAR(NOW())
       ');
   
       $this->info('Old data transferred successfully.');
   
       // Delete transferred data from the source table
       DB::statement('
           DELETE FROM cacaos
           WHERE YEAR(created_at) < YEAR(NOW())
       ');
   
       $this->info('Transferred data deleted from the source table.');
       
    // -----------------------------------------------cacaos Schedule-------------------------------------//
   
    // ------------------------------------------------coffees  Schedule-------------------------------------//
        DB::statement('
        INSERT INTO archived_coffees
        SELECT *
        FROM coffees
        WHERE YEAR(created_at) < YEAR(NOW())
       ');
   
       $this->info('Old data transferred successfully.');
   
       // Delete transferred data from the source table
       DB::statement('
           DELETE FROM coffees
           WHERE YEAR(created_at) < YEAR(NOW())
       ');
   
       $this->info('Transferred data deleted from the source table.');
       
    // -----------------------------------------------coffees Schedule-------------------------------------//
   
    // ------------------------------------------------corn  Schedule-------------------------------------//
        DB::statement('
        INSERT INTO archived_corn   
        SELECT *
        FROM corn
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM corn
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');
   
    // -----------------------------------------------corn Schedule-------------------------------------//

    // ------------------------------------------------corn_seeds  Schedule-------------------------------------//
        DB::statement('
        INSERT INTO archived_corn_seeds  
        SELECT *
        FROM corn_seeds
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM corn_seeds
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');
   
    // -----------------------------------------------corn Schedule-------------------------------------//

    // ------------------------------------------------fertilizer  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_ferts
    SELECT *
    FROM ferts
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM ferts
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------fertilizer Schedule-------------------------------------//

    // ------------------------------------------------fisheries  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_fisheries
    SELECT *
    FROM fisheries
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM fisheries
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------fisheries Schedule-------------------------------------//

    // ------------------------------------------------fruits  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_fruits
    SELECT *
    FROM fruits
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM fruits
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------fruits Schedule-------------------------------------//


    // ------------------------------------------------livestocks  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_livestocks
    SELECT *
    FROM livestocks
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM livestocks
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------livestocks Schedule-------------------------------------//
    
    // ------------------------------------------------registries  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_registries
    SELECT *
    FROM registries
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM registries
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------registries Schedule-------------------------------------//
    
    // ------------------------------------------------rentals  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_rentals
    SELECT *
    FROM rentals
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM rentals
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------rentals Schedule-------------------------------------//
    
    // ------------------------------------------------rice hybrid  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_rice
    SELECT *
    FROM ricedistributionhybrid
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM ricedistributionhybrid
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------ricedistributionhybrid Schedule-------------------------------------//
        
    // ------------------------------------------------rice seeds  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_rice_seeds
    SELECT *
    FROM rice_seeds
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM rice_seeds
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------rice_seeds Schedule-------------------------------------//
        
    // ------------------------------------------------roms  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_roms
    SELECT *
    FROM roms
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM roms
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------roms Schedule-------------------------------------//
        
    // ------------------------------------------------root crops  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_root_crops
    SELECT *
    FROM root_crops
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM root_crops
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------root_crops Schedule-------------------------------------//
        
    // ------------------------------------------------vaccines  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_vaccs
    SELECT *
    FROM vaccs
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM vaccs
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------vaccs Schedule-------------------------------------//
        
    // ------------------------------------------------vegetables  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_vegetables
    SELECT *
    FROM vegetables
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM vegetables
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------vegetables Schedule-------------------------------------//
        
    // ------------------------------------------------vegetable request  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_vegreqs
    SELECT *
    FROM vegreqs
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM vegreqs
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------vegreqs Schedule-------------------------------------//
            
    // ------------------------------------------------vegetable seeds  Schedule-------------------------------------//
    DB::statement('
    INSERT INTO archived_veg_seeds
    SELECT *
    FROM veg_seeds
    WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Old data transferred successfully.');

    // Delete transferred data from the source table
    DB::statement('
        DELETE FROM veg_seeds
        WHERE YEAR(created_at) < YEAR(NOW())
    ');

    $this->info('Transferred data deleted from the source table.');

    // -----------------------------------------------veg_seeds Schedule-------------------------------------//

})->describe('Transfer data with created_at less than the current year to another table and delete it from the source table');



Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

$schedule = app(Schedule::class);
$schedule->command('transfer:old-data')->monthly();
