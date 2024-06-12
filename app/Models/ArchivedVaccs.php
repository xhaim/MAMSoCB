<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedVaccs extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_name',
        'birthday',
        'dog_name',
        'origin',
        'breed',
        'color',
        'ageyr',
        'age_month',
        'sex_male',
        'sex_female',
    ];

}
