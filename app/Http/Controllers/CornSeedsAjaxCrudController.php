<?php
 
 namespace App\Http\Controllers;
  
 use Illuminate\Http\Request;
  
 use App\Models\CornSeeds;
 use App\Models\ArchivedCornSeeds;
 use Datatables;
  
 class CornSeedsAjaxCrudController extends Controller

 {
    //  /**
    //   * Display a listing of the resource.
    //   *
    //   * @return \Illuminate\Http\Response
    //   */
     public function index()
     {
         if(request()->ajax()) {
            
             return datatables()->of(CornSeeds::select('*'))
             ->addColumn('action', 'admin/cornseeds-action')
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         }
         return view('admin/cornseeds');
     }
       
       
    //  /**
    //   * Store a newly created resource in storage.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @return \Illuminate\Http\Response
    //   */
     public function store(Request $request)
     {  
  
         $corn_seedsId = $request->id;
  
         $corn_seeds   =   CornSeeds::updateOrCreate(
                     [
                      'id' => $corn_seedsId
                     ],
                     [
                     'variety' => $request->variety, 
                     'seeds_received' => $request->seeds_received,
                     'date_received' => $request->date_received,
                     'source_of_funds' => $request->source_of_funds,
                     ]);    
                          
         return Response()->json($corn_seeds);
  
     }
       
          // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
     public function archive_index()
     {
         if(request()->ajax()) {
             return datatables()->of(ArchivedCornSeeds::select('*'))
             ->addColumn('action', 'admin/archive-corn-seeds-action')
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         }

         
         return view('admin/cornseeds');
     }

    //  ARCHIVE
    public function archive(Request $request)
    {
        // Validate the request, if necessary
        $request->validate([
            'id' => 'required|exists:corn_seeds,id',
        ]);

        // Get the record to be archived
        $cornSeed = CornSeeds::find($request->id);

        // Create a new archived record
        $archivedRecord = ArchivedCornSeeds::create([
            'variety' => $cornSeed->variety,
            'seeds_received' => $cornSeed->seeds_received,
            'date_received' => $cornSeed->date_received,
            'source_of_funds' => $cornSeed->source_of_funds,
            // Add any additional columns needed for the archived table
        ]);

        // Delete the record from the main table
        $cornSeed->delete();

        return response()->json(['success' => true]);
    }

    // RESTORE ARCHIVED
    public function restore(Request $request)
    {
        // Validate the request, if necessary
        $request->validate([
            'id' => 'required|exists:archived_corn_seeds,id',
        ]);

        // Get the record to be unarchived
        $archivedCornSeed = ArchivedCornSeeds::find($request->id);

        // Create a new record in the main table
        $cornSeed = CornSeeds::create([
            'variety' => $archivedCornSeed->variety,
            'seeds_received' => $archivedCornSeed->seeds_received,
            'date_received' => $archivedCornSeed->date_received,
            'source_of_funds' => $archivedCornSeed->source_of_funds,
            // Add any additional columns needed for the main table
        ]);

        // Delete the record from the archived table
        $archivedCornSeed->delete();

        return response()->json(['success' => true]);
    }


    // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING //

    //  /**
    //   * Show the form for editing the specified resource.
    //   *
    //   * @param  \App\company  $company
    //   * @return \Illuminate\Http\Response
    //   */
     public function edit(Request $request)
     {   
         $where = array('id' => $request->id);
         $corn_seeds  = CornSeeds::where($where)->first();
       
         return Response()->json($corn_seeds);
     }
       
       
    //  /**
    //   * Remove the specified resource from storage.
    //   *
    //   * @param  \App\company  $company
    //   * @return \Illuminate\Http\Response
    //   */
    public function destroy(Request $request)
    {
        $corn_seeds = ArchivedCornSeeds::find($request->id);
    
        if (!$corn_seeds) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    
        $corn_seeds->delete();
    
        return response()->json(['message' => 'Record deleted successfully']);
    }
 }
