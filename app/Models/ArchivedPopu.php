<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedPopu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'kabawm',
        'kabawf',
        'totalkabaw',
        'bakam',
        'bakaf',
        'totalbaka',
        'baboyf',
        'baboym',
        'totalbaboy',
        'kandingm',
        'kandingf',
        'totalkanding',
        'kabayom',
        'kabayof',
        'totalkabayo',
        'irom',
        'irof',
        'totaliro',
        'manokf',
        'manokm',
        'totalmanok',
        'bebem',
        'bebef',
        'totalbebe',
        'quailm',
        'quailf',
        'totalquail',
        'broilerm',
        'broilerf',
        'totalbroiler',
        'rabbitm',
        'rabbitf',
        'totalrabbit',
    ];
    
}
