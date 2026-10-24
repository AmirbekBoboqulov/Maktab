<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeeklySchedule extends Model
{
    protected $guarded = [];

    public function schedule()
    {
        return $this->belongsTo(Schudeli::class, 'schedule_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
