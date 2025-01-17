<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function classroom()
    {
        return $this->belongsTo(Classrooms::class, 'kelas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function presenceStudent()
    {
        return $this->hasMany(PresenceStudent::class, 'siswa_id');
    }

    public function submission()
    {
        return $this->hasMany(Submission::class, 'siswa_id');
    }
}
