<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other_worker extends Model
{
    use HasFactory;
    protected $fillable = [
        'idOtherWorker',
        'name',
        'idNumber',
        'address',
        'phone',
        'email',
        'section',
        'conditions'
    ];
}
