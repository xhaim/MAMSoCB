<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedAssoc extends Model
{
    use HasFactory;
    protected $fillable = [ 'association', 'barangay','chairman','contact','no_of_farmers',
                            'registered',];
}
