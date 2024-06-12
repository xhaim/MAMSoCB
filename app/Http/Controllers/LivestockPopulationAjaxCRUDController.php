<?php

namespace App\Http\Controllers;

use App\Models\Livestockpopulation;
use Illuminate\Http\Request;
use App\Models\ArchivedPopu;
 
use Datatables;

class LivestockPopulationAjaxCRUDController extends Controller
{
    
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Livestockpopulation::select('*'))
            ->addColumn('action', 'population-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('population');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $popuId = $request->id;
 
        $popu   =   Livestockpopulation::updateOrCreate(
                    [
                     'id' => $popuId
                    ],
                    [
                    'name' => $request->name,
                    'kabawm' => $request->kabawm,
                    'kabawf' => $request->kabawf,
                    'totalkabaw' => $request->totalkabaw,
                    'bakam' => $request->bakam,
                    'bakaf' => $request->bakaf,
                    'totalbaka' => $request->totalbaka,
                    'baboyf' => $request->baboyf,
                    'baboym' => $request->baboym,
                    'totalbaboy' => $request->totalbaboy,
                    'kandingm' => $request->kandingm,
                    'kandingf' => $request->kandingf,
                    'totalkanding' => $request->totalkanding,
                    'kabayom' => $request->kabayom,
                    'kabayof' => $request->kabayof,
                    'totalkabayo' => $request->totalkabayo,
                    'irom' => $request->irom,
                    'irof' => $request->irof,
                    'totaliro' => $request->totaliro,
                    'manokf' => $request->manokf,
                    'manokm' => $request->manokm,
                    'totalmanok' => $request->totalmanok,
                    'bebem' => $request->bebem,
                    'bebef' => $request->bebef,
                    'totalbebe' => $request->totalbebe,
                    'quailm' => $request->quailm,
                    'quailf' => $request->quailf,
                    'totalquail' => $request->totalquail,
                    'broilerm' => $request->broilerm,
                    'broilerf' => $request->broilerf,
                    'totalbroiler' => $request->totalbroiler,
                    'rabbitm' => $request->rabbitm,
                    'rabbitf' => $request->rabbitf,
                    'totalrabbit' => $request->totalrabbit,
                    ]);    
                         
        return Response()->json($popu);
 
    }
      
      
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $popu  = Livestockpopulation::where($where)->first();
      
        return Response()->json($popu);
    }
      
      
    // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if(request()->ajax()) {
            return datatables()->of(ArchivedPopu::select('*'))
            ->addColumn('action', 'archive-popu-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        
        return view('population');
    }

   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:livestockpopulations,id',
       ]);

       // Get the record to be archived
       $population = Livestockpopulation::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedPopu::create([
        'name' => $population->name,
        'kabawm' => $population->kabawm,
        'kabawf' => $population->kabawf,
        'totalkabaw' => $population->totalkabaw,
        'bakam' => $population->bakam,
        'bakaf' => $population->bakaf,
        'totalbaka' => $population->totalbaka,
        'baboyf' => $population->baboyf,
        'baboym' => $population->baboym,
        'totalbaboy' => $population->totalbaboy,
        'kandingm' => $population->kandingm,
        'kandingf' => $population->kandingf,
        'totalkanding' => $population->totalkanding,
        'kabayom' => $population->kabayom,
        'kabayof' => $population->kabayof,
        'totalkabayo' => $population->totalkabayo,
        'irom' => $population->irom,
        'irof' => $population->irof,
        'totaliro' => $population->totaliro,
        'manokf' => $population->manokf,
        'manokm' => $population->manokm,
        'totalmanok' => $population->totalmanok,
        'bebem' => $population->bebem,
        'bebef' => $population->bebef,
        'totalbebe' => $population->totalbebe,
        'quailm' => $population->quailm,
        'quailf' => $population->quailf,
        'totalquail' => $population->totalquail,
        'broilerm' => $population->broilerm,
        'broilerf' => $population->broilerf,
        'totalbroiler' => $population->totalbroiler,
        'rabbitm' => $population->rabbitm,
        'rabbitf' => $population->rabbitf,
        'totalrabbit' => $population->totalrabbit,
           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $population->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_popus,id',
       ]);

       // Get the record to be unarchived
       $archivedpopu = ArchivedPopu::find($request->id);

       // Create a new record in the main table
       $population = Livestockpopulation::create([
        'name' => $archivedpopu->name,
        'kabawm' => $archivedpopu->kabawm,
        'kabawf' => $archivedpopu->kabawf,
        'totalkabaw' => $archivedpopu->totalkabaw,
        'bakam' => $archivedpopu->bakam,
        'bakaf' => $archivedpopu->bakaf,
        'totalbaka' => $archivedpopu->totalbaka,
        'baboyf' => $archivedpopu->baboyf,
        'baboym' => $archivedpopu->baboym,
        'totalbaboy' => $archivedpopu->totalbaboy,
        'kandingm' => $archivedpopu->kandingm,
        'kandingf' => $archivedpopu->kandingf,
        'totalkanding' => $archivedpopu->totalkanding,
        'kabayom' => $archivedpopu->kabayom,
        'kabayof' => $archivedpopu->kabayof,
        'totalkabayo' => $archivedpopu->totalkabayo,
        'irom' => $archivedpopu->irom,
        'irof' => $archivedpopu->irof,
        'totaliro' => $archivedpopu->totaliro,
        'manokf' => $archivedpopu->manokf,
        'manokm' => $archivedpopu->manokm,
        'totalmanok' => $archivedpopu->totalmanok,
        'bebem' => $archivedpopu->bebem,
        'bebef' => $archivedpopu->bebef,
        'totalbebe' => $archivedpopu->totalbebe,
        'quailm' => $archivedpopu->quailm,
        'quailf' => $archivedpopu->quailf,
        'totalquail' => $archivedpopu->totalquail,
        'broilerm' => $archivedpopu->broilerm,
        'broilerf' => $archivedpopu->broilerf,
        'totalbroiler' => $archivedpopu->totalbroiler,
        'rabbitm' => $archivedpopu->rabbitm,
        'rabbitf' => $archivedpopu->rabbitf,
        'totalrabbit' => $archivedpopu->totalrabbit,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedpopu->delete();

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
       $popu = ArchivedPopu::where('id',$request->id)->delete();
     
       return Response()->json($popu);
   }




   // In your controller, retrieve the data
   public function fetchData() {
    // Retrieve data from your model or source (e.g., database)
    $data = Livestockpopulation::all(); // Replace YourModel with your actual model

    return response()->json($data);
}
}