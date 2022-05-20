<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeDoctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'time',
    ];
}
