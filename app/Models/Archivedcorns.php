<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivedcorns extends Model
{
    
    use HasFactory;
    protected $table = 'archived_corn';
    protected $fillable = [ 'rsbsa', 'generated','association', 'barangay','name','birth',
                            'season','age','sex', 'cropping','area','location',];
}
