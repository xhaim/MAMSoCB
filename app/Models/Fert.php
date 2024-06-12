<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fert extends Model
{
    use HasFactory;
    protected $fillable = [ 'seeds_received','date_received','source_of_funds',];
}
