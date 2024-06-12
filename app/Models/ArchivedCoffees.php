<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedCoffees extends Model
{
    use HasFactory;
    protected $fillable = ['name',
                            'sex',
                            'purok',
                            'barangay',
                            'bearing',
                            'non_bearing',
                            'total',
                            'area',
                            'age',
                            'coffee_trees_harvested',
                            'kilo',
                            'season',
                            'varieties', 
                            'group',
                            'remark',
                            ];
}
