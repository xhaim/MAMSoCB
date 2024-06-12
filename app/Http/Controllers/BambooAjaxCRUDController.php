<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bamboo;
use App\Models\ArchivedBamboos;
 
use Datatables;


class BambooAjaxCRUDController extends Controller
{
    
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Bamboo::select('*'))
            ->addColumn('created_at', function ($bamboo) {
                // Format the registered_at column as yyyy-mm-dd
                return date('m-d-Y', strtotime($bamboo->created_at));
            })
            ->addColumn('action', 'bamboo-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('bamboo');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $bambooId = $request->id;
 
        $bamboo   =   Bamboo::updateOrCreate(
                    [
                     'id' => $bambooId
                    ],
                    [
                    'name' => $request->name,
                    'sex' => $request->sex,
                    'birthday' => $request->birthday,
                    'purok' => $request->purok,
                    'barangay' => $request->barangay,
                    'newly' => $request->newly,
                    'harvestable' => $request->harvestable,
                    'total' => $request->total,
                    'area' => $request->area,
                    'age' => $request->age,
                    'per_month' => $request->per_month,
                    'varieties' => $request->varieties,
                    'group' => $request->group,
                    'remark' => $request->remark,
                    ]);    
                         
        return Response()->json($bamboo);
 
    }
      
     // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if (request()->ajax()) {
            return datatables()->of(ArchivedBamboos::select('*'))
                ->addColumn('action', 'archive-bamboo-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('bamboo');
    }


   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:bamboos,id',
       ]);

       // Get the record to be archived
       $bamboos = Bamboo::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedBamboos::create([

                    'name' => $bamboos->name,
                    'sex' => $bamboos->sex,
                    'birthday' => $bamboos->birthday,
                    'purok' => $bamboos->purok,
                    'barangay' => $bamboos->barangay,
                    'newly' => $bamboos->newly,
                    'harvestable' => $bamboos->harvestable,
                    'total' => $bamboos->total,
                    'area' => $bamboos->area,
                    'age' => $bamboos->age,
                    'per_month' => $bamboos->per_month,
                    'varieties' => $bamboos->varieties,
                    'group' => $bamboos->group,
                    'remark' => $bamboos->remark,

           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $bamboos->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_bamboos,id',
       ]);

       // Get the record to be unarchived
       $archivedbamboos = ArchivedBamboos::find($request->id);

       // Create a new record in the main table
       $bamboos = Bamboo::create([
                    'name' => $archivedbamboos->name,
                    'sex' => $archivedbamboos->sex,
                    'birthday' => $archivedbamboos->birthday,
                    'purok' => $archivedbamboos->purok,
                    'barangay' => $archivedbamboos->barangay,
                    'newly' => $archivedbamboos->newly,
                    'harvestable' => $archivedbamboos->harvestable,
                    'total' => $archivedbamboos->total,
                    'area' => $archivedbamboos->area,
                    'age' => $archivedbamboos->age,
                    'per_month' => $archivedbamboos->per_month,
                    'varieties' => $archivedbamboos->varieties,
                    'group' => $archivedbamboos->group,
                    'remark' => $archivedbamboos->remark,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedbamboos->delete();

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
        $bamboo  = Bamboo::where($where)->first();
      
        return Response()->json($bamboo);
    }
      
      
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $bamboo = ArchivedBamboos::where('id',$request->id)->delete();
      
        return Response()->json($bamboo);
    }
       // Start of print // Start of print // Start of print   

    public function fetchData() {
        // Retrieve data from your model or source (e.g., database)
        $data = Bamboo::all(); // Replace YourModel with your actual model

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
        $data = Bamboo::where('barangay', $barangayName)->get();
    } else {
        // Fetch data for all barangays
        $data = Bamboo::all();
    }

    // Reset the IDs and update to start from 1
    $data = $data->map(function ($item, $index) {
        $item['id'] = $index + 1;
        return $item;
    });

    return response()->json($data);
    }
    //end of print //end of print // end of print // end of print
        
}
