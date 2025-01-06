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

    public function classroom()
    {
        return $this->belongsTo(Classrooms::class, 'kelas_id');
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'tahun_ajaran_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'guru_id');
    }
}
