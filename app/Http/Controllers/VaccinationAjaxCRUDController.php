<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacc;
use App\Models\ArchivedVaccs;
use Datatables;

class VaccinationAjaxCRUDController extends Controller
{
  
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Vacc::select('*'))
            ->addColumn('action', 'vacc-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('vaccination');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $vaccId = $request->id;
        
       
 
        $vacc   =   Vacc::updateOrCreate(
                    [
                     'id' => $vaccId
                    ],
                    [
                        'owner_name' => $request->owner_name,
                        'birthday' => $request->birthday,
                        'dog_name' => $request->dog_name,
                        'origin' => $request->origin,
                        'breed' => $request->breed,
                        $exoticType = $request->input('exotic_type'),
                        'color' => $request->color,
                        'ageyr' => $request->ageyr,
                        'age_month' => $request->age_month,
                        'sex_male' => $request->sex_male,
                        'sex_female' => $request->sex_female,
                    ]);    
                         
        return Response()->json($vacc);
 
    }
      
      
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $vacc  = Vacc::where($where)->first();
      
        return Response()->json($vacc);
    }
      
       // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if(request()->ajax()) {
            return datatables()->of(ArchivedVaccs::select('*'))
            ->addColumn('action', 'archive-vacc-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        
        return view('vaccination');
    }

   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:vaccs,id',
       ]);

       // Get the record to be archived
       $vaccs = Vacc::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedVaccs::create([
        'owner_name' => $vaccs->owner_name,
        'birthday' => $vaccs->birthday,
        'dog_name' => $vaccs->dog_name,
        'origin' => $vaccs->origin,
        'breed' => $vaccs->breed,
        'exoticType' => $vaccs-> exotic_type,
        'color' => $vaccs->color,
        'ageyr' => $vaccs->ageyr,
        'age_month' => $vaccs->age_month,
        'sex_male' => $vaccs->sex_male,
        'sex_female' => $vaccs->sex_female,
           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $vaccs->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_vaccs,id',
       ]);

       // Get the record to be unarchived
       $archivedvaccs = ArchivedVaccs::find($request->id);

       // Create a new record in the main table
       $vaccs = Vacc::create([
        'owner_name' => $archivedvaccs->owner_name,
                        'birthday' => $archivedvaccs->birthday,
                        'dog_name' => $archivedvaccs->dog_name,
                        'origin' => $archivedvaccs->origin,
                        'breed' => $archivedvaccs->breed,
                        'exoticType' => $archivedvaccs-> exotic_type,
                        'color' => $archivedvaccs->color,
                        'ageyr' => $archivedvaccs->ageyr,
                        'age_month' => $archivedvaccs->age_month,
                        'sex_male' => $archivedvaccs->sex_male,
                        'sex_female' => $archivedvaccs->sex_female,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedvaccs->delete();

       return response()->json(['success' => true]);
   }


   // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING //

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $vacc = ArchivedVaccs::where('id',$request->id)->delete();
      
        return Response()->json($vacc);
    }
   
          // In your controller, retrieve the data
          public function fetchData() {
            // Retrieve data from your model or source (e.g., database)
            $data = Vacc::all(); // Replace YourModel with your actual model
    
            return response()->json($data);
        }
        
}





