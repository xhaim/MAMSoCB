<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedCornSeeds extends Model
{
    use HasFactory;
    protected $fillable = [ 'variety','seeds_received','date_received','source_of_funds',];
}
