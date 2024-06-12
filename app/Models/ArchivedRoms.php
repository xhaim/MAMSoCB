<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedRoms extends Model
{
    use HasFactory;
    protected $fillable = [ 'name',
                            'address',
                            'animal_id',
                            'breed',
                            'born',
                            'bcs',
                            'lastcalving',
                            'romsdate',   
                            'ovarian',
                            'result',
                            'ai',
                            'ut',
                            'w_iec',
                            'bullid',
                            'straws',
                            'remark',
                            ];
}
