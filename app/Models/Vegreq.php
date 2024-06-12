<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegreq extends Model
{
    use HasFactory;
    protected $fillable = [ 'name','seeds_received','barangay','contact',];
}
