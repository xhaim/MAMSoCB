<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\ArchivedRental;
use Datatables;

class RentalAjaxCrudController extends Controller
{
    //  /**
    //   * Display a listing of the resource.
    //   *
    //   * @return \Illuminate\Http\Response
    //   */
     public function index()
     {
         if(request()->ajax()) {
            
             return datatables()->of(Rental::select('*'))
             ->addColumn('action', 'admin/rental/rental-action')
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         }
         return view('admin/rental/rental');
     }
       
       
    //  /**
    //   * Store a newly created resource in storage.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @return \Illuminate\Http\Response
    //   */
     public function store(Request $request)
     {  
  
         $rentalId = $request->id;
  
         $rental = Rental::updateOrCreate(
            ['id' => $rentalId],
            [
                'applicant' => $request->applicant,
                'address' => $request->address,
                'location' => $request->location,
                'project_description' => $request->project_description,
                'contact' => $request->contact,
                'actual_land_area_of_farm' => $request->actual_land_area_of_farm,
                'date_inspected' => $request->date_inspected,
                'inspector' => $request->inspector,
                'fuel_requirement' => $request->fuel_requirement,
                'hours_of_operation' => $request->hours_of_operation,
                'equipment' => json_encode($request->equipment), // Convert to JSON
                'area' => $request->area,
                'rental_rate' => $request->rental_rate,
                'total_rental_amount' => $request->total_rental_amount,
                'payment' => $request->payment,
                'or_number' => $request->or_number,
                'payment_date' => $request->payment_date,
                'payment_amount' => $request->payment_amount,
                'municipal_treasurer' => $request->municipal_treasurer,
                'source_of_fund' => $request->source_of_fund,
                'funds_available' => $request->funds_available,
                'municipal_accountant' => $request->municipal_accountant,
                'municipal_budget_officer' => $request->municipal_budget_officer,
                'municipal_mayor' => $request->municipal_mayor,
                'schedule_of_operation' => $request->schedule_of_operation,
                'plate_number_tractor' => $request->plate_number_tractor,
                'mao_tractor_incharge' => $request->mao_tractor_incharge,
                'actual_land_area_served' => $request->actual_land_area_served,
                'actual_hours_of_operation' => $request->actual_hours_of_operation,
                'remarks' => $request->remarks,
                'mo_field_inspector' => $request->mo_field_inspector,
            ]
        );
        
         return Response()->json($rental);
  
     }
       
       
    //  /**
    //   * Show the form for editing the specified resource.
    //   *
    //   * @param  \App\company  $company
    //   * @return \Illuminate\Http\Response
    //   */
     public function edit(Request $request)
     {   
         $where = array('id' => $request->id);
         $rental  = Rental::where($where)->first();
       
         return Response()->json($rental);
     }
       
        //  show
        public function getRentalDetails($id)
    {
        $rental = Rental::find($id);
        return response()->json($rental);
    }
// START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if(request()->ajax()) {
            return datatables()->of(ArchivedRental::select('*'))
            ->addColumn('action', 'admin/rental/archive-rental-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        
        return view('admin/rental/rental');
    }

   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:rentals,id',
       ]);

       // Get the record to be archived
       $rentals = Rental::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedRental::create([
        'applicant' => $rentals->applicant,
                'address' => $rentals->address,
                'location' => $rentals->location,
                'project_description' => $rentals->project_description,
                'contact' => $rentals->contact,
                'actual_land_area_of_farm' => $rentals->actual_land_area_of_farm,
                'date_inspected' => $rentals->date_inspected,
                'inspector' => $rentals->inspector,
                'fuel_requirement' => $rentals->fuel_requirement,
                'hours_of_operation' => $rentals->hours_of_operation,
                'equipment' => json_encode($rentals->equipment), // Convert to JSON
                'area' => $rentals->area,
                'rental_rate' => $rentals->rental_rate,
                'total_rental_amount' => $rentals->total_rental_amount,
                'payment' => $rentals->payment,
                'or_number' => $rentals->or_number,
                'payment_date' => $rentals->payment_date,
                'payment_amount' => $rentals->payment_amount,
                'municipal_treasurer' => $rentals->municipal_treasurer,
                'source_of_fund' => $rentals->source_of_fund,
                'funds_available' => $rentals->funds_available,
                'municipal_accountant' => $rentals->municipal_accountant,
                'municipal_budget_officer' => $rentals->municipal_budget_officer,
                'municipal_mayor' => $rentals->municipal_mayor,
                'schedule_of_operation' => $rentals->schedule_of_operation,
                'plate_number_tractor' => $rentals->plate_number_tractor,
                'mao_tractor_incharge' => $rentals->mao_tractor_incharge,
                'actual_land_area_served' => $rentals->actual_land_area_served,
                'actual_hours_of_operation' => $rentals->actual_hours_of_operation,
                'remarks' => $rentals->remarks,
                'mo_field_inspector' => $rentals->mo_field_inspector,
           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $rentals->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_rentals,id',
       ]);

       // Get the record to be unarchived
       $archivedrentals = ArchivedRental::find($request->id);

       // Create a new record in the main table
       $rentals = Rental::create([
        'applicant' => $archivedrentals->applicant,
        'address' => $archivedrentals->address,
        'location' => $archivedrentals->location,
        'project_description' => $archivedrentals->project_description,
        'contact' => $archivedrentals->contact,
        'actual_land_area_of_farm' => $archivedrentals->actual_land_area_of_farm,
        'date_inspected' => $archivedrentals->date_inspected,
        'inspector' => $archivedrentals->inspector,
        'fuel_requirement' => $archivedrentals->fuel_requirement,
        'hours_of_operation' => $archivedrentals->hours_of_operation,
        'equipment' => json_encode($archivedrentals->equipment), // Convert to JSON
        'area' => $archivedrentals->area,
        'rental_rate' => $archivedrentals->rental_rate,
        'total_rental_amount' => $archivedrentals->total_rental_amount,
        'payment' => $archivedrentals->payment,
        'or_number' => $archivedrentals->or_number,
        'payment_date' => $archivedrentals->payment_date,
        'payment_amount' => $archivedrentals->payment_amount,
        'municipal_treasurer' => $archivedrentals->municipal_treasurer,
        'source_of_fund' => $archivedrentals->source_of_fund,
        'funds_available' => $archivedrentals->funds_available,
        'municipal_accountant' => $archivedrentals->municipal_accountant,
        'municipal_budget_officer' => $archivedrentals->municipal_budget_officer,
        'municipal_mayor' => $archivedrentals->municipal_mayor,
        'schedule_of_operation' => $archivedrentals->schedule_of_operation,
        'plate_number_tractor' => $archivedrentals->plate_number_tractor,
        'mao_tractor_incharge' => $archivedrentals->mao_tractor_incharge,
        'actual_land_area_served' => $archivedrentals->actual_land_area_served,
        'actual_hours_of_operation' => $archivedrentals->actual_hours_of_operation,
        'remarks' => $archivedrentals->remarks,
        'mo_field_inspector' => $archivedrentals->mo_field_inspector,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedrentals->delete();

       return response()->json(['success' => true]);
   }


   // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING //

   //  /**
   //   * Remove the specified resource from storage.
   //   *
   //   * @param  \App\company  $company
   //   * @return \Illuminate\Http\Response
   //   */
   public function destroy(Request $request)
   {
       $rental = ArchivedRental::where('id',$request->id)->delete();
     
       return Response()->json($rental);
   }



    public function checkScheduleConflict(Request $request)
    {
        $schedule = $request->input('schedule');

        // Perform your conflict check logic here
        // For example, check if the schedule already exists in the database
        $conflict = Rental::where('schedule_of_operation', $schedule)->exists();

        return response()->json(['conflict' => $conflict]);
    }

 }