<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bamboo extends Model
{
    use HasFactory;
    protected $fillable = ['name',
                            'sex',
                            'birthday',
                            'purok',
                            'barangay',
                            'newly',
                            'harvestable',
                            'total',
                            'area',
                            'age',
                            'per_month',
                            'varieties', 
                            'group',
                            'remark',
                            ];
}
