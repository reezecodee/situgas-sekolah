<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Classrooms extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function students()
    {
        return $this->hasMany(Student::class, 'kelas_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'wali_kelas_id');
    }

    public function teachingSchedule()
    {
        return $this->hasMany(TeachingSchedule::class, 'kelas_id');
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class, 'kelas_id');
    }

    public function presenceTeacher()
    {
        return $this->hasMany(PresenceTeacher::class, 'kelas_id');
    }
}
