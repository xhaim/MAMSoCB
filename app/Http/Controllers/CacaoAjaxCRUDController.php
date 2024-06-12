<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 
use App\Models\Cacao;
use App\Models\ArchivedCacaos;
 
use Datatables;
 

class CacaoAjaxCRUDController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Cacao::select('*'))
            ->addColumn('action', 'cacao-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('cacao');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $cacaoId = $request->id;
 
        $cacao   =   Cacao::updateOrCreate(
                    [
                     'id' => $cacaoId
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
                    'cacao_trees_harvested' => $request->cacao_trees_harvested,
                    'kilo' => $request->kilo,
                    'season' => $request->season,
                    'varieties' => $request->varieties,
                    'group' => $request->group,
                    'remark' => $request->remark,
                    ]);    
                         
        return Response()->json($cacao);
 
    }
      
// START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if (request()->ajax()) {
            return datatables()->of(ArchivedCacaos::select('*'))
                ->addColumn('action', 'archive-cacao-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('cacao');
    }


   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:cacaos,id',
       ]);

       // Get the record to be archived
       $cacaos = Cacao::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedCacaos::create([

        'name' => $cacaos->name,
        'sex' => $cacaos->sex,
        'purok' => $cacaos->purok,
        'barangay' => $cacaos->barangay,
        'bearing' => $cacaos->bearing,
        'non_bearing' => $cacaos->non_bearing,
        'total' => $cacaos->total,
        'area' => $cacaos->area,
        'age' => $cacaos->age,
        'cacao_trees_harvested' => $cacaos->cacao_trees_harvested,
        'kilo' => $cacaos->kilo,
        'season' => $cacaos->season,
        'varieties' => $cacaos->varieties,
        'group' => $cacaos->group,
        'remark' => $cacaos->remark,

           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $cacaos->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_cacaos,id',
       ]);

       // Get the record to be unarchived
       $archivedcacaos = ArchivedCacaos::find($request->id);

       // Create a new record in the main table
       $cacaos = Cacao::create([
        'name' => $archivedcacaos->name,
        'sex' => $archivedcacaos->sex,
        'purok' => $archivedcacaos->purok,
        'barangay' => $archivedcacaos->barangay,
        'bearing' => $archivedcacaos->bearing,
        'non_bearing' => $archivedcacaos->non_bearing,
        'total' => $archivedcacaos->total,
        'area' => $archivedcacaos->area,
        'age' => $archivedcacaos->age,
        'cacao_trees_harvested' => $archivedcacaos->cacao_trees_harvested,
        'kilo' => $archivedcacaos->kilo,
        'season' => $archivedcacaos->season,
        'varieties' => $archivedcacaos->varieties,
        'group' => $archivedcacaos->group,
        'remark' => $archivedcacaos->remark,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedcacaos->delete();

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
        $cacao  = Cacao::where($where)->first();
      
        return Response()->json($cacao);
    }
      
      
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cacao = ArchivedCacaos::where('id',$request->id)->delete();
      
        return Response()->json($cacao);
    }
    // Start of print // Start of print // Start of print   

    public function fetchData() {
        // Retrieve data from your model or source (e.g., database)
        $data = Cacao::all(); // Replace YourModel with your actual model

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
        $data = Cacao::where('barangay', $barangayName)->get();
    } else {
        // Fetch data for all barangays
        $data = Cacao::all();
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

    // Check if the Name exists in the database
    $exists = Cacao::where('name', $name)->exists();

    return response()->json(['exists' => $exists]);
}

}
