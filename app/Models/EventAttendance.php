<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendance extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'event_id',
        'student_id',
        'user_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
