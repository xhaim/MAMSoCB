<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\ArchivedCoffees;
 
use Datatables;

class CoffeeAjaxCRUDController extends Controller
{
  
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Coffee::select('*'))
            ->addColumn('action', 'coffee-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('coffee');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $coffeeId = $request->id;
 
        $coffee   =   Coffee::updateOrCreate(
                    [
                     'id' => $coffeeId
                    ],
                    [
                    'name' => $request->name,
                    'sex' => $request->sex,
                    'purok' => $request->purok,
                    'barangay' => $request->barangay,
                    'bearing' => $request->bearing,
                    'non_bearing' => $request->non_bearing,
                    'total' => $request->total,
                    'area' => $request->area,
                    'age' => $request->age,
                    'coffee_trees_harvested' => $request->coffee_trees_harvested,
                    'kilo' => $request->kilo,
                    'season' => $request->season,
                    'varieties' => $request->varieties,
                    'group' => $request->group,
                    'remark' => $request->remark,
                    ]);    
                         
        return Response()->json($coffee);
 
    }
      
    // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if (request()->ajax()) {
            return datatables()->of(ArchivedCoffees::select('*'))
                ->addColumn('action', 'archive-coffee-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('coffee');
    }


   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:coffees,id',
       ]);

       // Get the record to be archived
       $coffees = Coffee::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedCoffees::create([

        'name' => $coffees->name,
        'sex' => $coffees->sex,
        'purok' => $coffees->purok,
        'barangay' => $coffees->barangay,
        'bearing' => $coffees->bearing,
        'non_bearing' => $coffees->non_bearing,
        'total' => $coffees->total,
        'area' => $coffees->area,
        'age' => $coffees->age,
        'coffee_trees_harvested' => $coffees->coffee_trees_harvested,
        'kilo' => $coffees->kilo,
        'season' => $coffees->season,
        'varieties' => $coffees->varieties,
        'group' => $coffees->group,
        'remark' => $coffees->remark,

           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $coffees->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_coffees,id',
       ]);

       // Get the record to be unarchived
       $archivedcoffees = ArchivedCoffees::find($request->id);

       // Create a new record in the main table
       $coffees = Coffee::create([
        'name' => $archivedcoffees->name,
        'sex' => $archivedcoffees->sex,
        'purok' => $archivedcoffees->purok,
        'barangay' => $archivedcoffees->barangay,
        'bearing' => $archivedcoffees->bearing,
        'non_bearing' => $archivedcoffees->non_bearing,
        'total' => $archivedcoffees->total,
        'area' => $archivedcoffees->area,
        'age' => $archivedcoffees->age,
        'coffee_trees_harvested' => $archivedcoffees->coffee_trees_harvested,
        'kilo' => $archivedcoffees->kilo,
        'season' => $archivedcoffees->season,
        'varieties' => $archivedcoffees->varieties,
        'group' => $archivedcoffees->group,
        'remark' => $archivedcoffees->remark,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedcoffees->delete();

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
        $coffee  = Coffee::where($where)->first();
      
        return Response()->json($coffee);
    }
      
      
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $coffee = ArchivedCoffees::where('id',$request->id)->delete();
      
        return Response()->json($coffee);
    }
   // Start of print // Start of print // Start of print   

   public function fetchData() {
    // Retrieve data from your model or source (e.g., database)
    $data = Coffee::all(); // Replace YourModel with your actual model

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
        $data = Coffee::where('barangay', $barangayName)->get();
    } else {
        // Fetch data for all barangays
        $data = Coffee::all();
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


