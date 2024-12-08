<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class AttitudeReport extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'siswa_id');
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'tahun_ajaran_id');
    }
}
