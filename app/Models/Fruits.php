<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruits extends Model
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
                            'fruits_trees_harvested',
                            'kilo',
                            'season',
                            'varieties', 
                            'group',
                            'remark',
                            ];
}
