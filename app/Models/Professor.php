<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $fillable = [
        'idProfessor',
        'name',
        'idNumber',
        'address',
        'phone',
        'email',
        'allergies_or_conditions'
    ];
}
