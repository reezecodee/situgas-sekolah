<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function classroom()
    {
        return $this->hasOne(Classrooms::class, 'wali_kelas_id');
    }

    public function subjectTeacher()
    {
        return $this->hasMany(SubjectTeacher::class, 'guru_id');
    }

    public function teachingSchedule()
    {
        return $this->hasMany(TeachingSchedule::class, 'guru_id');
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class, 'guru_id');
    }
}
