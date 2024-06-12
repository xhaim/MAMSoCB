<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livestock;
use App\Models\ArchivedLivestock;
use Datatables;

class LivestockAjaxCRUDController extends Controller
{
    //  /**
    //   * Display a listing of the resource.
    //   *
    //   * @return \Illuminate\Http\Response
    //   */
     public function index()
     {
         if(request()->ajax()) {
             return datatables()->of(Livestock::select('*'))
             ->addColumn('action', 'admin/livestock-action')
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         }
         return view('admin/livestock');
     }
       
       
    //  /**
    //   * Store a newly created resource in storage.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @return \Illuminate\Http\Response
    //   */
     public function store(Request $request)
     {  
  
         $livestockId = $request->id;
  
         $livestock   =   Livestock::updateOrCreate(
                     [
                      'id' => $livestockId
                     ],
                     [
                     'rsbsa' => $request->rsbsa, 
                     'generated'=> $request->generated,
                     'barangay'=> $request->barangay,
                     'name'=> $request->name,
                     'birth'=> $request->birth,
                     'age'=> $request->age,
                     'sex'=> $request->sex,
                     'commodity'=> $request->commodity,
                     'head'=> $request->head,
                     'deceased'=> $request->deceased,
                     ]);    
                          
         return Response()->json($livestock);
  
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
         $livestock  = Livestock::where($where)->first();
       
         return Response()->json($livestock);
     }
       
         
    // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if(request()->ajax()) {
            return datatables()->of(ArchivedLivestock::select('*'))
            ->addColumn('action', 'admin/archive-livestock-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        
        return view('admin/livestock');
    }

   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:livestocks,id',
       ]);

       // Get the record to be archived
       $livestocks = Livestock::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedLivestock::create([
        'rsbsa' => $livestocks->rsbsa, 
        'generated'=> $livestocks->generated,
        'barangay'=> $livestocks->barangay,
        'name'=> $livestocks->name,
        'birth'=> $livestocks->birth,
        'age'=> $livestocks->age,
        'sex'=> $livestocks->sex,
        'commodity'=> $livestocks->commodity,
        'head'=> $livestocks->head,
        'deceased'=> $livestocks->deceased,
           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $livestocks->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_livestocks,id',
       ]);

       // Get the record to be unarchived
       $archivedlivestocks = ArchivedLivestock::find($request->id);

       // Create a new record in the main table
       $livestocks = Livestock::create([
        'rsbsa' => $archivedlivestocks->rsbsa, 
        'generated'=> $archivedlivestocks->generated,
        'barangay'=> $archivedlivestocks->barangay,
        'name'=> $archivedlivestocks->name,
        'birth'=> $archivedlivestocks->birth,
        'age'=> $archivedlivestocks->age,
        'sex'=> $archivedlivestocks->sex,
        'commodity'=> $archivedlivestocks->commodity,
        'head'=> $archivedlivestocks->head,
        'deceased'=> $archivedlivestocks->deceased,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedlivestocks->delete();

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
       $livestock = ArchivedLivestock::where('id',$request->id)->delete();
     
       return Response()->json($livestock);
   }
  // In your controller, retrieve the data
  public function fetchData() {
    // Retrieve data from your model or source (e.g., database)
    $data = Livestock::all(); // Replace YourModel with your actual model

    return response()->json($data);
}
// Add this method to your controller
public function checkRsbsa(Request $request)
{
    $rsbsa = $request->input('rsbsa');

    // Check if the RSBSA ID exists in the database
    $exists = Livestock::where('rsbsa', $rsbsa)->exists();

    return response()->json(['exists' => $exists]);
}

}

