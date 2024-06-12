<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedFishery extends Model
{
    use HasFactory;
    protected $fillable = [
        'registration_no',
        'registration_date',
        'registration_type',
        'salutation',
        'last_name',
        'first_name',
        'middle_name',
        'appellation',
        'barangay',
        'contact_no',
        'resident',
        'age',
        'date_of_birth',
        'place_of_birth',
        'gender',
        'civil_status',
        'no_of_children',
        'nationality',
        'education',
        'person_to_notify',
        'relationship',
        'contact',
        'address',
        'religion',
        'incomeSource',
        'OtherincomeSource',
        
        // M&A 1
        'membership',
        'member_since',
        'position',
       
        
        // M&A 2
        'membership2',
        'member_since2',   
        'position2',
        
        

    ];
}
