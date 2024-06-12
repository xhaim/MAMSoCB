<?php
 
 namespace App\Http\Controllers;
  
 use Illuminate\Http\Request;
  
 use App\Models\ArchivedRiceSeeds;
 use App\Models\RiceSeeds;
    
 use Datatables;
  
 class RiceSeedsAjaxCrudController extends Controller

 {
    //  /**
    //   * Display a listing of the resource.
    //   *
    //   * @return \Illuminate\Http\Response
    //   */
     public function index()
     {
         if(request()->ajax()) {
             return datatables()->of(RiceSeeds::select('*'))
             ->addColumn('action', 'admin/riceseeds/rice-seeds-action')
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         }

         
         return view('admin/riceseeds/riceseeds');
     }
       
       
    //  /**
    //   * Store a newly created resource in storage.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @return \Illuminate\Http\Response
    //   */
     public function store(Request $request)
     {  
  
         $rice_seedsId = $request->id;
  
         $rice_seeds   =   RiceSeeds::updateOrCreate(
                     [
                      'id' => $rice_seedsId
                     ],
                     [
                     'variety' => $request->variety, 
                     'seeds_received' => $request->seeds_received,
                     'date_received' => $request->date_received,
                     'source_of_funds' => $request->source_of_funds,
                     ]);    
                          
         return Response()->json($rice_seeds);
  
     }

     // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
     public function archive_index()
     {
         if(request()->ajax()) {
             return datatables()->of(ArchivedRiceSeeds::select('*'))
             ->addColumn('action', 'admin/riceseeds/archive-rice-seeds-action')
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         }

         
         return view('admin/riceseeds/riceseeds');
     }

    //  ARCHIVE
    public function archive(Request $request)
    {
        // Validate the request, if necessary
        $request->validate([
            'id' => 'required|exists:rice_seeds,id',
        ]);

        // Get the record to be archived
        $riceSeed = RiceSeeds::find($request->id);

        // Create a new archived record
        $archivedRecord = ArchivedRiceSeeds::create([
            'variety' => $riceSeed->variety,
            'seeds_received' => $riceSeed->seeds_received,
            'date_received' => $riceSeed->date_received,
            'source_of_funds' => $riceSeed->source_of_funds,
            // Add any additional columns needed for the archived table
        ]);

        // Delete the record from the main table
        $riceSeed->delete();

        return response()->json(['success' => true]);
    }

    // RESTORE ARCHIVED
    public function restore(Request $request)
    {
        // Validate the request, if necessary
        $request->validate([
            'id' => 'required|exists:archived_rice_seeds,id',
        ]);

        // Get the record to be unarchived
        $archivedRiceSeed = ArchivedRiceSeeds::find($request->id);

        // Create a new record in the main table
        $riceSeed = RiceSeeds::create([
            'variety' => $archivedRiceSeed->variety,
            'seeds_received' => $archivedRiceSeed->seeds_received,
            'date_received' => $archivedRiceSeed->date_received,
            'source_of_funds' => $archivedRiceSeed->source_of_funds,
            // Add any additional columns needed for the main table
        ]);

        // Delete the record from the archived table
        $archivedRiceSeed->delete();

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
         $rice_seeds  = RiceSeeds::where($where)->first();
       
         return Response()->json($rice_seeds);
     }
       
    //  /**
    //   * Remove the specified resource from storage.
    //   *
    //   * @param  \App\company  $company
    //   * @return \Illuminate\Http\Response
    //   */
     public function destroy(Request $request)
     {
         $rice_seeds = ArchivedRiceSeeds::where('id',$request->id)->delete();
       
         return Response()->json($rice_seeds);
     }

     // In your controller, retrieve the data
        public function fetchData() {
            // Retrieve data from your model or source (e.g., database)
            $data = RiceSeeds::all(); // Replace YourModel with your actual model

            return response()->json($data);
        }

 }
