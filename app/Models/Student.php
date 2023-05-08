<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'idStudent',
        'name',
        'birth_date',
        'age',
        'address',
        'benefits',
        'dad_name',
        'idNumber_dad',
        'dad_phone',
        'mom_name',
        'idNumber_mom',
        'mom_phone',
        'emergency_contact',
        'emergency_IdContact',
        'emergency_contact_phone',
        'vaccine_information',
        'allergies_or_conditions'
    ];

}

