<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedRental extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant',
        'address',
        'location',
        'project_description',
        'contact',
        'actual_land_area_of_farm',
        'date_inspected',
        'inspector',
        'fuel_requirement',
        'hours_of_operation',
        'equipment',
        'area',
        'rental_rate',
        'total_rental_amount',
        'payment',
        'or_number',
        'payment_date',
        'payment_amount',
        'municipal_treasurer',
        'source_of_fund',
        'funds_available',
        'municipal_accountant',
        'municipal_budget_officer',
        'municipal_mayor',
        'schedule_of_operation',
        'plate_number_tractor',
        'mao_tractor_incharge',
        'actual_land_area_served',
        'actual_hours_of_operation',
        'remarks',
        'mo_field_inspector',
    ];
}
