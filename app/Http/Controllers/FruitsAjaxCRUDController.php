<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruits;
use App\Models\ArchivedFruits;
use Datatables;

class FruitsAjaxCRUDController extends Controller
{
  
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Fruits::select('*'))
            ->addColumn('action', 'fruits-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('fruits');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $fruitsId = $request->id;
 
        $fruits   =   Fruits::updateOrCreate(
                    [
                     'id' => $fruitsId
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
                    'fruits_trees_harvested' => $request->fruits_trees_harvested,
                    'kilo' => $request->kilo,
                    'season' => $request->season,
                    'varieties' => $request->varieties,
                    'group' => $request->group,
                    'remark' => $request->remark,
                    ]);    
                         
        return Response()->json($fruits);
 
    }
      
    // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if (request()->ajax()) {
            return datatables()->of(ArchivedFruits::select('*'))
                ->addColumn('action', 'archive-fruits-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('Fruits');
    }


   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:fruits,id',
       ]);

       // Get the record to be archived
       $fruit = Fruits::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedFruits::create([

        'name' => $fruit->name,
        'sex' => $fruit->sex,
        'purok' => $fruit->purok,
        'barangay' => $fruit->barangay,
        'bearing' => $fruit->bearing,
        'non_bearing' => $fruit->non_bearing,
        'total' => $fruit->total,
        'area' => $fruit->area,
        'age' => $fruit->age,
        'fruits_trees_harvested' => $fruit->fruits_trees_harvested,
        'kilo' => $fruit->kilo,
        'season' => $fruit->season,
        'varieties' => $fruit->varieties,
        'group' => $fruit->group,
        'remark' => $fruit->remark,

           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $fruit->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_fruits,id',
       ]);

       // Get the record to be unarchived
       $archivedfruits = ArchivedFruits::find($request->id);

       // Create a new record in the main table
       $fruit = Fruits::create([
        'name' => $archivedfruits->name,
        'sex' => $archivedfruits->sex,
        'purok' => $archivedfruits->purok,
        'barangay' => $archivedfruits->barangay,
        'bearing' => $archivedfruits->bearing,
        'non_bearing' => $archivedfruits->non_bearing,
        'total' => $archivedfruits->total,
        'area' => $archivedfruits->area,
        'age' => $archivedfruits->age,
        'fruits_trees_harvested' => $archivedfruits->fruits_trees_harvested,
        'kilo' => $archivedfruits->kilo,
        'season' => $archivedfruits->season,
        'varieties' => $archivedfruits->varieties,
        'group' => $archivedfruits->group,
        'remark' => $archivedfruits->remark,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedfruits->delete();

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
        $fruits  = Fruits::where($where)->first();
      
        return Response()->json($fruits);
    }
      
      
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $fruits = ArchivedFruits::where('id',$request->id)->delete();
      
        return Response()->json($fruits);
    }
    // In your controller, retrieve the data
 public function fetchData() {
    // Retrieve data from your model or source (e.g., database)
    $data = Fruits::all(); // Replace YourModel with your actual model

    return response()->json($data);
}
    
}


