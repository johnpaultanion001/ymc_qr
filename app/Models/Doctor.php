<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'name',
        'isAvailable'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function days()
    {
        return $this->hasMany(DayDoctor::class, 'doctor_id' , 'id');
    }

    public function times()
    {
        return $this->hasMany(TimeDoctor::class, 'doctor_id' , 'id');
    }
}
