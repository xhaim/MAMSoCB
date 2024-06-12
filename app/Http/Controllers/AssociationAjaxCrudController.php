<?php
 
 namespace App\Http\Controllers;
  
 use Illuminate\Http\Request;
  
 use App\Models\Association;
 use App\Models\ArchivedAssoc; 
 use Datatables;
 use Illuminate\Support\Facades\DB;

 class AssociationAjaxCrudController extends Controller

 {
    //  /**
    //   * Display a listing of the resource.
    //   *
    //   * @return \Illuminate\Http\Response
    //   */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Association::select('*'))
                ->addColumn('created_at', function ($association) {
                    // Format the registered_at column as yyyy-mm-dd
                    return date('m-d-Y', strtotime($association->created_at));
                })
                ->addColumn('registered', function ($association) {
                    // Format the registered_at column as yyyy-mm-dd
                    return date('m-d-Y', strtotime($association->registered));
                })
                ->addColumn('action', 'admin/association/association-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin/association/association');
    }
    
       
       
    //  /**
    //   * Store a newly created resource in storage.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @return \Illuminate\Http\Response
    //   */
     public function store(Request $request)
     {  
  
         $associationId = $request->id;
  
         $association   =   Association::updateOrCreate(
                     [
                      'id' => $associationId
                     ],
                     [
                        'association'=> $request->association,
                        'barangay'=> $request->barangay,
                        'chairman'=> $request->chairman,
                        'contact'=> $request->contact,
                        'no_of_farmers'=> $request->no_of_farmers,
                        'registered'=> $request->registered,
                     ]);    
                          
         return Response()->json($association);
  
     }
       
     // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if (request()->ajax()) {
            return datatables()->of(ArchivedAssoc::select('*'))
                ->addColumn('action', 'admin/archive-assoc-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin/assoc');
    }


   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:associations,id',
       ]);

       // Get the record to be archived
       $assoc = Association::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedAssoc::create([
                        'association'=> $assoc->association,
                        'barangay'=> $assoc->barangay,
                        'chairman'=> $assoc->chairman,
                        'contact'=> $assoc->contact,
                        'no_of_farmers'=> $assoc->no_of_farmers,
                        'registered'=> $assoc->registered,
           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $assoc->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_assocs,id',
       ]);

       // Get the record to be unarchived
       $archivedassoc = ArchivedAssoc::find($request->id);

       // Create a new record in the main table
       $assoc = Association::create([
                        'association'=> $archivedassoc->association,
                        'barangay'=> $archivedassoc->barangay,
                        'chairman'=> $archivedassoc->chairman,
                        'contact'=> $archivedassoc->contact,
                        'no_of_farmers'=> $archivedassoc->no_of_farmers,
                        'registered'=> $archivedassoc->registered,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedassoc->delete();

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
         $association  = Association::where($where)->first();
       
         return Response()->json($association);
     }
       
        //  show
        public function getAssociationDetails($id)
    {
        $association = Association::find($id);
        return response()->json($association);
    }

       
    //  /**
    //   * Remove the specified resource from storage.
    //   *
    //   * @param  \App\company  $company
    //   * @return \Illuminate\Http\Response
    //   */
    public function destroy(Request $request)
    {
        $association = ArchivedAssoc::where('id', $request->id)->delete();

        // Reset AUTO_INCREMENT
        $associations = 'associations'; // Replace 'your_table' with the actual table name
        DB::statement("ALTER TABLE $associations AUTO_INCREMENT = 1");
        DB::statement("SET @id := 0");
        DB::statement("UPDATE associations SET id = (@id := @id + 1)");
        return Response()->json($association);
    }
     // In your controller, retrieve the data
    
     public function fetchData() {
         // Retrieve data from your model or source (e.g., database)
         $data = Association::all(); // Replace YourModel with your actual model
     
         // Sort the data by the 'Barangay' column alphabetically
         $data = $data->sortBy('barangay')->values();
     
         // Reset the IDs and update to start from 1
         $data = $data->map(function ($item, $index) {
             $item['id'] = $index + 1;
             return $item;
         });
     
         return response()->json($data);
     }
     
     public function fetchSpecificBarangay(Request $request) {
        $barangayName = $request->input('barangay');
        
        if ($barangayName) {
            // Fetch data for the specific barangay
            $data = Association::where('barangay', $barangayName)->get();
        } else {
            // Fetch data for all barangays
            $data = Association::all();
        }
    
        // Reset the IDs and update to start from 1
        $data = $data->map(function ($item, $index) {
            $item['id'] = $index + 1;
            return $item;
        });
    
        return response()->json($data);
    }
    

     
    // Add this method to your controller
public function checkAssociation(Request $request)
{
    $association = $request->input('association');

    // Check if the Name of Association exists in the database
    $exists = Association::where('association', $association)->exists();

    return response()->json(['exists' => $exists]);
}

 }
