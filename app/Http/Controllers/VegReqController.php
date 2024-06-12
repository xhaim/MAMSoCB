<?php
 
 namespace App\Http\Controllers;
  
 use Illuminate\Http\Request;
  
 use App\Models\Vegreq;
 use App\Models\ArchivedVegreq;
 use Datatables;
  
 class VegReqController extends Controller

 {
    //  /**
    //   * Display a listing of the resource.
    //   *
    //   * @return \Illuminate\Http\Response
    //   */
     public function index()
     {
         if(request()->ajax()) {
             return datatables()->of(Vegreq::select('*'))
             ->addColumn('action', 'admin/vegreq-action')
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         }
         return view('admin/veg-req');
     }
       
       
    //  /**
    //   * Store a newly created resource in storage.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @return \Illuminate\Http\Response
    //   */
     public function store(Request $request)
     {  
  
         $vegreqId = $request->id;
  
         $vegreq   =   Vegreq::updateOrCreate(
                     [
                      'id' => $vegreqId
                     ],
                     [
                     'name' => $request->name, 
                     'seeds_received' => $request->seeds_received,
                     'barangay' => $request->barangay,
                     'contact' => $request->contact,
                     ]);    
                          
         return Response()->json($vegreq);
  
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
         $vegreq  = Vegreq::where($where)->first();
       
         return Response()->json($vegreq);
     }
       
       
    // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if(request()->ajax()) {
            return datatables()->of(ArchivedVegreq::select('*'))
            ->addColumn('action', 'admin/archive-vegreq-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        
        return view('admin/veg-req');
    }

   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:vegreqs,id',
       ]);

       // Get the record to be archived
       $vegreqs = Vegreq::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedVegreq::create([
        'name' => $vegreqs->name, 
        'seeds_received' => $vegreqs->seeds_received,
        'barangay' => $vegreqs->barangay,
        'contact' => $vegreqs->contact,
           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $vegreqs->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_vegreqs,id',
       ]);

       // Get the record to be unarchived
       $archivedvegreq = ArchivedVegreq::find($request->id);

       // Create a new record in the main table
       $vegreqs = Vegreq::create([
         'name' => $archivedvegreq->name, 
        'seeds_received' => $archivedvegreq->seeds_received,
        'barangay' => $archivedvegreq->barangay,
        'contact' => $archivedvegreq->contact,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedvegreq->delete();

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
       $vegreq = ArchivedVegreq::where('id',$request->id)->delete();
     
       return Response()->json($vegreq);
   }

}