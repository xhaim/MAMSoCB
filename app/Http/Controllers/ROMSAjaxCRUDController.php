<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roms;
use App\Models\ArchivedRoms;
use Datatables;

class ROMSAjaxCRUDController extends Controller
{
  
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Roms::select('*'))
            ->addColumn('action', 'roms-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('roms');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $romsId = $request->id;
 
        $roms   =   Roms::updateOrCreate(
                    [
                     'id' => $romsId
                    ],
                    [
                        'name' => $request->name,
                        'address' => $request->address,
                        'animal_id' => $request->animal_id,
                        'breed' => $request->breed,
                        'born' => $request->born,
                        'bcs' => $request->bcs,
                        'lastcalving' => $request->lastcalving,
                        'romsdate' => $request->romsdate, 
                        'ovarian' => $request->ovarian,
                        'result' => $request->result,
                        'ai' => $request->ai,
                        'ut' => $request->ut,
                        'w_iec' => $request->w_iec,
                        'bullid' => $request->bullid,
                        'straws' => $request->straws,
                        'remark' => $request->remark,
                    ]);    
                         
        return Response()->json($roms);
 
    }
      
    // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if (request()->ajax()) {
            return datatables()->of(ArchivedRoms::select('*'))
                ->addColumn('action', 'archive-roms-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('roms');
    }


   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:roms,id',
       ]);

       // Get the record to be archived
       $roms = Roms::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedRoms::create([
                        //$roms
        'name' => $roms->name,
        'address' => $roms->address,
        'animal_id' => $roms->animal_id,
        'breed' => $roms->breed,
        'born' => $roms->born,
        'bcs' => $roms->bcs,
        'lastcalving' => $roms->lastcalving,
        'romsdate' => $roms->romsdate, 
        'ovarian' => $roms->ovarian,
        'result' => $roms->result,
        'ai' => $roms->ai,
        'ut' => $roms->ut,
        'w_iec' => $roms->w_iec,
        'bullid' => $roms->bullid,
        'straws' => $roms->straws,
        'remark' => $roms->remark,
           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $roms->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_roms,id',
       ]);

       // Get the record to be unarchived
       $archivedroms = ArchivedRoms::find($request->id);

       // Create a new record in the main table
       $roms = Roms::create([
                        
        'name' => $archivedroms->name,
        'address' => $archivedroms->address,
        'animal_id' => $archivedroms->animal_id,
        'breed' => $archivedroms->breed,
        'born' => $archivedroms->born,
        'bcs' => $archivedroms->bcs,
        'lastcalving' => $archivedroms->lastcalving,
        'romsdate' => $archivedroms->romsdate, 
        'ovarian' => $archivedroms->ovarian,
        'result' => $archivedroms->result,
        'ai' => $archivedroms->ai,
        'ut' => $archivedroms->ut,
        'w_iec' => $archivedroms->w_iec,
        'bullid' => $archivedroms->bullid,
        'straws' => $archivedroms->straws,
        'remark' => $archivedroms->remark,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedroms->delete();

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
        $roms  = Roms::where($where)->first();
      
        return Response()->json($roms);
    }
      
      
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $roms = ArchivedRoms::where('id',$request->id)->delete();
      
        return Response()->json($roms);
    }
     // In your controller, retrieve the data
     public function fetchData() {
        // Retrieve data from your model or source (e.g., database)
        $data = Roms::all(); // Replace YourModel with your actual model

        return response()->json($data);
    }
    // Add this method to your controller
    public function checkName(Request $request)
    {
        $name = $request->input('name');

        // Check if the Name exists in the database
        $exists = Roms::where('name', $name)->exists();

        return response()->json(['exists' => $exists]);
    }

   
}



