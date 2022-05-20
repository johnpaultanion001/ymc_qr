<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'name',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'service_id' , 'id');
    }
}
