<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'title',
        'body',
        'link_website',
        'isRemove',
      
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
