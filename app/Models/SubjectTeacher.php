<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function teachingSchedule()
    {
        return $this->hasMany(TeachingSchedule::class, 'pengampu_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'guru_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classrooms::class, 'kelas_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'mapel_id');
    }

    public function materi()
    {
        return $this->hasMany(Materi::class, 'pengampu_id');
    }

    public function materiCount()
    {
        return $this->materi()->count();
    }
}
