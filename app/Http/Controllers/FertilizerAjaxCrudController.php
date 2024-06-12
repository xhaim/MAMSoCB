<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fert;
use App\Models\ArchivedFerts;
    
use Datatables;

class FertilizerAjaxCrudController extends Controller
{
    //  /**
    //   * Display a listing of the resource.
    //   *
    //   * @return \Illuminate\Http\Response
    //   */
     public function index()
     {
         if(request()->ajax()) {
             return datatables()->of(Fert::select('*'))
             ->addColumn('action', 'admin/fertilizer/fert-action')
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         }
         return view('admin/fertilizer/fert');
     }
       
       
    //  /**
    //   * Store a newly created resource in storage.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @return \Illuminate\Http\Response
    //   */
     public function store(Request $request)
     {  
  
         $fertsId = $request->id;
  
         $ferts   =   Fert::updateOrCreate(
                     [
                      'id' => $fertsId
                     ],
                     [
                     'seeds_received' => $request->seeds_received,
                     'date_received' => $request->date_received,
                     'source_of_funds' => $request->source_of_funds,
                     ]);    
                          
         return Response()->json($ferts);
  
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
         $ferts  = Fert::where($where)->first();
       
         return Response()->json($ferts);
     }
       
    // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
     public function archive_index()
     {
         if(request()->ajax()) {
             return datatables()->of(ArchivedFerts::select('*'))
             ->addColumn('action', 'admin/fertilizer/archive-ferts-action')
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         }

         
         return view('admin/fertilizer/fert');
     }

    //  ARCHIVE
    public function archive(Request $request)
    {
        // Validate the request, if necessary
        $request->validate([
            'id' => 'required|exists:ferts,id',
        ]);

        // Get the record to be archived
        $fert = Fert::find($request->id);

        // Create a new archived record
        $archivedRecord = ArchivedFerts::create([
            'seeds_received' => $fert->seeds_received,
            'date_received' => $fert->date_received,
            'source_of_funds' => $fert->source_of_funds,
            // Add any additional columns needed for the archived table
        ]);

        // Delete the record from the main table
        $fert->delete();

        return response()->json(['success' => true]);
    }

    // RESTORE ARCHIVED
    public function restore(Request $request)
    {
        // Validate the request, if necessary
        $request->validate([
            'id' => 'required|exists:archived_ferts,id',
        ]);

        // Get the record to be unarchived
        $archivedferts = ArchivedFerts::find($request->id);

        // Create a new record in the main table
        $fert = Fert::create([
            'seeds_received' => $archivedferts->seeds_received,
            'date_received' => $archivedferts->date_received,
            'source_of_funds' => $archivedferts->source_of_funds,
            // Add any additional columns needed for the main table
        ]);

        // Delete the record from the archived table
        $archivedferts->delete();

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
        $ferts = ArchivedFerts::where('id',$request->id)->delete();
      
        return Response()->json($ferts);
    }

 }

