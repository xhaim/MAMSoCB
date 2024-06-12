<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedLivestock extends Model
{
    use HasFactory;
    protected $fillable = [ 'rsbsa', 'generated', 'barangay','name','birth',
                            'season','age','sex', 'commodity','head','deceased',];
}
