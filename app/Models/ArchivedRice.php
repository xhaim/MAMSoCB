<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedRice extends Model
{
    use HasFactory;
    protected $fillable = [
        'rsbsa',
        'name_first',
        'name_middle',
        'name_last',
        'suffix',
        'barangay',
        'farm_location',
        'birthdate',
        'farm_area',
        'sex',
        'membership',
        'quantity',
        'date_received',
    ];
}
