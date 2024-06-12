<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegetable extends Model
{
    use HasFactory;
 
    protected $fillable = [ 'name', 
                            'barangay', 
                            'municipality',
                            'sex',
                            'affiliation',
                            'contact',
                            'commodity',
                            'area',
                            'number_of_hills',
                            'production',
                            'market',
                            'expansionarea',
                            ];
}
