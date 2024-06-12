<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedVegetables extends Model
{
    use HasFactory;
    protected $table = 'archived_vegetables';
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
