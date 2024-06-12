<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\Vegetable;
use App\Models\ArchivedVegetables;
 
use Datatables;
 
class VegetableAjaxCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Vegetable::select('*'))
            ->addColumn('action', 'veg-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('vegetable');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $vegId = $request->id;
 
        $veg   =   Vegetable::updateOrCreate(
                    [
                     'id' => $vegId
                    ],
                    [
                    'name' => $request->name, 
                    'barangay' => $request->barangay,
                    'municipality' => $request->municipality,
                    'sex' => $request->sex,
                    'affiliation' => $request->affiliation,
                    'contact' => $request->contact,
                    'commodity' => $request->commodity,
                    'area' => $request->area,
                    'number_of_hills' => $request->number_of_hills,
                    'production' => $request->production,
                    'market' => $request->market,
                    'expansionarea' => $request->expansionarea,
                    
                    ]);    
                         
        return Response()->json($veg);
 
    }
      
      
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */

     // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if (request()->ajax()) {
            return datatables()->of(ArchivedVegetables::select('*'))
                ->addColumn('action', 'archive-veg-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('vegetable');
    }


   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:vegetables,id',
       ]);

       // Get the record to be archived
       $vegetables = Vegetable::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedVegetables::create([

            'name' => $vegetables->name, 
            'barangay' => $vegetables->barangay,
            'municipality' => $vegetables->municipality,
            'sex' => $vegetables->sex,
            'affiliation' => $vegetables->affiliation,
            'contact' => $vegetables->contact,
            'commodity' => $vegetables->commodity,
            'area' => $vegetables->area,
            'number_of_hills' => $vegetables->number_of_hills,
            'production' => $vegetables->production,
            'market' => $vegetables->market,
            'expansionarea' => $vegetables->expansionarea,

           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $vegetables->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_vegetables,id',
       ]);

       // Get the record to be unarchived
       $archivedvegetables = ArchivedVegetables::find($request->id);

       // Create a new record in the main table
       $vegetables = Vegetable::create([
            'name' => $archivedvegetables->name, 
            'barangay' => $archivedvegetables->barangay,
            'municipality' => $archivedvegetables->municipality,
            'sex' => $archivedvegetables->sex,
            'affiliation' => $archivedvegetables->affiliation,
            'contact' => $archivedvegetables->contact,
            'commodity' => $archivedvegetables->commodity,
            'area' => $archivedvegetables->area,
            'number_of_hills' => $archivedvegetables->number_of_hills,
            'production' => $archivedvegetables->production,
            'market' => $archivedvegetables->market,
            'expansionarea' => $archivedvegetables->expansionarea,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedvegetables->delete();

       return response()->json(['success' => true]);
   }


   // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING //

    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $veg  = Vegetable::where($where)->first();
      
        return Response()->json($veg);
    }
      
      
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $veg = ArchivedVegetables::where('id',$request->id)->delete();
      
        return Response()->json($veg);
    }
    
    // Start of print // Start of print // Start of print     
    public function fetchData() {
        // Retrieve data from your model or source (e.g., database)
        $data = Vegetable::all(); // Replace YourModel with your actual model

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
        $data = Vegetable::where('barangay', $barangayName)->get();
    } else {
        // Fetch data for all barangays
        $data = Vegetable::all();
    }

    // Reset the IDs and update to start from 1
    $data = $data->map(function ($item, $index) {
        $item['id'] = $index + 1;
        return $item;
    });

    return response()->json($data);
    }
    //end of print //end of print // end of print // end of print

   // Add this method to your controller
public function checkFarmerName(Request $request)
{
    $name = $request->input('name');

    // Check if the Name of Farmer exists in the database
    $exists = Vegetable::where('name', $name)->exists();

    return response()->json(['exists' => $exists]);
}



    
}