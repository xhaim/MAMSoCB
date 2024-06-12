<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\Fishery;
use App\Models\ArchivedFishery;
 
use Datatables;
 
class DataTableAjaxCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Fishery::select('*'))
            ->addColumn('action', 'fishery-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('fishery');
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $fisheryId = $request->id;
       
   
    if ($request->nationality === 'Others') {
        $nationality = $request->other_nationality;
    } else {
        $nationality = $request->nationality;
    }
    if ($request->education === 'Others') {
        $education = $request->other_education;
    } else {
        $education = $request->education;
    }
 
        $fishery   =   Fishery::updateOrCreate(
                    [
                     'id' => $fisheryId
                    ],
                    [
                        'registration_no' => $request->registration_no,
                        'registration_date' => $request->registration_date,
                        'registration_type' => $request->registration_type,
                        'salutation' => $request->salutation,
                        'last_name' => $request->last_name,
                        'first_name' => $request->first_name,
                        'middle_name' => $request->middle_name,
                        'appellation' => $request->appellation,
                        'barangay' => $request->barangay,
                        'contact_no' => $request->contact_no,
                        'resident' => $request->resident,
                        'age' => $request->age,
                        'date_of_birth' => $request->date_of_birth,
                        'place_of_birth' => $request->place_of_birth,
                        'gender' => $request->gender,
                        'civil_status' => $request->civil_status,
                        'no_of_children'=> $request->no_of_children,
                        'nationality' => json_encode($nationality),
                        'education'=> json_encode($education),
                        'person_to_notify' => $request->person_to_notify,
                        'relationship' => $request->relationship,
                        'contact' => $request->contact,
                        'address'=> $request->address,
                        'religion'=> $request->religion,
                        'incomeSource'=> json_encode($request->incomeSource),
                        'OtherincomeSource'=> json_encode($request->OtherincomeSource),
                       // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS //
    
                        // M&A 1
                        'membership' => $request-> membership,
                        'member_since' => $request-> member_since,
                        'position' => $request-> position,
                    
                        
                        // M&A 2
                        'membership2' => $request-> membership2,
                        'member_since2' => $request-> member_since2, 
                        'position2' => $request-> position2,
                    
           
                    ]); 
                         
        return Response()->json($fishery);
 
    }
      
      
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fishery  $fishery
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $fishery  = Fishery::where($where)->first();
      
        return Response()->json($fishery);
    }
      //  show
    public function getFisheryDetails($id)
    {
        $fishery = Fishery::find($id);
        return response()->json($fishery);
    }
    // end show
      
    // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if(request()->ajax()) {
            return datatables()->of(ArchivedFishery::select('*'))
            ->addColumn('action', 'archive-fishery-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        
        return view('fishery');
    }

   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:fisheries,id',
       ]);

       // Get the record to be archived
       $fisheries = Fishery::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedFishery::create([
        'registration_no' => $fisheries->registration_no,
        'registration_date' => $fisheries->registration_date,
        'registration_type' => $fisheries->registration_type,
        'salutation' => $fisheries->salutation,
        'last_name' => $fisheries->last_name,
        'first_name' => $fisheries->first_name,
        'middle_name' => $fisheries->middle_name,
        'appellation' => $fisheries->appellation,
        'barangay' => $fisheries->barangay,
        'contact_no' => $fisheries->contact_no,
        'resident' => $fisheries->resident,
        'age' => $fisheries->age,
        'date_of_birth' => $fisheries->date_of_birth,
        'place_of_birth' => $fisheries->place_of_birth,
        'gender' => $fisheries->gender,
        'civil_status' => $fisheries->civil_status,
        'no_of_children'=> $fisheries->no_of_children,
        'nationality' => $fisheries->nationality,
        'education'=> $fisheries->education,
        'person_to_notify' => $fisheries->person_to_notify,
        'relationship' => $fisheries->relationship,
        'contact' => $fisheries->contact,
        'address'=> $fisheries->address,
        'religion'=> $fisheries->religion,
        'incomeSource'=> $fisheries->incomeSource,
        'OtherincomeSource'=> $fisheries->OtherincomeSource,
       // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS //

        // M&A 1
        'membership' => $fisheries-> membership,
        'member_since' => $fisheries-> member_since,
        'position' => $fisheries-> position,
    
        
        // M&A 2
        'membership2' => $fisheries-> membership2,
        'member_since2' => $fisheries-> member_since2, 
        'position2' => $fisheries-> position2,
    

           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $fisheries->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_fisheries,id',
       ]);

       // Get the record to be unarchived
       $archivedfishery = ArchivedFishery::find($request->id);

       // Create a new record in the main table
       $fisheries = Fishery::create([
        'registration_no' => $archivedfishery->registration_no,
        'registration_date' => $archivedfishery->registration_date,
        'registration_type' => $archivedfishery->registration_type,
        'salutation' => $archivedfishery->salutation,
        'last_name' => $archivedfishery->last_name,
        'first_name' => $archivedfishery->first_name,
        'middle_name' => $archivedfishery->middle_name,
        'appellation' => $archivedfishery->appellation,
        'barangay' => $archivedfishery->barangay,
        'contact_no' => $archivedfishery->contact_no,
        'resident' => $archivedfishery->resident,
        'age' => $archivedfishery->age,
        'date_of_birth' => $archivedfishery->date_of_birth,
        'place_of_birth' => $archivedfishery->place_of_birth,
        'gender' => $archivedfishery->gender,
        'civil_status' => $archivedfishery->civil_status,
        'no_of_children'=> $archivedfishery->no_of_children,
        'nationality' => $archivedfishery->nationality,
        'education'=> $archivedfishery->education,
        'person_to_notify' => $archivedfishery->person_to_notify,
        'relationship' => $archivedfishery->relationship,
        'contact' => $archivedfishery->contact,
        'address'=> $archivedfishery->address,
        'religion'=> $archivedfishery->religion,
        'incomeSource'=> $archivedfishery->incomeSource,
        'OtherincomeSource'=> $archivedfishery->OtherincomeSource,
       // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS //

        // M&A 1
        'membership' => $archivedfishery-> membership,
        'member_since' => $archivedfishery-> member_since,
        'position' => $archivedfishery-> position,
    
        
        // M&A 2
        'membership2' => $archivedfishery-> membership2,
        'member_since2' => $archivedfishery-> member_since2, 
        'position2' => $archivedfishery-> position2,
    
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedfishery->delete();

       return response()->json(['success' => true]);
   }


   // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING // END OF ARCHIVING //

   //  /**
   //   * Remove the specified resource from storage.
   //   *
   //   * @param  \App\fishery  $fishery
   //   * @return \Illuminate\Http\Response
   //   */
   public function destroy(Request $request)
   {
       $fishery = ArchivedFishery::where('id',$request->id)->delete();
     
       return Response()->json($fishery);
   }
// Add this method to your controller
// Add this method to your controller
public function checkRegistrationNo(Request $request)
{
    $registrationNo = $request->input('registration_no');

    // Check if the Registration No. exists in the database
    $exists = Fishery::where('registration_no', $registrationNo)->exists();

    return response()->json(['exists' => $exists]);
}


}