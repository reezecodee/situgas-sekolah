<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TeachingSchedule extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function subjectTeacher()
    {
        return $this->belongsTo(SubjectTeacher::class, 'pengampu_id');
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

    public function presenceTeacher()
    {
        return $this->hasMany(PresenceTeacher::class, 'jadwal_mengajar_id');
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class, 'jadwal_mengajar_id');
    }
}
