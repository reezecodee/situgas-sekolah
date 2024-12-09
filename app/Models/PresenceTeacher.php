<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PresenceTeacher extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function teachingSchedule()
    {
        return $this->belongsTo(TeachingSchedule::class, 'jadwal_mengajar_id');
    }
}
