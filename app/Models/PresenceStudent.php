<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PresenceStudent extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'siswa_id');
    }

    public function presenceTeacher()
    {
        return $this->belongsTo(PresenceTeacher::class, 'absen_guru_id');
    }
}
