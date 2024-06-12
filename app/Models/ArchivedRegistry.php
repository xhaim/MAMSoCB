<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedRegistry extends Model
{
    use HasFactory;
    protected $fillable = [
        'rsbsa_id',
        'generated_id',
        'date_enrolled',

        // household members columns //////////////////////////////////////////////////////////////////////////////////////////

        // hh 1
        'hh_member',
        'surname',
        'firstname',
        'middlename',
        'gender',
        'age',
        'birthdate',

        // hh 2
        'hh_member2',
        'surname2',
        'firstname2',
        'middlename2',
        'gender2',
        'age2',
        'birthdate2',

        // hh 3
        'hh_member3',
        'surname3',
        'firstname3',
        'middlename3',
        'gender3',
        'age3',
        'birthdate3',

        // hh 4
        'hh_member4',
        'surname4',
        'firstname4',
        'middlename4',
        'gender4',
        'age4',
        'birthdate4',

        // hh 5
        'hh_member5',
        'surname5',
        'firstname5',
        'middlename5',
        'gender5',
        'age5',
        'birthdate5',

        // hh 6
        'hh_member6',
        'surname6',
        'firstname6',
        'middlename6',
        'gender6',
        'age6',
        'birthdate6',

        // hh 7
        'hh_member7',
        'surname7',
        'firstname7',
        'middlename7',
        'gender7',
        'age7',
        'birthdate7',

        // hh 8
        'hh_member8',
        'surname8',
        'firstname8',
        'middlename8',
        'gender8',
        'age8',
        'birthdate8',


        // hh 9
        'hh_member9',
        'surname9',
        'firstname9',
        'middlename9',
        'gender9',
        'age9',
        'birthdate9',


        // hh 10
        'hh_member10',
        'surname10',
        'firstname10',
        'middlename10',
        'gender10',
        'age10',
        'birthdate10',


        // hh 11
        'hh_member11',
        'surname11',
        'firstname11',
        'middlename11',
        'gender11',
        'age11',
        'birthdate11',


        // hh 12
        'hh_member12',
        'surname12',
        'firstname12',
        'middlename12',
        'gender12',
        'age12',
        'birthdate12',


        // hh 13
        'hh_member13',
        'surname13',
        'firstname13',
        'middlename13',
        'gender13',
        'age13',
        'birthdate13',


        // hh 14
        'hh_member14',
        'surname14',
        'firstname14',
        'middlename14',
        'gender14',
        'age14',
        'birthdate14',


        // hh 15
        'hh_member15',
        'surname15',
        'firstname15',
        'middlename15',
        'gender15',
        'age15',
        'birthdate15',


        // hh 16
        'hh_member16',
        'surname16',
        'firstname16',
        'middlename16',
        'gender16',
        'age16',
        'birthdate16',


        // hh 17
        'hh_member17',
        'surname17',
        'firstname17',
        'middlename17',
        'gender17',
        'age17',
        'birthdate17',


        // hh 18
        'hh_member18',
        'surname18',
        'firstname18',
        'middlename18',
        'gender18',
        'age18',
        'birthdate18',


        // hh 19
        'hh_member19',
        'surname19',
        'firstname19',
        'middlename19',
        'gender19',
        'age19',
        'birthdate19',


        // hh 20
        'hh_member20',
        'surname20',
        'firstname20',
        'middlename20',
        'gender20',
        'age20',
        'birthdate20',

        // End of household members columns //////////////////////////////////////////////////////////////////////////////////////////

        'income_source',
        'est_annual_income',
        'address',
        'sitio_purok',
        'barangay',
        'city',
        'geo_coordinates',
        'years_of_residency',

        // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS //

        // M&A 1
        'membership',
        'position',
        'member_since',
        'status',
        // M&A 2
        'membership2',
        'position2',
        'member_since2',   
        'status2',
        // M&A 3
        'membership3',
        'position3',
        'member_since3',
        'status3',
        // M&A 4
        'membership4',
        'position4',
        'member_since4',
        'status4',
        // M&A 5
        'membership5',
        'position5',
        'member_since5',
        'status5',

        // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // 

        // A&C 1
        'award',
        'awarding_body',
        'date_received',
        // A&C 2
        'award2',
        'awarding_body2',
        'date_received2',   
        // A&C 3
        'award3',
        'awarding_body3',
        'date_received3',
        // A&C 4
        'award4',
        'awarding_body4',
        'date_received4',
        // A&C 5
        'award5',
        'awarding_body5',
        'date_received5',
                
        // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS //

        'remarks',

        // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS //

        // PARTICULAR 1
        'purok',
        'brngy',
        'geographic_coordinates',
        'title_no',
        'tax_declarration_no',
        'tenure',
        'existing_crop',
        'previous_crop',
        //TOPOGRAPHY
        'hectares',
        'land',
        'soil_type',
        'source',
        // Remarks
        'notes',

        // PARTICULAR 2
        'purok2',
        'brngy2',
        'geographic_coordinates2',
        'title_no2',
        'tax_declarration_no2',
        'tenure2',
        'existing_crop2',
        'previous_crop2',
        //TOPOGRAPHY
        'hectares2',
        'land2',
        'soil_type2',
        'source2',
        // Remarks
        'notes2',

        // PARTICULAR 3
        'purok3',
        'brngy3',
        'geographic_coordinates3',
        'title_no3',
        'tax_declarration_no3',
        'tenure3',
        'existing_crop3',
        'previous_crop3',
        //TOPOGRAPHY
        'hectares3',
        'land3',
        'soil_type3',
        'source3',
        // Remarks
        'notes3',

    ];
}
