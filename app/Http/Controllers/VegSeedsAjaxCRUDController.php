<?php
 
 namespace App\Http\Controllers;
  
 use Illuminate\Http\Request;
  
 use App\Models\VegSeeds;
 use App\Models\ArchivedVegSeeds;
  
 use Datatables;
  
 class VegSeedsAjaxCrudController extends Controller

 {
    //  /**
    //   * Display a listing of the resource.
    //   *
    //   * @return \Illuminate\Http\Response
    //   */
     public function index()
     {
         if(request()->ajax()) {
             return datatables()->of(VegSeeds::select('*'))
             ->addColumn('action', 'admin/vegseeds-action')
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         }
         return view('admin/vegseeds');
     }
       
       
    //  /**
    //   * Store a newly created resource in storage.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @return \Illuminate\Http\Response
    //   */
     public function store(Request $request)
     {  
  
         $veg_seedsId = $request->id;
  
         $veg_seeds   =   VegSeeds::updateOrCreate(
                     [
                      'id' => $veg_seedsId
                     ],
                     [
                     'variety' => $request->variety, 
                     'seeds_received' => $request->seeds_received,
                     'date_received' => $request->date_received,
                     'source_of_funds' => $request->source_of_funds,
                     ]);    
                          
         return Response()->json($veg_seeds);
  
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
         $veg_seeds  = VegSeeds::where($where)->first();
       
         return Response()->json($veg_seeds);
     }
       
       
  // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if(request()->ajax()) {
            return datatables()->of(ArchivedVegSeeds::select('*'))
            ->addColumn('action', 'admin/archive-veg-seeds-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        
        return view('admin/vegseeds');
    }

   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:veg_seeds,id',
       ]);

       // Get the record to be archived
       $vegSeed = VegSeeds::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedVegSeeds::create([
           'variety' => $vegSeed->variety,
           'seeds_received' => $vegSeed->seeds_received,
           'date_received' => $vegSeed->date_received,
           'source_of_funds' => $vegSeed->source_of_funds,
           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $vegSeed->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_veg_seeds,id',
       ]);

       // Get the record to be unarchived
       $archivedVegSeed = ArchivedVegSeeds::find($request->id);

       // Create a new record in the main table
       $vegSeed = VegSeeds::create([
           'variety' => $archivedVegSeed->variety,
           'seeds_received' => $archivedVegSeed->seeds_received,
           'date_received' => $archivedVegSeed->date_received,
           'source_of_funds' => $archivedVegSeed->source_of_funds,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedVegSeed->delete();

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
        $veg_seeds = ArchivedVegSeeds::where('id',$request->id)->delete();
      
        return Response()->json($veg_seeds);
    }

    // In your controller, retrieve the data
       public function fetchData() {
           // Retrieve data from your model or source (e.g., database)
           $data = VegSeeds::all(); // Replace YourModel with your actual model

           return response()->json($data);
       }

}

