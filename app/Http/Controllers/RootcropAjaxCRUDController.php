<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 
use App\Models\RootCrops;
use App\Models\ArchivedRootCrops;
 
use Datatables;
 

class RootcropAjaxCRUDController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(RootCrops::select('*'))
            ->addColumn('created_at', function ($root) {
                // Format the registered_at column as yyyy-mm-dd
                return date('m-d-Y', strtotime($root->created_at));
            })
            ->addColumn('action', 'root-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('RootCrops');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $rootId = $request->id;
 
        $root   =   RootCrops::updateOrCreate(
                    [
                     'id' => $rootId
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
                         
        return Response()->json($root);
 
    }
      

     // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if (request()->ajax()) {
            return datatables()->of(ArchivedRootCrops::select('*'))
                ->addColumn('action', 'archive-root-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('RootCrops');
    }


   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:root_crops,id',
       ]);

       // Get the record to be archived
       $root = RootCrops::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedRootCrops::create([

            'name' => $root->name, 
            'barangay' => $root->barangay,
            'municipality' => $root->municipality,
            'sex' => $root->sex,
            'affiliation' => $root->affiliation,
            'contact' => $root->contact,
            'commodity' => $root->commodity,
            'area' => $root->area,
            'number_of_hills' => $root->number_of_hills,
            'production' => $root->production,
            'market' => $root->market,
            'expansionarea' => $root->expansionarea,

           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $root->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_root_crops,id',
       ]);

       // Get the record to be unarchived
       $archivedrootcrops = ArchivedRootCrops::find($request->id);

       // Create a new record in the main table
       $root = RootCrops::create([
            'name' => $archivedrootcrops->name, 
            'barangay' => $archivedrootcrops->barangay,
            'municipality' => $archivedrootcrops->municipality,
            'sex' => $archivedrootcrops->sex,
            'affiliation' => $archivedrootcrops->affiliation,
            'contact' => $archivedrootcrops->contact,
            'commodity' => $archivedrootcrops->commodity,
            'area' => $archivedrootcrops->area,
            'number_of_hills' => $archivedrootcrops->number_of_hills,
            'production' => $archivedrootcrops->production,
            'market' => $archivedrootcrops->market,
            'expansionarea' => $archivedrootcrops->expansionarea,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedrootcrops->delete();

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
        $root  = RootCrops::where($where)->first();
      
        return Response()->json($root);
    }
      
      
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $root = ArchivedRootCrops::where('id',$request->id)->delete();
      
        return Response()->json($root);
    }
    
    
    // Start of print // Start of print // Start of print   

    public function fetchData() {
        // Retrieve data from your model or source (e.g., database)
        $data = RootCrops::all(); // Replace YourModel with your actual model

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
        $data = RootCrops::where('barangay', $barangayName)->get();
    } else {
        // Fetch data for all barangays
        $data = RootCrops::all();
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
public function checkName(Request $request)
{
    $name = $request->input('name');

    // Check if the Name of Farmer exists in the database
    $exists = RootCrops::where('name', $name)->exists();

    return response()->json(['exists' => $exists]);
}

}
