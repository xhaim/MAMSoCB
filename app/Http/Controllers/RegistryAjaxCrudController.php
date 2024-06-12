<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registry;
use App\Models\ArchivedRegistry;
use Datatables;

class RegistryAjaxCrudController extends Controller
{
    //  /**
    //   * Display a listing of the resource.
    //   *
    //   * @return \Illuminate\Http\Response
    //   */
    public function index()
    {
        if(request()->ajax()) {
           
            return datatables()->of(Registry::select('*'))
            ->addColumn('action', 'admin.registry.registry-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.registry.registry');
    }
      
      
   //  /**
   //   * Store a newly created resource in storage.
   //   *
   //   * @param  \Illuminate\Http\Request  $request
   //   * @return \Illuminate\Http\Response
   //   */
    public function store(Request $request)
    {  
 
        $registryId = $request->id;
 
        $registry = Registry::updateOrCreate(
           ['id' => $registryId],
           [
            'rsbsa_id' => $request-> rsbsa_id,
            'generated_id' => $request-> generated_id,
            'date_enrolled' => $request-> date_enrolled,
    
            // household members columns //////////////////////////////////////////////////////////////////////////////////////////
    
            // hh 1
            'hh_member' => $request-> hh_member,
            'surname' => $request-> surname,
            'firstname' => $request-> firstname,
            'middlename' => $request-> middlename,
            'gender' => $request-> gender,
            'age' => $request-> age,
            'birthdate' => $request-> birthdate,
    
            // hh 2
            'hh_member2' => $request-> hh_member2,
            'surname2' => $request-> surname2,
            'firstname2' => $request-> firstname2,
            'middlename2' => $request-> middlename2,
            'gender2' => $request-> gender2,
            'age2' => $request-> age2,
            'birthdate2' => $request-> birthdate2,
    
            // hh 3
            'hh_member3' => $request-> hh_member3,
            'surname3' => $request-> surname3,
            'firstname3' => $request-> firstname3,
            'middlename3' => $request-> middlename3,
            'gender3' => $request-> gender3,
            'age3' => $request-> age3,
            'birthdate3' => $request-> birthdate3,
    
            // hh 4
            'hh_member4' => $request-> hh_member4,
            'surname4' => $request-> surname4,
            'firstname4' => $request-> firstname4,
            'middlename4' => $request-> middlename4,
            'gender4' => $request-> gender4,
            'age4' => $request-> age4,
            'birthdate4' => $request-> birthdate4,
    
            // hh 5
            'hh_member5' => $request-> hh_member5,
            'surname5' => $request-> surname5,
            'firstname5' => $request-> firstname5,
            'middlename5' => $request-> middlename5,
            'gender5' => $request-> gender5,
            'age5' => $request-> age5,
            'birthdate5' => $request-> birthdate5,
    
            // hh 6
            'hh_member6' => $request-> hh_member6,
            'surname6' => $request-> surname6,
            'firstname6' => $request-> firstname6,
            'middlename6' => $request-> middlename6,
            'gender6' => $request-> gender6,
            'age6' => $request-> age6,
            'birthdate6' => $request-> birthdate6,
    
            // hh 7
            'hh_member7' => $request-> hh_member7,
            'surname7' => $request-> surname7,
            'firstname7' => $request-> firstname7,
            'middlename7' => $request-> middlename7,
            'gender7' => $request-> gender7,
            'age7' => $request-> age7,
            'birthdate7' => $request-> birthdate7,
    
            // hh 8
            'hh_member8' => $request-> hh_member8,
            'surname8' => $request-> surname8,
            'firstname8' => $request-> firstname8,
            'middlename8' => $request-> middlename8,
            'gender8' => $request-> gender8,
            'age8' => $request-> age8,
            'birthdate8' => $request-> birthdate8,
    
    
            // hh 9
            'hh_member9' => $request-> hh_member9,
            'surname9' => $request-> surname9,
            'firstname9' => $request-> firstname9,
            'middlename9' => $request-> middlename9,
            'gender9' => $request-> gender9,
            'age9' => $request-> age9,
            'birthdate9' => $request-> birthdate9,
    
    
            // hh 10
            'hh_member10' => $request-> hh_member10,
            'surname10' => $request-> surname10,
            'firstname10' => $request-> firstname10,
            'middlename10' => $request-> middlename10,
            'gender10' => $request-> gender10,
            'age10' => $request-> gender10,
            'birthdate10' => $request-> birthdate10,
    
    
            // hh 11
            'hh_member11' => $request-> hh_member11,
            'surname11' => $request-> surname11,
            'firstname11' => $request-> firstname11,
            'middlename11' => $request-> middlename11,
            'gender11' => $request-> gender11,
            'age11' => $request-> age11,
            'birthdate11' => $request-> birthdate11,
    
    
            // hh 12
            'hh_member12' => $request-> hh_member12,
            'surname12' => $request-> surname12,
            'firstname12' => $request-> firstname12,
            'middlename12' => $request-> middlename12,
            'gender12' => $request-> gender12,
            'age12' => $request-> age12,
            'birthdate12' => $request-> birthdate12,
    
    
            // hh 13
            'hh_member13' => $request-> hh_member13,
            'surname13' => $request-> surname13,
            'firstname13' => $request-> firstname13,
            'middlename13' => $request-> middlename13,
            'gender13' => $request-> gender13,
            'age13' => $request-> age13,
            'birthdate13' => $request-> birthdate13,
    
    
            // hh 14
            'hh_member14' => $request-> hh_member14,
            'surname14' => $request-> surname14,
            'firstname14' => $request-> firstname14,
            'middlename14' => $request-> middlename14,
            'gender14' => $request-> gender14,
            'age14' => $request-> age14,
            'birthdate14' => $request-> birthdate14,
    
    
            // hh 15
            'hh_member15' => $request-> hh_member15,
            'surname15' => $request-> surname15,
            'firstname15' => $request-> firstname15,
            'middlename15' => $request-> middlename15,
            'gender15' => $request-> gender15,
            'age15' => $request-> age15,
            'birthdate15' => $request-> birthdate15,
    
    
            // hh 16
            'hh_member16' => $request-> hh_member16,
            'surname16' => $request-> surname16,
            'firstname16' => $request-> firstname16,
            'middlename16' => $request-> middlename16,
            'gender16' => $request-> gender16,
            'age16' => $request-> age16,
            'birthdate16' => $request-> birthdate16,
    
    
            // hh 17
            'hh_member17' => $request-> hh_member17,
            'surname17' => $request-> surname17,
            'firstname17' => $request-> firstname17,
            'middlename17' => $request-> middlename17,
            'gender17' => $request-> gender17,
            'age17' => $request-> age17,
            'birthdate17' => $request-> birthdate17,
    
    
            // hh 18
            'hh_member18' => $request-> hh_member18,
            'surname18' => $request-> surname18,
            'firstname18' => $request-> firstname18,
            'middlename18' => $request-> middlename18,
            'gender18' => $request-> gender18,
            'age18' => $request-> age18,
            'birthdate18' => $request-> birthdate18,
    
    
            // hh 19
            'hh_member19' => $request-> hh_member19,
            'surname19' => $request-> surname19,
            'firstname19' => $request-> firstname19,
            'middlename19' => $request-> middlename19,
            'gender19' => $request-> gender19,
            'age19' => $request-> age19,
            'birthdate19' => $request-> birthdate19,
    
    
            // hh 20
            'hh_member20' => $request-> hh_member20,
            'surname20' => $request-> surname20,
            'firstname20' => $request-> firstname20,
            'middlename20' => $request-> middlename20,
            'gender20' => $request-> gender20,
            'age20' => $request-> age20,
            'birthdate20' => $request-> birthdate20,
    
            // End of household members columns //////////////////////////////////////////////////////////////////////////////////////////
    
            'income_source' => $request-> income_source,
            'est_annual_income' => $request-> est_annual_income,
            'address' => $request-> address,
            'sitio_purok' => $request-> sitio_purok,
            'barangay' => $request-> barangay,
            'city' => $request-> city,
            'geo_coordinates' => $request-> geo_coordinates,
            'years_of_residency' => $request-> years_of_residency,
    
            // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS //
    
            // M&A 1
            'membership' => $request-> membership,
            'position' => $request-> position,
            'member_since' => $request-> member_since,
            'status' => $request-> status,
            // M&A 2
            'membership2' => $request-> membership2,
            'position2' => $request-> position2,
            'member_since2' => $request-> member_since2, 
            'status2' => $request-> status2,
            // M&A 3
            'membership3' => $request-> membership3,
            'position3' => $request-> position3,
            'member_since3' => $request-> member_since3,
            'status3' => $request-> status3,
            // M&A 4
            'membership4' => $request-> membership4,
            'position4' => $request-> position4,
            'member_since4' => $request-> member_since4,
            'status4' => $request-> status4,
            // M&A 5
            'membership5' => $request-> membership5,
            'position5' => $request-> position5,
            'member_since5' => $request-> member_since5,
            'status5' => $request-> status5,
    
            // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // 
    
            // A&C 1
            'award' => $request-> award,
            'awarding_body' => $request-> awarding_body,
            'date_received' => $request-> date_received,
            // A&C 2
            'award2' => $request-> award2,
            'awarding_body2' => $request-> awarding_body2,
            'date_received2' => $request-> date_received2,
            // A&C 3
            'award3' => $request-> award3,
            'awarding_body3' => $request-> awarding_body3,
            'date_received3' => $request-> date_received3,
            // A&C 4
            'award4' => $request-> award4,
            'awarding_body4' => $request-> awarding_body4,
            'date_received4' => $request-> date_received4,
            // A&C 5
            'award5' => $request-> award5,
            'awarding_body5' => $request-> awarding_body5,
            'date_received5' => $request-> date_received5,
                    
            // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS //
    
            'remarks' => $request-> remarks,
    
            // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS //
    
            // PARTICULAR 1
            'purok' => $request-> purok,
            'brngy' => $request-> brngy,
            'geographic_coordinates' => $request-> geographic_coordinates,
            'title_no' => $request-> title_no,
            'tax_declarration_no' => $request-> tax_declarration_no,
            'tenure' => json_encode($request->tenure),
            'existing_crop' => $request -> existing_crop,
            'previous_crop'=> $request -> previous_crop,
            //TOPOGRAPHY
            'hectares' => $request-> hectares,
            'land' => json_encode($request->land),
            'soil_type' => $request-> soil_type,
            'source' => json_encode($request->source),
            // REMARKS
            'notes' => $request->notes,
    
            // PARTICULAR 2
            'purok2' => $request-> purok2,
            'brngy2' => $request-> brngy2,
            'geographic_coordinates2' => $request-> geographic_coordinates2,
            'title_no2' => $request-> title_no2,
            'tax_declarration_no2' => $request-> tax_declarration_no2,
            'tenure2' => json_encode($request->tenure2),
            'existing_crop2' => $request -> existing_crop2,
            'previous_crop2'=> $request -> previous_crop2,
            //TOPOGRAPHY
            'hectares2' => $request-> hectares2,
            'land2' => json_encode($request->land2),
            'soil_type2' => $request-> soil_type2,
            'source2' => json_encode($request->source2),
            // REMARKS
            'notes2' => $request->notes2,
            
    
            // PARTICULAR 3
            'purok3' => $request-> purok3,
            'brngy3' => $request-> brngy3,
            'geographic_coordinates3' => $request-> geographic_coordinates3,
            'title_no3' => $request-> title_no3,
            'tax_declarration_no3' => $request-> tax_declarration_no3,
            'tenure3' => json_encode($request->tenure3),
            'existing_crop3' => $request -> existing_crop3,
            'previous_crop3'=> $request -> previous_crop3,
            //TOPOGRAPHY
            'hectares3' => $request-> hectares3,
            'land3' => json_encode($request->land3),
            'soil_type3' => $request-> soil_type3,
            'source3' => json_encode($request->source3),
            // REMARKS
            'notes3' => $request->notes3,
    
           ]
       );
       
        return Response()->json($registry);
 
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
        $registry  = Registry::where($where)->first();
      
        return Response()->json($registry);
    }
      
       //  show
       public function getRegistryDetails($id)
   {
       $registry = Registry::find($id);
       return response()->json($registry);
   }

      
    // START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //START OF ARCHIVING //

    //  Archive Datatable
    public function archive_index()
    {
        if(request()->ajax()) {
            return datatables()->of(ArchivedRegistry::select('*'))
            ->addColumn('action', 'admin/registry/archive-registry-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        
        return view('admin/registry/registry');
    }

   //  ARCHIVE
   public function archive(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:registries,id',
       ]);

       // Get the record to be archived
       $registries = Registry::find($request->id);

       // Create a new archived record
       $archivedRecord = ArchivedRegistry::create([
        'rsbsa_id' => $registries-> rsbsa_id,
            'generated_id' => $registries-> generated_id,
            'date_enrolled' => $registries-> date_enrolled,
    
            // household members columns //////////////////////////////////////////////////////////////////////////////////////////
    
            // hh 1
            'hh_member' => $registries-> hh_member,
            'surname' => $registries-> surname,
            'firstname' => $registries-> firstname,
            'middlename' => $registries-> middlename,
            'gender' => $registries-> gender,
            'age' => $registries-> age,
            'birthdate' => $registries-> birthdate,
    
            // hh 2
            'hh_member2' => $registries-> hh_member2,
            'surname2' => $registries-> surname2,
            'firstname2' => $registries-> firstname2,
            'middlename2' => $registries-> middlename2,
            'gender2' => $registries-> gender2,
            'age2' => $registries-> age2,
            'birthdate2' => $registries-> birthdate2,
    
            // hh 3
            'hh_member3' => $registries-> hh_member3,
            'surname3' => $registries-> surname3,
            'firstname3' => $registries-> firstname3,
            'middlename3' => $registries-> middlename3,
            'gender3' => $registries-> gender3,
            'age3' => $registries-> age3,
            'birthdate3' => $registries-> birthdate3,
    
            // hh 4
            'hh_member4' => $registries-> hh_member4,
            'surname4' => $registries-> surname4,
            'firstname4' => $registries-> firstname4,
            'middlename4' => $registries-> middlename4,
            'gender4' => $registries-> gender4,
            'age4' => $registries-> age4,
            'birthdate4' => $registries-> birthdate4,
    
            // hh 5
            'hh_member5' => $registries-> hh_member5,
            'surname5' => $registries-> surname5,
            'firstname5' => $registries-> firstname5,
            'middlename5' => $registries-> middlename5,
            'gender5' => $registries-> gender5,
            'age5' => $registries-> age5,
            'birthdate5' => $registries-> birthdate5,
    
            // hh 6
            'hh_member6' => $registries-> hh_member6,
            'surname6' => $registries-> surname6,
            'firstname6' => $registries-> firstname6,
            'middlename6' => $registries-> middlename6,
            'gender6' => $registries-> gender6,
            'age6' => $registries-> age6,
            'birthdate6' => $registries-> birthdate6,
    
            // hh 7
            'hh_member7' => $registries-> hh_member7,
            'surname7' => $registries-> surname7,
            'firstname7' => $registries-> firstname7,
            'middlename7' => $registries-> middlename7,
            'gender7' => $registries-> gender7,
            'age7' => $registries-> age7,
            'birthdate7' => $registries-> birthdate7,
    
            // hh 8
            'hh_member8' => $registries-> hh_member8,
            'surname8' => $registries-> surname8,
            'firstname8' => $registries-> firstname8,
            'middlename8' => $registries-> middlename8,
            'gender8' => $registries-> gender8,
            'age8' => $registries-> age8,
            'birthdate8' => $registries-> birthdate8,
    
    
            // hh 9
            'hh_member9' => $registries-> hh_member9,
            'surname9' => $registries-> surname9,
            'firstname9' => $registries-> firstname9,
            'middlename9' => $registries-> middlename9,
            'gender9' => $registries-> gender9,
            'age9' => $registries-> age9,
            'birthdate9' => $registries-> birthdate9,
    
    
            // hh 10
            'hh_member10' => $registries-> hh_member10,
            'surname10' => $registries-> surname10,
            'firstname10' => $registries-> firstname10,
            'middlename10' => $registries-> middlename10,
            'gender10' => $registries-> gender10,
            'age10' => $registries-> gender10,
            'birthdate10' => $registries-> birthdate10,
    
    
            // hh 11
            'hh_member11' => $registries-> hh_member11,
            'surname11' => $registries-> surname11,
            'firstname11' => $registries-> firstname11,
            'middlename11' => $registries-> middlename11,
            'gender11' => $registries-> gender11,
            'age11' => $registries-> age11,
            'birthdate11' => $registries-> birthdate11,
    
    
            // hh 12
            'hh_member12' => $registries-> hh_member12,
            'surname12' => $registries-> surname12,
            'firstname12' => $registries-> firstname12,
            'middlename12' => $registries-> middlename12,
            'gender12' => $registries-> gender12,
            'age12' => $registries-> age12,
            'birthdate12' => $registries-> birthdate12,
    
    
            // hh 13
            'hh_member13' => $registries-> hh_member13,
            'surname13' => $registries-> surname13,
            'firstname13' => $registries-> firstname13,
            'middlename13' => $registries-> middlename13,
            'gender13' => $registries-> gender13,
            'age13' => $registries-> age13,
            'birthdate13' => $registries-> birthdate13,
    
    
            // hh 14
            'hh_member14' => $registries-> hh_member14,
            'surname14' => $registries-> surname14,
            'firstname14' => $registries-> firstname14,
            'middlename14' => $registries-> middlename14,
            'gender14' => $registries-> gender14,
            'age14' => $registries-> age14,
            'birthdate14' => $registries-> birthdate14,
    
    
            // hh 15
            'hh_member15' => $registries-> hh_member15,
            'surname15' => $registries-> surname15,
            'firstname15' => $registries-> firstname15,
            'middlename15' => $registries-> middlename15,
            'gender15' => $registries-> gender15,
            'age15' => $registries-> age15,
            'birthdate15' => $registries-> birthdate15,
    
    
            // hh 16
            'hh_member16' => $registries-> hh_member16,
            'surname16' => $registries-> surname16,
            'firstname16' => $registries-> firstname16,
            'middlename16' => $registries-> middlename16,
            'gender16' => $registries-> gender16,
            'age16' => $registries-> age16,
            'birthdate16' => $registries-> birthdate16,
    
    
            // hh 17
            'hh_member17' => $registries-> hh_member17,
            'surname17' => $registries-> surname17,
            'firstname17' => $registries-> firstname17,
            'middlename17' => $registries-> middlename17,
            'gender17' => $registries-> gender17,
            'age17' => $registries-> age17,
            'birthdate17' => $registries-> birthdate17,
    
    
            // hh 18
            'hh_member18' => $registries-> hh_member18,
            'surname18' => $registries-> surname18,
            'firstname18' => $registries-> firstname18,
            'middlename18' => $registries-> middlename18,
            'gender18' => $registries-> gender18,
            'age18' => $registries-> age18,
            'birthdate18' => $registries-> birthdate18,
    
    
            // hh 19
            'hh_member19' => $registries-> hh_member19,
            'surname19' => $registries-> surname19,
            'firstname19' => $registries-> firstname19,
            'middlename19' => $registries-> middlename19,
            'gender19' => $registries-> gender19,
            'age19' => $registries-> age19,
            'birthdate19' => $registries-> birthdate19,
    
    
            // hh 20
            'hh_member20' => $registries-> hh_member20,
            'surname20' => $registries-> surname20,
            'firstname20' => $registries-> firstname20,
            'middlename20' => $registries-> middlename20,
            'gender20' => $registries-> gender20,
            'age20' => $registries-> age20,
            'birthdate20' => $registries-> birthdate20,
    
            // End of household members columns //////////////////////////////////////////////////////////////////////////////////////////
    
            'income_source' => $registries-> income_source,
            'est_annual_income' => $registries-> est_annual_income,
            'address' => $registries-> address,
            'sitio_purok' => $registries-> sitio_purok,
            'barangay' => $registries-> barangay,
            'city' => $registries-> city,
            'geo_coordinates' => $registries-> geo_coordinates,
            'years_of_residency' => $registries-> years_of_residency,
    
            // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS //
    
            // M&A 1
            'membership' => $registries-> membership,
            'position' => $registries-> position,
            'member_since' => $registries-> member_since,
            'status' => $registries-> status,
            // M&A 2
            'membership2' => $registries-> membership2,
            'position2' => $registries-> position2,
            'member_since2' => $registries-> member_since2, 
            'status2' => $registries-> status2,
            // M&A 3
            'membership3' => $registries-> membership3,
            'position3' => $registries-> position3,
            'member_since3' => $registries-> member_since3,
            'status3' => $registries-> status3,
            // M&A 4
            'membership4' => $registries-> membership4,
            'position4' => $registries-> position4,
            'member_since4' => $registries-> member_since4,
            'status4' => $registries-> status4,
            // M&A 5
            'membership5' => $registries-> membership5,
            'position5' => $registries-> position5,
            'member_since5' => $registries-> member_since5,
            'status5' => $registries-> status5,
    
            // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // 
    
            // A&C 1
            'award' => $registries-> award,
            'awarding_body' => $registries-> awarding_body,
            'date_received' => $registries-> date_received,
            // A&C 2
            'award2' => $registries-> award2,
            'awarding_body2' => $registries-> awarding_body2,
            'date_received2' => $registries-> date_received2,
            // A&C 3
            'award3' => $registries-> award3,
            'awarding_body3' => $registries-> awarding_body3,
            'date_received3' => $registries-> date_received3,
            // A&C 4
            'award4' => $registries-> award4,
            'awarding_body4' => $registries-> awarding_body4,
            'date_received4' => $registries-> date_received4,
            // A&C 5
            'award5' => $registries-> award5,
            'awarding_body5' => $registries-> awarding_body5,
            'date_received5' => $registries-> date_received5,
                    
            // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS //
    
            'remarks' => $registries-> remarks,
    
            // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS //
    
            // PARTICULAR 1
            'purok' => $registries-> purok,
            'brngy' => $registries-> brngy,
            'geographic_coordinates' => $registries-> geographic_coordinates,
            'title_no' => $registries-> title_no,
            'tax_declarration_no' => $registries-> tax_declarration_no,
            'tenure' =>  $registries->tenure,
            'existing_crop' => $registries -> existing_crop,
            'previous_crop'=> $registries -> previous_crop,
            //TOPOGRAPHY
            'hectares' => $registries-> hectares,
            'land' =>  $registries->land,
            'soil_type' => $registries-> soil_type,
            'source' =>  $registries->source,
            // REMARKS
            'notes' => $registries->notes,
    
            // PARTICULAR 2
            'purok2' => $registries-> purok2,
            'brngy2' => $registries-> brngy2,
            'geographic_coordinates2' => $registries-> geographic_coordinates2,
            'title_no2' => $registries-> title_no2,
            'tax_declarration_no2' => $registries-> tax_declarration_no2,
            'tenure2' =>  $registries->tenure2,
            'existing_crop2' => $registries -> existing_crop2,
            'previous_crop2'=> $registries -> previous_crop2,
            //TOPOGRAPHY
            'hectares2' => $registries-> hectares2,
            'land2' =>  $registries->land2,
            'soil_type2' => $registries-> soil_type2,
            'source2' =>  $registries->source2,
            // REMARKS
            'notes2' => $registries->notes2,
            
    
            // PARTICULAR 3
            'purok3' => $registries-> purok3,
            'brngy3' => $registries-> brngy3,
            'geographic_coordinates3' => $registries-> geographic_coordinates3,
            'title_no3' => $registries-> title_no3,
            'tax_declarration_no3' => $registries-> tax_declarration_no3,
            'tenure3' =>  $registries->tenure3,
            'existing_crop3' => $registries -> existing_crop3,
            'previous_crop3'=> $registries -> previous_crop3,
            //TOPOGRAPHY
            'hectares3' => $registries-> hectares3,
            'land3' =>  $registries->land3,
            'soil_type3' => $registries-> soil_type3,
            'source3' =>  $registries->source3,
            // REMARKS
            'notes3' => $registries->notes3,
           // Add any additional columns needed for the archived table
       ]);

       // Delete the record from the main table
       $registries->delete();

       return response()->json(['success' => true]);
   }

   // RESTORE ARCHIVED
   public function restore(Request $request)
   {
       // Validate the request, if necessary
       $request->validate([
           'id' => 'required|exists:archived_registries,id',
       ]);

       // Get the record to be unarchived
       $archivedregistries = ArchivedRegistry::find($request->id);

       // Create a new record in the main table
       $registries = Registry::create([
        'rsbsa_id' => $archivedregistries-> rsbsa_id,
        'generated_id' => $archivedregistries-> generated_id,
        'date_enrolled' => $archivedregistries-> date_enrolled,

        // household members columns //////////////////////////////////////////////////////////////////////////////////////////

        // hh 1
        'hh_member' => $archivedregistries-> hh_member,
        'surname' => $archivedregistries-> surname,
        'firstname' => $archivedregistries-> firstname,
        'middlename' => $archivedregistries-> middlename,
        'gender' => $archivedregistries-> gender,
        'age' => $archivedregistries-> age,
        'birthdate' => $archivedregistries-> birthdate,

        // hh 2
        'hh_member2' => $archivedregistries-> hh_member2,
        'surname2' => $archivedregistries-> surname2,
        'firstname2' => $archivedregistries-> firstname2,
        'middlename2' => $archivedregistries-> middlename2,
        'gender2' => $archivedregistries-> gender2,
        'age2' => $archivedregistries-> age2,
        'birthdate2' => $archivedregistries-> birthdate2,

        // hh 3
        'hh_member3' => $archivedregistries-> hh_member3,
        'surname3' => $archivedregistries-> surname3,
        'firstname3' => $archivedregistries-> firstname3,
        'middlename3' => $archivedregistries-> middlename3,
        'gender3' => $archivedregistries-> gender3,
        'age3' => $archivedregistries-> age3,
        'birthdate3' => $archivedregistries-> birthdate3,

        // hh 4
        'hh_member4' => $archivedregistries-> hh_member4,
        'surname4' => $archivedregistries-> surname4,
        'firstname4' => $archivedregistries-> firstname4,
        'middlename4' => $archivedregistries-> middlename4,
        'gender4' => $archivedregistries-> gender4,
        'age4' => $archivedregistries-> age4,
        'birthdate4' => $archivedregistries-> birthdate4,

        // hh 5
        'hh_member5' => $archivedregistries-> hh_member5,
        'surname5' => $archivedregistries-> surname5,
        'firstname5' => $archivedregistries-> firstname5,
        'middlename5' => $archivedregistries-> middlename5,
        'gender5' => $archivedregistries-> gender5,
        'age5' => $archivedregistries-> age5,
        'birthdate5' => $archivedregistries-> birthdate5,

        // hh 6
        'hh_member6' => $archivedregistries-> hh_member6,
        'surname6' => $archivedregistries-> surname6,
        'firstname6' => $archivedregistries-> firstname6,
        'middlename6' => $archivedregistries-> middlename6,
        'gender6' => $archivedregistries-> gender6,
        'age6' => $archivedregistries-> age6,
        'birthdate6' => $archivedregistries-> birthdate6,

        // hh 7
        'hh_member7' => $archivedregistries-> hh_member7,
        'surname7' => $archivedregistries-> surname7,
        'firstname7' => $archivedregistries-> firstname7,
        'middlename7' => $archivedregistries-> middlename7,
        'gender7' => $archivedregistries-> gender7,
        'age7' => $archivedregistries-> age7,
        'birthdate7' => $archivedregistries-> birthdate7,

        // hh 8
        'hh_member8' => $archivedregistries-> hh_member8,
        'surname8' => $archivedregistries-> surname8,
        'firstname8' => $archivedregistries-> firstname8,
        'middlename8' => $archivedregistries-> middlename8,
        'gender8' => $archivedregistries-> gender8,
        'age8' => $archivedregistries-> age8,
        'birthdate8' => $archivedregistries-> birthdate8,


        // hh 9
        'hh_member9' => $archivedregistries-> hh_member9,
        'surname9' => $archivedregistries-> surname9,
        'firstname9' => $archivedregistries-> firstname9,
        'middlename9' => $archivedregistries-> middlename9,
        'gender9' => $archivedregistries-> gender9,
        'age9' => $archivedregistries-> age9,
        'birthdate9' => $archivedregistries-> birthdate9,


        // hh 10
        'hh_member10' => $archivedregistries-> hh_member10,
        'surname10' => $archivedregistries-> surname10,
        'firstname10' => $archivedregistries-> firstname10,
        'middlename10' => $archivedregistries-> middlename10,
        'gender10' => $archivedregistries-> gender10,
        'age10' => $archivedregistries-> gender10,
        'birthdate10' => $archivedregistries-> birthdate10,


        // hh 11
        'hh_member11' => $archivedregistries-> hh_member11,
        'surname11' => $archivedregistries-> surname11,
        'firstname11' => $archivedregistries-> firstname11,
        'middlename11' => $archivedregistries-> middlename11,
        'gender11' => $archivedregistries-> gender11,
        'age11' => $archivedregistries-> age11,
        'birthdate11' => $archivedregistries-> birthdate11,


        // hh 12
        'hh_member12' => $archivedregistries-> hh_member12,
        'surname12' => $archivedregistries-> surname12,
        'firstname12' => $archivedregistries-> firstname12,
        'middlename12' => $archivedregistries-> middlename12,
        'gender12' => $archivedregistries-> gender12,
        'age12' => $archivedregistries-> age12,
        'birthdate12' => $archivedregistries-> birthdate12,


        // hh 13
        'hh_member13' => $archivedregistries-> hh_member13,
        'surname13' => $archivedregistries-> surname13,
        'firstname13' => $archivedregistries-> firstname13,
        'middlename13' => $archivedregistries-> middlename13,
        'gender13' => $archivedregistries-> gender13,
        'age13' => $archivedregistries-> age13,
        'birthdate13' => $archivedregistries-> birthdate13,


        // hh 14
        'hh_member14' => $archivedregistries-> hh_member14,
        'surname14' => $archivedregistries-> surname14,
        'firstname14' => $archivedregistries-> firstname14,
        'middlename14' => $archivedregistries-> middlename14,
        'gender14' => $archivedregistries-> gender14,
        'age14' => $archivedregistries-> age14,
        'birthdate14' => $archivedregistries-> birthdate14,


        // hh 15
        'hh_member15' => $archivedregistries-> hh_member15,
        'surname15' => $archivedregistries-> surname15,
        'firstname15' => $archivedregistries-> firstname15,
        'middlename15' => $archivedregistries-> middlename15,
        'gender15' => $archivedregistries-> gender15,
        'age15' => $archivedregistries-> age15,
        'birthdate15' => $archivedregistries-> birthdate15,


        // hh 16
        'hh_member16' => $archivedregistries-> hh_member16,
        'surname16' => $archivedregistries-> surname16,
        'firstname16' => $archivedregistries-> firstname16,
        'middlename16' => $archivedregistries-> middlename16,
        'gender16' => $archivedregistries-> gender16,
        'age16' => $archivedregistries-> age16,
        'birthdate16' => $archivedregistries-> birthdate16,


        // hh 17
        'hh_member17' => $archivedregistries-> hh_member17,
        'surname17' => $archivedregistries-> surname17,
        'firstname17' => $archivedregistries-> firstname17,
        'middlename17' => $archivedregistries-> middlename17,
        'gender17' => $archivedregistries-> gender17,
        'age17' => $archivedregistries-> age17,
        'birthdate17' => $archivedregistries-> birthdate17,


        // hh 18
        'hh_member18' => $archivedregistries-> hh_member18,
        'surname18' => $archivedregistries-> surname18,
        'firstname18' => $archivedregistries-> firstname18,
        'middlename18' => $archivedregistries-> middlename18,
        'gender18' => $archivedregistries-> gender18,
        'age18' => $archivedregistries-> age18,
        'birthdate18' => $archivedregistries-> birthdate18,


        // hh 19
        'hh_member19' => $archivedregistries-> hh_member19,
        'surname19' => $archivedregistries-> surname19,
        'firstname19' => $archivedregistries-> firstname19,
        'middlename19' => $archivedregistries-> middlename19,
        'gender19' => $archivedregistries-> gender19,
        'age19' => $archivedregistries-> age19,
        'birthdate19' => $archivedregistries-> birthdate19,


        // hh 20
        'hh_member20' => $archivedregistries-> hh_member20,
        'surname20' => $archivedregistries-> surname20,
        'firstname20' => $archivedregistries-> firstname20,
        'middlename20' => $archivedregistries-> middlename20,
        'gender20' => $archivedregistries-> gender20,
        'age20' => $archivedregistries-> age20,
        'birthdate20' => $archivedregistries-> birthdate20,

        // End of household members columns //////////////////////////////////////////////////////////////////////////////////////////

        'income_source' => $archivedregistries-> income_source,
        'est_annual_income' => $archivedregistries-> est_annual_income,
        'address' => $archivedregistries-> address,
        'sitio_purok' => $archivedregistries-> sitio_purok,
        'barangay' => $archivedregistries-> barangay,
        'city' => $archivedregistries-> city,
        'geo_coordinates' => $archivedregistries-> geo_coordinates,
        'years_of_residency' => $archivedregistries-> years_of_residency,

        // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS //

        // M&A 1
        'membership' => $archivedregistries-> membership,
        'position' => $archivedregistries-> position,
        'member_since' => $archivedregistries-> member_since,
        'status' => $archivedregistries-> status,
        // M&A 2
        'membership2' => $archivedregistries-> membership2,
        'position2' => $archivedregistries-> position2,
        'member_since2' => $archivedregistries-> member_since2, 
        'status2' => $archivedregistries-> status2,
        // M&A 3
        'membership3' => $archivedregistries-> membership3,
        'position3' => $archivedregistries-> position3,
        'member_since3' => $archivedregistries-> member_since3,
        'status3' => $archivedregistries-> status3,
        // M&A 4
        'membership4' => $archivedregistries-> membership4,
        'position4' => $archivedregistries-> position4,
        'member_since4' => $archivedregistries-> member_since4,
        'status4' => $archivedregistries-> status4,
        // M&A 5
        'membership5' => $archivedregistries-> membership5,
        'position5' => $archivedregistries-> position5,
        'member_since5' => $archivedregistries-> member_since5,
        'status5' => $archivedregistries-> status5,

        // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // 

        // A&C 1
        'award' => $archivedregistries-> award,
        'awarding_body' => $archivedregistries-> awarding_body,
        'date_received' => $archivedregistries-> date_received,
        // A&C 2
        'award2' => $archivedregistries-> award2,
        'awarding_body2' => $archivedregistries-> awarding_body2,
        'date_received2' => $archivedregistries-> date_received2,
        // A&C 3
        'award3' => $archivedregistries-> award3,
        'awarding_body3' => $archivedregistries-> awarding_body3,
        'date_received3' => $archivedregistries-> date_received3,
        // A&C 4
        'award4' => $archivedregistries-> award4,
        'awarding_body4' => $archivedregistries-> awarding_body4,
        'date_received4' => $archivedregistries-> date_received4,
        // A&C 5
        'award5' => $archivedregistries-> award5,
        'awarding_body5' => $archivedregistries-> awarding_body5,
        'date_received5' => $archivedregistries-> date_received5,
                
        // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS //

        'remarks' => $archivedregistries-> remarks,

        // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS //

        // PARTICULAR 1
        'purok' => $archivedregistries-> purok,
        'brngy' => $archivedregistries-> brngy,
        'geographic_coordinates' => $archivedregistries-> geographic_coordinates,
        'title_no' => $archivedregistries-> title_no,
        'tax_declarration_no' => $archivedregistries-> tax_declarration_no,
        'tenure' =>  $archivedregistries->tenure,
        'existing_crop' => $archivedregistries -> existing_crop,
        'previous_crop'=> $archivedregistries -> previous_crop,
        //TOPOGRAPHY
        'hectares' => $archivedregistries-> hectares,
        'land' =>  $archivedregistries->land,
        'soil_type' => $archivedregistries-> soil_type,
        'source' =>  $archivedregistries->source,
        // REMARKS
        'notes' => $archivedregistries->notes,

        // PARTICULAR 2
        'purok2' => $archivedregistries-> purok2,
        'brngy2' => $archivedregistries-> brngy2,
        'geographic_coordinates2' => $archivedregistries-> geographic_coordinates2,
        'title_no2' => $archivedregistries-> title_no2,
        'tax_declarration_no2' => $archivedregistries-> tax_declarration_no2,
        'tenure2' =>  $archivedregistries->tenure2,
        'existing_crop2' => $archivedregistries -> existing_crop2,
        'previous_crop2'=> $archivedregistries -> previous_crop2,
        //TOPOGRAPHY
        'hectares2' => $archivedregistries-> hectares2,
        'land2' =>  $archivedregistries->land2,
        'soil_type2' => $archivedregistries-> soil_type2,
        'source2' =>  $archivedregistries->source2,
        // REMARKS
        'notes2' => $archivedregistries->notes2,
        

        // PARTICULAR 3
        'purok3' => $archivedregistries-> purok3,
        'brngy3' => $archivedregistries-> brngy3,
        'geographic_coordinates3' => $archivedregistries-> geographic_coordinates3,
        'title_no3' => $archivedregistries-> title_no3,
        'tax_declarration_no3' => $archivedregistries-> tax_declarration_no3,
        'tenure3' =>  $archivedregistries->tenure3,
        'existing_crop3' => $archivedregistries -> existing_crop3,
        'previous_crop3'=> $archivedregistries -> previous_crop3,
        //TOPOGRAPHY
        'hectares3' => $archivedregistries-> hectares3,
        'land3' =>  $archivedregistries->land3,
        'soil_type3' => $archivedregistries-> soil_type3,
        'source3' =>  $archivedregistries->source3,
        // REMARKS
        'notes3' => $archivedregistries->notes3,
           // Add any additional columns needed for the main table
       ]);

       // Delete the record from the archived table
       $archivedregistries->delete();

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
       $registry = ArchivedRegistry::where('id',$request->id)->delete();
     
       return Response()->json($registry);
   }
   // Add this method to your controller
public function checkRsbsaId(Request $request)
{
    $rsbsaId = $request->input('rsbsa_id');

    // Check if the RSBSA ID exists in the database
    $exists = Registry::where('rsbsa_id', $rsbsaId)->exists();

    return response()->json(['exists' => $exists]);
}

}

