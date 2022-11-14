<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
        'birthdate',
    ];

    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'grade_section',
        'birthdate',
        'school_id',
        'status',
        'isRemove',
    ];
}
