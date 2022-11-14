<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
        'date',
    ];


    protected $fillable = [
        'user_id',
        'image',
        'title',
        'description',
        'date',
        'time',
        'category',
        'isRemove',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
