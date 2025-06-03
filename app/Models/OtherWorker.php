<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherWorker extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'idNumber',
        'address',
        'phone',
        'email',
        'section',
        'conditions'
    ];
}
